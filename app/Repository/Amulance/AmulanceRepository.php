<?php

namespace App\Repository\Amulance;

use App\interface\Amulance\AmulanceRepInterface;
use App\Models\Amulance;

class AmulanceRepository implements AmulanceRepInterface{
    public function index()
    {
        $ambulances = Amulance::all();
        return view('Dashboard.Amulances.index',compact('ambulances'));
    }
    public function create()
    {
        return view('Dashboard.Amulances.add');
    }

    public function store($request)
    {
        try {

       $ambulances = new Amulance();
       $ambulances->car_number = $request->car_number;
       $ambulances->car_model = $request->car_model;
       $ambulances->car_year_made = $request->car_year_made;
       $ambulances->drive_licence_number = $request->driver_license_number;
       $ambulances->drive_phone = $request->driver_phone;
       $ambulances->is_available = 1;
       $ambulances->car_type = $request->car_type;
       $ambulances->save();
       //insert trans
       $ambulances->driver_name = $request->driver_name;
       $ambulances->note = $request->notes;
       $ambulances->save();

      session()->flash('add');
      return redirect()->back();

        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $ambulance = Amulance::findorfail($id);
        return view('Dashboard.Amulances.edit',compact('ambulance'));
    }

    public function update($request)
    {
        if (!$request->has('is_available'))
            $request->request->add(['is_available' => 2]);
        else
            $request->request->add(['is_available' => 1]);

        $ambulance = Amulance::findOrFail($request->id);

        $ambulance->update($request->all());

        // insert trans
        $ambulance->driver_name = $request->driver_name;
        $ambulance->note = $request->note;
        $ambulance->save();

        session()->flash('edit');
        return redirect()->route('Ambulance.index');
    }

    public function destroy($request)
    {
        Amulance ::destroy($request->id);
        session()->flash('delete');
        return redirect()->back();
    }
}