@extends('peserta.main')
@section('content')

<!--begin::Card-->
<div class="card card-custom">
    <div class="card-header flex-wrap py-5">
        <div class="card-title">
            <h3 class="card-label">Presensi Anda
                {{-- <div class="text-muted pt-2 font-size-sm">Record of your Presences</div> --}}
            </h3>
        </div>
        <div class="card-toolbar">
            <!--begin::Dropdown-->
            <div class="dropdown dropdown-inline mr-2">


            </div>
            <!--end::Dropdown Menu-->
        </div>
        <!--end::Dropdown-->
    </div>
    <div class="card-body d-flex align-items-center justify-content-between flex-wrap">
        <!--begin: Datatable-->
        <table class="table table-separate table-head-custom table-checkable" id="kt_datatable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tanggal</th>
                    <th>Mulai</th>
                    <th>Selesai</th>
                    <th>Aktifitas</th>
                    <th>Bukti</th>
                </tr>
            </thead>
            <tbody class="font-sm">
                @foreach($presences as $presence)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{date('d F Y',strtotime($presence->date))}}</td>
                    <td>{{date('H:i',strtotime($presence->start))}}</td>
                    <td>@if(!empty($presence->end)){{date('H:i',strtotime($presence->end))}}@endif</td>
                    <td>{{$presence->activity}}</td>
                    <td>@if(!empty($presence->proof))<a href="{{asset('file/proof_presence/'.$presence->proof)}}">Lihat Bukti</a>@endif</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <!--end: Datatable-->
    </div>
</div>
<!--end::Card-->
@endsection


