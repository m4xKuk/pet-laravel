@extends('layouts.main')

@section('content')
    <div class="heading-page header-text">
        <section class="page-heading">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-content">
                            <h4>Post Details</h4>
                            <h2>Single blog post</h2>
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
                            <div class="col-lg-12">
                                <div class="blog-post">
                                    <div class="blog-thumb">
                                        @if(isset($post->preview_image))
                                        <img src="{{Storage::disk('public')->exists($post->preview_image) ? asset('images/'.$post->preview_image) : $post->preview_image}}" alt="">
                                        @endif
                                    </div>
                                    <div class="down-content">
                                        {{-- <span>Lifestyle</span> --}}
                                        {{-- <a href="post-details.html"> --}}
                                            <h4>{{$post->title}}</h4>
                                        {{-- </a> --}}
                                        @php
                                            $data = Carbon\Carbon::parse($post->created_at);
                                        @endphp
                                        <ul class="post-info">
                                            <li><a href="#">{{$post->author->name}}</a></li>
                                            <li><a href="#">{{$data->format('M D, Y')}}</a></li>
                                            <li><a href="#">10 Comments</a></li>
                                        </ul>
                                        <p>{!! strip_tags($post->description, '<b>, <p>, <i>') !!}</p>
                                        <div class="post-options">
                                            <div class="row">
                                                <div class="col-6">
                                                    <ul class="post-tags">
                                                        <li><i class="fa fa-tags"></i></li>
                                                        <li><a href="#">Best Templates</a>,</li>
                                                        <li><a href="#">TemplateMo</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-6">
                                                    <ul class="post-share">
                                                        <li><i class="fa fa-share-alt"></i></li>
                                                        <li><a href="#">Facebook</a>,</li>
                                                        <li><a href="#"> Twitter</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="sidebar-item comments">
                                    <div class="sidebar-heading">
                                        <h2>4 comments</h2>
                                    </div>
                                    <div class="content">
                                        <ul>
                                            <li>
                                                <div class="author-thumb">
                                                    <img src="assets/images/comment-author-01.jpg" alt="">
                                                </div>
                                                <div class="right-content">
                                                    <h4>Charles Kate<span>May 16, 2020</span></h4>
                                                    <p>Fusce ornare mollis eros. Duis et diam vitae justo fringilla
                                                        condimentum eu quis leo. Vestibulum id turpis porttitor sapien
                                                        facilisis scelerisque. Curabitur a nisl eu lacus convallis
                                                        eleifend posuere id tellus.</p>
                                                </div>
                                            </li>
                                            <li class="replied">
                                                <div class="author-thumb">
                                                    <img src="assets/images/comment-author-02.jpg" alt="">
                                                </div>
                                                <div class="right-content">
                                                    <h4>Thirteen Man<span>May 20, 2020</span></h4>
                                                    <p>In porta urna sed venenatis sollicitudin. Praesent urna sem,
                                                        pulvinar vel mattis eget.</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="author-thumb">
                                                    <img src="assets/images/comment-author-03.jpg" alt="">
                                                </div>
                                                <div class="right-content">
                                                    <h4>Belisimo Mama<span>May 16, 2020</span></h4>
                                                    <p>Nullam nec pharetra nibh. Cras tortor nulla, faucibus id
                                                        tincidunt in, ultrices eget ligula. Sed vitae suscipit ligula.
                                                        Vestibulum id turpis volutpat, lobortis turpis ac, molestie
                                                        nibh.</p>
                                                </div>
                                            </li>
                                            <li class="replied">
                                                <div class="author-thumb">
                                                    <img src="assets/images/comment-author-02.jpg" alt="">
                                                </div>
                                                <div class="right-content">
                                                    <h4>Thirteen Man<span>May 22, 2020</span></h4>
                                                    <p>Mauris sit amet justo vulputate, cursus massa congue, vestibulum
                                                        odio. Aenean elit nunc, gravida in erat sit amet, feugiat
                                                        viverra leo.</p>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="sidebar-item submit-comment">
                                    <div class="sidebar-heading">
                                        <h2>Your comment</h2>
                                    </div>
                                    <div class="content">
                                        <form id="comment" action="#" method="post">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                    <fieldset>
                                                        <input name="name" type="text" id="name"
                                                            placeholder="Your name" required="">
                                                    </fieldset>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <fieldset>
                                                        <input name="email" type="text" id="email"
                                                            placeholder="Your email" required="">
                                                    </fieldset>
                                                </div>
                                                <div class="col-md-12 col-sm-12">
                                                    <fieldset>
                                                        <input name="subject" type="text" id="subject"
                                                            placeholder="Subject">
                                                    </fieldset>
                                                </div>
                                                <div class="col-lg-12">
                                                    <fieldset>
                                                        <textarea name="message" rows="6" id="message" placeholder="Type your comment" required=""></textarea>
                                                    </fieldset>
                                                </div>
                                                <div class="col-lg-12">
                                                    <fieldset>
                                                        <button type="submit" id="form-submit"
                                                            class="main-button">Submit</button>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @include('include.sidebar', ['recent_posts'=>$recent_posts, 'categories'=>$categories])
            </div>
        </div>
    </section>
@endsection
