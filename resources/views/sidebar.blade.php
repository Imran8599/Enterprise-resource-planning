@include('header')

<body class="">
  @include('sweet::alert')
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white">
      @php
        $setting = App\Settings::setting();
      @endphp
      <div class="logo p-0">
        <a href="{{url('/')}}" class="simple-text logo-normal text-info pt-2">
          <img style="height: 40px;" src="{{asset($setting->website_logo)}}" alt="logo"><br><small>{{$setting->website_name}}</small>
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav  mb-5">
          <li class="nav-item {{Request::is('/')?'active':''}}">
            <a class="nav-link" href="{{url('/')}}">
              <i class="material-icons">home</i>
              <p>Home</p>
            </a>
          </li>
          <li class="nav-item {{Request::is('cashmemo')?'active':''}}">
            <a class="nav-link" href="{{url('cashmemo')}}">
              <i class="material-icons">library_books</i>
              <p>Cash Memo</p>
            </a>
          </li>

          <li class="nav-item {{Request::is(['everyday','everymonth','extracost','import','import-type'])?'active':''}} dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
              <i class="material-icons">book</i>
              <p class="d-inline">Transaction</p>
            </a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="{{url('everyday')}}"><i class="material-icons">credit_card</i>Every Day</a>
              <a class="dropdown-item" href="{{url('everymonth')}}"><i class="material-icons">card_travel</i>Every Month</a>
              <a class="dropdown-item" href="{{url('extracost')}}"><i class="material-icons">payment</i>Expense</a>
              <a class="dropdown-item" href="{{url('import')}}"><i class="material-icons">payment</i>Import</a>
              <a class="dropdown-item" href="{{url('import-type')}}"><i class="material-icons">payment</i>Import Type</a>
            </div>
          </li>

          <li class="nav-item {{Request::is('production')?'active':''}}">
            <a class="nav-link" href="{{url('production')}}">
              <i class="material-icons">gavel</i>
              <p>Production</p>
            </a>
          </li>

          <li class="nav-item {{Request::is(['employee','department'])?'active':''}} dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
              <i class="material-icons">people</i>
              <p class="d-inline">Employee</p>
            </a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="{{url('employee')}}"><i class="material-icons">people</i>Employee</a>
              <a class="dropdown-item" href="{{url('department')}}"><i class="material-icons">person</i>Department</a>
            </div>
          </li>

          <li class="nav-item {{Request::is(['payroll','payroll-report'])?'active':''}} dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
              <i class="material-icons">money</i>
              <p class="d-inline">Payroll</p>
            </a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="{{url('payroll')}}"><i class="material-icons">money</i>Payroll</a>
              <a class="dropdown-item" href="{{url('payroll-report')}}"><i class="material-icons">chrome_reader_mode</i>Payroll Report</a>
            </div>
          </li>

          <li class="nav-item {{Request::is('coustomer')?'active':''}}">
            <a class="nav-link" href="{{url('coustomer')}}">
              <i class="material-icons">supervised_user_circle</i>
              <p>Customer</p>
            </a>
          </li>
          
          <li class="nav-item {{Request::is('product')?'active':''}}">
            <a class="nav-link" href="{{url('product')}}">
              <i class="material-icons">shopping_cart</i>
              <p>Product</p>
            </a>
          </li>
          <li class="nav-item {{Request::is('settings')?'active':''}}">
            <a class="nav-link" href="{{url('settings')}}">
              <i class="material-icons">settings_applications</i>
              <p>General Settings</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand text-success">
              {{Request::is('/')?'Home':''}}
              {{Request::is('cashmemo')?'Cash Memo':''}}
              {{Request::is('everyday')?'Every Day':''}}
              {{Request::is('everymonth')?'Every Month':''}}
              {{Request::is('production')?'Production':''}}
              {{Request::is('extracost')?'Extra Cost':''}}
              {{Request::is('import')?'Import':''}}
              {{Request::is('import-type')?'Import Type':''}}
              {{Request::is('employee')?'Employee':''}}
              {{Request::is('department')?'Department':''}}
              {{Request::is('payroll')?'Payroll':''}}
              {{Request::is('payroll-report')?'Payroll Report':''}}
              {{Request::is('coustomer')?'Coustomer':''}}
              {{Request::is('product')?'Product':''}}
              {{Request::is('settings')?'General Settings':''}}
            </a>
          </div>
          <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
              <li>
                <a title="Home" href="{{url('/')}}"><i class="material-icons">home</i><small>Home</small></a>
              </li>
              <li>
                <a title="Logout" href="{{url('logout')}}"><i class="material-icons ml-3">person</i><small>Logout</small></a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      
  <div class="content">
    
    <div class="container-fluid">
      <p id="message"></p>
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
    </div>

    