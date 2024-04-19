<section class="bg-neutral-200">
    <div class="lg:flex justify-evenly">
        <div class=" lg:w-[40%] rounded-l-xl bg-cover " style="background-image: url('{{ asset('/img/engagement/cover/engagement2.png') }}')">
            <div class="py-5 relative flex flex-col items-center justify-center bg-black/75 w-full h-full">
                 <div class="absolute w-24 lg:w-32 top-2 right-2 border-b-2 border-white"></div>
                 <h1 data-aos="fade-up" class="tracking-widest text-xl lg:text-4xl text-white font-serif ">Engagement</h1>
                 <div class="hidden lg:block mt-4 w-52 h-[2px] bg-white"></div>

                 <div class="absolute w-24 lg:w-32 left-2 bottom-2 border-b-2 border-white"></div>
             </div>
        </div>

        <div class="lg:w-[60%] bg-neutral-100">         
            <img src="{{ asset('/img/engagement/cover/engagement1.png') }}" alt="">
        </div>
    </div>

    <div class="">
      <div data-aos="fade-up" class="relative flex justify-center items-center overflow-hidden -top-3">
         <h1 class="bg-yellow-400 py-2 px-4 text-xl lg:text-2xl lg:px-6 rounded-xl drop-shadow-2xl text-white font-bold">Engagement Price List</h1>
      </div>

      <div class="flex flex-col lg:flex-row lg:justify-center lg:items-center mb-10">

        <div class="flex flex-col lg:justify-center lg:items-center w-full lg:w-1/2">
          <button
          class="inline-block rounded lg:w-full border-b-2 border-neutral-300 p-2 text-yellow-400"
          type="button"
          data-te-collapse-init
          data-te-ripple-init
          data-te-ripple-color="light"
          data-te-target="#engagementregular"
          aria-expanded="false"
          aria-controls="collapseExample">
          <span data-aos="fade-up" class="flex items-center justify-center gap-4">
            <span class="text-lg lg:text-xl xl:text-2xl font-bold">{{ $enReguler->name }}</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 fill-neutral-400" viewBox="0 0 24 24" style="transform: ;msFilter:;"><path d="M11.178 19.569a.998.998 0 0 0 1.644 0l9-13A.999.999 0 0 0 21 5H3a1.002 1.002 0 0 0-.822 1.569l9 13z"></path></svg>
          </span>
        </button>
        <div class="!visible hidden w-full" id="engagementregular" data-te-collapse-item>
          <div
            class="flex m-2 justify-center items-center rounded-lg bg-neutral-100 p-6 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700 dark:text-neutral-50">
            <div class="flex flex-col justify-center m-2 lg:my-4 pr-2">
              <p class="text-xs lg:text-sm">
              {!! $enReguler->description !!}                
                </p>
                <p  class="text-right text-lg lg:text-xl text-black mt-2 font-bold">RP. {{ number_format($enReguler->price, 0, ',', '.') }},-</p>
                
                <button
                          type="button"
                          class="py-1 px-3 rounded-lg bg-cyan-500"
                          data-te-toggle="modal"
                          data-te-target="#ModalpaketEngagementReguler"
                          data-te-ripple-init
                          data-te-ripple-color="light">
                          Pesan Sekarang
                </button>
                
                @include('home.categorie.engagement.modal.modalENReguler')
            </div>

          </div>
        </div>
        </div>

        <div class="flex flex-col lg:justify-center lg:items-center w-full lg:w-1/2">
          <button
          class="inline-block rounded lg:w-full border-b-2 border-neutral-300 p-2 text-yellow-400"
          type="button"
          data-te-collapse-init
          data-te-ripple-init
          data-te-ripple-color="light"
          data-te-target="#engagementmaksimal"
          aria-expanded="false"
          aria-controls="collapseExample">
          <span data-aos="fade-up" class="flex items-center justify-center gap-4">
            <span class="text-lg lg:text-xl xl:text-2xl font-bold">{{ $enMaksimal->name }}</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 fill-neutral-400" viewBox="0 0 24 24" style="transform: ;msFilter:;"><path d="M11.178 19.569a.998.998 0 0 0 1.644 0l9-13A.999.999 0 0 0 21 5H3a1.002 1.002 0 0 0-.822 1.569l9 13z"></path></svg>
          </span>
        </button>
        <div class="!visible hidden w-full" id="engagementmaksimal" data-te-collapse-item>
          <div
            class="flex justify-center items-center m-2 gap-4 rounded-lg bg-neutral-100 p-6 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700 dark:text-neutral-50">
            <div class="relative m-2 lg:my-4 pr-2">
              <p class="text-xs lg:text-sm">
                {!! $enMaksimal->description !!}
                </p>
                <p  class="text-right text-lg lg:text-xl text-black mt-2 font-bold">RP. {{ number_format($enMaksimal->price, 0, ',', '.') }},-</p>
                
                <button
                          type="button"
                          class="py-1 px-3 rounded-lg bg-cyan-500"
                          data-te-toggle="modal"
                          data-te-target="#ModalpaketEngagementMaksimal"
                          data-te-ripple-init
                          data-te-ripple-color="light">
                          Pesan Sekarang
                </button>
                
                @include('home.categorie.engagement.modal.modalENmaksimal')
            </div>

          </div>
        </div>
        </div>

      </div>
    </div>
</section>