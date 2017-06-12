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

<h2>Dane miejsca</h2>

<div class="form-actions form-group">
          <button type="button" class="btn">{{ HTML::link('/places/view/'.$place->id, 'Wróć do widoku') }}</button>
          <button type="button" class="btn">{{ HTML::link('/places/all?sort', 'Wróć do listy wszystkich') }}</button>
</div>

<form method="POST" action="{{{ URL::to('places/edit/'.$place->id) }}}" accept-charset="UTF-8">
    
	<fieldset>

		<?php
          echo "<h4 class=\"info\">$info</h4>";
		?>
		
		<div class="form-group">
            <label for="sector">Sektor</label>
            <input class="form-control" placeholder="Sektor" type="text" name="sector" id="sector" value="{{$place->sector}}" required>
        </div>
		
		<div class="form-group">
            <label for="row">Rząd</label>
            <input class="form-control" placeholder="Rząd" type="number" name="row" id="row" value="{{$place->row}}" required>
        </div>
		
		<div class="form-group">
            <label for="number">Numer</label>
            <input class="form-control" placeholder="Numer" type="number" name="number" id="number" value="{{$place->number}}" required>
        </div>
		
		<div class="form-group">
            <label for="x">Współrzędna x</label>
            <input class="form-control" placeholder="Współrzędna x" type="number" name="x" id="x" value="{{$place->x}}" required>
        </div>
		
		<div class="form-group">
            <label for="y">Współrzędna y</label>
            <input class="form-control" placeholder="Współrzędna y" type="number" name="y" id="y" value="{{$place->y}}" required>
        </div>
        
		<div class="form-group">
            <label for="width">Szerokość miejsca (cm)</label>
            <input class="form-control" placeholder="Szerokość w cm" type="number" name="width" id="width" value="{{$place->width}}" required>
        </div>
		
		<div class="form-group">
            <label for="length">Długość miejsca (cm)</label>
            <input class="form-control" placeholder="Długość w cm" type="number" name="length" id="length" value="{{$place->length}}" required>
        </div>
		
        <div class="form-actions form-group">
          <button type="submit" class="btn btn-primary">Edytuj</button>
        </div>

    </fieldset>
</form>

</p>

@stop
