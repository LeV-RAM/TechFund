<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\project;
use App\Models\people; 
use App\Models\stakeholder;
use Illuminate\Support\Facades\DB; 


class ProjectController extends Controller
{
    /**
     * Create a new project instance.
     *
     * @param  Request  $request
     * @return Response
     */

    public function viewNewProject(Request $request)
    {
        $data = $request->session()->get('email');
        return view('newproject', ['people', $data]);
    }

    public function fundProject(Request $request, $id)
    {
        $data = Auth::user();
        $projectdata = Project::findOrFail($id);
        return view('funding', [
            'people' => $data, 
            'project' => $projectdata
        ]);
    }

    public function afterFund(Request $request, $id, $value){

        $val = intval($value);
        $project = project::findOrFail($id);
        
        $currFund = $project->fund;


        $pplCheck = stakeholder::where('stakeholderID', Auth::user()->peopleID)->where('projectID', $project->projectID)->first();

        if($pplCheck){
            $prevAmount = $pplCheck->amount;
            $pplCheck->update(['amount' => $prevAmount + $val]);
            
        }
        else{
            $c = $project->pplCounter;
            $project->update(['pplCounter' => $c + 1]);
            stakeholder::create([
                'projectID' => $project->projectID,
                'stakeholderID' => Auth::user()->peopleID,
                'amount' => $val
            ]);
        }



        $project->update(['fund' => $currFund - $val]);

        return view('visit', [
            'title' => 'Project Details',
            'project' => $project
        ]);
    }

    public function viewProfile(Request $request)
    {
        $data = $request->session()->get('email');
        $ownerId = $request->session()->get('peopleID');
        
        return view('profilepage', [
            'people'=> $data, 
            'projects' => project::where('ownerID', $ownerId)->simplePaginate(4)
        ]);
    }

    public function supporter(Request $request, $id)
    {
        $data = Auth::user();
        $projectdata = Project::findOrFail($id);
        return view('support', [
            'people' => $data, 
            'project' => $projectdata
        ]);
    }

    public function index()
    {
        return view('home', [
            'title' => 'Project List',
            'projects' => project::simplePaginate(8)
        ]);
    }

    public function viewProject($id)
    {
        return view('visit', [
            'title' => 'Project Details',
            'project' => project::findOrFail($id)
        ]);
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

        $project->name = $request['projectname'];
        $project->fund_needed = $request['fund'];
        $project->deadline = $request['deadline'];
        $project->status = $request['needworker'];

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

    public function create(Request $request)
    {
        $request->validate([
            'projectname' => 'required|max:255',
            'fund' => 'required|numeric',
            'deadline' => 'required|date',
            'needworker' => 'required|boolean',
        ]);

        $ownerId = Auth::id();

        project::create([
            'ownerID' => $ownerId,
            'projectname' => $request->projectname,
            'fund' => $request->fund,
            'pplCounter' => 0,
            'deadline' => $request->deadline,
            'needworker' => $request->needworker,
        ]);
        

        return redirect('/home');
    }

    //ini bawah tinggal copas
    public function addUser(Request $request){

        $request->validate([
            'name' => 'required',
            'age' => 'required',
            'email' => 'required|unique:people,email',
            'password' => 'required',
            'address' => 'required',
            'dob' => 'required',
            'phoneNumber' => 'required|numeric|digits:12',
            
        ]);
        people::create([
            'name' => $request['name'],
            'age' => $request['age'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'address' => $request['address'],
            'date of birth' => $request['dob'],
            'phone number' => $request['phoneNumber']
        ]);
        return redirect('/');
    }

    //authentication

    public function authcheck(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if(Auth::attempt($credentials)){
            $people = Auth::user();
            $request->session()->put('people', $people); // Store user object or necessary user data
            return redirect()->intended('/home');
            
        }
        
        

        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }

    public function terminateSession(Request $request){
        $request->session()->flush();
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}

