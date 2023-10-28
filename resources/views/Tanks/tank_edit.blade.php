extends('layouts.app')
@section('content')

<header class="text-blue-400  text-2xl font-bold text-center py-3"> EDIT TANK </header>
<div class="container">
    <form class=" max-w-sm" action="{{url('/tankEdit/'.$tank->id)}}"  method="post" >
        @csrf
        {{-- <div class="md:flex md:items-center mb-6">
          <div class="md:w-1/3">
            <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
              Tank Company
            </label>
          </div>
          <div class="md:w-2/3">
            <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="company" name="company" type="text" value="{{old('company') ?? $tank->company}}">
          </div>
        </div> --}}
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
          <input type="name" class="form-control  form-control-user"
              id="name" aria-describedby="company" name="company" value="{{old('company') ?? $tank->company}}"
              >
      </div>


        {{-- <div class="md:flex md:items-center mb-6">
          <div class="md:w-1/3">
            <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="height">
              Height
            </label>
          </div>
          <div class="md:w-2/3">
            <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="height"  name="height" type="number" value="{{old('height') ?? $tank->height}}">
          </div>
        </div> --}}
      
        {{-- <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
              <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="Radius">
                Radius
              </label>
            </div>
            <div class="md:w-2/3">
              <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="radius"  name="radius" type="number" value="{{old('radius') ?? $tank->radius}}">
            </div>
          </div> --}}

          <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
              <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                Height
              </label>
            </div>
            {{-- <div class="md:w-2/3">
              <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="name" name="company" type="text" value="">
            </div> --}}
          </div>
          
          <div class="form-group">
            <input type="text" class="form-control  form-control-user"
                id="name" aria-describedby="company" name="height" value="{{old('height') ?? $tank->height}}"
                >
        </div>
          <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
              <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                Radius
              </label>
            </div>
            {{-- <div class="md:w-2/3">
              <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="name" name="company" type="text" value="">
            </div> --}}
          </div>
          
          <div class="form-group">
            <input type="text" class="form-control  form-control-user"
                id="name" aria-describedby="company" name="radius" value="{{old('radius') ?? $tank->radius}}"
                >
        </div>
          {{-- <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
              <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="Capacity">
                Capacity
              </label>
            </div>
            <div class="md:w-2/3">
              <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="capacity"  name="capacity" type="number"  value="{{old('capacity') ?? $tank->capacity }}">
            </div>
          </div> --}}
          <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
              <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                Capacity
              </label>
            </div>
            {{-- <div class="md:w-2/3">
              <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="name" name="company" type="text" value="">
            </div> --}}
          </div>
          
          <div class="form-group">
            <input type="number" class="form-control  form-control-user"
                id="name" aria-describedby="company" name="capacity" value="{{old('capacity') ?? $tank->capacity}}"
                >
        </div>
          <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="Capacity">
                  Tank Owner
                </label>
              </div>
              <select name="user_id" class="form-control">
                @foreach ($users as $user)
                <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
                   </select> 
           
  
          </div>

        <div class="md:flex md:items-center">
          <div class="md:w-1/3"></div>
          <div class="md:w-2/3">
            <button type="submit" class="btn btn-success" >Edit</button>
          </div>
        </div>
      </form>

</div>



{{-- 
<form class="user" action="{{url('/tankEdit/'.$tank->id)}}"  method="post">
  @csrf
    <div class="form-group">
        <input type="email" class="form-control form-control-user  @error("email") is-invalid 
          
        @enderror"
            id="email" aria-describedby="emailHelp" name= "email"
            placeholder="Enter Email Address...">
@error("email")
<span class="invalid-feedback"  role="alert">
<strong> {{$message}}</strong>
</span>
@enderror



    </div>
    <div class="form-group">
        <input type="password" class="form-control form-control-user @error("password") is-invalid 
          
        @enderror"
            id="password" name ="password" placeholder="Password">
            @error("password")
<span class="invalid-feedback"  role="alert">
<strong> {{$message}}</strong>
</span>
@enderror 
    </div>
    <div class="form-group">
        <div class="custom-control custom-checkbox small">
            <input type="checkbox" class="custom-control-input" id="customCheck">
            <label class="custom-control-label" for="customCheck">Remember
                Me</label>
        </div>
    </div>
    <button class="btn btn-primary btn-user btn-block">
        Login
    </button>
    <hr>
   
</form> --}}
  
@endsection

