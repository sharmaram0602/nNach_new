
    <style type="text/css">

      .image-5 {
            filter: hue-rotate(170deg); /* Rotate the hue by 180 degrees, turning the image red */
            -webkit-filter: hue-rotate(170deg); /* For compatibility with older versions of webkit */
        }


       .image-4 {
            filter: hue-rotate(500deg); /* Rotate the hue by 180 degrees, turning the image red */
            -webkit-filter: hue-rotate(500deg); /* For compatibility with older versions of webkit */
        }

         .image-3 {
             filter: hue-rotate(5000deg); /* Rotate the hue by 180 degrees, turning the image red */
            -webkit-filter: hue-rotate(5000deg); 
          }

         .image-2 {
             filter: hue-rotate(1000deg); /* Rotate the hue by 180 degrees, turning the image red */
            -webkit-filter: hue-rotate(1000deg); 
          }
    </style>

<div class="content">
        <nav class="mb-2" aria-label="breadcrumb">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="<?php echo base_url();?>">Dashboard</a></li>
            <li class="breadcrumb-item active"><?php echo $page_name;?></li>
          </ol>
        </nav> 
        
          <div class="row g-3 mb-2">
            <div class="col-auto">
              <h3 class="mb-0"><?php echo $page_name;?></h3>
            </div>
          </div>

    <div class="row">



       <?php if(in_array('viewBranch', $user_permission)): ?>


            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-4 col-xxl-4 p-2">
                <div class="card shadow">
                    <a class="nav-link"  href="<?php echo base_url('Banks/branches');?>" data-bs-toggle="" aria-expanded="false">
                            <div class="bg-holder d-dark-none" style="background-image:url(<?php echo base_url('assets/img/bg/9.png');?>);background-position:left bottom;background-size:auto; transform: scaleX(-1);">
                            </div>
                            <!--/.bg-holder-->

                            <div class="bg-holder d-light-none" style="background-image:url(<?php echo base_url('assets/img/bg/9-dark.png');?>);background-position:left bottom;background-size:auto; transform: scaleX(-1);">
                            </div>

                          <div class="card-body p-2 m-0">
                            <div class="d-flex d-sm-block justify-content-center">
                              <div class="m-3 row">

                                <div class="d-flex align-items-center col-sm-3 col-md-3 col-lg-4 col-xl-4 col-xxl-4">
                                  <div class="d-flex align-items-center  icon-wrapper-sm-settings shadow-primary-100" style="transform: rotate(-7.45deg); "><span class="uil-university text-primary  fs-xl-5 fs-lg-5 fs-3 z-index-1 ms-2"></span></div>
                                </div>
                                <div class="d-flex align-items-center col-sm-9 col-md-9 col-lg-8 col-xl-8 col-xxl-8">
                                  <span class="font-sans-serif text-900 text-primary fw-bold flex-shrink-0 fs-2">Branches</span>
                                </div>
                              </div>
                   
                            </div>
                          </div>
                    </a>
                </div>
            </div> 
         <?php endif; ?>



              <?php if(in_array('viewUser', $user_permission)): ?>

              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-4 col-xxl-4 p-2">
                <div class="card shadow">
                    <a class="nav-link"  href="<?php echo base_url('Users/');?>" data-bs-toggle="" aria-expanded="false">
                          
                            <div class="bg-holder d-dark-none image-5" style="background-image:url(<?php echo base_url('assets/img/bg/9.png');?>);background-position:left bottom;background-size:auto;transform: scaleX(-1);">
                            </div>
                            <!--/.bg-holder-->

                            <div class="bg-holder d-light-none image-5" style="background-image:url(<?php echo base_url('assets/img/bg/9-dark.png');?>);background-position:left bottom;background-size:auto;transform: scaleX(-1);">
                            </div>

                          <div class="card-body p-2 m-0">
                            <div class="d-flex d-sm-block justify-content-center">
                              <div class="m-3 row">

                                <div class="d-flex align-items-center col-sm-3 col-md-3 col-lg-4 col-xl-4 col-xxl-4">
                                  <div class="d-flex align-items-center  icon-wrapper-sm-settings shadow-warning-100" style="transform: rotate(-7.45deg); "> <span class="uil-users-alt text-warning fs-xl-5 fs-lg-5 fs-3 z-index-1 ms-2"></span></div>
                                </div>
                                <div class="d-flex align-items-center col-sm-9 col-md-9 col-lg-8 col-xl-8 col-xxl-8">
                                  <span class="font-sans-serif text-900 text-warning fw-bold flex-shrink-0 fs-2">Staff</span>
                                </div>
                              </div>
                   
                            </div>
                          </div>
                    </a>
                </div>
            </div>
          

              <?php endif; ?>


              <?php if(in_array('viewDesignation', $user_permission)): ?>

                      <div class="col-sm-6 col-md-6 col-lg-6 col-xl-4 col-xxl-4 p-2">
                        <div class="card shadow">
                            <a class="nav-link"  href="<?php echo base_url('Designations/');?>" data-bs-toggle="" aria-expanded="false">
                                  
                                    <div class="bg-holder d-dark-none image-2" style="background-image:url(<?php echo base_url('assets/img/bg/9.png');?>);background-position:left bottom;background-size:auto;transform: scaleX(-1);">
                                    </div>
                                    <!--/.bg-holder-->

                                    <div class="bg-holder d-light-none image-2" style="background-image:url(<?php echo base_url('assets/img/bg/9-dark.png');?>);background-position:left bottom;background-size:auto;transform: scaleX(-1);">
                                    </div>

                                  <div class="card-body p-2 m-0">
                                    <div class="d-flex d-sm-block justify-content-center">
                                      <div class="m-3 row">

                                        <div class="d-flex align-items-center col-sm-3 col-md-3 col-lg-4 col-xl-4 col-xxl-4">
                                          <div class="d-flex align-items-center  icon-wrapper-sm-settings shadow-success-100" style="transform: rotate(-7.45deg); "> <span class="uil-user-nurse text-success fs-xl-5 fs-lg-5 fs-3 z-index-1 ms-2"></span></div>
                                        </div>
                                        <div class="d-flex align-items-center col-sm-9 col-md-9 col-lg-8 col-xl-8 col-xxl-8">
                                          <span class="font-sans-serif text-900 text-success fw-bold flex-shrink-0 fs-2">Designations</span>
                                        </div>
                                      </div>
                           
                                    </div>
                                  </div>
                            </a>
                        </div>
                    </div>
          
              <?php endif; ?>



           
              <?php if(in_array('viewMessageTemplates', $user_permission)): ?>


               <div class="col-sm-6 col-md-6 col-lg-6 col-xl-4 col-xxl-4 p-2">
                <div class="card shadow">
                    <a class="nav-link"  href="<?php echo base_url('Messages/');?>" data-bs-toggle="" aria-expanded="false">
                          
                            <div class="bg-holder d-dark-none image-3" style="background-image:url(<?php echo base_url('assets/img/bg/9.png');?>);background-position:left bottom;background-size:auto;transform: scaleX(-1);">
                            </div>
                            <!--/.bg-holder-->

                            <div class="bg-holder d-light-none image-3" style="background-image:url(<?php echo base_url('assets/img/bg/9-dark.png');?>);background-position:left bottom;background-size:auto;transform: scaleX(-1);">
                            </div>

                          <div class="card-body p-2 m-0">
                            <div class="d-flex d-sm-block justify-content-center">
                              <div class="m-3 row">

                                <div class="d-flex align-items-center col-sm-3 col-md-3 col-lg-4 col-xl-4 col-xxl-4">
                                  <div class="d-flex align-items-center  icon-wrapper-sm-settings shadow-info-100" style="transform: rotate(-7.45deg); "> <span class="uil-comment-message text-info fs-xl-5 fs-lg-5 fs-3 z-index-1 ms-2"></span></div>
                                </div>
                                <div class="d-flex align-items-center col-sm-9 col-md-9 col-lg-8 col-xl-8 col-xxl-8">
                                  <span class="font-sans-serif text-900 text-info fw-bold flex-shrink-0 fs-2">Messages</span>
                                </div>
                              </div>
                   
                            </div>
                          </div>
                    </a>
                </div>
            </div>


            
            <?php endif; ?>


              <div class="col-sm-6 col-md-6 col-lg-6 col-xl-4 col-xxl-4 p-2">
                    <div class="card shadow">
                        <a class="nav-link"  href="<?php echo base_url('Settings/Profile');?>" data-bs-toggle="" aria-expanded="false">
                              
                                <div class="bg-holder d-dark-none image-4" style="background-image:url(<?php echo base_url('assets/img/bg/9.png');?>);background-position:left bottom;background-size:auto;transform: scaleX(-1);">
                                </div>
                                <!--/.bg-holder-->

                                <div class="bg-holder d-light-none image-4" style="background-image:url(<?php echo base_url('assets/img/bg/9-dark.png');?>);background-position:left bottom;background-size:auto;transform: scaleX(-1);">
                                </div>

                              <div class="card-body p-2 m-0">
                                <div class="d-flex d-sm-block justify-content-center">
                                  <div class="m-3 row">

                                    <div class="d-flex align-items-center col-sm-3 col-md-3 col-lg-4 col-xl-4 col-xxl-4">
                                      <div class="d-flex align-items-center  icon-wrapper-sm-settings shadow-danger-100" style="transform: rotate(-7.45deg); "> <span class="uil-user text-danger fs-xl-5 fs-lg-5 fs-3 z-index-1 ms-2"></span></div>
                                    </div>
                                    <div class="d-flex align-items-center col-sm-9 col-md-9 col-lg-8 col-xl-8 col-xxl-8">
                                      <span class="font-sans-serif text-900 text-danger fw-bold flex-shrink-0 fs-2">Profile</span>
                                    </div>
                                  </div>
                       
                                </div>
                              </div>
                        </a>
                    </div>
                </div>


           
             <?php if(in_array('viewDebitDates', $user_permission)): ?>

                
            
                 <div class="col-sm-6 col-md-6 col-lg-6 col-xl-4 col-xxl-4 p-2">
                    <div class="card shadow">
                        <a class="nav-link"  href="<?php echo base_url('DebitDate/');?>" data-bs-toggle="" aria-expanded="false">
                              
                                <div class="bg-holder d-dark-none image-6" style="background-image:url(<?php echo base_url('assets/img/bg/9.png');?>);background-position:left bottom;background-size:auto;transform: scaleX(-1);">
                                </div>
                                <!--/.bg-holder-->

                                <div class="bg-holder d-light-none image-6" style="background-image:url(<?php echo base_url('assets/img/bg/9-dark.png');?>);background-position:left bottom;background-size:auto;transform: scaleX(-1);">
                                </div>

                              <div class="card-body p-2 m-0">
                                <div class="d-flex d-sm-block justify-content-center">
                                  <div class="m-3 row">

                                    <div class="d-flex align-items-center col-sm-4 col-md-4 col-lg-4 col-xl-4 col-xxl-4">
                                      <div class="d-flex align-items-center  icon-wrapper-sm-settings shadow-primary-100" style="transform: rotate(-7.45deg); "> <span class="uil-calendar-alt text-primary fs-xl-5 fs-lg-5 fs-3 z-index-1 ms-2"></span></div>
                                    </div>
                                    <div class="d-flex align-items-center col-sm-8 col-md-8 col-lg-8 col-xl-8 col-xxl-8">
                                      <span class="font-sans-serif text-900 text-primary fw-bold flex-shrink-0 fs-2">Debit Dates</span>
                                    </div>
                                  </div>
                       
                                </div>
                              </div>
                        </a>
                    </div>
                </div>


                <?php endif; ?>


</div>                     
      