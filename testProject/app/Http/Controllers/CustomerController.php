<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Carbon;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::paginate(5);
        return view('admin.crud.customers', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'logo' => 'required|mimes:jpg,jpeg,png',
            'name' => 'required|string|max:50',
            'description' => 'required|max:255',
        ]);

        $customer_image = $request->file('logo');
        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($customer_image->getClientOriginalExtension());
        $img_name = $name_gen . '.' . $img_ext;
        $up_location = 'image/customers/';
        $last_img = $up_location . $img_name;
        $customer_image->move($up_location, $img_name);

        Customer::insert([
            'customers_logo' => $last_img,
            'customers_name' => $request->name,
            'customers_description' => $request->description,
            'created_at' => Carbon::now(),
        ]);


        return redirect()->back()->with('success', 'Customer created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::find($id);
        $customers = Customer::paginate(5);
        return view('admin.crud.customers', compact('customer', 'customers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'logo' => 'required|mimes:jpg,jpeg,png',
            'name' => 'required|string|max:50',
            'description' => 'required|max:255',
        ]);

        // Procesează imaginea
        $customer_image = $request->file('logo');
        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($customer_image->getClientOriginalExtension());
        $img_name = $name_gen . '.' . $img_ext;
        $up_location = 'image/customers/';
        $last_img = $up_location . $img_name;
        $customer_image->move($up_location, $img_name);

        // Găsește și actualizează modelul
        $customer = Customer::findOrFail($id); // Folosește findOrFail pentru debugging mai bun
        $customer->update([
            'customers_logo' => $last_img,
            'customers_name' => $request->name,
            'customers_description' => $request->description,
            'updated_at' => Carbon::now()
        ]);

        return redirect()->back()->with('success', 'Customer updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::find($id);
        $customer->delete();
        return redirect()->route('customers.list')->with('success', 'Customer deleted successfully!');
    }
}
