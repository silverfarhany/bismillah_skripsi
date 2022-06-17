@extends('pembimbing.main')
@section('content')
<div class="card card-custom">
    <div class="card-header">
        <h3 class="card-title">
            Update Data Divisi
        </h3>
    </div>
    <!--begin::Form-->
    <form method="post" action="/editDivision/{{$divisions->id}}" id="updateDiv">
        @csrf
        <div class="card-body">
            <div class="form-group mb-8">
                <div class="alert alert-custom alert-default" role="alert">
                    <div class="alert-icon"><i class="flaticon-warning text-primary"></i></div>
                    <div class="alert-text">
                        Mengubah Data Divisi
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-2 col-form-label">Division</label>
                <div class="col-10">
                    {{ csrf_field() }}
                    @method('PATCH')
                    <input class="form-control" type="text" placeholder="Input Name of Division" id="name" name="name" value="{{ $divisions->name }}" />
                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-2">
                    </div>
                    <div class="col-10">
                        <button type="submit" id="updateDiv" class="btn btn-success mr-2">Update</button>
                        <button type="reset" class="btn btn-secondary">Cancel</button>
                    </div>
                </div>
            </div>
    </form>
</div>
</div>
@endsection 