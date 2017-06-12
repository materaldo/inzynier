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
			
			<form method="POST" action="{{{ URL::to('buried/delete/'.$buried->id) }}}" accept-charset="UTF-8">
				<button type="button" class="btn">{{ HTML::link('/buried/edit/'.$buried->id, 'Edytuj') }}</button>
				<button type="submit" class="btn" onclick="return confirm('Na pewno chcesz usunąć?');">Usuń</button>
				<button type="button" class="btn">{{ HTML::link('/buried/all?sort/', 'Wróć do listy wszystkich') }}</button>
			</form>
</div>

		<?php
          echo "<h4 class=\"info\">$info</h4>";
		?>

<div class="form-group">
<img src="{{ $buried->imageB }}" alt="Brak zdjęcia pochowanego" style="width:100px;height:100px;">
<img src="{{ $buried->imageG }}" alt="Brak zdjęcia grobu {{ $buried->sector.'|'.$buried->row.'|'.$buried->number }}" 
	 style="width:100px;height:100px;">
</div>

<div class="form-group">
Imię i nazwisko: {{$buried->first_name}} {{$buried->last_name}}
</div>
<div class="form-group">
Nazwisko rodowe: {{$buried->family_name}}
</div>
<div class="form-group">
Adres: {{$buried->post_code}} {{$buried->city}}<br>
{{$buried->street}} {{$buried->building}}
</div>
<div class="form-group">
Data urodzenia: {{$buried->date_of_birth}}<br>
Data zgonu: {{$buried->date_of_death}}<br>
Data pochowania: {{$buried->date_of_burial}}
</div>
<div class="form-group">
Miejsce pochowania: {{$buried->sector}}|{{$buried->row}}|{{$buried->number}} {{ HTML::link('/graves/view/'.$buried->idG, ' (Idź do grobu)') }}
</div>
<div class="form-group">
Numer ewidencyjny: {{$buried->registration_number}}
</div>
<div class="form-group">
Notatka: {{$buried->note}}
</div>

</p>

@stop
