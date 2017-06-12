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

<h2>Dane grobu</h2>

<div class="form-actions form-group">
          <button type="button" class="btn">{{ HTML::link('/graves/view/'.$grave->id, 'Wróć do widoku') }}</button>
          <button type="button" class="btn">{{ HTML::link('/graves/all?sort', 'Wróć do listy wszystkich') }}</button>
</div>

<form method="POST" action="{{{ URL::to('graves/edit/'.$grave->id) }}}" accept-charset="UTF-8">
    
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
            <label for="payment_date">Opłacone do</label>
            <input class="form-control" placeholder="Data" type="date" name="payment_date" id="payment_date" value="{{$grave->payment_date}}">
        </div>
        
		<div class="form-group">
            <label for="width">Szerokość grobu (cm)</label>
            <input class="form-control" placeholder="Szerokość w cm" type="number" name="width" id="width" value="{{$grave->width}}">
        </div>
		
		<div class="form-group">
            <label for="length">Długość grobu (cm)</label>
            <input class="form-control" placeholder="Długość w cm" type="number" name="length" id="length" value="{{$grave->length}}">
        </div>
		
		<div class="form-group">
            <label for="image">Zdjęcie</label>
            <input class="form-control" placeholder="Link do zdjęcia" type="text" name="image" id="image" value="{{$grave->image}}">
        </div>
		
        <div class="form-actions form-group">
          <button type="submit" class="btn btn-primary">Edytuj</button>
        </div>

    </fieldset>
</form>

</p>

@stop
