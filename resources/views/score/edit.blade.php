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
                    <label for="example-search-input" class="col-5 col-form-label">Nama</label>
                    <div class="col-5">
                        <input type="hidden" name="id" value="{{ $scores->id }}">
                        <select class="form-control" name="members_id" id="members_id" disabled>
                        @foreach ($members as $member)
                            <option {{ ($member->id == $member->find($scores->member_id)->id)?'selected':'' }} value="{{ $member->id }}">{{ $member->name }}</option>
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
                    <input class="form-control" min=0 max=100 type="number" placeholder="input nilai" name="point[{{$parameter->id}}]" value="{{$parameter->nilai}}" required />
                </div>
            </div>
            @endforeach

            <label style="">B. Keterampilan</label>
            @foreach($parameter_B as $parameter)
            <div class="form-group row">
                <label for="example-url-input" class="col-5 col-form-label">{{$parameter->description}}</label>
                <div class="col-5">
                    <input class="form-control" min=0 max=100 type="number" placeholder="input nilai" name="point[{{$parameter->id}}]" value="{{$parameter->nilai}}" required  />
                </div>
            </div>
            @endforeach

            <label style="">C. Sikap</label>
            @foreach($parameter_C as $parameter)
            <div class="form-group row">
                <label for="example-url-input" class="col-5 col-form-label">{{$parameter->description}}</label>
                <div class="col-5">
                    <input class="form-control" min=0 max=100 type="number" placeholder="input nilai" name="point[{{$parameter->id}}]" value="{{$parameter->nilai}}" required  />
                </div>
            </div>
            @endforeach
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