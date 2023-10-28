@extends('layouts.app')
@section('content')

<header class="text-blue-400  text-2xl font-bold text-center py-3"> REGISTER USER </header>
<div class="container">
    <form class="max-w-sm" action="{{route('formreg')}}" method="POST" >
        @csrf
        {{-- <div class="form-group">
          <div class="md:w-1/3">
            <label class="block text-black font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
              Full Name
            </label>
          </div>
        
          <div class="md:w-2/3">
            <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="name" name="name" type="text" value="">
          </div>
        </div> --}}
        <div class="md:flex md:items-center mb-6">
          <div class="md:w-1/3">
            <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
              Full Name
            </label>
          </div>
          {{-- <div class="md:w-2/3">
            <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="name" name="company" type="text" value="">
          </div> --}}
        </div>
        
        <div class="form-group">
          <input type="name" class="form-control  form-control-user"
              id="name" aria-describedby="name" name="name"
              placeholder="Enter Full Name">
      </div>
      <div class="md:flex md:items-center mb-6">
        <div class="md:w-1/3">
          <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
           Email
          </label>
        </div>
        {{-- <div class="md:w-2/3">
          <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="name" name="company" type="text" value="">
        </div> --}}
      </div>
      <div class="form-group">
        <input type="Email" class="form-control form-control-user"
            id="Email" aria-describedby="name" name="email"
            placeholder="Email">
    </div>
    <div class="md:flex md:items-center mb-6">
      <div class="md:w-1/3">
        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
          Password
        </label>
      </div>
      {{-- <div class="md:w-2/3">
        <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="name" name="company" type="text" value="">
      </div> --}}
    </div>
    <div class="form-group">
      <input type="password" class="form-control form-control-user"
          id="password" aria-describedby="name" name ="password"
          placeholder="Password">
  </div>
        {{-- <div class="form-group">
          <div class="md:w-1/3">
            <label class="block text-black font-bold md:text-right mb-1 md:mb-0 pr-4" for="email">
              Email
            </label>
          </div> --}}
          {{-- <div class="md:w-2/3">
            <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="email"  name="email" type="email" placeholder="">
          </div>
        </div> --}}
      
        {{-- <div class="form-group">
            <div class="md:w-1/3">
              <label class="block text-black font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-password">
                Password
              </label>
            </div> --}}
            {{-- <div class="md:w-2/3">
              <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="password"  name="password" type="password" placeholder="">
            </div>
          </div> --}}
        <div class="md:flex md:items-center">
          <div class="md:w-1/3"></div>
          <div class="md:w-2/3">
            <button type="submit" class="btn btn-success" >Register User</button>
              
        
            
          </div>
        </div>
      </form>

</div>

  
@endsection

