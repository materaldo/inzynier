@extends('layouts.default')

@section('header')
	
@stop

@section('content')

<p>
<h2>Dane</h2>

	<fieldset>

        <div class="form-actions form-group">
          <button type="button" class="btn">{{ HTML::link('/places/all?sort', 'Wyświetl wszystkie miejsca') }}</button>
        </div>

    </fieldset>

	<fieldset>

        <div class="form-actions form-group">
          <button type="button" class="btn">{{ HTML::link('/graves/all?sort', 'Wyświetl wszystkie groby') }}</button>
        </div>

    </fieldset>
	
	<fieldset>

        <div class="form-actions form-group">
          <button type="button" class="btn">{{ HTML::link('/buried/all?sort', 'Wyświetl wszystkich pochowanych') }}</button>
        </div>

    </fieldset>

	<fieldset>

        <div class="form-actions form-group">
          <button type="button" class="btn">{{ HTML::link('/dispatchers/all?sort', 'Wyświetl wszystkich dysponentów') }}</button>
        </div>

    </fieldset>
	
	<fieldset>

        <div class="form-actions form-group">
          <button type="button" class="btn">{{ HTML::link('/import', 'Import danych') }}</button>
        </div>

    </fieldset>
	
	


</p>

@stop