@extends('pembimbing.main')
@section('content')

<div class="card card-custom">
    <div class="card-header">
     <h3 class="card-title">
      Add Data Divisi
     </h3>
    </div>
    <!--begin::Form-->
    <form method="post" action ="/submitdivision" id="addDiv">
        @csrf
     <div class="card-body">
      <div class="form-group mb-8">
       <div class="alert alert-custom alert-default" role="alert">
        <div class="alert-icon"><i class="flaticon-warning text-primary"></i></div>
        <div class="alert-text">
         Data yang ditambahkan bersifat serius 
        </div>
       </div>
      </div>
      <div class="form-group row">
       <label  class="col-2 col-form-label">Divisi</label>
       <div class="col-10">
        {{ csrf_field() }}
        <input class="form-control" type="text" placeholder="Input Nama Divisi" id="name" name="name"/>
       </div>
      </div>    
     <div class="card-footer">
      <div class="row">
       <div class="col-2">
       </div>
       <div class="col-10">
        <button type="submit" id="addDiv" class="btn btn-success mr-2">Tambah</button>
        <button type="reset" class="btn btn-secondary">Cancel</button>
       </div>
      </div>
     </div>
    </form>
   </div>
</div>
<br>
<br>
<br>
   <!--begin::Card-->
<div class="card card-custom">
    <div class="card-header flex-wrap py-5">
        <div class="card-title">
            <h3 class="card-label">Data Divisi 
            <div class="text-muted pt-2 font-size-sm">semua data divisi</div></h3>
        </div>
        <div class="card-toolbar">
            <!--begin::Dropdown-->
            <div class="dropdown dropdown-inline mr-2">
                
                    
                </div>
                <!--end::Dropdown Menu-->
            </div>
            <!--end::Dropdown-->          
    </div>
    <div class="card-body">
        <!--begin: Datatable-->
        @if ($divisions->count() > 0)
        <table class="table table-separate table-head-custom table-checkable" id="kt_datatable"> 
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">ID Divisi</th>
                    <th scope="col">Nama Divisi</th> 
                    <th scope="col">Action</th>                                                                                    
                </tr>
            </thead>
            <tbody>
                <?php $no = 1 ?>
                @foreach($divisions as $division)
                <tr>
                    <td scope="row">{{ $no++ }}</td>
                    <td>{{ $division->id }}</td>
                    <td>{{ $division->name }}</td>  
                    <td>
                        <a type="button" class="btn btn-warning font-weight-bold mr-2" href="editDivision/{{ $division->id }}"> Edit </a>
                        <a type="button" class="btn btn-danger font-weight-bold mr-2" href="deleteDivision/{{ $division->id }}"> Delete </a>    
                    </td>                                           
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
        <!--end: Datatable-->
    </div>
</div>
<!--end::Card-->
@endsection