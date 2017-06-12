@extends('layouts.default')

@section('header')
	
@stop

@section('content')

<p>

<form method="POST" action="{{{ URL::to('places/add') }}}" accept-charset="UTF-8">
    
	<fieldset>
	
		<h2>Stwórz miejsce</h2>

		<?php
          echo "<h4 class=\"info\">$info</h4>";
		?>
       
        <div class="form-group">
            <label for="sector">Sektor</label>
            <input class="form-control" placeholder="Sektor" type="text" name="sector" id="sector" required>
        </div>
 
		<div class="form-group">
            <label for="row">Rząd</label>
            <input class="form-control" placeholder="Rząd" type="number" name="row" id="row" required>
        </div>
		
		<div class="form-group">
            <label for="number">Numer</label>
            <input class="form-control" placeholder="Numer" type="number" name="number" id="number" required>
        </div>
 
		<div class="form-group">
            <label for="x">Szerokość geograficzna (18°54'08,5" - 18°54'15,1")</label>
            <input class="form-control" placeholder="Stopnie" type="number" name="x1" id="x1" required value="18">
			<input class="form-control" placeholder="Minuty" type="number" name="x2" id="x2" required value="54">
			<input class="form-control" placeholder="Sekundy" type="number" step="0.01" name="x3" id="x3" required>
        </div>
		
		<div class="form-group">
            <label for="y">Długość geograficzna (51°12'04,9" - 51°12'08,4")</label>
            <input class="form-control" placeholder="Stopnie" type="number" name="y1" id="y1" required value="51">
			<input class="form-control" placeholder="Minuty" type="number" name="y2" id="y2" required value="12">
			<input class="form-control" placeholder="Sekundy" type="number" step="0.01" name="y3" id="y3" required>
        </div>
        
		<div class="form-group">
            <label for="width">Szerokość miejsca (cm)</label>
            <input class="form-control" placeholder="Szerokość w cm" type="number" name="width" id="width" required>
        </div>
		
		<div class="form-group">
            <label for="length">Długość miejsca (cm)</label>
            <input class="form-control" placeholder="Długość w cm" type="number" name="length" id="length" required>
        </div>
		
        <div class="form-actions form-group">
          <button type="submit" class="btn btn-primary">Dodaj</button>
        </div>

    </fieldset>
</form>

</p>

@stop
