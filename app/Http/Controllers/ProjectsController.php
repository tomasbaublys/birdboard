<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class ProjectsController extends Controller
{
    function index()
    {
    	$projects = Project::all();

    	return view('projects.index', compact('projects'));
    }

    function store()
    {  			
		Project::create(request()->validate([
            'title' => 'required',
            'description' => 'required',
        ]));

		return redirect('/projects');
    }
}
