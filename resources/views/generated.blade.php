<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{$product->slug}}">
    <meta name="keywords" content="@foreach(explode(' ',$product['name']) as $keyword) {{$keyword.' , '}} @endforeach">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @if($product['meta_image']!=null)
        <meta property="og:image" content="{{env('MAIN_URL')."/storage/product/meta"."/"}}{{$product->meta_image}}"/>
        <meta property="twitter:card"
              content="{{env('MAIN_URL')."/storage/product/meta"."/"}}{{$product->meta_image}}"/>
    @else
        <meta property="og:image" content="{{env('MAIN_URL')."/storage/product/thumbnail"."/"}}{{$product->thumbnail}}"/>
        <meta property="twitter:card"
              content="{{env('MAIN_URL')."/storage/product/thumbnail/"."/"}}{{$product->thumbnail}}"/>
    @endif

    @if($product['meta_title']!=null)
        <meta property="og:title" content="{{$product->meta_title}}"/>
        <meta property="twitter:title" content="{{$product->meta_title}}"/>
    @else
        <meta property="og:title" content="{{$product->name}}"/>
        <meta property="twitter:title" content="{{$product->name}}"/>
    @endif
    {{-- <meta property="og:url" content="{{route('product',[$product->slug])}}"> --}}

    @if($product['meta_description']!=null)
        <meta property="twitter:description" content="{!! $product['meta_description'] !!}">
        <meta property="og:description" content="{!! $product['meta_description'] !!}">
    @else
        <meta property="og:description"
              content="@foreach(explode(' ',$product['name']) as $keyword) {{$keyword.' , '}} @endforeach">
        <meta property="twitter:description"
              content="@foreach(explode(' ',$product['name']) as $keyword) {{$keyword.' , '}} @endforeach">
    @endif
    {{-- <meta property="twitter:url" content="{{route('product',[$product->slug])}}"> --}}
    <title>{{ $title }}</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <style>
        body {
            max-width: 1080px;
            background-color: gray;
            display: flex;
            justify-content: center;
            margin: auto;
        }

        .main-container,
        .card {
            background-color: rgb(215, 215, 215);
        }

        .carousel-item {
            height: 423px;
            width: 100%;
        }

        .card .price_box {
            padding: 1rem;
            background-color: #fff;
        }

        .card .price_box .price {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .card .price_box .price .price-text {
            color: #21bc88;
            font-size: 1.2rem;
        }

        .card .price_box .price .price-text>span {
            font-size: 1.5rem;
            font-weight: 600;
        }

        .card .price_box .copy_msg {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .card .price_box .copy_msg .text {
            flex: 1 1;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 2;
            line-clamp: 2;
            word-break: break-word;
            overflow: hidden;
            max-width: 100%;
            font-size: 1.2rem;
            font-weight: 600;
            color: #30333c;
        }

        .type_box{
            background-color: #fff;
            padding: 1rem;
        }

        .card .type_box .title {
            margin-bottom: 7px;
        }

        .type_box .before-icon {
            display: inline-block;
            width: 3px;
            height: 10px;
            margin-right: 7px;
            background: #18a78c;
            border-radius: 35px;
        }

        .for-mobile-capacity {
            margin-left: 7%;
        }

        .checkbox-alphanumeric input {
            left: -9999px;
            position: absolute;
        }

        label:not(.form-check-label):not(.custom-control-label):not(.custom-file-label):not(.custom-option-label) {
            color: #373f50;
        }

        .checkbox-alphanumeric input:checked ~ label {
            transform: scale(1.1);
            border-color: red !important;
        }

        .checkbox-alphanumeric--style-1 label {
            width: auto;
            padding-left: 1rem;
            padding-right: 1rem;
            border-radius: 2px;
        }

        .checkbox-alphanumeric label {
            width: 2.25rem;
            height: 2.25rem;
            float: left;
            padding: 0.375rem 0;
            margin-right: 0.375rem;
            display: block;
            color: #818a91;
            font-size: 0.875rem;
            font-weight: 400;
            text-align: center;
            background: transparent;
            text-transform: uppercase;
            border: 1px solid #e6e6e6;
            border-radius: 2px;
            -webkit-transition: all 0.3s ease;
            -moz-transition: all 0.3s ease;
            -o-transition: all 0.3s ease;
            -ms-transition: all 0.3s ease;
            transition: all 0.3s ease;
            transform: scale(0.95);
        }

        .checkbox-alphanumeric::after {
            clear: both;
        }

        .checkbox-alphanumeric::after, .checkbox-alphanumeric::before {
            content: '';
            display: table;
        }
        @media (max-width: 768px){
            .product-quantity {
                padding-left: 4%;
            }
        }
        .btn-number:hover {
            color: #000000;
        }

        .btn.disabled, .btn:disabled {
            opacity: .65;
            box-shadow: none;
            border: none;
        }
        .btn:not(:disabled):not(.disabled) {
            cursor: pointer;
        }
        .input-group > .form-control:not(:last-child), .input-group > .custom-select:not(:last-child) {
            border-radius: 4px !important;
            font-size: 10px;
            padding: 0;
        }

        .anticon {
            display: inline-block;
            color: inherit;
            font-style: normal;
            line-height: 0;
            text-align: center;
            text-transform: none;
            vertical-align: -0.125em;
            text-rendering: optimizelegibility;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }



        .card .detail_box {
            padding: 1rem;
            background-color: #fff;
            flex: 1 1 auto;
        }

        .card .detail_box .title {
            margin-bottom: 7px;
        }

        .detail_box .before-icon {
            display: inline-block;
            width: 3px;
            height: 10px;
            margin-right: 7px;
            background: #18a78c;
            border-radius: 35px;
        }

        .detail_box p {
            margin-bottom: 0.5rem;
        }

        .card .detail_box .detail_html img {
            width: 100%;
            -o-object-fit: fill;
            object-fit: fill;
        }

        .card .footer {
            width: 100%;
            max-width: 1080px;
            background-color: #fff;
            margin-top: 0.6rem;
            display: flex;
            z-index: 2;
            align-items: center;
            padding: 0.5rem 1rem;
            position: fixed;
            bottom: 0;
        }

        .card .footer .buy_btn,
        .Details_details__CQ1ad .footer .keran_btn,
        .Details_details__CQ1ad .footer .terjual_btn {
            flex: 1 1;
            overflow: hidden;
            background: linear-gradient(265.04deg, #38ef7d -164.21%, #11998e 54.98%);
            border: 1px solid transparent;
            height: 2.5rem;
            font-size: 14px;
            font-weight: 700;
            text-align: center;
            border-radius: 5px;
        }

        .card .footer span{
            box-sizing:border-box;
            display:inline-block;
            overflow:hidden;
            width:initial;
            height:initial;
            background:none;
            opacity:1;
            border:0;
            margin:0;
            padding:0;
            position:relative;
            max-width:100%;
        }

        .buy_btn{
            padding: 5px 10px;
        }
    </style>
</head>

<body>
    <div class="main-container w-100 position-relaitve">
        <div class="card position-relative">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="false">
                <div class="carousel-indicators">
                    @if ($product->images != null)
                    @foreach (json_decode($product->images) as $key => $photo)
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $key }}"
                        class="active" aria-current="true" aria-label="Slide-{{ $key }}"></button>
                    @endforeach
                    @endif
                </div>

                <div class="carousel-inner">
                    @if ($product->images != null)
                    @foreach (json_decode($product->images) as $key => $photo)
                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}" id="slide-{{ $key }}">
                        <img src="{{env('MAIN_URL')."/storage/product/$photo"}}"
                            onerror="this.src='{{env('MAIN_URL').'/assets/front-end/img/image-place-holder.png'}}'"
                            class="d-block w-100 card-img-top h-100" alt="{{ $product->name }}">
                    </div>
                    @endforeach
                    @else
                    <div class="carousel-item active">
                        <img src="{{env('MAIN_URL').'/assets/front-end/img/image-place-holder.png'}}"
                            class="d-block w-100 card-img-top" alt="{{ $product->name }}">
                    </div>
                    @endif
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

            <div class="price_box">

                <div class="price">
                    <div class="price-text">Rp. <span>{{ $product->dropship }}</span></div>
                </div>
                <div class="copy_msg"><span class="text">{{ $product->name }}</span></div>
            </div>

            <div class="detail_box mb-5">
                <div class="title">
                    <div class="before-icon"></div><b>Detail Produk</b>
                </div>
                <div class="detail_html">
                    <div>
                        <p><span style="font-size: medium;">{!! $product->details !!}</span></p>
                        {{-- <p>
                            <img src="https://grosiraja-production-public.oss-accelerate.aliyuncs.com/operation/notice/712954954735624.jpg"
                                style="max-width:100%;"><img
                                src="https://grosiraja-production-public.oss-accelerate.aliyuncs.com/operation/notice/712954954792964.jpg"
                                style="max-width: 100%;"><img
                                src="https://grosiraja-production-public.oss-accelerate.aliyuncs.com/operation/notice/712954954825731.jpg"
                                style="max-width: 100%;"><img
                                src="https://grosiraja-production-public.oss-accelerate.aliyuncs.com/operation/notice/712954954866692.jpg"
                                style="max-width: 100%;"><img
                                src="https://grosiraja-production-public.oss-accelerate.aliyuncs.com/operation/notice/712954954899459.jpg"
                                style="max-width: 100%;"><img
                                src="https://grosiraja-production-public.oss-accelerate.aliyuncs.com/operation/notice/712954954932226.jpg"
                                style="max-width: 100%;"><img
                                src="https://grosiraja-production-public.oss-accelerate.aliyuncs.com/operation/notice/712954954969090.jpg"
                                style="max-width: 100%;"><img
                                src="https://grosiraja-production-public.oss-accelerate.aliyuncs.com/operation/notice/712954955001857.jpg"
                                style="max-width: 100%;"><img
                                src="https://grosiraja-production-public.oss-accelerate.aliyuncs.com/operation/notice/712954955046915.jpg"
                                style="max-width: 100%;"><img
                                src="https://grosiraja-production-public.oss-accelerate.aliyuncs.com/operation/notice/712954955091973.jpg"
                                style="max-width: 100%;"><img
                                src="https://grosiraja-production-public.oss-accelerate.aliyuncs.com/operation/notice/712954955128837.jpg"
                                style="max-width: 100%;"><img
                                src="https://grosiraja-production-public.oss-accelerate.aliyuncs.com/operation/notice/712954955165701.jpg"
                                style="max-width: 100%;"><span style="font-size: medium;"><br></span>
                        </p> --}}
                    </div>
                </div>
            </div>
            <div class="position-relative">
                <div class="footer card shadow-sm w-100">
                    <a href="{{ $direct_wa }}" target="_blank" type="button" class=" w-100 btn btn-primary buy_btn">
                        Tanya Penjual
                    </a>
                </div>
            </div>
            {{-- <div class="modal fade" id="variant" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      ...
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                  </div>
                </div>
              </div> --}}
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            cartQuantityInitialize()
            getVariantPrice();
        });

        $('input[name=quantity]').on('change', function () {
            getVariantPrice();
            console.log('work')
        });

        function getVariantPrice() {
        if ($('input[name=quantity]').val() > 0 && checkAddToCartValidity()) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });

        }
    }

    function checkAddToCartValidity() {
        var names = {};
        $('#add-to-cart-form input:radio').each(function () { // find unique names
            names[$(this).attr('name')] = true;
        });
        var count = 0;
        $.each(names, function () { // then count them
            count++;
        });
        if ($('input:radio:checked').length == count) {
            return true;
        }
        return false;
    }


        function cartQuantityInitialize() {
            console.log('pressed')
            $('.btn-number').click(function (e) {
                e.preventDefault();

                fieldName = $(this).attr('data-field');
                type = $(this).attr('data-type');
                var input = $("input[name='" + fieldName + "']");
                var currentVal = parseInt(input.val());

                if (!isNaN(currentVal)) {
                    if (type == 'minus') {

                        if (currentVal > input.attr('min')) {
                            input.val(currentVal - 1).change();
                        }
                        if (parseInt(input.val()) == input.attr('min')) {
                            $(this).attr('disabled', true);
                        }

                    } else if (type == 'plus') {

                        if (currentVal < input.attr('max')) {
                            input.val(currentVal + 1).change();
                        }
                        if (parseInt(input.val()) == input.attr('max')) {
                            $(this).attr('disabled', true);
                        }

                    }
                } else {
                    input.val(0);
                }
            });

            $('.input-number').focusin(function () {
                $(this).data('oldValue', $(this).val());
            });

            $('.input-number').change(function () {

                minValue = parseInt($(this).attr('min'));
                maxValue = parseInt($(this).attr('max'));
                valueCurrent = parseInt($(this).val());

                var name = $(this).attr('name');
                if (valueCurrent >= minValue) {
                    $(".btn-number[data-type='minus'][data-field='" + name + "']").removeAttr('disabled')
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Cart',
                        text: '{{('Sorry, the minimum value was reached')}}'
                    });
                    $(this).val($(this).data('oldValue'));
                }
                if (valueCurrent <= maxValue) {
                    $(".btn-number[data-type='plus'][data-field='" + name + "']").removeAttr('disabled')
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Cart',
                        text: '{{('Sorry, stock limit exceeded')}}.'
                    });
                    $(this).val($(this).data('oldValue'));
                }


            });
            $(".input-number").keydown(function (e) {
                // Allow: backspace, delete, tab, escape, enter and .
                if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
                    // Allow: Ctrl+A
                    (e.keyCode == 65 && e.ctrlKey === true) ||
                    // Allow: home, end, left, right
                    (e.keyCode >= 35 && e.keyCode <= 39)) {
                    // let it happen, don't do anything
                    return;
                }
                // Ensure that it is a number and stop the keypress
                if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                    e.preventDefault();
                }
            });
        }
    </script>
</body>

</html>
