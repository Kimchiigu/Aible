@extends('layouts.main_layout')

@section('container')
    <div class="flex flex-col gap-5 mt-5">
        <h1 class="font-bold text-4xl text-center">{{ $material->title }}</h1>
        <p class="text-xl">{{ $material->body }}</p>
    </div>

@endsection
