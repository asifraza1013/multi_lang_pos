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
        #invoice-POS {
    box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5);
    padding: 2mm;
    margin: 0 auto;
    width: 44mm;
    background: #fff;
}
    ::selection {
      background: #f31544;
      color: #fff;
    }
    ::moz-selection {
      background: #f31544;
      color: #fff;
    }
    h1 {
      font-size: 1.5em;
      color: #222;
    }
    h2 {
      font-size: 0.9em;
    }
    h3 {
      font-size: 1.2em;
      font-weight: 300;
      line-height: 2em;
    }
    p {
      font-size: 0.7em;
      color: #666;
      line-height: 1.2em;
    }
  
    #top,
    #mid,
    #bot {
      /* Targets all id with 'col-' */
      border-bottom: 1px solid #eee;
    }
  
    #top {
      min-height: 100px;
    }
    #mid {
      min-height: 80px;
    }
    #bot {
      min-height: 50px;
    }
  
    #top .logo {
      /*float: left; */
      height: 60px;
      width: 60px;
      background: url(http://michaeltruong.ca/images/logo1.png) no-repeat;
      background-size: 60px 60px;
    }
    .clientlogo {
      float: left;
      height: 60px;
      width: 60px;
      background: url(http://michaeltruong.ca/images/client.jpg) no-repeat;
      background-size: 60px 60px;
      border-radius: 50px;
    }
    .info {
      display: block;
      /*float:left; */
      margin-left: 0;
    }
    .title {
      float: right;
    }
    .title p {
      text-align: right;
    }
    table {
      width: 100%;
      border-collapse: collapse;
    }
    td {
      /*padding: 5px 0 5px 15px; */
      /*border: 1px solid #EEE */
    }
    .tabletitle {
      /*padding: 5px; */
      font-size: 0.5em;
      background: #eee;
    }
    .service {
      border-bottom: 1px solid #eee;
    }
    .item {
      width: 24mm;
    }
    .itemtext {
      font-size: 0.5em;
    }
  
    #legalcopy {
      margin-top: 5mm;
    }
    @media print {
        .hidden-print{
            display: none;
        }
    }
  
    </style>
</head>

<body>
    @if(preg_match('~[0-9]~', url()->previous()))
    @php $url = '../../posm'; @endphp
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
    <div id="invoice-POS">

        <center id="top">
          <div class="logo"></div>
          <div class="info">
            <h2>{{$lims_biller_data->company_name}}</h2>
          </div>
          <!--End Info-->
        </center>
        <!--End InvoiceTop-->
      
        <div id="mid">
          <div class="info">
            <h2>{{ trans('file.Contact Info') }}</h2>
            <p>
              {{ trans('file.Address') }} : {{$lims_warehouse_data->address}}</br>
              {{ trans('file.Phone Number') }} : {{$lims_warehouse_data->phone}}</br>
            </p>
          </div>
        </div>
        <!--End Invoice Mid-->
      
        <div id="bot">
      
          <div id="table">
            <table>
              <tr class="tabletitle">
                <td class="item">
                    <h2>{{ trans('file.Description') }}</h2>
                </td>
                <td class="item">
                  <h2>{{ trans('file.Items') }}</h2>
                </td>
                <td class="Hours">
                  <h2>{{ trans('file.Quantity') }}</h2>
                </td>
                <td class="Rate">
                  <h2>{{ trans('file.Subtotal') }}</h2>
                </td>
              </tr>
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
                <tr class="service">
                <td class="tableitem">
                    <div class="media">
                        <img class="mr-1 w-25"
                            src="{{ast_url('images/product/'.$lims_product_data->image)}}">
                        <div class="media-body">
                            <p class="itemtext">{{$product_name}}</p>
                        </div>
                    </div>
                </td>
                <td class="tableitem"><p class="itemtext">{{$general_setting->currency}} {{number_format((float)($product_sale_data->total /
                    $product_sale_data->qty), 2, '.', '')}}</p></td>
                <td class="tableitem"><p class="itemtext">{{$product_sale_data->qty}}</p></td>
                <td class="tableitem"><p class="itemtext">{{$general_setting->currency}} {{number_format((float)$product_sale_data->total, 2, '.',
                    '')}}</p></td>
            </tr>
            @endforeach
              {{-- <tr class="service">
                <td class="tableitem">
                  <p class="itemtext">Communication</p>
                </td>
                <td class="tableitem">
                  <p class="itemtext">5</p>
                </td>
                <td class="tableitem">
                  <p class="itemtext">$375.00</p>
                </td>
              </tr> --}}
              
              <tr class="tabletitle">
                <td></td>
                <td></td>
                <td class="Rate">
                  <h2>{{trans('file.Order Tax')}}</h2>
                </td>
                <td class="payment">
                  <h2>{{number_format((float)$lims_sale_data->order_tax, 2, '.',
                    '')}}</h2>
                </td>
              </tr>
              @if($lims_sale_data->order_discount)
              <tr class="tabletitle">
                <td></td>
                <td></td>
                <td class="Rate">
                  <h2>{{trans('file.Order Discount')}}</h2>
                </td>
                <td class="payment">
                  <h2>{{number_format((float)$lims_sale_data->order_discount,
                    2, '.', '')}}</h2>
                </td>
              </tr>
              @endif

              <tr class="tabletitle">
                <td></td>
                <td></td>
                <td class="Rate">
                  <h2>{{trans('file.grand total')}}</h2>
                </td>
                <td class="payment">
                  <h2>{{number_format((float)$lims_sale_data->grand_total, 2,
                    '.', '')}}</h2>
                </td>
              </tr>
      
            </table>
          </div>
          <!--End Table-->
      
          <div id="legalcopy">
            <p class="m-0 font-weight-bold"> {{trans('file.Note')}}: </p>
            <p>{{trans('file.Thank you for shopping with us. Please come again')}}</p>
          </div>
      
        </div>
        <!--End InvoiceBot-->
      </div>
      <!--End Invoice-->
    <script type="text/javascript">
        function auto_print() {     
            window.print()
        }
        setTimeout(auto_print, 1000);
    </script>
</body>

</html>