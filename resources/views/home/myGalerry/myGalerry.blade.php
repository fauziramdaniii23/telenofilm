@extends('layout.main')
@include('home.order.navbarOrder')
@section('main')
   <div class="mt-20 mx-4 grid md:grid-cols-3 gap-2">
    @foreach ($categories as $category)
    
    <a href="{{ route('galerry', ['username' => auth()->user()->name , 'categoryName' => $category->name]) }}"
    class="block rounded-lg bg-white p-6 text-surface shadow-secondary-1 dark:bg-surface-dark dark:text-white">
    <h5 class="mb-2 text-xl text-center font-medium leading-tight">{{ $category->name }}</h5>
    </button>
  </a>
  @endforeach
   </div>
@endsection