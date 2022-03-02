@extends('pembimbing.main')
@section('content')

<div class="card card-custom">
    <div class="card-header">
     <h3 class="card-title">
      Edit Score
     </h3>
    </div>    
    <form method="post" action ="/editScore" id="editScore">
        @csrf
     <div class="card-body">
      <div class="form-group mb-8"> 
      <div class="form-group row">
        {{ csrf_field() }}
       <label  class="col-2 col-form-label">Mentor</label>
       <input type="text" hidden name="id_point" id="id_point" value="{{ $points->id }}">
       <div class="col-10">
        <select class="form-control" type="search" placeholder="Choose Division's Name" name="mentors_id" id="mentors_id">
            @foreach ($mentors as $mentor)
                <option {{ ($mentor->id == $mentor->find($points->mentors_id)->id)?'selected':'' }} value="{{ $mentor->id }}">{{ $mentor->name }}</option>
            @endforeach
        </select>
       </div>
      </div>
      <div class="form-group row">
       <label for="example-search-input" class="col-2 col-form-label">Name</label>
       <div class="col-10">
        <select class="form-control" type="search" placeholder="Choose Member's Name" name="members_id" id="members_id">
            @foreach ($members as $member)
        <option {{ ($member->id == $member->find($points->members_id)->id)?'selected':'' }} value="{{ $member->id }}">{{ $member->name }}</option>
            @endforeach
        </select>
       </div>
      </div>
      <div class="form-group row">
       <label for="example-email-input" class="col-2 col-form-label">Task</label>
       <div class="col-10">
        <select class="form-control" type="search" placeholder="Choose Task" name="tasks_id" id="tasks_id">
            @foreach ($task as $tasks)
        <option {{ ($tasks->id == $tasks->find($points->tasks_id)->id)?'selected':'' }} value="{{ $tasks->id }}">{{ $tasks->name }}</option>
            @endforeach
        </select>
       </div>
      </div>
      <div class="form-group row">
       <label for="example-url-input" class="col-2 col-form-label">Score</label>
       <div class="col-10">
        <input class="form-control" type="number" placeholder="input score" name="point" id="point"
        value="{{ $points->point }}"/>
       </div>
      </div>      
     <div class="card-footer">
      <div class="row">
       <div class="col-2">
       </div>
       <div class="col-10">
        <button type="submit" id="editScore" class="btn btn-success mr-2">Update Score</button>
        <button type="reset" class="btn btn-secondary">Cancel</button>
       </div>
      </div>
     </div>
    </form>
   </div>

@endsection