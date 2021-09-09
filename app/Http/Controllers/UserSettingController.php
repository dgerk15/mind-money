<?php

namespace App\Http\Controllers;

use App\Models\UserSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $settings = DB::table('user_settings')
            ->where(['user_id' => Auth::user()->id])
            ->first();

        $chart_types = UserSetting::CHART_TYPES;

        return view('user_setting.index', compact('settings', 'chart_types'));
    }

//    /**
//     * Show the form for editing the specified resource.
//     *
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function edit($id)
//    {
//        //
//    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
//        $request->validate([
//            'chart_type' => 'required',
//            'use_rounding' => 'required',
//            'use_system_category' => 'required',
//        ]);
        $settings = UserSetting::find($id);
        $settings->update($request->all());

        return redirect()->route('settings.index')->with('success', 'Изменения сохранены');
    }

}
