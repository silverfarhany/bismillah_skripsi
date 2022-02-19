@extends('pembimbing.main')
@section('content')

<div class="card card-custom">
    <div class="card-header">
     <h3 class="card-title">
      Input Score
     </h3>
    </div>
    <!--begin::Form-->
    <form>
     <div class="card-body">
      <div class="form-group mb-8">
       {{-- <div class="alert alert-custom alert-default" role="alert">
        <div class="alert-icon"><i class="flaticon-warning text-primary"></i></div>
        <div class="alert-text">
         Here are examples of <code>.form-control</code> applied to each textual HTML5 input type:
        </div>
       </div>
      </div> --}}
      <div class="form-group row">
       <label  class="col-2 col-form-label">Division</label>
       <div class="col-10">
        <input class="form-control" type="text" value="Artisanal kale" id="example-text-input"/>
       </div>
      </div>
      <div class="form-group row">
       <label for="example-search-input" class="col-2 col-form-label">Name</label>
       <div class="col-10">
        <input class="form-control" type="search" value="How do I shoot web" id="example-search-input"/>
       </div>
      </div>
      <div class="form-group row">
       <label for="example-email-input" class="col-2 col-form-label">Task</label>
       <div class="col-10">
        <input class="form-control" type="email" value="bootstrap@example.com" id="example-email-input"/>
       </div>
      </div>
      <div class="form-group row">
       <label for="example-url-input" class="col-2 col-form-label">Score</label>
       <div class="col-10">
        <input class="form-control" type="url" value="https://getbootstrap.com" id="example-url-input"/>
       </div>
      </div>      
     <div class="card-footer">
      <div class="row">
       <div class="col-2">
       </div>
       <div class="col-10">
        <button type="reset" class="btn btn-success mr-2">Input</button>
        <button type="reset" class="btn btn-secondary">Cancel</button>
       </div>
      </div>
     </div>
    </form>
   </div>

@endsection