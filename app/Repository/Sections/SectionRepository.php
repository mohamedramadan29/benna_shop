<?php

namespace App\Repository\Sections;

use App\interface\Sections\SectionRepoInterface;
use App\Models\Section;

class SectionRepository implements SectionRepoInterface
{
    // 
    public function index()
    {
        $sections = Section::all();
        return view('Dashboard.Sections.index', compact('sections'));
    }
    public function store($request)
    {
        Section::create(
            [
                'name' => $request->input('name'),
            ]
        );
        session()->flash('add');
        return redirect()->route('sections.index');
    }
}
