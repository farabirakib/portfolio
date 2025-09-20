<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\Mail;

class ProjectController extends Controller
{
    // create er jonno
    public function create()
    {
        return view('backend.projects.create');
        
    }

    // store method to save Project info
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'short_description' => 'required',
            'project_link' => 'nullable|url',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $destinationPath = public_path('assets/project_images');

            // যদি ফোল্ডার না থাকে, তাহলে তৈরি করা হবে
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            // ফাইল move করা হবে নির্ধারিত লোকেশনে
            $image->move($destinationPath, $imageName);

            // রিলেটিভ path ডাটাবেজ বা frontend এ ব্যবহারের জন্য
            $imagePath = 'assets/project_images/' . $imageName;
        }

        Project::create([
            'title' => $request->title,
            'short_description' => $request->short_description,
            'project_link' => $request->project_link,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.projects.index')->with('success', 'Project added successfully!');

    }

    // Index method to list all Project entries
    public function index()
    {
        $projects = Project::latest()->get();
        return view('backend.projects.index', compact('projects'));
    }

    // Edit method to show form for editing Project info
    public function edit($id)
    {
        $project = Project::findOrFail($id);
        return view('backend.projects.edit', compact('project'));
    }

    // Update method to modify existing Project info
   public function update(Request $request, $id)
    {
        $project = Project::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'short_description' => 'required',
            'project_link' => 'nullable|url',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $project->title = $request->title;
        $project->short_description = $request->short_description;
        $project->project_link = $request->project_link;

        // Image update
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $destinationPath = public_path('assets/project_images');

            // Folder না থাকলে তৈরি করো
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            // আগের ইমেজ থাকলে delete করো (optional but recommended)
            if ($project->image && file_exists(public_path($project->image))) {
                unlink(public_path($project->image));
            }

            // Image move
            $image->move($destinationPath, $imageName);
            $project->image = 'assets/project_images/' . $imageName;
        }

        $project->save();

        return redirect()->route('admin.projects.index')->with('success', 'Project updated successfully!');
    }


    public function destroy($id)
    {
        $project = Project::findOrFail($id);

        if ($project->image && file_exists(public_path('uploads/projects/' . $project->image))) {
            unlink(public_path('uploads/projects/' . $project->image));
        }

        $project->delete();

        return response()->json(['status' => 'success']);
    }


}