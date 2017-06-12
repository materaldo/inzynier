@extends('layouts.default')

@section('header')
	
@stop

@section('content')

<p>

<form method="POST" action="{{{ URL::to('dispatchers/add') }}}" accept-charset="UTF-8">
    
	<fieldset>
       
		<h2>Dodaj dysponenta</h2>
	   
		<?php
          echo "<h4 class=\"info\">$info</h4>";
		?>
	
		<div class="form-group">
            <label for="last_name">Nazwisko</label>
            <input class="form-control" placeholder="Nazwisko" type="text" name="last_name" id="last_name" required>
        </div>
	
		<div class="form-group">
            <label for="first_name">Imię</label>
            <input class="form-control" placeholder="Imię" type="text" name="first_name" id="first_name" required>
        </div>
		
		<div class="form-group">
            <label for="phone_number">Numer telefonu</label>
            <input class="form-control" placeholder="Numer telefonu" type="number" name="phone_number" id="phone_number" required>
        </div>
		<div class="form-group">
            <label for="street">Ulica (niewymagane)</label>
            <input class="form-control" placeholder="Ulica" type="text" name="street" id="street">
        </div>
		<div class="form-group">
            <label for="building">Numer domu (niewymagane)</label>
            <input class="form-control" placeholder="Numer domu" type="text" name="building" id="building">
        </div>
		<div class="form-group">
            <label for="post_code">Kod pocztowy (niewymagane)</label>
            <input class="form-control" placeholder="Kod pocztowy" type="text" name="post_code" id="post_code">
        </div>
		<div class="form-group">
            <label for="city">Miasto (niewymagane)</label>
            <input class="form-control" placeholder="Miasto" type="text" name="city" id="city">
        </div>	
		
        <div class="form-actions form-group">
          <button type="submit" class="btn btn-primary">Dodaj</button>
        </div>

    </fieldset>
</form>

<form method="POST" action="{{{ URL::to('dispatchers/assign') }}}" accept-charset="UTF-8">
    
	<fieldset>
       
		<h2>Przypisz dysponenta do grobu</h2>
	   
		<?php
          echo "<h4 class=\"info\">$info2</h4>";
		?>
		
		
		 <div class="form-group">
            <label for="dispatcher_select">Dysponent</label>
			{{ Form::select('dispatcher_select', [null=>'Wybierz dysponenta'] + $dispatchers, null, array('class' => 'form-control')) }}</div>
			
        </div>
       
	   <div class="form-group">
            <label for="grave_select">Grób</label>
			{{ Form::select('grave_select', [null=>'Wybierz grób'] + $graves, null, array('class' => 'form-control')) }}
        </div>
			
		
        <div class="form-actions form-group">
          <button type="submit" class="btn btn-primary">Przypisz</button>
        </div>

    </fieldset>
</form>



</p>

@stop



