<?php

namespace App\Http\Controllers\Panel\Admin\Shop;

use App\Http\Controllers\Controller;
use App\Models\Categoryshop;
use Illuminate\Http\Request;
use App\Http\Requests\Panel\Categoryshop\CategoryshopCreateRequest;
use  App\Http\Requests\Panel\Categoryshop\CategoryshopUpdateRequest;

class CategoryshopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoryshops = Categoryshop::with('parent')->paginate();
        $parentCategoryshops = Categoryshop::where('parent_id', null)->get();

        return view('panel.categoryshops.index', compact('categoryshops', 'parentCategoryshops'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryshopCreateRequest $request)
    {
        Categoryshop::create($request->validated());
        session()->flash('status', 'دسته بندی مد نظر به درستی ایجاد شد!');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categoryshop  $categoryshop
     * @return \Illuminate\Http\Response
     */
    public function show(Categoryshop $categoryshop)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categoryshop  $categoryshop
     * @return \Illuminate\Http\Response
     */
    public function edit(Categoryshop $categoryshop)
    {
        $parentCategoryshops = Categoryshop::where('parent_id', null)->where('id', '!=', $categoryshop->id)->get();

        return view('panel.categoryshops.edit', compact('categoryshop', 'parentCategoryshops'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categoryshop  $categoryshop
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryshopUpdateRequest $request, Categoryshop $categoryshop)
    {
        $categoryshop->update(
            $request->validated()
        );

        session()->flash('status', 'دسته بندی به درستی اپدیت شد!');

        return redirect()->route('categoryshop.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categoryshop  $categoryshop
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categoryshop $categoryshop)
    {
        $categoryshop->delete();

        session()->flash('status', 'دسته بندی حذف شد!');

        return back();
    //todo not delete parent  on  childern is exist
    }
}
