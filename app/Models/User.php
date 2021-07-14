<?php

namespace App\Models;

use App\Mail\OtpMail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Mail;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function likes()
    {
        return $this->belongsToMany(product::class, 'likes')
            ->withTimestamps();
    }

    //**********************************************************************

    public static function generateOtp(Request $request)
    {
        $otp = random_int(11111, 99999);
        $userQuery = User::query()->where('email', $request->get('email'));
        if ($userQuery->exists()) {
            $user = $userQuery->first();
            $user->update([
                'password' => bcrypt($otp),
            ]);
        } else {
            $user = User::query()->create([
                'email' => $request->get('email'),
                'role_id' => Role::findByTitle('normal-user')->id,
                'password' => bcrypt($otp),
            ]);
        }
        //send otp by email to user
        Mail::to($user->email)->send(new OtpMail($otp));
        return $user;
    }

    public function likeProduct(product $product)
    {
        $isLikedBefore = $this->likes()
            ->where('id', $product->id)
            ->exists();
        if ($isLikedBefore) {
            return $this->likes()->detach($product);
        }
        return $this->likes()->attach($product);
    }
}
