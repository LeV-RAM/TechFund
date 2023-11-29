<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\project;
use App\Models\people; 
use App\Models\stakeholder; 

class ProjectController extends Controller
{
    /**
     * Create a new project instance.
     *
     * @param  Request  $request
     * @return Response
     */
    public function create(Request $request)
    {
        // Validate the request data
        $request->validate([
            'projectname' => 'required|max:255',
            'fund' => 'required|numeric',
            'deadline' => 'required|date',
            'needworker' => 'required|boolean',
        ]);

        // Assuming the ownerID is the ID of the currently authenticated user
        
        $ownerID = Auth::id();

        // Create a new project
        $project = new project;
        $project->owner_id = $ownerID;
        $project->name = $request->projectName;
        $project->fund = $request->fund;
        $project->deadline = $request->deadline;
        $project->needworker = $request->needworker;
        
        $project->save();

        return response()->json([
            'message' => 'Project successfully created!',
            'project' => $project
        ], 201);
    }

    public function totalProjectsCount()
    {
        $count = project::count();
        return response()->json(['totalProjects' => $count]);
    }

    /**
     * Get the number of projects created by the currently authenticated user.
     *
     * @return Response
     */
    public function userProjectsCount()
    {
        $count = project::where('owner_id', Auth::id())->count();
        return response()->json(['userProjects' => $count]);
    }

    /**
     * Get the number of stakeholders for each project.
     * This assumes that there is a relationship defined in the Project model to get its stakeholders.
     *
     * @return Response
     */
    public function stakeholdersCount()
    {
        $projects = project::withCount('stakeholders')->get();
        return response()->json(['projects' => $projects]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'projectname' => 'required|max:255',
            'fund' => 'required|numeric',
            'deadline' => 'required|date',
            'needworker' => 'required|boolean',
        ]);

        $project = project::find($id);

        if (!$project) {
            return response()->json(['message' => 'Project not found'], 404);
        }

        // Ensure the user is the owner of the project
        if ($project->owner_id != Auth::id()) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $project->name = $request->projectame;
        $project->fund_needed = $request->fund;
        $project->deadline = $request->deadline;
        $project->status = $request->needworker;

        $project->save();

        return response()->json(['message' => 'Project updated successfully!', 'project' => $project]);
    }

    public function delete($id)
    {
        $project = project::find($id);

        if (!$project) {
            return response()->json(['message' => 'Project not found'], 404);
        }

        // Ensure the user is the owner of the project
        if ($project->owner_id != Auth::id()) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $project->delete();

        return response()->json(['message' => 'Project deleted successfully']);
    }
}
