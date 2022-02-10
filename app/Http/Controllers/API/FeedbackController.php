<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;

use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FeedbackController extends Controller
{
    /** * @OA\Get(
     *     * path="api/feedbacks",
     *     * summary="get all feedback",
     *     * description="List feedback",
     *     * operationId="authLogin", * tags={"feedback"},
     *     * @OA\RequestBody( * required=true,
     *     * description="Pass admin credentials",
     *     * @OA\JsonContent( * required={"email","password"},
     *     * @OA\Property(property="id", type="int", format="id", example="1"),
     *     * @OA\Property(property="user_id", type="int",format="user_id", example="1"),
     *     * @OA\Property(property="content", type="text", example="Giao hàng nhanh chóng"), 
     *     * @OA\Property(property="expired_date", type="expired_date", example="2022/01/09"), ), * ),
     *     * @OA\Response( * response=403, * description="API key is missing"),
     *     * )
     *     * )
     *     * )
     */

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feedback = Feedback::all();

        return response($feedback, 200);
    }

    /** * @OA\Post(
     *     * path="api/feedback",
     *     * summary="create feedback",
     *     * description="Feedback",
     *     * operationId="authLogin", * tags={"feedback"},
     *     * @OA\RequestBody( * required=true,
     *     * description="Pass admin credentials",
     *     * @OA\JsonContent( * required={"email","password"},
     *     * @OA\Property(property="user_id", type="int",format="user_id", example="1"),
     *     * @OA\Property(property="content", type="text", example="Giao hàng nhanh chóng"),  ), * ),
     *     * @OA\Response( * response=201, * description="Wrong credentials response",@OA\JsonContent( * @OA\Property(property="Success", type="string", example="Send a feedback successfully"))),
     *     * @OA\Response( * response=403, * description="API key is missing"),
     *     * )
     *     * )
     *     * )
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $feedback = Feedback::create($request->all());

        return response()->json([
            "Success" => "Send a feedback successfully"
        ], 201);
    }

    /** * @OA\Get(
     *     * path="api/feedback/{id}",
     *     * summary="Feedback",
     *     * description="Feedback",
     *     * operationId="authLogin", * tags={"feedback"},
     *     * @OA\RequestBody( * required=true,
     *     * description="Pass admin credentials",
     *     * @OA\JsonContent( * required={"email","password"},
     *     * @OA\Property(property="id", type="int",format="id", example="1"),
     *     * @OA\Property(property="user_id", type="int",format="user_id", example="1"),
     *     * @OA\Property(property="content", type="text", example="Giao hàng nhanh chóng"), 
     *     * @OA\Property(property="expired_date", type="expired_date", example="2022/01/09"), ), * ),
     *     * @OA\Response( * response=404, * description="Wrong credentials response",@OA\JsonContent( * @OA\Property(property="message", type="string", example="Feedback not found"))),
     *     * @OA\Response( * response=403, * description="API key is missing"),
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
        if (Feedback::where('feedback_id',$id)->first()) {
            $feedback= Feedback::where('feedback_id',$id)->first();
            return response($feedback, 200);
        } else {
            return response()->json([
                "message" => "Feedback not found"
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
        if(Feedback::find($id)){
            $feedback = Feedback::find($id);
            $feedback->update($request->all());
            return response()->json([
                "message" => "Feedback updated successfully"
            ], 200);
        }else{
            return response()->json([
                "message" => "Feedback not found"
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
        if(Feedback::find($id)) {
            $feedback = Feedback::find($id);

            $feedback->delete();
    
            return response()->json([
                "message" => "Feedback deleted"
            ], 202);
        } else {
            return response()->json([
            "message" => "Feedback not found"
            ], 404);
        }
    }
}
