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

    <div class="row g-3">

       <?php if(in_array('createBranch', $user_permission) || in_array('viewBranch', $user_permission) || in_array('updateBranch', $user_permission) || in_array('deleteBranch', $user_permission) || in_array('exportBranch', $user_permission)   ): ?>
              <div class="col-sm-6 col-md-4 col-xl-3 col-xxl-4">
                <div class="card m-2 h-80 bg-warning" style="overflow: hidden;">
                   <a class="nav-link active"  href="<?php echo base_url('Banks/branches');?>" data-bs-toggle="" aria-expanded="false">
                    <div class="row g-1 align-items-center">
                        <div class="col-md-4 d-flex justify-content-center">
                            <span class="fa-solid fas fa-university  text-white fs-5 z-index-1  mt-3"></span>
                            <!--<span class="text-dark mt-3" data-feather="git-branch" style="height: 60px; width: 70px;"></span>-->
                        </div>
                        
                        <div class="col-md-8">
                            <div class="card-body">
                                <h4 class="card-title mb-1  text-white">Branches</h4>
                                
                                <p class="card-text"><small class=" text-white">Add, Manage</small></p>
                            </div>
                        </div>
                    </div> 
                    </a>
                </div>
              </div>
              <?php endif; ?>

              <?php 

              // echo "<pre>";
              // print_r($user_permission);
              // die();

              ?>

              <?php if(in_array('createUser', $user_permission) || in_array('viewUser', $user_permission) || in_array('updateUser', $user_permission) || in_array('deleteUser', $user_permission)): ?>
              
              <div class="col-sm-6 col-md-4 col-xl-3 col-xxl-4">
              <div class="card m-2 h-80 bg-facebook" style="overflow: hidden;">
              <a class="nav-link active" href="<?php echo base_url('Users/');?>" data-bs-toggle="" aria-expanded="false">
                  <div class="row g-1 align-items-center">
                      <div class="col-md-4 d-flex justify-content-center">
                      <span class="fa-solid fas fa-user-friends text-white e dark__text-100 fs-5 z-index-1  mt-3"></span>
                          <!-- <span class="text-success" data-feather="users" style="height: 60px; width: 60px;"></span> -->
                      </div>
                      <div class="col-md-8">
                          <div class="card-body">
                              <h4 class="card-title mb-1 text-white e dark__text-100">Staff</h4>
                              <p class="card-text"><small class="text-white e dark__text-100">Add, Manage</small></p>
                          </div>
                      </div>
                  </div>
              </a>
            </div>
              </div>

              <?php endif; ?>

              <?php if(in_array('createDesignation', $user_permission) || in_array('viewDesignation', $user_permission) || in_array('updateDesignation', $user_permission) 
                                        || in_array('deleteDesignation', $user_permission)): ?>
              <div class="col-sm-6 col-md-4 col-xl-3 col-xxl-4">
              <div class="card m-2 h-80 bg-github" style="overflow: hidden; ">
              <a class="nav-link active" href="<?php echo base_url('Designations/');?>" data-bs-toggle="" aria-expanded="false">
                  <div class="row g-1 align-items-center">
                      <div class="col-md-4 d-flex justify-content-center">
                      <span class="fa-solid fab fa-black-tie text-white dark__text-100 fs-5 z-index-1  mt-3"></span>
                          <!-- <span class="text-warning" data-feather="bookmark" style="height: 60px; width: 60px;"></span> -->
                      </div>
                      <div class="col-md-8">
                          <div class="card-body">
                              <h4 class="card-title mb-1 text-white dark__text-100" style=" overflow: show; white-space: nowrap;">Designations</h4>
                              <p class="card-text"><small class="text-white dark__text-100">Add, Manage</small></p>
                          </div>
                      </div>
                  </div>
             </a>
            </div>
              </div>
              <?php endif; ?>



              <?php if(in_array('createMessageTemplates', $user_permission) || in_array('updateMessageTemplates', $user_permission) || in_array('viewMessageTemplates', $user_permission) || in_array('deleteMessageTemplates', $user_permission) || in_array('exportMessageTemplates', $user_permission)): ?>

              <div class="col-sm-6 col-md-4 col-xl-3 col-xxl-4">
                <div class="card m-2 h-80 bg-info" style="overflow: hidden;">
                   <a class="nav-link active"  href="<?php echo base_url('Messages');?>" data-bs-toggle="" aria-expanded="false">
                    <div class="row g-1 align-items-center">
                        <div class="col-md-4 d-flex justify-content-center">
                            <span class=" fas fa-message  text-white fs-5 z-index-1  mt-3"></span>
                            <!--<span class="text-dark mt-3" data-feather="git-branch" style="height: 60px; width: 70px;"></span>-->
                        </div>
                        
                        <div class="col-md-8">
                            <div class="card-body">
                                <h4 class="card-title mb-1  text-white">Messages</h4>
                                <p class="card-text"><small class=" text-white">Add, Manage</small></p>
                            </div>
                        </div>
                    </div> 
                    </a>
                </div>
              </div>
            
            <?php endif; ?>


                <div class="col-sm-6 col-md-4 col-xl-3 col-xxl-4">
                    <div class="card m-2 h-80 bg-danger" style="overflow: hidden; ">
                        <a class="nav-link active" href="<?php echo base_url('Settings/Profile');?>" data-bs-toggle="" aria-expanded="false">
                            <div class="row g-1 align-items-center">
                                <div class="col-md-4 d-flex justify-content-center">
                                <span class="fa-solid fas fa-user-alt text-white fs-5 z-index-1  mt-3"></span>
                                    <!-- <span class="text-warning" data-feather="user" style="height: 60px; width: 60px;"></span> -->
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h4 class="card-title mb-1 text-white">Profile</h4>
                                        <p class="card-text "><small class="text-white">Account Details</small></p>
                                       
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>


             <?php if(in_array('createDebitDates', $user_permission) || in_array('updateDebitDates', $user_permission) || in_array('viewDebitDates', $user_permission) || in_array('deleteDebitDates', $user_permission) || in_array('exportDebitDates', $user_permission)): ?>

                
                <div class="col-sm-6 col-md-4 col-xl-3 col-xxl-4">
                        <div class="card m-2 h-80 bg-warning" style="overflow: hidden;">
                           <a class="nav-link active"  href="<?php echo base_url('DebitDate');?>" data-bs-toggle="" aria-expanded="false">
                            <div class="row g-1 align-items-center">
                                <div class="col-md-4 d-flex justify-content-center">
                                    <span class="fa-solid fas fa-university  text-white fs-5 z-index-1  mt-3"></span>
                                    <!--<span class="text-dark mt-3" data-feather="git-branch" style="height: 60px; width: 70px;"></span>-->
                                </div>
                                
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h4 class="card-title mb-1  text-white">Debit Dates</h4>
                                        
                                        <p class="card-text"><small class=" text-white">Add, Manage</small></p>
                                    </div>
                                </div>
                            </div> 
                            </a>
                        </div>
                </div>


                <?php endif; ?>


</div>                     
      