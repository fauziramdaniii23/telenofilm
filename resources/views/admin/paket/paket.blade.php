@extends('admin.layout.dashboard')
@section('container')

@include('home.component.alert')

@foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
      @endforeach

      <div class="">
        <h1>Daftar Paket</h1>

        @if (Auth::user()->role == 'developer')
        <button
        type="button"
        class="inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
        data-te-toggle="modal"
        data-te-target="#Modaladdpaket"
        data-te-ripple-init
        data-te-ripple-color="light">
        Tambah Data Paket
        </button>
    </div>
        
        @include('admin.modal.paketmodal')
      @endif
     <div class="relative">
        <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
              <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                  <table class="min-w-full text-left text-sm font-light">
                    <thead class="border-b font-medium dark:border-neutral-500">
                      <tr>
                        <th scope="col" class="px-6 py-4">#</th>
                        <th scope="col" class="px-6 py-4">Nama</th>
                        <th scope="col" class="px-6 py-4">Kategory</th>
                        <th scope="col" class="px-6 py-4">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @if ($pakets->isEmpty())
        
                        <tr>
                            <td colspan="4" class="text-center">Paket tidak tersedia</td>
                        </tr>
        
                        @else
        
                        @foreach ($pakets as $paket)
        
                        <tr class="border-b dark:border-neutral-500">
                            <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $loop->iteration }}</td>
                            <td class="whitespace-nowrap px-6 py-4">{{ $paket->name }}</td>
                            <td class="whitespace-nowrap px-6 py-4">{{ $paket->category->name }}</td>
                            <td class="whitespace-nowrap px-6 py-4 flex">
                              <button
                              type="button"
                              class="py-1 px-3 rounded-lg bg-yellow-500"
                              data-te-toggle="modal"
                              data-te-target="#Modaleditpaket{{ $paket->id }}"
                              data-te-ripple-init
                              data-te-ripple-color="light">
                              Edit
                              </button>
    
                              
                              <a href="{{ route('deletepaket', $paket->id) }}" class="py-1 px-3 rounded-xl mx-2 bg-red-500" data-confirm-delete="true">Delete</a>
                              
                            </td>
                          </tr>
                          
                          @include('admin.modal.editPaketModal')
                          
                          
                          @endforeach
                          @endif
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            
    
    
@endsection