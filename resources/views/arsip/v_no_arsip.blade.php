@extends("layout.base")
@section("content")
<!-- Begin Page Content -->
 <div class="container-fluid">

     <!-- Page Heading -->
     <!-- <h1 class="h3 mb-2 text-gray-800">Tables</h1> -->

     <!-- Content Row -->
     <div class="h3 pb-2">Data Nomor Arsip</div>
     <div class="row justify-content-center">
         @if(session("pesan"))
         <div class="col-12">
             <div class="alert alert-success">
                 {{ session('pesan') }}
             </div>
         </div>
         @endif
         @error("no_arsip")
         <div class="col-12">
             <div class="alert alert-danger">
                 Nomor arsip telah digunakan
             </div>
         </div>
         @endif
         <div class="col-xl-6 col-md-6 mb-4">
             <!-- DataTales Example -->
             <div class="card shadow mb-4">
                 <div class="card-header py-3">
                     <h6 class="h4 m-0 font-weight-bold text-primary">Nomor Arsip Surat Masuk</h6>
                 </div>
                 <div class="p-3">
                     <a href="" class="btn btn-primary" data-toggle="modal" data-target="#add_surat_masuk">+Tambah
                         Data</a>
                 </div>
                 <div class="card-body pt-0">
                     <div class="table-responsive">
                         <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                             <thead>
                                 <tr>
                                     <th style="width: 5%;">No</th>
                                     <th style="width: 20%;">Nomor Arsip</th>
                                     <th>Lokasi</th>
                                     <th>Banyak Surat</th>
                                     <th>Aksi</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 @foreach ($surat_masuk as $sm)
                                 <tr>
                                     <td>{{ $loop->iteration }}</td>
                                     <td>{{ $sm->no_arsip }}</td>
                                     <td>{{ $sm->lokasi }}</td>
                                     <td>@if($sm->suratmasuk) {{ count($sm->suratmasuk->where("id_disposisi",  '10')) }} @else 0 @endif</td>
                                     <td>
                                         <a href="#" class="btn btn-warning"  data-toggle="modal" data-target="#edit_surat_masuk_{{ $sm->id }}"><i class="fa-solid fa-pen-to-square"></i></a>
                                         <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#hapus_surat_masuk_{{ $sm->id }}"><i class="fa-solid fa-trash"></i></a>
                                     </td>
                                 </tr>
                                 @endforeach
                             </tbody>
                         </table>
                     </div>
                 </div>
             </div>
         </div>
         <div class="col-xl-6 col-md-6 mb-4">
             <!-- DataTales Example -->
             <div class="card shadow mb-4">
                 <div class="card-header py-3">
                     <h6 class="h4 m-0 font-weight-bold text-primary">Nomor Arsip Surat Keluar</h6>
                 </div>
                 <div class="p-3">
                     <a href="" class="btn btn-primary" data-toggle="modal" data-target="#add_surat_keluar">+Tambah
                         Data</a>
                 </div>
                 <div class="card-body pt-0">
                     <div class="table-responsive">
                         <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                             <thead>
                                 <tr>
                                     <th style="width: 5%;">No</th>
                                     <th style="width: 20%;">Nomor Arsip</th>
                                     <th>Lokasi</th>
                                     <th>Banyak Surat</th>
                                     <th>Aksi</th>
                                 </tr>
                             </thead>
                             <tbody>
                                @foreach ($surat_keluar as $sk)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $sk->no_arsip }}</td>
                                    <td>{{ $sk->lokasi }}</td>
                                    <td>@if($sk->suratkeluar) {{ count($sk->suratkeluar) }} @else 0 @endif</td>
                                    <td>
                                        <a href="#" class="btn btn-warning"  data-toggle="modal" data-target="#edit_surat_masuk_{{ $sk->id }}"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#hapus_surat_masuk_{{ $sk->id }}"><i class="fa-solid fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                             </tbody>
                         </table>
                     </div>
                 </div>
             </div>
         </div>
     </div>

     <!-- tambah modal surat masuk -->
     <div class="modal fade" id="add_surat_masuk">
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
                     <form action="/arsip/no-arsip/tambah" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                        @csrf 
                        <input type="hidden" name="tipe" value="sm">
                        <div class="card-body row">
                             <div class="col-md">
                                 <div class="form-group">
                                     <label>Nomor Arsip</label>
                                     <input type="text" name="no_arsip" class="form-control @error("no_arsip") is-invalid @enderror" placeholder="Nomor Arsip" required value="{{ old("no_arsip") }}">
                                        @error("no_arsip")
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                 </div>
                                 <div class="form-group">
                                     <label>Lokasi</label>
                                     <input type="text" name="lokasi" class="form-control" placeholder="Lokasi" required {{ old("lokasi") }}>
                                 </div>
                             </div>
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
     </div>
     <!-- /.modal-dialog -->

     @foreach ($arsip as $as)
    <!-- edit modal surat masuk -->
     <div class="modal fade" id="edit_surat_masuk_{{ $as->id }}">
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
                    <form action="/arsip/no-arsip/edit/{{ $as->id }}" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                       @csrf 
                       <div class="card-body row">
                            <div class="col-md">
                                <div class="form-group">
                                    <label>Nomor Arsip</label>
                                    <input type="text" name="no_arsip" class="form-control" placeholder="Nomor Arsip" value="{{ $as->no_arsip }}" required>
                                </div>
                                <div class="form-group">
                                    <label>Lokasi</label>
                                    <input type="text" name="lokasi" class="form-control" placeholder="Lokasi" value="{{ $as->lokasi }}" required>
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

    <!-- hapus modal surat masuk -->
    <div class="modal fade" id="hapus_surat_masuk_{{ $as->id }}">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Hapus Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Apakah anda ingin menghapus Nomor Arsip {{ $as->no_arsip }}</p>
                </div>
                <!-- /.card-body -->
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    <a href="/arsip/no-arsip/hapus/{{ $as->id }}" type="submit" class="btn btn-primary">Hapus</a>
                </div>
            </div>

            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
     @endforeach

     <!-- tambah modal surat keluar -->
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
                     <form action="/arsip/no-arsip/tambah" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                        @csrf 
                        <input type="hidden" name="tipe" value="sk">
                        <div class="card-body row">
                             <div class="col-md">
                                 <div class="form-group">
                                     <label>Nomor Arsip</label>
                                     <input type="text" name="no_arsip" class="form-control @error("no_arsip") is-invalid @enderror" placeholder="Nomor Arsip" required value="{{ old("no_arsip") }}">
                                     @error("no_arsip")
                                     <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                    @enderror
                                 </div>
                                 <div class="form-group">
                                     <label>Lokasi</label>
                                     <input type="text" name="lokasi" class="form-control" placeholder="Lokasi" required>
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


 </div>
 <!-- /.container-fluid -->

 </div>
 <!-- End of Main Content -->
 @endsection
 @section("script")
 <script>
    $(document).ready(function(){
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").html(fileName);
        });
    });
 </script>
 @endsection