<?php

namespace App\Http\Controllers\Panel\Admin\Shop;

use App\Http\Controllers\Controller;
use App\Models\Attributegroup;
use Illuminate\Http\Request;

class AttributegroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attributegroups = Attributegroup::with('categoryshop')->get();
        return View('panel.admin.attributegroup.index', compact('attributegroups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('panel.admin.attributegroup.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributegroup = Attributegroup::create([
            'name' => $request->name,
            'categoryshop_id' => $request->categoryshop_id,
        ]);
        if($attributegroup){
//todo refactor and validate and ...
            session()->flash('status', 'attributegroup create');
            return redirect()->route('admin.attributegroup.index');
        }
        return back(); //todo for work  !!!
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Attributegroup  $attributegroup
     * @return \Illuminate\Http\Response
     */
    public function show(Attributegroup $attributegroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Attributegroup  $attributegroup
     * @return \Illuminate\Http\Response
     */
    public function edit(Attributegroup $attributegroup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Attributegroup  $attributegroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attributegroup $attributegroup)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attributegroup  $attributegroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attributegroup $attributegroup)
    {
        //
    }
}
