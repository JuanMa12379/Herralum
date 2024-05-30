@extends('admin.layouts.layout') 
@section('content')

<style>
    .contenedor{
    padding-top: 50px;
  }
</style>

<div class="row justify-content-center contenedor">
        <div class="col-6 p-4 " >
            <form method="POST" action=" {{url('admin/guardar_proyecto')}} " enctype="multipart/form-data" >
                    @csrf
                    <div class="modal-header" >
                        <h5 class="modal-title" id="addStudentModalLabel"><strong>Agregar Proyecto</strong> </h5>
                    </div>
                    <div class="modal-body">
                        
                        <div class="form-group">
                            <label for="name"> Nombre<label style="font-size: 16px; margin: 0; color:red;">*</label> </label>
                            <input type="text" name="nombre" class="form-control" required autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="name"> Ubicación<label style="font-size: 16px; margin: 0; color:red;">*</label> </label>
                            <input type="text" name="ubicacion" class="form-control" required autocomplete="off">
                        </div>

                        <div class="form-group">
                            <label for="address"> Descripción<label style="font-size: 16px; margin: 0; color:red;">*</label></label>
                            <textarea type="text"   class="form-control editor" name="descripcion"  rows="10"></textarea>
                            @error('descripcion')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <label for="address"> Imagen:<label style="font-size: 16px; margin: 0; color:red;">*</label></label>
                        <div class="form-group">
                          <label >Seleccione una Imagen <label style="font-size: 16px; margin: 0; background-color: #FFB353;">350px x 350px</label></label>
                            <input type="file" name="imagen" class="form-control file-img" required autocomplete="off" accept="image/*">
                        </div>    

                        <label for="address"> Imagenes Adicionales:<label style="font-size: 16px; margin: 0; color:red;">*</label></label>
                        <div class="form-group">
                          <label >Seleccione una o varias imagenes<label style="font-size: 16px; margin: 0; background-color: #FFB353;">350px x 350px</label></label>
                            <input type="file" name="imagen2[]" class="form-control file-img" required autocomplete="off" accept="image/*" multiple>
                        </div>  
                        
                        <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                                    <label> Meta Title</label>
                                    <input type="text" name="meta_title" class="form-control"  autocomplete="off">
                            </div>
                          </div>
                          
                          <div class="col-md-8">
                            <div class="form-group">
                                <label > Meta keywords</label>
                                <input type="text" name="meta_key" class="form-control"  autocomplete="off">
                            </div>
                          </div>
                        </div>
                        
                        <div class="form-group">
                            <label > Meta Description</label>
                            <input type="text" name="meta_description" class="form-control"  autocomplete="off">
                        </div>
                       
                        
                    </div>
                    <div class="modal-footer">
                    <a href="{{url('admin/lista_proyectos')}}" class="btn btn-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>Guardar</button>
                    </div>
                </form>
            </div>
        </div>

@endsection

@section('js')

<script>
  ClassicEditor
		.create( document.querySelector( '.editor' ),
    {
      ckfinder:
      {
         uploadUrl:"{{url('ckeditor.upload',['_token'=>csrf_token()])}}", 
      }
    } )
		.catch( error => {
			console.error( error );
		} );
</script>



	


@endsection