@extends('layouts.app')

@section('content')
	<div class="centered-block">
		@foreach($categories as $category)
			<a href="{{ route('article.index', $category->id) }}" class="category">
				{{ $category->name }} <span class="dash"> | </span>
			</a>
		@endforeach

		<br>

		{{-- <form action="" method="post" class="form">
			<input type="text" name="search" id="search" placeholder="Search..." class="input_text" required>

			<button type="submit" class="button">Search</button>
		</form> --}}

		<hr>

		@foreach($articles as $article)
			<a href="{{ route('article.show', $article->id) }}" class="text-left title text-break">
				{{ $article->title }}
			</a>
			
			<p class="text-muted mb-3 mt-3">{{ $article->created_at }}</p>

			<p class="text-break text mb-5">
				@php
					echo "$article->slug"
				@endphp
				
				<a href="{{ route('article.show', $article->id) }}" class="text-left text-break">Continue...</a>
			</p>

			<br>
		@endforeach

		{{ $articles->links() }}
	</div>
@endsection