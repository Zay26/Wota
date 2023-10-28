@extends('layouts.app')
@section('content')


 
    {{-- <div class="flex flex-row justify-between  w-full p-2">
       
     <h1></h1>

       
    </div>
 
<div> --}}

   
  {{-- <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-50 dark:text-gray-400">
    <tr>
    <th scope="col" class="px-6 py-3">
    id
    </th>
    <th scope="col" class="px-6 py-3">
   username
    </th>
    <th scope="col" class="px-6 py-3">
  email
    </th>
    <th scope="col" class="px-6 py-3">
        node
          </th>
   
    <th scope="col" class="px-6 py-3">
    <span class="sr-only">Edit</span>
    </th>
    </tr>
    </thead>
    @foreach ($users as $user)
    <tbody>
    <tr class="bg-white border-b dark:bg-grey-50 dark:border-gray-50 hover:bg-white dark:hover:bg-white">
    <th scope="row" class="px-6 py-4 font-medium text-blue-400 dark:text-blue-400 whitespace-nowrap">
   {{$user->id}}
    </th>
    <td class="px-6 py-4 text-blue-400">
   {{$user->name}}
    </td>
    <td class="px-6 py-4 text-blue-400">
    {{$user->email}}
    </td>
    <td class="px-6 py-4 text-blue-400">
   node
    </td>
    <td class="px-6 py-4 text-right">
    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
    </td>
    </tr>
    
    </tbody>
    @endforeach
    </table>
    </div>
    
     

        

</div> --}}
     
   
   
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
    <div class="container-fluid">

        <div class="col-lg-10">
            <h6 class="m-0 font-weight-bold text-primary">Program Users </h6>
        </div>
        <div class="col-lg-12">
            <a  class="btn btn-success btn-user " href="{{route('userReg')}}" class="text-center text-white bg-blue-400 rounded-md hover:bg-blue-300 p-2 ">Add New User</a>

      </div>


</div>
</nav>

<div class="col">


<div class="card  shadow mb-4">
 
  <div class="card-body ">
      <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                  <tr>
                      <th>Id</th>
                      <th>Name</th>
                      <th>Email</th>
                     
                      {{-- <th>Approve</th> --}}
                      <th>Delete</th>
                      
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
              @foreach ($users as $user)
              <tbody>
                  <tr>
                      <td> {{$user->id}}</td>
                      <td> {{$user->name}}</td>
                      <td > {{$user->email}}</td>
                    
                     
                   
                      
                      {{-- <td width="10%">  <a  href="{{url('/userEdit/'.$user->id)}} "class="btn btn-info btn-user btn-block"> Approve </a></td> --}}
                      <td width="10%">  <a   href="{{url('/UserDelete/'.$user->id)}} " >   <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                      </svg> </a></td>

                   
                  </tr>
                
                 
              </tbody>
              @endforeach
          </table>
      </div>
      {{$users->links()}}
  </div>
</div>

</div>
@endsection

