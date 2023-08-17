<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\interface\Amulance\AmulanceRepInterface;
use Illuminate\Http\Request;

class AmulanceController extends Controller
{
    protected $Amulances;

    public function __construct(AmulanceRepInterface $Amulances)
    {
        $this->Amulances = $Amulances;
    }
    public function index()
    {
        return $this->Amulances->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->Amulances->create();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $this->Amulances->store($request);
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
        return $this->Amulances->edit($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        return $this->Amulances->update($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        return $this->Amulances->destroy($request);
    }
}
