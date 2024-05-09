@extends('layouts.app')

@section('content')

<script src="https://cdn.tiny.cloud/1/d8yvngezg453q9x9019n4iydfdz0vnawbbuhaek5l3qqbvdb/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

@if(session()->has('success'))
<script>swal("Perfecto!", "Haz tu publicado tu tema exitosamente.", "success");</script>
@endif
@if(session()->has('error'))
<script>swal("Error!", "Debes poner algo en el tema", "error");</script>
@endif

@php use App\Respuesta; @endphp
@php use App\Tema; @endphp
@php use App\User; @endphp


<div style="background: #171717">
  <img src="img/forum-head.jpg" style="width: 100%">

<div class="row">
  <div class="container">
  <p style="margin-top: -80px;font-family:'Bowlby One SC', cursive;color:white;font-size:25px;">Foro personalizado de UnderMu Slow</p>
  </div>
</div>

<div class="row" style="margin-top: 20px;">
  <div class="container" style="color: white;">   
    <div class="col-md-12">    
            <p>Añadir un tema</p>

            <form action="{{route('addtema')}}" method="POST" enctype="multipart/form-data">
              {{ csrf_field() }}             
              <input type="hidden" name="id_usuario" value="{{Auth::user()->memb___id}}">
              <input type="hidden" name="id_categoria" value="{{$id_categoria}}">
              <input type="text" name="titulo" required placeholder="titulo" style="color: black;width: 100%;
              height: 40px;
              margin-bottom: 10px;">
              <textarea type="text" class="form-control" name="contenido"></textarea>
              <input type="submit" class="btn btn-primary" value="Enviar tema">
              </form>
          </div>

</div>
  </div>
</div>



<script>
  tinymce.init({
    selector: 'textarea',
    height: 500,
    plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
    toolbar_mode: 'floating',
  });
</script>

@endsection