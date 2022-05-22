@extends("layout.base")
@section("content")
<!-- Begin Page Content -->
 <div class="container-fluid">

     <!-- Page Heading -->
     <!-- <h1 class="h3 mb-2 text-gray-800">Tables</h1> -->


     <!-- DataTales Example -->
     <div class="card shadow mb-4">
         <div class="card-header py-3">
             <h6 class="h3 m-0 font-weight-bold text-primary">Laporan Surat Keluar</h6>
         </div>
         <div class="row mx-2">
             <div class="col-xl-6 col-md-6">

                 <div class="form-group">
                     <div class="row my-2">
                         <div class="col">
                             <label>Dari Tanggal</label>
                             <div class="input-group">
                                 <div class="input-group-prepend">
                                     <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                 </div>
                                 <input type="date" name="tgl_dari" class="form-control" id="tgl_dari"
                                     data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                             </div>
                         </div>
                         <div class="col">

                             <label>Hingga Tanggal</label>
                             <div class="input-group">
                                 <div class="input-group-prepend">
                                     <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                 </div>
                                 <input type="date" name="tgl_to" class="form-control" id="tgl_to"
                                     data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                             </div>
                         </div>

                     </div>
                     <div class="pt-3">
                         <button type="button" class="btn btn-primary" id="btn_proses">Proses</button>
                     </div>
                 </div>
             </div>

         </div>
         <hr class="sidebar-divider">


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
                         </tr>
                     </thead>
                     <tbody id="tbody">
                         @foreach ($surat as $sr)
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $sr->no_surat }}</td>
                            <td>{{ $sr->tgl_dikirim }}</td>
                            <td>{{ $sr->tujuan }}</td>
                            <td>{{ $sr->perihal }}</td>
                            <td>{{ $sr->disposisi->nama }}</td>
                            <td>
                                <a href="{{ asset("storage/surat_keluar/" . $sr->lampiran) }}" class="btn btn-success"><i class="fa-solid fa-file-arrow-down"></i></a>
                            </td>
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
    const btn_proses = document.getElementById('btn_proses');
    const tgl_dari = document.getElementById('tgl_dari');
    const tgl_to = document.getElementById('tgl_to');
    const tbody = document.getElementById('tbody');

    btn_proses.addEventListener('click', function () {
        tbody.innerHTML = `
        <tr>
            <td colspan='7' class='text-center'><i class='fa fa-spinner fa-spin'></i></td>
        </tr>
        `;
        const tgl_dari = document.getElementById('tgl_dari').value;
        const tgl_to = document.getElementById('tgl_to').value;
        const url = "/api/get-laporan-surat-keluar";
        fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            body: JSON.stringify({
                tgl_dari: tgl_dari,
                tgl_to: tgl_to
            })
        })
        .then(response => response.json())
        .then(data => {
            tbody.innerHTML = '';
            let i = 1;
            if(data.length == 0){
                tbody.innerHTML = `
                <tr>
                    <td colspan='7' class='text-center'>Tidak ada data</td>
                </tr>
                `;
            }
            data.forEach(element => {
                tbody.innerHTML += `
                <tr>
                    <td>${i}</td>
                    <td>${element.no_surat}</td>
                    <td>${element.tgl_dikirim}</td>
                    <td>${element.tujuan}</td>
                    <td>${element.perihal}</td>
                    <td>${element.disposisi.nama}</td>
                    <td>
                        <a href="/storage/surat_keluar/${element.lampiran}" class="btn btn-success"><i class="fa-solid fa-file-arrow-down"></i></a>
                    </td>
                </tr>
                `;
                i++;
            });
        })
        .catch(error => console.error(error));
    });

 </script>
 @endsection