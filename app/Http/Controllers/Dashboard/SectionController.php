<?php

namespace App\Http\Controllers\Dashboard;

use App\interface\Sections\SectionRepoInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    protected $Sections;

    public function __construct(SectionRepoInterface $Sections)
    {
        $this->Sections = $Sections;
    }

    public function index()
    {
        return $this->Sections->index();
    }

    public function store(Request $request)
    {
        return $this->Sections->store($request);
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
