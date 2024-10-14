
      <div class="content">
       <nav class="mb-2" aria-label="breadcrumb">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="<?php echo base_url();?>">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url('Settings/');?>">Settings</a></li>
            <li class="breadcrumb-item active"><?php echo $page_name;?></li>
          </ol>
        </nav> 
        
          <div class="row g-3 mb-2">
            <div class="col-auto">
              <h3 class="mb-0"><?php echo $page_name;?></h3>
            </div>
          </div>
   
         <?php if(in_array('viewUser', $user_permission) || in_array('updateUser', $user_permission) || in_array('deleteUser', $user_permission)): ?>

        <div class="mb-2">
              <div class="d-flex flex-wrap gap-3">
                <div class="search-box input-group">
                    <input class="form-control search-input" type="text" placeholder="Search" aria-label="Recipient's username" aria-describedby="basic-addon2" id="searchTextCustomer" name="searchTextCustomer"/>
                    <span class="fas fa-search search-box-icon"></span> 
                    
                </div>
            

                <div class="scrollbar overflow-hidden-y">

                  <div class="btn-group position-static" role="group">
                   
                    <div class="btn-group position-static text-nowrap">
                      <button class="btn  btn-phoenix-secondary  flex-shrink-0" type="button" data-bs-toggle="dropdown"     data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent" data-bs-auto-close="true"><i class="fas fa-university"></i>
                        Branch<span class="fas fa-angle-down ms-2"></span></button>
                        <ul class="dropdown-menu scrollbar overflow-hidden-y h-30" id="branch_id_filter">
                            <li>
                                <div class="dropdown-item p-1">
                                   <input class="form-control search-input form-control-sm m-0" type="text" placeholder="Search Filter" id="searchBranchFilter" name="searchBranchFilter"/>
                                </div>
                                <div class="nav nav-links nav-item" id="clearBranchFilter">
                                   <a class="nav-link" href="#"><span>Clear Filter</span></a>
                                </div>

                              
                            </li>
                           
                          <li>
                             <hr class="dropdown-divider" />
                          </li>
                        </ul>
                    </div>


                    <div class="btn-group position-static text-nowrap dropdown">
                      <button class="btn btn-sm btn-phoenix-secondary  flex-shrink-0" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"  data-bs-auto-close="true"><i class="fas fa-filter"></i> More<span class="fas fa-angle-down ms-2"></span></button>
                        <ul class="dropdown-menu" id="more_filter">
                           
                           <li>
                                <div class="dropdown-item p-1">
                                  <input class="form-control search-input form-control-sm m-0" type="text" placeholder="Search Filter" id="searchMoreFilter" name="searchMoreFilter"/>
                               </div>
                                <div class="nav nav-links nav-item" id="clearMoreFilter">
                                    <a class="nav-link" href="#"><span>Clear Filter</span></a>
                                </div>
                           </li>
                           
                            <li>
                               <hr class="dropdown-divider" />
                            </li>

                          
                            
                            <li>
                               <div class="dropdown-item">
                                   <input class="form-check-input" type="checkbox" value="phoneFilter" id="phoneFilter" onchange="handleCheckboxChange('phoneFilter', 'phoneFilterValue')">
                                   <label class="form-check-label" for="phoneFilter">Phone</label>
                                    <div id="phoneFilterValue" class="d-none">

                                      <input type="text" id="phoneFilterInput" class="form-control form-control-sm mt-1" placeholder="Phone Number" name="phoneFilterInput">


                                    </div>
                               </div>
                            </li>
                            
                         
                            <li>
                                <div class="dropdown-item">
                                   <input class="form-check-input" type="checkbox" value="emailFilter" id="emailFilter"  onchange="handleCheckboxChange('emailFilter', 'emailFilterValue')">
                                   <label class="form-check-label" for="emailFilter">Email</label>
                                   <div id="emailFilterValue" class="d-none">
                                     
                                        <input type="email" id="emailFilterInput" class="form-control form-control-sm mt-1" placeholder="Email" name="emailFilterInput">
                                   </div>
                                </div>
                            </li>

                        </ul>
                    </div>


                  </div>
                </div>


                 
                  <?php if(in_array('importUser', $user_permission) || in_array('createUser', $user_permission)):?> 
                    <div class="ms-xxl-auto ms-xl-auto ms-lg-auto ms-md-auto ms-sm-auto">

                        <?php if(in_array('createUser', $user_permission)):?> 
                         
                           <button type="button" id="addBankUser" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#bankModalCenter"><span class="fas fa-plus me-2"></span>Add User</button>
                       
                        <?php endif; ?>

                         <?php if(in_array('importUser', $user_permission)):?> 

                            <button type="button" id="ImportBankUser" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#bankUserImportModalCenter"><span class="fas fa-upload me-2"></span>Import User</button>

                         <?php endif; ?>

                                           
                    </div>
                 <?php endif; ?>

              </div>
            </div>

      <?php endif; ?>
      
        <div class="card" >
 
            <div class="card-body">
             
                        <div class="table-responsive  mx-1 px-1">
                         <table class="table mb-0 fs--1 compact table-hover w-100" id="userdataTable" >
                            <thead>
                              <tr> 
                                <th class="white-space-nowrap border-top" >Sr No.</th>
                                <th class="white-space-nowrap border-top" >Name</th>
                                <th class="white-space-nowrap border-top" >Phone</th>
                                <th class="white-space-nowrap border-top" >Branch</th>
                                <th class="white-space-nowrap border-top" >Email</th>
                                <th class="white-space-nowrap border-top" >Designation</th>

                             
                              
                              <?php if(in_array('viewUser', $user_permission) || in_array('updateUser', $user_permission) 
                                        || in_array('deleteUser', $user_permission)): ?>
                              
                                <th class="white-space-nowrap border-top" scope="col">Action</th>
                              
                               <?php endif; ?>
                              
                              </tr>
                            
                            </thead>
                            <tbody class="list" id="userData">

                            </tbody>
                          </table>
                        </div>
                  
            </div>
          </div>
           

            <div class="table-responsive">
                <table class="table table-striped table-sm fs--1 mb-0 d-none" id="reporttableexcel">
                    <thead>
                        <tr> 
                            <th class="white-space-nowrap border-top" >Sr No.</th>
                            <th class="white-space-nowrap border-top" >Name</th>
                            <th class="white-space-nowrap border-top" >Phone</th>
                            <th class="white-space-nowrap border-top" >Branch</th>
                            <th class="white-space-nowrap border-top" >Email</th>
                            <th class="white-space-nowrap border-top" >Designation</th>
                        </tr>

                        <tbody class="list" id="showReportResultexcel">
                
                        
                        </tbody>
              </table>
            </div>
          
  
       <div class="modal fade" id="bankModalCenter" tabindex="-1" aria-labelledby="scrollingLongModalLabel2" aria-hidden="true" data-bs-backdrop="static">
          <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="tooltipModalLabel">Add Bank User</h5>
                <button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><span class="fas fa-times fs--1"></span></button>
              </div>
              <div class="modal-body">
               
                      <form id="bankUserForm" action="" class="row g-3 needs-validation" novalidate="">
                      
                          <input type="hidden" name="id">
                          <input type="hidden" name="sub_organization_branch_id">

                          <input type="hidden" name="organization_type" value="bank" id="organization_type">
                          <input type="hidden" name="ins_type" value="insert" id="ins_type">

                          <div class="col-md-4">

                            <label class="form-label" for="bank_user_first_name">First Name <span class="text-danger">*</span></label>

                            <input  type="text" class="form-control" name="bank_user_first_name" id="bank_user_first_name" value="" required pattern="[A-Za-z]+" >
                            <div class="invalid-feedback">Only Capital letters are allowed</div>

                          </div>
                          <div class="col-md-4">

                            <label class="form-label" for="bank_user_middlename">Middle Name</label>

                            <input class="form-control"  name="bank_user_middlename" id="bank_user_middlename" type="text" pattern="[A-Z]*">
                            <div class="invalid-feedback">Only Capital letters are allowed</div>

                            </div>
                          <div class="col-md-4">

                             <label class="form-label" for="bank_user_lastname">Last Name <span class="text-danger">*</span></label>

                            <input class="form-control"  name="bank_user_lastname" id="bank_user_lastname" type="text" required  pattern="[A-Z]+">
                            <div class="invalid-feedback">Only Capital letters are allowed</div>

                          </div>

                          <div class="col-md-6">

                            <label class="form-label" for="bank_user_email">Email</label>

                            <input class="form-control" name="bank_user_email"  id="bank_user_email" type="email" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}" />
                            <div class="invalid-feedback">Enter valid email ID</div>

                          </div>

                             <div class="col-md-6">

                            <label class="form-label" for="bank_user_phone">Phone/Mobile No.  <span class="text-danger">*</span></label>

                            <input class="form-control" name="bank_user_phone"  id="bank_user_phone" type="tel"  pattern="[0-9]{10}" maxlength="10"  oninput="this.value = this.value.replace(/[^0-9]/g, '');"/>
                            <div class="invalid-feedback">Only 10 digit number are allowed</div>

                          </div>

                        <div class="col-12">

                          <label class="form-label" for="bank_user_address">Address   <span class="text-danger">*</span></label>

                          <input class="form-control" id="bank_user_address" name="bank_user_address" type="text" placeholder="Complete Address">
                        </div>
                       
                        <div class="col-md-6">

                          <label class="form-label" for="bank_user_username">Username   <span class="text-danger">*</span></label>

                          <input class="form-control" name="bank_user_username"  id="bank_user_username" pattern="^[a-zA-Z0-9_]{3,20}$" type="text" />
                          <div class="invalid-feedback">Enter Valid Username (eg. lowercase, uppercase alphabet and number)</div>

                        </div>

                          <div class="col-md-6">

                          <label class="form-label" for="bank_user_password">Password   <span class="text-danger">*</span></label>

                          <input class="form-control" name="bank_user_password"  id="bank_user_password" type="password" />
                          <div id="password-strength-indicator"></div>

                        </div>


                        <div class="col-md-6">

                          <label class="form-label" for="bank_user_gender">Gender   <span class="text-danger">*</span></label>

                          <select class="form-select" name=bank_user_gender id="bank_user_gender">
                            
                              <option value="" selected="selected">Select Gender</option>
                              <option value="1">Male</option>
                              <option value="2">Female</option>
                              <option value="3">Other</option>
                          </select>
                        </div>
                        

                        <div class="col-md-6" id="designationListData_MAIN">

                          <label class="form-label" for="bank_desigation_id">Designation   <span class="text-danger">*</span></label>

                        <div id="designationListData"></div>
                        </div>


                        <div class="col-md-6" id="bankListData_MAIN">

                          <label class="form-label" for="bank_id">Bank   <span class="text-danger">*</span></label>

                         <div id="bankListData"></div>
                        </div>

                        <!-- <div class="col-md-6" id="branchListData_MAIN">

                          <label class="form-label" for="branch_id">Branch   <span class="text-danger">*</span></label>

                          <div id="branchListData" style="color: red;"></div>
                        </div> -->

                        <div class="col-md-6" id="branchListData_MAIN">
                        <label class="form-label" for="branch_id">Branch<span class="text-danger">*</span></label>
                        <select class="form-select" id="branch_id" name="branch_id"> 
                            <option value="" selected="">Select Branch</option>
                        </select>
                    </div>
                      <!-- </form> -->
                      </form>
                    
              </div>
              <div class="modal-footer">
                <button class="btn btn-primary" id="btnSaveBankUser" type="submit">Save</button>
                <button class="btn btn-outline-primary" type="button"  id="closeButton" data-bs-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>            
                    

      <div class="modal fade" id="bankUserImportModalCenter" tabindex="-1" aria-labelledby="scrollingLongModalLabel2" aria-hidden="true" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="tooltipModalLabel">Import Bank User</h5>
              <button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><span class="fas fa-times fs--1"></span></button>
            </div>
            <div class="modal-body">
                  <p  class="form-label mb-5 text-danger" id="help_text">Import Your File, <a href="<?php echo base_url('Users/user_import_template/')?>">Click Here</a> for file format.</p>
                       
                        <div class="row" id="upload_area">
                          <form method="post" id="upload_form" enctype="multipart/form-data">

                            <div class="col-md-6">

                                  <label class="form-label" for="bank_user_gender">Select File   <span class="text-danger">*</span></label>

                                  <input type="file" name="file" id="csv_file" class="form-control" />
                            </div>

                

                        </div>
                        
                        <div class="table-responsive" id="process_area">

                        </div>

                  </div>
                 
                  <div class="modal-footer">
                     <button type="button" name="resetButton" id="resetButton" class="btn btn-danger">Reset</button>
                     <button class="btn btn-primary" id="btnCSVImportPreview" type="submit">Preview & Import</button>
                     <button type="button" name="import" id="import" class="btn btn-success">Import</button>
                     <button class="btn btn-outline-primary" type="button"  id="closeButton" data-bs-dismiss="modal">Close</button>
                  </div>

            </form>
          </div>
        </div>
      </div>            
                              

    <div class="modal fade" id="myModal_for_delete_message" tabindex="-1" aria-labelledby="scrollingLongModalLabel2" aria-hidden="true" data-bs-backdrop="static">
          <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="tooltipModalLabel">Delete User</h5>
                <button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><span class="fas fa-times fs--1"></span></button>
              </div>
              <div class="modal-body">
                Are sure to delete this user ?
              </div>
              <div class="modal-footer">
                <button class="btn btn-danger" id="btdelete" type="button">Delete</button>
                <button class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>  

        <div class="modal fade" id="Addpermission" tabindex="-1" aria-labelledby="scrollingLongModalLabel2" aria-hidden="true" data-bs-backdrop="static">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
          <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="tooltipModalLabel">Add Permission</h5>
              <button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><span class="fas fa-times fs--1"></span></button>
            </div>
            <div class="modal-body">
                <form id="myFormPermission" action="" class="row g-3">
                  
                    <label for="organizerMultiple" for="branch_name">Select Multiple Branches</label>
                    <select class="form-select" id="organizerMultiple" data-choices="data-choices" multiple="multiple" data-options='{"removeItemButton":true,"placeholder":true}'>
                         <div id="branchdata"></div>
                     
                    </select>
                    
                   
                    <div class="col-md-12">
                      <label class="form-label" for="permissions">Permissions</label>
                       <div class="table-responsive">
                          <table class="table table-striped table-sm fs--1 mb-0">
                            <thead>
                              <tr> 
                                <th class="sort border-top ps-3" data-sort="srno">#</th>
                                <th class="sort border-top ps-3" data-sort="create">Create</th>
                                <th class="sort border-top ps-3" data-sort="update">Update</th>

                                <th class="sort border-top ps-3" data-sort="view">View</th>
                                <th class="sort border-top ps-3" data-sort="delete">Delete</th>
                                <th class="sort border-top ps-3" data-sort="export">Export</th>
                                <th class="sort border-top ps-3" data-sort="import">Import</th>

                                <th class="sort border-top ps-3" data-sort="skip">Skip</th>
                                <th class="sort border-top ps-3" data-sort="cancelMandate">

                              </tr>
                            </thead>
                            <tbody class="list">

                               
                                <tr>
                                    <td class="align-middle ps-3 ">Users</td>
                                    <td class="align-middle ps-3 ">
                                        <input type="checkbox" name="permission[]" id="permissioncreateUser" value="createUser" class="form-check-input">
                                    </td>
                                    <td class="align-middle ps-3 ">
                                        <input type="checkbox" name="permission[]" id="permissionupdateUser" value="updateUser" class="form-check-input">
                                    </td>
                                    <td class="align-middle ps-3 ">
                                        <input type="checkbox" name="permission[]" id="permissionviewUser" value="viewUser" class="form-check-input">
                                    </td>
                                    <td class="align-middle ps-3 ">
                                        <input type="checkbox" name="permission[]" id="permissiondeleteUser" value="deleteUser" class="form-check-input">
                                    </td>
                                    <td class="align-middle ps-3 ">
                                        <input type="checkbox" name="permission[]" id="permissionexportUser" value="exportUser" class="form-check-input">
                                    </td>
                                    <td class="align-middle ps-3 ">
                                        <input type="checkbox" name="permission[]" id="permissionimportUser" value="importUser" class="form-check-input">
                                    </td>
                                    <td class="align-middle ps-3 ">-
                                        <!-- <input type="checkbox" name="permission[]" id="permissionskipUser" value="skipUser" class="form-check-input"> -->
                                    </td>
                                </tr>
                                

                                <tr>
                                    <td class="align-middle ps-3 ">Designations</td>
                                    <td class="align-middle ps-3 ">
                                        <input type="checkbox" name="permission[]" id="permissioncreateDesignation" value="createDesignation" class="form-check-input">
                                    </td>
                                    <td class="align-middle ps-3 ">
                                        <input type="checkbox" name="permission[]" id="permissionupdateDesignation" value="updateDesignation" class="form-check-input">
                                    </td>
                                    <td class="align-middle ps-3 ">
                                        <input type="checkbox" name="permission[]" id="permissionviewDesignation" value="viewDesignation" class="form-check-input">
                                    </td>
                                    <td class="align-middle ps-3 ">
                                        <input type="checkbox" name="permission[]" id="permissiondeleteDesignation" value="deleteDesignation" class="form-check-input">
                                    </td>
                                    <td class="align-middle ps-3 ">
                                        <input type="checkbox" name="permission[]" id="permissionexportDesignation" value="exportDesignation" class="form-check-input">
                                    </td>
                                    <td class="align-middle ps-3 ">
                                        <input type="checkbox" name="permission[]" id="permissionimportDesignation" value="importDesignation" class="form-check-input">
                                    </td>
                                    <td class="align-middle ps-3 ">-
                                        <!-- <input type="checkbox" name="permission[]" id="permissionskipDesignation" value="skipDesignation" class="form-check-input"> -->
                                    </td>

                                </tr>

                                <tr>
                                    <td class="align-middle ps-3 ">Mandates</td>
                                    <td class="align-middle ps-3 ">
                                        <input type="checkbox" name="permission[]" id="permissioncreateMandate" value="createMandate" class="form-check-input">
                                    </td>
                                    <td class="align-middle ps-3 ">
                                        <input type="checkbox" name="permission[]" id="permissionupdateMandate" value="updateMandate" class="form-check-input">
                                    </td>
                                    <td class="align-middle ps-3 ">
                                        <input type="checkbox" name="permission[]" id="permissionviewMandate" value="viewMandate" class="form-check-input">
                                    </td>
                                    <td class="align-middle ps-3 ">-
                                        <!-- <input type="checkbox" name="permission[]" id="permissiondeleteMandate" value="deleteMandate" class="form-check-input"> -->
                                    </td>
                                    <td class="align-middle ps-3 ">
                                        <input type="checkbox" name="permission[]" id="permissionexportMandate" value="exportMandate" class="form-check-input">
                                    </td>
                                    <td class="align-middle ps-3 ">
                                        <input type="checkbox" name="permission[]" id="permissionimportMandate" value="importMandate" class="form-check-input">
                                    </td>
                                    <td class="align-middle ps-3 ">
                                        <input type="checkbox" name="permission[]" id="permissionskipMandate" value="skipMandate" class="form-check-input">
                                    </td>

                                </tr>
                                
                                <!-- Cancel Mandates -->

                                <tr>
                                    <td class="align-middle ps-3 ">Cancel Mandates</td>
                                    <td class="align-middle ps-3 ">
                                        <input type="checkbox" name="permission[]" id="permissioncreateCancelMandate" value="createCancelMandate" class="form-check-input">
                                    </td>
                                    <td class="align-middle ps-3 ">-
                                        <!-- <input type="checkbox" name="permission[]" id="permissionupdateCancelMandate" value="updateCancelMandate" class="form-check-input"> -->
                                    </td>
                                    <td class="align-middle ps-3 ">
                                        <input type="checkbox" name="permission[]" id="permissionviewCancelMandate" value="viewCancelMandate" class="form-check-input">
                                    </td>
                                    <td class="align-middle ps-3 ">-
                                        <!-- <input type="checkbox" name="permission[]" id="permissiondeleteMandate" value="deleteMandate" class="form-check-input"> -->
                                    </td>
                                    <td class="align-middle ps-3 ">
                                        <input type="checkbox" name="permission[]" id="permissionexportCancelMandate" value="exportCancelMandate" class="form-check-input">
                                    </td>
                                    <td class="align-middle ps-3 ">
                                        -
                                    </td>
                                    <td class="align-middle ps-3 ">
                                        -
                                    </td>
                                </tr>
                                <!-- Cancel Mandates -->


                                <tr>
                                    <td class="align-middle ps-3 ">Branches</td>
                                    <td class="align-middle ps-3 ">
                                        <input type="checkbox" name="permission[]" id="permissioncreateBranch" value="createBranch" class="form-check-input">
                                    </td>
                                    <td class="align-middle ps-3 ">
                                        <input type="checkbox" name="permission[]" id="permissionupdateBranch" value="updateBranch" class="form-check-input">
                                    </td>
                                    <td class="align-middle ps-3 ">
                                        <input type="checkbox" name="permission[]" id="permissionviewBranch" value="viewBranch" class="form-check-input">
                                    </td>
                                    <td class="align-middle ps-3 ">
                                        <input type="checkbox" name="permission[]" id="permissiondeleteBranch" value="deleteBranch" class="form-check-input">
                                    </td>
                                    <td class="align-middle ps-3 ">
                                        <input type="checkbox" name="permission[]" id="permissionexportBranch" value="exportBranch" class="form-check-input">
                                    </td>
                                    <td class="align-middle ps-3 ">
                                        <input type="checkbox" name="permission[]" id="permissionimportBranch" value="importBranch" class="form-check-input">
                                    </td>
                                    <td class="align-middle ps-3 ">-
                                        <!-- <input type="checkbox" name="permission[]" id="permissionskipBranch" value="skipBranch" class="form-check-input"> -->
                                    </td>

                                </tr>
                                <tr>
                                    <td class="align-middle ps-3 ">Dashboard</td>
                                    <td class="align-middle ps-3 ">-
                                        <!-- <input type="checkbox" name="permission[]" id="permissioncreateDashboard" value="createDashboard" class="form-check-input"> -->
                                    </td>
                                    <td class="align-middle ps-3 ">-
                                        <!-- <input type="checkbox" name="permission[]" id="permissionupdateDashboard" value="updateDashboard" class="form-check-input"> -->
                                    </td>
                                    <td class="align-middle ps-3 ">
                                        <input type="checkbox" name="permission[]" id="permissionviewDashboard" value="viewDashboard" class="form-check-input">
                                    </td>
                                    <td class="align-middle ps-3 ">-
                                        <!-- <input type="checkbox" name="permission[]" id="permissiondeleteDashboard" value="deleteDashboard" class="form-check-input"> -->
                                    </td>
                                    <td class="align-middle ps-3 ">
                                        <input type="checkbox" name="permission[]" id="permissionexportDashboard" value="exportDashboard" class="form-check-input">
                                    </td>
                                    <td class="align-middle ps-3 ">
                                        <!-- <input type="checkbox" name="permission[]" id="permissionimportDashboard" value="importDashboard" class="form-check-input"> --> - 
                                    </td>
                                    <td class="align-middle ps-3 ">-
                                        <!-- <input type="checkbox" name="permission[]" id="permissionskipDashboard" value="skipDashboard" class="form-check-input"> -->
                                    </td>

                                </tr>

                                <tr>
                                    <td class="align-middle ps-3 ">Debit Dates</td>
                                    <td class="align-middle ps-3 ">
                                        <input type="checkbox" name="permission[]" id="permissioncreateDebitDates" value="createDebitDates" class="form-check-input">
                                    </td>
                                    <td class="align-middle ps-3 ">
                                        <!-- <input type="checkbox" name="permission[]" id="permissionupdateDebitDates" value="updateDebitDates" class="form-check-input"> --> -
                                    </td>
                                    <td class="align-middle ps-3 ">
                                        <input type="checkbox" name="permission[]" id="permissionviewDebitDates" value="viewDebitDates" class="form-check-input">
                                    </td>
                                    <td class="align-middle ps-3 ">
                                        <input type="checkbox" name="permission[]" id="permissiondeleteDebitDates" value="deleteDebitDates" class="form-check-input">
                                    </td>
                                    <td class="align-middle ps-3 ">
                                        <input type="checkbox" name="permission[]" id="permissionexportDebitDates" value="exportDebitDates" class="form-check-input">
                                    </td>
                                    <td class="align-middle ps-3 ">
                                        <input type="checkbox" name="permission[]" id="permissionimportDebitDates" value="importDebitDates" class="form-check-input">
                                    </td>
                                    <td class="align-middle ps-3 ">-
                                        <!-- <input type="checkbox" name="permission[]" id="permissionskipUser" value="skipUser" class="form-check-input"> -->
                                    </td>

                                </tr>

                                  <tr>
                                    <td class="align-middle ps-3 ">Message Templates</td>
                                    <td class="align-middle ps-3 ">
                                        <input type="checkbox" name="permission[]" id="permissioncreateMessageTemplates" value="createMessageTemplates" class="form-check-input">
                                    </td>
                                    <td class="align-middle ps-3 ">
                                        <input type="checkbox" name="permission[]" id="permissionupdateMessageTemplates" value="updateMessageTemplates" class="form-check-input">
                                    </td>
                                    <td class="align-middle ps-3 ">
                                        <input type="checkbox" name="permission[]" id="permissionviewMessageTemplates" value="viewMessageTemplates" class="form-check-input">
                                    </td>
                                    <td class="align-middle ps-3 ">
                                        <input type="checkbox" name="permission[]" id="permissiondeleteMessageTemplates" value="deleteMessageTemplates" class="form-check-input">
                                    </td>
                                    <td class="align-middle ps-3 ">
                                        <input type="checkbox" name="permission[]" id="permissionexportMessageTemplates" value="exportMessageTemplates" class="form-check-input">
                                    </td>
                                    <td class="align-middle ps-3 ">
                                        <input type="checkbox" name="permission[]" id="permissionimportMessageTemplates" value="importMessageTemplates" class="form-check-input">
                                    </td>
                                    <td class="align-middle ps-3 ">-
                                        <!-- <input type="checkbox" name="permission[]" id="permissionskipUser" value="skipUser" class="form-check-input"> -->
                                    </td>

                                </tr>

                                 <tr>
                                    <td class="align-middle ps-3 ">System Logs</td>
                                    <td class="align-middle ps-3 ">
                                     -
                                    </td>
                                    <td class="align-middle ps-3 ">
                                     -
                                    </td>
                                    <td class="align-middle ps-3 ">
                                        <input type="checkbox" name="permission[]" id="permissionviewSystemLogs" value="viewSystemLogs" class="form-check-input">
                                    </td>
                                    <td class="align-middle ps-3 ">
                                       -
                                    </td>
                                    <td class="align-middle ps-3 ">
                                       -
                                    </td>
                                    <td class="align-middle ps-3 ">
                                        -
                                    </td>
                                    <td class="align-middle ps-3 ">-
                                       -
                                    </td>

                                </tr>
                               

                            </tbody>
                          </table>
                        </div>
                    </div>

                </form>
                    
            </div>
            <div class="modal-footer">
              <button class="btn btn-primary" id="btnSavePermission" type="button">Save</button>
              <button class="btn btn-outline-primary" type="button" id="closeButton1" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>   

    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.4/xlsx.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>     
     
<script type="text/javascript">


  $(document).ready(function() {

    $('#resetButton').addClass('d-none');
    $('#import').addClass('d-none');

     $file = null;

  });

 

   $('#upload_form').on('submit', function(event){
    $file = new FormData(this);
    event.preventDefault();
    $.ajax({
      url:"<?php echo base_url('Import/user_import')  ?>",
      method:"POST",
      data:new FormData(this),
      dataType:'json',
      contentType:false,
      cache:false,
      processData:false,
      success:function(data)
      {
        if(data.error != '')
        {
          $('#message').html('<div class="alert alert-danger">'+data.error+'</div>');
        }
        else
        {


          $('#btnCSVImportPreview').addClass('d-none');
          
          $('#process_area').html(data.output);


          $('#upload_area').css('display', 'none');
          $('#help_text').css('display', 'none');
          $('#process_area').css('display', 'block');

          $("#import").removeClass("d-none");
          $("#resetButton").removeClass("d-none");

        }
      }
    });

  });

  $(document).on('click','#resetButton',function(event){
    
        $('#import').attr('disabled', false);
        $('#import').text('Import');
        $('#process_area').css('display', 'none');
        $('#upload_area').css('display', 'block');
        $('#help_text').css('display', 'block');
        $('#import').addClass('d-none');
        $('#resetButton').addClass('d-none');
        $('#btnCSVImportPreview').removeClass('d-none');
        $('#upload_form')[0].reset();
  
  }); 

  $(document).on('click', '#import', function(event){

    event.preventDefault();

    $.ajax({
    
      url:"<?php echo base_url('api/Import/user_import');?>",
      method:"POST",
      data:$file,
      dataType:'json',
      contentType:false,
      cache:false,
      processData:false,
      beforeSend:function(xhr){
        xhr.setRequestHeader('X-API-KEY', 'enachSyncWorks');
        $('#import').attr('disabled', 'disabled');
        $('#import').text('Importing...');
      },
    
      success:function(response)
      {

        var uninserted_rows = response.uninserted_rows;
        var uninserted_table = response.uninserted_table;
        if(uninserted_table){
          $('#process_area').css('display', 'block');
          $('#process_area').html(uninserted_table);
          $('#import').attr('disabled', false);
          $('#import').text('Import');
          $('#upload_area').css('display', 'none');
          $('#help_text').css('display', 'none');
          $('#import').addClass('d-none');
          $('#resetButton').addClass('d-none');
          $('#btnCSVImportPreview').addClass('d-none');
          $('#upload_form')[0].reset();
        }
        else{
          $('#process_area').css('display', 'none');
           $('#import').attr('disabled', false);
          $('#import').text('Import');
          $('#upload_area').css('display', 'block');
          $('#help_text').css('display', 'block');
          $('#import').addClass('d-none');
          $('#resetButton').addClass('d-none');
          $('#btnCSVImportPreview').removeClass('d-none');
          $('#upload_form')[0].reset();
        }

       
    
        toastr.success(response.message);
      
      },
       error: function(response){
         var data =JSON.parse(response.responseText);
         toastr.error(data.message);
         var uninserted_rows = data.uninserted_rows;
         var uninserted_table = data.uninserted_table;
          if(uninserted_table){
            $('#process_area').css('display', 'block');
            
            $('#process_area').html(uninserted_table);

          }
          else{
            $('#process_area').css('display', 'none');
          }
           $('#import').attr('disabled', false);
          $('#import').text('Import');
          $('#upload_area').css('display', 'none');
          $('#help_text').css('display', 'none');
          $('#import').addClass('d-none');
          $('#resetButton').addClass('d-none');
          $('#btnCSVImportPreview').addClass('d-none');
          $('#upload_form')[0].reset();
       }
    
    })

  });

</script>


<script type="text/javascript">
  ////////////changes
  $('#searchTextCustomer').on('input', function() {

// var dataTable = $('#dataTable').DataTable({});
 searchTerm = $(this).val();
 dataTable.search(searchTerm).draw();

});

  $(document).ready(function() {

var dataTable;
var searchTerm;

  var searchMoreInput = document.getElementById('searchMoreFilter');
  // Get all filter items

  var filterMoreItems = document.querySelectorAll('#more_filter .dropdown-item');


  
   var searchBranchInput = document.getElementById('searchBranchFilter');
  // Get all filter items

  var filterBranchItems = document.querySelectorAll('#branch_id_filter .dropdown-item');

  // Add event listener on keyup
  searchMoreInput.addEventListener('keyup', function () {
      var searchText = this.value.toLowerCase(); // Convert input value to lowercase for case-insensitive search
      // Loop through each filter item
      filterMoreItems.forEach(function (item) {
          // Check if the label text contains the search text
          var label = item.querySelector('.form-check-label');
            if (label) {
                var labelText = label.textContent.toLowerCase();
                if (labelText.includes(searchText)) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            }
      });
  });

  

   searchBranchInput.addEventListener('keyup', function () {
      var searchText = this.value.toLowerCase(); // Convert input value to lowercase for case-insensitive search
      // Loop through each filter item
      filterBranchItems.forEach(function (item) {
          // Check if the label text contains the search text
          var label = item.querySelector('.form-check-label');
            if (label) {
                var labelText = label.textContent.toLowerCase();
                if (labelText.includes(searchText)) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            }
      });
  });



});


  function handleCheckboxChange(checkboxId, filterValueId) {
                  var checkbox = document.getElementById(checkboxId);
                  var filterValueDiv = document.getElementById(filterValueId);
                  
                  // If checkbox is checked, show the filter value div
                  if (checkbox.checked) {
                      filterValueDiv.classList.remove("d-none");
                      filterValueDiv.classList.add("d-flex");
                  }

                  else {
                      // If checkbox is unchecked, hide the filter value div
                      filterValueDiv.classList.remove("d-flex");
                      filterValueDiv.classList.add("d-none");

                   
                }
    }

  document.addEventListener("DOMContentLoaded", function() {
               
               showUsersData();
               showBankBranchData();
               
               var phoneFilterInput = document.getElementById('phoneFilterInput');
               var emailFilterInput = document.getElementById('emailFilterInput');
             
                $('#clearBranchFilter').click(function(){
                   $("input[name='branch_mandate_filter']:checked").prop("checked", false);
                   branchFilterChange();
                });

               

                $('#clearMoreFilter').click(function(){


                   dataTable.column('users.firstname:name').search('', true).draw();
                   dataTable.column('users.middlename:name').search('', true).draw();
                   dataTable.column('users.lastname:name').search('', true).draw();

                  // dataTable.column('fullname:name').search(fullName, true, false).draw();

                   dataTable.column('users.phone:name').search('', true).draw();
                   dataTable.column('users.email:name').search('', true).draw();
                 
                
                   $("#customerNameFilter").prop("checked", false);
                   
                   $("#phoneFilter").prop("checked", false);
                   $("#emailFilter").prop("checked", false);
                 
                 
                   handleCheckboxChange('customerNameFilter', 'customerNameFilterValue');
                   handleCheckboxChange('phoneFilter', 'phoneFilterValue');
                   handleCheckboxChange('emailFilter', 'emailFilterValue');

                

                   phoneFilterInput.value='';
                   emailFilterInput.value='';
               

                });


                function branchFilterChange(){
                    var branch_mandate_filter = $('input:checkbox[name="branch_mandate_filter"]:checked').map(function() {
                           return '^' + this.value + '$';
                       }).get().join('|');
              
                    dataTable.column('bank_branches.branch_name:name').search(branch_mandate_filter, true).draw(); // Set regex flag to true
      
                }
            
               $("input[name='branch_mandate_filter']").change(function () { 

                 branchFilterChange();
               });


               phoneFilterInput.addEventListener('keyup', function () {
                   dataTable.column('users.phone:name').search(this.value, true).draw(); // Set regex flag to true
               });

               emailFilterInput.addEventListener('keyup', function () {
                   dataTable.column('users.email:name').search(this.value, true).draw(); // Set regex flag to true
               });
               
        });

    
      function showUsersData(){
            if ($.fn.DataTable.isDataTable('#userdataTable')) {
                $('#userdataTable').DataTable().destroy();
            }
          

            dataTable =   $('#userdataTable').DataTable({
                    lengthMenu: [ [10, 25, 50,10000000000000000000], [10, 25, 50, "All"]],
                    buttons: [
                        'pageLength'
                    ],
                      language: {
                        lengthMenu: 'Show _MENU_ entries', // Customize the text here
                        buttons: {
                            pageLength: {
                                _: "Show %d entries"
                            }
                        }
                    },
                    "processing": false,
                    "serverSide": true,
                    "ordering": true,
                    search: {
                        return: true
                    },
                    searchBuilder: true, 
                    "pagingType": "full_numbers",
                     "createdRow": function(row, data, dataIndex) {
                        $(row).addClass("hover-actions-trigger btn-reveal-trigger position-static");
                    }, // or "simple_numbers"
                    initComplete: function () {
                        var table = this;
                        var api = this.api();
                        var btns = $('.dt-button');
                        btns.addClass('btn btn-sm');
                        btns.removeClass('dt-button');
                        $('.buttons-colvis').addClass('btn-soft-warning');
                        $('.buttons-copy').addClass('btn-soft-success');
                        $('.buttons-csv').addClass('btn-soft-primary');
                        // $('.buttons-pdf').addClass('btn-soft-info');
                        $('.dt-paging-button').addClass('btn btn-sm');
                    },
                     colReorder: true,
                     layout: {
                         topEnd: {
                          
                              buttons: [

                                  {
                                    extend: 'colvis',
                                    text: '<i class="fas fa-columns" aria-hidden="true"></i>  Show Columns',
                                },


                                <?php if(in_array('exportUser', $user_permission)): ?>


                                    {
                                        extend: 'csv',
                                        text: '<i class="fas fa-file-excel" aria-hidden="true"></i> Excel',
                                    // Specify filename if needed

                                        action: function (e, dt, node, config) {
                                            // Trigger the Excel export manually
                                           exportToExcel();
                                        }
                                      },

                                  //  {
                                  //       extend: 'pdfHtml5',
                                  //       text: '<i class="fas fa-file-pdf" aria-hidden="true"></i> PDF',
                                  //       orientation: 'landscape',
                                  //       pageSize: 'LEGAL',


                                  //  }

                                     <?php endif; ?>
                                  ],
                           
                          }
                    },
                    searching:true,
                    paging:true,
                    responsive: true,
                    scrollCollapse: true,
                    scroller: false,
                    // scrollY: 150,
                    stateSave: false,
                    "info": true,
                     columnDefs: [
                          {
                              responsivePriority: 1, 
                              targets: [1,-1] 
                          },
                          {
                             "className": "white-space-nowrap text-start",
                             "targets": '_all' // Add the index of columns here
                          },
                       
                    ],


                    "ajax": {
                         'type': 'GET',
                         'url': "<?php echo base_url() ?>api/User/showUsersList/",
                         'async': false,
                         'method':'get',
                         'dataType': 'json',
                         'beforeSend': function(xhr) {
                             xhr.setRequestHeader('X-API-KEY','enachSyncWorks');    
                         },

                         'error': function (error) {
                             toastr.error("Mandates does not found");
                             
                          }
                    },
                     
          
                    'columns': [
          
                         {
                            "data": null,
                            "render": function (data, type, row, meta) {
                               return  meta.row + meta.settings._iDisplayStart + 1; // Increment index by 1 to display serial number
                             }
                         },       
                         {
                              "data": null,
                              "render": function (data, type, row) {
                                  // Concatenate first name, middle name, and last name
                                  return `${row.firstname} ${row.middlename ? row.middlename + ' ' : ''}${row.lastname}`;
                              },
                              "name": 'fullname' // Optional: Use a name for this column if needed
                          },
                        //  { data: 'firstname',name:'users.firstname' },
                         { data: 'phone',name:'users.phone', orderable: false},
                         { data: 'branch_name',name:'bank_branches.branch_name', orderable: false, },
                      
                         { data: 'email',name:'users.email', orderable: false, },
                         { data: 'designation_name',name:'designations.designation_name', orderable: false, },
                        //  { data: 'account_no',name:'mandate_customers.account_no', orderable: false, },
                         { 
                            "data": null,
                        //   name:'action',
                             orderable: false,
                            "render": function (data, type, row) {
                                var html = '';
                              
                                <?php if(in_array('updateUser', $user_permission) || in_array('viewUser', $user_permission) || in_array('deleteUser', $user_permission)): ?>
                                html += '<div class="position-relative">';
                                html += '<div class="hover-actions">';
                                

                                <?php if(in_array('viewUser', $user_permission)): ?>
                            
                                html+='<button class="btn btn-sm btn-phoenix-primary me-1 fs--2  item-view" data="'+row.user_id+'" emp_type="'+row.emp_type+'"   ><span class="uil-eye"></span></button>';
                                
                                <?php endif; ?>



                                 <?php if(in_array('updateUser', $user_permission)): ?>
                                
                                html+='<button class="btn btn-sm btn-soft-warning me-1 fs--2  item-edit"  data="'+row.user_id+'" emp_type="'+row.emp_type+'" ><span class="fas fa-pencil"></span></button>';

                                html+='<button class="btn btn-sm btn-soft-warning me-1 fs--2  item-permission" data="'+row.user_id+'" emp_type="'+row.emp_type+'"  ><span class="fas fa-user-tie"></span></button>';

                                <?php endif; ?>
                                
                                <?php if(in_array('deleteUser', $user_permission)): ?>
                                
                                html+='<button class="btn btn-sm btn-soft-danger me-1 fs--2  item-delete " data="'+row.user_id+'" ><span class="uil-trash"></span></button>';
                                <?php endif; ?>
                                
                                html += '</div>';
                                html += '</div>';
                                html += '<div class="font-sans-serif btn-reveal-trigger position-static">';
                                html += '<button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs--2" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--2"></span></button>';
                                html += '<div class="dropdown-menu dropdown-menu-end py-2">';
                             
                               <?php if(in_array('viewUser', $user_permission)): ?>
                                html+='<a class="dropdown-item item-view" data="'+row.user_id+'" emp_type="'+row.emp_type+'"   ><span class="uil-eye"></span> View</a>';
                                <?php endif; ?>


                                 <?php if(in_array('updateUser', $user_permission)): ?>
                                
                                html+='<a class="dropdown-item item-edit"  data="'+row.user_id+'" emp_type="'+row.emp_type+'" ><span class="uil-edit"></span> Edit</a>';


                                html+='<a class="dropdown-item item-permission" data="'+row.user_id+'" emp_type="'+row.emp_type+'"  ><span class="fas fa-user-tie"></span>Permission</a>';

                                 <?php endif; ?>

                                <?php if(in_array('deleteUser', $user_permission)): ?>

                                html+='<a class="dropdown-item text-danger item-delete"  data="'+row.user_id+'"><span class="uil-trash"></span> Delete</a>';

                                <?php endif; ?>

                                html += '</div>';
                                html += '</div>';
                                <?php endif; ?>
                                return html;
                            }
                        }
                      ],

                      
                      "drawCallback": function (settings) {
                            var api = this.api();
                            var start = api.page.info().start; // Get start index of current page
                            api.column(0).nodes().each(function (cell, i) {
                                cell.innerHTML = start + i + 1; // Update serial numbers
                            });
                      }

            });

         }
      
         function exportToExcel() {
    var columnProperties = [];
    var searchText = $('#searchTextCustomer').val();

    dataTable.columns().every(function(index) {
        var column = this;

        // Get column properties
        var columnData = {
            data: column.dataSrc(),
            name: dataTable.settings()[0].aoColumns[index].name, // Get 'name' attribute from the header
            searchValue: column.search(),
        };

        // Add column properties to the array
        columnProperties.push(columnData);
    });

    $.ajax({
        type: 'GET',
        url: "<?php echo base_url()?>api/User/exportUserDetails/",
        data: {
            'columnProperties': columnProperties,
            'searchText': searchText
        },
        dataType: 'json',
        beforeSend: function(xhr) {
            xhr.setRequestHeader('X-API-KEY', 'enachSyncWorks');
        },
        success: function(response) {
            var data = response.data;

            // Generate table rows from the data
            var html = "";
            for (var i = 0; i < data.length; i++) {
                var x = i + 1;
                html += '<tr>';
                html += '<td class="order py-2 ps-3 align-middle white-space-nowrap srno"><a class="fw-semi-bold" href="#">' + x + '</a></td>';
                html += '<td class="align-middle ps-3 name">' + data[i].firstname + ' ' + data[i].middlename + ' ' + data[i].lastname + '</td>';
                html += '<td class="align-middle ps-3 phone">' + data[i].phone + '</td>';
                html += '<td class="align-middle ps-3 branch">' + data[i].branch_name + '</td>';
                html += '<td class="align-middle ps-3 email">' + data[i].email + '</td>';
                html += '<td class="align-middle py-3 pe-3 ps-3 designation"><div class="badge badge-phoenix fs--2 badge-phoenix-warning"><span class="fw-bold">' + data[i].designation_name + '</span></div></td>';
                html += '</tr>';
            }
            $('#showReportResultexcel').html(html);

            // Get the current date
            const dateC = new Date();
            let dayC = dateC.getDate();
            let monthC = dateC.getMonth() + 1;
            let yearC = dateC.getFullYear();
            let currentDateC = `${dayC}-${monthC}-${yearC}`;

            // Export table to Excel
            var table = document.getElementById('reporttableexcel');
            var sheetData = XLSX.utils.table_to_sheet(table);
            var wb = XLSX.utils.book_new();
            XLSX.utils.book_append_sheet(wb, sheetData, 'Sheet1');

            // Convert the workbook to a data URL
            var dataURL = XLSX.write(wb, { bookType: 'xlsx', type: 'base64' });

            // Create a download link and trigger the download
            var link = document.createElement('a');
            link.href = 'data:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet;base64,' + dataURL;
            link.download = 'Mandate-Staff-' + currentDateC;
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        },
        error: function(error) {
            console.error('Error fetching data:', error);
        }
    });
}

         
       function showBankBranchData() {
         var selectedBankId = 1;  
          $.ajax({
             type: 'ajax',
             method: 'get',
             url: '<?php echo base_url(); ?>api/User/showBranchesOfBank',
             // data: { 'id': someValidId },  // Replace someValidId with the actual ID value
             data: { 'id': selectedBankId },
             async: false,
             dataType: 'json',
             beforeSend: function (xhr) {
                 xhr.setRequestHeader('X-API-KEY', 'enachSyncWorks');
             },
             success: function (response) {
                 var data = response.data;
          
                 if (data) {
                     var selectDropdown = $('#branch_id');  
                     var selectDropdownFilter = $('#branch_id_filter');  
                     

                     selectDropdown.empty();
                     // selectDropdownFilter.empty();
                     selectDropdown.append($('<option>').val('').text('Select Branch'));
          
          
                    
                     $.each(data, function (index, branch) {

                         
                         var option = $('<option>').val(branch.branch_id).text(branch.branch_name);
                         var html_filter='<li>'+
                               '<div class="dropdown-item">'+
                             
                                  '<input name="branch_mandate_filter" class="form-check-input" type="checkbox" value="'+branch.branch_name+'" id="checkbox'+branch.branch_name+'">'+
                                  '<label class="form-check-label" style="margin-left:10px;" for="checkbox'+branch.branch_name+'">'+branch.branch_name+'</label>'+
                             
                              '</div>'+
                            '</li>';
                         selectDropdown.append(option);
                         selectDropdownFilter.append(html_filter);
                     });
                
                      
                 } else {
                     
                     $('#branch_id').empty();  
                     $('#branch_id_filter').empty();  
                     $('#branch_id').append($('<option>').val('').text('Select Branch'));
                     $('#branch_id_filter').append($('<option>').val('').text('Select Branch'));
                 }
             },
             error: function (response) {
               
                 $('#branch_id').empty();  
                 $('#branch_id').append($('<option>').val('').text('Select Branch'));
                 var data = JSON.parse(response.responseText);
                 toastr.error(data.message);
             }
          });
      }

  ///////////

      //  sshowUserData(1);
       showBranches(1);
       var choices = new Choices('[data-choices="data-choices"]',{
            removeItemButton: true,
          });
      
    
     
        $('#addBankUser').click(function(){
          document.getElementById("designationListData_MAIN").style.display = "block";
          document.getElementById("bankListData_MAIN").style.display = "block";
          document.getElementById("branchListData_MAIN").style.display = "block";
         
          $('#bankUserForm')[0].reset();
          $('#btnSaveBankUser').html('Submit');
          $('#bankModalCenter').find('.modal-title').text('Add Bank User');
          $('#bankUserForm').attr('action','<?php echo base_url(); ?>api/User/insertUserByOrganizationType');
            showDesignationData();
            showBankData();

            document.getElementById("bank_user_first_name").readOnly=false;
              document.getElementById("bank_user_middlename").readOnly=false;
              document.getElementById("bank_user_lastname").readOnly=false;
              document.getElementById("bank_user_email").readOnly=false;
              document.getElementById("bank_user_phone").readOnly=false;
              document.getElementById("bank_user_address").readOnly=false;
              document.getElementById("bank_user_username").readOnly=false;
              document.getElementById("bank_user_gender").readOnly=false;
        });

        function showDesignationData() {

            $.ajax({
                type: 'ajax',
                url: "<?php echo base_url() ?>api/Designation/",
                async: false,
                method:'get',
                dataType: 'json',
                beforeSend: function(xhr) {
                    xhr.setRequestHeader('X-API-KEY','enachSyncWorks');
                },
                success: function(response) {
                    // body...
                    data=response.data;
                   
                    var bank_html='<select class="form-select" name="bank_desigation_id" id="bank_desigation_id"><option value="" selected="selected">Select Designation</option>';
                   
                    var gov_html='<select class="form-select" name="gov_desigation_id" id="gov_desigation_id"><option value="" selected="selected">Select Designation</option>';
                   
                    var administrator_html='<select class="form-select" name="administrator_desigation_id" id="administrator_desigation_id"><option value="" selected="selected">Select Designation</option>';
                  
                    var i ="";

                    for (var i = 0; i < data.length; i++) {

                        if(data[i].designation_organization_type=="BANK"){
                              bank_html+='<option value="'+data[i].id+'">'+data[i].designation_name+'</option>';
                        }

   
                    }
                    bank_html+='</select>';
             
               
                   $('#designationListData').html(bank_html);
             
                     },
                 error: function(response){
                   var data =JSON.parse(response.responseText);
                   toastr.error(data.message);
                   $('#designationListData').html('');
             
                }


            });

  }

  function showBankData(){

            $.ajax({
                    type: 'ajax',
                    url: "<?php echo base_url() ?>api/Bank",
                    async: false,
                    method:'get',
                    dataType: 'json',
                      beforeSend: function(xhr) {
                    xhr.setRequestHeader('X-API-KEY','enachSyncWorks');
                },
                    success: function(response) {
                        // body...
                        data=response.data;
                   
                        
                        var html='<select class="form-select" name="bank_id" id="bank_id">';
                      
                        var i ="";

                        for (var i = 0; i < data.length; i++) {
                           html+='<option value="'+data[i].bank_id+'">'+data[i].bank_name+'</option>';
                        }
                        html+='</select>';

                       $('#bankListData').html(html);
             
                             },
                         error: function(response){
                           var data =JSON.parse(response.responseText);
                           toastr.error(data.message);
                          $('#bankListData').html('');
                    }

                });

        }



        function showBranchData(id){
             
   
               $.ajax({
                  type: 'ajax',
                  method: 'get',
                  url: '<?php echo base_url(); ?>api/Bank/UserBranchrow',
                  data:{'id': id},  
                  async: false,
                  dataType: 'json',
                  beforeSend: function(xhr) {
                      xhr.setRequestHeader('X-API-KEY','enachSyncWorks');
                  },
                  success: function(response) {
                          // body...
                        data=response.data.bank_branches;
                        if(data){
                              var html='<select class="form-select" name="branch_id" id="branch_id"><option value="" selected="selected">Select Branch</option>';
                      
                                var i ="";

                                for (var i = 0; i < data.length; i++) {
                                   html+='<option value="'+data[i].branch_id+'">'+data[i].branch_name+'</option>';
                                }
                                html+='</select>';
                        }
                        else{
                             $('#branchListData').html("Branches Not Available");
                        }
            

                       $('#branchListData').html(html);
                             },
                         error: function(response){
                           $('#branchListData').html("Branches Not Available");
                           var data =JSON.parse(response.responseText);
                           toastr.error(data.message);
                        
                    }

              });

        }



        $('#btnSaveBankUser').click(function(){
           
            document.getElementById("bank_user_first_name").classList.remove("is-invalid");
            document.getElementById("bank_user_middlename").classList.remove("is-invalid");
            document.getElementById("bank_user_lastname").classList.remove("is-invalid");
            document.getElementById("bank_user_email").classList.remove("is-invalid");
            document.getElementById("bank_user_phone").classList.remove("is-invalid");
            document.getElementById("bank_user_address").classList.remove("is-invalid");
            document.getElementById("bank_user_username").classList.remove("is-invalid");
            document.getElementById("bank_user_password").classList.remove("is-invalid");
            document.getElementById("bank_user_gender").classList.remove("is-invalid");
            if(document.getElementById("bank_desigation_id")){
              document.getElementById("bank_desigation_id").classList.remove("is-invalid");
            }
              if(document.getElementById("bank_id")){
              document.getElementById("bank_id").classList.remove("is-invalid");
            }
              if(document.getElementById("branch_id")){
               document.getElementById("branch_id").classList.remove("is-invalid");
            }
            
             var url                  =     $('#bankUserForm').attr('action');
             var data                 =     $('#bankUserForm').serialize();

             var bank_user_first_name =     $('input[name=bank_user_first_name]');
             var bank_user_middlename   =     $('input[name=bank_user_middlename]');
             var bank_user_lastname   =     $('input[name=bank_user_lastname]');
             var bank_user_email      =     $('input[name=bank_user_email]');
             var bank_user_username   =     $('input[name=bank_user_username]');
             var bank_user_password   =     $('input[name=bank_user_password]');
             var bank_user_phone      =     $('input[name=bank_user_phone]');
             var bank_user_address    =     $('input[name=bank_user_address]');
             var bank_user_gender     =     $('select[name=bank_user_gender]');
             var bank_id              =     $('select[name=bank_id]');
             var desigation_id        =     $('select[name=bank_desigation_id]');
             var branch_id       =     $('select[name=branch_id]');
           
             var ins_type       =     $('input[name=ins_type]');
        
              
              if(bank_user_first_name.val()==''){
                  document.getElementById("bank_user_first_name").classList.add("is-invalid");
                  toastr.error("Please Enter First Name");
              }
            
              else if(bank_user_lastname.val()==''){
                  document.getElementById("bank_user_lastname").classList.add("is-invalid");
                  toastr.error("Please Enter Last Name");
              }
            
              // else if(bank_user_email.val()==''){
              //    document.getElementById("bank_user_email").classList.add("is-invalid");
              //     toastr.error("Please Enter Email");
              // }
            
              else if(bank_user_phone.val()==''){
                document.getElementById("bank_user_phone").classList.add("is-invalid");
                  toastr.error("Please Enter Phone/Mobile No.");
              } 
              
              else if(bank_user_address.val()==''){
                 document.getElementById("bank_user_address").classList.add("is-invalid");
                  toastr.error("Please Enter Address");
              } 

              else if(bank_user_username.val()==''){
                   document.getElementById("bank_user_username").classList.add("is-invalid");
                  toastr.error("Please Enter UserName");
              }

               else if(bank_user_password.val()==''){
                   document.getElementById("bank_user_password").classList.add("is-invalid");
                  toastr.error("Please Enter Password");
              }

              else if(bank_user_gender.val()==''){
                document.getElementById("bank_user_gender").classList.add("is-invalid");
                  toastr.error("Please Select Gender");
              }

              else  if(desigation_id.val()=='' && ins_type.val()=="insert"){
                    document.getElementById("bank_desigation_id").classList.add("is-invalid");
                    toastr.error("Please Select Designation");
                }
                
               else  if (bank_id.val()=='' && ins_type.val()=="insert") {
                   document.getElementById("bank_id").classList.add("is-invalid");
                   toastr.error("Please Select Bank");
                }

                 else  if (branch_id.val()=='' && ins_type.val()=="insert") {
                    document.getElementById("branch_id").classList.add("is-invalid");
                   toastr.error("Please Select Bank Branch");
                }
             
            
           
              else{
                    
                  $.ajax({
                      type: 'ajax',
                      method:'post',
                      url: url,
                      data: data,
                      async: false,
                      dataType: 'json',
                      beforeSend: function(xhr) {
                          xhr.setRequestHeader('X-API-KEY','enachSyncWorks');
                      },
                      success: function(response){

                             $('#bankUserForm')[0].reset();
                             $('#bankModalCenter').modal('hide');

                              if (response.status) {
                               toastr.success(response.message);
                              }
                              else{
                                 toastr.error(response.message);
                              }
                                showUsersData();
                          
                      },

                    error: function(response){
                             var data =JSON.parse(response.responseText);
                             toastr.error(data.message);
                      }

                  });
                  }
               });


        $('#userData').on('click', '.item-view', function(){

          showDesignationData();
          showBankData();


          var id = $(this).attr('data');
          var emp_type = $(this).attr('emp_type');

          var fname= "";
          var mname= "";
          var lname= "";
          var email= "";
          var phone= "";
          var address= "";
          var username= "";
          var gender= "";
          var bank_id= "";
          var branch_id= "";
          var desigation_id= "";
          var password= "";
         

            $.ajax({
                type: 'ajax',
                method: 'get',
                url: '<?php echo base_url(); ?>api/User/row',
                data:{'id': id},  
                async: false,
                dataType: 'json',
                beforeSend: function(xhr) {
                    xhr.setRequestHeader('X-API-KEY','enachSyncWorks');
                },
                success: function(response){
                 
                   if(response.status){
                    if(response.data){
                      data=response.data;

                        fname=data.firstname;
                        mname=data.middlename;

                        lname=data.lastname;
                        email=data.email;
                        phone=data.phone;
                        address=data.address;
                        username=data.username;
                        gender =data.gender;
                        bank_id =data.organization_id;
                        branch_id =data.sub_organization_branch_id;
                        desigation_id =data.group_id;
                        password =data.password;

                    }
              
                   }

                },
                  error: function(response){
                       var data =JSON.parse(response.responseText);
                       toastr.error(data.message);
                }
            });

        
             showBranchData(bank_id);
          // if(emp_type=="Bank"){

              $('#bankModalCenter').modal('show');
              $('#btnSaveBankUser').html('Update');
              document.getElementById("btnSaveBankUser").disabled = true;
              $('#bankUserForm').attr('action','<?php echo base_url(); ?>api/User/update');
              $('#bankModalCenter').find('.modal-title').text('View User Details');
             
              document.getElementById("bank_user_first_name").readOnly=true;
              document.getElementById("bank_user_middlename").readOnly=true;
              document.getElementById("bank_user_lastname").readOnly=true;
              document.getElementById("bank_user_email").readOnly=true;
              document.getElementById("bank_user_phone").readOnly=true;
              document.getElementById("bank_user_address").readOnly=true;
              document.getElementById("bank_user_username").readOnly=true;
             document.getElementById("bank_user_password").readOnly=true;
              document.getElementById("bank_user_gender").readOnly=true;
              document.getElementById("organization_type").readOnly=true;
          
              document.getElementById("bank_desigation_id").readOnly=true;
              document.getElementById("bank_id").readOnly=true;
              // document.getElementById("branch_id").readOnly=true;

                $('input[name=id]').val(id);
                $('input[name=bank_user_first_name]').val(fname);
                $('input[name=bank_user_middlename]').val(mname);

                $('input[name=bank_user_lastname]').val(lname);
                $('input[name=bank_user_email]').val(email);   
                $('input[name=bank_user_phone]').val(phone);   
                $('input[name=bank_user_address]').val(address);  
                $('input[name=bank_user_username]').val(username);  
                // $('input[name=bank_user_password]').val(password);  
                $('select[name=bank_user_gender]').val(gender);  
              
                $('select[name=bank_id]').val(bank_id);  
                $('select[name=branch_id]').val(branch_id);  
                $('select[name=bank_desigation_id]').val(desigation_id);  

                $('input[name=organization_type]').val("bank");  
                $('input[name=ins_type]').val("update"); 
          // }
         
      });


        $('#userData').on('click', '.item-edit', function(){


              showDesignationData();
              showBankData();

              var id = $(this).attr('data');
              var emp_type = $(this).attr('emp_type');

              var fname= "";
              var mname= "";
              var lname= "";
              var email= "";
              var phone= "";
              var address= "";
              var username= "";
              var gender= "";
              var bank_id= "";
              var branch_id= "";
              var desigation_id= "";
              var password= "";
             

                $.ajax({
                    type: 'ajax',
                    method: 'get',
                    url: '<?php echo base_url(); ?>api/User/row',
                    data:{'id': id},  
                    async: false,
                    dataType: 'json',
                    beforeSend: function(xhr) {
                        xhr.setRequestHeader('X-API-KEY','enachSyncWorks');
                    },
                    success: function(response){
                     
                       if(response.status){
                        if(response.data){
                          data=response.data;

                            fname=data.firstname;
                            mname=data.middlename;

                            lname=data.lastname;
                            email=data.email;
                            phone=data.phone;
                            address=data.address;
                            username=data.username;
                            gender =data.gender;
                            bank_id =data.organization_id;
                            branch_id =data.sub_organization_branch_id;
                            desigation_id =data.group_id;
                            password =data.password;



                            
                        }
                  
                       }

                    },
                      error: function(response){
                           var data =JSON.parse(response.responseText);
                           toastr.error(data.message);
                    }
                });
            

                 showBranchData(bank_id);


              
              // if(emp_type=="Bank"){

                  $('#bankModalCenter').modal('show');
                  $('#btnSaveBankUser').html('Update');
                  document.getElementById("btnSaveBankUser").disabled = false;
                  $('#bankUserForm').attr('action','<?php echo base_url(); ?>api/User/update');
                  $('#bankModalCenter').find('.modal-title').text('Update User');
                  // document.getElementById("designationListData_MAIN").style.display = "none";
                  // document.getElementById("bankListData_MAIN").style.display = "none";
                  // document.getElementById("branchListData_MAIN").style.display = "none";
              
                  document.getElementById("bank_user_first_name").readOnly=false;
                  // document.getElementById("bank_user_middlename")=true;

                  document.getElementById("bank_user_lastname").readOnly=false;
                  document.getElementById("bank_user_email").readOnly=false;
                  document.getElementById("bank_user_phone").readOnly=false;
                  document.getElementById("bank_user_address").readOnly=false;
                  document.getElementById("bank_user_username").readOnly=false;
                  document.getElementById("bank_user_password").readOnly=false;
                  document.getElementById("bank_user_gender").readOnly=false;
                  document.getElementById("organization_type").readOnly=false;
                
                  document.getElementById("bank_desigation_id").readOnly=false;
                  document.getElementById("bank_id").readOnly=false;
                  document.getElementById("branch_id").readOnly=false;


                    $('input[name=id]').val(id);
                    $('input[name=bank_user_first_name]').val(fname);
                    $('input[name=bank_user_middlename]').val(mname);
                    $('input[name=bank_user_lastname]').val(lname);
                    $('input[name=bank_user_email]').val(email);   
                    $('input[name=bank_user_phone]').val(phone);   
                    $('input[name=bank_user_address]').val(address);  
                    $('input[name=bank_user_username]').val(username);  
                    // $('input[name=bank_user_password]').val(password);  
                    $('select[name=bank_user_gender]').val(gender);  
                  
                    $('select[name=bank_id]').val(bank_id);  
                    $('select[name=branch_id]').val(branch_id);  
                    $('select[name=bank_desigation_id]').val(desigation_id);  
                  
                    $('input[name=organization_type]').val("bank");  
                    $('input[name=ins_type]').val("update"); 
              // }
      

          });

        $('#userData').on('click', '.item-delete', function(){
          var id = $(this).attr('data');
            
            $('#myModal_for_delete_message').find('.modal-title').text('Delete User');
            $('#myModal_for_delete_message').modal('show');
            $('#btdelete').unbind().click(function(){
                $.ajax({
                    type: 'ajax',
                    method: 'post',
                    async: false,
                    url: '<?php echo base_url(); ?>api/User/delete/'+id,
                    data: {'id': id},
                    dataType: 'json',
                    beforeSend: function(xhr) {
                        xhr.setRequestHeader('X-API-KEY','enachSyncWorks');
                    },
                    success: function(response)
                    {
                          $('#myModal_for_delete_message').modal('hide');
                          toastr.success(response.message);
                          showUsersData();
                    },

                       error: function() 
                    {
                      $('#myModal_for_delete_message').modal('hide');
                     
                       toastr.error(response.message);
                       showUsersData();

                    }
                });

            });
        });

 //permission
 
       var id;
       var data;
        $('#userData').on('click', '.item-permission', function () {
             choices.setChoiceByValue([]);

            id = $(this).attr('data');
            //console.log("user id" + id);
            $('#Addpermission').modal('show');

           
            $('#myFormPermission').attr('action','<?php echo base_url(); ?>api/User/permissionsrow');
            userPermissionView();
          

        });

        function userPermissionView() {
        $.ajax({
            type: 'GET',
            url: '<?php echo base_url(); ?>api/User/permissionsrow',
            data: { id: id },
            async: false,
            dataType: 'json',
            beforeSend: function(xhr) {
                xhr.setRequestHeader('X-API-KEY', 'enachSyncWorks');
            },
            success: function(response) {
              console.log(response);
               //permissions=data.permissions;'  branch_name':branch_name


               permission_branch=response.permission_branch; 

               data=response.data;
               permissions=response.permissions; 
        
                var branch=[];
                for (var i = 0; i < permission_branch.length; i++) {
                    var branchval = permission_branch[i].branch_id;
                    branch.push(branchval);
                }
                
                choices.setChoiceByValue(branch);
                // choices.setChoiceByValue(branch);

                $('input[name=id]').val(data.id); 
                $('#Addpermission').modal('hide');


                  $("input[value='createUser']").prop('checked', false);
                  $("input[value='updateUser']").prop('checked', false);
                  $("input[value='viewUser']").prop('checked', false);
                  $("input[value='deleteUser']").prop('checked', false);
                  $("input[value='exportUser']").prop('checked', false);
                  $("input[value='importUser']").prop('checked', false);
                  $("input[value='skipUser']").prop('checked', false);


                  $("input[value='createDebitDates']").prop('checked', false);
                  // $("input[value='updateDebitDates']").prop('checked', false);
                  $("input[value='viewDebitDates']").prop('checked', false);
                  $("input[value='deleteDebitDates']").prop('checked', false);
                  $("input[value='exportDebitDates']").prop('checked', false);
                  $("input[value='importDebitDates']").prop('checked', false);
                  $("input[value='skipDebitDates']").prop('checked', false);


                  $("input[value='createMessageTemplates']").prop('checked', false);
                  $("input[value='updateMessageTemplates']").prop('checked', false);
                  $("input[value='viewMessageTemplates']").prop('checked', false);
                  $("input[value='deleteMessageTemplates']").prop('checked', false);
                  $("input[value='exportMessageTemplates']").prop('checked', false);
                  $("input[value='importMessageTemplates']").prop('checked', false);
                  $("input[value='skipMessageTemplates']").prop('checked', false);


                
                  $("input[value='createDesignation']").prop('checked', false);
                  $("input[value='updateDesignation']").prop('checked', false);
                  $("input[value='viewDesignation']").prop('checked', false);
                  $("input[value='deleteDesignation']").prop('checked', false);
                  $("input[value='exportDesignation']").prop('checked', false);
                  $("input[value='importDesignation']").prop('checked', false);
                  $("input[value='skipDesignation']").prop('checked', false);


                  $("input[value='createMandate']").prop('checked', false);
                  $("input[value='updateMandate']").prop('checked', false);
                  $("input[value='viewMandate']").prop('checked', false);
                  $("input[value='deleteMandate']").prop('checked', false);
                  $("input[value='exportMandate']").prop('checked', false);
                  $("input[value='importMandate']").prop('checked', false);
                  $("input[value='skipMandate']").prop('checked', false);

                  $("input[value='createCancelMandate']").prop('checked', false);
                  $("input[value='updateCancelMandate']").prop('checked', false);
                  $("input[value='viewCancelMandate']").prop('checked', false);
                  $("input[value='exportCancelMandate']").prop('checked', false);


                  $("input[value='createBranch']").prop('checked', false);
                  $("input[value='updateBranch']").prop('checked', false);
                  $("input[value='viewBranch']").prop('checked', false);
                  $("input[value='deleteBranch']").prop('checked', false);
                  $("input[value='exportBranch']").prop('checked', false);
    			        $("input[value='importBranch']").prop('checked', false);
                  $("input[value='skipBranch']").prop('checked', false);	


                  $("input[value='createDashboard']").prop('checked', false);
                  $("input[value='updateDashboard']").prop('checked', false);
                  $("input[value='viewDashboard']").prop('checked', false);
                  $("input[value='deleteDashboard']").prop('checked', false);
                  $("input[value='exportDashboard']").prop('checked', false);
                  // $("input[value='importDashboard']").prop('checked', false);
                  $("input[value='skipDashboard']").prop('checked', false);	

              
                   $("input[value='viewSystemLogs']").prop('checked', false);
              
                    if( $.inArray("createUser", permissions) !== -1 ) {

                    $("input[value='createUser']").prop('checked', true);
                    }
                 
                    if( $.inArray("updateUser", permissions) !== -1 ) {

                    $("input[value='updateUser']").prop('checked', true);
                    }
                     if( $.inArray("viewUser", permissions) !== -1 ) {

                    $("input[value='viewUser']").prop('checked', true);
                    }
                     if( $.inArray("deleteUser", permissions) !== -1 ) {

                    $("input[value='deleteUser']").prop('checked', true);
                    }

                    if( $.inArray("exportUser", permissions) !== -1 ) {

                    $("input[value='exportUser']").prop('checked', true);
                    }

                    if( $.inArray("importUser", permissions) !== -1 ) {

                    $("input[value='importUser']").prop('checked', true);
                    }

                    if( $.inArray("skipUser", permissions) !== -1 ) {

                    $("input[value='skipUser']").prop('checked', true);
                    }


                    if( $.inArray("createDebitDates", permissions) !== -1 ) {

                    $("input[value='createDebitDates']").prop('checked', true);
                    }
                 
                    // if( $.inArray("updateDebitDates", permissions) !== -1 ) {

                    // $("input[value='updateDebitDates']").prop('checked', true);
                    // }
                     if( $.inArray("viewDebitDates", permissions) !== -1 ) {

                    $("input[value='viewDebitDates']").prop('checked', true);
                    }
                     if( $.inArray("deleteDebitDates", permissions) !== -1 ) {

                    $("input[value='deleteDebitDates']").prop('checked', true);
                    }

                    if( $.inArray("exportDebitDates", permissions) !== -1 ) {

                    $("input[value='exportDebitDates']").prop('checked', true);
                    }
                    if( $.inArray("importDebitDates", permissions) !== -1 ) {

                      $("input[value='importDebitDates']").prop('checked', true);
                      }
                    if( $.inArray("skipDebitDates", permissions) !== -1 ) {

                    $("input[value='skipDebitDates']").prop('checked', true);
                    }


                    if( $.inArray("createMessageTemplates", permissions) !== -1 ) {

                    $("input[value='createMessageTemplates']").prop('checked', true);
                    }
                 
                    if( $.inArray("updateMessageTemplates", permissions) !== -1 ) {

                    $("input[value='updateMessageTemplates']").prop('checked', true);
                    }
                     if( $.inArray("viewMessageTemplates", permissions) !== -1 ) {

                    $("input[value='viewMessageTemplates']").prop('checked', true);
                    }
                     if( $.inArray("deleteMessageTemplates", permissions) !== -1 ) {

                    $("input[value='deleteMessageTemplates']").prop('checked', true);
                    }

                    if( $.inArray("exportMessageTemplates", permissions) !== -1 ) {

                    $("input[value='exportMessageTemplates']").prop('checked', true);
                    }
                    if( $.inArray("importMessageTemplates", permissions) !== -1 ) {

                      $("input[value='importMessageTemplates']").prop('checked', true);
                      }
                    if( $.inArray("skipMessageTemplates", permissions) !== -1 ) {

                    $("input[value='skipMessageTemplates']").prop('checked', true);
                    }


                    // Designation
                     if( $.inArray("createDesignation", permissions) !== -1 ) {

                    $("input[value='createDesignation']").prop('checked', true);
                    }
                 
                    if( $.inArray("updateDesignation", permissions) !== -1 ) {

                    $("input[value='updateDesignation']").prop('checked', true);
                    }
                     if( $.inArray("viewDesignation", permissions) !== -1 ) {

                    $("input[value='viewDesignation']").prop('checked', true);
                    }
                     if( $.inArray("deleteDesignation", permissions) !== -1 ) {

                    $("input[value='deleteDesignation']").prop('checked', true);
                    }
                    if( $.inArray("exportDesignation", permissions) !== -1 ) {

                    $("input[value='exportDesignation']").prop('checked', true);
                    }
                    if( $.inArray("importDesignation", permissions) !== -1 ) {

                    $("input[value='importDesignation']").prop('checked', true);
                    }
                    if( $.inArray("skipDesignation", permissions) !== -1 ) {

                    $("input[value='skipDesignation']").prop('checked', true);
                    }

                    // Mandate
                    if( $.inArray("createMandate", permissions) !== -1 ) {

                    $("input[value='createMandate']").prop('checked', true);
                    }
                 
                    if( $.inArray("updateMandate", permissions) !== -1 ) {

                    $("input[value='updateMandate']").prop('checked', true);
                    }
                     if( $.inArray("viewMandate", permissions) !== -1 ) {

                    $("input[value='viewMandate']").prop('checked', true);
                    }
                     if( $.inArray("deleteMandate", permissions) !== -1 ) {

                    $("input[value='deleteMandate']").prop('checked', true);
                    }

                    if( $.inArray("exportMandate", permissions) !== -1 ) {

                    $("input[value='exportMandate']").prop('checked', true);
                    }
                
                	if( $.inArray("importMandate", permissions) !== -1 ) {

                    $("input[value='importMandate']").prop('checked', true);
                    }
                    if( $.inArray("skipMandate", permissions) !== -1 ) {

                    $("input[value='skipMandate']").prop('checked', true);
                    }


                    // Cancel Mandate
                    if( $.inArray("createCancelMandate", permissions) !== -1 ) {

                    $("input[value='createCancelMandate']").prop('checked', true);
                    }
                 
                    if( $.inArray("updateCancelMandate", permissions) !== -1 ) {

                    $("input[value='updateCancelMandate']").prop('checked', true);
                    }
                     if( $.inArray("viewCancelMandate", permissions) !== -1 ) {

                    $("input[value='viewCancelMandate']").prop('checked', true);
                    }
 
                   if( $.inArray("exportCancelMandate", permissions) !== -1 ) {

                    $("input[value='exportCancelMandate']").prop('checked', true);
                    }
              


                    if( $.inArray("createBranch", permissions) !== -1 ) {

                    $("input[value='createBranch']").prop('checked', true);
                    }
                 
                    if( $.inArray("updateBranch", permissions) !== -1 ) {

                    $("input[value='updateBranch']").prop('checked', true);
                    }
                     if( $.inArray("viewBranch", permissions) !== -1 ) {

                    $("input[value='viewBranch']").prop('checked', true);
                    }
                     if( $.inArray("deleteBranch", permissions) !== -1 ) {

                    $("input[value='deleteBranch']").prop('checked', true);
                    }
                    if( $.inArray("exportBranch", permissions) !== -1 ) {

                    $("input[value='exportBranch']").prop('checked', true);
                    }
                	if( $.inArray("importBranch", permissions) !== -1 ) {

                    $("input[value='importBranch']").prop('checked', true);
                    }
                    if( $.inArray("skipBranch", permissions) !== -1 ) {

                    $("input[value='skipBranch']").prop('checked', true);
                    }
    				
    				// Dashboard
                    if( $.inArray("createDashboard", permissions) !== -1 ) {

                    $("input[value='createDashboard']").prop('checked', true);
                    }

                    if( $.inArray("updateDashboard", permissions) !== -1 ) {

                    $("input[value='updateDashboard']").prop('checked', true);
                    }
                    if( $.inArray("viewDashboard", permissions) !== -1 ) {

                    $("input[value='viewDashboard']").prop('checked', true);
                    }
                    if( $.inArray("deleteDashboard", permissions) !== -1 ) {

                    $("input[value='deleteDashboard']").prop('checked', true);
                    }
                    if( $.inArray("exportDashboard", permissions) !== -1 ) {

                    $("input[value='exportDashboard']").prop('checked', true);
                    }
                    // if( $.inArray("importDashboard", permissions) !== -1 ) {

                    // $("input[value='importDashboard']").prop('checked', true);
                    // }
                    if( $.inArray("skipDashboard", permissions) !== -1 ) {

                    $("input[value='skipDashboard']").prop('checked', true);
                    }

                    if( $.inArray("viewSystemLogs", permissions) !== -1 ) {

                      $("input[value='viewSystemLogs']").prop('checked', true);
                  }

                     
                 
            },
            error: function(response) {
                var data = JSON.parse(response.responseText);
                toastr.error(data.message);
            }
        });
    }

    $('#closeButton1').on('click', function() {
        // Close the modal
        $('#Addpermission').modal('hide');
       
        // Reload the page
        location.reload(true); // Force reload from the server
    });

    $('#btnSavePermission').on('click', function () {   
            data = $('#myFormPermission').serialize();
            $('#myFormPermission').attr('action','<?php echo base_url(); ?>api/User/permissions');
            //     var selectedBranchNames = $('#organizerMultiple option:selected').map(function () {
            //     return $(this).text();
            // }).get();
            var selectedBranchNames = $('#organizerMultiple option:selected').map(function () {
                return {
                    name: $(this).text(),
                    branch_id: $(this).val(),
                    is_active: "1",
                    is_deleted: "0"
                };
            }).get();


            var selectedBranchIds = $('#organizerMultiple').val();

            // Append the selectedBranchNames to the serialized data
            data = $('#myFormPermission').serialize() + '&selectedBranchNames=' + JSON.stringify(selectedBranchNames);

            data += '&selectedBranchIds=' + JSON.stringify(selectedBranchIds);
            data += '&id=' + id;

           

            userPermissionUpdate();
    
      });

   
     function userPermissionUpdate(){   
            $.ajax({
                type: 'ajax',   
                method: 'post',
                url: '<?php echo base_url(); ?>api/User/permissions',    
                data: data,
                async: false,
                dataType: 'json',
                beforeSend: function(xhr) {
                    xhr.setRequestHeader('X-API-KEY','enachSyncWorks');
                },
                success: function(response){
                   //console.log(response);
                   data=response.data;
                   permissions=response.permissions; 
                   $('#Addpermission').modal('hide');
                        toastr.success('Permissions updated successfully', 'Success');
           
                  
                  },
                   error: function(response){
                         var data =JSON.parse(response.responseText);
                         toastr.error(data.message);
                  }
            });
        }

                  
        function showBranches(id) {
     
             $.ajax({
                type: 'ajax',
                url: "<?php echo base_url() ?>api/Bank/showBranchesOfBank",
                async: false,
                data:{'id': id},  
                method:'get',
                dataType: 'json',
                 beforeSend: function(xhr) {
                  xhr.setRequestHeader('X-API-KEY','enachSyncWorks');
              },
                success: function(response) {
                   var  data = response.data;

                    var selectDropdown = $('#organizerMultiple');
                    selectDropdown.empty();  // Clear existing options

                    // Append new options based on the data
                    $.each(data, function (index, branch) {
                        var option = $('<option>').val(branch.branch_id).text(branch.branch_name);
                        selectDropdown.append(option);
                         selectDropdown.attr('data-placeholder', 'Select Multiple Branches');
                    });

              
                },
                error: function (response) {
                    // Handle error
                }
                                        
            });
       }


// // // validation
document.getElementById('bank_user_password').addEventListener('keyup', function() {
    var password = this.value;
    var strengthText = document.getElementById('password-strength-indicator');

    // Reset indicator text
    strengthText.textContent = '';

    // Check password length
    if (password.length < 8) {
        strengthText.textContent = 'Password length should be at least 8 characters.';
        return;
    }

    // Check for uppercase letters
    var upperCaseCharacters = /[A-Z]/;
    if (!upperCaseCharacters.test(password)) {
        strengthText.textContent = 'Password should contain at least one uppercase letter.';
        return;
    }

    // Check for lowercase letters
    var lowerCaseCharacters = /[a-z]/;
    if (!lowerCaseCharacters.test(password)) {
        strengthText.textContent = 'Password should contain at least one lowercase letter.';
        return;
    }

    // Check for digits
    var numbers = /[0-9]/;
    if (!numbers.test(password)) {
        strengthText.textContent = 'Password should contain at least one digit.';
        return;
    }

    // Check for special characters
    var specialCharacters = /[!@#$%^&*(),.?":{}|<>]/;
    if (!specialCharacters.test(password)) {
        strengthText.textContent = 'Password should contain at least one special character.';
        return;
    }

    // If all criteria met, indicate strong password
    strengthText.textContent = 'Strong password!';
});


var inputs = document.querySelectorAll('#bankUserForm input, #bankUserForm select');
    inputs.forEach(function(input) {
        input.addEventListener('input', function(event) {
            validateInput(input);
        });
    });

    // Function to validate input field
    function validateInput(input) {
        if (!input.checkValidity()) {
            showErrorMessage(input);
        } else {
            hideErrorMessage(input);
        }
    }

    // Function to show error message
    function showErrorMessage(input) {
        var errorDiv = input.nextElementSibling;
        if (errorDiv.classList.contains('invalid-feedback')) {
            errorDiv.style.display = 'block';
        }
    }

    // Function to hide error message
    function hideErrorMessage(input) {
        var errorDiv = input.nextElementSibling;
        if (errorDiv.classList.contains('invalid-feedback')) {
            errorDiv.style.display = 'none';
        }
    }

    // Function to handle form submission
    document.getElementById('bankUserForm').addEventListener('submit', function(event) {
        var form = this;
        var isValid = true;

        // Validate all input fields
        inputs.forEach(function(input) {
            validateInput(input);
            if (!input.checkValidity()) {
                isValid = false;
            }
        });

        // Prevent form submission if any input is invalid
        if (!isValid) {
            event.preventDefault();
        }
    });

</script>
