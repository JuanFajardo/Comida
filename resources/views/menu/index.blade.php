@extends('bett0')

@section('menu') style='background-color:white; color:balck; '  @endsection
@section('titulo') Tesoreria, Tipos de Boletas @endsection


@section('titulo') Menu @endsection
@section('direccion') <a href="{{asset('/index.php/Menu')}}"> <i class="fa fa-fw fa-list-ol"></i><span class="nav-link-text">Menu</span> </a> @endsection

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
          <label for="menu_" >Menu</label>
          {!! Form::text('menu', null, ['class'=>'form-control', 'placeholder'=>' ', 'id'=>'menu_', 'required']) !!}
        </div>
        <div class="form-group">
          <label for="descripcion_" >Descripcion</label>
          {!! Form::text('descripcion', null, ['class'=>'form-control', 'placeholder'=>'Descripcion', 'id'=>'descripcion_', 'required']) !!}
        </div>
        <div class="form-group">
          <label for="id_grupo_" >Grupo</label>
          {!! Form::select('id_grupo', \App\Grupo::pluck('grupo', 'id'), null, ['class'=>'form-control', 'placeholder'=>' ', 'id'=>'id_grupo_', 'required']) !!}
        </div>
        <div class="form-group">
          <label for="id_tiempo_" >Tiempo de Comida</label>
          {!! Form::select('id_tiempo', [''=>''], null, ['class'=>'form-control', 'id'=>'id_tiempo_', 'required']) !!}
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
                    {!! Form::open(['route'=>['Menu.update', ':DATO_ID'], 'method'=>'PATCH', 'id'=>'form-update' ])!!}

                    <div class="form-group">
                      <label for="menu" >Menu</label>
                      {!! Form::text('menu', null, ['class'=>'form-control', 'placeholder'=>' ', 'id'=>'menu', 'required']) !!}
                    </div>
                    <div class="form-group">
                      <label for="descripcion" >Descripcion</label>
                      {!! Form::text('descripcion', null, ['class'=>'form-control', 'placeholder'=>'Descripcion', 'id'=>'descripcion', 'required']) !!}
                    </div>
                    <div class="form-group">
                      <label for="id_grupo" >Grupo</label>
                      {!! Form::select('id_grupo', \App\Grupo::pluck('grupo', 'id'), null, ['class'=>'form-control', 'placeholder'=>' ', 'id'=>'id_grupo', 'required']) !!}
                    </div>
                    <div class="form-group">
                      <label for="id_tiempo_" >Tiempo de Comida</label>
                      {!! Form::select('id_tiempo', \App\Tiempo::pluck('tiempo', 'id'), null, ['class'=>'form-control', 'id'=>'id_tiempo_', 'required']) !!}
                    </div>

                    {!! Form::hidden('id_usuario', '1') !!}
                    {!! Form::submit('Actualizar ', ['class'=>'btn btn-warning']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection



@section('modal3')
<div id="modalIngredientes" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content panel panel-primary">

      <div class="modal-header panel-heading">
        <b><a href="#" class="btn btn-success" onclick="agregar()"> <li class="fa fa-plus"></li> </a></b>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <div class="modal-body panel-body">
        {!! Form::open(['accept-charset'=>'UTF-8', 'enctype'=>'multipart/form-data', 'method'=>'POST', 'files'=>true, 'autocomplete'=>'off', 'id'=>'form-insert'] ) !!}
        <br>
        <div class="row">
          <div class="col-md-4">
            {!! Form::text('textoMenu', null, ['class'=>'form-control',  'id'=>'textoMenu', 'readonly']) !!}
          </div>
          <div class="col-md-4">
            {!! Form::select('textoGrupo', \App\Grupo::pluck('grupo', 'id'), null, ['class'=>'form-control',  'id'=>'textoGrupo', 'readonly']) !!}
          </div>
          <div class="col-md-4">
            {!! Form::select('textoTiempo', \App\Tiempo::pluck('tiempo', 'id'), null, ['class'=>'form-control',  'id'=>'textoTiempo', 'readonly']) !!}
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col-md-3">
            <label for=""> <b>Ingrediente</b> </label>
          </div>
          <div class="col-md-3">
            <label for=""> <b>Cantidad/Persona</b> </label>
          </div>
          <div class="col-md-3">
            <label for=""> <b>Cantidad/Ingrediente</b> </label>
          </div>
          <div class="col-md-3">
            <label for=""> <b>Unidad</b> </label>
          </div>
        </div>

        {!! Form::hidden('id_menu', null, ['id'=>'id_menu_', 'required']) !!}
        <div class="row">
          <div class="col-md-3">
            {!! Form::text('ingrediente', null, ['class'=>'form-control', 'placeholder'=>'Ingrediente', 'id'=>'ingrediente_', 'required']) !!}
          </div>
          <div class="col-md-3">
            {!! Form::text('cantidad_personas', null, ['class'=>'form-control', 'placeholder'=>'Cantidad/Personas', 'id'=>'cantidad_personas_', 'required']) !!}
          </div>
          <div class="col-md-3">
            {!! Form::text('cantidad_ingrediente', null, ['class'=>'form-control', 'placeholder'=>'Cantidad/Ingrediente', 'id'=>'cantidad_ingrediente_', 'required']) !!}
          </div>
          <div class="col-md-3">
            {!! Form::text('unidad', null, ['class'=>'form-control', 'placeholder'=>'Unidad', 'id'=>'unidad_', 'list'=>'lista-unidad', 'required']) !!}
            <datalist id="lista-unidad">
              <option value="Kg.">
              <option value="Gr.">
              <option value="Litro">
            </datalist>
          </div>
        </div>
        <br><br>
        <div class="row" id="ingredientesCuerpo">
        </div>
        <br><br>
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
              <th>Description</th>
              <th>Grupo</th>
              <th>Tiempo</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            @foreach($datos as $dato)
            <tr data-id="{{ $dato->id }}">
              <td>{{$dato->id}}</td>
              <td>{{$dato->menu}}</td>
              <td>{{$dato->descripcion}}</td>
              <td>{{$dato->grupo}}</td>
              <td>{{$dato->tiempo}}</td>
              <td>
                <a href="#modalIngredientes"  data-toggle="modal" data-target="" class="ingredientes" style="color: #109813;"> <li class="fa fa-folder-open"></li></a>
                <a href="#modalModifiar"  data-toggle="modal" data-target="" class="actualizar" style="color: #B8823B;"> <li class="fa fa-edit"></li></a>
                <a href="#"  data-toggle="modal" data-target="" style="color: #ff0000;" class="eliminar"> <li class="fa fa-trash"></li></a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        {!! Form::open(['route'=>['Menu.destroy', ':DATO_ID'], 'method'=>'DELETE', 'id'=>'form-delete']) !!}
        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
@endsection

@section('js')
<script type="text/javascript">
  function agregar(){
      var id_menu             = $('#id_menu_').val();
      var ingrediente       = $('#ingrediente_').val();
      var cantidad_personas = $('#cantidad_personas_').val();
      var cantidad_ingrediente = $('#cantidad_ingrediente_').val();
      var unidad            = $('#unidad_').val();
      var link = '{{asset("index.php/Insertar/Menu")}}/'+id_menu+"/"+ingrediente+"/"+cantidad_personas+"/"+cantidad_ingrediente+"/"+unidad;
      $.get(link, function(data, textStatus) {
      });

      link = '{{asset("/index.php/Ver/Menu/")}}/'+id_menu;
      $('#ingredientesCuerpo').empty();
      $.getJSON(link, function(data, textStatus) {
        if(data.length > 0){
          var html = "";
          $.each(data, function(index, el) {
            html = html +"<div class='col-md-3'> <a href='#' onclick='eliminar("+el.id+", "+id_menu+")' style='color:red;'> <i class='fa fa-fw fa-trash'></i> </a> "+el.ingrediente+"</div>"+
                         "<div class='col-md-3'>"+el.cantidad_personas+"</div>"+
                         "<div class='col-md-3'>"+el.cantidad_ingrediente+"</div>"+
                         "<div class='col-md-3'>"+el.unidad+" </div>";
          });
          $('#ingredientesCuerpo').html(html);
        }
      });
      $('#ingrediente_').val('');
      $('#cantidad_personas_').val('');
      $('#cantidad_ingrediente_').val('');
      $('#unidad_').val('');
  }

  function eliminar(id, id_menu){
    var link = '{{asset("index.php/Eliminar/Menu")}}/'+id;
    $.get(link, function(data, textStatus) {
    });

    link = '{{asset("/index.php/Ver/Menu/")}}/'+id_menu;
    $('#ingredientesCuerpo').empty();
    $.getJSON(link, function(data, textStatus) {
      if(data.length > 0){
        var html = "";
        $.each(data, function(index, el) {
          html = html +"<div class='col-md-3'> <a href='#' onclick='eliminar("+el.id+", "+id_menu+")' style='color:red;'> <i class='fa fa-fw fa-trash'></i> </a> "+el.ingrediente+"</div>"+
                       "<div class='col-md-3'>"+el.cantidad_personas+"</div>"+
                       "<div class='col-md-3'>"+el.cantidad_ingrediente+"</div>"+
                       "<div class='col-md-3'>"+el.unidad+" </div>";
        });
        $('#ingredientesCuerpo').html(html);
      }
    });
  }

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

  $('#id_grupo_').change(function(){
    var grupo = $('#id_grupo_').val();
    link  = '{{ asset("/index.php/menu/Grupo/")}}/'+grupo;
    $('#id_tiempo_').empty();
    $('#id_tiempo_').append($('<option>').val('').text(''));
    $.getJSON(link, function(data, textStatus) {
      if(data.length > 0){
        $.each(data, function(index, el) {
          $('#id_tiempo_').append($('<option>').val(el.id).text(el.tiempo));
        });
      }
    });
  });

  $('#id_grupo').change(function(){
    var grupo = $('#id_grupo').val();
    link  = '{{ asset("/index.php/menu/Grupo/")}}/'+grupo;
    $('#id_tiempo').empty();
    $('#id_tiempo').append($('<option>').val('').text(''));
    $.getJSON(link, function(data, textStatus) {
      if(data.length > 0){
        $.each(data, function(index, el) {
          $('#id_tiempo').append($('<option>').val(el.id).text(el.tiempo));
        });
      }
    });
  });

  $('.ingredientes').click(function(event){
    event.preventDefault();
    var fila = $(this).parents('tr');
    var id = fila.data('id');
    link  = '{{ asset("/index.php/Menu/")}}/'+id;

    $.getJSON(link, function(data, textStatus) {
      if(data.length > 0){
        $.each(data, function(index, el) {
          $('#id_menu_').val(el.id);
          $('#textoMenu').val(el.menu);
          $('#textoGrupo').val(el.id_grupo);
          $('#textoTiempo').val(el.id_tiempo);
        });
      }
    });


    link = '{{asset("/index.php/Ver/Menu/")}}/'+id;
    $('#ingredientesCuerpo').empty();
    $.getJSON(link, function(data, textStatus) {
      if(data.length > 0){
        var html = "";
        $.each(data, function(index, el) {
          html = html +"<div class='col-md-3'> <a href='#' onclick='eliminar("+el.id+", "+id+")' style='color:red;'> <i class='fa fa-fw fa-trash'></i> </a> "+el.ingrediente+"</div>"+
                       "<div class='col-md-3'>"+el.cantidad_personas+"</div>"+
                       "<div class='col-md-3'>"+el.cantidad_ingrediente+"</div>"+
                       "<div class='col-md-3'>"+el.unidad+" </div>";
        });
        $('#ingredientesCuerpo').html(html);
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
    link  = '{{ asset("/index.php/Menu/")}}/'+id;

    $.getJSON(link, function(data, textStatus) {
      if(data.length > 0){
        $.each(data, function(index, el) {
          $('#menu').val(el.menu);
          $('#descripcion').val(el.descripcion);
          $('#id_grupo').val(el.id_grupo);
          $('#id_tiempo').val(el.id_tiempo);
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

    if(confirm('Esta seguro de eliminar el Menu')){
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
