@extends('pembimbing.main')
@section('content')

<!--begin::Card-->
<div class="card card-custom">
    <div class="card-header flex-wrap py-5">
        <div class="card-title">
            <h3 class="card-label">Data Peserta KP 
            <div class="text-muted pt-2 font-size-sm">Data Diri, Data Tugas, dan Data Presensi</div></h3>
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
                    <th>NIKP</th>                                                                       
                    <th>Data</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Tugas 1</td>
                    <td>14022</td>
                    <td>
                        <a href="#" class="btn btn-success font-weight-bold mr-2" data-toggle="modal" data-target="#detail_member">
                            <i class="far fa-user"></i> Data Diri
                        </a>
                        <a href="#" class="btn btn-warning font-weight-bold mr-2" data-toggle="modal" data-target="#tugas_member">
                            <i class="fas fa-book-open"></i> Data Tugas
                        </a>
                        <a href="#" class="btn btn-primary font-weight-bold mr-2" data-toggle="modal" data-target="#presensi_member">
                            <i class="fas fa-calendar-check"></i> Data Presensi
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


<!-- Modal-->
<!-- Modal data diri -->
<div class="modal fade" id="detail_member" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">                
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
             <!--begin::Stats big Widget -->
        <div class="card card-custom card-stretch gutter-b">
            <!--begin::Header-->
            <div class="card-header border-0 pt-6">
                <h3 class="card-title">
                    <div class="container">
                        <!--begin::Dashboard-->
                        <!--begin::Row-->                                         
                        <div class="card card-custom gutter-b">                            
                            <!--end::Header-->
                            <!--begin::Body-->
                            <div class="card-body py-0">
                                <!--begin::Table-->
                                {{-- <table class="table table-separate">
                                    <tbody>
                                        <tr>
                                            <td width="200px">Name</td>
                                            <td>: {{ $member->name }} </td>
                                        </tr>
                                        <tr>
                                            <td>NIKP</td>
                                            <td>: {{ $member->nikp }}</td>
                                        </tr>
                                        <tr>
                                            <td>Universitas</td>
                                            <td>: {{ $member->univ }} </td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td>: {{ $member->email }}</td>
                                        </tr>
                                        <tr>
                                            <td>Phone Number</td>
                                            <td>: {{ $member->phone }} </td>
                                        </tr>
                                        <tr>
                                            <td>Pembimbing</td>
                                            <td>: {{ $mentors->find($member->mentors_id)->name }} </td>
                                        </tr>
                                        <tr>
                                            <td>Divisi</td>
                                            <td>: {{ $division->find($member->divisions_id)->name }}</td>
                                        </tr>
                                        <tr>
                                            <td>Descripsi</td>
                                            <td>: {{ $member->description }} </td>
                                        </tr>            
                                        <tr>
                                            <td>CV</td>
                                            <td>: {{ $member->cv }} </td>
                                        </tr>            
                                        <tr>
                                            <td>Surat Magang</td>
                                            <td>: {{ $member->internship_letter }}</td>
                                        </tr>                    
                                    </tbody>
                                </table> --}}
                                <!--end::Table-->                                                         
                            </div>                    
                        </div>                                            
                    </div>
                </h3>
                <div class="card-toolbar">
    
                </div>
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body d-flex align-items-center justify-content-between pt-7 flex-wrap">
              
            </div>
            <!--end::Body-->
        </div>
        <!--end::Stats Widget 1-->
            </div>            
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">OK</button>                
            </div>
        </div>
    </div>
    </div>
 
<!-- Modal Data Tugas-->
<div class="modal fade" id="tugas_member" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">                
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
             <!--begin::Stats big Widget -->
        <div class="card card-custom card-stretch gutter-b">
            <!--begin::Header-->
            <div class="card-header border-0 pt-6">
                <h3 class="card-title">
                    <div class="container">
                        <!--begin::Dashboard-->
                        <!--begin::Row-->                                         
                        <div class="card card-custom gutter-b">                            
                            <!--end::Header-->
                            <!--begin::Body-->
                            <div class="card-body py-0">
                                <!--begin::Table-->
                                {{-- <table class="table table-separate">
                                    <tbody>
                                        <tr>
                                            <td width="200px">Name</td>
                                            <td>: {{ $member->name }} </td>
                                        </tr>
                                        <tr>
                                            <td>NIKP</td>
                                            <td>: {{ $member->nikp }}</td>
                                        </tr>
                                        <tr>
                                            <td>Universitas</td>
                                            <td>: {{ $member->univ }} </td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td>: {{ $member->email }}</td>
                                        </tr>
                                        <tr>
                                            <td>Phone Number</td>
                                            <td>: {{ $member->phone }} </td>
                                        </tr>
                                        <tr>
                                            <td>Pembimbing</td>
                                            <td>: {{ $mentors->find($member->mentors_id)->name }} </td>
                                        </tr>
                                        <tr>
                                            <td>Divisi</td>
                                            <td>: {{ $division->find($member->divisions_id)->name }}</td>
                                        </tr>
                                        <tr>
                                            <td>Descripsi</td>
                                            <td>: {{ $member->description }} </td>
                                        </tr>            
                                        <tr>
                                            <td>CV</td>
                                            <td>: {{ $member->cv }} </td>
                                        </tr>            
                                        <tr>
                                            <td>Surat Magang</td>
                                            <td>: {{ $member->internship_letter }}</td>
                                        </tr>                    
                                    </tbody>
                                </table> --}}
                                <!--end::Table-->                                                         
                            </div>                    
                        </div>                                            
                    </div>
                </h3>
                <div class="card-toolbar">
    
                </div>
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body d-flex align-items-center justify-content-between pt-7 flex-wrap">
              
            </div>
            <!--end::Body-->
        </div>
        <!--end::Stats Widget 1-->
            </div>            
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">OK</button>                
            </div>
        </div>
    </div>
    </div>

<!-- Modal Data Presensi-->
<div class="modal fade" id="presensi_member" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">                
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
             <!--begin::Stats big Widget -->
        <div class="card card-custom card-stretch gutter-b">
            <!--begin::Header-->
            <div class="card-header border-0 pt-6">
                <h3 class="card-title">
                    <div class="container">
                        <!--begin::Dashboard-->
                        <!--begin::Row-->                                         
                        <div class="card card-custom gutter-b">                            
                            <!--end::Header-->
                            <!--begin::Body-->
                            <div class="card-body py-0">
                                <!--begin::Table-->
                                {{-- <table class="table table-separate">
                                    <tbody>
                                        <tr>
                                            <td width="200px">Name</td>
                                            <td>: {{ $member->name }} </td>
                                        </tr>
                                        <tr>
                                            <td>NIKP</td>
                                            <td>: {{ $member->nikp }}</td>
                                        </tr>
                                        <tr>
                                            <td>Universitas</td>
                                            <td>: {{ $member->univ }} </td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td>: {{ $member->email }}</td>
                                        </tr>
                                        <tr>
                                            <td>Phone Number</td>
                                            <td>: {{ $member->phone }} </td>
                                        </tr>
                                        <tr>
                                            <td>Pembimbing</td>
                                            <td>: {{ $mentors->find($member->mentors_id)->name }} </td>
                                        </tr>
                                        <tr>
                                            <td>Divisi</td>
                                            <td>: {{ $division->find($member->divisions_id)->name }}</td>
                                        </tr>
                                        <tr>
                                            <td>Descripsi</td>
                                            <td>: {{ $member->description }} </td>
                                        </tr>            
                                        <tr>
                                            <td>CV</td>
                                            <td>: {{ $member->cv }} </td>
                                        </tr>            
                                        <tr>
                                            <td>Surat Magang</td>
                                            <td>: {{ $member->internship_letter }}</td>
                                        </tr>                    
                                    </tbody>
                                </table> --}}
                                <!--end::Table-->                                                         
                            </div>                    
                        </div>                                            
                    </div>
                </h3>
                <div class="card-toolbar">
    
                </div>
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body d-flex align-items-center justify-content-between pt-7 flex-wrap">
              
            </div>
            <!--end::Body-->
        </div>
        <!--end::Stats Widget 1-->
            </div>            
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">OK</button>                
            </div>
        </div>
    </div>
    </div>