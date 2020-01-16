@extends('master')
@section('mainSection')
<div class="card">
    <div class="card-header card-header-info">
      <h4 class="card-title">Every Day Details</h4>
    </div>
    <div class="card-body">
        <form action="{{url('everyday-search')}}" method="POST">
          @csrf
          <div class="row">
            <div class="div col-md-3">
              <div class="form-group">
                <label>Day</label>
                <select name="day" class="form-control">
                  @php
                      $day = date('d');
                  @endphp
                  @for($n = 1; $n<=31; $n++)
                    <option {{$day==$n? 'selected':''}} value="{{$n}}">{{$n}}</option>
                  @endfor
                </select>
              </div>
            </div>
            <div class="div col-md-3">
              <div class="form-group">
                <label>Month</label>
                <select name="month" class="form-control niceSelect">
                  @php
                      $current_month = date('F');
                  @endphp
                  <option {{$current_month == 'January'?'selected':''}} value="01">January</option>
                  <option {{$current_month == 'February'?'selected':''}} value="02">February</option>
                  <option {{$current_month == 'March'?'selected':''}} value="03">March</option>
                  <option {{$current_month == 'April'?'selected':''}} value="04">April</option>
                  <option {{$current_month == 'May'?'selected':''}} value="05">May</option>
                  <option {{$current_month == 'June'?'selected':''}} value="06">June</option>
                  <option {{$current_month == 'July'?'selected':''}} value="07">July</option>
                  <option {{$current_month == 'August'?'selected':''}} value="08">August</option>
                  <option {{$current_month == 'September'?'selected':''}} value="09">September</option>
                  <option {{$current_month == 'October'?'selected':''}} value="10">October</option>
                  <option {{$current_month == 'November'?'selected':''}} value="11">November</option>
                  <option {{$current_month == 'December'?'selected':''}} value="12">December</option>
                </select>
              </div>
            </div>
            <div class="div col-md-3">
              <div class="form-group">
                <label>Year</label>
                @php
                  $start = date('Y');
                  $end = 2010;
                @endphp
                <select name="year" id="year" class="form-control niceSelect">
                  @for($start; $start>=$end; $start--)
                    <option value="{{$start}}">{{$start}}</option>
                  @endfor
                </select>
              </div>
            </div>
            <div class="div col-md-3 pt-2">
              <button type="submit" class="btn btn-primary ml-auto mt-4 btn-block">Search</button>
            </div>
          </div>
          <div class="clearfix"></div>
        </form>
    
    
        @php
            $i = 0;
        @endphp
        <div class="pt-0 {{Request::is('everyday-search')?$i=1:'collapse'}}">
          @if ($i == 1)
          <div class="card bg-info p-2">
            <div class="row">
              <div class="col-md-3">
                <table class="table table-sm">
                  <h3 class="pl-2">Expanse</h3>
                  <thead>
                    <th>Name</th>
                    <th>Value</th>
                  </thead>
                  <tbody>
                    <tr>
                      <td><strong>Date</strong></td>
                      <td>{{$date}}</td>
                    </tr>
                    <tr>
                      <td><strong>Expanse</strong></td>
                      <td>{{App\Extracost::dayExpanse($date)}} <small>TK</small></td>
                    </tr>
                    <tr>
                      <td><strong>Import</strong></td>
                      <td>{{App\Imports::dayImport($date)}} <small>TK</small></td>
                    </tr>
                    <tr>
                      <td><strong>Salary</strong></td>
                      <td>{{App\Payroll::daySalary($date2)}} <small>TK</small></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="col-md-3">
                <table class="table table-sm">
                  <h3 class="pl-2">Sell</h3>
                  <thead>
                    <th>Model</th>
                    <th>Quantity</th>
                    <th>Price</th>
                  </thead>
                  <tbody>
                    @foreach ($products as $product)
                    <tr>
                      <td>{{$product->model}}</td>
                      <td>{{App\SellItem::daySellModel($date,$product->model)}}</td>
                      <td>{{App\SellItem::daySellPrice($date,$product->model)}}</td>
                    </tr>
                    @endforeach
                    <tr>
                      <td><strong>Total:</strong></td>
                      <td><strong>{{App\Cashmemo::daySellQuantity($date)}} <small>Pitches</small></strong></td>
                      <td><strong>{{App\Cashmemo::dayIncome($date)}} <small>TK</small></strong></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="col-md-3">
                <table class="table table-sm">
                  <h3 class="pl-2">Made</h3>
                  <thead>
                    <th>Model</th>
                    <th>Quantity</th>
                  </thead>
                  <tbody>
                    @foreach ($products as $product)
                    <tr>
                      <td>{{$product->model}}</td>
                      <td>{{App\Production::dayMadeModel($date,$product->model)}}</td>
                    </tr>
                    @endforeach
                    <tr>
                      <td><strong>Total:</strong></td>
                      <td><strong>{{App\Production::dayMadeTotal($date)}} <small>Pitches</small></strong></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="col-md-3">
                <table class="table table-sm">
                  <h3 class="pl-2">Used</h3>
                  <thead>
                    <th>Model</th>
                    <th>Quantity</th>
                  </thead>
                  <tbody>
                    @foreach ($importTypes as $importType)
                    <tr>
                      <td>{{$importType->import_type}}</td>
                      <td>{{App\ImportsUsed::dayImportsUsed($date, $importType->import_type)}}</td>
                    </tr>
                    @endforeach
                    <tr>
                      <td><strong>Total:</strong></td>
                      <td><strong>{{App\ImportsUsed::dayUsedTotal($date)}} <small>Bag</small></strong></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          @endif
        </div>
    </div>
</div>
@endsection