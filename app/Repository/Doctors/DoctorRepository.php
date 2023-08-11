<?php

namespace App\Repository\Doctors;

use App\interface\Doctors\DoctorRepoInterface;
use App\Models\Appoiment_doctor;
use App\Models\Appointment;
use App\Models\doctor;
use App\Models\Section;
use App\Traits\uploadTrait;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DoctorRepository implements DoctorRepoInterface
{
    use uploadTrait;
    public function index()
    {
        //$doctors = doctor::all();
        $doctors = doctor::with('docotorappoiments')->get();
        return view('Dashboard.Doctors.index', compact('doctors'));
    }

    public function create()
    {
        $sections = Section::all();
        $appoiments = Appointment::all();
        return view('Dashboard.Doctors.add', compact('sections', 'appoiments'));
    }
    public function store($request)
    {
        DB::beginTransaction();
        try {
            $doctor = new Doctor();
            $doctor->email = $request->email;
            $doctor->password = Hash::make($request->password);
            $doctor->section_id = $request->section_id;
            $doctor->phone = $request->phone;
            $doctor->status = $request->status;
            $doctor->save();
            // stor trans
            $doctor->name = $request->name; // قم بتحريك هذا السطر قبل حفظ الطبيب
            $doctor->save();

            // تحديد مواعيد العيادات للطبيب الجديد
            $doctor->docotorappoiments()->attach($request->appointment);

            // رفع الصورة
            $this->uploadimage($request, 'photo', 'doctors', 'uploadimage', $doctor->id, 'App\Models\Doctor');

            DB::commit();
            session()->flash('add');
            return redirect()->route('doctors.index');
        } catch (\Exception $e) {
            DB::rollBack();
            return  redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        $id = $request->id;
        if ($request->page_id == 1) {
            if ($request->filename) {
                $this->deleteattachments('uploadimage', 'doctors/' . $request->filename, $id, $request->filename);
            }
            doctor::destroy($id);
            session()->flash('delete');
            return redirect()->route("doctors.index");
        } else {
            $delete_select_id = explode(',', $request->delete_select_id);
            foreach ($delete_select_id as $select_id) {
                $doctor = doctor::findOrFail($select_id);
                if ($doctor->image) {
                    $this->deleteattachments('uploadimage', 'doctors/' . $doctor->image->filename, $select_id, $doctor->image->filename);
                }
            }
            doctor::destroy($delete_select_id);
            session()->flash('delete');
            return redirect()->route("doctors.index");
        }
    }
    public function edit($id)
    {
        //  $doctor = doctor::where("id",$id);
        $sections = Section::all();
        $appoiments = Appointment::all();
        $doctor = doctor::findorFail($id);
        return view('Dashboard.Doctors.edit', compact('sections', 'appoiments', 'doctor'));
    }
    public function update($request)
    {
        DB::beginTransaction();
        try {
            $doctor = doctor::findorFail($request->id);
            $doctor->email = $request->email;
            $doctor->section_id = $request->section_id;
            $doctor->phone = $request->phone;
            $doctor->status = $request->status;
            $doctor->save();
            $doctor->name = $request->name;
            $doctor->save();
            // update pivate table
            $doctor->docotorappoiments()->sync($request->appointment);
            // update image
            if ($request->has("photo")) {
                // delete old photo
                if ($doctor->image) {
                    $old_image = $doctor->image->filename;
                    $this->deleteattachments('uploadimage', 'doctors/' . $old_image, $request->id, $old_image);
                }
                // upload image
                $this->uploadimage($request, 'photo', 'doctors', 'uploadimage', $request->id, 'App\Models\doctor');
            }
            DB::commit();
            session()->flash('success');
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    // update password 

    public function update_password($request)
    {
        try {
            $doctor = doctor::findorFail($request->id);
            $doctor->update([
                'password' => Hash::make($request->password)
            ]);
            session()->flash('success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    // update status
    public function update_status($request)
    {
        try {
            $doctor = doctor::findorFail($request->id);
            $doctor->update([
                'status' => $request->status
            ]);
            session()->flash('success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
