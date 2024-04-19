@extends('layout.main')
@include('home.order.navbarOrder')
@section('main')
   <div class="mt-20 mx-4 grid md:grid-cols-3 gap-2">
      @if ($images->isEmpty())
          <h1>Anda tidak memiliki gambar</h1>
      @else

      @if ($categoryName == 'wedding')
          @foreach ($images as $image)
          <img src="{{ asset('/img/wedding/'. $image->name) }}" alt="" class="m-4 h-20 w-20 rounded-lg object-cover">
          @endforeach
      @elseif($categoryName == 'prewedding')
          <h1>Gambar prewedding</h1>
      @elseif($categoryName == 'engagement')
          <h1>Gambar engagement</h1>
      @elseif($categoryName == 'graduation')
          <h1>Gambar graduation</h1>
      @elseif($categoryName == 'event')
          <h1>Gambar event</h1>
      @elseif($categoryName == 'ads')
          <h1>Gambar ads</h1>
     
      @endif
      @endif
   </div>
   @endsection

