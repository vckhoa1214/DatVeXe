<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Về chúng tôi</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.1/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="/css/header_footer.css">
    <link rel="stylesheet" href="/css/about.css">
    <link rel="shortcut icon" href="/images/favicon_user.png"/>

</head>

<body>
@include('user.partials.header')
<main>
    <div class="row justify-content-center">
        <div class="col-auto" style="padding-top: 10px;">
            <img src="{{ asset('images/aboutus.png') }}" alt="Thumbnail" class="img-fluid rounded-top-bottom-1"
                 style="width: 400px; height: 320px;">
        </div>

        <div class="col-auto about-container">
            <div class="about-text" style="width: 500px;">
                <h1 class="about-title">Chúng tôi</h1>
                <p>Góp phần cho hành trình của bạn hạnh phúc hơn</p>
                <p>Mỗi chúng ta đều có những chuyến đi khởi đầu cho những hành trình thú vị và hạnh phúc, thay đổi
                    cuộc đời của chính mình. Sứ mệnh mà BusTicket hướng đến không chỉ gói gọn trong những chuyến đi,
                    mà còn là hành trình cuộc đời của mỗi người.</p>
                <p>BusTicket mong muốn đồng hành và góp phần cho mỗi hành trình ấy hạnh phúc trọn vẹn hơn. Đó có thể
                    là những chuyến đi có giá tiết kiệm hơn, tạo điều kiện cho nhiều người được đi du lịch hơn, hay
                    nhiều người được tiếp cận với những dịch vụ tốt hơn, có nhiều trải nghiệm hạnh phúc và ý nghĩa
                    hơn.</p>
            </div>
        </div>
    </div>

    <div class="row justify-content-center team">
        @php
            $members = [
                ['id' => '63134338', 'name' => 'Võ Chí Khoa', 'img' => 'vck.jpg'],
            ];
        @endphp

        @foreach ($members as $member)
            <div class="col-auto member">
                <img class="rounded team-avt object-fit-cover" src="{{ asset('images/avatar/' . $member['img']) }}"
                     alt="{{ $member['name'] }}" style="width: 180px; height: 180px; object-fit: cover;">
                <div>
                    <p>{{ $member['id'] }}</p>
                    <p>{{ $member['name'] }}</p>
                </div>
            </div>
        @endforeach
    </div>
</main>

</body>
