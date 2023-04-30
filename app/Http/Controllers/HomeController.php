<?php

namespace App\Http\Controllers;

use Image;
use Validator;
use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function index()
    // {
    //     return view('admin');
    // }
    public function index()
    {
        return view('home');
    }

    public function data()
    {
        $project = Project::all();
        return view('project.data-project', compact('project'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('project.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'image_url' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        if ($validator->fails()) {
            toastr()->error($validator->messages()->first());
            return redirect()->back()->withInput();
        } else {
            // example 1
            if ($request->hasFile('image_url')) {
                $imagePath = $request->file('image_url')->store('uploads', 'public');
            } else {
                $imagePath = '';
            }
            $project = Project::where('title', $request->title)->first();
            if ($project == null) {
                $project = new Project;
                $project->title = $request->title;
                $project->description = $request->description;
                $project->image_url = '/storage/' . $imagePath;
                $project->save();
                toastr()->success('Data Saved Successfully', 'Successful');
                return redirect('project');
            } else {
                toastr()->warning('Title ' . $request->title . ' Already Existing', 'Warning', ['timeOut' => 5000]);
                return redirect()->back()->withInput();
            }

            //example 2

            // $project = Project::where('title', $request->title)->first();
            // if ($project == null) {
            //     $picture = $request->file('image_url');
            //     $filename = time() . '.' . $picture->getClientOriginalExtension();
            //     Image::make($picture)->resize(600,600)->save(public_path('/image/'.$filename));

            //     $project = new Project;
            //     $project->title = $request->title;
            //     $project->description = $request->description;
            //     $project->image_url = $filename;
            //     $project->save();
            //     toastr()->success('Data Saved Successfully', 'Successful');
            //     return redirect('home');
            // } else {
            //     toastr()->warning('Title ' . $request->title . ' Already Existing', 'Warning', ['timeOut' => 5000]);
            //     return redirect()->back()->withInput();
            // }

        }
    }

    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $project = Project::findOrFail($id);
        return view('project.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            //'image_url' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        if ($validator->fails()) {
            toastr()->error($validator->messages()->first());
            return redirect()->back()->withInput();
        } else {
            if ($request->hasFile('image_url')) {
                $validator = Validator::make($request->all(), [
                    'image_url' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
                ]);
                if ($validator->fails()) {
                    toastr()->error($validator->messages()->first());
                    return redirect()->back()->withInput();
                } else {
                    if ($request->hasFile('image_url')) {
                        $imagePath = $request->file('image_url')->store('uploads', 'public');
                    } else {
                        $imagePath = '';
                    }

                    $project = Project::findOrFail($id);
                    Storage::delete('uploads/' . $project->image_url);
                    $project->title = $request->title;
                    $project->description = $request->description;
                    $project->image_url = '/storage/' . $imagePath;
                    $project->save();
                }
            } else {
                $project = Project::findOrFail($id);
                $project->title = $request->title;
                $project->description = $request->description;
                $project->save();
            }

            toastr()->success('Data Saved Successfully', 'Successful');
            return redirect('project');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $project = Project::findOrFail($id);
        $project->delete();

        return redirect('project');
    }
}
