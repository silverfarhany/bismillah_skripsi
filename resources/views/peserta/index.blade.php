@extends('peserta.main')
@section('content')
@include('notification')
<!-- @if(session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <div class="alert-close">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"><i class="ki ki-close"></i></span>
        </button>
    </div>
</div>
@endif -->

@if(count($cekStatus) > 0)
<div class="row">
    <div class="col-lg-12">
        <div class="card card-custom card-stretch gutter-b">
            <div class="card-body d-flex align-items-center justify-content-between pt-7 flex-wrap">
                <h2>Selamat, Anda telah menyelesaikan Praktik Kerja Lapangan Anda.</h2>
                <h3>Silahkan cek nilai Anda di <a href="/final" style="text-decoration:underline">sini</a></h3>
            </div>
        </div>
    <div>
</div>
@else
<div class="row">
    <div class="col-lg-4">
        <!--begin::Stats Widget 1-->
        <div class="card card-custom card-stretch gutter-b">
            <!--begin::Header-->
            <div class="card-header border-0 pt-6">
                <h3 class="card-title">
                    <span class="card-label font-weight-bolder font-size-h4 text-dark-75">Tugas Anda</span>
                </h3>
                <div class="card-toolbar">
                    <footer class="footer">
                        <cite title="Source Title">Not Submitted Task</cite>
                    </footer>
                </div>
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body d-flex align-items-center justify-content-between pt-7 flex-wrap">
                <!-- Button trigger modal-->
                <button href="#" id="btnTask" class="btn btn-sm btn-primary font-weight-bolder px-6">Kerjakan</button>
                <!--end button trigger-->
            </div>
            <!--end::Body-->
        </div>
        <!--end::Stats Widget 1-->
        <div>
        </div>
    </div>
    <div class="col-lg-4">
        <!--begin::Stats Widget 1-->
        <div class="card card-custom card-stretch gutter-b">
            <!--begin::Header-->
            <div class="card-header border-0 pt-6">
                <h3 class="card-title">
                    <span class="card-label font-weight-bolder font-size-h4 text-dark-75">Presensi</span>
                </h3>
                <div class="card-toolbar">
                    <footer class="footer">
                        <cite title="Source Title">
                            @if(!empty($presensiNow->start) && empty($presensiNow->end))
                            {{date('H:i',strtotime($presensiNow->start))}}
                            @elseif(!empty($presensiNow->start) && !empty($presensiNow->end))
                            {{date('H:i',strtotime($presensiNow->start)) .' - '. date('H:i',strtotime($presensiNow->end))}}
                            @endif
                        </cite>
                    </footer>
                </div>
            </div>
            <!--end::Header-->
            <!--begin::Body-->

            <div class="card-body d-flex align-items-center justify-content-between pt-7 flex-wrap">
                <!-- Button trigger modal-->
                @if(empty($presensiNow))
                <button href="#" class="btn btn-sm btn-success font-weight-bolder px-6" data-toggle="modal" data-target="#start_presensi">Start</button>
                @elseif(!empty($presensiNow->start) && empty($presensiNow->end))
                <button href="#" class="btn btn-sm btn-danger font-weight-bolder px-6" data-toggle="modal" data-target="#submit_presence">Finish</button>
                @elseif(!empty($presensiNow->start) && !empty($presensiNow->end))
                <button href="#" class="btn btn-sm btn-primary font-weight-bolder px-6" id="btnModalPresence" data-toggle="modal" data-target="#view_presence" data-proof="{{$presensiNow->proof}}" data-activity="{{$presensiNow->activity}}">Lihat</button>
                @endif
                <!--end button trigger-->
            </div>

            <!--end::Body-->
        </div>
        <!--end::Stats Widget 1-->
    </div>
    <div class="col-lg-4">
        <!--begin::Stats Widget 1-->
        <div class="card card-custom card-stretch gutter-b">
            <!--begin::Header-->
            <div class="card-header border-0 pt-6">
                <h3 class="card-title">
                    <span class="card-label font-weight-bolder font-size-h4 text-dark-75">Jurnal Harian </span>
                </h3>
                <div class="card-toolbar">
                    <footer class="footer">
                        <cite title="Source Title">{{date('d F Y')}}</cite>
                    </footer>
                </div>
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body d-flex align-items-center justify-content-between pt-7 flex-wrap">
                <!-- Button trigger modal-->
                <button href="#" class="btn btn-sm btn-primary font-weight-bolder px-6" id="btnLihatJurnal">Lihat</button>
                <!--end button trigger-->
            </div>
            <!--end::Body-->
        </div>
        <!--end::Stats Widget 1-->
    </div>
</div>

<!--begin::Stats big Widget -->
<div class="card card-custom card-stretch gutter-b">
    <!--begin::Header-->
    <div class="card-header border-0 pt-6">
        <h3 class="card-title">
            <span class="card-label font-weight-bolder font-size-h4 text-dark-75">Seluruh Data Jurnal Harian</span>
        </h3>
        <div class="card-toolbar">

        </div>
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body">
        <div class="col-sm-4" style="float: right;">
            <div class="row">
                <div class="col-sm-4">
                    <p style="float: right;"><i class="fa fa-check text-success"></i> Approved</p>
                </div>
                <div class="col-sm-4">
                    <p style="float: right;"><i class="fa fa-times text-danger"></i> Rejected</p>
                </div>
                <div class="col-sm-4">
                    <p style="float: right;"><i class="fa fa-clock text-warning"></i> Pending</p>
                </div>
            </div>
        </div>


        <table class="table table-bordered  table-checkable">
            <thead class="bg-secondary">
                <tr class="">
                    <th width="25%">Tanggal</th>
                    <th width="55%">Kegiatan</th>
                    <th width="20%">Jumlah Menit</th>
                </tr>
            </thead>
            <tbody>
                @foreach($journalDate as $date)
                <?php 
                    $journals = \App\Models\DailyJournal::where('date',$date->date)->where('member_id',Session::get('id'))->get();
                ?>
                <tr>
                    <td rowspan="{{count($journals)}}">{{date('d F Y',strtotime($date->date))}}</td>
                    <td>{!! $journals->first()->status == 0 ? '<i class="fa fa-clock text-warning"></i>' : ($journals->first()->status == 1 ? '<i class="fa fa-times text-danger"></i>' : '<i class="fa fa-check text-success"></i>') !!} {{$journals->first()->description}} </td>
                    <td>{{$journals->first()->minute}} Menit</td>
                </tr>   
                @foreach($journals->slice(1) as $journal)
                <tr>
                <td>{!! $journal->status == 0 ? '<i class="fa fa-clock text-warning"></i>' : ($journal->status== 1 ? '<i class="fa fa-times text-danger"></i>' : '<i class="fa fa-check text-success"></i>') !!} {{$journal->description}} </td>
                <td>{{$journal->minute}} Menit</td>
                </tr>
                @endforeach 
                @endforeach
            </tbody>
        </table>
    </div>
    <!--end::Body-->
</div>
@endif
<!--end::Stats Widget 1-->

<!-- Modal-->
<div class="modal fade" id="modalTask" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tugas yang belum dikerjakan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Task</th>
                            <th scope="col">Description</th>
                            <th scope="col">From</th>
                            <th scope="col">Deadline</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="listTugas">

                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="start_presensi" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <form action="/startAbsensi" method="post">
                @csrf
                <div class="modal-body">
                    Dengan menekan tombol Start, maka Presensi Anda akan dimulai dan dihitung sejak saat ini
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary font-weight-bold" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary font-weight-bold">Start</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal-->
<div class="modal fade" id="modalJurnal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="submit_kr">Jurnal Harian</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-5 my-2" style="border-right: 1px solid #ebedf3;">
                        <h6>Input Jurnal Hari ini</h6>
                        <br>
                        <form action="/dailyJournal" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">Kegiatan</label>
                                <input name="description" type="text" class="form-control" placeholder="Kegiatan">
                            </div>
                            <div class="form-group">
                                <label for="">Jumlah Menit</label>
                                <input name="minute" type="number" min="1" class="form-control" placeholder="Jumlah Menit">
                            </div>

                            <button type="submit" class="col-sm-12 btn btn-primary mb-5">Submit</button>
                        </form>
                    </div>

                    <div class="col-sm-7 my-2">
                        <h6>List Jurnal Hari ini</h6>
                        <br>
                        <table class="table table-separate table-head-custom">
                            <thead>
                                <tr>
                                    <th width="60%">Deskripsi</th>
                                    <th width="25%">Menit</th>
                                    <th width="15%">Action</th>
                                </tr>
                            </thead>
                            <tbody id="listJournal">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal-->
<div class="modal fade" id="submit_presence" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="submit_presence">Presensi Hari Ini</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <form method="post" action="/finishAbsensi" id="submitPresence" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleTextarea">Tell Us How Was Your Day</label>
                        <textarea class="form-control" rows="5" name="activity" required></textarea>
                    </div>
                    <div class="form-group">
                        <div></div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="proof" required />
                            <label class="custom-file-label" for="proof">Today's activity</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                    <button type="submit" id="submitPresence" class="btn btn-primary font-weight-bold">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="view_presence" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="submit_presence">Presensi Hari Ini</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <form method="post" action="/finishAbsensi" id="submitPresence" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="" class="font-weight-bolder">Activity</label>
                        <p id="activity"></p>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="" class="font-weight-bolder">Bukti</label>
                        <p><a id="proof">Lihat Bukti</a></p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('script')
<script>
    var inc = 1;
    var flagsUrl = "{{ URL::asset('/file/proof_presence/') }}";
    $(document).on('click', '#btnModalPresence', function() {
        $('#activity').text($(this).attr('data-activity'));
        $('#proof').prop('href', flagsUrl + "/" + $(this).attr('data-proof'));
    });

    $(document).on('click', '#btnTask', function() {
        $.get('/task/notSubmitted', function(data) {
            console.log(data.tasks);
            $.each(data.tasks, function(key, value) {
                $('#listTugas').append(
                    '<tr><td>' + inc + '</td>' +
                    '<td>' + data.tasks[key].name + '</td>' +
                    '<td>' + data.tasks[key].description + '</td>' +
                    '<td>' + data.tasks[key].get_mentor.name + '</td>' +
                    '<td>' + data.tasks[key].deadline + '</td>' +
                    '<td><a href="/submitTask/' + data.tasks[key].id + '"><i class="icon-md text-primary fa fa-upload"></i> Submit File</a></td>' +
                    '</tr>'
                );
                inc++;
            });
            $('#modalTask').modal('show');
        });
    });

    $('#modalTask').on('hidden.bs.modal', function(e) {
        $('#listTugas').empty();
        inc = 1;
    });

    $(document).on('click', '#btnLihatJurnal', function() {
        $.get('/dailyJournal/journalToday', function(data) {
            console.log(data.data);
            $.each(data.data, function(key, value) {
                $('#listJournal').append(
                    '<tr>'+
                    '<td>' + data.data[key].description + '</td>' +
                    '<td>' + data.data[key].minute + '</td>' +
                    '<td><form action="/dailyJournal/'+data.data[key].id+'" method="post"> @csrf @method("DELETE")<a href="javascript:void(0)" onclick=this.closest("form").submit()><i class="fa fa-trash text-danger"></i></a></form></td>' +
                    '</tr>'
                );
            });
            $('#modalJurnal').modal('show');
        });
    });

    $('#modalJurnal').on('hidden.bs.modal', function(e) {
        $('#listJournal').empty();
    });

  
</script>
@endsection