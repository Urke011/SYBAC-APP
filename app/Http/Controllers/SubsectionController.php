<?php

namespace App\Http\Controllers;

use App\Models\Subsection;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;
use Symfony\Component\HttpKernel\Exception\HttpException;

class SubsectionController extends Controller
{
    /**
     * Create the controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->authorizeResource(Subsection::class, 'subsection');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subsections = Subsection::all()->sortByDesc('updated_at');

        return view('pages.subsections.index', [
            'subsections' => $subsections
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.subsections.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $subsection = new Subsection();

        $subsection->id = Uuid::uuid4();
        $subsection->code = intval($request->input('code'));
        $subsection->name = $request->input('name');
        $subsection->description = $request->input('description') ?? null;

        $saved = $subsection->save();

        if (!$saved) throw new HttpException('subsection-not-saved', 500);

        return redirect()->route('subsections.show', [
            'id' => $subsection->id
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
        $subsection = Subsection::findOrFail($id);

        return view('pages.subsections.show', [
            'subsection' => $subsection
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
        $subsection = Subsection::findOrFail($id);

        return view('pages.subsections.edit', [
            'subsection' => $subsection
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
        $subsection = Subsection::findOrFail($id);

        $subsection->code = intval($request->input('code'));
        $subsection->name = $request->input('name');
        $subsection->description = $request->input('description') ?? null;

        $saved = $subsection->save();

        if (!$saved) throw new HttpException('subsection-update-not-saved', 500);


        return redirect()->route('subsections.show', [
            'id' => $subsection->id
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
        $subsection = Subsection::findOrFail($id);

        if (!$subsection) throw new HttpException('subsection-not-found', 400);

        $softDelete = $subsection->delete();

        if (!$softDelete) throw new HttpException('subsection-not-deleted', 500);

        return redirect()->route('subsections.index');
    }
}
