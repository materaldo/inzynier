@extends('layouts.default')

@section('header')
	
@stop

@section('content')

<p>

<form method="POST" action="{{{ URL::to('buried/add') }}}" accept-charset="UTF-8">
    
	<fieldset>
	
		<h2>Dodaj pochowanego</h2>

		<?php
          echo "<h4 class=\"info\">$info</h4>";
		?>
       
        <div class="form-group">
            <label for="grave_select">Grób</label>
			{{ Form::select('grave_select', [null=>'Wybierz grób'] + $graves, null, array('class' => 'form-control')) }}</div>	
        </div>
        
		<div class="form-group">
            <label for="last_name">Nazwisko</label>
            <input class="form-control" placeholder="Nazwisko" type="text" name="last_name" id="last_name" required>
        </div>
		
		<div class="form-group">
            <label for="family_name">Nazwisko rodowe (niewymagane)</label>
            <input class="form-control" placeholder="Nazwisko" type="text" name="family_name" id="family_name">
        </div>
	
		<div class="form-group">
            <label for="first_name">Imię</label>
            <input class="form-control" placeholder="Imię" type="text" name="first_name" id="first_name" required>
        </div>
		
		<div class="form-group">
            <label for="date_of_birth">Data urodzenia</label>
            <input class="form-control" placeholder="Data urodzenia" type="date" name="date_of_birth" id="date_of_birth" required>
        </div>
		
		<div class="form-group">
            <label for="date_of_death">Data zgonu</label>
            <input class="form-control" placeholder="Data zgonu" type="date" name="date_of_death" id="date_of_death" required>
        </div>
		
		<div class="form-group">
            <label for="date_of_burial">Data pochowania</label>
            <input class="form-control" placeholder="Data pochowania" type="date" name="date_of_burial" id="date_of_burial" required>
        </div>
		
		<div class="form-group">
            <label for="registration_number">Numer ewidencyjny (niewymagane)</label>
            <input class="form-control" placeholder="Numer ewidencyjny" type="text" name="registration_number" id="registration_number">
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

		<div class="form-group">
            <label for="image">Zdjęcie (niewymagane)</label>
            <input class="form-control" placeholder="Link do zdjęcia" type="text" name="image" id="image">
        </div>	
		
		<div class="form-group">
            <label for="note">Notatka (niewymagane)</label>
            <input class="form-control" placeholder="Notatka" type="text" name="note" id="note">
        </div>
		
        <div class="form-actions form-group">
          <button type="submit" class="btn btn-primary">Dodaj</button>
        </div>

    </fieldset>
</form>

</p>

@stop
