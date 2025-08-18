<?php


namespace App\Http\Controllers;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CustomVerifyEmailController extends Controller
{
    public function __invoke(EmailVerificationRequest $request)
    {
        $request->fulfill();

        $user = Auth::user();

        return redirect($user->type === 'admin' ? route('admin.dashboard') : route('dashboard'));
    }
}
