@extends('admin.layouts.layout') 
@section('content')

<style>
    .contenedor{
    padding-top: 50px;
  }
</style>

<div class="row justify-content-center contenedor">
        <div class="col-6 p-4 " >
            <form method="POST" action=" {{url('admin/guardar_producto')}} " enctype="multipart/form-data" >
                    @csrf
                    <div class="modal-header" >
                        <h5 class="modal-title" id="addStudentModalLabel"><strong>Agregar Producto</strong> </h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                          <label class="control-label mb-3">Categoria <label style="font-size: 16px; margin: 0; color:red;">*</label></label>
                          <select class="form-control mb-3" name="categoria_id" required>
                            <option selected disabled>Seleccionar Categoria</option>
                            @foreach($categorias as $cat)
                            <option value="{{$cat->id}}" >{{$cat->nombre}}</option>
                            @endforeach
                          </select>
                        </div>
                        @error('categoria_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="name"> Nombre<label style="font-size: 16px; margin: 0; color:red;">*</label> </label>
                            <input type="text" name="nombre" class="form-control" required autocomplete="off">
                        </div>

                        <div class="form-group">
                            <label for="address"> Descripción<label style="font-size: 16px; margin: 0; color:red;">*</label></label>
                            <textarea type="text"   class="form-control editor" name="descripcion"  rows="10"></textarea>
                            @error('descripcion')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="address"> Especificaciones<label style="font-size: 16px; margin: 0; color:red;">*</label></label>
                            <textarea type="text"   class="form-control editor2" name="especificaciones"  rows="10"></textarea>
                            @error('especificaciones')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                          <label >Seleccione un Catálogo - <label style="font-size: 16px; margin: 0; background-color: red; color:white;">PDF</label><label style="font-size: 16px; margin: 0; color:red;">*</label></label>
                            <input type="file" name="catalogo" class="form-control" accept=".pdf" required>
                        </div>

                        <label for="address"> Imagen:<label style="font-size: 16px; margin: 0; color:red;">*</label></label>
                        <div class="form-group">
                          <label >Seleccione una Imagen <label style="font-size: 16px; margin: 0; background-color: #FFB353;">350px x 350px</label></label>
                            <input type="file" name="imagen" class="form-control file-img" required autocomplete="off" accept="image/*">
                        </div>    

                        <div class="form-group">
                        <div class="form-check form-check-inline">
                          <label >Tendencia ?</label>
                        </div>
                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="tendencia" value="option2">
                        </div>
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
                    <a href="{{url('admin/lista_productos')}}" class="btn btn-secondary">Cancelar</a>
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

<script>
  ClassicEditor
		.create( document.querySelector( '.editor2' ),
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