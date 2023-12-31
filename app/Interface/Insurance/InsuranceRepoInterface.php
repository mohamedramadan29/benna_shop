<?php

namespace App\interface\Insurance;

interface InsuranceRepoInterface
{
    public function index();
    public function create();
    public function store($request);
    public function update($request);
    public function destroy($request);
}
