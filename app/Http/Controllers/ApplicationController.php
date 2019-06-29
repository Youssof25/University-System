<?php

namespace App\Http\Controllers;
use App\Application;
use App\Course;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{

    public function index()
    {
        $applications = Application::where('user_id', auth()->user()->id)->get();

        return view('application.index',compact('applications'));
    }

    public function create()
    {
        return view('application.create');
    }
    public function store(Request $request)
    {
        $application = new Application();
        $data = $this->validate($request, [
            'first_name'=>'required',
            'last_name'=> 'required',
            'email'=> 'required',
            'phone_number'=> 'required'
        ]);

        $application->saveApplication($data);
        return redirect('/home')->with('success', 'New Application has been created, please wait for the next step!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $application= Application::where('user_id', auth()->user()->id)
            ->where('id', $id)
            ->first();

        return view('application.edit', compact('application', 'id'));
    }

    public function update(Request $request, $id)
    {
        $application = new Application();
        $data = $this->validate($request, [
            'phone_number'=> 'required',
            'email'=> 'required',
            'last_name'=> 'required',
            'first_name'=>'required'
        ]);
        $data['id'] = $id;
        $application->updateApplication($data);

        return redirect('/home')->with('success', 'New support application has been updated!!');
    }

    public function destroy($id)
    {
        $application = Application::find($id);
        $application->delete();

        return redirect('/home')->with('success', 'Application has been deleted!!');
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
