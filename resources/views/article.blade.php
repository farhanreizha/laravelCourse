@extends('Layout/isGuest')

@section('content')
    <h3>{{ $title }}</h3>
    <hr class="border-b-2 border-slate-200 w-5/12">
    <div class="flex flex-col justify-center align-middle mx-auto bg-slate-700 w-5/12 h-40 rounded-md px-14 gap-2">
        <h3 class="text-lg font-semibold">{{ $article->title }}</h3>
        <p>{{ $article->description }}</p>
        <i class="text-sm">{{ $article->tag }}</i>
    </div>
    <a href="/" class="bg-slate-700 py-2 px-4 rounded-md hover:bg-slate-600">kembali</a>
@endsection
