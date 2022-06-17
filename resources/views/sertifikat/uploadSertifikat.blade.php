@extends('pembimbing.main')
@section('content')
@include('notification')
<div class="card card-custom">
    <!--begin::Header-->
    <div class="card-header border-0 pt-6">
        <h3 class="card-title">
            <span class="card-label font-weight-bolder font-size-h4 text-dark-75">Sertifikat Peserta</span>
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
                    <th width="25%">Nama Peserta</th>
                    <th width="25%">File</th>
                    <th width="25%">Tanggal Upload</th>
                    <th width="20%">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($members as $member)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$member->name}}</td>
                    <td>@if(empty($member->certificate))
                        -
                        @else
                        <a href="{{asset('file/sertifikat_peserta/'.$member->certificate->file)}}">Lihat Sertifikat</a>
                        @endif
                    </td>
                    <td>{{empty($member->certificate) ? '-' : date('d F Y',strtotime($member->certificate->date))}}</td>
                    <td>@if(empty($member->certificate))
                        <button type="button" class="btn btn-primary btn-sm btnUpload" data-id="{{$member->id}}">Upload</button>
                        @else
                        <button type="button" class="btn btn-warning btn-sm btnReUpload" data-id="{{$member->certificate->id}}" data-nama="{{$member->certificate->file}}">Re-Upload</button>
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

<div class="modal fade" id="upload_sertificate" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="submit_presence">Upload Sertifikat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <form method="post" id="submitSertificate" enctype="multipart/form-data" action="/sertifikat/upload">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                    <input type="hidden" name="idMember" id="idMember">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="file" required accept="application/pdf,image/png, image/jpeg"  />
                            <label class="custom-file-label" for="proof">File Sertifikat</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary font-weight-bold">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="reupload_sertificate" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="submit_presence">Re-Upload Sertifikat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <form method="post" id="resubmitSertificate" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="modal-body">
                    <div class="form-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="file" required accept="application/pdf,image/png, image/jpeg"  />
                            <label class="custom-file-label" for="proof" id="oldfile">File Sertifikat</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary font-weight-bold">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('script')
<script>

    $(document).on('click', '.btnUpload', function() {
        $('#idMember').val($(this).attr('data-id'));
        $('#upload_sertificate').modal('show');
    })

    $('#upload_sertificate').on('hidden.bs.modal', function() {
        $('#idMember').val('');
    });

    $(document).on('click', '.btnReUpload', function() {
        $('#oldfile').text($(this).attr('data-nama'));
        $('#resubmitSertificate').prop('action','/sertifikat/'+$(this).attr('data-id')+'/reupload');
        $('#reupload_sertificate').modal('show');
    })

    $('#upload_sertificate').on('hidden.bs.modal', function() {
        $('#oldfile').text("File Sertifikat");
    });

   
</script>
@endsection