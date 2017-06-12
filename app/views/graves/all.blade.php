@extends('layouts.default')

@section('header')
	
@stop

@section('content')

<p>

<h2>Wszystkie groby na cmentarzu</h2>

		<?php
          echo "<h4 class=\"info\">$info</h4>";
		?>
		
		<div class="form-actions form-group">
			<a href="{{ URL::to('downloadGraves/xls') }}"><button class="btn btn-success">Eksportuj do xls</button></a>
			<a href="{{ URL::to('downloadGraves/xlsx') }}"><button class="btn btn-success">Eksportuj do xlsx</button></a>
			<a href="{{ URL::to('downloadGraves/csv') }}"><button class="btn btn-success">Eksportuj do CSV</button></a>
		</div>

<table class="table table-bordered" style="background-color: silver">
        <tr>
            <th>Lp.</th>
			<th>Sektor <a href='/graves/all?sort=sector&order=desc'><span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span></a> 
			<a href='/graves/all?sort=sector&order=asc'><span class="glyphicon glyphicon-triangle-top" aria-hidden="true"></span></a></th>
			<th>Rząd <a href='/graves/all?sort=row&order=desc'><span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span></a> 
			<a href='/graves/all?sort=row&order=asc'><span class="glyphicon glyphicon-triangle-top" aria-hidden="true"></span></a></th>
            <th>Numer <a href='/graves/all?sort=number&order=desc'><span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span></a> 
			<a href='/graves/all?sort=number&order=asc'><span class="glyphicon glyphicon-triangle-top" aria-hidden="true"></span></a></th>
            <th>Szerokość (cm)</th>
            <th>Długość (cm)</th>
			<th>Typ grobu <a href='/graves/all?sort=type&order=desc'><span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span></a> 
			<a href='/graves/all?sort=type&order=asc'><span class="glyphicon glyphicon-triangle-top" aria-hidden="true"></span></a></th>
            <th>Zdjęcie</th>
        </tr>
		<?php $pos=1 ?>
		@foreach($gravesArr as $grave)
        <tr>
            <td style="font-weight: bold; font-size: 120%">{{ HTML::link('/graves/view/'.$grave->id, $pos) }}</a></td>
            <td>{{ $grave->sector }}</td>
            <td>{{ $grave->row }}</td>
            <td>{{ $grave->number }}</td>
			<td>{{ $grave->width }}</td>
			<td>{{ $grave->length }}</td>
            <td>{{ $grave->type }}</td>
			<?php 
				if($grave->image == null || $grave->image=='')
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
            <td><img src="{{ $grave->image }}" alt="Brak zdjęcia grobu {{ $grave->sector.'|'.$grave->row.'|'.$grave->number }}" 
			         style="width:{{$x}}px;height:{{$y}}px;">
			</td>
			<?php $pos++ ?>
		</tr>
		@endforeach
		
    </table>

</p>

@stop
