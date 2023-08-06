<?php 

namespace App\interface\Doctors;

interface DoctorRepoInterface{

    public function index();
    public function create();
    public function store($request);
    public function destroy($request);
    public function edit($id);
}