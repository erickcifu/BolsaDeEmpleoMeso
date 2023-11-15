@extends('layouts.appc')

@section('content')

<div class="container">
    <div id="agenda"> 
        
    </div>
</div>
<!-- Modal trigger button -->


<!-- Modal Body -->
<!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
<div class="modal fade" id="entrevista" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">Entrevista</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="">
                    {!!  csrf_field() !!}   
                    
                    <div class="form-group">
                      <label for="entrevistaId">id</label>
                      <input type="text" class="form-control" name="entrevistaId" id="entrevistaId" aria-describedby="helpId" placeholder="" disabled >
                    </div>
                    <div class="form-group">
                      <label for="tituloEntrevista">Titulo</label>
                      <input type="text" class="form-control" name="tituloEntrevista" id="tituloEntrevista" aria-describedby="helpId" placeholder="" disabled >                  
                    </div>
<div class="form-group">
  <label for="">Descripcion</label>
  <textarea class="form-control" name="descripcionEntrevista"  rows="7" disabled></textarea>
</div>
<div class="form-group">
  <label for="FechaEntrevista">fecha</label>
  <input type="text" class="form-control" name="FechaEntrevista" id="FechaEntrevista" aria-describedby="helpId" placeholder="" disabled >
</div>
<div class="form-group">
  <label for="">hora de inicio</label>
  <input type="text" class="form-control" name="horaInicio" id="horaInicio" aria-describedby="helpId" placeholder="" disabled>
</div>
<div class="form-group">
  <label for="">hora final</label>
  <input type="text" class="form-control" name="horaFinal" id="horaFinal" aria-describedby="helpId" placeholder="" disabled>
</div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                
            </div>
        </div>
    </div>
</div>


<!-- Optional: Place to the bottom of scripts -->
<script>
    const myModal = new bootstrap.Modal(document.getElementById('modalId'), options)

</script>
    
@endsection