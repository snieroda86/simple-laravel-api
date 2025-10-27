@extends('layouts.app')

@section('content')
    <!-- Main Content-->
    <article class="mb-4">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="pb-3">
                        <h1>{{ $post->title }}</h1>
                        @if(!empty($post->featured_image) && !is_null($post->featured_image))
                            <div class="mt-4">
                                <img src="{{ asset('/storage/') }}/{{ $post->featured_image }}" class="img-fluid" alt="{{ $post->title }}">
                            </div>
                        @endif
                    </div>
                    <div class="pb-4">
                        <p>{{ $post->body }}</p>
                    </div>
                    <p>
                        Autor
                        <a href="#">{{  $post->user->name }}</a>
                        &middot; Data
                        <a href="#">{{ $post->created_at->format('d-m-Y') }}</a>
                    </p>
                </div>
            </div>
        </div>
    </article>
@endsection