<?php

namespace App\Http\Controllers;

use App\Models\Calculation;
use App\Models\Inquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Ramsey\Uuid\Uuid;
use Symfony\Component\HttpKernel\Exception\HttpException;

class CalculationController extends Controller
{
    /**
     * Create the controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->authorizeResource(Calculation::class, 'calculation');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $calculations = Calculation::all()->sortByDesc('updated_at');
        $calculations->load('inquiry');

        return view('pages.calculations.index', [
            'calculations' => $calculations
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $inquiries = Inquiry::all();

        if ($request->has('inquiry_id')) {
            $selectedInquiry = Inquiry::findOrFail($request->input('inquiry_id'));
        } else {
            $selectedInquiry = null;
        }

        return view('pages.calculations.create', [
            'inquiries' => $inquiries,
            'selectedInquiry' => $selectedInquiry
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
        $calculation = new Calculation();

        $calculation->id = Uuid::uuid4();
        $calculation->purpose = $request->input('purpose') ?? null;
        $calculation->location = $request->input('location') ?? null;
        $calculation->length = $request->input('length') ?? null;
        $calculation->width = $request->input('width') ?? null;
        $calculation->raster = $request->input('raster') ?? null;
        $calculation->eaves_height = $request->input('eaves_height') ?? null;
        $calculation->notes = $request->input('notes') ?? null;


        $inquiry = Inquiry::findOrFail($request->input('inquiry_id'));
        $calculation->inquiry()->associate($inquiry);

        $saved = $calculation->save();


        if (!$saved) throw new HttpException('calculation-not-saved', 500);


        return redirect()->route('calculations.show', [
            'id' => $calculation->id
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
        $calculation = Calculation::findOrFail($id);
        $calculation->load('inquiry');

        return view('pages.calculations.show', [
            'calculation' => $calculation
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $calculation = Calculation::findOrFail($id);
        $calculation->load('inquiry');

        $inquiries = Inquiry::all();

        return view('pages.calculations.edit', [
            'calculation' => $calculation,
            'inquiries' => $inquiries
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
        $calculation = Calculation::findOrFail($id);

        $calculation->purpose = $request->input('purpose') ?? null;
        $calculation->location = $request->input('location') ?? null;
        $calculation->length = $request->input('length') ?? null;
        $calculation->width = $request->input('width') ?? null;
        $calculation->raster = $request->input('raster') ?? null;
        $calculation->eaves_height = $request->input('eaves_height') ?? null;
        $calculation->notes = $request->input('notes') ?? null;


        $saved = $calculation->save();

        if (!$saved) throw new HttpException('calculation-update-not-saved', 500);


        return redirect()->route('calculations.show', [
            'id' => $calculation->id
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
        //
    }
}
