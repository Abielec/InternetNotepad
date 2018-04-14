<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\EatedRequest;
use App\Eaten;
class EatedProducts extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    
        return view('Person.eated');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EatedRequest $request)
    {
            $Product = DB::table('make_products')
                ->select('id')
                ->where('ProductName','=',"$request->EatedProduct")
                ->orWhere('Barcode','=',"$request->EatedProduct")
                ->first();
            if($Product)
            {
                Eaten::create([
                    'EatedBy' => $request->EatedBy,
                    'EatedProduct' => $Product->id,
                    'EatedWeight' => $request->EatedWeight,
                    'EatedAbout' => $request->EatedAbout,
                    'EatedDate' => $request->EatedDate
                    ]);
                return view('Person.EatMore');
            }
            else
            {
                return view('Person.error');
            }
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
