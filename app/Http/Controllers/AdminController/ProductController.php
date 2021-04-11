<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest\ProductCreateRequest;
use App\Http\Requests\AdminRequest\ProductUpdateRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\product;
use Illuminate\Http\Request;
use function GuzzleHttp\Psr7\str;

class ProductController extends Controller
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
        return view('admin.products.index', [
//            'products' => product::withTrashed()->get(),
            'products' => product::all(),
            'categories' => Category::all(),
            'brands' => Brand::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(ProductCreateRequest $request)
    {
        $path = $request->file('image')->storeAs(
            'public/image-products', $request->file('image')->getClientOriginalName()
        );

        product::query()->create([
            'name' => $request->get('name'),
            'slug' => $request->get('slug'),
            'price' => $request->get('price'),
            'description' => $request->get('description'),
            'category_id' => $request->get('category_id'),
            'brand_id' => $request->get('brand_id'),
            'image' => $path,
        ]);

        return redirect(route('product.create'));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\product $product
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\product $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(product $product)
    {
        return view('admin.products.edit', [
            'product' => $product,
            'categories' => Category::all(),
            'brands' => Brand::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\product $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function update(ProductUpdateRequest $request, product $product)
    {
        $path = $product->image;

        if ($request->hasFile('image')) {
            unlink(str_replace('public', 'storage', $product->image));
            $path = $request->file('image')->storeAs(
                'public/image-products', $request->file('image')->getClientOriginalName()
            );
        }

        $slugUnique = product::query()
            ->where('slug', $request->get('slug'))
            ->where('id', '!=', $product->id)
            ->exists();

        if ($slugUnique) {
            return back()->withErrors(['اسلاگ انتخابی تکراری است!']);
        }

        $product->update([
            'name' => $request->get('name'),
            'slug' => $request->get('slug'),
            'price' => $request->get('price'),
            'description' => $request->get('description'),
            'category_id' => $request->get('category_id'),
            'brand_id' => $request->get('brand_id'),
            'image' => $path,
        ]);
        return redirect(route('product.create'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\product $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(product $product)
    {
        unlink(str_replace('public', 'storage', $product->image));
        $product->delete();
        return back();
    }
}
