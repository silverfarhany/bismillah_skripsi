@extends('pembimbing.main')
@section('content')

<div class="card card-custom">
    <div class="card-header">
     <h3 class="card-title">
      Add Data Peserta KP
     </h3>
     {{-- <a type="button" class="btn btn-success mr-2" href="/readmember"> Tabel Peserta KP </a> --}}
    </div>
    <!--begin::Form-->
    <form method="post" action ="/submitmember" enctype="multipart/form-data" id="addMember">
      @csrf
     <div class="card-body">
      <div class="form-group mb-8">
       <div class="alert alert-custom alert-default" role="alert">
        <div class="alert-icon"><i class="flaticon-warning text-primary"></i></div>
        <div class="alert-text">
         Data yang ditambahkan bersifat serius 
        </div>
       </div>
      </div>
      <div class="form-group row">
       <label  class="col-2 col-form-label">Pembimbing</label>
       <div class="col-10">
        {{ csrf_field() }}
        <select class="form-control" type="search" placeholder="Choose Mentor's Name" name="mentor_id" id="mentor_id">
          @foreach ($mentors as $mentor)
      <option value="{{ $mentor->id }}">{{ $mentor->name }}</option>
          @endforeach
      </select>
       </div>
      </div>
      <div class="form-group row">
       <label for="example-search-input" class="col-2 col-form-label">Divisi</label>
       <div class="col-10">
        <select class="form-control" type="search" placeholder="Choose Division's Name" name="division_id" id="division_id">
            @foreach ($division as $divisions)
        <option value="{{ $divisions->id }}">{{ $divisions->name }}</option>
        @endforeach
        </select>
       </div>
      </div>
      <div class="form-group row">
       <label for="example-SELECT" class="col-2 col-form-label">Start Date</label>
       <div class="col-10">
        <input class="form-control" type="date" placeholder="Start Date" id="start" name="start"/>
       </div>
      </div>
      <div class="form-group row">
       <label for="example-url-input" class="col-2 col-form-label">End Date</label>
       <div class="col-10">
        <input class="form-control" type="date" placeholder="End Date" id="end" name="end"/>
       </div>
      </div>  
      <div class="form-group row">
        <label for="example-url-input" class="col-2 col-form-label">Name</label>
        <div class="col-10">
         <input class="form-control" type="name" placeholder="Insert Name" id="name" name="name"/>
        </div>
       </div> 
       <div class="form-group row">
        <label for="example-url-input" class="col-2 col-form-label">Instansi / University</label>
        <div class="col-10">
         <input class="form-control" type="name" placeholder="insert their instansi or university's name" id="univ" name="univ"/>
        </div>
       </div> 
       <div class="form-group row">
        <label for="example-url-input" class="col-2 col-form-label">NIKP</label>
        <div class="col-10">
         <input class="form-control" type="name" placeholder="their NIKP"  id="nikp" name="nikp"/>
        </div>
       </div>
       <div class="form-group row">
        <label for="example-url-input" class="col-2 col-form-label">Email</label>
        <div class="col-10">
         <input class="form-control" type="email" placeholder="Insert Email" id="email" name="nikp"/>
        </div>
       </div> 
       <div class="form-group row">
        <label for="example-url-input" class="col-2 col-form-label">Telephone</label>
        <div class="col-10">
         <input class="form-control" type="tel" placeholder="Insert Phone Number"  id="phone" name="phone"/>
        </div>
       </div>   
       <div class="form-group row">
        <label for="example-url-input" class="col-2 col-form-label">CV</label>
        <div class="col-10">
         <input class="form-control" type="file" value="https://getbootstrap.com" id="cv" name="cv"/>
        </div>
       </div>  
       <div class="form-group row">
        <label for="example-url-input" class="col-2 col-form-label">Surat Magang</label>
        <div class="col-10">
         <input class="form-control" type="file" value="https://getbootstrap.com" id="internship_letter" name="internship_letter"/>
        </div>
       </div>  
       <div class="form-group row">
        <label for="example-url-input" class="col-2 col-form-label">Deskripsi</label>
        <div class="col-10">
         <textarea class="form-control" type="textarea"  id="description" name="description"> </textarea>
        </div>
       </div>  
     <div class="card-footer">
      <div class="row">
       <div class="col-2">
       </div>
       <div class="col-10">
        <button type="submit" id="addMember" class="btn btn-success mr-2">Add Member</button>
        <button type="reset" class="btn btn-secondary">Cancel</button>
       </div>
      </div>
     </div>
    </form>
   </div>
   <br>
<br>
<br>
   <!--begin::Card-->
<div class="card card-custom">
    <div class="card-header flex-wrap py-5">
        <div class="card-title">
            <h3 class="card-label">Data Peserta KP 
            <div class="text-muted pt-2 font-size-sm">all data Peserta</div></h3>
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
