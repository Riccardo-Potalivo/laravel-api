<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::paginate(3);
        return response()->json([
            'success' => true,
            'result' => $projects
        ]);
    }

    public function show($slug)
    {
        $project = Project::where('slug', $slug)->with(['type', 'technologies'])->first();
        return response()->json([
            'success' => true,
            'result' => $project
        ]);
    }
}
