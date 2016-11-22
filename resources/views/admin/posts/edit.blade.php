@extends('template')
 @section('content')
 	<h1>Edit new Post <small>:{{$post->title}}</small></h1>
<!-- COMANDO ILLUMINATE HTML PARA FORM  + SEGURANÇA PARA PROJETO--> 
	@if($errors->any())
		<ul class="alert">
			@foreach($errors->all() as $error)
			<li> {{ $error }} </li>
			@endforeach
		</ul> 
	@endif

	{!!Form::model($post,['route'=>['admin.posts.update',$post->id],'method'=>'put']) !!}
	@include('admin.posts._form')
	<div class="form-group">
		{!! Form::label('tags','Tags')!!}
		{!! Form::textarea('tags',$post->TagList,['class'=>'form-control']) !!}
	</div>
	<div class="form-group">
		{!! Form::submit('Edit Post',['class'=>'btn btn-primary']) !!}
	</div>
	{!!Form::close()!!}

 @stop