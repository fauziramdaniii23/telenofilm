@extends('admin.layout.dashboard')

@section('container')

    @include('home.component.alert')
    <section>
        <div>
            <h1>Halaman Home Prewedding</h1>
        </div>

        <div>
            <h1>Ini halaman Customer Prewedding</h1>
            <a href="{{ route('create') }}">Tambah Data</a>
        </div>

        <div class="flex flex-col w-full">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                <table class="min-w-full text-left text-sm font-light">
                    <thead class="border-b font-medium dark:border-neutral-500">
                    <tr>
                        <th scope="col" class="px-6 py-4">No</th>
                        <th scope="col" class="px-6 py-4">Name(Customer)</th>
                        <th scope="col" class="px-6 py-4">Photos</th>
                        <th scope="col" class="px-6 py-4">Show</th>
                        <th scope="col" class="px-6 py-4">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @if ($users->isEmpty())
                        <tr class="border-b dark:border-neutral-500">
                            <td colspan="5" class="text-center py-4">Tidak ada user yang terdaftar.</td>
                        </tr>

                        @else
                        @foreach ($users as $user)
                            
                        
                        <tr class="border-b dark:border-neutral-500">
                            <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $loop->iteration }}</td>
                            <td class="whitespace-nowrap px-6 py-4">{{ $user->name }}</td>
                            <td class="whitespace-nowrap px-6 py-4">
                            @if ($user->imagePrewedding->isNotEmpty())
                                <img src="{{ asset('img/prewedding/' . $user->imagePrewedding->first()->name) }}" alt="Customer Photo" class="h-10 w-10 rounded-full object-cover">
                            @else
                                <span>No Photo</span>
                            @endif
                            </td>
                            
                            <td class="whitespace-nowrap px-6 py-4">
                                <a href="{{ route('showWedding', ['userId' => $user->id]) }}">Lihat</a>
                            </td>
                            <td class="whitespace-nowrap px-6 py-4">
                                <a href="{{ route('addWeddingPhotos', ['userId' => $user->id]) }}" class="text-blue-500 hover:text-blue-700">Add Photo</a>
                            </td>
                            
                        </tr>
                        
                        @endforeach

                        @endif

                        
                    </tbody>
                </table>
                </div>
            </div>
            </div>
        </div>
    </section>
@endsection