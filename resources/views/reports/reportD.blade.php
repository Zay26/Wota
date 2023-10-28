@extends('layouts.app')
@section('content')
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button> 
    <div class="col-lg-10">
      <h6 class="m-0 font-weight-bold text-primary">Reports </h6>
  </div>
  
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
<div class="d-flex  flex-row  justify-content-end p-4 ">
    <form method="get" action="{{url('/newR/id')}}">
        @csrf
        <select class="form-select form-select-lg mb-3  py-2" name="tank_id">
            <option selected>Select Tank</option>
            @foreach ($tank_data as $tank)

            <option value="{{$tank->id}}"><span class="text"><span>ID</span>{{$tank->id}}</span><span> {{$users_array[$loop->index]}} </span> </option>
            @endforeach
               </select> 
         
               <button type="submit" class="btn btn-success" >Change Tank </button>
            </form>  
</div> 
<div class="container">
   
    <div class="row">
    

<div class="col">

    <div class="card shadow mb-4">
 
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="row">
                            <h3>
                               MONTHLY WATER USAGE REPORT
                            </h3>
                            <p></p>
                            <a  class="btn btn-success" href="{{route('downloadReport')}}"> 
                            
                                Download Report</a>
                                <p></p>
                        </tr>
                        <tr>
                           
                            <th>Month</th>
                            <th>Total Used Volume</th>
                           
                         
                            
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
              @foreach ($dataz as $name=>$value)
                 {{-- {{$day[$loop->index]}} --}}
        <tr>
            <td>
                {{$name}}</td>   
                
   <td>
      
       {{$value}}
   </td>
        </tr>
         

              @endforeach
                    
                    {{-- @foreach ($monthdata as $data)
                    <tbody>
                        <tr>
                            <td> {{$data->remaining_volume}}</td>
                            <td> {{$data->used_volume}}</td>
                          
              
                           
                         
                         
                         
                        </tr>
                      
                       
                    </tbody>
                    @endforeach --}}
                </table>
            </div>
          








 



@endsection()