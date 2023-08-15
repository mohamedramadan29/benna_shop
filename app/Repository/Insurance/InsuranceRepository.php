<?php

namespace App\Repository\Insurance;

use App\interface\Insurance\InsuranceRepoInterface;

class InsuranceRepository implements InsuranceRepoInterface
{
    public function index()
    {
        return view('Dashboard.Insurance_company.index');
    }
    public function store($request)
    {
    }
    public function update($request)
    {
    }
    public function destroy($request)
    {
    }
}
