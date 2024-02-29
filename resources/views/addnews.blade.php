@extends('layouts.app')

@section('content')

<script src="https://cdn.tiny.cloud/1/d8yvngezg453q9x9019n4iydfdz0vnawbbuhaek5l3qqbvdb/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@if(session()->has('success'))
<script>swal("Bienvenido!", "Te haz registrado exitosamente. Ahora puedes ingresar al juego con ésta cuenta.! Gracias por confiar en nosotros.", "success");</script>
@endif
<div class="container">
    <div class="row" style="margin-top: 200px;">
<p>Form para noticias</p>
<form action="{{route('addnew')}}" method="POST" enctype="multipart/form-data">
{{ csrf_field() }}  
<select class="form-control" name="category">
  <option value="Eventos">Eventos </option>
  <option value="Novedades">Novedades </option>
  <option value="Actualizacion">Actualizacion </option>
  <option value="Importante">Importante </option>
</select>
<input data-multiple-caption="{count} files selected" multiple id="file" type="file" name="file" class="inputfile" accept="image/*" >
<input type="text" name="title" class="form-control"><br>
<input type="text" name="subtitle" class="form-control"><br>
<textarea type="text" class="form-control" name="body"></textarea>
<input type="submit" class="btn btn-primary">
</form>
    

<p>Form para informaciones </p>
<form action="{{route('addinfo')}}" method="POST" enctype="multipart/form-data">
  {{ csrf_field() }}  
  <select class="form-control" name="select">
    <option value="info">Info </option>
    <option value="events">Events info  </option>
    <option value="drops">Drops </option>
    <option value="chaos">Chaos Machine </option>
    <option value="extra">Extra </option>
  </select>
  <textarea type="text" class="form-control" name="textbox" height="300px"></textarea>
  <input type="submit" class="btn btn-primary">
  </form>

</div>
</div>

<script>
    tinymce.init({
      selector: 'textarea',
      plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
      toolbar_mode: 'floating',
    });
  </script>

@endsection