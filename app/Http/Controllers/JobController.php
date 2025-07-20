<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
public function index()
{
    $jobs = \App\Models\Job::all();
    return view('admin.jobs.index', compact('jobs'));
}

    public function create()
    {
        return view('admin.jobs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'company_name' => 'required',
            'position' => 'required',
            'location' => 'required',
            'job_description' => 'required',
            'qualification' => 'required',
            'expiration_date' => 'required|date',
            'contact' => 'required',
            'salary' => 'required',
            'job_type' => 'required',
        ]);

        Job::create($request->all());

        return redirect()->route('jobs.index')->with('success', 'Lowongan berhasil ditambahkan');
    }

    public function edit(Job $job)
    {
        return view('admin.jobs.edit', compact('job'));
    }

    public function update(Request $request, Job $job)
    {
        $job->update($request->all());
        return redirect()->route('jobs.index')->with('success', 'Lowongan diperbarui');
    }

    public function destroy(Job $job)
    {
        $job->delete();
        return redirect()->route('jobs.index')->with('success', 'Lowongan dihapus');
    }
}
