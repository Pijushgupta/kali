<!DOCTYPE html>
<html lang="{{$post->lang}}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->


        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif
    </head>
    <body class="antialiased text-slate-500 dark:text-slate-200 bg-white dark:bg-slate-900">
        <header class="sticky top-0 z-10 backdrop-blur body-font border-b dark:border-slate-800">
          <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
            <a class="flex title-font font-medium items-center  mb-4 md:mb-0">
              <span class="bn font-bold text-2xl">গল্পসল্প</span>
            </a>
            <nav class="md:ml-auto flex flex-wrap items-center text-base justify-center">
              <a class="mr-5 hover:text-gray-900">First Link</a>
              <a class="mr-5 hover:text-gray-900">Second Link</a>
            </nav>

          </div>
        </header>

        <div class="bn p-5 container mx-auto">
            <div class="flex">
            <div class="left-bar md:w-2/6">
                @if($posts)
                    <ul class="bn">
                    @foreach($posts as $p)
                        <li><a class="pb-2 block hover:cursor-pointer" href="{{ route('post.show', ['post' => $p->post_name]) }}">{{$p->post_title}}</a></li>
                    @endforeach
                    </ul>
                @endif
            </div>
            <div class="md:w-4/6">
                <div class="prose lg:prose-xl prose-slate dark:prose-invert max-w-none">
                    @if($post)
                    <h1>{!!$post->post_title!!}</h1>
                        {!!$post->post_content!!}
                    @endif
                <div>
            </div>
            </div>
        </div>

    </body>
</html>
