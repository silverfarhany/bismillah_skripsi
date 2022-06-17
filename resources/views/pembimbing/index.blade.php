@extends('pembimbing.main')
@section('content')

<div class="row">
    <div class="col-lg-6">
        <!--begin::Stats Widget 1-->
        <div class="card card-custom card-stretch gutter-b">
            <!--begin::Header-->
            <div class="card-header border-0 pt-6">
                <h3 class="card-title">
                    <span class="card-label font-weight-bolder font-size-h4 text-dark-75">Pengajuan peserta PKL </span>
                </h3>
                <div class="card-toolbar">

                </div>
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body d-flex align-items-center justify-content-between pt-7 flex-wrap">
                <span class="font-weight-bolder display5 text-dark-75 pl-5 pr-10">{{$pengajuan}}
                    <small>Pengajuan</small>
                </span>
            </div>
            <!--end::Body-->
        </div>
        <!--end::Stats Widget 1-->
        <div>
        </div>
    </div>
    <div class="col-lg-6">
        <!--begin::Stats Widget 1-->
        <div class="card card-custom card-stretch gutter-b">
            <!--begin::Header-->
            <div class="card-header border-0 pt-6">
                <h3 class="card-title">
                    <span class="card-label font-weight-bolder font-size-h4 text-dark-75">Peserta PKL Periode ini</span>
                </h3>
                <div class="card-toolbar">

                </div>
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body d-flex align-items-center justify-content-between pt-7 flex-wrap">
                <span class="font-weight-bolder display5 text-dark-75 pl-5 pr-10">{{$peserta}}
                    <small>Peserta</small>
                </span>
            </div>
            <!--end::Body-->
        </div>
        <!--end::Stats Widget 1-->
    </div>
</div>

@include('notification')
<!--begin::Stats Widget 1-->
<div class="card card-custom card-stretch gutter-b">
    <!--begin::Header-->
    <div class="card-header border-0 pt-6">
        <h3 class="card-title">
            <span class="card-label font-weight-bolder font-size-h4 text-dark-75">Tugas Peserta</span>
        </h3>
        <div class="card-toolbar">
            <!--begin::Button-->
            <a href="/createtask" class="btn btn-primary font-weight-bolder">
                <span class="svg-icon svg-icon-md">
                    <!--begin::Svg Icon | path:/keen/theme/demo1/dist/assets/media/svg/icons/Design/Flatten.svg-->
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect x="0" y="0" width="24" height="24" />
                            <circle fill="#000000" cx="9" cy="15" r="6" />
                            <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3" />
                        </g>
                    </svg>
                    <!--end::Svg Icon-->
                </span>Tambah Tugas</a>
            <!--end::Button-->
        </div>
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body justify-content-between pt-20 flex-wrap">
        <!--begin: Datatable-->
        <table class="table table-separate table-head-custom table-checkable" id="kt_datatable">
            <thead>
                <tr>
                    <th width="5%">#</th>
                    <th width="20%">Nama Peserta</th>
                    <th width="20%">Tugas</th>
                    <th width="15%">Status</th>
                    <th width="40%">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tasks as $task)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$task->getMember->name}}</td>
                    <td>{{$task->name}}</td>
                    <td>

                        @if($task->status==1) <span class="label label-light-danger label-pill label-inline mr-2">Not Submitted</span>
                        @elseif($task->status==2) <span class="label label-light-primary label-pill label-inline mr-2">Pending</span>
                        @elseif($task->status==3) <span class="label label-light-warning label-pill label-inline mr-2">Revision</span>
                        @elseif($task->status==4) <span class="label label-light-success label-pill label-inline mr-2">Approved</span>

                        @endif

                    </td>
                    <td>
                        <a href="javascript:void(0)" class="btn btn-sm btn-warning font-weight-bold mr-2 btnReview" data-id="{{$task->id}}" data-status="{{$task->status}}" data-revisi-note="{{$task->revision_note}}">
                            <i class="far fa-eye"></i> Review
                        </a>
                        @if($task->status == 2 || $task->status == 3)
                        <a href="javascript:void(0)" class="btn  btn-sm btn-primary font-weight-bold mr-2 btnApprove" data-id="{{$task->id}}">
                            <i class="fas fa-check"></i> Approve
                        </a>
                        <a href="javascript:void(0)" class="btn btn-sm  btn-danger font-weight-bold mr-2 btnRevisi" data-id="{{$task->id}}" >
                            <i class="fas fa-times"></i> Revisi
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
<div class="card card-custom card-stretch gutter-b">
    <!--begin::Header-->
    <div class="card-header border-0 pt-6">
        <h3 class="card-title">
            <span class="card-label font-weight-bolder font-size-h4 text-dark-75">Approval Jurnal Harian</span>
</h3>
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body justify-content-between pt-20 flex-wrap">
        <!--begin: Datatable-->
        <table class="table table-separate table-head-custom table-checkable" id="kt_datatable">
            <thead>
                <tr>
                    <th width="5%">#</th>
                    <th width="20%">Nama Peserta</th>
                    <th width="40%">Kegiatan</th>
                    <th width="15%">Jumlah Menit</th>
                    <th width="20%">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($journals as $journal)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{@$journal->getMember->name}}</td>
                    <td>{{$journal->description}}</td>
                   <td>{{$journal->minute}} Menit</td>
                    <td>
                        <a href="javascript:void(0)" class="btn  btn-sm btn-success font-weight-bold mr-2 btnApproveJournal" data-id="{{$journal->id}}">
                            <i class="fas fa-check"></i> Approve
                        </a>
                        <a href="javascript:void(0)" class="btn btn-sm  btn-danger font-weight-bold mr-2 btnRejectJournal" data-id="{{$journal->id}}" >
                            <i class="fas fa-times"></i> Reject
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <!--end: Datatable-->
    </div>
    <!--end::Body-->
</div>

<!-- Modal Review -->
<div class="modal fade" id="modalReview" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Review Submission</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-custom alert-light-warning fade show mb-5" role="alert" id="alertRevision">
                    <div class="alert-icon"><i class="flaticon-warning"></i></div>
                    <div class="alert-text">Revisi : <span id="revisiReason"></span></div>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th width="10%">#</th>
                            <th width="45%">Nama File</th>
                            <th width="25%">Tanggal Upload</th>
                            <th width="20%">Action</th>
                        </tr>
                    </thead>
                    <tbody id="dataFile">

                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Approve -->
<div class="modal fade" id="modalApproveTask" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="post" id="approveTask">
                @csrf
                @method('PATCH')
                <div class="modal-header">
                    <h5 class="modal-title" id="submit_presence">Approve Task</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Anda yakin akan melakukan Approve terhadap Tugas ini?</p>
                </div>
                <div class=" modal-footer">
                    <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary font-weight-bold">Ya</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Rejected -->
<div class="modal fade" id="modalRevisiTask" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="post" id="revisiTask">
                @csrf
                @method('PATCH')
                <div class="modal-header">
                    <h5 class="modal-title" id="submit_presence">Revisi Task</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Dengan ini, Tugas akan ditolak dan akan direvisi kembali oleh peserta</p>
                    <p>Silahkan isi Alasan Revisi</p>
                    <textarea name="reason" id="" cols="30" rows="3" class="form-control" required></textarea>
                </div>
                <div class=" modal-footer">
                    <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary font-weight-bold">Kirim</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Approve Journal-->
<div class="modal fade" id="modalApproveJournal" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="post" id="approveJournal">
                @csrf
                @method('PATCH')
                <div class="modal-header">
                    <h5 class="modal-title">Approve Journal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Anda yakin akan melakukan Approve terhadap Kegiatan Jurnal Harian ini?</p>
                </div>
                <div class=" modal-footer">
                    <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary font-weight-bold">Ya</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal Rejected Journal -->
<div class="modal fade" id="modalRejectJournal" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="post" id="rejectJournal">
                @csrf
                @method('PATCH')
                <div class="modal-header">
                    <h5 class="modal-title" id="submit_presence">Reject Journal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Anda yakin akan melakukan Reject terhadap Kegiatan Jurnal Harian ini?</p>
                </div>
                <div class=" modal-footer">
                    <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary font-weight-bold">Kirim</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    var inc = 1;
    $('#alertRevision').hide();
    var flagsUrl2 = "{{ URL::asset('/file/task_file/') }}";
    $('.btnApprove').on('click', function() {
        $('#approveTask').prop('action', '/task/' + $(this).attr('data-id') + '/approve');
        $('#modalApproveTask').modal('show');
    });

    $('.btnReview').on('click', function() {
        if ($(this).attr('data-status') == "3") {
            $('#revisiReason').text($(this).attr('data-revisi-note'));
            $('#alertRevision').show();
    }
    $.get('/task/' + $(this).attr('data-id') + '/getFile', function(data) {
        $.each(data.files, function(key, value) {
            $('#dataFile').append(
                '<tr>' +
                '<td>' + inc + '</td>' +
                '<td>' + data.files[key].file + '</td>' +
                '<td>' + data.files[key].upload_date + '</td>' +
                '<td><a href="' + flagsUrl2 + '/' + data.files[key].file + '"><i class="fa fa-download text-primary"></i> Download</a></td>' +
                '</tr>'
            );
            inc++;
        })
    }); $('#modalReview').modal('show');
    });

    $('.btnRevisi').on('click', function() {
        $('#revisiTask').prop('action', '/task/' + $(this).attr('data-id') + '/revisi');
        $('#modalRevisiTask').modal('show');
    });

    $('#modalRevisiTask').on('hidden.bs.modal', function(e) {
        $('#revisiTask').removeAttr('action');
    });

    $('#modalApproveTask').on('hidden.bs.modal', function(e) {
        $('#approveTask').removeAttr('action');
    });

    $('#modalReview').on('hidden.bs.modal', function(e) {
        $('#dataFile').empty();
        $('#revisiReason').text("");
        $('#alertRevision').hide();
        inc = 1;
    });

    $('.btnApproveJournal').on('click', function() {
        $('#approveJournal').prop('action', '/dailyJournal/' + $(this).attr('data-id') + '/approve');
        $('#modalApproveJournal').modal('show');
    });

    $('#modalApproveJournal').on('hidden.bs.modal', function(e) {
        $('#approveJournal').removeAttr('action');
    });

    $('.btnRejectJournal').on('click', function() {
        $('#rejectJournal').prop('action', '/dailyJournal/' + $(this).attr('data-id') + '/reject');
        $('#modalRejectJournal').modal('show');
    });

    $('#modalRejectJournal').on('hidden.bs.modal', function(e) {
        $('#rejectJournal').removeAttr('action');
    });

 
</script>
@endsection