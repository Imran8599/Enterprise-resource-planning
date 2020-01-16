@extends('master')

@section('mainSection')
      
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-header card-header-warning card-header-icon">
            <div class="card-icon">
              <i class="material-icons">account_balance</i>
            </div>
            <p class="card-category">Total <br> Expense/Income</p>
            <h4 class="card-title pt-3">{{App\Extracost::totalExpanse()+App\Payroll::payrollTotal()+App\Imports::importTotal()}} | {{App\Cashmemo::totalIncome()}}<br><small class="card-category">TK.</small></h4>
          </div>
          <div class="card-footer">
            <div class="stats">
              <i class="material-icons">access_time</i>From first to now
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-header card-header-danger card-header-icon">
            <div class="card-icon">
              <i class="material-icons">account_balance_wallet</i>
            </div>
            <p class="card-category">Total <br> Made | Sale</p>
            <h4 class="card-title pt-3">{{App\Production::madeTotal()}} | {{App\Cashmemo::sellTotal()}}<br><small class="card-category">Pitches</small></h4>
          </div>
          <div class="card-footer">
            <div class="stats">
              <i class="material-icons">access_time</i>From first to now
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-header card-header-success card-header-icon">
            <div class="card-icon">
              <i class="material-icons">store_mall_directory</i>
            </div>
            <p class="card-category">Total <br> Employee</p>
            <h4 class="card-title pt-3">{{App\Employee::totalEmployee()}}<br><small class="card-category">Persone</small></h4>
          </div>
          <div class="card-footer">
            <div class="stats">
              <i class="material-icons">access_time</i>From first to now
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-header card-header-primary card-header-icon">
            <div class="card-icon">
              <i class="material-icons">storefront</i>
            </div>
            <p class="card-category">Total <br> Coustomer</p>
            <h4 class="card-title pt-3">{{App\Cashmemo::totalCoustomer()}}<br><small class="card-category">Persone</small></h4>
          </div>
          <div class="card-footer">
            <div class="stats">
              <i class="material-icons">access_time</i>From first to now
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-12">
    <div class="card">
      <div class="card-header card-header-info">
        <h4 class="card-title"> Currently in stock.</h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table">
            <thead class=" text-primary">
              @foreach ($products as $product)
              <th>{{$product->model}}</th>
              @endforeach
              @foreach ($importTypes as $importType)
              <th>{{$importType->import_type}}</th>
              @endforeach
            </thead>
            <tbody>
              <tr>
                @foreach ($products as $product)
                <td>{{App\Production::totalMade($product->model)-App\SellItem::totalSell($product->model)}} <small>Pitches</small></td>
                @endforeach
                @foreach ($importTypes as $importType)
                <td>{{App\Imports::totalImports($importType->import_type)-App\ImportsUsed::totalImportsUsed($importType->import_type)}} <small>Bag</small></td>
                @endforeach
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  
@endsection
