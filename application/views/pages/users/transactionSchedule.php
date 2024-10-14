<div class="content">
        <!-- <h2 class="mb-2 lh-sm"><?php echo $page_name; ?></h2> -->
         
        <!-- <div class="card" >
 
            <div class="card-body"> -->
               
                <div>
                   <!-- id="tableExample2" data-list="{&quot;valueNames&quot;:
                       [&quot;srno&quot;,&quot;name&quot;,&quot;phone&quot;,&quot;email&quot;,&quot;designation&quot;,&quot;employee&quot;,&quot;organization&quot;],
                  &quot;page&quot;:10,
                  &quot;pagination&quot;:{&quot;innerWindow&quot;:2,&quot;left&quot;:1,&quot;right&quot;:1},
                  &quot;filter&quot;:{&quot;key&quot;:&quot;payment&quot;}
                }">  -->
                      
                <form id="TransactionDetails" action="" class="row g-3">   


                       
      
        <!-- Changes in UI                <div class="sticky-leads-sidebar">
-->
        <div class="row g-2 g-xl-3">
          
            <div class="col-xl-6 col-xxl-6">
              <div class="sticky">
                <div class="card mb-3 " >
                  <div class="card-body">
                  <div class="row g-4 g-xl-1 g-xxl-3 d-flex align-items-center justify-content-between mb-4">
                      <div class="col-xl-6 col-sm-auto text-center">
                          <div class="bg-soft-primary rounded justify-content-center align-items-center py-2">
                              <span class="text-primary-600 fs-0 fw-bold dark__text-primary-300 mb-1">Monthly EMI Amount</span><br>
                              <span class="text-primary-600 fs-2 fw-bold dark__text-primary-300 mb-1"><span class="uil uil-rupee-sign"></span></span>
                              <span class="text-primary-600 fs-2 fw-bold dark__text-primary-300 " id="amount"></span>
                      </div>
                      </div>
                      <div class="col-xl-6 col-sm-auto text-center">

                          <div class="bg-soft-danger rounded justify-content-center align-items-center py-2" id="emiDivCard">
                              <span class="text-danger-600 fs-0 fw-bold dark__text-danger-300 mb-1 ">Next EMI Debit Date</span><br>
                              <span class="text-danger-600 fs-2 fw-bold dark__text-danger-300 far fa-calendar"></span>
                              <span class="text-danger-600 fs-2 fw-bold dark__text-danger-300 " id="nextEMIDebitDate"></span>
                          </div>

                          <div class="bg-soft-danger rounded justify-content-center align-items-center py-2" 
                               id="mandateCardDiv" 
                               style="display: none;">
                              <span class="text-danger-600 fs-0 fw-bold dark__text-danger-300 mb-1 ">Canceled Amount</span><br>
                              <span class="text-danger-600 fs-2 fw-bold dark__text-danger-300"></span>
                              <span class="text-danger-600 fs-2 fw-bold dark__text-danger-300" id="amtCanceled"></span>
                          </div>

                      
                      </div>

                      </div>


              <div class="row align-items-center">
                         <div class="col-12 col-sm-auto flex-1">
                        <div class="d-md-flex d-xl-block align-items-center justify-content-between mb-5">
                          <div class="d-flex align-items-center mb-3 mb-md-0 mb-xl-3">
                            <div class="avatar avatar-xl me-3">
                            <span class="fas fa-user-circle lh-sm me-1 text-primary"  data-feather="user" style="height:50px;width:50px;"></span>
                              <!-- <img class="rounded-circle" src="../../assets/img/team/72x72/58.webp" alt="" />uil-user -->
                            </div>
                            <div class="row align-items-center">
                              <div class="col">
                                  <h5 id="customer_name" ></h5>
                      </div>

                              <div>
                              <span class="text-primary uil-phone fs-1"></span>
                                  <span id="customer_mobile_no"></span>
                              </div>
                              <div>
                              <span class="text-danger uil-envelope-alt fs-1" ></span>
                                  <span id="email"></span>

                              </div>
                              <div>
                              <span class="text-grey fas fa-home fs-0"></span>
                                  <span id="bank_name"></span>
                      </div>
                      </div>
                          <div class="col-auto">

                                  <div class="d-inline-block lh-sm me-1 ">

                                      <!-- Buttons here -->
                                      <a class="btn btn-sm btn-soft-primary me-1 mb-1" type="button" href="tel:' + customer_mobile_no + '"><span class="text-primary uil-phone fs-1"></span></a>
                                      <a class="btn btn-sm btn-soft-danger me-1 mb-1" type="button" href="sms:' + customer_mobile_no + '"><span class="text-danger uil-comment fs-1"></span></a>
                                      <a href="https://wa.me/' + customer_mobile_no + '" class="btn btn-sm btn-soft-success me-1 mb-1" type="button" target="_BLANK"><span class="text-success uil-whatsapp fs-1"></span></a>
                      </div>

                      </div>

                          </div>
                      
              </div>
                       
                      <hr class=" mb-1">

                        <div class="d-flex align-items-center justify-content-between">
                       

                        <span class="mb-0"><span >Start Date : <span  id="customer_start_date"></span> </span></span>
                        <span class="mb-0"><span >End Date : <span  id="customer_end_date"></span> </span></span>
                    
          </div>

        </div>
                    </div>
                  </div>
                </div>



            
              </div>
            </div>
           
            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
            <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
              <div class="card mb-3"style="height: 130px;">
                <div class="card-body">
                  <div class="row g-4 g-xl-1 g-xxl-3 justify-content-between">
                  <div class="border-bottom-sm">

                    <div class="col-sm-auto">
                      
                      <div class="d-sm-block d-inline-flex d-md-flex flex-xl-column flex-xxl-row align-items-center align-items-xl-start align-items-xxl-center">
                      <span class="fw-bold">Transaction Details</span>

                      <div class="position-absolute top-0 end-0"> <!-- Move this div to the top right corner -->

                        <div class="d-flex bg-primary-100 rounded flex-center mb-sm-3 mb-md-0 mb-xl-3 mb-xxl-0" style="width:32px; height:32px">
                        <span class="text-primary-600 dark__text-primary-300 uil-rupee-sign fs-2" ></span>
                        </div>
                        </div>
                        <div>
                        <span class="fw-bold" style="font-size: 25px;"><span class="uil uil-rupee-sign"></span><span class="fw-bold" id="totalAmountPlaceholder" style="font-size: 25px; ">0</span></span>
                      </div>

                      </div>
                      </div>

                      </div>
                    <!-- <div class = "row justify-content-between"> -->
                    <div class="col-auto justify-content-start">
                    <span style="font-size: 12px;">Total EMI</span>
                    </div>
                    <div class="col-auto justify-content-end">
                    <span class="fw-bold"  id="totalCountPlaceholder">0</span>
                    </div>
                    <!-- </div> -->
                  </div>
                </div>
              </div>

            </div>
            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
              <div class="card mb-3" style="height: 130px;">
                <div class="card-body">
                  <div class="row g-4 g-xl-1 g-xxl-3 justify-content-between">
                  <div class="border-bottom-sm">

                    <div class="col-sm-auto">
                      
                      <div class="d-sm-block d-inline-flex d-md-flex flex-xl-column flex-xxl-row align-items-center align-items-xl-start align-items-xxl-center">
                      <span class="fw-bold">Failed Transaction</span>

                      <div class="position-absolute top-0 end-0"> <!-- Move this div to the top right corner -->

                        <div class="d-flex bg-danger-100 rounded flex-center mb-sm-3 mb-md-0 mb-xl-3 mb-xxl-0" style="width:32px; height:32px">
                        <span class="text-danger-600 dark__text-danger-300 uil-rupee-sign fs-2"></span>
                        </div>
                        </div>
                        <div>
                        <span class="fw-bold" style="font-size: 25px;"><span class="uil uil-rupee-sign"></span><span class="fw-bold" id="failedAmountPlaceholder" style="font-size: 25px;">0</span></span>
                      </div>

                      </div>
                      </div>

                    </div>
                    <div class="col-auto justify-content-start">
                    <span style="font-size: 12px;">Total Failed EMI</span>
                    </div>
                    <div class="col-auto justify-content-end">
                    <span class="fw-bold" id="failedCountPlaceholder">0</span>
                    </div>
                      
                      </div>
                </div>
                      </div>

                      </div>
            
            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6 gy-4">
              <div class="card mb-2" style="height: 130px;">
                <div class="card-body">
                  <div class="row g-4 g-xl-1 g-xxl-3 justify-content-between">
                  <div class="border-bottom-sm">

                    <div class="col-sm-auto">
                      
                      <div class="d-sm-block d-inline-flex d-md-flex flex-xl-column flex-xxl-row align-items-center align-items-xl-start align-items-xxl-center">
                      <span class="fw-bold">Skipped Transaction</span>

                      <div class="position-absolute top-0 end-0"> <!-- Move this div to the top right corner -->

                        <div class="d-flex bg-warning-300 rounded flex-center mb-sm-3 mb-md-0 mb-xl-3 mb-xxl-0" style="width:32px; height:32px">
                        <span class="text-warning-600 dark__text-warining-600 uil-rupee-sign fs-2"></span>
                        </div>
                        </div>
                        <div>
                        <span class="fw-bold" style="font-size: 25px;"><span class="uil uil-rupee-sign"></span><span class="fw-bold" id="skippedAmountPlaceholder" style="font-size: 25px;">0</span></span>
                      </div>

                      </div>
                      </div>

                      </div>
                    <div class="col-auto justify-content-start">
                    <span style="font-size: 12px;">Total Skipped EMI</span>
                    </div>
                    <div class="col-auto justify-content-end">
                    <span class="fw-bold" id="skippedCountPlaceholder">0</span>
                    </div>
                  
                  </div>
                </div>
              </div>
             
                      </div>
            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6 gy-4">
              <div class="card mb-2" style="height: 130px;">
                <div class="card-body">
                  <div class="row g-4 g-xl-1 g-xxl-3 justify-content-between">
                  <div class="border-bottom-sm">

                    <div class="col-sm-auto">
                      
                      <div class="d-sm-block d-inline-flex d-md-flex flex-xl-column flex-xxl-row align-items-center align-items-xl-start align-items-xxl-center">
                      <span class="fw-bold">EMI Bounced</span>

                      <div class="position-absolute top-0 end-0"> <!-- Move this div to the top right corner -->

                        <div class="d-flex bg-info-100 rounded flex-center mb-sm-3 mb-md-0 mb-xl-3 mb-xxl-0" style="width:32px; height:32px">
                        <span class="text-info-600 dark__text-info-300 uil-rupee-sign fs-2"></span>
                      </div>
                        </div>
                        <div>
                        <span class="fw-bold" style="font-size: 25px;"><span class="uil uil-rupee-sign"></span><span class="fw-bold" id="insufficientAmountPlaceholder" style="font-size: 25px;">0</span></span>
                      </div>

                      </div>
                      </div>

                      </div>
                    <div class="col-auto justify-content-start">
                    <span style="font-size: 12px;">Total Bounced EMI</span>
                    </div>
                    <div class="col-auto justify-content-end">
                    <span class="fw-bold" id="insufficientCountPlaceholder">0</span>
                      </div>

                      </div>
                </div>
              </div>

            </div>
            </div>
              </div>
                       
            <div class="col-xl-4 col-xxl-4 m-0">
            <div class="card">
                    <div class="card-body">


                        <div class="d-flex align-items-center justify-content-between">
                        <span style="font-size: 12px;">Successful Amount</span>
                          <span style="font-size: 12px;">Remaining Amount</span>
                    
          </div>
                        <div class="d-flex align-items-center justify-content-between">
                        <span class= "fw-bolder" style="font-size: 12px;"><span class="uil uil-rupee-sign"></span><span id="successfulAmountPlaceholder"></span></span>
                          <span class= "fw-bolder" style="font-size: 12px;"><span class="uil uil-rupee-sign"></span><span id="remainingAmountPlaceholder"></span></span>

        </div>
                        <div class="progress mb-2" style="height:5px">


                          <div class="progress-bar bg-success-300" id="successProgress" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>


                          </div>


                          </div>
                </div>
                          
                      </div>
                                   
            <div class="col-xl-4 col-xxl-4 m-0">
            <div class="card">
                    <div class="card-body">

                    <div class="d-flex align-items-center justify-content-between">

                        <span style="font-size: 12px;">Successful EMI</span>
                        <span style="font-size: 12px;">Remaining EMI</span>
                        </div>

                        <div class="d-flex align-items-center justify-content-between">
                        
                        <span class= "fw-bolder"style="font-size: 12px;"><i class="far fa-check-circle fs--1 me-1"></i><span id="successfulCountPlaceholder"></span></span>
                        <span class= "fw-bolder" style="font-size: 12px;"><i class=" fas fa-exclamation-circle fs--1 me-1"></i><span id="remainingCountPlaceholder"></span></span>
                        </div>
                        <div class="progress mb-2" style="height:5px">


                          <div class="progress-bar bg-success-300" id="successCountProgress" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>

                          
                        </div>
                      

                    </div>
                </div>

            </div>

            <div class="col-xl-4 col-xxl-4 m-0">
              <div class="card mb-4" style="height: 100px;">
                <div class="card-body">
                  <div class="row g-4 g-xl-1 g-xxl-3 justify-content-between">
                  <div class="border-bottom-sm">

                    <div class="col-sm-auto">
                      
                      <div class="d-sm-block d-inline-flex d-md-flex flex-xl-column flex-xxl-row align-items-center align-items-xl-start align-items-xxl-center">
                      <span class="fw-bold" style="font-size: 12px;">Initiated</span>
                        <div>

                      </div>

                      </div>
                      </div>

                      </div>
                    <div class="col-auto justify-content-start">
                        <span class="fw-bold " style="font-size: 12px;"><span ></span><span class="fw-bold" id="initiatedEMICountPlaceholder" style="font-size: 12px;"> 0</span></span>
                    </div>
                    <div class="col-auto justify-content-end">
                    <span class="fw-bold uil uil-rupee-sign" style="font-size: 12px;" id="initiatedEMIAmountCountPlaceholder">0</span>
                      </div>

                      </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Table content -->
          <div class="card mx-3">
         
           <div class="card-header scrollbar col-xl-12 col-xxl-12 px-4 mb-0 pb-0">
              <ul class="nav nav-underline flex-nowrap mb-3 pb-1 " id="myTab" role="tablist">
                <li class="nav-item me-3 ">
                <a class="nav-link text-nowrap active" id="orders-tab" data-bs-toggle="tab" href="#tab-orders" role="tab" aria-controls="tab-orders" aria-selected="true">
                  <span class="far fa-calendar me-2"></span>
                  Transaction Schedule
                   <span class="text-700 fw-normal">(<span id="totalSchedule"></span>) </span>
                  </a>
                </li>
                  <li class="nav-item me-3 "><a class="nav-link text-nowrap" id="reviews-tab"  data-bs-toggle="tab"  href="#tab-reviews" role="tab" aria-controls="tab-orders"aria-selected="true"><span class="fas fa-user me-2"></span>Personal info</a></li>

                <li class="nav-item me-3"><a class="nav-link text-nowrap" id="wishlist-tab" data-bs-toggle="tab" href="#tab-wishlist" role="tab" aria-controls="tab-orders" aria-selected="true"><span class="fas fa-file-invoice-dollar me-2"></span>Customer Transaction Details</a></li>
                <li class="nav-item me-3"><a class="nav-link text-nowrap" id="stores-tab" data-bs-toggle="tab" href="#tab-stores" role="tab" aria-controls="tab-stores" aria-selected="true"><span class="far fa-folder-open me-2"></span>Document</a></li>
                      <!-- Mandate cancel button  -->

                    <?php if(in_array('createCancelMandate', $user_permission)): ?>
                      <div class="ms-xxl-auto ms-xl-auto ms-lg-auto ms-md-auto ms-sm-auto">     
                          <button class="btn btn-danger btn-sm me-1 mb-1" 
                                  type="button" 
                                  id="btnMandateCancel" 
                                  name="btnMandateCancel" 
                                  style="padding: 0.25rem 0.5rem; font-size: 0.775rem;">
                              Cancel Mandate 
                          </button>
                      </div>
                    <?php endif; ?>

                    <!-- Mandate cancel button  -->
                    <?php if(in_array('exportCancelMandate', $user_permission)): ?>
                      <div id="mandateExcelDownload1"></div>
                    <?php endif; ?>

              </ul>
                      

           </div>

            <div class="card-body">



            <div class="tab-content col-xl-12 col-xxl-12 px-4 " id="profileTabContent">
           


            <div class="tab-pane fade show active" id="tab-orders" role="tabpanel" aria-labelledby="orders-tab">
                <div class="mb-2">
                <div class="d-flex flex-wrap gap-3">
                <!--   <div class="search-box input-group">
                      <input class="form-control search-input" type="text" placeholder="Search" aria-label="Recipient's username" aria-describedby="basic-addon2" id="searchTextCustomer" name="searchTextCustomer"/>
                      <span class="fas fa-search search-box-icon"></span> 
                      
                  </div>
              
 -->
                  <div class="scrollbar overflow-hidden-y">

                    <div class="btn-group position-static" role="group">
                  
                      <div class="btn-group position-static text-nowrap dropdown">
                        <button class="btn btn-sm btn-phoenix-secondary  flex-shrink-0" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"  data-bs-auto-close="true">
                          Status<span class="fas fa-angle-down ms-2"></span></button>
                        <ul class="dropdown-menu" id="status_filter">
                          <li>
                                <div class="dropdown-item p-1">
                                  <input class="form-control search-input form-control-sm m-0" type="text" placeholder="Search Filter" id="searchStatusFilter" name="searchStatusFilter"/>
                               </div>
                                <div class="nav nav-links nav-item" id="clearStatusFilter">
                                  <a class="nav-link" href="#"><span>Clear Filter</span></a>
                              </div>
                           </li>
                             
                            <li>
                               <hr class="dropdown-divider" />
                            </li>
                            <li>
                                        <div class="dropdown-item">
                                       
                                           <input name="status_mandate_filter" class="form-check-input" type="checkbox" value="" id="not_scheduled">
                                           <label class="form-check-label" for="not_scheduled">Not Scheduled</label>
                                       
                                       </div>
                                     </li>

                                     <li>
                                        <div class="dropdown-item">
                                       
                                           <input name="status_mandate_filter" class="form-check-input" type="checkbox" value="I" id="initiated">
                                           <label class="form-check-label" for="Initiated">Initiated</label>
                                       
                                       </div>
                                     </li>

                                     <li>
                                        <div class="dropdown-item">
                                       
                                           <input name="status_mandate_filter" class="form-check-input" type="checkbox" value="S" id="success">
                                           <label class="form-check-label" for="success">Success</label>
                                       
                                       </div>
                                     </li>

                                     <li>
                                        <div class="dropdown-item">
                                       
                                           <input name="status_mandate_filter" class="form-check-input" type="checkbox" value="F" id="failure">
                                           <label class="form-check-label" for="failure">Failure</label>
                                       
                                       </div>
                                     </li>
                                     <li>
                                        <div class="dropdown-item">
                                       
                                           <input name="status_mandate_filter" class="form-check-input" type="checkbox" value="" id="not_scheduled">
                                           <label class="form-check-label" for="not_scheduled">Skip</label>
                                       
                                       </div>
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
                                     <label class="form-check-label" for="emiStartDateFilter">EMI Date</label>
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

                                      <input class="form-control datetimepicker mt-1" id="emiStartDateInput" type="text" placeholder="dd/mm/yyyy" data-options='{dateFormat":"d/m/Y"}'/>

                                      </div>
                                      <div id="emiStartDateRangeInputContainer" class="dropdown-item d-none">
                                          <div class="row">
                                            <div class="col">
                                              <label class="form-label">From Date</label> 

                                                <input class="form-control datetimepicker mt-1" id="emiStartDateFromInput" type="text" placeholder="dd/mm/yyyy" data-options='{dateFormat":"d/m/Y"}'/> 

                                        
                                        </div>
                                         <div class="col">
                                          <label class="form-label">To Date</label>

                                          <input class="form-control datetimepicker mt-1" id="emiStartDateToInput" type="text" placeholder="dd/mm/yyyy" data-options='{dateFormat":"d/m/Y"}'/>
                                       
                                           </div>
                                       </div>
                                      </div>
                                  </div>
                              </li>


                          </ul>
                      </div>

                      <!-- <button class="btn btn-sm btn-phoenix-secondary  flex-shrink-0" onclick=" showFilterModal();"><i class="fas fa-filter"></i> More</button> -->


                    </div>
                  </div>


                   <?php if(in_array('skipMandate', $user_permission)):?> 
                      <div class="ms-xxl-auto ms-xl-auto ms-lg-auto ms-md-auto ms-sm-auto">
                        <!--  <button class="btn btn-link text-900 me-4 px-0" id="showOptionsButton"><span class="fas fa-eye-slash fs--1 me-2"></span>Show Options</button>
                         <button class="btn btn-link text-900 me-4 px-0"><span class="fas fa-file-excel fs--1 me-2"></span>Excel</button>
                         <button class="btn btn-link text-900 me-4 px-0"><span class="fas fa-file-pdf fs--1 me-2"></span>PDF</button> -->
                         <button class="btn btn-sm btn-warning me-2" type="button" data-selected-rows-transaction-schedule="data-selected-rows-transaction-schedule" id="btnBulkSkip" data-bs-toggle="modal" data-bs-target="#skipModalBulk">Skip Selected Schedule</button>

                      
                      </div>
                   <?php endif; ?>

                </div>
              </div>
                <div class="table-responsive">
                         <table class="table table-sm table-striped mb-0 fs--1 compact table-hover w-100" id="scheduledataTable" >
                            <thead>
                              <tr> 
                                 
                                 <th class="white-space-nowrap border-top">
                                    <!-- <div class="form-check mb-0 fs-0">
                                      <input class="form-check-input" id="bulk-select-transaction-schedule" type="checkbox" data-bulk-select='{"body":"bulk-select-body","actions":"bulk-select-actions","replacedElement":"bulk-select-replace-element"}' />
                                    </div> -->
                                  </th>

                                <th class="white-space-nowrap border-top">Sr No.</th>
                                <!-- <th class="sort border-top ps-3" data-sort="customer_start_date"> Date</th> -->
                                <th class="white-space-nowrap border-top"> Date</th>

                                <th class="white-space-nowrap border-top">Amount</th>
                                <th class="white-space-nowrap border-top">Status</th> 
                                 <th class="white-space-nowrap border-top">Message</th>   
                                <th class="white-space-nowrap border-top">Skipped Reason</th>  
                                <th class="white-space-nowrap border-top">Skipped Transaction ID</th>  
                              <?php if(in_array('updateMandate', $user_permission) || in_array('viewMandate', $user_permission) 
                                        || in_array('deleteMandate', $user_permission)): ?>
                              
                                <th class="white-space-nowrap border-top" scope="col">Action</th>
                              
                               <?php endif; ?>
                              
                              </tr>
                            
                            </thead>
                            <tbody class="list" id="userData">

                            </tbody>
                            
                          </table>
                        </div>

              </div>


                   <table class="table table-striped table-sm fs--1 mb-0 d-none" id="reporttableexcel">
                      <thead>
                          <tr> 
                          <th class="white-space-nowrap border-top">Sr No.</th>
                      <!-- <th class="sort border-top ps-3" data-sort="customer_start_date"> Date</th> -->
                      <th class="sort border-top ps-3 w-100" data-sort="transactionDate"> Date</th>

                      <th class="white-space-nowrap border-top">Amount</th>
                      <th class="white-space-nowrap border-top">Status</th>  
                      <th class="white-space-nowrap border-top">Message</th>  
                      <th class="white-space-nowrap border-top">Skipped Reason</th>  
                      <th class="white-space-nowrap border-top">Skipped Transaction ID</th>  
                   
                    
                    </tr>
                       </thead>
                         <tbody class="list" id="showReportResultexcel">
                                                
                                                        
                         </tbody>
                    </table>

              <!-- Personal Details -->
              <style>
                  .custom-font-size {
                      font-size: 13px;
                      /* font-weight: bold; */
                              
                              
                  }    
              </style>



              <div class="tab-pane fade" id="tab-reviews" role="tabpanel" aria-labelledby="reviews-tab">
                <!-- <div class="border-y" id="profileRatingTable" data-list='{"valueNames":["product","rating","review","status","date"],"page":6,"pagination":true}'> -->
                <!-- <div class="card">
                  <div class="card-body">
                     <h5 class="card-title card-text">Personal Details</h5> -->
                     <h5 class="card-title card-text">Personal Details</h5> 
                              
                      <div class="row ">
                      <!-- <h5>Personal Details</h5> -->
                            
                            <div class="col-6 mb-3 ">
                              <label class="custom-font-size" for="customer_name1">Account Holder Name </label> 
                              <span class="custom-font-size px-5" id="customer_name1" name="customer_name1"></span>

                            </div>
                          
                            <div class="col-6 mb-3">
                              <label class="custom-font-size" for="customer_mobile_no1">Mobile No.</label>  
                              <span class="custom-font-size px-5" id="customer_mobile_no1" name="customer_mobile_no1"></span>
                            
                        </div>
                            
                            <div class="col-6 mb-3">
                              <label class="custom-font-size" for="email1">Customer Email ID</label>   
                             
                              <span class="custom-font-size px-8" id="email1" name="email1"></span> 
                 
                            </div>
                            
                            
                            <div class="col-6 mb-3">
                              <label class="custom-font-size"for="loan_type_id">Loan Type</label>
                              <span class="custom-font-size px-5" id="loan_type_id" name="loan_type_id"></span>

                            </div>
                          

                            <div class="col-6 mb-3">
                              <label class="custom-font-size" for="bank_account_no">Bank Loan Account No</label>
                              <span class="custom-font-size px-5" id="bank_account_no" name="bank_account_no"></span>

                        </div>
                      </div>
            </div>
              <!--End of personal Details  -->
              <div class="tab-pane fade" id="tab-wishlist" role="tabpanel" aria-labelledby="wishlist-tab">
                <!-- <div class="border-y" id="productWishlistTable" data-list='{"valueNames":["products","color","size","price","quantity","total"],"page":5,"pagination":true}'> -->
                <!-- <div class="card">
                  <div class="card-body">
                     <h5 class="card-title card-text">Customer Transaction Details</h5> -->
                     <h5 class="card-title card-text">Customer Transaction Details</h5> 

                      <div class="row ">

                            <div class="col-6 mb-3 ">
                              <label class="custom-font-size" for="consumer_ID">Consumer ID</label> 
                              <span class="custom-font-size px-5" id="consumer_ID" name="consumer_ID"></span>
                       
          </div>
         
                            <div class="col-6 mb-3">
                              <label class="custom-font-size" for="txn_ID">Transaction ID</label>  
                              <span class="custom-font-size px-5" id="txn_ID" name="customer_mobile_no1"></span>
   
                            </div>
                         
                            <div class="col-6 mb-3">
                              <label class="custom-font-size" for="payment_mode">Payment Mode</label>       
                              <span class="custom-font-size px-3" id="payment_mode" name="payment_mode"></span>
                              
                            </div>
                            
                            <div class="col-6 mb-3">
                              <label class="custom-font-size"for="bank_name1">Bank Name</label>
                              <span class="custom-font-size px-7" id="bank_name1" name="bank_name1"></span>

                            </div>
                          
                            <div class="col-6 mb-3">
                              <label class="custom-font-size" for="bank_code">Bank Code</label>
                              <span class="custom-font-size px-6" id="bank_code" name="bank_code"></span>

                            </div>

                            <div class="col-6 mb-3">
                              <label class="custom-font-size" for="account_no">Account No</label>
                              <span class="custom-font-size px-7" id="account_no" name="account_no"></span>

                            </div>

                            <div class="col-6 mb-3">
                              <label class="custom-font-size" for="account_type">Account Type</label>
                              <span class="custom-font-size px-4" id="account_type" name="account_type"></span>

                            </div>

                            <div class="col-6 mb-3">
                              <label class="custom-font-size" for="emi_frequency">EMI Frequency</label>
                              <span class="custom-font-size px-4" id="emi_frequency" name="emi_frequency"></span>

                            </div>

                            <div class="col-6 mb-3">
                              <label class="custom-font-size" for="customer_start_date1">EMI Start Date</label>
                              <span class="custom-font-size px-3" id="customer_start_date1" name="customer_start_date1"></span>

                            </div>

                            <div class="col-6 mb-3">
                              <label class="custom-font-size" for="transactionDate1">Debit Date</label>
                              <span class="custom-font-size px-5" id="transactionDate1" name="transactionDate1"></span>

                            </div>

                            <div class="col-6 mb-3">
                              <label class="custom-font-size" for="customer_end_date1">EMI End Date</label>
                              <span class="custom-font-size px-4" id="customer_end_date1" name="customer_end_date1"></span>

                            </div>

                            <div class="col-6 mb-3">
                              <label class="custom-font-size" for="emi_count">EMI Count</label>
                              <span class="custom-font-size px-5" id="emi_count" name="emi_count"></span>

                            </div>

                            <div class="col-6 mb-3">
                              <label class="custom-font-size" for="amount1">EMI Amount</label>
                              <span class="custom-font-size px-5" id="amount1" name="amount1"></span>

                            </div>
                          
                    <!-- </div>
                  </div> -->
                </div>
                <!-- </div> -->
              </div>
              <div class="tab-pane fade" id="tab-stores" role="tabpanel" aria-labelledby="wishlist-tab">
               
                      <!-- <h5 class="card-title card-text">eNACH ??????????? ??? ???? ??????? ????? .</h5>
                      <div class="row text-center mb-3">
                        
                      
                            <div id="documentContainer"  width="150"></div>
                            <div id="documentName"></div>

                        
                      </div> -->
                      <table class="table table-sm fs--1 mb-3"  id="document">
                                <thead>
                                    <tr> 
                        <!-- <th class="sort white-space-nowrap align-middle " scope="col" data-sort="order" style="width:5%; min-width:140px">#</th> -->
                             
                          <th class="sort white-space-nowrap align-middle text-start"  scope="col" data-sort="order" style="width:15%; min-width:140px">Name</th>
                          <th class="sort align-middle  text-start pe-3" scope="col" data-sort="date" style="width:15%; min-width:160px">DATE</th>
                          <!-- <th class="sort align-middle text-start pe-3" scope="col" data-sort="total" style="width:15%; min-width:160px">Aproved Status</th> -->
                              
                          <th class="align-middle pe-0 text-end" scope="col" style="width:15%;">Action </th>
                              </tr>
                                 </thead>
                      <tbody class="list mb-3" id="documentData">
                                                          
                                                                  
                                   </tbody>
                              </table>
                
                <div class="row gx-3 gy-5">
                
                </div>
                            </div>
                                     
            </div>
        <!-- Changes end in UI  -->
        </div>
          </div>


         


          
              </form>
                     
                    
            <!-- </div>
          </div>                         -->

   
      <div class="modal fade" id="skipModal" tabindex="-1" aria-labelledby="scrollingLongModalLabel2" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="tooltipModalLabel">Skip Transaction</h5>
                <button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><span class="fas fa-times fs--1"></span></button>
              </div>
              <div class="modal-body">
                
                      <form id="skipTransactionForm" action="" class="row g-3">
                        <input type="hidden" name="mts_id" id="mts_id" value="">
                        <div class="col-md-12">
                          <label class="form-label" for="mts_skipped_reason">Reason</label>
                           <textarea class="form-control" id="mts_skipped_reason" name="mts_skipped_reason" placeholder="Reason"></textarea>
                       </div>


                       <div class="col-md-12">
                         <label class="form-label" for="mts_skip_transaction_id">Transaction ID/Txn Id</label>
                         <input type="text" class="form-control" id="mts_skip_transaction_id" name="mts_skip_transaction_id" placeholder="Transaction ID" autocomplete="off" value="">
                       </div>
                  </form>
              </div>
             
              <div class="modal-footer">
                <button class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Close</button>
               <button class="btn btn-primary  item-skipTransaction" id="skipTransaction" type="button">Save</button>

              </div>
            </div>
          </div>
        </div>  

      <div class="modal fade" id="skipModalBulk" tabindex="-1" aria-labelledby="scrollingLongModalLabel2" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="tooltipModalLabel">Skip Transaction Schedule</h5>
                <button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><span class="fas fa-times fs--1"></span></button>
              </div>
              <div class="modal-body">

                <div class="table-responsive">
                          <table class="table table-striped table-sm fs--1 mb-0">

                            <thead>
                              <tr> 
                              
                              <th class="sort border-top ps-3" data-sort="srno">Sr No.</th>
                               <th class="sort border-top ps-3" data-sort="customer_start_date"> Date</th>
                               <th class="sort border-top ps-3" data-sort="amount">Amount</th>
                             
                              </tr>
                            
                            </thead>
                            <tbody class="list" id="userDataBulkSkip">

                            </tbody>
                            
                          </table>
                        </div>
                    

                    <hr>
                      <form id="skipBulkTransactionForm" action="" class="row g-3">
                      
                        <div class="col-md-12">
                          <label class="form-label" for="mts_skipped_reason_bulk">Reason</label>
                           <textarea class="form-control" id="mts_skipped_reason_bulk" name="mts_skipped_reason_bulk" placeholder="Reason"></textarea>
                       </div>


                       <div class="col-md-12">
                         <label class="form-label" for="mts_skip_transaction_id_bulk">Transaction ID/Txn Id</label>
                         <input type="text" class="form-control" id="mts_skip_transaction_id_bulk" name="mts_skip_transaction_id_bulk" placeholder="Transaction ID" autocomplete="off" value="">
                       </div>
                  </form>
              </div>
             
              <div class="modal-footer">
                <button class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Close</button>
               <button class="btn btn-primary  item-skipTransactionBulk" id="skipTransactionBulk" type="button">Save</button>

              </div>
            </div>
          </div>
        </div>  
           <!-- Modal for Edit Document -->

        <div class="modal fade" id="editDocumentModal" tabindex="-1" aria-labelledby="editDocumentModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="editDocumentModalLabel">Edit Document</h5>

                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form id="editDocumentForm" enctype="multipart/form-data" action=""  class="row g-3"> 
                    <!-- Form for editing the document -->
                    
                  <div class="container border border-300 p-2 rounded-2 me-2 shadow mt-3 bg-light p-3 rounded">
                      <div>
                        <label for="fileInput" class="form-label" style="font-size: 12px;">eNACH ग्राहकाकडून सही करून घेतलेले फॉर्म इथे अपलोड करा .  </label>
                      </div>
                      <input type="file" id="fileInput" name="document" class="form-control" accept=".pdf,.doc,.docx, .png" onchange="validateFileSize(this)"/>
                  </div>
                
                  <!-- Add your form elements here -->
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary" id="updateDocumentBtn">Update</button>
                </div>
                </div>
              </div>
            </div>
          </div>

       <!--End  -->


       <!-- Modal for deleting document -->
    <div class="modal fade" id="deleteDocumentModal" tabindex="-1" aria-labelledby="deleteDocumentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteDocumentModalLabel">Delete Document</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this document?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="confirmDeleteDocumentBtn">Delete</button>
                </div>
            </div>
        </div>
    </div>


<!--start Mandate Cancel Modal -->
<div class="modal fade" id="MandateCancelModal" tabindex="-1" aria-labelledby="verticallyCenteredModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="verticallyCenteredModalLabel">Mandate to be cancel</h5>
        <button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><span class="fas fa-times fs--1"></span></button>
      </div>
      <div class="modal-body">
          <div class="card-body">
              <div>
               <div class="d-flex justify-content">
                  <p class="text-900 fw-semi-bold">Total EMI To Be Cancel: </p>
                  <p class="text-1100 fw-semi-bold" id="totalEMI"></p>
                  
                  <p class="text-900 fw-semi-bold ms-4">EMI Amount: </p> 
                  <p class="text-1100 fw-semi-bold" id="emiAmount"></p>

                  <p class="text-900 fw-semi-bold ms-4">Total Cancel Amount: </p>
                  <p class="text-1100 fw-semi-bold" id="totalEmiAmount"></p>
                </div>

              </div>
          </div>
          <hr>

      <h5 class="mb-0">The following EMI schedule is to be canceled.</h5>
   <div class="table-responsive" style="max-height: 300px; overflow-y: auto;">
    <table class="table table-bordered table-sm" style="font-size: 0.875rem;">
        <thead>
            <tr>
                <th scope="col" style="padding: 0;">Sr.No</th>
                <th scope="col" style="padding: 0;">Date</th>
                <th scope="col" style="padding: 0;">Amount</th>
            </tr>
        </thead>
        <tbody id="mandateDataToBeCancel">
            <!-- Dynamic rows will be appended here -->
        </tbody>
    </table>
</div>

      </div>
      <div class="modal-footer">
        <button class="btn btn-outline-danger btn-sm me-1 mb-1" id="btnMandateTobeCancelled" type="button">Cancel Mandate</button>
        <button class="btn btn-outline-primary btn-sm me-1 mb-1" type="button" data-bs-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>    
<!--end Mandate Cancel Modal -->

<!--end Mandate confirm Modal -->

<div class="modal fade" id="MandateCancelConfrimModal" tabindex="-1" aria-labelledby="verticallyCenteredModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="verticallyCenteredModalLabel">Confirmation of Mandate Cancellation</h5>
        <button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><span class="fas fa-times fs--1"></span></button>
      </div>
      <div class="modal-body">
        <p class="text-700 lh-lg mb-0" id="mandateExcelDownload">Are you sure you want to cancel the mandate?</p>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" id="btnMandateConfirmCancel" type="button">Confirm</button>
        <button class="btn btn-secondary" id="btnClose" type="button" data-bs-dismiss="modal">No</button>
      </div>
    </div>
  </div>
</div>

<!--end Mandate confirm Modal -->


  <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.4/xlsx.full.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>

<script type="text/javascript">

    var selectedTransactions=[];  

    var mandate_customer_id = "<?php echo $mandate_customer_id; ?>";
    // showUsersData();



    $('#userData').on('click', '.item-skipSchedule', function(){ 
        var mts_id = $(this).attr('data');
        var mts_skipped_reason = $(this).attr('mts_skipped_reason');
        var mts_skip_transaction_id = $(this).attr('mts_skip_transaction_id');

        $('input[name=mts_id]').val(mts_id)
        $('textarea[name=mts_skipped_reason]').val(mts_skipped_reason)
        $('input[name=mts_skip_transaction_id]').val(mts_skip_transaction_id)
        $('#skipModal').modal('show');
    });     


    function skipTransaction(mts_skipped_reason,mts_skip_transaction_id,mts_id){


        $.ajax({
            type: 'ajax',
            method:'post',
            url: '<?php echo base_url(); ?>api/User/skipTransactionSchedule',
            data: {
                'mts_skipped_reason':mts_skipped_reason,
                'mts_skip_transaction_id':mts_skip_transaction_id,
                'mts_id':mts_id,
            },
            async: false,
            dataType: 'json',
             beforeSend: function(xhr) {
                      xhr.setRequestHeader('X-API-KEY','enachSyncWorks');
                  },
            success: function(response){

              $('#skipModal').modal('hide');
              showUsersData();
              toastr.success('Transaction skipped successfully.'); // Show success message


                    return true;

            },

          error: function(response){

                    return false;
                   // var data =JSON.parse(response.responseText);
                   // toastr.error(data.message);
               
            }

        });


    }
    
    $('#skipTransaction').click(function(){
       var mts_skipped_reason      = $('textarea[name=mts_skipped_reason]').val();
       var mts_skip_transaction_id = $('input[name=mts_skip_transaction_id]').val();
       var mts_id = $('input[name=mts_id]').val();

         if(skipTransaction(mts_skipped_reason,mts_skip_transaction_id,mts_id)){
              showUsersData();
              toastr.success(response.message);
              $('#skipModal').modal('hide');
              $('#skipTransactionForm')[0].reset();
         }
    });


 
         $('#searchInput').on('input', function() {
          var searchTerm = $(this).val();

        // var searchTerm = $(this).val();
        var apiUrl = '<?php echo base_url(); ?>api/User/search/';
      
        $.ajax({
            type: 'get',
            url: apiUrl + encodeURIComponent(searchTerm),
            dataType: 'json',
            beforeSend: function(xhr) {
                xhr.setRequestHeader('X-API-KEY', 'enachSyncWorks');
            },
            success: function(response){
                // Handle the search results
          //      console.log(response);
            },
            error: function(response){
                var data = JSON.parse(response.responseText);
                toastr.error(data.message);
            }
        });
      });
      

    function formatDate(date) {
    var day = date.getDate();
    var month = date.getMonth() + 1; 
    var year = date.getFullYear();

    
    day = day < 10 ? '0' + day : day;
    month = month < 10 ? '0' + month : month;

    return day + '/' + month + '/' + year;
}
showMandatedetails();
function showMandatedetails() {
         
            $.ajax({
                type: 'ajax',
      url: "<?php echo base_url() ?>api/User/showMandateDetails",
                data:{
                  'mandate_customer_id':mandate_customer_id
                },
                async: false,
                method:'get',
                dataType: 'json',
                beforeSend: function(xhr) {
                    xhr.setRequestHeader('X-API-KEY','enachSyncWorks');
                },
                success: function(response) {
                    // body...
          // transaction_details=response.transaction_details;
          // console.log('Customer Details:', transaction_details);
                  
                   
                  mandate_details = response.mandate_details;

              // Toggle the cancel button based on mandate status and cancellation status
              $('#btnMandateCancel').toggle(mandate_details.mandate_status_message === 'success');

              // If the mandate is canceled, show the Excel download button
              if (mandate_details.mandate_customer_canceled === '1') {
                  var mandateCustomerId = mandate_details.mandate_customer_id; // Get the customer ID
                       $("#btnMandateCancel").hide();

                  $('#mandateExcelDownload1').html(
                      '<a href="<?php echo base_url('Users/cancelMandateSheetDownload/') ?>' + mandateCustomerId + '" class="btn btn-success btn-sm me-1 mb-1">' +
                      '<i class="fa-solid fa-download"></i> Canceled Template Excel-Sheet</a>'
                  );
              }

                   
              $('#customer_name').text(mandate_details.customer_name);
              $('#customer_name1').text(mandate_details.customer_name);

                    $('#customer_mobile_no').text(mandate_details.customer_mobile_no);
          $('#customer_mobile_no1').text(mandate_details.customer_mobile_no);

          // $('#email').text(mandate_details.customer_email);
          // $('#email1').text(mandate_details.customer_email);
              var customerEmail1 = mandate_details.customer_email;
              if (customerEmail1) {
                $('#email').text(customerEmail1);
              } else {
                $('#email').text("Not available");
              }

              var customerEmail = mandate_details.customer_email;
              if (customerEmail) {
                $('#email1').text(customerEmail);
              } else {
                $('#email1').text("Not available");
              }
                    // $('#loan_type_id').text(mandate_details.loan_type_id);
                    // $('#loan_type_name').text(mandate_details.loan_type_name);


                    // bank_account_no
          // $('#bank_account_no').text(mandate_details.bank_account_no);
              var customerAcc = mandate_details.bank_account_no;
              if (customerAcc) {
                $('#bank_account_no').text(customerAcc);
              } else {
                $('#bank_account_no').text("Not available");
              }

                    $('#account_no').text(mandate_details.account_no);
                    $('#payment_mode').text(mandate_details.payment_mode);
                    $('#bank_code').text(mandate_details.bank_code);
          $('#consumer_ID').text(mandate_details.consumer_ID);
          $('#txn_ID').text(mandate_details.txn_ID);

          // Initial masking of the account number
          var maskedAccountNo = mandate_details.account_no.replace(/\d/g, "x");
          $('#account_no').text(maskedAccountNo);

          // Click event to unmask the account number
          $('#account_no').on('click', function() {
              $(this).text(mandate_details.account_no); // Show the actual account number
          });

          // Mouseout event to re-mask the account number when the mouse leaves the element
          $('#account_no').on('mouseout', function() {
              var maskedAccountNo = mandate_details.account_no.replace(/\d/g, "x");
              $(this).text(maskedAccountNo); // Mask the account number again
          });
   

          mandate_details=response.mandate_details;
          var bankId = mandate_details.bank_name;
          $('#account_type').text(mandate_details.account_type);
          $('#emi_frequency').text(mandate_details.emi_frequency);
       

          // // $('#transactionDate').text(mandate_details.transactionDate);
          // // Get the day from mandate_details.transactionDate (assuming it contains only the day)
          // var day = parseInt(mandate_details.transactionDate, 10);

          // // Get the current month and year
          // var currentDate = new Date();
          // var month = currentDate.getMonth() + 1; // Adding 1 because getMonth() returns zero-based index
          // var year = currentDate.getFullYear();

          // // Create a string with the desired format
          // var formattedDate = day + '/' + month + '/' + year;


          // Assuming '#transactionDate' is the ID of the element where you want to display the date
          $('#transactionDate').text(mandate_details.transactionDate);
          $('#transactionDate1').text(mandate_details.transactionDate);
          
          $('#emi_count').text(mandate_details.emi_count);
          $('#amount').text(Intl.NumberFormat('en-IN').format(mandate_details.amount));
          $('#amount1').text('₹ '+ Intl.NumberFormat('en-IN').format(mandate_details.amount));

          var startDateTime = new Date(mandate_details.customer_start_date);
          var endDateTime = new Date(mandate_details.customer_end_date);

          // Format the start and end dates as dd/mm/yyyy
          var formattedStartDate = formatDate(startDateTime);
          var formattedEndDate = formatDate(endDateTime);

          // Update the HTML elements with the formatted start and end dates
          $('#customer_start_date').text(mandate_details.customer_start_date);
          $('#customer_start_date1').text(mandate_details.customer_start_date);

          $('#customer_end_date').text(mandate_details.customer_end_date);
          $('#customer_end_date1').text(mandate_details.customer_end_date);



          $.ajax({
                    type: 'ajax',
                    method: 'get',
                    url: '<?php echo base_url(); ?>api/Bank/show_Enach_Bank_row',
                    data: { 'enach_bank_id': bankId },
                    async: false,
                    dataType: 'json',
                    beforeSend: function(xhr) {
                        xhr.setRequestHeader('X-API-KEY', 'enachSyncWorks');
                    },
                    success: function(bankResponse) {
                        var bankName = bankResponse.data.enach_bank_name;

                        // Update the HTML element with the fetched bank name
                        $('#bank_name').text(bankName);
              $('#bank_name1').text(bankName);

                    },
                    error: function(response) {
                        var errorData = JSON.parse(response.responseText);
                        toastr.error(errorData.message);
                    }
                });

                mandate_details = response.mandate_details;

                var loan_type_id = mandate_details.loan_type_id;

                $.ajax({
                      type: "ajax",
                      method: 'get',
                      url: '<?php echo base_url(); ?>api/Bank/showLoanType',
                      data: { 'loan_type_id': loan_type_id },
                      async: false,
                      dataType: 'json',
                      beforeSend: function(xhr) {
                          xhr.setRequestHeader('X-API-KEY', 'enachSyncWorks');
                      },
                      success: function(response) {
                    //      console.log('Loan', response);

                          if (response && response.status === true && response.data.length > 0) {
                              // Find the loan type object corresponding to the loan_type_id
                              var loanType = response.data.find(function(loan) {
                                  return loan.loan_type_id == loan_type_id;
                              });

                              if (loanType) {
                                  var loanTypeName = loanType.loan_type_name;
                           //       console.log('Loan Type Name:', loanTypeName);
                                  $('#loan_type_id').text(loanTypeName);
                              } else {
                          //        console.error('Loan type not found for loan_type_id:', loan_type_id);
                              }
                          } else {
                        //      console.error('Invalid response or no loan types found');
                          }
                      },
                  error: function(response) {
                      // Handle error
                      var data = JSON.parse(response.responseText);
                      toastr.error(data.message);
                  }
              });

                    

                  var documentUrl = "<?php echo base_url('uploads/document/'); ?>" + mandate_details.document;

          //          console.log('Document Filename:', mandate_details.document);

                    if (mandate_details.document) {
  var documentName = mandate_details.document;
  var storedFileName = mandate_details.document;
    var originalDocumentName = storedFileName.substring(storedFileName.lastIndexOf('_') + 1);

    // Now 'originalDocumentName' contains the original name of the document
  //  console.log(originalDocumentName); 
                      // Extract file extension
                      var fileExtension = mandate_details.document.split('.').pop().toLowerCase();

                      if (fileExtension === 'pdf') {
                        // Display PDF icon
                        $('#documentContainer').html('<i class="fas fa-file-pdf fa-2x"></i>');
                      } else if (['jpg', 'jpeg', 'png', 'gif'].includes(fileExtension)) {
        // Display image
        $('#documentContainer').html('<img src="' + documentUrl + '" alt="Document" width="100">');
        // $('#documentContainer').html('<i class="far fa-file-image fa-2x"></i>');

    } else if (fileExtension === 'docx') {
        // Display DOCX icon
        $('#documentContainer').html('<i class="fas fa-file-word fa-2x"></i>');
                      } else {
                        // Handle other file types as needed
        $('#documentContainer').html('Unsupported file type: ');
                      }
    $('#documentName').html(documentName);

    // Open document in new tab when clicked
    // $('#documentContainer').on('click', function() {
    //     window.open(documentUrl, '_blank');
    // });
                    } else {
                      // If no document available, show a message
                      $('#documentContainer').html('No document available');
                    }
                    var html="";
                    var tbt="";
            //  Table  for Document
            if (mandate_details.doc_is_active == 1 && mandate_details.doc_is_delete == 0) {

              html+='<tr>';
              html+= '<td class="order align-middle white-space-nowrap py-2 ps-2">'+originalDocumentName+'</td>';
              html+= '<td class="order align-middle white-space-nowrap py-2 ps-2">'+formatDateToDMY(mandate_details.doc_uploaded_time)+'</td>';
              // html+= '<td class="order align-middle white-space-nowrap py-2 ps-2">'+approvedstatus+'</td>';
              html += '<td class="align-middle white-space-nowrap text-end pe-0">' +
        '<div class="font-sans-serif btn-reveal-trigger position-static">' +
        '<button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none fs--2" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent">' +
        '<svg class="svg-inline--fa fa-ellipsis fs--2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="ellipsis" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">' +
        '<path fill="currentColor" d="M120 256C120 286.9 94.93 312 64 312C33.07 312 8 286.9 8 256C8 225.1 33.07 200 64 200C94.93 200 120 225.1 120 256zM280 256C280 286.9 254.9 312 224 312C193.1 312 168 286.9 168 256C168 225.1 193.1 200 224 200C254.9 200 280 225.1 280 256zM328 256C328 225.1 353.1 200 384 200C414.9 200 440 225.1 440 256C440 286.9 414.9 312 384 312C353.1 312 328 286.9 328 256z"></path>' +
        '</svg>' +
       
        '</button>' +
        '<button class="btn btn-sm view-document-btn" data-document="' + documentUrl + '">' +
        '<span class="fas fa-eye"></span>' +
        '</button>' +
        '<div class="dropdown-menu dropdown-menu-end py-2 ps-2" id="documentAction">' +
        '<a class="dropdown-item item-updateDocument" data-mandate-customer-id="'+ mandate_details.mandate_customer_id + '" href="javascript:;"><span class="uil-edit"></span> Edit</a>' +
        '<a class="dropdown-item item-deleteDocument" data-mandate-customer-id="' + mandate_details.mandate_customer_id + '" href="javascript:;"><span class="uil-edit"></span> Delete</a>' +

        // Dropdown menu content here
        '</div>' +
        '</div>' +
        '</td>';
      } else {
    html += '<tr>';
    html += '<td class="order align-middle white-space-nowrap py-2 ps-2">Document not uploaded</td>';
    html += '<td class="order align-middle white-space-nowrap py-2 ps-2"></td>'; // Empty cell for the datetime
    html += '<td class="align-middle white-space-nowrap text-end pe-0">' +
        '<div class="font-sans-serif btn-reveal-trigger position-static">' +
        '<button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none fs--2" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent">' +
        '<svg class="svg-inline--fa fa-ellipsis fs--2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="ellipsis" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">' +
        '<path fill="currentColor" d="M120 256C120 286.9 94.93 312 64 312C33.07 312 8 286.9 8 256C8 225.1 33.07 200 64 200C94.93 200 120 225.1 120 256zM280 256C280 286.9 254.9 312 224 312C193.1 312 168 286.9 168 256C168 225.1 193.1 200 224 200C254.9 200 280 225.1 280 256zM328 256C328 225.1 353.1 200 384 200C414.9 200 440 225.1 440 256C440 286.9 414.9 312 384 312C353.1 312 328 286.9 328 256z"></path>' +
        '</svg>' +
       
        '</button>' +
        '<button class="btn btn-sm view-document-btn1">' +
        '<span class="fas fa-eye"></span>' +
        '</button>' +
        '<div class="dropdown-menu dropdown-menu-end py-2 ps-2"  id="documentAction">' +
        '<a class="dropdown-item item-updateDocument" data-mandate-customer-id="' + mandate_details.mandate_customer_id + '" href="javascript:;"><span class="uil-edit"></span> Edit </a>' +
        '<a class="dropdown-item item-deleteDocument" data-mandate-customer-id="' + mandate_details.mandate_customer_id + '" href="javascript:;"><span class="uil-edit"></span> Delete </a>' +

        // Dropdown menu content here
        '</div>' +
        '</div>' +
        '</td>';
}

            


              html+='</tr>';

              $('#documentData').html(html); 

          
               },
           error: function(response){
             var data =JSON.parse(response.responseText);
             toastr.error(data.message);
              }

  });

}

$('.view-document-btn1').on('click', function() {
    
        toastr.error('Document is not available');
    
});


    var selectedTransactions=[];  

    var mandate_customer_id = "<?php echo $mandate_customer_id; ?>";
    ///////////changes
        
    
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

  //  searchBranchInput.addEventListener('keyup', function () {
  //     var searchText = this.value.toLowerCase(); // Convert input value to lowercase for case-insensitive search
  //     // Loop through each filter item
  //     filterBranchItems.forEach(function (item) {
  //         // Check if the label text contains the search text
  //         var label = item.querySelector('.form-check-label');
  //           if (label) {
  //               var labelText = label.textContent.toLowerCase();
  //               if (labelText.includes(searchText)) {
  //                   item.style.display = 'block';
  //               } else {
  //                   item.style.display = 'none';
  //               }
  //           }
  //     });
  // });



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


    document.addEventListener("DOMContentLoaded", function() {
               
               showUsersData();

                 dataTable.on('select', function (e, dt, type, indexes) {
                      if (type === 'row') {
                          dataTable.column(-1).visible(false); // Hide the last column
                      }
                 });

                 dataTable.on('deselect', function (e, dt, type, indexes) {
                    if (type === 'row' && dataTable.rows({ selected: true }).count() === 0) {
                        dataTable.column(-1).visible(true); // Show the last column if no rows are selected
                    }
                 });

                  $('#btnBulkSkip').on('click', function() {
                    var selectedData = dataTable.rows({ selected: true }).data().toArray();
                      var html="";

                      for (var i = 0; i < selectedData.length; i++) {
                          var x=i+1;
                            html+='<tr>'+
                                  '<td>'+x+'</td>'+
                                  '<td>'+formatDateToDMY(selectedData[i].mts_datetime)+'</td>'+
                                  '<td>'+selectedData[i].mts_amount+'</td>'+
                            '</tr>';
                            selectedTransactions.push(selectedData[i].mts_id);
                      }

                      $('#userDataBulkSkip').html(html);
           
                });

               
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
             


              
                $('#clearStatusFilter').click(function(){
                   $("input[name='status_mandate_filter']:checked").prop("checked", false);
                   statusFilterChange();
                });

                $('#clearMoreFilter').click(function(){

                  $("#amountInput").val("");
                  $("#amountFromInput").val("");
                  $("#amountToInput").val("");
                  $("#emiStartDateInput").val("");
                  $("#emiStartDateFromInput").val("");
                  $("#emiStartDateToInput").val("");
                  
                  dataTable.column('mandate_transaction_schedule.mts_amount:name').search('', true).draw();
                  dataTable.column('mandate_transaction_schedule.mts_datetime:name').search('', true).draw();
                   
                  $("input[name='amountFilter']:checked").prop("checked", false);
                  $("input[name='emiStartDateFilter']:checked").prop("checked", false);
                  
             
                  handleCheckboxChange('amountFilter', 'amountFilterValue');
                  handleCheckboxChange('emiStartDateFilter', 'emiStartDateFilterValue');
                  
                  amountFromInput.value='';
                  amountToInput.value='';
                   amountInput.value='';
                   emiStartDateInput.value='';
                   emiStartDateFromInput.value='';
                   emiStartDateToInput.value='';
                  
                });


              

                function statusFilterChange(){
                    var status_mandate_filter = $('input:checkbox[name="status_mandate_filter"]:checked').map(function() {
                                 return '^' + this.value + '$';
                           }).get().join('|');
                   
                    dataTable.column('mandate_transaction_schedule.mts_status_message:name').search(status_mandate_filter, true).draw(); 
      
                }

               $("input[name='status_mandate_filter']").change(function () { 

                   statusFilterChange();
      
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



              
              
              
              
               
        });

      function amountFilterFunction(filter_type,fixedAmount,fromAmount,toAmount){


           if(filter_type=="fixedFilterAmount"){

                   dataTable.column('mandate_transaction_schedule.mts_amount:name').search(fixedAmount, true).draw();
           }

            if(filter_type=="lessThanFilterAmount"){

              dataTable.column('mandate_transaction_schedule.mts_amount:name').search('<'+fixedAmount, true).draw();
           }
           if(filter_type=="greaterThanFilterAmount"){

            dataTable.column('mandate_transaction_schedule.mts_amount:name').search('>'+fixedAmount, true).draw();
            }

           if(filter_type=="betweenFilterAmount"){
               
            dataTable.column('mandate_transaction_schedule.mts_amount:name').search(fromAmount+'between'+toAmount, true).draw();

           }
       
      }    

       function emiStartDateFilterFunction(emiStartDateFilterType,fixedEmiStartDate,fromDate,toDate){


           if(emiStartDateFilterType=="fixedFilterStartDate"){

               dataTable.column('mandate_transaction_schedule.mts_datetime:name').search(fixedEmiStartDate, true).draw();
           }

           if(emiStartDateFilterType=="lessThanFilterStartDate"){

             dataTable.column('mandate_transaction_schedule.mts_datetime:name').search('<'+fixedEmiStartDate, true).draw();
           }

           if(emiStartDateFilterType=="greaterThanFilterStartDate"){

            dataTable.column('mandate_transaction_schedule.mts_datetime:name').search('>'+fixedEmiStartDate, true).draw();
           }

           if(emiStartDateFilterType=="betweenFilterStartDate"){
               
            dataTable.column('mandate_transaction_schedule.mts_datetime:name').search(fromDate+'between'+toDate, true).draw();

           }
       
      }    

  function formatDateToDMY(dateString) {
      const date = new Date(dateString);
      const day = date.getDate().toString().padStart(2, '0');
      const month = (date.getMonth() + 1).toString().padStart(2, '0'); // Months are zero-indexed
      const year = date.getFullYear();
      return `${day}-${month}-${year}`;
  }

  var nextEMIDebitDate = 0;

  function showUsersData() {
      if ($.fn.DataTable.isDataTable('#scheduledataTable')) {
          $('#scheduledataTable').DataTable().destroy();
      }

      dataTable = $('#scheduledataTable').DataTable({
        
          lengthMenu: [[10, 25, 50, 10000000000000000000], [10, 25, 50, "All"]],
          buttons: ['pageLength'],
          language: {
              lengthMenu: 'Show _MENU_ entries', // Customize the text here
              buttons: {
                  pageLength: {
                      _: "Show %d entries"
                  }
              }
          },
          processing: false,
          serverSide: true,
          ordering: true,
          search: {
              return: true
          },
          searchBuilder: true,
          pagingType: "full_numbers",
          createdRow: function (row, data, dataIndex) {
              $(row).addClass("hover-actions-trigger btn-reveal-trigger position-static");
          },
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
                          text: '<i class="fas fa-columns" aria-hidden="true"></i> Show Columns',
                          columns: ':not(.noVis)'

                      },
                      <?php if (in_array('exportMandate', $user_permission)): ?>
                      {
                          extend: 'csv',
                          text: '<i class="fas fa-file-excel" aria-hidden="true"></i> Excel',
                          action: function (e, dt, node, config) {
                              exportToExcel();
                          }
                      },
                      // {
                      //     extend: 'pdfHtml5',
                      //     text: '<i class="fas fa-file-pdf" aria-hidden="true"></i> PDF',
                      //     orientation: 'landscape',
                      //     pageSize: 'LEGAL',
                      // }
                      <?php endif; ?>
                  ],
              }
          },
          searching: true,
          paging: true,
          responsive: true,
          scrollCollapse: true,
          scroller: false,
          stateSave: false,
          info: true,
          select: {
              style: 'multi+shift',
              selector: 'td:first-child'
          },

       
      
          columnDefs: [
                 {
                  orderable: false,
                  className: 'select-checkbox',
                  targets: 0,
                  render: function (data, type, row) {
                      return ''; // This ensures the select column remains empty
                  }
              },
              
              {
                    targets: -1, // Target the last column
                    className: 'noVis'
              },
              
              {
                  responsivePriority:2,
                  targets: [2, -1]
              },
              
              {
                  className: "white-space-nowrap text-start",
                  targets: '_all'
              },
          ],
          ajax: {
              type: 'GET',
              url: "<?php echo base_url() ?>api/User/showScheduleUsersList/",
              async: false,
              method: 'get',
              dataType: 'json',
              beforeSend: function (xhr) {
                  xhr.setRequestHeader('X-API-KEY', 'enachSyncWorks');
              },
              data: function (d) {
                  d.mandate_customer_id = mandate_customer_id; // Add the selected customer ID to the request
                  d.searchText = d.search.value;
                  return d;
              },
              dataSrc: function (response) {

                  var totalAmount = 0;
                  var totalTransactions = 0;
                  var successfulAmount = 0;
                  var successfulCount = 0;
                  var remainingAmount = 0;
                  var remainingCount = 0;
                  var failedCount = 0;
                  var failedAmount = 0;
                  var skippedCount = 0;
                  var skippedAmount = 0;
                  var insufficientCount = 0;
                  var insufficientAmount = 0;
                  var canceledAmount = 0;
                  var initiatedEMICount = 0;
                  var initiatedEMIAmount = 0;


                  var count_rows    =    response.count_row; 

                  if(count_rows){
                    nextEMIDebitDate  =  formatDateToDMY(count_rows.next_emi_debit_date);   
                    totalAmount= count_rows.total_transaction_amount;
                    totalTransactions= count_rows.total_transactions;
                    successfulAmount= count_rows.total_successful_amount;
                    successfulCount= count_rows.total_successful_count;
                    remainingAmount= count_rows.total_remaining_amount;
                    remainingCount= count_rows.total_remaining_count;
                    failedCount= count_rows.total_failed_transactions;
                    failedAmount= count_rows.total_failed_transaction_amount;
                    skippedCount= count_rows.total_skipped_transactions;
                    skippedAmount= count_rows.total_skipped_transaction_amount;
                    insufficientCount= count_rows.total_emi_bounced_count;
                    insufficientAmount= count_rows.total_emi_bounced_amount;
                    canceledAmount = count_rows.canceled_amount;
                    initiatedEMICount = count_rows.total_initiatedEMICount;
                    initiatedEMIAmount = count_rows.total_initiatedEMIAmount;

                  }

                  var progressPercentage = (successfulAmount / totalAmount) * 100;
                  var progressCountPercentage = (successfulCount / totalTransactions) * 100;
                  // var initiatedPercentage = ()
               
                  // Update the width of the progress bar
                  $('#successProgress').css('width', progressPercentage + '%').attr('aria-valuenow', progressPercentage);
                  $('#successCountProgress').css('width', progressCountPercentage + '%').attr('aria-valuenow', progressCountPercentage);

                  // $('#initiatedEMIProgress').css('width', progressPercentage + '%').attr('aria-valuenow', progressPercentage);

              
                  // Update the successful amount placeholder
                  $('#successfulAmountPlaceholder').text(Intl.NumberFormat('en-IN').format(successfulAmount));
                  $('#successfulAmountPlaceholder1').text(Intl.NumberFormat('en-IN').format(successfulAmount));
                  $('#successfulCountPlaceholder1').text(Intl.NumberFormat('en-IN').format(successfulCount));
                  $('#successfulCountPlaceholder').text(Intl.NumberFormat('en-IN').format(successfulCount));
                  $('#remainingAmountPlaceholder').text(Intl.NumberFormat('en-IN').format(remainingAmount));
                  $('#remainingCountPlaceholder').text(Intl.NumberFormat('en-IN').format(remainingCount));
                  $('#failedCountPlaceholder').text(Intl.NumberFormat('en-IN').format(failedCount));
                  $('#failedAmountPlaceholder').text(Intl.NumberFormat('en-IN').format(failedAmount));
                  $('#skippedCountPlaceholder').text(Intl.NumberFormat('en-IN').format(skippedCount));
                  $('#skippedAmountPlaceholder').text(Intl.NumberFormat('en-IN').format(skippedAmount));
                  $('#insufficientCountPlaceholder').text(Intl.NumberFormat('en-IN').format(insufficientCount));
                  $('#insufficientAmountPlaceholder').text(Intl.NumberFormat('en-IN').format(insufficientAmount));
                  $('#totalAmountPlaceholder').text(Intl.NumberFormat('en-IN').format(totalAmount));
                  $('#totalCountPlaceholder').text(Intl.NumberFormat('en-IN').format(totalTransactions));
                  $('#totalSchedule').text(Intl.NumberFormat('en-IN').format(totalTransactions));
                  $('#initiatedEMICountPlaceholder').text(Intl.NumberFormat('en-IN').format(initiatedEMICount));
                  $('#initiatedEMIAmountCountPlaceholder').text(Intl.NumberFormat('en-IN').format(initiatedEMIAmount));



                

                  $('#nextEMIDebitDate').text(nextEMIDebitDate);
                  if (count_rows.next_emi_debit_date == null)
                  {
                     $("#emiDivCard").hide();
                     $('#mandateCardDiv').show(); 
                     $('#amtCanceled').text('₹ '+ Intl.NumberFormat('en-IN').format(canceledAmount));

                  }

                  return response.data;
              
              },
              
              error: function (error) {
                  toastr.error("Mandates does not found");
              }

          },
          columns: [
              {
                data: null
              },

              {
                  data: null,
                  render: function (data, type, row, meta) {
                      return meta.row + meta.settings._iDisplayStart + 1; // Increment index by 1 to display serial number
                  }
              },

              { data: 'mts_datetime', name: 'mandate_transaction_schedule.mts_datetime',   
                                  render: function(data, type, row) {
                                  return formatDateToDMY(data);
                              }
              },
             
              { data: 'mts_amount', name: 'mandate_transaction_schedule.mts_amount',
                  render: function(data, type, row) {
                    return "₹ "+ Intl.NumberFormat('en-IN').format(data);
                  }
              },
        
              {
                  data: 'mts_status_message',
                  name: 'mandate_transaction_schedule.mts_status_message',
                  orderable: false,
                  render: function (data, type, row) {
                      var bgcolor = 'badge-phoenix-primary';
                      // var statusText = 'Not Scheduled';

                      if (row.mts_is_skipped == "1") {
                          bgcolor = 'badge-phoenix-warning';
                          status_display = 'Skipped';
                      } else {
                          if (data === "I") {
                              bgcolor = 'badge-phoenix-info';
                              status_display = 'Initiate';
                          } else if (data === "S") {
                              bgcolor = 'badge-phoenix-success';
                              status_display = 'Sucess';
                          } else if (data === "F" || data=="A") {
                              bgcolor = 'badge-phoenix-danger';
                              status_display = 'Failure';
                          } else if (data === "C") {
                              bgcolor = 'badge-phoenix-danger';
                              status_display = 'Canceled';
                          } 
                          else {
                              bgcolor = 'badge-phoenix-primary';
                              status_display ='Not Scheduled'
                          }
                      }
                      return '<div class="badge badge-phoenix fs--2 ' + bgcolor + '"><span class="fw-bold">' + status_display + '</span></div>';

                  }
              },
             
              { data: 'mts_message', name: 'mandate_transaction_schedule.mts_message', orderable: false },
             
              { data: 'mts_skipped_reason', name: 'mandate_transaction_schedule.mts_skipped_reason', orderable: false },
             
              { data: 'mts_skip_transaction_id', name: 'mandate_transaction_schedule.mts_skip_transaction_id', orderable: false },
             
              {
                  data: null,
                  orderable: false,
                  render: function (data, type, row) {
                      var html = '';

                      if (row.mts_status_message =="C") {
                        $('#btnBulkSkip').hide();

                      }else{


                      <?php if (in_array('updateMandate', $user_permission) || in_array('viewMandate', $user_permission) || in_array('deleteMandate', $user_permission)): ?>
                      html += '<div class="position-relative">';
                      html += '<div class="hover-actions">';
                      
                      <?php if(in_array('skipMandate', $user_permission)):?>
   
                      if (row.mts_status_message != "I" && row.mts_status_message != "S" && row.mts_status_message != "F" && row.mts_status_message != "A" && row.mts_has_cancelled != '1' && row.mts_status_message !="C") {
                          if (row.mts_is_skipped == 0 ) {
                              html += '<a class="btn btn-sm btn-phoenix-warning me-1 fs--2 item-skipSchedule" data="' + row.mts_id + '" mts_skipped_reason="' + row.mts_skipped_reason + '" mts_skip_transaction_id="' + row.mts_skip_transaction_id + '" href="javascript:;"><span class="fa fa-step-forward" id="skipButton"></span></a>';
                          } else {
                              html += '<a class="btn btn-sm btn-phoenix-warning me-1 fs--2 item-skipSchedule" data="' + row.mts_id + '" mts_skipped_reason="' + row.mts_skipped_reason + '" mts_skip_transaction_id="' + row.mts_skip_transaction_id + '" href="javascript:;"><span class="fa fa-step-forward" id="skipButton"></span>Edit Skip</a>';
                          }
                      }
                      
                      <?php endif; ?>
                    
                      if (row.mts_is_skipped == 0 && row.mts_is_already_scheduled == 1) {

                          html += '<a class="btn btn-sm btn-phoenix-success me-1 fs--2 item-verifyTransactionSchedule" data="' + row.mts_id + '" merchant_ID="' + row.merchant_ID + '" consumer_ID="' + row.consumer_ID + '" href="javascript:;"><span class="uil-comment-verify" id="verifyScheduleButton"></span></a>';
                       
                       }

                      html += '</div>';
                      html += '</div>';
                      html += '<div class="font-sans-serif btn-reveal-trigger position-static">';
                      html += '<button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs--2" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--2"></span></button>';
                      html += '<div class="dropdown-menu dropdown-menu-end py-2">';

                      <?php if(in_array('skipMandate', $user_permission)):?>
                    
                      if (row.mts_status_message != "I" && row.mts_status_message != "S" && row.mts_status_message != "F" && row.mts_status_message != "A" && row.mts_has_cancelled !== 1 && row.mts_status_message !="C") {
                          if (row.mts_is_skipped == 0) {
                              html += '<a class="dropdown-item item-skipSchedule" data="' + row.mts_id + '" mts_skipped_reason="' + row.mts_skipped_reason + '" mts_skip_transaction_id="' + row.mts_skip_transaction_id + '" href="javascript:;"><span class="fa fa-step-forward mr-2" style="margin-right: 8px;" id="skipButton"></span>Skip</a>';
                          } else {
                              html += '<a class="dropdown-item item-skipSchedule" data="' + row.mts_id + '" mts_skipped_reason="' + row.mts_skipped_reason + '" mts_skip_transaction_id="' + row.mts_skip_transaction_id + '" href="javascript:;"><span class="fa fa-step-forward mr-2" style="margin-right: 8px;" id="skipButton"></span>Edit Skip</a>';
                          }
                      }

                      <?php endif; ?>
                      
                      if (row.mts_is_skipped == 0 && row.mts_is_already_scheduled == 1 && row.mts_has_cancelled !== 1) {
                      
                           html += '<a class="dropdown-item item-verifyTransactionSchedule" data="' + row.mts_id + '" merchant_ID="' + row.merchant_ID + '" consumer_ID="' + row.consumer_ID + '" href="javascript:;"><span class="uil-comment-verify mr-2" style="margin-right: 8px;" id="verifyScheduleButton"></span>Verify Schedule</a>';
                      }

                      html += '</div>';
                      html += '</div>';
                      <?php endif; ?>
                      }
                      return html;
                  }
              }
          ],

           rowCallback: function (row, data, index) {
                <?php if(in_array('skipMandate', $user_permission)) {?>

                  if (data.mts_status_message == "I" || data.mts_status_message == "S" || data.mts_status_message == "F" || data.mts_is_skipped == 1 || data.mts_status_message == "A") {
                       $('td.select-checkbox', row).removeClass('select-checkbox');
                  }

                 <?php } else { ?>
                     $('td.select-checkbox', row).removeClass('select-checkbox');
                <?php } ?>
                    
              },

      });
  }


// Edit
function updateDocument(mandateCustomerId) {
    // Get the mandate customer ID from the input field
    // var mandateCustomerId = $('input[name="mandate_customer_id"]').val();
 //   console.log("Mandate Customer ID:", mandateCustomerId);

    // Retrieve the uploaded file
    var uploadedFile = $("#fileInput")[0].files[0];
    
    // Create a FormData object to send data
    var formData = new FormData();
    formData.append('mandate_customer_id', mandateCustomerId);
    formData.append('document', uploadedFile);

    // Perform AJAX request
    $.ajax({
        type: 'POST',
        url: "<?php echo base_url()?>api/User/documentupdate",
        data: formData,
        processData: false,
        contentType: false,
        beforeSend: function(xhr) {
            xhr.setRequestHeader('X-API-KEY', 'enachSyncWorks');
        },
        success: function(response) {
            showUsersData();
       //     console.log("Success:", response);
            $('#editDocumentModal').modal('hide');
            toastr.success('Document updated successfully');

        },
        error: function(xhr, status, error) {
       //     console.error('Error updating data:', error);
        }
    });
}


// Event handler for the delete button in the delete document modal
$('#confirmDeleteDocumentBtn').on('click', function(){
    var mandateCustomerId = $(this).data('mandate-customer-id');
 
  $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>api/User/documentdelete/' + mandateCustomerId,
        data: {'mandate_customer_id': mandateCustomerId}, // Pass the correct parameter name

    dataType: 'json',
        beforeSend: function(xhr) {
          xhr.setRequestHeader('X-API-KEY', 'enachSyncWorks');
        },

    success: function (response) {
            $('#deleteDocumentModal').modal('hide');
            toastr.success(response.message);
            // Optionally, update your UI or perform any other action after successful deletion
        },
        error: function(xhr, status, error) {
            $('#deleteDocumentModal').modal('hide');
            toastr.error('Error deleting document: ' + error);
        }
    });
});

                    
// Click event handler for viewing document
$('.view-document-btn').on('click', function() {
    var documentUrl = $(this).data('document');
    window.open(documentUrl, '_blank');
});



     $('#skipModalBulk').on('click', '#skipTransactionBulk', function(){ 


          var mts_skipped_reason_bulk      = $('textarea[name=mts_skipped_reason_bulk]').val();
          var mts_skip_transaction_id_bulk = $('input[name=mts_skip_transaction_id_bulk]').val();
          var afterresult=false;


          for (var i = 0; i < selectedTransactions.length; i++) {
              var mts_id_bulk = selectedTransactions[i];
        //      console.log("mts_id_bulk: ", mts_id_bulk);

              if(skipTransaction(mts_skipped_reason_bulk,mts_skip_transaction_id_bulk,mts_id_bulk)){
                afterresult=true;
              }
          
          }

          selectedTransactions=[];

          $('#skipModalBulk').modal('hide');
          $('#skipBulkTransactionForm')[0].reset();  

          if(afterresult){
              toastr.success("Transaction Bulk Skip Successful.");
          } 

     });


     $('#userData').on('click', '.item-verifyTransactionSchedule', function(){ 
       var mts_id = $(this).attr('data');
       var merchant_ID = $(this).attr('merchant_ID');
       var consumer_ID = $(this).attr('consumer_ID')
       var payment_dateTime='';
        $.ajax({
            type: 'ajax',
            method: 'get',
            url: '<?php echo base_url(); ?>api/User/getTransactionScheduleRow',
            data:{'mts_id': mts_id,'merchant_ID':merchant_ID,'consumer_ID':consumer_ID},  
            async: false,
            dataType: 'json',
            beforeSend: function(xhr) {
                xhr.setRequestHeader('X-API-KEY','enachSyncWorks');
            },
            success: function(response){
             
               if(response.status){
                  
                  toastr.success(response.message);
                 
               }

            },
              error: function(response){
                   var data =JSON.parse(response.responseText);
                   toastr.error(data.message);
            }
        });

  });

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

          // alert(leadInterestTypeId);
          $.ajax({

          type: 'GET',
          url: "<?php echo base_url()?>api/User/exportscheduleDetails",
          data:{'columnProperties':columnProperties,'searchText':searchText,'mandate_customer_id':mandate_customer_id},
          dataType: 'json',
          beforeSend: function(xhr) {
            xhr.setRequestHeader('X-API-KEY', 'enachSyncWorks');
          },

          success: function (response) {
          var transaction_details = response.data;
          // exportDataToExcel(data);

          // var serialNumber = (page - 1) * 10 + 1;
                    var html="";
                      var tbt="";
                      var i ="";
                      for (var i = 0; i < transaction_details.length; i++) {
                          var x=i+1;
                          //  var x = serialNumber++;
                        var bgcolor='badge-phoenix-primary';

                          if(transaction_details[i].mts_status_message=="S"){
                            bgcolor='badge-phoenix-success';
                          }

                          if(transaction_details[i].mts_status_message=="F"  || transaction_details[i].mts_status_message == "A"){
                            bgcolor='badge-phoenix-danger';
                          }
                          if(transaction_details[i].mts_status_message=="I"){
                              bgcolor='badge-phoenix-warning';
                          }

                        

                          html+='<tr>';


                                html+='<td class="order py-2  ps-3 align-middle white-space-nowrap srno"><a class="fw-semi-bold" href="#">#'+x+' </a></td>'+
                                        
                                    '<td class="align-middle ps-3">'+transaction_details[i].mts_datetime+'</td>'+
                                    '<td class="align-middle ps-3">'+transaction_details[i].mts_amount+'</td>';
                                    

                                    if(transaction_details[i].mts_is_skipped=="0"){

                                      var color="";
                                      
                                      if(transaction_details[i].mts_status_message=="I"){
                                          html+='<td class="align-middle ps-3 amount"><span class="badge badge-phoenix badge-phoenix-info">Initiated</span></td>';
                                        }
                                        else if(transaction_details[i].mts_status_message=="S"){
                                          html+='<td class="align-middle ps-3 amount"><span class="badge badge-phoenix badge-phoenix-success">Success</span></td>';
                                        }
                                        else if(transaction_details[i].mts_status_message=="F" || transaction_details[i].mts_status_message=="A"){
                                          html+='<td class="align-middle ps-3 amount"><span class="badge badge-phoenix badge-phoenix-danger">Failure</span></td>';
                                        }else if(transaction_details[i].mts_status_message=="C"){
                                          html+='<td class="align-middle ps-3 amount"><span class="badge badge-phoenix badge-phoenix-danger">Canceled</span></td>';
                                        }
                                        else{
                                          html+='<td class="align-middle ps-3 amount"><span class="badge badge-phoenix badge-phoenix-primary">Not Scheduled</span></td>';
                                        }
                                    }
                                  
                                  else{
                                    html+='<td class="align-middle ps-3 amount"><span class="badge badge-phoenix badge-phoenix-warning">Skipped</span></td>';
                                  }
                                    html+='<td class="align-middle ps-3">'+transaction_details[i].mts_message+'</td>';
                                    if(transaction_details[i].mts_skipped_reason){
                                      html+='<td class="align-middle ps-3 amount">'+transaction_details[i].mts_skipped_reason+'</td>';
                                    }
                                    else{
                                      html+='<td class="align-middle ps-3 amount"></td>';
                                    }

                                    if(transaction_details[i].mts_skip_transaction_id){
                                      html+='<td class="align-middle ps-3 amount">'+transaction_details[i].mts_skip_transaction_id+'</td>';
                                    }
                                    else{
                                      html+='<td class="align-middle ps-3 amount"></td>';
                                    }
                                    
                                  
                             

                                  html+='</tr>';

                      }
              $('#showReportResultexcel').html(html);

              const dateC = new Date();
              let dayC = dateC.getDate();
              let monthC = dateC.getMonth() + 1;
              let yearC = dateC.getFullYear();
              let currentDateC = `${dayC}-${monthC}-${yearC}`;

              var table = document.getElementById('reporttableexcel');
              var sheetData = XLSX.utils.table_to_sheet(table, {raw: true}); // Ensure raw: true is set to avoid encoding issues
              var wb = XLSX.utils.book_new();
              XLSX.utils.book_append_sheet(wb, sheetData, 'Sheet1');

              var wbout = XLSX.write(wb, {bookType: 'xlsx', type: 'binary'});

              function s2ab(s) {
                  var buf = new ArrayBuffer(s.length);
                  var view = new Uint8Array(buf);
                  for (var i = 0; i < s.length; i++) view[i] = s.charCodeAt(i) & 0xFF;
                  return buf;
              }

              var blob = new Blob([s2ab(wbout)], {type: "application/octet-stream"});
              var link = document.createElement('a');
              link.href = URL.createObjectURL(blob);
              link.download = 'Mandate-Customers-' + currentDateC + '.xlsx';
              document.body.appendChild(link);
              link.click();
              document.body.removeChild(link);
          
          },
          error: function (error) {
          console.error('Error fetching data:', error);

          }
          });
          }



$('#btnMandateCancel').on('click', function() {
    
    var mandateCustomerId = '<?php echo $mandate_customer_id?>';

    $.ajax({
        type: 'get',
        url: '<?php echo base_url(); ?>api/User/mandateToBeCancel/',
        data: {'mandate_customer_id': mandateCustomerId}, // Pass the correct parameter name
        dataType: 'json',
        beforeSend: function(xhr) {
          xhr.setRequestHeader('X-API-KEY', 'enachSyncWorks');
        },
        
        success: function (response) {
            var html = '';
            var mandatesData = response.data;
            
            // Variables to store total EMI and amount
            var totalEmi = mandatesData.length;
            var totalEmiAmount = 0;
            var emiAmount = mandatesData[0].mts_amount;

            // Clear the table body
            $('#mandateDataToBeCancel').empty();

            // Loop through the mandates to calculate total EMI amount and build table rows
            $.each(mandatesData, function(index, mandate) {
                // Convert `mts_datetime` into a Date object
                var dateObj = new Date(mandate.mts_datetime);
                
                // Format the date as `dd-mm-yyyy`
                var formattedDate = ("0" + dateObj.getDate()).slice(-2) + "-"
                                  + ("0" + (dateObj.getMonth() + 1)).slice(-2) + "-"
                                  + dateObj.getFullYear();
                
                // Add the EMI amount to the total
                totalEmiAmount += parseFloat(mandate.mts_amount);

                // Create a new row
                html += `<tr>
                            <td style="padding: 0;"> ${index + 1}</td>
                            <td style="padding: 0;">${formattedDate}</td>
                            <td style="padding: 0;">${mandate.mts_amount}</td>
                         </tr>`;
            });

            // Append the generated HTML rows to the table
            $('#mandateDataToBeCancel').html(html);


            // Update the UI to display the total EMI and total EMI amount
            $('#totalEMI').text( totalEmi); // Total EMI
            $('#emiAmount').text( emiAmount); // EMI Amount
            $('#totalEmiAmount').text( totalEmiAmount.toFixed(2)); // Total EMI Amount


            // Show the modal
            $('#MandateCancelModal').modal('show');
        },
        error: function(xhr, status, error) {
              html ='';
              $('#mandateDataToBeCancel').html(html);
              toastr.error('Mandates has been Canceled already');
        }
    });


      $('#btnMandateTobeCancelled').unbind().click(function(){
          $('#MandateCancelModal').modal('hide');
          $('#MandateCancelConfrimModal').modal('show');                            
      });

      $('#btnMandateConfirmCancel').unbind().click(function(){
        $.ajax({
            type: 'ajax',
            method: 'POST',
            async: false,
            url: '<?php echo base_url(); ?>api/User/cancelMandateOfCustomer/',
            data: {
              'mandateCustomerId': mandateCustomerId
            },
            dataType: 'json',
            beforeSend: function(xhr) {
              xhr.setRequestHeader('X-API-KEY', 'enachSyncWorks');
            },
            success: function(response)
            {
                // $('#MandateCancelConfrimModal').modal('hide');
             

                toastr.success(response.message);


               $('#MandateCancelConfrimModal').find('.modal-title').text('Download Excel-Sheet');
                  
                $('#mandateExcelDownload').html('<a href="<?php echo base_url('Users/cancelMandateSheetDownload/') ?>' + mandateCustomerId + '" class="btn btn-outline-success btn-sm me-1 mb-1" ><i class="fa-solid fa-download"></i>  Download Excel-Sheet</a>');


                $('#btnMandateConfirmCancel').hide();
                $('#btnClose').html('Close'); 


            },
            error: function() 
            {            
              $('#MandateCancelConfrimModal').modal('hide');
              toastr.error(response.message);
            }
        });

    });




});



</script>        

<script>
  $(document).ready(function(){
    // Retrieve active tab from localStorage on page load
    var activeTabId = localStorage.getItem('activeTab');
    if (!activeTabId) {
      activeTabId = 'orders-tab'; // Default to first tab if no active tab is stored
    }

    // Add "active" class to the default tab
    $('#' + activeTabId).addClass('active');

    // Ensure nav-underline is fixed on the first tab
    $('#orders-tab').addClass('active');
    $('.nav-underline').addClass('fixed-on-first');

    // Function to store active tab ID in localStorage
    $('.nav-link').on('click', function(){
      localStorage.setItem('activeTab', 'orders-tab'); // Always store first tab ID
      // Remove underline from other tabs when a tab is clicked
      $('.nav-link').not(this).removeClass('active');
    });

    // Function to add/remove fixed-on-first class based on scroll position
    $(window).on('scroll', function() {
      var scrollTop = $(window).scrollTop();
      var navHeight = $('.navbar').height(); // Adjust this if you have a different nav height
      if (scrollTop >= navHeight) {
        $('.nav-underline').removeClass('fixed-on-first');
      } else {
        $('.nav-underline').addClass('fixed-on-first');
      }
    });
  });


   $('.dropdown-menu').on('click', function(event) {
        event.stopPropagation(); // Stop click event propagation
    });


    // Event delegation to handle click event for edit button
    $('#documentAction').on('click', '.item-updateDocument', function() {
        var mandateCustomerId = $(this).data('mandate-customer-id');
        $('#editDocumentModal').modal('show');
      //  console.log('Document response1: ' + mandateCustomerId);

        // Event listener for updating the document
        $('#updateDocumentBtn').off('click').on('click', function() {
            updateDocument(mandateCustomerId);
        });
    });

    // Delete
    $('#documentAction').on('click', '.item-deleteDocument', function(){

        var mandateCustomerId = $(this).data('mandate-customer-id');

        // Set the ID in the modal button
        $('#confirmDeleteDocumentBtn').data('mandate-customer-id', mandateCustomerId);

        // Show the delete document modal
        $('#deleteDocumentModal').modal('show');
    });
 
</script>
