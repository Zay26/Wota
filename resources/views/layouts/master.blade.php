<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    
    <script type="module" src="https://unpkg.com/ui-water-jar@latest/dist/ui-water-jar/ui-water-jar.esm.js"></script>
<script nomodule="" src="https://unpkg.com/ui-water-jar@latest/dist/ui-water-jar/ui-water-jar.js"></script>
</head>
<body>
    <main class="flex h-screen">
        <section class="bg-blue-400 flex-row">
        
            <div class="flex flex-col w-64 h-screen px-4 py-8 bg-white border-r dark:bg-blue-400 ">
                <h2 class="text-white font-bold  text-center  text-2xl dark:text-white">WOTA</h2>
        
                {{-- <div class="relative mt-6">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                        <svg class="w-5 h-5 text-white" viewBox="0 0 24 24" fill="none">
                            <path d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    </span>
        
                    <input type="text" class="w-full py-2 pl-10 pr-4 text-gray-700 bg-white border rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-300 focus:ring-blue-300 focus:ring-opacity-40 focus:outline-none focus:ring" placeholder="Search"/> 
                </div> --}}
                
                <div class="flex flex-col justify-between flex-1 mt-6">
                    <nav>
                        <a class="flex items-center px-4 py-2 text-blue-400  rounded-md dark:text-white hover:text-blue-400 hover:bg-white" href="{{route('dashboard')}}">
                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M19 11H5M19 11C20.1046 11 21 11.8954 21 13V19C21 20.1046 20.1046 21 19 21H5C3.89543 21 3 20.1046 3 19V13C3 11.8954 3.89543 11 5 11M19 11V9C19 7.89543 18.1046 7 17 7M5 11V9C5 7.89543 5.89543 7 7 7M7 7V5C7 3.89543 7.89543 3 9 3H15C16.1046 3 17 3.89543 17 5V7M7 7H17" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
        
                            <span class="mx-4 font-medium">Dashboard</span>
                        </a>
        
                        <a class="flex items-center px-4 py-2 mt-5 text-white transition-colors duration-200 transform rounded-md dark:text-white  hover:bg-white hover:text-blue-400" href="{{route('users')}}" >
                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16 7C16 9.20914 14.2091 11 12 11C9.79086 11 8 9.20914 8 7C8 4.79086 9.79086 3 12 3C14.2091 3 16 4.79086 16 7Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M12 14C8.13401 14 5 17.134 5 21H19C19 17.134 15.866 14 12 14Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
        
                            <span class="mx-4 font-medium">Users</span>
                        </a>
                        <a class="flex items-center px-4 py-2 mt-5 text-white transition-colors duration-200 transform rounded-md dark:text-white  hover:bg-white hover:text-blue-400" href="{{route('tank')}}">
                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16 7C16 9.20914 14.2091 11 12 11C9.79086 11 8 9.20914 8 7C8 4.79086 9.79086 3 12 3C14.2091 3 16 4.79086 16 7Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M12 14C8.13401 14 5 17.134 5 21H19C19 17.134 15.866 14 12 14Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
        
                            <span class="mx-4 font-medium">Tank</span>
                        </a>
                     
                    </nav>
        
                    {{-- <div class="flex items-center px-4 -mx-2">
                        <img class="object-cover mx-2 rounded-full h-9 w-9" src="https://images.unsplash.com/photo-1531427186611-ecfd6d936c79?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=634&q=80" alt="avatar"/>
                        <h4 class="mx-2 font-medium text-white-400800 dark:text-white-400200 hover:underline">John Doe</h4>
                    </div> --}}
                </div>
            </div>
        </section>
        
        <section class="w-full ">

            <nav class="bg-white shadow dark:bg-white-800 border-blue-400">
                <div class="container flex items-center justify-center p-6 mx-auto text-gray-900 capitalize dark:text-gray-600">
                  
        
                    <a href="#" class="border-b-2 border-transparent hover:text-gray-800 transition-colors duration-200 transform dark:hover:text-gray-200 hover:border-blue-500 mx-1.5 sm:mx-6">
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="m.75 19h7.092c4.552 0 6.131-6.037 2.107-8.203 2.701-2.354 1.029-6.797-2.595-6.797h-6.604c-.414 0-.75.336-.75.75v13.5c0 .414.336.75.75.75zm.75-13.5h5.854c3.211 0 3.215 4.768 0 4.768h-5.854zm0 6.268h6.342c3.861 0 3.861 5.732 0 5.732h-6.342z"/><path d="m18.374 7.857c-3.259 0-5.755 2.888-5.635 5.159-.247 3.28 2.397 5.984 5.635 5.984 2.012 0 3.888-1.065 4.895-2.781.503-.857-.791-1.613-1.293-.76-.739 1.259-2.12 2.041-3.602 2.041-2.187 0-3.965-1.668-4.125-3.771 1.443.017 4.136-.188 8.987-.033.016 0 .027-.008.042-.008 2-.09-.189-5.831-4.904-5.831zm-3.928 4.298c1.286-3.789 6.718-3.676 7.89.064-4.064.097-6.496-.066-7.89-.064z"/><path d="m21.308 6.464c.993 0 .992-1.5 0-1.5h-5.87c-.993 0-.992 1.5 0 1.5z"/></svg>
                    </a>
                </div>
            </nav>
            <div class="container ">
                @yield('content')
            </div>
         
        </section>
        
        
          </main>
   
       
          <script src="https://unpkg.com/chart.js@^2.9.3/dist/Chart.min.js"></script>
          <!-- Chartisan -->
          <script src="https://unpkg.com/@chartisan/chartjs@^2.1.0/dist/chartisan_chartjs.umd.js"></script>
          <!-- Your application script -->
          @stack('js')
       
   
</body>
</html>