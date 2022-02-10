<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comment = Comment::all();

        return response($comment, 200);
    }

    /** * @OA\Post(
     *     * path="api/product/{id}/comment",
     *     * summary="create comment",
     *     * description="Comment",
     *     * operationId="authLogin", * tags={"comment"},
     *     * @OA\RequestBody( * required=true,
     *     * description="Pass admin credentials",
     *     * @OA\JsonContent( * required={"email","password"},
     *     * @OA\Property(property="user_id", type="int", format="user_id", example="1"),
     *     * @OA\Property(property="product_id", type="int", format="product_id", example="1"),
     *     * @OA\Property(property="photo", type="string", example="https://didongviet.vn/pub/media/catalog/product//a/p/apple-iphone-11-tim-didongviet_5.jpg"),
     *     * @OA\Property(property="comment", type="text", example="Sản phẩm rất đẹp"),  ), * ),
     *     * @OA\Response( * response=201, * description="Wrong credentials response",@OA\JsonContent( * @OA\Property(property="Success", type="string", example="Send a comment successfully"))),
     *     * @OA\Response( * response=403, * description="API key is missing."),
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
        $comment = Comment::create($request->all());

        return response()->json([
            "success" => "Send a comment successfully"
        ], 201);
    }

    /** * @OA\Get(
     *     * path="api/product/{id}/comment",
     *     * summary="get all comment",
     *     * description="Comment",
     *     * operationId="authLogin", * tags={"comment"},
     *     * @OA\RequestBody( * required=true,
     *     * description="Pass admin credentials",
     *     * @OA\JsonContent( * required={"email","password"},
     *     * @OA\Property(property="ID", type="int", format="#", example="1"),
     *     * @OA\Property(property="user_id", type="int", format="user_id", example="1"),
     *     * @OA\Property(property="product_id", type="int", format="product_id", example="1"),
     *     * @OA\Property(property="photo", type="string", example="https://didongviet.vn/pub/media/catalog/product//a/p/apple-iphone-11-tim-didongviet_5.jpg"),
     *     * @OA\Property(property="comment", type="text", example="Sản phẩm rất đẹp"), 
     *     * @OA\Property(property="date", type="date", example="2022/01/09"), ), * ),
     *     * @OA\Response( * response=404, * description="Wrong credentials response",@OA\JsonContent( * @OA\Property(property="message", type="string", example="Product not found"))),
     *     * @OA\Response( * response=403, * description="API key is missing."),
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
        if (Comment::where('product_id',$id)->get()->count() != 0) {
            $comment = Comment::where('product_id',$id)->get();
            return response($comment, 200);
        } else {
            return response()->json([
                "message" => "Product not found"
            ], 404);
        }
    }

    public function update(Request $request, $id)
    {
        if(Comment::find($id)){
            $comment = Comment::find($id);
            $comment->update($request->all());
            return response()->json([
                "message" => "Comment updated successfully"
            ], 200);
        }else{
            return response()->json([
                "message" => "Comment not found"
            ], 404);
        }
    }

     /** * @OA\Delete(
     *     * path="api/comment/{id}",
     *     * summary="Delete a comment",
     *     * description="Delete a comment",
     *     * operationId="authLogin", * tags={"comment"},
     *     * @OA\RequestBody( * required=true,
     *     * description="Pass admin credentials", * ),
     *     * @OA\Response( * response=202, * description="Wrong credentials response",@OA\JsonContent( * @OA\Property(property="Success", type="string", example="Delete a comment successfully"))),
     *     * @OA\Response( * response=404, * description="Wrong credentials response",@OA\JsonContent( * @OA\Property(property="Error", type="string", example="Comment not found"))),
     *     * @OA\Response( * response=403, * description="API key is missing."),
     *     * )
     *     * )
     *     * )
     */

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Comment::find($id)) {
            $comment = Comment::find($id);

            $comment->delete();
    
            return response()->json([
                "Success" => "Delete a comment successfully"
            ], 202);
        } else {
            return response()->json([
            "message" => "Comment not found"
            ], 404);
        }
    }
}
