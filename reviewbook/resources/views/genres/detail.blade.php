@extends('layouts.master')

@section('title')
    Detail Genre
@endsection

@section('content')
<h1 class="text-primary">{{$genre->name}}</h1>
<hr>
<p>{{$genre->description}}</p>

<a href="/genres" class="btn btn-secondary mt-5">Kembali</a>
@endsection()