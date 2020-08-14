@extends('layouts.app')

@section('content')
	<div class="centered-block">
		<h2 class="text-left mb-3 text-black text-break">
			{{ $article->title }}
		</h2>
		
		<p class="text-muted">{{ $article->created_at }}</p>

		<p class="text-break text mt-4">
			{{ $article->text }}
		</p>

		<br>

		<form action="{{ route('comment.store') }}" method="post">
			@csrf
			<input type="text" name="text" id="text" class="input_text">
			<input type="hidden" name="article_id" value="{{ $article->id }}">

			<button type="submit" class="button padding">Send</button>
		</form>

		@foreach ($comments as $comment)
			<p>{{ $comment->text }}</p>
		@endforeach
	</div>
@endsection