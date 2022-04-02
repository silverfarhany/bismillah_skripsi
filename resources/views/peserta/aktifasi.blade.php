@extends('pembimbing.main')
@section('content')

<!--begin::Card-->
<div class="card card-custom">
    <div class="card-header flex-wrap py-5">
        <div class="card-title">
            <h3 class="card-label">Aktifasi Peserta KP 
            <div class="text-muted pt-2 font-size-sm">Aktifasi peserta KP yang sudah diterima</div></h3>
        </div>
        <div class="card-toolbar">
            <!--begin::Dropdown-->
            <div class="dropdown dropdown-inline mr-2">
                
                    
                </div>
                <!--end::Dropdown Menu-->
            </div>
            <!--end::Dropdown-->          
    </div>
    <div class="card-body">
        <!--begin: Datatable-->
        <table class="table table-separate table-head-custom table-checkable" id="kt_datatable">            
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Instansi Pendidikan</th>                                                                       
                    <th>Data</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Tugas 1</td>
                    <td>14022</td>
                    <td>
                        <a href="#" class="btn btn-success font-weight-bold mr-2">
                            <i class="far fa-eye"></i> Detail
                        </a> 
                        <a href="#" class="btn btn-primary font-weight-bold mr-2">
                            <i class="fas fa-check"></i> Aktifasi
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
</div>
<!--end::Card-->
@endsection
