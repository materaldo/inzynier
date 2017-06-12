@extends('layouts.default')

@section('header')

<style>
a, a:hover {
    text-decoration: none !important;
	color: black;
}
</style>		
	
@stop

@section('content')

<p>

<h2>Dane dysponenta</h2>

<div class="form-actions form-group">
			
			<form method="POST" action="{{{ URL::to('dispatchers/delete/'.$dispatcher->id) }}}" accept-charset="UTF-8">
				<button type="button" class="btn">{{ HTML::link('/dispatchers/edit/'.$dispatcher->id, 'Edytuj') }}</button>
				<button type="submit" class="btn" onclick="return confirm('Na pewno chcesz usunąć?');">Usuń</button>
				<button type="button" class="btn">{{ HTML::link('/dispatchers/all?sort/', 'Wróć do listy wszystkich') }}</button>
			</form>
</div>

		<?php
          echo "<h4 class=\"info\">$info</h4>";
		?>

<div class="form-group">
Imię i nazwisko: {{$dispatcher->first_name}} {{$dispatcher->last_name}}
</div>

<div class="form-group">
Numer telefonu: {{$dispatcher->phone_number}}
</div>

<div class="form-group">
Adres: {{$dispatcher->post_code}} {{$dispatcher->city}}<br>
{{$dispatcher->street}} {{$dispatcher->building}}
</div>		
		
</p>

@stop
