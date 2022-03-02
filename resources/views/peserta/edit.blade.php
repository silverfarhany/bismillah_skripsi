@extends('pembimbing.main')
@section('content')

<div class="card card-custom">
    <div class="card-header">
     <h3 class="card-title">
      Add Data Peserta KP
     </h3>     
    </div>
    <!--begin::Form-->
    <form method="post" action ="/editMember" id="editMember">
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
       <label  class="col-2 col-form-label">Pembimbing</label>
       <input type="text" hidden name="id_member" id="id_member" value="{{ $members->id }}">
       <div class="col-10">
        {{ csrf_field() }}
        <select class="form-control" type="search" placeholder="Choose Mentor's Name" name="mentor_id" id="mentor_id">
          @foreach ($mentor as $mentors)
          {{-- {{ dd($mentors->find($members->mentors_id)->id) }} --}}
      <option {{ ($mentors->id == $members->mentors_id)?'selected':'' }} value="{{ $mentors->id }}">{{ $mentors->name }}</option>
          @endforeach
      </select>
       </div>
      </div>
      <div class="form-group row">
       <label for="example-search-input" class="col-2 col-form-label">Divisi</label>
       <div class="col-10">
        <select class="form-control" type="search" placeholder="Choose Division's Name" name="division_id" id="division_id">
            @foreach ($divisions as $division)
        <option {{ ($division->id == $members->divisions_id)?'selected':'' }} value="{{ $division->id }}">{{ $division->name }}</option>
        @endforeach
        </select>
       </div>
      </div>
      <div class="form-group row">
       <label for="example-SELECT" class="col-2 col-form-label">Start Date</label>
       <div class="col-10">
        <input class="form-control" type="date" placeholder="Start Date" id="start" name="start"
        value="{{ $members->start }}"/>
       </div>
      </div>
      <div class="form-group row">
       <label for="example-url-input" class="col-2 col-form-label">End Date</label>
       <div class="col-10">
        <input class="form-control" type="date" placeholder="End Date" id="end" name="end"
        value="{{ $members->end }}"/>
       </div>
      </div>  
      <div class="form-group row">
        <label for="example-url-input" class="col-2 col-form-label">Name</label>
        <div class="col-10">
         <input class="form-control" type="name" placeholder="Insert Name" id="name" name="name"
         value="{{ $members->name }}"/>
        </div>
       </div> 
       <div class="form-group row">
        <label for="example-url-input" class="col-2 col-form-label">Instansi / University</label>
        <div class="col-10">
         <input class="form-control" type="name" placeholder="insert their instansi or university's name" id="univ" name="univ"
         value="{{ $members->univ }}"/>
        </div>
       </div> 
       <div class="form-group row">
        <label for="example-url-input" class="col-2 col-form-label">NIKP</label>
        <div class="col-10">
         <input class="form-control" type="name" placeholder="their NIKP"  id="nikp" name="nikp"
         value="{{ $members->nikp }}"/>
        </div>
       </div>
       <div class="form-group row">
        <label for="example-url-input" class="col-2 col-form-label">Email</label>
        <div class="col-10">
         <input class="form-control" type="email" placeholder="Insert Email" id="email" name="nikp"
         value="{{ $members->email }}"/>
        </div>
       </div> 
       <div class="form-group row">
        <label for="example-url-input" class="col-2 col-form-label">Telephone</label>
        <div class="col-10">
         <input class="form-control" type="tel" placeholder="Insert Phone Number"  id="phone" name="phone"
         value="{{ $members->phone }}"/>
        </div>
       </div>   
       <div class="form-group row">
        <label for="example-url-input" class="col-2 col-form-label">CV</label>
        <div class="col-10">
         <input class="form-control" type="file" value="https://getbootstrap.com" id="cv" name="cv"
         value="{{ $members->cv }}"/>
        </div>
       </div>  
       <div class="form-group row">
        <label for="example-url-input" class="col-2 col-form-label">Surat Magang</label>
        <div class="col-10">
         <input class="form-control" type="file" value="https://getbootstrap.com" id="internship_letter" name="internship_letter"
         value="{{ $members->internship_letter }}"/>
        </div>
       </div>  
       <div class="form-group row">
        <label for="example-url-input" class="col-2 col-form-label">Deskripsi</label>
        <div class="col-10">
         <textarea class="form-control" type="textarea"  id="description" name="description"
         value="{{ $members->description }}"> </textarea>
        </div>
       </div>  
     <div class="card-footer">
      <div class="row">
       <div class="col-2">
       </div>
       <div class="col-10">
        <button type="submit" id="addMember" class="btn btn-success mr-2">Update Member</button>
        <button type="reset" class="btn btn-secondary">Cancel</button>
       </div>
      </div>
     </div>
    </form>
   </div>
   @endsection