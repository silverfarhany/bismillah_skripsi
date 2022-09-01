@extends('pembimbing.main')
@section('content')

@include('notification')

<div class="card card-custom">
    <div class="card-header">
        <h3 class="card-title">
            Data Nilai Peserta Kerja Praktik
        </h3>
        <div class="card-toolbar">
            <a href="/score/export" class="btn btn-sm btn-success font-weight-bold">
                <i class="fas fa-file-excel"></i> Download Report
            </a>
        </div>
    </div>
    <div class="card-body">
        <!--begin: Datatable-->
        <table class="table table-separate table-head-custom table-checkable" id="kt_datatable">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Peserta</th>
                    <th scope="col">Nilai Rata-rata</th>
                    <th scope="col">Predikat</th>
                    <th scope="col">Tanggal Penilaian</th>
                    <th scope="col">Detail</th>

                </tr>
            </thead>
            <tbody>
                @foreach($forms as $form)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$form->member->name}}</td>
                    <td>{{$form->average}}</td>
                    <td>{{$form->predicate}}</td>
                    <td>{{date('d F Y',strtotime($form->date))}}</td>
                    <td>
                        <a href="javascript:void(0)" data-id="{{$form->id}}" class="btn btn-sm btn-primary font-weight-bold mr-2 btnDetailForm">
                            <i class="far fa-eye"></i> Detail Nilai
                        </a>
                        <a href="editScore/{{ $form->id }}" class="btn btn-sm btn-success font-weight-bold mr-2 btnDataTugas">
                            <i class="fas fa-edit"></i> Edit Nilai
                        </a>
                        <a href="#" class="btn btn-sm btn-danger font-weight-bold mr-2 btnDelete" data-id="{{$form->id}}">
                            <i class="fas fa-trash"></i> Hapus Nilai
                        </a>
                    </td>
                 
                </tr>
                @endforeach

            </tbody>
        </table>

        <!--end: Datatable-->
    </div>
</div>

<div class="modal fade" id="detail_evaluasi" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Detail Nilai Evaluasi</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
            <table class="table table-separate">
                <tbody>
                    <tr>
                        <td width="70%"><b>A. Pengetahuan </b></td>
                    </tr>
                    @foreach($parameter_A as $parameter)
                    <tr>
                        <td width="70%">{{$parameter->description}}</td>
                        <td width="3%">: </td>
                        <td id="nilai{{$parameter->id}}"></td>
                    </tr>
                    @endforeach

                    <tr>
                        <td width="70%"><b>B. Keterampilan </b></td>
                    </tr>
                    @foreach($parameter_B as $parameter)
                    <tr>
                        <td width="70%">{{$parameter->description}}</td>
                        <td width="3%">: </td>
                        <td id="nilai{{$parameter->id}}"></td>
                    </tr>
                    @endforeach
                    <tr>
                        <td width="70%"><b>C. Sikap </b></td>
                    </tr>
                    @foreach($parameter_C as $parameter)
                    <tr>
                        <td width="70%">{{$parameter->description}}</td>
                        <td width="3%">: </td>
                        <td id="nilai{{$parameter->id}}"></td>
                    </tr>
                    @endforeach
                    <tr>
                    <td width="70%"><b>Rata-rata </b>
                    <td width="3%">: </td>
                    <td id="rata-rata"></td>
                    </tr>

                    <tr>
                    <td width="70%"><b>Predikat </b>
                    <td width="3%">: </td>
                    <td id="predikat"></td>
                    </tr>

                </tbody>
            </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="konfirmasiDelete" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Konfirmasi Delete</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <form id="formDelete" method="post">
                @csrf
                @method('DELETE')
            <div class="card-body d-flex align-items-center justify-content-between pt-7 flex-wrap">
                <p>Anda yakin akan menghapus nilai peserta ini?</p>
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
<!--end::Card-->
@endsection

@section('script')
    <script>
        $(document).on('click','.btnDetailForm',function(){
            id = $(this).attr('data-id');
            $.get('/score/'+id+'/detail',function(data){
                $.each(data.score,function(key,values){
                    $("#nilai"+data.score[key].parameter_id).append(
                      data.score[key].point  
                    );
                });
                $("#rata-rata").append(
                    data.form.average
                );
                $("#predikat").append(
                    data.form.predicate
                );
            });
            $('#detail_evaluasi').modal('show');
        });

        $("#detail_evaluasi").on('hidden.bs.modal',function(){
            for(var i =1; i<=12; i++){
                $("#nilai"+i).empty();
            }
            $("#predikat").empty();
            $("#rata-rata").empty();
        })

        $('.btnDelete').on('click',function(){
            $('#formDelete').prop('action','/deleteScore/'+$(this).attr('data-id'));
            $('#konfirmasiDelete').modal('show');
        }); 

        $('#konfirmasiDelete').on('hidden.bs.modal',function(){
            $('#formDelete').removeAttr('action');
        });
    </script>
@endsection