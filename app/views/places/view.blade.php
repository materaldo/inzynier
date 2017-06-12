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
			
			<form method="POST" action="{{{ URL::to('places/delete/'.$place->id) }}}" accept-charset="UTF-8">
				<button type="button" class="btn">{{ HTML::link('/places/edit/'.$place->id, 'Edytuj') }}</button>
				<button type="submit" class="btn" onclick="return confirm('Na pewno chcesz usunąć?');">Usuń</button>
				<button type="button" class="btn">{{ HTML::link('/places/all?sort/', 'Wróć do listy wszystkich') }}</button>
			</form>
</div>

		<?php
          echo "<h4 class=\"info\">$info</h4>";
		?>

<div class="form-group">
Sektor: {{$place->sector}}
</div>
<div class="form-group">
Rząd: {{$place->row}}
</div>
<div class="form-group">
Numer: {{$place->number}}
</div>
<div class="form-group">
Współrzędna x: {{$xd}}
</div>
<div class="form-group">
Współrzędna y: {{$yd}}
</div>
<div class="form-group">
Szerokość: {{$place->width}}
</div>
<div class="form-group">
Długość: {{$place->length}}
</div>
<?php if($place->status==false)
{
	$if = 'wolne';
}
else
	$if = 'zajęte'; ?>
<div class="form-group">
Status: {{$if}}
</div>

</p>

@stop