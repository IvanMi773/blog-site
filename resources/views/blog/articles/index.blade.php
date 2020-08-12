@extends('layouts.app')

@section('content')
	{{-- <div class="container"> --}}
		<div class="centered-block">
			{{-- <div class="col"></div> --}}
			{{-- <div class="col"> --}}
				@foreach($articles as $article)
					<a href="{{ url('article.show', $article->id) }}" class="text-left text-dark text-break">
						<h3>
							{{ $article->title }}
						</h3>
					</a>
					<br>
				@endforeach

				{{ $articles->links() }}
		</div>
			{{-- <div class="col"></div>
		</div> --}}
	{{-- </div> --}}
@endsection