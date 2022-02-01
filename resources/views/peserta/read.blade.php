@extends('pembimbing.main')
@section('content')
<div class="row">   
     <div class="col-md-4 mt-3">
        <div class="card" style="width: 18rem;height:20rem";>
            <img class="card-img-top"  alt="Card image cap" style="height:12rem";>
            <div class="card-body">
                <h5 class="card-title"><center>Nama Siswa</center></h5>
                 {{-- <center>
                     @if($playstations->status == 'Ada')
                     <a href="#" class="btn btn-primary">Tersedia</a>
                     @else
                     <a href="#" class="btn btn-danger">Dipinjam</a>
                     @endif
                    </center> --}}
            </div>
        </img>
        </div>
     </div>

     <div class="col-md-4 mt-3">
        <div class="card" style="width: 18rem;height:20rem";>
            <img class="card-img-top"  alt="Card image cap" style="height:12rem";>
            <div class="card-body">
                <h5 class="card-title"><center>Nama Siswa</center></h5>
                 <center>                     
                     <a href="#" class="btn btn-primary">Lihat</a>                   
                    </center>
            </div>
        </img>
        </div>
     </div>

     <div class="col-md-4 mt-3">
        <div class="card" style="width: 18rem;height:20rem";>
            <img class="card-img-top"  alt="Card image cap" style="height:12rem";>
            <div class="card-body">
                <h5 class="card-title"><center>Nama Siswa</center></h5>
                 {{-- <center>
                     @if($playstations->status == 'Ada')
                     <a href="#" class="btn btn-primary">Tersedia</a>
                     @else
                     <a href="#" class="btn btn-danger">Dipinjam</a>
                     @endif
                    </center> --}}
            </div>
        </img>
        </div>
     </div>
</div>

@endsection