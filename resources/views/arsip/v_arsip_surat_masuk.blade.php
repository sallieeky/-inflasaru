@extends("layout.base")
@section("content")
<!-- Begin Page Content -->
 <div class="container-fluid">

     <!-- Page Heading -->
     <!-- <h1 class="h3 mb-2 text-gray-800">Tables</h1> -->


     <!-- DataTales Example -->
     <div class="card shadow mb-4">
         <div class="card-header py-3">
             <h6 class="h3 m-0 font-weight-bold text-primary">Arsip Surat Masuk</h6>
         </div>
         <!-- <div class="p-3">
             <a href="" class="btn btn-primary" data-toggle="modal" data-target="#add_surat_masuk">+Tambah Data</a>
         </div> -->


         <div class="card-body">
             <div class="table-responsive">
                 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                     <thead>
                         <tr>
                             <th style="width: 5%;">No</th>
                             <th style="width: 20%;">Nomor Surat</th>
                             <th>Tanggal Diterima</th>
                             <th>Asal</th>
                             <th>Perihal</th>
                             <th>Nomor Arsip</th>
                             <th style="width: 5%; ">Lampiran</th>
                             <!-- <th>Aksi</th> -->
                         </tr>
                     </thead>
                     <tbody>
                         @foreach ($surat as $sr)
                             
                         <tr>
                             <td>{{ $loop->iteration }}</td>
                             <td>{{ $sr->no_surat }}</td>
                             <td>{{ date("d M y", strtotime($sr->tgl_diterima)) }}</td>
                             <td>{{ $sr->asal }}</td>
                             <td>{{ $sr->perihal }}</td>
                             <td>
                                 <div class="input-group">
                                     <select class="custom-select arsip_surat" id="surat_{{ $sr->id }}">
                                         <option>Choose...</option>
                                         @foreach ($arsip_masuk as $am)
                                            <option value="{{ $am->id }}" @if($am->id == $sr->id_arsip) selected @endif>{{ $am->no_arsip }}</option>
                                         @endforeach
                                     </select>
                                 </div>
                             </td>
                             <td>
                                 <a href="{{ asset("storage/surat_masuk/" . $sr->lampiran) }}" class="btn btn-success"><i class="fa-solid fa-file-arrow-down"></i></a>
                             </td>
                         </tr>
                         
                         @endforeach
                     </tbody>
                 </table>
             </div>
         </div>
     </div>


 </div>
 <!-- /.container-fluid -->

 </div>
 <!-- End of Main Content -->

 <script>
    const arsip_surat = document.querySelectorAll('.arsip_surat');
       arsip_surat.forEach(function(arsip_surat) {
           arsip_surat.addEventListener('change', function() {
               const id_arsip = this.value;
               const id_surat = this.id.split('_')[1];
               const url = '/api/arsip/surat-masuk/update-arsip/' + id_surat;
               const data = {
                   id_arsip: id_arsip,
               };
               fetch(url, {
                   method: 'POST',
                   body: JSON.stringify(data),
                   headers: {
                       'Content-Type': 'application/json'
                   }
               })
               .then(response => response.json())
               .then(data => {
                   console.log(data);
               })
           });
       });
</script>
 @endsection