@extends('master')
@section('mainSection')
<div class="card">
    <div class="card-header card-header-info">
      <h4 class="card-title">Payroll Pay</h4>
    </div>
    <div class="card-body">
        <form action="{{url('payroll-pay')}}" method="POST">
          @csrf
          <input type="hidden" name="payroll_id" value="{{$pay->id}}">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Name</label>
                <input name="name" type="text" class="form-control" readonly value="{{$pay->employee_no}}">
              </div>
              <div class="form-group">
                <label>Month|Year</label>
                <input name="month_year" type="text" class="form-control" readonly value="{{$pay->month_year}}">
              </div>
              <div class="form-group">
                <label>Payment Date</label>
                <input name="payment_date" type="text" class="form-control" readonly value="{{date('d-m-Y')}}">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Payment Method <strong class="text-danger">*</strong></label>
                <select name="payment_method" class="form-control niceSelect">
                  <option value="" selected disabled>Select Payment Method</option>
                  <option value="Cash">Cash</option>
                  <option value="Bank">Bank</option>
                  <option value="Card">Card</option>
                </select>
              </div>
              <div class="form-group">
                <label class="bmd-label-floating">Note</label>
                <input name="note" type="text" class="form-control">
              </div>
            </div>
          </div>
          <button onclick="return confirm('Are you sure !')" type="submit" class="btn btn-primary pull-right">Save Information</button>
          <div class="clearfix"></div>
        </form>
    </div>
</div>
@endsection