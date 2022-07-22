@extends('pembimbing.main')
@section('content')
@include('notification')
<!--begin::Card-->
<div class="card card-custom">
    <div class="card-header flex-wrap py-5">
        <div class="card-title">
            <h3 class="card-label">Data Peserta PKL
                <div class="text-muted pt-2 font-size-sm">Data Diri, Data Tugas, dan Data Presensi</div>
            </h3>
        </div>
        <div class="card-toolbar">
        <div
                    class="dropdown dropdown-inline"
                  >
                    <a
                      href="#"
                      class="btn btn-fixed-height btn-bg-white btn-text-dark-50 btn-hover-text-success btn-icon-success font-weight-bolder font-size-sm px-5 my-1 mr-3"
                      data-toggle="dropdown"
                      aria-haspopup="true"
                      aria-expanded="false"
                    >
                      <i class="fas fa-file-excel"></i>Download Data</a
                    >
                    <div
                      class="dropdown-menu dropdown-menu-sm dropdown-menu-right p-0 m-0"
                    >
                      <!--begin::Navigation-->
                      <ul class="navi navi-hover">
                        <li class="navi-header pb-1">
                          <span
                            class="text-primary text-uppercase font-weight-bolder font-size-sm"
                            >Pilih Data:</span
                          >
                        </li>
                        <li class="navi-item">
                          <a href="javascript:void(0)" class="navi-link" id="downloadPeserta">
                            <span class="navi-icon">
                              <i class="far fa-user"></i>
                            </span>
                            <span class="navi-text">Data Peserta</span>
                          </a>
                        </li>
                        <li class="navi-item">
                          <a href="javascript:void(0)" class="navi-link"  id="downloadTask">
                            <span class="navi-icon">
                              <i class="fas fa-book-open"></i>
                            </span>
                            <span class="navi-text">Data Tugas</span>
                          
                          </a>
                        </li>
                        <li class="navi-item">
                          <a href="javascript:void(0)" class="navi-link" id="downloadPresensi">
                            <span class="navi-icon">
                              <i class="fas fa-calendar-check"></i>
                            </span>
                            <span class="navi-text">Data Presensi</span>
                          </a>
                        </li>
                      </ul>
                      <!--end::Navigation-->
                    </div>
                  </div>
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
                    <th>NIKP</th>
                    <th>Data</th>
                </tr>
            </thead>
            <tbody>
                @foreach($members as $member)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$member->name}}</td>
                    <td>{{$member->nikp}}</td>
                    <td>
                        <a href="#" class="btn btn-sm btn-success font-weight-bold mr-2 btnDataDiri" data-id="{{$member->id}}">
                            <i class="far fa-user"></i> Data Diri
                        </a>
                        <a href="#" class="btn btn-sm btn-warning font-weight-bold mr-2 btnDataTugas" data-id="{{$member->id}}">
                            <i class="fas fa-book-open"></i> Data Tugas
                        </a>
                        <a href="#" class="btn btn-sm btn-primary font-weight-bold mr-2 btnDataPresensi" data-id="{{$member->id}}">
                            <i class="fas fa-calendar-check"></i> Data Presensi
                        </a>

                        <a href="/member/{{$member->id}}/jurnalHarian" class="btn btn-sm btn-danger font-weight-bold mr-2">
                            <i class="fas fa-book"></i> Jurnal Harian
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


<!-- Modal-->
<!-- Modal data diri -->
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
                        <label for="" class="text-dark-50 font-weight-bolder text-hover-primary mb-1 font-size-sm">NIKP</label>
                        <br>
                        <label id="nikp" for="" class="text-dark-75 text-hover-primary mb-1 font-size-lg"></label>
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
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Data Tugas-->
<div class="modal fade" id="tugas_member" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Data Tugas</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>

            <div class="card-body d-flex align-items-center justify-content-between pt-7 flex-wrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th width="15%">Tugas</th>
                            <th width="20%">Deskripsi</th>
                            <th width="15%">Deadline</th>
                            <th width="16%">Status</th>
                            <th width="16%">Submission</th>
                            <th width="18%">Action</th>
                        </tr>
                    </thead>
                    <tbody id="dataTugas">

                    </tbody>
                </table>
            </div>
            <!--end::Body-->

            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="konfirmasiDeleteTugas" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Konfirmasi Delete</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <form id="formDeleteTugas" method="post">
                @csrf
                @method('DELETE')
            <div class="card-body d-flex align-items-center justify-content-between pt-7 flex-wrap">
                <p>Anda yakin akan menghapus Tugas ini?</p>
            </div>
            <!--end::Body-->

            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary font-weight-bold">Ya</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Data Presensi-->
<div class="modal fade" id="presensi_member" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Data Presensi</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Date</th>
                            <th>Start</th>
                            <th>End</th>
                            <th>Activity</th>
                            <th>Proof</th>
                        </tr>
                    </thead>
                    <tbody id="dataPresensi">

                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Data Jurnal Harian-->
<div class="modal fade" id="modalJournal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Data Jurnal Harian</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
            <table class="table table-bordered  table-checkable">
            <thead class="bg-secondary">
                <tr class="">
                    <th width="25%">Tanggal</th>
                    <th width="55%">Kegiatan</th>
                    <th width="20%">Jumlah Menit</th>
                </tr>
            </thead>
                    <tbody id="dataJurnal">

                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalDownloadPeserta" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Download Data Peserta</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <form action="/member/export" method="get">
                @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control" required>
                        <option value="" hidden>-- Select --</option>
                        <option value="1">Mulai PKL</option>
                        <option value="2">Selesai PKL</option>
                    </select>
                </div>
            
                <div class="form-group">
                    <label>Dari Tanggal</label>
                    <input type="date" class="form-control" name="start" required>
                </div>

                <div class="form-group">
                    <label>Sampai</label>
                    <input type="date" class="form-control" name="end" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary font-weight-bold">Download</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modalDownloadPresensi" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Download Data Presensi</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <form action="/presensi/export" method="get">
                @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label>Dari Tanggal</label>
                    <input type="date" class="form-control" name="start" required>
                </div>

                <div class="form-group">
                    <label>Sampai</label>
                    <input type="date" class="form-control" name="end" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary font-weight-bold">Download</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modalDownloadTugas" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Download Data Tugas</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <form action="/task/export" method="get">
                @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label>Dari Tanggal</label>
                    <input type="date" class="form-control" name="start" required>
                </div>

                <div class="form-group">
                    <label>Sampai</label>
                    <input type="date" class="form-control" name="end" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary font-weight-bold">Download</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    var flagsUrl = "{{ URL::asset('/file/berkas_peserta/') }}";
    var flagsUrl2 = "{{ URL::asset('/file/task_file/') }}";
    $(document).ready(function() {
        $(document).on('click', '.btnDataDiri', function() {
            var id = $(this).attr('data-id');
            $.get('dataDiri/' + id, function(data) {
                console.log(data.member);
                $('#start').text(data.member.start);
                $('#end').text(data.member.end);
                $('#nama').text(data.member.nama);
                $('#nikp').text(data.member.nikp);
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
        var i = 1;
        $(document).on('click', '.btnDataPresensi', function() {
            var id = $(this).attr('data-id');
            $.get('presensiMember/' + id, function(data) {
                $.each(data.data, function(key, value) {
                    $('#dataPresensi').append(
                        '<tr><td>' + i + '</td>' +
                        '<td>' + data.data[key].date + '</td>' +
                        '<td>' + data.data[key].start + '</td>' +
                        '<td>' + (data.data[key].end == null ? '-' : data.data[key].end) + '</td>' +
                        '<td>' + data.data[key].activity + '</td>' +
                        '<td><a href="' + (data.data[key].proof == null ? '#' : flagsUrl + '/' + data.data[key].proof) + '">Lihat Bukti</a></td>' +
                        '</tr>'
                    );
                    i++;
                });
                $('#presensi_member').modal('show');
            });
        });

        $('#presensi_member').on('hidden.bs.modal', function(e) {
            $('#dataPresensi').empty();
            i = 1;
        });

        var inc = 1;
        $('.btnDataTugas').on('click', function() {
            var id = $(this).attr('data-id');
            $.get('tugasMember/' + id, function(data) {
                $.each(data.data, function(key, value) {
                    $('#dataTugas').append(
                        '<tr><td>' + inc + '</td>' +
                        '<td>' + data.data[key].name+'</td>' +
                        '<td>' + data.data[key].description+'</td>' +
                        '<td>' + data.data[key].deadline + '</td>' +
                        '<td>' + data.data[key].status + '</td>' +
                        '<td>'+$.map(data.data[key].submission,function(keys,values){
                            return "<a href='"+flagsUrl2+"/"+data.data[key].submission[values].file+"'>File "+(values+1)+"</a>"
                        }).join('<br>')+'</td>' +
                        '<td><a href="/task/'+data.data[key].id+'/edit" class="btn btn-warning btn-sm">Edit</a> <a href="javascript:void(0)" class="btn btn-danger btn-sm btnDeleteTugas" data-id="'+data.data[key].id+'">Delete</a></td>'+
                        '</tr>'
                    );
                    i++;
                });
                $('#tugas_member').modal('show');
            });
        })

        $('#tugas_member').on('hidden.bs.modal', function(e) {
            $('#dataTugas').empty();
            inc = 1;
        });

        $(document).on('click','.btnDeleteTugas',function(){
            $('#formDeleteTugas').prop('action','/task/'+$(this).attr('data-id'));
            $('#tugas_member').modal('hide');
            $('#konfirmasiDeleteTugas').modal('show');
        });

        $("#konfirmasiDeleteTugas").on('hidden.bs.modal',function(e){
            $('#formDeleteTugas').removeAttr('action');
        })

        $(document).on('click', '.btnJurnalHarian', function() {
            var id = $(this).attr('data-id');
            $.get('/dailyJournal/' + id, function(data) {
               
                $('#modalJournal').modal('show');
            });
        });

        $(document).on('click','#downloadPeserta',function(){
            $("#modalDownloadPeserta").modal('show');
        });

        $(document).on('click','#downloadPresensi',function(){
            $("#modalDownloadPresensi").modal('show');
        });

        $(document).on('click','#downloadTask',function(){
            $("#modalDownloadTugas").modal('show');
        });
    });

</script>
@endsection