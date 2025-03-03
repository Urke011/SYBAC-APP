<?php

namespace App\Http\Controllers;

use App\Constants\Countries;
use Illuminate\Http\Request;
use App\Models\Customer;
use Ramsey\Uuid\Uuid;
use Symfony\Component\HttpKernel\Exception\HttpException;

class CustomerController extends Controller
{
    /**
     * Create the controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->authorizeResource(Customer::class, 'customer');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all()->sortByDesc('updated_at');

        return view('pages.customers.index', [
            'customers' => $customers
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.customers.create', [
            'countries' => $this->getCountries()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $customer = new Customer();

        $customer->id =  Uuid::uuid4();
        $customer->company_name = $request->input('company_name');
        $customer->street = $request->input('street');
        $customer->zip = $request->input('zip');
        $customer->city = $request->input('city');
        $customer->country = $request->input('country');
        $customer->email = $request->input('email');
        $customer->contact_name = $request->input('contact_name');
        $customer->contact_email = $request->input('contact_email');
        $customer->contact_phone = $request->input('contact_phone');

        $customer->save();

        return redirect()->route('customers.show', [
            'id' => $customer->id
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $customer = Customer::findOrFail($id);
        $customer->load(['inquiries' => function ($query) {
            $query->orderBy('created_at', 'desc');
        }]);

        return view('pages.customers.show', [
            'customer' => $customer
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(string $id)
    {
        $customer = Customer::findOrFail($id);

        return view('pages.customers.edit', [
            'customer' => $customer,
            'countries' => $this->getCountries()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, string $id)
    {
        // POST/PUT
        $customer = Customer::findOrFail($id);

        $customer->company_name = $request->input('company_name');
        $customer->street = $request->input('street');
        $customer->zip = $request->input('zip');
        $customer->city = $request->input('city');
        $customer->country = $request->input('country');
        $customer->email = $request->input('email');
        $customer->contact_name = $request->input('contact_name');
        $customer->contact_email = $request->input('contact_email');
        $customer->contact_phone = $request->input('contact_phone');

        $customer->save();

        return redirect()->route('customers.show', [
            'id' => $id
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $id)
    {
        $customer = Customer::findOrFail($id);

        if (!$customer) throw new HttpException('customer-not-found', 400);

        $softDelete = $customer->delete();

        if (!$softDelete) throw new HttpException('customer-not-deleted', 500);

        return redirect()->route('customers.index');
    }

    private function getCountries()
    {
        return collect(Countries::getAll())->pluck('value', 'key');
    }
}
