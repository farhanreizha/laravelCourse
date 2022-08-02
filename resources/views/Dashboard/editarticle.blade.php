@extends('Layout/isUser')

@section('content')
    <div class="flex flex-col gap-2 justify-center align-middle h-screen w-7/12">
        @if($errors->any())
            <div class="flex flex-row bg-red-500 py-3 px-4 rounded-md">
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
                </ul>
            </div>
        @endif
        <h3 class="text-lg font-semibold" data-aos="fade-down" data-aos-duration="500" data-aos-easing="ease-in-out">{{ $title }}</h3>
        {{ session()->get('message') }}
        <form class="flex flex-col gap-2" action={{ route('article_edit_action') }} method="post">
            @csrf
            <input type="hidden" name="id" value={{ $article->id }}>
            <input type="text" name="title" class="border-none bg-slate-700 p-3 rounded-md" value="{{ $article->title }}" data-aos="fade-right" data-aos-duration="500" data-aos-easing="ease-in-out">
            <textarea role="textbox" autocapitalize="off" autocomplete="off" contenteditable spellcheck="false" name="description" class="border-none bg-slate-700 p-3 rounded-md" data-aos="fade-left" data-aos-duration="500" data-aos-delay="500" data-aos-easing="ease-in-out">{{ $article->description }}</textarea>
            <input type="text" name="tag" class="border-none bg-slate-700 p-3 rounded-md" value="{{ $article->tag }}" data-aos="fade-right" data-aos-duration="500" data-aos-easing="ease-in-out" data-aos-delay="1000" data-aos-offset='50'>
            <button type="submit" class="bg-slate-700 py-2 rounded-md my-2 hover:bg-slate-600 transition ease-in-out duration-300" data-aos="fade-left" data-aos-duration="500" data-aos-easing="ease-in-out" data-aos-offset='50' data-aos-delay="1500">Submit</button>
        </form>
    </div>
@endsection
