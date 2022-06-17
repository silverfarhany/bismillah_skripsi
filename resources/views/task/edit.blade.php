@extends('pembimbing.main')
@section('content')
@include('notification')
<div class="card card-custom">
  <div class="card-header">
    <h3 class="card-title">
      Edit Task
    </h3>
  </div>
  <form action="{{ url('/task/'.$task->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="card-body">
      <div class="form-group mb-8">
        <div class="form-group row">
          <label class="col-2 col-form-label">Member</label>
          <div class="col-10">
            <input type="text" class="form-control"value="{{$task->getMember->name}}" disabled  required>
          </div>
        </div>
        <div class="form-group row">
          <label for="example-email-input" class="col-2 col-form-label">Task</label>
          <div class="col-10">
            <input type="text" name="name" class="form-control" placeholder="Judul Tugas" value="{{$task->name}}" required>

          </div>
        </div>
        <div class="form-group row">
          <label for="example-url-input" class="col-2 col-form-label">Deadline</label>
          <div class="col-10">
            <input class="form-control" type="date" placeholder="input score" name="deadline" id="deadline" value="{{$task->deadline}}" required />
          </div>
        </div>
        <div class="form-group row">
          <label for="example-url-input" class="col-2 col-form-label">Description</label>
          <div class="col-10">
            <textarea class="form-control" placeholder="input description" name="description" id="description" required/>{{$task->description}}</textarea>

          </div>
        </div>
        <div class="card-footer">
          <div class="row">
            <div class="col-2">
            </div>
            <div class="col-10">
              <button type="submit" class="btn btn-success mr-2">Update Task</button>
              <button type="reset" class="btn btn-secondary">Cancel</button>
            </div>
          </div>
        </div>
  </form>
</div>

@endsection