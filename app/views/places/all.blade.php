@extends('layouts.default')

@section('header')
	
@stop

@section('content')

<p>

<h2>Wszystkie miejsca na cmentarzu</h2>

		<?php
          echo "<h4 class=\"info\">$info</h4>";
		?>
		
		<div class="form-actions form-group">
			<a href="{{ URL::to('downloadPlaces/xls') }}"><button class="btn btn-success">Eksportuj do xls</button></a>
			<a href="{{ URL::to('downloadPlaces/xlsx') }}"><button class="btn btn-success">Eksportuj do xlsx</button></a>
			<a href="{{ URL::to('downloadPlaces/csv') }}"><button class="btn btn-success">Eksportuj do CSV</button></a>
		</div>

<table class="table table-bordered" style="background-color: silver">
        <tr>
            <th>Lp.</th>
            <th>Sektor <a href='/places/all?sort=sector&order=desc'><span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span></a> 
			<a href='/places/all?sort=sector&order=asc'><span class="glyphicon glyphicon-triangle-top" aria-hidden="true"></span></a></th>
			<th>Rząd <a href='/places/all?sort=row&order=desc'><span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span></a> 
			<a href='/places/all?sort=row&order=asc'><span class="glyphicon glyphicon-triangle-top" aria-hidden="true"></span></a></th>
            <th>Numer <a href='/places/all?sort=number&order=desc'><span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span></a> 
			<a href='/places/all?sort=number&order=asc'><span class="glyphicon glyphicon-triangle-top" aria-hidden="true"></span></a></th>
            <th>Współrzędna x <a href='/places/all?sort=x&order=desc'><span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span></a> 
			<a href='/places/all?sort=x&order=asc'><span class="glyphicon glyphicon-triangle-top" aria-hidden="true"></span></a></th>
			<th>Współrzędna y <a href='/places/all?sort=y&order=desc'><span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span></a> 
			<a href='/places/all?sort=y&order=asc'><span class="glyphicon glyphicon-triangle-top" aria-hidden="true"></span></a></th>
            <th>Szerokość miejsca <a href='/places/all?sort=width&order=desc'><span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span></a> 
			<a href='/places/all?sort=width&order=asc'><span class="glyphicon glyphicon-triangle-top" aria-hidden="true"></span></a></th>
			<th>Długość miejsca <a href='/places/all?sort=length&order=desc'><span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span></a> 
			<a href='/places/all?sort=length&order=asc'><span class="glyphicon glyphicon-triangle-top" aria-hidden="true"></span></a></th>
			<th>Status <a href='/places/all?sort=status&order=desc'><span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span></a> 
			<a href='/places/all?sort=status&order=asc'><span class="glyphicon glyphicon-triangle-top" aria-hidden="true"></span></a></th>
		</tr>
		<?php $pos=1 ?>
		@foreach($places as $place)
        <tr>
            <td style="font-weight: bold; font-size: 120%">{{ HTML::link('/places/view/'.$place->id, $pos) }}</a></td>
            <td>{{ $place->sector }}</td>
            <td>{{ $place->row }}</td>
            <td>{{ $place->number }}</td>
            <td>{{ $place->x }}</td>
            <td>{{ $place->y }}</td>
            <td>{{ $place->width }}</td>
            <td>{{ $place->length }}</td>
			<?php if($place->status==false)
					{
						$if = 'wolne';
					}
					else
						$if = 'zajęte'; ?>
            <td>{{ $if }}</td>
			<?php $pos++ ?>
        </tr>
		@endforeach
    </table>

</p>

@stop
