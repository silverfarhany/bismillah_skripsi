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
                        <td width="40%"><b>A. Pengetahuan </b></td>
                    </tr>
                    @foreach($parameter_A as $parameter)
                    <tr>
                        <td width="40%">{{$parameter->description}}</td>
                        <td width="3%">: </td>
                        <td>{{empty($formEvaluasi->evaluasi) ? '-' : $formEvaluasi->evaluasi->where('parameter_id',$parameter->id)->first()->point}}</td>
                    </tr>
                    @endforeach

                    <tr>
                        <td width="40%"><b>B. Keterampilan </b></td>
                    </tr>
                    @foreach($parameter_B as $parameter)
                    <tr>
                        <td width="40%">{{$parameter->description}}</td>
                        <td width="3%">: </td>
                        <td>{{empty($formEvaluasi->evaluasi) ? '-' : $formEvaluasi->evaluasi->where('parameter_id',$parameter->id)->first()->point}}</td>

                    </tr>
                    @endforeach
                    <tr>
                        <td width="40%"><b>C. Sikap </b></td>
                    </tr>
                    @foreach($parameter_C as $parameter)
                    <tr>
                        <td width="40%">{{$parameter->description}}</td>
                        <td width="3%">: </td>
                        <td>{{empty($formEvaluasi->evaluasi) ? '-' : $formEvaluasi->evaluasi->where('parameter_id',$parameter->id)->first()->point}}</td>
                    </tr>
                    @endforeach
                    <tr>
                    <td width="40%"><b>Rata-rata </b>
                    <td width="3%">: </td>
                    <td>{{empty($formEvaluasi->average) ? '-' : $formEvaluasi->average}}</td>
                    </tr>

                    <tr>
                    <td width="40%"><b>Predikat </b>
                    <td width="3%">: </td>
                    <td>{{empty($formEvaluasi->predicate) ? '-' : $formEvaluasi->predicate}}</td>
                    </tr>

                </tbody>
            </table>
            <!--end::Table-->

        </div>

    </div>

    <br> </br>
    @if(empty($member->certificate))
    <button class="btn btn-success" disabled>Lihat Sertifikat</button>
    @else
    <a href="{{asset('/file/sertifikat_peserta/'.@$member->certificate->file)}}"  class="btn btn-success">Lihat Sertifikat</a>
    @endif
    <br> </br>

    @endsection