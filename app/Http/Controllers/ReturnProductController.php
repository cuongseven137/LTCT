<?php

namespace App\Http\Controllers;
use App\Models\ReturnProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ReturnProductController extends Controller
{
    public function getReturnProduct(){
        return view('returnProduct');
    }

    public function postReturnProduct(Request $request){
        $this->validate($request,
            [
                'email' => "required",
                'idOrder' => "required",
                'idProduct' => "required",
                'detail' => "required",
                'return_form' => "required",
            ],
            [
                'email.required' => 'Chưa nhập email',
                'idOrder.required' => 'Chưa nhập mã đơn hàng',
                'idProduct.required' => 'Chưa nhập mã sản phẩm',
                'detail.required' => 'Chưa nhập lí do đổi trả',
                'return_form.required' => 'Chưa chọn cách giải quyết',
            ]
        );

        $returnProduct = new ReturnProduct;
        $returnProduct->email = $request->email;
        $returnProduct->idOrder = $request->idOrder;
        $returnProduct->idProduct = $request->idProduct;
        $returnProduct->detail = $request->detail;
        $returnProduct->return_form = $request->return_form;

        if($request->hasFile('photo')){
            $file = $request->file('photo');
            $name = $file->getClientOriginalName();
            $Hinh = Str::random(4)."_".$name;
            while(file_exists("assets/img/".$Hinh)){
                $Hinh = Str::random(4)."_".$name;
            }
            $file->move("assets/img/",$Hinh);
            $returnProduct->photo = $Hinh;
        }

        if($request->refund_form != null){
            $returnProduct->refund_form = $request->refund_form;
        }

        $returnProduct->save();

        return redirect('returnProduct')->with('thongbao','Thành công');
    }
}
