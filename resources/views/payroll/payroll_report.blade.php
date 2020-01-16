@extends('master')
@section('mainSection')
<div class="card">
    <div class="card-header card-header-info">
      <h4 class="card-title">Payroll Report</h4>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table">
          <thead class=" text-primary">
            <tr>
                <th>ID</th>
                <th>Staff Name</th>
                <th>Department</th>
                <th>Month|Year</th>
                <th>Basic Salary</th>
                <th>Earning</th>
                <th>Deduction</th>
                <th>Net Salary</th>
                <th>Pay Date</th>
            </tr>
          </thead>
          <tbody>
            @php
                $id = 0;
            @endphp
            @foreach ($rows as $row)
            <tr>
                <td>{{++$id}}</td>
                <td>{{App\Employee::employeeName($row->employee_no)}}</td>
                <td>{{App\Employee::employeeDepartment($row->employee_no)}}</td>
                <td>{{$row->month_year}}</td>
                <td>{{$row->basic_salary}}</td>
                <td>{{$row->earning_value}}</td>
                <td>{{$row->deduction_value}}</td>
                <td>{{$row->net_salary}}</td>
                <td>{{$row->updated_at->format('d-m-Y')}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
</div>
    
@endsection