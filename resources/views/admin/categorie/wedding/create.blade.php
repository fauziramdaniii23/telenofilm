@extends('admin.layout.create')
@section('container')

<form action="/dashboard/wedding/add" method="POST" enctype="multipart/form-data">
    @csrf
  <div>
    <label for="">Customer</label>
      <select data-te-select-init class="" name="user_id">
          @foreach ($users as $user)
              
          <option value="{{ $user->id }}">{{ $user->name }}</option>
          @endforeach
         
        </select>
        @error('user_id')
            <span class="text-red-500">{{ $message }}</span>
        @enderror
  </div>

<div class="my-3">
    <label
      for="formFile"
      class="mb-2 inline-block text-neutral-700 dark:text-neutral-200"
      >Photo</label
    >
    <input
      class="relative m-0 block w-full min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-clip-padding px-3 py-[0.32rem] text-base font-normal text-neutral-700 transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:overflow-hidden file:rounded-none file:border-0 file:border-solid file:border-inherit file:bg-neutral-100 file:px-3 file:py-[0.32rem] file:text-neutral-700 file:transition file:duration-150 file:ease-in-out file:[border-inline-end-width:1px] file:[margin-inline-end:0.75rem] hover:file:bg-neutral-200 focus:border-primary focus:text-neutral-700 focus:shadow-te-primary focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:file:bg-neutral-700 dark:file:text-neutral-100 dark:focus:border-primary"
      type="file"
      name="name[]"
      id="formFile"
      multiple
      required />
  </div>
  @error('name')
  <span class="text-red-500">{{ $message }}</span>
@enderror


        <button
        type="submit"
        data-te-ripple-init
        data-te-ripple-color="light"
        class="inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]">
        Send
        </button>
    </form>

    @if ($errors->any())
    <div
    class="mb-4 rounded-lg bg-danger-100 px-6 py-5 text-base text-danger-700"
    role="alert">
      @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
      @endforeach
    </div>
  @endif
@endsection