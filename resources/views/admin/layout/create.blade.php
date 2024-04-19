<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
      
        
    <style>
        @media (max-width: 768px) {
            .flex-wrap {
                display: flex;
                flex-wrap: wrap;
            }
            .section-small {
                width: 50%;
            }
        }
    </style>
     @vite('resources/css/app.css')
     @vite('resources/js/app.js')
</head>
<body>
<div class="flex flex-col h-screen bg-gray-100">

    <!-- Barra de navegación superior -->
    <div class="bg-slate-200 text-white shadow w-full p-2 flex items-center justify-between">
        <div class="flex items-center">
            <div class="hidden md:flex items-center"> <!-- Se oculta en dispositivos pequeños -->
                <img src="https://www.emprenderconactitud.com/img/POC%20WCS%20(1).png" alt="Logo" class="w-28 h-18 mr-2">
                <h2 class="font-bold text-xl">Nombre de la Aplicación</h2>
            </div>
            <div class="md:hidden flex items-center"> <!-- Se muestra solo en dispositivos pequeños -->
                <button id="menuBtn">
                    <i class="fas fa-bars text-gray-500 text-lg"></i> <!-- Ícono de menú -->
                </button>
            </div>
        </div>

        <!-- Ícono de Notificación y Perfil -->
        <div class="space-x-5">
            <button>
                <i class="fas fa-bell text-gray-500 text-lg"></i>
            </button>
            <!-- Botón de Perfil -->
            <button>
                <i class="fas fa-user text-gray-500 text-lg"></i>
            </button>
        </div>
    </div>

    
    <div class="flex">
        <div class="px-2 bg-slate-100 w-60 flex-col hidden md:flex" id="sideNav">
           
            @include('admin.layout.sidenav')

            <!-- Ítem de Cerrar Sesión -->
            <a class="block text-gray-500 py-2.5 px-4 my-2 rounded transition duration-200 hover:bg-gradient-to-r hover:from-cyan-400 hover:to-cyan-300 hover:text-white mt-auto" href="/">
                <i class="fas fa-sign-out-alt mr-2"></i>Home
            </a>

            <!-- Señalador de ubicación -->
            <div class="bg-gradient-to-r from-cyan-300 to-cyan-500 h-px mt-2"></div>

            <!-- Copyright al final de la navegación lateral -->
            <p class="mb-1 px-5 py-3 text-left text-xs text-cyan-500">Copyright WCSLAT@2023</p>

        </div>
        <div class="w-full p-5">

      @yield('container')
       </div>

    </div>
</div>
   


<!-- Script para las gráficas -->
<script>
    // Gráfica de Usuarios

    // Agregar lógica para mostrar/ocultar la navegación lateral al hacer clic en el ícono de menú
    const menuBtn = document.getElementById('menuBtn');
    const sideNav = document.getElementById('sideNav');

    menuBtn.addEventListener('click', () => {
        sideNav.classList.toggle('hidden');
    });
</script>
</body>
</html>