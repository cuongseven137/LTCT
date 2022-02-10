<?php

namespace App\Http\Controllers;
use App\Models\OnlineSupport;
use Illuminate\Http\Request;

class OnlineSupportController extends Controller
{
    public function getOnlineSupport(){
        return view('onlineSupport');
    }

    public function postOnlineSupport(Request $request){
        $this->validate($request,
            [
                'email' => "required",
                'phone' => "required|min:10|max:10",
                'detail' => "required",
            ],
            [
                'email.required' => 'Chưa nhập email',
                'phone.required' => 'Chưa nhập số điện thoại',
                'phone.min' => 'Số điện thoại có độ dài 10 số',
                'phone.max' => 'Số điện thoại có độ dài 10 số',
                'detail.required' => 'Chưa nhập nội dung',
            ]
        );

        $support = new OnlineSupport;
        $support->email = $request->email;
        $support->phone = $request->phone;
        $support->detail = $request->detail;

        $support->save();

        return redirect('onlineSupport')->with('thongbao','Gửi thành công');
    }
}
