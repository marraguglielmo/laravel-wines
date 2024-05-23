<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wine;
use App\Http\Requests\WineRequest;
use App\Functions\Helper;
class WinesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $wines = Wine::paginate(20);
        return view('wines.index', compact('wines'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('wines.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(WineRequest $request)
    {
        $form_data = $request->all();

        $new_wine = new Wine();

        $form_data['slug'] = Helper::generateSlug($form_data['name'], new Wine());
        $new_wine->fill($form_data);
        $new_wine->save();

        return redirect()->route('wines.show', $new_wine);

    }

    /**
     * Display the specified resource.
     */
    public function show(Wine $wine)
    {

        return view('wines.show', compact('wine'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Wine $wine)
    {
        return view('wines.edit', compact('wine'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(WineRequest $request, Wine $wine)
    {
        $form_data = $request->all();

        if($form_data['name'] === $wine->name){
            $form_data['slug'] = $wine->slug;
        }else{
            $form_data['slug'] = Helper::generateSlug($form_data['name'], new Wine());
        }

        $wine->update($form_data);

        return redirect()->route('wines.show', $wine);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Wine $wine)
    {
        $wine->delete();
        return redirect()->route('wines.index')->with('deleted', 'Wine ' . $wine->name . ' was successfully deleted');
    }
}
