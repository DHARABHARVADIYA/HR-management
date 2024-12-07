<?php

namespace App\Http\Controllers;

use App\Models\JobPosting;
use App\Models\Department;
use Illuminate\Http\Request;

class JobPostingController extends Controller
{
    public function index()
    {
        $jobPostings = JobPosting::with('department')->get();
        return view('job_postings.index', compact('jobPostings'));
    }

    public function create()
    {
        $departments = Department::all();
        return view('job_postings.create', compact('departments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'department_id' => 'required|exists:departments,id',
            'location' => 'required|string|max:255',
            'employment_type' => 'required|string|max:255',
            'salary_range' => 'nullable|string|max:255',
            'skills_required' => 'required|string',
            'experience_required' => 'required|integer',
            'posted_date' => 'required|date',
            'application_deadline' => 'required|date',
            'status' => 'required|string',
        ]);

        JobPosting::create($request->all());

        return redirect()->route('job_postings.index')->with('success', 'Job posting created successfully!');
    }

    public function edit(JobPosting $jobPosting)
    {
        $departments = Department::all();
        return view('job_postings.edit', compact('jobPosting', 'departments'));
    }

    public function update(Request $request, JobPosting $jobPosting)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'department_id' => 'required|exists:departments,id',
            'location' => 'required|string|max:255',
            'employment_type' => 'required|string|max:255',
            'salary_range' => 'nullable|string|max:255',
            'skills_required' => 'required|string',
            'experience_required' => 'required|integer',
            'posted_date' => 'required|date',
            'application_deadline' => 'required|date',
            'status' => 'required|string',
        ]);

        $jobPosting->update($request->all());

        return redirect()->route('job_postings.index')->with('success', 'Job posting updated successfully!');
    }

    public function destroy(JobPosting $jobPosting)
    {
        $jobPosting->delete();

        return redirect()->route('job_postings.index')->with('success', 'Job posting deleted successfully!');
    }
    public function show(JobPosting $jobPosting)
    {
        // Load department data with the job posting
        $jobPosting->load('department');

        return view('job_postings.show', compact('jobPosting'));
    }
}
