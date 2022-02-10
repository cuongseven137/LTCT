<?php

namespace App\Http\Controllers;
use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function getFeedback(){
        return view('feedback');
    }

    public function postFeedback(Request $request){
        $this->validate($request,
            [
                'user_id' => "required",
                'content' => "required",
            ],
            [
                'user_id.required' => 'Chưa nhập mã user',
                'content.required' => 'Chưa nhập góp ý',
            ]
        );

        $feedback = new Feedback;
        $feedback->user_id = $request->user_id;
        $feedback->content = $request->content;

        $feedback->save();

        return redirect('feedback')->with('thongbao','Góp ý thành công');
    }
}
