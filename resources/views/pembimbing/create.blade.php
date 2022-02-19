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
        <label for="example-url-input" class="col-2 col-form-label">Name</label>
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
        <button type="submit" id="addMentor" class="btn btn-success mr-2">Add Mentor</button>
        <button type="reset" class="btn btn-secondary">Cancel</button>
       </div>
      </div>
     </div>
    </form>
   </div>

@endsection