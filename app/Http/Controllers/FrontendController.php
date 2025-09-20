<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Skill;


class FrontendController extends Controller
{
    public function home()
    {
        $projects = Project::latest()->get();
        $about = \App\Models\About::latest()->first();
        $skills = Skill::oldest()->get();

        return view('frontend.home', compact('projects', 'about','skills'));
    }

}

