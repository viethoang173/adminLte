<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Models\project_status;
use App\Models\projects;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(){
        $listProject = projects::all()->where('active','=','1');
        $listStatus = project_status::all();
        return view('Admin.project.index', compact('listProject','listStatus'));
    }

    public function pageDetail(){
        return view('Admin.project.project-detail');
    }

    public function pageAdd(){
        return view('Admin.project.project-add', ['status' => project_status::all()]);
    }

    public function Add(Request $request){
        $project = new projects();
        $project->name = $request -> input('inputName');
        $project->description = $request -> input('inputDescription');
        $project->status_id = $request -> input('inputStatus');
        $project->client_company = $request -> input('inputClientCompany');
        $project->leader = $request -> input('inputProjectLeader');
        $project->save();

        return redirect('/admin/project');
    }

    public function pageEdit($id){
        $projects = projects::findOrFail($id);
        $listStatus = project_status::all();
        return view('Admin.project.project-edit',compact('projects','listStatus'));
    }

    public function Edit(Request $request, $id){
        $projects = projects::find($id);
        $projects->name = $request->inputName;
        $projects->description = $request->inputDescription;
        $projects->status_id = $request->inputStatus;
        $projects->client_company = $request->inputClientCompany;
        $projects->leader = $request->inputProjectLeader;
        $projects->save();

        return redirect('/admin/project');
    }

    public function Delete(Request $request, $active){
        $projects = projects::find($active);
        $projects->active = $request->get('active','0');
        $projects->save();
        return redirect('/admin/project');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $info = projects::select("name", "description", "client_company", "leader")
            ->where(function ($q) use ($search) {
                $q->orWhere('name', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%")
                    ->orWhere('client_company', 'like', "%{$search}%")
                    ->orWhere('leader', 'like', "%{$search}%");
            })
            ->get();
        return view('Admin.project.index')->with('info');
    }
}
