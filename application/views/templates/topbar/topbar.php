
  
      <nav class="navbar navbar-top fixed-top navbar-expand navbar-slim" id="navbarDefault">
        <div class="collapse navbar-collapse justify-content-between">
          <div class="navbar-logo">

            <button class="btn navbar-toggler navbar-toggler-humburger-icon hover-bg-transparent" type="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalCollapse" aria-controls="navbarVerticalCollapse" aria-expanded="false" aria-label="Toggle Navigation"><span class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>
          <!--  <a class="navbar-brand me-1 me-sm-3" href="<?php echo base_url();?>index.html">-->
            <a class="navbar-brand me-1 me-sm-3" href="<?php echo base_url();?>#">
              <div class="d-flex align-items-center">
                <div class="d-flex align-items-center"><img src="<?php echo base_url();?>uploads/organization_logos/<?php echo $this->session->userdata('system_logo'); ?>" alt="phoenix" width="27" />
                  <p class="logo-text pt-2 ms-2 fw-bold text-black"><?php echo $this->session->userdata('system_name'); ?></p>
                </div>
              </div>
            </a>

          <!--  <button class="btn btn-primary my-3 me-1 px-1 py-1 btn-sm d-inline text-truncate d-inline text-truncate" type="button" data-bs-toggle="modal"  id="addEnquiry" data-bs-target="#addEnquiryOtp"> Add New Enquiry</button>-->
         
          </div>
           
    
             
          <ul class="navbar-nav navbar-nav-icons flex-row">

            <?php //if(in_array('createMandate', $user_permission)):?> 
            <!--  <button class="btn btn-phoenix-primary my-3 me-1 px-1 py-1 btn-sm d-inline text-truncate d-inline text-truncate" type="button" data-bs-toggle="modal" id="addMandateCustomer"  data-bs-target="#mandateCustomerModalCenter">Add Mandate Customer</button>-->
            <?php// endif; ?>
            <li class="nav-item">
              <span>Version 1.0.1</span>
            </li>

            <li class="nav-item">
              <div class="theme-control-toggle fa-icon-wait px-2">
                <input class="form-check-input ms-0 theme-control-toggle-input" type="checkbox" data-theme-control="phoenixTheme" value="dark" id="themeControlToggle" />
                <label class="mb-0 theme-control-toggle-label theme-control-toggle-light" for="themeControlToggle" data-bs-toggle="tooltip" data-bs-placement="left" title="Switch theme"><span class="icon" data-feather="moon"></span></label>
                <label class="mb-0 theme-control-toggle-label theme-control-toggle-dark" for="themeControlToggle" data-bs-toggle="tooltip" data-bs-placement="left" title="Switch theme"><span class="icon" data-feather="sun"></span></label>
              </div>
            </li>
      
            <li class="nav-item dropdown"><a class="nav-link lh-1 pe-0" id="navbarDropdownUser" href="#!" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false">
               <!-- <div class="avatar avatar-l ">
                  <img class="rounded-circle " src="<?php echo base_url();?>assets/img/team/40x40/57.webp" alt="" />

                </div>-->
                <div class="avatar avatar-l">
                  <img class="rounded-circle" src="<?php echo base_url('uploads/profile_pictures/' . $this->session->userdata('profile_picture')); ?>" alt="" />
                </div>
              </a>
              <div class="dropdown-menu dropdown-menu-end navbar-dropdown-caret py-0 dropdown-profile shadow border border-300" aria-labelledby="navbarDropdownUser">
                <div class="card position-relative border-0">
                  <div class="card-body p-0">
                    <div class="text-center pt-4 pb-3">
                      <div class="avatar avatar-xl ">
                        <img class="rounded-circle" src="<?php echo base_url('uploads/profile_pictures/' . $this->session->userdata('profile_picture')); ?>" alt="" />

                      </div>
                     <!--<div class="avatar avatar-xl ">
                        <img class="rounded-circle " src="<?php echo base_url();?>assets/img/team/72x72/57.webp" alt="" />

                      </div>--> 
                      <h6 class="mt-2 text-primary"><?php echo $this->session->userdata('firstname')." ".$this->session->userdata('lastname'); ?></h6>
                      <h6 class="mt-2 text-black"><?php echo $this->session->userdata('group_name'); ?></h6>
                      <h6 class="mt-2 text-black"><?php echo $this->session->userdata('organization_name').", ".$this->session->userdata('organization_city'); ?></h6>
                    </div>
                    <div class="mb-3 mx-3">
                      <a class="btn btn-phoenix-secondary d-flex flex-center w-100" href="<?php echo base_url('Auth/logout')?>"> <span class="me-2" data-feather="log-out"> </span>Sign out</a>
                    </div>

                  </div>
             
                </div>
              </div>
            </li>
          </ul>
        </div>
      </nav>
      <!-- Include jQuery -->
      <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
      
      <!-- Other scripts and libraries -->
      
      <script>
        $(document).ready(function () {
          // When the button is clicked, show the modal
          $('#addMandateCustomer').click(function () {
            $('#mandateCustomerModalCenter').modal('show');
          });
        });
      </script>
      