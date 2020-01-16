@extends('master')
@section('mainSection')
  <div class="col-md-12 collapse" id="collapse">
    <div class="card">
      <div class="card-header card-header-info">
        <h4 class="card-title d-inline">Add New</h4>
        <a data-toggle="collapse" href="#collapse" type="submit" class="pull-right text-light"><i class="material-icons pl-2">close</i></a>
      </div>
      <div class="card-body">
        <form action="{{url('import')}}" method="POST">
          @csrf
          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label class="bmd-label-floating">Date</label>
                <input name="date" type="text" class="form-control" value="{{date('d-m-Y')}}">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group m-1">
                <select name="subject" class="form-control">
                    <option selected disabled>- - Select Subject - -</option>
                    @foreach ($import_types as $type)
                      <option value="{{$type->import_type}}">{{$type->import_type}}</option>
                    @endforeach
                </select>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label class="bmd-label-floating">Quantity</label>
                <input name="quantity" type="number" class="form-control">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label class="bmd-label-floating">Price</label>
                <input name="price" type="number" class="form-control">
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
        <h4 class="card-title d-inline">All Imports</h4>
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
                Subject
              </th>
              <th>
                Quantity
              </th>
              <th>
                Price
              </th>
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
                    {{$row->subject}}
                  </td>
                  <td>
                    {{$row->quantity}} <small>Bag</small>
                  </td>
                  <td>
                    {{$row->price}} <small>TK</small>
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