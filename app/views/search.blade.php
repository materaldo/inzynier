@extends('layouts.default')

@section('header')
	
@stop

@section('content')

<p>
<h2>Wyniki wyszukiwania</h2>
<!--
{{ print_r($data);
	print('xd');

}}
-->
    <table class="table table-bordered" style="background-color: silver">
        <tr>
            <th>Lp.</th>
            <th>Imię</th>
            <th>Nazwisko</th>
			<th>Nazwisko rodowe</th>
            <th>Data urodzenia</th>
			<th>Data śmierci</th>
			<th>Data pochowania</th>
			<th>Sektor</th>
			<th>Rząd</th>
			<th>Numer</th>
        </tr>
		<?php $pos=1 ?>
		@foreach($data as $dat)
        <tr>
			<td style="font-weight: bold; font-size: 120%">{{ HTML::link('/buried/view/'.$dat->id, $pos) }}</a></td>
			<td>{{ $dat->first_name }}</td>
            <td>{{ $dat->last_name }}</td>
			<td>{{ $dat->family_name }}</td>
            <td>{{ $dat->date_of_birth }}</td>
			<td>{{ $dat->date_of_death }}</td>
            <td>{{ $dat->date_of_burial }}</td>
			<td>{{ $dat->sector }}</td>
			<td>{{ $dat->row }}</td>
            <td>{{ $dat->number }}</td>
			<?php $pos++ ?>
        </tr>
		@endforeach
    </table>
    

</p>

@stop