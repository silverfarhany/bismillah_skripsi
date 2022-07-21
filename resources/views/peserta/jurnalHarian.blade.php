@extends('pembimbing.main')
@section('content')
@include('notification')
<div class="card card-custom">
    <!--begin::Header-->
    <div class="card-header">
        <h3 class="card-title">
            <span class="card-label font-weight-bolder font-size-h4 text-dark-75">Jurnal Harian</span>
            
        </h3>
        <div class="card-toolbar">
            <a href="/dailyJournal/{{$peserta->id}}/export" class="btn btn-sm btn-success font-weight-bold">
                <i class="fas fa-file-excel"></i> Download Report
            </a>
        </div>
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body">
        <div class="row">
        <div class="col-sm-8">
        <p class="font-weight-bold font-size-h6 text-dark-75">Peserta : {{$peserta->name}}</p>    
        </div>
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
        </div>
        


        <table class="table table-bordered  table-checkable">
            <thead class="bg-secondary">
                <tr class="">
                    <th width="20%">Tanggal</th>
                    <th width="40%">Kegiatan</th>
                    <th width="20%">Jumlah Menit</th>
                    <th width="20%">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($journalDate as $date)
                <?php 
                    $journals = \App\Models\DailyJournal::where('date',$date->date)->where('member_id',$peserta->id)->get();
                ?>
                <tr>
                    <td rowspan="{{count($journals)}}">{{date('d F Y',strtotime($date->date))}}</td>
                    <td>{!! @$journals->first()->status == 0 ? '<i class="fa fa-clock text-warning"></i>' : (@$journals->first()->status == 1 ? '<i class="fa fa-times text-danger"></i>' : '<i class="fa fa-check text-success"></i>') !!} {{@$journals->first()->description}} </td>
                    <td>{{@$journals->first()->minute}} Menit</td> 
                    @if(@$journals->first()->status == 0)
                    <td>
                        <button type="button" class="btn btn-sm btn-success mr-2" data-toggle="modal" data-target="#approve-{{@$journals->first()->id}}">
                            <i class="fa fa-check"></i> Approve
                        </button>
                        <div class="modal fade" id="approve-{{@$journals->first()->id}}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title">Approval Confirmation</h3>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <i aria-hidden="true" class="ki ki-close"></i>
                                        </button>
                                    </div>
                                    
                                    <div class="modal-body">
                                        <p class="font-weight-bold mb-2"> Are you sure to approve this Journal ?</p>
                                    </div>

                                    <div class="modal-footer">
                                        <form action="{{ route('approve-journal', @$journals->first()->id) }}" method="POST">
                                            @method('PATCH')
                                            @csrf
                                            <div class="row justify-content-end no-gutters">
                                                <button type="submit" class="btn btn-success px-4 mr-2">Approve</button>
                                                <button type="button" class="btn btn-light text-muted" data-dismiss="modal">Cancel</button>
                                            </div>
                                        </form> 
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="button" class="btn btn-sm btn-danger mr-2" data-toggle="modal" data-target="#reject-{{@$journals->first()->id}}">
                            <i class="fa fa-times"></i> Reject
                        </button>
                        <div class="modal fade" id="reject-{{@$journals->first()->id}}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title">Rejection Confirmation</h3>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <i aria-hidden="true" class="ki ki-close"></i>
                                        </button>
                                    </div>
                                    
                                    <div class="modal-body">
                                        <p class="font-weight-bold mb-2"> Are you sure to reject this Journal ?</p>
                                    </div>

                                    <div class="modal-footer">
                                        <form action="{{ route('reject-journal', @$journals->first()->id) }}" method="POST">
                                            @method('PATCH')
                                            @csrf
                                            <div class="row justify-content-end no-gutters">
                                                <button type="submit" class="btn btn-danger px-4 mr-2">Reject</button>
                                                <button type="button" class="btn btn-light text-muted" data-dismiss="modal">Cancel</button>
                                            </div>
                                        </form> 
                                    </div>
                                </div>
                            </div>
                        </div>

                    </td>
                    @endif
                </tr>   
                @foreach($journals->slice(1) as $journal)
                <tr>
                <td>{!! $journal->status == 0 ? '<i class="fa fa-clock text-warning"></i>' : ($journal->status== 1 ? '<i class="fa fa-times text-danger"></i>' : '<i class="fa fa-check text-success"></i>') !!} {{$journal->description}} </td>
                <td>{{$journal->minute}} Menit</td>
                <td>
                    <a href="#" class="btn btn-sm btn-success font-weight-bold mr-2 btnDetail" >
                        <i class="far fa-eye"></i> Detail
                    </a>
                    <a href="#" class="btn  btn-sm btn-primary font-weight-bold mr-2 btnAktivasi">
                        <i class="fas fa-check"></i> Aktifasi
                    </a>
                </td>
                </tr>
                <tr>
                    <td>
                        <a href="#" class="btn btn-sm btn-success font-weight-bold mr-2 btnDetail" >
                            <i class="far fa-eye"></i> Detail
                        </a>
                        <a href="#" class="btn  btn-sm btn-primary font-weight-bold mr-2 btnAktivasi">
                            <i class="fas fa-check"></i> Aktifasi
                        </a>
                    </td>
                </tr>
                @endforeach 
                @endforeach
            </tbody>
        </table>
    </div>
    <!--end::Body-->
</div>
@endsection

@section('script')
@endsection