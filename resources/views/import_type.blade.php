@extends('master')
@section('mainSection')
  <div class="col-md-12 {{Request::is('import-type-edit*')?'':'collapse'}}" id="collapse">
    <div class="card">
      <div class="card-header card-header-info">
        <h4 class="card-title d-inline">Add New</h4>
        <a data-toggle="collapse" href="#collapse" type="submit" class="pull-right text-light"><i class="material-icons pl-2">close</i></a>
      </div>
      <div class="card-body">
        <form action="{{url(Request::is('import-type-edit*')?'import-type-update':'import-type')}}" method="POST">
          @csrf
          <input type="hidden" name="id" value="{{Request::is('import-type-edit*')?$type->id:''}}">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label class="bmd-label-floating">Import Type</label>
                <input name="import_type" type="text" class="form-control" value="{{Request::is('import-type-edit*')?$type->import_type:''}}">
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary pull-right"><i class="material-icons pr-1">add</i>{{Request::is('import-type-edit*')?'Update':'Add'}}</button>
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
                Type
              </th>
              <th>
                Action
              </th>
            </thead>
            <tbody>
              @foreach ($rows as $row)
                <tr>
                  <td>
                    {{$row->id}}
                  </td>
                  <td>
                    {{$row->import_type}}
                  </td>
                  <td>
                    <a href="{{url('import-type-edit',$row->id)}}"><i class="pt-2 material-icons text-success">update</i></a><a href="{{url('import-type-delete',$row->id)}}"><i class="pt-2 material-icons text-danger">close</i></a>
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