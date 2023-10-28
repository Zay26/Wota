@extends('layouts.master')
@section('content')

<div class="flex  flex-col h-screen  bg-blue-50">
 <div class="flex flex-row justify-center">
    <div class="w-1/4  mt-8 ">
        <ui-water-jar size="20" value="10" color="#6EABEB" shape="cylinder"></ui-water-jar>
    </div>
    <div class="w-1/2  m-8  mx-24">
        <div class="flex flex-row items-end">
            <h1 class="text-blue-400 text-9xl ">10 </h1>
            <h1 class="text-blue-400 text-4xl ">Litres Remaining </h1>
        </div>

    </div>
 </div>

    <div class="flex flex-row justify-between m-20">
        <div class=" flex flex-row">
            {{-- <div id="chart"  class="h-4xl  m-10"> </div> --}}
            <div id="chart2"  class="h-4xl  m-10"> </div>
        </div>
             



  
     
    
  
</div>

@push('js')
    

{{-- <script>
    const chart = new Chartisan({
      el: '#chart',
      url: "@chart('tank_chart')",
      hooks:new ChartisanHooks()
      .colors()
      .datasets([{type:'line', fill:false , color:'blue', tension: 0.1}])

    });
  </script> --}}

<script>
    const chart = new Chartisan({
      el: '#chart2',
      url: "@chart('y_tank_chart')",
      hooks:new ChartisanHooks()
      .colors()
      .datasets([{type:'line', fill:false , color:'blue', tension: 0.1}])

    });
  </script>
  @endpush
 
@endsection