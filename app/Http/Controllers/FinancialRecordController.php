<?php

namespace App\Http\Controllers;

use App\Models\FinancialRecord;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FinancialRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
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
     * @return Application|Factory|View|RedirectResponse
     */
    public function create()
    {
        $type = \request()->type ?? 'expense';
        $user = Auth::user();
        $categories = $user->categories;

        if (!count($categories)) {

            return redirect()->route('categories.create')->with('error', 'Нет категорий, нужно добавить');
        }
        return view('finance.create', compact('categories', 'type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
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
     * @return Application|Factory|View
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
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
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
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $finance = FinancialRecord::find($id);
        $finance->delete();

        return redirect()->route('finance.index')->with('success', 'Запись удалена');
    }
}
