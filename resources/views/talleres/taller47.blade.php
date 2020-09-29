@extends('layouts.nav')

@section('title', 'Taller 48')
@section('contenido')

<h1 class="text-center  mt-5 text-danger"> Taller #48</h1>
<h3 class="text-center mt-5 mb-3 text-info">DESARROLLE  EL  CRUCIGRAMA  REFERENTE  A  LAS  CLASES  DE  CHEQUES, 
CON  AGILIDAD.</h3>
	
	
  <div id="cruc" class="container" @keyup.escape="selected = undefined">
  <div class="table-container" style="display:none;" v-show="true">
   
    <div class="mensaje" v-if="mensaje !== undefined">
      <div class="content">@{{mensaje}}</div>
      <button @click="mensaje = undefined" class="btn btn-primary">OK</button>
    </div> 
    <table>
      <tr v-for="(row, y) in matrix" :key="y">
        <td v-for="(cell, x) in row" :class="{empty: cell.empty, start: !!cell.start, selected: cell.words.includes(selected)}" @click="selectWord(cell.start)">
          <label v-if="!!cell.start">@{{cell.start}}</label>
          @{{cell.words.some(i => completed[i]) ? cell.letter : ' '}}
        </td>
      </tr>
    </table>
    <div v-if="selected !== undefined" style="text-align: center;">
      <p class="pista" v-if="pista">
        @{{pista}}
      </p>
      <input v-model="answer" ref="input" @keyup.enter="corregir"/>
      <button @click="corregir" class="btn btn-primary">Colocar</button>
      <button @click="solucion" class="btn btn-danger">Pista</button>
    </div>
    <hr>
    <button class="btn btn-block btn-primary" @click="finalizar">Finalizar</button>
  </div>  
  <h3 v-show="false">Cargando....</h3>
</div>

@endsection