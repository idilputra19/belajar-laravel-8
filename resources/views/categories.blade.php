@extends('layouts.main')

@section('container')

    <h1 class="mb-5">Post Categories</h1>

    <div class="container">
        <div class="row">
            <ul>
                @foreach ($categories as $category)
                    <li>
                        <h2>
                            <a href="/categories/{{ $category->slug }}" class="text-decoration-none">
                                {{ $category->name }}
                            </a>
                        </h2>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

@endsection