<?php

namespace App\Repository\Doctors;

use App\interface\Doctors\DoctorRepoInterface;
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
        return view('Dashboard.Doctors.index', compact('doctors'));
    }

    public function create()
    {
        $sections = Section::all();
        return view('Dashboard.Doctors.add', compact('sections'));
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
            $doctor->price = $request->price;
            $doctor->status = $request->status;
            $doctor->save();
            $doctor->name = $request->name;
            $doctor->appointment = implode(',', $request->appointment);
            $doctor->save();
            // upload image
            /*
            $this->uploadimage($request,'photo','doctors','uploadimage',$doctor->id,'App\Models\doctor');
            */
            DB::commit();
            session()->flash('add');
            return redirect()->route('Doctors.create');
        } catch (\Exception $e) {
            DB::rollBack();
            return  redirect()->back()->withErrors(['error'=>$e->getMessage()]);
        }
    }
}
