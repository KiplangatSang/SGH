@extends('layouts.post')
@section('content')
<div>
    @include('inc.home_header')
    <!-- Main Content-->
    <div class="container">
        <div class="row gx-4 gx-lg-5 ">
            <div class="col-md-8 col-lg-8 col-xl-8">
                @foreach ($data['posts'] as $post)
                <!-- Post preview-->

                <div class="post-preview">
                    <a href="/{{ $post->post_id }}">
                        <h2 class="post-title">{{ $post->post_title }}</h2>
                        <h3 class="post-subtitle">{!! $post->post_subtitle !!}</h3>

                        <div class="row d-flex justify-content-center">
                            @if ($post['post_top_image'] != null)
                            {{-- {{dd($post['post_top_image'])}} --}}

                            @foreach ($post['post_top_image'] as $image)
                                <div class="col-md-6 col-xl d-flex justify-content-center m-1">
                                    <img src="{{ $image }}" alt="Capture Image" class="p-1 d-flex w-100 img-thumbnail rounded">
                                </div>
                            @endforeach
                            @endif
                        </div>
                        <h6 class="meta"> <small>
                                Story by
                                <a href="#!" class="text-info">{{ $post->postable()->first()->name }}</a>
                                on {{ $post->created_at->format('D M Y  H:II') . ' hrs' }}</small>
                        </h6>
                    </a>

                </div>
                <!-- Divider-->
                <hr class="my-4" />
                @endforeach

                <div class="mx-auto d-flex justify-content-center">
                    {{ $data['posts']->links() }}
                </div>

                <div class="col-md-2 col-xl-2 p-1">
                    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5005358454303953" crossorigin="anonymous"></script>
                    <!-- StormsAdd -->
                    <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-5005358454303953" data-ad-slot="8840350149" data-ad-format="auto" data-full-width-responsive="true"></ins>
                    <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});

                    </script>
                </div>


                <!-- Pager-->

            </div>
            <div class="col-md-4 col-lg-4 col-xl-4">
                {{-- {{dd($newsdata['recomended'])}} --}}
                <div class="col-md-2 col-xl-2 p-1">
                    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5005358454303953" crossorigin="anonymous"></script>
                    <!-- StormsAdd -->
                    <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-5005358454303953" data-ad-slot="8840350149" data-ad-format="auto" data-full-width-responsive="true"></ins>
                    <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});

                    </script>
                </div>
                @if (count($data['recomended']) > 1)
                <h3 class="text-info">Recommended for you</h3>
                @foreach ($data['recomended'] as $recomended)
                <!-- Post preview-->

                <div class="post-preview">
                    <a href="/{{ $recomended->post_id }}">
                        <h2 class="post-title">{{ $recomended->post_title }}</h2>
                        <h3 class="post-subtitle">{!! $recomended->post_subtitle !!}</h3>

                        <div class="row d-flex justify-content-center">
                            @if ($recomended['post_top_image'] != null)
                            {{-- {{dd($post['post_top_image'])}} --}}

                            @foreach ($recomended['post_top_image'] as $image)
                            <div class="col">
                                <img src="{{ $image }}" alt="Capture Image" class="capture_image p-1 m-1">
                            </div>
                            @endforeach
                            @endif
                        </div>
                        <h6 class="meta"> <small>
                                Story by
                                <a href="#!" class="text-info">{{ $recomended->postable()->first()->name }}</a>
                                on {{ $recomended->created_at->format('D M Y  H:II') . ' hrs' }}</small>
                        </h6>
                    </a>

                </div>
                <!-- Divider-->
                <hr class="my-4" />
                @endforeach
                <div class="mx-auto d-flex justify-content-center">
                    {{ $data['recomended']->links() }}
                </div>

                <div class="col-md-2 col-xl-2 p-1">
                    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5005358454303953" crossorigin="anonymous"></script>
                    <!-- StormsAdd -->
                    <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-5005358454303953" data-ad-slot="8840350149" data-ad-format="auto" data-full-width-responsive="true"></ins>
                    <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});

                    </script>
                </div>
                @else
                <div class="jumbotron p-3">
                    <h3 class="text-info">Refresh to get new updates</h3>
                </div>
                <div class="col-md-2 col-xl-2 p-1">
                    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5005358454303953" crossorigin="anonymous"></script>
                    <!-- StormsAdd -->
                    <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-5005358454303953" data-ad-slot="8840350149" data-ad-format="auto" data-full-width-responsive="true"></ins>
                    <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});

                    </script>
                </div>
                @endif


            </div>
        </div>
    </div>
</div>
@endsection
