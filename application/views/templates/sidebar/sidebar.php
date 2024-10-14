    <nav class="navbar navbar-vertical navbar-expand-lg" id="sidebar">
        <script>
          var navbarStyle = window.config.config.phoenixNavbarStyle;
          if (navbarStyle && navbarStyle !== 'transparent') {
            // document.querySelector('body').classList.add(navbar-${navbarStyle});
          }
        </script>
        <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
          <!-- scrollbar removed-->
          <div class="navbar-vertical-content mt-2">
            <ul class="navbar-nav flex-column fs-0" id="navbarVerticalNav">

              <li class="nav-item">
                <!-- parent pages-->



             <?php if(in_array('viewDashboard', $user_permission) || in_array('exportDashboard', $user_permission) || in_array('importDashboard', $user_permission)): ?>
              
                  <div class="nav-item-wrapper mt-2 "><a class="nav-link label-1" href="<?php echo base_url('Home');?>" role="button" data-bs-toggle="" aria-expanded="false" id="sidebarItem">
                    <div class="d-flex align-items-center" >
                      <span class="nav-link-icon">
                        <span class="fas fa-chart-pie"></span>
                      </span>
                      <span class="nav-link-text-wrapper">
                       <span class="nav-link-text">Dashboard</span>
        
                      </span>
                    </div>
                  </a>
                </div>

              <?php endif; ?>

              <?php if(in_array('createMandate', $user_permission) || in_array('updateMandate', $user_permission) || in_array('viewMandate', $user_permission) || in_array('deleteMandate', $user_permission)): ?>
  
                <div class="nav-item-wrapper mt-2"><a class="nav-link label-1" href="<?php echo base_url('Transaction');?>" role="button" data-bs-toggle="" aria-expanded="false" id="sidebarItem">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-rupee-sign"></span></span><span class="nav-link-text-wrapper"><span class="nav-link-text">Transactions</span></span>
                    </div>
                  </a>
                </div>

                <?php endif; ?>


                <?php if(in_array('createMandate', $user_permission) || in_array('updateMandate', $user_permission) || in_array('viewMandate', $user_permission) || in_array('deleteMandate', $user_permission)): ?>
  
                <div class="nav-item-wrapper mt-2"><a class="nav-link label-1" href="<?php echo base_url('Users/mandateCustomer');?>" role="button" data-bs-toggle="" aria-expanded="false" id="sidebarItem">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-user-friends"></span></span><span class="nav-link-text-wrapper"><span class="nav-link-text">Mandate Customers</span></span>
                    </div>
                  </a>
                </div>

                <?php endif; ?>


                <!-- Cancele Mandates -->
                <?php if(in_array('createCancelMandate', $user_permission) || in_array('updateCancelMandate', $user_permission) || in_array('viewCancelMandate', $user_permission) || in_array('exportCancelMandate', $user_permission)): ?>

                  <div class="nav-item-wrapper mt-2"><a class="nav-link label-1" href="<?php echo base_url('Users/cancelMandateCustomer');?>" role="button" data-bs-toggle="" aria-expanded="false" id="sidebarItem">
                      <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-user-xmark"></span></span><span class="nav-link-text-wrapper"><span class="nav-link-text">Canceled Mandates</span></span>
                      </div>
                    </a>
                  </div>
                <?php endif; ?>
                <!-- Cancele Mandates -->




                


              <div class="nav-item-wrapper  mt-2"><a class="nav-link label-1" href="<?php echo base_url('Settings/');?>" role="button" data-bs-toggle="" aria-expanded="false" id="sidebarItem">
                 <div class="d-flex align-items-center">
                    <span class="nav-link-icon">
                      <span class="fas fa-cog"></span>
                   </span>
                   <span class="nav-link-text-wrapper">
                      <span class="nav-link-text">Settings</span>
                   </span>
                 </div>
               </a>
             </div>
          
          <?php if(in_array('viewSystemLogs', $user_permission)): ?>

              <div class="nav-item-wrapper mt-2"><a class="nav-link label-1" href="<?php echo base_url('Change_logs');?>" role="button" data-bs-toggle="" aria-expanded="false" id="sidebarItem">
                  <div class="d-flex align-items-center" >
                    <span class="nav-link-icon">
                      <span class="fab fa-git-alt"></span>
                    </span>
                    <span class="nav-link-text-wrapper">
                     <span class="nav-link-text">System Logs</span>
      
                    </span>
                  </div>
                </a>
              </div>
          <?php endif; ?>     
	
                   
            <div class="nav-item-wrapper mt-2"><a class="nav-link label-1" href="<?php echo base_url();?>TermsAndConditions/" target="_BLANK" role="button" data-bs-toggle="" aria-expanded="false" id="sidebarItem">
                <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-comment-dots"></span>
                  </span><span class="nav-link-text-wrapper"><span class="nav-link-text">Terms & Conditions</span></span>
                </div>
              </a>
              
            </div>

            <div class="nav-item-wrapper mt-2"><a class="nav-link label-1" href="https://briideainnoventures.slite.page/p/TDCkE7BGghSVos/Knowledge-Base-SyncEnach" target="_BLANK" role="button" data-bs-toggle="" aria-expanded="false" id="sidebarItem">
                <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-book-open"></span>
                  </span><span class="nav-link-text-wrapper"><span class="nav-link-text">Knowledge Base</span></span>
                </div>
              </a>
              
            </div>

              </li>
              
            </ul>
          </div>
        </div>
        <div class="navbar-vertical-footer">
          <button class="btn navbar-vertical-toggle border-0 fw-semi-bold w-100 white-space-nowrap d-flex align-items-center"><span class="uil uil-left-arrow-to-left fs-0"></span><span class="uil uil-arrow-from-right fs-0"></span><span class="navbar-vertical-footer-text ms-2">Collapsed View</span></button>
        </div>
      </nav>
