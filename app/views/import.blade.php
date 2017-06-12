@extends('layouts.default')

@section('header')
	
@stop

@section('content')

<p>
<h2>Import</h2>

		<?php
          echo "<h4 class=\"info\">$info</h4>";
		?>

<div class="form-group">
    Importowanie danych musi odbyć się w należytym porządku.
	<br>
	Podczas importowania należy pamiętać o ograniczeniach oraz polach wymaganych.
            
</div>

<div class="form-group">
	<form action="{{ URL::to('importPlaces') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
			<label>1. Import miejsc</label>
			<input type="file" name="import_file"/>
			<button class="btn btn-primary">Importuj plik</button>
	</form>
</div>

<div class="form-group">
	<form action="{{ URL::to('importDispatchers') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
			<label>2. Import dysponentów</label>
			<input type="file" name="import_file"/>
			<button class="btn btn-primary">Importuj plik</button>
	</form>
</div>

<div class="form-group">
	<form action="{{ URL::to('importGraves') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
			<label>3. Import grobów</label>
			<input type="file" name="import_file"/>
			<button class="btn btn-primary">Importuj plik</button>
	</form>
</div>

<div class="form-group">
	<form action="{{ URL::to('importBuried') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
			<label>4. Import pochowanych</label>
			<input type="file" name="import_file"/>
			<button class="btn btn-primary">Importuj plik</button>
	</form>
</div>

</p>

@stop