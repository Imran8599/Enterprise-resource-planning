@include('header')
<body>
  @include('sweet::alert')
<div class="col-md-5 m-auto mt-md-5 pt-md-5">
  <div class="card">
    <div class="card-header card-header-info">
      <h4 class="card-title d-inline">Login</h4>
  </div>
    <div class="card-body">
      <!-- Toast message -->
      @if(Session::has('message-success'))
        <div class="alert alert-success p-2">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <strong>{{Session::get('message-success')}}</strong>
        </div>
      @elseif(Session::has('message-danger'))
        <div class="alert alert-danger p-2">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <strong>{{Session::get('message-danger')}}</strong>
        </div>
      @endif

      @if($errors->any())
        @foreach ($errors->all() as $error)
          <div class="alert alert-danger p-2">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>{{$error}}</strong>
          </div>
        @endforeach
      @endif
      <!-- Form -->
      <form action="{{url('login')}}" method="POST">
        @csrf
        <div class="col-md-12">
          <div class="form-group">
            <label class="bmd-label-floating">Phone</label>
            <input name="phone" type="text" class="form-control" value="01706764112">
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
            <label class="bmd-label-floating">Password</label>
            <input name="password" type="password" class="form-control" value="12345">
          </div>
        </div>
        <button type="submit" class="btn btn-primary pull-right">Login</button>
        <div class="clearfix"></div>
      </form>
    </div>

@include('footer')