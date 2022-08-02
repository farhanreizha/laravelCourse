@extends('Layout/isUser')

@section('content')
    <h3 data-aos="fade-down" data-aos-easing="ease-in-out" data-aos-duration="500">{{ $title }}</h3>
    <hr class="border-2 w-11/12" data-aos="zoom-in" data-aos-easing="ease-in-out" data-aos-duration="500">
    @if($errors->any())
        <div class="flex flex-row bg-red-500 py-3 px-4 rounded-md">
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
            </ul>
        </div>
    @endif
    <form action={{ route('article_add_action') }} method="post" class="flex gap-2">
        @csrf
        <input type="text" placeholder="title" name="title" class="border-none bg-slate-700 py-2 px-4 rounded-md" data-aos="fade-right" data-aos-duration="500" data-aos-easing="ease-in-out">
        <input type="text" placeholder="description" name="description" class="border-none bg-slate-700 py-2 px-4 rounded-md" data-aos="fade-right"  data-aos-duration="500" data-aos-easing="ease-in-out">
        <input type="text" placeholder="tag" name="tag" class="border-none bg-slate-700 py-2 px-4 rounded-md" data-aos="fade-left" data-aos-duration="500" data-aos-easing="ease-in-out">
        <button type="submit" class="bg-slate-700 py-2 px-4 rounded-md hover:bg-slate-600 transition-all ease-in-out duration-300" data-aos="fade-left" data-aos-duration="500" data-aos-easing="ease-in-out">Submit</button>
    </form>
    <table class="bg-slate-700 mx-5 rounded-md" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="500">
        <tr class="border-b-2 border-slate-800" data-aos="fade-left" data-aos-delay="500" data-aos-easing="ease-in-out" data-aos-duration="500">
            <th class="flex justify-center px-4 py-2">id</th>
            <th class="w-2/12 px-2">title</th>
            <th class="px-2 w-7/12">description</th>
            <th class="px-2">tag</th>
            <th class="px-2">action</th>
        </tr>
        @foreach ($articles as $article)
            <tr class="border-b-2 border-slate-800" data-aos="fade-right" data-aos-delay="500" data-aos-easing="ease-in-out" data-aos-duration="500">
                <td class="flex justify-center py-4">{{ $article->id }}</td>
                <td class="px-3">{{ $article->title }}</td>
                <td class="px-3">{{ $article->description }}</td>
                <td class="px-3">{{ $article->tag }}</td>
                <td class="px-3">
                    <div class="flex gap-2 justify-center items-center">
                        <a href="article/edit/{{ $article->id }}" class="text-blue-500 py-1 px-2 rounded-md hover:bg-blue-500 hover:text-white transition ease-in-out duration-300">edit</a>
                        <form action={{ route('article_delete_action') }} method="post">
                            @csrf
                            <input type="hidden" name="id" value={{ $article->id }}>
                            <button type="submit" class="text-red-500 py-1 px-2 rounded-md hover:bg-red-500 hover:text-white transition ease-in-out duration-300">hapus</button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
