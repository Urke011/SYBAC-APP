<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Inquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Ramsey\Uuid\Uuid;
use Symfony\Component\HttpKernel\Exception\HttpException;

class InquiryController extends Controller
{
    /**
     * Create the controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->authorizeResource(Inquiry::class, 'inquiry');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inquiries = Inquiry::all()->sortByDesc('updated_at');
        $inquiries->load('customer');

        return view('pages.inquiries.index', [
            'inquiries' => $inquiries
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = Customer::all();

        return view('pages.inquiries.create', [
            'customers' => $customers
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
        $inquiry = new Inquiry();

        $inquiry->id = Uuid::uuid4();
        $inquiry->purpose = $request->input('purpose') ?? null;
        $inquiry->location = $request->input('location') ?? null;
        $inquiry->length = $request->input('length') ?? null;
        $inquiry->width = $request->input('width') ?? null;
        $inquiry->eaves_height = $request->input('eaves_height') ?? null;
        $inquiry->snowload = $request->input('snowload') ?? null;
        $inquiry->craneload = $request->input('craneload') ?? null;
        $inquiry->hookheight = $request->input('hookheight') ?? null;
        $inquiry->notes = $request->input('notes') ?? null;

        $customer = Customer::findOrFail($request->input('customer_id'));
        $inquiry->customer()->associate($customer);

        $saved = $inquiry->save();

        if (!$saved) throw new HttpException('inquiry-not-saved', 500);


        return redirect()->route('inquiries.show', [
            'id' => $inquiry->id
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
        $inquiry = Inquiry::findOrFail($id);
        $inquiry->load('customer');
        $inquiry->load(['calculations' => function ($query) {
            $query->orderBy('updated_at', 'desc');
        }]);

        return view('pages.inquiries.show', [
            'inquiry' => $inquiry
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
        $inquiry = Inquiry::findOrFail($id);
        $inquiry->load('customer');

        $customers = Customer::all();

        return view('pages.inquiries.edit', [
            'inquiry' => $inquiry,
            'customers' => $customers
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, string $id)
    {
        $inquiry = Inquiry::findOrFail($id);

        $inquiry->purpose = $request->input('purpose') ?? null;
        $inquiry->location = $request->input('location') ?? null;
        $inquiry->length = $request->input('length') ?? null;
        $inquiry->width = $request->input('width') ?? null;
        $inquiry->eaves_height = $request->input('eaves_height') ?? null;
        $inquiry->snowload = $request->input('snowload') ?? null;
        $inquiry->craneload = $request->input('craneload') ?? null;
        $inquiry->hookheight = $request->input('hookheight') ?? null;
        $inquiry->notes = $request->input('notes') ?? null;

        if ($inquiry->customer_id != $request->input('customer_id')) {
            $customer = Customer::findOrFail($request->input('customer_id'));
            $inquiry->customer()->dissociate();
            $inquiry->customer()->associate($customer);
        }


        $saved = $inquiry->save();

        if (!$saved) throw new HttpException('inquiry-update-not-saved', 500);


        return redirect()->route('inquiries.show', [
            'id' => $inquiry->id
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
        $inquiry = Inquiry::findOrFail($id);

        if (!$inquiry) throw new HttpException('inquiry-not-found', 400);

        $softDelete = $inquiry->delete();

        if (!$softDelete) throw new HttpException('inquiry-not-deleted', 500);

        return redirect()->route('inquiries.index');
    }
}
