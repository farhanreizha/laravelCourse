@extends('Layout/isGuest')

@section('content')
    <h3 data-aos="fade-down" data-aos-easing="ease-in-out" data-aos-duration="500">{{ $title }}</h3>
    <hr class="border-b-2 border-slate-200 w-9/12" data-aos="zoom-in" data-aos-easing="ease-in-out" data-aos-duration="500">
    <div class="flex flex-wrap justify-center items-center gap-5">
        @foreach ($articles as $article)
        <a href="article/{{ $article->id }}" class="flex justify-center items-center bg-slate-700 h-40 w-3/12 hover:bg-slate-600 rounded-md transition ease-in-out duration-300" data-aos="zoom-in" data-aos-easing="ease-in-out" data-aos-duration="500">
                <h4>{{ $article->title }}</h4>
        </a>
        @endforeach
    </div>
@endsection
