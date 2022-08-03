<?php

namespace App\Http\Controllers;

use App\Models\Year;
use Illuminate\Http\Request;

class YearController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $years = Year::get();
        return view('contents.years', compact('years'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'year' => ['required', 'string', 'max:32', 'unique:years']
        ]);

        $year = Year::create([
            'year' => $request['year']
        ]);

        if ($year) {
            return redirect(route('manage-years.index'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Year  $year
     * @return \Illuminate\Http\Response
     */
    public function show(Year $year)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Year  $year
     * @return \Illuminate\Http\Response
     */
    public function edit(Year $year)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Year  $year
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $year = Year::findOrFail($id);

        if ($request->name != $year->year) {
            $this->validate($request, [
                'year' => ['required', 'string', 'max:32', 'unique:years']
            ]);
            $year->update([
                'year' => $request['year']
            ]);
        }

        if ($year) {
            return redirect(route('manage-years.index'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Year  $year
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $year = Year::findOrFail($id);
        $year->delete();

        if ($year) {
            return redirect(route('manage-years.index'));
        }
    }
}
