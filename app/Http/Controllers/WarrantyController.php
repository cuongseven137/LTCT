<?php

namespace App\Http\Controllers;
use App\Models\Warranty;
use Illuminate\Http\Request;

class WarrantyController extends Controller
{
    public function getWarranty($id){
        $warranty = Warranty::where('product_id',$id)->first();

        return view('warranty',['warranty'=>$warranty]);
    }

    public function getWarrantyForm(){
        return view('warrantyForm');
    }

    public function postWarrantyForm(Request $request){
        $this->validate($request,
            [
                'product_id' => "required",
            ],
            [
                'product_id.required' => 'Chưa nhập mã sản phẩm',
            ]
        );

        $warranty = Warranty::where('product_id',$request->product_id)->first();

        if($warranty == null){
            return redirect('warrantyForm')->with('thongbao','Không tìm thấy thông tin bảo hành');
        }else{
            return redirect('warranty/'.$request->product_id);
        }
    }
}
