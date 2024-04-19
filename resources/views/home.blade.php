@extends('layout.main')

@section('main')
  @include('home.component.navbar')

  @include('home.component.carousel')

  @include('home.component.about')

  @include('home.component.categori')

  @include('home.categorie.prewedding.prewedding')

  @include('home.categorie.wedding.wedding')

  @include('home.categorie.engagement.engagement')

  @include('home.categorie.graduation.graduation')

  @include('home.categorie.ads.ads')

  @include('home.categorie.event.event')

  @include('home.component.ourteam')

  @include('home.component.contact')
  

  <footer class="text-center bg-neutral-600">
    <h1 class="text-black py-2">Copyright &copy; 2024 by Telenofim | All Rights Reserved</h1>
  </footer>

  <!-- Back to top button -->
<button
type="button"
data-te-ripple-init
data-te-ripple-color="light"
class="!fixed bottom-5 right-5 hidden rounded-full bg-neutral-800/80 p-3 text-xs font-medium uppercase leading-tight text-white shadow-md transition duration-150 ease-in-out hover:scale-125 hover:bg-neutral-900/95 hover:shadow-lg focus:bg-neutral-900/80 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-neutral-900/80 active:shadow-lg"
id="btn-back-to-top">
<svg
  aria-hidden="true"
  focusable="false"
  data-prefix="fas"
  class="h-4 w-4"
  role="img"
  xmlns="http://www.w3.org/2000/svg"
  viewBox="0 0 448 512">
  <path
    fill="currentColor"
    d="M34.9 289.5l-22.2-22.2c-9.4-9.4-9.4-24.6 0-33.9L207 39c9.4-9.4 24.6-9.4 33.9 0l194.3 194.3c9.4 9.4 9.4 24.6 0 33.9L413 289.4c-9.5 9.5-25 9.3-34.3-.4L264 168.6V456c0 13.3-10.7 24-24 24h-32c-13.3 0-24-10.7-24-24V168.6L69.2 289.1c-9.3 9.8-24.8 10-34.3.4z"></path>
</svg>
</button>
@auth
  <div>
    <h1>
      Hallo Selamat Datang {{ auth()->user()->name }}
    </h1>
  </div>
@endauth

<h1>Anda adalah seorang</h1>
@if (Auth::check() && Auth::user()->role == 'developer')
    <a href="">Developer</a>
@elseif (Auth::check() && Auth::user()->role == 'admin')
    <a href="">Admin</a>

@elseif (Auth::check() && Auth::user()->role == 'user')
    <a href="">User</a>
@endif
<br>
{{-- @if (Auth::check())
    <a href="{{ route('addCategoryWedding') }}">tambah kategory wedding</a>
@endif --}}

<div class="mb-96">
  <h1>batas</h1>
</div>

@endsection