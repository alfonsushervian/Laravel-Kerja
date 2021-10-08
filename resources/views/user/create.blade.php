@extends('layouts.index')

@section('content')
    <br/>
    <form method="POST" action="{{ url('user') }}" enctype="multipart/form-data">
        @csrf
        @include('user._form')
    </form>
@endsection
