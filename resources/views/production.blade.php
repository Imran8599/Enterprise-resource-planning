@extends('master')
@section('mainSection')
  <div class="col-md-12 collapse" id="collapse">
    <div class="card">
      <div class="card-header card-header-info">
        <h4 class="card-title d-inline">Add New</h4>
        <a data-toggle="collapse" href="#collapse" type="submit" class="pull-right text-light"><i class="material-icons pl-2">close</i></a>
      </div>
      <div class="card-body">
        <form action="{{url('production')}}" method="POST">
          @csrf
          <div class="row">
            <div class="col-md-6">
              <h3 class="p-3 text-primary">Production</h3>
              <div class="col-md-12">
                <div class="form-group">
                  <label class="bmd-label-floating">Date</label>
                  <input name="date" type="text" class="form-control" value="{{date('d-m-Y')}}">
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <select name="product" class="form-control">
                      <option class="bmd-label-floating" selected disabled>- - Select Size - -</option>
                      @foreach ($products as $product)
                        <option value="{{$product->model}}">{{$product->model}}</option>
                      @endforeach
                  </select>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label class="bmd-label-floating">Total Pitches</label>
                  <input name="pitches" type="number" class="form-control">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <h3 class="p-3 text-primary">Expanse</h3>
              <div class="col-md-12">
                @foreach ($import_types as $import_type)
                  <div class="form-group">
                    <label class="bmd-label-floating">{{$import_type->import_type}}</label>
                    <input name="used_products[]" type="hidden" class="form-control" value="{{$import_type->import_type}}">
                    <input name="used_quantitys[]" type="text" class="form-control" value="">
                  </div>
                @endforeach
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary pull-right"><i class="material-icons pr-1">add</i>add</button>
          <div class="clearfix"></div>
        </form>
      </div>
    </div>
  </div>
  <div class="col-md-12">
    <div class="card">
      <div class="card-header card-header-info">
        <h4 class="card-title d-inline">All Productions</h4>
        <a data-toggle="collapse" href="#collapse" type="submit" class="pull-right text-light">Add New<i class="material-icons pl-2">add</i></a>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table data_table">
            <thead class=" text-primary">
              <th>
                No
              </th>
              <th>
                Date
              </th>
              <th>
                Model
              </th>
              <th>
                Total Pitches
              </th>
              @foreach ($import_types as $import_type)
              <th>
                {{$import_type->import_type}}
              </th>
              @endforeach
            </thead>
            <tbody>
              @foreach ($rows as $row)
                <tr>
                  <td>
                    {{$row->id}}
                  </td>
                  <td>
                    {{$row->date}}
                  </td>
                  <td>
                    {{$row->product}}
                  </td>
                  <td>
                    {{$row->pitches}} Pitches
                  </td>
                  @foreach ($import_types as $import_type)
                  <td>
                    {{App\ImportsUsed::used($row->date, $import_type->import_type)}}
                  </td>
                  @endforeach
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection