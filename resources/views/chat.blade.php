@extends('layouts.app')
@section('content')
	<div class="container">
		<div id="app">
			<div class="jumbotron">
				<ul v-for="message in messages">
					<li>
						@{{ message.name }} : @{{ message.body }} 
						<span class="pull-right">@{{ message.created_at | timeago }}</span>
					</li>
				 </ul>
				<form method="POST">
					<div class="form-group">
						<input type="text" class="form-control" v-model="message.body">
					</div>
					<div class="form-group">
						<input type="submit" class="form-control" v-on:click="sendMessage">
					</div>
				</form>
			</div>
			{{-- <pre>@{{ $data | json }}</pre> --}}
		</div>
	</div>
@endsection