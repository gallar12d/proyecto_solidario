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
              placeholder="Ingrese número de identificación">
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
  <div class="row justify-content-center">
    <div class="col-md-3 order-md-2 mb-4">
      <h4 class="d-flex justify-content-between align-items-center mb-3">
        <span class="text-muted">Informacíon del participante</span>
        
      </h4>
      <ul class="list-group mb-3">
        <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div>
            <h6 class="my-0">Nombre</h6>
            <small class="text-muted">{{$participante->name}}</small>
            <input type="hidden" value="{{$participante->id}}" id="id_participante">
          </div>
          
        </li>
        <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div>
            <h6 class="my-0">Número de identificación</h6>
            <small id="identificacion_participante" class="text-muted">{{$participante->identificacion}}</small>
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
          <input data_url = "{{url('/post_search_participante')}}" id="input_search" type="text" class="form-control" placeholder="Idenficación a referir">
          <div class="input-group-append">
            <button onclick ="search(this)" type="button" class="btn btn-secondary">Buscar</button>
          </div>
        </div>
      </form>
    </div>
    <div class="col-md-9 order-md-2 mb-4">
      @php
      $mitad = 6;
      @endphp

      @for ($i = 1; $i <= 3; $i++)
        
    

        
        
          <div class="row  justify-content-around">
            <div class="col-md-{{$mitad}}  justify-content-between align-items-center">
              @if($participante->izq)
              <strong class=" float-right d-flex justify-content-between align-items-center">{{$participante->izq->name}}</strong>
              <br>
              <span class="float-right">{{$participante->izq->identificacion}}</span>            

              @else
              <strong>Libre</strong>
              <span></span>
              @endif
                
            </div>
            <div class="col-md-{{$mitad}} ">

              @if($participante->der)
              <strong class="float-left">{{$participante->der->name}}</strong>
              <br>
              <span class="float-left">{{$participante->der->identificacion}}</span>            

              @else
              <strong >Libre</strong>
              <span></span>
              @endif
                
            </div>

            
          </div>
        
          @php
          $mitad = $mitad / 2;
          @endphp
      @endfor

    </div>
  </div>
</div>
<div data_url_referir ="{{url('post_referir_participante')}}"  id="modal_referir" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5  class="modal-title">INFORMACIÓN DEL PARTICIPANTE</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <strong data_id="" id="participante_nombre"></strong>
      </div>
      <div style="display: table !important;" class="modal-footer">
        <div class="row">
          <div class="col-md-6 col-sm-6">
            <button onclick="referir(1)" type="button" class="btn btn-md btn-block btn-outline-primary">Referir por izquierda</button>
          </div>
          <div class="col-md-6 col-sm-6">
            <button onclick="referir(2)" type="button" class="btn btn-md btn-block btn-outline-primary">Referir por derecha</button>
          </div>

        </div>
       
       
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
    <script defer>

      function referir(lado){

      if(!confirm('Está seguro que desea relizar esta acción?'))
      return false
      
      //1 isq
      //2 derec
      let old_participante = $('#id_participante').val();
      let new_participante = $('#participante_nombre').attr('data_id')
      let url = $('#modal_referir').attr('data_url_referir'); 
      

      $.post(url, {"_token": "{{ csrf_token() }}", 'id_old': old_participante, 'id_new': new_participante, 'lado': lado }).done(function(data){
        if(data.code == 202 ){
          alert('Se ha referido existosamente');
          location.reload();

        }
      })

      }


      function search(e){
        
        let identificacion = $('#input_search').val();
        let old_identificacion = $('#identificacion_participante').text();
        if(identificacion == old_identificacion){
          alert('No se puede referir a este mismo participante');
          return false;
        }
        if(!identificacion)
        {
          alert('No ha ingresado un número de identificación');
          return false;
        }

        let url = $('#input_search').attr('data_url');
        $.get(url, {'identificacion': identificacion}).done(function(data){
          console.log(data)
          if(data.code == 202){
            //abrir modal
            $('#participante_nombre').text(data.participante.name + ' '+data.participante.identificacion)
            $('#participante_nombre').attr('data_id', data.participante.id)
            $('#modal_referir').modal({backdrop: 'static', keyboard: false})  
            $('#modal_referir').modal('show');


          }
          else
          alert('No se ha encontrado a un participante con este número de identificación')
        })
      }
  

      $(document).ready(function(){
        
      })
    </script>
@endpush

