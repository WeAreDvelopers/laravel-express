@extends('template')


 @section('content')
 
 	<h1>Blog</h1>
	@foreach($posts as $post)
		<h2>{{$post->title}}</h2>
		<p>{{$post->content}}</p>
		<hr>
		<p>Tags</p>
		@foreach($post->tags as $tag)
			<span>{{$tag->name}}</span>
	
		@endforeach
		<hr>
		<div class="well">
			<h3>Comments</h3>
		 @foreach($post->comments as $comment)
			<b>Name:</b> {{$comment->name}} <br>
			<b>Comment:</b> {{$comment->comment}} <br>
		 @endforeach
		</div>
		<hr>
	@endforeach

 @stop