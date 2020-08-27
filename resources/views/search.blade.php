@extends('layouts.app')

@section('content')
	<div class="centered-block">
		@foreach ($articles as $article)
			<a> {{ $article->title }} </a>
		@endforeach

		{{ $articles->links() }}
	</div>
@endsection