<?php

namespace App\Repository\Doctors;

use App\interface\Doctors\DoctorRepoInterface;
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
        $doctors = doctor::all();
        $appoiments = Appointment::all();
        return view('Dashboard.Doctors.index', compact('doctors', 'appoiments'));
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
            $doctor = new doctor();
            $doctor->email = $request->email;
            $doctor->password = Hash::make($request->password);
            $doctor->section_id = $request->section_id;
            $doctor->phone = $request->phone;
            $doctor->status = $request->status;
            $doctor->save();
            $doctor->name = $request->name;
            $doctor->appointment = implode(',', $request->appointment);
            $doctor->save();
            // upload image

            $this->uploadimage($request, 'photo', 'doctors', 'uploadimage', $doctor->id, 'App\Models\doctor');

            DB::commit();
            session()->flash('add');
            return redirect()->route('Doctors.create');
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
}
