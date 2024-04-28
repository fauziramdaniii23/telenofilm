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
          @foreach ($images as $image)
          <img src="{{ asset('/img/prewedding/'. $image->name) }}" alt="" class="m-4 h-20 w-20 rounded-lg object-cover">
          @endforeach

      @elseif($categoryName == 'engagement')
          <h1>Gambar engagement</h1>
          @foreach ($images as $image)
          <img src="{{ asset('/img/engagement/'. $image->name) }}" alt="" class="m-4 h-20 w-20 rounded-lg object-cover">
          @endforeach

      @elseif($categoryName == 'graduation')
          <h1>Gambar graduation</h1>
          @foreach ($images as $image)
          <img src="{{ asset('/img/graduation/'. $image->name) }}" alt="" class="m-4 h-20 w-20 rounded-lg object-cover">
          @endforeach

      @elseif($categoryName == 'event')
          <h1>Gambar event</h1>
          @foreach ($images as $image)
          <img src="{{ asset('/img/event/'. $image->name) }}" alt="" class="m-4 h-20 w-20 rounded-lg object-cover">
          @endforeach
          
      @elseif($categoryName == 'ads')
          <h1>Gambar ads</h1>
          @foreach ($images as $image)
          <img src="{{ asset('/img/ads/'. $image->name) }}" alt="" class="m-4 h-20 w-20 rounded-lg object-cover">
          @endforeach
     
      @endif
      @endif
   </div>
   @endsection

