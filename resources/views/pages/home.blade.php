@extends('layouts.app')

@section('content')
    <!-- Main Content-->
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">

                    @forelse($posts as $post)
                        <!-- Post preview-->
                        <div class="post-preview">
                            <a href="{{  route('show' , ['id' => $post->id ]) }}">
                                @if(!empty($post->featured_image) && !is_null($post->featured_image))
                                    <div class="mb-2">
                                        <img src="{{ asset('/storage/') }}/{{ $post->featured_image }}" class="img-fluid" alt="{{ $post->title }}">
                                    </div>
                                @endif
                                <h2 class="post-title">{{ $post->title }}</h2>
                                <h3 class="post-subtitle">{{ sn_truncate($post->body , 5) }}</h3>
                            </a>
                            <p class="post-meta">
                                Opublikowany przez
                                <a href="#!">{{ $post->user->name }}</a>
                                dnia {{ $post->created_at->format('d-m-Y') }}
                            </p>
                        </div>
                        <!-- Divider-->
                        <hr class="my-4" />
                        <!-- Post preview-->
                    @empty
                        ...
                    @endforelse
                   
                    
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="m-auto pt-4">
                        {{ $posts->links() }}
                    </div>
                </div>
            </div>
        </div>
@endsection