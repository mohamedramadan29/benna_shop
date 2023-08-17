<?php

namespace App\Repository\Insurance;

use App\interface\Insurance\InsuranceRepoInterface;
use App\Models\Insurance;
use Illuminate\Console\View\Components\Info;

class InsuranceRepository implements InsuranceRepoInterface
{
    public function index()
    {
        $insurances = Insurance::all();
        return view('Dashboard.Insurance_company.index', compact('insurances'));
    }
    public function create()
    {
        return view("Dashboard.Insurance_company.add");
    }
    public function store($request)
    {
        $insurance = new Insurance();
        try {
            $insurance->insurance_code = $request->insurance_code;
            $insurance->discount_percentage = $request->discount_percentage;
            $insurance->company_rate = $request->company_rate;
            $insurance->status = $request->status;
            $insurance->save();
            $insurance->name = $request->name;
            $insurance->notes = $request->notes;
            $insurance->save();
            session()->flash('add');
            return redirect()->route("insurance_company.index");
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
            
        }
    }
    public function update($request)
    {
        $insurance = Insurance::findOrFail($request->id);
        try{
            $insurance->update([
                "insurance_code" => $request->insurance_code,
                "discount_percentage" => $request->discount_percentage,
                "company_rate" => $request->company_rate,
                "status" => $request->status,
                "name" => $request->name,
                "notes" => $request->notes,
            ]);
            session()->flash('success');
            return redirect()->back();
        }catch(\Exception $e){
            
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
       
        session()->flash('success');
        return redirect()->route("insurance_company.index");
    }
    public function destroy($request)
    {
        Insurance::destroy($request->id);
        session()->flash('delete');
        return redirect()->back();
    }
}
