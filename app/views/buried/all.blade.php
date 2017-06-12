@extends('layouts.default')

@section('header')
	
@stop

@section('content')

<p>

<h2>Wszyscy pochowani na cmentarzu</h2>

		<?php
          echo "<h4 class=\"info\">$info</h4>";
		?>

		<div class="form-actions form-group">
			<a href="{{ URL::to('downloadBuried/xls') }}"><button class="btn btn-success">Eksportuj do xls</button></a>
			<a href="{{ URL::to('downloadBuried/xlsx') }}"><button class="btn btn-success">Eksportuj do xlsx</button></a>
			<a href="{{ URL::to('downloadBuried/csv') }}"><button class="btn btn-success">Eksportuj do CSV</button></a>
		</div>
		
	<table class="table table-bordered" style="background-color: silver">
        <tr>
            <th>Lp.</th>
			<th>Imię <a href='/buried/all?sort=first_name&order=desc'><span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span></a> 
			<a href='/buried/all?sort=first_name&order=asc'><span class="glyphicon glyphicon-triangle-top" aria-hidden="true"></span></a></th>
            <th>Nazwisko <a href='/buried/all?sort=last_name&order=desc'><span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span></a> 
			<a href='/buried/all?sort=last_name&order=asc'><span class="glyphicon glyphicon-triangle-top" aria-hidden="true"></span></a></th>
            <th>Nazwisko rodowe <a href='/buried/all?sort=family_name&order=desc'><span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span></a> 
			<a href='/buried/all?sort=family_name&order=asc'><span class="glyphicon glyphicon-triangle-top" aria-hidden="true"></span></a></th>
            <th>Miejsce</th>
            <th>Zdjęcie</th>
        </tr>
		<?php $pos=1 ?>
		@foreach($buriedArr as $buried)
        <tr>
            <td style="font-weight: bold; font-size: 120%">{{ HTML::link('/buried/view/'.$buried->id, $pos) }}</td>
			<td>{{ $buried->first_name }}</td>
            <td>{{ $buried->last_name }}</td>
            <td>{{ $buried->family_name }}</td>
            <td>{{ $buried->sector }}|{{ $buried->row }}|{{ $buried->number }}</td>
            <?php 
				if($buried->image == null || $buried->image=='')
				{
					$x = 200;
					$y = 25;
				}
				else
				{
					$x = 100;
					$y = 100;
				}
			?>
            <td><img src="{{ $buried->image }}" alt="Brak zdjęcia, grób numer {{ $buried->id }}" style="width:{{$x}}px;height:{{$y}}px;"></td>
			<?php $pos++ ?>
        </tr>
		@endforeach
    </table>

</p>

@stop
