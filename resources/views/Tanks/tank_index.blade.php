@extends('layouts.app')
@section('content')

  



{{-- <div class="flex flex-row justify-between  w-full p-2">
       
    <h1></h1>

       <a href="{{route('tankForm')}}" class="text-center text-white bg-blue-400 rounded-md hover:bg-blue-300 p-2 ">Add New Tank</a>
   </div>
   
            
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-50 dark:text-gray-400">
    <tr>
    <th scope="col" class="px-6 py-3">
    id
    </th>
    <th scope="col" class="px-6 py-3">
   tankname
    </th>
    <th scope="col" class="px-6 py-3">
        height 
        <span class="lowercase">(m)</span>
    </th>
    <th scope="col" class="px-6 py-3">
        Radius
        <span class="lowercase">(m)</span>
          </th>
          <th scope="col" class="px-6 py-3">
            Capacity
            <span class="lowercase">(m3)</span>
              </th>
              <th scope="col" class="px-6 py-3">
                Username
                <span class="lowercase">(m3)</span>
                  </th>
   
    <th scope="col" class="px-6 py-3">
    <span class="sr-only">Edit</span>
    </th>
    </tr>
    </thead>
    @foreach ($tanks as $tank)
   
    <tbody>
    <tr class="bg-white border-b dark:bg-grey-50 dark:border-gray-50 hover:bg-white dark:hover:bg-white">
    <th scope="row" class="px-6 py-4 font-medium text-blue-400 dark:text-blue-400 whitespace-nowrap">
   {{$tank->id}}
    </th>
    <td class="px-6 py-4 text-blue-400">
   {{$tank->company}}
    </td>
    <td class="px-6 py-4 text-blue-400">
    {{$tank->height}}
    </td>
    <td class="px-6 py-4 text-blue-400">
   {{$tank->radius}}
    </td>
    <td class="px-6 py-4 text-blue-400">
        {{$tank->capacity}}
         </td>
    <td class="px-6 py-4 text-right">
    <a href="{{url('/tankEdit/'.$tank->id)}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
    </td>
    </tr>
    
    </tbody>
    @endforeach
    </table>
    </div> --}}

    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
<div class="container-fluid">

        <div class="col-lg-10">
            <h6 class="m-0 font-weight-bold text-primary">Tank Owners </h6>
        </div>
        <div class="col-lg-12">
            <a  class="btn btn-success btn-user " href="{{route('tankForm')}}" class="text-center text-white bg-blue-400 rounded-md hover:bg-blue-300 p-2 ">Add New Tank</a>

      </div>


</div>
       
</nav>
<div class="col">



   <div class="card shadow mb-4">
      <div class="card-header py-3">
      <div class="card-body">
          <div class="table-responsive">
             
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                      <tr>
                          <th>Id</th>
                          <th>height</th>
                          <th>radius</th>
                          <th>capacity</th>
                          <th>company</th>
                          <th>Owner</th>
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
                  @foreach ($tanks as $tank)
                  <tbody>
                      <tr>
                          <td> {{$tank->id}}</td>
                          <td> {{$tank->height}}</td>
                          <td> {{$tank->radius}}</td>
                          <td> {{$tank->capacity}}</td>
                          <td > {{$tank->company}}</td>
                          <td> {{$users_array[$loop->index]}}</td>
                          {{-- <td > {{$tank->user->name}}</td> --}}
                          <td width="10%" >  <a href="{{url('/tankEdit/'.$tank->id)}}" >
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                              </svg>
                        </a></td>
                        <td width="10%">  <a href="{{url('/tankDelete/'.$tank->id)}}" >
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                              </svg>
                      </a></td>
                      <td width="10%">  <a href="{{url('/tankVisuals/'.$tank->id)}}">
                      
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


    
     

        

          @endsection