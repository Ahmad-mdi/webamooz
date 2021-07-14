<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest\OfferRequest;
use App\Models\Offer;
use Hekmatinasser\Verta\Facades\Verta;
use Illuminate\Http\Request;

class OfferController extends Controller
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
        return view('admin.offers.index',[
           'offers' => Offer::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(OfferRequest $request)
    {
        Offer::query()->create([
           'code' => $request->get('code'),
           'start_at' => Offer::start_at($request),
           'end_at' => Offer::end_at($request),
        ]);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function show(Offer $offer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Offer $offer)
    {
        return view('admin.offers.edit',[
           'offer' => $offer,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(OfferRequest $request, Offer $offer)
    {
        $offerUnique = Offer::query()
            ->where('code',$request->get('code'))
            ->where('id','!=', $offer->id)
            ->exists();
        if ($offerUnique) {
            return back()->withErrors(['کد تخفیف قبلا انتخاب شده']);
        }

        $offer->update([
           'code' => $request->get('code'),
           'start_at' => Offer::start_at($request),
           'end_at' => Offer::end_at($request),
        ]);
        return redirect(route('offer.create'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Offer $offer)
    {
        //
    }
}
