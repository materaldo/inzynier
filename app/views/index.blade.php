@extends('layouts.default')

@section('header')
	
@stop

@section('content')

<p>

<form method="GET" action="{{{ URL::to('search') }}}" accept-charset="UTF-8">
    
	<fieldset>
	
	<h2>Wyszukiwarka</h2>

	<div class="form-group">
            <label for="last_name">Nazwisko</label>
            <input class="form-control" placeholder="Nazwisko" type="text" name="last_name" id="last_name">
    </div>
	
	<div class="form-group">
            <label for="first_name">Imię</label>
            <input class="form-control" placeholder="Imię" type="text" name="first_name" id="first_name">
    </div>
	
	<div class="form-group">
            <label for="family_name">Nazwisko rodowe</label>
            <input class="form-control" placeholder="Nazwisko rodowe" type="text" name="family_name" id="family_name">
    </div>
	
	<div class="form-group">
            <label for="date_of_birth">Data urodzenia</label>
            <input class="form-control" placeholder="Data urodzenia" type="date" name="date_of_birth" id="date_of_birth">
    </div>
	<div class="form-group">
            <label for="date_of_death">Data zgonu</label>
            <input class="form-control" placeholder="Data zgonu" type="date" name="date_of_death" id="date_of_death">
    </div>
	<div class="form-group">
            <label for="date_of_burial">Data pochowania</label>
            <input class="form-control" placeholder="Data pochowania" type="date" name="date_of_burial" id="date_of_burial">
    </div>
	<div class="form-group">
            <label for="sector">Sektor</label>
            <input class="form-control" placeholder="Sektor" type="text" name="sector" id="sector">
    </div>
	<div class="form-group">
            <label for="row">Rząd</label>
            <input class="form-control" placeholder="Rząd" type="text" name="row" id="row">
    </div>
	<div class="form-group">
            <label for="number">Numer</label>
            <input class="form-control" placeholder="Numer" type="text" name="number" id="number">
    </div>
	
	<div class="form-actions form-group">
    <button type="submit" class="btn btn-primary">Szukaj</button>
	<button type="reset" class="btn btn-primary">Wyczyść</button>
    </div>

    </fieldset>
</form>

	


</p>

@stop
