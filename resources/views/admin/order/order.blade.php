<h1>Daftar Pesanan</h1>

<form action="{{ route('search.order') }}" method="GET">
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
    >Cari Berdasarkan Nama
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

    
<div class="relative">
   <div class="flex flex-col">
       <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
         <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
           <div class="overflow-hidden">
             <table class="min-w-full text-left text-sm font-light">
               <thead class="border-b font-medium dark:border-neutral-500">
                 <tr>
                   <th scope="col" class="px-6 py-4 text-center">No</th>
                   <th scope="col" class="px-6 py-4 text-center">Nama</th>
                   <th scope="col" class="px-6 py-4 text-center">Paket</th>
                   <th scope="col" class="px-6 py-4 text-center">Tanggal Booking</th>
                   <th scope="col" class="px-6 py-4 text-center">Tanggal Pesan</th>
                   <th scope="col" class="px-6 py-4 text-center">Status</th>
                   <th scope="col" class="px-6 py-4 text-center">Action</th>
                 </tr>
               </thead>
               <tbody>
                   @if ($orders->isEmpty())
   
                   <tr>
                       <td colspan="4" class="text-center">Tidak ada Pesanan</td>
                   </tr>
   
                   @else
   
                   @foreach ($orders as $order)
   
                   <tr class="border-b dark:border-neutral-500">
                       <td class="whitespace-nowrap px-6 py-4 text-center font-medium">{{ $loop->iteration }}</td>
                       <td class="whitespace-nowrap px-6 py-4 text-center">{{ $order->user->name }}</td>
                       <td class="whitespace-nowrap px-6 py-4 text-center">{{ $order->paket->name }}</td>
                       <td class="whitespace-nowrap px-6 py-4 text-center">{{ \Carbon\Carbon::parse($order->booking)->format('d F Y') }}</td>
                       <td class="whitespace-nowrap px-6 py-4 text-center">{{ $order->created_at->format('d F Y') }}</td>
                       <td class="whitespace-nowrap px-6 py-4 text-center">
                        <form class="flex" action="{{ route('updateStatus', $order->id) }}" method="POST">
                          @csrf
                          @method('PUT')
                          <select name="status" id="status" data-te-select-init>
                            <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Processing</option>
                            <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Completed</option>
                        </select>
                        <button
                        data-te-toggle="tooltip"
                          data-te-placement="top"
                          data-te-ripple-init
                          data-te-ripple-color="light"
                          title="save"
                        type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgb(56, 114, 250);transform: ;msFilter:;"><path d="M5 21h14a2 2 0 0 0 2-2V8a1 1 0 0 0-.29-.71l-4-4A1 1 0 0 0 16 3H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2zm10-2H9v-5h6zM13 7h-2V5h2zM5 5h2v4h8V5h.59L19 8.41V19h-2v-5a2 2 0 0 0-2-2H9a2 2 0 0 0-2 2v5H5z"></path></svg></button>
                        </form>
                         </td>
                       <td class="whitespace-nowrap px-6 py-4 flex gap-1 justify-center items-center">
                         <button
                         type="button"
                         class="p-2 rounded-full bg-yellow-500"
                         data-te-toggle="modal"
                         data-te-target="#Modaleditorder{{ $order->id }}"
                         data-te-ripple-init
                        data-te-placement="top"
                        
                        title="edit"
                         data-te-ripple-color="light">
                         <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" style="fill: rgb(243, 248, 139);transform: ;msFilter:;"><path d="m18.988 2.012 3 3L19.701 7.3l-3-3zM8 16h3l7.287-7.287-3-3L8 13z"></path><path d="M19 19H8.158c-.026 0-.053.01-.079.01-.033 0-.066-.009-.1-.01H5V5h6.847l2-2H5c-1.103 0-2 .896-2 2v14c0 1.104.897 2 2 2h14a2 2 0 0 0 2-2v-8.668l-2 2V19z"></path></svg>
                         </button>

                         <a href="https://wa.me/{{ $order->user->phone_number }}"
                          
                        data-te-toggle="tooltip"
                        data-te-placement="top"
                        data-te-ripple-init
                        data-te-ripple-color="light"
                        title="whatsapp"
                          class="p-2 rounded-full bg-green-500" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" style="fill: rgb(162, 250, 191);transform: ;msFilter:;"><path fill-rule="evenodd" clip-rule="evenodd" d="M18.403 5.633A8.919 8.919 0 0 0 12.053 3c-4.948 0-8.976 4.027-8.978 8.977 0 1.582.413 3.126 1.198 4.488L3 21.116l4.759-1.249a8.981 8.981 0 0 0 4.29 1.093h.004c4.947 0 8.975-4.027 8.977-8.977a8.926 8.926 0 0 0-2.627-6.35m-6.35 13.812h-.003a7.446 7.446 0 0 1-3.798-1.041l-.272-.162-2.824.741.753-2.753-.177-.282a7.448 7.448 0 0 1-1.141-3.971c.002-4.114 3.349-7.461 7.465-7.461a7.413 7.413 0 0 1 5.275 2.188 7.42 7.42 0 0 1 2.183 5.279c-.002 4.114-3.349 7.462-7.461 7.462m4.093-5.589c-.225-.113-1.327-.655-1.533-.73-.205-.075-.354-.112-.504.112s-.58.729-.711.879-.262.168-.486.056-.947-.349-1.804-1.113c-.667-.595-1.117-1.329-1.248-1.554s-.014-.346.099-.458c.101-.1.224-.262.336-.393.112-.131.149-.224.224-.374s.038-.281-.019-.393c-.056-.113-.505-1.217-.692-1.666-.181-.435-.366-.377-.504-.383a9.65 9.65 0 0 0-.429-.008.826.826 0 0 0-.599.28c-.206.225-.785.767-.785 1.871s.804 2.171.916 2.321c.112.15 1.582 2.415 3.832 3.387.536.231.954.369 1.279.473.537.171 1.026.146 1.413.089.431-.064 1.327-.542 1.514-1.066.187-.524.187-.973.131-1.067-.056-.094-.207-.151-.43-.263"></path></svg></a>

                         
                         <a href="{{ route('deleteOrder', $order->id) }}" class="p-2 rounded-full bg-red-500" 
                          data-te-toggle="tooltip"
                          data-te-placement="top"
                          data-te-ripple-init
                          data-te-ripple-color="light"
                          title="delete"
                          data-confirm-delete="true"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" style="fill: rgb(248, 180, 180);transform: ;msFilter:;"><path d="M5 20a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8h2V6h-4V4a2 2 0 0 0-2-2H9a2 2 0 0 0-2 2v2H3v2h2zM9 4h6v2H9zM8 8h9v12H7V8z"></path><path d="M9 10h2v8H9zm4 0h2v8h-2z"></path></svg></a>
                         
                       </td>
                     </tr>
                   
                     
                     
                     @include('admin.modal.ModalEditOrder')
                     @endforeach
                     @endif
                   </tbody>
                 </table>
               </div>
             </div>
           </div>
         </div>
       </div>
