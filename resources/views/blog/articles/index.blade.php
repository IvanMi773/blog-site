@extends('layouts.app')

@section('content')
	<div class="centered-block">
		@foreach($categories as $category)
			<a href="{{ route('article.index', ['locale' => app()->getLocale(), 'category_id' => $category->id]) }}" class="category">
				{{ $category->name }} <span class="dash"> | </span>
			</a>
		@endforeach

		<br>

		<div class="centered-line mt-3 mb-3">
			{{-- <form action="{{ route('theme') }}" method="POST" class="">
				@csrf

				<select name="theme" id="theme">
					<option value="white">White</option>
					<option value="dark">Dark</option>
				</select>
			</form>

			<form action="{{ route('language') }}" method="POST" class="">
				@csrf

				<select name="language" id="language">
					<option value="ukrainian">Ukrainian</option>
					<option value="english">English</option>
					<option value="russian">Russian</option>
				</select>
			</form> --}}

			<form action="{{ route('logout', app()->getLocale()) }}" method="POST" class="">
				@csrf

				<button type="submit" class="button p-2">Logout</button>
			</form>
		</div>



		{{-- <form action="" method="post" class="form">
			<input type="text" name="search" id="search" placeholder="Search..." class="input_text" required>

			<button type="submit" class="button">Search</button>
		</form> --}}

		<hr>

		@foreach($articles as $article)
			<a href="{{ route('article.show', ['locale' => app()->getLocale(), 'article' => $article->id]) }}" class="text-left title text-break">
				{{ $article->title }}
			</a>

			<div class="inline mb-3 mt-3">
				<p class="text-muted">{{ $article->created_at }}</p>

				@foreach ($article->categories as $category)
					<p class="text-large ml-2 font-weight-bold"> {{ $category->name }} </p>
				@endforeach
			</div>

			<p class="text-break text mb-5">
				@php
					echo "$article->slug"
				@endphp

				<a href="{{ route('article.show', ['locale' => app()->getLocale(), 'article' => $article->id]) }}" class="text-left text-break">Continue...</a>
			</p>

			<br>
		@endforeach

		{{ $articles->links() }}
	</div>
@endsection