 <!-- Content wrapper -->
 <div class="content-wrapper">
     <!-- Content -->

     <div class="container-xxl flex-grow-1 container-p-y">

         <div class="row">
             <div class="col-md-12">

                 <div class="card mb-4">
                     <h5 class="card-header">Profile Details</h5>
                     <!-- Account -->
                     <hr class="my-0" />
                     <div class="card-body">
                         <form class="form-horizontal form-material mx-2"
                             action="<?= base_url('/landinpage/home/output_selfuser')?>" method="post"
                             enctype="multipart/form-data">
                             <input type="hidden" name="ide" value="<?= $us->id_user?>">
                             <div class="row">
                                 <div class="mb-3 col-md-6">
                                     <label for="" class="form-label">Username</label>
                                     <input class="form-control" type="text" name="nm" id=""
                                         value="<?= $us->username?>" />
                                 </div>
                                 <div class="mb-3 col-md-6">
                                     <label for="emai" class="form-label">Nama</label>
                                     <input class="form-control" type="text" id="" name="nama" value="<?= $us->nama?>"
                                         placeholder="" />
                                 </div>
                                 <div class="mt-2">
                                     <button type="button" class="btn btn-primary me-2" data-bs-toggle="modal"
                                         data-bs-target="#doubleVerificationModal">
                                         Save changes
                                     </button>
                                     <button type="reset" class="btn btn-outline-secondary">Reset</button>
                                 </div>
                         </form>
                     </div>
                     <!-- /Account -->
                 </div>
                 <div class="card">
                     <h5 class="card-header">Change Account Password</h5>
                     <div class="card-body">
                         <div class="mb-3 col-12 mb-0">
                             <div class="alert alert-warning">
                                 <h6 class="alert-heading fw-bold mb-1">Want to change your password?
                                 </h6>
                                 <p class="mb-0">Please fill the verification form by clicking the change password
                                     button.</p>
                             </div>
                         </div>

                         <button type="button" class="btn btn-danger md-0 text-white" data-bs-toggle="modal"
                             data-bs-target="#exampleModal">Change Password</button>
                         <a class="" href="<?=base_url('landinpage/home/dashboard')?>">
                             <button type="button" class="btn btn-secondary md-0 text-white">Back</button></a>

                     </div>
                 </div>
             </div>
         </div>
     </div>
     <!-- / Content -->

     <div class="modal fade" id="doubleVerificationModal" tabindex="-1" aria-labelledby="doubleVerificationModalLabel"
         aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="doubleVerificationModalLabel">Saving Verification</h5>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                 </div>
                 <div class="modal-body">
                     <p>Are you sure you want to save the changes?</p>
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                     <button type="button" class="btn btn-primary" onclick="document.forms[0].submit();">Confirm
                         Save</button>
                 </div>
             </div>
         </div>
     </div>

     <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel">Password Verification</h5>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                 </div>
                 <div class="modal-body">
                     <div class="row">
                         <div class="col-sm-12">
                             <div class="card">
                                 <div class="card-body">
                                     <form class="form-horizontal form-material mx-2"
                                         action="<?= base_url('/landinpage/home/checkPassword')?>" method="post">
                                         <div class="item form-group">
                                             <!-- <h4 class="text-primary">Verification</h4> -->
                                             <!-- <hr></hr> -->
                                             <label class="control-label col-md-3 col-sm-3 col-xs-12">Enter
                                                 Password</label>
                                             <div class="">
                                                 <input name="pw" id="pw" class="form-control" required="required"
                                                     type="password">
                                             </div>
                                         </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="modal-footer">
                     <button type="submit" class="btn btn-primary">Check</button>
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                 </div>
                 </form>
             </div>
         </div>
     </div>

     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
     <script>
     // Initialize the first modal
     var exampleModal1 = new bootstrap.Modal(document.getElementById('exampleModal'));

     // Get the button that triggers the first modal
     var modalToggle1 = document.querySelector('[data-bs-target="#exampleModal"]');

     // Add a click event listener to the button to show the first modal
     modalToggle1.addEventListener('click', function() {
         exampleModal1.show();
     });
     </script>