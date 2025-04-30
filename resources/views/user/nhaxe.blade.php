<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách nhà xe</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.1/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="/css/header_footer.css">
    <link rel="stylesheet" href="/css/nhaxe.css">
    <link rel="shortcut icon" href="/images/favicon_user.png" />


</head>

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center">Danh sách nhà xe</h1>

        <div class="row">
            @foreach($carCom as $nhaxe)
                <div class="col-md-6">
                    <div class="nhaxe">
                        <a href="{{ url('/nha-xe/' . $nhaxe->id) }}" class="thumbnail">
                            <div class="image-container">
                                <img src="{{ $nhaxe->imageCarCom }}" alt="{{ $nhaxe->name }}"
                                     style="height: 440px; width: 580px" class="img-fluid rounded-top-2 thumbIMG">
                                <div class="hover-block rounded-top-2"></div>
                            </div>
                        </a>

                        <div class="description rounded-bottom-2">
                            <div class="intro">
                                <a href="{{ url('/nha-xe/' . $nhaxe->id) }}" class="intro-block">
                                    <h3>Nhà xe {{ $nhaxe->name }}</h3>
                                </a>

                                <a href="{{ url('/nha-xe/' . $nhaxe->id . '#description-section') }}" class="intro-block cmt"
                                   style="color: black;">
                                    <p>{{ $nhaxe->description }}</p>
                                </a>
                            </div>

                            <div class="review">
                                <h3>Đánh giá</h3>
                                <div class="review-star">
                                    <a href="{{ url('/nha-xe/' . $nhaxe->id) }}" class="review-count">{{ $nhaxe->stars }}</a>
                                    <a href="{{ url('/nha-xe/' . $nhaxe->id . '#review-section') }}">
                                        {!! \App\Helpers\Helper::generateStarList($nhaxe->stars) !!}
                                        ({{ $nhaxe->reviews->count() }})
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="row justify-content-center">
            <div class="col-auto">
                <nav class="pagination-container">
                    <ul class="pagination justify-content-center">
                        <li class="page-item {{ $nhaxePagination['page'] == 1 ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ url('/nha-xe?page=' . $nhaxePagination['previousPage']) }}">
                                Trước
                            </a>
                        </li>
                        <li class="page-item {{ $nhaxePagination['page'] == $nhaxePagination['totalPage'] ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ url('/nha-xe?page=' . $nhaxePagination['nextPage']) }}">
                                Sau
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
@endsection
