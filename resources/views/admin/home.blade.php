@extends('layouts/admin')
@section('judulhalaman','Halaman Dashboard Admin')
@section('menu','Dashboard')
{{-- @section('submenu','Dashboard') --}}
@section('isi')
<div class="row">
    @if(session('status'))
    <div class="alert alert-success">
        {{session('status')}}
    </div>
    @endif
</div>
@endsection
