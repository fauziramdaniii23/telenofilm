@extends('layout.main')

@include('home.order.navbarOrder')

@section('main')
<h1 class="text-center text-2xl font-semibold my-2 mt-14 md:mt-20 lg:mt-24">Riwayat Pesanan Pesanan</h1>

       @if ( !is_null($orders) && $orders->isEmpty())

       <div class="text-center">
        <h1>Anda belum Mempunyai Riwayat Pesanan</h1>
        <a href="/">Pesan Sekarang</a>
       </div>

       @elseif(!is_null($orders))

  <div class="m-5 flex justify-center flex-wrap gap-4">
@foreach ($orders as $order)
<div
class="block rounded-lg bg-white p-6 text-surface shadow-secondary-1 dark:bg-surface-dark dark:text-white">
<div class="mb-2 flex">
  <img src="{{ asset('logo.png') }}" alt="logo" class="w-5 h-5">
  <p class="ml-2">Telenofilm</p>
</div>
<h5 class="mb-2 ml-4 text-xl font-medium leading-tight">{{ $order->paket->name }}</h5>
<div class="mb-4 text-base">
  <table>
    <tr>
      <td>Nama </td>
      <td> : {{ $order->user->name }}</td>
    </tr>
    <tr>
      <td>Tanggal Booking </td>
      <td> : {{ \Carbon\Carbon::parse($order->booking)->format('d F Y') }}</td>
    </tr>
    <tr>
      <td>Tanggal pesan</td>
      <td> : {{ $order->created_at->format('d F Y') }}</td>
    </tr>
    <tr>
      <td>Setatus :</td>

        <td class="px-1 text-center rounded-lg bg-green-400">{{ $order->status }}</td>
      
    </tr>
  </table>
</div>

</div>
@endforeach
</div>

<a href="/" class="px-2 py-1 bg-primary rounded m-4 text-white">kembali</a>

@endif
  

@endsection