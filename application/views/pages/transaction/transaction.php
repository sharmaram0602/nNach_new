
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



            <?php if(in_array('updateMandate', $user_permission) || in_array('viewMandate', $user_permission)  || in_array('deleteMandate', $user_permission)): ?>
                <div class="mb-2">
                          <div class="d-flex flex-wrap gap-3">
                            <div class="search-box input-group">
                                <input class="form-control search-input" type="text" placeholder="Search" aria-label="Recipient's username" aria-describedby="basic-addon2" id="searchTextCustomer" name="searchTextCustomer"/>
                                <span class="fas fa-search search-box-icon"></span> 
                                
                            </div>
                        

                            <div class="scrollbar overflow-hidden-y">

                              <div class="btn-group position-static" role="group">

                                 
                                 <div class="btn-group position-static text-nowrap dropdown">
                                  <button class="btn btn-sm btn-phoenix-secondary  flex-shrink-0" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"  data-bs-auto-close="true"><i class="fas fa-calendar"></i>
                                   <span class="text-capitalize" id="transaction_date_filter_title">Date</span><span class="fas fa-angle-down ms-2"></span></button>
                                  <ul class="dropdown-menu scrollbar overflow-hidden-y h-30" id="transaction_date_filter">

                                  <li onclick="changeTransactionDate('all');">
                                      <div class="dropdown-item">
                                     
                                         <label class="form-check-label" for="all">All</label>
                                     
                                     </div>
                                   </li>

                                 
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
                               
                             
                               
                                <div class="btn-group position-static text-nowrap dropdown">
                                  
                                  <button class="btn btn-phoenix-secondary flex-shrink-0" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent" data-bs-auto-close="true"><i class="fas fa-university"></i>
                                    Branch <span id="branchFilterCount"></span>
                                           <span class="fas fa-angle-down ms-2"></span>
                                  </button>
                                  
                                    <ul class="dropdown-menu scrollbar overflow-hidden-y h-30" id="branch_id_filter">
                                        
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
                                    Status <span id="statusFilterCount"></span><span class="fas fa-angle-down ms-2"></span></button>
                                  <ul class="dropdown-menu scrollbar overflow-hidden-y h-30" id="status_filter">
                                    
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
                                         <label class="form-check-label" for="initiated">Initiated</label>
                                     
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
                                    <ul class="dropdown-menu scrollbar overflow-hidden-y h-30" id="more_filter">
                                       
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
                                               <input type="number" id="amountInput" class="input-spin-none form-control form-control-sm mt-1" placeholder="Amount">
                                            </div>
                                            <div id="amountRangeInputContainer" class="dropdown-item d-none">
                                              <div class="row">
                                                    <div class="col">
                                                        <input type="number" id="amountFromInput" class="input-spin-none form-control form-control-sm mt-1 col-6" placeholder="From Amount">
                                                    </div>
                                                    <div class="col">
                                                        <input type="number" id="amountToInput" class="input-spin-none form-control form-control-sm mt-1 col-6" placeholder="To Amount">
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
                                                     <div class="input-group input-group-sm">
                                                          <span class="input-group-text" id="basic-addon2"><i class="fas fa-calendar"></i></span>
                                                             <input class="form-control datetimepicker" id="emiDebitDateInput" type="text" placeholder="dd/mm/yyyy" data-options='{dateFormat":"d/m/Y"}'/>

                                                     </div>
                                                </div>
                                                <div id="emiDebitDateRangeInputContainer" class="dropdown-item d-none">
                                                    <div class="row">
                                                    
                                                     <div class="col">
                                                    
                                                         <label class="form-label">From Date</label>  
                                                     
                                                         <div class="input-group input-group-sm">
                                                             <span class="input-group-text" id="basic-addon2"><i class="fas fa-calendar"></i></span>


                                                             <input class="form-control datetimepicker" id="emiDebitDateFromInput" type="text" placeholder="dd/mm/yyyy" data-options='{dateFormat":"d/m/Y"}'/>
                                                         </div>
                                                 
                                                     </div>

                                                   <div class="col">
                                                        <label class="form-label">To Date</label> 
                                                        <div class="input-group input-group-sm">
                                                             <span class="input-group-text" id="basic-addon2"><i class="fas fa-calendar"></i></span>

                                                            <input class="form-control datetimepicker " id="emiDebitDateToInput" type="text" placeholder="dd/mm/yyyy" data-options='{dateFormat":"d/m/Y"}'/>
                                                        </div>
                                                             
                                                       
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
           <?php endif; ?>



        <div class="col-md-12 col-xl-12 col-xxl-12 col-sm-12 sortable-item-wrapper">
            
            <div class="card m-0 p-2 h-100">
            

                <div class="card-body p-2 m-0">
                  
                  <div class="table-responsive mx-1 px-1">
                      <table class="table mb-0 fs--1 compact table-hover w-100" id="dataTableTransaction" >
                      
                        <thead>
                            <tr> 
                                <th class="white-space-nowrap border-top">Sr No.</th>
                                <th class="white-space-nowrap border-top">Name</th>
                                <th class="white-space-nowrap border-top">Phone</th>
                                <th class="white-space-nowrap border-top">Account</th>  
                                <th class="white-space-nowrap border-top">Amount</th>
                                <th class="white-space-nowrap border-top">Debit Date</th>
                                <th class="white-space-nowrap border-top">Branch</th>
                                <th class="white-space-nowrap border-top">Status</th>
                                <th class="white-space-nowrap border-top">Reason/Message</th>
                                <th class="white-space-nowrap border-top">Unique Registration Number</th>
                                <th class="white-space-nowrap border-top">Transaction ID</th>
                                <th class="white-space-nowrap border-top">Presentment Mode</th>
                                <th class="white-space-nowrap border-top">Added By</th>  
                                <th class="white-space-nowrap border-top">Loan Type</th>  
                                <?php if(in_array('updateMandate', $user_permission) || in_array('viewMandate', $user_permission)  || in_array('deleteMandate', $user_permission)): ?>
                                <th class="white-space-nowrap border-top" scope="col">Action</th>
                                <?php endif; ?>
                             
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
                        <th class="white-space-nowrap border-top">Unique Registration Number</th>
                        <th class="white-space-nowrap border-top">Transaction ID</th>
                        <th class="white-space-nowrap border-top">Presentment Mode</th>
                        <th class="white-space-nowrap border-top">Name</th>
                        <th class="white-space-nowrap border-top">Phone</th>
                        <th class="white-space-nowrap border-top">Loan Bank Account No.</th>  
                        <th class="white-space-nowrap border-top">Amount</th>
                        <th class="white-space-nowrap border-top">Debit Date</th>
                        <th class="white-space-nowrap border-top">Branch</th>

                        <th class="white-space-nowrap border-top">Loan Type</th>  
                        <th class="white-space-nowrap border-top">Added By</th>  

                        <th class="white-space-nowrap border-top">Status</th>
                        <th class="white-space-nowrap border-top">Reason Desciption/Message</th>

                     
                      </tr>
                    </thead>
                    <tbody class="list" id="showReportResultexcel">

                    </tbody>

            </table>
         

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

      
        <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.4/xlsx.full.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>


  <script>
    //////////
    
//     function openCustomDatePicker() {
//     var customDatePickerContainer = document.getElementById('customDatePickerContainer');
//     customDatePickerContainer.classList.remove('d-none');
// }
// function changeTransactionDate(transactionDateFilter) {
//     if (transactionDateFilter === 'customdate') {
//         // Open the custom date picker
//         openCustomDatePicker();
//     } else {
//         // Show data for other date options
//         showTransactionTableData(transactionDateFilter);
//     }
// }

// function fetchDataByCustomDate(customDate) {
    
//     showTransactionTableData(customDate);
// }

    // ////
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
//   showCountTransactionBarLine();

 showTransactionTableData(transactionDateFilter);

});



$(document).ready(function(){
     var searchTerm;
  showBranchData();
  
  var toDateTransactionMandateCard;
  var fromDateTransactionMandateCard;

  var toDateMandateCard;
  var fromDateMandateCard;


//   showCountMandateTransactionCards(toDateTransactionMandateCard,fromDateTransactionMandateCard);
//   showCountMandateCards(toDateMandateCard,fromDateMandateCard);

//   showMandateCompare();


//   showTransactionCompare();



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
                        '<td class="align-middle  txn_ID">'+data[i].txn_ID+'</td>'+
                        '<td class="align-middle  mts_payment_transaction_id">'+data[i].mts_payment_transaction_id+'</td>'+
                        '<td class="align-middle presentment_mode">NACH-ACH-DR</td>' +
                         '<td class="align-middle  customer_name">'+data[i].customer_name+'</td>'+
                         '<td class="align-middle  customer_mobile_no">'+data[i].customer_mobile_no+'</td>'+
                         '<td class="align-middle  account_no">'+data[i].account_no+'</td>'+
                         '<td class="align-middle  amount">'+data[i].mts_amount+'</td>'+
                         '<td class="align-middle  mts_datetime">'+data[i].mts_datetime+'</td>'+
                         '<td class="align-middle  branch_id">'+data[i].branch_name+'</td>'+
                         '<td class="align-middle  loan_type_name">'+data[i].loan_type_name+'</td>'+
                         '<td class="align-middle  name">'+data[i].name+'</td>'+
                         '<td class="align-middle  mts_status_message">'+status_display+'</td>'+
                         '<td class="align-middle  loan_type_name">'+data[i].mts_message+'</td>';
                  
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
                       'url': "<?php echo base_url() ?>api/Dashboard2/showTransactionsList/",
                       'data':{'transactionDateFilter':transactionDateFilter,  
                        // 'toDate': toDate,
                        // 'fromDate': fromDate,
                       },
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
                             { data: 'account_no',name:'mandate_customers.account_no', orderable: false, },
                             { data: 'mts_amount',name:'mandate_transaction_schedule.mts_amount', orderable: false, },
                             { 
                                data: 'mts_datetime', 
                                name: 'mandate_transaction_schedule.mts_datetime', 
                                orderable: false,
                                render: function(data, type, row) {
                                    return formatDateToDMY(data);
                                }
                             },

                             { data: 'branch_name',name:'bank_branches.branch_name', orderable: false, },
                        
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
                                        } else if (data === "F" || data==="A") {
                                            bgcolor = 'badge-phoenix-danger';
                                            status_display = 'Failure';
                                        } else {
                                            bgcolor = 'badge-phoenix-warning';
                                            status_display ='Not Scheduled'
                                        }
                                    }
                                    return '<div class="badge badge-phoenix fs--2 ' + bgcolor + '"><span class="fw-bold">' + status_display + '</span></div>';

                                }
                            },
                            { data: 'mts_message',name:'mandate_transaction_schedule.mts_message' },
                            { data: 'txn_ID',name:'mandate_transaction_schedule.txn_ID' },
                            
                            { data: 'mts_payment_transaction_id',name:'mandate_transaction_schedule.mts_payment_transaction_id' },
                            { 
                                "data": null,
                                "render": function (data, type, row, meta) {
                                    return 'NACH-ACH-DR'; // Replace 'Fixed Value' with the value you want to display
                                }
                             },

                            { data: 'name',name:'users.name', orderable: false, },

                            { data: 'loan_type_name',name:'loan_types.loan_type_name', orderable: false, },
                            
                            {
                                data: null,
                                orderable: false,
                                render: function (data, type, row) {
                                    var html = '';
                                    <?php if (in_array('updateMandate', $user_permission) || in_array('viewMandate', $user_permission) || in_array('deleteMandate', $user_permission)): ?>
                                    html += '<div class="position-relative">';
                                    html += '<div class="hover-actions">';
                                    // if (row.mts_status_message != "I" && row.mts_status_message != "S" && row.mts_status_message != "F") {
                                    //     if (row.mts_is_skipped == 0) {
                                    //         html += '<a class="btn btn-sm btn-phoenix-warning me-1 fs--2 item-skipSchedule" data="' + row.mts_id + '" mts_skipped_reason="' + row.mts_skipped_reason + '" mts_skip_transaction_id="' + row.mts_skip_transaction_id + '" href="javascript:;"><span class="fa fa-step-forward" id="skipButton"></span></a>';
                                    //     } else {
                                    //         html += '<a class="btn btn-sm btn-phoenix-warning me-1 fs--2 item-skipSchedule" data="' + row.mts_id + '" mts_skipped_reason="' + row.mts_skipped_reason + '" mts_skip_transaction_id="' + row.mts_skip_transaction_id + '" href="javascript:;"><span class="fa fa-step-forward" id="skipButton"></span>Edit Skip</a>';
                                    //     }
                                    // }
                                    if (row.mts_is_skipped == 0 && row.mts_is_already_scheduled == 1) {
 
                                        html += '<a class="btn btn-sm btn-phoenix-success  item-verifyTransactionSchedule" data="' + row.mts_id + '" merchant_ID="' + row.merchant_ID + '" consumer_ID="' + row.consumer_ID + '" href="javascript:;"><span class="uil-comment-verify" id="verifyScheduleButton"></span></a>';
                                    }

                                    html += '</div>';
                                    html += '</div>';
                                    html += '<div class="font-sans-serif btn-reveal-trigger position-static">';
                                    html += '<button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs--2" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--2"></span></button>';
                                    html += '<div class="dropdown-menu dropdown-menu-end py-2">';
                                    // if (row.mts_status_message != "I" && row.mts_status_message != "S" && row.mts_status_message != "F") {
                                    //     if (row.mts_is_skipped == 0) {
                                    //         html += '<a class="dropdown-item item-skipSchedule" data="' + row.mts_id + '" mts_skipped_reason="' + row.mts_skipped_reason + '" mts_skip_transaction_id="' + row.mts_skip_transaction_id + '" href="javascript:;"><span class="fa fa-step-forward mr-2" style="margin-right: 8px;" id="skipButton"></span>Skip</a>';
                                    //     } else {
                                    //         html += '<a class="dropdown-item item-skipSchedule" data="' + row.mts_id + '" mts_skipped_reason="' + row.mts_skipped_reason + '" mts_skip_transaction_id="' + row.mts_skip_transaction_id + '" href="javascript:;"><span class="fa fa-step-forward mr-2" style="margin-right: 8px;" id="skipButton"></span>Edit Skip</a>';
                                    //     }
                                    // }
                                    
                                    if (row.mts_is_skipped == 0 && row.mts_is_already_scheduled == 1) {
                                    
                                     html += '<a class="dropdown-item item-verifyTransactionSchedule" data="' + row.mts_id + '" merchant_ID="' + row.merchant_ID + '" consumer_ID="' + row.consumer_ID + '" href="javascript:;"><span class="uil-comment-verify mr-2" style="margin-right: 8px;" id="verifyScheduleButton"></span>Verify Schedule</a>';
                                   
                                    }

                                    html += '</div>';
                                    html += '</div>';
                                    <?php endif; ?>
                                    return html;
                                }
                            }

                      
                          ],

                  // "drawCallback": function (settings) {
                  //       var api = this.api();
                  //       var start = api.page.info().start; // Get start index of current page
                  //       api.column(0).nodes().each(function (cell, i) {
                  //           cell.innerHTML = start + i + 1; // Update serial numbers
                  //       });
                  // }

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
  

      $('#transactionDataMandate').on('click', '.item-skipSchedule', function(){ 
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
                showTransactionTableData(transactionDateFilter) ;
                    return true;

            },

             error: function(response){

                    return false;
             
            }

        });


        }

        $('#skipTransaction').click(function(){
        var mts_skipped_reason      = $('textarea[name=mts_skipped_reason]').val();
        var mts_skip_transaction_id = $('input[name=mts_skip_transaction_id]').val();
        var mts_id = $('input[name=mts_id]').val();

        if(skipTransaction(mts_skipped_reason,mts_skip_transaction_id,mts_id)){
            showTransactionTableData(transactionDateFilter) ;
            toastr.success(response.message);
            $('#skipModal').modal('hide');
            $('#skipTransactionForm')[0].reset();
        }
        });


        
     $('#transactionDataMandate').on('click', '.item-verifyTransactionSchedule', function(){ 
       var mts_id = $(this).attr('data');
       var merchant_ID = $(this).attr('merchant_ID');
       var consumer_ID = $(this).attr('consumer_ID');
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



   $('.dropdown-menu').on('click', function(event) {
        event.stopPropagation(); // Stop click event propagation
    });
 

  </script>