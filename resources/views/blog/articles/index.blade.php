@extends('layouts.app')

@section('content')
	<div class="centered-block">
		@foreach($categories as $category)
			<a href="{{ route('article.index', ['locale' => app()->getLocale(), 'category' => $category->id]) }}" class="category">
				{{ $category->name }} <span class="dash"> | </span>
			</a>
		@endforeach

		<br>

		<div class="centered-line mt-3 mb-3">
			<a href="/en/blog/1" class="small-link ml-1 mr-1">En</a> |
			<a href="/uk/blog/1" class="small-link mr-1 ml-1">Uk</a> |
			<a href="/ru/blog/1" class="small-link ml-1">Ru</a>
		</div>

		<div class="row">
			@if (auth()->user())
				@if (auth()->user()->isAdmin())
					<a href="/admin" class="small-link col">
						<button type="submit" class="btn btn-dark">
							Admin panel
						</button>
					</a>
				@endif
			@endif

			@if (auth()->user())
				@if (auth()->user()->isAdmin())
					<form action="/logout" method="POST" class="col d-flex justify-content-around">
						@csrf

						<button type="submit" class="btn btn-dark">Logout</button>
					</form>
				@endif
			@endif
		</div>

		<hr>

		@foreach($articles as $article)
			<a href="{{ route('article.show', ['locale' => app()->getLocale(), 'article' => $article->id]) }}" class="text-left title text-break">
				{{ $article->title }}
			</a>

			<div class="inline mb-1 mt-3">
				<p class="text-muted">{{ $article->created_at }}</p>

				@foreach ($article->categories as $category)
					<a href="{{ route('article.index', ['locale' => app()->getLocale(), 'category' => $category->id]) }}" class="text-large text-dark ml-2 font-weight-bold"> {{ $category->name }} </a>
				@endforeach
			</div>

			<p class="text-break text mb-5">
				@php
					echo "$article->slug"
				@endphp

				<a href="{{ route('article.show', ['locale' => app()->getLocale(), 'article' => $article->id]) }}" class="text-left text-break">
					@lang('app.continue')
				</a>
			</p>

			<br>
		@endforeach

		{{ $articles->links() }}
	</div>
@endsection