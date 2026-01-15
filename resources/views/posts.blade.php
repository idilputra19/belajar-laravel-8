@extends('layouts.main')

@section('container')

    {{-- 1. Tampilkan Judul Halaman (Penting agar user tahu sedang di halaman apa) --}}
    <h1 class="mb-5">{{ $title }}</h1>

    @if ($posts->count() >0 ) 

   <div class="card mb-3">
  <img src="..." class="card-img-top" alt="...">
  <div class="card-body">
    <h3 class="card-title">{{ $posts[0]->title }}</h3>
      <p>
                By: <a href="/authors/{{ $posts[0]->author->username }}" class="text-decoration-none">
                    {{ $posts[0]->author->name }}
                </a> 
                in 
              <a href="/categories/{{ $posts[0]->category->slug ?? '' }}">
    {{ $posts[0]->category->name ?? 'No Category' }}
</a> {{ $posts[0]->created_at->diffForHumans() }}
            </p>
    <p class="card-text"> {{ $posts[0]->excerpt }}</p>

    <a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none" btn-primary >Read More..</a>
    <p class="card-text"><small class="text-body-secondary"></small> </p>
  </div>
</div>

@else
    <p class="text-center fs-4">No posts found.</p>

@endif

 

    {{-- 2. Cek apakah ada postingan? --}}
    @if ($posts->count())
        
        @foreach ($posts as $post)
        <article class="mb-5 border-bottom pb-4">
            <h2>
                <a href="/posts/{{ $post->slug }}" class="text-decoration-none">
                    {{ $post->title }}
                </a>
            </h2>

            <p>
                By: <a href="/authors/{{ $post->author->username }}" class="text-decoration-none">
                    {{ $post->author->name }}
                </a> 
                in 
              <a href="/categories/{{ $post->category->slug ?? '' }}">
    {{ $post->category->name ?? 'No Category' }}
</a>
            </p>

            <p>{!! $post->excerpt !!}</p>

            <a href="/posts/{{ $post->slug }}" class="text-decoration-none">Read More..</a>
        </article>
        @endforeach

    @else
        {{-- 3. Tampilkan pesan jika postingan kosong --}}
        <p class="text-center fs-4">No posts found.</p>     
    @endif

@endsection