<?php

use App\Models\Job;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/jobs', function () {
    // $jobs = Job::with('employer')->paginate(4); // default pagination
    // $jobs = Job::with('employer')->simplePaginate(4); // more performant than the default pagination
    $jobs = Job::with('employer')->cursorPaginate(4); // ideal for infinite scrolling or large datasets

    return view('jobs', ['jobs' => $jobs]);
});

Route::get('/jobs/{id}', function ($id) {
    return view('job', ['job' => Job::find($id)]);
});

Route::get('/contact', function () {
    return view('contact');
});
