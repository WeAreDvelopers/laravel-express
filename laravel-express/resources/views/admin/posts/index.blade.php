@extends('template')
 @section('content')
 	<h1>Blog Admin</h1>

	
		<a href="{{route('admin.posts.create')}}" class="btn btn-xs btn-success">Novo</a>
	
 	<table class="table table-striped">
 		<thead>
 			<tr>
 				<td>ID</td>
 				<td>Titulo</td>
 				<td>Ação</td>
 			</tr>
 		</thead>
 		<tbody>
 			@foreach($posts as $post)
 			<tr>
 				<td>{{ $post->id }}</td>
 				<td>{{ $post->title }}</td>
 				<td><a href="{{route('admin.posts.edit',['id'=>$post->id])}}" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-pencil"></span></a>
 					<a href="{{route('admin.posts.destroy',['id'=>$post->id])}}" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span></a></td>
 			</tr>
			@endforeach
 		</tbody>
 	</table>
 	{!!$posts->render()!!}
 @stop