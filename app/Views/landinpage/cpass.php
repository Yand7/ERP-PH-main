 <!-- Content wrapper -->
 <div class="content-wrapper">
     <!-- Content -->

     <div class="container-xxl flex-grow-1 container-p-y">

         <div class="row">
             <div class="col-md-12">

                 <div class="card mb-4">
                     <h5 class="card-header">Change Password</h5>
                     <!-- Account -->
                     <hr class="my-0" />
                     <div class="card-body">
                         <form class="form-horizontal form-material mx-2"
                             action="<?= base_url('/landinpage/home/output_cpass')?>" method="post"
                             enctype="multipart/form-data">
                             <input type="hidden" name="ide" value="<?= $pp->id_user?>">
                             <div class="row">
                                 <div class="mb-3 col-md-12">
                                     <label for="" class="form-label">New Password</label>
                                     <input class="form-control" type="password" id="newPassword" name="p1"
                                         placeholder="New Password" />
                                 </div>
                                 <div class="mb-3 col-md-12">
                                     <label for="" class="form-label">Verify Password</label>
                                     <input class="form-control" type="password" id="verifyPassword" name="p2"
                                         placeholder="Verify Password" />
                                     <small class="form-text text-danger" id="passwordMismatchAlert"
                                         style="display: none;">
                                         Password must be the same.
                                     </small>
                                 </div>
                                 <div class="mt-2">
                                     <button disabled id="submitButton" type="button" class="btn btn-primary me-2"
                                         data-bs-toggle="modal" data-bs-target="#doubleVerificationModal">
                                         Save changes
                                     </button>
                                     <button type="reset" class="btn btn-outline-secondary me-2">Reset</button>
                                     <a class="text-dark" href="<?= base_url('/landinpage/home/user_s')?>">
                                         <button type="button" class="btn btn-secondary">Back</button></a>
                                 </div>
                         </form>
                     </div>
                     <!-- /Account -->
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

     <script>
     const newPasswordInput = document.getElementById('newPassword');
     const verifyPasswordInput = document.getElementById('verifyPassword');
     const submitButton = document.getElementById('submitButton');
     const passwordMismatchAlert = document.getElementById('passwordMismatchAlert');

     verifyPasswordInput.addEventListener('input', function() {
         if (verifyPasswordInput.value === newPasswordInput.value) {
             submitButton.disabled = false;
             passwordMismatchAlert.style.display = 'none';
         } else {
             submitButton.disabled = true;
             passwordMismatchAlert.style.display = 'block';
         }
     });
     </script>