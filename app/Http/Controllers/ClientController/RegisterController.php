<?php

namespace App\Http\Controllers\ClientController;

use App\Http\Controllers\Controller;
use App\Mail\OtpMail;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    public function create()
    {
        return view('client.register.create');
    }

    public function sendMail(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
        ]);
        $user = User::generateOtp($request);
        return redirect(route('client.register.otp',$user));
    }

    public function otp(User $user)
    {
        return view('client.register.verifyOtp',[
           'user' => $user,
        ]);
    }

    public function verifyOtp(Request $request , User $user)
    {
        $this->validate($request,[
           'otp' => 'required|max:5|min:5|lte:99999|gte:11111'
        ]);

        if (!Hash::check($request->get('otp'),$user->password)) {
            return back()->withErrors(['otp' => 'کد وارد شده صحیح نیست!!']);
        }

        auth()->login($user);
        return redirect('/');
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/');
    }
}
