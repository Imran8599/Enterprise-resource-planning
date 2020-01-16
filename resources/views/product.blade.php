@extends('master')
@section('mainSection')
  <div class="col-md-12 {{Request::is('product-edit*')?'':'collapse'}}" id="collapse">
    <div class="card">
      <div class="card-header card-header-info">
        <h4 class="card-title d-inline">Add New</h4>
        <a data-toggle="collapse" href="#collapse" type="submit" class="pull-right text-light"><i class="material-icons pl-2">close</i></a>
      </div>
      <div class="card-body">
        <form action="{{url(Request::is('product-edit*')?'product-update':'product')}}" method="POST">
          @csrf
          <input type="hidden" name="id" value="{{Request::is('product-edit*')?$product->id:''}}">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label class="bmd-label-floating">Model</label>
                <input name="model" type="text" class="form-control" value="{{Request::is('product-edit*')?$product->model:''}}">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label class="bmd-label-floating">Price</label>
                <input name="price" type="number" class="form-control" value="{{Request::is('product-edit*')?$product->price:''}}">
              </div>
            </div>
          </div>
          <button onclick="return confirm('Are you sure ?')" type="submit" class="btn btn-primary pull-right"><i class="material-icons pr-1">add</i>{{Request::is('product-edit*')?'Update':'Add'}}</button>
          <div class="clearfix"></div>
        </form>
      </div>
    </div>
  </div>
  <div class="col-md-12">
    <div class="card">
      <div class="card-header card-header-info">
        <h4 class="card-title d-inline">All Products</h4>
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
                Model
              </th>
              <th>
                Price
              </th>
              <th>
                Action
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
                    {{$row->model}}
                  </td>
                  <td>
                    {{$row->price}} <small>TK</small>
                  </td>
                  <td>
                    <a class="text-success" href="{{url('product-edit',$row->id)}}"><i class="material-icons">edit</i></a>
                    <a class="text-danger" href="{{url('product-delete',$row->id)}}"><i class="material-icons">delete</i></a>
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