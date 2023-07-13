<?php

namespace App\Http\Controllers;

use App\Jobs\ForgotPasswordJob;
use App\Models\PasswordResetToken;
use App\Models\User;
use App\Services\ForgotPasswordService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ForgotPasswordController extends Controller
{

    private ForgotPasswordService $forgotPasswordService;

    public function __construct(ForgotPasswordService $forgotPasswordService)
    {
        $this->forgotPasswordService = $forgotPasswordService;
    }
    public function sendEmail(Request $request)
    {
        return response($this->forgotPasswordService->sendemail($request), 200);
    }

    public function changePassword(Request $request)
    {
        return response($this->forgotPasswordService->changePass($request), 200);
    }
}
