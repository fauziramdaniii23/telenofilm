@extends('admin.layout.dashboard')

@section('container')

@include('home.component.alert')

    @foreach ($errors->all() as $error)
          <li class="py-2 px-4 m-4 bg-red-300 rounded-xl text-red-600 text-base">{{ $error }}</li>
       @endforeach
    
      @include('admin.order.order')

             

@endsection