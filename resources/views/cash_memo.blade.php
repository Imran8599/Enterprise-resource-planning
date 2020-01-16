@extends('master')
@section('mainSection')
  <div class="col-md-12 collapse" id="collapse">
    <div class="card">
      <div class="card-header card-header-info">
        <h4 class="card-title d-inline">Add New</h4>
        <a data-toggle="collapse" href="#collapse" type="submit" class="pull-right text-light"><i class="material-icons pl-2">close</i></a>
      </div>
      <div class="card-body font-weight-bold">
        <form action="{{url('cashmemo')}}" method="POST">
          @csrf
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label class="bmd-label-floating">Name</label>
                <input name="name" type="text" class="form-control">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label class="bmd-label-floating">Mobile</label>
                <input name="phone" type="number" class="form-control">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label class="bmd-label-floating">Memo Number</label>
                <input name="memo_no" type="number" class="form-control" value="{{20200000+App\Cashmemo::memoCount()+1}}">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-9">
              <div class="form-group">
                <label class="bmd-label-floating">Address</label>
                <input name="address" type="text" class="form-control">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label class="bmd-label-floating">Date</label>
                <input name="date" type="text" class="form-control" value="{{date('d-m-Y')}}">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-9">
              @php
                  $n = 1;
              @endphp
              @foreach ($products as $product)
              <div class="row">
                <div class="col-md-2">
                  <div class="form-group">
                    <p class="pt-2">Model: {{$product->model}}</p>
                    <input name="product_model[]" type="hidden" class="form-control" value="{{$product->model}}">
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <p class="pt-2 pull-right">Quantity:</p>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <input name="quantity[]" id="quantity{{$n}}" type="text" class="form-control quantitytt" onkeyup="Price{{$n}}()" value="0">
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <p class="pt-2">Price 1ps: {{$product->price}}</p>
                    <input name="pitchPrice[]" id="price1ps{{$n}}" type="hidden" class="form-control" value="{{$product->price}}">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <p class="pt-2" id="price{{$n}}">Price: </p>
                    <input name="price[]" id="priceInput{{$n}}" type="hidden" class="form-control" value="0">
                  </div>
                </div>
              </div>
              <script>
                function Price{{$n}}()
                {
                  var quantity = parseInt($('#quantity{{$n}}').val());
                  var price = parseInt($('#price1ps{{$n}}').val());
                  $('#price{{$n}}').text('Price: '+quantity*price);
                  $('#priceInput{{$n}}').val(quantity*price);
                }
              </script>
              @php
                  ++$n
              @endphp
              @endforeach

            </div>
            <div class="col-md-3 pt-md-5 ">
              <p class="d-inline" id="totalPitches">Total Pitches: 0</p>
              <input name="totalPitches" type="hidden" class="form-control" id="totalPitchesInput">

              <p id="totalPrice">Total Price: 0</p>
              <input name="totalPrice" type="hidden" class="form-control" id="totalPriceInput">

              <p class="mt-md-5">Seller: {{Session::get('name')}}</p>
              <input name="seller_name" type="hidden" class="form-control" value="{{Session::get('name')}}">

              <p>Mobile: 0{{Session::get('phone')}}</p>
              <input name="seller_phone" type="hidden" class="form-control" value="0{{Session::get('phone')}}">
            </div>

          </div>
          <button type="submit" class="btn btn-primary pull-right">Genereate</button>
          <div class="clearfix"></div>
        </form>
      </div>
    </div>
  </div>
  <div class="col-md-12">
    <div class="card">
      <div class="card-header card-header-info">
        <h4 class="card-title d-inline">Cash Memos</h4>
        <a data-toggle="collapse" href="#collapse" type="submit" class="pull-right text-light">Add New<i class="material-icons pl-2">add</i></a>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table data_table">
            <thead class="text-primary">
              <th>
                No
              </th>
              <th>
                Memo No
              </th>
              <th>
                Date
              </th>
              <th>
                Name
              </th>
              <th>
                Mobile
              </th>
              <th>
                Address
              </th>
              <th>
                Pitches
              </th>
              <th>
                Price
              </th>
              <th>
                Seller
              </th>
              <th>
                Details
              </th>
            </thead>
            <tbody>
              @php
                  $n = 0;
              @endphp
              @foreach ($rows as $row)
                <tr>
                  <td>
                    {{++$n}}
                  </td>
                  <td>
                    {{$row->memo_no}}
                  </td>
                  <td>
                    {{$row->date}}
                  </td>
                  <td>
                    {{$row->name}}
                  </td>
                  <td>
                    {{$row->phone}}
                  </td>
                  <td>
                    {{$row->address}}
                  </td>
                  <td>
                    {{$row->pitches}} <small>Pitches</small>
                  </td>
                  <td>
                    {{$row->price}} <small>TK.</small>
                  </td>
                  <td>
                    {{$row->seller}}
                  </td>
                  <td>
                    <a href="{{url('print-invoice',$row->id)}}" target="_blank"><i class="material-icons pl-2 text-primary">print</i></a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection