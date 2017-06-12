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
			
			<form method="POST" action="{{{ URL::to('graves/delete/'.$grave->id) }}}" accept-charset="UTF-8">
				<button type="button" class="btn">{{ HTML::link('/graves/edit/'.$grave->id, 'Edytuj') }}</button>
				<button type="submit" class="btn" onclick="return confirm('Na pewno chcesz usunąć?');">Usuń</button>
				<button type="button" class="btn">{{ HTML::link('/graves/all?sort/', 'Wróć do listy wszystkich') }}</button>
			</form>
</div>

		<?php
          echo "<h4 class=\"info\">$info</h4>";
		?>
		
<div class="form-group">
<img src="{{ $grave->image }}" alt="Brak zdjęcia grobu {{ $grave->sector.'|'.$grave->row.'|'.$grave->number }}" 
	 style="width:100px;height:100px;">
</div>		

<div class="form-group">
Sektor: {{$grave->sector}}
</div>
<div class="form-group">
Rząd: {{$grave->row}}
</div>
<div class="form-group">
Numer: {{$grave->number}}
</div>
<div class="form-group">
Szerokość (cm): {{$grave->width}}
</div>
<div class="form-group">
Długość (cm): {{$grave->length}}
</div>
<div class="form-group">
Rodzaj grobu: {{ $grave->type }}
</div>

</p>

@stop