@extends("layouts.index")

@section("title")

<title>Hỗ trợ trực tuyến</title>

@endsection

@section("content")

<header>
    <h1 id="ho-tro">Hỗ trợ trực tuyến</h1>
</header>
<main>
    <p>Mời nhập nội dung hỗ trợ , chúng tôi sẽ nhanh chóng liên hệ lại để hỗ trợ bạn</p>
    <form action="onlineSupport" method="post">
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

        <textarea id="detail" name="detail" cols="100" rows="4" class="form-control" placeholder="Nhập nội dung cần hỗ trợ"></textarea>
        <input id="email" class="form-control" name="email"  type="text" placeholder="Địa chỉ email"/>
        <input id="phone" class="form-control" name="phone" type="text" placeholder="Số điện thoại"/>
        <button id="submit" type="submit" class="btn btn-primary">Gửi</button>
    </form>
</main>

@endsection

@section("script")
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
@endsection