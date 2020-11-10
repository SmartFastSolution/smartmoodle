@extends('layouts.nav')
@section('css')

<link rel="stylesheet" href="{{ asset('css/crucigrama.css') }}">
@endsection
@section('title', 'Taller 48')
@section('content')

<h1 class="text-center  mt-5 text-danger"> Taller #48</h1>
<h3 class="text-center mt-5 mb-3 text-info">DESARROLLE  EL  CRUCIGRAMA  REFERENTE  A  LAS  CLASES  DE  CHEQUES, 
CON  AGILIDAD.</h3>
	
	
 <div id="puzzle_container">
    <table id="puzzle">
    </table>
</div>

<div id="hints_container">
    <h3>Vertical</h3>
        <div id="vertical_hints_container"></div>
    <h3>Horizontal</h3>
        <div id="horizontal_hints_container"></div>
</div>

<div id="buttons_container">
    <button id="clear_all">Clear All</button>
    <button id="check">Check</button>
    <button id="solve">Solve</button>
    <button id="clue">Clue</button>
</div>
@section('js')
<script type="text/javascript" src="{{ asset('js/crucigrama.js') }}"></script>
@endsection
@endsection

