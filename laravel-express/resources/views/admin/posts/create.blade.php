@extends('template')
 @section('content')
 	<h1>Create new Post</h1>
<!-- COMANDO ILLUMINATE HTML PARA FORM  + SEGURANÇA PARA PROJETO--> 
	@if($errors->any())
		<ul class="alert">
			@foreach($errors->all() as $error)
			<li> {{ $error }} </li>
			@endforeach
		</ul> 
	@endif

	{!!Form::open(['route'=>'admin.posts.store','method'=>'post']) !!}
	
	@include('admin.posts._form')
	{!!Form::close()!!}

 @stop