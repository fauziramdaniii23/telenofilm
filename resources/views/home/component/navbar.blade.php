<nav
class="fixed top-0 lg:px-5 z-10 flex-no-wrap flex w-full items-center justify-between border-b-1 lg:border-b-2 border-black bg-black bg-opacity-90 backdrop-blur-sm py-2 shadow-md shadow-black/5 dark:bg-neutral-600 dark:shadow-black/10 lg:flex-wrap lg:justify-start lg:py-4">
<div class="flex w-full flex-wrap items-center justify-between px-3">
  <!-- Hamburger button for mobile view -->
  <button
    class="block border-0 bg-transparent px-2 text-neutral-500 hover:no-underline hover:shadow-none focus:no-underline focus:shadow-none focus:outline-none focus:ring-0 dark:text-neutral-200 lg:hidden"
    type="button"
    data-te-collapse-init
    data-te-target="#navbarSupportedContent1"
    aria-controls="navbarSupportedContent1"
    aria-expanded="false"
    aria-label="Toggle navigation">
    <!-- Hamburger icon -->
    <span class="[&>svg]:w-7">
      <svg
        xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 24 24"
        fill=" rgb(255, 255, 255)"
        class="h-7 w-7">
        <path
          fill-rule="evenodd"
          d="M3 6.75A.75.75 0 013.75 6h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 6.75zM3 12a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 12zm0 5.25a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75a.75.75 0 01-.75-.75z"
          clip-rule="evenodd" />
      </svg>
    </span>
  </button>
  

  <!-- Collapsible navigation container -->
  <div
    class="!visible hidden flex-grow basis-[100%] items-center lg:!flex lg:basis-auto"
    id="navbarSupportedContent1"
    data-te-collapse-item>
    <!-- Logo -->
    <a
      class="group mb-4 ml-2 mr-5 mt-3 flex items-center text-neutral-900 hover:text-neutral-900 focus:text-neutral-900 dark:text-neutral-200 dark:hover:text-neutral-400 dark:focus:text-neutral-400 lg:mb-0 lg:mt-0"
      href="#">
      <img class="h-10 w-10 rounded-full border-2 border-white group-hover:animate-spin-slow"
        src="{{ asset('/logo.png') }}"
        loading="lazy" />
        <h1 class="font-serif mx-2 text-white">Telenofilm</h1>
    </a>
    <!-- Left navigation links -->
    <ul
      class="list-style-none mr-auto flex flex-col pl-0 lg:flex-row"
      data-te-navbar-nav-ref>
      <li class="mb-4 lg:mb-0 lg:pr-2" data-te-nav-item-ref>
        <!-- Dashboard link -->
        <a
          class="relative text-white font-normal text-lg transition duration-200 hover:ease-in-out focus:after:w-full disabled:text-black/30 dark:text-neutral-200 dark:hover:text-neutral-300 dark:focus:text-neutral-300 lg:px-2 [&.active]:after:w-full dark:[&.active]:text-zinc-400 after:content-[''] after:w-0 after:absolute after:h-[2px] after:bg-white after:left-0 after:-bottom-2 after:transition-all after:duration-300 hover:after:w-full"
          href="#"
          data-te-nav-link-ref
          >Home</a
        >
      </li>
      <!-- Team link -->
      <li class="mb-4 lg:mb-0 lg:pr-2" data-te-nav-item-ref>
        <a
        class="relative text-white font-normal text-lg transition duration-200 hover:ease-in-out focus:after:w-full disabled:text-black/30 dark:text-neutral-200 dark:hover:text-neutral-300 dark:focus:text-neutral-300 lg:px-2 [&.active]:after:w-full dark:[&.active]:text-zinc-400 after:content-[''] after:w-0 after:absolute after:h-[2px] after:bg-white after:left-0 after:-bottom-2 after:transition-all after:duration-300 hover:after:w-full"
          href="#about"
          data-te-nav-link-ref
          >About Us</a
        >
      </li>
      <!-- Projects link -->
      <li class="mb-4 lg:mb-0 lg:pr-2" data-te-nav-item-ref>
        <a
        class="relative text-white font-normal text-lg transition duration-200 hover:ease-in-out focus:after:w-full disabled:text-black/30 dark:text-neutral-200 dark:hover:text-neutral-300 dark:focus:text-neutral-300 lg:px-2 [&.active]:after:w-full dark:[&.active]:text-zinc-400 after:content-[''] after:w-0 after:absolute after:h-[2px] after:bg-white after:left-0 after:-bottom-2 after:transition-all after:duration-300 hover:after:w-full"
          href="#category"
          data-te-nav-link-ref
          >Category</a
        >
      </li>
      <li class="mb-4 lg:mb-0 lg:pr-2" data-te-nav-item-ref>
        <a
        class="relative text-white font-normal text-lg transition duration-200 hover:ease-in-out focus:after:w-full disabled:text-black/30 dark:text-neutral-200 dark:hover:text-neutral-300 dark:focus:text-neutral-300 lg:px-2 [&.active]:after:w-full dark:[&.active]:text-zinc-400 after:content-[''] after:w-0 after:absolute after:h-[2px] after:bg-white after:left-0 after:-bottom-2 after:transition-all after:duration-300 hover:after:w-full"
          href="#team"
          data-te-nav-link-ref
          >Our Team</a
        >
      </li>
      <li class="mb-4 lg:mb-0 lg:pr-2" data-te-nav-item-ref>
        <a
        class="relative text-white font-normal text-lg transition duration-200 hover:ease-in-out focus:after:w-full disabled:text-black/30 dark:text-neutral-200 dark:hover:text-neutral-300 dark:focus:text-neutral-300 lg:px-2 [&.active]:after:w-full dark:[&.active]:text-zinc-400 after:content-[''] after:w-0 after:absolute after:h-[2px] after:bg-white after:left-0 after:-bottom-2 after:transition-all after:duration-300 hover:after:w-full"
          href="#contact"
          data-te-nav-link-ref
          >Contact Us</a
        >
      </li>
    
    </ul>
  </div>

  <!-- Right elements -->
  <div class="relative flex items-center">

   
    <!-- Second dropdown container -->
    @auth

    <div
        class="relative"
        data-te-dropdown-ref
        data-te-dropdown-alignment="end">
        <!-- First dropdown trigger -->
        <a
          class="me-4 flex items-center text-neutral-600 dark:text-white"
          href="#"
          id="dropdownMenuButton1"
          role="button"
          data-te-dropdown-toggle-ref
          aria-expanded="false">
          <!-- Dropdown trigger icon -->
          <span class="[&>svg]:w-5">
            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" style="fill: rgb(255, 255, 255);transform: ;msFilter:;"><path d="M5 22h14c1.103 0 2-.897 2-2V9a1 1 0 0 0-1-1h-3V7c0-2.757-2.243-5-5-5S7 4.243 7 7v1H4a1 1 0 0 0-1 1v11c0 1.103.897 2 2 2zM9 7c0-1.654 1.346-3 3-3s3 1.346 3 3v1H9V7zm-4 3h2v2h2v-2h6v2h2v-2h2l.002 10H5V10z"></path></svg>
          </span>
          <!-- Notification counter -->
          <span
            class="absolute -mt-4 ms-2.5 rounded-full bg-danger px-[0.35em] py-[0.15em] text-[0.6rem] font-bold leading-none text-white"
            >1</span
          >
        </a>
        <!-- First dropdown menu -->
        <ul
          class="absolute z-[1000] float-left m-0 hidden min-w-max list-none overflow-hidden rounded-lg border-none bg-white bg-clip-padding text-left text-base shadow-lg data-[te-dropdown-show]:block dark:bg-surface-dark"
          aria-labelledby="dropdownMenuButton1"
          data-te-dropdown-menu-ref>
          <!-- First dropdown menu items -->
          <li>
            <a
              class="flex w-full whitespace-nowrap bg-white px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-zinc-200/60 focus:bg-zinc-200/60 focus:outline-none active:bg-zinc-200/60 active:no-underline dark:bg-surface-dark dark:text-white dark:hover:bg-neutral-800/25 dark:focus:bg-neutral-800/25 dark:active:bg-neutral-800/25"
              href="{{ route('dataOrder', ['username' => auth()->user()->name]) }}"
              data-te-dropdown-item-ref
              ><svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M4 20h2V10a1 1 0 0 1 1-1h12V7a1 1 0 0 0-1-1h-3.051c-.252-2.244-2.139-4-4.449-4S6.303 3.756 6.051 6H3a1 1 0 0 0-1 1v11a2 2 0 0 0 2 2zm6.5-16c1.207 0 2.218.86 2.45 2h-4.9c.232-1.14 1.243-2 2.45-2z"></path><path d="M21 11H9a1 1 0 0 0-1 1v8a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2v-8a1 1 0 0 0-1-1zm-6 7c-2.757 0-5-2.243-5-5h2c0 1.654 1.346 3 3 3s3-1.346 3-3h2c0 2.757-2.243 5-5 5z"></path></svg>
              <span class="ml-2">Pesanan Saya</span></a
            >
          </li>
          <li>
            <a
              class="flex w-full whitespace-nowrap bg-white px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-zinc-200/60 focus:bg-zinc-200/60 focus:outline-none active:bg-zinc-200/60 active:no-underline dark:bg-surface-dark dark:text-white dark:hover:bg-neutral-800/25 dark:focus:bg-neutral-800/25 dark:active:bg-neutral-800/25"
              href="{{ route('historyOrder', ['username' => auth()->user()->name]) }}"
              data-te-dropdown-item-ref
              ><svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M12 8v5h5v-2h-3V8z"></path><path d="M21.292 8.497a8.957 8.957 0 0 0-1.928-2.862 9.004 9.004 0 0 0-4.55-2.452 9.09 9.09 0 0 0-3.626 0 8.965 8.965 0 0 0-4.552 2.453 9.048 9.048 0 0 0-1.928 2.86A8.963 8.963 0 0 0 4 12l.001.025H2L5 16l3-3.975H6.001L6 12a6.957 6.957 0 0 1 1.195-3.913 7.066 7.066 0 0 1 1.891-1.892 7.034 7.034 0 0 1 2.503-1.054 7.003 7.003 0 0 1 8.269 5.445 7.117 7.117 0 0 1 0 2.824 6.936 6.936 0 0 1-1.054 2.503c-.25.371-.537.72-.854 1.036a7.058 7.058 0 0 1-2.225 1.501 6.98 6.98 0 0 1-1.313.408 7.117 7.117 0 0 1-2.823 0 6.957 6.957 0 0 1-2.501-1.053 7.066 7.066 0 0 1-1.037-.855l-1.414 1.414A8.985 8.985 0 0 0 13 21a9.05 9.05 0 0 0 3.503-.707 9.009 9.009 0 0 0 3.959-3.26A8.968 8.968 0 0 0 22 12a8.928 8.928 0 0 0-.708-3.503z"></path></svg>
              <span class="ml-2">Riwayat Pesanan</span></a
            >
          </li>
          <li>
            <a
              class="block w-full whitespace-nowrap bg-white px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-zinc-200/60 focus:bg-zinc-200/60 focus:outline-none active:bg-zinc-200/60 active:no-underline dark:bg-surface-dark dark:text-white dark:hover:bg-neutral-800/25 dark:focus:bg-neutral-800/25 dark:active:bg-neutral-800/25"
              href="#"
              data-te-dropdown-item-ref
              >Something else here</a
            >
          </li>
        </ul>
      </div>

        
    
    <div
      class="relative"
      data-te-dropdown-ref
      data-te-dropdown-alignment="end">
      <!-- Second dropdown trigger -->
      <a
        class="hidden-arrow flex items-center whitespace-nowrap transition duration-150 ease-in-out motion-reduce:transition-none"
        href="#"
        id="dropdownMenuButton2"
        role="button"
        data-te-dropdown-toggle-ref
        aria-expanded="false">
        <!-- User avatar -->
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgb(255, 255, 255);transform: ;msFilter:;"><path d="M16.293 9.293 12 13.586 7.707 9.293l-1.414 1.414L12 16.414l5.707-5.707z"></path></svg>
        <h1 class="mx-2 text-base text-white">{{ auth()->user()->name }}</h1>
        <!-- User avatar -->
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgb(240, 240, 240);transform: ;msFilter:;"><path d="M12 2C6.579 2 2 6.579 2 12s4.579 10 10 10 10-4.579 10-10S17.421 2 12 2zm0 5c1.727 0 3 1.272 3 3s-1.273 3-3 3c-1.726 0-3-1.272-3-3s1.274-3 3-3zm-5.106 9.772c.897-1.32 2.393-2.2 4.106-2.2h2c1.714 0 3.209.88 4.106 2.2C15.828 18.14 14.015 19 12 19s-3.828-.86-5.106-2.228z"></path></svg>
      </a>
      <!-- Second dropdown menu -->
      <ul
        class="absolute z-[1000] float-left m-0 hidden min-w-max list-none overflow-hidden rounded-lg border-none bg-white bg-clip-padding text-left text-base shadow-lg dark:bg-neutral-700 [&[data-te-dropdown-show]]:block"
        aria-labelledby="dropdownMenuButton2"
        data-te-dropdown-menu-ref>
        <!-- Second dropdown menu items -->
        @if (Auth::check() && Auth::user()->role == 'admin' || Auth::user()->role == 'developer')
        <li>
              
          <a
          class="block w-full whitespace-nowrap bg-transparent px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-neutral-600"
          href="{{ route('dashboard') }}"
          data-te-dropdown-item-ref
          >Admin Dashboard</a>
        </li>
          @endif
        <li>
          <a
            class="flex w-full whitespace-nowrap bg-transparent px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-white/30"
            href="#"
            data-te-dropdown-item-ref
            ><svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M7.5 6.5C7.5 8.981 9.519 11 12 11s4.5-2.019 4.5-4.5S14.481 2 12 2 7.5 4.019 7.5 6.5zM20 21h1v-1c0-3.859-3.141-7-7-7h-4c-3.86 0-7 3.141-7 7v1h17z"></path></svg>
            <span class="ml-2">Profile</span></a
          >
        </li>
        <li>
          <a
            class="flex w-full whitespace-nowrap bg-transparent px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-white/30"
            href="{{ route('myGalerry', ['username' => auth()->user()->name]) }}"
            data-te-dropdown-item-ref
            ><svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M11.024 11.536 10 10l-2 3h9l-3.5-5z"></path><circle cx="9.503" cy="7.497" r="1.503"></circle><path d="M19 2H6c-1.206 0-3 .799-3 3v14c0 2.201 1.794 3 3 3h15v-2H6.012C5.55 19.988 5 19.806 5 19s.55-.988 1.012-1H21V4c0-1.103-.897-2-2-2zm0 14H5V5c0-.806.55-.988 1-1h13v12z"></path></svg>
            <span class="ml-2">Foto Saya</span></a>
        </li>
        <li>
          <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="flex items-center justify-center w-full bg-transparent px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-neutral-600" type="submit" data-te-dropdown-item-ref>
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M16 13v-2H7V8l-5 4 5 4v-3z"></path><path d="M20 3h-9c-1.103 0-2 .897-2 2v4h2V5h9v14h-9v-4H9v4c0 1.103.897 2 2 2h9c1.103 0 2-.897 2-2V5c0-1.103-.897-2-2-2z"></path></svg>
              <span class="ml-2">Logout</span>
          </button>
          
        </form>
        </li>
      </ul>
    </div>
    @else
    <a href="{{ route('login') }}" class="group block rounded-xl px-4 py-2 mx-4 text-white hover:text-black hover:bg-white  transition-all duration-300">
      <span class="flex items-center">
        <span class="ml-2 text-base">Login</span>
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-white group-hover:fill-black" style="transform: ;msFilter:;">
              <path d="M18.5 2h-13a.5.5 0 0 0-.5.5V11h6V8l5 4-5 4v-3H5v8.5a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-19a.5.5 0 0 0-.5-.5z"></path>
          </svg>
      </span>
  </a>
  
    @endauth

  </div>
</div>
</nav>