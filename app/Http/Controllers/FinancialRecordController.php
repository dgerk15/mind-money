<?php

namespace App\Http\Controllers;

use App\Models\FinancialRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FinancialRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $user_id =Auth::user()->id;
        $finances = FinancialRecord::all()
            ->where('user_id', $user_id)
            ->where('created_at', '>=', \Carbon\Carbon::now()->startOfMonth())
            ->sortByDesc('created_at');

        return view('finance.index', compact('finances'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function create()
    {
        $user = Auth::user();
        $categories = $user->categories;

        if (!count($categories)) {

            return redirect()->route('categories.create')->with('error', 'Нет категорий, нужно добавить');
        }
        return view('finance.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'category_id' => 'required',
            'type' => 'required',
            'cost' => 'required',
        ]);

        $data = $request->all();

        $data['user_id'] = Auth::user()->id;

        FinancialRecord::create($data);

        return redirect()->route('finance.index')->with('success', 'Запись добавлена');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param    $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user();
        $categories = $user->categories;
        $finance = FinancialRecord::find($id);

        return view('finance.edit', compact('finance', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FinancialRecord  $financialRecord
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'category_id' => 'required',
            'type' => 'required',
            'cost' => 'required',
        ]);

        $finance = FinancialRecord::find($id);
        $finance->update($request->all());

        return redirect()->route('finance.index')->with('success', 'Запись обновлена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $finance = FinancialRecord::find($id);
        $finance->delete();

        return redirect()->route('finance.index')->with('success', 'Запись удалена');
    }
}
