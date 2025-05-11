<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tìm kiếm chuyến đi</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <!-- font anwsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

    <!-- phần header  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.1/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom CSS -->
    <link type="text/css" rel="stylesheet" href="/css/search-trip.css">
    <link type="text/css" rel="stylesheet" href="/css/header_footer.css">
    <link type="text/css" rel="stylesheet" href="/css/home.css">

    <!-- flatpickr -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <script src="https://npmcdn.com/flatpickr/dist/flatpickr.min.js"></script>
    <script src="https://npmcdn.com/flatpickr@4.6.13/dist/l10n/vn.js"></script>


    <!-- jQuery  -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="shortcut icon" href="/images/favicon_user.png"/>


</head>
<body>
@include('user.partials.header')
<main>
    <section class="container">
        <!-- search trip -->
        <div id="search-banner-trip" class="container rounded-4 bg-color-2 mt-3">
            <form action="{{ route('search-trip') }}" method="get">
                <div class="row">
                    <!-- Điểm đi -->
                    <div class="col-lg-4 pb-0 p-4">
                        <div class="border-item d-flex flex-row">
                            <i class="fas fa-map-marker-alt fa-2x"></i>
                            <input class="form-control mx-2 fs-4 p-0 select-search" name="start"
                                   style="background: #dbe2ef;" list="datalistOptionsStart" id="start"
                                   value="{{ request('start', '') }}" placeholder="Điểm đi" required>
                            <datalist id="datalistOptionsStart">
                                @foreach ($searchStart as $start)
                                    <option value="{{ $start }}"></option>
                                @endforeach
                            </datalist>
                        </div>
                        <hr>
                    </div>

                    <!-- Điểm đến -->
                    <div class="col-lg-4 pb-0 p-4">
                        <div class="border-item d-flex flex-row">
                            <i class="fas fa-map-marker-alt fa-2x"></i>
                            <input class="form-control mx-2 fs-4 p-0 select-search" name="end"
                                   style="background: #dbe2ef;" list="datalistOptionsEnd" id="end"
                                   value="{{ request('end', '') }}" placeholder="Điểm đến" required>
                            <datalist id="datalistOptionsEnd">
                                @foreach ($searchEnd as $end)
                                    <option value="{{ $end }}"></option>
                                @endforeach
                            </datalist>
                        </div>
                        <hr>
                    </div>

                    <!-- Ngày đi -->
                    <div class="col-lg-3 pb-0 p-4">
                        <div class="border-item d-flex flex-row">
                            <i class="fa-solid fa-calendar-days fa-2x"></i>
                            <input type="date" name="date" class="form-control mx-2 fs-4 p-0 select-search datetime"
                                   style="background: #dbe2ef;" id="datetimepicker" placeholder="Ngày đi" required>
                        </div>
                        <hr style="margin-right:10px;">
                    </div>

                    <!-- Nút tìm kiếm -->
                    <div class="col-lg-1">
                        <div class="mt-3">
                            <button id="btn-search" type="submit"
                                    class="col-12 btn btn-lg px-lg-4 px-md-5 my-sm-3 mt-md-0">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <section class="container">
        <div class="row py-5">
            <!-- Bộ lọc -->
            <div class="col-lg-3">
                <div class="d-flex justify-content-between">
                    <h4>Bộ lọc</h4>
                    <a href="{{ route('search-trip', ['start' => request('start'), 'end' => request('end'), 'date' => request('date')]) }}">
                        Xóa lọc
                    </a>
                </div>

                <div class="border mt-1 p-3">
                    <form action="{{ route('search-trip') }}" method="get">
                        <!-- Giữ lại thông tin tìm kiếm -->
                        <input type="hidden" name="start" value="{{ request('start') }}">
                        <input type="hidden" name="end" value="{{ request('end') }}">
                        <input type="hidden" name="date" value="{{ request('date') }}">

                        <!-- Giá vé -->
                        <div class="mb-4">
                            <p><label for="amount">Giá vé:</label>
                                <input type="text" id="amount" readonly
                                       style="border:0; color:#3f72af; font-weight:bold;">
                            </p>
                            <div id="slider-range"></div>

                            <!-- Input ẩn để gửi min/max -->
                            <input type="hidden" name="min" id="minPrice" value="{{ request('min', 50000) }}">
                            <input type="hidden" name="max" id="maxPrice" value="{{ request('max', 500000) }}">
                        </div>

                        <!-- Nhà xe -->
                        <div class="mb-4 mt-3">
                            <label class="mb-2">Nhà xe</label>
                            @foreach ($nhaxes as $nhaxe)
                                <div class="form-check">
                                    <input class="form-check-input me-3" name="nhaxe[]" type="checkbox"
                                           value="{{ $nhaxe->id }}" id="nhaxe{{ $nhaxe->id }}"
                                        {{ in_array($nhaxe->id, request()->input('nhaxe', [])) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="nhaxe{{ $nhaxe->id }}">
                                        {{ $nhaxe->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>

                        <!-- Nút Submit -->
                        <button type="submit" class="btn btn-primary">Lọc</button>
                    </form>
                </div>
            </div>
            <!-- Danh sách chuyến xe -->
            <div class="col-lg-9">
                <div class="my-3">
                    @forelse ($chuyenxes as $chuyenxe)
                        <div class="card mb-3">
                            <div class="row">
                                <div class="col-md-4">
                                    <a href="{{ route('trip-info', ['id' => $chuyenxe->id]) }}">
                                        <img
                                            src="{{ $chuyenxe->nhaXe->imageCarCom ?? asset('images/default-car.jpg') }}"
                                            class="img-fluid rounded-2" style="height:100%;" alt="tuyến xe">
                                    </a>
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body pb-0 d-flex flex-column justify-content-between">
                                        <div class="d-flex justify-content-between">
                                            <h4 class="card-title text-3">
                                                {{ $chuyenxe->nhaXe->name ?? 'Không xác định' }}
                                            </h4>
                                            <div class="p-2 ms-2 bg-color-2 rounded-2">
                                                <span>
                                                    <i class="fa-solid fa-star text-warning"></i>
                                                    {{ $chuyenxe->nhaXe->average_stars ?? '0' }}
                                                </span>
                                            </div>
                                            <h4 class="color-3 fw-bold">
                                                {{ number_format($chuyenxe->price ?? 0, 0, ',', '.') }} đ
                                            </h4>
                                        </div>
                                        <div class="d-flex">
                                            <p class="fw-light">
                                                {{ $chuyenxe->loaiXe->name ?? '' }}
                                                {{ $chuyenxe->totalNumSeats ?? '' }} chỗ
                                                (Còn {{ $chuyenxe->numSeats ?? '' }} chỗ)
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-center">Không tìm thấy chuyến xe nào phù hợp.</p>
                    @endforelse
                </div>
            </div>

            <!-- Phân trang -->
            <nav aria-label="..." style="display: flex; justify-content: center">
                <ul class="pagination">
                    @for ($i = 1; $i <= $totalPage; $i++)
                        <li class="page-item {{ $i == $currentPage ? 'active' : '' }}">
                            <a class="page-link"
                               href="?page={{ $i }}@foreach ($requestParams as $key => $value){{ is_array($value) ? collect($value)->map(fn($v) => "&$key%5B%5D=$v")->implode('') : "&$key=$value" }}@endforeach">
                                {{ $i }}
                            </a>
                        </li>
                    @endfor
                </ul>
            </nav>
        </div>
    </section>
</main>
</body>

<script>
    let urlParams = new URLSearchParams(location.search);
    console.log(urlParams.toString());
    let params = {
        nhaxe: [],
        loaixe: [],
        sort: null,
        min: 0,
        max: 2000000,
    }

    for (let key in params) {
        if (urlParams.has(key)) {
            params[key] = urlParams.get(key).split(',');
            console.log(key);
            console.log(params[key]);
        }
    }

    function addParam(key, value) {
        params[key].push(value);
        urlParams.delete(key);
        if (params[key].length > 0) {
            urlParams.append(key, params[key]);
        }
        if (urlParams.has('page')) {
            urlParams.delete('page');
        }
        selectParam();
    }

    function addSort(value) {
        console.log(value);
        params.sort = value;
        urlParams.delete('sort');
        if (params.sort) {
            urlParams.append('sort', params.sort);
        }
        if (urlParams.has('page')) {
            urlParams.delete('page');
        }
        selectParam();
    }

    function addPrice() {
        let price = $("#amount").val();
        let min = price.split(' ')[0].split('(')[1];
        let max = price.split(' ')[2]
        params.min = min;
        params.max = max;
        urlParams.delete('min');
        urlParams.delete('max');
        urlParams.append('min', params.min);
        urlParams.append('max', params.max);
        if (urlParams.has('page')) {
            urlParams.delete('page');
        }
        selectParam();
        console.log(min);
        console.log(max);
    }

    for (let nx in params.nhaxe) {
        let control = $(`#nhaxe${params.nhaxe[nx]}`);
        if (control) {
            $(control).prop('checked', true);
            $(control).prop('disabled', true);
        }
    }

    for (let lx in params.loaixe) {
        let control = $(`#loaixe${params.loaixe[lx]}`);
        if (control) {
            $(control).prop('checked', true);
            $(control).prop('disabled', true);
        }
    }

    let tripSort = $(`#sort-${params.sort}`);
    if (tripSort) {
        $(tripSort).prop('checked', true);
    }

    function selectParam() {
        let url = `/search-trip?${urlParams.toString()}`;
        location.href = url;
    }

    $(function () {
        let min = parseInt($("#minPrice").val()) || 50000;
        let max = parseInt($("#maxPrice").val()) || 500000;

        $("#slider-range").slider({
            range: true,
            min: 50000,
            max: 1000000,
            step: 50000,
            values: [min, max],
            slide: function (event, ui) {
                $("#amount").val(ui.values[0] + " đ - " + ui.values[1] + " đ");
                $("#minPrice").val(ui.values[0]); // Cập nhật input ẩn
                $("#maxPrice").val(ui.values[1]);
            }
        });

        // Cập nhật hiển thị giá khi tải trang
        $("#amount").val($("#slider-range").slider("values", 0) + " đ - " + $("#slider-range").slider("values", 1) + " đ");
    });

    flatpickr("#datetimepicker", {
        dateFormat: "d-m-Y",
        locale: "vn",
        disableMobile: "true",
        minDate: new Date(),
        defaultDate: urlParams.get('date') ? urlParams.get('date') : new Date(),
    });

    let pagi = document.getElementById('pagi');
    pagi.querySelectorAll('li').forEach(item => {
        item.classList.add('page-item');
    })
    pagi.querySelectorAll('a').forEach(item => {
        item.classList.add('page-link');
    })

</script>
@include('user.partials.footer')

</html>
