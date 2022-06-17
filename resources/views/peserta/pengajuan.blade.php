@extends('pembimbing.main')
@section('content')

@include('notification')
<div class="card card-custom">
    <div class="card-header">
        <h3 class="card-title">
            Data Pengajuan Peserta PKL
        </h3>
    </div>
    <div class="card-body">

        <!--begin::Stats Widget 1-->
        <div class="card card-custom card-stretch gutter-b">
            <!--begin::Header-->

            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body d-flex align-items-center justify-content-between pt-7 flex-wrap">
                <!--begin: Datatable-->
                <table class="table table-separate table-head-custom table-checkable" id="kt_datatable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th width="20%">Nama</th>
                            <th width="25%">Instansi Pendidikan</th>
                            <th width="5%">Status</th>
                            <th width="50%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($members as $member)
                        <tr style="vertical-align: middle;">
                            <td>{{$loop->iteration}}</td>
                            <td>{{$member->name}}</td>
                            <td>{{$member->univ}}</td>
                            <td>
                                @if($member->submission_status =='Pending')
                                <span class="label label-light-warning label-pill label-inline mr-2">Pending</span>

                                @elseif($member->submission_status =='Diterima')
                                <span class="label label-light-success label-pill label-inline mr-2">Diterima</span>

                                @elseif($member->submission_status =='Ditolak')
                                <span class="label label-light-danger label-pill label-inline mr-2">Ditolak</span>

                                @endif
                            </td>
                            <td>
                                <a href="#" class="btn-sm btn btn-warning font-weight-bold mr-2 btnDetailPengajuan" data-id="{{$member->id}}">
                                    <i class="far fa-eye"></i> Detail
                                </a>
                                @if($member->submission_status == 'Pending')
                                <a href="#" class=" btn-sm btn btn-primary font-weight-bold mr-2 btnTerima" data-target="#terima_pengajuan" data-toggle="modal" data-id="{{$member->id}}" data-start="{{$member->start}}" data-end="{{$member->end}}">
                                    <i class="fas fa-check"></i> Terima Peserta
                                </a>
                                <a href="#" data-id="{{$member->id}}" class=" btn-sm btn btn-danger font-weight-bold mr-2 btnTolak" data-toggle="modal" data-target="#tolak_pengajuan">
                                    <i class="fas fa-times"></i> Tolak Peserta
                                </a>

                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <!--end: Datatable-->
            </div>
            <!--end::Body-->
        </div>
        <!--end::Stats Widget 1-->
    </div>
</div>

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
                        <label for="" class="text-dark-50 font-weight-bolder text-hover-primary mb-1 font-size-sm">Tanggal Mulai KP</label>
                        <br>
                        <label id="start" for="" class="text-dark-75 text-hover-primary mb-1 font-size-lg"></label>
                    </div>
                    <div class="col-lg-6 mt-3">
                        <label for="" class="text-dark-50 font-weight-bolder text-hover-primary mb-1 font-size-sm">Tanggal Berakhir KP</label>
                        <br>
                        <label id="end" for="" class="text-dark-75 text-hover-primary mb-1 font-size-lg"></label>
                    </div>
                    <div class="col-lg-6 mt-3">
                        <label for="" class="text-dark-50 font-weight-bolder text-hover-primary mb-1 font-size-sm">Status</label>
                        <br>
                        <p id="status"></p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="tolak_pengajuan" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="submit_presence">Tolak Pengajuan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <form method="post" action="/finishAbsensi" id="formTolak">
                @csrf
                @method('PATCH')
                <div class="modal-body">
                    <p>Anda yakin akan menolak pengajuan peserta ini?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary font-weight-bold">Ya</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="terima_pengajuan" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="submit_presence">Terima Pengajuan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <form method="post" id="formTerima">
                @csrf
                @method('PATCH')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Pilih Divisi</label>
                        <select name="divisi" id="" class="form-control" required>
                            <option disabled selected>===Pilih Divisi===</option>
                            @foreach($divisions as $divisi)
                            <option value="{{$divisi->id}}">{{$divisi->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Pilih Pembimbing</label>
                        <select name="pembimbing" id="" class="form-control" required>
                            <option disabled selected>===Pilih Pembimbing===</option>
                            @foreach($mentors as $mentor)
                            <option value="{{$mentor->id}}">{{$mentor->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Tanggal Mulai</label>
                        <input type="date" name="start" id="terima_tanggalMulai" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="">Tanggal Berakhir</label>
                        <input type="date" name="end" id="terima_tanggalAkhir" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary font-weight-bold">Terima</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('script')
<script>
    var flagsUrl = "{{ URL::asset('/file/berkas_peserta/') }}";
    $('.btnDetailPengajuan').on('click', function() {
        $.get('/dataDiri/' + $(this).attr('data-id'), function(data) {
            $('#start').text(data.member.start);
            $('#end').text(data.member.end);
            $('#nama').text(data.member.nama);
            $('#universitas').text(data.member.univ);
            $('#email').text(data.member.email);
            $('#phone').text(data.member.phone);
            $('#deskripsi').text(data.member.deskripsi);
            $('#status').text(data.member.status);
            $('#cv').prop('href', flagsUrl + "/" + data.member.cv);
            $('#letter').prop('href', flagsUrl + "/" + data.member.internship_letter);
            $('#transkip').prop('href', flagsUrl + "/" + data.member.transkip);
            $('#detail_member').modal('show');
        })

    });

    $('.btnTolak').on('click', function() {
        $('#formTolak').prop('action', '/submition/' + $(this).attr('data-id') + '/reject');
    })

    $('.btnTerima').on('click', function() {
        $('#terima_tanggalMulai').val($(this).attr('data-start'));
        $('#terima_tanggalAkhir').val($(this).attr('data-end'));
        $('#formTerima').prop('action', '/submition/' + $(this).attr('data-id') + '/accept')
    });
</script>
@endsection