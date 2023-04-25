<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Models\Project;


class ProjectController extends Controller
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
    public function index()
    {
        $projects = Project::all();
        $no = 1;
        return view('home',compact('projects','no'));
        // return view('home');
    }
    
    public function create(){
        return view('project.create');
    }
    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'title' => 'required',
            'description' => 'required',
            'image_url' => 'required',
        ]);
        if($validator->fails()){
            toastr()->error($validator->messages()->first());
            return redirect()->back()->withInput();

        } else{
            $project = Project::where('title',$request->title)->first();
            if ($project==null) {
                $products = Project::create([
                    'title' => $request->title,
                    'description' => $request->description,
                    'image_url' => $request->image_url
                ]);
                toastr()->success('Data Berhasil disimpan','Berhasil');
                return redirect('home');
            } else {
                toastr()->warning('title '.$request->nama_produk.' Sudah Ada', 'Warning', ['timeOut'=>5000]);
                return redirect()->back()->withInput();
            }
        }
    }
}
