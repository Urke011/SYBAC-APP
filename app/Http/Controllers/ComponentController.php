<?php

namespace App\Http\Controllers;

use App\Models\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Ramsey\Uuid\Uuid;
use Symfony\Component\HttpKernel\Exception\HttpException;

class ComponentController extends Controller
{

    /**
     * Create the controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->authorizeResource(Component::class, 'component');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $components = Component::all()->sortByDesc('updated_at');

        return view('pages.components.index', [
            'components' => $components
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.components.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $component = new Component();


        $component->id = Uuid::uuid4();
        $component->name = $request->input('name');
        $component->description = $request->input('description') ?? null;
        $component->color = $request->input('color') ?? null;
        $component->is_iso = $request->input('is_iso') && $request->input('is_iso') === 'true' ? true : false ?? null;
        $component->grid = $request->input('grid') ?? null;
        $component->width = $request->input('width') ?? null;
        $component->height = $request->input('height') ?? null;
        $component->length = $request->input('length') ?? null;
        $component->weight = $request->input('weight') ?? null;
        $component->area = $request->input('area') ?? null;
        $component->price_mount = $request->input('price_mount') ?? null;
        $component->price_per_unit =  $request->input('price_per_unit');

        $saved = $component->save();

        if (!$saved) throw new HttpException('component-not-saved', 500);

        return redirect()->route('components.show', [
            'id' => $component->id
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
        $component = Component::findOrFail($id);

        return view('pages.components.show', [
            // Note: components as variable not working in blade views
            'data' => $component
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
        $component = Component::findOrFail($id);



        return view('pages.components.edit', [
            // Note: components as variable not working in blade views
            'data' => $component
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
        $component = Component::findOrFail($id);

        $component->name = $request->input('name');
        $component->description = $request->input('description') ?? null;
        $component->color = $request->input('color') ?? null;
        $component->is_iso = $request->input('is_iso') && $request->input('is_iso') === 'true' ? true : false ?? null;
        $component->grid = $request->input('grid') ?? null;
        $component->width = $request->input('width') ?? null;
        $component->height = $request->input('height') ?? null;
        $component->length = $request->input('length') ?? null;
        $component->weight = $request->input('weight') ?? null;
        $component->area = $request->input('area') ?? null;
        $component->price_mount = $request->input('price_mount') ?? null;
        $component->price_per_unit = $request->input('price_per_unit');

        $saved = $component->save();

        if (!$saved) throw new HttpException('component-update-not-saved', 500);


        return redirect()->route('components.show', [
            'id' => $component->id
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
        $component = Component::findOrFail($id);

        if (!$component) throw new HttpException('component-not-found', 400);

        $softDelete = $component->delete();

        if (!$softDelete) throw new HttpException('component-not-deleted', 500);

        return redirect()->route('components.index');
    }

    private function calculatePriceValue($value)
    {
        return $value;
    }
}
