@extends("layouts.index")

@section("title")

<title>Phiếu bảo hành</title>

@endsection

@section("content")

<header>
    <h1 id="form-bao-hanh">Phiếu bảo hành</h1>
</header>
<main>
    <p>Mời nhập đầy đủ các thông tin để được hỗ trợ bảo hành từ chúng tôi</p>
    <form action="warrantyForm" method="post">
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

        <input id="product_id" name="product_id" class="form-control"  type="text" placeholder="Nhập mã sản phẩm" />
        <button id="submit" type="submit" class="btn btn-primary">Gửi</button>
    </form>
</main>

@endsection

@section("script")
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
@endsection