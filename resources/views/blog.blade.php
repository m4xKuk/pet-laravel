@extends('layouts.main')

@section('content')
    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="heading-page header-text">
        <section class="page-heading">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-content">
                            <h4>Recent Posts</h4>
                            <h2>Our Recent Blog Entries</h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Banner Ends Here -->

    <section class="blog-posts grid-system">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="all-blog-posts">
                        <div class="row">
                            @foreach ($posts as $post)
                            <div class="col-lg-6">
                                <div class="blog-post">
                                    <div class="blog-thumb">
                                        @if (isset($post->preview_image))
                                            <img src="{{ Storage::disk('public')->exists($post->preview_image) ? asset('storage/' . $post->preview_image) : $post->preview_image }}" alt="">
                                        @endif
                                    </div>
                                    <div class="down-content">
                                        {{-- <span>{{ $post->title}}</span> --}}
                                        <a href="{{route('post', $post)}}">
                                            <h4>{{ $post->title}}</h4>
                                        </a>
                                        <ul class="post-info">
                                            <li><a href="{{route('post', $post)}}">{{$post->author->name}}</a></li>
                                            @php
                                                $data = Carbon\Carbon::parse($post->created_at);
                                            @endphp
                                            <li><a href="#">{{ $data->format('M D, Y') }}</a></li>
                                            <li><a href="#">12 Comments</a></li>
                                        </ul>
                                        <p>{!! Str::limit($post->description, 100, '...') !!}</p>
                                        <div class="post-options">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <ul class="post-tags">
                                                        <li><i class="fa fa-tags"></i></li>
                                                        <li><a href="#">Best Templates</a>,</li>
                                                        <li><a href="#">TemplateMo</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <div class="col-lg-12">
                                {{ $posts->links() }}
                            </div>
                        </div>
                    </div>
                </div>
                @include('include.sidebar', ['recent_posts'=>$recent_posts, 'categories'=>$categories])
            </div>
        </div>
    </section>
@endsection
