@extends('pembimbing.main')
@section('content')

<div class="card card-custom">
    <div class="card-header">
     <h3 class="card-title">
      Edit Mentor
     </h3>
    </div>    
    <form method="post" action ="/editMentor" id="editMentor">
        @csrf
     <div class="card-body">
      <div class="form-group mb-8"> 
      <div class="form-group row">
        {{ csrf_field() }}
       <label  class="col-2 col-form-label">Division</label>
       <input type="text" hidden name="id_mentor" id="id_mentor" value="{{ $mentors->id }}">
       <div class="col-10">
        <select class="form-control" type="search" placeholder="Choose Division" name="divisions_id" id="divisions_id">
            @foreach ($divisions as $division)
                <option {{ ($division->id == $division->find($mentors->divisons_id)->id)?'selected':'' }} value="{{ $division->id }}">{{ $division->name }}</option>
            @endforeach
        </select>
       </div>
      </div>           
      <div class="form-group row">
       <label for="example-url-input" class="col-2 col-form-label">Name</label>
       <div class="col-10">
        <input class="form-control" type="text" placeholder="input Name" name="name" id="name"
        value="{{ $mentors->name }}" />
       </div>
      </div>  
      <div class="form-group row">
        <label for="example-url-input" class="col-2 col-form-label">Email</label>
        <div class="col-10">
         <input class="form-control" type="email" placeholder="input email" name="email" id="email"
         value="{{ $mentors->email }}" />
        </div>
       </div>  
       <div class="form-group row">
        <label for="example-url-input" class="col-2 col-form-label">Telephone</label>
        <div class="col-10">
         <input class="form-control" type="number" placeholder="input phone number" name="phone" id="phone"
         value="{{ $mentors->phone }}" />
        </div>
       </div>    
     <div class="card-footer">
      <div class="row">
       <div class="col-2">
       </div>
       <div class="col-10">
        <button type="submit" id="editMentor" class="btn btn-success mr-2">Update Pembimbing</button>
        <button type="reset" class="btn btn-secondary">Cancel</button>
       </div>
      </div>
     </div>
    </form>
   </div> 

@endsection