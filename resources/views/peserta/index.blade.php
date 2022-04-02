@extends('peserta.main')
@section('content')
<div class="row">
    <div class="col-lg-4">
        <!--begin::Stats Widget 1-->
        <div class="card card-custom card-stretch gutter-b">
            <!--begin::Header-->
            <div class="card-header border-0 pt-6">
                <h3 class="card-title">
                    <span class="card-label font-weight-bolder font-size-h4 text-dark-75">Tugas Anda</span>
                </h3>
                <div class="card-toolbar">
                    <footer class="footer">
                        <cite title="Source Title">Some Task</cite>
                    </footer>
                </div>
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body d-flex align-items-center justify-content-between pt-7 flex-wrap">
                 <!-- Button trigger modal-->
                 <button href="#" class="btn btn-sm btn-primary font-weight-bolder px-6" 
                 data-toggle="modal" data-target="#take_task">Kerjakan</button>
                 <!--end button trigger-->
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
                    <span class="card-label font-weight-bolder font-size-h4 text-dark-75">Presensi</span>
                </h3>
                <div class="card-toolbar">                    
                </div>
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body d-flex align-items-center justify-content-between pt-7 flex-wrap">
                <!-- Button trigger modal-->
                <button href="#" class="btn btn-sm btn-primary font-weight-bolder px-6" 
                data-toggle="modal" data-target="#submit_presence">Selesai</button>
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
                    <span class="card-label font-weight-bolder font-size-h4 text-dark-75">Jurnal Harian</span>
                </h3>
                <div class="card-toolbar">

                </div>
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body d-flex align-items-center justify-content-between pt-7 flex-wrap">
                <!-- Button trigger modal-->
                <button href="#" class="btn btn-sm btn-primary font-weight-bolder px-6" 
                data-toggle="modal" data-target="#submit_kr">Lihat</button>
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
<div class="modal fade" id="take_task" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">                
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                You take today's task. Good luck!                                  
            </div>            
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">OK</button>                
            </div>
        </div>
    </div>
</div>

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
            <form method="post" action ="/submitpresence" id="submitPresence" enctype="multipart/form-data">    
                @csrf
            <div class="modal-body">          
            {{ csrf_field() }}          
                <div class="form-group">
                    <label for="exampleTextarea">Tell Us How Was Your Day</label>
                    <textarea class="form-control" rows="5" id="activity" name="activity"></textarea>
                </div> 
                <div class="form-group">                    
                    <div></div>
                    <div class="custom-file">
                     <input type="file" class="custom-file-input" id="proof"/>
                     <label class="custom-file-label" for="proof" id="proof" name="proof">Today's activity</label>
                    </div>
                   </div>   
            </div>            
            <div class="modal-footer">
                <button type="reset" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                <button type="submit" id="submitPresence" class="btn btn-primary font-weight-bold">Submit</button>
            </div>
        </form>
        </div>
    </div>
</div>


    {{-- Hasil Kerja --}}
@endsection