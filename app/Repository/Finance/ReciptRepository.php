<?php

namespace App\Repository\Finance;

use App\interface\Finance\ReciptRepoInterface;
use App\Models\FundAcount;
use App\Models\Patient;
use App\Models\PatientAccount;
use App\Models\ReciptAccount;
use Illuminate\Support\Facades\DB;

class ReciptRepository implements ReciptRepoInterface
{
    public function index()
    {
        $recipts  = ReciptAccount::all();
        return view("Dashboard.Recipts.index", compact("recipts"));
    }
    public function create()
    {
        $patients = Patient::all();
        return view('Dashboard.Recipts.add', compact('patients'));
    }

    public function store($request)
    {
        DB::beginTransaction();
        try {
            // Store In Recipt Account  // اول شي التسجيل في جدول سندات القبض 
            $recipt_account  = new  ReciptAccount();
            $recipt_account->date = date("Y-m-d");
            $recipt_account->patient_id = $request->patient_id;
            $recipt_account->debit = $request->debit;
            $recipt_account->description = $request->description;
            $recipt_account->save();
            // Store In func Account // التسجيل داخل الصندوق 
            $fund_acount  = new FundAcount();
            $fund_acount->date = date("Y-m-d");
            $fund_acount->recipt_id = $recipt_account->id;
            $fund_acount->debit = $request->debit;
            $fund_acount->credit = 0.00;
            $fund_acount->save();
            // Store In Patient Account // التسجيل في جدول المريض 
            $patient_account = new PatientAccount();
            $patient_account->date = date("Y-m-d");
            $patient_account->patient_id = $request->patient_id;
            $patient_account->recipt_id = $recipt_account->id;
            $patient_account->debit = 0.00;
            $patient_account->credit = $request->debit;
            $patient_account->save();
            DB::commit();
            session()->flash('add');
            return redirect()->route("Recipt.create");
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $e->getmessage()]);
        }
    }
    public function edit($id)
    {
        $recipt_id = ReciptAccount::findOrFail($id);
        $patients = Patient::all();
        return view('Dashboard.Recipts.edit', compact('recipt_id', 'patients'));
    }
    public function update($request)
    {
    }
    public function destroy($request)
    {
    }
}
