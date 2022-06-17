@extends('pembimbing.main')
@section('content')
@include('notification')
<div class="card card-custom">
    <div class="card-header">
        <h3 class="card-title">
            Tambah Tugas
        </h3>
    </div>
    <form action="{{ url('/submittask') }}" method="POST">
        @csrf
        <div class="card-body">
            <div class="form-group mb-8">
                <div class="form-group row">
                    <label class="col-2 col-form-label">Peserta</label>
                    <div class="col-10">
                        <select class="form-control" placeholder="Choose Name" name="members_id" id="members_id">
                            <option selected disabled>Pilih Peserta</option>
                            @foreach($members as $member)
                            <option value="{{$member->id}}">{{$member->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-email-input" class="col-2 col-form-label">Tugas</label>
                    <div class="col-10">
                        <input class="form-control" type="text" placeholder="Task Title" name="task_name" id="tasks_name">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-url-input" class="col-2 col-form-label">Deadline</label>
                    <div class="col-10">
                        <input class="form-control" type="date" placeholder="Deadline" name="deadline" id="deadline" value="" />
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-url-input" class="col-2 col-form-label">Deskripsi</label>
                    <div class="col-10">
                        <textarea class="form-control" placeholder="input description" name="description" id="description" value="" /> </textarea>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-2">
                        </div>
                        <div class="col-10">
                            <button type="submit" class="btn btn-success mr-2">Tambah Tugas</button>
                            <a href="/" class="btn btn-secondary">Batal</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection