@extends('master')
@section('mainSection')
<div class="card">
    <div class="card-header card-header-info">
      <h4 class="card-title">Payroll Generator</h4>
    </div>
    <div class="card-body">
        <div class="row">
          <div class="col-md-6">
            <table class="table table-sm">
              <tbody>
                <tr>
                  <td>No</td>
                  <td>{{$row->id}}</td>
                </tr>
                <tr>
                  <td>Name</td>
                  <td>{{$row->name}}</td>
                </tr>
                <tr>
                  <td>Mobile</td>
                  <td>{{$row->phone}}</td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="col-md-6">
            <table class="table table-sm">
              <tbody>
                <tr>
                  <td>Department</td>
                  <td>{{$row->department}}</td>
                </tr>
                <tr>
                  <td>Votar ID</td>
                  <td>{{$row->votar_id}}</td>
                </tr>
                <tr>
                  <td>Month | Year</td>
                  <td>{{Session::get('month').' | '.Session::get('year')}}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="row mt-5">
          <div class="col-md-4">
            <div class="card">
              <div class="card-header card-header-info">
                <h4 class="card-title">Earning</h4>
              </div>
              <div class="card-body">
                <form action="{{url('payroll-generate')}}" method="POST">
                  @csrf
                  <input type="hidden" name="employee_no" value="{{$row->id}}">
                <div class="row">
                  <div class="div col-md-8">
                    <div class="form-group">
                      <label class="bmd-label-floating">Type</label>
                      <input name="earning_note" type="text" class="form-control">
                    </div>
                  </div>
                  <div class="div col-md-4">
                    <div class="form-group">
                      <label class="bmd-label-floating">Value</label>
                      <input id="earning_value" name="earning_value" type="number" class="form-control">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card">
              <div class="card-header card-header-info">
                <h4 class="card-title">Deductions</h4>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="div col-md-8">
                    <div class="form-group">
                      <label class="bmd-label-floating">Type</label>
                      <input name="deduction_note" type="text" class="form-control">
                    </div>
                  </div>
                  <div class="div col-md-4">
                    <div class="form-group">
                      <label class="bmd-label-floating">Value</label>
                      <input id="deduction_value" name="deduction_value" type="number" class="form-control">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card">
              <div class="card-header card-header-info">
                <h4 class="card-title">Payroll Summary</h4>
              </div>
              <div class="card-body">
                  <div class="form-group">
                    <label>Basic Salary</label>
                    <input id="basic_salary" name="basic_salary" type="text" readonly class="form-control p-1" value="{{$row->salary}}">
                  </div>
                  <div class="form-group">
                    <label>Earning</label>
                    <input id="earning" type="text" readonly class="form-control p-1">
                  </div>
                  <div class="form-group">
                    <label>Deduction</label>
                    <input id="deduction" type="text" readonly class="form-control p-1">
                  </div>
                  <div class="form-group">
                    <label>Net Salary</label>
                    <input id="net_salary" name="net_salary" type="text" readonly class="form-control p-1">
                  </div>
                  <button type="button" id="calculate" class="btn btn-primary mb-3">Calculate</button>
                  <button id="generate" onclick="return confirm('Are you sure !')" type="submit" class="btn btn-primary pull-right">GENERATE</button>
                  <div class="clearfix"></div>
                </form>
              </div>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection