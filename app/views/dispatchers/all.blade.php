@extends('layouts.default')

@section('header')
	
@stop

@section('content')

<p>

<h2>Wszyscy dysponenci na cmentarzu</h2>

		<?php
          echo "<h4 class=\"info\">$info</h4>";
		?>
		
		<div class="form-actions form-group">
			<a href="{{ URL::to('downloadDispatchers/xls') }}"><button class="btn btn-success">Eksportuj do xls</button></a>
			<a href="{{ URL::to('downloadDispatchers/xlsx') }}"><button class="btn btn-success">Eksportuj do xlsx</button></a>
			<a href="{{ URL::to('downloadDispatchers/csv') }}"><button class="btn btn-success">Eksportuj do CSV</button></a>
		</div>

<table class="table table-bordered" style="background-color: silver">
        <tr>
            <th>Lp.</th>
            <th>Imię <a href='/dispatchers/all?sort=first_name&order=desc'><span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span></a> 
			<a href='/dispatchers/all?sort=first_name&order=asc'><span class="glyphicon glyphicon-triangle-top" aria-hidden="true"></span></a></th>
            <th>Nazwisko <a href='/dispatchers/all?sort=last_name&order=desc'><span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span></a> 
			<a href='/dispatchers/all?sort=last_name&order=asc'><span class="glyphicon glyphicon-triangle-top" aria-hidden="true"></span></a></th>
            <th>Numer telefonu <a href='/dispatchers/all?sort=phone_number&order=desc'><span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span></a> 
			<a href='/dispatchers/all?sort=phone_number&order=asc'><span class="glyphicon glyphicon-triangle-top" aria-hidden="true"></span></a></th>
            <th>Miejscowość <a href='/dispatchers/all?sort=city&order=desc'><span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span></a> 
			<a href='/dispatchers/all?sort=city&order=asc'><span class="glyphicon glyphicon-triangle-top" aria-hidden="true"></span></a></th>
            <th>Kod pocztowy <a href='/dispatchers/all?sort=post_code&order=desc'><span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span></a> 
			<a href='/dispatchers/all?sort=post_code&order=asc'><span class="glyphicon glyphicon-triangle-top" aria-hidden="true"></span></a></th>
            <th>Ulica</th>
            <th>Numer domu</th>
        </tr>
<?php $pos=1 ?>
		@foreach($dispatchers as $dis)
        <tr>
            <td style="font-weight: bold; font-size: 120%">{{ HTML::link('/dispatchers/view/'.$dis->id, $pos) }}</a></td>
            <td>{{ $dis->first_name }}</td>
            <td>{{ $dis->last_name }}</td>
            <td>{{ $dis->phone_number }}</td>
            <td>{{ $dis->city }}</td>
            <td>{{ $dis->post_code }}</td>
            <td>{{ $dis->street }}</td>
            <td>{{ $dis->building }}</td>
			<?php $pos++ ?>
        </tr>
		@endforeach
    </table>

</p>

@stop
