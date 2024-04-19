@extends('admin.layout.dashboard')

@section('container')

    @include('home.component.alert')
    <section>
        <div>
            <h1>Halaman Home Users</h1>
        </div>

        @foreach ($errors->all() as $error)
          <li class="py-2 px-4 m-4 bg-red-300 rounded-xl text-red-600 text-base">{{ $error }}</li>
       @endforeach

        <form action="{{ route('users.search') }}" method="GET">
        <div
  class="relative flex lg:w-1/2 m-4"
  data-te-input-wrapper-init
  data-te-input-group-ref>
  <input
    type="search"
    name="search"
    class="peer block min-h-[auto] w-full rounded-full border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-white dark:placeholder:text-neutral-300 dark:autofill:shadow-autofill dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
    placeholder="Search"
    aria-label="Search"
    id="exampleFormControlInput"
    aria-describedby="basic-addon1" />
  <label
    for="exampleFormControlInput"
    class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-400 dark:peer-focus:text-primary"
    >Search
  </label>
  <button
    class="relative z-[2] -ms-0.5 flex items-center rounded-e bg-primary px-5  text-xs font-medium uppercase leading-normal text-white shadow-primary-3 transition duration-150 ease-in-out hover:bg-primary-accent-300 hover:shadow-primary-2 focus:bg-primary-accent-300 focus:shadow-primary-2 focus:outline-none focus:ring-0 active:bg-primary-600 active:shadow-primary-2 dark:shadow-black/30 dark:hover:shadow-dark-strong dark:focus:shadow-dark-strong dark:active:shadow-dark-strong"
    type="submit"
    id="button-addon1"
    data-te-ripple-init
    data-te-ripple-color="light">
    <span class="[&>svg]:h-5 [&>svg]:w-5">
      <svg
        xmlns="http://www.w3.org/2000/svg"
        fill="none"
        viewBox="0 0 24 24"
        stroke-width="1.5"
        stroke="currentColor">
        <path
          stroke-linecap="round"
          stroke-linejoin="round"
          d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
      </svg>
    </span>
  </button>
</div>
</form>

<div class="flex flex-col">
    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
        <div class="overflow-hidden">
          <table class="min-w-full text-left text-sm font-light">
            <thead
              class="border-b bg-slate-200 font-medium dark:border-neutral-500 dark:bg-neutral-600">
              <tr>
                <th scope="col" class="px-6 py-4">No</th>
                <th scope="col" class="px-6 py-4">name</th>
                <th scope="col" class="px-6 py-4">email</th>
                <th scope="col" class="px-6 py-4">Setatus</th>
                <th scope="col" class="px-6 py-4">Switch</th>
                <th scope="col" class="px-6 py-4">Tambah Kategori</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
              <tr
                  
              class="border-b bg-neutral-100 dark:border-neutral-500 dark:bg-neutral-700">
              <?php $nomor_iterasi = ($users->currentPage() - 1) * $users->perPage() + $loop->iteration; ?>
              <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $nomor_iterasi }}</td>
              <td class="whitespace-nowrap px-6 py-4">{{ $user->name }}</td>
              <td class="whitespace-nowrap px-6 py-4">{{ $user->email }}</td>
              <td class="whitespace-nowrap px-6 py-4">{{ $user->role }}</td>
              <td class="whitespace-nowrap px-6 py-4">
                @if ($user->role === 'admin')
                <form action="{{ route('make.user', $user->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-red-500 rounded-md border p-2 text-white">Down User</button>
                </form>
                @elseif ($user->role === 'user')
                    <form action="{{ route('make.admin', $user->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="bg-green-500 rounded border p-2 text-white">Up Admin</button>
                    </form>
                @endif
                </td>

              <td class="whitespace-nowrap px-6 py-4 flex gap-2"> 
                @include('admin.users.userCategory')

                @if($user->role !== 'developer')
                <form action="{{ route('users.destroy', $user->id) }}" method="post">
                  @csrf
                  @method('DELETE')
                  <button type="submit"
                  class="p-2 rounded-full bg-red-500"
                  onclick="return confirm('Hapus User?')">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgb(253, 147, 147);transform: ;msFilter:;"><path d="M5 20a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8h2V6h-4V4a2 2 0 0 0-2-2H9a2 2 0 0 0-2 2v2H3v2h2zM9 4h6v2H9zM8 8h9v12H7V8z"></path><path d="M9 10h2v8H9zm4 0h2v8h-2z"></path></svg>
                </button>
               </form>
              @endif
              </td>
            </tr>
            
            @endforeach
            </tbody>
          </table>
          {{ $users->links() }}
        </div>
      </div>
    </div>
  </div>
        
    </section>
@endsection