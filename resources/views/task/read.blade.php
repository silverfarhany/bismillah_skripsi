@extends('peserta.main')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <!--begin::Card-->
        <div class="card card-custom">
            <div class="card-header flex-wrap py-5">
                <div class="card-title">
                    <h3 class="card-label">Data Tugas
                        {{-- <div class="text-muted pt-2 font-size-sm">all data of task had given (gatau enggresnya)</div> --}}
                    </h3>
                </div>
            </div>
            <div class="card-body">
                <!--begin: Datatable-->
                <table class="table table-separate table-head-custom table-checkable" id="kt_datatable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tugas</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Dari</th>
                            <th scope="col">Deadline</th>
                            <th scope="col">Status</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1 ?>
                        @foreach($tasks as $task)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{ $task->name }}</td>
                            <td>{{ $task->description }}</td>
                            <td> {{$task->getMentor->name}} </td>
                            <td>{{ date('d F Y', strtotime($task->deadline)) }}</td>
                            <td>@if($task->status==1) <span class="label label-light-danger label-pill label-inline mr-2">Not Submitted</span>
                            @elseif($task->status==2) <span class="label label-light-primary label-pill label-inline mr-2">Pending</span>
                        @elseif($task->status==3) <span class="label label-light-warning label-pill label-inline mr-2">Revision</span>
                        @elseif($task->status==4) <span class="label label-light-success label-pill label-inline mr-2">Approved</span>
                            @endif</td>
                            <td>
                                @if($task->status==4)
                                <a class="text-success btnHasil" data-id="{{$task->id}}" href="javascript:void(0)"> <i class="fa fa-eye icon-md text-success"></i> Lihat Hasil</a></td>

                                @elseif($task->status==3)
                                <a  class="text-warning" href="submitTask/{{ $task->id }}"> <i class="fa fa-pencil-alt icon-md text-warning"></i> Edit Hasil</a></td>
                                @else
                            <a class="text-danger" href="submitTask/{{ $task->id }}"> <i class="fa fa-upload icon-md text-danger "></i> Upload Tugas</a></td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <!--end: Datatable-->
            </div>
        </div>
    </div>
</div>
<!--end::Card-->

<!-- Modal Data Hasil-->
<div class="modal fade" id="modalHasil" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Hasil Submission</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th width="10%">#</th>
                            <th width="55%">Nama File</th>
                            <th width="35%">Tanggal Upload</th>
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
@endsection

@section('script')
<script>
    var inc = 1;
    var flagsUrl2 = "{{ URL::asset('/file/task_file/') }}";
    $('.btnHasil').on('click',function(){
        $.get('/task/'+$(this).attr('data-id')+'/getFile',function(data){
            console.log(data.files);
            $.each(data.files,function(key, value){
                $('#dataFile').append(
                    '<tr>'+
                    '<td>'+inc+'</td>'+
                    '<td><a href="'+flagsUrl2+'/'+data.files[key].file+'">'+data.files[key].file+'</a></td>'+
                    '<td>'+data.files[key].upload_date+'</td>'+
                    '</tr>'
                );
                inc++;
            })
        });
        $('#modalHasil').modal('show');
        
    });

    $('#modalHasil').on('hidden.bs.modal', function(e) {
            $('#dataFile').empty();
            inc = 1;
        });
</script>
@endsection