@extends('layouts.app')
@section('content')

<header class="text-blue-400  text-2xl font-bold text-center py-3"> REGISTER TANK </header>
<div class="container">
    <form class=" max-w-sm" action="{{route('tankReg')}}" method="POST" >
        @csrf
        <div class="md:flex md:items-center mb-6">
          <div class="md:w-1/3">
            <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
              Tank Company
            </label>
          </div>
          {{-- <div class="md:w-2/3">
            <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="name" name="company" type="text" value="">
          </div> --}}
        </div>
        <div class="form-group">
          <input type="name" class="form-control form-control-user"
              id="name" name = "company" aria-describedby="name"
              placeholder="Enter Full Name">
      </div>
        <div class="md:flex md:items-center mb-6">
          <div class="md:w-1/3">
            <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="height">
              Height
            </label>
          </div>
          {{-- <div class="md:w-2/3">
            <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="height"  name="height" type="number" placeholder="">
          </div> --}}
        </div>
        <div class="form-group">
          <input type="number" class="form-control form-control-user"
              id="number" name = "height" aria-describedby="name"
              placeholder="Enter height">
      </div>
      
        <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
              <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="Radius">
                Radius
              </label>
            </div>
            {{-- <div class="md:w-2/3">
              <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="radius"  name="radius" type="number" placeholder="">
            </div> --}}
          </div>
          <div class="form-group">
            <input type="number" class="form-control form-control-user"
                id="radius" name = "radius" aria-describedby="name"
                placeholder="Enter radius">
        </div>
          <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
              <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="Capacity">
                Capacity
              </label>
            </div>
            {{-- <div class="md:w-2/3">
              <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="capacity"  name="capacity" type="number" placeholder="">
            </div> --}}
          </div>
          <div class="form-group">
            <input type="number" class="form-control form-control-user"
                id="capacity" name = "capacity" aria-describedby="name"
                placeholder="Enter capacity">
        </div>
          <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="Capacity">
                  Tank Owner
                </label>
              </div>
              <select name="user_id">
                @foreach ($users as $users)
                <option value="{{$users->id}}">{{$users->name}}</option>
                @endforeach
                   </select> 
           
  
          </div>























          
        <div class="md:flex md:items-center">
          <div class="md:w-1/3"></div>
          <div class="md:w-2/3">
            <button  class="btn btn-success" type="submit">Register Tank</button>

          </div>
        </div>
      </form>

</div>

  
@endsection

