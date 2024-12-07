<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::paginate(10);
        return view('companies.index', compact('companies'));
    }

    public function create()
    {
        return view('companies.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'company_name' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'address' => 'required|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('logo')) {
            $validated['logo'] = $request->file('logo')->store('uploads/logos', 'public');
        }
        

        Company::create($validated);

        return redirect()->route('companies.index')->with('success', 'Company created successfully!');
    }

    public function edit(Company $company)
    {
        return view('companies.edit', compact('company'));
    }

    public function update(Request $request, Company $company)
    {
        $validated = $request->validate([
            'company_name' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'address' => 'required|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('logo')) {
            if ($company->logo) {
                \Storage::delete('public/' . $company->logo);
            }
            $validated['logo'] = $request->file('logo')->store('uploads/logos', 'public');
        }

        $company->update($validated);

        return redirect()->route('companies.index')->with('success', 'Company updated successfully!');
    }

    public function destroy(Company $company)
    {
        if ($company->logo) {
            \Storage::delete('public/' . $company->logo);
        }
        $company->delete();

        return redirect()->route('companies.index')->with('success', 'Company deleted successfully!');
    }
}