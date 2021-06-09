<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest\DiscountRequest;
use App\Models\Discount;
use App\Models\product;
use Illuminate\Http\Request;

class DiscountController extends Controller
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
     * @param product $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create(Product $product)
    {
        return view('admin.discounts.create', [
            'product' => $product,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param product $product
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(Product $product, DiscountRequest $request)
    {
        $product->addDiscount($request);
        return redirect(route('product.create'));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Discount $discount
     * @return \Illuminate\Http\Response
     */
    public function show(Discount $discount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param product $product
     * @param \App\Models\Discount $discount
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Product $product,Discount $discount)
    {
        return view('admin.discounts.edit',[
           'product' => $product,
           'discount' => $discount,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param product $product
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function update(Product $product,DiscountRequest $request)
    {
        $product->updateDiscount($request);
        return redirect(route('product.create'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param product $product
     * @param \App\Models\Discount $discount
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function destroy(Product $product, Discount $discount)
    {
        $product->deleteDiscount($discount);
        return redirect(route('product.create'));
    }
}
