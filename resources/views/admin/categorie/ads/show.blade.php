@extends('admin.layout.dashboard')
@section('container')

@include('home.component.alert')

<div>
  <h1>Photo {{ $user->name }}</h1>
  
</div>
<div class="flex flex-wrap">
  @foreach ($videos as $video)
    <h1> Video {{ $user->name }}</h1>
      <video controls src="{{ asset('/video/ads/'. $video->name) }}">
      </video>
  @endforeach
    @foreach ($images as $image)
        <img src="{{ asset('/img/ads/'. $image->name) }}" alt="" class="m-4 h-20 w-20 rounded-lg object-cover">
    @endforeach
</div>

    @if ($errors->any())
    <div
    class="mb-4 rounded-lg bg-danger-100 px-6 py-5 text-base text-danger-700"
    role="alert">
      @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
      @endforeach
    </div>
  @endif
  <div>
    <a href="{{ route('adminAds') }}">Kembali</a>
  </div>
@endsection