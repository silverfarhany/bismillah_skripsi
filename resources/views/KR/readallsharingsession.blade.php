@extends('pembimbing.main')
@section('content')

<!--begin::Card-->
<div class="card card-custom">
    <div class="card-header flex-wrap py-5">
        <div class="card-title">
            <h3 class="card-label">Data Sharing session 
            <div class="text-muted pt-2 font-size-sm">all data Sharing Session</div></h3>
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
        <table class="table table-separate table-head-custom table-checkable" id="modalofdate">
            <div class="form-group row">                
                <div class="col-lg-4 col-md-9 col-sm-12">
                 <a href="" class="btn btn-light-primary font-weight-bold" data-toggle="modal" data-target="#modalofdate">Select Date</a>
                </div>
               </div>
              </div>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Date</th>
                    <th>Sharing Title</th>
                    <th>Presenter</th>                                                                 
                    <th>Materi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Tugas 1</td>
                    <td>Hayes Boule</td>
                    <td>Casper-Kerluke</td> 
                    <td>Casper-Kerluke</td>                           
                </tr>
                <tr>
                    <td>2</td>
                    <td>tugas 2</td>
                    <td>Humbert Bresnen</td>
                    <td>Hodkiewicz and Sons</td>                           
                    <td>Casper-Kerluke</td> 
                </tr>
                <tr>
                    <td>3</td>
                    <td>tugas 3</td>
                    <td>Jareb Labro</td>
                    <td>Kuhlman Inc</td>    
                    <td>Casper-Kerluke</td>                   
                </tr>
                <tr>
                    <td>4</td>
                    <td>ktosspell3</td>
                    <td>Krishnah Tosspell</td>
                    <td>Prosacco-Kessler</td>
                    <td>Casper-Kerluke</td>                           
                </tr>
                <tr>
                    <td>5</td>
                    <td>dkernan4</td>
                    <td>Dale Kernan</td>
                    <td>Bernier and Sons</td>                        
                </tr>          
            </tbody>
        </table>
        <!--end: Datatable-->
    </div>
</div>
<!--end::Card-->
@endsection


<!-- Modal-->
<div class="modal fade" id="modalofdate" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog" role="document"> 

        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalofdate">Select the range of date</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">                
                <div class="form-group row">                    
                    <div class="col-lg-9 col-md-9 col-sm-12">
                     <div class='input-group' id='kt_daterangepicker_2'>
                      <input type='text' class="form-control" readonly  placeholder="Select date range"/>
                      <div class="input-group-append">
                       <span class="input-group-text"><i class="la la-calendar-check-o"></i></span>
                      </div>
                     </div>
                    </div>
                   </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary font-weight-bold">Submit</button>
            </div>
        </div> 
    </div>
</div>      