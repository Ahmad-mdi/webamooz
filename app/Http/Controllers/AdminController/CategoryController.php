<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest\CategoryCreateRequest;
use App\Http\Requests\AdminRequest\CategoryUpdateRequest;
use App\Models\Category;
use App\Models\PropertyGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CategoryController extends Controller
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
        /*if (Gate::denies('create-category')) {
            abort(403);
        }*/
        /*$categories = Category::query()->paginate(6); //for categoryList
        $selectCategory = Category::all(); //for selectCategory*/
        return view('admin.categories.index', [
            'categories' => Category::query()->paginate(6),
            'selectCategory' => Category::all(),
            'propertyGroup' => PropertyGroup::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CategoryCreateRequest $request)
    {
        $category = Category::query()->create([
            'parent_id' => $request->get('parent_id'),
            'title_fa' => $request->get('title_fa'),
            'title_en' => $request->get('title_en'),
        ]);
        $category->propertyGroups()->attach($request->get('propertyGroups'));
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $category
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        /*$categories = Category::all();*/
        return view('admin.categories.edit',[
            'categories' => Category::all(),
            'category' => $category,
            'propertyGroup' => PropertyGroup::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Category $category
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function update(CategoryUpdateRequest $request, Category $category)
    {
        //title_fa:
        $categoryFaUnique = Category::query()
            ->where('title_fa', $request->get('title_fa'))
            ->where('id', '!=', $category->id)
            ->exists();

        if ($categoryFaUnique) {
            return back()->withErrors(['عنوان فارسی دسته بندی تکراری است!']);
        }
        $category->update([
            'parent_id' => $request->get('parent_id'),
            'title_fa' => $request->get('title_fa'),
            'title_en' => $request->get('title_en'),
        ]);
        $category->propertyGroups()->sync($request->get('propertyGroups'));
        return redirect(route('category.create'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Category $category)
    {
        $category->propertyGroups()->detach();
        $category->delete();
        return back();
    }
}
