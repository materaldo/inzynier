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

<h2>Dane pochowanego</h2>

<div class="form-actions form-group">
          <button type="button" class="btn">{{ HTML::link('/buried/view/'.$buried->id, 'Wróć do widoku') }}</button>
          <button type="button" class="btn">{{ HTML::link('/buried/all?sort', 'Wróć do listy wszystkich') }}</button>
</div>

<form method="POST" action="{{{ URL::to('buried/edit/'.$buried->id) }}}" accept-charset="UTF-8">
    
	<fieldset>

		<?php
          echo "<h4 class=\"info\">$info</h4>";
		?>
       
        <div class="form-group">
            <label for="grave_select">Grób</label>
			{{ Form::select('grave_select', [null=>'Wybierz grób'] + $graves, null, array('class' => 'form-control')) }}</div>	
        </div>
        
		<div class="form-group">
            <label for="last_name">Nazwisko</label>
            <input class="form-control" placeholder="Nazwisko" type="text" name="last_name" id="last_name" required value="{{$buried->last_name}}">
        </div>
		
		<div class="form-group">
            <label for="family_name">Nazwisko rodowe (niewymagane)</label>
            <input class="form-control" placeholder="Nazwisko" type="text" name="family_name" id="family_name" value="{{$buried->family_name}}">
        </div>
	
		<div class="form-group">
            <label for="first_name">Imię</label>
            <input class="form-control" placeholder="Imię" type="text" name="first_name" id="first_name" required value="{{$buried->first_name}}">
        </div>
		
		<div class="form-group">
            <label for="date_of_birth">Data urodzenia</label>
            <input class="form-control" placeholder="Data urodzenia" type="date" name="date_of_birth" id="date_of_birth" required value="{{$buried->date_of_birth}}">
        </div>
		
		<div class="form-group">
            <label for="date_of_death">Data zgonu</label>
            <input class="form-control" placeholder="Data zgonu" type="date" name="date_of_death" id="date_of_death" required value="{{$buried->date_of_death}}">
        </div>
		
		<div class="form-group">
            <label for="date_of_burial">Data pochowania</label>
            <input class="form-control" placeholder="Data pochowania" type="date" name="date_of_burial" id="date_of_burial" required value="{{$buried->date_of_burial}}">
        </div>
		
		<div class="form-group">
            <label for="registration_number">Numer ewidencyjny (niewymagane)</label>
            <input class="form-control" placeholder="Numer ewidencyjny" type="text" name="registration_number" id="registration_number" value="{{$buried->registration_number}}">
        </div>
		
		<div class="form-group">
            <label for="street">Ulica (niewymagane)</label>
            <input class="form-control" placeholder="Ulica" type="text" name="street" id="street" value="{{$buried->street}}">
        </div>
		<div class="form-group">
            <label for="building">Numer domu (niewymagane)</label>
            <input class="form-control" placeholder="Numer domu" type="text" name="building" id="building" value="{{$buried->building}}">
        </div>
		<div class="form-group">
            <label for="post_code">Kod pocztowy (niewymagane)</label>
            <input class="form-control" placeholder="Kod pocztowy" type="text" name="post_code" id="post_code" value="{{$buried->post_code}}">
        </div>
		<div class="form-group">
            <label for="city">Miasto (niewymagane)</label>
            <input class="form-control" placeholder="Miasto" type="text" name="city" id="city" value="{{$buried->city}}">
        </div>

		<div class="form-group">
            <label for="image">Zdjęcie (niewymagane)</label>
            <input class="form-control" placeholder="Link do zdjęcia" type="text" name="image" id="image" value="{{$buried->image}}">
        </div>		
		
		<div class="form-group">
            <label for="note">Notatka (niewymagane)</label>
            <input class="form-control" placeholder="Notatka" type="text" name="note" id="note" value="{{$buried->note}}">
        </div>
		
        <div class="form-actions form-group">
          <button type="submit" class="btn btn-primary">Edytuj</button>
        </div>

    </fieldset>
</form>

</p>

@stop
