<div class="content">
        <nav class="mb-2" aria-label="breadcrumb">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="<?php echo base_url();?>">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url('Settings');?>">Settings</a></li>
            <li class="breadcrumb-item active"><?php echo $page_name;?></li>
          </ol>
        </nav> 
        
          <div class="row g-3 mb-2">
            <div class="col-auto">
              <h3 class="mb-0"><?php echo $page_name;?></h3>
            </div>
          </div>

        <?php if(in_array('viewBranch', $user_permission) || in_array('updateBranch', $user_permission)  || in_array('deleteBranch', $user_permission)): ?>

        <!-- Changes -->
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

                                   <label class="form-check-label" for="customerNameFilter">Branch Address</label>
                                    <div id="customerNameFilterValue" class="d-none">
                                        <input type="text" id="customerNameFilterInput" class="form-control form-control-sm mt-1" placeholder="Branch Address" name="customerNameFilterInput">
                                    </div>
                               </div>
                            </li>
                            
                            <li>
                               <div class="dropdown-item">
                                   <input class="form-check-input" type="checkbox" value="phoneFilter" id="phoneFilter" onchange="handleCheckboxChange('phoneFilter', 'phoneFilterValue')">
                                   <label class="form-check-label" for="phoneFilter">City</label>
                                    <div id="phoneFilterValue" class="d-none">

                                      <input type="text" id="phoneFilterInput" class="form-control form-control-sm mt-1" placeholder="City" name="phoneFilterInput">


                                    </div>
                               </div>
                            </li>
                            
                         
                            <li>
                                <div class="dropdown-item">
                                   <input class="form-check-input" type="checkbox" value="emailFilter" id="emailFilter"  onchange="handleCheckboxChange('emailFilter', 'emailFilterValue')">
                                   <label class="form-check-label" for="emailFilter">State</label>
                                   <div id="emailFilterValue" class="d-none">
                                     
                                        <input type="email" id="emailFilterInput" class="form-control form-control-sm mt-1" placeholder="State" name="emailFilterInput">
                                   </div>
                                </div>
                            </li>


                        </ul>
                    </div>

                  </div>
                </div>

                <div class="ms-xxl-auto ms-xl-auto ms-lg-auto ms-md-auto ms-sm-auto">


                 <?php if(in_array('createBranch', $user_permission)):?> 
                    
                       <button type="button" id="addGovt" class="btn btn-primary btn-sm item-govt" data-bs-toggle="modal" data-bs-target="#Addbranch"><span class="fas fa-plus me-2"></span>Add Branches</button>

               
                 <?php endif; ?>

                  <?php if(in_array('importBranch', $user_permission)):?> 

                    <button type="button" id="ImportBankUser" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#bankUserImportModalCenter"><span class="fas fa-upload me-2"></span>Import Branch</button>

                 <?php endif; ?>

                    </div>
              </div>
            </div>

        <?php endif; ?>

        <!-- changes -->

        <div class="card" >
 
            <div class="card-body">
                
                 <?php if(in_array('viewBranch', $user_permission)):?> 
           
                        <div class="table-responsive  mx-1 px-1">

                            <table class="table mb-0 fs--1 compact table-hover w-100" id="branchesdataTable" >
                                  <thead>
                                    <tr>
                                    <th class="white-space-nowrap border-top" >Sr No</th>
                                      <th class="white-space-nowrap border-top">Name</th>
                                        <th class="white-space-nowrap border-top">Address</th>

                                        <th class="white-space-nowrap border-top">City</th>

                                        <th class="white-space-nowrap border-top">State</th>

                                        <?php if(in_array('updateBranch', $user_permission)  || in_array('deleteBranch', $user_permission)): ?>
                                      <th class="white-space-nowrap border-top" scope="col">Action</th>
                                      <?php endif; ?>

                                    </tr>
                                  </thead>
                                  <tbody class="list" id="showBranchesData">
                          
                              
                              </tbody>
                            </table>
                          </div>
                   <?php endif; ?>
                    <table class="table table-striped table-sm fs--1 mb-0 d-none" id="reporttableexcel">

                        <thead>
                           <tr> 
                                <th class="white-space-nowrap border-top" >Sr No</th>
                                <th class="white-space-nowrap border-top">Name</th>
                                <th class="white-space-nowrap border-top">Address</th>

                                <th class="white-space-nowrap border-top">City</th>

                                <th class="white-space-nowrap border-top">State</th>
                      
                                
                            </tr>
                       </thead>
                       <tbody class="list" id="showReportResultexcel">

                       </tbody>

                    </table>
                 </div>

              </div>
            </div>
          </div>
      </div>
       <div class="modal fade modal-lg" id="Addbranch" tabindex="-1" aria-labelledby="scrollingLongModalLabel2" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="tooltipModalLabel">Add Branch</h5>
              <button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><span class="fas fa-times fs--1"></span></button>
            </div>
            <div class="modal-body">
                <form id="myFormbankBranch" action="" class="row g-3">
                  
                    <input type="hidden" name="id">
                    <input type="hidden" name="bank_id" value="1">
                  
                    <div class="col-md-12">
                      <label class="form-label" for="branch_name">Branch Name</label>
                      <input class="form-control" name="branch_name" id="branch_name" type="text">
                    </div>

                     <div class="col-md-12">
                      <label class="form-label" for="branch_address">Branch Address</label>

                      <textarea class="form-control"  name="branch_address" id="branch_address"></textarea>
              
                    </div>
                     <div class="col-md-12">
                       <label class="form-label" for="customer_state">State<span class="text-danger">*</span></label>
                   <div id="stateListData"></div>
                   </div>
                   <div class="col-md-12">
                   <label class="form-label" for="customer_city">City<span class="text-danger">*</span></label>
                   <div id="cityListData"></div>
                  </div>

                </div>
                    <div class="modal-footer">
              <button class="btn btn-primary" id="btnSaveBranch" type="button">Submit</button>
              <button class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Close</button>
            </div>
        </form>
    </div>
</div>
</div>


      <div class="modal fade" id="bankUserImportModalCenter" tabindex="-1" aria-labelledby="scrollingLongModalLabel2" aria-hidden="true" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="tooltipModalLabel">Import Branches</h5>
              <button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><span class="fas fa-times fs--1"></span></button>
            </div>
            <div class="modal-body">
                  <p  class="form-label mb-5 text-danger" id="help_text">Import Your File, <a href="<?php echo base_url('Banks/branch_import_template/')?>">Click Here</a> for file format.</p>
                       
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

 <div class="modal fade" id="myModal_for_delete_message1" tabindex="-1" aria-labelledby="scrollingLongModalLabel2" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="tooltipModalLabel">Delete Branches</h5>
                <button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><span class="fas fa-times fs--1"></span></button>
              </div>
              <div class="modal-body">
                Are sure to delete this branches ?
              </div>
              <div class="modal-footer">
                <button class="btn btn-danger" id="btdelete" type="button">Delete</button>
                <button class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>          

        <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.4/xlsx.full.min.js"></script>
<script>
  

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
               
               <?php if(in_array('viewBranch', $user_permission)):?> 
               showBankUsersData();
               showBankBranchData();
           <?php endif; ?>
     
               var customerNameFilterInput = document.getElementById('customerNameFilterInput');
               var phoneFilterInput = document.getElementById('phoneFilterInput');
               var emailFilterInput = document.getElementById('emailFilterInput');
             
                $('#clearBranchFilter').click(function(){
                   $("input[name='branch_mandate_filter']:checked").prop("checked", false);
                   branchFilterChange();
                });

               

                $('#clearMoreFilter').click(function(){


                  //  dataTable.column('users.firstname:name').search('', true).draw();
                  // dataTable.column('fullname:name').search(fullName, true, false).draw();
                  dataTable.column('bank_branches.branch_name:name').search('', true).draw();

                   dataTable.column('bank_branches.branch_address:name').search('', true).draw();
                   dataTable.column('cities.name:name').search('', true).draw();
                   dataTable.column('states.state_title:name').search('', true).draw();

                 
                
                   $("#customerNameFilter").prop("checked", false);
                   
                   $("#phoneFilter").prop("checked", false);
                   $("#emailFilter").prop("checked", false);
                 
                 
                   handleCheckboxChange('customerNameFilter', 'customerNameFilterValue');
                   handleCheckboxChange('phoneFilter', 'phoneFilterValue');
                   handleCheckboxChange('emailFilter', 'emailFilterValue');

                   customerNameFilterInput.value='';
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


                customerNameFilterInput.addEventListener('keyup', function () {
                   dataTable.column('bank_branches.branch_address:name').search(this.value, true).draw(); // Set regex flag to true
               });  

               phoneFilterInput.addEventListener('keyup', function () {
                   dataTable.column('cities.name:name').search(this.value, true).draw(); // Set regex flag to true
               });

               emailFilterInput.addEventListener('keyup', function () {
                   dataTable.column('states.state_title:name').search(this.value, true).draw(); // Set regex flag to true
               });
    });
    
      function showBankUsersData(){
            if ($.fn.DataTable.isDataTable('#branchesdataTable')) {
                $('#branchesdataTable').DataTable().destroy();
            }
          

            dataTable =   $('#branchesdataTable').DataTable({
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


                                <?php if(in_array('exportBranch', $user_permission)): ?>


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
                         'url': "<?php echo base_url() ?>api/Bank/showUsersBranchList/",
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
                        
                        //  { data: 'firstname',name:'users.firstname' },
                         { data: 'branch_name',name:'bank_branches.branch_name', orderable: false, },
                      
                         { data: 'branch_name',name:'bank_branches.branch_address', orderable: false, },
                         { data: 'name',name:'cities.name', orderable: false, },

                         { data: 'state_title',name:'states.state_title', orderable: false, },
                        //  { data: 'account_no',name:'mandate_customers.account_no', orderable: false, },
                         { 
                            "data": null,
                        //   name:'action',
                             orderable: false,
                            "render": function (data, type, row) {
                                var html = '';
                              
                                <?php if(in_array('updateBranch', $user_permission) || in_array('viewBranch', $user_permission) || in_array('deleteBranch', $user_permission)): ?>
                                html += '<div class="position-relative">';
                                html += '<div class="hover-actions">';
                               
                                 <?php if(in_array('viewBranch', $user_permission)):?>
                            
                                 html+='<button class="btn btn-sm btn-phoenix-primary me-1 fs--2  item-view" data="'+row.branch_id+'" href="#!"   ><span class="uil-eye"></span></button>';
                                <?php endif; ?>
                               
                               <?php if(in_array('updateBranch', $user_permission)):?>
                               
                                html+='<button class="btn btn-sm btn-soft-warning me-1 fs--2  item-edit"  data="'+row.branch_id+'" href="#!" ><span class="fas fa-pencil"></span></button>';
                              
                               <?php endif; ?>


                                <?php if(in_array('deleteBranch', $user_permission)):?>
                                   html+='<button class="btn btn-sm btn-soft-danger me-10 fs--2  item-delete " data="'+row.branch_id+'" ><span class="uil-trash"></span></button>';
                                <?php endif; ?>
                                
                                html += '</div>';
                                html += '</div>';
                                html += '<div class="font-sans-serif btn-reveal-trigger position-static">';
                                html += '<button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs--2" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--2"></span></button>';
                                html += '<div class="dropdown-menu dropdown-menu-end py-2">';
                                
                                 <?php if(in_array('viewBranch', $user_permission)):?>
                                
                                html+='<a class="dropdown-item item-view" data="'+row.branch_id+'" href="#!"><span class="uil-eye"></span> View</a>';
                                <?php endif; ?>
                                
                                <?php if(in_array('updateBranch', $user_permission)):?>

                                html+='<a class="dropdown-item item-edit"  data="'+row.branch_id+'" href="#!" ><span class="uil-edit"></span> Edit</a>';

                                <?php endif; ?>

                                <?php if(in_array('deleteBranch', $user_permission)):?>
                                
                                html+='<a class="dropdown-item text-danger item-delete"  data="'+row.branch_id+'"><span class="uil-trash"></span> Delete</a>';
                                
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
                    name: column.header().innerText, // Get column name from header
                    searchValue: column.search(),
                };
                // Add column properties to the array
                columnProperties.push(columnData);
            });

            $.ajax({
                type: 'GET',
                url: "<?php echo base_url()?>api/Bank/exportbranchDetails",
                data: {
                    'columnProperties': JSON.stringify(columnProperties), // Serialize array to JSON string
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
                        html += '<tr>' +
                            '<td class="align-middle ps-3 srno">' + x + '</td>' +
                            '<td class="align-middle ps-3 name">' + data[i].branch_name + '</td>' +
                            '<td class="align-middle ps-3 address">' + data[i].branch_address + '</td>' +
                            '<td class="align-middle ps-3 city">' + data[i].name + '</td>' +
                            '<td class="align-middle ps-3 state">' + data[i].state_title + '</td>' +
                            '</tr>';
                    }
                    $('#showReportResultexcel').html(html);
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
                    link.download = 'Mandate-Branch-' + currentDateC; // Unique filename with timestamp
                    document.body.appendChild(link);
                    link.click();
                    document.body.removeChild(link);
                },
                error: function(error) {
                    console.error('Error fetching data:', error);
                }
            });
        }

      

         
       function showBankBranchData(id) {
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

 
  // ///////////////////
    // show all the branches


          $('#addGovt').click(function(){
              showState();
                 document.getElementById("btnSaveBranch").disabled = false;
                    document.getElementById("branch_name").readOnly=false;
                    document.getElementById("branch_address").readOnly=false;
              
                     document.getElementById("state_id").disabled =false;
                     
                  $('#myFormbankBranch')[0].reset();  
                  $('#btnSaveBranch').html('Submit');
                  $('#Addbranch').find('.modal-title').text('Add Branch');
                  $('#myFormbankBranch').attr('action','<?php echo base_url(); ?>api/Bank/insertBankBranch');
                  

          });
            

       $('#btnSaveBranch').click(function(){

         var data =  $('#myFormbankBranch').serialize();
        
         var branch_name =  $('input[name=branch_name]').val();
       
         var state_id =  $('select[name=state_id]').val();
         var city_id =  $('select[name=city_id]').val();
         
         var branch_address =  $('textarea[name=branch_address]').val();


         var id =  $('input[name=id]').val();
         
         var bank_id = 1;

         if(branch_name==""){
          toastr.error("Please Enter Branch Name");
         }

         else if(branch_address==""){
            toastr.error("Please Enter Branch Address");
          }

         else if(state_id==""){
            toastr.error("Please Select Branch State");

         }
         else if(city_id==""){
            toastr.error("Please Select Branch City");

         }
          else{
            $.ajax({
                  type: 'ajax',
                  method:'post',
                  url: $('#myFormbankBranch').attr('action'),
                  data: data,
                  async: false,
                  dataType: 'json',
                  beforeSend: function(xhr) {
                      xhr.setRequestHeader('X-API-KEY','enachSyncWorks');
                  },
                  success: function(response){

                     $('#myFormbankBranch')[0].reset();
                     $('#Addbranch').modal('hide');

                      if (response.status) {
                       toastr.success(response.message);
                      showBankBranchData(1);

                      }
                      else{
                         toastr.error(response.message);
                      }
                    
                      
                  },

                error: function(response){
                         var data =JSON.parse(response.responseText);
                         toastr.error(data.message);
                  }

              });


          }
       
       });
    // call the showBranches function to show the all branch data 
  
     // Delete the Branches
         $('#showBranchesData').on('click','.item-delete',function(){    
            var id = $(this).attr('data');
            $('#myModal_for_delete_message1').find('.modal-title').text('Delete Branch');
            $('#myModal_for_delete_message1').modal('show');

            $('#btdelete').unbind().click(function(){
                $.ajax({
                    type: 'ajax',
                    method: 'post',
                    async: false,
                    url: '<?php echo base_url(); ?>api/Bank/deleteBranch/'+id,
                    data: {'branch_id': id},
                    dataType: 'json',
                     beforeSend: function(xhr) {
                          xhr.setRequestHeader('X-API-KEY','enachSyncWorks');
                      },
                    success: function(response)
                    {
                         $('#myModal_for_delete_message1').modal('hide');
                           toastr.success(response.message);
                            showBankBranchData(1);
                     },
               error: function() 
                    {
                      $('#myModal_for_delete_message1').modal('hide');
                             showBankBranchData(1);
                      toastr.error(response.message);

                    }
                });

            });

        });


  
    // Edit
        $('#showBranchesData').on('click', '.item-edit', function(){
        var id = $(this).attr('data');
          showState();
        $('#Addbranch').modal('show');
         $('#btnSaveBranch').html('Update');
         document.getElementById("btnSaveBranch").disabled = false; 
        $('#Addbranch').find('.modal-title').text('Edit Branches Details');
        $('#myFormbankBranch').attr('action','<?php echo base_url(); ?>api/Bank/updateBankBranchfirst');
          document.getElementById("branch_name").readOnly=false;
          document.getElementById("branch_address").readOnly=false;
     
          document.getElementById("btnSaveBranch").disabled = false; 
          document.getElementById("state_id").disabled =false;
          brancheseditview(id);
      });


      //view
        $('#showBranchesData').on('click', '.item-view', function(){
        var id = $(this).attr('data');
           showState();
        $('#Addbranch').modal('show');
        $('#Addbranch').find('.modal-title').text('View Branches Details');
        document.getElementById("branch_name").readOnly=true;
        document.getElementById("branch_address").readOnly=true;
        // document.getElementById("branchStateListData").readOnly=true;
        // document.getElementById("branchCityListData").readOnly=true;
        document.getElementById("btnSaveBranch").disabled =true;
        document.getElementById("state_id").disabled =true;
          brancheseditview(id);
      });



      function brancheseditview(id) // show edit and view 
      {
           $.ajax({
        type: 'ajax',
        method: 'get',
        url: '<?php echo base_url(); ?>api/Bank/showBranchDetails',
        data:{'id': id},  
        async: false,
        dataType: 'json',
        beforeSend: function(xhr) {
            xhr.setRequestHeader('X-API-KEY','enachSyncWorks');
        },
        success: function(response){
        data1=response.data;
        permissions=response.permissions; 
        $('input[name=branch_name]').val(data1.branch_name);
        $('textarea[name=branch_address]').val(data1.branch_address);
        // $('select[name=state_id]').val(data1.branch_state_id);
         $('select[name=state_id]').val(data1.branch_state_id);
        showCitiesDropdown(data1.branch_state_id);
        // $('select[name=city_id]').val(data1.branch_city_id);
         $('select[name=city_id]').val(data1.branch_city_id);
        $('input[name=id]').val(id);
        },
        error: function(response){
          var data =JSON.parse(response.responseText);
          toastr.error(data.message);
            }
        });
    }



    function showState() {
      $.ajax({
        type: 'ajax',
        url: "<?php echo base_url() ?>api/Bank/showAllStates",
        async: false,
        method: 'get',
        dataType: 'json',
        beforeSend: function(xhr) {
          xhr.setRequestHeader('X-API-KEY', 'enachSyncWorks');
        },
        success: function(response) {
          data = response.data;
          var html = '<select class="form-select" id="state_id"  name="state_id" onchange="showCitiesDropdown(this.value);"><option value="">Select State</option>';
          var i = "";
          for (var i = 0; i < data.length; i++) {
            html += '<option value="' + data[i].id + '">' + data[i].state_title + '</option>';
          }
          html += '</select>';
          $('#stateListData').html(html);
        },
        error: function(response) {
          var data = JSON.parse(response.responseText);
       //   toastr.error(data.message);
          $('#stateListData').html('');
        }
      });
    }




     function showCitiesDropdown(state_id) {
      $.ajax({
        type: 'ajax',
        // url: "<?php echo base_url() ?>api/User/showAllCitiesByState",
        url: "<?php echo base_url() ?>api/Bank/showAllCitiesByState",
        async: false,
        data: {
          'state_id': state_id
        },
        method: 'get',
        dataType: 'json',
        beforeSend: function(xhr) {
          xhr.setRequestHeader('X-API-KEY', 'enachSyncWorks');
        },
        success: function(response) {
          // body...
          data = response.data;
          var html = '<select class="form-select" name="city_id" id="city_id" ><option value="" selected="selected">Select City</option>';
          var i = "";
          for (var i = 0; i < data.length; i++) {
            html += '<option value="' + data[i].id + '" data-city-name="' + data[i].name + '">' + data[i].name + '</option>';
          }
          html += '</select>';
          $('#cityListData').html(html);
        },
        error: function(response) {
          var data = JSON.parse(response.responseText);
        //  toastr.error(data.message);
          $('#cityListData').html('');
        }
      });
    }


   $('.dropdown-menu').on('click', function(event) {
        event.stopPropagation(); // Stop click event propagation
    });

</script>
