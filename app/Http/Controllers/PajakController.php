<?php

namespace App\Http\Controllers;
use App\Models\Pajak;
use Facade\FlareClient\Http\Response;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response as HttpFoundationResponse;
class PajakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$pajak = Pajak::orderBy('created_at', 'DESC');
        $pajak = Pajak::all();
        $response = [
            'message' => 'Data Pajak',
            'data' => $pajak,
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
        $validator = Validator::make($request->all(), [
            "nama" => ['required'],
            "rate" => ['required']
        ]);

        if ($validator->fails()) {
            return response()->json(
                $validator->errors(),
                HttpFoundationResponse::HTTP_UNPROCESSABLE_ENTITY
            );
        }

        try {
            $pajak = Pajak::create($request->all());

            $response = [
                'message' => 'Berhasil disimpan',
                'data' => $pajak,
            ];

            return response()->json($response, HttpFoundationResponse::HTTP_CREATED);
        } catch (QueryException $e) {
            return response()->json([
                'message' => "Gagal " . $e->errorInfo,
            ]);
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validator = Validator::make($request->all(), [
            "nama" => ['required'],
            "rate" => ['required']
        ]);

        if ($validator->fails()) {
            return response()->json(
                $validator->errors(),
                HttpFoundationResponse::HTTP_UNPROCESSABLE_ENTITY
            );
        }

        
        try {
            //$pajak = Pajak::update($request->all());
            $pajak = Pajak::find($id);
            if($pajak->update($request->all())){
                $response = [
                    'message' => 'Berhasil diupdate',
                    'data' => $pajak,
                ];

                return response()->json($response, HttpFoundationResponse::HTTP_CREATED);
                }
        } catch (QueryException $e) {
            return response()->json([
                'message' => "Gagal " . $e->errorInfo,
            ]);
        }

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
        $pajak = Pajak::find($id);
        if($pajak->delete()){
            $response = [
                'message' => 'Berhasil dihapus',
                'data' => $pajak,
            ];

            return response()->json($response, HttpFoundationResponse::HTTP_CREATED);
        }
    
    }
}
