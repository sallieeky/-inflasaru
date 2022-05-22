@extends("layout.base")
@section("content")
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div> -->

    <!-- Content Row -->
    <div class="row justify-content-center">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h4 class="m-0 font-weight-bold text-primary text-center ">PROFIL</h4>
                </div>
                <div class="card-body">
                    <div class="row justify-content-center mb-3">
                        <label for="foto" style="cursor: pointer">
                        <img class="img-profile rounded-circle" style="width: 250px; height:250px" style="object-fit: cover"
                            src="{{ asset("storage/foto/" . Auth::user()->foto) }}" >
                        </label>
                    </div>

                    <!-- Divider -->
                    <hr class="sidebar-divider">
                    <div class="row justify-content-center">
                        <div class="col-md-10">

                            <form action="/profil/edit/{{ Auth::user()->id }}" enctype="multipart/form-data"
                                method="post" accept-charset="utf-8">
                                @csrf
                                <input type="file" name="gambar" class="d-none" id="foto" accept="image/*">
                                <div class="card-body row">
                                    <div class="col-md">
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input type="text" disabled value="{{ Auth::user()->nama }}" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label>Sub Bagian</label>
                                            <select class="form-control" name="id_subbagian">
                                                @foreach ($subbagian as $sb)
                                                <option value="{{ $sb->id }}" {{ $sb->id == Auth::user()->id_subbagian ? 'selected' : '' }}>{{ $sb->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="text" name="email" class="form-control" placeholder="" value="{{ Auth::user()->email }}"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label>Nomor Telepon</label>
                                            <input type="text" name="notelp" class="form-control" placeholder="" value="{{ Auth::user()->notelp }}"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <textarea name="alamat" class="form-control" placeholder="" required>{{ Auth::user()->alamat }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer justify-content-end">
                                    <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button> -->
                                    <button type="submit" class="btn btn-primary">Edit</button>
                                </div>
                            </form>
                        </div>



                    </div>


                </div>
            </div>



        </div>


        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h4 class="m-0 font-weight-bold text-primary text-center ">PASSWORD</h4>
                </div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-md-10">


                            <form action="/profil/ganti-password/{{ Auth::user()->id }}" enctype="multipart/form-data"
                                method="post" accept-charset="utf-8">
                                @csrf
                                <div class="card-body row">
                                    <div class="col-md">
                                        <div class="form-group">
                                            <label>Password Lama</label>
                                            <input type="text" name="password_lama" class="form-control @if(session('error')) is-invalid @endif">
                                            @if(session('error'))
                                                <small class="text-danger">{{ session("error") }}</small>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Password Baru</label>
                                            <input type="text" name="password_baru" class="form-control">
                                        </div>

                                    </div>
                                </div>

                                <div class="modal-footer justify-content-end">
                                    <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button> -->
                                    <button type="submit" name="tambah" class="btn btn-primary">Edit</button>
                                </div>
                            </form>
                        </div>

                    </div>


                </div>
            </div>



        </div>
    </div>
    <!-- <div class="row justify-content-center">
        


    </div> -->
</div>

<!-- End of Main Content -->
@endsection