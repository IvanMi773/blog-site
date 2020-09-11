@extends('layouts.app')

@section('content')
	<div class="container">
		<a href="{{ route('article.index', ['locale' => app()->getLocale(), 'category' => 1]) }}" class="font-weight-bold text-dark text-large">
			@lang('app.back')
		</a>
	</div>

	<div class="centered-block">
		<h2 class="text-left mb-3 text-black text-break">
			{{ $article->title }}
		</h2>

		<p class="text-muted">{{ $article->created_at }}</p>

		<p class="text-break text mt-4">
			@parsedown($article->text)
		</p>

		<br>

		<form action="{{ route('comment.store', app()->getLocale()) }}" method="post" class="mb-3">
			@csrf
			<span class="text-muted">
				@lang('app.use_html_message')
			</span> <br>
			
			<textarea name="text" id="text" cols="60" rows="5"></textarea>
			<br>

			<input type="hidden" name="article_id" value="{{ $article->id }}">

			<button type="submit" class="button padding">
				@lang('app.send')
			</button>
		</form>

		@foreach ($comments as $comment)
			<div class="row">
				<p class="col">
					<span>
						@php
							echo "$comment->text"
						@endphp
					</span> <br>
					<span class="text-muted">{{ $comment->created_at }}</span> <br>
				</p>

				@if (auth()->user())
					@if (auth()->user()->isAdmin())
						<div class="col d-flex justify-content-around">
							<form action="/admin/comments/{{ $comment->id }}/edit" method="POST" class="">
								@csrf

								<button type="submit" style="border: none">
									<img src="{{ asset('/images/svg/edit.svg') }}" />
								</button>
							</form>
						</div>
					@endif
				@endif

				<br>
			</div>
		@endforeach
	</div>
@endsection