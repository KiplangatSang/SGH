@extends('layouts.post')
@section('content')
<div>
    <!-- Page Header-->
    <header class="masthead ">
        <div class="container position-relative  px-lg ">
            <div class="row  gx-lg justify-content-center">
                <div class="col-md-10 col-xl-10 ">
                    <div class="row ">
                        <div class="d-flex justify-content-center m-2">
                            <h1>{{ $post['post']->post_title }}</h1>
                        </div>
                        <div class="sub-heading d-flex justify-content-center m-1">
                            <h5>{{ $post['post']->post_subtitle }}</h5>
                        </div>
                        <div class="row d-flex justify-content-center">
                            @if ($post['post_top_image'])
                            {{-- {{dd($post['post_top_image'])}} --}}
                            @foreach ($post['post_top_image'] as $image)
                            <div class="col d-flex justify-content-center">
                                <img src="{{ $image }}" alt="Capture Image" class="capture_image p-1 m-1">
                            </div>
                            @endforeach
                            @endif
                        </div>
                        <div class="d-flex justify-content-center m-2">
                            <h6 class="meta"> <small>
                                    {{ $post['post']->created_at->format('D M d/m Y ') }}</small>
                            </h6>
                        </div>

                    </div>
                </div>
                <div class="col-md-2 col-xl-2 p-1">
                    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5005358454303953" crossorigin="anonymous"></script>
                    <!-- StormsAdd -->
                    <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-5005358454303953" data-ad-slot="8840350149" data-ad-format="auto" data-full-width-responsive="true"></ins>
                    <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});

                    </script>
                </div>
            </div>
        </div>
    </header>
    <!-- Post Content-->
    <article class="mb-2 bg-white">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <p>{!! $post['post']->post_body !!}</p>
                    <p>
                        <small>Story writen by
                            <a href="/artist/post/{{ $post['post']->postable()->first()->id }}">{{ $post['post']->postable()->first()->name }}</a>
                            &middot; Images by
                            <a href="/artist/post/{{ $post['post']->postable()->first()->id }}">{{ $post['post']->postable()->first()->name }}</a></small>
                    </p>
                </div>
                <div class="col-md-2 col-lg-4 col-xl-3">
                    <hr>
                    @if (count($post['newposts']) > 1)
                    <h3 class="text-info">Recommended for you</h3>
                    @foreach ($post['newposts'] as $recomended)
                    <!-- Post preview-->
                    {{-- recomended --}}
                    <div class="post-preview">
                        <a href="/{{ $recomended->post_id }}">
                            <h4 class="post-title">{{ $recomended->post_title }}</h4>
                            <h6 class="post-subtitle">{!! $recomended->post_subtitle !!}</h6>
                            <div class="row d-flex justify-content-center">
                                @if ($recomended['post_top_image'] )
                                @if (!empty($recomended['post_top_image']))

                                @foreach ($recomended->post_top_image as $image)
                                <div class="col">
                                    <img src="{{ $image }}" alt="Capture Image" class="capture_image p-1 m-1">
                                </div>
                                @endforeach
                                @endif

                                @endif
                            </div>
                            <h6 class="meta"> <small>
                                    Story by
                                    <a href="#!" class="text-info">{{ $recomended->postable()->first()->name }}</a>
                                    on
                                    {{ $recomended->created_at->format('D M Y  H:II') }}</small>
                            </h6>
                        </a>

                    </div>
                    <!-- Divider-->
                    <hr class="my-4" />
                    @endforeach
                    @else
                    <div class="jumbotron p-3">
                        <h3 class="text-info">Refresh to get new updates</h3>
                    </div>
                    @endif

                    <div class="mx-auto d-flex justify-content-center">
                        {{ $data['posts']->links() }}

                    </div>
                    <br>
                    <div class="col-md-2 col-xl-2 p-1">
                        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5005358454303953" crossorigin="anonymous"></script>
                        <!-- StormsAdd -->
                        <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-5005358454303953" data-ad-slot="8840350149" data-ad-format="auto" data-full-width-responsive="true"></ins>
                        <script>
                            (adsbygoogle = window.adsbygoogle || []).push({});

                        </script>
                    </div>

                </div>
            </div>
        </div>
    </article>
</div>
@endsection
