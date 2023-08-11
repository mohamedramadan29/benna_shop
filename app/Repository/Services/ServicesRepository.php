<?php

namespace App\Repository\Services;

use App\interface\Services\ServiceRepInterface;
use App\Models\Service;
use Exception;

class ServicesRepository implements ServiceRepInterface
{
    public function index()
    {
        $singleServices = Service::all();
        return view("Dashboard.Services.Single_Services.index", compact('singleServices'));
    }
    public function store($request)
    {
        try {
            $service = new Service();
            $service->price = $request->price;
            $service->status = $request->status;
            $service->save();
            $service->name = $request->name;
            $service->description = $request->description;
            $service->save();
            session()->flash('add');
            return redirect()->route('service.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    // update service

    public function update($request)
    {
        try {
            $service = Service::findorFail($request->id);
            $service->update([
                "price" => $request->price,
                "status" => $request->status,
                "name" => $request->name,
                "description" => $request->description
            ]);
            session()->flash('success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    public function destroy($request)
    {

        Service::destroy($request->id);
        session()->flash('delete');
        return redirect()->back();
    }
}
