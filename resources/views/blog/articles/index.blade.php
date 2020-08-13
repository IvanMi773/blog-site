@extends('layouts.app')

@section('content')
		<div class="centered-block">
			@foreach($articles as $article)
				<a href="{{ url('article.show', $article->id) }}" class="text-left text-black text-break">
					<h2>
						{{ $article->title }}
					</h2>
				</a>
				
				<p class="text-muted mb-0">{{ $article->created_at }}</p>

				<p class="text-break text mt-0">
					{{ $article->slug }}
					
					<a href="{{ url('article.show', $article->id) }}" class="text-left text-break">Continue...</a>
				</p>

				<br>
			@endforeach

			{{ $articles->links() }}
		</div>
@endsection