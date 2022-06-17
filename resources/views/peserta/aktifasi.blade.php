@extends('pembimbing.main')
@section('content')
@include('notification')
<!--begin::Card-->
<div class="card card-custom">
    <div class="card-header flex-wrap py-5">
        <div class="card-title">
            <h3 class="card-label">Aktifasi Peserta PKL
                <div class="text-muted pt-2 font-size-sm">Aktifasi peserta PKL yang sudah diterima</div>
            </h3>
        </div>
        <div class="card-toolbar">
            <!--begin::Dropdown-->
            <div class="dropdown dropdown-inline mr-2">


            </div>
            <!--end::Dropdown Menu-->
        </div>
        <!--end::Dropdown-->
    </div>
    <div class="card-body">
        <!--begin: Datatable-->
        <table class="table table-separate table-head-custom table-checkable" id="kt_datatable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Instansi Pendidikan</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($members as $member)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$member->name}}</td>
                    <td>{{$member->univ}}</td>
                    <td>
                        <a href="#" class="btn btn-sm btn-success font-weight-bold mr-2 btnDetail" data-id="{{$member->id}}">
                            <i class="far fa-eye"></i> Detail
                        </a>
                        <a href="#" class="btn  btn-sm btn-primary font-weight-bold mr-2 btnAktivasi" data-toggle="modal" data-target="#modal_aktivasi" data-id="{{$member->id}}">
                            <i class="fas fa-check"></i> Aktifasi
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <!--end: Datatable-->
    </div>
</div>
<!--end::Card-->
<div class="modal fade" id="detail_member" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Data Diri</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6 mt-3">
                        <label for="" class="text-dark-50 font-weight-bolder text-hover-primary mb-1 font-size-sm">Nama</label>
                        <br>
                        <label id="nama" for="" class="text-dark-75 text-hover-primary mb-1 font-size-lg"></label>
                    </div>

                    <div class="col-lg-6 mt-3">
                        <label for="" id="checkIn" class="text-dark-50 font-weight-bolder text-hover-primary mb-1 font-size-sm">Universitas</label>
                        <br>
                        <label id="universitas" for="" class="text-dark-75 text-hover-primary mb-1 font-size-lg"></label>
                    </div>
                    <div class="col-lg-6 mt-3">
                        <label for="" id="" class="text-dark-50 font-weight-bolder text-hover-primary mb-1 font-size-sm">Email</label>
                        <br>
                        <label id="email" for="" class="text-dark-75 text-hover-primary mb-1 font-size-lg"></label>
                    </div>
                    <div class="col-lg-6 mt-3">
                        <label for="" class="text-dark-50 font-weight-bolder text-hover-primary mb-1 font-size-sm">Phone</label>
                        <br>
                        <label id="phone" for="" class="text-dark-75 text-hover-primary mb-1 font-size-lg"></label>
                    </div>
                    <div class="col-lg-6 mt-3">
                        <label for="" class="text-dark-50 font-weight-bolder text-hover-primary mb-1 font-size-sm">Pembimbing</label>
                        <br>
                        <label id="pembimbing" for="" class="text-dark-75 text-hover-primary mb-1 font-size-lg"></label>
                    </div>
                    <div class="col-lg-6 mt-3">
                        <label for="" class="text-dark-50 font-weight-bolder text-hover-primary mb-1 font-size-sm">Divisi</label>
                        <br>
                        <label id="divisi" for="" class="text-dark-75 text-hover-primary mb-1 font-size-lg"></label>
                    </div>
                    <div class="col-lg-6 mt-3">
                        <label for="" class="text-dark-50 font-weight-bolder text-hover-primary mb-1 font-size-sm">Deskripsi</label>
                        <br>
                        <label id="deskripsi" for="" class="text-dark-75 text-hover-primary mb-1 font-size-lg"></label>
                    </div>

                    <div class="col-lg-6 mt-3">
                        <label for="" class="text-dark-50 font-weight-bolder text-hover-primary mb-1 font-size-sm">CV</label>
                        <br>
                        <a id="cv">Lihat Berkas</a>
                    </div>
                    <div class="col-lg-6 mt-3">
                        <label for="" class="text-dark-50 font-weight-bolder text-hover-primary mb-1 font-size-sm">Surat Magang</label>
                        <br>
                        <a id="letter">Lihat Berkas</a>

                    </div>
                    <div class="col-lg-6 mt-3">
                        <label for="" class="text-dark-50 font-weight-bolder text-hover-primary mb-1 font-size-sm">Transkip Nilai</label>
                        <br>
                        <a id="transkip">Lihat Berkas</a>
                    </div>
                    <div class="col-lg-6 mt-3">
                        <label for="" class="text-dark-50 font-weight-bolder text-hover-primary mb-1 font-size-sm">Tanggal Mulai PKL</label>
                        <br>
                        <label id="start" for="" class="text-dark-75 text-hover-primary mb-1 font-size-lg"></label>
                    </div>
                    <div class="col-lg-6 mt-3">
                        <label for="" class="text-dark-50 font-weight-bolder text-hover-primary mb-1 font-size-sm">Tanggal Berakhir PKL</label>
                        <br>
                        <label id="end" for="" class="text-dark-75 text-hover-primary mb-1 font-size-lg"></label>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_aktivasi" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="submit_presence">Aktivasi Peserta</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <form method="post" id="formAktivasi">
                @csrf
                @method('PATCH')
                <div class="modal-body">
                    <p>Dengan ini, maka Peserta PKL akan terhitung aktif mulai saat ini. Dan Nomor Absen Peserta akan ter-generate secara otomatis</p>
                    <p>Lanjutkan Aksi?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary font-weight-bold">Ya</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    var flagsUrl = "{{ URL::asset('/file/berkas_peserta/') }}";
    $(document).ready(function() {
        $(document).on('click', '.btnDetail', function() {
            var id = $(this).attr('data-id');
            $.get('dataDiri/' + id, function(data) {
                console.log(data.member);
                $('#start').text(data.member.start);
                $('#end').text(data.member.end);
                $('#nama').text(data.member.nama);
                $('#universitas').text(data.member.univ);
                $('#email').text(data.member.email);
                $('#phone').text(data.member.phone);
                $('#pembimbing').text(data.member.pembimbing);
                $('#divisi').text(data.member.divisi);
                $('#deskripsi').text(data.member.deskripsi);
                $('#nama').text(data.member.nama);
                $('#cv').prop('href', flagsUrl + "/" + data.member.cv);
                $('#letter').prop('href', flagsUrl + "/" + data.member.internship_letter);
                $('#transkip').prop('href', flagsUrl + "/" + data.member.transkip);
                $('#detail_member').modal('show');
            });
        });

        $(document).on('click', '.btnAktivasi', function() {
            var id = $(this).attr('data-id');
            $('#formAktivasi').prop('action', '/submition/' + id + '/activate')
        });
    });
</script>
@endsection