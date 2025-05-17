@extends('dashboard.maindosen')
@section('content')
<main>
   <div class="row">
      <div class="col-sm-3">
          <div class="card mb-3">
              <div class="card-body text-center">
                  <i class="fa fa-user fa-5x" style="color: #007bff;"></i>
                  <p class="card-text mt-3">Validasi Proposal</p>
                  <p class="card-text">validasi pembimbing satu: {{ $jumlahproposal }}</p>
              </div>
          </div>
      </div>
      <div class="col-sm-3">
         <div class="card mb-3">
             <div class="card-body text-center">
                 <i class="fa fa-user fa-5x" style="color: #007bff;"></i>
                 <p class="card-text mt-3">Validasi Proposal</p>
                 <p class="card-text">validasi pembimbing dua: {{ $jumlahproposal2 }}</p>
             </div>
         </div>
     </div>
     <div class="col-sm-3">
      <div class="card mb-3">
          <div class="card-body text-center">
              <i class="fa fa-user fa-5x" style="color: #007bff;"></i>
              <p class="card-text mt-3">Validasi dokumen sidang</p>
              <p class="card-text">validasi pembimbing satu: {{ $jumlahsidang }}</p>
          </div>
      </div>
   </div>
  <div class="col-sm-3">
   <div class="card mb-3">
       <div class="card-body text-center">
           <i class="fa fa-user fa-5x" style="color: #007bff;"></i>
           <p class="card-text mt-3">Validasi dokumen sidang</p>
           <p class="card-text">validasi pembimbing dua: {{ $jumlahsidang2 }}</p>
       </div>
   </div>
</div>
   </div>
   <div class="row">
      <div class="col-sm-3">
          <div class="card mb-3">
              <div class="card-body text-center">
                  <i class="fa fa-user fa-5x" style="color: #007bff;"></i>
                  <p class="card-text mt-3">Jadwal sidang</p>
                  <p class="card-text">Jumlah Jadwal Sidang Ta: {{ $jumlahjadwal }}</p>
              </div>
          </div>
      </div>
    
@endsection