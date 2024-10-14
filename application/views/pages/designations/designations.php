
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

        <div class="mb-2">
              <div class="d-flex flex-wrap gap-3">
                <div class="search-box input-group">
                    <input class="form-control search-input" type="text" placeholder="Search" aria-label="Recipient's username" aria-describedby="basic-addon2" id="searchTextCustomer" name="searchTextCustomer"/>
                    <span class="fas fa-search search-box-icon"></span> 
                    
                </div>
            


                 <?php if(in_array('createDesignation', $user_permission)):?> 
                    <div class="ms-xxl-auto ms-xl-auto ms-lg-auto ms-md-auto ms-sm-auto">
                     
                       <button type="button" id="addGovt" class="btn btn-primary btn-smitem-govt" data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><span class="fas fa-plus me-2"></span>Add Designation</button>

                     
                    </div>
                 <?php endif; ?>

              </div>
            </div>
        
        <div class="card" >
            <div class="card-body">
                      <div class="table-responsive  mx-1 px-1">
                       <table class="table mb-0 fs--1 compact table-hover w-100" id="designationdataTable" >
                        <thead>
                          <tr> 
                            <th class="sort border-top ps-3" data-sort="srno">Sr No.</th>
                            <th class="sort border-top ps-3" data-sort="name">Name</th>
                         
                            <?php if(in_array('updateDesignation', $user_permission) || in_array('viewDesignation', $user_permission) || in_array('deleteDesignation', $user_permission)): ?>
                                    <th class="sort border-top ps-3" scope="col">Action</th>
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
                            <th class="sort border-top ps-3" data-sort="srno">Sr No.</th>
                            <th class="sort border-top ps-3" data-sort="name">Name</th>
                        </tr>
                        
                        <tbody class="list" id="showReportResultexcel">
                
                        
                        </tbody>
              </table>
        </div>                      
                         
      
         
       <div class="modal fade" id="exampleModalCenter" tabindex="-1" aria-labelledby="scrollingLongModalLabel2" aria-hidden="true" data-bs-backdrop="static">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="tooltipModalLabel">Add Designation</h5>
              <button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><span class="fas fa-times fs--1"></span></button>
            </div>
            <div class="modal-body">
                <form id="myFormDesignation" action=""  class="row g-3  needs-validation" novalidate="">
                  
                    <input type="hidden" name="id">
                  
                    <div class="col-md-12">
                      <label class="form-label" for="designation_name">Designation Name</label>
                      <input class="form-control" name="designation_name" id="designation_name" type="text" pattern="[A-Z]+">
                      <div id="designationError" class="invalid-feedback">Please enter the designation name in capital letters.</div>

                    </div>
                    
                   
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
                                        <input type="checkbox" name="permission[]" id="permissionimportBranch" value="exportBranch" value="importBranch" value="exportBranch" class="form-check-input">
                                    </td>
                                    <td class="align-middle ps-3 ">-
                                        <!-- <input type="checkbox" name="permission[]" id="permissionskipBranch" value="exportBranch" value="skipBranch" value="exportBranch" class="form-check-input"> -->
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
                                        <!-- <input type="checkbox" name="permission[]" id="permissionimportDashboard" value="importDashboard" class="form-check-input"> -->
                                        -
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
              <button class="btn btn-primary" id="btnSaveDesignation" type="submit">Save</button>
              <button class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>            
     
   <div class="modal fade" id="myModal_for_delete_message" tabindex="-1" aria-labelledby="scrollingLongModalLabel2" aria-hidden="true" data-bs-backdrop="static">
          <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="tooltipModalLabel">Delete Designation</h5>
                <button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><span class="fas fa-times fs--1"></span></button>
              </div>
              <div class="modal-body">
                Are sure to delete this Designation ?
              </div>
              <div class="modal-footer">
                <button class="btn btn-danger" id="btdelete" type="button">Delete</button>
                <button class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>                  

        <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.4/xlsx.full.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>
        
              
<script type="text/javascript">

  /////////////////Changes
  $('#searchTextCustomer').on('input', function() {

      
searchTerm = $(this).val();
dataTable.search(searchTerm).draw();

});
   
  document.addEventListener("DOMContentLoaded", function() {
               
               showDesignationData();
              //  showBranchData();
               
               var designationNameFilterInput = document.getElementById('designationNameFilterInput');
             

                $('#clearBranchFilter').click(function(){
                   $("input[name='branch_mandate_filter']:checked").prop("checked", false);
                   branchFilterChange();
                });

         

                $('#clearMoreFilter').click(function(){


                   dataTable.column('designations.designation_name:name').search('', true).draw();
             
                
                   $("#designationNameFilter").prop("checked", false);
                   
                
                   handleCheckboxChange('designationNameFilter', 'designationNameFilterValue');
               

                   designationNameFilterInput.value='';
                 

                });


              //   function branchFilterChange(){
              //       var branch_mandate_filter = $('input:checkbox[name="branch_mandate_filter"]:checked').map(function() {
              //              return '^' + this.value + '$';
              //          }).get().join('|');
              
              //       dataTable.column('bank_branches.branch_name:name').search(branch_mandate_filter, true).draw(); // Set regex flag to true
      
              //   }
            
              //  $("input[name='branch_mandate_filter']").change(function () { 

              //    branchFilterChange();
              //  });


              


               designationNameFilterInput.addEventListener('keyup', function () {
                   // var customerNameColumnIndex = dataTable.column('mandate_customers.customer_name:name').index();
                   
                   dataTable.column('designations.designation_name:name').search(this.value, true).draw(); // Set regex flag to true
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


    $('#searchTextCustomer').on('input', function() {

// var dataTable = $('#dataTable').DataTable({});
 searchTerm = $(this).val();
dataTable.search(searchTerm).draw();

// var apiUrl = '<?php echo base_url(); ?>api/User/search/';

// $.ajax({
//     type: 'get',
//     url: apiUrl + encodeURIComponent(searchTerm),
//     dataType: 'json',
//     beforeSend: function(xhr) {
//         xhr.setRequestHeader('X-API-KEY', 'enachSyncWorks');
//     },
//     success: function(response){
//         // Handle the search results
//         console.log(response);
//     },
//     error: function(response){
//         var data = JSON.parse(response.responseText);
//         toastr.error(data.message);
//     }
// });
});


 function showDesignationData(){
    if ($.fn.DataTable.isDataTable('#designationdataTable')) {
        $('#designationdataTable').DataTable().destroy();
    }
  

    dataTable =   $('#designationdataTable').DataTable({
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
                 'url': "<?php echo base_url() ?>api/Designation/showDesignationData",
                 'async': false,
                 'method':'get',
                 'dataType': 'json',
                 'beforeSend': function(xhr) {
                     xhr.setRequestHeader('X-API-KEY','enachSyncWorks');    
                 },

                 'error': function (error) {
                     toastr.error("Designations does not found");
                     
                  }
            },
             
  
            'columns': [
  
                 {
                    "data": null,
                    "render": function (data, type, row, meta) {
                       return  meta.row + meta.settings._iDisplayStart + 1; // Increment index by 1 to display serial number
                     }
                 },       
                 { data: 'designation_name',name:'designations.designation_name' },
              
                 { 
                    "data": null,
                //   name:'action',
                     orderable: false,
                    "render": function (data, type, row) {
                        var html = '';
                       

                        <?php if(in_array('updateDesignation', $user_permission) || in_array('viewDesignation', $user_permission) || in_array('deleteDesignation', $user_permission)): ?>
                        html += '<div class="position-relative">';
                        html += '<div class="hover-actions">';
                        

                        <?php if(in_array('viewDesignation', $user_permission)): ?>
                        
                        html+='<button class="btn btn-sm btn-phoenix-primary me-1 fs--2 item-view" data="'+row.id+'"><span class="uil-eye"></span></button>';
                        <?php endif; ?>
                       

                       <?php if(in_array('updateDesignation', $user_permission)): ?>

                        html+='<button class="btn btn-sm btn-soft-warning me-1 fs--2  item-edit" data="'+row.id+'"><span class="fas fa-pencil" ></span> </button>';
                       
                       <?php endif; ?>

                       <?php if(in_array('deleteDesignation', $user_permission)): ?>
                       
                        html+='<button class="btn btn-sm btn-soft-danger me-1 fs--2  item-delete" data="'+row.id+'"><span class="uil-trash"></span> </button>';
                       
                       <?php endif; ?>
                     
                        html += '</div>';
                        html += '</div>';
                        html += '<div class="font-sans-serif btn-reveal-trigger position-static">';
                        html += '<button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs--2" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--2"></span></button>';

                        html += '<div class="dropdown-menu dropdown-menu-end py-2">';
                     
                         <?php if(in_array('viewDesignation', $user_permission)): ?>
                       
                        html+='<a class="dropdown-item item-view" data="'+row.id+'" href="#!"><span class="uil-eye"></span></a>';
                         <?php endif; ?>
                        
                        <?php if(in_array('updateDesignation', $user_permission)): ?>
                        html+='<a class="dropdown-item item-edit" data="'+row.id+'" href="#!"><span class="fas fa-pencil" ></span> </a>';
                        <?php endif; ?>

                        <?php if(in_array('deleteDesignation', $user_permission)): ?>
                        html+='<a class="dropdown-item item-delete" data="'+row.id+'" href="#!"><span class="uil-trash"></span></a>';
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
          url: "<?php echo base_url()?>api/Designation/exportDesignationData",
          data: {
              'columnProperties': columnProperties,
              'searchText': searchText,
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
                  html += '<td class="order py-2 align-middle white-space-nowrap srno"><a class="fw-semi-bold" href="#">' + x + '</a></td>';
                  html += '<td class="align-middle designstion_name">' + data[i].designation_name + '</td>';
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
              link.download = 'Mandate-Designation-' + currentDateC;
              document.body.appendChild(link);
              link.click();
              document.body.removeChild(link);
          },
          error: function(error) {
              console.error('Error fetching data:', error);
          }
      });
  }

  // ///////////

      //  showDesginationsData(1);
       $('#addGovt').click(function(){
    
          $('#myFormDesignation')[0].reset();
          $('#btnSaveDesignation').html('Submit');
          $('#exampleModalCenter').find('.modal-title').text('Add Designation');
          $('#myFormDesignation').attr('action','<?php echo base_url(); ?>api/Designation/insert');

      });

      $('#btnSaveDesignation').click(function(){
          
            document.getElementById("designation_name").classList.remove("is-invalid");
       
          
             var url = $('#myFormDesignation').attr('action');
             var data = $('#myFormDesignation').serialize();
          
             var designation_name = $('input[name=designation_name]');
          
             var permissions = $('input[name=permission]');
          // var result = '';
             var permission = document.getElementById('permission');
           
              if (designation_name.val()=='') {
                document.getElementById("designation_name").classList.add("is-invalid");
                 toastr.error("Please Enter Designation Name");
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

                         $('#myFormDesignation')[0].reset();
                         $('#exampleModalCenter').modal('hide');

                         if (response.status) {

                             toastr.success(response.message);
                         }
                         else{
                             toastr.error(response.message);
                         }
                         showDesignationData();
                          
                    },

                    error: function(response){
                             var data =JSON.parse(response.responseText);
                             toastr.error(data.message);
                      }

                  });
              }
           });



        // function showDesginationsData(page) {
        //   var searchTextDesignation = $('#searchTextDesignation').val();

        //     $.ajax({
        //         type: 'ajax',
        //         url: "<?php echo base_url() ?>api/Designation/"+page,
        //         async: false,
        //         method:'get',
        //         data:{'searchTextDesignation':searchTextDesignation},
        //         dataType: 'json',
        //         beforeSend: function(xhr) {
        //             xhr.setRequestHeader('X-API-KEY','enachSyncWorks');
        //         },
        //         success: function(response) {
        //             // body...
        //             var serialNumber = (page - 1) * 10 + 1;
        //             data=response.data;
        //             var html="";
        //             var tbt="";
        //             var i ="";

        //             for (var i = 0; i < data.length; i++) {
        //               // var x=i+1;
        //               var x = serialNumber++;
            
                                           
        //               html+='<tr><td class="order py-2  ps-3 align-middle white-space-nowrap srno"><a class="fw-semi-bold" href="#">'+x+' </a></td>'+
        //                         '<td class="align-middle ps-3 name">'+data[i].designation_name+'</td>';
                       
        //                     <?php //if(in_array('viewDesignation', $user_permission) ||  in_array('updateDesignation', $user_permission) 
        //                                 || 
        //                        in_array('deleteDesignation', $user_permission)): ?>
                                  
        //                     html+='<td class="align-middle white-space-nowrap text-end pe-0">'+
        //                           '<div class="font-sans-serif btn-reveal-trigger position-static">'+
        //                             '<button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs--2" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><svg class="svg-inline--fa fa-ellipsis fs--2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="ellipsis" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M120 256C120 286.9 94.93 312 64 312C33.07 312 8 286.9 8 256C8 225.1 33.07 200 64 200C94.93 200 120 225.1 120 256zM280 256C280 286.9 254.9 312 224 312C193.1 312 168 286.9 168 256C168 225.1 193.1 200 224 200C254.9 200 280 225.1 280 256zM328 256C328 225.1 353.1 200 384 200C414.9 200 440 225.1 440 256C440 286.9 414.9 312 384 312C353.1 312 328 286.9 328 256z"></path></svg><!-- <span class="fas fa-ellipsis-h fs--2"></span> Font Awesome fontawesome.com --></button>'+
        //                            ' <div class="dropdown-menu dropdown-menu-end py-2">';
        //                               <?php// if(in_array('viewDesignation', $user_permission)):?> 
                                   
        //                             html+='<a class="dropdown-item item-view" data="'+data[i].id+'"><span class="uil-eye"></span> View</a>';
                                
        //                             <?php// endif; ?>
                                  
        //                           <?php// if(in_array('updateDesignation', $user_permission)):?> 
        //                             html+='<a class="dropdown-item item-edit" data="'+data[i].id+'"><span class="uil-edit" ></span> Edit</a>';
        //                           <?php// endif; ?>
                                   
        //                           <?php// if(in_array('deleteDesignation', $user_permission)):?>  
        //                             html+='<div class="dropdown-divider"></div>';
                          
        //                             html+='<a class="dropdown-item text-danger item-delete" data="'+data[i].id+'"><span class="uil-trash"></span> Delete</a>';

        //                            html+='</div>';
        //                            <?php// endif; ?>
        //                          html+='</div>'+
        //                        ' </td>';

        //                     <?php// endif; ?>

        //                 html+='</tr>';

        //             }
        //             <?php// if(in_array('viewDesignation', $user_permission)): ?>
        //            $('#userData').html(html);  <?php //endif; ?>
        //            $('#totaldesignation').html(response.total_rows);
        //             display_designationwise(response.total_rows, page);
        //             exportToExcel();

        //                  },
        //              error: function(response){
        //                var data =JSON.parse(response.responseText);
        //                toastr.error(data.message);
        //                 }

        //     });

        // }

         // report export to excelid="dataTable"
//          function exportToExcelx() {
//     // alert("vikas");
//   var table = document.getElementById('reporttableexcel');
//   var sheetData = XLSX.utils.table_to_sheet(table);
//   var wb = XLSX.utils.book_new();
//   XLSX.utils.book_append_sheet(wb, sheetData, 'Sheet1');

//   // Convert the workbook to a data URL
//   var dataURL = XLSX.write(wb, { bookType: 'xlsx', type: 'base64' });

//   // Create a download link and trigger the download
//   var link = document.createElement('a');
//   link.href = 'data:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet;base64,' + dataURL;
//   link.download = 'exported_data.xlsx';
//   document.body.appendChild(link);
//   link.click();
//   document.body.removeChild(link);
// }



// function exportToExcel() {
//     var designation_name  = $('#designation_name').val();

//     $.ajax({
//                 type: 'ajax',
//                 url: "<?php echo base_url() ?>api/Designation/",
//                 async: false,
//                 method:'get',
//                 data:{'designation_name': designation_name},
//                 dataType: 'json',
//                 beforeSend: function(xhr) {
//                     xhr.setRequestHeader('X-API-KEY','enachSyncWorks');
//                 },
//                 success: function(response) {
//                     // body...
//                     // var serialNumber = (page - 1) * 10 + 1;
//                     data=response.data;
//                     var html="";
//                     var tbt="";
//                     var i ="";

//                     for (var i = 0; i < data.length; i++) {
//                       var x=i+1;
//                       // var x = serialNumber++;
            
                                           
//                       html+='<tr><td class="order py-2  ps-3 align-middle white-space-nowrap srno"><a class="fw-semi-bold" href="#">'+x+' </a></td>'+
//                                 '<td class="align-middle ps-3 name">'+data[i].designation_name+'</td>';
                       
                            
                          
                             

//                         html+='</tr>';

//                     }
                  
//                     $('#showReportResultexcel').html(html);

//                          },
//                      error: function(response){
//                       //  var data =JSON.parse(response.responseText);
//                       //  toastr.error(data.message);
//                         }

//             });

  
// }


        function    display_designationwise(totalRows, currentPage) {
        var itemsPerPage = 10; // Assuming 10 records per page
        var totalPages = Math.ceil(totalRows / itemsPerPage);
        var maxButtonsToShow = 5; // Set the maximum number of buttons to show

        var pagination = '<ul class="pagination justify-content-center">';

       // First button
        pagination += '<li class="page-item ' + (currentPage === 1 ? 'disabled' : '') + '">';
        pagination += '<button class="page-link" onclick=" showDesginationsData(1)" aria-label="First">';
        pagination += '<span aria-hidden="true">&laquo;&laquo;</span></button></li>';

        // Previous button
        pagination += '<li class="page-item ' + (currentPage === 1 ? 'disabled' : '') + '">';
        pagination += '<button class="page-link" data-list-pagination="prev" onclick=" showDesginationsData(' + (currentPage - 1) + ')" aria-label="Previous">';
        pagination += '<span aria-hidden="true">&laquo;</span></button></li>';

        // Page buttons
        var startPage = Math.max(1, currentPage - Math.floor(maxButtonsToShow / 2));
        var endPage = Math.min(totalPages, startPage + maxButtonsToShow - 1);

        for (var i = startPage; i <= endPage; i++) {
            pagination += '<li class="page-item ' + (i === currentPage ? 'active' : '') + '">';
            pagination += '<button class="page-link" onclick=" showDesginationsData(' + i + ')">' + i + '</button></li>';
        }

        // Next button
        pagination += '<li class="page-item ' + (currentPage === totalPages ? 'disabled' : '') + '">';
        pagination += '<button class="page-link" data-list-pagination="next" onclick=" showDesginationsData(' + (currentPage + 1) + ')" aria-label="Next">';
        pagination += '<span aria-hidden="true">&raquo;</span></button></li>';

           // Last button
        pagination += '<li class="page-item ' + (currentPage === totalPages ? 'disabled' : '') + '">';
        pagination += '<button class="page-link" onclick=" showDesginationsData(' + totalPages + ')" aria-label="Last">';
        pagination += '<span aria-hidden="true">&raquo;&raquo;</span></button></li>';


        pagination += '</ul>';

        $('#designationwise').html(pagination);
    }



    //edit
$('#userData').on('click', '.item-edit', function(){
    var id = $(this).attr('data');
    $('#exampleModalCenter').modal('show');
     $('#btnSaveDesignation').html('Update');
     document.getElementById("btnSaveDesignation").disabled = false;
    $('#exampleModalCenter').find('.modal-title').text('Edit Designation Details');
    $('#myFormDesignation').attr('action','<?php echo base_url(); ?>api/Designation/update');
    document.getElementById("designation_name").readOnly=false;
    $.ajax({
        type: 'ajax',
        method: 'get',
        url: '<?php echo base_url(); ?>api/Designation/row',
        data:{'id': id},  
        async: false,
        dataType: 'json',
        beforeSend: function(xhr) {
            xhr.setRequestHeader('X-API-KEY','enachSyncWorks');
        },
        success: function(response){
           data=response.data;
           permissions=response.permissions; 
          //permissions=data.permissions;
             $('input[name=designation_name]').val(data.designation_name);
          
             $('input[name=id]').val(data.id);
              
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
            
				// Branch
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

            	showDesignationData();
			 },
             error: function(response){
                     var data =JSON.parse(response.responseText);
                     toastr.error(data.message);
              }
              });

          });  


        $('#userData').on('click','.item-delete',function(){
            var id= $(this).attr('data');
             
            $('#myModal_for_delete_message').find('.modal-title').text('Delete Designation');
            $('#myModal_for_delete_message').modal('show');

            $('#btdelete').unbind().click(function(){
                $.ajax({
                    type: 'ajax',
                    method: 'post',
                    async: false,
                    url: '<?php echo base_url(); ?>api/Designation/delete/'+id,
                    data: {'id': id},
                    dataType: 'json',
                     beforeSend: function(xhr) {
                          xhr.setRequestHeader('X-API-KEY','enachSyncWorks');
                      },
                    success: function(response)
                    {
                          $('#myModal_for_delete_message').modal('hide');
                          
                          toastr.success(response.message);
                          showDesignationData();
                    },

                       error: function() 
                    {
                      $('#myModal_for_delete_message').modal('hide');
                      showDesignationData();
                      toastr.error(response.message);

                    }
                });

            });

        });

  $('#userData').on('click', '.item-view', function(){
    
    var id = $(this).attr('data');
    $('#exampleModalCenter').modal('show');
    $('#btnSaveDesignation').html('Update');
    $('#exampleModalCenter').find('.modal-title').text('View Designation Details');
    $('#myFormDesignation').attr('action','<?php echo base_url(); ?>api/Designation/update');

    document.getElementById("btnSaveDesignation").disabled = true;
     document.getElementById("designation_name").readOnly=true;
      
    
    $.ajax({
        type: 'ajax',
        method: 'get',
        url: '<?php echo base_url(); ?>api/Designation/row',
        data:{'id': id},  
        async: false,
        dataType: 'json',
        beforeSend: function(xhr) {
            xhr.setRequestHeader('X-API-KEY','enachSyncWorks');
        },
        success: function(response){
           data=response.data;
           permissions=response.permissions; 
          //permissions=data.permissions;
             $('input[name=designation_name]').val(data.designation_name);
           
             $('input[name=id]').val(data.id);
              
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

              $("input[value='createBranch']").prop('checked', false);
              $("input[value='updateBranch']").prop('checked', false);
              $("input[value='viewBranch']").prop('checked', false);
              $("input[value='deleteBranch']").prop('checked', false);
              $("input[value='exportBranch']").prop('checked', false);
			  $("input[value='importBranch']").prop('checked', false);
              $("input[value='skipBranch']").prop('checked', false);

              $("input[value='createExport']").prop('checked', false);
              $("input[value='updateExport']").prop('checked', false);
              $("input[value='viewExport']").prop('checked', false);
              $("input[value='deleteExport']").prop('checked', false);
              $("input[value='exportExport']").prop('checked', false);
			  $("input[value='importExport']").prop('checked', false);
              $("input[value='skipExport']").prop('checked', false);

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

                // Export
                if( $.inArray("createExport", permissions) !== -1 ) {

                $("input[value='createExport']").prop('checked', true);
                }
             
                if( $.inArray("updateExport", permissions) !== -1 ) {

                $("input[value='updateExport']").prop('checked', true);
                }
                 if( $.inArray("viewExport", permissions) !== -1 ) {

                $("input[value='viewExport']").prop('checked', true);
                }
                 if( $.inArray("deleteExport", permissions) !== -1 ) {

                $("input[value='deleteExport']").prop('checked', true);
                }
                if( $.inArray("exportExport", permissions) !== -1 ) {

                $("input[value='exportExport']").prop('checked', true);
                }
                if( $.inArray("importExport", permissions) !== -1 ) {

                $("input[value='importExport']").prop('checked', true);
                }
                if( $.inArray("skipExport", permissions) !== -1 ) {

                $("input[value='skipExport']").prop('checked', true);
                }

                if( $.inArray("viewSystemLogs", permissions) !== -1 ) {

                $("input[value='viewSystemLogs']").prop('checked', true);
                }
                 
              },
               error: function(response){
                     var data =JSON.parse(response.responseText);
                     toastr.error(data.message);
              }
              });

          });  


          document.getElementById('btnSaveDesignation').addEventListener('click', function(event) {
        var designationInput = document.getElementById('designation_name');
        var designationError = document.getElementById('designationError');
        // Check if the input value matches the pattern
        var regex = /^[A-Z]+$/;
        if (!regex.test(designationInput.value)) {
            // If the input value does not match the pattern, show the error message and prevent form submission
            designationError.style.display = 'block';
            event.preventDefault();
        } else {
            // If the input value matches the pattern, hide the error message
            designationError.style.display = 'none';
        }
    });
         
      </script>
    
<script type="text/javascript">
$('#searchButtonDesignation').on('click', function() {
  showDesignationData(1);
});
</script>