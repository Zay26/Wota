@extends('layouts.app')
@section('content')

<div id="content">

  <!-- Topbar -->
  <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

      <!-- Sidebar Toggle (Topbar) -->
      <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
          <i class="fa fa-bars"></i>
      </button> 
      <div class="col-lg-10">
        <h6 class="m-0 font-weight-bold text-primary">Dashboard </h6>
    </div>
      <!-- Topbar Search -->
      {{-- <form
          class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
          <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                  aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                  <button class="btn btn-primary" type="button">
                      <i class="fas fa-search fa-sm"></i>
                  </button>
              </div>
          </div>
      </form> --}}

      <!-- Topbar Navbar -->
      <ul class="navbar-nav ml-auto">

          <!-- Nav Item - Search Dropdown (Visible Only XS) -->
          <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                  aria-labelledby="searchDropdown">
                  <form class="form-inline mr-auto w-100 navbar-search">
                      <div class="input-group">
                          <input type="text" class="form-control bg-light border-0 small"
                              placeholder="Search for..." aria-label="Search"
                              aria-describedby="basic-addon2">
                          <div class="input-group-append">
                              <button class="btn btn-primary" type="button">
                                  <i class="fas fa-search fa-sm"></i>
                              </button>
                          </div>
                      </div>
                  </form>
              </div>
          </li>

          <!-- Nav Item - Alerts -->
          {{-- <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-bell fa-fw"></i>
                  <!-- Counter - Alerts -->
                  <span class="badge badge-danger badge-counter">3+</span>
              </a>
              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                  aria-labelledby="alertsDropdown">
                  <h6 class="dropdown-header">
                      Alerts Center
                  </h6>
                  <a class="dropdown-item d-flex align-items-center" href="#">
                      <div class="mr-3">
                          <div class="icon-circle bg-primary">
                              <i class="fas fa-file-alt text-white"></i>
                          </div>
                      </div>
                      <div>
                          <div class="small text-gray-500">December 12, 2019</div>
                          <span class="font-weight-bold">A new monthly report is ready to download!</span>
                      </div>
                  </a>
                  <a class="dropdown-item d-flex align-items-center" href="#">
                      <div class="mr-3">
                          <div class="icon-circle bg-success">
                              <i class="fas fa-donate text-white"></i>
                          </div>
                      </div>
                      <div>
                          <div class="small text-gray-500">December 7, 2019</div>
                          $290.29 has been deposited into your account!
                      </div>
                  </a>
                  <a class="dropdown-item d-flex align-items-center" href="#">
                      <div class="mr-3">
                          <div class="icon-circle bg-warning">
                              <i class="fas fa-exclamation-triangle text-white"></i>
                          </div>
                      </div>
                      <div>
                          <div class="small text-gray-500">December 2, 2019</div>
                          Spending Alert: We've noticed unusually high spending for your account.
                      </div>
                  </a>
                  <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
              </div>
          </li> --}}

          <!-- Nav Item - Messages -->
          {{-- <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-envelope fa-fw"></i>
                  <!-- Counter - Messages -->
                  <span class="badge badge-danger badge-counter">7</span>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                  aria-labelledby="messagesDropdown">
                  <h6 class="dropdown-header">
                      Message Center
                  </h6>
                  <a class="dropdown-item d-flex align-items-center" href="#">
                      <div class="dropdown-list-image mr-3">
                          <img class="rounded-circle" src="{{asset('admin/img/undraw_profile_1.svg')}}"
                              alt="...">
                          <div class="status-indicator bg-success"></div>
                      </div>
                      <div class="font-weight-bold">
                          <div class="text-truncate">Hi there! I am wondering if you can help me with a
                              problem I've been having.</div>
                          <div class="small text-gray-500">Emily Fowler · 58m</div>
                      </div>
                  </a>
                  <a class="dropdown-item d-flex align-items-center" href="#">
                      <div class="dropdown-list-image mr-3">
                          <img class="rounded-circle" src="{{asset('admin/img/undraw_profile_2.svg')}}"
                              alt="...">
                          <div class="status-indicator"></div>
                      </div>
                      <div>
                          <div class="text-truncate">I have the photos that you ordered last month, how
                              would you like them sent to you?</div>
                          <div class="small text-gray-500">Jae Chun · 1d</div>
                      </div>
                  </a>
                  <a class="dropdown-item d-flex align-items-center" href="#">
                      <div class="dropdown-list-image mr-3">
                          <img class="rounded-circle" src="{{asset('admin/img/undraw_profile_3.svg')}}"
                              alt="...">
                          <div class="status-indicator bg-warning"></div>
                      </div>
                      <div>
                          <div class="text-truncate">Last month's report looks great, I am very happy with
                              the progress so far, keep up the good work!</div>
                          <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                      </div>
                  </a>
                  <a class="dropdown-item d-flex align-items-center" href="#">
                      <div class="dropdown-list-image mr-3">
                          <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                              alt="...">
                          <div class="status-indicator bg-success"></div>
                      </div>
                      <div>
                          <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                              told me that people say this to all dogs, even if they aren't good...</div>
                          <div class="small text-gray-500">Chicken the Dog · 2w</div>
                      </div>
                  </a>
                  <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
              </div>
          </li> --}} 

          {{-- <div class="topbar-divider d-none d-sm-block"></div>

          {{-- <!-- Nav Item - User Information --> --}}
          <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{Session::get('name');}}</span>
                  <img class="img-profile rounded-circle"
                      src="{{asset('admin/img/undraw_profile.svg')}}">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                  aria-labelledby="userDropdown">
                  <a class="dropdown-item" href="#">
                      <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                      Profile
                  </a>
                  <a class="dropdown-item" href="#">
                      <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                      Settings
                  </a>
                  <a class="dropdown-item" href="{{route('adminview')}}">
                      <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                     Register Admin
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="{{route('logout')}}" data-toggle="modal" data-target="#logoutModal">
                      <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                      Logout
                  </a>
              </div>
          </li>

      </ul> 

  </nav>


         <!-- Page Heading -->
       
    <div class="col ">


           {{--  <div class="col-6">
       <p  class="text-justify font-weight-normal text-lg">
        Welcome to <span style="color:#224abe" class="font-weight-bold">WOTA-APP </span> admin dashboard, here you will be able to register and monitor Tank owners , Also you will be able to register Tanks and assign tanks to the owners.
       </p>  
      </div> --}}
       {{-- <div class="container"> --}}



        <div class="row">
    <div class="col">
      
            <div class="card border-left-success shadow py-2" style="height: 200px">
                <div class="card-body">
                    <div class="col justify-items-between">
                        <div class="col-auto">
                            <i class="fa fa-users fa-3x text-gray-300"></i>
                        </div>
                        <div class="col mr-2">
                            <div class="h5 mb-0 font-weight-boldtext-gray-800" style="font-size: 60px; font-display: bold;">{{$no_user_today}}</div>
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Registered  User Today</div>
                        
                        </div>
                      
                    </div>
                </div>
            </div>
       

    </div>
    <div class="col">
      
        <div class="card border-left-success shadow py-2" style="height: 200px">
            <div class="card-body">
                <div class="col justify-items-between">
                    <div class="col-auto">
                        <i class="fa fa-database fa-3x text-gray-300"></i>
                    </div>
                    <div class="col mr-2">
                        <div class="h5 mb-0 font-weight-boldtext-gray-800" style="font-size: 60px; font-display: bold;">{{$no_tank}}</div>
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1 display-4">
                        Total Tanks</div>
                    
                    </div>
                  
                </div>
            </div>
        </div>
   

</div>
  
    <div class="col">
        
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="col justify-items-between">
                        <div class="col-auto">
                            <i class="fa fa-users fa-3x text-gray-300"></i>
                        </div>
                        <div class="col mr-2">
                            <div class="h5 mb-0 font-weight-boldtext-gray-800" style="font-size: 60px; font-display: bold;">{{$no_user}}</div>
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Total Mobile Users</div>
                        
                        </div>
                      
                    </div>
                </div>
            </div>
    </div> 

</div> 
<div class="row">
    <div class="container p-6 col-6">
        <div class="card-body shadow mt-4">
            <div class="table-responsive">
                <div class="row">
                    <div class="col-5">
                        <h1 class="h3 mb-0 text-blue-400">Recent  Users Registration</h1>
                    </div>
                    {{-- <div class="col-3">
                        @if($no_user_today==0)
                        <p class="badge badge-primary">
                          No Data available
                      </p> 
                    </div> --}}
                 
                    
                </div>
            
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Registered On</th>
                          
                            {{-- <th>Tank Owner</th> --}}
                           
                        </tr>
                    </thead>
                    {{-- <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Office</th>
                            <th>Age</th>
                            <th>Start date</th>
                            <th>Salary</th>
                        </tr>
                    </tfoot> --}}
               
                  
                  
                    {{-- @else --}}
                    @foreach ($today as $user)
                    <tbody>
                     
                        {{-- //TODO add if statement to track when there are no data --}}
                     
                        <tr>
                            <td> {{$user->name}}</td>
                            <td> {{$user->email}}</td>
                            <td> {{$user->created_at}}</td>
                          
                          
                         
                        </tr>
                      
                       
                    </tbody>
                 
                    @endforeach
                   
                
                </table>
                {{-- @endif --}}
            </div>
           
            {{$today->links()}}
               
        </div>
     
    </div>
  
   
    <div class="container col-6 p-6">
      

        <div class="card-body shadow mt-4 ">
            <div class="table-responsive">
                <h1 class="h3 mb-0 text-blue-400"> Registered Tank List</h1>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Owner</th>
                            <th>capacity</th>
                            <th>company</th>
                           
                            {{-- <th>Tank Owner</th> --}}
                        
                            <th>View</th>
                        </tr>
                    </thead>
                 
                    {{-- <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Office</th>
                            <th>Age</th>
                            <th>Start date</th>
                            <th>Salary</th>
                        </tr>
                    </tfoot> --}}
                    @foreach ($tanks as $tank)
                    <tbody>
                        <tr>
                            <td> {{$users_array[$loop->index]}}</td>
                            <td> {{$tank->capacity}}</td>
                            <td > {{$tank->company}}</td>
                           
                            {{-- <td > {{$tank->user->name}}</td> --}}
                          
                        <td width="10%">  <a href="{{url('/tankVisuals/'.$tank->id)}}" class="btn btn-danger btn-user btn-block">
                        
                          view
                      </a></td>
                      
                        </tr>
                      
                       
                    </tbody>
                    @endforeach
                
                </table>
             
            </div>
            {{$tanks->links()}}
        </div>
   
    </div>
   

</div>



  
       
    </div>
   
     
    </div>


  <!-- End of Topbar -->

  <!-- Begin Page Content -->
  {{-- <div class="container-fluid">

   

      <!-- Content Row -->
      <div class="row">

          <!-- Earnings (Monthly) Card Example -->
          <div class="col-xl-3 col-md-2 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                  <div class="card-body">
                      <div class="row no-gutters align-items-center">
                          <div class="col mr-2">
                              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                  Users</div>
                              <div class="h5 mb-0 font-weight-bold text-gray-800">{{$no_user}}</div>
                          </div>
                          <div class="col-auto">
                              <i class="fa fa-users fa-2x text-gray-300"></i>
                          </div>
                      </div>
                  </div>
              </div>
          </div> --}}

  
          {{-- <div class="col-xl-3 col-md-2 pb-4 ">
              <div class="card border-left-success shadow h-100 py-2">
                  <div class="card-body">
                      <div class="row no-gutters align-items-center">
                          <div class="col mr-2">
                              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                  Tanks</div>
                              <div class="h5 mb-0 font-weight-bold text-gray-800">{{$no_tank}}</div>
                          </div>
                          <div class="col-auto">
                              <i class="fa fa-database fa-2x text-gray-300"></i>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          
       <div class="col-xl-3 col-md-2 mb-4 ">
      
        </ui-water-jar> --}}
       
 
        {{-- <h4 class="small font-weight-bold">Account Setup <span
            class="float-right">Complete!</span></h4>
    <div class="progress">
        <div class="progress-bar bg-success" role="progressbar" style="width: 20%"
            aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
    </div> --}}
{{-- <P>

       </div>
               
              
        
  
        
      </div> --}}



{{-- 
          <!-- Earnings (Monthly) Card Example -->
          <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                  <div class="card-body">
                      <div class="row no-gutters align-items-center">
                          <div class="col mr-2">
                              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks
                              </div>
                              <div class="row no-gutters align-items-center">
                                  <div class="col-auto">
                                      <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                                  </div>
                                  <div class="col">
                                      <div class="progress progress-sm mr-2">
                                          <div class="progress-bar bg-info" role="progressbar"
                                              style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                              aria-valuemax="100"></div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="col-auto">
                              <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                          </div>
                      </div>
                  </div>
              </div>
          </div>

          <!-- Pending Requests Card Example -->
          <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                  <div class="card-body">
                      <div class="row no-gutters align-items-center">
                          <div class="col mr-2">
                              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                  Pending Requests</div>
                              <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                          </div>
                          <div class="col-auto">
                              <i class="fas fa-comments fa-2x text-gray-300"></i>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>


      <!-- Content Row --> --}}

       

{{--     
<script>
   // // Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

function number_format(number, decimals, dec_point, thousands_sep) {
  // *     example: number_format(1234.56, 2, ',', ' ');
  // *     return: '1 234,56'
  number = (number + '').replace(',', '').replace(' ', '');
  var n = !isFinite(+number) ? 0 : +number,
    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
    s = '',
    toFixedFix = function(n, prec) {
      var k = Math.pow(10, prec);
      return '' + Math.round(n * k) / k;
    };
  // Fix for IE parseFloat(0.55).toFixed(0) = 0;
  s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
  if (s[0].length > 3) {
    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
  }
  if ((s[1] || '').length < prec) {
    s[1] = s[1] || '';
    s[1] += new Array(prec - s[1].length + 1).join('0');
  }
  return s.join(dec);
}
//logic to get the chart data monthly
    
    
    
    
    
    
    var ctx =  document.getElementById('weeklyChart');
    
    var weeklyChart = new Chart(ctx,{
        type: 'line',
      data: {
        labels: [ ],
        datasets: [{
          label: "Volume",
          lineTension: 0.4,
          backgroundColor: "rgba(78, 115, 223, 0.05)",
          borderColor: "rgba(78, 115, 223, 1)",
          pointRadius: 3,
          pointBackgroundColor: "rgba(78, 115, 223, 1)",
          pointBorderColor: "rgba(78, 115, 223, 1)",
          pointHoverRadius: 3,
          pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
          pointHoverBorderColor: "rgba(78, 115, 223, 1)",
          pointHitRadius: 10,
          pointBorderWidth: 2,
          data: [],
        }],
      },
      options: {
        maintainAspectRatio: false,
        layout: {
          padding: {
            left: 10,
            right: 25,
            top: 25,
            bottom: 0
          }
        },
        scales: {
          xAxes: [{
            time: {
              unit: 'time'
            },
            gridLines: {
              display: false,
              drawBorder: false
            },
            ticks: {
                min:1,
                max:12,
            //   maxTicksLimit: 7
            }
          }],
          yAxes: [{
            ticks: {
                min:0,
                max:50,
              maxTicksLimit: 10,
              padding: 5,
              // Include a dollar sign in the ticks
              callback: function(value, index, values) {
                return   number_format(value) + 'L';
              }
            },
            gridLines: {
              color: "rgb(234, 236, 244)",
              zeroLineColor: "rgb(234, 236, 244)",
              drawBorder: false,
              borderDash: [2],
              zeroLineBorderDash: [2]
            }
          }],
        },
        legend: {
          display: false
        },
        tooltips: {
          backgroundColor: "rgb(255,255,255)",
          bodyFontColor: "#858796",
          titleMarginBottom: 10,
          titleFontColor: '#6e707e',
          titleFontSize: 14,
          borderColor: '#dddfeb',
          borderWidth: 1,
          xPadding: 15,
          yPadding: 15,
          displayColors: false,
          intersect: false,
          mode: 'index',
          caretPadding: 10,
          callbacks: {
            label: function(tooltipItem, chart) {
              var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
              return datasetLabel +  " " + number_format(tooltipItem.yLabel)+ 'Litres' ;
            }
          }
        }
      }
    
    })
    
    // var urlPath  = 'http://localhost:8000/api/data';
    var updateChart  = function (){
    $.ajax({
    
    url:"{{route('nowData')}}",
    type: 'GET',
    datatype: 'json',
    headers:{
    'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
},
    success: function(data){
       
        weeklyChart.data.labels = data.days;
   
    weeklyChart.data.datasets[0].data = data.sum_days;
    console.log(weeklyChart.data.datasets[0].data );
    weeklyChart.options.scales.yAxes[0].ticks.max = data.max;
    weeklyChart.update();
    },
    error: function(data){
    console.log(data);
    }
    
    
    
    })
    
    }
    
    updateChart();
    setInterval(() => {
        updateChart();  
    }, 3000);
    
    
      
    
    var ctx =  document.getElementById('mychart');
    
    var mychart = new Chart(ctx,{
        type: 'line',
      data: {
        labels: [ ],
        datasets: [{
          label: "Volume",
          lineTension: 0.4,
          backgroundColor: "rgba(78, 115, 223, 0.05)",
          borderColor: "rgba(78, 115, 223, 1)",
          pointRadius: 3,
          pointBackgroundColor: "rgba(78, 115, 223, 1)",
          pointBorderColor: "rgba(78, 115, 223, 1)",
          pointHoverRadius: 3,
          pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
          pointHoverBorderColor: "rgba(78, 115, 223, 1)",
          pointHitRadius: 10,
          pointBorderWidth: 2,
          data: [],
        }],
      },
      options: {
        maintainAspectRatio: false,
        layout: {
          padding: {
            left: 10,
            right: 25,
            top: 25,
            bottom: 0
          }
        },
        scales: {
          xAxes: [{
            time: {
              unit: 'time'
            },
            gridLines: {
              display: false,
              drawBorder: false
            },
            ticks: {
                min:1,
                max:12,
            //   maxTicksLimit: 7
            }
          }],
          yAxes: [{
            ticks: {
                min:0,
                max:800,
              maxTicksLimit: 10,
              padding: 5,
              // Include a dollar sign in the ticks
              callback: function(value, index, values) {
                return   number_format(value) + 'L';
              }
            },
            gridLines: {
              color: "rgb(234, 236, 244)",
              zeroLineColor: "rgb(234, 236, 244)",
              drawBorder: false,
              borderDash: [2],
              zeroLineBorderDash: [2]
            }
          }],
        },
        legend: {
          display: false
        },
        tooltips: {
          backgroundColor: "rgb(255,255,255)",
          bodyFontColor: "#858796",
          titleMarginBottom: 10,
          titleFontColor: '#6e707e',
          titleFontSize: 14,
          borderColor: '#dddfeb',
          borderWidth: 1,
          xPadding: 15,
          yPadding: 15,
          displayColors: false,
          intersect: false,
          mode: 'index',
          caretPadding: 10,
          callbacks: {
            label: function(tooltipItem, chart) {
              var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
              return datasetLabel +  " " + number_format(tooltipItem.yLabel)+ 'Litres' ;
            }
          }
        }
      }
    
    })
    
    // var urlPath  = 'http://localhost:8000/api/data';
    var updateChart  = function (){
    $.ajax({
    
    url:"{{route('data')}}",
    type: 'GET',
    datatype: 'json',
    headers:{
    'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
},
    success: function(data){
       
        mychart.data.labels = data.labels;
     
    mychart.data.datasets[0].data = data.sum;
    mychart.options.scales.yAxes[0].ticks.max = data.max;
    // console.log( mychart.data.datasets[0].data );
   
    // mychart.options.yAxes[0].ticks.max = data.max.toString();
  
    mychart.update();
    },
    error: function(data){
    console.log(data);
    }
    
    
    
    })
    
    }
    
    updateChart();
    setInterval(() => {
        updateChart();  
    }, 3000);
    
    
    </script>

@endpush --}}
@endsection
