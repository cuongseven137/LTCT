@extends("layouts.index")

@section("title")

<title>Phiếu bảo hành</title>

@endsection

@section("content")

<header>
    <h1 id="bao-hanh">Thông tin bảo hành</h1>
</header>
<main>
    <p>Chúng tôi xin được gửi thông tin bảo hành của bạn</p>
    <p>Mã sản phẩm: {{$warranty->product_id}}</p>
    <p>Thông tin bảo hành: {{$warranty->content}}</p>
    <p>Thời gian bảo hành từ ngày {{$warranty->start_date}} đến ngày {{$warranty->expired_date}}</p>
    <p id="cmt">Cảm ơn bạn đã tin dùng hệ thống bảo hành của chúng tôi.</p>
    <button id="submit" type="submit" class="btn btn-primary">Quay lại</button>
</main>

@endsection

@section("script")
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
@endsection