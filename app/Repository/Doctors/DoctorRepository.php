<?php

namespace App\Repository\Doctors;

use App\interface\Doctors\DoctorRepoInterface;
use App\Models\doctor;
use App\Models\Section;

class DoctorRepository implements DoctorRepoInterface
{
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
    }
}
