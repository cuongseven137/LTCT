<?php

namespace App\Http\Controllers\API;

use App\Models\Warranty;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WarrantyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $warranty = Warranty::all();

        return response($warranty, 200);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $warranty = Warranty::create($request->all());

        return response()->json([
            "message" => "Warranty created"
        ], 201);
    }

    /** * @OA\Get(
     *     * path="api/product/{id}/insurance",
     *     * summary="get a insurance",
     *     * description="get a insurance",
     *     * operationId="authLogin", * tags={"insurance"},
     *     * @OA\RequestBody( * required=true,
     *     * description="Pass admin credentials",
     *     * @OA\JsonContent( * required={"email","password"},
     *     * @OA\Property(property="ID", type="int", format="#", example="1"),
     *     * @OA\Property(property="product_id", type="int", format="product_id", example="1"),
     *     * @OA\Property(property="content", type="string", format="content", example="Bảo hành một đổi một trong vòng 1 tháng đầu sử dụng"),
     *     * @OA\Property(property="start_date", type="date", example="2022/01/01"),
     *     * @OA\Property(property="expired_date", type="date", example="2022/02/01"), ), * ),
     *     * @OA\Response( * response=403, * description="API key is missing."),
     *     * @OA\Response( * response=404, * description="Wrong credentials response",@OA\JsonContent( * @OA\Property(property="message", type="string", example="Product not found"))),
     *     * )
     *     * )
     *     * )
     */

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Warranty::where('product_id',$id)->get()->count() != 0) {
            $warranty = Warranty::where('product_id',$id)->get();
            return response($warranty, 200);
        } else {
            return response()->json([
                "message" => "Product not found"
            ], 404);
        }
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
        if(Warranty::find($id)){
            $warranty = Warranty::find($id);
            $warranty->update($request->all());
            return response()->json([
                "message" => "Warranty updated successfully"
            ], 200);
        }else{
            return response()->json([
                "message" => "Warranty not found"
            ], 404);
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
        if(Warranty::find($id)) {
            $warranty = Warranty::find($id);

            $warranty->delete();
    
            return response()->json([
                "message" => "Warranty deleted"
            ], 202);
        } else {
            return response()->json([
            "message" => "Warranty not found"
            ], 404);
        }
    }
}
