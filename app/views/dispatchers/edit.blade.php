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
          <button type="button" class="btn">{{ HTML::link('/dispatchers/view/'.$dispatcher->id, 'Wróć do widoku') }}</button>
          <button type="button" class="btn">{{ HTML::link('/dispatchers/all?sort', 'Wróć do listy wszystkich') }}</button>
</div>

<form method="POST" action="{{{ URL::to('dispatchers/edit/'.$dispatcher->id) }}}" accept-charset="UTF-8">
    
	<fieldset>

		<?php
          echo "<h4 class=\"info\">$info</h4>";
		?>
        
		<div class="form-group">
            <label for="last_name">Nazwisko</label>
            <input class="form-control" placeholder="Nazwisko" type="text" name="last_name" id="last_name" required value="{{$dispatcher->last_name}}">
        </div>
	
		<div class="form-group">
            <label for="first_name">Imię</label>
            <input class="form-control" placeholder="Imię" type="text" name="first_name" id="first_name" required value="{{$dispatcher->first_name}}">
        </div>
		
		<div class="form-group">
            <label for="phone_number">Numer telefonu</label>
            <input class="form-control" placeholder="Numer telefonu" type="number" name="phone_number" id="phone_number" required value="{{$dispatcher->phone_number}}">
        </div>
		<div class="form-group">
            <label for="street">Ulica (niewymagane)</label>
            <input class="form-control" placeholder="Ulica" type="text" name="street" id="street" value="{{$dispatcher->street}}">
        </div>
		<div class="form-group">
            <label for="building">Numer domu (niewymagane)</label>
            <input class="form-control" placeholder="Numer domu" type="text" name="building" id="building" value="{{$dispatcher->building}}">
        </div>
		<div class="form-group">
            <label for="post_code">Kod pocztowy (niewymagane)</label>
            <input class="form-control" placeholder="Kod pocztowy" type="text" name="post_code" id="post_code" value="{{$dispatcher->post_code}}">
        </div>
		<div class="form-group">
            <label for="city">Miasto (niewymagane)</label>
            <input class="form-control" placeholder="Miasto" type="text" name="city" id="city" value="{{$dispatcher->city}}">
        </div>	
		
        <div class="form-actions form-group">
          <button type="submit" class="btn btn-primary">Edytuj</button>
        </div>

    </fieldset>
</form>

</p>

@stop