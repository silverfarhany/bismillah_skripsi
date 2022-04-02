@extends('pembimbing.main')
@section('content')

<div class="card card-custom">
    <div class="card-header">
     <h3 class="card-title">
      Add Data Pembimbing KP
     </h3>
    </div>
    <!--begin::Form-->
    <form method="post" action="/submitmentor" id="addMentor">
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
       <label for="example-search-input" class="col-2 col-form-label">Divisi</label>
       <div class="col-10">
        {{ csrf_field() }}
        <select class="form-control" type="search" placeholder="Choose Division's Name" name="divisions_id" id="divisions_id">
            @foreach ($division as $divisions)
        <option value="{{ $divisions->id }}">{{ $divisions->name }}</option>
        @endforeach
        </select>
       </div>
      </div>      
      <div class="form-group row">
        <label for="example-url-input" class="col-2 col-form-label">Nama</label>
        <div class="col-10">
         <input class="form-control" type="name" placeholder="Insert Name" name="name" id="name"/>
        </div>
       </div>               
       <div class="form-group row">
        <label for="example-url-input" class="col-2 col-form-label">Email</label>
        <div class="col-10">
         <input class="form-control" type="email" placeholder="Insert Email" name="email" id="email"/>
        </div>
       </div> 
       <div class="form-group row">
        <label for="example-url-input" class="col-2 col-form-label">Telephone</label>
        <div class="col-10">
         <input class="form-control" type="tel" placeholder="Insert Phone Number" name="phone"  id="phone"/>
        </div>
       </div>          
     <div class="card-footer">
      <div class="row">
       <div class="col-2">
       </div>
       <div class="col-10">
        <button type="submit" id="addMentor" class="btn btn-success mr-2">Add Pembimbing</button>
        <button type="reset" class="btn btn-secondary">Cancel</button>
       </div>
      </div>
     </div>
    </form>
   </div>
<br></br>
<!--begin::Card-->
<div class="card card-custom">
  <div class="card-header flex-wrap py-5">
      <div class="card-title">
          <h3 class="card-label">Data Pembimbing KP 
          <div class="text-muted pt-2 font-size-sm">all data Pembimbing</div></h3>
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
      @if ($mentors->count() > 0)
      <table class="table table-separate table-head-custom table-checkable" id="kt_datatable"> 
          <thead>
              <tr>
                  <th scope="col">#</th>
                  <th scope="col">Divisi</th>
                  <th scope="col">Name</th>
                  <th scope="col">Email</th> 
                  <th scope="col">Telephone</th>                                                                                                            
              </tr>
          </thead>
          <tbody>
              <?php $no = 1 ?>
              @foreach($mentors as $mentor)
              <tr>
                  <td scope="row">{{ $no++ }}</td>
                  <td>{{ $division->find($mentor->divisions_id)->name }}</td>
                  <td>{{ $mentor->name }} </td> 
                  <td>{{ $mentor->email }} </td>  
                  <td>{{ $mentor->phone }} </td>  
                  <td>                      
                      <a class="far fa-edit icon-md text-warning" href="editMentor/{{ $mentor->id }}"> </a>                     
                  </td>                                           
                  <td>
                    <a class="far fa-trash-alt icon-md text-danger" href="deleteMentor/{{ $mentor->id }}"></a>                      
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