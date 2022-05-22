@extends("layout.base")
@section("content")
<!-- Begin Page Content -->
 <div class="container-fluid">

     <!-- Page Heading -->
     <!-- <h1 class="h3 mb-2 text-gray-800">Tables</h1> -->


     <!-- DataTales Example -->
     <div class="card shadow mb-4">
         <div class="card-header py-3">
             <h6 class="h3 m-0 font-weight-bold text-primary">Arsip Surat Keluar</h6>
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
                             <th>Tanggal Dikirim</th>
                             <th>Tujuan</th>
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
                            <td>{{ date("d M y", strtotime($sr->tgl_dikirim)) }}</td>
                            <td>{{ $sr->tujuan }}</td>
                            <td>{{ $sr->perihal }}</td>
                            <td>
                                <div class="input-group">
                                    <select class="custom-select arsip_surat" id="surat_{{ $sr->id }}">
                                        <option>Choose...</option>
                                        @foreach ($arsip_keluar as $ak)
                                           <option value="{{ $ak->id }}" @if($ak->id == $sr->id_arsip) selected @endif>{{ $ak->no_arsip }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </td>
                            <td>
                                <a href="{{ asset("storage/surat_keluar/" . $sr->lampiran) }}" class="btn btn-success"><i class="fa-solid fa-file-arrow-down"></i></a>
                            </td>
                        </tr>
                        @endforeach
                     </tbody>
                 </table>
             </div>
         </div>
     </div>

     <!-- modal -->
     {{-- <div class="modal fade" id="add_surat_masuk">
         <div class="modal-dialog modal-lg">
             <div class="modal-content">
                 <div class="modal-header">
                     <h4 class="modal-title">Tambah Data</h4>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <div class="modal-body">
                     <p>
                     <form action="http://localhost/pengarsipan/admin/tambahsm" enctype="multipart/form-data"
                         method="post" accept-charset="utf-8">
                         <div class="card-body row">
                             <div class="col-md">
                                 <div class="form-group">
                                     <label>Nomor Surat</label>
                                     <input type="text" name="no_suratmasuk" class="form-control">
                                 </div>
                                 <div class="form-group">
                                     <label>Tanggal Diterima</label>
                                     <div class="input-group">
                                         <div class="input-group-prepend">
                                             <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                         </div>
                                         <input type="date" name="tanggal_masuk" value="2022-04-25" class="form-control"
                                             data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy"
                                             data-mask>
                                     </div>
                                 </div>
                                 <div class="form-group">
                                     <label>Asal</label>
                                     <input type="text" name="asal_surat" class="form-control" placeholder="Asal Surat"
                                         required="">
                                 </div>


                             </div>
                             <div class="col-md">
                                 <div class="form-group">
                                     <label>Perihal</label>
                                     <input type="text" name="asal_surat" class="form-control"
                                         placeholder="Perihal Surat" required="">
                                 </div>
                                 <div class="form-group">
                                     <label>Disposisi</label>
                                     <select class="form-control" name="id_indeks">
                                         <option selected>Pilih</option>
                                         <option value="1">
                                             PERENCANAAN </option>
                                         <option value="2">
                                             KEUANGAN </option>
                                         <option value="6">
                                             KETATA USAHAAN </option>
                                         <option value="10">
                                             SARANA DAN PRASARANA </option>
                                         <option value="11">
                                             KESENIAN </option>
                                         <option value="19">
                                             KEPEGAWAIAN </option>
                                         <option value="20">
                                             PERLENGKAPAN </option>
                                         <option value="21">
                                             ORGANISASI </option>
                                         <option value="22">
                                             PENDIDIKAN </option>
                                         <option value="23">
                                             KURIKULUM/PENGAWASAN </option>
                                         <option value="24">
                                             OLAHRAGA </option>
                                     </select>
                                 </div>
                                 <div class="form-group">
                                     <label>Lampiran</label>
                                     <div class="input-group">
                                         <div class="custom-file">s
                                             <input type="file" name="berkas_suratmasuk" class="custom-file-input">
                                             <label class="custom-file-label">Pilih dokumen</label>
                                         </div>
                                     </div>
                                     <small class="text-danger">Dokumen surat, bisa berupa doc, docx, pdf, jpg dan
                                         png.</small>
                                 </div>

                             </div>

                             <!-- <div class="form-group">
                                        <label>Keterangan</label>
                                        <textarea class="form-control" name="keterangan"
                                            placeholder="Keterangan"></textarea>
                                    </div> -->
                         </div>
                 </div>
                 <!-- /.card-body -->
                 </p>
                 <div class="modal-footer justify-content-between">
                     <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                     <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
                 </div>
             </div>

             </form>
         </div>
         <!-- /.modal-content -->
     </div> --}}
     <!-- /.modal-dialog -->

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
               const url = '/api/arsip/surat-keluar/update-arsip/' + id_surat;
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