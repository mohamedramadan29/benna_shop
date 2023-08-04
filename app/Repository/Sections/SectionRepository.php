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
                'description' => $request->input('description'),
            ]
        );
        session()->flash('add');
        return redirect()->route('sections.index');
    }
    public function update($request)
    {
        $section = Section::findOrFail($request->id);
        $section->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);
        return redirect()->route('sections.index');
    }
    public function destroy($request)
    {
        $section = Section::findOrFail($request->id);
        $section->delete();
        return redirect()->route("sections.index");
    }
}
