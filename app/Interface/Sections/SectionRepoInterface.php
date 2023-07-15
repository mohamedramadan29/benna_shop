<?php

namespace App\interface\Sections;

interface SectionRepoInterface
{
    public function index();
    public function store($request);
}
