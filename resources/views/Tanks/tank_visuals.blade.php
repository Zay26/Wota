






@extends('layouts.app')
@section('content')


<style>

/* #water_detail{
    height:80px; background:lightgray; overflow:hidden; width:250px; 
}
#water_level{
    height:80px; background:blue; margin-top:80px;} */
    .loader {
  border: 16px solid #f3f3f3; /* Light grey */
  border-top: 16px solid #3498db; /* Blue */
  border-radius: 50%;
  width: 120px;
  height: 120px;
  top:50%;
  left:-50%;
  animation: spin 2s linear infinite;
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
    #container {
        border: 5px blue;
margin-left:auto;
top: 10%;
	left: 5%;
position: absolute;
margin-right:auto;
/* height: 400px; */
width: 300px;
}
#glass {
background: rgba(230, 224, 224, 0.5);
width: 450px;
height: 400px;

  
}
#water {
background: 	#2389da;
background-position: top right;
position: absolute;
bottom: 0px;
width: 450px;
height: 0%;
border-bottom-right-radius:10px;
border-bottom-left-radius:10px;
/* animation: animate 5s linear infinite; */
/* transform: translate(-50%,-75%); */
/* -webkit-transition: all 3s ease-out;
-moz-transition: all 3s ease-out;
-o-transition: all 3s ease-out;
transition: all 3s ease-out; */
-webkit-border-bottom-radius: 10px;
-moz-border-bottom-radius: 10px;
/* border-radius: 10px; */


}



    /* .circle
{
	position: absolute;
	top: 50%;
	left: 50%;
	transform: translate(-50%, -50%) scale(1.6);
	width: 150px;
	height: 150px;
	border: 5px solid #fff;
	box-shadow: 0 0 0 5px #4973ff;
	border-radius: 50%;
	overflow: hidden;
}


.wave
{
	position: relative;
	width: 100%;
	height: 1000px;
    /* margin-top:80px; */
	/* background: #4973ff;
	border-radius: 50%;
	box-shadow: inset 0 0 50px rgba(0,0,0.5);
} */
/* .wave:before,
.wave:after
{
	content: '';
	position: absolute;
	width: 200%;
	height: 200%;
	top: 0;
	left: 50%;
	transform: translate(-50%,-75%);
	background: #000;
}
.wave:before
{
	border-radius: 45%;
	background: rgba(255,255,255,1);
	animation: animate 10s linear infinite;
}
.wave:after
{
	border-radius: 40%;
	background: rgba(255,255,255,.5);
	animation: animate 5s linear infinite;
} */
/* @keyframes animate
{
	0%
	{
		transform: translate(-50%,-70%) rotate(0deg);
	}
	100%
	{
		transform: translate(-50%,-75%) rotate(360deg);
	}
}  */





    </style>
<div id="content">



  <!-- Topbar -->
  <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

      <!-- Sidebar Toggle (Topbar) -->
      <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
          <i class="fa fa-bars"></i>
      </button> 

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


          {{-- <!-- Nav Item - User Information --> --}}
          <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{Session::get('name')}}</span>
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
                  <a class="dropdown-item" href="#">
                      <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                      Activity Log
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

  <div class="container">
         <!-- Page Heading -->
         <div class="d-sm-flex align-items-center justify-content-between mb-4">
          
        </div>
    <div class="row ">
      <div class="col-12">
       {{-- <p  class="text-justify font-weight-normal text-lg ">
        Welcome to <span style="color:#224abe" class="font-weight-bold">WOTA-APP </span> admin dashboard, here you will be able to register and monitor Tank owners , Also you will be able to register Tanks and assign tanks to the owners.
       </p>   --}}
       <div class="container">
           
       

        {{-- <div class="row"> --}}
   
   
            {{-- <div class="col"> --}}
      
            {{-- <div class="card border-left-success shadow h-200 py-2">
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
            </div> --}}
       

    {{-- </div> --}}
  
    {{-- <div class="col"> --}}
        
            {{-- <div class="card border-left-primary shadow h-100 py-2">
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
            </div> --}}
     



    {{-- </div> --}}

{{-- </div> --}}



       </div>
       
    </div>
      <div class="col-6" style="height:350px">
      
            {{-- <ui-water-jar  id = "levelinfo" size="1" value= {{$tank_per}} color="#6EABEB" shape="cylinder"> --}}
{{--         
                <div id="water_detail" >
                    <div  id="water_level"></div>
                <div> --}}
   
      <p id ="status"> </p>
   
       
    


                    <div id="container">
                        <div id="glass">
                        <div id="water"></div>
                        </div>
                        </div>


      </div>
      <div class="col-6">
        <h1 class="font-weight-bold">   Realtime Water Amount</h1>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Tank-ID</th>
                <th scope="col">Percentage</th>
                <th scope="col">Volume</th>
                <th scope="col">Buckets</th>
            
              </tr>
            </thead>
            <tbody>
              <tr>
                      
              
                <th><span style="color:#224abe" >{{$tank_id}}</th>
                <td><span  style="color:#224abe"  class="font-weight-bold " > <p id= "tankper"></p>  </span></td>
                <td><span  style="color:#224abe"  class="font-weight-bold " > <p id="volume"></p> </span></td>
                <td><span  style="color:#224abe"  class="font-weight-bold " > <p id="buckets"></p> </span></td>
             
               
              </tr>
           
            </tbody>
      
          </table>
           
     {{-- <p class="h-20"> </p>
        <p class="text-lg">  Water Remaining is <span  style="color:#224abe" class="font-weight-bold " > {{$tank_per}} %  </span></p>
        <p class="h-20"> </p>
        <p class="text-lg">  Water Remaining is <span  style="color:#224abe" class="font-weight-bold " > {{$real_time}} Litres  </span></p>
       --}}
    
    </div>
    </div>
  </div>
</div>
  <!-- End of Topbar -->

 

 <div class="container-fluid">
    

      <div class="row">

          <!-- Area Chart -->
          <div class="col-xl-6 col-lg-5">
              <div class="card shadow mb-4">
                  <!-- Card Header - Dropdown -->
                  <div
                      class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                      <h6 class="m-0 font-weight-bold text-primary">Weekly Water Usage</h6>
                      <div class="dropdown no-arrow">
                          <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                              data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                              aria-labelledby="dropdownMenuLink">
                              <div class="dropdown-header">Dropdown Header:</div>
                              <a class="dropdown-item" href="#">Action</a>
                              <a class="dropdown-item" href="#">Another action</a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item" href="#">Something else here</a>
                          </div>
                      </div>
                  </div>
                  <!-- Card Body -->
                  <div class="card-body">
                      <div class="chart-area">
                          <canvas id="weeklyChart"></canvas>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-xl-6 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Monthly Water Usage</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                            aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Dropdown Header:</div>
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="mychart"></canvas>
                    </div>
                </div> 
            </div>
        </div>
    </div>

      
      </div>


  </div>
  <!-- /.container-fluid -->

</div> 
       
@push('js')
    
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
  
    }
    
    
    
    })
    
    }
    
    updateChart();
    setInterval(() => {
        updateChart();  
    }, 9000);
    
    

// var fetchdata = function (){
//     $.ajax({
//     url:'https://api.thingspeak.com/channels/1626829/feeds.json?api_key=A02S4WYULQYF2CLO',
//     type:'get'
//     headers:{
//     'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
// },
//     datatype:'json',
//     success:function(res){
//         console.log(res.body)
//     }
// })
// }

// fetchdata();



var fetchData  = function (){
   
    $.ajax({
      
    url:"https://wota-d95d5-default-rtdb.firebaseio.com/.json",
    type: 'GET',
    datatype: 'json',
    headers:{
    'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
},
    success: function(data){
       var value=  data['number'];
     
  
    // console.log(data['feeds'][0]['field1']);

    


  if(value!=null){

postDatas(value);
}
}






    // console.log(data['feeds'][calc]['field2']);
// postData(data);

    
    
    
    
    })
    
    }
fetchData()

    setInterval(() => {
        fetchData()
    },3600000 );
    // 3600000 
    var postDatas  = function (newvalue){        

var newval = newvalue;

// console.log(id)
// console.log("data za pili")
    $.ajax({
    
    url:"/mmdata",
    type: 'post',
    datatype: 'json',
    
    data:{
     
        newval : newvalue,
        "_token": "{{ csrf_token() }}",
    }
  ,
    success: function(data){
        
        var id = 0;
      

    }
    
    
    
    })
    
    }



    $(document).ready(function () {
    setInterval(function() { 
        $.get("https://wota-d95d5-default-rtdb.firebaseio.com/.json", function (result) {
          if(result!=null){
       var newvalue= result['number'];

var myElement = $("#status");
  myElement.text("Status: online");
  //change here once you know the true height of the tank
newvalue = 70-newvalue;

  var height = (newvalue/70)*100;
  var height = height;
  console.log(height);
  var percentage =  Math.round(height);
  var fill = newvalue/100;
var bucket =  20; 
var volume = 3.14*(0.325)*(0.325)*fill;
var real_volume = Math.round(volume*1000);

var buckets = real_volume/bucket;
var rb= Math.round(buckets);


var myElement = $("#tankper");
  myElement.text(percentage.toString()+" %");
  var myElement = $("#volume");
  myElement.text(real_volume.toString()+" litres");
  var myElement = $("#buckets");
  myElement.text(rb.toString()+" buckets");


  console.log(rb);
        $('#water').animate( {'height' : (height)+'%' } );

}
          else if(newvalue==null){
            var myElement = $("#status");
  myElement.text("Status: Offline");
  $('#water').replaceWith(' <div class="loader"></div>');
 
          }


          




// var value = result['feeds'].length;
// var index = value -1;

//           var newdata= result['feeds'][index]['field1']
        




//           if(newdata !== null){
//             var myElement = $("#status");
//   myElement.text("Status: online");
//             var height = (newdata/80)*100;
// var height = 100-height;
// console.log(height)
// var percentage =  Math.round(height);
// //new data  is level information 
// var fill =  0.8-(newdata/100);

// var bucket =  20; 
// var volume = 3.14*(0.325)*(0.325)*fill;
// var real_volume = Math.round(volume*1000);
// console.log("volumeee")
// console.log(real_volume)
// var buckets = real_volume/bucket;
// var rb= Math.round(buckets);

// var myElement = $("#tankper");
//   myElement.text(percentage.toString()+" %");
//   var myElement = $("#volume");
//   myElement.text(real_volume.toString()+" litres");
//   var myElement = $("#buckets");
//   myElement.text(rb.toString()+" buckets");


//   console.log(rb);
//         $('#water').animate( {'height' : (height)+'%' } );
//           }
//           else {
//             var myElement = $("#status");
//   myElement.text("Status: Offline");
//           }














    
        });
    },1000); 
});
    
    </script>
    <script>
      function gotData(data) {
        console.log(data);
      }
    </script>
    <script src="https://wota-d95d5-default-rtdb.firebaseio.com/.json?callback=gotData"></script>

@endpush
@endsection
