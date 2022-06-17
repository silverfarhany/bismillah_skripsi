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
                    <th width="25%">Tanggal</th>
                    <th width="55%">Kegiatan</th>
                    <th width="20%">Jumlah Menit</th>
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
@endsection

@section('script')
@endsection