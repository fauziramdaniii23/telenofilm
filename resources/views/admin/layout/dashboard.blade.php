<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard | {{ $title }}</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
        
     @vite('resources/css/app.css')
     @vite('resources/js/app.js')
</head>
<body class="bg-neutral-100">
<div class="flex flex-col h-screen bg-gray-100">

    <div class="bg-neutral-50 text-white shadow w-full p-2 flex items-center justify-between">
        <div class="flex items-center">
            <div class="hidden md:flex items-center"> 
                <img src="{{ asset('logo.png') }}" alt="Logo" class="w-10 h-10 mr-2">
                <h2 class="font-bold text-xl text-gray-500">Admin Telenofilm</h2>
            </div>
            <div class="md:hidden flex items-center"> 
                <button id="menuBtn">
                    <i class="fas fa-bars text-gray-500 text-lg"></i> 
                </button>
            </div>
        </div>

        <div class="space-x-5">
            <button>
                <i class="fas fa-bell text-gray-500 text-lg"></i>
            </button>
            
            <button>
                <i class="fas fa-user text-gray-500 text-lg"></i>
            </button>
        </div>
    </div>

    
    <div class="flex">
        
        <div class="px-2 pt-2 bg-neutral-800 w-24 lg:w-60 flex-col hidden md:flex min-h-screen" id="sideNav">
           
            @include('admin.layout.sidenav')

            <a class="block text-neutral-100 py-2.5 px-4 rounded transition duration-200 hover:bg-neutral-100 hover:text-black my-1 mt-auto" href="/">
                <i class="fas fa-sign-out-alt mr-2"></i><span class="hidden md:inline">Home</span>
            </a>

            <div class="bg-gradient-to-r from-cyan-300 to-cyan-500 h-px mt-2"></div>

            <p class="mb-1 px-5 py-3 text-left text-xs text-neutral-300">V 1.0</p>

        </div>
        <div class="w-full p-5">
            

        @yield('container')

        </div>
    </div>
</div>
   
@include('sweetalert::alert')

<script>
   
    const menuBtn = document.getElementById('menuBtn');
    const sideNav = document.getElementById('sideNav');

    menuBtn.addEventListener('click', () => {
        sideNav.classList.toggle('hidden');
    });
</script>
</body>
</html>