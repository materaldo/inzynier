@extends('layouts.default')

@section('header')
	
@stop

@section('content')

<p>

<h2>Dodaj grób</h2>

<form method="POST" action="{{{ URL::to('graves/add') }}}" accept-charset="UTF-8">
    
	<fieldset>
	
		

		<?php
          echo "<h4 class=\"info\">$info</h4>";
		?>
       
        <div class="form-group">
            <label for="place_select">Miejsce</label>
			{{ Form::select('place_select', [null=>'Wybierz miejsce'] + $places, null, array('class' => 'form-control')) }}</div>
			
        </div>
       
	   <div class="form-group">
            <label for="type_select">Typ grobu</label>
			{{ Form::select('type_select', [null=>'Wybierz typ grobu'] + $types, null, array('class' => 'form-control')) }}
        </div>
        
		<div class="form-group">
            <label for="payment_date">Opłacone do (niewymagane)</label>
            <input class="form-control" placeholder="Data" type="date" name="payment_date" id="payment_date">
        </div>
        
		<div class="form-group">
            <label for="width">Szerokość grobu (cm)(niewymagane)</label>
            <input class="form-control" placeholder="Szerokość w cm" type="number" name="width" id="width">
        </div>
		
		<div class="form-group">
            <label for="length">Długość grobu (cm)(niewymagane)</label>
            <input class="form-control" placeholder="Długość w cm" type="number" name="length" id="length">
        </div>
		
		<div class="form-group">
            <label for="image">Zdjęcie (niewymagane)</label>
            <input class="form-control" placeholder="Link do zdjęcia" type="text" name="image" id="image">
        </div>
		
        <div class="form-actions form-group">
          <button type="submit" class="btn btn-primary">Dodaj</button>
        </div>

    </fieldset>
</form>

</p>

@stop
