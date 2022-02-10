@extends("layouts.index")

@section("title")

<title>Góp ý</title>

@endsection

@section("content")

<header>
    <h1 id="gop-y">Góp ý</h1>
</header>
<main>
  <form action="feedback" method="post">
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
  <p>Vui lòng để lại góp ý của bạn tại đây để chúng tôi có thể cải thiện ứng dụng và phục vụ bạn tốt hơn.</p>
  <textarea id="detail" name="content" cols="100" rows="4" class="form-control" placeholder="Nhập nội dung góp ý"></textarea>
    <input id="user_id" name="user_id" class="form-control"  type="text" placeholder="Mã user" />
  <button id="submit" type="submit" class="btn btn-primary">Gửi</button>
  </form>
</main>

@endsection