@extends('layouts.default')

@section('header')
	
@stop

@section('content')

<p>
<div class="alert alert-danger">
    <strong>Błąd strony,</strong>coś poszło nie tak.
</div>

<button type="button" class="btn">{{ HTML::link('/', 'Wróć do strony głównej') }}</button>


</p>

@stop