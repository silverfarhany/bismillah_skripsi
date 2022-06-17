@extends('peserta.main')
@section('content')

<div class="row">
    @if($task->status == 3)
    <div class="col-sm-12">
        <div class="alert alert-custom alert-light-warning fade show mb-5" role="alert">
            <div class="alert-icon"><i class="flaticon-warning"></i></div>
            <div class="alert-text">Revisi : {{$task->revision_note}}</div>
        </div>
    </div>
    @endif
    <div class="col-lg-7">
        <!--begin::Card-->
        <div class="card card-custom">
            <div class="card-header border-0 pt-7">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label font-weight-bolder font-size-h4 text-dark-75">Submit Task</span>
                </h3>
            </div>
            <!--begin::Form-->
            <div class="card-body">
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label text-lg-right">Task</label>
                    <div class="col-lg-7">
                        <input type="text" class="form-control" placeholder="Task" readonly value="{{$task->name}}" />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label text-lg-right">Description</label>
                    <div class="col-lg-7">
                        <textarea class="form-control" placeholder="Description" readonly />{{$task->description}}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label text-lg-right">Deadline</label>
                    <div class="col-lg-7">
                        <input type="date" class="form-control" placeholder="Deadline" readonly value="{{$task->deadline}}" />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label text-lg-right">Upload Files:</label>
                    <div class="col-lg-9">
                        <div class="dropzone dropzone-multi" id="kt_dropzone_4">
                            <div class="dropzone-panel mb-lg-0 mb-2">
                                <a class="dropzone-select btn btn-light-primary font-weight-bold btn-sm">Attach files</a>
                                <a class="dropzone-upload btn btn-light-primary font-weight-bold btn-sm">Upload All</a>
                                <a class="dropzone-remove-all btn btn-light-primary font-weight-bold btn-sm">Remove All</a>
                            </div>
                            <div class="dropzone-items">
                                <div class="dropzone-item" style="display:none">
                                    <div class="dropzone-file">
                                        <div class="dropzone-filename" title="some_image_file_name.jpg">
                                            <span data-dz-name="">some_image_file_name.jpg</span>
                                            <strong>(
                                                <span data-dz-size="">340kb</span>)</strong>
                                        </div>
                                        <div class="dropzone-error" data-dz-errormessage=""></div>
                                    </div>
                                    <div class="dropzone-progress">
                                        <div class="progress">
                                            <div class="progress-bar bg-primary" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0" data-dz-uploadprogress=""></div>
                                        </div>
                                    </div>
                                    <div class="dropzone-toolbar">
                                        <!-- <span class="dropzone-start">
                                            <i class="flaticon2-arrow"></i>
                                        </span> -->
                                        <span class="dropzone-cancel" data-dz-remove="" style="display: none;">
                                            <i class="flaticon2-cross"></i>
                                        </span>
                                        <span class="dropzone-delete" data-dz-remove="">
                                            <i class="flaticon2-cross"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <span class="form-text text-muted">Max file size is 1MB and max number of files is 5.</span> -->
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-9">
                        <a href="javascript:history.back()" class="btn btn-primary">Cancel</a>
                    </div>
                </div>
            </div>

            <!--end::Form-->
        </div>
        <!--end::Card-->
    </div>

    <div class="col-lg-5">
        <div class="card card-custom card-stretch gutter-b">
            <!--begin::Header-->
            <div class="card-header border-0 pt-7">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label font-weight-bolder font-size-h4 text-dark-75">Submission File</span>
                    <span class="text-muted mt-3 font-weight-bold font-size-lg">{{$jumlahFile}} File diupload</span>
                </h3>

            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body pt-5">
                <div class="tab-pane fade show active" aria-labelledby="kt_tab_list_4_2">
                    <!--begin::Item-->
                    @foreach($task->getFile as $file)
                    <div class="d-flex flex-center pb-6">
                        <!--begin::Bullet-->
                        <span class="bullet bullet-bar bg-light-primary align-self-stretch mr-4 my-1"></span>
                        <!--end::Bullet-->
                        <!--begin::Text-->
                        <div class="d-flex flex-column flex-grow-1">
                            <a href="{{asset('/file/task_file/'.$file->file)}}" class="text-dark-75 font-weight-bolder font-size-lg mb-1 text-hover-primary">{{$file->file}}</a>
                            <span class="text-muted font-weight-bold">{{date('d F Y, H:i', strtotime($file->upload_date))}}</span>
                        </div>
                        <!--end::Text-->
                        <!--begin::Dropdown-->
                        <a href="javascript:void(0)" class="btn btn-icon-danger btn-hover-light-danger btn-sm btn-icon btnDelete" data-id="{{$file->id}}">
                            <i class="ki ki-close"></i>
                        </a>

                        <!--end::Dropdown-->
                    </div>
                    @endforeach
                </div>
                <!--end::Tap pane-->
            </div>
            <!--end::Body-->
        </div>
    </div>
</div>

<div class="modal fade" id="modalDeleteFile" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Delete File</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <form id="formDeleteFile" method="post">
                @csrf
                @method('DELETE')
            <div class="modal-body">
                <p>Anda yakin akan menghapus file</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary font-weight-bold">Ya</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    var id = <?php echo $task->id; ?>;
    console.log(id);
    var reloading = sessionStorage.getItem("reloading");
    if (reloading) {
        Swal.fire({
              position: "top-right",
              icon: "success",
              title: "File Berhasil diupload",
              showConfirmButton: false,
              timer: 2000
          });
        sessionStorage.removeItem("reloading");
    }

    $('.btnDelete').on('click',function(){
        $('#formDeleteFile').prop('action','/taskFile/'+$(this).attr('data-id'));
        $('#modalDeleteFile').modal('show');
    }); 

    $('#modalDeleteFile').on('hidden.bs.modal',function(){
        $('#formDeleteFile').removeAttr('action');
    });
</script>
<script src="../../../theme/demo1/dist/assets/js/pages/features/file-upload/dropzonejs1036.js?v=2.1.1"></script>
@endsection