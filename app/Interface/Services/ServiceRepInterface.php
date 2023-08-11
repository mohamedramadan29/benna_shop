<?php

namespace App\interface\Services;

interface ServiceRepInterface
{
    public function index();
    public function store($request);
    public function update($request);
    public function destroy($request);
}
