<?php

namespace App\Http\Controllers;

use App\Http\Requests\FillInformationsRequest;
use Illuminate\Http\Request;
use App\Persons;
class Person extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Person = Persons::all();
       return view('Person.Informations',compact('Person'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Person.FillInformation');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\FillInformationsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FillInformationsRequest $request)
    {
        Persons::create($request->all());

        return redirect()->route('Girts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
