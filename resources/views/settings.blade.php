@extends('master')
@section('mainSection')
  <div class="col-md-12">
    <div class="card">
    <div class="card-header card-header-info">
        <h4 class="card-title d-inline">General Setting</h4>
        
        @php
            $n = 0;
        @endphp
        @if (@$row != '')
            @php
                $n = 1;
            @endphp
        @endif
        @if ($n==0)
            <a data-toggle="collapse" href="#collapse" type="submit" class="pull-right text-light"><i class="material-icons pl-2">add</i></a>
        @endif
    </div>
      <div class="card-body">
        <div class="row col-12">
            <div class="col-md-8">
              <img style="height:100px; width:175px;" src="{{asset(@$row->website_logo)}}" class="img-circle elevation-2 mx-auto d-block" alt="Logo">
                <div class="text-center mt-3">
                  <h4>Website Name: {{@$row->website_name}}</h4>
                  <h6>Website Title: {{@$row->website_title}}</h6>
                  <h5>Email: {{@$row->email}}</h5>
                  <h2 class="py-5 text-center"><strong>
                    <a class="text-primary" href="{{url('setting-edit',@$row->id)}}"><i class="material-icons">update</i></a>
                  </strong></h2>
                </div>
            </div>
            <div class="col-md-4 {{Request::is('setting-edit*')?'':'collapse'}}" id="collapse">
              <form action="{{url(Request::is('setting-edit*')?'setting-update':'settings')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{Request::is('setting-edit*')?$web->id:''}}">
                <div class="form-group">
                  <label class="bmd-label-floating">Website Logo</label>
                  <input name="website_logo" type="file" class="form-control" value="{{Request::is('setting-edit*')?$web->website_logo:''}}">
                </div>
                <div class="form-group">
                  <label class="bmd-label-floating">Website Name</label>
                  <input name="website_name" type="text" class="form-control" value="{{Request::is('setting-edit*')?$web->website_name:''}}">
                </div>
                <div class="form-group">
                  <label class="bmd-label-floating">Website Title</label>
                  <input name="website_title" type="text" class="form-control" value="{{Request::is('setting-edit*')?$web->website_title:''}}">
                </div>
                <div class="form-group">
                  <label class="bmd-label-floating">Company Addres</label>
                  <input name="address" type="text" class="form-control" value="{{Request::is('setting-edit*')?$web->address:''}}">
                </div>
                <div class="form-group">
                  <label class="bmd-label-floating">City</label>
                  <input name="city" type="text" class="form-control" value="{{Request::is('setting-edit*')?$web->city:''}}">
                </div>
                <div class="form-group">
                  <label class="bmd-label-floating">Email</label>
                  <input name="email" type="email" class="form-control" value="{{Request::is('setting-edit*')?$web->email:''}}">
                </div>
                <div class="form-group">
                  <label class="bmd-label-floating">Password</label>
                  <input name="password" type="password" class="form-control" value="{{Request::is('setting-edit*')?$web->password:''}}">
                </div>
                <button onclick="return confirm('Are you sure !')" type="submit" class="btn btn-primary pull-right">SUBMIT</button>
                <div class="clearfix"></div>
              </form>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection
