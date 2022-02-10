@extends("layouts.index")

@section("title")

<title>Đổi/trả sản phẩm</title>

@endsection

@section("content")

<header>
    <h1>PHIẾU ĐĂNG KÝ ĐỔI/TRẢ SẢN PHẨM</h1>
</header>
<main>        
    <form action="returnProduct" method="post" enctype="multipart/form-data">
    {{csrf_field()}}

        @if(count($errors) > 0)
        <div class="alert alert-danger">
            @foreach ($errors->all() as $err)
                {{$err}}
                <br>
            @endforeach
        </div>
        @endif

        @if (session('thongbao'))
        <div class="alert alert-success">
            {{session('thongbao')}}
        </div>
        @endif
        <p><strong>Điền thông tin vào mẫu đăng ký đổi-trả online dưới đây.Form đăng ký đổi-trả : </strong></p>
        <input id="name" class="form-control" name="email"  type="email" placeholder="Email" />
        <input id="id" class="form-control" name="idOrder" type="text" placeholder="Mã đơn hàng" />
        <p><strong>Để đổi/trả sản phẩm , quý khách vui lòng điền đầy đủ thông tin vào phiếu.</strong></p>

         <!-- Điền sản phẩm muốn đổi trả -->
        <section id ="san-pham">
            <div id="menu">
                <table>
                    <thead>
                        <tr>
                            <th>Mã sản phẩm</th>
                            <th>Lý do đổi trả hàng</th>
                            <th>Hướng giải quyết mong muốn</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input name="idProduct" class="form-control" type="text" value=""></td>
                            <td><textarea  cols="20" class="form-control" name="detail" rows="2"></textarea></td>
                            <td>
                                <div>
                                    <input id="return_form 1" onclick="returnForm1()" name="return_form" type="radio" value="Đổi sản phẩm cùng loại"><label for="return_form 1">Đổi sản phẩm cùng loại</label>
                                </div>
                                <div>
                                    <input id="return_form 2" onclick="returnForm1()" name="return_form" type="radio" value="Đổi sản phẩm khác loại"><label for="return_form 2">Đổi sản phẩm khác loại</label>
                                </div>
                                <div>
                                    <input id="return_form 3" onclick="returnForm2()" name="return_form" type="radio" value="Trả và hoàn tiền"><label for="return_form 3">Trả và hoàn tiền</label>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
                                        
        <section class="images">
            <input id="image" name="photo" class="form-control" type="file" placeholder="Hình ảnh thực tế"/>
            <button id="upload-file" class="btn btn-secondary" ><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-camera" viewBox="0 0 16 16">
                <path d="M15 12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1h1.172a3 3 0 0 0 2.12-.879l.83-.828A1 1 0 0 1 6.827 3h2.344a1 1 0 0 1 .707.293l.828.828A3 3 0 0 0 12.828 5H14a1 1 0 0 1 1 1v6zM2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4H2z"/>
                <path d="M8 11a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5zm0 1a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7zM3 6.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z"/>
                </svg></button>
        </section>

        <div class="money" style="display: none">
            <p style="margin-top:20px;">
                <strong>Nếu yêu cầu Trả và hoàn tiền, quý khách vui lòng chọn hình thức hoàn tiền như sau</strong>
            </p>

            <div>
                <input id="refund_form 1" name="refund_form" type="radio" value="Chuyển khoản"><label for="refund_form 1">Chuyển khoản, với thông tin tài khoản :</label>
            </div>

            <div id="ngan-hang" style="display: none">
                <input id="tai-khoan" class="form-control"  type="text" placeholder="Tên tài khoản" />   
                <input id="so-tai-khoan" class="form-control"  type="text" placeholder="Số tài khoản" />                            
                <input id="ngan-hang" class="form-control"  type="text" placeholder="Ngân hàng" />
            </div>

            <div >
                <input id="refund_form 2" name="refund_form" type="radio" value="Tiền mặt"><label for="refund_form 2">Tiền mặt (quý khách mang trả sản phẩm &amp; nhận tiền mặt tại văn phòng bookbuy.vn)</label>
            </div>

            <div  >
                <input id="refund_form 3" name="refund_form" type="radio" value="Hoàn trả bằng mã tiền điện tử"><label for="refund_form 3">Hoàn trả bằng mã tiền điện tử qua email đặt hàng để quý khách mua sản phẩm khác.</label>
            </div>

            <p><strong>Lưu ý:</strong>  Quý khách chịu trách nhiệm về tính chính xác của tài khoản cung cấp, trong trường hợp có sai sót quý khách sẽ thanh toán phí thay đổi thông tin chuyển khoản. Nếu quý khách chuyển tiền qua cổng thanh toán trực tuyến, chúng tôi sẽ chuyển hoàn qua cổng thanh toán quý khách đã sử dụng.</p> 
        </div>
        <p><input id="submit" type="submit" class="btn btn-primary" value="GỬI YÊU CẦU"></p>
    </form>

</main>

@endsection

@section("script")
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script>
        function returnForm1(){
            const money = document.querySelector('.money');

            money.style.display = 'none';
        }

        function returnForm2(){
            const money = document.querySelector('.money');

            money.style.display = 'block';
        }
    </script>
@endsection