@extends('pembimbing.main')
@section('content')
    <div class="row">
        <div class="col-lg-6">
            <!--begin::Stats Widget 1-->
            <div class="card card-custom card-stretch gutter-b">
                <!--begin::Header-->
                <div class="card-header border-0 pt-6">
                    <h3 class="card-title">
                        <span class="card-label font-weight-bolder font-size-h4 text-dark-75">Pengajuan peserta KP </span>
                    </h3>                                         
                    <div class="card-toolbar">

                    </div>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body d-flex align-items-center justify-content-between pt-7 flex-wrap">
                    <span class="font-weight-bolder display5 text-dark-75 pl-5 pr-10">17
                    <small>Pengajuan</small>    
                    </span>                  
                </div>
                <!--end::Body-->
            </div>
            <!--end::Stats Widget 1-->
            <div>
            </div>
        </div>
        <div class="col-lg-6">
            <!--begin::Stats Widget 1-->
            <div class="card card-custom card-stretch gutter-b">
                <!--begin::Header-->
                <div class="card-header border-0 pt-6">
                    <h3 class="card-title">
                        <span class="card-label font-weight-bolder font-size-h4 text-dark-75">Peserta KP Periode ini</span>
                    </h3>
                    <div class="card-toolbar">

                    </div>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body d-flex align-items-center justify-content-between pt-7 flex-wrap">
                    <span class="font-weight-bolder display5 text-dark-75 pl-5 pr-10">35
                        <small>Peserta</small>    
                        </span>   
                </div>
                <!--end::Body-->
            </div>
            <!--end::Stats Widget 1-->
        </div>       
    </div> 
    
    
        <!--begin::Stats Widget 1-->
        <div class="card card-custom card-stretch gutter-b">
            <!--begin::Header-->
            <div class="card-header border-0 pt-6">
                <h3 class="card-title">
                    <span class="card-label font-weight-bolder font-size-h4 text-dark-75">Tugas Peserta</span>
                </h3>
                <div class="card-toolbar">
                    <!--begin::Button-->
            <a href="#" class="btn btn-primary font-weight-bolder" data-toggle="modal" data-target="#addTask">
                <span class="svg-icon svg-icon-md">
                    <!--begin::Svg Icon | path:/keen/theme/demo1/dist/assets/media/svg/icons/Design/Flatten.svg-->
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect x="0" y="0" width="24" height="24" />
                            <circle fill="#000000" cx="9" cy="15" r="6" />
                            <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3" />
                        </g>
                    </svg>
                    <!--end::Svg Icon-->
                </span>Create Task</a>
                <!--end::Button-->
                </div>
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body d-flex align-items-center justify-content-between pt-7 flex-wrap">
                <!--begin: Datatable-->
        <table class="table table-separate table-head-custom table-checkable" id="kt_datatable">            
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Tugas</th>                                                                       
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
                            <i class="far fa-eye"></i> Review
                        </a> 
                        <a href="#" class="btn btn-primary font-weight-bold mr-2">
                            <i class="fas fa-check"></i> Approve
                        </a> 
                        <a href="#" class="btn btn-danger font-weight-bold mr-2">
                            <i class="fas fa-times"></i> Reject
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
@endsection


<!-- Modal-->
<div class="modal fade" id="exampleModalCenter" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <form method="post" action ="/submittask"  id="addTask">
                @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="submit_presence">Create some Task</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">                                       
                <div class="form-group">
                    <label for="exampleTextarea">Member's Name</label>
                    {{ csrf_field() }}
                    <select class="form-control" type="search" placeholder="Choose Mentor's Name" name="members_id" id="members_id">
                        @foreach ($members as $member)
                    <option value="{{ $member->id }}">{{ $member->name }}</option>
                        @endforeach
                    </select>
                </div>             
                <div class="form-group">
                    {{ csrf_field() }}
                    <label for="exampleTextarea">Name of Task</label>
                    <input class="form-control" name="name" id="name"></input>
                </div> 
                <div class="form-group">
                    <label for="exampleTextarea">Description of Task</label>
                    <textarea class="form-control" rows="3" name="description" id="description"></textarea>
                </div> 
                <div class="form-group">
                    <label for="example-date-input" class="col-2 col-form-label">Deadline</label>                    
                     <input class="form-control" type="date" name="deadline" id="deadline" value="{{ date('Y-m-d') }}/>                    
                </div>                   
            </div>       
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                <button type="submit" id="addTask" class="btn btn-primary font-weight-bold">Save Task</button>
            </div>
        </form>
        </div>
    </div>
    </div>
