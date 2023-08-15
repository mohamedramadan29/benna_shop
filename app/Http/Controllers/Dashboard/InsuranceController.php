<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\InsuranceValidation;
use App\interface\Insurance\InsuranceRepoInterface;
use Illuminate\Http\Request;

class InsuranceController extends Controller
{

    protected $Insurance;

    public function __construct(InsuranceRepoInterface $Insurance)
    {
        $this->Insurance = $Insurance;
    }

    public function index()
    {
        return $this->Insurance->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(InsuranceValidation $request)
    {
        return  $this->Insurance->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(InsuranceValidation $request)
    {
        return $this->Insurance->update($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
