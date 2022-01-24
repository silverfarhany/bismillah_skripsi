@extends('peserta.main')
@section('content')
<div class="row">
    <div class="col-lg-4">
        <!--begin::Stats Widget 1-->
        <div class="card card-custom card-stretch gutter-b">
            <!--begin::Header-->
            <div class="card-header border-0 pt-6">
                <h3 class="card-title">
                    <span class="card-label font-weight-bolder font-size-h4 text-dark-75">Today's Task </span>
                </h3>
                <div class="card-toolbar">
                    <footer class="footer">Your Today's Task is :
                        <cite title="Source Title">Some Task</cite>
                    </footer>
                </div>
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body d-flex align-items-center justify-content-between pt-7 flex-wrap">
                <a href="#" class="btn btn-sm btn-primary font-weight-bolder px-6">Take</a>
            </div>
            <!--end::Body-->
        </div>
        <!--end::Stats Widget 1-->
        <div>
        </div>
    </div>
    <div class="col-lg-4">
        <!--begin::Stats Widget 1-->
        <div class="card card-custom card-stretch gutter-b">
            <!--begin::Header-->
            <div class="card-header border-0 pt-6">
                <h3 class="card-title">
                    <span class="card-label font-weight-bolder font-size-h4 text-dark-75">Today's Presence</span>
                </h3>
                <div class="card-toolbar">                    
                </div>
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body d-flex align-items-center justify-content-between pt-7 flex-wrap">
                <!-- Button trigger modal-->
                <button href="#" class="btn btn-sm btn-primary font-weight-bolder px-6" 
                data-toggle="modal" data-target="#submit_presence">Finish</button>
                <!--end button trigger-->
            </div>
                
            <!--end::Body-->
        </div>
        <!--end::Stats Widget 1-->
    </div>
    <div class="col-lg-4">
        <!--begin::Stats Widget 1-->
        <div class="card card-custom card-stretch gutter-b">
            <!--begin::Header-->
            <div class="card-header border-0 pt-6">
                <h3 class="card-title">
                    <span class="card-label font-weight-bolder font-size-h4 text-dark-75">Today's KR</span>
                </h3>
                <div class="card-toolbar">

                </div>
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body d-flex align-items-center justify-content-between pt-7 flex-wrap">
                <!-- Button trigger modal-->
                <button href="#" class="btn btn-sm btn-primary font-weight-bolder px-6" 
                data-toggle="modal" data-target="#submit_kr">Submit</button>
                <!--end button trigger-->
            </div>
            <!--end::Body-->
        </div>
        <!--end::Stats Widget 1-->
    </div>
</div>


        <!--begin::Stats big Widget -->
        <div class="card card-custom card-stretch gutter-b">
            <!--begin::Header-->
            <div class="card-header border-0 pt-6">
                <h3 class="card-title">
                    <span class="card-label font-weight-bolder font-size-h4 text-dark-75">Your progress day by day</span>
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
    


<!-- Modal-->
<div class="modal fade" id="submit_kr" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="submit_kr">Keagamaan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                Tilawah Al-Quran - Al-Kahfi [18]: 1 - 10
                <div class="form-group">                    
                    <div></div>
                    <div class="custom-file">
                     <input type="file" class="custom-file-input" id="customFile"/>
                     <label class="custom-file-label" for="customFile">Upload Bukti</label>
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

<!-- Modal-->
<div class="modal fade" id="submit_presence" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="submit_presence">Presensi Hari Ini</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">                
                <div class="form-group">
                    <label for="exampleTextarea">Tell Us How Was Your Day</label>
                    <textarea class="form-control" rows="5"></textarea>
                </div> 
                <div class="form-group">                    
                    <div></div>
                    <div class="custom-file">
                     <input type="file" class="custom-file-input" id="customFile"/>
                     <label class="custom-file-label" for="customFile">Today's activity</label>
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


    {{-- Hasil Kerja --}}
@endsection