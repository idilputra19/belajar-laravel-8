@extends ('layouts.main')

@section('container')

<article class="mb-5">
    
    <h1>{{ $title }}</h1>

    <h5>
        By: <a href="#" class="text-decoration-none">{{ $post->author->username ?? $post->user->name ?? 'Unknown' }}</a>
        
        | 
        
        <a href="/categories/{{ $post->category?->slug }}" class="text-decoration-none">
            {{ $post->category?->name ?? 'Uncategorized' }}
        </a>
    </h5>

    {!! $post->body !!} 
    
    <br>

    <a href="/posts" class="d-block mt-3">Back to Posts</a>

</article>

@endsection