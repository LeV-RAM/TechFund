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
        // dd($projectdata);
        
        return view('funding', [
            'people' => $data, 
            'project' => $projectdata
        ]);
    }

    public function hireSupp(Request $request, $id)
    {
        $data = Auth::user();
        $projectdata = Project::findOrFail($id);
        return view('hiring', [
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
        $data = Auth::user()->fresh();
        $investor = stakeholder::where('stakeholderID', $data->peopleID)->pluck('projectID');
        $invest = Project::whereIn('projectID', $investor)->get();
        
        return view('profilepage', [
            'people'=> $data, 
            'projects' => project::where('ownerID', $data->peopleID)->simplePaginate(4),
            'projectsSupp' => $invest,
        ]);
    }

    public function edit()
    {
        return view('editprofile', ['people' => Auth::user()]);
    }

    // Handle the profile update
    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'password' => 'required',
            'address' => 'required',
            'phoneNumber' => 'required|numeric|digits:12',
        ]);

        $people = Auth::user();
        $people->update([
            'name' => $request->name,
            'address' => $request->address,
            'phoneNumber' => $request->phoneNumber,
        ]);
        

        if ($request->password) {
            $people->update(['password' => Hash::make($request->password)]);
        }

        session([
            'people.name' => $people->name,
            'people.age' => $people->age,
            'people.email' => $people->email,
            'password' => $people->password,
            'people.address' => $people->address,
            'people.dob' => $people->dob,
            'people.phone number' => $request->phoneNumber,
            
        ]);

        return redirect('/profilepage')->with('success', 'Profile updated successfully.');
    }

    public function index()
    {
        $projects = project::where('fund', '>', 0)->simplePaginate(8);
        return view('home', [
            'title' => 'Project List',
            'projects' => $projects
        ]);
    }

    public function viewProject($id)
    {
        $data = Auth::user();
        return view('visit', [
            'title' => 'Project Details',
            'project' => project::findOrFail($id),
            'people' => $data
        ]);
    }

    public function delete($id)
    {
        $project = project::find($id);

        if (!$project) {
            return redirect('/home')->with('error', 'Project not found');
        }

        // if ($project->owner_id != Auth::id()) {
        //     return response()->json(['message' => 'Unauthorized'], 403);
        // }

        $project->delete();

        return redirect('/home')->with('success', 'Project deleted successfully');
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

    public function authcheck(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if(Auth::attempt($credentials)){
            $people = Auth::user();
            $request->session()->put('people', $people);
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

