<!-- <script src="https://www.paynimo.com/PaynimoCDN/lib/jquery.min.js" type="text/javascript"></script> -->
<?php 

    $device_ID='';    
    $merchant_ID='';    
    $txn_type='';    
    $txn_sub_type='';    
    $item_id='';    

    if($mandate_settings){
   
    
       
        foreach ($mandate_settings as $key => $value) {
 
            if($value->mandate_setting_type=="device_ID"){
                $device_ID=$value->mandate_setting_value;
            }
 
            else if($value->mandate_setting_type=="merchant_ID"){
                 $merchant_ID=$value->mandate_setting_value;   
            }
 
            else if($value->mandate_setting_type=="txn_type"){
                $txn_type=$value->mandate_setting_value;
            }
 
            else if($value->mandate_setting_type=="txn_sub_type"){
                $txn_sub_type=$value->mandate_setting_value;
            }
 
            else if($value->mandate_setting_type=="item_id"){
                $item_id=$value->mandate_setting_value;
            }

        }   

    }

?>


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
        
        <?php if(in_array('createMandate', $user_permission) || in_array('updateMandate', $user_permission) || in_array('viewMandate', $user_permission) || in_array('deleteMandate', $user_permission)): ?>
          
              <div class="mb-2 d-flex flex-wrap gap-3">
                <div class="search-box input-group">
                    <input class="form-control search-input" type="text" placeholder="Search" aria-label="Recipient's username" aria-describedby="basic-addon2" id="searchTextCustomer" name="searchTextCustomer"/>
                    <span class="fas fa-search search-box-icon"></span> 
                </div>
            
                <div class="scrollbar overflow-hidden-y">

                  <div class="btn-group position-static" role="group">
                   
                    <div class="btn-group position-static text-nowrap">
                      <button class="btn  btn-phoenix-secondary  flex-shrink-0" type="button" data-bs-toggle="dropdown"     data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent" data-bs-auto-close="true"><i class="fas fa-university"></i>
                        Branch <span id="branchFilterCount"></span> <span class="fas fa-angle-down ms-2"></span></button>
                        <ul class="dropdown-menu scrollbar overflow-hidden-y h-30"  id="branch_id_filter">
                            <li>
                                <div class="dropdown-item p-1">
                                   <input class="form-control search-input form-control-sm m-0" type="text" placeholder="Search Filter" id="searchBranchFilter" name="searchBranchFilter"/>
                                </div>
                                <div class="nav nav-links nav-item" id="clearBranchFilter">
                                   <a class="nav-link m-0 p-1" href="javascript:;"><span>Clear Filter</span></a>
                                </div>

                              
                            </li>
                           
                          <li>
                             <hr class="dropdown-divider" />
                          </li>
                        </ul>
                    </div>
                   
                    <div class="btn-group position-static text-nowrap dropdown">
                      <button class="btn btn-sm btn-phoenix-secondary  flex-shrink-0" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"  data-bs-auto-close="true"><i class="fas fa-check-circle"></i>
                        Status <span id="statusFilterCount"></span> <span class="fas fa-angle-down ms-2"></span></button>
                      <ul class="dropdown-menu scrollbar overflow-hidden-y h-20" id="status_filter">
                        <li>
                              <div class="dropdown-item p-1">
                                <input class="form-control search-input form-control-sm m-0" type="text" placeholder="Search Filter" id="searchStatusFilter" name="searchStatusFilter"/>
                                <div class="nav nav-links nav-item" id="clearStatusFilter">
                                <a class="nav-link m-0 p-1" href="javascript:;"><span>Clear Filter</span></a>
                            </div>
                             </div>
                         </li>
                           
                          <li>
                             <hr class="dropdown-divider" />
                          </li>
                       <li>
                          <div class="dropdown-item">
                         
                             <input name="status_mandate_filter" class="form-check-input" type="checkbox" value="User Aborted" id="User_Aborted">
                             <label class="form-check-label" for="User_Aborted">User Aborted</label>
                         
                         </div>
                       </li>

                       <li>
                          <div class="dropdown-item">
                         
                             <input name="status_mandate_filter" class="form-check-input" type="checkbox" value="success" id="success">
                             <label class="form-check-label" for="success">Success</label>
                         
                         </div>
                       </li>

                       <li>
                          <div class="dropdown-item">
                         
                             <input name="status_mandate_filter" class="form-check-input" type="checkbox" value="failure" id="failure">
                             <label class="form-check-label" for="failure">Failure</label>
                         
                         </div>
                       </li>


                      </ul>
                    </div>


                    <div class="btn-group position-static text-nowrap dropdown">
                      <button class="btn btn-sm btn-phoenix-secondary  flex-shrink-0" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"  data-bs-auto-close="true"><i class="fas fa-filter"></i> More <span class="fas fa-angle-down ms-2"></span></button>
                        <ul class="dropdown-menu scrollbar overflow-hidden-y h-30" id="more_filter">
                           
                           <li>
                                <div class="dropdown-item p-1">
                                  <input class="form-control search-input form-control-sm m-0" type="text" placeholder="Search Filter" id="searchMoreFilter" name="searchMoreFilter"/>
                               </div>
                                 <div class="nav nav-links nav-item" id="clearMoreFilter">
                                <a class="nav-link m-0 p-1" href="#"><span>Clear Filter</span></a>
                            </div>
                           </li>
                           
                            <li>
                               <hr class="dropdown-divider" />
                            </li>

                             <li>
                               <div class="dropdown-item">
                                   <input class="form-check-input" type="checkbox" value="customerNameFilter" id="customerNameFilter" onchange="handleCheckboxChange('customerNameFilter', 'customerNameFilterValue')">

                                   <label class="form-check-label" for="customerNameFilter">Customer Name</label>
                                    <div id="customerNameFilterValue" class="d-none">
                                        <input type="text" id="customerNameFilterInput" class="form-control form-control-sm mt-1" placeholder="Customer Name" name="customerNameFilterInput">
                                    </div>
                               </div>
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
                                   <input class="form-check-input" type="checkbox" value="amountFilter" id="amountFilter"  onchange="handleCheckboxChange('amountFilter', 'amountFilterValue')">
                                   <label class="form-check-label" for="amountFilter">Amount</label>
                                   
                                   <div id="amountFilterValue" class="d-none">
                                       
                                       <div class="form-check  m-1">

                                        <input class="form-check-input" id="amountFilterFixed" type="radio" name="amountFilter" 
                                        value="fixedFilterAmount" onchange="handleAmountOptionChange(this.value)"/>

                                        <label class="form-check-label" for="amountFilterFixed">Fixed</label>
                                      </div>
                                      <div class="form-check  m-1">

                                        <input class="form-check-input" id="amountFilterBetween" type="radio" name="amountFilter"  value="betweenFilterAmount"  onchange="handleAmountOptionChange(this.value)"/>

                                        <label class="form-check-label" for="amountFilterBetween">Between</label>
                                      </div>
                                       <div class="form-check  m-1">

                                        <input class="form-check-input" id="amountFilterLessThan" type="radio" name="amountFilter" value="lessThanFilterAmount"   onchange="handleAmountOptionChange(this.value)"/>

                                        <label class="form-check-label" for="amountFilterLessThan">Less Than</label>
                                      </div>
                                       <div class="form-check  m-1">

                                        <input class="form-check-input" id="amountFilterGreaterThan" type="radio" name="amountFilter" value="greaterThanFilterAmount"  onchange="handleAmountOptionChange(this.value)"/>

                                        <label class="form-check-label" for="amountFilterGreaterThan">Greater Than</label>
                                      </div>

                                   </div>

                                 <div id="amountInputContainer" class="dropdown-item d-none">
                                   <input type="number" id="amountInput" class="form-control form-control-sm mt-1" placeholder="Amount">
                                </div>
                                <div id="amountRangeInputContainer" class="dropdown-item d-none">
                                    <div class="row">
                                      <div class="col">
                                    <input type="number" id="amountFromInput" class="form-control form-control-sm mt-1 col-6" placeholder="From Amount">
                                  </div>
                                   <div class="col">

                                    <input type="number" id="amountToInput" class="form-control form-control-sm mt-1 col-6" placeholder="To Amount">
                                     </div>
                                     </div>
                                </div>

                                </div>
                            </li>

                            <li>
                                <div class="dropdown-item">
                                   <input class="form-check-input" type="checkbox" value="emiStartDateFilter" id="emiStartDateFilter"
                                    onchange="handleCheckboxChange('emiStartDateFilter', 'emiStartDateFilterValue')">
                                   <label class="form-check-label" for="emiStartDateFilter">EMI Start Date</label>
                                   <div id="emiStartDateFilterValue" class="d-none">
                                      
                                      <div class="form-check  m-1">

                                        <input class="form-check-input" id="emiStartDateFilterFixed" type="radio" name="emiStartDateFilter" value="fixedFilterStartDate"   onchange="handleEMIStartDateOptionChange(this.value)"/>

                                        <label class="form-check-label" for="emiStartDateFilterFixed">Fixed</label>
                                      </div>


                                      <div class="form-check  m-1">

                                        <input class="form-check-input" id="emiStartDateFilterBetween" type="radio" name="emiStartDateFilter"  value="betweenFilterStartDate"    onchange="handleEMIStartDateOptionChange(this.value)"/>

                                        <label class="form-check-label" for="emiStartDateFilterBetween">Between</label>
                                      </div>
                                       <div class="form-check  m-1">

                                        <input class="form-check-input" id="emiStartDateFilterLessThan" type="radio" name="emiStartDateFilter" value="lessThanFilterStartDate"     onchange="handleEMIStartDateOptionChange(this.value)"/>

                                        <label class="form-check-label" for="emiStartDateFilterLessThan">Less Than</label>
                                      </div>
                                       <div class="form-check  m-1">

                                        <input class="form-check-input" id="emiStartDateFiltergreaterThan" type="radio" name="emiStartDateFilter" value="greaterThanFilterStartDate"    onchange="handleEMIStartDateOptionChange(this.value)"/>

                                        <label class="form-check-label" for="emiStartDateFiltergreaterThan">Greater Than</label>
                                      </div>


                                   </div>

                                   <div id="emiStartDateInputContainer" class="dropdown-item d-none">
                                        <div class="input-group input-group-sm">
                                                <span class="input-group-text" id="basic-addon2"><i class="fas fa-calendar"></i></span>

                                                <input class="form-control datetimepicker" id="emiStartDateInput" type="text" placeholder="dd/mm/yyyy" data-options='{dateFormat":"d/m/Y"}'/>
                                         </div>
                                    </div>


                                    <div id="emiStartDateRangeInputContainer" class="dropdown-item d-none">
                                        <div class="row">
                                          <div class="col">
                                            <label class="form-label">From Date</label> 
                                            <div class="input-group input-group-sm">
                                                <span class="input-group-text" id="basic-addon2"><i class="fas fa-calendar"></i></span>

                                                <input class="form-control datetimepicker" id="emiStartDateFromInput" type="text" placeholder="dd/mm/yyyy" data-options='{dateFormat":"d/m/Y"}'/> 
                                            </div>
                                      
                                      </div>
                                       <div class="col">
                                        <label class="form-label">To Date</label>
                                            <div class="input-group input-group-sm">
                                                    <span class="input-group-text" id="basic-addon2"><i class="fas fa-calendar"></i></span>

                                                    <input class="form-control datetimepicker" id="emiStartDateToInput" type="text" placeholder="dd/mm/yyyy" data-options='{dateFormat":"d/m/Y"}'/>
                                            </div>
                                         </div>
                                     </div>
                                    </div>
                                </div>
                            </li>

                            <li>
                                <div class="dropdown-item">
                                   <input class="form-check-input" type="checkbox" value="emiEndDateFilter" id="emiEndDateFilter" 
                                    onchange="handleCheckboxChange('emiEndDateFilter', 'emiEndDateFilterValue')">
                                   <label class="form-check-label" for="emiEndDateFilter">EMI End Date</label>
                                   <div id="emiEndDateFilterValue" class="d-none">
                                      
                                      <div class="form-check  m-1">

                                        <input class="form-check-input" id="emiEndDateFilterFixed" type="radio" name="emiEndDateFilter" value="fixedFilterEndDate"  onchange="handleEMIEndDateOptionChange(this.value)"/>

                                        <label class="form-check-label" for="emiEndDateFilterFixed">Fixed</label>
                                      </div>
                                      <div class="form-check  m-1">

                                        <input class="form-check-input" id="emiEndDateFilterBetween" type="radio" name="emiEndDateFilter"  value="betweenFilterEndDate"   onchange="handleEMIEndDateOptionChange(this.value)"/>

                                        <label class="form-check-label" for="emiEndDateFilterBetween">Between</label>
                                      </div>
                                       <div class="form-check  m-1">

                                        <input class="form-check-input" id="emiEndDateFilterLessThan" type="radio" name="emiEndDateFilter" value="lessThanFilterEndDate"    onchange="handleEMIEndDateOptionChange(this.value)"/>

                                        <label class="form-check-label" for="emiEndDateFilterLessThan">Less Than</label>
                                      </div>
                                       <div class="form-check  m-1">

                                        <input class="form-check-input" id="emiEndDateFiltergreaterThan" type="radio" name="emiEndDateFilter" value="greaterThanFilterEndDate"   onchange="handleEMIEndDateOptionChange(this.value)"/>

                                        <label class="form-check-label" for="emiEndDateFiltergreaterThan">Greater Than</label>
                                      </div>


                                   </div>

                                     <div id="emiEndDateInputContainer" class="dropdown-item d-none">
                                        

                                        <div class="input-group input-group-sm">
                                                <span class="input-group-text" id="basic-addon2"><i class="fas fa-calendar"></i></span>

                                                <input class="form-control datetimepicker" id="emiEndDateInput" type="text" placeholder="dd/mm/yyyy" data-options='{dateFormat":"d/m/Y"}'/>
                                        </div>

                                     
                                    </div>
                                    <div id="emiEndDateRangeInputContainer" class="dropdown-item d-none">
                                        <div class="row">
                                          <div class="col">
                                         <label class="form-label">From Date</label>
                                            <div class="input-group input-group-sm">
                                                <span class="input-group-text" id="basic-addon2"><i class="fas fa-calendar"></i></span>
 
                                                 <input class="form-control datetimepicker" id="emiEndDateFromInput" type="text" placeholder="dd/mm/yyyy" data-options='{dateFormat":"d/m/Y"}'/>
                                            </div>
                                      </div>
                                       <div class="col">
                                        <label class="form-label">To Date</label>  
                                          <div class="input-group input-group-sm">
                                                <span class="input-group-text" id="basic-addon2"><i class="fas fa-calendar"></i></span>

                                                 <input class="form-control datetimepicker" id="emiEndDateToInput" type="text" placeholder="dd/mm/yyyy" data-options='{dateFormat":"d/m/Y"}'/>
                                          </div>
                                     
                                         </div>
                                     </div>
                                    </div>
                                </div>
                            </li>

                            <li>
                                <div class="dropdown-item">
                                   <input class="form-check-input" type="checkbox" value="registeredDateFilter" id="registeredDateFilter"  onchange="handleCheckboxChange('registeredDateFilter', 'registeredDateFilterValue')">
                                   <label class="form-check-label" for="registeredDateFilter">Register Date</label>
                                   <div id="registeredDateFilterValue" class="d-none">
                                     
                                      <div class="form-check  m-1">

                                        <input class="form-check-input" id="emiRegisterDateFilterFixed" type="radio" name="emiRegisterDateFilter" value="fixedFilterRegisterDate" onchange="handleEMIRegisterDateOptionChange(this.value)"/>

                                        <label class="form-check-label" for="emiRegisterDateFilterFixed">Fixed</label>
                                      </div>
                                      <div class="form-check  m-1">

                                        <input class="form-check-input" id="emiRegisterDateFilterBetween" type="radio" name="emiRegisterDateFilter"  value="betweenFilterRegisterDate"    onchange="handleEMIRegisterDateOptionChange(this.value)"/>

                                        <label class="form-check-label" for="emiRegisterDateFilterBetween">Between</label>
                                      </div>
                                       <div class="form-check  m-1">

                                        <input class="form-check-input" id="emiRegisterDateFilterLessThan" type="radio" name="emiRegisterDateFilter" value="lessThanFilterRegisterDate"     onchange="handleEMIRegisterDateOptionChange(this.value)"/>

                                        <label class="form-check-label" for="emiRegisterDateFilterLessThan">Less Than</label>
                                      </div>
                                       <div class="form-check  m-1">

                                        <input class="form-check-input" id="emiRegisterDateFiltergreaterThan" type="radio" name="emiRegisterDateFilter" value="greaterThanFilterRegisterDate"    onchange="handleEMIRegisterDateOptionChange(this.value)"/>

                                        <label class="form-check-label" for="emiRegisterDateFiltergreaterThan">Greater Than</label>
                                      </div>

                                   </div>

                                   <div id="emiRegisterDateInputContainer" class="dropdown-item d-none">
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-text" id="basic-addon2"><i class="fas fa-calendar"></i></span>

                                            <input class="form-control datetimepicker" id="emiRegisterDateInput" type="text" placeholder="dd/mm/yyyy" data-options='{dateFormat":"d/m/Y"}'/>
                                        </div>

                                    </div>

                                    <div id="emiRegisterDateRangeInputContainer" class="dropdown-item d-none">
                                        <div class="row">
                                          <div class="col">
                                         <label class="form-label">From Date</label>  
                                      

                                          <div class="input-group input-group-sm">
                                                    <span class="input-group-text" id="basic-addon2"><i class="fas fa-calendar"></i></span>

                                                    <input class="form-control datetimepicker" id="emiRegisterDateFromInput" type="text" placeholder="dd/mm/yyyy" data-options='{dateFormat":"d/m/Y"}'/>
                                         </div>

                                      </div>
                                       <div class="col">
                                        <label class="form-label">To Date</label>  
                                        

                                            <div class="input-group input-group-sm">
                                                <span class="input-group-text" id="basic-addon2"><i class="fas fa-calendar"></i></span>

                                                  <input class="form-control datetimepicker" id="emiRegisterDateToInput" type="text" placeholder="dd/mm/yyyy" data-options='{dateFormat":"d/m/Y"}'/>
                                            </div>

                                         </div>
                                     </div>
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

                            <li>
                                <div class="dropdown-item">
                                   <input class="form-check-input" type="checkbox" value="bankFilter" id="bankFilter" onchange="handleCheckboxChange('bankFilter', 'bankFilterValue')">
                                   <label class="form-check-label" for="bankFilter">Bank</label>
                                   <div id="bankFilterValue" class="d-none"> 
                                     <input type="text" id="bankFilterInput" class="form-control form-control-sm mt-1" placeholder="Bank Name" name="bankFilterInput">
                                   </div>
                                </div>
                            </li>

                        </ul>
                    </div>

                    <!-- <button class="btn btn-sm btn-phoenix-secondary  flex-shrink-0" onclick=" showFilterModal();"><i class="fas fa-filter"></i> More</button> -->


                  </div>
                </div>


                 <?php if(in_array('createMandate', $user_permission)):?> 
                    <div class="ms-xxl-auto ms-xl-auto ms-lg-auto ms-md-auto ms-sm-auto">
                      <!--  <button class="btn btn-link text-900 me-4 px-0" id="showOptionsButton"><span class="fas fa-eye-slash fs--1 me-2"></span>Show Options</button>
                       <button class="btn btn-link text-900 me-4 px-0"><span class="fas fa-file-excel fs--1 me-2"></span>Excel</button>
                       <button class="btn btn-link text-900 me-4 px-0"><span class="fas fa-file-pdf fs--1 me-2"></span>PDF</button> -->
                       <a class="btn btn-warning btn-sm" id="pendingMandates" href="<?php echo base_url('Users/pendingmandateCustomer/');?>"><span class="fas fa-eye me-2"></span>Pending Mandate</a>
                      
                       <button class="btn btn-primary btn-sm" id="addMandateCustomer1"  data-bs-toggle="modal" data-bs-target="#mandateCustomerModalCenter"><span class="fas fa-plus me-2"></span>Add Mandate</button>
                    </div>
                 <?php endif; ?>

              </div>
            
        <?php endif; ?>
        
        <div class="card">
              <div class="card-body">
              <div class="table-responsive  mx-1 px-1">
                <table class="table mb-0 fs--1 compact table-hover w-100" id="dataTable" >
                  <thead>
                    <tr> 
                      <th class="white-space-nowrap border-top">Sr No.</th>
                      <th class="white-space-nowrap border-top">Name</th>
                      <th class="white-space-nowrap border-top">Phone</th>
                      <th class="white-space-nowrap border-top">Branch</th>
                      <th class="white-space-nowrap border-top">Amount</th>
                      <th class="white-space-nowrap border-top">EMI Start Date</th>
                      <th class="white-space-nowrap border-top">EMI End Date</th>
                      <th class="white-space-nowrap border-top">Status</th>
                      <th class="white-space-nowrap border-top">Register Date</th>
                      <th class="white-space-nowrap border-top">Email</th>
                      <th class="white-space-nowrap border-top">Bank</th>
                      <th class="white-space-nowrap border-top">Account</th>               
                      <?php if(in_array('updateMandate', $user_permission) || in_array('viewMandate', $user_permission) || in_array('deleteMandate', $user_permission)): ?>
                        <th class="white-space-nowrap border-top">Action</th>
                        <?php endif; ?>
                      </tr>
                    </thead>
                    <tbody class="list" id="userDataMandate">

                    </tbody>
                  </table>
              </div>

            </div>
         </div>
    
      </div>

</div>


          
    <div class="modal fade" id="mandateCustomerModalCenter" tabindex="-1" aria-labelledby="scrollingLongModalLabel2" aria-hidden="true" data-bs-backdrop="static">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="tooltipModalLabel">Add Bank User</h5>
            <button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><span class="fas fa-times fs--1"></span></button>
          </div>
          <div class="modal-body">
           
                  <form id="mandateCustomerForm" enctype="multipart/form-data" action=""  class="row g-3 needs-validation" novalidate="" >
                  <p class="label mb-0">Customer Details</p>
                
                  <!-- <input type="hidden" name="branch_id"> -->
                  <input type="hidden" name="loan_type_id">
                  <input type="hidden" name="id">
                  <input type="hidden" id="inputString" value="" />


    
                    <div class="col-md-4" id="branchListData_MAIN">
                        <label class="form-label" for="branch_id">Branch <span class="text-danger">*</span> </label>
                        <select class="form-select" id="branch_id" name="branch_id"> 
                            <option value="" selected="">Select Branch</option>
                        </select>
                         <div class="invalid-feedback">Please Select Branch</div>
                    </div>
        
                    
                      <div class="col-md-4">
                    <label class="form-label" for="customer_name">Account Holder Name <span class="text-danger">*</span></label>
                     <input type="text" class="form-control text-uppercase" id="customer_name" name="customer_name" placeholder="Account Holder Name" autocomplete="off" value="" required pattern="[A-Za-z\s]+">
                       <div class="invalid-feedback">Only Capital letters are allowed.</div>
                   </div>
    
                    <div class="col-md-4">
                    <label class="form-label" for="customer_mobile_no">Mobile No <span class="text-danger">*</span></label>
                     <input type="tel" class="form-control input-spin-none" id="customer_mobile_no" name="customer_mobile_no" placeholder="Mobile No" autocomplete="off" value="" pattern="[0-9]{10}"  minlength="10" maxlength="10" onkeyup="setConsumerAndTransactionID();"  oninput="this.value = this.value.replace(/[^0-9]/g, '');"/>
                     <div class="invalid-feedback">Only 10 digit phone number are allowed</div>

                     
                   </div>
    <!-- 
                   <div class="col-md-4">
                    <label class="form-label" for="customer_email">Email</label>
                     <input type="email" class="form-control" id="customer_email" name="customer_email" placeholder="Email" autocomplete="off" value="">
                   </div> -->


                   <div class="col-md-4">
    
                      <label class="form-label" for="loan_type_id">Loan Type<span class="text-danger">*</span></label>
    
                       <div id="loanListData">
                         
                           <select class="form-select" id="loan_type_id" name="loan_type_id">
                            
                             <option value="" selected="">Select Loan</option>
                           
                          </select>
                           <div class="invalid-feedback">Select Loan Type</div>
                       </div>
                        <!-- </div> -->
    
                       
                    </div>

                    <div class="col-md-4">
                    <label class="form-label" for="bank_account_no">Bank Loan Account Number<span class="text-danger">*</span></label>
                     <input type="number" class="form-control input-spin-none" id="bank_account_no" name="bank_account_no" placeholder="Bank Account No." maxlength="18" pattern="\d{1,18}" autocomplete="off" value="" required>
                      <div class="invalid-feedback">Only number are allowed</div>
                   </div>

                   <div class="col-md-4">
                 
                       <label class="form-label" for="document">Upload Document <span class="text-danger">*</span></label>

                       <input type="file" id="document" name="document" class="form-control" accept=".pdf,.doc,.docx, .png" onchange="validateFileSize(this)">
                     
                       <input type="hidden" id="document_copy" name="document_copy" class="form-control" accept=".pdf,.doc,.docx, .png">

                        <div class="invalid-feedback">Select Document</div>
                        
                        <span id="documentName"></span>

                  </div>
             
    
                  <hr class="mb-0">
                   <!-- <div class="col-md-4"> -->
                    <!-- <label class="form-label" for="merchant_ID">Merchant ID</label> -->
                    <input type="hidden" name="mandate_customer_id" id="mandate_customer_id">
                   <!-- </div> -->
    
                    <!-- <div class="col-md-4"> -->
                    <!-- <label class="form-label" for="device_ID">Device ID</label> -->
    
                     <input type="hidden" class="form-control" id="device_ID" name="device_ID" placeholder="Device ID" autocomplete="off" value="<?php echo $device_ID;?>" readonly>
                   <!-- </div> -->
    
                     <!-- <div class="col-md-4"> -->
                    <!-- <label class="form-label" for="merchant_ID">Merchant ID</label> -->
                     <input type="hidden" class="form-control" id="merchant_ID" name="merchant_ID" placeholder="Merchant ID" autocomplete="off" value="<?php echo $merchant_ID;?>" readonly>
                   <!-- </div> -->
    
                    <!-- <div class="col-md-4"> -->
                    <!-- <label class="form-label" for="txn_type">Transaction Type</label> -->
                     <input type="hidden" class="form-control" id="txn_type" name="txn_type" placeholder="Transaction Type" autocomplete="off" value="<?php echo $txn_type;?>" readonly>
                   <!-- </div> -->
    
                    <!-- <div class="col-md-4"> -->
                    <!-- <label class="form-label" for="txn_sub_type">Transaction Sub-Type</label> -->
                     <input type="hidden" class="form-control" id="txn_sub_type" name="txn_sub_type" placeholder="Transaction Sub Type" autocomplete="off" value="<?php echo $txn_sub_type;?>" readonly>
                   <!-- </div> -->
    
                   <!-- <div class="col-md-4"> -->
                    <!-- <label class="form-label" for="item_id">Item</label> -->
                     <input type="hidden" class="form-control" id="item_id" name="item_id" placeholder="Item" autocomplete="off" value="<?php echo $item_id;?>" readonly>
                   <!-- </div> -->
    
                   <p class="label mb-0">Payment Details</p>
    
    
                   <div class="col-md-2">
    
                      <label class="form-label" for="payment_mode">Payment Mode  <span class="text-danger">*</span></label>
    
                      <select class="form-select" id="payment_mode" name="payment_mode" onchange="showBanksByPaymentMode(this.value);">
                          
                           <!-- <option value="" selected="">Select Payment Mode</option> -->
                           <option value="all" selected>All</option>
                           <option value="netBanking">Net Banking</option>
                           
                      </select>
                      <div class="invalid-feedback">Select Payment Mode</div>
                    </div>
    
                    <div class="col-md-3 d-none" id="div_consumer_card_number">
                    <label class="form-label" for="consumer_card_number">Card Number </label>
                     <input type="number" class="form-control" id="consumer_card_number" name="consumer_card_number" placeholder="Card No." autocomplete="off" value="">
                   </div>
    
                   <div class="col-md-3  d-none" id="div_consumer_expiry_month">
                    <label class="form-label" for="consumer_expiry_month">Card Expiry Month</label>
                     <input type="number" class="form-control" id="consumer_expiry_month" name="consumer_expiry_month" placeholder="Card Expiry Month" autocomplete="off" value="">
                   </div>
                   <div class="col-md-3  d-none" id="div_consumer_expiry_year">
                    <label class="form-label" for="consumer_expiry_year">Card Expiry Year</label>
                     <input type="number" class="form-control" id="consumer_expiry_year" name="consumer_expiry_year" placeholder="Card Expiry Year" autocomplete="off" value="">
                   </div>
                   <div class="col-md-3 d-none" id="div_consumer_cvv_no">
                    <label class="form-label" for="consumer_cvv_no">Card CVV No.</label>
                     <input type="number" class="form-control" id="consumer_cvv_no" name="consumer_cvv_no" placeholder="Card CVV No." autocomplete="off" value="">
                   </div>
    
                     <div class="col-md-4">
    
                      <label class="form-label" for="bank_name">Bank<span class="text-danger">*</span></label>
    
                       <div id="bankListData">
                         
                           <select class="form-select" id="bank_name" name="bank_name">
                            
                             <option value="" selected="">Select Bank</option>
                           
                          </select>
                          <div class="invalid-feedback">Select Bank</div>
                       </div>
                        <!-- </div> -->
    
                       
                    </div>
    
    
    <!-- 
                   <div class="col-md-3">
                     <label class="form-label" for="bank_code">Bank Code<span class="text-danger">*</span></label>
                     <div id="showBankCodeData">
                        <input type="text" class="form-control" id="bank_code" name="bank_code" placeholder="Bank Code" autocomplete="off" value="" readonly>
                     </div>
                     
                   </div>
     -->
                   
    
                    <div class="col-md-2">
                    <label class="form-label" for="account_no">Account No  <span class="text-danger">*</span></label>
                     <input type="number" class="form-control input-spin-none" id="account_no" name="account_no" placeholder="Account No" autocomplete="off"maxlength="18" pattern="\d{1,18}" value="">
                     <div class="invalid-feedback">Only number is allowed</div>
                   </div>
    
                    <div class="col-md-2">
                    <label class="form-label" for="account_type">Account Type  <span class="text-danger">*</span></label>
                       <select class="form-select" id="account_type" name="account_type">
                           <option value="" selected="">Select Account Type</option>
                           <option value="Saving">Saving</option>
                           <option value="Current">Current</option>
                      </select>
                      <div class="invalid-feedback">Select Account Type</div>
                   </div>
    
                    <div class="col-md-2">
                    <label class="form-label" for="ifsc_code">IFSC Code </label>
                     <input type="text" class="form-control" id="ifsc_code" name="ifsc_code" placeholder="IFSC Code" autocomplete="off"  pattern="[A-Z]{4}[0][\d]{6}"  value="">
                   </div>


                  <div class="col-md-2">
                    <label class="form-label" for="loan_amount">Loan collection Amount <span class="text-danger">*</span></label>
                     <input type="integer" class="form-control input-spin-none" id="loan_amount" name="loan_amount" placeholder="Loan amount" autocomplete="off" pattern="[0-9,]+" value="">
                     <div class="invalid-feedback">Only number is allowed</div>
                   </div>
    
                    <!-- div class="col-md-2">
                        <label class="form-label" for="amount">Monthly EMI Amount <span class="text-danger">*</span></label>
                         <input type="integer" class="form-control input-spin-none" id="amount" name="amount" placeholder="Amount" autocomplete="off" pattern="[0-9,]+" value="">
                         <div class="invalid-feedback">Only number is allowed</div>
                   </div> -->
                
                <div class="col-md-2">
                    <label class="form-label" for="emi_frequency">EMI Frequency <span class="text-danger">*</span></label>
                    <select class="form-select" id="emi_frequency" name="emi_frequency" onchange="changeEMIFrequency(this.value)">
                      <option value="" selected="">Select Frequency</option>
                           <option value="DAIL">Daily</option>
                           <option value="WEEK">Weekly</option>  
                           <option value="MNTH">Monthly</option>
                           <option value="BIMN">Bi-monthly - 2 Months</option>
                           <option value="QURT">Quarterly - 3 Months</option> 
                           <option value="MIAN">Semi-Annual - 6 Months</option>
                           <option value="YEAR">Yearly - 12 Months</option>
                           <option value="ADHO">As and when presented</option>    
    
                      </select>
                   </div>


                 <div class="col-md-2">
                   <label class="form-label" for="emi_count">EMI Count <span class="text-danger">*</span></label>
                   <input type="text" class="form-control" id="emi_count" name="emi_count" placeholder="EMI Count" autocomplete="off" value="" min="" onkeyup="changeEMICount(this.value);" disabled>
                 </div>
    

                   <div class="col-md-2" id="transactionDate_div">
                   
                   </div>
    
                     <div class="col-md-2">
                    <label class="form-label" for="customer_start_date">EMI Start Date  <span class="text-danger">*</span></label>
                    <input type="date" class="form-control" id="customer_start_date" name="customer_start_date" placeholder="Start Date" autocomplete="off" value="" min=""  disabled   oninput="changeEMIStartDate(this.value);">
                   </div>
            
                  <div class="col-md-2">
                    <label class="form-label" for="customer_end_date">EMI End Date  <span class="text-danger">*</span></label>
                     <input type="date" class="form-control" id="customer_end_date" name="customer_end_date" placeholder="End Date" autocomplete="off" value="" min=""  disabled>
                   </div>
    
    
                     <!-- <div class="col-md-4"> -->
                    <!-- <label class="form-label" for="commission_amount">Commission Amount</label> -->
                     <input type="hidden" class="form-control" id="commission_amount" name="commission_amount" placeholder="Commission Amount" autocomplete="off" value="0" readonly>
                   <!-- </div> -->
                    
                      <hr class="mb-0">
                           <div class="accordion accordion-flush d-none" id="scheduleAccrodion">
                              <div class="accordion-item">

                                <span class="warning-message text-center my-1" id="warningMessage" style="display:none;"></span>
                                    
                                <h2 class="accordion-header">
                                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-schedule" aria-expanded="false" aria-controls="flush-schedule">
                                    Schedule Details
                                  </button>
                                </h2>
                                
                                <div id="flush-schedule" class="accordion-collapse collapse" data-bs-parent="#scheduleAccrodion">
                                    <div class="table-responsive" style="max-height:200px;">
                                        <table class="table table-sm table-striped">
                                            <th>Sr No</th>
                                            <th>Date</th>
                                            <th>Amount</th>
                                            <tbody id="SchedulePreview"></tbody>
                                        </table>
                                        
                                    </div>
                                    </div>
                                </div>

                              </div>

                             <!--  <div class="accordion accordion-flush d-none" id="dynamicscheduleAccrodion">
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-schedule" aria-expanded="false" aria-controls="flush-schedule">
                                           Dynamic Schedule Details
                                        </button>
                                    </h2>
                                    
                                    <div id="flush-schedule2" class="accordion-collapse collapse" data-bs-parent="#dynamicscheduleAccrodion">
                                        <div class="table-responsive" style="max-height:200px;">
                                            <table class="table table-sm table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Sr No</th>
                                                        <th>Date</th>
                                                        <th>Amount</th>
                                                        <th>Edit</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="DynamicSchedulePreview"></tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div> -->

                         
    
                     <hr class="mb-0">
                           <div class="accordion accordion-flush" id="accordionFlushExample">
                              <div class="accordion-item">
                                <h2 class="accordion-header">
                                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                    Other Details
                                  </button>
                                </h2>
                                <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                <div class="row">
                                <div class="col-md-4">
                                  <label class="form-label" for="customer_email">Email</label>
                                  <input type="email" class="form-control" id="customer_email" name="customer_email" placeholder="Email" autocomplete="off" value="" pattern="^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$">
                                  <div class="invalid-feedback">Enter Valid email ID</div>
                                </div> 
                                                   
                                <div class="col-md-4">
                                  <label class="form-label" for="customer_adhar_card">Adhar Card</label>
                                  <input type="number" class="form-control input-spin-none" id="customer_adhar_card" name="customer_adhar_card" placeholder="Aadhar Card" pattern="[0-9]{12}" maxlength="12" autocomplete="off" value="">
                                  <div class="invalid-feedback">Only number are allowed</div>
                                </div>

                                <div class="col-md-4">
                                  <label class="form-label" for="customer_pan_card">Pan Card</label>
                                  <input type="email" class="form-control" id="customer_pan_card" name="customer_pan_card" placeholder="Pan Card" autocomplete="off" pattern="[A-Z]{5}[0-9]{4}[A-Z]{1}" maxlength="10" minlength="10"  value="">
                                  <div class="invalid-feedback">Enter valid pan card number (e.g., ABCDE1234F)</div>
                                </div>
                                </div> 
                                <p class="label mb-0 mt-4">Identification Details (This will be automatically generated for future references)</p>
                           <div class="row">
                           <div class="col-md-4">
                            <label class="form-label" for="consumer_ID">Consumer ID <span class="text-danger">*</span></label>
                             <input type="text" class="form-control" id="consumer_ID" name="consumer_ID" placeholder="Consumer ID" autocomplete="off" value="" readonly>
                           </div>
            
                            <div class="col-md-4">
                            <label class="form-label" for="txn_ID">Transaction ID/Txn Id <span class="text-danger">*</span></label>
                             <input type="text" class="form-control" id="txn_ID" name="txn_ID" placeholder="Transaction ID" autocomplete="off" value="" readonly>
                           </div>
                                            
                           <div class="col-md-4">
                             <label class="form-label" for="bank_code">Bank Code<span class="text-danger">*</span></label>
                             <div id="showBankCodeData">
                                <input type="text" class="form-control" id="bank_code" name="bank_code" placeholder="Bank Code" autocomplete="off" value="" readonly>
                             </div>
                             
                           </div>
                           </div>
                                </div>
                              </div>
                             
                            </div>
              
          </div>
          <div class="modal-footer d-flex justify-content-between">
            <!-- Add this checkbox to your form -->
              <div class="form-check">
                <input type="checkbox" class="form-check-input" id="termsAndConditions" name="termsAndConditions">
                <label class="form-check-label" for="termsAndConditions">
                I accept all the<a href="<?php echo base_url();?>TermsAndConditions/" target="_blank"> Terms and Conditions</a> of Sync-eNACH.
                </label>
              </div>
       </form>
              <div class="buttons-container">
                 <span id="countdownTimer" class="timer"></span>
                
                    <button class="btn btn-sm btn-outline-primary" type="button" data-bs-dismiss="modal">Close</button>
                  <!-- ml-auto class will push the buttons to the right side  -->
                  <button class="btn btn-sm btn-primary  item-addMandateDetails" id="addMandateDetails" type="submit">Save</button>
                  
                   <button type="button" class="btn btn-sm btn-primary d-none" id="selfTransactionBtn">Send Link</button>
                   <button type="button" class="btn btn-sm btn-primary d-none" id="selfTransactionResendBtn">Save & Resend Link</button>
              </div>
    
          </div>
       
        </div>
      </div>
    </div>            
    

    <!-- Modal for Edit Customer Details -->

    <div class="modal fade" id="editmandateCustomerModalCenter" tabindex="-1" aria-labelledby="scrollingLongModalLabel2" aria-hidden="true" data-bs-backdrop="static">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="tooltipModalLabel">Add Bank User</h5>
            <button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><span class="fas fa-times fs--1"></span></button>
          </div>
          <div class="modal-body">
           
                  <form id="editmandateCustomerForm" enctype="multipart/form-data" action=""  class="row g-3">
                  <p class="label mb-0">Customer Details</p>
                
                  <!-- <input type="hidden" name="branch_id">
                  <input type="hidden" name="loan_type_id">
                  <input type="hidden" name="id"> -->

                    <div class="col-md-4" id="branchListData_MAIN">
                        <label class="form-label" for="branch_id">Branch<span class="text-danger">*</span> </label>
                        <select class="form-select" id="branch_id" name="branch_id"> 
                            <option value="" selected="">Select Branch</option>
                        </select>
                    </div>
    
                    
                      <div class="col-md-4">
                    <label class="form-label" for="customer_name">Account Holder Name <span class="text-danger">*</span></label>
                     <input type="text" class="form-control text-uppercase" id="customer_name" name="customer_name" placeholder="Account Holder Name" autocomplete="off" value="" required pattern="[A-Za-z\s]+">
                       <div class="invalid-feedback">Only Capital letters are allowed.</div>
                   </div>
    
                     <div class="col-md-4">
                    <label class="form-label" for="customer_mobile_no">Mobile No <span class="text-danger">*</span></label>
                     <input type="tel" class="form-control input-spin-none" id="customer_mobile_no" name="customer_mobile_no" placeholder="Mobile No" autocomplete="off" value="" pattern="[0-9]{10}"  minlength="10" maxlength="10" onkeyup="setConsumerAndTransactionID();"  oninput="this.value = this.value.replace(/[^0-9]/g, '');"/>

                     <div class="invalid-feedback">Only 10 digit phone number are allowed</div>
                   </div>
    
                   <div class="col-md-4">
                    <label class="form-label" for="customer_email">Email</label>
                      <input type="email" class="form-control" id="customer_email" name="customer_email" placeholder="Email" autocomplete="off" value="" pattern="^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$">
                      <div class="invalid-feedback">Enter Valid email ID</div>
                   </div>


                   <div class="col-md-4">
    
                      <label class="form-label" for="loan_type_id">Loan Type<span class="text-danger">*</span></label>
    
                       <div id="loanListData">
                         
                           <select class="form-select" id="loan_type_id" name="loan_type_id">
                            
                             <option value="" selected="">Select Loan</option>
                           
                          </select>
                          <div class="invalid-feedback">Select Loan Type</div>

                       </div>
                        <!-- </div> -->
    
                       
                    </div>

                    <div class="col-md-4">
                    <label class="form-label" for="bank_account_no">Bank Loan Account Number<span class="text-danger">*</span></label>
                     <input type="number" class="form-control input-spin-none" id="bank_account_no" name="bank_account_no" placeholder="Bank Account No." maxlength="18" pattern="\d{1,18}" autocomplete="off" value="" required>
                      <div class="invalid-feedback">Only number are allowed</div>
                   </div>
           
                  <div class="col-md-4">
                 
                   <label class="form-label" for="document">Upload Document <span class="text-danger">*</span></label>

                   <input type="file" id="document" name="document" class="form-control" accept=".pdf,.doc,.docx, .png" onchange="validateFileSize(this)">
                 
                   <input type="hidden" id="document_copy" name="document_copy" class="form-control" accept=".pdf,.doc,.docx, .png">

                    <div class="invalid-feedback">Select Document</div>
                   <span id="documentName"></span>
                  </div>
                  <!-- <div>
                  <label class="form-label" for="document">Upload Document</label>

                  </div>
                  <div  >

                  <input type="file" id="fileInput" name="document">
                  </div> -->
                  <div id="documentContainer">
                  <img id="documentImage" src="" alt="Document Image" style="max-width: 50px; max-height: 50px;">

                  </div>
    
                  <hr class="mb-0">
                   <!-- <div class="col-md-4"> -->
                    <!-- <label class="form-label" for="merchant_ID">Merchant ID</label> -->
                    <input type="hidden" name="mandate_customer_id" id="mandate_customer_id">
                   <!-- </div> -->
      
          </div>
          <div class="modal-footer d-flex justify-content-between">
         
              <div class="buttons-container">
                  <!-- ml-auto class will push the buttons to the right side  -->
                  <button class="btn btn-primary  item-editMandateDetails" name="editMandateDetails" id="editMandateDetails" type="button">Save</button>
                  <button class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Close</button>
              </div>
    
            
          </div>
          </form>
        </div>
      </div>
    </div>          
       <!--End  -->

            
       
    <div class="modal fade" id="verifyMandateModal" tabindex="-1" aria-labelledby="scrollingLongModalLabel2" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable ">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tooltipModalLabel">Verify Mandate Details</h5>
        <button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><span class="fas fa-times fs--1"></span></button>
      </div>
      
      <div class="modal-body">
         
         <div class="table-responsive">
         
          <table class="table table-striped table-sm fs--1 mb-0">
           <thead>
              <tr> 
                <th class="border-top">Merchant Code</th>
                <td class="border-top" id="merchantCode"></td>
              </tr>
               <tr> 
                <th class="border-top">Merchant Transaction ID</th>
                <td class="border-top" id="merchantTransactionIdentifier"></td>
              </tr>
              <tr> 
                <th class="border-top">Merchant Transaction Request Type</th>
                <td class="border-top" id="merchantTransactionRequestType"></td>
              </tr>
               <tr> 
                <th class="border-top">Account No.</th>
                <td class="border-top" id="instrumentToken"></td>
              </tr>
               <tr> 
                <th class="border-top">Bank Reference ID</th>
                <td class="border-top" id="bankReferenceIdentifier"></td>
              </tr>
              <tr> 
                <th class="border-top">Payment ID</th>
                <td class="border-top" id="paymentIdentifier"></td>
              </tr>
              <tr> 
                <th class="border-top">Payment Token</th>
                <td class="border-top" id="paymentToken"></td>
              </tr>
              <tr> 
                <th class="border-top">Status</th>
                <td class="border-top" id="statusMessage"></td>
              </tr>
            </thead>
          </table>
    
        
        </div>
       
      </div>
    
    <div class="modal-footer">
      <button class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Close</button>
    </div>
    
    </div>
    </div>
    </div>   


   <div class="modal fade" id="successMandateModal" tabindex="-1" aria-labelledby="scrollingLongModalLabel2" aria-hidden="true" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable ">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="tooltipModalLabel">Mandate Added</h5>
                <button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><span class="fas fa-times fs--1"></span></button>
              </div>
              
              <div class="modal-body">  

                    <p class="label mb-0 justify-content-between"> Mandate details सेव्ह झाले आहे. Mandate Verification Link ग्राहकाला पाठवली आहे. ग्राहकाने ती लिंक Verify केल्यावर Mandate Successful होईल आणि ते Mandate List मध्ये दिसेल.
                     </br></br> Add केलेले Mandate बघायचे किंवा त्यात बदल करायचे असल्यास ते तुम्ही Pending Mandate List मधून करू शकता किंवा <div id="mandateSuccessfulCustomerDetails2"></div> ह्या लिंक वर क्लिक करून बघु शकता.</p>


                    <p class="label mb-0 justify-content-between">Mandate details added. Verification link sent to customer. After verification, you can see it in the mandate list. Check details by clicking on <div id="mandateSuccessfulCustomerDetails1"></div>  or in pending mandate list.</p>
            
              </div>
            
                <div class="modal-footer">
                  <button class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Close</button>
                </div>
            
            </div>
        </div>
    </div>   


        <!-- Transacation schedule Modal -->
        <div class="modal fade" id="warningModal" tabindex="-1" aria-labelledby="warningModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="warningModalLabel">Warning</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Please fill in all EMI dates and amounts before proceeding.

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#mandateCustomerModalCenter">Edit Information</button>

                        <button type="button" id="yesProceedMandateSave" class="btn btn-success">Save & Proceed</button>
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- Transacation schedule Modal -->


  <table class="table table-striped table-sm fs--1 mb-0 d-none" id="reporttableexcel">

     <thead>
                    <tr> 
                      <th class="white-space-nowrap border-top">Sr No.</th>
                      <th class="white-space-nowrap border-top">Name</th>
                      <th class="white-space-nowrap border-top">Phone</th>
                      <th class="white-space-nowrap border-top">Branch</th>
                      <th class="white-space-nowrap border-top">Amount</th>
                      <th class="white-space-nowrap border-top">EMI Start Date</th>
                      <th class="white-space-nowrap border-top">EMI End Date</th>
                      <th class="white-space-nowrap border-top">Status</th>
                      <th class="white-space-nowrap border-top">Register Date</th>
                      <th class="white-space-nowrap border-top">Email</th>
                      <th class="white-space-nowrap border-top">Bank</th>
                      <th class="white-space-nowrap border-top">Account</th>               
                     
                      </tr>
                    </thead>
                    <tbody class="list" id="showReportResultexcel">

                    </tbody>

            </table>
          </div>
                

  <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.4/xlsx.full.min.js"></script>
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>    




<script type="text/javascript">


 function handleAmountOptionChange(type) {
        amountFilterType = type;
        amountInputVal=0;
        amountFromInputVal=0;
        amountToInputVal=0;

        var fixedOption = document.getElementById("amountFilterFixed");
        var betweenOption = document.getElementById("amountFilterBetween");
        var lessThanOption = document.getElementById("amountFilterLessThan");
        var greaterThanOption = document.getElementById("amountFilterGreaterThan");

        var amountInputContainer = document.getElementById("amountInputContainer");
        var amountRangeInputContainer = document.getElementById("amountRangeInputContainer");

        if (fixedOption.checked) {
            amountInputContainer.classList.remove("d-none");
            amountRangeInputContainer.classList.add("d-none");
        } else if (betweenOption.checked) {
            amountInputContainer.classList.add("d-none");
            amountRangeInputContainer.classList.remove("d-none");
        } else if (lessThanOption.checked) {
            amountInputContainer.classList.remove("d-none");
            amountRangeInputContainer.classList.add("d-none");
        }
        else if(greaterThanOption.checked){
            amountInputContainer.classList.remove("d-none");
            amountRangeInputContainer.classList.add("d-none");
        }
    }

     function handleEMIStartDateOptionChange(type) {

        emiStartDateFilterType = type;

        emiStartDateInputVal = null;
        emiStartDateFromInputVal = null;
        emiStartDateToInputVal = null;

        var fixedOption = document.getElementById("emiStartDateFilterFixed");
        var betweenOption = document.getElementById("emiStartDateFilterBetween");
        var lessThanOption = document.getElementById("emiStartDateFilterLessThan");
        var greaterThanOption = document.getElementById("emiStartDateFiltergreaterThan");

        var emiStartDateInputContainer = document.getElementById("emiStartDateInputContainer");
        var emiStartDateRangeInputContainer = document.getElementById("emiStartDateRangeInputContainer");

        if (fixedOption.checked) {
            emiStartDateInputContainer.classList.remove("d-none");
            emiStartDateRangeInputContainer.classList.add("d-none");
        } else if (betweenOption.checked) {
            emiStartDateInputContainer.classList.add("d-none");
            emiStartDateRangeInputContainer.classList.remove("d-none");
        } else if (lessThanOption.checked || greaterThanOption.checked) {
            emiStartDateInputContainer.classList.remove("d-none");
            emiStartDateRangeInputContainer.classList.add("d-none");
        }
    }

      function handleEMIEndDateOptionChange(type) {

        emiEndDateFilterType = type;

        emiEndDateInputVal = null;
        emiEndDateFromInputVal = null;
        emiEndDateToInputVal = null;


        var fixedOption = document.getElementById("emiEndDateFilterFixed");
        var betweenOption = document.getElementById("emiEndDateFilterBetween");
        var lessThanOption = document.getElementById("emiEndDateFilterLessThan");
        var greaterThanOption = document.getElementById("emiEndDateFiltergreaterThan");

        var emiEndDateInputContainer = document.getElementById("emiEndDateInputContainer");
        var emiEndDateRangeInputContainer = document.getElementById("emiEndDateRangeInputContainer");

        if (fixedOption.checked) {
            emiEndDateInputContainer.classList.remove("d-none");
            emiEndDateRangeInputContainer.classList.add("d-none");
        } else if (betweenOption.checked) {
            emiEndDateInputContainer.classList.add("d-none");
            emiEndDateRangeInputContainer.classList.remove("d-none");
        } else if (lessThanOption.checked || greaterThanOption.checked) {
            emiEndDateInputContainer.classList.remove("d-none");
            emiEndDateRangeInputContainer.classList.add("d-none");
        }
    }

     function handleEMIRegisterDateOptionChange(type) {

        mandateRegisterDateFilterType = type;

        mandateRegisterDateInputVal = null;
        mandateRegisterDateFromInputVal = null;
        mandateRegisterDateToInputVal = null;

        var fixedOption = document.getElementById("emiRegisterDateFilterFixed");
        var betweenOption = document.getElementById("emiRegisterDateFilterBetween");
        var lessThanOption = document.getElementById("emiRegisterDateFilterLessThan");
        var greaterThanOption = document.getElementById("emiRegisterDateFiltergreaterThan");

        var emiRegisterDateInputContainer = document.getElementById("emiRegisterDateInputContainer");
        var emiRegisterDateRangeInputContainer = document.getElementById("emiRegisterDateRangeInputContainer");

        if (fixedOption.checked) {
            emiRegisterDateInputContainer.classList.remove("d-none");
            emiRegisterDateRangeInputContainer.classList.add("d-none");
        } else if (betweenOption.checked) {
            emiRegisterDateInputContainer.classList.add("d-none");
            emiRegisterDateRangeInputContainer.classList.remove("d-none");
        } else if (lessThanOption.checked || greaterThanOption.checked) {
            emiRegisterDateInputContainer.classList.remove("d-none");
            emiRegisterDateRangeInputContainer.classList.add("d-none");
        }
    }

      </script>  
      <script type="text/javascript">
        var agreeTC= false;
       var timerInterval;
        $(document).ready(function() {
         
          var dataTable;

                
          var searchTerm;

          var amountFilterType='';
          var amountInputVal=0;
          var  amountFromInputVal=0;
          var  amountToInputVal=0;

          var emiStartDateFilterType = '';
          var emiStartDateInputVal = null;
          var emiStartDateFromInputVal = null;
          var emiStartDateToInputVal = null;

          var emiEndDateFilterType = '';
          var emiEndDateInputVal = null;
          var emiEndDateFromInputVal = null;
          var emiEndDateToInputVal = null;

          var mandateRegisterDateFilterType = '';
          var mandateRegisterDateInputVal = null;
          var mandateRegisterDateFromInputVal = null;
          var mandateRegisterDateToInputVal = null;
          

          // Set the minimum date dynamically
          var today = new Date();
          today.setDate(today.getDate() + 3);
        
          var minDate = today.toISOString().split('T')[0]; // Format: YYYY-MM-DD
          $('#customer_start_date').attr('min', minDate);
          $('#customer_end_date').attr('min', minDate);

            var searchMoreInput = document.getElementById('searchMoreFilter');
            // Get all filter items

            var filterMoreItems = document.querySelectorAll('#more_filter .dropdown-item');


            var searchStatusInput = document.getElementById('searchStatusFilter');
            // Get all filter items

            var filterStatusItems = document.querySelectorAll('#status_filter .dropdown-item');

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

             searchStatusInput.addEventListener('keyup', function () {
                var searchText = this.value.toLowerCase(); // Convert input value to lowercase for case-insensitive search
                // Loop through each filter item
                filterStatusItems.forEach(function (item) {
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
        
         function fetchDebitDates() {

            $.ajax({
                type: 'GET',
                url: '<?php echo base_url(); ?>api/DebitDate/showDate',
                dataType: 'json',
                beforeSend: function(xhr) {
                    xhr.setRequestHeader('X-API-KEY', 'enachSyncWorks');
                },
                success: function(response) {
                    var data = response.data;

                    var htmlDates='<label class="form-label" for="transactionDate">EMI Debit Date <span class="text-danger">*</span></label>'+
                      
                        '<select class="form-select" id="transactionDate" name="transactionDate"  disabled  oninput="changeEMIDebitDate(this.value);">'+
                        '<option value="">Select EMI Debit Date</option>';
        
                    for (var i = 0; i < data.length; i++) {
                       htmlDates+='<option value="'+data[i].transactionDate+'" >'+data[i].transactionDate+'</option>';
                    }
                  
                    htmlDates+='</select>';
                    $('#transactionDate_div').html(htmlDates);
                },
                error: function(xhr, status, error) {
                    toastr.error("An error occurred while fetching debit dates.");
                    console.error(xhr.responseText);
                }
            });
        }


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

                      if(checkboxId=="amountFilter"){
                        amountInputContainer.classList.add("d-none");
                        amountRangeInputContainer.classList.add("d-none");
                      }
                    
                      if(checkboxId=="emiStartDateFilter"){
                        emiStartDateInputContainer.classList.add("d-none");
                        emiStartDateRangeInputContainer.classList.add("d-none");
                      }
                    
                      if(checkboxId=="emiEndDateFilter"){
                        emiEndDateInputContainer.classList.add("d-none");
                        emiEndDateRangeInputContainer.classList.add("d-none");
                      }
                     
                      if(checkboxId=="registeredDateFilter"){
                        emiRegisterDateInputContainer.classList.add("d-none");
                        emiRegisterDateRangeInputContainer.classList.add("d-none");
                      }
                }
    }


        var emiFrequency_fun='';
        var startDate_fun='';
        var emiCount_fun='';
        var emiDate_fun='';
        var endDate_fun='';
    
        
        function changeEMIFrequency(emiFrequency) {
          
          emiFrequency_fun = emiFrequency;

          $('#scheduleAccrodion').addClass('d-none');

          if (emiFrequency_fun == 'ADHO') 
          {

                $('#transactionDate_div').addClass('d-none');
                $('#emi_count').attr('disabled', false);
                $('#customer_start_date').attr('disabled', true);
                $('#customer_end_date').attr('disabled', true);
                     
          }else{

            $('#transactionDate_div').removeClass('d-none');

            $('input[name=emi_count]').val('');
            $('select[name=transactionDate]').val('');
            $('input[name=customer_start_date]').val('');
            $('input[name=customer_end_date]').val('');
          
            $('#emi_count').attr('disabled', false);
            $('#transactionDate').attr('disabled', true);
            $('#customer_start_date').attr('disabled', true);
            $('#customer_end_date').attr('disabled', true);

          }

         
  
        }


        function changeEMICount(emiCount) {
       
          emiCount_fun = emiCount;

          if (emiFrequency_fun == 'ADHO') 
          {
                $('input[name=customer_start_date]').val('');
                $('input[name=customer_end_date]').val('');
                
                $('#customer_start_date').attr('disabled', false);
                $('#customer_end_date').attr('disabled', true);
                     
          }else{
             $('input[name=customer_start_date]').val('');
              $('input[name=customer_end_date]').val('');
              $('select[name=transactionDate]').val('');

              $('#transactionDate').attr('disabled', false);
              $('#customer_start_date').attr('disabled', true);
              $('#customer_end_date').attr('disabled', true);
         
          }
       
         
        }

        function changeEMIDebitDate(emiDebitDate) {
       
          emiDate_fun = emiDebitDate;
          $('input[name=customer_start_date]').val('');
          $('input[name=customer_end_date]').val('');
          $('#customer_start_date').attr('disabled', false);
          $('#customer_end_date').attr('disabled', true);
     
        }


        function changeEMIStartDate(emiStartDate) {
       
        if (emiFrequency_fun == 'ADHO') 
        {
            $('input[name=customer_end_date]').val('');
            $('#customer_end_date').attr('disabled', false);
                     
        }
        else{

            startDate_fun = emiStartDate;
            $('input[name=customer_end_date]').val('');
            calculateEndDate();
        }
          
     
        }

        $("#customer_end_date").change(function() {
            var enteredAmount = $('input[name=amount]').val();
            var emiCount = $('input[name=emi_count]').val();
            var startDate = $('input[name=customer_start_date]').val();
            var endDate = $('input[name=customer_end_date]').val();

            var start = new Date(startDate);
            var end = new Date(endDate);
            var schedule = [];

            if (emiCount <= 0) {
                console.log("Invalid EMI count.");
                return;
            }

            // Calculate the EMI interval in milliseconds
            var timeDiff = end.getTime() - start.getTime();
            var emiInterval = timeDiff / (emiCount - 1);

            for (let i = 0; i < emiCount; i++) {
                let emiDate = new Date(start.getTime() + (emiInterval * i));
                if (emiDate > end) {
                    console.log("EMI schedule exceeds the end date.");
                    break;
                }
                schedule.push(emiDate);
            }

            var schedule_html = '';
            for (var k = 0; k < schedule.length; k++) {
                var x = k + 1;
                var formattedDate = formatDate(schedule[k]);

                // Render input fields for date and editable amount
                schedule_html += '<tr>' +
                    '<td>' + x + '</td>' +
                    '<td><input type="date" class="form-control form-control-sm datepicker" value="" ></td>' +
                    '<td><input type="number" class="form-control form-control-sm" id="loan_amount" name="amount" value="" ></td>' +
                    '</tr>';
            }

            $('#scheduleAccrodion').removeClass('d-none');
            $('#SchedulePreview').html(schedule_html);

            // Initialize DataTable (add additional configurations as needed)
            var table = $('#ScheduleTable').DataTable({
                paging: false,
                searching: false,
                info: false,
                destroy: true  // Add destroy to allow reinitialization
            });

            // Initialize the Datepicker for the input fields
      

            // Save the edited data on blur for the amount field
            $('#ScheduleTable tbody').on('blur', 'td[contenteditable="true"]', function() {
                var cell = table.cell(this);
                var newValue = $(this).text().trim();
                cell.data(newValue).draw();
            });
        });

        
        function formatDate(date) {
            // Get day, month, and year from the Date object
            let day = date.getDate();
            let month = date.getMonth() + 1; // Months are zero-indexed in JavaScript
            let year = date.getFullYear();

            // Format day and month to be two digits
            day = day < 10 ? '0' + day : day;
            month = month < 10 ? '0' + month : month;

            // Return the formatted date string
            return `${day}-${month}-${year}`;
        }


        function calculateEndDate() {

            var loanCollectionAmount = $('input[name=loan_amount]').val();

            var startDate     = $('input[name=customer_start_date]').val();
            var emiCount      =  $('input[name=emi_count]').val();
            var emiDate       = $('select[name=transactionDate]').val();
            var emiFrequency  = $('select[name=emi_frequency]').val();
            var collectionEMIAmount =  0 ;

            collectionEMIAmount = (loanCollectionAmount / emiCount); // Round up


              if (startDate && emiCount && emiFrequency && emiDate) {
                    var start = new Date(startDate);
                  
                    var todayDate = new Date();

                    var endDate = new Date(start);

                    var count = parseInt(emiCount, 10);
                 
                    var interval;

                    var schedule = [];

                    let firstEmiDate;
                   
                   if(start.getDate() >= emiDate && start.getMonth() >= todayDate.getMonth()) {
                        firstEmiDate = new Date(start.getFullYear(), start.getMonth() + 1, emiDate);
                    }   
                    else {
                        firstEmiDate = new Date(start.getFullYear(),start.getMonth(), emiDate);
                    }  

                        endDate= firstEmiDate;
                        var schduleDate='';
                        switch (emiFrequency) {
                            case "DAIL":
                                interval = 1;

                               for (let i = 0; i < emiCount; i++) {
                                 
                                     endDate  = new Date(endDate.getFullYear(), endDate.getMonth(),endDate.getDate());
                                     schduleDate  = new Date(endDate.getFullYear(), endDate.getMonth(),endDate.getDate());
                                
                                     schedule.push(schduleDate);
                                     endDate.setDate(endDate.getDate()+parseInt(interval));
                                     // schduleDate.setUTCDate(schduleDate.getDate());


                                }
                                
                                // endDate.setUTCDate(endDate.getDate());
                                // endDate.setDate(0);

                                break;
                            case "WEEK":
                                interval = 7;

                                for (let i = 0; i < emiCount; i++) {
                                     
                                     endDate  = new Date(endDate.getFullYear(), endDate.getMonth(),endDate.getDate());
                                     schduleDate  = new Date(endDate.getFullYear(), endDate.getMonth(),endDate.getDate());
                                
                                     schedule.push(schduleDate);
                                     endDate.setDate(endDate.getDate()+parseInt(interval));
                                    
                                }
                                
                                break;
                            case "MNTH":
                                interval = 1;

                               for (let i = 0; i < emiCount; i++) {
                                        
                                     endDate  = new Date(endDate.getFullYear(), endDate.getMonth(),emiDate);
                                     schduleDate  = new Date(endDate.getFullYear(), endDate.getMonth(),emiDate);
                                
                                     schedule.push(schduleDate);
                                     endDate.setMonth(endDate.getMonth()+parseInt(interval));
                                    
                                }
                               
                                // endDate.setUTCDate(endDate.getDate());
                                // endDate.setDate(0);
                                
                                break;  
                            case "BIMN":
                                interval = 2;
                                for (let i = 0; i < emiCount; i++) {
                                        
                                     endDate  = new Date(endDate.getFullYear(), endDate.getMonth(),emiDate);
                                     schduleDate  = new Date(endDate.getFullYear(), endDate.getMonth(),emiDate);
                                
                                     schedule.push(schduleDate);
                                     endDate.setMonth(endDate.getMonth()+parseInt(interval));
                                    
                                }
                                
                                break;
                            case "QURT":
                                interval = 3;
                                 for (let i = 0; i < emiCount; i++) {
                                        
                                     endDate  = new Date(endDate.getFullYear(), endDate.getMonth(),emiDate);
                                     schduleDate  = new Date(endDate.getFullYear(), endDate.getMonth(),emiDate);
                                
                                     schedule.push(schduleDate);
                                     endDate.setMonth(endDate.getMonth()+parseInt(interval));
                                    
                                }
                                  
                                break;
                            case "MIAN":
                                interval = 6;
                                for (let i = 0; i < emiCount; i++) {
                                        
                                     endDate  = new Date(endDate.getFullYear(), endDate.getMonth(),emiDate);
                                     schduleDate  = new Date(endDate.getFullYear(), endDate.getMonth(),emiDate);
                                
                                     schedule.push(schduleDate);
                                     endDate.setMonth(endDate.getMonth()+parseInt(interval));
                                    
                                }
                                  
                                break;
                            case "YEAR":
                                interval = 12;
                                for (let i = 0; i < emiCount; i++) {
                                        
                                     endDate  = new Date(endDate.getFullYear(), endDate.getMonth(),emiDate);
                                     schduleDate  = new Date(endDate.getFullYear(), endDate.getMonth(),emiDate);
                                
                                     schedule.push(schduleDate);
                                     endDate.setMonth(endDate.getMonth()+parseInt(interval));
                                    
                                }
                                  
                                break;
                            case "ADHO":
                                interval = 1;
                                for (let i = 0; i < emiCount; i++) {
                                        
                                     endDate  = new Date(endDate.getFullYear(), endDate.getMonth(),emiDate);
                                     schduleDate  = new Date(endDate.getFullYear(), endDate.getMonth(),emiDate);
                                
                                     schedule.push(schduleDate);
                                     endDate.setMonth(endDate.getMonth()+parseInt(interval));
                                    
                                }
                                break;
                            default:
                                console.error("Invalid emiFrequency");
                                return;
                        }

                    var schedule_html='';    
                    for (var k = 0;k < schedule.length;k++) {
                        var x= k+1;
                         schedule_html+='<tr>'+
                            '<td>'+ x+'</td>'+
                            '<td><input type="text" class="form-control form-control-sm datepicker" value="'+ formatDate(schedule[k])+'" readonly ></td>' +
                            '<td><input type="number" class="form-control form-control-sm" id="amount" name="amount" value="'+collectionEMIAmount+'" readonly></td>' +

                            '</tr>'
                    }    


                    $('#scheduleAccrodion').removeClass('d-none');   
                     
                    $('#SchedulePreview').html(schedule_html);

                    var formattedEndDate = endDate.toISOString().split('T')[0]; // Format as YYYY-MM-DD
                    document.getElementById("customer_end_date").value = formattedEndDate;

                }
                else{


                     $('#scheduleAccrodion').addClass('d-none');   
                     

                    $('#SchedulePreview').html('');

                    document.getElementById("customer_end_date").value = '';

                }
        }


    function calculateStartDate() {
    
        var customerStartDateInput = document.getElementById("customer_start_date");
        var transactionDateInput = document.getElementById("transactionDate");
    
        var customerStartDate = new Date(customerStartDateInput.value);
        var selectedDay = parseInt(transactionDateInput.value);
    
        // Check if the selected day is less than or equal to the day of the start date
        if (selectedDay <= customerStartDate.getDate()) {
            // Move to the next month
            customerStartDate.setMonth(customerStartDate.getMonth() + 1);
            customerStartDate.setDate(selectedDay);
        }

        customerStartDateInput.valueAsDate = customerStartDate;
        calculateEndDate();
    }

    function validateFileSize(input) {
        if (input.files && input.files[0]) {
            var fileSize = input.files[0].size; // in bytes
            var maxSize = 15 * 1024 * 1024; // 15 MB
            $('input[name=document_copy]').val(input.files);
            if (fileSize > maxSize) {
                alert("File size exceeds the limit of 15 MB.");
                input.value = ''; // Clear the file input
            }
        }
    }


        
        </script>     
    
      
      
      <script type="text/javascript">
        
            document.addEventListener("DOMContentLoaded", function() {


                showUsersData();
                showBranchData();

        
                var customerNameFilterInput = document.getElementById('customerNameFilterInput');
                var phoneFilterInput = document.getElementById('phoneFilterInput');
                var emailFilterInput = document.getElementById('emailFilterInput');
                var bankFilterInput = document.getElementById('bankFilterInput');  
                
                var amountFromInput = document.getElementById('amountFromInput');  
                var amountToInput = document.getElementById('amountToInput');  
                var amountInput = document.getElementById('amountInput');  
                
                var emiStartDateInput =$('#emiStartDateInput');  
                var emiStartDateFromInput = $('#emiStartDateFromInput');  
                var emiStartDateToInput = $('#emiStartDateToInput');  

                var emiEndDateInput =$('#emiEndDateInput');  
                var emiEndDateFromInput = $('#emiEndDateFromInput');  
                var emiEndDateToInput = $('#emiEndDateToInput');  
                
                var mandateRegisterDateInput =$('#emiRegisterDateInput');  
                var mandateRegisterDateFromInput = $('#emiRegisterDateFromInput');  
                var mandateRegisterDateToInput = $('#emiRegisterDateToInput');  


                 $('#clearBranchFilter').click(function(){
                    $("input[name='branch_mandate_filter']:checked").prop("checked", false);
                    branchFilterChange();
                 });

                 $('#clearStatusFilter').click(function(){
                    $("input[name='status_mandate_filter']:checked").prop("checked", false);
                    statusFilterChange();
                 });

                 $('#clearMoreFilter').click(function(){


                     $("#emiStartDateInput").val("");
                     $("#emiStartDateFromInput").val("");
                     $("#emiStartDateToInput").val("");
                     $("#emiEndDateInput").val("");
                     $("#emiEndDateFromInput").val("");
                     $("#emiEndDateToInput").val("");
                     $("#emiRegisterDateInput").val("");
                     $("#emiRegisterDateFromInput").val("");
                     $("#emiRegisterDateToInput").val("");
                     $("#amountInput").val("");
                     $("#amountFromInput").val("");
                     $("#amountToInput").val("");

                    dataTable.column('mandate_customers.customer_name:name').search('', true).draw();
                    dataTable.column('mandate_customers.customer_mobile_no:name').search('', true).draw();
                    dataTable.column('mandate_customers.customer_email:name').search('', true).draw();
                    dataTable.column('enach_banks.enach_bank_name:name').search('',true).draw();
                    dataTable.column('mandate_customers.amount:name').search('', true).draw();
                    dataTable.column('mandate_customers.customer_start_date:name').search('', true).draw();
                    dataTable.column('mandate_customers.customer_end_date:name').search('', true).draw();
                    dataTable.column('mandate_customers.mandate_register_datetime:name').search('', true).draw();
                   
                    

                    $("#customerNameFilter").prop("checked", false);
                    $("#phoneFilter").prop("checked", false);
                    $("#amountFilter").prop("checked", false);
                    $("#emiStartDateFilter").prop("checked", false);
                    $("#emiEndDateFilter").prop("checked", false);
                    $("#registeredDateFilter").prop("checked", false);
                    $("#emailFilter").prop("checked", false);
                    $("#bankFilter").prop("checked", false);
                    $("input[name='amountFilter']:checked").prop("checked", false);
                    $("input[name='emiStartDateFilter']:checked").prop("checked", false);
                    $("input[name='emiEndDateFilter']:checked").prop("checked", false);
                    $("input[name='emiRegisterDateFilter']:checked").prop("checked", false);
                  
                    handleCheckboxChange('customerNameFilter', 'customerNameFilterValue');
                    handleCheckboxChange('phoneFilter', 'phoneFilterValue');
                    handleCheckboxChange('amountFilter', 'amountFilterValue');
                    handleCheckboxChange('emiStartDateFilter', 'emiStartDateFilterValue');
                    handleCheckboxChange('emiEndDateFilter', 'emiEndDateFilterValue');
                    handleCheckboxChange('registeredDateFilter', 'registeredDateFilterValue');
                    handleCheckboxChange('emailFilter', 'emailFilterValue');
                    handleCheckboxChange('bankFilter', 'bankFilterValue');

                    customerNameFilterInput.value='';
                    phoneFilterInput.value='';
                    emailFilterInput.value='';
                    bankFilterInput.value='';
                    amountFromInput.value='';
                    amountToInput.value='';
                    amountInput.value='';
                    emiStartDateInput.value='';
                    emiStartDateFromInput.value='';
                    emiStartDateToInput.value='';
                    emiEndDateInput.value='';
                    emiEndDateFromInput.value='';
                    emiEndDateToInput.value='';
                    mandateRegisterDateInput.value='';
                    mandateRegisterDateFromInput.value='';
                    mandateRegisterDateToInput.value='';

                });


                 function branchFilterChange(){

                     var branch_mandate_filter = $('input:checkbox[name="branch_mandate_filter"]:checked').map(function() {
                            return '^' + this.value + '$';
                        }).get().join('|');
               
                     dataTable.column('bank_branches.branch_name:name').search(branch_mandate_filter, true).draw(); // Set regex flag to true
                     var branchFilterCount = $('input:checkbox[name="branch_mandate_filter"]:checked').length;
                     $('#branchFilterCount').html('('+branchFilterCount+')');
                     
       
                 }
             
                $("input[name='branch_mandate_filter']").change(function () { 

                  branchFilterChange();
              
                });


                 function statusFilterChange(){
                     var status_mandate_filter = $('input:checkbox[name="status_mandate_filter"]:checked').map(function() {
                              return '^' + this.value + '$';
                            }).get().join('|');
                    
                     dataTable.column('mandate_customers.mandate_status_message:name').search(status_mandate_filter, true).draw(); 
                     var statusFilterCount = $('input:checkbox[name="status_mandate_filter"]:checked').length;
                     $('#statusFilterCount').html('('+statusFilterCount+')');
       
                 }

                $("input[name='status_mandate_filter']").change(function () { 

                    statusFilterChange();
       
                });

                customerNameFilterInput.addEventListener('keyup', function () {
                    // var customerNameColumnIndex = dataTable.column('mandate_customers.customer_name:name').index();
                    dataTable.column('mandate_customers.customer_name:name').search(this.value, true).draw();

                });

                phoneFilterInput.addEventListener('keyup', function () {
                    
                    dataTable.column('mandate_customers.customer_mobile_no:name').search(this.value, true).draw(); 

                });

                emailFilterInput.addEventListener('keyup', function () {
                    
                    dataTable.column('mandate_customers.customer_email:name').search(this.value, true).draw();

                });

                bankFilterInput.addEventListener('keyup', function () {
                    
                    dataTable.column('enach_banks.enach_bank_name:name').search(this.value, true).draw(); 

                });

                
             


                amountFromInput.addEventListener('keyup', function () {

                    amountInputVal=0;
                    amountFromInputVal=$("#amountFromInput").val();
                    amountToInputVal=$("#amountToInput").val();

                    amountFilterFunction(amountFilterType,amountInputVal,amountFromInputVal,amountToInputVal);
                });
               
                amountToInput.addEventListener('keyup', function () {
                    amountInputVal=0;
                    amountFromInputVal=$("#amountFromInput").val();
                    amountToInputVal=$("#amountToInput").val();

                    amountFilterFunction(amountFilterType,amountInputVal,amountFromInputVal,amountToInputVal);
                });
               
               amountInput.addEventListener('keyup', function () {

                    amountInputVal=$("#amountInput").val();
                    amountFromInputVal=0;
                    amountToInputVal=0;
                   
                   amountFilterFunction(amountFilterType,amountInputVal,amountFromInputVal,amountToInputVal);
                }); 

              

                emiStartDateInput.change(function() {

                    emiStartDateInputVal=emiStartDateInput.val();
                    emiStartDateFromInputVal=null;
                    emiStartDateToInputVal=null;
                   
                   emiStartDateFilterFunction(emiStartDateFilterType,emiStartDateInputVal,emiStartDateFromInputVal,emiStartDateToInputVal);
                });

                emiStartDateFromInput.change(function() {

                    emiStartDateInputVal=null;
                    emiStartDateFromInputVal=emiStartDateFromInput.val();
                    emiStartDateToInputVal=emiStartDateToInput.val();
                   
                   emiStartDateFilterFunction(emiStartDateFilterType,emiStartDateInputVal,emiStartDateFromInputVal,emiStartDateToInputVal);
                });

                emiStartDateToInput.change(function() {

                    emiStartDateInputVal=null;
                    emiStartDateFromInputVal=emiStartDateFromInput.val();
                    emiStartDateToInputVal=emiStartDateToInput.val();
                   
                   emiStartDateFilterFunction(emiStartDateFilterType,emiStartDateInputVal,emiStartDateFromInputVal,emiStartDateToInputVal);
                });



                emiEndDateInput.change(function() {

                    emiEndDateInputVal=emiEndDateInput.val();
                    emiEndDateFromInputVal=null;
                    emiEndDateToInputVal=null;
                   
                   emiEndDateFilterFunction(emiEndDateFilterType,emiEndDateInputVal,emiEndDateFromInputVal,emiEndDateToInputVal);
                });

                emiEndDateFromInput.change(function() {

                    emiEndDateInputVal=null;
                    emiEndDateFromInputVal=emiEndDateFromInput.val();
                    emiEndDateToInputVal=emiEndDateToInput.val();
                   
                   emiEndDateFilterFunction(emiEndDateFilterType,emiEndDateInputVal,emiEndDateFromInputVal,emiEndDateToInputVal);
                });

                emiEndDateToInput.change(function() {

                    emiEndDateInputVal=null;
                    emiEndDateFromInputVal=emiEndDateFromInput.val();
                    emiEndDateToInputVal=emiEndDateToInput.val();
                   
                   emiEndDateFilterFunction(emiEndDateFilterType,emiEndDateInputVal,emiEndDateFromInputVal,emiEndDateToInputVal);
                });


              
                mandateRegisterDateInput.change(function() {

                    mandateRegisterDateInputVal=mandateRegisterDateInput.val();
                    mandateRegisterDateFromInputVal=null;
                    mandateRegisterDateToInputVal=null;
                   
                   mandateRegisterDateFilterFunction(mandateRegisterDateFilterType,mandateRegisterDateInputVal,mandateRegisterDateFromInputVal,mandateRegisterDateToInputVal);
                });

                mandateRegisterDateFromInput.change(function() {

                    mandateRegisterDateInputVal=null;
                    mandateRegisterDateFromInputVal=mandateRegisterDateFromInput.val();
                    mandateRegisterDateToInputVal=mandateRegisterDateToInput.val();
                   
                   mandateRegisterDateFilterFunction(mandateRegisterDateFilterType,mandateRegisterDateInputVal,mandateRegisterDateFromInputVal,mandateRegisterDateToInputVal);
                });

                mandateRegisterDateToInput.change(function() {

                    mandateRegisterDateInputVal=null;
                    mandateRegisterDateFromInputVal=mandateRegisterDateFromInput.val();
                    mandateRegisterDateToInputVal=mandateRegisterDateToInput.val();
                   
                   mandateRegisterDateFilterFunction(mandateRegisterDateFilterType,mandateRegisterDateInputVal,mandateRegisterDateFromInputVal,mandateRegisterDateToInputVal);
                });
               
               
               
                
         });

       function amountFilterFunction(filter_type,fixedAmount,fromAmount,toAmount){

 
            if(filter_type=="fixedFilterAmount"){

                    dataTable.column('mandate_customers.amount:name').search(fixedAmount, true).draw();
            }

             if(filter_type=="lessThanFilterAmount"){

                    dataTable.column('mandate_customers.amount:name').search('<'+fixedAmount, true).draw();
            }
            if(filter_type=="greaterThanFilterAmount"){

                dataTable.column('mandate_customers.amount:name').search('>'+fixedAmount, true).draw();
             }

            if(filter_type=="betweenFilterAmount"){
                
                dataTable.column('mandate_customers.amount:name').search(fromAmount+'between'+toAmount, true).draw();

            }
        
       }    

        function emiStartDateFilterFunction(emiStartDateFilterType,fixedEmiStartDate,fromDate,toDate){


            if(emiStartDateFilterType=="fixedFilterStartDate"){

                dataTable.column('mandate_customers.customer_start_date:name').search(fixedEmiStartDate, true).draw();
            }

            if(emiStartDateFilterType=="lessThanFilterStartDate"){

                dataTable.column('mandate_customers.customer_start_date:name').search('<'+fixedEmiStartDate, true).draw();
            }

            if(emiStartDateFilterType=="greaterThanFilterStartDate"){

                dataTable.column('mandate_customers.customer_start_date:name').search('>'+fixedEmiStartDate, true).draw();
            }

            if(emiStartDateFilterType=="betweenFilterStartDate"){
                
                dataTable.column('mandate_customers.customer_start_date:name').search(fromDate+'between'+toDate, true).draw();

            }
        
       }    


        function emiEndDateFilterFunction(emiEndDateFilterType,fixedEmiEndDate,fromDate,toDate){


            if(emiEndDateFilterType=="fixedFilterEndDate"){

                dataTable.column('mandate_customers.customer_end_date:name').search(fixedEmiEndDate, true).draw();
            }

            if(emiEndDateFilterType=="lessThanFilterEndDate"){

                dataTable.column('mandate_customers.customer_end_date:name').search('<'+fixedEmiEndDate, true).draw();
            }

            if(emiEndDateFilterType=="greaterThanFilterEndDate"){

                dataTable.column('mandate_customers.customer_end_date:name').search('>'+fixedEmiEndDate, true).draw();
            }

            if(emiEndDateFilterType=="betweenFilterEndDate"){
                
                dataTable.column('mandate_customers.customer_end_date:name').search(fromDate+'between'+toDate, true).draw();

            }
        
       }  

        function mandateRegisterDateFilterFunction(mandateRegisterDateFilterType,fixedmandateRegisterDate,fromDate,toDate){


            if(mandateRegisterDateFilterType=="fixedFilterRegisterDate"){

                dataTable.column('mandate_customers.mandate_register_datetime:name').search(fixedmandateRegisterDate, true).draw();
            }

            if(mandateRegisterDateFilterType=="lessThanFilterRegisterDate"){

                dataTable.column('mandate_customers.mandate_register_datetime:name').search('<'+fixedmandateRegisterDate, true).draw();
            }

            if(mandateRegisterDateFilterType=="greaterThanFilterRegisterDate"){

                dataTable.column('mandate_customers.mandate_register_datetime:name').search('>'+fixedmandateRegisterDate, true).draw();
            }

            if(mandateRegisterDateFilterType=="betweenFilterRegisterDate"){
                
                dataTable.column('mandate_customers.mandate_register_datetime:name').search(fromDate+'between'+toDate, true).draw();

            }
        
       }    


         function showBranchData() {
         var selectedBankId = 1;  
         var user_branch_id= "<?php echo $this->session->userdata('sub_organization_branch_id');?>";
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

                         
                         if(branch.branch_id==user_branch_id){
                          var option = $('<option selected>').val(branch.branch_id).text(branch.branch_name);

                         }
                         else{
                          var option = $('<option>').val(branch.branch_id).text(branch.branch_name);

                         }
                         


                         var html_filter='<li>'+
                               '<div class="dropdown-item">'+
                             
                                  '<input name="branch_mandate_filter" class="form-check-input" type="checkbox" value="'+branch.branch_name+'" id="checkbox'+branch.branch_name+'">'+
                                  '<label class="form-check-label" style="margin-left:10px;" for="checkbox'+branch.branch_name+'">'+branch.branch_name+'</label>'+
                             
                              '</div>'+
                            '</li>';
                         selectDropdown.append(option);
                         selectDropdownFilter.append(html_filter);
                     });
                     // var filterResetBranch= '<li>'+
                     //             '<hr class="dropdown-divider"/>'+
                     //          '</li><div class="nav nav-links nav-item" id="clearBranchFilter">'+
                     //               '<a class="nav-link" href="#"><span>Clear Filter</span></a>'+
                     //            '</div>';
                     // selectDropdownFilter.append(filterResetBranch);
                      
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

          function showLoanData() {
            $.ajax({
                type: 'GET',
                url: '<?php echo base_url(); ?>api/Bank/showLoanType',
                dataType: 'json',
                beforeSend: function (xhr) {
                    xhr.setRequestHeader('X-API-KEY', 'enachSyncWorks');
                },
                success: function (response) {
                    var data = response.data;
                    var loanDropdown = $('#loan_type_id');

                    loanDropdown.empty();
                    loanDropdown.append($('<option>').val('').text('Select Loan'));

                    if (data && data.length > 0) {
                        $.each(data, function (index, loan) {
                            var option = $('<option>').val(loan.loan_type_id).text(loan.loan_type_name);
                            loanDropdown.append(option);
                        });
                    } else {
                        loanDropdown.append($('<option>').val('').text('No Loan Types Found'));
                    }
                },
                error: function (response) {
                    var loanDropdown = $('#loan_type_id');
                    loanDropdown.empty();
                    loanDropdown.append($('<option>').val('').text('Select Loan'));

                    var data = JSON.parse(response.responseText);
                    toastr.error(data.message);
                }
            });
          }

        showLoanData();
      
        
         $('#addMandateCustomer1').click(function(){

           $('#bank_name').val(''); 
           $('#document').val(''); // Clear the file input
           $('#documentName').text('');
           $('#mandateCustomerForm')[0].reset();
          //  $('#addMandateDetails').html('Submit & Send Link');
           $('#addMandateDetails').html('Save');
           $('#mandateCustomerModalCenter').find('.modal-title').text('Add Mandate Customer');
           $('#mandateCustomerForm').attr('action','<?php echo base_url(); ?>api/User/mandateCustomerInsert');
           // document.getElementById("branchListData_MAIN").style.display = "block";
          
            if (timerInterval) {
                clearInterval(timerInterval);
            }
            
            $('#countdownTimer').html('');
            $('#selfTransactionBtn').addClass('d-none');
            $('#selfTransactionResendBtn').addClass('d-none');
           
           // Call the function to fetch and populate the dropdown
          
             showBanksByPaymentMode('all');
             
              calculateEndDate();
         });
        
        fetchDebitDates(); 

          function showBanksByPaymentMode(payment_mode) {
      
           var div_consumer_card_number = document.getElementById('div_consumer_card_number');
           var div_consumer_expiry_month = document.getElementById('div_consumer_expiry_month');
           var div_consumer_expiry_year = document.getElementById('div_consumer_expiry_year');
           var div_consumer_cvv_no = document.getElementById('div_consumer_cvv_no');
      
        
             $.ajax({
                 type: 'ajax',
                 url: "<?php echo base_url() ?>api/Bank/show_Enach_Banks_By_Payment_Mode",
                 async: false,
                 method:'get',
                 dataType: 'json',
                 data:{payment_mode:payment_mode},
                 beforeSend: function(xhr) {
                     xhr.setRequestHeader('X-API-KEY','enachSyncWorks');
                 },
                 success: function(response) {
                     // body...
                     data=response.data;
                     var html='<select class="form-select" id="bank_name" name="bank_name" onchange="showBankCode(this.value);"><option value="" selected="">Select Bank</option>';
                   var i ="";
      
                     for (var i = 0; i < data.length; i++) {
                            html+='<option value="'+data[i].enach_bank_id+'">'+data[i].enach_bank_name+' ('+data[i].enach_bank_type+')</option>';
                       
                     }
                   
                     html+='</select>';
                
                    $('#bankListData').html(html);
      
                          },
                         
                      error: function(response){
                        var data =JSON.parse(response.responseText);
                        toastr.error(data.message);
                         $('#bankListData').html("");
                         }
      
             });
      
         }

         function showBankCode(enach_bank_id) {
          
      
            $.ajax({
                 type: 'ajax',
                 url: "<?php echo base_url() ?>api/Bank/show_Enach_Bank_row",
                 async: false,
                 method:'get',
                 dataType: 'json',
                 data:{enach_bank_id:enach_bank_id},
                 beforeSend: function(xhr) {
                     xhr.setRequestHeader('X-API-KEY','enachSyncWorks');
                 },
                 success: function(response) {
                     // body...
                     data=response.data;
                     var htmlCode='<input type="text" class="form-control" id="bank_code" name="bank_code" placeholder="Bank Code" autocomplete="off" value="'+data.enach_bank_code+'" readonly>';
                 
                 $('#showBankCodeData').html(htmlCode);
                          },
                      error: function(response){
                        var data =JSON.parse(response.responseText);
                        toastr.error(data.message);
                          $('#showBankCodeData').html();
                         }
      
             });
      
           
         }

      // search
      // Assuming you have an input field for search with ID 'searchInput'
      $('#searchTextCustomer').on('input', function() {

        // var dataTable = $('#dataTable').DataTable({});
         searchTerm = $(this).val();
        dataTable.search(searchTerm).draw();
 
      });


     
         function showUsersData(){

            if ($.fn.DataTable.isDataTable('#dataTable')) {

                // Remove the DataTable state data from localStorage
                
                $('#dataTable').DataTable().destroy();
            }
          

            dataTable =   $('#dataTable').DataTable({
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
                    "processing": true,
                    "serverSide": true,
                    "ordering": true,
                    search: {
                        return: true,
                        
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
                        $('.buttons-pdf').addClass('btn-soft-info');
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


                                <?php if(in_array('exportMandate', $user_permission)): ?>


                                    {
                                        extend: 'csv',
                                        text: '<i class="fas fa-file-excel" aria-hidden="true"></i> Excel',
                                    // Specify filename if needed

                                        action: function (e, dt, node, config) {
                                            // Trigger the Excel export manually
                                           exportToExcel();
                                        }
                                      },

                                   // {
                                   //      extend: 'pdfHtml5',
                                   //      text: '<i class="fas fa-file-pdf" aria-hidden="true"></i> PDF',
                                   //      orientation: 'landscape',
                                   //      pageSize: 'LEGAL',


                                   // }

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
                         'url': "<?php echo base_url() ?>api/User/showMandateUsersList/",
                         'async': false,
                         'method':'get',
                         'dataType': 'json',
                         'dataSrc': 'data',
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
                               return   meta.row + meta.settings._iDisplayStart + 1; // Increment index by 1 to display serial number
                             }
                         },       
                         { 
                                data: 'customer_name',
                                name:'mandate_customers.customer_name',
                                createdCell:function (td, cellData, rowData, row, col) {

                                    
                                    $(td).on('click', function () {
                                     
                                      window.location.href ='<?php echo base_url("Users/transactionSchedule/");?>'+rowData.mandate_customer_id;
                                    });
                                },

                              "render": function (data, type, row) {
                                     return '<span class="sortable-item" style="color: blue;">' + data + '</span>'; 

                                }

                          },
                         { data: 'customer_mobile_no',name:'mandate_customers.customer_mobile_no', orderable: false,search:null},
                         { data: 'branch_name',name:'bank_branches.branch_name', orderable: false},
                         { data: 'amount',name:'mandate_customers.amount', orderable: false, },
                         { 
                            data: 'customer_start_date',
                            name:'mandate_customers.customer_start_date',
                            orderable: false, 
                            "render":function(data, type, row){
                                return formatDateToDMY(data);
                            }
                         },
                         { 
                            data: 'customer_end_date',
                            name:'mandate_customers.customer_end_date',
                            orderable: false, 
                             "render":function(data, type, row){
                                return formatDateToDMY(data);
                            }
                         },
                         { "data": 'mandate_status_message',
                            name:'mandate_customers.mandate_status_message',     
                            orderable: false,
                            "render": function (data, type, row) {
                                    var bgcolor = 'badge-phoenix-primary';
                                    if (data === "success") {
                                        bgcolor = 'badge-phoenix-success';
                                    } else if (data === "failure") {
                                        bgcolor = 'badge-phoenix-danger';
                                    } else if (data === "User Aborted") {
                                        bgcolor = 'badge-phoenix-warning';
                                    }
                                    return '<div class="badge badge-phoenix fs--2 ' + bgcolor + '"><span class="fw-bold">' + data + '</span></div>';
                                }
                         },
                         { 
                            data: 'mandate_register_datetime',
                            name:'mandate_customers.mandate_register_datetime',
                            orderable: false,
                            "render":function(data, type, row){
                                 if(data){
                                     return formatDateToDMY(data);
                                }
                                else{
                                    return '';
                                }
                               
                            }

                            },
                         { data: 'customer_email',name:'mandate_customers.customer_email', orderable: false, },
                         { data: 'enach_bank_name',name:'enach_banks.enach_bank_name', orderable: false, },
                         { data: 'account_no',name:'mandate_customers.account_no', orderable: false, },
                         { 
                            "data": null,
                        //   name:'action',
                             orderable: false,
                            "render": function (data, type, row) {
                                var html = '';
                               
                                let currentDate = new Date();
                                currentDate.setHours(0, 0, 0, 0); 

                                let createdDatetime = new Date(row.created_datetime); 
                                let createdDate = new Date(createdDatetime.getFullYear(), createdDatetime.getMonth(), createdDatetime.getDate());
                                let dateDifference = currentDate.getTime() - createdDate.getTime();
                                let daysDifference = Math.floor(dateDifference / (1000 * 60 * 60 * 24));


                                <?php if(in_array('updateMandate', $user_permission)): ?>
                                html += '<div class="position-relative">';
                                html += '<div class="hover-actions">';
                               
                                if (row.mandate_status_message !== "User Aborted" && daysDifference < 7 
                                    && ! row.mandate_token ) {

                                    html += '<button class="btn btn-sm btn-soft-success me-1 fs--2  item-verifyMandate" data="' + row.mandate_customer_id + '"><span class="fas fa-check"></span></button>';
                                }

                                html += '<a class="btn btn-sm btn-phoenix-primary me-1 fs--2" href="<?php echo base_url();?>Users/transactionSchedule/' + row.mandate_customer_id + '"><span class="uil-calendar-alt"></span></a>';
                                if (row.mandate_status_message !== "success"){
                                
                                html += '<button class="btn btn-sm btn-soft-info me-1 fs--2  item-edit" data-mandate-customer-id="' + row.mandate_customer_id + '"><span class="fas fa-refresh"></span></button>';
                               
                                }
                                if (row.mandate_status_message !== "User Aborted" && row.mandate_status_message !== "failure") {
                               
                                html += '<button class="btn btn-sm btn-soft-warning me-1 fs--2  item-update" data-mandate-customer-id="' + row.mandate_customer_id + '"><span class="fas fa-pencil"></span></button>';
                              }
                                html += '</div>';
                                html += '</div>';
                                html += '<div class="font-sans-serif btn-reveal-trigger position-static">';
                                html += '<button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs--2" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--2"></span></button>';
                                html += '<div class="dropdown-menu dropdown-menu-end py-2">';
                                if (row.mandate_status_message !== "User Aborted" && daysDifference < 7 
                                    && ! row.mandate_token ) {
                                    html += '<a class="dropdown-item item-verifyMandate" data="' + row.mandate_customer_id + '"><span class="uil-comment-verify"></span> Verify</a>';
                                }
                                html += '<a class="dropdown-item" href="<?php echo base_url();?>Users/transactionSchedule/' + row.mandate_customer_id + '"><span class="uil-calendar-alt"></span>Schedule</a>';
                                if (row.mandate_status_message !== "success"){
                                    html += '<a class="dropdown-item item-edit" data-mandate-customer-id="' + row.mandate_customer_id + '" href="#!"><span class="uil-refresh"></span> Retry </a>';
                                }
                                if (row.mandate_status_message !== "User Aborted" && row.mandate_status_message !== "failure") {

                                html += '<a class="dropdown-item item-update" data-mandate-customer-id="' + row.mandate_customer_id + '" href="#!"><span class="uil-edit"></span> Edit </a>';
                              }
                              html += '<a class="dropdown-item" href="<?php echo base_url();?>Change_logs/mandateLog/' + row.mandate_customer_id + '"><span class="uil-calendar-alt"></span>Mandate Log</a>';
                              html += '<a class="dropdown-item" href="<?php echo base_url();?>Change_logs/transactionLog/' + row.mandate_customer_id + '"><span class="uil-calendar-alt"></span>Transaction Log</a>';

                                html += '</div>';
                                html += '</div>';
                                <?php endif; ?>
                                return html;
                            }
                        }
                      ],
                      
                      // "drawCallback": function (settings) {
                       
                        // var api = this.api();
                        // var start = api.page.info().start; // Get start index of current page
                        // api.column(0).nodes().each(function (cell, i) {
                        //     cell.innerHTML = start + i + 1; // Update serial numbers
                        // });

                      // }

            });

         }
      
         // report export to excel
 ///////////////////////////////////////////////////////////////
    function formatDateToDMY(dateString) {
      

       let day, month, year;

        if (dateString.includes(' ')) {
        // Handle "YYYY-MM-DD HH:MM:SS" or "DD-MM-YYYY HH:MM:SS" format
        const datePart = dateString.split(' ')[0];
        if (datePart.includes('-')) {
            const parts = datePart.split('-');
            if (parts[0].length === 4) {
                // "YYYY-MM-DD" format
                [year, month, day] = parts;
            } else {
                // "DD-MM-YYYY" format
                [day, month, year] = parts;
            }
        }
    } else {
        // Handle "YYYY-MM-DD" or "DD-MM-YYYY" format
        if (dateString.includes('-')) {
            const parts = dateString.split('-');
            if (parts[0].length === 4) {
                // "YYYY-MM-DD" format
                [year, month, day] = parts;
            } else {
                // "DD-MM-YYYY" format
                [day, month, year] = parts;
            }
        }
    }

        // Return the formatted date
        return `${day}-${month}-${year}`;
    }


function exportToExcel() {
    var columnProperties = [];
    var searchText = $('#searchTextCustomer').val()

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
        url: "<?php echo base_url()?>api/User/exportMandateDetails/",
        data: {'columnProperties': columnProperties, 'searchText': searchText},
        dataType: 'json',
        beforeSend: function(xhr) {
            xhr.setRequestHeader('X-API-KEY', 'enachSyncWorks');
        },
        success: function(response) {
            var data = response.data;
            var html = "";
            for (var i = 0; i < data.length; i++) {
                var x = i + 1;
                var bgcolor = 'badge-phoenix-primary';
                var statusMessage = data[i].mandate_status_message;

                if (statusMessage === "success") {
                    bgcolor = 'badge-phoenix-success';
                } else if (statusMessage === "failure") {
                    bgcolor = 'badge-phoenix-danger';
                } else if (statusMessage === "User Aborted") {
                    bgcolor = 'badge-phoenix-warning';
                }

                var startDate = new Date(data[i].customer_start_date);
                var endDate = new Date(data[i].customer_end_date);

                var formattedStartDate = startDate.getDate().toString().padStart(2, '0') + '-' +
                                         (startDate.getMonth() + 1).toString().padStart(2, '0') + '-' +
                                         startDate.getFullYear();

                var formattedEndDate = endDate.getDate().toString().padStart(2, '0') + '-' +
                                       (endDate.getMonth() + 1).toString().padStart(2, '0') + '-' +
                                       endDate.getFullYear();

                html += '<tr><td class="order py-2 align-middle white-space-nowrap srno"><a class="fw-semi-bold" href="#">' + x + '</a></td>' +
                        '<td class="align-middle customer_name">' + data[i].customer_name + '</td>' +
                        '<td class="align-middle customer_mobile_no">' + data[i].customer_mobile_no + '</td>' +
                        '<td class="align-middle branch_id">' + data[i].branch_name + '</td>' +
                        '<td class="align-middle amount">' + data[i].amount + '</td>' +
                        '<td class="align-middle customer_start_date">' + formattedStartDate + '</td>' +
                        '<td class="align-middle customer_end_date">' + formattedEndDate + '</td>' +
                        '<td class="align-middle mandate_status_message"><div class="badge badge-phoenix fs--2 ' + bgcolor + '"><span class="fw-bold">' + statusMessage + '</span></div></td>' +
                        '<td class="align-middle mandate_register_datetime">' + data[i].mandate_register_datetime + '</td>' +
                        '<td class="align-middle customer_email">' + data[i].customer_email + '</td>' +
                        '<td class="align-middle enach_bank_name">' + data[i].enach_bank_name + '</td>' +
                        '<td class="align-middle account_no">' + data[i].account_no + '</td></tr>';
            }

            $('#showReportResultexcel').html(html);

            const dateC = new Date();
            let dayC = dateC.getDate();
            let monthC = dateC.getMonth() + 1;
            let yearC = dateC.getFullYear();
            let currentDateC = `${dayC}-${monthC}-${yearC}`;

            var table = document.getElementById('reporttableexcel');
            var sheetData = XLSX.utils.table_to_sheet(table, { raw: true }); // Ensure raw: true to avoid encoding issues
            var wb = XLSX.utils.book_new();
            XLSX.utils.book_append_sheet(wb, sheetData, 'Sheet1');

            var wbout = XLSX.write(wb, { bookType: 'xlsx', type: 'binary' });

            function s2ab(s) {
                var buf = new ArrayBuffer(s.length);
                var view = new Uint8Array(buf);
                for (var i = 0; i < s.length; i++) view[i] = s.charCodeAt(i) & 0xFF;
                return buf;
            }

            var blob = new Blob([s2ab(wbout)], { type: "application/octet-stream" });
            var link = document.createElement('a');
            link.href = URL.createObjectURL(blob);
            link.download = 'Mandate-Customers-' + currentDateC + '.xlsx';
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        },
        error: function(error) {
            console.error('Error fetching data:', error);
        }
    });
}   


   $(document).ready(function(){

 
    $('#selfTransactionBtn').click(function(event){

        mandate_customer_id = $('input[name=mandate_customer_id]').val();


        if (!mandate_customer_id) {
            console.error("Mandate customer ID is empty.");
            return;
        }
       
        if (timerInterval) {
            clearInterval(timerInterval);
        }
        sendMandateVerificationLink(mandate_customer_id);

       
    });

   
    $('#selfTransactionResendBtn').click(function(event){

        mandate_customer_id = $('input[name=mandate_customer_id]').val();

        if (!mandate_customer_id) {
            console.error("Mandate customer ID is empty.");
            return;
        }
       
        if (timerInterval) {
            clearInterval(timerInterval);
        }

        mandateFormSave().then(()=>{
            if (agreeTC === true) {
                sendMandateVerificationLink(mandate_customer_id);
            } 
        });
        
    
    });

    var templates_to_send=[];

    function getDefaultTemplateIDsByWorkType(message_template_work_type) {
 
        $.ajax({
                type: 'ajax',
                url: "<?php echo base_url() ?>api/Messages/getDefaultTemplateIDsByWorkType",
                async: false,
                method:'get',
                data:{'message_template_work_type':message_template_work_type},
                dataType: 'json',
                beforeSend: function(xhr) {
                    xhr.setRequestHeader('X-API-KEY','enachSyncWorks');
                },
                success: function(response) {

                    var  data=response.data;
                    

                    if(response.status){
                        templates_to_send = data;
                      
                    }
                 
                
                },
                
                error: function(response){
              
                   var data =JSON.parse(response.responseText);
               
                }

            });
       

    }

  
    function sendAllMessages(message_template_id,mandate_customer_id) {
          $.ajax({
            url: '<?php echo base_url(); ?>api/Messages/send_all_messages',
            method: 'POST',
            data: {
                'mandate_customer_id': mandate_customer_id,
                'message_template_id': message_template_id,
            },
            beforeSend: function(xhr) {
                xhr.setRequestHeader('X-API-KEY', 'enachSyncWorks');
            },
            success: function(response) {
                
                if (response.status) {
                    console.error("Error: " + response.message);
                }
                 else {
                    console.error("Error: " + response.message);
                }
               

            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
                // alert("Failed to send transaction link. Please try again later.");
            }
        });
    }



    function sendMandateVerificationLink(mandate_customer_id) {

        $.ajax({
            url: '<?php echo base_url(); ?>api/User/insertMandateVerifyLink',
            method: 'POST',
            data: {
                mandate_customer_id: mandate_customer_id
            },
            beforeSend: function(xhr) {
                xhr.setRequestHeader('X-API-KEY', 'enachSyncWorks');
            },
            success: function(response) {
                
                if (response.status) {

                    $('#mandateCustomerModalCenter').modal('hide');
                   

                    var customerurl="<?php echo base_url('Users/pendingmandateCustomer');?>"
                    var customernamesuccess=$('input[name=customer_name]').val();
                  
                    var htmlCustomerName= '<a class="nav-link sortable-item text-primary" href="'+customerurl+'" target="_BLANK">'+customernamesuccess+'</a>';

                    $('#mandateSuccessfulCustomerDetails1').html(htmlCustomerName);
                    $('#mandateSuccessfulCustomerDetails2').html(htmlCustomerName);
                    $('#successMandateModal').modal('show');    
                    var message_template_work_type='MANDATE_ADD_VERIFICATION';

                    getDefaultTemplateIDsByWorkType(message_template_work_type);
                    
                    if(templates_to_send){
                        for (var temp = 0; temp < templates_to_send.length; temp++) {
                       
                           var message_template_id_send =   templates_to_send[temp].message_template_id;

                           sendAllMessages(message_template_id_send,mandate_customer_id);
                        
                        }
                    }

                    var transaction_link = response.transaction_link;
                    
                    // Retrieve stored timer data if available
                    var remaining_time_seconds = response.remaining_time_in_seconds;

                    if (remaining_time_seconds > 0) {
                         var timer = remaining_time_seconds, minutes, seconds;

                            if (timerInterval) {
                               clearInterval(timerInterval);
                            }
                            
                             timerInterval = setInterval(function () {
                                minutes = parseInt(timer / 60, 10);
                                seconds = parseInt(timer % 60, 10);

                                minutes = minutes < 10 ? "0" + minutes : minutes;
                                seconds = seconds < 10 ? "0" + seconds : seconds;

                                $('#countdownTimer').text(minutes + ":" + seconds+ " Min.");

                                if (--timer < 0) {
                                    clearInterval(timerInterval);
                                    alert("Transaction link has expired.");
                                    localStorage.removeItem('timer_' + mandate_customer_id);
                                } else {
                                    // Update the remaining time in localStorage
                                    localStorage.setItem('timer_' + mandate_customer_id, JSON.stringify({
                                        remaining_time_seconds: timer,
                                        timestamp: Date.now()
                                    }));
                                }
                            }, 1000);

                    } 
                   
                    else {

                        if (timerInterval) {
                            clearInterval(timerInterval);
                        }
                        $('#countdownTimer').text("Link Expired");

                    }

                 //   Open the transaction link
                 //   var transactionWindow = window.open(transaction_link, '_blank');
                  
                }
                
                else {
                    console.error("Error: " + response.message);
                }
                
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
                alert("Failed to send transaction link. Please try again later.");
            }
        });
    }

   
});

    function startTimer(duration, mandate_customer_id) {
        var timer = duration, minutes, seconds;
        timerInterval = setInterval(function () {
            minutes = parseInt(timer / 60, 10);
            seconds = parseInt(timer % 60, 10);

            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;

            $('#countdownTimer').text(minutes + ":" + seconds);

            if (--timer < 0) {
                clearInterval(timerInterval);
                alert("Transaction link has expired.");
                localStorage.removeItem('timer_' + mandate_customer_id);
            } else {
                // Update the remaining time in localStorage
                localStorage.setItem('timer_' + mandate_customer_id, JSON.stringify({
                    remaining_time_seconds: timer,
                    timestamp: Date.now()
                }));
            }
        }, 1000);
    }
       // function to get the mandate information

           
// ///Edit

$('#userDataMandate').on('click', '.item-update', function(){
         var mandate_customer_id = $(this).attr('data-mandate-customer-id');
         console.log("Mandate ID:", mandate_customer_id);
         
           $('input[name="mandate_customer_id"]').val(mandate_customer_id);
           mandateCustomerRow(mandate_customer_id);
                 
           
       });

      //  For Edit
      function mandateCustomerRow(mandate_customer_id) {
    // Fetch loan types
    // Show the modal
       $('#editmandateCustomerModalCenter').modal('show');
       $('#editMandateDetails').html('Update');
       $('#editmandateCustomerModalCenter').find('.modal-title').text('Edit Details');
       $('#editmandateCustomerForm').attr('action', '<?php echo base_url(); ?>api/User/mandateCustomerdetailsupdate');
       document.getElementById("editMandateDetails").disabled = false;

    console.log("Fetching 1 data for mandate_customer_id:", mandate_customer_id);

    $.ajax({
        type: 'GET',
        url: '<?php echo base_url(); ?>api/Bank/showLoanType',
        dataType: 'json',
        beforeSend: function(xhr) {
            xhr.setRequestHeader('X-API-KEY', 'enachSyncWorks');
        },
        success: function(response) {
            // Populate loan type dropdown
            var data = response.data;
            var loanDropdown = $('select[name=loan_type_id]');
            loanDropdown.empty();
            loanDropdown.append($('<option>').val('').text('Select Loan'));

            if (data && data.length > 0) {
                $.each(data, function(index, loan) {
                    var option = $('<option>').val(loan.loan_type_id).text(loan.loan_type_name);
                    loanDropdown.append(option);
                });
            } else {
                loanDropdown.append($('<option>').val('').text('No Loan Types Found'));
            }

            // Now fetch branches
            $.ajax({
                type: 'GET',
                url: '<?php echo base_url(); ?>api/User/showBranchesOfBank',
                dataType: 'json',
                beforeSend: function(xhr) {
                    xhr.setRequestHeader('X-API-KEY', 'enachSyncWorks');
                },
                success: function(response) {
                    var data = response.data;
                    var branchDropdown = $('select[name=branch_id]');
                    branchDropdown.empty();
                    branchDropdown.append($('<option>').val('').text('Select Branch'));

                    if (data && data.length > 0) {
                        $.each(data, function(index, branch) {
                            var option = $('<option>').val(branch.branch_id).text(branch.branch_name);
                            branchDropdown.append(option);
                        });
                    } else {
                        branchDropdown.append($('<option>').val('').text('No Branches Available'));
                    }
                },
                error: function(response) {
                    var branchDropdown = $('select[name=branch_id]');
                    branchDropdown.empty();
                    branchDropdown.append($('<option>').val('').text('Select Branch'));
                    toastr.error('Error fetching branches.');
                }
            });

            // Fetch mandate data
            $.ajax({
                type: 'GET',
                url: '<?php echo base_url(); ?>api/User/showMandateData',
                data: { 'mandate_customer_id': mandate_customer_id },
                dataType: 'json',
                beforeSend: function(xhr) {
                    xhr.setRequestHeader('X-API-KEY', 'enachSyncWorks');
                },
                success: function(response) {
                    var data = response.data;
                  

                    // Set other fields
                    $('select[name=branch_id]').val(data.branch_id);

                    $('input[name=customer_name]').val(data.customer_name);
                    $('input[name=bank_account_no]').val(data.bank_account_no);
                    $('input[name=customer_mobile_no]').val(data.customer_mobile_no);
                    $('input[name=customer_adhar_card').val(data.customer_adhar_card);

                    $('input[name=customer_pan_card]').val(data.customer_pan_card);

                    $('input[name=customer_email]').val(data.customer_email);
                    // $('#document').attr('src', data.document);
                    // console.log("Document:", data.document);

                    // Set selected loan type
                    $('select[name=loan_type_id]').val(data.loan_type_id);

                 
 
                  $('#document').attr('src', data.document);
                  console.log("Document:" ,data.document);
                  var documentUrl = "<?php echo base_url('uploads/document/'); ?>" + data.document;

                    console.log('Document Filename:', data.document);

                    if (data.document) {
                      // Extract file extension
                      var fileExtension = data.document.split('.').pop().toLowerCase();

                      if (fileExtension === 'pdf') {
                        // Display PDF icon
                        $('#documentContainer').html('<i class="fas fa-file-pdf fa-2x"></i>');
                        $('#documentContainer').on('click', function() {
                            window.open(documentUrl, '_blank');
                          });

                      } else if (['jpg', 'jpeg', 'png', 'gif'].includes(fileExtension)) {
                        $('#documentContainer').html('<img src="' + documentUrl + '" alt="Document" width="75" height="75">');

                        $('#documentContainer').on('click', function() {
                          window.open(documentUrl, '_blank');
                        });

                      } else {
                        // Handle other file types as needed
                        $('#documentContainer').html('Unsupported file type');
                      }
                    } else {
                      // If no document available, show a message
                      $('#documentContainer').html('No document available');
                    }

                   
          
                },
                error: function(response) {
                    var data = JSON.parse(response.responseText);
                    toastr.error(data.message);
                }
            });

        },
        
        error: function(response) {
           
            toastr.error('Error fetching data.');
        }
    });
}


 //////// click on customer name open modal update customer details modal ////////
 $('#userDataMandate').on('click', '.name', function() {
    // Clear any existing content in the modal
    $('#editMandateDetails').html('');
    
    // Extract mandate customer ID and staff ID from the clicked element's attributes
    var mandate_customer_id = $(this).attr('data-mandate-customer-id');
    $('input[name="mandate_customer_id"]').val(mandate_customer_id);

    var staff_id = $(this).attr('staff_id');

    console.log('mandate_customer_id:', mandate_customer_id); // Check if mandate_customer_id is retrieved correctly
    console.log('staff_id:', staff_id); // Check if mandate_customer_id is retrieved correctly

    // Set the HTML content for the submit button (optional)
    var showsubmithtml = '<button type="submit" name="editMandateDetails" id="editMandateDetails" class="btn btn-primary btn-flat">Submit</button>';
    
    // Set modal title and form action
    $('#editmandateCustomerModalCenter').find('.modal-title').text('Edit Mandate Details');
    $('#editmandateCustomerForm').attr('action', '<?php echo base_url(); ?>api/User/mandateCustomerdetailsupdate');

    // Populate the modal with mandate details
    mandateCustomerRow(mandate_customer_id);

    // Open the modal
    $('#editmandateCustomerModalCenter').modal('show');
});


// $('#editMandateDetails').click(function(){
//     var mandateCustomerId = $('input[name="mandate_customer_id"]').val();
//     console.log("Mandate Customer ID:", mandateCustomerId);

//     // Get the Dropzone instance
//     // var myDropzone = Dropzone.forElement("#dropzone");

//     // Get the file uploaded through Dropzone
//     var uploadedFile = $("#documentContainer img").attr("src");

//     // Check if the image exists
//     if (uploadedFile) {
//         var uploadedFileName = uploadedFile.split('/').pop(); // Extract filename
//     } else {
//         console.error("Document image not found");
//         return; // Exit the function if document image is not found
//     }

//     var formData = new FormData($('#editmandateCustomerForm')[0]);
//     console.log("FormData:", formData);

//     formData.append('mandate_customer_id', mandateCustomerId);
//     formData.append('document', uploadedFileName);

//     // Perform AJAX request
//     $.ajax({
//         type: 'POST',
//         url: $('#editmandateCustomerForm').attr('action'),
//         data: formData,
//         dataType: 'json',
//         processData: false,
//         contentType: false,
//         beforeSend: function(xhr) {
//             xhr.setRequestHeader('X-API-KEY', 'enachSyncWorks');
//         },
//         success: function(response) {
//             console.log("Success:", response);
//             $('#editmandateCustomerModalCenter').modal('hide');
//         },
//         error: function(xhr, status, error) {
//             console.error('Error updating data:', error);
//         }
//     });
// });
$('#editMandateDetails').click(function(){
    var mandateCustomerId = $('input[name="mandate_customer_id"]').val();
    console.log("Mandate Customer ID:", mandateCustomerId);

    // Get the file uploaded through Dropzone
    var uploadedFile = $("#documentContainer img").attr("src");
    var uploadedFileName = '';

    // Check if the image exists
    if (uploadedFile) {
        uploadedFileName = uploadedFile.split('/').pop(); // Extract filename
    }

    var formData = new FormData($('#editmandateCustomerForm')[0]);
    console.log("FormData:", formData);

    formData.append('mandate_customer_id', mandateCustomerId);
    formData.append('document', uploadedFileName); // Even if it's empty, append it

    // Perform AJAX request
    $.ajax({
        type: 'POST',
        url: $('#editmandateCustomerForm').attr('action'),
        data: formData,
        dataType: 'json',
        processData: false,
        contentType: false,
        beforeSend: function(xhr) {
            xhr.setRequestHeader('X-API-KEY', 'enachSyncWorks');
        },
        success: function(response) {
            console.log("Success:", response);
            $('#editmandateCustomerModalCenter').modal('hide');
            toastr.success("Data updated successfully!"); 
            showUsersData(1);
        },
        error: function(xhr, status, error) {
            console.error('Error updating data:', error);
        }
    });
});


    function getMandateVerificationExpiryTime(mandate_customer_id) {
        $.ajax({
            url: '<?php echo base_url(); ?>api/User/getMandateVerifyExpiryTime',
            method: 'GET',
            data: {
                mandate_customer_id: mandate_customer_id
            },
            beforeSend: function(xhr) {
                xhr.setRequestHeader('X-API-KEY', 'enachSyncWorks');
            },
            success: function(response) {
                
                if (response.status) {
                    var transaction_link = response.transaction_link;
                    var remaining_time_seconds = response.remaining_time_in_seconds;


                      if (remaining_time_seconds > 0) {
                             var timer = remaining_time_seconds, minutes, seconds;

                                if (timerInterval) {
                                   clearInterval(timerInterval);
                                }
                                
                                 timerInterval = setInterval(function () {
                                    minutes = parseInt(timer / 60, 10);
                                    seconds = parseInt(timer % 60, 10);

                                    minutes = minutes < 10 ? "0" + minutes : minutes;
                                    seconds = seconds < 10 ? "0" + seconds : seconds;

                                    $('#countdownTimer').text(minutes + ":" + seconds+ " Min.");

                                    if (--timer < 0) {
                                        clearInterval(timerInterval);
                                        alert("Transaction link has expired.");
                                        localStorage.removeItem('timer_' + mandate_customer_id);
                                    } else {
                                        // Update the remaining time in localStorage
                                        localStorage.setItem('timer_' + mandate_customer_id, JSON.stringify({
                                            remaining_time_seconds: timer,
                                            timestamp: Date.now()
                                        }));
                                    }
                                }, 1000);

                        } 
                       
                        else {

                            if (timerInterval) {
                                clearInterval(timerInterval);
                            }
                            $('#countdownTimer').text("Link Expired");
                        }

                 
                }
                 else {
                    console.error("Error: " + response.message);
                }
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
                alert("Failed to send transaction link. Please try again later.");
            }
        });
    }



       // edit mandate customer information
       $('#userDataMandate').on('click', '.item-edit', function(){
         var mandate_customer_id = $(this).attr('data-mandate-customer-id');
            
          
          mandateCustomerRowFetch(mandate_customer_id);
          getMandateVerificationExpiryTime(mandate_customer_id);
          calculateEndDate();
          $('#selfTransactionResendBtn').removeClass('d-none');   

        
       });
       // function to get the mandate information
       function mandateCustomerRowFetch(mandate_customer_id){
      
         $.ajax({
               type: 'ajax',
               method: 'get',
               url: '<?php echo base_url(); ?>api/User/showMandateData',
               data: {'mandate_customer_id': mandate_customer_id},
               async: false,
               dataType: 'json',
               beforeSend: function(xhr) {
                   xhr.setRequestHeader('X-API-KEY', 'enachSyncWorks');
               },
               success: function(response){
                  
                   data = response.data;
                   
      
                   var bankId = data.bank_name;

                   var mandate_customer_id = $(this).attr('data');
      
                if (data.mandate_status_message === 'User Aborted' || data.mandate_status_message === 'failure') {

                    $('select[name=branch_id]').val(data.branch_id);
                    $('input[name=device_ID]').val(data.device_ID);
                    $('select[name=payment_mode]').val(data.payment_mode);
                      
                    $('select[name=bank_name]').val(data.bank_name);
                    // branch_id
                    $('select[name=branch_id]').val(data.branch_id);

                    $('input[name="mandate_customer_id"]').val(data.mandate_customer_id);
                    //  $('input[name=document]').val(data.document);
           
                    $('input[name=merchant_ID]').val(data.merchant_ID);
                    $('input[name=consumer_ID]').val(data.consumer_ID);
                    $('input[name=customer_name]').val(data.customer_name);
                      
                    // loan
                    $('select[name=loan_type_id]').val(data.loan_type_id);
                    
                    // bank_account_no
                    $('input[name=bank_account_no]').val(data.bank_account_no);

                    $('input[name=customer_mobile_no]').val(data.customer_mobile_no);
                    $('input[name=customer_email]').val(data.customer_email);
                    $('input[name=account_no]').val(data.account_no);
                    $('select[name=account_type]').val(data.account_type);
                    $('input[name=ifsc_code]').val(data.ifsc_code);
                    
                    // //EMI Count
                    $('input[name=emi_count]').val(data.emi_count);
                    
                    // //Frequency for the EMI
                    $('select[name=emi_frequency]').val(data.emi_frequency);
          
                    $('input[name=customer_start_date]').val(data.customer_start_date);
                    $('input[name=customer_end_date]').val(data.customer_end_date);
                    // //EMI Date

                    
                    $('select[name=transactionDate]').val(data.transactionDate);
          
                    $('input[name=txn_ID]').val(data.consumer_ID);
                    $('input[name=txn_type]').val(data.txn_type);
                    $('input[name=txn_sub_type]').val(data.txn_sub_type);
                    $('input[name=item_id]').val(data.item_id);
                    $('input[name=loan_amount]').val(data.amount);
                    $('input[name=commission_amount]').val(data.commission_amount);
                    $('input[name=bank_code]').val(data.bank_code);

                //     console.log('Document Filename:', data.document);

                if (data.document) {
                  // Extract file extension
                  $('input[name=document_copy]').val(data.document);
                  var fileExtension = data.document.split('.').pop().toLowerCase();
                  var documentUrl = "<?php echo base_url('uploads/document/'); ?>" + data.document;
                   $('#documentName').html('<a href="'+documentUrl+'" target="_BLANK" >'+data.document+'</a>');
              
                }
                else {
                  // If no document available, show a message
                  $('#documentName').html('No document available');
                }
               
               $('#mandateCustomerModalCenter').modal('show')
               $('#addMandateDetails').html('Update');
               $('#mandateCustomerModalCenter').find('.modal-title').text('Edit Details');
               $('#mandateCustomerForm').attr('action', '<?php echo base_url(); ?>api/User/mandateCustomerupdate');
               document.getElementById("addMandateDetails").disabled=false;

               $.ajax({
                    type: 'ajax',
                    method: 'get',
                    url: '<?php echo base_url(); ?>api/Bank/show_Enach_Bank_row',
                    data: { 'enach_bank_id': data.bank_name },
                    async: false,
                    dataType: 'json',
                    beforeSend: function (xhr) {
                        xhr.setRequestHeader('X-API-KEY', 'enachSyncWorks');
                    },
                    success: function (response) {
                        var bank_name = response.data.enach_bank_name;

                        // Set the selected option in the dropdown
                        $('select[name=bank_name]').val(data.bank_name);

                       
                        $('select[name=bank_name]').html('<option value="' + data.bank_name + '" selected>' + bank_name + '</option>');

                    },
                    error: function (response) {
                        var data = JSON.parse(response.responseText);
                        toastr.error(data.message);
                    }
                });

           
               setConsumerAndTransactionID();
             } else {
                 // Show a message that editing is not allowed
                 toastr.error("Editing is not allowed for this status: " + data.mandate_status_message);
             }
               },
               error: function(response){
                   var data = JSON.parse(response.responseText);
                   toastr.error(data.message);
               }
           });
       }
      
      
         function setConsumerAndTransactionID() {
           customer_name = $('input[name=customer_name]').val();
           customer_mobile_no = $('input[name=customer_mobile_no]').val();
      
      
           var currentdate = new Date(); 
      
           var con_and_txn_id = 'M'+customer_mobile_no+'D'+currentdate.getDate()+currentdate.getMonth()+currentdate.getFullYear()+currentdate.getHours()+currentdate.getMinutes();
          
            con_and_txn_id = con_and_txn_id.replace(/\s/g, '');
      
            $('input[name=consumer_ID]').val(con_and_txn_id);
            $('input[name=txn_ID]').val(con_and_txn_id);
      
         }
      
          $('#addMandateDetails').click(function(){
                  // showSpinnerAndDisableForm();
                 $('#addMandateDetails').prop('disabled', false); 

                mandateFormSave();


          });

            async function mandateFormSave() {
                        
                          $('#warningMessage').html('').hide();
                          document.getElementById("branch_id").classList.remove("is-invalid");
                          document.getElementById("document").classList.remove("is-invalid");
                          document.getElementById("customer_name").classList.remove("is-invalid");
                          document.getElementById("customer_mobile_no").classList.remove("is-invalid");

                          document.getElementById("customer_adhar_card").classList.remove("is-invalid");

                          document.getElementById("customer_pan_card").classList.remove("is-invalid");

                          document.getElementById("payment_mode").classList.remove("is-invalid");
                          document.getElementById("bank_name").classList.remove("is-invalid");
                          document.getElementById("consumer_ID").classList.remove("is-invalid");
                          document.getElementById("txn_ID").classList.remove("is-invalid");
                          document.getElementById("account_no").classList.remove("is-invalid");
                          document.getElementById("account_type").classList.remove("is-invalid");
                          // loan
                          document.getElementById("loan_type_id").classList.remove("is-invalid");
                          // bank_account_no
                          document.getElementById("bank_account_no").classList.remove("is-invalid");

                          // document.getElementById("loan_type_id").classList.remove("is-invalid");
                          document.getElementById("emi_count").classList.remove("is-invalid");
                          document.getElementById("emi_frequency").classList.remove("is-invalid");
                          document.getElementById("customer_start_date").classList.remove("is-invalid");
                          // document.getElementById("customer_end_date").classList.remove("is-invalid");
                          // document.getElementById("customer_end_date").readOnly=true;


                          document.getElementById("transactionDate").classList.remove("is-invalid");
                          document.getElementById("loan_amount").classList.remove("is-invalid");
                          document.getElementById("bank_code").classList.remove("is-invalid");
                          document.getElementById("loan_amount").classList.remove("is-invalid");
                          // document.getElementById("mandate_customer_id ").classList.remove("is-invalid");
                          // document.getElementById("bank_branch_id").classList.remove("is-invalid");   


                        var formData = new FormData();
                        var documentFile = document.getElementById('document').files[0];
                        formData.append('document', documentFile);
                         
                        formData.append('mandate_customer_id', $('#mandate_customer_id').val());
                        formData.append('device_ID', $('#device_ID').val());
                        formData.append('payment_mode', $('#payment_mode').val());
                        formData.append('bank_name', $('#bank_name').val());
                        formData.append('merchant_ID', $('#merchant_ID').val());
                        formData.append('consumer_ID', $('#consumer_ID').val());
                        formData.append('customer_name', $('#customer_name').val());
                        formData.append('customer_mobile_no', $('#customer_mobile_no').val());

                        formData.append('customer_adhar_card', $('#customer_adhar_card').val());

                        formData.append('customer_pan_card', $('#customer_pan_card').val());


                        formData.append('customer_email', $('#customer_email').val());
                        // bank_account_no
                        formData.append('bank_account_no', $('#bank_account_no').val());

                        formData.append('loanCollectionAmount', $('#loan_amount').val());

                                      
                        // loan
                        formData.append('loan_type_id', $('#loan_type_id').val());
                        formData.append('account_no', $('#account_no').val());
                        formData.append('account_type', $('#account_type').val());
                        formData.append('ifsc_code', $('#ifsc_code').val());
                        formData.append('branch_id', $('#branch_id').val());
                        formData.append('emi_count', $('#emi_count').val());
                        formData.append('emi_frequency', $('#emi_frequency').val());
                        formData.append('customer_start_date', $('#customer_start_date').val());
                        formData.append('customer_end_date', $('#customer_end_date').val());
                        formData.append('transactionDate', $('#transactionDate').val());
                        formData.append('txn_ID', $('#txn_ID').val());
                        formData.append('txn_type', $('#txn_type').val());
                        formData.append('txn_sub_type', $('#txn_sub_type').val());
                        formData.append('item_id', $('#item_id').val());
                        formData.append('amount', $('#amount').val());
                        formData.append('commission_amount', $('#commission_amount').val());
                        formData.append('bank_code', $('#bank_code').val());
                        formData.append('consumer_card_number', $('#consumer_card_number').val());
                        formData.append('consumer_expiry_month', $('#consumer_expiry_month').val());
                        formData.append('consumer_expiry_year', $('#consumer_expiry_year').val());
                        formData.append('consumer_cvv_no', $('#consumer_cvv_no').val());
                        formData.append('termsAndConditions', $('#termsAndConditions').is(':checked') ? 1 : 0);
                    
                        //  generateToken();
                        mandate_customer_id = $('input[name="mandate_customer_id"]').val();
                    
                        // bank_branch_id = $('input[name=bank_branch_id]').val();
                          device_ID = $('input[name=device_ID]').val();
                          payment_mode = $('select[name=payment_mode]').val();
                          bank_name = $('select[name=bank_name]').val();
                          merchant_ID = $('input[name=merchant_ID]').val();
                          consumer_ID = $('input[name=consumer_ID]').val();
                          customer_name = $('input[name=customer_name]').val();
                          customer_mobile_no = $('input[name=customer_mobile_no]').val();
                          
                          document_copy = $('input[name=document_copy]').val();

                          customer_adhar_card = $('input[name=customer_adhar_card]').val();

                          customer_pan_Card = $('input[name=customer_pan_Card]').val();

                          customer_email = $('input[name=customer_email]').val();
                          account_no = $('input[name=account_no]').val();
                          account_type = $('select[name=account_type]').val();
                          ifsc_code = $('input[name=ifsc_code]').val();
                          // bank_account_no
                          bank_account_no = $('input[name=bank_account_no]').val();

                          // loan
                          loan_type_id = $('select[name=loan_type_id]').val();
                          // document
                          // document = $('input[name=document]').val();
                    
                          branch_id = $('select[name=branch_id]').val();
                        
                          loanCollectionAmount = $('input[name=loan_amount]').val();

                          //EMI Count
                          emi_count = $('input[name=emi_count]').val();
                          //Frequency for the EMI
                          emi_frequency = $('select[name=emi_frequency]').val();
                    
                          customer_start_date = $('input[name=customer_start_date]').val();
                          customer_end_date = $('input[name=customer_end_date]').val();
                          //EMI Date
                          transactionDate = 0;
                          transactionDate = $('select[name=transactionDate]').val();
                    
                          txn_ID = $('input[name=txn_ID]').val();
                          txn_type = $('input[name=txn_type]').val();
                          txn_sub_type = $('input[name=txn_sub_type]').val();
                          item_id = $('input[name=item_id]').val();
                          amount = $('input[name=amount]').val();
                          commission_amount = $('input[name=commission_amount]').val();
                          bank_code = $('input[name=bank_code]').val();
                        
                          consumer_card_number = $('input[name=consumer_card_number]').val();
                          consumer_expiry_month = $('input[name=consumer_expiry_month]').val();
                          consumer_expiry_year = $('input[name=consumer_expiry_year]').val();
                          consumer_cvv_no = $('input[name=consumer_cvv_no]').val();

                            var scheduleData = gatherScheduleData(emi_frequency);
                            console.log(scheduleData.totalEmiAmount);
                            console.log(scheduleData.validAmountCount);

                            
                            if(branch_id==''){
                                document.getElementById("branch_id").classList.add("is-invalid");
                            }
                            else if(customer_name==''){
                                document.getElementById("customer_name").classList.add("is-invalid");
                            }
                                
                            else if(customer_mobile_no==''){
                                document.getElementById("customer_mobile_no").classList.add("is-invalid");
                            }

                            else if(loan_type_id==''){
                                document.getElementById("loan_type_id").classList.add("is-invalid");
                            }

                            else if (!document_copy){
                               document.getElementById("document").classList.add("is-invalid");
                               
                            }
                            
                            else if(payment_mode==''){
                               document.getElementById("payment_mode").classList.add("is-invalid");
                            }
                            
                            else if(bank_name==''){
                               document.getElementById("bank_name").classList.add("is-invalid");
                            }
                                   
                            else if(consumer_ID==''){
                                document.getElementById("consumer_ID").classList.add("is-invalid");
                            }
                    
                            else if(txn_ID==''){
                                document.getElementById("txn_ID").classList.add("is-invalid");
                            }
                    
                            else if(account_no==''){
                                document.getElementById("account_no").classList.add("is-invalid");
                            }
                            else if(account_type==''){
                               document.getElementById("account_type").classList.add("is-invalid");
                            }

                            else if(amount==''){
                               document.getElementById("amount").classList.add("is-invalid");
                            }

                             else if(emi_frequency==''){
                               document.getElementById("emi_frequency").classList.add("is-invalid");
                            }

                             else if(customer_start_date==''){
                               document.getElementById("customer_start_date").classList.add("is-invalid");
                            }

                            // else if(transactionDate==''){
                            //    document.getElementById("transactionDate").classList.add("is-invalid");
                            // }
                    
                            else if(emi_count==''){
                               document.getElementById("emi_count").classList.add("is-invalid");
                            }
                    
                            else if(customer_end_date==''){
                               document.getElementById("customer_end_date").classList.add("is-invalid");
                            }

                            // else if(transactionDate==''){
                            //    document.getElementById("transactionDate").classList.add("is-invalid");
                            // }

                             else if(bank_account_no==''){
                               document.getElementById("bank_account_no").classList.add("is-invalid");
                            }
                    
                            else if(bank_code==''){
                               document.getElementById("bank_code").classList.add("is-invalid");
                               toastr.error("Please Enter Bank Code");
                            }
                            else if(amount!='' && amount <  1){
                               document.getElementById("amount").classList.add("is-invalid");
                               toastr.error("Amount Should be atleast 1 or more");
                            }
                    
                             else if(customer_start_date!='' && customer_end_date!='' && customer_start_date > customer_end_date){
                               document.getElementById("customer_start_date").classList.add("is-invalid");
                               document.getElementById("customer_end_date").classList.add("is-invalid");
                               toastr.error("End Date should be ahead of Start Date");
                            }
                            else if (!$('#termsAndConditions').is(':checked')) {

                                toastr.error("Please agree to the terms and conditions.");
                                return;
                            }
                         

                            else if(scheduleData.totalEmiAmount != loanCollectionAmount)
                            {
                                var totalEmiAmount = scheduleData.totalEmiAmount || 0;
                                var loanCollectionAmountFormatted = loanCollectionAmount || 0;
                                
                                document.getElementById("loan_amount").classList.add("is-invalid");
                                $('#SchedulePreview input[name="amount"]').each(function() {
                                    $(this).addClass('is-invalid'); // Add the class to each amount field
                                });

                                var warningMessage = `Warning: The total EMI amount (${totalEmiAmount}) does not match the loan collection amount (${loanCollectionAmountFormatted}).`;

                                // Display the warning message in the div near the button
                                $('#warningMessage').html(warningMessage).css('color', 'red').show(); 
                            }
                            else if (scheduleData.warnings.length > 0) 
                            {
                                $('#warningMessage').html(scheduleData.warnings).css('color', 'red').show(); 

                            }

                            // else if( scheduleData.validAmountCount != emi_count)
                            // {
                            //    document.getElementById("emi_count").classList.add("is-invalid");
                            // }
                    
                            else{
                               
                               $('#addMandateDetails').prop('disabled', true);


                               formData.append('transactionScheduleData',JSON.stringify(scheduleData));

                    
                               const currentDateValue = customer_start_date;
                                
                                // Split the date into parts (YYYY, MM, DD)
                                const dateParts = currentDateValue.split('-');
                                
                                // Rearrange the date parts in the desired format (DD-MM-YYYY)
                                const formattedDate = `${dateParts[2]}-${dateParts[1]}-${dateParts[0]}`;
                                
                                // Set the input's value to the new format
                                customer_start_date = formattedDate;
                
                
                                const currentDateValue1 = customer_end_date;
                                
                                // Split the date into parts (YYYY, MM, DD)
                                const dateParts1 = currentDateValue1.split('-');
                                
                                // Rearrange the date parts in the desired format (DD-MM-YYYY)
                                const formattedDate1 = `${dateParts1[2]}-${dateParts1[1]}-${dateParts1[0]}`;
                                
                                // Set the input's value to the new format
                                customer_end_date = formattedDate1;
            
                                $.ajax({
                                  type: 'ajax',
                                  method:'post',
                                  url: $('#mandateCustomerForm').attr('action'),
                                  //url: '<?php echo base_url(); ?>api/User/mandateCustomerInsert',
                                  data: formData,
                                  processData: false,
                                  contentType: false,
                                  async: false,
                                  dataType: 'json',
                                   beforeSend: function(xhr) {
                                        xhr.setRequestHeader('X-API-KEY','enachSyncWorks');
                                    },
                                    success: function(response){
                
                                            if (response.status) {

                                                agreeTC= true;
                                                 if($('#mandateCustomerForm').attr('action')=='<?php echo base_url(); ?>api/User/mandateCustomerInsert')   {
                                                      $('#selfTransactionBtn').removeClass('d-none');   
                                                 }

                                                 else{
                                                      $('#selfTransactionResendBtn').removeClass('d-none');  
                                                 }

                                                 toastr.success(response.message);

                                                 mandate_customer_id=response.data;

                                                 $('input[name=mandate_customer_id]').val(response.data);   
                                       
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
              
            }        


            function gatherScheduleData(emi_frequency) {
                var loanCollectionAmountTotal = ($('input[name=loan_amount]').val()) || 0;
                var emistartDate = new Date($('input[name=customer_start_date]').val());
                var emiendDate = new Date($('input[name=customer_end_date]').val());

                console.log('emistartDate:', emistartDate);
                console.log('emiendDate:', emiendDate);
                
                var scheduleData = [];
                let totalEmiAmount = 0;
                var validAmountCount = 0;
                let warnings = new Set();

                $('#SchedulePreview tr input').removeClass('input-error');

                $('#SchedulePreview tr').each(function() {
                    var row = $(this);
                    var dateInput = row.find('input.datepicker');
                    var amountInput = row.find('input[name="amount"]').val();
                    
                    var date = dateInput.val();
                    // console.log('inputDate:', date);
                    
                    // var amount = parseFloat(amountInput) || 0; // Round the amount immediately
                    // console.log('amount:', amount);

                    if (amountInput) {
                        var selectedDate='';

                        if (emi_frequency == 'ADHO') {
                            selectedDate = new Date(date);
                        } else {
                            let formattedDate = formatDateToDMY(date);
                            // console.log('not presented:', formattedDate);

                            const parts = formattedDate.split('-');
                            if (parts.length === 3) {
                                selectedDate = new Date(parts[2], parts[1] - 1, parts[0]); 
                            } else {
                                // console.error('Invalid date format:', formattedDate);
                                selectedDate = null;
                            }
                        }

                        // console.log('selectedDate:', selectedDate);

                        if (selectedDate >= emistartDate && selectedDate <= emiendDate) {
                            scheduleData.push({
                                emi_date: date,
                                emi_amount: amountInput
                            });

                            totalEmiAmount = Number(totalEmiAmount) + Number(amountInput); // Accumulate total EMI amount
                            // totalEmiAmount = roundToTwo(totalEmiAmount); // Round the total after adding
                                console.error('totalEmiAmount:', totalEmiAmount);


                            validAmountCount++;
                            
                        } else {
                            dateInput.addClass('input-error');
                            warnings.add(`Warning: The EMI date ${date} should be between ${emistartDate.toLocaleDateString()} and ${emiendDate.toLocaleDateString()}.`);
                            scheduleData.push({
                                emi_date: date,
                                emi_amount: amountInput
                            });
                            totalEmiAmount = Number(totalEmiAmount) + Number(amountInput); // Accumulate total EMI amount
                            // totalEmiAmount = roundToTwo(totalEmiAmount); // Round the total after adding
                        }
                    } else {
                        if (!date) dateInput.addClass('input-error');
                        if (!amount) amountInput.addClass('input-error');
                    }
                });

                totalEmiAmount = totalEmiAmount.toFixed(0);

                // Log the final totals for debugging
                console.log('Total EMI Amount:', totalEmiAmount);
                console.log('Loan Collection Amount Total:', loanCollectionAmountTotal);
                
                console.log('validAmountCount:', validAmountCount);


                return {
                    totalEmiAmount: totalEmiAmount,
                    validAmountCount: validAmountCount,
                    scheduleData: scheduleData,
                    warnings: Array.from(warnings)
                };
            }

            $('#userDataMandate').on('click', '.item-verifyMandate', function(){ 
                var mandate_customer_id = $(this).attr('data');
                var payment_dateTime='';
                $.ajax({
                 type: 'ajax',
                 method: 'get',
                 url: '<?php echo base_url(); ?>api/User/getMandateCustomer_Log_Row',
                 data:{'mandate_customer_id': mandate_customer_id},  
                 async: false,
                 dataType: 'json',
                 beforeSend: function(xhr) {
                     xhr.setRequestHeader('X-API-KEY','enachSyncWorks');
                 },
                 success: function(response){
                  
                    if(response.status){
                     if(response.data){
                       data=response.data;
                       all_log=response.all_log;
      
                       const dateString=all_log.paymentMethod.paymentTransaction.dateTime;
      
                       const regex = /^(\d{2}-\d{2}-\d{4})/;
                       const match = dateString.match(regex);
      
                       if (match) {
                         payment_dateTime = match[1];
                       } 
      
                    
      
                       verifyMandate(data.merchant_ID,data.txn_ID,data.consumer_ID,payment_dateTime,mandate_customer_id);
                         }
               
                    }
      
                 },
                   error: function(response){
                        var data =JSON.parse(response.responseText);
                        toastr.error(data.message);
                 }
             });
      
       });
      
      
       function verifyMandate(merchant_ID,txn_ID,consumer_ID,payment_dateTime,mandate_customer_id) {
                                
       
             var jsonData = {
                     "merchant": {
                         "identifier": merchant_ID
                     },
                     "payment": {
                         "instruction": {}
                     },
                     "transaction": {
                         "deviceIdentifier": "S",
                         "type": "002",
                         "currency": "INR",
                         "identifier": txn_ID,
                         "dateTime": payment_dateTime,
                         "subType": "002",
                         "requestType": "TSI"
                     },
                     "consumer": {
                         "identifier": consumer_ID
                     }
                 };
      
                  $.ajax({
                     type: 'POST',
                     // method: 'get',
                     url: '<?php echo base_url(); ?>api/User/verifyMandateCustomer/'+mandate_customer_id,
                     data: JSON.stringify(jsonData),
                     dataType: 'json',
                     contentType: 'application/json',
                     beforeSend: function(xhr) {
                         xhr.setRequestHeader('X-API-KEY','enachSyncWorks');
                     },
                     success: function(response){
                      
                        if(response.status){
                         if(response.message){
                           data = response.data;
                            if(data.paymentMethod.paymentTransaction.statusCode=="0300"){
                                toastr.success(response.message);
      
                              $('#merchantCode').html(data.merchantCode);
                              
                              $('#merchantTransactionIdentifier').html(data.merchantTransactionIdentifier);
                              
                              $('#merchantTransactionRequestType').html(data.merchantTransactionRequestType);
                             
                              $('#instrumentToken').html(data.paymentMethod.instrumentToken);
                             
                              $('#bankReferenceIdentifier').html(data.paymentMethod.paymentTransaction.bankReferenceIdentifier);
      
                              $('#paymentIdentifier').html(data.paymentMethod.paymentTransaction.identifier);
      
                              $('#paymentToken').html(data.paymentMethod.token);
                             
                              $('#statusMessage').html(response.message);
      
                               $('#verifyMandateModal').modal('show');
                              
                               // toastr.success("Identifier:-"+data.paymentMethod.paymentTransaction.identifier);
                               // toastr.success("Token:-"+data.paymentMethod.token);
                           }
                           else{
                              toastr.error(response.message);
                           }
                            
      
                         }
                   
                        }
      
                     },
                       error: function(response){
                            var data =JSON.parse(response.responseText);
                            toastr.error(data.message);
                     }
                 });
      }
      
     
      function generateTransactionSchedule(mandate_customer_id,customer_start_date,customer_end_date,customer_amount,transactionDate) {
      var transactionDate = $("#transactionDate").val();
      var emi_count = $("#emi_count").val();
      var emi_frequency = $("#emi_frequency").val();
      // loan
      var loan_type_id = $("#loan_type_id").val();
      // bank_account_no
      var bank_account_no = $("#bank_account_no").val();

      console.log('Transaction Date:', transactionDate);
      console.log('Emi Frequency:', emi_frequency);
      
        $.ajax({
             type: 'ajax',
             method:'post',
             url: '<?php echo base_url(); ?>api/User/generateMandateTransactionSchedule',
             data: {
               mandate_customer_id:mandate_customer_id,
               customer_start_date:customer_start_date,
               customer_end_date:customer_end_date,
               customer_amount:customer_amount,
               emi_count:emi_count,
               emi_frequency:emi_frequency,
               // txn date
               transactionDate:transactionDate,
              //  loan
               loan_type_id:loan_type_id,
              //  bank_account_no
              bank_account_no:bank_account_no
      
             },
      
             async: false,
             dataType: 'json',
             beforeSend: function(xhr) {
                 xhr.setRequestHeader('X-API-KEY','enachSyncWorks');
             },
           
           success: function(response){
             toastr.success(response.message);           
           },
      
           error: function(response){
              var data =JSON.parse(response.responseText);
              toastr.error(data.message);
            
             }
      
         });
       }     
      
      
      function handleResponse(res) {
         if (typeof res != 'undefined' && typeof res.paymentMethod != 'undefined' && typeof res.paymentMethod.paymentTransaction != 'undefined' && typeof res.paymentMethod.paymentTransaction.statusCode != 'undefined' && res.paymentMethod.paymentTransaction.statusCode == '0300') {
             // success block
         } else if (typeof res != 'undefined' && typeof res.paymentMethod != 'undefined' && typeof res.paymentMethod.paymentTransaction != 'undefined' && typeof res.paymentMethod.paymentTransaction.statusCode != 'undefined' && res.paymentMethod.paymentTransaction.statusCode == '0398') {
             // initiated block
         } else {
             // error block
         }
      };


        function getDefaultTemplateIDsByWorkType(message_template_work_type) {
 
        $.ajax({
                type: 'ajax',
                url: "<?php echo base_url() ?>api/Messages/getDefaultTemplateIDsByWorkType",
                async: false,
                method:'get',
                data:{'message_template_work_type':message_template_work_type},
                dataType: 'json',
                beforeSend: function(xhr) {
                    xhr.setRequestHeader('X-API-KEY','enachSyncWorks');
                },
                success: function(response) {

                    var  data=response.data;
                    

                    if(response.status){
                        templates_to_send = data;
                      
                    }
                 
                
                },
                
                error: function(response){
              
                   var data =JSON.parse(response.responseText);
               
                }

            });
       

    }



    function sendAllMessages(message_template_id,user_id) {
          $.ajax({
            url: '<?php echo base_url(); ?>api/Messages/send_all_messages',
            method: 'POST',
            data: {
                'user_id': user_id,
                'message_template_id': message_template_id,
            },
            beforeSend: function(xhr) {
                xhr.setRequestHeader('X-API-KEY', 'enachSyncWorks');
            },
            success: function(response) {
                if(response.status){
                    toastr.success('Message Sent.');
                }
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
                // alert("Failed to send transaction link. Please try again later.");
            }
        });
    }
      
      async function generateSHA512Hash(inputString) {
          
          
             const encoder = new TextEncoder();
             const data = encoder.encode(inputString);
      
             // Generate a SHA-512 hash
             window.crypto.subtle.digest('SHA-512', data)
               .then(hashBuffer => {
                 // Convert the hash to a hexadecimal string
                 const hashArray = Array.from(new Uint8Array(hashBuffer));
                 const token = hashArray.map(byte => byte.toString(16).padStart(2, '0')).join('');
                 console.log("Generated Token: " + token);
             
      
             // e.preventDefault();
      
                     var configJson = {
                         'tarCall': false,
                         'features': {
                             'showPGResponseMsg': true,
                             'enableAbortResponse': true,
                             'enableNewWindowFlow': true,    //for hybrid applications please disable this by passing false
                             'enableExpressPay':true,
                             'siDetailsAtMerchantEnd':true,
                             'enableSI':true,
                             'payDetailsAtMerchantEnd':true
                         },
                    
                         'consumerData': {
                             'deviceId': device_ID,   //possible values 'WEBSH1' and 'WEBSH2'
                             'token': token,
                             // 'returnUrl': '#',    //merchant response page URL
                             // 'returnUrl': 'https://www.tekprocess.co.in/MerchantIntegrationClient/MerchantResponsePage.jsp',    //merchant response page URL
                             // 'responseHandler': handleResponse,
                           
                             'responseHandler': function (response) {
                                
      
                                     $.ajax({
                                         type: 'ajax',
                                         method:'post',
                                         url: '<?php echo base_url(); ?>api/User/savemandateLog',
                                         data: {
                                           mandate_register_datetime:response.paymentMethod.paymentTransaction.dateTime,
                                           mandate_status_code:response.paymentMethod.paymentTransaction.statusCode,
                                           mandate_status_message:response.paymentMethod.paymentTransaction.statusMessage,
                                           mandate_identifier:response.paymentMethod.paymentTransaction.identifier,
                                           mandate_token:response.paymentMethod.paymentTransaction.instruction.id,
                                           response:response,
                                           customer_mobile_no:customer_mobile_no,
                                           mandate_customer_id:mandate_customer_id
                                         },
      
                                         async: false,
                                         dataType: 'json',
                                         beforeSend: function(xhr) {
                                             xhr.setRequestHeader('X-API-KEY','enachSyncWorks');
                                         },
                                         success: function(response){
                                          console.log(response);
                                          console.log("Error generating schedule: " + response);

                                                                   
                                      // generateTransactionSchedule(mandate_customer_id,customer_start_date,customer_end_date,amount);
                                      //        $('#mandateCustomerModalCenter').modal('hide');

                                      var statusMessage = '';
                                      if (response.paymentMethod && response.paymentMethod.paymentTransaction) {
                                          statusMessage = response.paymentMethod.paymentTransaction.statusMessage;
                                      } else if (response.status_message) {
                                          statusMessage = response.status_message;
                                      }
                                      
                                      if (statusMessage === 'success') {
                                          console.log("Status is 'Success'. Generating transaction schedule...");
                                          generateTransactionSchedule(mandate_customer_id, customer_start_date, customer_end_date, customer_amount, transactionDate);
                                          toastr.success('Transaction schedule generated successfully.');
                                            
                                            // var message_template_work_type='MANDATE_SUCCESS';

                                            // var templates_to_send=[];
                                            
                                            // getDefaultTemplateIDsByWorkType(message_template_work_type);
                                            
                                            // if(templates_to_send){
                                            //       for (var temp = 0; temp < templates_to_send.length; temp++) {
                                                 
                                            //          var message_template_id_send =   templates_to_send[temp].message_template_id;

                                            //         sendAllMessages(message_template_id_send,user_id);
                                                  
                                            //       }
                                            
                                            // }    

                                      } else {
                                          console.log("Transaction schedule will not be generated.");
                                          $('#mandateCustomerModalCenter').modal('hide');
                                          // toastr.error('Failed to generate transaction schedule.');
                                          toastr.error('Aborted');

                                      //    var message_template_work_type='MANDATE_SUCCESS';

                                      //      var templates_to_send=[];
                                            
                                       //     getDefaultTemplateIDsByWorkType(message_template_work_type);
                                            
                                      //      if(templates_to_send){
                                       //           for (var temp = 0; temp < templates_to_send.length; temp++) {
                                                 
                                        //             var message_template_id_send =   templates_to_send[temp].message_template_id;

                                         //           sendAllMessages(message_template_id_send,user_id);
                                                  
                                         //         }
                                            
                                       //     }   
                                      }
                                         },
      
                                       error: function(response){
                                             $('#mandateCustomerModalCenter').modal('hide');
                                         }
      
                                     });
                                     // You can perform further actions based on the response here
                             },
                             
                             'paymentMode': payment_mode,
                             'merchantLogoUrl': 'https://www.paynimo.com/CompanyDocs/company-logo-md.png',  //provided merchant logo will be displayed
                             'merchantId': merchant_ID,
                             'currency': 'INR',
                             'consumerId': consumer_ID,  //Your unique consumer identifier to register a eMandate/eNACH
                             'consumerMobileNo': customer_mobile_no,
                             'consumerEmailId': customer_email,
                             'txnId': txn_ID,   //Unique merchant transaction ID
                             'items': [{
                                 'itemId': item_id,
                                 'amount': amount,
                                 'comAmt': commission_amount
                             }],
                             'customStyle': {
                                 'PRIMARY_COLOR_CODE': '#3977b7',   //merchant primary color code
                                 'SECONDARY_COLOR_CODE': '#FFFFFF',   //provide merchant's suitable color code
                                 'BUTTON_COLOR_CODE_1': '#1969bb',   //merchant's button background color code
                                 'BUTTON_COLOR_CODE_2': '#FFFFFF'   //provide merchant's suitable color code for button text
                             },
                             'accountNo': account_no,    //Pass this if accountNo is captured at merchant side for eMandate/eNACH
                             'accountHolderName': customer_name,  //Pass this if accountHolderName is captured at merchant side for ICICI eMandate & eNACH registration this is mandatory field, if not passed from merchant Customer need to enter in Checkout UI.
                             'ifscCode': ifsc_code,        //Pass this if ifscCode is captured at merchant side.
                             'accountType': account_type,  //Required for eNACH registration this is mandatory field
                             'debitStartDate':customer_start_date,
                             'debitEndDate': customer_end_date,
                             'bankCode': bank_code,  //bank code captured from merchant end[bank codelist provided by Worldline]
                             'maxAmount': amount,
                             'amountType': 'M',
                             'frequency': emi_frequency //  Available options DAIL, WEEK, MNTH, QURT, MIAN, YEAR, BIMN and ADHO
                             }
                     };
      
                     $.pnCheckout(configJson);

                     if(configJson.features.enableNewWindowFlow){
                         pnCheckoutShared.openNewWindow();
                     }
      
               })
               .catch(error => {
                 // alert("Error generating SHA-512 hash: " + error.message);
                 console.error("Error generating SHA-512 hash: " + error.message);
               
               });
             
         }





        //  for the form validation

        var inputs = document.querySelectorAll('#editmandateCustomerForm input, #editmandateCustomerForm select');
    inputs.forEach(function(input) {
        input.addEventListener('input', function(event) {
            validateInput(input);
        });
    });

    var inputs = document.querySelectorAll('#mandateCustomerForm input, #mandateCustomerForm select');
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
        if (errorDiv && errorDiv.classList.contains('invalid-feedback')) {
            errorDiv.style.display = 'block';
        }
    }

    // Function to hide error message
    function hideErrorMessage(input) {
        var errorDiv = input.nextElementSibling;
        if (errorDiv && errorDiv.classList.contains('invalid-feedback')) {
            errorDiv.style.display = 'none';
        }
    }

    // Function to handle form submission
    document.getElementById('mandateCustomerForm').addEventListener('submit', function(event) {
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
      
    document.getElementById('editmandateCustomerForm').addEventListener('submit', function(event) {
        var form = this;
        var isValid = true;

        // Validate all input fields
        inputs.forEach(function(input) {
            validateInput(input);
            if (!input.checkValidity()) {
                isValid = false;
            }
        });

   $('.dropdown-menu').on('click', function(event) {
        event.stopPropagation(); // Stop click event propagation
    });
  });
 </script>
     

    
  <!-- <script type="text/javascript" src="https://www.paynimo.com/paynimocheckout/server/lib/checkout.js"></script> -->