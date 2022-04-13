<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\SendMailRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\NotifyMail;

class SendMailController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * @return mixed
     */
    public function index(SendMailRequest $request): mixed
    {
        Mail::to($request->email)->send(new NotifyMail());

        return response()->success('Great! Successfully send in your mail');
    }
}
