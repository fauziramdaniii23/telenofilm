
<nav>
    <a class="block text-neutral-100 py-2.5 px-4 rounded transition duration-200 hover:bg-neutral-100 hover:text-black my-2" href="{{ route('dashboard') }}">
        <i class="fas fa-exchange-alt mr-2"></i><span class="hidden md:inline">Transaksi</span>
    </a>
    <a class="block text-neutral-100 py-2.5 px-4 rounded transition duration-200 hover:bg-neutral-100 hover:text-black my-2" href="{{ route('users') }}">
        <i class="fas fa-users mr-2"></i><span class="hidden md:inline">User (Pengguna)</span>
    </a>
    
    <div id="accordionExample">      
        <div
        class="">
        <h2 class="mb-0" id="headingTwo">
            <button
            class="group relative flex w-full items-center text-left text-base text-neutral-100 px-4 py-2.5 rounded transition duration-200 hover:bg-neutral-100 hover:text-black hover:z-[2] focus:z-[3] focus:outline-none dark:bg-neutral-800 dark:text-white [&:not([data-te-collapse-collapsed])]:text-white"
            type="button"
            data-te-collapse-init
            data-te-collapse-collapsed
            data-te-target="#collapseTwo"
            aria-expanded="false"
            aria-controls="collapseTwo">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-neutral-100 hover:fill-black mr-2" style="transform: ;msFilter:;"><path d="M4 11h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1zm10 0h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1h-6a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1zM4 21h6a1 1 0 0 0 1-1v-6a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1zm13 0c2.206 0 4-1.794 4-4s-1.794-4-4-4-4 1.794-4 4 1.794 4 4 4z"></path></svg>
            <span class="hidden md:inline">Category</span>
            <span
                class="-mr-1 ml-auto h-5 w-5 shrink-0 rotate-[-180deg] fill-[#336dec] transition-transform duration-200 ease-in-out group-[[data-te-collapse-collapsed]]:mr-0 group-[[data-te-collapse-collapsed]]:rotate-0 group-[[data-te-collapse-collapsed]]:fill-[#212529] motion-reduce:transition-none dark:fill-blue-300 dark:group-[[data-te-collapse-collapsed]]:fill-white">
                <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                stroke-width="1.5"
                stroke="currentColor"
                class="h-6 w-6">
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                </svg>
            </span>
            </button>
        </h2>
        <div
            id="collapseTwo"
            class="!visible hidden"
            data-te-collapse-item
            aria-labelledby="headingTwo"
            data-te-parent="#accordionExample">
            <div>
            <a href="{{ route('admin.wedding', ['categoryName' => 'wedding']) }}" class="px-5">
                
                    <p class="pl-10 py-2 text-neutral-100 px-4 rounded transition duration-200 hover:bg-neutral-100 hover:text-black">Wedding</p>
                
            </a>
            <a href="{{ route('admin.prewedding') }}" class="px-5">
              
                    <p class="pl-10 py-2 text-neutral-100 px-4 rounded transition duration-200 hover:bg-neutral-100 hover:text-black">Pre Wedding</p>
               
            </a>
            <a href="{{ route('adminEngagement') }}" class="px-5">
           
                    <p class="pl-10 py-2 text-neutral-100 px-4 rounded transition duration-200 hover:bg-neutral-100 hover:text-black">Engagement</p>
            </a>

            <a href="{{ route('adminGraduation') }}" class="px-5">
             
                    <p class="pl-10 py-2 text-neutral-100 px-4 rounded transition duration-200 hover:bg-neutral-100 hover:text-black">Graduation</p>
               
            </a>
            <a href="{{ route('adminEvent') }}" class="px-5">
             
                    <p class="pl-10 py-2 text-neutral-100 px-4 rounded transition duration-200 hover:bg-neutral-100 hover:text-black">Event</p>
               
            </a>
            <a href="{{ route('adminAds') }}" class="px-5">
             
                    <p class="pl-10 py-2 text-neutral-100 px-4 rounded transition duration-200 hover:bg-neutral-100 hover:text-black">Ads</p>
               
            </a>
        </div>
           
        </div>
        </div>
    
    </div>
    <a class="block text-neutral-100 py-2.5 px-4 rounded transition duration-200 hover:bg-neutral-100 hover:text-black my-2" href="{{ route('admin.prewedding') }}">
        <i class="fas fa-file-alt mr-2"></i><span class="hidden md:inline">detail</span>
    </a>
    <a class="block text-neutral-100 py-2.5 px-4 rounded transition duration-200 hover:bg-neutral-100 hover:text-black my-2" href="{{ route('admin.paket') }}">
        <i class="fas fa-store mr-2"></i><span class="hidden md:inline">Daftar Paket</span>
    </a>
    <a class="block text-neutral-100 py-2.5 px-4 rounded transition duration-200 hover:bg-neutral-100 hover:text-black my-2" href="#">
        <i class="fas fa-home mr-2"></i><span class="hidden md:inline">Home</span>
    </a>
</nav>