@extends('pembimbing.main')
@section('content')

<div class="card card-custom">
    <div class="card-header">
    <h3 class="card-title">
    Data Pengajuan Peserta Kerja Praktik
    </h3>
</div>
<div class="card-body">
 
 <!--begin::Stats Widget 1-->
 <div class="card card-custom card-stretch gutter-b">
    <!--begin::Header-->
      
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body d-flex align-items-center justify-content-between pt-7 flex-wrap">
        <!--begin: Datatable-->
<table class="table table-separate table-head-custom table-checkable" id="kt_datatable">            
    <thead>
        <tr>
            <th>#</th>
            <th>Nama</th>
            <th>Instansi Pendidikan</th>                                                                       
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td>Tugas 1</td>
            <td>14022</td>
            <td>
                <a href="#" class="btn btn-warning font-weight-bold mr-2">
                    <i class="far fa-eye"></i> Detail
                </a> 
                <a href="#" class="btn btn-primary font-weight-bold mr-2">
                    <i class="fas fa-check"></i> Terima Peserta
                </a> 
                <a href="#" class="btn btn-danger font-weight-bold mr-2">
                    <i class="fas fa-times"></i> Tolak Peserta
                </a>                        
            </td>                                     
        </tr>
        <tr>
            <td>2</td>
            <td>tugas 2</td>
            <td>Humbert Bresnen</td>                                     
        </tr>                     
    </tbody>
</table>
<!--end: Datatable-->	 
    </div>
    <!--end::Body-->
</div>
<!--end::Stats Widget 1-->
</div>       
</div>
</div>
<!--end::Card-->
@endsection