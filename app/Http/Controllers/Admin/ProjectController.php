<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Functions\Helper;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
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
    public function store(Request $request)
    {
        $exist = Project::where('title', $request->title)->first();
        if ($exist) {
            return redirect()->route('admin.projects.index')->with('error', 'Nome Tecnologia già esistente');
        } else{
            $new = new Project();
            $new->title = $request->title;
            $new->slug = Helper::generateSlug($new->title, Project::class);
            $new->save();

            return redirect()->route('admin.projects.index')->with('success', 'Nome Progetto creato correttamente');
        }
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
    public function update(Request $request, Project $project)
    {
        $val_data = $request->validate([
            'title' => 'required|min:2|max:100'
        ],
        [
           'title.required' => 'Devi inserire il nome della Tecnologia',
           'title.min' => 'Deve avere almeno :min caratteri',
           'title.max' => 'Deve avere al massimo :max caratteri',
        ]);

        $exist = Project::where('title', $request->title)->first();
        if ($exist) {
            return redirect()->route('admin.projects.index')->with('error', 'Nome Progetto già esistente');
        } else{
            $val_data['slug'] = Helper::generateSlug($request->title, Project::class);
            $project->update($val_data);

            return redirect()->route('admin.projects.index')->with('success', 'Nome Progetto modificato correttamente');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index')->with('success', 'Progetto eliminato correttamente');
    }
}
