@extends("layout.base")
@section("content")
<!-- Begin Page Content -->
 <div class="container-fluid">

     <!-- Page Heading -->
     <!-- <h1 class="h3 mb-2 text-gray-800">Tables</h1> -->


     <!-- DataTales Example -->
     <div class="card shadow mb-4">
         <div class="card-header py-3">
             <h6 class="h3 m-0 font-weight-bold text-primary">Data User</h6>
         </div>
         <div class="p-3">
             <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#add_user">+Tambah User</a>
         </div>


         <div class="card-body pt-0">
             <div class="table-responsive">
                 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                     <thead>
                         <tr>
                             <th style="width: 5%;">No</th>
                             <th>Foto</th>
                             <th>Nama</th>
                             <th>Username</th>
                             <th>Sub Bagian</th>
                             <th>Email</th>
                             <th>Nomor Telepon</th>
                             <th style="width: 20%;">Alamat</th>
                             <th>Level</th>
                             <th style="width: 7%;">Aksi</th>
                         </tr>
                     </thead>
                     <tbody>
                        @foreach ($user as $us)      
                         <tr>
                             <td>{{ $loop->iteration }}</td>
                             <td><img src="{{ asset("storage/foto/" . $us->foto) }}" alt="foto user" class="img img-fluid"></td>
                             <td>{{ $us->nama }}</td>
                             <td>{{ $us->username }}</td>
                             <td>{{ $us->subbagian->nama }}</td>
                             <td>{{ $us->email }}</td>
                             <td>{{ $us->notelp }}</td>
                             <td>{{ $us->alamat }}</td>
                             <td>{{ $us->role }}</td>
                             <td>
                                 <a href="" class="btn btn-warning" data-toggle="modal" data-target="#ubah_user_{{ $us->id }}"><i class="fa-solid fa-pen-to-square"></i></a>
                                 <a href="" class="btn btn-danger"  data-toggle="modal" data-target="#hapus_user_{{ $us->id }}"><i class="fa-solid fa-trash"></i></a>
                             </td>
                         </tr>
                        @endforeach
                     </tbody>
                 </table>
             </div>
         </div>
     </div>

     <!-- modal -->
     <div class="modal fade" id="add_user">
         <div class="modal-dialog modal-lg">
             <div class="modal-content">
                 <div class="modal-header">
                     <h4 class="modal-title">Tambah User</h4>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <div class="modal-body">
                     <p>
                     <form action="/data-user/tambah" enctype="multipart/form-data" method="POST" accept-charset="utf-8">
                        @csrf
                         <div class="card-body row">
                             <div class="col-md">
                                 <div class="form-group">
                                     <label>Nama</label>
                                     <input type="text" name="nama" class="form-control" required>
                                 </div>

                                 <div class="form-group">
                                     <label>Sub Bagian</label>
                                     <select class="form-control" name="id_subbagian" required>
                                         <option selected>Pilih</option>
                                         @foreach ($subbagian as $sb)
                                            <option value="{{ $sb->id }}">{{ $sb->nama }}</option>
                                         @endforeach
                                     </select>
                                 </div>

                                 <div class="form-group">
                                     <label>Email</label>
                                     <input type="text" name="email" class="form-control" placeholder="" required>
                                 </div>
                                 <div class="form-group">
                                     <label>Nomor Telepon</label>
                                     <input type="text" name="notelp" class="form-control" placeholder="" required>
                                 </div>
                                 <div class="form-group">
                                     <label>Alamat</label>
                                     <textarea name="alamat" class="form-control" placeholder="" required></textarea>
                                 </div>


                             </div>
                             <div class="col-md">
                                 <div class="form-group">
                                     <label>Username</label>
                                     <input type="text" name="username" class="form-control" required>
                                 </div>
                                 <div class="form-group">
                                     <label>Password</label>
                                     <input type="password" name="password" class="form-control @if(session("pass_tambah")) is-invalid @endif" placeholder="" required>
                                     @if(session("pass_tambah")) <small class="text-danger">{{ session("pass_tambah") }}</small> @endif
                                 </div>
                                 <div class="form-group">
                                     <label>Konfirmasi Password</label>
                                     <input type="password" name="kpassword" class="form-control @if(session("pass_tambah")) is-invalid @endif" placeholder="" required>
                                     @if(session("pass_tambah")) <small class="text-danger">{{ session("pass_tambah") }}</small> @endif
                                 </div>

                                 <div class="form-group">
                                     <label>Level</label>
                                     <select class="form-control" name="role" required>
                                         <option selected>Pilih</option>
                                         <option value="admin">ADMIN</option>
                                         <option value="user">PENGGUNA</option>
                                     </select>
                                 </div>

                                 <div class="form-group">
                                     <label>Foto</label>
                                     <div class="input-group">
                                         <div class="custom-file">
                                             <input type="file" name="file" class="custom-file-input" accept="image/png, image/jpeg">
                                             <label class="custom-file-label">Pilih file</label>
                                         </div>
                                     </div>
                                     <small class="text-info">Upload foto dalam file png atau jpg.</small>
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
     </div>
     <!-- /.modal-dialog -->

     
     
    </div>
    <!-- /.container-fluid -->
    
</div>
<!-- End of Main Content -->

@foreach ($user as $us)
<!-- ubah modal -->
<div class="modal fade" id="ubah_user_{{ $us->id }}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>
                <form action="/data-user/edit/{{ $us->id }}" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                    @csrf
                    <div class="card-body row">
                        <div class="col-md">
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" name="nama" class="form-control" value="{{ $us->nama }}" required>
                            </div>

                            <div class="form-group">
                                <label>Sub Bagian</label>
                                <select class="form-control" name="id_subbagian" required>
                                    @foreach ($subbagian as $sb)
                                        <option value="{{ $sb->id }}" @if($us->id_subbagian == $sb->id ) selected @endif>{{ $sb->nama }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="email" class="form-control" value="{{ $us->email }}" required>
                            </div>
                            <div class="form-group">
                                <label>Nomor Telepon</label>
                                <input type="text" name="notelp" class="form-control" value="{{ $us->notelp }}" required>
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea name="alamat" class="form-control" required>{{ $us->alamat }}</textarea>
                            </div>


                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username" value="{{ $us->username }}" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control @if(session("pass_ubah")) is-invalid @endif">
                                @if(session("pass_ubah")) <small class="text-danger">{{ session("pass_ubah") }}</small> @endif
                            </div>
                            <div class="form-group">
                                <label>Konfirmasi Password</label>
                                <input type="password" name="kpassword" class="form-control @if(session("pass_ubah")) is-invalid @endif" >
                                @if(session("pass_ubah")) <small class="text-danger">{{ session("pass_ubah") }}</small> @endif
                            </div>

                            <div class="form-group">
                                <label>Level</label>
                                <select class="form-control" name="role" required>
                                    <option @if($us->role == "admin") selected @endif value="admin">ADMIN</option>
                                    <option @if($us->role == "user") selected @endif value="user">PENGGUNA</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Foto</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="file" class="custom-file-input" accept="image/png, image/jpeg" >
                                        <label class="custom-file-label">Pilih file</label>
                                    </div>
                                </div>
                                <small class="text-info">Upload foto dalam file png atau jpg.</small>
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


<!-- hapus modal -->
<div class="modal fade" id="hapus_user_{{ $us->id }}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Hapus User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Hapus data <strong>{{ $us->nama }}</strong></p>
            </div>
            <!-- /.card-body -->
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                <a href="/data-user/hapus/{{ $us->id }}" type="submit" class="btn btn-danger">Hapus</a>
            </div>
        </div>

        </form>
    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
@endforeach

 <script>
    var element = document.getElementById("datauser");
        element.classList.add("active");
 </script>
 @endsection