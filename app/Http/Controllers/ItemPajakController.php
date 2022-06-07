<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Pajak;
use Facade\FlareClient\Http\Response;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response as HttpFoundationResponse;

class ItemPajakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $appends = ['pajak'];

    public function index()
    {
        //

       
        $items = Item::all();
        $pajaks= Pajak::all();
        //$response1 = $items;
        $arr =[];
        $arr_p=[];

        foreach ($items as $item) {
            $arr['id'] = $item->id;
            $arr['nama'] = $item->nama;

            $arr1 =[];
            $arr1_p =[];

            foreach ($pajaks as $pajak) {
                $arr1['id'] = $pajak->id;
                $arr1['nama'] = $pajak->nama;
                $arr1['rate'] = intval($pajak->rate) .'%';
                array_push($arr1_p,$arr1);
            } 

            $arr['pajak'] = $arr1_p;
            array_push($arr_p,$arr);
           
        }
        
        $response = [
            'data' => $arr_p,
        ];
    

        return response()->json($response, HttpFoundationResponse::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
