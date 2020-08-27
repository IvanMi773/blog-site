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
			@php
				echo "$article->text"
			@endphp
		</p>

		<br>

		<form action="{{ route('comment.store', app()->getLocale()) }}" method="post" class="mb-3">
			@csrf
			<span class="text-muted">
				@lang('app.use_html_message')
			</span> <br>
			<input type="text" name="text" id="text" class="input_text">
			<input type="hidden" name="article_id" value="{{ $article->id }}">

			<button type="submit" class="button padding">
				@lang('app.send')
			</button>
		</form>

		@foreach ($comments as $comment)
			<p>
				<span>
					@php
						echo "$comment->text"
					@endphp
				</span> <br>
				<span class="text-muted">{{ $comment->created_at }}</span> <br>
			</p>
		@endforeach
	</div>
@endsection