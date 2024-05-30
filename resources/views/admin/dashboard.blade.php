@extends('admin.layouts.layout') 
@section('content')
<style>
  h1{
    color:#4E8819;
  }
  .contendor{
    padding-top: 200px;
  }
 
</style>
 <!-- Content Wrapper. Contains page content -->
 
  <div class="vh-100 row m-0 text-center aling-items-center justify-content-center contendor">
    <div  class="col-auto">
    <img src="{{asset('admin/images/Logo_vitrelum.png')}}" class="img-fluid" alt="...">
     <h1><strong>Bienvenido al panel del administrador</strong></h1>
    </div>
  </div>
  
  


  <!-- /.content-wrapper -->
@endsection