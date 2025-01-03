<?php

namespace App\Http\Controllers;

use App\Http\Requests\Section\StoreRequest;
use App\Http\Requests\Section\UpdateRequest;
use App\Http\Resources\Branch\BranchResource;
use App\Http\Resources\Section\SectionResource;
use App\Http\Resources\Section\SectionWithBranchesResource;
use App\Models\Branch;
use App\Models\Section;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sections = Section::with('branches')->get();
        $sections = SectionWithBranchesResource::collection($sections)->resolve();
        return Inertia('Section/Index', compact('sections'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia('Section/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {

        $data = $request->validated();
        Section::query()->firstOrCreate($data);

        return redirect()->route('sections.index')->with('success', 'Section created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Section $section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Section $section)
    {

        $section = SectionResource::make($section)->resolve();
        return Inertia::render('Section/Edit', compact('section'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Section $section)
    {

        $data = $request->validated();
        $section->update($data);
        return redirect()->route('sections.index')->with('success', 'Section updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Section $section)
    {
        $section->delete();
        return redirect()->back()->with('success', 'Section deleted successfully');
    }
    public function branches(Section $section)
    {
        return BranchResource::collection($section->branches)->resolve();
    }
public function branch_except(Section $section, Branch $branch)
    {
        $branches = $section->branches()->where('id','!=',$branch->id)->get();
        return BranchResource::collection($branches)->resolve();
    }

}
