<?php



namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
{
    
    $customers = Customer::paginate(10); 

    return view('customers.index', compact('customers'));
}


    public function create()
    {
        return view('customers.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'gstin' => 'nullable|string|max:15',
            'pancard_no' => 'nullable|string|max:10',
            'email' => 'required|email|unique:customers',
            'mobile_no' => 'required|digits:10|unique:customers',
            'address' => 'nullable|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'pincode' => 'required|string|max:6',
            'contact_person' => 'nullable|string|max:255',
            'status' => 'required|in:active,inactive',
        ]);

        Customer::create($validated);
        return redirect()->route('customers.index')->with('success', 'Customer created successfully!');
    }

    public function show(Customer $customer)
    {
        return view('customers.show', compact('customer'));
    }

    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    public function update(Request $request, Customer $customer)
    {
        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'gstin' => 'nullable|string|max:15',
            'pancard_no' => 'nullable|string|max:10',
            'email' => 'required|email|unique:customers,email,' . $customer->id,
            'mobile_no' => 'required|digits:10|unique:customers,mobile_no,' . $customer->id,
            'address' => 'nullable|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'pincode' => 'required|string|max:6',
            'contact_person' => 'nullable|string|max:255',
            'status' => 'required|in:active,inactive',
        ]);

        $customer->update($validated);
        return redirect()->route('customers.index')->with('success', 'Customer updated successfully!');
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('customers.index')->with('success', 'Customer deleted successfully!');
    }
}
