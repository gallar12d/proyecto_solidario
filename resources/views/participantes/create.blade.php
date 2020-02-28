@extends('layouts.app')

@section('content')

<div class="container">
      <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
        <h2>proyecto solidario</h2>
        <p class="lead">description</p>
      </div>

      <div class="row">
        
        <div class="col-md-10 order-md-1">
          <h4 class="mb-3">Formulario de creación de participantes</h4>
          <form  method ="post" action = "{{url('participante_crear')}}" class="needs-validation" >
            @csrf
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">Nombres completos (obligatorio)</label>
                <input  name ="name" type="text" class="form-control" id="firstName" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Valid first name is required.
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="firstName">Número de identificación (obligatorio)</label>
                <input  name ="identificacion" type="text" class="form-control" id="identificacion" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Valid first name is required.
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="firstName">Correo electrónico</label>
                <input  name ="email" type="text" class="form-control" id="email" placeholder="" value="" >
                <div class="invalid-feedback">
                  Valid first name is required.
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="firstName">Dirección (obligatorio)</label>
                <input  name ="direccion" type="text" class="form-control" id="direccion" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Valid first name is required.
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="firstName">Teléfono 1 (obligatorio)</label>
                <input  name ="telefono1" type="text" class="form-control" id="telefono1" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Valid first name is required.
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="firstName">Teléfono 2</label>
                <input  name ="telefono2" type="text" class="form-control" id="telefono2" placeholder="" value="" >
                <div class="invalid-feedback">
                  Valid first name is required.
                </div>
              </div>

            </div>

            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit">Crear participante</button>
          </form>
        </div>
      </div>

      <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">© 2020 proyecto solidario</p>
       
      </footer>
    </div>
@endsection