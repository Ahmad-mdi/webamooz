<?php

namespace App\Models;

use App\Http\Requests\AdminRequest\OfferRequest;
use Hekmatinasser\Verta\Facades\Verta;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;
    protected $guarded = [];

    public static function start_at(OfferRequest $request)
    {
        $date = explode('/',$request->get('start_at'));
        $year = $date[0];
        $month = $date[1];
        $day = $date[2];
        $time = Verta::getGregorian($year,$month,$day);
        return join('-',$time);
    }

    public static function end_at(OfferRequest $request)
    {
        $date = explode('/',$request->get('end_at'));
        $year = $date[0];
        $month = $date[1];
        $day = $date[2];
        $time = Verta::getGregorian($year,$month,$day);
        return join('-',$time);
    }
}
