@extends('peserta.main')
@section('content') 

<div class="container">
    <!--begin::Dashboard-->
    <!--begin::Row-->

    {{-- {{$person = $session_id_roll }} --}}
    <div class="card card-custom gutter-b">
        <div class="card-header border-0 py-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label font-weight-bold font-size-h4 text-dark-75">Hasil Kerja Parktik anda</span>
            </h3>
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="card-body py-0">
            <!--begin::Table-->
            <table class="table table-separate">
                <tbody>
                    <tr>
                        <td width="200px">Your Name</td>
                        <td>:  </td>
                    </tr>
                    <tr>
                        <td>Your First task Score</td>
                        <td>: </td>
                    </tr>
                    <tr>
                        <td>Your Second task score</td>
                        <td>: </td>
                    </tr>
                    <tr>
                        <td>Your Third task score</td>
                        <td>: </td>
                    </tr>
                    <tr>
                        <td>Your Fourths task score</td>
                        <td>: </td>
                    </tr>
                    <tr>
                        <td>Your Final task score</td>
                        <td>: </td>
                    </tr>
                    <tr>
                        <td>Your Final score</td>
                        <td>: </td>
                    </tr>                    
                </tbody>
            </table>
            <!--end::Table-->   
        
        </div>

    </div>

    <br> </br>        
    <a href="/readcertificate" type="submit" class="btn btn-success">Lihat Sertifikat</a>            
    <br> </br>

@endsection