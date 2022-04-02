@extends('pembimbing.main')
@section('content')

<div class="card card-custom">
    <div class="card-header">
     <h3 class="card-title">
      Penilaian Peserta KP
     </h3>
    </div>    
    <form method="post" action ="/submitscore" id="addScore">
        @csrf
     <div class="card-body">
      <div class="form-group mb-8"> 
      <div class="form-group row">
        {{ csrf_field() }}
       <label  class="col-5 col-form-label">Pembimbing</label>
       <div class="col-5">
        <select class="form-control" type="search" placeholder="Choose Division's Name" name="mentors_id" id="mentors_id">
            @foreach ($mentors as $mentor)
        <option value="{{ $mentor->id }}">{{ $mentor->name }}</option>
            @endforeach
        </select>
       </div>
      </div>
      <div class="form-group row">
       <label for="example-search-input" class="col-5 col-form-label">Nama</label>
       <div class="col-5">
        <select class="form-control" type="search" placeholder="Choose Member's Name" name="members_id" id="members_id">
            @foreach ($members as $member)
        <option value="{{ $member->id }}">{{ $member->name }}</option>
            @endforeach
        </select>
       </div>
      </div>
      {{-- <div class="form-group row">
       <label for="example-email-input" class="col-2 col-form-label">Task</label>
       <div class="col-10">
        <select class="form-control" type="search" placeholder="Choose Task" name="tasks_id" id="tasks_id">
            @foreach ($tasks as $task)
        <option value="{{ $task->id }}">{{ $task->name }}</option>
            @endforeach
        </select>
       </div>
      </div> --}}
      <label style="">A. Pengetahuan</label>
      <div class="form-group row">
       <label for="example-url-input" class="col-5 col-form-label">Penugasan / Pengetahuan Bidang Kerja</label>
       <div class="col-5">
        <input class="form-control" type="number" placeholder="input nilai" name="point" id="point"/>
       </div>
      </div>
      <div class="form-group row">
        <label for="example-url-input" class="col-5 col-form-label">Kemampuan Memecahkan Masalah</label>
        <div class="col-5">
         <input class="form-control" type="number" placeholder="input nilai" name="point" id="point"/>
        </div>
       </div> 
       <label style="">B. Keterampilan</label>
      <div class="form-group row">
       <label for="example-url-input" class="col-5 col-form-label">Keterampilan Teknis</label>
       <div class="col-5">
        <input class="form-control" type="number" placeholder="input nilai" name="point" id="point"/>
       </div>
      </div>
      <div class="form-group row">
        <label for="example-url-input" class="col-5 col-form-label">Kualitas Hasil Kerja</label>
        <div class="col-5">
         <input class="form-control" type="number" placeholder="input nilai" name="point" id="point"/>
        </div>
       </div>  
       <div class="form-group row">
        <label for="example-url-input" class="col-5 col-form-label">Ketepatan Waktu Penyelesaian Pekerjaan</label>
        <div class="col-5">
         <input class="form-control" type="number" placeholder="input nilai" name="point" id="point"/>
        </div>
       </div>
       <label style="">C. Sikap</label>
       <div class="form-group row">
        <label for="example-url-input" class="col-5 col-form-label">Kejujuran</label>
        <div class="col-5">
         <input class="form-control" type="number" placeholder="input nilai" name="point" id="point"/>
        </div>
       </div>
       <div class="form-group row">
         <label for="example-url-input" class="col-5 col-form-label">Kedisiplinan</label>
         <div class="col-5">
          <input class="form-control" type="number" placeholder="input nilai" name="point" id="point"/>
         </div>
        </div>  
        <div class="form-group row">
         <label for="example-url-input" class="col-5 col-form-label">Tanggung Jawab</label>
         <div class="col-5">
          <input class="form-control" type="number" placeholder="input niali" name="point" id="point"/>
         </div>
        </div>  
        <div class="form-group row">
        <label for="example-url-input" class="col-5 col-form-label">Motivasi</label>
        <div class="col-5">
            <input class="form-control" type="number" placeholder="input nilai" name="point" id="point"/>
        </div>
        </div>  
        <div class="form-group row">
        <label for="example-url-input" class="col-5 col-form-label">Inisiatif</label>
        <div class="col-5">
            <input class="form-control" type="number" placeholder="input niali" name="point" id="point"/>
        </div>
        </div>  
        <div class="form-group row">
        <label for="example-url-input" class="col-5 col-form-label">Team Work</label>
        <div class="col-5">
            <input class="form-control" type="number" placeholder="input nilai" name="point" id="point"/>
        </div>
        </div>  
        <div class="form-group row">
        <label for="example-url-input" class="col-5 col-form-label">Interaksi Sosial</label>
        <div class="col-5">
            <input class="form-control" type="number" placeholder="input nilai" name="point" id="point"/>
        </div>
        </div>    
     <div class="card-footer">
      <div class="row">
       <div class="col-2">
       </div>
       <div class="col-10">
        <button type="submit" id="addScore" class="btn btn-success mr-2">Input</button>
        <button type="reset" class="btn btn-secondary">Cancel</button>
       </div>
      </div>
     </div>
    </form>
   </div>

@endsection