@extends('pembimbing.main')
@section('content')
<div class="card-body">
    <!--begin: Datatable-->
    @if ($members->count() > 0)
    <table class="table table-separate table-head-custom table-checkable" id="kt_datatable"> 
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">ID Member</th>
                <th scope="col">Name</th>
                <th scope="col">Mentor</th> 
                <th scope="col">Division</th>                                                                                                            
            </tr>
        </thead>
        <tbody>
            <?php $no = 1 ?>
            @foreach($members as $member)
            <tr>
                <td scope="row">{{ $no++ }}</td>
                <td>{{ $member->id }}</td>
                <td>{{ $member->name }}</td> 
                <td>{{ $mentors->find($member->mentors_id)->name }}</td>  
                <td>{{ $division->find($member->divisions_id)->name }}</td>  
                <td>
                    <i class="far fa-eye icon-md text-success" href="#" data-toggle="modal" data-target="#detail_member"></i>                         
                    <a class="far fa-edit icon-md text-warning" href="/editMember"> </a>
                                          
                </td>                                           
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
    <!--end: Datatable-->
</div>
</div>
<!--end::Card-->
@endsection

<!-- Modal-->
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
                            <table class="table table-separate">
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
                            </table>
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

@endsection