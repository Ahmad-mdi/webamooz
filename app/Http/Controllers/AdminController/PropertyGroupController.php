<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest\PropertyGroupRequest;
use App\Models\PropertyGroup;
use Illuminate\Http\Request;

class PropertyGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): \Illuminate\Http\Response
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
        return view('admin.propertyGroup.index',[
           'propertyGroup' => PropertyGroup::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PropertyGroupRequest $request): \Illuminate\Http\RedirectResponse
    {
        PropertyGroup::query()->create([
           'title' => $request->get('title'),
        ]);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PropertyGroup  $propertyGroup
     * @return \Illuminate\Http\Response
     */
    public function show(PropertyGroup $propertyGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param PropertyGroup $propertyGroup
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(PropertyGroup $propertyGroup)
    {
        return view('admin.propertyGroup.edit',[
           'propertyGroup' => $propertyGroup,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param PropertyGroup $propertyGroup
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, PropertyGroup $propertyGroup)
    {
        $propertyGroup->update([
           'title' => $request->get('title',$propertyGroup->title),
        ]);
        return redirect(route('propertyGroup.create'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PropertyGroup  $propertyGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(PropertyGroup $propertyGroup): \Illuminate\Http\Response
    {
        //
    }
}
