@extends('pembimbing.main')
@section('content')
@include('notification')
<div class="card card-custom">
    <div class="card-header">
        <h3 class="card-title">
            Penilaian Peserta PKL
        </h3>
    </div>
    <form method="post" action="/submitscore" id="addScore">
        @csrf
        <div class="card-body">
            <div class="form-group mb-8">
                <div class="form-group row">
                    <label for="example-search-input" class="col-5 col-form-label">Nama</label>
                    <div class="col-5">
                        <select class="form-control" name="members_id" id="members_id" required>
                            @foreach ($members as $member)
                            <option value="{{ $member->id }}">{{ $member->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <label style="">A. Pengetahuan</label>
            @foreach($parameter_A as $parameter)
            <div class="form-group row">
                <label for="example-url-input" class="col-5 col-form-label">{{$parameter->description}}</label>
                <div class="col-5">
                    <input class="form-control" min=0 max=100 type="number" placeholder="input nilai" name="point[{{$parameter->id}}]" required />
                </div>
            </div>
            @endforeach

            <label style="">B. Keterampilan</label>
            @foreach($parameter_B as $parameter)
            <div class="form-group row">
                <label for="example-url-input" class="col-5 col-form-label">{{$parameter->description}}</label>
                <div class="col-5">
                    <input class="form-control" min=0 max=100 type="number" placeholder="input nilai" name="point[{{$parameter->id}}]" required  />
                </div>
            </div>
            @endforeach

            <label style="">C. Sikap</label>
            @foreach($parameter_C as $parameter)
            <div class="form-group row">
                <label for="example-url-input" class="col-5 col-form-label">{{$parameter->description}}</label>
                <div class="col-5">
                    <input class="form-control" min=0 max=100 type="number" placeholder="input nilai" name="point[{{$parameter->id}}]" required  />
                </div>
            </div>
            @endforeach
        </div>

        <div class="card-footer">
            <div class="row">
                <div class="col-2">
                </div>
                <div class="col-10">
                    <button type="submit" id="addScore" class="btn btn-success mr-2">Input</button>
                    <a href="/home" class="btn btn-secondary">Cancel</a>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection