<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\UsersRequest\ChangePasswordRequest;
use App\Http\Requests\UsersRequest\CreateRequest;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
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
     * @return View
     */
    public function index(): View
    {
        $setting = Setting::all();
        return view('backend/setting/list', compact('setting'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $setting = Setting::find($id);
        $newStatus = $request->status == OFF ? 1 : 0;
        $setting->update(['status' => $newStatus]);

        return redirect()->route('settings.list')->with('success', 'Successfully');
    }
}
