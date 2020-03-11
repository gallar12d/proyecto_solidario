@extends('layouts.app')

@section('content')
<div class="container">
  <br />
  <div class="row justify-content-center">
    <div class="col-12 col-md-10 col-lg-8">
      <form autocomplete="off" class="card card-sm" method="get" action="{{url('/participante_search')}}">
        <div class="card-body row no-gutters align-items-center">
          <div class="col-auto">
            <i class="fas fa-search h4 text-body"></i>
          </div>
          <!--end of col-->
          <div class="col">
            <input name="identificacion" class="form-control form-control-lg form-control-borderless" type="number"
              placeholder="Buscar por número de identificación">
          </div>
          <!--end of col-->
          <div class="col-auto">
            <button  class="btn btn-lg btn-success" type="submit">Buscar</button>
          </div>
          <!--end of col-->
        </div>
      </form>
    </div>
    <!--end of col-->
  </div>
  <br />
  <div class="row justify-content-center">
    <div class="col-12 col-md-10 col-lg-8">
      <form autocomplete="off" class="card card-sm" method="get" action="{{url('/participante_search')}}">
        <div class="card-body row no-gutters align-items-center">
          <div class="col-auto">
            <i class="fas fa-search h4 text-body"></i>
          </div>
          <!--end of col-->
          <div class="col">
            <input id="nombres" name="nombres" class="form-control form-control-lg form-control-borderless" type="search"
              placeholder="Buscar por nombres">
          </div>
          <!--end of col-->
          <div class="col-auto">
            <button id = "search_name" data_url="{{url('/participante_search_name')}}" class="btn btn-lg btn-success" type="button">Buscar</button>
          </div>
          <!--end of col-->
        </div>
      </form>
    </div>
    <!--end of col-->
  </div>
</div>
<div class="modal" id="modal_busqueda" tabindex="-1" role="dialog">
  <div class="modal-dialog  modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Participantes encontrados</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        
      </div>
    </div>
  </div>
</div>
@if($participante)
<hr>


<div class="container">
  <div class="row ">
    <div class="col-md-12  mb-4">
      <h4 class="d-flex justify-content-between align-items-center mb-3">
        <span class="text-muted">Informacíon del participante</span>

      </h4>
      <div class="row">
        <ul class="list-group col-md-6 mb-3">
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
              <h6 class="my-0">Correo electrónico</h6>
              <small class="text-muted">{{$participante->email}}</small>
            </div>

          </li>

        </ul>
        <ul class="list-group col-md-6 mb-3">


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
              <input id="new_date" type="date" value="{{$participante->fecha_ingreso}}">
              <a id="editar_date" href="{{url('participante_update_date')}}">Modificar</a>
              <small class="text-muted">{{$participante->fecha_ingreso}}</small>
            </div>
          </li>
          <li class="list-group-item d-flex justify-content-between lh-condensed">
            <div>
              <h6 class="my-0">Fecha de pago</h6>
              <small class="text-muted">{{$participante->fecha_pago}}</small>
            </div>
          </li>
        </ul>

      </div>



      <form autocomplete="off" class="card p-2">
        <div class="input-group">
          <input data_url="{{url('/post_search_participante')}}" id="input_search" type="text" class="form-control"
            placeholder="Idenficación a referir">
          <div class="input-group-append">
            <button onclick="search(this)" type="button" class="btn btn-secondary">Buscar</button>
          </div>
        </div>
      </form>
    </div>

    <div class="col-md-12 order-md-2 mb-4">
      @php
      $mitad = 6;
      @endphp


      @if(isset($participante->padre_izq) || isset($participante->padre_der))

      @if(isset($participante->padre_izq))
      @php
      $padre = $participante->padre_izq;
      $float = 'float-right';
      @endphp
      @else
      @php
      $padre = $participante->padre_der;
      $float = 'float-left';
      @endphp
      @endif


      <div class="row justify-content-center">
        <div class="col-md-12 text-center ">
          <p>

            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample"
              aria-expanded="false" aria-controls="collapseExample">
              Padre
            </button>
          </p>
          <div class="collapse {{$float}}" id="collapseExample">

            <strong class=" ">{{$padre->name}}</strong>
            <br>
            <img style="width: 50px;" src="{{url('/img/user.png')}}" alt="">
            <br>

            <a href="/participante_search?identificacion={{$padre->identificacion}}"><span
                class="">{{$padre->identificacion}}</span></a>


          </div>

        </div>
      </div>
      @endif




      <div class="row  justify-content-center">

        <div class="col-md-12 text-center">
          <strong class=" ">{{$participante->name}}</strong>
          <br>
          <img style="width: 50px;" src="{{url('/img/user.png')}}" alt="">
          <br>
          <span class="">{{$participante->identificacion}}</span>

        </div>

      </div>

      <div class="row  justify-content-center">
        <div class="col-md-6 text-center">
          @if(isset($participante->izq))
          <strong class=" ">{{$participante->izq->name}}</strong>
          <br>
          <img style="width: 50px;" src="{{url('/img/user.png')}}" alt="">
          <br>
          <a href="/participante_search?identificacion={{$participante->izq->identificacion}}"><span
              class="">{{$participante->izq->identificacion}}</span></a>


          @else
          <strong class=" ">Libre</strong>
          <br>
          <img style="width: 50px;" src="{{url('/img/user.png')}}" alt="">
          <br>
          <span class=""># identificacion libre</span>
          @endif

        </div>
        <div class="col-md-6 text-center">

          @if(isset($participante->der))
          <strong class=" ">{{$participante->der->name}}</strong>
          <br>
          <img style="width: 50px;" src="{{url('/img/user.png')}}" alt="">
          <br>
          <a href="/participante_search?identificacion={{$participante->der->identificacion}}"><span
              class="">{{$participante->der->identificacion}}</span></a>



          @else
          <strong class=" ">Libre</strong>
          <br>
          <img style="width: 50px;" src="{{url('/img/user.png')}}" alt="">
          <br>
          <span class=""># identificacion libre</span>
          @endif
        </div>
      </div>

      <div class="row  justify-content-center">
        <div class="col-md-3 text-center">
          @php
          if(isset($participante->izq))
          $participante_izq = $participante->izq;
          else
          $participante_izq = '';

          if(isset($participante->der))
          $participante_der = $participante->der;
          else
          $participante_der = '';


          $participante = $participante_izq;
          @endphp
          @if(isset($participante->izq))
          @php
          $p1 = $participante->izq;

          @endphp
          <strong class=" ">{{$participante->izq->name}}</strong>
          <br>
          <img style="width: 50px;" src="{{url('/img/user.png')}}" alt="">
          <br>
          <a href="/participante_search?identificacion={{$participante->izq->identificacion}}"><span
              class="">{{$participante->izq->identificacion}}</span></a>


          @else
          @php
          $p1 = '';

          @endphp
          <strong class=" ">Libre</strong>
          <br>
          <img style="width: 50px;" src="{{url('/img/user.png')}}" alt="">
          <br>
          <span class=""># identificacion libre</span>
          @endif

        </div>
        <div class="col-md-3 text-center">

          @if(isset($participante->der))
          @php
          $p2 = $participante->der;

          @endphp
          <strong class=" ">{{$participante->der->name}}</strong>
          <br>
          <img style="width: 50px;" src="{{url('/img/user.png')}}" alt="">
          <br>
          <a href="/participante_search?identificacion={{$participante->der->identificacion}}"><span
              class="">{{$participante->der->identificacion}}</span></a>


          @else
          @php
          $p2 = '';

          @endphp
          <strong class=" ">Libre</strong>
          <br>
          <img style="width: 50px;" src="{{url('/img/user.png')}}" alt="">
          <br>
          <span class=""># identificacion libre</span>
          @endif
        </div>
        @php
        $participante = $participante_der;
        @endphp
        <div class="col-md-3 text-center">
          @if(isset($participante->izq))
          @php
          $p3 = $participante->izq;

          @endphp
          <strong class=" ">{{$participante->izq->name}}</strong>
          <br>
          <img style="width: 50px;" src="{{url('/img/user.png')}}" alt="">
          <br>
          <a href="/participante_search?identificacion={{$participante->izq->identificacion}}"><span
              class="">{{$participante->izq->identificacion}}</span></a>


          @else
          @php
          $p3 = '';

          @endphp
          <strong class=" ">Libre</strong>
          <br>
          <img style="width: 50px;" src="{{url('/img/user.png')}}" alt="">
          <br>
          <span class=""># identificacion libre</span>
          @endif

        </div>
        <div class="col-md-3 text-center">

          @if(isset($participante->der))
          @php
          $p4 = $participante->der;

          @endphp
          <strong class=" ">{{$participante->der->name}}</strong>
          <br>
          <img style="width: 50px;" src="{{url('/img/user.png')}}" alt="">
          <br>
          <a href="/participante_search?identificacion={{$participante->der->identificacion}}"><span
              class="">{{$participante->der->identificacion}}</span></a>


          @else
          @php
          $p4 = '';

          @endphp
          <strong class=" ">Libre</strong>
          <br>
          <img style="width: 50px;" src="{{url('/img/user.png')}}" alt="">
          <br>
          <span class=""># identificacion libre</span>
          @endif
        </div>



        <div class="row espacio">

          @php
          $participante = $p1;
          @endphp
          <div class="col-md-2 text-center">


            @if(isset($participante->izq))
            <strong class=" ">{{$participante->izq->name}}</strong>
            <br>
            <img style="width: 50px;"
              src="https://toppng.com/uploads/preview/user-font-awesome-nuevo-usuario-icono-11563566658mjtfvilgcs.png"
              alt="">
            <br>
            <a href="/participante_search?identificacion={{$participante->izq->identificacion}}"><span
                class="">{{$participante->izq->identificacion}}</span></a>


            @else
            <strong class=" ">Libre</strong>
            <br>
            <img style="width: 50px;"
              src="https://toppng.com/uploads/preview/user-font-awesome-nuevo-usuario-icono-11563566658mjtfvilgcs.png"
              alt="">
            <br>
            <span class=""># identificacion libre</span>
            @endif
          </div>
          <div class="col-md-2 text-center">

            @if(isset($participante->der))
            <strong class=" ">{{$participante->der->name}}</strong>
            <br>
            <img style="width: 50px;"
              src="https://toppng.com/uploads/preview/user-font-awesome-nuevo-usuario-icono-11563566658mjtfvilgcs.png"
              alt="">
            <br>
            <a href="/participante_search?identificacion={{$participante->der->identificacion}}"><span
                class="">{{$participante->der->identificacion}}</span></a>


            @else
            <strong class=" ">Libre</strong>
            <br>
            <img style="width: 50px;"
              src="https://toppng.com/uploads/preview/user-font-awesome-nuevo-usuario-icono-11563566658mjtfvilgcs.png"
              alt="">
            <br>
            <span class=""># identificacion libre</span>
            @endif
          </div>

          <!-- participante 2 -->

          @php
          $participante = $p2;
          @endphp
          <div class="col-md-2 text-center">


            @if(isset($participante->izq))
            <strong class=" ">{{$participante->izq->name}}</strong>
            <br>
            <img style="width: 50px;"
              src="https://toppng.com/uploads/preview/user-font-awesome-nuevo-usuario-icono-11563566658mjtfvilgcs.png"
              alt="">
            <br>
            <a href="/participante_search?identificacion={{$participante->izq->identificacion}}"><span
                class="">{{$participante->izq->identificacion}}</span></a>


            @else
            <strong class=" ">Libre</strong>
            <br>
            <img style="width: 50px;"
              src="https://toppng.com/uploads/preview/user-font-awesome-nuevo-usuario-icono-11563566658mjtfvilgcs.png"
              alt="">
            <br>
            <span class=""># identificacion libre</span>
            @endif
          </div>
          <div class="col-md-2 text-center">

            @if(isset($participante->der))
            <strong class=" ">{{$participante->der->name}}</strong>
            <br>
            <img style="width: 50px;"
              src="https://toppng.com/uploads/preview/user-font-awesome-nuevo-usuario-icono-11563566658mjtfvilgcs.png"
              alt="">
            <br>
            <a href="/participante_search?identificacion={{$participante->der->identificacion}}"><span
                class="">{{$participante->der->identificacion}}</span></a>


            @else
            <strong class=" ">Libre</strong>
            <br>
            <img style="width: 50px;"
              src="https://toppng.com/uploads/preview/user-font-awesome-nuevo-usuario-icono-11563566658mjtfvilgcs.png"
              alt="">
            <br>
            <span class=""># identificacion libre</span>
            @endif
          </div>

          <!-- participante 3 -->
          @php
          $participante = $p3;
          @endphp
          <div class="col-md-2 text-center">


            @if(isset($participante->izq))
            <strong class=" ">{{$participante->izq->name}}</strong>
            <br>
            <img style="width: 50px;"
              src="https://toppng.com/uploads/preview/user-font-awesome-nuevo-usuario-icono-11563566658mjtfvilgcs.png"
              alt="">
            <br>
            <a href="/participante_search?identificacion={{$participante->izq->identificacion}}"><span
                class="">{{$participante->izq->identificacion}}</span></a>


            @else
            <strong class=" ">Libre</strong>
            <br>
            <img style="width: 50px;"
              src="https://toppng.com/uploads/preview/user-font-awesome-nuevo-usuario-icono-11563566658mjtfvilgcs.png"
              alt="">
            <br>
            <span class=""># identificacion libre</span>
            @endif
          </div>
          <div class="col-md-2 text-center">

            @if(isset($participante->der))
            <strong class=" ">{{$participante->der->name}}</strong>
            <br>
            <img style="width: 50px;"
              src="https://toppng.com/uploads/preview/user-font-awesome-nuevo-usuario-icono-11563566658mjtfvilgcs.png"
              alt="">
            <br>
            <a href="/participante_search?identificacion={{$participante->der->identificacion}}"><span
                class="">{{$participante->der->identificacion}}</span></a>


            @else
            <strong class=" ">Libre</strong>
            <br>
            <img style="width: 50px;"
              src="https://toppng.com/uploads/preview/user-font-awesome-nuevo-usuario-icono-11563566658mjtfvilgcs.png"
              alt="">
            <br>
            <span class=""># identificacion libre</span>
            @endif
          </div>
          <!-- participante 4 -->
          @php
          $participante = $p4;
          @endphp
          <div class="col-md-2 text-center">


            @if(isset($participante->izq))
            <strong class=" ">{{$participante->izq->name}}</strong>
            <br>
            <img style="width: 50px;"
              src="https://toppng.com/uploads/preview/user-font-awesome-nuevo-usuario-icono-11563566658mjtfvilgcs.png"
              alt="">
            <br>
            <a href="/participante_search?identificacion={{$participante->izq->identificacion}}"><span
                class="">{{$participante->izq->identificacion}}</span></a>


            @else
            <strong class=" ">Libre</strong>
            <br>
            <img style="width: 50px;"
              src="https://toppng.com/uploads/preview/user-font-awesome-nuevo-usuario-icono-11563566658mjtfvilgcs.png"
              alt="">
            <br>
            <span class=""># identificacion libre</span>
            @endif
          </div>
          <div class="col-md-2 text-center">

            @if(isset($participante->der))
            <strong class=" ">{{$participante->der->name}}</strong>
            <br>
            <img style="width: 50px;"
              src="https://toppng.com/uploads/preview/user-font-awesome-nuevo-usuario-icono-11563566658mjtfvilgcs.png"
              alt="">
            <br>
            <a href="/participante_search?identificacion={{$participante->der->identificacion}}"><span
                class="">{{$participante->der->identificacion}}</span></a>


            @else
            <strong class=" ">Libre</strong>
            <br>
            <img style="width: 50px;"
              src="https://toppng.com/uploads/preview/user-font-awesome-nuevo-usuario-icono-11563566658mjtfvilgcs.png"
              alt="">
            <br>
            <span class=""># identificacion libre</span>
            @endif
          </div>

        </div>



      </div>



    </div>
  </div>
</div>
<div data_url_referir="{{url('post_referir_participante')}}" id="modal_referir" class="modal" tabindex="-1"
  role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">INFORMACIÓN DEL PARTICIPANTE</h5>
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
            <button onclick="referir(1)" type="button" class="btn btn-md btn-block btn-outline-primary">Referir por
              izquierda</button>
          </div>
          <div class="col-md-6 col-sm-6">
            <button onclick="referir(2)" type="button" class="btn btn-md btn-block btn-outline-primary">Referir por
              derecha</button>
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

  function referir(lado) {

    if (!confirm('Está seguro que desea relizar esta acción?'))
      return false

    //1 isq
    //2 derec
    let old_participante = $('#id_participante').val();
    let new_participante = $('#participante_nombre').attr('data_id')
    let url = $('#modal_referir').attr('data_url_referir');


    $.post(url, { "_token": "{{ csrf_token() }}", 'id_old': old_participante, 'id_new': new_participante, 'lado': lado }).done(function (data) {
      if (data.code == 202) {
        alert('Se ha referido existosamente');
        location.reload();

      }
    })

  }


  function search(e) {

    let identificacion = $('#input_search').val();
    let old_identificacion = $('#identificacion_participante').text();
    if (identificacion == old_identificacion) {
      alert('No se puede referir a este mismo participante');
      return false;
    }
    if (!identificacion) {
      alert('No ha ingresado un número de identificación');
      return false;
    }

    let url = $('#input_search').attr('data_url');
    $.get(url, { 'identificacion': identificacion }).done(function (data) {
      console.log(data)
      if (data.code == 202) {
        //abrir modal
        $('#participante_nombre').text(data.participante.name + ' ' + data.participante.identificacion)
        $('#participante_nombre').attr('data_id', data.participante.id)
        $('#modal_referir').modal({ backdrop: 'static', keyboard: false })
        $('#modal_referir').modal('show');


      }
      else
        alert('No se ha encontrado a un participante con este número de identificación')
    })
  }


  $(document).ready(function () {

    $('#editar_date').on('click', function (e) {
      e.preventDefault();
      var url = $(this).attr('href');
      var id = $('#id_participante').val();
      var fecha = $('#new_date').val();

      $.post(url, { "_token": "{{ csrf_token() }}", 'fecha_ingreso': fecha, 'id': id }).done(function () {
        location.reload();
      })

    })
    $('#search_name').on('click', function (e) {
      e.preventDefault();
      var url = $(this).attr('data_url');
      var valor = $('#nombres').val();

      $.get(url, { "_token": "{{ csrf_token() }}", 'valor': valor }).done(function (data) {
        
        //location.reload();
        if(data.participantes.length){
          text = '<div class="row">'
          $.each(data.participantes, function(k,v){
            text = text + '<div class="col-md-6">' + v.name + '->'+v.identificacion+'</div>';
            text = text + '<div class="col-md-6"><a href="/participante_search?identificacion='+v.identificacion+'">Mostrar</a></div>';

          })
          console.log(text)

          $('#modal_busqueda .modal-body').html(text);
          $('#modal_busqueda').modal('show')
        }
      })

    })

    

  })
</script>
@endpush