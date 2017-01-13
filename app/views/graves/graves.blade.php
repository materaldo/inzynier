@extends('layouts.default')

@section('header')
	
@stop

@section('content')

<p>
<h2>Dodaj grób</h2>

 <?php
          echo "<h4>$info</h4>";
      ?>

<form method="POST" action="{{{ URL::to('graves/add') }}}" accept-charset="UTF-8">
    
	<fieldset>
       
        <div class="form-group">
            <label for="place_select">Miejsce</label>
			{{ Form::select('place_select', $places, null, array('class' => 'form-control')) }}</div>
			
        </div>
       
	   <div class="form-group">
            <label for="type_select">Typ grobu</label>
			{{ Form::select('type_select', $types, null, array('class' => 'form-control')) }}
        </div>
        
		<div class="form-group">
            <label for="payment_date">Opłacone do (niewymagane)</label>
            <input class="form-control" placeholder="Data" type="date" name="payment_date" id="payment_date">
        </div>
        
		<div class="form-group">
            <label for="width">Szerokość grobu (cm)</label>
            <input class="form-control" placeholder="Szerokość w cm" type="number" name="width" id="width">
        </div>
		
		<div class="form-group">
            <label for="length">Długość grobu (cm)</label>
            <input class="form-control" placeholder="Długość w cm" type="number" name="length" id="length">
        </div>

		<h2>Dodaj dysponenta (niewymagane)</h2>
	
		<div class="form-group">
            <label for="second_name">Nazwisko</label>
            <input class="form-control" placeholder="Nazwisko" type="text" name="second_name" id="second_name">
        </div>
	
		<div class="form-group">
            <label for="first_name">Imię</label>
            <input class="form-control" placeholder="Imię" type="text" name="first_name" id="first_name">
        </div>
		
		<div class="form-group">
            <label for="phone_number">Numer telefonu</label>
            <input class="form-control" placeholder="Numer telefonu" type="number" name="phone_number" id="phone_number">
        </div>
		<div class="form-group">
            <label for="street">Ulica</label>
            <input class="form-control" placeholder="Ulica" type="text" name="street" id="street">
        </div>
		<div class="form-group">
            <label for="building">Numer domu</label>
            <input class="form-control" placeholder="Numer domu" type="text" name="building" id="building">
        </div>
		<div class="form-group">
            <label for="post_code">Kod pocztowy</label>
            <input class="form-control" placeholder="Kod pocztowy" type="text" name="post_code" id="post_code">
        </div>
		<div class="form-group">
            <label for="city">Miasto</label>
            <input class="form-control" placeholder="Miasto" type="text" name="city" id="city">
        </div>	
		
        <div class="form-actions form-group">
          <button type="submit" class="btn btn-primary">Dodaj</button>
        </div>

    </fieldset>
</form>

</p>



@stop
