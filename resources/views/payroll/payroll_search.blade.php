@extends('master')
@section('mainSection')
<div class="card">
    <div class="card-header card-header-info">
      <h4 class="card-title">Payroll Search</h4>
    </div>
    <div class="card-body">
        <form action="{{url('payroll-search')}}" method="POST">
          @csrf
          <div class="row">
            <div class="div col-md-4">
              <div class="form-group">
                <label>Department</label>
                <select name="department" class="form-control niceSelect">
                  @php
                      $departments = App\Department::totalDepartment();
                  @endphp
                  @foreach ($departments as $department)
                    <option value="{{$department->department}}">{{$department->department}}</option>
                  @endforeach
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
                  <option {{$current_month == 'January'?'selected':''}} value="January">January</option>
                  <option {{$current_month == 'February'?'selected':''}} value="February">February</option>
                  <option {{$current_month == 'March'?'selected':''}} value="March">March</option>
                  <option {{$current_month == 'April'?'selected':''}} value="April">April</option>
                  <option {{$current_month == 'May'?'selected':''}} value="May">May</option>
                  <option {{$current_month == 'June'?'selected':''}} value="June">June</option>
                  <option {{$current_month == 'July'?'selected':''}} value="July">July</option>
                  <option {{$current_month == 'August'?'selected':''}} value="August">August</option>
                  <option {{$current_month == 'September'?'selected':''}} value="September">September</option>
                  <option {{$current_month == 'October'?'selected':''}} value="October">October</option>
                  <option {{$current_month == 'November'?'selected':''}} value="November">November</option>
                  <option {{$current_month == 'December'?'selected':''}} value="December">December</option>
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
                <select name="year" id="payroll_year" class="form-control niceSelect">
                  @for($start; $start>=$end; $start--)
                    <option value="{{$start}}">{{$start}}</option>
                  @endfor
                </select>
              </div>
            </div>
            <div class="div col-md-2 pt-2">
              <button type="submit" class="btn btn-primary ml-auto mt-4 btn-block">Search</button>
            </div>
          </div>
          <div class="clearfix"></div>
        </form>
    
    
        @php
            $i = 0;
        @endphp
        <div class="mt-2 {{Request::is('payroll-search')?$i=1:'collapse'}}">
          <table class="table dataTable">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Department</th>
                <th>Phone</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @if ($i == 1)
                @foreach ($rows as $row)
                <tr>
                  <td>{{$row->id}}</td>
                  <td>{{$row->name}}</td>
                  <td>{{$row->department}}</td>
                  <td>{{$row->phone}}</td>
                  <td>
                    @if (App\Payroll::paid($row->id) != '')
                      <strong class="bg-success text-light d-block px-2 py-1">Paid</strong>
                    @elseif (App\Payroll::generate($row->id) != '')
                      <strong class="bg-warning d-block px-2 py-1">Generate</strong>
                    @else
                      <strong class="bg-danger text-light d-block px-2 py-1">Not Generate</strong>
                    @endif
                  </td>
                  <td>
                    @if (App\Payroll::paid($row->id) != '')
                      <a class="bg-success text-light d-block px-2 py-1" href="{{url('payroll-view',$row->id)}}"><strong>View Report</strong></a>
                    @elseif (App\Payroll::generate($row->id) != '')
                      <a class="bg-info text-light d-block px-2 py-1" href="{{url('payroll-pay-view',$row->id)}}"><strong>Proceed To Pay</strong></a>
                    @else
                      <a class="bg-primary text-light d-block px-2 py-1" href="{{url('payroll-generate',$row->id)}}"><strong>Generate Payroll</strong></a>
                    @endif
                  </td>
                </tr>
                @endforeach
              @endif
            </tbody>
          </table>
        </div>
    </div>
</div>
@endsection