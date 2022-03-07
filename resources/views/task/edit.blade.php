@extends('pembimbing.main')
@section('content')

<div class="card card-custom">
    <div class="card-header">
     <h3 class="card-title">
      Edit Task
     </h3>
    </div>    
    <form method="post" action ="/editTask" id="editTask">
        @csrf
     <div class="card-body">
      <div class="form-group mb-8"> 
      <div class="form-group row">
        {{ csrf_field() }}
       <label  class="col-2 col-form-label">Member</label>
       <input type="text" hidden name="id_task" id="id_task" value="{{ $tasks->id }}">
       <div class="col-10">
        <select class="form-control" type="search" placeholder="Choose Name" name="members_id" id="members_id">
            @foreach ($members as $member)
                <option {{ ($member->id == $member->find($tasks->members_id)->id)?'selected':'' }} value="{{ $member->id }}">{{ $member->name }}</option>
            @endforeach
        </select>
       </div>
      </div>     
      <div class="form-group row">
       <label for="example-email-input" class="col-2 col-form-label">Task</label>
       <div class="col-10">
        <select class="form-control" type="search" readonly placeholder="Choose Task" name="tasks_name" id="tasks_name">
            {{-- @foreach ($tasks as $task) --}}
        <option value="{{ $tasks->name }}">{{ $tasks->name }} </option>
            {{-- @endforeach --}}
        </select>
       </div>
      </div>
      <div class="form-group row">
       <label for="example-url-input" class="col-2 col-form-label">Deadline</label>
       <div class="col-10">
        <input class="form-control" type="date" placeholder="input score" name="deadline" id="deadline"
        value="{{ $tasks->deadline }}" />
       </div>
      </div>  
      <div class="form-group row">
        <label for="example-url-input" class="col-2 col-form-label">Description</label>
        <div class="col-10">
         <input class="form-control" type="text area" placeholder="input description" name="description" id="description"
         value="{{ $tasks->description }}" />
        </div>
       </div>    
     <div class="card-footer">
      <div class="row">
       <div class="col-2">
       </div>
       <div class="col-10">
        <button type="submit" id="editTask" class="btn btn-success mr-2">Update Task</button>
        <button type="reset" class="btn btn-secondary">Cancel</button>
       </div>
      </div>
     </div>
    </form>
   </div> 

@endsection