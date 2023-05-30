<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AddProjectRequest;
use App\Models\Project;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $project = Project::all();
        return response($project);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddProjectRequest $request)
    {

        if ($request->hasFile('image_url')) {
            $imagePath = $request->file('image_url')->store('uploads', 'public');
        } else {
            $imagePath = '';
        }
        $project = new Project();
        $project->user_id = Auth::user()->id;
        $project->title = $request->title;
        $project->description = $request->description;
        $project->image_url = '/storage/' . $imagePath;
        $project->save();

        return response('Add Project Success');
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
