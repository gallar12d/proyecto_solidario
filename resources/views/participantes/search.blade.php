@extends('layouts.app')

@section('content')
<div class="container">
  <br />
  <div class="row justify-content-center">
    <div class="col-12 col-md-10 col-lg-8">
      <form class="card card-sm" method="get" action="{{url('/participante_search')}}">
        <div class="card-body row no-gutters align-items-center">
          <div class="col-auto">
            <i class="fas fa-search h4 text-body"></i>
          </div>
          <!--end of col-->
          <div class="col">
            <input name="identificacion" class="form-control form-control-lg form-control-borderless" type="search"
              placeholder="Ingrese número de identificacion">
          </div>
          <!--end of col-->
          <div class="col-auto">
            <button class="btn btn-lg btn-success" type="submit">Buscar</button>
          </div>
          <!--end of col-->
        </div>
      </form>
    </div>
    <!--end of col-->
  </div>
</div>

@if($participante)
<hr>


<div class="container">
  <div class="row justify-content-left">
    <div class="col-md-4 order-md-2 mb-4">
      <h4 class="d-flex justify-content-between align-items-center mb-3">
        <span class="text-muted">Informacíon de Participante</span>
        
      </h4>
      <ul class="list-group mb-3">
        <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div>
            <h6 class="my-0">Nombre</h6>
            <small class="text-muted">{{$participante->name}}</small>
          </div>
          
        </li>
        <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div>
            <h6 class="my-0">Número de identificación</h6>
            <small class="text-muted">{{$participante->identificacion}}</small>
          </div>
          
        </li>
        <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div>
            <h6 class="my-0">Telefono 1</h6>
            <small class="text-muted">{{$participante->telefono1}}</small>
          </div>
          
        </li>
        <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div>
            <h6 class="my-0">Telefono 2</h6>
            <small class="text-muted">{{$participante->telefono2}}</small>
          </div>         
        </li>
        <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div>
            <h6 class="my-0">Dirección</h6>
            <small class="text-muted">{{$participante->direccion}}</small>
          </div>         
        </li>
        <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div>
            <h6 class="my-0">Fecha de creación</h6>
            <small class="text-muted">{{$participante->created_at}}</small>
          </div>         
        </li>
      </ul>

      <form class="card p-2">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Idenficación a referir">
          <div class="input-group-append">
            <button type="submit" class="btn btn-secondary">Buscar</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<div  id="modal_referir" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Modal body text goes here.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@else
<hr>
<div class="row justify-content-center">
  <div class="col col-md-6 jr">
    <h3>No se ha encontrado un participante con ese número de identificación</h3>
  </div>
</div>

@endif
@endsection
@push('scripts')
    <script>
      try {
    window.$ = window.jQuery = require('jquery');
} catch (e) {}

      $(document).ready(function(){
        alert('Entra javascripot')
      })
    </script>
@endpush

