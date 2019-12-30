@extends('bett0')

@section('ingrediente') style='background-color:white; color:balck; '  @endsection
@section('titulo') Tesoreria, Tipos de Boletas @endsection


@section('titulo') Menu @endsection
@section('direccion') <a href="{{asset('/index.php/Ingrediente')}}"> <i class="fa fa-fw fa-shopping-basket"></i><span class="nav-link-text">Ingrediente</span> </a> @endsection

@section('modal1')
<div id="modalAgregar" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content panel panel-primary">

      <div class="modal-header panel-heading">
        <b>Insertar</b>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <div class="modal-body panel-body">
        {!! Form::open(['accept-charset'=>'UTF-8', 'enctype'=>'multipart/form-data', 'method'=>'POST', 'files'=>true, 'autocomplete'=>'off', 'id'=>'form-insert'] ) !!}
        <div class="form-group">
          <label for="id_menu_" >Menu</label>
          {!! Form::select('id_menu', \App\Menu::pluck('menu', 'id'), null, ['class'=>'form-control', 'placeholder'=>' ', 'id'=>'id_menu_', 'required']) !!}
        </div>
        <div class="form-group">
          <label for="ingrediente_" >Ingrediente</label>
          {!! Form::text('ingrediente', null, ['class'=>'form-control', 'placeholder'=>'Ingrediente', 'id'=>'ingrediente_', 'required']) !!}
        </div>
        <div class="form-group">
          <label for="cantidad_personas_" >Personas</label>
          {!! Form::number('cantidad_personas', null, ['class'=>'form-control', 'placeholder'=>'Personas', 'id'=>'cantidad_personas_', 'required']) !!}
        </div>
        <div class="form-group">
          <label for="cantidad_ingrediente_" >Cantidad</label>
          {!! Form::number('cantidad_ingrediente', null, ['class'=>'form-control', 'placeholder'=>'Cantidad', 'id'=>'cantidad_ingrediente_', 'required']) !!}
        </div>
        <div class="form-group">
          <label for="unidad_" >Unidad</label>
          {!! Form::text('unidad', null, ['class'=>'form-control', 'placeholder'=>'Unidad', 'id'=>'unidad_', 'list'=>'lista-unidad', 'required']) !!}
          <datalist id="lista-unidad">
            <option value="Kg.">
            <option value="Gr.">
            <option value="Litro">
          </datalist>
        </div>
        {!! Form::hidden('id_usuario', '1') !!}
        {!! Form::submit('A&ntilde;adir', ['class'=>'agregar btn btn-primary']) !!}
        {!! Form::close() !!}
      </div>

    </div>
  </div>
</div>
@endsection

@section('modal2')
    <div id="modalModifiar" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content panel panel-warning">
                <div class="modal-header panel-heading">
                    <b>Actualizar</b>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body panel-body">
                    {!! Form::open(['route'=>['Ingrediente.update', ':DATO_ID'], 'method'=>'PATCH', 'id'=>'form-update' ])!!}

                    <div class="form-group">
                      <label for="id_menu" >Menu</label>
                      {!! Form::select('id_menu', \App\Menu::pluck('menu', 'id'), null, ['class'=>'form-control', 'placeholder'=>' ', 'id'=>'id_menu', 'required']) !!}
                    </div>
                    <div class="form-group">
                      <label for="ingrediente" >Ingrediente</label>
                      {!! Form::text('ingrediente', null, ['class'=>'form-control', 'placeholder'=>'Ingrediente', 'id'=>'ingrediente', 'required']) !!}
                    </div>
                    <div class="form-group">
                      <label for="cantidad_personas" >Personas</label>
                      {!! Form::number('cantidad_personas', null, ['class'=>'form-control', 'placeholder'=>'Personas', 'id'=>'cantidad_personas', 'required']) !!}
                    </div>
                    <div class="form-group">
                      <label for="cantidad_ingrediente" >Cantidad</label>
                      {!! Form::number('cantidad_ingrediente', null, ['class'=>'form-control', 'placeholder'=>'Cantidad', 'id'=>'cantidad_ingrediente', 'required']) !!}
                    </div>
                    <div class="form-group">
                      <label for="unidad" >Unidad</label>
                      {!! Form::text('unidad', null, ['class'=>'form-control', 'placeholder'=>'Unidad', 'id'=>'unidad', 'list'=>'lista-unidad', 'required']) !!}
                    </div>

                    {!! Form::hidden('id_usuario', '1') !!}
                    {!! Form::submit('Actualizar ', ['class'=>'btn btn-warning']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection


@section('cuerpo')
<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-body">
        <table id="tablaAgenda" class="table display" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th>Id</th>
              <th>Menu</th>
              <th>Ingrediente</th>
              <th>Personas</th>
              <th>Cantidad</th>
              <th>Unidad</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            @foreach($datos as $dato)
            <tr data-id="{{ $dato->id }}">
              <td>{{$dato->id}}</td>
              <td>{{$dato->menu}}</td>
              <td>{{$dato->ingrediente}}</td>
              <td>{{$dato->cantidad_personas}}</td>
              <td>{{$dato->cantidad_ingrediente}}</td>
              <td>{{$dato->unidad}}</td>
              <td>
                <a href="#modalModifiar"  data-toggle="modal" data-target="" class="actualizar" style="color: #B8823B;"> <li class="fa fa-edit"></li></a>
                <a href="#"  data-toggle="modal" data-target="" style="color: #ff0000;" class="eliminar"> <li class="fa fa-trash"></li></a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        {!! Form::open(['route'=>['Ingrediente.destroy', ':DATO_ID'], 'method'=>'DELETE', 'id'=>'form-delete']) !!}
        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
@endsection

@section('js')
<script type="text/javascript">

  $(document).ready(function(){
    $('#tablaAgenda').DataTable({
      "order": [[ 0, 'desc']],
      "language": {
        "bDeferRender": true,
        "sEmtpyTable": "No ay registros",
        "decimal": ",",
        "thousands": ".",
        "lengthMenu": "Mostrar _MENU_ datos por registros",
        "zeroRecords": "No se encontro nada,  lo siento",
        "info": "Mostrar paginas [_PAGE_] de [_PAGES_]",
        "infoEmpty": "No ay entradas permitidas",
        "search": "Buscar ",
        "infoFiltered": "(Busqueda de _MAX_ registros en total)",
        "oPaginate":{
          "sLast":"Final",
          "sFirst":"Principio",
          "sNext":"Siguiente",
          "sPrevious":"Anterior"
        }
      }
    });
  });

  $('.actualizar').click(function(event){
    event.preventDefault();
    var fila = $(this).parents('tr');
    var id = fila.data('id');
    var form = $('#form-update')
    var url = form.attr('action').replace(':DATO_ID', id);
    form.get(0).setAttribute('action', url);
    link  = '{{ asset("/index.php/Ingrediente/")}}/'+id;

    $.getJSON(link, function(data, textStatus) {
      if(data.length > 0){
        $.each(data, function(index, el) {
          $('#ingrediente').val(el.ingrediente);
          $('#cantidad_personas').val(el.cantidad_personas);
          $('#cantidad_ingrediente').val(el.cantidad_ingrediente);
          $('#unidad').val(el.unidad);
          $('#id_menu').val(el.id_menu);
        });
      }
    });
  });

  $('.eliminar').click(function(event) {
    event.preventDefault();
    var fila = $(this).parents('tr');
    var id = fila.data('id');
    var form = $('#form-delete');
    var url = form.attr('action').replace(':DATO_ID',id);
    var data = form.serialize();

    if(confirm('Esta seguro de eliminar el Ingrediente')){
      $.post(url, data, function(result, textStatus, xhr) {
        alert(result);
        fila.fadeOut();
      }).fail(function(esp){
        fila.show();
      });
    }
  });

</script>
@endsection
