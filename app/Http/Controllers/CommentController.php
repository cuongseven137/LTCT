<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CommentController extends Controller
{
    public function getComment(){
        return view('comment');
    }

    public function postComment(Request $request){
        $this->validate($request,
            [
                'user_id' => "required",
                'product_id' => "required",
                'comment' => "required",
            ],
            [
                'user_id.required' => 'Chưa mã user',
                'product_id.required' => 'Chưa nhập mã sản phẩm',
                'comment.required' => 'Chưa nhập bình luận',
            ]
        );

        $comment = new Comment;
        $comment->user_id = $request->user_id;
        $comment->product_id = $request->product_id;
        $comment->comment = $request->comment;

        if($request->hasFile('photo')){
            $file = $request->file('photo');
            $name = $file->getClientOriginalName();
            $Hinh = Str::random(4)."_".$name;
            while(file_exists("assets/img/".$Hinh)){
                $Hinh = Str::random(4)."_".$name;
            }
            $file->move("assets/img/",$Hinh);
            $comment->photo = $Hinh;
        }

        $comment->save();

        return redirect('comment')->with('thongbao','Comment thành công');
    }
}
