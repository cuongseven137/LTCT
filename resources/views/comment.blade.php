@extends("layouts.index")

@section("title")

<title>Đánh giá & nhận xét sản phẩm</title>

@endsection

@section("content")

<header>
    <h1>Đánh giá & nhận xét sản phẩm</h1>
</header>
<main>
    <form action="comment" method="post" enctype="multipart/form-data">
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

      <input id="names" name="user_id" class="form-control" type="text" placeholder="Id user"/>
      <input id="product_id" name="product_id" class="form-control" type="text" placeholder="Mã sản phẩm"/>
      <section class="images">
          <input id="image" name="photo" class="form-control" type="file" placeholder="Hình ảnh thực tế"/>
          <button id="upload-file" class="btn btn-secondary" ><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-camera" viewBox="0 0 16 16">
              <path d="M15 12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1h1.172a3 3 0 0 0 2.12-.879l.83-.828A1 1 0 0 1 6.827 3h2.344a1 1 0 0 1 .707.293l.828.828A3 3 0 0 0 12.828 5H14a1 1 0 0 1 1 1v6zM2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4H2z"/>
              <path d="M8 11a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5zm0 1a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7zM3 6.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z"/>
            </svg></button>
      </section>
      <textarea id="detail" name="comment" rows="4" cols="100" class="form-control" placeholder="Xin mời chia sẻ một số cảm nhận về sản phẩm"></textarea>
      <section class="rating">
        <div class="container">
          <div id="vote">
            <button class="vote star" id="first-star"><i class="bi bi-star"></i></button>
            <button class="vote star" id="second-star"><i class="bi bi-star"></i></button>
            <button class="vote star" id="thir-star"><i class="bi bi-star"></i></button>
            <button class="vote star" id="fourth-star"><i class="bi bi-star"></i></button>
            <button class="vote star" id="fifth-star"><i class="bi bi-star"></i></button>
          </div>
        </div>
      </section>
      <button id="submit" type="submit" class="btn btn-primary">Gửi</button>
    </form>
</main>

@endsection

@section("script")
  <script src="assets/js/rating.js"></script>
@endsection