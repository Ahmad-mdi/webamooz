<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\FeaturedCategory;
use Illuminate\Http\Request;

class FeaturedCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.featuredCategory.create',[
            'categories' => Category::query()->where('parent_id',null)->get(),
            'featuredCategory' => FeaturedCategory::query()->first(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validate($request,[
           'parent_id' => 'required|exists:categories,id',
        ]);
        FeaturedCategory::query()->delete();
        FeaturedCategory::query()->create([
           'category_id' => $request->get('parent_id'),
        ]);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FeaturedCategory  $featuredCategory
     * @return \Illuminate\Http\Response
     */
    public function show(FeaturedCategory $featuredCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FeaturedCategory  $featuredCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(FeaturedCategory $featuredCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FeaturedCategory  $featuredCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FeaturedCategory $featuredCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FeaturedCategory  $featuredCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(FeaturedCategory $featuredCategory)
    {
        //
    }
}
