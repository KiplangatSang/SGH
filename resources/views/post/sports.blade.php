@extends('layouts.post')
@section('content')
				<div>


								<!-- Page Header-->
								@include('inc.posts_header')
								<!-- Main Content-->
								<div class="container">
												<div class="row gx-4 gx-lg-5 ">
																<div class="col-md-8 col-lg-8 col-xl-8">
																				@foreach ($sportdata['posts'] as $post)
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
																								{{ $sportdata['posts']->links() }}
																				</div>


																				<!-- Pager-->

																</div>
																<div class="col-md-4 col-lg-4 col-xl-4">

																				@if (count($sportdata['recomended']) > 1)
                                                                                <h3 class="text-info">Recommended for you</h3>
																								@foreach ($sportdata['recomended'] as $recomended)
																												<!-- Post preview-->

																												<div class="post-preview">
																																<a href="/{{ $recomended->id }}">
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
																																												Posted
																																												<a href="#!"
																																																class="text-info">{{ $recomended->postable()->first()->name }}</a>
																																												on {{ $recomended->created_at->format('D M Y  H:II') . ' hrs' }}</small>
																																				</h6>
																																</a>

																												</div>
																												<!-- Divider-->
																												<hr class="my-4" />
																								@endforeach
																								<div class="mx-auto d-flex justify-content-center">
																												{{ $sportdata['recomended']->links() }}
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
