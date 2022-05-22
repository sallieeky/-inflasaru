@extends("layout.base")
@section("content")
<!-- Begin Page Content -->
 <div class="container-fluid">

     <!-- Page Heading -->
     <!-- <h1 class="h3 mb-2 text-gray-800">Tables</h1> -->


     <!-- DataTales Example -->
     <div class="card shadow mb-4">
         <div class="card-header py-3">
             <h6 class="h3 m-0 font-weight-bold text-primary">Data Surat Keluar</h6>
         </div>
         <div class="p-3">
             <a href="" class="btn btn-primary" data-toggle="modal" data-target="#add_surat_keluar">+Tambah Data</a>
         </div>
         <div class="card-body pt-0">
             <div class="table-responsive">
                 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                     <thead>
                         <tr>
                             <th style="width: 5%;">No</th>
                             <th style="width: 20%;">Nomor Surat</th>
                             <th>Tanggal Dikirim</th>
                             <th>Tujuan</th>
                             <th>Perihal</th>
                             <th>Disposisi</th>
                             <th style="width: 5%; ">Lampiran</th>
                             <th>Aksi</th>
                         </tr>
                     </thead>
                     <tbody>
                         @foreach($surat as $sr)
                         <tr>
                             <td>{{ $loop->iteration }}</td>
                             <td>{{ $sr->no_surat }}</td>
                             <td>{{ date("d M y", strtotime($sr->tgl_dikirim)) }}</td>
                             <td>{{ $sr->tujuan }}</td>
                             <td>{{ $sr->perihal }}</td>
                             <td>{{ $sr->disposisi->nama }}</td>
                             <td>
                                 <a href="{{ asset("storage/surat_keluar/" . $sr->lampiran) }}" class="btn btn-success"><i class="fa-solid fa-file-arrow-down"></i></a>
                             </td>
                             <td>
                                <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#edit_surat_keluar_{{ $sr->id }}"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#hapus_surat_keluar_{{ $sr->id }}"><i class="fa-solid fa-trash"></i></a>
                             </td>
                         </tr>
                         @endforeach
                     </tbody>
                 </table>
             </div>
         </div>
     </div>

        <!-- tambah modal -->
        <div class="modal fade" id="add_surat_keluar">
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
                        <form action="/surat/surat-keluar/tambah" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                           @csrf
                            <div class="card-body row">
                                <div class="col-md">
                                    <div class="form-group">
                                        <label>Nomor Surat</label>
                                        <input type="text" name="no_surat" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Dikirim</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                            </div>
                                            <input type="date" name="tgl_dikirim" class="form-control" required
                                                data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy"
                                                data-mask>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Tujuan</label>
                                        <input type="text" name="tujuan" class="form-control" placeholder="Tujuan Surat"
                                            required>
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-group">
                                        <label>Perihal</label>
                                        <input type="text" name="perihal" class="form-control"
                                            placeholder="Perihal Surat" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Disposisi</label>
                                        <select class="form-control" name="id_disposisi" required >
                                            @foreach ($disposisi as $dp)
                                               <option value="{{ $dp->id }}">{{ $dp->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Lampiran</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="file" required class="custom-file-input" accept="application/msword, application/pdf, .docx">
                                                <label class="custom-file-label">Pilih dokumen</label>
                                            </div>
                                        </div>
                                        <small class="text-info">Dokumen surat, bisa berupa doc, docx, pdf, jpg dan
                                            png.</small>
                                    </div>
   
                                </div>
   
                            </div>
                    </div>
                    <!-- /.card-body -->
                    </p>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </div>
   
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
   
        @foreach ($surat as $sr)
        <!-- edit modal -->
        <div class="modal fade" id="edit_surat_keluar_{{ $sr->id }}">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Data</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>
                        <form action="/surat/surat-keluar/edit/{{ $sr->id }}" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                           @csrf
                            <div class="card-body row">
                                <div class="col-md">
                                    <div class="form-group">
                                        <label>Nomor Surat</label>
                                        <input type="text" name="no_surat" class="form-control" required value="{{ $sr->no_surat }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Dikirim</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                            </div>
                                            <input type="date" name="tgl_dikirim" class="form-control" required value="{{ $sr->tgl_dikirim }}"
                                                data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy"
                                                data-mask>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Tujuan</label>
                                        <input type="text" name="tujuan" class="form-control" placeholder="Tujuan Surat" required value="{{ $sr->tujuan }}">
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-group">
                                        <label>Perihal</label>
                                        <input type="text" name="perihal" class="form-control" placeholder="Perihal Surat" required value="{{ $sr->perihal }}">
                                    </div>
                                    {{-- <div class="form-group">
                                        <label>Disposisi</label>
                                        <select class="form-control" name="id_disposisi" required>
                                            @foreach ($disposisi as $dp)
                                               <option value="{{ $dp->id }}" @if($dp->id == $sr->id_disposisi) selected @endif>{{ $dp->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div> --}}
                                    <div class="form-group">
                                        <label>Lampiran</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="file" class="custom-file-input" accept="application/msword, application/pdf, .docx">
                                                <label class="custom-file-label">Pilih dokumen</label>
                                            </div>
                                        </div>
                                        <small class="text-info">Dokumen surat, bisa berupa doc, docx, pdf, jpg dan
                                            png.</small>
                                    </div>
   
                                </div>
   
                            </div>
                    </div>
                    <!-- /.card-body -->
                    </p>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </div>
   
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
   
        <!-- hapus modal -->
        <div class="modal fade" id="hapus_surat_keluar_{{ $sr->id }}">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Hapus Surat Masuk</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Hapus data <strong>{{ $sr->no_surat }}</strong></p>
                    </div>
                    <!-- /.card-body -->
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <a href="/surat/surat-keluar/hapus/{{ $sr->id }}" type="submit" class="btn btn-danger">Hapus</a>
                    </div>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
        @endforeach

     <!-- modal -->
     {{-- <div class="modal fade" id="add_surat_keluar">
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
                                     <label>Tujuan</label>
                                     <input type="text" name="asal_surat" class="form-control"
                                         placeholder="Tujuan Surat" required="">
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
var element = document.querySelector("#suratnav");
var element1 = document.querySelector("#listsk");
var element2 = document.querySelector("#collapsesurat");
element2.classList.add("show");
element1.classList.add("active");
element.classList.add("active");
 </script>
 @endsection