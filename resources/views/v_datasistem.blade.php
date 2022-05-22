@extends("layout.base")
@section("content")
<!-- Begin Page Content -->
 <div class="container-fluid">

     <!-- Page Heading -->
     <!-- <h1 class="h3 mb-2 text-gray-800">Tables</h1> -->


     <!-- DataTales Example -->
     <div class="row">
         <div class="col-xl-12 col-md-6">
            <div class="row">
                <div class="col-4">
                    <div class="card shadow me-4">
                        <div class="card-header py-3">
                            <h6 class="h3 m-0 font-weight-bold text-primary">Backup Database</h6>
                        </div>
       
       
                        <div class="card-body pt-0">
                            <div class="row ">
                                <div class="col">
                                    <div class="p-3">
                                        <a href="#" class="btn btn-primary btn-lg w-100" id="btn_backup">Backup</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card shadow me-4 ml-3">
                        <div class="card-header py-3">
                            <h6 class="h3 m-0 font-weight-bold text-primary">Restore Database</h6>
                        </div>
       
       
                        <div class="card-body pt-0">
                           <div class="row">
                               <form action="/restore-database" method="post" enctype="multipart/form-data"> 
                               @csrf
                               <div class="col-auto p-3">
                                   <div class="custom-file ">
                                        <input type="file" class="custom-file-input " id="customFile" name="file" accept=".sql">
                                        <label class="custom-file-label form-control" for="customFile">Choose file</label>
                                    </div>
                                </div>
                                <div class="col px-3">
                                   <button type="submit" class="btn btn-primary btn-lg" id="btn_restore">Restore</button>
                                </div>
                               </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6" id="alert">
                    @if(session('success'))
                       <div class="alert alert-success alert-dismissible fade show" role="alert">
                           <strong>{{session('success')}}</strong>
                           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                               <span aria-hidden="true">&times;</span>
                           </button>
                       </div>
                   @endif
                </div>
            </div>
         </div>

     </div>

 </div>
 <!-- /.container-fluid -->

 </div>
 <!-- End of Main Content -->

 <script>
var element = document.getElementById("datasistem");
element.classList.add("active");
 </script>

 <script>
     const btn_backup = document.getElementById('btn_backup');
     const btn_restore = document.getElementById('btn_restore');
     const customFile = document.getElementById('customFile');
     const alert = document.getElementById('alert');
        btn_backup.addEventListener('click', function(e) {
            fetch("/api/backup-database")
                .then(response => response.json())
                .then(data => {
                    alert.innerHTML = `
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> ${data.success}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    `;
                    console.log(data);
                })
        })

        // btn_restore.addEventListener('click', function(e) {
        //     let file = customFile.files[0];
        //     let formData = new FormData();
        //     formData.append('file', file);
        //     fetch("/api/restore-database", {
        //             method: 'POST',
        //             body: formData
        //         })
        //         .then(response => response.json())
        //         .then(data => {
        //             alert.innerHTML = `
        //             <div class="alert alert-success alert-dismissible fade show" role="alert">
        //                 <strong>Success!</strong> ${data.success}
        //                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        //                     <span aria-hidden="true">&times;</span>
        //                 </button>
        //             </div>
        //             `;
        //             console.log(data);
        //         })
        // })
 </script>
 @endsection