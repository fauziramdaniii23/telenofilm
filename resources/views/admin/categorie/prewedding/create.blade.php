@extends('admin.layout.create')

@section('container')
    <div>
        <h1>
            tambah data prewedding
        </h1>
    </div>

    @include('component.alert')

    <form action="/dashboard/prewedding" method="POST">
    @csrf
        <input type="text" name="name">
        <button type="submit">submit</button>
</form>
@endsection