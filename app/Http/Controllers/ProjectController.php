<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;

// Helpers
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

// Mails
use App\Mail\Newproject;
use Illuminate\Support\Facades\Mail;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();

        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        $data = $request->validated();

        if (array_key_exists('image', $data)) {

            $imgPath = Storage::put('projects', $data['image']);

            $data['image'] = $imgPath;

        }

        $data['slug'] = Str::slug($data['title']);

        $newProject = Project::create($data);

        Mail::to('info@boolpress.it')->send(new Newproject($newProject));

        return redirect()->route('admin.projects.show', $newProject->id)->with('success', 'Progetto aggiunto con successo!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectRequest  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $data = $request->validated();

        if (array_key_exists('delete_image', $data)) {

            if ($project->image) {

                Storage::delete($project->image);

                $project->image = null;

                $project->save();
            }

        } else if (array_key_exists('image', $data)) {

            $imgPath = Storage::put('projects', $data['image']);
            
            $data['image'] = $imgPath;

            if ($project->image) {

                Storage::delete($project->image);

            }
        }

        $data['slug'] = Str::slug($data['title']);

        $project->update($data);

        return redirect()->route('admin.projects.show', $project->id)->with('success', 'Progetto modificato con successo!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('admin.projects.index')->with('success', 'Progetto eliminato con successo!');
    }
}
