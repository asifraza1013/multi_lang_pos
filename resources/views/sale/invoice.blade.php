<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo ast_url('vendor/bootstrap/css/bootstrap.min.css') ?>" type="text/css">
    <!-- Font Awesome -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"> -->
    <!-- Custom Style -->
    <link rel="icon" type="image/png" href="{{url('logo', $general_setting->site_logo)}}" />
    <title>{{$general_setting->site_title}}</title>
    <style>
        :root {
            --body-bg: rgb(204, 204, 204);
            --white: #ffffff;
            --darkWhite: #ccc;
            --black: #000000;
            --dark: #615c60;
            --themeColor: #22b8d1;
            --pageShadow: 0 0 0.5cm rgba(0, 0, 0, 0.5);
        }

        /* Font Include */
        @import url('https://fonts.googleapis.com/css2?family=Rajdhani:wght@600&display=swap');

        body {
            background-color: var(--body-bg);
        }

        .page {
            background: var(--white);
            display: block;
            margin: 0 auto;
            position: relative;
            box-shadow: var(--pageShadow);
        }

        .page[size="A4"] {
            width: 21cm;
            height: 29.7cm;
            overflow: hidden;
        }

        .bb {
            border-bottom: 3px solid var(--darkWhite);
        }

        /* Top Section */
        .top-content {
            padding-bottom: 15px;
        }

        .logo img {
            height: 60px;
        }

        .top-left p {
            margin: 0;
        }

        .top-left .graphic-path {
            height: 40px;
            position: relative;
        }

        .top-left .graphic-path::before {
            content: "";
            height: 20px;
            background-color: var(--dark);
            position: absolute;
            left: 15px;
            right: 0;
            top: -15px;
            z-index: 2;
        }

        .top-left .graphic-path::after {
            content: "";
            height: 22px;
            width: 17px;
            background: var(--black);
            position: absolute;
            top: -13px;
            left: 6px;
            transform: rotate(45deg);
        }

        .top-left .graphic-path p {
            color: var(--white);
            height: 40px;
            left: 0;
            right: -100px;
            text-transform: uppercase;
            background-color: var(--themeColor);
            font: 26px;
            z-index: 3;
            position: absolute;
            padding-left: 10px;
        }

        /* User Store Section */
        .store-user {
            padding-bottom: 25px;
        }

        .store-user p {
            margin: 0;
            font-weight: 600;
        }

        .store-user .address {
            font-weight: 400;
        }

        .store-heading {
            color: var(--themeColor);
            font-family: 'Rajdhani', sans-serif;
            font-weight: bold;
        }

        .extra-info p span {
            font-weight: 400;
        }

        /* Product Section */
        thead {
            color: var(--white);
            background: var(--themeColor);
        }

        .table td,
        .table th {
            text-align: center;
            vertical-align: middle;
        }

        tr th:first-child,
        tr td:first-child {
            text-align: left;
        }

        .media img {
            height: 60px;
            width: 60px;
        }

        .media p {
            font-weight: 400;
            margin: 0;
        }

        .media p.title {
            font-weight: 600;
        }

        /* Balance Info Section */
        .balance-info .table td,
        .balance-info .table th {
            padding: 0;
            border: 0;
        }

        .balance-info tr td:first-child {
            font-weight: 600;
        }

        tfoot {
            border-top: 2px solid var(--darkWhite);
        }

        tfoot td {
            font-weight: 600;
        }

        /* Cart BG */
        .cart-bg {
            height: 250px;
            bottom: 32px;
            left: -40px;
            opacity: 0.3;
            position: absolute;
        }

        /* Footer Section */
        footer {
            text-align: center;
            position: absolute;
            bottom: 30px;
            left: 75px;
        }

        footer hr {
            margin-bottom: -22px;
            border-top: 3px solid var(--darkWhite);
        }

        footer a {
            color: var(--themeColor);
        }

        footer p {
            padding: 6px;
            border: 3px solid var(--darkWhite);
            background-color: var(--white);
            display: inline-block;
        }
        @media print {
            /* * {
                font-size:12px;
                line-height: 20px;
            }
            td,th {padding: 5px 0;} */
            .hidden-print {
                display: none !important;
            }
            @page { margin: 0; } body { margin: 0.5cm; margin-bottom:1.6cm; } 
        }
    </style>
</head>

<body>
    @if(preg_match('~[0-9]~', url()->previous()))
    @php $url = '../../pos'; @endphp
    @else
    @php $url = url()->previous(); @endphp
    @endif
    <div class="hidden-print">
        <div class="row w-50 m-auto">
            <div class="col-6">
                <a href="{{$url}}" class="btn btn-info"><i class="fa fa-arrow-left"></i> {{trans('file.Back')}}</a>
            </div>
            <div class="col-6">
                <button onclick="window.print();" class="btn btn-primary"><i class="dripicons-print"></i>
                    {{trans('file.Print')}}</button>
            </div>
        </div>
        <br>
    </div>
    <div class="my-5 page receipt-data" size="A4">
        <div class="p-5">
            <section class="top-content bb d-flex justify-content-between">
                <div class="logo">
                    <img src="{{ast_url('images/in_logo.png')}}" alt="" class="img-fluid">
                </div>
                <div class="top-left">
                    <div class="graphic-path">
                        <p>{{trans('file.reference')}}</p>
                    </div>
                    <div class="position-relative">
                        <p>{{$lims_sale_data->reference_no}}</p>
                    </div>
                </div>
            </section>

            <section class="store-user mt-5">
                <div class="col-10">
                    <div class="row bb pb-3">
                        <div class="col-7">
                            <h5 class="store-heading bold">{{$lims_biller_data->company_name}}</h5>
                            <p class="address">{{$lims_warehouse_data->address}} </p>
                            <div class="txn mt-2">{{$lims_warehouse_data->phone}}</div>
                        </div>
                        <div class="col-5">
                            <p>{{trans('file.customer')}},</p>
                            <h5 class="store-heading">{{$lims_customer_data->name}}</h5>
                            <p class="address"> {{$lims_customer_data->address}} </p>
                            <div class="txn mt-2">{{$lims_customer_data->phone_number}}</div>
                        </div>
                    </div>
                    <div class="row extra-info pt-3">
                        <div class="col-7">
                            <p>{{trans('file.Payment Mode')}}: <span>{{trans('file.Quick Cash')}}</span></p>
                            <p>{{trans('file.reference')}}: <span>{{$lims_sale_data->reference_no}}</span></p>
                        </div>
                        <div class="col-5">
                            <p>{{trans('file.Date')}}: <span>{{$lims_sale_data->created_at}}</span></p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="product-area mt-4">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <td>{{trans('file.Description')}}</td>
                            <td>{{trans('file.price')}}</td>
                            <td>{{trans('file.Quantity')}}</td>
                            <td>{{trans('file.Total')}}</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($lims_product_sale_data as $product_sale_data)
                        @php
                        $lims_product_data = \App\Product::find($product_sale_data->product_id);
                        if($product_sale_data->variant_id) {
                        $variant_data = \App\Variant::find($product_sale_data->variant_id);
                        $product_name = $lims_product_data->name.' ['.$variant_data->name.']';
                        }
                        else
                        $product_name = $lims_product_data->name;
                        @endphp
                        <tr>
                            <td>
                                <div class="media">
                                    <img class="mr-3 img-fluid"
                                        src="{{ast_url('images/product/'.$lims_product_data->image)}}" alt="Product 01">
                                    <div class="media-body">
                                        <p class="mt-0 title">{{$product_name}}</p>
                                    </div>
                                </div>
                            </td>
                            <td>{{$general_setting->currency}} {{number_format((float)($product_sale_data->total /
                                $product_sale_data->qty), 2, '.', '')}}</td>
                            <td>{{$product_sale_data->qty}}</td>
                            <td>{{$general_setting->currency}} {{number_format((float)$product_sale_data->total, 2, '.',
                                '')}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </section>
            <section class="balance-info">
                <div class="row">
                    <div class="col-8">
                        <p class="m-0 font-weight-bold"> {{trans('file.Note')}}: </p>
                        <p>{{trans('file.Thank you for shopping with us. Please come again')}}</p>
                    </div>
                    <div class="col-4">
                        <table class="table border-0 table-hover">
                            <tr>
                                <td>{{trans('file.Total')}}:</td>
                                <td>{{number_format((float)$lims_sale_data->total_price, 2, '.', '')}}</td>
                            </tr>
                            @if($lims_sale_data->order_tax)
                            <tr>
                                <td colspan="2">{{trans('file.Order Tax')}}</td>
                                <td style="text-align:right">{{number_format((float)$lims_sale_data->order_tax, 2, '.',
                                    '')}}</td>
                            </tr>
                            @endif
                            <tfoot>
                                @if($lims_sale_data->order_discount)
                                <tr>
                                    <td colspan="2">{{trans('file.Order Discount')}}</td>
                                    <td style="text-align:right">{{number_format((float)$lims_sale_data->order_discount,
                                        2, '.', '')}}</td>
                                </tr>
                                @endif
                                @if($lims_sale_data->coupon_discount)
                                <tr>
                                    <td colspan="2">{{trans('file.Coupon Discount')}}</td>
                                    <td style="text-align:right">
                                        {{number_format((float)$lims_sale_data->coupon_discount, 2, '.', '')}}</td>
                                </tr>
                                @endif
                                @if($lims_sale_data->shipping_cost)
                                <tr>
                                    <td colspan="2">{{trans('file.Shipping Cost')}}</td>
                                    <td style="text-align:right">{{number_format((float)$lims_sale_data->shipping_cost,
                                        2, '.', '')}}</td>
                                </tr>
                                @endif
                                <tr>
                                    <td colspan="2">{{trans('file.grand total')}}</td>
                                    <td style="text-align:right">{{number_format((float)$lims_sale_data->grand_total, 2,
                                        '.', '')}}</td>
                                </tr>
                            </tfoot>
                        </table>

                        <!-- Signature -->
                        {{-- <div class="col-12">
                            <!-- <img src="signature.png" class="img-fluid" alt=""> -->
                            <p class="text-center m-0"> Director Signature </p>
                        </div> --}}
                    </div>
                </div>
            </section>

            <!-- Cart BG -->
            <div class="row bb pb-3">
                <div class="col-6">
                    <img src="{{ast_url('images/cart.jpg')}}" class="img-fluid cart-bg" alt="" style="position: relative; height:auto; bottom:0px">
                </div>
                <div class="col-6 text-right">
                    <img src="{{ast_url('images/qr_code.jpeg')}}" class="img-fluid cart-bg" alt="" style="position: relative; width:120px; height:auto; bottom:0px;top: 80px;opacity:0.8">
                </div>
            </div>

            <footer style="width: 90%;margin:auto;left:35px">
                <hr>
                <p class="m-0 text-center">
                   {{trans('file.Email')}} - {{$lims_warehouse_data->email}}
                </p>
                {{-- <div class="social pt-3">
                    <span class="pr-2">
                        <i class="fas fa-mobile-alt"></i>
                        <span>{{$lims_warehouse_data->phone}}</span>
                    </span>
                    <span class="pr-2">
                        <i class="fas fa-envelope"></i>
                        <span>{{$lims_warehouse_data->email}}</span>
                    </span>
                </div> --}}
            </footer>
        </div>
    </div>
    <script type="text/javascript">
        function auto_print() {     
            window.print()
        }
        setTimeout(auto_print, 1000);
    </script>
</body>

</html>