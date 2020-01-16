@extends('master')
@section('mainSection')
  <div class="col-md-12 {{Request::is('department-edit*')?'':'collapse'}}" id="collapse">
    <div class="card">
      <div class="card-header card-header-info">
        <h4 class="card-title d-inline">Add New</h4>
        <a data-toggle="collapse" href="#collapse" type="submit" class="pull-right text-light"><i class="material-icons pl-2">close</i></a>
      </div>
      <div class="card-body">
        <form action="{{url(Request::is('department-edit*')?'department-update':'department')}}" method="POST">
          @csrf
          <input type="hidden" name="id" value="{{Request::is('department-edit*')?$department->id:''}}">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label class="bmd-label-floating">Department</label>
                <input name="department" type="text" class="form-control" value="{{Request::is('department-edit*')?$department->department:''}}">
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary pull-right"><i class="material-icons pr-1">add</i>{{Request::is('department-edit*')?'Update':'Add'}}</button>
          <div class="clearfix"></div>
        </form>
      </div>
    </div>
  </div>
  <div class="col-md-12">
    <div class="card">
      <div class="card-header card-header-info">
        <h4 class="card-title d-inline">All Department</h4>
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
                Department
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
                    {{$row->department}}
                  </td>
                  <td>
                    <a href="{{url('department-edit',$row->id)}}"><i class="pt-2 material-icons text-success">update</i></a><a href="{{url('department-delete',$row->id)}}"><i class="pt-2 material-icons text-danger">close</i></a>
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