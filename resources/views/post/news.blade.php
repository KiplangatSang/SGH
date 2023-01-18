@extends('layouts.post')
@section('content')
				<div>


								<!-- Page Header-->
								<header class="masthead" style="background-image: url('assets/img/home-bg.jpg')">
												<div class="container position-relative px-4 px-lg-5">
																<div class="row gx-4 gx-lg-5 justify-content-center">

																				<div class="col-md-10 col-lg-8 col-xl-7">
																								<div class="site-heading">
																												<h1>SG-Hekima</h1>
																												<span class="subheading">Where art joins profession</span>
																								</div>

																								<div class="col-md-2 col-xl-2 p-1">
																												<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5005358454303953"
																												                            crossorigin="anonymous"></script>
																												<!-- StormsAdd -->
																												<ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-5005358454303953"
																																data-ad-slot="8840350149" data-ad-format="auto" data-full-width-responsive="true"></ins>
																												<script>
																												    (adsbygoogle = window.adsbygoogle || []).push({});
																												</script>
																								</div>
																				</div>
																</div>
												</div>
								</header>
								<!-- Main Content-->
								<div class="container">
												<div class="row gx-4 gx-lg-5 ">
																<div class="col-md-8 col-lg-8 col-xl-8">
																				@foreach ($newsdata['posts'] as $post)
																								<!-- Post preview-->

																								<div class="post-preview">
																												<a href="/{{ $post->id }}">
																																<h2 class="post-title">{{ $post->post_title }}</h2>
																																<h3 class="post-subtitle">{!! $post->post_subtitle !!}</h3>

																																<div class="row d-flex justify-content-center">
																																				@if ($post['post_top_image'] != null)
																																								{{-- {{dd($post['post_top_image'])}} --}}

																																								@foreach ($post['post_top_image'] as $image)
																																												<div class="col">
																																																<img src="{{ $image }}" alt="Capture Image"
																																																				class="capture_image p-1 m-1">
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
																								{{ $newsdata['posts']->links() }}
																				</div>


																				<!-- Pager-->

																</div>
																<div class="col-md-4 col-lg-4 col-xl-4">
																				@if (count($newsdata['recomended']) > 1)
																								<h3 class="text-info">Recommended for you</h3>
																								@foreach ($newsdata['recomended'] as $recomended)
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
																																																				<img src="{{ $image }}" alt="Capture Image"
																																																								class="capture_image p-1 m-1">
																																																</div>
																																												@endforeach
																																								@endif
																																				</div>
																																				<h6 class="meta"> <small>
                                                                                                                                                    Story by
																																												<a href="#!"
																																																class="text-info">{{ $recomended->postable()->first()->name }}</a>
																																												on {{ $recomended->created_at->format('D M Y  H:II') . ' hrs' }}</small>
																																				</h6>
																																</a>

																												</div>
																												<!-- Divider-->
																												<hr class="my-4" />

																												<br>
																												<div class="col-md-2 col-xl-2 p-1">
																																<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5005358454303953"
																																                                crossorigin="anonymous"></script>
																																<!-- StormsAdd -->
																																<ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-5005358454303953"
																																				data-ad-slot="8840350149" data-ad-format="auto" data-full-width-responsive="true"></ins>
																																<script>
																																    (adsbygoogle = window.adsbygoogle || [])
																																    .push({});
																																</script>
																												</div>
																								@endforeach
																								<div class="mx-auto d-flex justify-content-center">
																												{{ $newsdata['recomended']->links() }}
																								</div>
																				@else
																								<div class="jumbotron p-3">
																												<h3 class="text-info">Refresh to get new updates</h3>
																								</div>
																				@endif
																</div>
												</div>
								</div>
				</div>
@endsection
