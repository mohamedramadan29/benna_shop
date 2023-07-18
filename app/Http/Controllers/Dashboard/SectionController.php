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

    public function update(Request $request)
    {
        return $this->Sections->update($request);
    }
    public function destroy(Request $request)
    {
        return $this->Sections->destroy($request);
    }
}
