@extends('admin.layout.dashboard')

@section('container')

    @include('home.component.alert')
    <section>
        <div class="flex justify-center items-center">
            <h1 class="lg:text-2xl font-semibold">Admin Ads</h1>
        </div>

        <div class="flex">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M20 2H8a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2zm-6 2.5a2.5 2.5 0 1 1 0 5 2.5 2.5 0 0 1 0-5zM19 15H9v-.25C9 12.901 11.254 11 14 11s5 1.901 5 3.75V15z"></path><path d="M4 8H2v12c0 1.103.897 2 2 2h12v-2H4V8z"></path></svg>
            <h1 class="font-semibold ml-2">Customer Ads</h1>
        </div>

        @foreach ($errors->all() as $error)
        <li class="py-2 px-4 m-4 bg-red-300 rounded-xl text-red-600 text-base">{{ $error }}</li>
     @endforeach

        <form action="{{ route('searchUserAds', ['categoryName' => 'ads']) }}" method="GET">
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
                        <th scope="col" class="px-6 py-4 text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            
                        
                        <tr class="border-b dark:border-neutral-500">
                            <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $loop->iteration }}</td>
                            <td class="whitespace-nowrap px-6 py-4">{{ $user->name }}</td>
                            <td class="whitespace-nowrap px-6 py-4">
                            @if ($user->imageAds->isNotEmpty())
                                <img src="{{ asset('img/ads/' . $user->imageAds->first()->name) }}" alt="Customer Photo" class="h-10 w-10 rounded-full object-cover">
                            @else
                                <span>No Photo</span>
                            @endif
                            </td>
                            
                            <td class="whitespace-nowrap px-6 py-4">
                                <a href="{{ route('showUserAds', $user->id) }}"><svg class="hover:scale-125 transition duration-200" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgb(56, 98, 251);transform: ;msFilter:;"><path d="M12 5c-7.633 0-9.927 6.617-9.948 6.684L1.946 12l.105.316C2.073 12.383 4.367 19 12 19s9.927-6.617 9.948-6.684l.106-.316-.105-.316C21.927 11.617 19.633 5 12 5zm0 11c-2.206 0-4-1.794-4-4s1.794-4 4-4 4 1.794 4 4-1.794 4-4 4z"></path><path d="M12 10c-1.084 0-2 .916-2 2s.916 2 2 2 2-.916 2-2-.916-2-2-2z"></path></svg></a>
                            </td>
                            <td class="whitespace-nowrap px-6 py-4 flex gap-2 justify-center">
                              
                            <button
                            type="button"
                            class="p-2 rounded-full bg-neutral-50 hover:scale-110 transition duration-200"
                            data-te-toggle="modal"
                            data-te-target="#ModalSendVideoAds{{ $user->id }}"
                            data-te-ripple-init
                            title="Send Video"
                            data-te-ripple-color="light">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgb(250, 29, 29);transform: ;msFilter:;"><path d="M4 8H2v12a2 2 0 0 0 2 2h12v-2H4z"></path><path d="M20 2H8a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2zm-9 12V6l7 4z"></path></svg>
                        </button>

                            <button
                            type="button"
                            class="p-2 rounded-full -rotate-45 bg-cyan-500 hover:scale-110 transition duration-200"
                            data-te-toggle="modal"
                            data-te-target="#ModalSendPhotoAds{{ $user->id }}"
                            data-te-ripple-init
                            title="Send Photo"
                            data-te-ripple-color="light">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgb(255, 255, 255);transform: ;msFilter:;"><path d="m21.426 11.095-17-8A.999.999 0 0 0 3.03 4.242L4.969 12 3.03 19.758a.998.998 0 0 0 1.396 1.147l17-8a1 1 0 0 0 0-1.81zM5.481 18.197l.839-3.357L12 12 6.32 9.16l-.839-3.357L18.651 12l-13.17 6.197z"></path></svg>
                        </button>

                         <form action="{{ route('deleteUserAds', ['userId' => $user->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                          <button
                            type="submit"
                            class="inline-block rounded-full p-2 bg-red-500 hover:scale-110 transition duration-200"
                            data-te-ripple-init
                            data-te-ripple-color="light"
                            onclick="return confirm('Hapus User dari kategori Graduation?')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgb(249, 175, 175);transform: ;msFilter:;"><path d="M5 20a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8h2V6h-4V4a2 2 0 0 0-2-2H9a2 2 0 0 0-2 2v2H3v2h2zM9 4h6v2H9zM8 8h9v12H7V8z"></path><path d="M9 10h2v8H9zm4 0h2v8h-2z"></path></svg>
                          </button>
                          </form>
                            </td>
                            
                        </tr>
                        @include('admin.categorie.ads.modalSendPhoto')
                        @include('admin.categorie.ads.modalSendVideo')
                        @endforeach
                        
                    </tbody>
                </table>
                </div>
            </div>
            </div>
        </div>
    </section>
@endsection