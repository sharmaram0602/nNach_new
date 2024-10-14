

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
        <div class="row g-4">
          <div class="col-12 col-xxl-6">
            <div class=" fw-bold">
              <h4>Dashboard</h4>
            </div>
          </div>
        </div>
 <?php if(in_array('viewDashboard', $user_permission)):?>
          <div class="row g-2" data-sortable='{"group":"example","animation":150}' id="sortable-div">

            <div class="col-md-6 col-xl-6 col-xxl-6 col-sm-12 sortable-item-wrapper" >
              <div class="card">
               <div class="card-header m-0  p-2 fw-bold">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-sm-12 col-md-4 col-lg-4  col-xl-4 col-xxl-4 align-items-start">
                          <span>Transactions Status Wise</span>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-4  col-xl-4 col-xxl-4 align-items-start">
                            <select class="form-select form-select-sm" name="filterMandateTransactionsAmountCount" id="filterMandateTransactionsAmountCount" onchange="showCountMandateTransactionCards();">
                              <option value="all">All</option>
                                  <option value="lastyear">Last Year</option>
                                  <option value="lastmonth">Last Month</option>
                                  <option value="lastweek">Last Week</option>

                                  <option value="yesterday">Yesterday</option>
                                  <option value="today" >Today</option>
                                  
                                  <option value="week">This Week</option>
                                  
                                  <option value="month">This Month</option>
                                  
                                  <option value="year" selected>This Year</option>
                                  <option value="customdate">Custom Date</option>
                            </select>
                        </div>

                        <div class="col-sm-12 col-md-4 col-lg-4  col-xl-4 col-xxl-4 d-none align-items-start"  id="divDateMandateTransactionsAmountCount">
                              <input class="form-control form-control-sm datetimepicker" id="filterCustomDateMandateTransactionsAmountCount" name="filterCustomDateMandateTransactionsAmountCount" type="text" placeholder="Select Date Range" data-options='{"mode":"range","dateFormat":"d/m/y"}'/>
                             

                        </div>
                    </div>
                </div>

                <div class="card-body p-2 m-0">
                
            
            <div class="row align-items-center flex-center">

              <div class="col-sm-12 col-md-12 col-xl-12 col-xxl-12 m-0 mb-2">
                <div class="card shadow">
                    <div class="bg-holder d-dark-none" style="background-image:url(<?php echo base_url('assets/img/bg/9.png');?>);background-position:left bottom;background-size:auto; transform: scaleX(-1);">
                    </div>
                    <!--/.bg-holder-->

                    <div class="bg-holder d-light-none" style="background-image:url(<?php echo base_url('assets/img/bg/9-dark.png');?>);background-position:left bottom;background-size:auto; transform: scaleX(-1);">
                    </div>

                  <div class="card-body  p-2 m-0">
                    <div class="d-flex d-sm-block justify-content-between">
                      <div class="border-bottom-sm mb-sm-2">
                        <div class="d-flex align-items-center">
                          <div class="d-flex align-items-center icon-wrapper-sm shadow-primary-100" style="transform: rotate(-7.45deg); "><span class="uil-rupee-sign text-primary fs-1 z-index-1 ms-2"></span></div>
                          <span class="text-900 fw-bold mb-0 ms-2 mt-3 flex-shrink-0 fs--1">Total</span>
                        </div>
                        <p class="text-primary mt-2 fs-1 fw-bold mb-0 mb-sm-2"><span class="fs-1 uil-rupee-sign lh-lg" id="totalTransactionsAmountCard">0</span></p>
                      </div>
                     <div class="row">
                       
                            <div class="col-md-6">
                               <span class="badge-phoenix badge-phoenix-primary fw-bold fs-0 mb-1 rounded" id="totalTransactionsCard">0</span>

                                <p class="mb-0 fs--1 text-700 fw-bold text-primary">Transactions</p>
                            </div>
                            
                           <!--   <div class="col-md-6">
                               <span class="badge-phoenix badge-phoenix-primary fw-bold fs-0 mb-1 rounded " id="totalMandatesCard">0</span>

                                <p  class="mb-0 fs--1 text-700 fw-bold text-primary">Mandates</p>
                            </div> -->
 
                         </div>

                    </div>
                  </div>
                </div>
              </div> 


              <div class="col-sm-12 col-md-6 col-xl-6 col-xxl-6  m-0 mb-2">
                <div class="card shadow">
                   <div class="bg-holder d-dark-none image-5" style="background-image:url(<?php echo base_url('assets/img/bg/9.png');?>);background-position:left bottom;background-size:auto;transform: scaleX(-1);">
                    </div>
                    <!--/.bg-holder-->

                    <div class="bg-holder d-light-none image-5" style="background-image:url(<?php echo base_url('assets/img/bg/9-dark.png');?>);background-position:left bottom;background-size:auto;transform: scaleX(-1);">
                    </div>
                  <div class="card-body p-2 m-0">


                  <div class="d-flex d-sm-block justify-content-between">

                      <div class="border-bottom-sm mb-sm-2">
                        <div class="d-flex align-items-center"> 
                         <div class="d-flex align-items-center icon-wrapper-sm shadow-warning-100 " style="transform: rotate(-7.45deg);"><span class="uil-rupee-sign text-warning fs-1 z-index-1 ms-2"></span></div>
                          <span class="text-900 fw-bold mb-0 ms-2 mt-3 flex-shrink-0  fs--1">Not Schedule</span>
                        </div>
                         <p class="text-warning mt-2 fs-1 fw-bold mb-0 mb-sm-2"><span class="fs-1 uil-rupee-sign lh-lg" id="notScheduledTransactionsAmountCard">0</span></p>
                      </div>
                      <div class="row">
                       
                            <div class="col-md-6">
                               <span class="badge-phoenix badge-phoenix-warning fw-bold fs-0 mb-1 rounded" id="notScheduledTransactionsCard">0</span >
                                <p class="mb-0 fs--1 text-500 fw-bold text-warning">Transactions</p>
                            </div>
                            
                            <div class="col-md-6">
                               <span class="badge-phoenix badge-phoenix-warning fw-bold fs-0 mb-1 rounded " id="notScheduledMandatesCard">
                                 0
                               </span>
                                <p  class="mb-0 fs--1 text-700 fw-bold text-warning">Mandates</p>
                            </div>
                      </div>
                    </div>

                  </div>

                </div>
              </div>


               <div class="col-sm-12 col-md-6 col-xl-6 col-xxl-6  m-0 mb-2 ps-0">
                <div class="card shadow">
                   <div class="bg-holder d-dark-none image-2" style="background-image:url(<?php echo base_url('assets/img/bg/9.png');?>);background-position:left bottom;background-size:auto;transform: scaleX(-1);">
                    </div>
                    <!--/.bg-holder-->

                    <div class="bg-holder d-light-none image-2" style="background-image:url(<?php echo base_url('assets/img/bg/9-dark.png');?>);background-position:left bottom;background-size:auto;transform: scaleX(-1);">
                    </div>
                  <div class="card-body p-2 m-0">
                    <div class="d-flex d-sm-block justify-content-between">
                      <div class="border-bottom-sm mb-sm-2">
                        <div class="d-flex align-items-center">
                          <div class="d-flex align-items-center icon-wrapper-sm shadow-success-100" style="transform: rotate(-7.45deg); "><span class="uil-rupee-sign text-success fs-1 z-index-1 ms-2"></span></div>
                          <span class="text-900 fw-bold mb-0 ms-2 mt-3 flex-shrink-0  fs--1">Success</span>
                        </div>
                        <p class="text-success mt-2 fs-1 fw-bold mb-0 mb-sm-2"><span class="fs-1 uil-rupee-sign lh-lg" id="successTransactionsAmountCard">0</span></p>
                      </div>
                     
                      <div class="row">
                       
                            <div class="col-md-6">
                               <span class="badge-phoenix badge-phoenix-success fw-bold fs-0 mb-1 rounded" id="successTransactionsCard">0</span >
                                <p class="mb-0 fs--1 text-700 fw-bold text-success">Transactions</p>
                            </div>
                            
                            <div class="col-md-6">
                               <span class="badge-phoenix badge-phoenix-success fw-bold fs-0 mb-1 rounded " id="successMandatesCard">0</span >
                                <p  class="mb-0 fs--1 text-700 fw-bold text-success">Mandates</p>
                            </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-sm-12 col-md-6 col-xl-6 col-xxl-6 ">
                <div class="card shadow">
                  <div class="bg-holder d-dark-none image-3" style="background-image:url(<?php echo base_url('assets/img/bg/9.png');?>);background-position:left bottom;background-size:auto; transform: scaleX(-1);">
                    </div>
                    <!--/.bg-holder-->

                    <div class="bg-holder d-light-none image-3" style="background-image:url(<?php echo base_url('assets/img/bg/9-dark.png');?>);background-position:left bottom;background-size:auto; transform: scaleX(-1);">
                    </div>
                      <div class="card-body  p-2 m-0">
                        <div class="d-flex d-sm-block justify-content-between">
                          <div class="border-bottom-sm mb-sm-2">
                            <div class="d-flex align-items-center">
                              <div class="d-flex align-items-center icon-wrapper-sm shadow-info-100" style="transform: rotate(-7.45deg); "><span class="uil-rupee-sign text-info fs-1 z-index-1 ms-2"></span></div>
                              <span class="text-900 fw-bold mb-0 ms-2 mt-3 flex-shrink-0  fs--1">Initiated</span>
                            </div>
                            <p class="text-info mt-2 fs-1 fw-bold mb-0 mb-sm-2"><span class="fs-1 uil-rupee-sign lh-lg" id="initiatedTransactionsAmountCard">0</span></p>
                          </div>
                          <div class="row">
                       
                            <div class="col-md-6">
                               <span class="badge-phoenix badge-phoenix-info fw-bold fs-0 mb-1 rounded " id="initiatedTransactionsCard">0</span >
                                <p class="mb-0 fs--1 text-700 fw-bold text-info">Transactions</p>
                            </div>
                            
                            <div class="col-md-6">
                               <span class="badge-phoenix badge-phoenix-info fw-bold fs-0 mb-1 rounded " id="initiatedMandatesCard">0</span >
                                <p  class="mb-0 fs--1 text-700 fw-bold text-info">Mandates</p>
                            </div>
                         </div>
                        </div>
                      </div>
                </div>
              </div>

              <div class="col-sm-12 col-md-6 col-xl-6 col-xxl-6  ps-0">
                <div class="card shadow">
                    <div class="bg-holder d-dark-none image-4" style="background-image:url(<?php echo base_url('assets/img/bg/9.png');?>);background-position:left bottom;background-size:auto; transform: scaleX(-1);">
                    </div>
                    <!--/.bg-holder-->

                    <div class="bg-holder d-light-none image-4" style="background-image:url(<?php echo base_url('assets/img/bg/9-dark.png');?>);background-position:left bottom;background-size:auto; transform: scaleX(-1);">
                    </div>

                  <div class="card-body  p-2 m-0">
                    <div class="d-flex d-sm-block justify-content-between">
                      <div class="border-bottom-sm mb-sm-2">
                        <div class="d-flex align-items-center">
                          <div class="d-flex align-items-center icon-wrapper-sm shadow-danger-100" style="transform: rotate(-7.45deg); "><span class="uil-rupee-sign text-danger fs-1 z-index-1 ms-2"></span></div>
                          <span class="text-900 fw-bold mb-0 ms-2 mt-3 flex-shrink-0  fs--1">Failed</span>
                        </div>
                        <p class="text-danger mt-2 fs-1 fw-bold mb-0 mb-sm-2"><span class="fs-1 uil-rupee-sign lh-lg" id="failedTransactionsAmountCard">0</span></p>
                      </div>
                     <div class="row">
                       
                            <div class="col-md-6">
                               <span class="badge-phoenix badge-phoenix-danger fw-bold fs-0 mb-1 rounded " id="failedTransactionsCard">0</span >
                                <p class="mb-0 fs--1 text-700 fw-bold text-danger">Transactions</p>
                            </div>
                            
                            <div class="col-md-6">
                               <span class="badge-phoenix badge-phoenix-danger fw-bold fs-0 mb-1 rounded " id="failedMandatesCard">0</span >
                                <p  class="mb-0 fs--1 text-700 fw-bold text-danger">Mandates</p>
                            </div>
                         </div>

                    </div>
                  </div>
                </div>
              </div> 
 
             </div>
               </div></div>
            </div>
            
            <div class="col-md-6 col-xl-6 col-xxl-6 col-sm-12 sortable-item-wrapper">
                 <div class="card m-0 p-2">

                 <div class="card-header m-0 p-0 p-2 fw-bold">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-sm-12 col-md-4 col-lg-4  col-xl-4 col-xxl-4 align-items-start"><span>Mandates</span></div>
                        <div class="col-sm-12 col-md-4 col-lg-4  col-xl-4 col-xxl-4 align-items-start">
                            <select class="form-select form-select-sm" style="height: auto;" id="filterMandateCount" name="filterMandateCount"  onchange="showCountMandateCards();">
                                  <option value="all">All</option>
                                  <option value="lastyear">Last Year</option>
                                  <option value="lastmonth">Last Month</option>
                                  <option value="lastweek">Last Week</option>

                                  <option value="yesterday">Yesterday</option>
                                  <option value="today" >Today</option>
                                  
                                  <option value="week">This Week</option>
                                  
                                  <option value="month">This Month</option>
                                  
                                  <option value="year" selected>This Year</option>
                                  <option value="customdate">Custom Date</option>
                            </select>
                        </div>

                        <div class="col-sm-12 col-md-4 col-lg-4  col-xl-4 col-xxl-4 d-none align-items-start"  id="divDateMandateCount">
                              <input class="form-control form-control-sm datetimepicker" id="filterCustomDateMandateCount" name="filterCustomDateMandateCount" type="text" placeholder="Select Date Range" data-options='{"mode":"range","dateFormat":"d/m/y"}'/>
                             

                        </div>

                    </div>
                </div>
                 <div class="card-body p-2 m-0">
                 
                    <!-- <p class="text-700">Payment received across all channels</p> -->
                    <div class="row g-2">
                      <div class="col-6 col-xl-6  border-1">
                        <div class="d-flex flex-column flex-center align-items-sm-start flex-md-column justify-content-md-between flex-xxl-column p-3 ps-sm-3 ps-md-4 p-md-3 h-100  border border-1">
                          <div class="d-flex align-items-center mb-1"><span class="fa-solid fa-square fs-0 me-2 text-primary" data-fa-transform="up-2"></span><span class="mb-0 fs--1 text-900">Total</span></div>
                           <h4 class="fw-bold ms-xl-0 ms-xxl-0 pe-md-0 pe-xxl-0" id="totalMandateCard">0</h4>
                        </div>

                      </div>
                     
                      <div class="col-6 col-xl-6 border-1">
                        <div class="d-flex flex-column flex-center align-items-sm-start flex-md-column justify-content-md-between flex-xxl-column p-3 ps-sm-3 ps-md-4 p-md-3 h-100  border border-1">
                          <div class="d-flex align-items-center mb-1"><span class="fa-solid fa-square fs-0 me-2 text-warning" data-fa-transform="up-2"></span><span class="mb-0 fs--1 text-900">Aborted</span></div>
                           <h4 class="fw-bold ms-xl-0 ms-xxl-0 pe-md-0 pe-xxl-0" id="userAbortedMandateCard">0</h4>
                        </div>
                      </div>
                       <div class="col-6 col-xl-6 border-1">
                        <div class="d-flex flex-column flex-center align-items-sm-start flex-md-column justify-content-md-between flex-xxl-column p-3 ps-sm-3 ps-md-4 p-md-3 h-100  border border-1">
                          <div class="d-flex align-items-center mb-1"><span class="fa-solid fa-square fs-0 me-2 text-success" data-fa-transform="up-2"></span><span class="mb-0 fs--1 text-900">Success</span></div>
                           <h4 class="fw-bold ms-xl-0 ms-xxl-0 pe-md-0 pe-xxl-0" id="successMandateCard">0</h4>
                        </div>
                      </div>
                   
                      <div class="col-6 col-xl-6">
                        <div class="d-flex flex-column flex-center align-items-sm-start flex-md-column justify-content-md-between flex-xxl-column p-3 ps-sm-3 ps-md-4 p-md-3 h-100 border border-1">
                          <div class="d-flex align-items-center mb-1"><span class="fa-solid fa-square fs-0 me-2 text-danger" data-fa-transform="up-2"></span><span class="mb-0 fs--1 text-900">Failed</span></div>
                           <h4 class="fw-bold ms-xl-0 ms-xxl-0 pe-md-0 pe-xxl-0" id="failedMandateCard">0</h4>
                        </div>
                      </div>
                    </div>
                
                </div>
               </div>

                 <div class="card mt-2">
                <div class="card-body">
                  <div class="row g-4 g-xl-1 g-xxl-3 justify-content-between">
                  <div class="border-bottom-sm">

                        <div class="col-sm-auto">
                            <div class="d-sm-block d-inline-flex d-md-flex flex-xl-column flex-xxl-row align-items-center align-items-xl-start align-items-xxl-center">
                            <span class="fw-bold">Skipped Transaction</span>
                              <div>
                                  <span class="fw-bold"><span class="uil uil-rupee-sign"></span><span class="fw-bold" id="skippedAmountPlaceholder">0</span></span>
                              </div>
                            </div>
                        </div>

                      </div>
                        <div class="row mt-2">
                       
                            <div class="col-md-6">
                               <span class="badge-phoenix badge-phoenix-secondary fw-bold fs-0 rounded" id="skippedCountPlaceholder">0</span >
                                <p class="mb-0 fs--1 text-500 fw-bold text-secondary">Transactions</p>
                            </div>
                            
                            <div class="col-md-6">
                               <span class="badge-phoenix badge-phoenix-secondary fw-bold fs-0  rounded " id="skippedMandateCountPlaceholder">
                                 0
                               </span>
                                <p  class="mb-0 fs--1 text-700 fw-bold text-secondary">Mandates</p>
                            </div>
                      </div>
                   <!--  <div class="col-auto justify-content-start">
                    <span>Total Skipped Transactions</span>
                    </div>
                    <div class="col-auto justify-content-end">
                    <span class="fw-bold" id="skippedCountPlaceholder">0</span>
                    </div>
                     <div class="col-auto justify-content-start">
                    <span>Total Skipped Mandates</span>
                    </div>
                    <div class="col-auto justify-content-end">
                    <span class="fw-bold" id="skippedMandateCountPlaceholder">0</span>
                    </div>
                   -->
                  </div>
                </div>

              </div>
              <div class="card mt-2 p-0">
                <div class="card-body">
                  <div class="row g-4 g-xl-1 g-xxl-3 justify-content-between">
                  <div class="border-bottom-sm">

                        <div class="col-sm-auto">
                            <div class="d-sm-block d-inline-flex d-md-flex flex-xl-column flex-xxl-row align-items-center align-items-xl-start align-items-xxl-center">
                            <span class="fw-bold">Pending / Canceled Mandates</span>
                              <div>
                                  <!-- <span class="fw-bold"><span class="uil uil-rupee-sign"></span><span class="fw-bold" id="skippedAmountPlaceholder">0</span></span> -->
                              </div>
                            </div>
                        </div>

                      </div>
                        <div class="col-sm-12">
                        <div class="row">
                       <div class="col-sm-12 col-md-6 col-xl-6 col-xxl-6  m-0 mb-2">
                                <div class="card shadow">
                                  <div class="card-body p-2 m-0">
                                  <div class="d-flex d-sm-block justify-content-between">
                                  <div class="border-bottom-sm mb-sm-2">
                                    <div class="d-flex align-items-center"> 
                                     <div class="d-flex align-items-center icon-wrapper-sm shadow-danger-100 " style="transform: rotate(-7.45deg);"><span class="uil-rupee-sign text-danger fs-1 z-index-1 ms-2"></span></div>
                                      <span class="text-900 fw-bold mb-0 ms-2 mt-3 flex-shrink-0  fs--1">Canceled</span>
                                    </div>
                                     <p class="text-danger mt-2 fs-1 fw-bold mb-0 mb-sm-2"><span class="fs-1 uil-rupee-sign lh-lg" id="TotalCanceledMandateAmount">0</span></p>
                                  </div>
                              <div class="row">
                                <div class="col-md-6">
                                   <span class="badge-phoenix badge-phoenix-danger fw-bold fs-0 mb-1 rounded " id="TotalCanceledMandateCount">
                                     0
                                   </span>
                                    <p  class="mb-0 fs--1 text-700 fw-bold text-danger">Mandates</p>
                                </div>
                              </div>
                          </div>
                      </div>
                    </div>
                  </div>

                    <div class="col-sm-12 col-md-6 col-xl-6 col-xxl-6  m-0 mb-4">
                      <div class="card shadow">
                        <div class="card-body p-2 m-0">
                        <div class="d-flex d-sm-block justify-content-between">
                            <div class="border-bottom-sm mb-sm-2">
                              <div class="d-flex align-items-center"> 
                               <div class="d-flex align-items-center icon-wrapper-sm shadow-warning-100 " style="transform: rotate(-7.45deg);"><span class="uil-rupee-sign text-warning fs-1 z-index-1 ms-2"></span></div>
                                <span class="text-900 fw-bold mb-0 ms-2 mt-3 flex-shrink-0  fs--1">Pending</span>
                              </div>
                               <p class="text-warning mt-2 fs-1 fw-bold mb-0 mb-sm-2"><span class="fs-1 uil-rupee-sign lh-lg" id=""></span></p>
                            </div>
                            <div class="row">  
                                  <div class="col-md-6">
                                     <span class="badge-phoenix badge-phoenix-warning fw-bold fs-0 mb-1 rounded " id="pendingMandateCount">
                                       0
                                     </span>
                                      <p  class="mb-0 fs--1 text-700 fw-bold text-warning">Pending</p>
                                  </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    </div>
                      </div>
                 
                  </div>
                </div>
                
              </div>
            </div>



            <div class="col-md-12 col-xl-12 col-xxl-12 col-sm-12 sortable-item-wrapper ">
               <div class="card">
                  <div class="card-header card-header m-0 p-2 fw-bold">
                      <div class="row justify-content-between align-items-center">
                          <div class="col-auto"><span>Transactions</span></div>
                       
                          <div class="col-auto">
                              <div class="row">
                               
                                <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-xxl-6 m-0 mr-1  w-auto" >
                                      <select class="form-select form-select-sm" name="filterTransactionsBarLineCount" id="filterTransactionsBarLineCount">
                                          <option value="lastyear">Last Year</option>
                                          <option value="lastmonth">Last Month</option>
                                          <option value="lastweek">Last Week</option>

                                          <option value="yesterday">Yesterday</option>
                                          <option value="today" >Today</option>
                                          
                                          <option value="week">This Week</option>
                                          
                                          <option value="month">This Month</option>
                                          
                                          <option value="year" selected>This Year</option>
                                      </select>
                                </div>
                               <!--  <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-xxl-6 m-0 mr-1 w-auto" > 
                                    <select class="form-select form-select-sm"  name="filterTransactionsBarLineAmountNoOfChangeCount" id="filterTransactionsBarLineAmountNoOfChangeCount">
                                      <option value="noOfTransactions" selected>No.of Tranasctions</option>
                                      <option value="transactionAmount">Transaction Amount</option>
                                    </select>
                                </div> -->
                              </div>
                               


                            
                          </div>
                      </div>
                  </div>
                  <div class="card-body m-0 p-2 monthly-mandates-transactions" style="min-height: 485px;"></div>

               </div>  
               <!-- <div class="echart-bar-line-mixed-chart-example h-100 p-1 m-0"></div>   -->
            </div>

<!--            <div class="col-md-12 col-xl-12 col-xxl-12 col-sm-12 sortable-item-wrapper">
               <div class="card daily-mandates-transactions h-100  m-0 p-2" style="min-height: 400px;"></div>  
            </div>
 -->            
             
          
         <div class="col-md-6 col-xl-6 col-xxl-6 col-sm-12 sortable-item-wrapper">
                 <div class="card m-0 p-2">

                 <div class="card-header m-0  p-2 fw-bold">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-auto"><span>Mandate Compare</span></div>
                        <div class="col-auto">
                           
                            <select class="form-select form-select-sm" id="MandateCountCompareFilter" 
                                name="MandateCountCompareFilter" onchange="showMandateCompare();">
                                <option value="yesterdayVsToday" selected>Yesterday vs Today</option>
                                <option value="lastVsThisWeek">Last vs This Week</option>
                                <option value="lastVsThisMonth">Last vs This month</option>
                                <option value="lastVsThisYear">Last vs This Year</option>
                            </select>
                       
                        </div>
                    </div>
                </div>
                <div class="card-body p-2 m-0">
                   
                   <div class="row g-2">
                      <div class="col-6 col-xl-6  h-100">
                          <div class="m-1 p-2 border border-1">
                               <p class="align-items-center flex-center d-flex fw-bold" id="MandateCompareTitle_1">Yesterday</p>
                               <div class="table-responsive">
                                 
                               <table class="table table-bordered table-sm">
                                <thead>
                                  <tr>
                                    <!-- <th scope="col"></th> -->
                                    <td scope="col" class="fw-bold fs--1">Status</td>
                                    <td scope="col" class="fw-bold fs--1">Total</td>
                                  </tr>
                                </thead>
                                <tbody>
                                  
                                  <tr>
                                    <td class="fw-bold fs--1"><span class="d-inline-block bg-primary bullet-item me-1 mx-1"></span>Total</td>
                                    <td class="fw-bold fs--1" id="totalMandateCompare_1">0</td>
                                  </tr>
                                  
                                  <tr>
                                    <td class="fw-bold fs--1" scope="row">
                                        <span class="d-inline-block bg-success bullet-item me-1 mx-1"></span>Success
                                    </td>
                                    <td class="fw-bold fs--1" id="successMandateCompare_1">0</td>
                                  </tr>

                              
                                  <tr>
                                    <td class="fw-bold fs--1" scope="row">
                                      <span class="d-inline-block bg-warning bullet-item me-1 mx-1"></span>Aborted
                                    </td>
                                    <td class="fw-bold fs--1" id="userAbortedMandateCompare_1">0</td>
                                  </tr>

                                  <tr>
                                    <td class="fw-bold fs--1" scope="row">
                                      <span class="d-inline-block bg-danger bullet-item me-1 mx-1"></span>Failed
                                    </td>
                                    <td class="fw-bold fs--1" id="failedMandateCompare_1">0</td>
                                  </tr>
                                 
                                </tbody>
                              
                              </table>
                             </div>
                          </div>
                         
                          

                      </div>
                     
                        <div class="col-6 col-xl-6 h-100">
                          <div class="m-1 p-2 border border-1">
                               <p class="align-items-center flex-center d-flex fw-bold" id="MandateCompareTitle_2">Today</p>
                                <div class="table-responsive"> 
                                  <table class="table table-bordered table-sm">
                                    <thead>
                                      <tr>
                                        <!-- <th scope="col"></th> -->
                                        <td scope="col"  class="fw-bold fs--1">Status</td>
                                        <td scope="col"  class="fw-bold fs--1">Total</td>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      
                                      <tr>
                                        <td class="fw-bold fs--1"><span class="d-inline-block bg-primary bullet-item me-1 mx-1"></span>Total</td>
                                        <td class="fw-bold fs--1" id="totalMandateCompare_2">0</td>
                                      </tr>
                                      
                                      <tr>
                                        <td class="fw-bold fs--1" scope="row">
                                            <span class="d-inline-block bg-success bullet-item me-1 mx-1"></span>Success
                                        </td>
                                        <td class="fw-bold fs--1" id="successMandateCompare_2">0</td>
                                      </tr>

                                      <tr>
                                        <td class="fw-bold fs--1" scope="row">
                                          <span class="d-inline-block bg-warning bullet-item me-1 mx-1"></span>Aborted
                                        </td>
                                        <td class="fw-bold fs--1" id="userAbortedMandateCompare_2">0</td>
                                      </tr>

                                      <tr>
                                        <td class="fw-bold fs--1" scope="row">
                                          <span class="d-inline-block bg-danger bullet-item me-1 mx-1"></span>Failed
                                        </td>
                                        <td class="fw-bold fs--1" id="failedMandateCompare_2">0</td>
                                      </tr>
                                     
                                    </tbody>
                              
                              </table>
                               </div>
                          </div>
                         
                      </div>
                    
                    </div>

                 </div>
               </div>

            </div>

              <div class="col-md-6 col-xl-6 col-xxl-6 col-sm-12 sortable-item-wrapper">
                 <div class="card m-0 p-2">

                 <div class="card-header m-0 p-0 p-2 fw-bold">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-auto"><span>Transaction Compare</span></div>
                        <div class="col-auto">
                            <select class="form-select form-select-sm"  id="TransactionCountCompareFilter" 
                                name="TransactionCountCompareFilter" onchange="showTransactionCompare();">
                                <option value="yesterdayVsToday" selected>Yesterday vs Today</option>
                                <option value="lastVsThisWeek">Last vs This Week</option>
                                <option value="lastVsThisMonth">Last vs This month</option>
                                <option value="lastVsThisYear">Last vs This Year</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="card-body p-2 m-0">
                   
                   <div class="row g-2">
                      <div class="col-6 col-xl-6  h-100">
                          <div class="m-1 p-2 border border-1">
                               <p class="align-items-center flex-center d-flex fw-bold" id="TransactionCompareTitle_1">Yesterday</p>
                               <div class="table-responsive">
                               <table class="table table-bordered table-sm">
                                <thead>
                                  <tr>
                                    <!-- <th scope="col"></th> -->
                                    <th scope="col"  class="fw-bold fs--1">Status</th>
                                    <th scope="col"  class="fw-bold fs--1">Total</th>
                                    <th scope="col"  class="fw-bold fs--1">Amount</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  
                                  <tr>
                                    <td class="fw-bold fs--1"><span class="d-inline-block bg-primary bullet-item me-1 mx-1"></span>Total</td>
                                    <td class="fw-bold fs--1" id="totalTransactionCompare_1">0</td>
                                    <td class="fw-bold fs--1" id="totalTransactionAmountCompare_1">0</td>
                                  </tr>
                                  
                                  <tr>
                                    <td class="fw-bold fs--1" scope="row">
                                        <span class="d-inline-block bg-success bullet-item me-1 mx-1"></span>Success
                                    </td>
                                    <td class="fw-bold fs--1" id="successTransactionCompare_1">0</td>
                                    <td class="fw-bold fs--1" id="successTransactionAmountCompare_1">0</td>
                                  </tr>

                                  <tr>
                                    <td class="fw-bold fs--1" scope="row">
                                        <span class="d-inline-block bg-info bullet-item me-1 mx-1"></span>Initiated
                                    </td>
                                    <td class="fw-bold fs--1" id="initiatedTransactionCompare_1">0</td>
                                    <td class="fw-bold fs--1" id="initiatedTransactionAmountCompare_1">0</td>
                                  </tr>

                                  <tr>
                                    <td class="fw-bold fs--1" scope="row">
                                      <span class="d-inline-block bg-warning bullet-item me-1 mx-1"></span>Not Scheduled
                                    </td>
                                    <td class="fw-bold fs--1" id="notScheduledTransactionCompare_1">0</td>
                                    <td class="fw-bold fs--1" id="notScheduledTransactionAmountCompare_1">0</td>
                                  </tr>

                                  <tr>
                                    <td class="fw-bold fs--1" scope="row">
                                      <span class="d-inline-block bg-danger bullet-item me-1 mx-1"></span>Failed
                                    </td>
                                    <td class="fw-bold fs--1" id="failedTransactionCompare_1">0</td>
                                    <td class="fw-bold fs--1" id="failedTransactionAmountCompare_1">0</td>
                                  </tr>
                                 
                                </tbody>
                              
                              </table>
                            </div>
                          </div>
                         
                          

                      </div>
                     
                        <div class="col-6 col-xl-6 h-100">
                          <div class="m-1 p-2 border border-1">
                               <p class="align-items-center flex-center d-flex fw-bold" id="TransactionCompareTitle_2">Today</p>
                               <div class="table-responsive">
                                 <table class="table table-bordered table-sm">
                                <thead>
                                  <tr>
                                    <!-- <th scope="col"></th> -->
                                    <th scope="col"  class="fw-bold fs--1">Status</th>
                                    <th scope="col"  class="fw-bold fs--1">Total</th>
                                    <th scope="col"  class="fw-bold fs--1">Amount</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  
                                  <tr>
                                    <td class="fw-bold fs--1"><span class="d-inline-block bg-primary bullet-item me-1 mx-1"></span>Total</td>
                                    <td class="fw-bold fs--1" id="totalTransactionCompare_2">0</td>
                                    <td class="fw-bold fs--1" id="totalTransactionAmountCompare_2">0</td>
                                  </tr>
                                  
                                  <tr>
                                    <td class="fw-bold fs--1" scope="row">
                                        <span class="d-inline-block bg-success bullet-item me-1 mx-1"></span>Success
                                    </td>
                                    <td class="fw-bold fs--1" id="successTransactionCompare_2">0</td>
                                    <td class="fw-bold fs--1" id="successTransactionAmountCompare_2">0</td>
                                  </tr>

                                  <tr>
                                    <td class="fw-bold fs--1" scope="row">
                                        <span class="d-inline-block bg-info bullet-item me-1 mx-1"></span>Initiated
                                    </td>
                                    <td class="fw-bold fs--1" id="initiatedTransactionCompare_2">0</td>
                                    <td class="fw-bold fs--1" id="initiatedTransactionAmountCompare_2">0</td>
                                  </tr>

                                  <tr>
                                    <td class="fw-bold fs--1" scope="row">
                                      <span class="d-inline-block bg-warning bullet-item me-1 mx-1"></span>Not Scheduled
                                    </td>
                                    <td class="fw-bold fs--1" id="notScheduledTransactionCompare_2">0</td>
                                    <td class="fw-bold fs--1" id="notScheduledTransactionAmountCompare_2">0</td>
                                  </tr>

                                  <tr>
                                    <td class="fw-bold fs--1" scope="row">
                                      <span class="d-inline-block bg-danger bullet-item me-1 mx-1"></span>Failed
                                    </td>
                                    <td class="fw-bold fs--1" id="failedTransactionCompare_2">0</td>
                                    <td class="fw-bold fs--1" id="failedTransactionAmountCompare_2">0</td>
                                  </tr>
                                 
                                </tbody>
                              
                              </table>
                               </div>
                          </div>
                         
                          

                      </div>
                    
                    </div>

                 </div>
               </div>

            </div>

              
        <div class="col-md-6 col-xl-6 col-xxl-6 col-sm-12 sortable-item-wrapper"></div>
        
          <div class="col-md-12 col-xl-12 col-xxl-12 col-sm-12 sortable-item-wrapper">
            
            <div class="card m-0 p-2 h-100">
                <div class="card-header  m-0  p-2 fw-bold">
                          <div class="d-flex flex-wrap gap-3">
                            <div class="search-box input-group">
                                <input class="form-control search-input" type="text" placeholder="Search" aria-label="Recipient's username" aria-describedby="basic-addon2" id="searchTextCustomer" name="searchTextCustomer"/>
                                <span class="fas fa-search search-box-icon"></span> 
                                
                            </div>
                        

                            <div class="scrollbar overflow-hidden-y">

                              <div class="btn-group position-static" role="group">

                                 
                                 <div class="btn-group position-static text-nowrap dropdown">
                                  <button class="btn btn-sm btn-phoenix-secondary  flex-shrink-0" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"  data-bs-auto-close="true"><span class="text-capitalize" id="transaction_date_filter_title">Date</span>
                                    <span class="fas fa-angle-down ms-2"></span></button>
                                  <ul class="dropdown-menu scrollbar overflow-hidden-y h-50" id="transaction_date_filter">
                                 
                                   <li onclick="changeTransactionDate('yesterday');">
                                      <div class="dropdown-item">
                                     
                                         <label class="form-check-label" for="yesterday">Yesterday</label>
                                     
                                     </div>
                                   </li>

                                   <li onclick="changeTransactionDate('today');">
                                      <div class="dropdown-item">
                                     
                                     
                                         <label class="form-check-label" for="today">Today</label>
                                     
                                     </div>
                                   </li>

                                   <li onclick="changeTransactionDate('tomorrow');">
                                      <div class="dropdown-item">
                                       
                                         <label class="form-check-label" for="tomorrow">Tomorrow</label>
                                     
                                     </div>
                                   </li>
                                   <li onclick="changeTransactionDate('week');">
                                      <div class="dropdown-item">
                                     
                                      
                                         <label class="form-check-label" for="week">This Week</label>
                                     
                                     </div>
                                   </li>
                                   <li onclick="changeTransactionDate('month');">
                                      <div class="dropdown-item">
                                     
                                      
                                         <label class="form-check-label" for="month">This Month</label>
                                     
                                     </div>
                                   </li>
                                  
                                  </ul>
                                </div>
                             
                               
                                <div class="btn-group position-static text-nowrap">
                                  <button class="btn  btn-phoenix-secondary  flex-shrink-0" type="button" data-bs-toggle="dropdown"     data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent" data-bs-auto-close="true">
                                    Branch<span id="branchFilterCount"></span><span class="fas fa-angle-down ms-2"></span></button>
                                    <ul class="dropdown-menu scrollbar overflow-hidden-y h-50" id="branch_id_filter">
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
                                  <button class="btn btn-sm btn-phoenix-secondary  flex-shrink-0" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"  data-bs-auto-close="true">
                                    Status<span id="statusFilterCount"></span><span class="fas fa-angle-down ms-2"></span></button>
                                  <ul class="dropdown-menu scrollbar overflow-hidden-y h-50" id="status_filter">
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


                                  </ul>
                                </div>


                                <div class="btn-group position-static text-nowrap dropdown">
                                  <button class="btn btn-sm btn-phoenix-secondary  flex-shrink-0" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"  data-bs-auto-close="true"><i class="fas fa-filter"></i> More<span class="fas fa-angle-down ms-2"></span></button>
                                    <ul class="dropdown-menu scrollbar overflow-hidden-y h-50" id="more_filter">
                                       
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
                                               <input class="form-check-input" type="checkbox" value="debitDateFilter" id="debitDateFilter"  onchange="handleCheckboxChange('debitDateFilter', 'debitDateFilterValue')">
                                               <label class="form-check-label" for="debitDateFilter">Debit Date</label>
                                               <div id="debitDateFilterValue" class="d-none">
                                                 
                                                  <div class="form-check  m-1">

                                                    <input class="form-check-input" id="emiDebitDateFilterFixed" type="radio" name="emiDebitDateFilter" value="fixedFilterDebitDate" onchange="handleEMIDebitDateOptionChange(this.value)"/>

                                                    <label class="form-check-label" for="emiDebitDateFilterFixed">Fixed</label>
                                                  </div>
                                                  <div class="form-check  m-1">

                                                    <input class="form-check-input" id="emiDebitDateFilterBetween" type="radio" name="emiDebitDateFilter"  value="betweenFilterDebitDate"    onchange="handleEMIDebitDateOptionChange(this.value)"/>

                                                    <label class="form-check-label" for="emiDebitDateFilterBetween">Between</label>
                                                  </div>
                                                   <div class="form-check  m-1">

                                                    <input class="form-check-input" id="emiDebitDateFilterLessThan" type="radio" name="emiDebitDateFilter" value="lessThanFilterDebitDate"     onchange="handleEMIDebitDateOptionChange(this.value)"/>

                                                    <label class="form-check-label" for="emiDebitDateFilterLessThan">Less Than</label>
                                                  </div>
                                                   <div class="form-check  m-1">

                                                    <input class="form-check-input" id="emiDebitDateFiltergreaterThan" type="radio" name="emiDebitDateFilter" value="greaterThanFilterDebitDate"    onchange="handleEMIDebitDateOptionChange(this.value)"/>

                                                    <label class="form-check-label" for="emiDebitDateFiltergreaterThan">Greater Than</label>
                                                  </div>

                                               </div>

                                               <div id="emiDebitDateInputContainer" class="dropdown-item d-none">
                                                 
                                                     <input class="form-control datetimepicker mt-1" id="emiDebitDateInput" type="text" placeholder="dd/mm/yyyy" data-options='{dateFormat":"d/m/Y"}'/>
                                                </div>
                                                <div id="emiDebitDateRangeInputContainer" class="dropdown-item d-none">
                                                    <div class="row">
                                                      <div class="col">
                                                     <label class="form-label">From Date</label>  
                                                  

                                                     <input class="form-control datetimepicker mt-1" id="emiDebitDateFromInput" type="text" placeholder="dd/mm/yyyy" data-options='{dateFormat":"d/m/Y"}'/>
                                                  </div>
                                                   <div class="col">
                                                    <label class="form-label">To Date</label>  
                                                    
                                                     <input class="form-control datetimepicker mt-1" id="emiDebitDateToInput" type="text" placeholder="dd/mm/yyyy" data-options='{dateFormat":"d/m/Y"}'/>
                                                     </div>
                                                 </div>
                                                </div>


                                            </div>
                                        </li>

                                  
                                    </ul>
                                </div>

                              </div>
                            </div>



                          </div>
                </div>

                <div class="card-body p-2 m-0">
                  
                  <div class="table-responsive mx-1 px-1">
                      <table class="table mb-0 fs--1 compact table-hover w-100" id="dataTableTransaction" >
                      
                        <thead>
                            <tr> 
                                <th class="white-space-nowrap border-top">Sr No.</th>
                                <th class="white-space-nowrap border-top">Name</th>
                                <th class="white-space-nowrap border-top">Phone</th>
                                <th class="white-space-nowrap border-top">Branch</th>
                                <th class="white-space-nowrap border-top">Amount</th>
                                <th class="white-space-nowrap border-top">Status</th>
                                <th class="white-space-nowrap border-top">Reason/Message</th>
                                <th class="white-space-nowrap border-top">Debit Date</th>
                                <th class="white-space-nowrap border-top">Account</th>  
                                <th class="white-space-nowrap border-top">Added By</th>  
                                <th class="white-space-nowrap border-top">Loan Type</th>  
                             
                              </tr>
                          </thead>

                          <tbody class="list" id="transactionDataMandate">

                          </tbody>

                        </table>

                    </div>
                </div>
              
            </div>

          </div>




        <table class="table table-striped table-sm fs--1 mb-0 d-none" id="reporttableexcel">

     <thead>
                    <tr> 
                        <th class="white-space-nowrap border-top">Sr No.</th>
                        <th class="white-space-nowrap border-top">Name</th>
                        <th class="white-space-nowrap border-top">Phone</th>
                        <th class="white-space-nowrap border-top">Branch</th>
                        <th class="white-space-nowrap border-top">Amount</th>
                        <th class="white-space-nowrap border-top">Status</th>
                        <th class="white-space-nowrap border-top">Reason/Message</th>
                        <th class="white-space-nowrap border-top">Debit Date</th>
                        <th class="white-space-nowrap border-top">Account</th>  
                        <th class="white-space-nowrap border-top">Added By</th>  
                        <th class="white-space-nowrap border-top">Loan Type</th>  
                     
                      </tr>
                    </thead>
                    <tbody class="list" id="showReportResultexcel">

                    </tbody>

            </table>

            <?php endif; ?>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.4/xlsx.full.min.js"></script>
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>    


<script>
  var transactionBarLineXAxisData=[];
  var transactionBarLineTotalAmount = [];
  var transactionBarLineSuccessAmount = [];
  var transactionBarLineFailAmount = [];
  var transactionBarLineInitiatedAmount = [];
  var transactionBarLineNotScheduledAmount = [];

  var transactionBarLineTotalTransactions = [];
  var transactionBarLineSuccessTransactions = [];
  var transactionBarLineFailTransactions = [];
  var transactionBarLineInitiatedTransactions = [];
  var transactionBarLineNotScheduledTransactions = [];

  var transactionBarLineTotalMandates= [];
  var transactionBarLineNotScheduledMandates= [];
  var transactionBarLineSuccessMandates= [];
  var transactionBarLineInitiatedMandates= [];
  var transactionBarLineFailMandates= [];
  document.addEventListener("DOMContentLoaded", function() {
  
   

    var amountFilterType='';
    var amountInputVal=0;
    var amountFromInputVal=0;
    var amountToInputVal=0;
    var mandateDebitDateFilterType = '';
    var mandateDebitDateInputVal = null;
    var mandateDebitDateFromInputVal = null;
    var mandateDebitDateToInputVal = null;
          

    var filterTransactionsBarLineCount='';
    var filterTransactionsBarLineAmountNoOfChangeCount='';
    var transactionDateFilter='month';

    <?php if(in_array('viewDashboard', $user_permission)):?>
      showCountTransactionBarLine();

     showTransactionTableData(transactionDateFilter);
    <?php endif; ?>
 });


$(document).ready(function(){
  var searchTerm;
 
  
  var toDateTransactionMandateCard;
  var fromDateTransactionMandateCard;

  var toDateMandateCard;
  var fromDateMandateCard;
   <?php if(in_array('viewDashboard', $user_permission)):?> 
  showBranchData();

  showCountMandateTransactionCards(toDateTransactionMandateCard,fromDateTransactionMandateCard);
  showCountMandateCards(toDateMandateCard,fromDateMandateCard);

  showMandateCompare();
  showSkippedTransactionCountCards();

  showTransactionCompare();
  <?php endif; ?>


    var searchBranchInput = document.getElementById('searchBranchFilter');
    var searchStatusInput = document.getElementById('searchStatusFilter');

     var filterBranchItems = document.querySelectorAll('#branch_id_filter .dropdown-item');
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

     var filterStatusItems = document.querySelectorAll('#status_filter .dropdown-item');

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

       $('#clearBranchFilter').click(function(){
          $("input[name='branch_mandate_filter']:checked").prop("checked", false);
          branchFilterChange();
       });

       $('#clearStatusFilter').click(function(){
          $("input[name='status_mandate_filter']:checked").prop("checked", false);
          statusFilterChange();
       });

        $('#clearMoreFilter').click(function(){

              $("#emiDebitDateInput").val("");
              $("#emiDebitDateFromInput").val("");
              $("#emiDebitDateToInput").val("");
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
            
              $("#debitDateFilter").prop("checked", false);
             
              
              $("input[name='amountFilter']:checked").prop("checked", false);
            
              $("input[name='emiDebitDateFilter']:checked").prop("checked", false);
            
              handleCheckboxChange('customerNameFilter', 'customerNameFilterValue');
              handleCheckboxChange('phoneFilter', 'phoneFilterValue');
              handleCheckboxChange('amountFilter', 'amountFilterValue');
           
              handleCheckboxChange('debitDateFilter', 'debitDateFilterValue');
           

              customerNameFilterInput.value='';
              phoneFilterInput.value='';
           
              
              amountFromInput.value='';
              amountToInput.value='';
              amountInput.value='';
            
              mandateDebitDateInput.value='';
              mandateDebitDateFromInput.value='';
              mandateDebitDateToInput.value='';

           });


       function branchFilterChange(){
          
           var branch_mandate_filter = $('input:checkbox[name="branch_mandate_filter"]:checked').map(function() {
               return '^' + this.value + '$';
            }).get().join('|');

           dataTable.column('bank_branches.branch_name:name').search(branch_mandate_filter, true).draw(); // Set regex flag to true
            var branchFilterCount = $('input:checkbox[name="branch_mandate_filter"]:checked').length;
           $('#branchFilterCount').html('('+branchFilterCount+')');

       }

      function statusFilterChange(){
         
           var status_mandate_filter = $('input:checkbox[name="status_mandate_filter"]:checked').map(function() {
          
                 if(this.value=="F"){
                   return '^F$|^A$';
                  }
                  else{
                       return '^' + this.value + '$';
                  }
           
             
           }).get().join('|');
           
           
           dataTable.column('mandate_transaction_schedule.mts_status_message:name').search(status_mandate_filter, true).draw(); 
           var statusFilterCount = $('input:checkbox[name="status_mandate_filter"]:checked').length;
           $('#statusFilterCount').html('('+statusFilterCount+')');

       }

      $("input[name='branch_mandate_filter']").change(function () { 
       
              branchFilterChange();
       
       });
      
      $("input[name='status_mandate_filter']").change(function () { 

          statusFilterChange();

      });

      var customerNameFilterInput = document.getElementById('customerNameFilterInput');
      var phoneFilterInput = document.getElementById('phoneFilterInput');
      var amountFromInput = document.getElementById('amountFromInput');  
      var amountToInput = document.getElementById('amountToInput');  
      var amountInput = document.getElementById('amountInput');  
      var mandateDebitDateInput =$('#emiDebitDateInput');  
      var mandateDebitDateFromInput = $('#emiDebitDateFromInput');  
      var mandateDebitDateToInput = $('#emiDebitDateToInput');  
      
      // dataTable.column('mandate_customers.customer_name:name').search('', true).draw();
      // dataTable.column('mandate_customers.customer_mobile_no:name').search('', true).draw();
      // dataTable.column('mandate_customers.amount:name').search('', true).draw();
      // dataTable.column('mandate_customers.mandate_register_datetime:name').search('', true).draw();

      $("#customerNameFilter").prop("checked", false);
      
      $("#phoneFilter").prop("checked", false);
      $("#amountFilter").prop("checked", false);
       $("input[name='emiDebitDateFilter']:checked").prop("checked", false);
      handleCheckboxChange('customerNameFilter', 'customerNameFilterValue');
      handleCheckboxChange('phoneFilter', 'phoneFilterValue');
      handleCheckboxChange('amountFilter', 'amountFilterValue');
      handleCheckboxChange('debitDateFilter', 'debitDateFilterValue');
    
      customerNameFilterInput.value='';
      phoneFilterInput.value='';
      amountFromInput.value='';
      amountToInput.value='';
      amountInput.value='';
      mandateDebitDateInput.value='';
      mandateDebitDateFromInput.value='';
      mandateDebitDateToInput.value='';

      customerNameFilterInput.addEventListener('keyup', function () {
          // var customerNameColumnIndex = dataTable.column('mandate_customers.customer_name:name').index();
          
          dataTable.column('mandate_customers.customer_name:name').search(this.value, true).draw(); // Set regex flag to true
      });
       phoneFilterInput.addEventListener('keyup', function () {
          dataTable.column('mandate_customers.customer_mobile_no:name').search(this.value, true).draw(); // Set regex flag to true
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
      mandateDebitDateInput.change(function() {

          mandateDebitDateInputVal=mandateDebitDateInput.val();
          mandateDebitDateFromInputVal=null;
          mandateDebitDateToInputVal=null;
         
         mandateDebitDateFilterFunction(mandateDebitDateFilterType,mandateDebitDateInputVal,mandateDebitDateFromInputVal,mandateDebitDateToInputVal);
      });

      mandateDebitDateFromInput.change(function() {

          mandateDebitDateInputVal=null;
          mandateDebitDateFromInputVal=mandateDebitDateFromInput.val();
          mandateDebitDateToInputVal=mandateDebitDateToInput.val();
         
         mandateDebitDateFilterFunction(mandateDebitDateFilterType,mandateDebitDateInputVal,mandateDebitDateFromInputVal,mandateDebitDateToInputVal);
      });

      mandateDebitDateToInput.change(function() {

          mandateDebitDateInputVal=null;
          mandateDebitDateFromInputVal=mandateDebitDateFromInput.val();
          mandateDebitDateToInputVal=mandateDebitDateToInput.val();
         
         mandateDebitDateFilterFunction(mandateDebitDateFilterType,mandateDebitDateInputVal,mandateDebitDateFromInputVal,mandateDebitDateToInputVal);
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

       function mandateDebitDateFilterFunction (mandateDebitDateFilterType,fixedmandateDebitDate,fromDate,toDate){


            if(mandateDebitDateFilterType=="fixedFilterDebitDate"){

                dataTable.column('mandate_transaction_schedule.mts_datetime:name').search(fixedmandateDebitDate, true).draw();
            }

            if(mandateDebitDateFilterType=="lessThanFilterDebitDate"){

                dataTable.column('mandate_transaction_schedule.mts_datetime:name').search('<'+fixedmandateDebitDate, true).draw();
            }

            if(mandateDebitDateFilterType=="greaterThanFilterDebitDate"){

                dataTable.column('mandate_transaction_schedule.mts_datetime:name').search('>'+fixedmandateDebitDate, true).draw();
            }

            if(mandateDebitDateFilterType=="betweenFilterDebitDate"){
                
                dataTable.column('mandate_transaction_schedule.mts_datetime:name').search(fromDate+'between'+toDate, true).draw();

            }
        
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
          
           
            if(checkboxId=="debitDateFilter"){
              emiDebitDateInputContainer.classList.add("d-none");
              emiDebitDateRangeInputContainer.classList.add("d-none");
            }
      }
  }

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
 function handleEMIDebitDateOptionChange(type) {

        mandateDebitDateFilterType = type;

        mandateDebitDateInputVal = null;
        mandateDebitDateFromInputVal = null;
        mandateDebitDateToInputVal = null;

        var fixedOption = document.getElementById("emiDebitDateFilterFixed");
        var betweenOption = document.getElementById("emiDebitDateFilterBetween");
        var lessThanOption = document.getElementById("emiDebitDateFilterLessThan");
        var greaterThanOption = document.getElementById("emiDebitDateFiltergreaterThan");

        var emiDebitDateInputContainer = document.getElementById("emiDebitDateInputContainer");
        var emiDebitDateRangeInputContainer = document.getElementById("emiDebitDateRangeInputContainer");

        if (fixedOption.checked) {
            emiDebitDateInputContainer.classList.remove("d-none");
            emiDebitDateRangeInputContainer.classList.add("d-none");
        } else if (betweenOption.checked) {
            emiDebitDateInputContainer.classList.add("d-none");
            emiDebitDateRangeInputContainer.classList.remove("d-none");
        } else if (lessThanOption.checked || greaterThanOption.checked) {
            emiDebitDateInputContainer.classList.remove("d-none");
            emiDebitDateRangeInputContainer.classList.add("d-none");
        }
    }



function exportToExcel(transactionDateFilter) {
  
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

     // alert(leadInterestTypeId);
    $.ajax({

      type: 'GET',
      url: "<?php echo base_url()?>api/Dashboard2/exportTransactionDetails/",
      data:{'columnProperties':columnProperties,'searchText':searchText,'transactionDateFilter':transactionDateFilter},
      dataType: 'json',
          beforeSend: function(xhr) {
            xhr.setRequestHeader('X-API-KEY', 'enachSyncWorks');
          },

      success: function (response) {
        var data = response.data;
        // exportDataToExcel(data);
       
        // var serialNumber = (page - 1) * 10 + 1;
                    var html="";
                    var tbt="";
                    var i ="";
                    for (var i = 0; i < data.length; i++) {
                        var x=i+1;
                        //  var x = serialNumber++;
                       var bgcolor='badge-phoenix-primary';
                       if (data[i].mts_status_message === "S") {
                            bgcolor = 'badge-phoenix-success';
                            status_display ='Success';

                        } else if (data[i].mts_status_message === "F" || data[i].mts_status_message === "A") {
                            bgcolor = 'badge-phoenix-danger';
                            status_display ='Failure';
                        } 
                        else if (data[i].mts_status_message === "I") {
                            bgcolor = 'badge-phoenix-info';
                            status_display ='Initiated';
                        }
                        else {
                            bgcolor = 'badge-phoenix-warning';
                            status_display ='Not Scheduled'
                        }

                      
      
                       html+='<tr><td class="order py-2   align-middle white-space-nowrap srno"><a class="fw-semi-bold" href="#">'+x+' </a></td>'+
                                 '<td class="align-middle  customer_name">'+data[i].customer_name+'</td>'+
                                 '<td class="align-middle  customer_mobile_no">'+data[i].customer_mobile_no+'</td>'+
                                 '<td class="align-middle  branch_id">'+data[i].branch_name+'</td>'+
                                 '<td class="align-middle  amount">'+data[i].mts_amount+'</td>'+
                                 '<td class="align-middle  mts_status_message">'+status_display+'</td>'+
                                 '<td class="align-middle  mts_message">'+data[i].mts_message+'</td>'+
                                 '<td class="align-middle  mts_datetime">'+data[i].mts_datetime+'</td>'+
                                 '<td class="align-middle  account_no">'+data[i].account_no+'</td>'+
                                 '<td class="align-middle  name">'+data[i].name+'</td>'+
                                 '<td class="align-middle  loan_type_name">'+data[i].loan_type_name+'</td>';
                          
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





    //////////////////////////
      $('#searchTextCustomer').on('input', function() {

      
         searchTerm = $(this).val();
        dataTable.search(searchTerm).draw();
 
      });
      

    //////////////////////////
    function changeTransactionDate(transactionDateFilter) {
      transactionDateFilter=transactionDateFilter;
      $('#transaction_date_filter_title').html(transactionDateFilter);
      showTransactionTableData(transactionDateFilter);
    }



    ///////////////////////////////////////////////////////////////
    function formatDateToDMY(dateString) {
    const date = new Date(dateString);
    const day = date.getDate().toString().padStart(2, '0');
    const month = (date.getMonth() + 1).toString().padStart(2, '0'); // Months are zero-indexed
    const year = date.getFullYear();
    return `${day}-${month}-${year}`;
}
    function showTransactionTableData(transactionDateFilter) {


      // body...  
          if ($.fn.DataTable.isDataTable('#dataTableTransaction')) {
              $('#dataTableTransaction').DataTable().destroy();
          }

          dataTable =   $('#dataTableTransaction').DataTable({
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
                                     exportToExcel(transactionDateFilter);
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
                       'url': "<?php echo base_url() ?>api/Dashboard2/showTransactionsList/",
                       'data':{'transactionDateFilter':transactionDateFilter},
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
                             { data: 'customer_name',name:'mandate_customers.customer_name' },
                             { data: 'customer_mobile_no',name:'mandate_customers.customer_mobile_no', orderable: false},
                             { data: 'branch_name',name:'bank_branches.branch_name', orderable: false, },
                             { data: 'mts_amount',name:'mandate_transaction_schedule.mts_amount', orderable: false, },
                              { "data": 'mts_status_message',
                                name:'mandate_transaction_schedule.mts_status_message',     
                                orderable: false,
                                "render": function (data, type, row) {
                                       
                                        var bgcolor = 'badge-phoenix-primary';
                                        var status_display ='Not Scheduled';
                                        if (data === "S") {
                                            bgcolor = 'badge-phoenix-success';
                                            status_display ='Success';

                                        } else if (data === "F" || data == "A") {
                                            bgcolor = 'badge-phoenix-danger';
                                            status_display ='Failure';
                                        } 
                                        else if (data === "I") {
                                            bgcolor = 'badge-phoenix-info';
                                            status_display ='Initiated';
                                        }
                                        else {
                                            bgcolor = 'badge-phoenix-warning';
                                            status_display ='Not Scheduled'
                                        }
                                        return '<div class="badge badge-phoenix fs--2 ' + bgcolor + '"><span class="fw-bold">' + status_display + '</span></div>';
                                    }
                             }, 
                              { data: 'mts_message',name:'mandate_transaction_schedule.mts_message'},
                             { 
                            data: 'mts_datetime', 
                            name: 'mandate_transaction_schedule.mts_datetime', 
                            orderable: false,
                            render: function(data, type, row) {
                                return formatDateToDMY(data);
                            }
                        },
                            //  { data: 'mts_datetime',name:'mandate_transaction_schedule.mts_datetime', orderable: false, },
                             { data: 'account_no',name:'mandate_customers.account_no', orderable: false, },
                             { data: 'name',name:'users.name', orderable: false, },

                             { data: 'loan_type_name',name:'loan_types.loan_type_name', orderable: false, },
                      
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











///////////////////////////////////////////////////////////
    
     function showBranchData() {
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
  

  function showMandateCompare() {
         
         MandateCountCompareFilter=  $('select[name=MandateCountCompareFilter]').val();

         if(MandateCountCompareFilter=="yesterdayVsToday"){ 
            $("#MandateCompareTitle_1").html("Yesterday");
            $("#MandateCompareTitle_2").html("Today");
         } 

         else if(MandateCountCompareFilter=="lastVsThisWeek"){
            $("#MandateCompareTitle_1").html("Last Week");
            $("#MandateCompareTitle_2").html("This Week");
         }

         else if(MandateCountCompareFilter=="lastVsThisMonth"){
            $("#MandateCompareTitle_1").html("Last Month");
            $("#MandateCompareTitle_2").html("This Month");

         }

         else if(MandateCountCompareFilter=="lastVsThisYear"){
            $("#MandateCompareTitle_1").html("Last Year");
            $("#MandateCompareTitle_2").html("This Year");
         }


          $.ajax({
              type: 'ajax',
              url: "<?php echo base_url() ?>api/Dashboard2/showMandateCompare", // call the showBranchesOfBank API 
              async: false,
              data:{
                  'mandateCountCompareFilter': MandateCountCompareFilter,
              },  
              method:'get',
              dataType: 'json',
              beforeSend: function(xhr) {
                xhr.setRequestHeader('X-API-KEY','enachSyncWorks');
              },
               success: function(response) {
                  
                  var compare_1 =  response.compare_1;
                  var compare_2 =  response.compare_2;


                  var totalMandateCompare_1 = 0;
                  var successMandateCompare_1 = 0;
                  var userAbortedMandateCompare_1 = 0;
                  var failedMandateCompare_1 = 0; 


                  var totalMandateCompare_2 = 0;
                  var successMandateCompare_2 = 0;
                  var userAbortedMandateCompare_2 = 0;
                  var failedMandateCompare_2 = 0; 

                  if(response.status){
                  
                      if(compare_1){
                  
                        for (var i = 0; i < compare_1.length; i++) {
                          
                            if(compare_1[i].mandate_status_message=="failure"){
                               totalMandateCompare_1 +=  parseInt(compare_1[i].total_mandates);

                               failedMandateCompare_1 +=  parseInt(compare_1[i].total_mandates);
                            }

                            else if(compare_1[i].mandate_status_message=="User Aborted"){
                               totalMandateCompare_1 +=  parseInt(compare_1[i].total_mandates);

                              userAbortedMandateCompare_1 +=  parseInt(compare_1[i].total_mandates);
                            }

                            else if(compare_1[i].mandate_status_message=="success"){
                               totalMandateCompare_1 +=  parseInt(compare_1[i].total_mandates);

                              successMandateCompare_1 +=  parseInt(compare_1[i].total_mandates);
                            }

                            else{
                             // failedMandateCompare_1 +=  parseInt(compare_1[i].total_mandates);
                            }

                        }

                      }

                        if(compare_2){
                         for (var i = 0; i < compare_2.length; i++) {
                          
                            if(compare_2[i].mandate_status_message=="failure"){
                               totalMandateCompare_2 +=  parseInt(compare_2[i].total_mandates);

                               failedMandateCompare_2 +=  parseInt(compare_2[i].total_mandates);
                            }

                            else if(compare_2[i].mandate_status_message=="User Aborted"){
                               totalMandateCompare_2 +=  parseInt(compare_2[i].total_mandates);

                              userAbortedMandateCompare_2 +=  parseInt(compare_2[i].total_mandates);
                            }

                            else if(compare_2[i].mandate_status_message=="success"){
                               totalMandateCompare_2 +=  parseInt(compare_2[i].total_mandates);

                              successMandateCompare_2 +=  parseInt(compare_2[i].total_mandates);
                            }

                            else{
                             // failedMandateCompare_2 +=  parseInt(compare_2[i].total_mandates);
                            }

                        }
                  
                      }

                  }

                  $('#totalMandateCompare_1').html(Intl.NumberFormat('en-IN').format(totalMandateCompare_1));
                  $('#failedMandateCompare_1').html(Intl.NumberFormat('en-IN').format(failedMandateCompare_1));
                  $('#userAbortedMandateCompare_1').html(Intl.NumberFormat('en-IN').format(userAbortedMandateCompare_1));
                  $('#successMandateCompare_1').html(Intl.NumberFormat('en-IN').format(successMandateCompare_1));
                  $('#totalMandateCompare_2').html(Intl.NumberFormat('en-IN').format(totalMandateCompare_2));
                  $('#failedMandateCompare_2').html(Intl.NumberFormat('en-IN').format(failedMandateCompare_2));
                  $('#userAbortedMandateCompare_2').html(Intl.NumberFormat('en-IN').format(userAbortedMandateCompare_2));
                  $('#successMandateCompare_2').html(Intl.NumberFormat('en-IN').format(successMandateCompare_2));

               },

               error: function(response){
                  var data =JSON.parse(response.responseText);
                
                  $('#totalMandateCompare_1').html(0);
                  $('#failedMandateCompare_1').html(0);
                  $('#userAbortedMandateCompare_1').html(0);
                  $('#successMandateCompare_1').html(0);
                  $('#totalMandateCompare_2').html(0);
                  $('#failedMandateCompare_2').html(0);
                  $('#userAbortedMandateCompare_2').html(0);
                  $('#successMandateCompare_2').html(0);

               
              }
        });

  }

//////////////////////////////////////////////////////////////////

  function showTransactionCompare() {
         
         TransactionCountCompareFilter=  $('select[name=TransactionCountCompareFilter]').val();

         if(TransactionCountCompareFilter=="yesterdayVsToday"){ 
            $("#TransactionCompareTitle_1").html("Yesterday");
            $("#TransactionCompareTitle_2").html("Today");
         } 

         else if(TransactionCountCompareFilter=="lastVsThisWeek"){
            $("#TransactionCompareTitle_1").html("Last Week");
            $("#TransactionCompareTitle_2").html("This Week");
         }

         else if(TransactionCountCompareFilter=="lastVsThisMonth"){
            $("#TransactionCompareTitle_1").html("Last Month");
            $("#TransactionCompareTitle_2").html("This Month");

         }

         else if(TransactionCountCompareFilter=="lastVsThisYear"){
            $("#TransactionCompareTitle_1").html("Last Year");
            $("#TransactionCompareTitle_2").html("This Year");
         }


          $.ajax({
              type: 'ajax',
              url: "<?php echo base_url() ?>api/Dashboard2/showTransactionCompare", // call the showBranchesOfBank API 
              async: false,
              data:{
                  'transactionCountCompareFilter': TransactionCountCompareFilter,
              },  
              method:'get',
              dataType: 'json',
              beforeSend: function(xhr) {
                xhr.setRequestHeader('X-API-KEY','enachSyncWorks');
              },
               success: function(response) {
                  
                  var compare_1 =  response.compare_1;
                  var compare_2 =  response.compare_2;

                  var totalTransactionCompare_1 = 0;
                  var successTransactionCompare_1 = 0;
                  var notScheduledTransactionCompare_1 = 0;
                  var initiatedTransactionCompare_1 = 0;
                  var failedTransactionCompare_1 = 0; 

                  var totalTransactionAmountCompare_1 = 0;
                  var successTransactionAmountCompare_1 = 0;
                  var notScheduledTransactionAmountCompare_1 = 0;
                  var initiatedTransactionAmountCompare_1 = 0;
                  var failedTransactionAmountCompare_1 = 0; 


                  var totalTransactionCompare_2 = 0;
                  var successTransactionCompare_2 = 0;
                  var notScheduledTransactionCompare_2 = 0;
                  var initiatedTransactionCompare_2 = 0;
                  var failedTransactionCompare_2 = 0;

                  var totalTransactionAmountCompare_2 = 0;
                  var successTransactionAmountCompare_2 = 0;
                  var notScheduledTransactionAmountCompare_2 = 0;
                  var initiatedTransactionAmountCompare_2 = 0;
                  var failedTransactionAmountCompare_2 = 0; 

                  if(response.status){
                  
                      if(compare_1){
                  
                        for (var i = 0; i < compare_1.length; i++) {

                              totalTransactionCompare_1 +=  parseInt(compare_1[i].total_transaction);
                              totalTransactionAmountCompare_1 +=  parseInt(compare_1[i].total_transaction_amount);


                              if(compare_1[i].transaction_status=="A" || compare_1[i].transaction_status=="F"){

                               failedTransactionCompare_1 +=  parseInt(compare_1[i].total_transaction);
                               failedTransactionAmountCompare_1 +=  parseInt(compare_1[i].total_transaction_amount);
                              
                              }

                              else if(compare_1[i].transaction_status=="I"){

                               initiatedTransactionCompare_1 +=  parseInt(compare_1[i].total_transaction);
                               initiatedTransactionAmountCompare_1 +=  parseInt(compare_1[i].total_transaction_amount);
                              
                              }

                              else if(compare_1[i].transaction_status=="S"){

                                 successTransactionCompare_1 +=  parseInt(compare_1[i].total_transaction);
                                 successTransactionAmountCompare_1 +=  parseInt(compare_1[i].total_transaction_amount);
                              
                              }

                              else{

                                 notScheduledTransactionCompare_1 +=  parseInt(compare_1[i].total_transaction);
                                 notScheduledTransactionAmountCompare_1 +=  parseInt(compare_1[i].total_transaction_amount);
                              
                              }

                        }

                      }

                      if(compare_2){
                        
                         for (var i = 0; i < compare_2.length; i++) {
                        
                              totalTransactionCompare_2 +=  parseInt(compare_2[i].total_transaction);
                              totalTransactionAmountCompare_2 +=  parseInt(compare_2[i].total_transaction_amount);


                              if(compare_2[i].transaction_status=="A" || compare_2[i].transaction_status=="F"){

                               failedTransactionCompare_2 +=  parseInt(compare_2[i].total_transaction);
                               failedTransactionAmountCompare_2 +=  parseInt(compare_2[i].total_transaction_amount);
                              
                              }

                              else if(compare_2[i].transaction_status=="I"){

                               initiatedTransactionCompare_2 +=  parseInt(compare_2[i].total_transaction);
                               initiatedTransactionAmountCompare_2 +=  parseInt(compare_2[i].total_transaction_amount);
                              
                              }

                              else if(compare_2[i].transaction_status=="S"){

                                 successTransactionCompare_2 +=  parseInt(compare_2[i].total_transaction);
                                 successTransactionAmountCompare_2 +=  parseInt(compare_2[i].total_transaction_amount);
                              
                              }

                              else{

                                 notScheduledTransactionCompare_2 +=  parseInt(compare_2[i].total_transaction);
                                 notScheduledTransactionAmountCompare_2 +=  parseInt(compare_2[i].total_transaction_amount);
                              
                              }

                        }
                  
                      }

                  }

                  $('#totalTransactionCompare_1').html(Intl.NumberFormat('en-IN').format(totalTransactionCompare_1));
                  $('#failedTransactionCompare_1').html(Intl.NumberFormat('en-IN').format(failedTransactionCompare_1));
                  $('#notScheduledTransactionCompare_1').html(Intl.NumberFormat('en-IN').format(notScheduledTransactionCompare_1));
                  $('#initiatedTransactionCompare_1').html(Intl.NumberFormat('en-IN').format(initiatedTransactionCompare_1));
                  $('#successTransactionCompare_1').html(Intl.NumberFormat('en-IN').format(successTransactionCompare_1));
                  $('#totalTransactionCompare_2').html(Intl.NumberFormat('en-IN').format(totalTransactionCompare_2));
                  $('#failedTransactionCompare_2').html(Intl.NumberFormat('en-IN').format(failedTransactionCompare_2));
                  $('#notScheduledTransactionCompare_2').html(Intl.NumberFormat('en-IN').format(notScheduledTransactionCompare_2));
                  $('#initiatedTransactionCompare_2').html(Intl.NumberFormat('en-IN').format(initiatedTransactionCompare_2));
                  $('#successTransactionCompare_2').html(Intl.NumberFormat('en-IN').format(successTransactionCompare_2));

                  $('#totalTransactionAmountCompare_1').html(Intl.NumberFormat('en-IN').format(totalTransactionAmountCompare_1));
                  $('#failedTransactionAmountCompare_1').html(Intl.NumberFormat('en-IN').format(failedTransactionAmountCompare_1));
                  $('#notScheduledTransactionAmountCompare_1').html(Intl.NumberFormat('en-IN').format(notScheduledTransactionAmountCompare_1));
                  $('#initiatedTransactionAmountCompare_1').html(Intl.NumberFormat('en-IN').format(initiatedTransactionAmountCompare_1));
                  $('#successTransactionAmountCompare_1').html(Intl.NumberFormat('en-IN').format(successTransactionAmountCompare_1));
                  $('#totalTransactionAmountCompare_2').html(Intl.NumberFormat('en-IN').format(totalTransactionAmountCompare_2));
                  $('#failedTransactionAmountCompare_2').html(Intl.NumberFormat('en-IN').format(failedTransactionAmountCompare_2));
                  $('#notScheduledTransactionAmountCompare_2').html(Intl.NumberFormat('en-IN').format(notScheduledTransactionAmountCompare_2));
                  $('#initiatedTransactionAmountCompare_2').html(Intl.NumberFormat('en-IN').format(initiatedTransactionAmountCompare_2));
                  $('#successTransactionAmountCompare_2').html(Intl.NumberFormat('en-IN').format(successTransactionAmountCompare_2));

               },

               error: function(response){
                  var data =JSON.parse(response.responseText);
                
                  $('#totalTransactionCompare_1').html(0);
                  $('#failedTransactionCompare_1').html(0);
                  $('#notScheduledTransactionCompare_1').html(0);
                  $('#initiatedTransactionCompare_1').html(0);
                  $('#successTransactionCompare_1').html(0);
                  $('#totalTransactionCompare_2').html(0);
                  $('#failedTransactionCompare_2').html(0);
                  $('#notScheduledTransactionCompare_2').html(0);
                  $('#initiatedTransactionCompare_2').html(0);
                  $('#successTransactionCompare_2').html(0);

                  $('#totalTransactionAmountCompare_1').html(0);
                  $('#failedTransactionAmountCompare_1').html(0);
                  $('#notScheduledTransactionAmountCompare_1').html(0);
                  $('#initiatedTransactionAmountCompare_1').html(0);
                  $('#successTransactionAmountCompare_1').html(0);
                  $('#totalTransactionAmountCompare_2').html(0);
                  $('#failedTransactionAmountCompare_2').html(0);
                  $('#notScheduledTransactionAmountCompare_2').html(0);
                  $('#initiatedTransactionAmountCompare_2').html(0);
                  $('#successTransactionAmountCompare_2').html(0);

              }
        });

  }

///////////////////////////////


   function showCountTransactionBarLine() {
       transactionBarLineXAxisData=[];
      filterTransactionsBarLineCount=  $('select[name=filterTransactionsBarLineCount]').val();
      filterTransactionsBarLineAmountNoOfChangeCount=  $('select[name=filterTransactionsBarLineAmountNoOfChangeCount]').val();

      $.ajax({
                    type: 'ajax',
                    url: "<?php echo base_url() ?>api/Dashboard2/showCountTransactionBarLine", // call the showBranchesOfBank API 
                    async: false,
                    data:{
                        'filterTransactionsBarLineCount': filterTransactionsBarLineCount,
                        },  

                    method:'get',
                    dataType: 'json',
                    beforeSend: function(xhr) {
                      xhr.setRequestHeader('X-API-KEY','enachSyncWorks');
                    },
                     success: function(response) {

                          var xAxisD =  response.xAxisData;
                          var data =  response.data;

                          for (var i = 0; i < xAxisD.length; i++) {
                             transactionBarLineXAxisData.push(xAxisD[i]);
                           
                                transactionBarLineTotalAmount.push(0);
                                transactionBarLineSuccessAmount.push(0);
                                transactionBarLineFailAmount.push(0);
                                transactionBarLineInitiatedAmount.push(0);
                                transactionBarLineNotScheduledAmount.push(0);

                                transactionBarLineTotalTransactions.push(0);
                                transactionBarLineSuccessTransactions.push(0);
                                transactionBarLineFailTransactions.push(0);
                                transactionBarLineInitiatedTransactions.push(0);
                                transactionBarLineNotScheduledTransactions.push(0);

                                transactionBarLineTotalMandates.push(0);
                                transactionBarLineNotScheduledMandates.push(0);
                                transactionBarLineSuccessMandates.push(0);
                                transactionBarLineInitiatedMandates.push(0);
                                transactionBarLineFailMandates.push(0);


                          }

                       
                          // Update status arrays based on data
                        for (var i = 0; i < data.length; i++) {
                            for (var j = 0; j < data[i].length; j++) {

                              var filter=data[i][j].month_year;
                               var index;
                              if(filterTransactionsBarLineCount=="year" || filterTransactionsBarLineCount=="lastyear"){
                                   filter = data[i][j].month_year;
                                   index = xAxisD.indexOf(filter); 
                              }

                              if(filterTransactionsBarLineCount=="week"  || filterTransactionsBarLineCount=="lastweek"){
                                   filter = data[i][j].day_of_week;
                                   index = xAxisD.indexOf(filter); 

                              }

                              if(filterTransactionsBarLineCount=="month"   || filterTransactionsBarLineCount=="lastmonth"){
                                   filter = data[i][j].day_of_month;
                                    index = xAxisD.indexOf(parseInt(filter));

                              }

                              if(filterTransactionsBarLineCount=="today" || filterTransactionsBarLineCount=="yesterday" ){
                                  
                                   var parts = data[i][j].time_interval.split(" - ");
                                   var startTime = parts[0];
                                   filter = startTime;
                                   index = xAxisD.indexOf(filter); 

                              }


                                var status = data[i][j].transaction_status;
                               
                                var transactionCount = 0;

                                // if(filterTransactionsBarLineAmountNoOfChangeCount=="noOfTransactions"){

                                //    var transactionCount = parseInt(data[i][j].total_transaction);


                                // }
                                // if(filterTransactionsBarLineAmountNoOfChangeCount=="transactionAmount"){

                                   var transactionCount = parseInt(data[i][j].total_transaction_amount);


                                // }

                            
                                transactionBarLineTotalAmount[index] += transactionCount;
                                transactionBarLineTotalTransactions[index]+=parseInt(data[i][j].total_transaction);
                                transactionBarLineTotalMandates[index]+=parseInt(data[i][j].total_mandates);
                                // Update respective status array for the month
                                switch (status) {
                                    case "A":
                                        transactionBarLineFailTransactions[index]+=parseInt(data[i][j].total_transaction);
                                        transactionBarLineFailMandates[index]+=parseInt(data[i][j].total_mandates);
                                        transactionBarLineFailAmount[index] += transactionCount;
                                        break;
                                    case "S":
                                        transactionBarLineSuccessTransactions[index]+=parseInt(data[i][j].total_transaction);
                                        transactionBarLineSuccessMandates[index]+=parseInt(data[i][j].total_mandates);
                                        transactionBarLineSuccessAmount[index] += transactionCount;
                                        break;
                                    case "F":
                                        transactionBarLineFailTransactions[index]+=parseInt(data[i][j].total_transaction);
                                        transactionBarLineFailMandates[index]+=parseInt(data[i][j].total_mandates);
                                        transactionBarLineFailAmount[index] += transactionCount;
                                        break;
                                    case "I":
                                        transactionBarLineInitiatedTransactions[index]+=parseInt(data[i][j].total_transaction);
                                        transactionBarLineInitiatedMandates[index]+=parseInt(data[i][j].total_mandates);
                                        transactionBarLineInitiatedAmount[index] += transactionCount;
                                        break;
                                    case null:
                                        transactionBarLineNotScheduledTransactions[index]+=parseInt(data[i][j].total_transaction);
                                        transactionBarLineNotScheduledMandates[index]+=parseInt(data[i][j].total_mandates);
                                        transactionBarLineNotScheduledAmount[index] += transactionCount;
                                        break;
                                    default:
                                       
                                        break;
                                }


                            }
                        }


                     },
                     error: function(response){
                         var data =JSON.parse(response.responseText);
                         // toastr.error(data.message);

                     
                    }
              });


   }

    function showCountMandateCards(toDateMandateCard,fromDateMandateCard) {

       var  filterMandateCount=  $('select[name=filterMandateCount]').val();

        if(filterMandateCount =="customdate"){
          $('#divDateMandateCount').removeClass('d-none');


          $('#filterCustomDateMandateCount').focus();

   
        }
        else{
          toDateTransactionMandateCard=null;
          fromDateTransactionMandateCard=null;
           $('#divDateMandateCount').addClass('d-none');
        }


          $.ajax({
                    type: 'ajax',
                    url: "<?php echo base_url() ?>api/Dashboard2/showCountMandate", // call the showBranchesOfBank API 
                    async: false,
                    data:{
                        'filterMandateCount': filterMandateCount,
                        'toDate': toDateMandateCard,
                        'fromDate': fromDateMandateCard,
                        },  

                    method:'get',
                    dataType: 'json',
                    beforeSend: function(xhr) {
                      xhr.setRequestHeader('X-API-KEY','enachSyncWorks');
                    },
                     success: function(response) {
                         var data =  response.data;
                         var totalMandateCard = 0;
                         var successMandateCard = 0;
                         var userAbortedMandateCard = 0;
                         var failedMandateCard = 0; 

                        if(response.status){
                        
                            if(data){
                        
                              for (var i = 0; i < data.length; i++) {
                                
                                  if(data[i].mandate_status_message=="failure"){
                                     totalMandateCard +=  parseInt(data[i].total_mandates);

                                     failedMandateCard +=  parseInt(data[i].total_mandates);
                                  }

                                  else if(data[i].mandate_status_message=="User Aborted"){
                                     totalMandateCard +=  parseInt(data[i].total_mandates);

                                    userAbortedMandateCard +=  parseInt(data[i].total_mandates);
                                  }

                                  else if(data[i].mandate_status_message=="success"){
                                     totalMandateCard +=  parseInt(data[i].total_mandates);

                                    successMandateCard +=  parseInt(data[i].total_mandates);
                                  }

                                  else{
                                   // failedMandateCard +=  parseInt(data[i].total_mandates);
                                  }

                              }
                        
                            }
                        }
                        $('#totalMandateCard').html(Intl.NumberFormat('en-IN').format(totalMandateCard));
                        $('#failedMandateCard').html(Intl.NumberFormat('en-IN').format(failedMandateCard));
                        $('#userAbortedMandateCard').html(Intl.NumberFormat('en-IN').format(userAbortedMandateCard));
                        $('#successMandateCard').html(Intl.NumberFormat('en-IN').format(successMandateCard));

                     },

                     error: function(response){
                        var data =JSON.parse(response.responseText);
                        $('#totalMandateCard').html(0);
                        $('#failedMandateCard').html(0);
                        $('#userAbortedMandateCard').html(0);
                        $('#successMandateCard').html(0);

                     
                    }
              });


    }

    function showSkippedTransactionCountCards(){

    $.ajax({
                type: 'ajax',
                url: "<?php echo base_url() ?>api/Dashboard2/showSkippedTransactionCount", // call the showBranchesOfBank API 
                async: false,
                method:'get',
                dataType: 'json',
                beforeSend: function(xhr) {
                  xhr.setRequestHeader('X-API-KEY','enachSyncWorks');
                },
                success: function(response) {
                    var data =  response.data;

                    $('#skippedAmountPlaceholder').html(Intl.NumberFormat('en-IN').format(data.total_skipped_amount));
                    $('#skippedCountPlaceholder').html(Intl.NumberFormat('en-IN').format(data.total_skipped_transactions));
                    $('#skippedMandateCountPlaceholder').html(Intl.NumberFormat('en-IN').format(data.total_skipped_mandates));

                  },
                   error: function(response){
                       var data =JSON.parse(response.responseText);
                   }
          });


    }


    showCanceledMandatesCountCards();
    function showCanceledMandatesCountCards(){

          $.ajax({
                type: 'ajax',
                url: "<?php echo base_url() ?>api/Dashboard2/showshowCanceledMandatesCount",
                async: false,
                method:'get',
                dataType: 'json',
                beforeSend: function(xhr) {
                  xhr.setRequestHeader('X-API-KEY','enachSyncWorks');
                },
                success: function(response) {

                    var data =  response.data;
                    var pendingcount = response.pendingcount;

                    $('#TotalCanceledMandateAmount').html(Intl.NumberFormat('en-IN').format(data.total_amount));
                    $('#TotalCanceledMandateCount').html(Intl.NumberFormat('en-IN').format(data.total_canceled_mandates));

                    $('#pendingMandateCount').html(Intl.NumberFormat('en-IN').format(pendingcount.total_pending_mandates));


                 

                  },
                   error: function(response){
                       var data =JSON.parse(response.responseText);
                   }
          });


    }

    /* Canceled Mandates Cards */

    function showCountMandateTransactionCards(toDateTransactionMandateCard,fromDateTransactionMandateCard) {
       var  filterMandateTransactionsAmountCount=  $('select[name=filterMandateTransactionsAmountCount]').val();
     


        if(filterMandateTransactionsAmountCount =="customdate"){
          $('#divDateMandateTransactionsAmountCount').removeClass('d-none');


          $('#filterCustomDateMandateTransactionsAmountCount').focus();

   
        }
        else{
          toDateTransactionMandateCard=null;
          fromDateTransactionMandateCard=null;
           $('#divDateMandateTransactionsAmountCount').addClass('d-none');
        }


          $.ajax({
                    type: 'ajax',
                    url: "<?php echo base_url() ?>api/Dashboard2/showCountMandateTransaction", // call the showBranchesOfBank API 
                    async: false,
                    data:{
                        'filterMandateTransactionsAmountCount': filterMandateTransactionsAmountCount,
                        'toDate': toDateTransactionMandateCard,
                        'fromDate': fromDateTransactionMandateCard,
                        },  

                    method:'get',
                    dataType: 'json',
                    beforeSend: function(xhr) {
                      xhr.setRequestHeader('X-API-KEY','enachSyncWorks');
                    },
                     success: function(response) {

                       var data =  response.data;
                     
                        var totalTransactionsAmountCard = 0;
                        var totalTransactionsCard = 0;
                        var totalMandatesCard = 0;

                        var notScheduledTransactionsAmountCard = 0;
                        var notScheduledTransactionsCard = 0;
                        var notScheduledMandatesCard = 0;

                        var successTransactionsAmountCard = 0;
                        var successTransactionsCard = 0;
                        var successMandatesCard = 0;

                        var initiatedTransactionsAmountCard = 0;
                        var initiatedTransactionsCard = 0;
                        var initiatedMandatesCard = 0;

                        var failedTransactionsAmountCard = 0;
                        var failedTransactionsCard = 0;
                        var failedMandatesCard = 0;

                     if(response.status){
                       


                        if(data){

                          for (var i = 0; i < data.length; i++) {
                            
                           totalTransactionsAmountCard +=  parseInt(data[i].total_transaction_amount);
                           totalTransactionsCard +=  parseInt(data[i].total_transaction);
                           totalMandatesCard +=  parseInt(data[i].total_mandates);

                            if(data[i].transaction_status){

                              if(data[i].transaction_status=="A" || data[i].transaction_status=="F"){


                                  failedTransactionsAmountCard +=  parseInt(data[i].total_transaction_amount);
                                  failedTransactionsCard +=  parseInt(data[i].total_transaction);
                                  failedMandatesCard +=  parseInt(data[i].total_mandates);

                              }

                              else if(data[i].transaction_status=="I"){

                                  initiatedTransactionsAmountCard +=  parseInt(data[i].total_transaction_amount);
                                  initiatedTransactionsCard +=  parseInt(data[i].total_transaction);
                                  initiatedMandatesCard +=  parseInt(data[i].total_mandates);

                              }

                               else if(data[i].transaction_status=="S"){

                                  successTransactionsAmountCard +=  parseInt(data[i].total_transaction_amount);
                                  successTransactionsCard +=  parseInt(data[i].total_transaction);
                                  successMandatesCard +=  parseInt(data[i].total_mandates);

                              }

                              else{

                                notScheduledTransactionsAmountCard +=  parseInt(data[i].total_transaction_amount);
                                notScheduledTransactionsCard +=  parseInt(data[i].total_transaction);
                                notScheduledMandatesCard +=  parseInt(data[i].total_mandates);
                              
                              }

                            
                            }
                          
                            else{
                              notScheduledTransactionsAmountCard +=  parseInt(data[i].total_transaction_amount);
                              notScheduledTransactionsCard +=  parseInt(data[i].total_transaction);
                              notScheduledMandatesCard +=  parseInt(data[i].total_mandates);
                            }
                            
                          }


                        }

                  
                     }
                   

                      
                           $('#totalTransactionsAmountCard').html(Intl.NumberFormat('en-IN').format(totalTransactionsAmountCard));
                          $('#totalTransactionsCard').html(Intl.NumberFormat('en-IN').format(totalTransactionsCard));
                          $('#totalMandatesCard').html(Intl.NumberFormat('en-IN').format(totalMandatesCard));

                          $('#notScheduledTransactionsAmountCard').html(Intl.NumberFormat('en-IN').format(notScheduledTransactionsAmountCard));
                          $('#notScheduledTransactionsCard').html(Intl.NumberFormat('en-IN').format(notScheduledTransactionsCard));
                          $('#notScheduledMandatesCard').html(Intl.NumberFormat('en-IN').format(notScheduledMandatesCard));

                          $('#failedTransactionsAmountCard').html(Intl.NumberFormat('en-IN').format(failedTransactionsAmountCard));
                          $('#failedTransactionsCard').html(Intl.NumberFormat('en-IN').format(failedTransactionsCard));
                          $('#failedMandatesCard').html(Intl.NumberFormat('en-IN').format(failedMandatesCard));


                          $('#initiatedTransactionsAmountCard').html(Intl.NumberFormat('en-IN').format(initiatedTransactionsAmountCard));
                          $('#initiatedTransactionsCard').html(Intl.NumberFormat('en-IN').format(initiatedTransactionsCard));
                          $('#initiatedMandatesCard').html(Intl.NumberFormat('en-IN').format(initiatedMandatesCard));

                          $('#successTransactionsAmountCard').html(Intl.NumberFormat('en-IN').format(successTransactionsAmountCard));
                          $('#successTransactionsCard').html(Intl.NumberFormat('en-IN').format(successTransactionsCard));
                          $('#successMandatesCard').html(Intl.NumberFormat('en-IN').format(successMandatesCard));
                        
                     },
                     error: function(response){
                         var data =JSON.parse(response.responseText);
                         // toastr.error(data.message);

                       

                          $('#totalTransactionsAmountCard').html(0);
                          $('#totalTransactionsCard').html(0);
                          $('#totalMandatesCard').html(0);

                          $('#notScheduledTransactionsAmountCard').html(0);
                          $('#notScheduledTransactionsCard').html(0);
                          $('#notScheduledMandatesCard').html(0);

                          $('#failedTransactionsAmountCard').html(0);
                          $('#failedTransactionsCard').html(0);
                          $('#failedMandatesCard').html(0);


                          $('#initiatedTransactionsAmountCard').html(0);
                          $('#initiatedTransactionsCard').html(0);
                          $('#initiatedMandatesCard').html(0);

                          $('#successTransactionsAmountCard').html(0);
                          $('#successTransactionsCard').html(0);
                          $('#successMandatesCard').html(0);
                     
                    }
              });

     
          
    }

     $('#filterCustomDateMandateTransactionsAmountCount').on('change', function(){

       toDateTransactionMandateCard=null;
       fromDateTransactionMandateCard=null;
       var selectedDates = $(this).val();

       if (selectedDates) {
            // Split the selectedDates string into an array of two parts: from and to
            var datesArray = selectedDates.split(" to ");

            
            // Trim any extra whitespace from the dates
           
            
            if(datesArray.length==2){

               fromDateTransactionMandateCard = datesArray[0].trim();
               toDateTransactionMandateCard = datesArray[1].trim();
              showCountMandateTransactionCards(toDateTransactionMandateCard,fromDateTransactionMandateCard);
            }
            // Now you can work with fromDateTransactionMandateCard and toDateTransactionMandateCard separately
            // alert("From date: " + fromDateTransactionMandateCard);
            // alert("To date: " + toDateTransactionMandateCard);
        } else {
            // alert("No dates selected.");
        }
    });

$('#filterCustomDateMandateCount').on('change', function(){

       toDateMandateCard=null;
       fromDateMandateCard=null;
       var selectedDates = $(this).val();

       if (selectedDates) {
            // Split the selectedDates string into an array of two parts: from and to
            var datesArray = selectedDates.split(" to ");

            
            // Trim any extra whitespace from the dates
           
            
            if(datesArray.length==2){

               fromDateMandateCard = datesArray[0].trim();
               toDateMandateCard = datesArray[1].trim();
               showCountMandateCards(toDateMandateCard,fromDateMandateCard);
            }
            // Now you can work with fromDateTransactionMandateCard and toDateTransactionMandateCard separately
            // alert("From date: " + fromDateTransactionMandateCard);
            // alert("To date: " + toDateTransactionMandateCard);
        } else {
            // alert("No dates selected.");
        }
    });


</script>

 <script src="<?php echo base_url();?>vendors/echarts/echarts.min.js"></script>
 <script src="<?php echo base_url();?>assets/js/echarts-example.js"></script>