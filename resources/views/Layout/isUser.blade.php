<!DOCTYPE html>
<html lang="en" class="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>DEACOURSE LARAVEL</title>
</head>

<body class="dark:bg-slate-800 dark:text-white">
    <div class="h-screen">
        <header class="flex dark:bg-slate-700 w-full h-14 items-center shadow-slate-900 fixed top-0" data-aos="fade-down" data-aos-duration="500" data-aos-easing="ease-in-out">
            <nav class="flex mx-10 justify-between w-full items-center">
                <div class="flex gap-3">
                    <a href="/" class="focus:border-b-2 active:border-b-2">Home</a>
                    <a href="/dashboard" class="focus:border-b-2">Dashboard</a>
                    <!-- <a href="/dashboard/article" class="focus:border-b-2">Article</a> -->
                </div>
                <div>
                    <form method="POST" action={{ route('dashboard_logout') }}>
                        @csrf
                        <input type="hidden" name="token" value={{ $users->token }}>
                        <button class="hover:bg-slate-800 py-2 px-4 rounded-md transition-all ease-in-out duration-300">Logout</button>
                    </form>
                </div>
            </nav>
        </header>
        {{-- our content --}}
        <main class="flex flex-col justify-center items-center my-20 gap-10">
            @yield('content')
        </main>
        {{-- end of our content --}}
        <footer class="flex justify-center py-3 bg-slate-700 gap-1 sticky" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-offset="20" data-aos-duration="500">&copy; 2022 by <a href="https://www.instagram.com/farhand.rf/" class="text-blue-400 hover:border-blue-400 hover:border-b-2">farhanreizha</a></footer>
    </div>
    @include('sweetalert::alert')
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>
