<?php

namespace App\Http\Controllers\Auth;

use App\Helper\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\VerificationEmailRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Ichtrojan\Otp\Otp;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmailVerificationNotificationController extends Controller
{
    /**
     * Send a new email verification notification.
     */
    private $otp;

    public function __construct()
    {
        $this->otp = new Otp;
    }
    public function store(Request $request): RedirectResponse
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->intended(RouteServiceProvider::HOME);
        }

        $request->user()->sendEmailVerificationNotification();

        return back()->with('status', 'verification-link-sent');
    }


    public function passwordreset(VerificationEmailRequest $request){
        $otp2 = $this->otp->validate($request->email , $request->otp);
        if(!$otp2->status){
            return ApiResponse::sendresponse(442,"this Otp code invaild",$otp2) ;
        }
        $user = User::where('email', $request->email)->first();
        $user->email_verified_at = now();
        $user->password = Hash::make($request->password);
        $user->save();
        return ApiResponse::sendresponse(200,"correct code",$user);
    }


}
