<?php

namespace App\Http\Controllers;

use App\Jobs\ForgotPasswordJob;
use App\Models\PasswordResetToken;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ForgotPasswordController extends Controller
{
    public function sendEmail(Request $request){
        $email = $request ->validate([
            'email'   => 'required|email',
        ])['email'];
        $user = User::where('email', $email)->first();
        if ($user) {
            $token = sha1(mt_rand());
            $expiresAt = Carbon::now()->addMinutes(10);
       
            $passwordResetToken = PasswordResetToken::create([
                'email' => $email,
                'token' => $token,
                'created_at' => now(),
            ]);
            $resetLink = url("/reset-password?token={$passwordResetToken->token}");

            dispatch(new ForgotPasswordJob($email, $resetLink, $expiresAt));

            return 'Check your email to change the password.';
        } else {
            return 'This email does not exist!';
        }
        
        
    }

    public function changePassword(Request $request){
        $request ->validate([
          'password' => [
                'required',
                'string',
                'min:8',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/'
            ],
            'confirmPassword' => 'required|string|same:password',
        ]);

    $passwordResetToken = PasswordResetToken::where('email', $request->email)->first();
        //echo $passwordResetToken;

    if (!$passwordResetToken) {
        return( 'Invalid or expired token.');
    }

    if ($passwordResetToken->created_at->addMinutes(10)->isPast()) {
        $passwordResetToken->where('email', $passwordResetToken->email)->delete();
        return ('Token has expired.');
    }

    $user = User::where('email', $request->email)->first();

    if (!$user) {
        return ( 'User not found.');
    }

    $user->password = Hash::make($request->password);
    $user->save();

    $passwordResetToken->where('email', $passwordResetToken->email)->delete();

    return ( 'Password changed successfully.');

    }
}
 