<?php

namespace App\Http\Controllers;

use App\Mail\JobPosted;
use App\Models\Job;
use Illuminate\Support\Facades\Mail;

class JobController extends Controller
{
    public function index()
    {
        // $jobs = Job::with('employer')->paginate(4); // default pagination
        // $jobs = Job::with('employer')->simplePaginate(4); // more performant than the default pagination
        $jobs = Job::with('employer')->orderBy('created_at', 'desc')->orderBy('id', 'desc')->cursorPaginate(4); // ideal for infinite scrolling or large datasets

        return view('jobs.index', ['jobs' => $jobs]);
    }

    public function create()
    {
        return view('jobs.create');
    }

    public function store()
    {
        request(null)->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required', 'min:4'],
        ]);

        $job = Job::create([
            'title' => request('title'),
            'salary' => request('salary'),
            'employer_id' => 1,
        ]);

        Mail::to($job->employer->user)->send(
            new JobPosted($job)
        );

        return redirect('/jobs');
    }

    public function show(Job $job)
    {
        return view('jobs.show', ['job' => $job]);
    }

    public function edit(Job $job)
    {
        return view('jobs.edit', ['job' => $job]);
    }

    public function update(Job $job)
    {
        request(null)->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required', 'min:4'],
        ]);

        $job->update([
            'title' => request('title'),
            'salary' => request('salary'),
        ]);

        return redirect('/jobs/'.$job->id);
    }

    public function destroy(Job $job)
    {
        $job->delete();

        return redirect('/jobs');
    }
}
