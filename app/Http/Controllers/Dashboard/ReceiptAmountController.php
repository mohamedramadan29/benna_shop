<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\interface\Finance\ReciptRepoInterface;
use Illuminate\Http\Request;

class ReceiptAmountController extends Controller
{
    protected $Recipts;

    public function __construct(ReciptRepoInterface $Recipts)
    {
        $this->Recipts = $Recipts;
    }
    public function index()
    {
        return $this->Recipts->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->Recipts->create();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $this->Recipts->store($request);
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
        $this->Recipts->edit($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $this->Recipts->update($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $this->Recipts->destroy($request);
    }
}
