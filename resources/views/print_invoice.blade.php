<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('public/css/bootstrap.min.css')}}">
    <title>Invoice Print</title>
    
  </head>
  <body>
    <div class="container">
      <div class="row text-center">
        @php
          $setting = App\Settings::setting();
        @endphp
        <div class="p-5">
          <img style="height: 50px;" src="{{asset($setting->website_logo)}}" alt="logo">
          <h5>{{$setting->website_name}}</h5>
          <p>{{$setting->address}}<br>{{$setting->city}}<br><strong>MEMO NO: {{$coustomer->memo_no}}<br>DATE: {{$coustomer->date}}</strong></p>
        </div>
      </div>
      <div>
        <strong>INVOICE TO</strong>
        <p>Name: {{$coustomer->name}}<br>Address: {{$coustomer->address}}<br>Phone: 0{{$coustomer->phone}}</p>
      </div>
      <table class="table table-bordered table-sm">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Model</th>
            <th scope="col">Quantity</th>
            <th scope="col">Price</th>
          </tr>
        </thead>
        <tbody>
          @php
              $n = 0;
          @endphp
          @foreach ($items as $item)
          <tr>
            <th scope="row">{{++$n}}</th>
            <td>{{$item->model}}</td>
            <td>{{$item->quantity}}</td>
            <td>{{$item->price}}</td>
          </tr>
          @endforeach
          <tr>
            <th colspan="2">Total</th>
            <td><strong>{{App\SellItem::memoQuantity($item->memo_no)}}<small> Pitches</small></strong></td>
            <td><strong>{{App\SellItem::memoPrice($item->memo_no)}}<small> TK</small></strong></td>
          </tr>
        </tbody>
      </table>
      <br>
      <br>
      <div>
        <strong>SELLER</strong>
        <p>Name: {{Session::get('name')}}<br>Phone: {{Session::get('phone')}}</p>
        <br>
        <br>
        <br>
        <div class="row col-12">
          <div>
            ......................<br><strong>SIGNATURE</strong><br><small>(SELLER)</small>
          </div>
          <div class="text-right">
            ......................<br><strong>SIGNATURE</strong><br><small>(COUSTOMER)</small>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>