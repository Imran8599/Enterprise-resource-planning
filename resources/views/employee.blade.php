@extends('master')
@section('mainSection')
  <div class="col-md-12 {{Request::is('employee-edit*')?'':'collapse'}}" id="collapse">
    <div class="card">
      <div class="card-header card-header-info">
        <h4 class="card-title d-inline">Add New</h4>
        <a data-toggle="collapse" href="#collapse" type="submit" class="pull-right text-light"><i class="material-icons pl-2">close</i></a>
      </div>
      <div class="card-body">
        <form action="{{url(Request::is('employee-edit*')?'employee-update':'employee')}}" method="POST">
          @csrf
          <input type="hidden" name="id" value="{{Request::is('employee-edit*')?$employee->id:''}}">
          <div class="row">
            <div class="col-md-8">
              <div class="form-group">
                <label class="bmd-label-floating">Name</label>
                <input name="name" type="text" class="form-control" value="{{Request::is('employee-edit*')?$employee->name:''}}">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label class="bmd-label-floating">Mobile</label>
                <input name="phone" type="number" class="form-control" {{Request::is('employee-edit*')?'readonly':''}} value="{{Request::is('employee-edit*')?$employee->phone:''}}">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label class="bmd-label-floating">Address</label>
                <input name="address" type="text" class="form-control" value="{{Request::is('employee-edit*')?$employee->address:''}}">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label class="bmd-label-floating">Date of birth</label>
                <input name="date_of" type="text" class="form-control" value="{{Request::is('employee-edit*')?$employee->date_of:''}}">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group m-1">
                <select name="department" class="form-control">
                    <option selected disabled>- - Select Department - -</option>
                    @foreach ($departments as $dep)
                      <option {{Request::is('employee-edit*')?($employee->department == $dep->department?'selected':''):''}} value="{{$dep->department}}">{{$dep->department}}</option>
                    @endforeach
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label class="bmd-label-floating">Votar ID</label>
                <input name="votar_id" type="number" class="form-control"  value="{{Request::is('employee-edit*')?$employee->votar_id:''}}">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label class="bmd-label-floating">Salary</label>
                <input name="salary" type="number" class="form-control" value="{{Request::is('employee-edit*')?$employee->salary:''}}">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label class="bmd-label-floating">Password</label>
                <input name="password" type="password" class="form-control" {{Request::is('employee-edit*')?'readonly':''}} value="{{Request::is('employee-edit*')? Crypt::decryptString($employee->password):''}}">
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary pull-right"><i class="material-icons pr-1">add</i>{{Request::is('employee-edit*')?'Update':'Add'}}</button>
          <div class="clearfix"></div>
        </form>
      </div>
    </div>
  </div>
  <div class="col-md-12">
    <div class="card">
      <div class="card-header card-header-info">
        <h4 class="card-title d-inline">All Employees</h4>
        <a data-toggle="collapse" href="#collapse" type="submit" class="pull-right text-light pl-5">Add New<i class="material-icons pl-2">add</i></a>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table data_table">
            <thead class=" text-primary">
              <th>
                No
              </th>
              <th>
                Name
              </th>
              <th>
                Mobile
              </th>
              <th>
                Department
              </th>
              <th>
                Salary
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
                    {{$row->name}}
                  </td>
                  <td>
                    {{$row->phone}}
                  </td>
                  <td>
                    {{$row->department}}
                  </td>
                  <td>
                    {{$row->salary}} <small>TK.</small>
                  </td>
                  <td>
                    <a href="{{url('employee-edit',$row->id)}}"><i class="pt-2 material-icons text-success">edit</i></a><a href="{{url('employee-delete',$row->id)}}"><i class="pt-2 material-icons text-danger">delete</i></a>
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