@extends('Layout/isGuest')

@section('content')
    <div class="flex flex-col gap-2 justify-center align-middle h-screen w-3/12">
        @if($errors->any())
            <div class="flex flex-row bg-red-500 py-3 px-4 rounded-md">
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
                </ul>
            </div>
        @endif
        <h3 class="text-lg font-semibold" data-aos="fade-down" data-aos-duration="500" data-aos-easing="ease-in-out">Register Page</h3>
        <form class="flex flex-col gap-2" method="POST" action={{ route('register_action') }}>
            @csrf
            <input type="text" placeholder="username" name="username" class="border-none bg-slate-700 p-3 rounded-md" data-aos="fade-left" data-aos-duration="500" data-aos-easing="ease-in-out" data-aos-delay="500">
            <input type="password" placeholder="password" name="password" class="border-none bg-slate-700 p-3 rounded-md" data-aos="fade-right" data-aos-duration="500" data-aos-easing="ease-in-out" data-aos-delay="1000">
            <button type="submit" class="bg-slate-700 py-2 rounded-md my-2 hover:bg-slate-600 transition ease-in-out duration-300" data-aos="fade-left" data-aos-duration="500" data-aos-easing="ease-in-out" data-aos-offset="100" data-aos-delay="1500">Register</button>
        </form>
        <i data-aos="fade-in" data-aos-duration="500" data-aos-easing="ease-in-out" data-aos-offset="50" data-aos-delay="2000">
            <a href="/login" class="text-sm text-blue-500 hover:border-b transition ease-in-out">have account</a>
        </i>
    </div>
@endsection
