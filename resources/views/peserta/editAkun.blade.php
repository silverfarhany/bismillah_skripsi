@extends('peserta.main')

@section('content')
@include('notification')
<div class="col-lg-12">
    <!--begin::Card-->
    <form class="form" method="post" action="/editProfile/{{Auth::User()->id}}">
           @csrf
    @method('PATCH')
    <div class="card card-custom">
        <!--begin::Header-->
        <div class="card-header py-3">
            <div class="card-title align-items-start flex-column">
                <h3 class="card-label font-weight-bolder text-dark">Edit Profile</h3>
                {{-- <span class="text-muted font-weight-bold font-size-sm mt-1">Change your account password</span> --}}
            </div>
            <div class="card-toolbar">
                <button type="submit" class="btn btn-primary font-weight-bolder mr-2">Simpan Perubahan</button>
                <button type="reset" class="btn btn-light-primary font-weight-bolder">Batal</button>
            </div>
        </div>
        <!--end::Header-->
        <!--begin::Form-->
      
        <div class="card-body">
                <!--begin::Alert-->
                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label text-alert">Nama</label>
                    <div class="col-lg-9 col-xl-6">
                        <input type="text" name="name" class="form-control form-control-lg form-control-solid mb-2" value="{{Auth::User()->name}}" placeholder="Nama" />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label text-alert">Password</label>
                    <div class="col-lg-9 col-xl-6">
                        <input type="password" name="password_lama" class="form-control form-control-lg form-control-solid mb-2" value="" placeholder="Current password" />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label text-alert">Password Baru</label>
                    <div class="col-lg-9 col-xl-6">
                        <input type="password" name="password" class="form-control form-control-lg form-control-solid" value="" placeholder="New password" />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label text-alert">Konfirmasi Password</label>
                    <div class="col-lg-9 col-xl-6">
                        <input type="password" name="password_confirmation" class="form-control form-control-lg form-control-solid" value="" placeholder="Verify password" />
                    </div>
                </div>
            </div>
      
        <!--end::Form-->
    </div>
    </form>
</div>
@endsection

