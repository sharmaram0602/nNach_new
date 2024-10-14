
      <div class="content">
        <h2 class="mb-2 lh-sm"><?php echo $page_name; ?></h2>

        <div class="card" >
 
            <div class="card-body">
               
                <div  id="tableExample2">
                   <!-- id="tableExample2" data-list="{&quot;valueNames&quot;:
                          [&quot;srno&quot;,&quot;name&quot;,&quot;city&quot;,&quot;phone&quot;,&quot;email&quot;],
                  &quot;page&quot;:10,
                  &quot;pagination&quot;:{&quot;innerWindow&quot;:2,&quot;left&quot;:1,&quot;right&quot;:1},
                  &quot;filter&quot;:{&quot;key&quot;:&quot;payment&quot;}
                }"> -->
                      
                       
                         <div class="row justify-content-start g-0 ">

                            <div class="col-auto search-box  mb-3">
                              
                              <form class="position-relative" data-bs-toggle="search" data-bs-display="static">
                                <input class="form-control search-input search form-control-sm" type="search" placeholder="Search" aria-label="Search" id="searchTextBank" name="searchTextBank"/>
                                <span class="fas fa-search search-box-icon"></span>
                              </form>
                            
                            </div>

                            <div class="col-md-1 col-sm-2  m-3 mt-0">
                              <button class="btn btn-sm btn-phoenix-secondary item-govt" id="searchButtonBank"> <span class="fas fa-search search-box-icon"></span></button>
                            </div>
                          
                             <div class="col-auto  px-3 mb-3">

                                  <?php if(in_array('createBank', $user_permission)): ?>
   
                                    <button type="button"  id="addbank"  class="btn btn-sm btn-phoenix-primary" data-bs-toggle="modal" data-bs-target="#exampleModalCenter"style="display: none;">Add Bank</button>
                                
                                <?php endif; ?>
                            
                             </div>

                            <div class="col-auto  px-3 mb-3">

                               <?php if(in_array('exportBank', $user_permission)): ?>
                                     <button class="btn btn-primary btn-sm" onclick="exportToExcelx()">
                                        <i class="fas fa-file-excel"></i> Export to Excel
                                    </button> 
                                    <?php endif; ?>

                            </div>
                             <!-- <div class="col-auto  px-1 mb-3">

                                <?php //if(in_array('createBank', $user_permission)): ?>

                                  <button type="button"  id="addbranch"  class="btn btn-sm btn-phoenix-primary" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">Add Branch</button>

                                <?php// endif; ?>

                              </div> -->

                        </div>
                      

                        <div class="table-responsive">
                          <table class="table table-striped table-sm fs--1 mb-0" id="reporttableexcel">
                            <thead>
                              <tr> 
                                <th class="sort border-top ps-3" data-sort="srno">Sr No.</th>
                                <th class="sort border-top ps-3" data-sort="name">Name</th>
                                <th class="sort border-top ps-3" data-sort="city">City</th>
                                <th class="sort border-top ps-3" data-sort="phone">Phone</th>
                                <th class="sort border-top ps-3" data-sort="email">Email</th>
                              
                            
                                <th class="sort text-end align-middle pe-0 border-top" scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody class="list" id="userData">

                            </tbody>
                          </table>
                        </div>
                        <!-- <div class="d-flex justify-content-center mt-3"> -->
                          <!-- <button class="page-link disabled" data-list-pagination="prev" disabled=""><svg class="svg-inline--fa fa-chevron-left" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-left" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M224 480c-8.188 0-16.38-3.125-22.62-9.375l-192-192c-12.5-12.5-12.5-32.75 0-45.25l192-192c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25L77.25 256l169.4 169.4c12.5 12.5 12.5 32.75 0 45.25C240.4 476.9 232.2 480 224 480z"></path></svg><!-- <span class="fas fa-chevron-left"></span> Font Awesome fontawesome.com --><!--</button> -->
                          <!-- <ul class="mb-0 pagination"><li class="active"><button class="page" type="button" data-i="1" data-page="5">1</button></li><li><button class="page" type="button" data-i="2" data-page="5">2</button></li><li><button class="page" type="button" data-i="3" data-page="5">3</button></li><li class="disabled"><button class="page" type="button">...</button></li><li><button class="page" type="button" data-i="9" data-page="5">9</button></li></ul> -->
                          <!-- <button class="page-link pe-0" data-list-pagination="next"><svg class="svg-inline--fa fa-chevron-right" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M96 480c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L242.8 256L73.38 86.63c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l192 192c12.5 12.5 12.5 32.75 0 45.25l-192 192C112.4 476.9 104.2 480 96 480z"></path></svg><!-- <span class="fas fa-chevron-right"></span> Font Awesome fontawesome.com --><!--</button> -->
                        <!-- </div> -->
                        <span>Total bank is: <span id="totalbranch"></span></span>
                        <div class="d-flex justify-content-center mt-3">
                          <div id="paginationbranches"></div>
                        </div>
                      </div>
            </div>
          </div>
  
         <div class="modal fade" id="exampleModalCenter" tabindex="-1" aria-labelledby="scrollingLongModalLabel2" aria-hidden="true"data-bs-backdrop="static">
          <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="tooltipModalLabel">Add Bank</h5>
                <button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><span class="fas fa-times fs--1"></span></button>
              </div>
              
              <div class="modal-body">
               
                      <form id="myFormbank" action="" class="row g-3">
                      
                        <input type="hidden" name="id">
                        <input type="hidden" name="bank_admin_id">
                              
                        <div class="col-md-6">

                          <label class="form-label" for="bank_name">Bank Name<span class="text-danger">*</span></label>

                          <input class="form-control" name="bank_name" id="bank_name" type="text">
                        </div>
                       
                        <div class="col-md-6">

                            <label class="form-label" for="bank_email">Bank Email<span class="text-danger">*</span></label>

                            <input class="form-control" name="bank_email"  id="bank_email" type="email" />
                          </div>

                             <div class="col-md-6">

                            <label class="form-label" for="bank_phone">Bank Phone/Mobile No.<span class="text-danger">*</span></label>

                            <input class="form-control" name="bank_phone"  id="bank_phone" type="text" />
                          </div>

                         <div class="col-md-6" id="bankTypeListData_MAIN">

                          <label class="form-label" for="bank_type_id">Bank Type<span class="text-danger">*</span></label>

                        <div id="bankTypeData"></div>
                        </div>

                        <div class="col-12">

                         <label class="form-label" for="bank_address">Bank Address/City<span class="text-danger">*</span></label>

                          <input class="form-control"  name="bank_address" id="bank_address" type="text">
                        </div>
                         <div class="col-md-6">

                          <label class="form-label" for="bank_admin_f_name">First Name<span class="text-danger">*</span></label>

                          <input class="form-control" name="bank_admin_f_name" id="bank_admin_f_name" type="text">
                        </div>
                        <div class="col-md-6">

                           <label class="form-label" for="bank_admin_l_name">Last Name<span class="text-danger">*</span></label>

                          <input class="form-control"  name="bank_admin_l_name" id="bank_admin_l_name" type="text">
                        </div>

                          <div class="col-md-6">

                            <label class="form-label" for="bank_admin_email">Email</label>

                            <input class="form-control" name="bank_admin_email"  id="bank_admin_email" type="email" />
                          </div>

                             <div class="col-md-6">

                            <label class="form-label" for="bank_admin_mobile">Phone/Mobile No.<span class="text-danger">*</span></label>

                            <input class="form-control" name="bank_admin_mobile"  id="bank_admin_mobile" type="text" />
                          </div>

                        <div class="col-md-6">

                          <label class="form-label" for="bank_admin_username">Username<span class="text-danger">*</span></label>

                          <input class="form-control" name="bank_admin_username"  id="bank_admin_username" type="text" />
                        </div>

                         <div class="col-md-6">

                          <label class="form-label" for="bank_admin_gender">Gender<span class="text-danger">*</span></label>

                          <select class="form-select" name=bank_admin_gender id="bank_admin_gender">
                            
                              <option value="" selected="selected">Select Gender</option>
                              <option value="1">Male</option>
                              <option value="2">Female</option>
                              <option value="3">Other</option>
                          </select>
                        </div>


                        <div class="col-md-12" id="designationListData_MAIN">

                          <label class="form-label" for="bank_admin_desigation_id">Designation<span class="text-danger">*</span></label>

                        <div id="designationListData"></div>
                        </div>

                       
                      </form>
                    
              </div>
              <div class="modal-footer">
                <button class="btn btn-primary" id="btnSavebank" type="button">Save</button>
                <button class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>            
    

    <div class="modal fade" id="myModal_for_delete_message" tabindex="-1" aria-labelledby="scrollingLongModalLabel2" aria-hidden="true" data-bs-backdrop="static">
          <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="tooltipModalLabel">Delete Bank</h5>
                <button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><span class="fas fa-times fs--1"></span></button>
              </div>
              <div class="modal-body">
                Are sure to delete this bank ?
              </div>
              <div class="modal-footer">
                <button class="btn btn-danger" id="btdelete" type="button">Delete</button>
                <button class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div> 

         <div class="modal fade" id="myModal_for_delete_messageBranch" tabindex="-1" aria-labelledby="scrollingLongModalLabel2" aria-hidden="true" data-bs-backdrop="static">
          <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="tooltipModalLabel">Delete Bank</h5>
                <button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><span class="fas fa-times fs--1"></span></button>
              </div>
              <div class="modal-body">
                Are sure to delete this branch ?
              </div>
              <div class="modal-footer">
                <button class="btn btn-danger" id="btdeleteBranch" type="button">Delete</button>
                <button class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div> 



         <div class="modal fade" id="bankBranchesModal" tabindex="-1" aria-labelledby="scrollingLongModalLabel2" aria-hidden="true" data-bs-backdrop="static">
          <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="tooltipModalLabel">Bank Branches</h5>
                 <button type="button" id="addBankBranch"  class="btn btn-sm btn-primary item-bank">Add Branch</button>

                <button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><span class="fas fa-times fs--1"></span></button>
              </div>
              <div class="modal-body" id="bankBranchesModalBody">
                  <div id="showBankBranchAddDiv" style="display:none;">
                       <form id="myFormbankBranch" action="" class="row g-3">
                          <input type="hidden" name="id">
                          <input type="hidden" name="bank_id">

                              <div class="col-md-6">
                                <label class="form-label" for="branch_name">Branch Name<span class="text-danger">*</span></label>
                                <input class="form-control" name="branch_name" id="branch_name" type="text">
                              </div>

                              <div class="col-md-6">
                                <label class="form-label" for="branch_address">Branch Address<span class="text-danger">*</span></label>
                                <input class="form-control" name="branch_address" id="branch_address" type="text">
                              </div>

                              <div class="col-md-6">
                                <label class="form-label" for="bank_name">Branch State<span class="text-danger">*</span></label>
                                <div id="branchStateListData"></div>
                              </div>

                              <div class="col-md-6">
                                <label class="form-label" for="bank_name">Branch Taluka<span class="text-danger">*</span></label>
                                <div id="branchCityListData"></div>
                              </div>
                          </form>
                       <button class="btn btn-sm btn-outline-primary m-3 align-middle"id="btnSaveBranchBank" type="button">Add</button>
                  </div>

                  <div class="table-responsive">
                    <table class="table table-striped table-sm fs--1 mb-0">
                      <thead>
                        <tr> 
                          <th class="sort border-top ps-3" data-sort="srno">Sr No.</th>
                          <th class="sort border-top ps-3" data-sort="name">Name</th>
                          <th class="sort border-top ps-3" data-sort="address">Address</th>

                          <th class="sort border-top ps-3" data-sort="city">City</th>
                          <th class="sort border-top ps-3" data-sort="state">State</th>
                          <th class="sort text-end align-middle pe-0 border-top" scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody class="list" id="BankBranchData">

                      </tbody>
                    </table>
                  </div>

              </div>
              
              <div class="modal-footer">
                <button class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Close</button>
              </div>
            
            </div>
          
          </div>
        </div>  
        <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.4/xlsx.full.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>
<script type="text/javascript">

       showBankData(1);
      


          $('#addbank').click(function(){
                    showDesignationData();
                    showBankTypes();
                    
                    document.getElementById("bank_name").readOnly=false;
                    document.getElementById("bank_address").readOnly=false;
                    document.getElementById("bank_phone").readOnly=false;
                    document.getElementById("bank_email").readOnly=false;
                    document.getElementById("bank_email").readOnly=false;
                    document.getElementById("bank_type_id").readOnly=false;
                   
                    document.getElementById("bank_admin_f_name").readOnly=false;
                    document.getElementById("bank_admin_l_name").readOnly=false;
                    document.getElementById("bank_admin_mobile").readOnly=false;
                    document.getElementById("bank_admin_email").readOnly=false;
                    document.getElementById("bank_admin_username").readOnly=false;
                    document.getElementById("bank_admin_gender").readOnly=false;
                    if(document.getElementById("bank_designation_id")){
                        document.getElementById("bank_designation_id").readOnly=false;
                    }

             
              $('#myFormbank')[0].reset();
              $('#btnSavebank').html('Submit');
              $('#exampleModalCenter').find('.modal-title').text('Add Bank');
              $('#myFormbank').attr('action','<?php echo base_url(); ?>api/Bank/insert');
         });

            $('#addBankBranch').click(function(){
              $('#myFormbankBranch')[0].reset();
           
       
              $('#btnSaveBranchBank').html('Add');

              document.getElementById("showBankBranchAddDiv").style.display = "block";
              $('#myFormbankBranch').attr('action','<?php echo base_url(); ?>api/Bank/insertBankBranch');


          });

        function showBankData(page) {
          var searchTextBank = $('#searchTextBank').val();

            $.ajax({
                type: 'ajax',
                url: "<?php echo base_url() ?>api/Bank/"+page,
                async: false,
                method:'get',
                data:{'searchTextBank':searchTextBank},

                dataType: 'json',
                beforeSend: function(xhr) {
                    xhr.setRequestHeader('X-API-KEY','enachSyncWorks');
                },
                success: function(response) {
                    // body...
                    var serialNumber = (page - 1) * 10 + 1;

                    data=response.data;
                    var html="";
                    var tbt="";
                    var i ="";

                    for (var i = 0; i < data.length; i++) {
                      //  var x=i+1;
                      var x = serialNumber++;
            
                                           
                      html+='<tr><td class="order py-2  ps-3 align-middle white-space-nowrap srno"><a class="fw-semi-bold" href="#">'+x+' </a></td>'+
                              
                                '<td class="align-middle ps-3 name">'+data[i].bank_name+'</td>'+
                                '<td class="align-middle ps-3 city">'+data[i].bank_address+'</td>'+
                                '<td class="align-middle ps-3 phone">'+data[i].bank_phone+'</td>'+
                                '<td class="align-middle ps-3 email">'+data[i].bank_email+'</td>';
                            
                            <?php if(in_array('viewBank', $user_permission) || in_array('updateBank', $user_permission) 
                                        || in_array('deleteBank', $user_permission)): ?>

                            html+='<td class="align-middle white-space-nowrap text-end pe-0">'+
                                  '<div class="font-sans-serif btn-reveal-trigger position-static">'+
                                    '<button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs--2" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><svg class="svg-inline--fa fa-ellipsis fs--2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="ellipsis" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M120 256C120 286.9 94.93 312 64 312C33.07 312 8 286.9 8 256C8 225.1 33.07 200 64 200C94.93 200 120 225.1 120 256zM280 256C280 286.9 254.9 312 224 312C193.1 312 168 286.9 168 256C168 225.1 193.1 200 224 200C254.9 200 280 225.1 280 256zM328 256C328 225.1 353.1 200 384 200C414.9 200 440 225.1 440 256C440 286.9 414.9 312 384 312C353.1 312 328 286.9 328 256z"></path></svg><!-- <span class="fas fa-ellipsis-h fs--2"></span> Font Awesome fontawesome.com --></button>'+
                                   ' <div class="dropdown-menu dropdown-menu-end py-2">';
                                   
                                   <?php if(in_array('viewBank', $user_permission)):?> 
                                     html+='<a class="dropdown-item item-view" data="'+data[i].bank_id+'"><span class="uil-eye"></span> View</a>';
                                      <?php endif; ?>

                                
                                    html+='<a class="dropdown-item item-bankBranches" data="'+data[i].bank_id+'"><span class="uil-code-branch"></span> Branches</a>';
                                
                                  <?php if(in_array('updateBank', $user_permission)):?> 
                                    html+='<a class="dropdown-item item-edit" data="'+data[i].bank_id+'"><span class="uil-edit"></span> Edit</a>';
                                  <?php endif; ?>

                                    <?php if(in_array('deleteBank', $user_permission)):?>  
                                    html+='<div class="dropdown-divider"></div>';
                                   
                                     html+='<a class="dropdown-item text-danger item-delete" data="'+data[i].bank_id+'"><span class="uil-trash"></span> Delete</a>';
                                   
                                   html+='</div>';
                                  <?php endif; ?>

                                 html+='</div>'+
                               ' </td>';
                          
                          <?php endif; ?>

                        html+='</tr>';

                    }
                  <?php if(in_array('viewBank', $user_permission)): ?>
                   $('#userData').html(html); <?php endif; ?>
                   $('#totalbranch').html(response.total_rows);
                   display_branchwise(response.total_rows, page);
                         },
                     error: function(response){
                       var data =JSON.parse(response.responseText);
                       toastr.error(data.message);
                        }

            });

        }

               // report export to excel


    function exportToExcelx() {
    // alert("vikas");
  var table = document.getElementById('reporttableexcel');
  var sheetData = XLSX.utils.table_to_sheet(table);
  var wb = XLSX.utils.book_new();
  XLSX.utils.book_append_sheet(wb, sheetData, 'Sheet1');

  // Convert the workbook to a data URL
  var dataURL = XLSX.write(wb, { bookType: 'xlsx', type: 'base64' });

  // Create a download link and trigger the download
  var link = document.createElement('a');
  link.href = 'data:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet;base64,' + dataURL;
  link.download = 'exported_data.xlsx';
  document.body.appendChild(link);
  link.click();
  document.body.removeChild(link);
}

function exportToExcel() {
    // alert("vikas kamankar")
  var bank_name = $('#bank_name').val();
  var bank_address = $('#bank_address').val();
  var bank_phone = $('#bank_phone').val();
  var bank_email = $('#bank_email').val();
 
   // alert(leadInterestTypeId);
  $.ajax({
    type: 'GET',
    url: "<?php echo base_url()?>api/Bank/",
    data: {
      bank_name: bank_name,
      bank_address: bank_address,
      bank_phone: bank_phone,
      bank_email: bank_email,
    },
    dataType: 'json',
        beforeSend: function(xhr) {
          xhr.setRequestHeader('X-API-KEY', 'enachSyncWorks');
        },

    success: function (response) {
      var data = response.data;
      // exportDataToExcel(data);
      var html="";
                    var tbt="";
                    var i ="";

                    for (var i = 0; i < data.length; i++) {
                       var x=i+1;
                      // var x = serialNumber++;
            
                                           
                      html+='<tr><td class="order py-2  ps-3 align-middle white-space-nowrap srno"><a class="fw-semi-bold" href="#">'+x+' </a></td>'+
                              
                                '<td class="align-middle ps-3 name">'+data[i].bank_name+'</td>'+
                                '<td class="align-middle ps-3 city">'+data[i].bank_address+'</td>'+
                                '<td class="align-middle ps-3 phone">'+data[i].bank_phone+'</td>'+
                                '<td class="align-middle ps-3 email">'+data[i].bank_email+'</td>';
                            
                          

                        html+='</tr>';

                    }
          $('#userData').html(html);



    },
    error: function (error) {
      console.error('Error fetching data:', error);
      alert('vikas error ');
    }
  });
}



        function display_branchwise(totalRows, currentPage) {
        var itemsPerPage = 10; // Assuming 10 records per page
        var totalPages = Math.ceil(totalRows / itemsPerPage);
        var maxButtonsToShow = 5; // Set the maximum number of buttons to show

        var pagination = '<ul class="pagination justify-content-center">';

       // First button
        pagination += '<li class="page-item ' + (currentPage === 1 ? 'disabled' : '') + '">';
        pagination += '<button class="page-link" onclick=" showBankData(1,1)" aria-label="First">';
        pagination += '<span aria-hidden="true">&laquo;&laquo;</span></button></li>';

        // Previous button
        pagination += '<li class="page-item ' + (currentPage === 1 ? 'disabled' : '') + '">';
        pagination += '<button class="page-link" data-list-pagination="prev" onclick=" showBankData(1,' + (currentPage - 1) + ')" aria-label="Previous">';
        pagination += '<span aria-hidden="true">&laquo;</span></button></li>';

        // Page buttons
        var startPage = Math.max(1, currentPage - Math.floor(maxButtonsToShow / 2));
        var endPage = Math.min(totalPages, startPage + maxButtonsToShow - 1);

        for (var i = startPage; i <= endPage; i++) {
            pagination += '<li class="page-item ' + (i === currentPage ? 'active' : '') + '">';
            pagination += '<button class="page-link" onclick=" showBankData(1,' + i + ')">' + i + '</button></li>';
        }

        // Next button
        pagination += '<li class="page-item ' + (currentPage === totalPages ? 'disabled' : '') + '">';
        pagination += '<button class="page-link" data-list-pagination="next" onclick=" showBankData(1,' + (currentPage + 1) + ')" aria-label="Next">';
        pagination += '<span aria-hidden="true">&raquo;</span></button></li>';

           // Last button
        pagination += '<li class="page-item ' + (currentPage === totalPages ? 'disabled' : '') + '">';
        pagination += '<button class="page-link" onclick=" showBankData(1,' + totalPages + ')" aria-label="Last">';
        pagination += '<span aria-hidden="true">&raquo;&raquo;</span></button></li>';


        pagination += '</ul>';

        $('#paginationbranches').html(pagination);
    }



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
                   var gov_html='<select class="form-select" name="bank_designation_id" id="bank_designation_id"><option value="" selected="selected">Select Designation</option>';
                  var i ="";

                    for (var i = 0; i < data.length; i++) {
                         if(data[i].designation_organization_type=="BANK"){
                               gov_html+='<option value="'+data[i].id+'">'+data[i].designation_name+'</option>';
                        }
   
                    }
                  
                    gov_html+='</select>';
                 

                   $('#designationListData').html(gov_html);
                
                     },
                 error: function(response){
                   var data =JSON.parse(response.responseText);
                   toastr.error(data.message);
                  $('#designationListData').html('');
               
                }


            });

        }

 function showBankTypes() {

            $.ajax({
                type: 'ajax',
                url: "<?php echo base_url() ?>api/Bank/showAllBankTypes",
                async: false,
                method:'get',
                dataType: 'json',
                 beforeSend: function(xhr) {
                    xhr.setRequestHeader('X-API-KEY','enachSyncWorks');
                },
                success: function(response) {
                    // body...
                    data=response.data;

                    data=response.data;
                    var html='<select class="form-select" name="bank_type_id" id="bank_type_id"><option value="" selected="selected">Select Type</option>';
                  
                    var i ="";

                    for (var i = 0; i < data.length; i++) {
                       html+='<option value="'+data[i].bank_type_id+'">'+data[i].bank_type_name+'</option>';
                    }
                    html+='</select>';

                   $('#bankTypeData').html(html);
            
                 
                         },
                     error: function(response){
                       var data =JSON.parse(response.responseText);
                       toastr.error(data.message);
                        }

            });

  }


       $('#btnSavebank').click(function(){
            document.getElementById("bank_name").classList.remove("is-invalid");
            document.getElementById("bank_address").classList.remove("is-invalid");
            document.getElementById("bank_admin_f_name").classList.remove("is-invalid");
            document.getElementById("bank_admin_mobile").classList.remove("is-invalid");
            document.getElementById("bank_designation_id").classList.remove("is-invalid");
            document.getElementById("bank_type_id").classList.remove("is-invalid");
            


             var url = $('#myFormbank').attr('action');
             var data = $('#myFormbank').serialize();
           
             var bank_name              = $('input[name=bank_name]');
             var bank_address           = $('input[name=bank_address]');
             var bank_email             = $('input[name=bank_email]');
             var bank_phone             = $('input[name=bank_phone]');

             var bank_admin_f_name      = $('input[name=bank_admin_f_name]');
             var bank_admin_l_name      = $('input[name=bank_admin_l_name]');
             var bank_admin_mobile      = $('input[name=bank_admin_mobile]');
             var bank_admin_email       = $('input[name=bank_admin_email]');
             var bank_admin_username    = $('input[name=bank_admin_username]');
             var bank_designation_id    = $('select[name=bank_designation_id]');
             var bank_type_id           = $('select[name=bank_type_id]');

            
              if (bank_name.val()=='') {
                  document.getElementById("bank_name").classList.add("is-invalid");
                 toastr.error("Please Enter Bank Name");
              }
              else if(bank_type_id.val()==''){
                  document.getElementById("bank_type_id").classList.add("is-invalid");
                   toastr.error("Please Select Bank Type");
              }
              else if(bank_address.val()==''){
                  document.getElementById("bank_address").classList.add("is-invalid");
                  toastr.error("Please Enter Bank Address");
              }
               else if(bank_admin_f_name.val()==''){
                  document.getElementById("bank_admin_f_name").classList.add("is-invalid");
                   toastr.error("Please Enter Admin First Name");
              }
              else if(bank_admin_mobile.val()==''){
                  document.getElementById("bank_admin_mobile").classList.add("is-invalid");
                   toastr.error("Please Enter Admin Mobile/Phone No.");
              }

              else if(bank_admin_username.val()==''){
                  document.getElementById("bank_admin_username").classList.add("is-invalid");
                   toastr.error("Please Enter Admin Username");
              }

              else if(bank_designation_id.val()==''){
                  document.getElementById("bank_designation_id").classList.add("is-invalid");
                   toastr.error("Please Select Designation");
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

                               $('#myFormbank')[0].reset();
                               $('#exampleModalCenter').modal('hide');

                                if (response.status) {
                                 toastr.success(response.message);
                                }
                                else{
                                   toastr.error(response.message);
                                }
                                
                                showBankData();
                                                        
                        },

                      error: function(response){
                               var data =JSON.parse(response.responseText);
                               toastr.error(data.message);
                        }

                    });
                }
             });

$('#userData').on('click', '.item-view', function(){
          showBankTypes();


            
  

          var id = $(this).attr('data');
          $('#exampleModalCenter').modal('show');
          $('#btnSavebank').html('Update');
            document.getElementById("btnSavebank").disabled = true;
          showDesignationData();
          $('#myFormbank').attr('action','<?php echo base_url(); ?>api/Bank/update');
          $('#exampleModalCenter').find('.modal-title').text('View Bank');
             $.ajax({
                type: 'ajax',
                method: 'get',
                url: '<?php echo base_url(); ?>api/Bank/row',
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
                            user_details=data.user_details;
                            $('input[name=id]').val(data.bank_id);
                            $('input[name=bank_name]').val(data.bank_name);
                            $('input[name=bank_address]').val(data.bank_address);
                            $('input[name=bank_phone]').val(data.bank_phone);   
                            $('input[name=bank_email]').val(data.bank_email);   
                             
                            $('select[name=bank_type_id]').val(data.bank_type_id);  

                            if(user_details){
                                $('input[name=bank_admin_id]').val(user_details.user_id);
                                $('input[name=bank_admin_f_name]').val(user_details.firstname);
                                $('input[name=bank_admin_l_name]').val(user_details.lastname);
                                $('input[name=bank_admin_mobile]').val(user_details.phone);   
                                $('input[name=bank_admin_email]').val(user_details.email);   
                                $('input[name=bank_admin_username]').val(user_details.username);  
                                $('select[name=bank_admin_gender]').val(user_details.gender);  
                                $('select[name=bank_designation_id]').val(user_details.group_id);  
                            } 
                      }
              
                   }

                    document.getElementById("bank_name").readOnly=true;
                    document.getElementById("bank_address").readOnly=true;
                    document.getElementById("bank_phone").readOnly=true;
                    document.getElementById("bank_email").readOnly=true;
                    document.getElementById("bank_email").readOnly=true;
                    document.getElementById("bank_type_id").readOnly=true;
                   
                    document.getElementById("bank_admin_f_name").readOnly=true;
                    document.getElementById("bank_admin_l_name").readOnly=true;
                    document.getElementById("bank_admin_mobile").readOnly=true;
                    document.getElementById("bank_admin_email").readOnly=true;
                    document.getElementById("bank_admin_username").readOnly=true;
                    document.getElementById("bank_admin_gender").readOnly=true;
                    if(document.getElementById("bank_designation_id")){
                        document.getElementById("bank_designation_id").readOnly=true;
                    }

                },
                error: function(response){
                       var data =JSON.parse(response.responseText);
                       toastr.error(data.message);
                }
            });

      });

 $('#userData').on('click', '.item-edit', function(){
          showBankTypes();
            document.getElementById("bank_name").readOnly=false;
            document.getElementById("bank_address").readOnly=false;
            document.getElementById("bank_phone").readOnly=false;
            document.getElementById("bank_email").readOnly=false;
            document.getElementById("bank_email").readOnly=false;
            document.getElementById("bank_type_id").readOnly=false;

            document.getElementById("bank_admin_f_name").readOnly=false;
            document.getElementById("bank_admin_l_name").readOnly=false;
            document.getElementById("bank_admin_mobile").readOnly=false;
            document.getElementById("bank_admin_email").readOnly=false;
            document.getElementById("bank_admin_username").readOnly=false;
            document.getElementById("bank_admin_gender").readOnly=false;
            if(document.getElementById("bank_designation_id")){
                document.getElementById("bank_designation_id").readOnly=false;
            }
          var id = $(this).attr('data');
          $('#exampleModalCenter').modal('show');
          $('#btnSavebank').html('Update');
          document.getElementById("btnSavebank").disabled = false;
          showDesignationData();
          $('#myFormbank').attr('action','<?php echo base_url(); ?>api/Bank/update');
          $('#exampleModalCenter').find('.modal-title').text('Update Bank');
             $.ajax({
                type: 'ajax',
                method: 'get',
                url: '<?php echo base_url(); ?>api/Bank/row',
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
                      user_details=data.user_details;

                    
  
                          $('input[name=id]').val(data.bank_id);
                          $('input[name=bank_name]').val(data.bank_name);
                          $('input[name=bank_address]').val(data.bank_address);
                          $('input[name=bank_phone]').val(data.bank_phone);   
                          $('input[name=bank_email]').val(data.bank_email);   
                          $('input[name=bank_email]').val(data.bank_email);   
                          $('select[name=bank_type_id]').val(data.bank_type_id);  

                          if(user_details){

                              $('input[name=bank_admin_id]').val(user_details.user_id);
                              $('input[name=bank_admin_f_name]').val(user_details.firstname);
                              $('input[name=bank_admin_l_name]').val(user_details.lastname);
                              $('input[name=bank_admin_mobile]').val(user_details.phone);   
                              $('input[name=bank_admin_email]').val(user_details.email);   
                              $('input[name=bank_admin_username]').val(user_details.username);  
                              $('select[name=bank_admin_gender]').val(user_details.gender);  
                              $('select[name=bank_designation_id]').val(user_details.group_id);  
                              
                          } 
                    }
              
                   }

                },
                  error: function(response){
                       var data =JSON.parse(response.responseText);
                       toastr.error(data.message);
                }
            });

      });

 $('#userData').on('click', '.item-delete', function(){
              var bank_id = $(this).attr('data');
      
                $('#myModal_for_delete_message').find('.modal-title').text('Delete Bank');
                $('#myModal_for_delete_message').modal('show');
                $('#btdelete').unbind().click(function(){
                    $.ajax({
                    type: 'ajax',
                    method: 'post',
                    async: false,
                    url: '<?php echo base_url(); ?>api/Bank/delete/'+bank_id,
                    data: {'id': bank_id},
                    dataType: 'json',
                     beforeSend: function(xhr) {
                      xhr.setRequestHeader('X-API-KEY','enachSyncWorks');
                  },
                    success: function(response)
                    {
                          $('#myModal_for_delete_message').modal('hide');
                          toastr.success(response.message);
                          showBankData();
                    },

                       error: function() 
                    {
                      $('#myModal_for_delete_message').modal('hide');
                     
                       toastr.error(response.message);
                       showBankData();

                    }
                });

                });

            });


          function bankBranchDetails(id){

             showState();
              $('input[name=bank_id]').val(id);

              $('#bankBranchesModal').find('.modal-title').text('Bank Branches');
              $('#bankBranchesModal').modal('show');
            
             $.ajax({
                type: 'ajax',
                method: 'get',
                url: '<?php echo base_url(); ?>api/Bank/row',
                data:{'id': id},  
                async: false,
                dataType: 'json',
                 beforeSend: function(xhr) {
                      xhr.setRequestHeader('X-API-KEY','enachSyncWorks');
                  },
                success: function(response){
                   var html="";
                   var tbt="";
                   var i ="";
                   
                   if(response.status){
                    if(response.data){
                     
                      data=response.data;
                      bank_branches= data.bank_branches;

                      if(bank_branches){

                         for (var i = 0; i < bank_branches.length; i++) {
                             var x=i+1;

                             html+='<tr><td class="align-middle ps-3 srno">'+x+'</td>'+
                                '<td class="align-middle ps-3 name">'+bank_branches[i].branch_name+'</td>'+
                                '<td class="align-middle ps-3 address">'+bank_branches[i].branch_address+'</td>'+
                                '<td class="align-middle ps-3 city">'+bank_branches[i].name+'</td>'+
                                '<td class="align-middle ps-3 state">'+bank_branches[i].state_title+'</td>';
                  
                                  html+='<td class="align-middle ps-3">';
                              
                                  html+='<a href="javascript:;" class="btn btn-sm btn-outline-info item-editBranch" bank_id="'+id+'" data="'+bank_branches[i].branch_id+'"><span class="uil-edit"></span></a>';
                                  
                                 html+='<a href="javascript:;"  class="btn btn-sm btn-outline-danger item-deleteBranch" bank_id="'+id+'" data="'+bank_branches[i].branch_id+'"><span class="uil-trash"></span></a>';
                                 

                                   html+='</td></tr>';

                                }


                      }
                      
                               $('#BankBranchData').html(html);
                      }
                    }
             
                },
                  error: function(response){
                      $('#BankBranchData').html('');
                       var data =JSON.parse(response.responseText);
                       toastr.error(data.message);
                }
            });


          }

   
        $('#userData').on('click', '.item-bankBranches', function(){
            var id = $(this).attr('data');

            bankBranchDetails(id);
        });



         function showState(){

            $.ajax({
                    type: 'ajax',
                    url: "<?php echo base_url() ?>api/Bank/showAllStates",
                    async: false,
                    method:'get',
                    dataType: 'json',
                     beforeSend: function(xhr) {
                      xhr.setRequestHeader('X-API-KEY','enachSyncWorks');
                  },
                    success: function(response) {
                        // body...
                        data=response.data;
                        var html='<select class="form-select" name="state_id" id="state_id" onchange="showCitiesDropdown(this.value);"><option value="" selected="selected">Select State</option>';
                      
                        var i ="";

                        for (var i = 0; i < data.length; i++) {
                           html+='<option value="'+data[i].id+'">'+data[i].state_title+'</option>';
                        }
                        html+='</select>';

                       $('#branchStateListData').html(html);
                             },
                         error: function(response){
                           var data =JSON.parse(response.responseText);
                           toastr.error(data.message);
                          $('#branchStateListData').html('');
                    }

                });

        }

         function showCitiesDropdown(state_id){
       

             $.ajax({
                    type: 'ajax',
                    url: "<?php echo base_url() ?>api/Bank/showAllCitiesByState",
                    async: false,
                    data:{'state_id': state_id},  
                    method:'get',
                    dataType: 'json',
                     beforeSend: function(xhr) {
                      xhr.setRequestHeader('X-API-KEY','enachSyncWorks');
                  },
                    success: function(response) {
                        // body...
                        data=response.data;
                        var html='<select class="form-select" name="city_id" id="city_id"><option value="" selected="selected">Select City</option>';
                      
                        var i ="";

                        for (var i = 0; i < data.length; i++) {
                           html+='<option value="'+data[i].id+'">'+data[i].name+'</option>';
                        }
                        html+='</select>';

                       $('#branchCityListData').html(html);
                             },
                         error: function(response){
                           var data =JSON.parse(response.responseText);
                           toastr.error(data.message);
                          $('#branchCityListData').html('');
                    }

                });
            }


    $('#BankBranchData').on('click', '.item-deleteBranch', function(){
            $('#bankBranchesModal').modal('hide');
          var branch_id = $(this).attr('data');
          var bank_id = $(this).attr('bank_id');
  
            $('#myModal_for_delete_messageBranch').find('.modal-title').text('Delete Bank Branch');
            $('#myModal_for_delete_messageBranch').modal('show');
            $('#btdeleteBranch').unbind().click(function(){
                $.ajax({
                    type: 'ajax',
                    method: 'post',
                    async: false,
                    url: '<?php echo base_url(); ?>api/Bank/deleteBranch/'+branch_id,
                    data: {'branch_id': branch_id},
                    dataType: 'json',
                     beforeSend: function(xhr) {
                      xhr.setRequestHeader('X-API-KEY','enachSyncWorks');
                    },
                    success: function(response)
                    {
                          $('#myModal_for_delete_messageBranch').modal('hide');
                          $('#bankBranchesModal').modal('show');
                          toastr.success(response.message);
                          bankBranchDetails(bank_id);
                    },

                       error: function() 
                    {
                      $('#myModal_for_delete_messageBranch').modal('hide');
                      $('#bankBranchesModal').modal('show');
                     
                       toastr.error(response.message);
                       bankBranchDetails(bank_id);
                    }
                });

            });

        });

    $('#bankBranchesModal').on('hidden.bs.modal', function (e) {
          $(this)
            .find("input,textarea,select")
               .val('')
               .end()
            .find("input[type=checkbox], input[type=radio]")
               .prop("checked", "")
               .end();
            $('#btnSaveBranchBank').html('Add');

         $('#myFormbankBranch').attr('action','<?php echo base_url(); ?>api/Bank/insertBankBranch');


             document.getElementById("showBankBranchAddDiv").style.display = "none";

        });

     $('#BankBranchData').on('click', '.item-editBranch', function(){
         $('#bankBranchesModalBody').animate({ scrollTop: 0 }, 500);
         showState();
         document.getElementById("showBankBranchAddDiv").style.display = "block";
          $('#myFormbankBranch').attr('action','<?php echo base_url(); ?>api/Bank/updateBankBranch');
          var id = $(this).attr('data');
          var bank_id = $(this).attr('bank_id');
          $('#btnSaveBranchBank').html('Update');

             $.ajax({
                type: 'ajax',
                method: 'get',
                url: '<?php echo base_url(); ?>api/Bank/rowBankBranch',
                data:{'id': id},  
                async: false,
                dataType: 'json',
                 beforeSend: function(xhr) {
                      xhr.setRequestHeader('X-API-KEY','enachSyncWorks');
                  },
                success: function(response){
                 
                   if(response.status){
                    if(response.data){
                      data1=response.data;
                    
                      showCitiesDropdown(data1.branch_state_id);
                
                      $('input[name=bank_id]').val(bank_id);
                      $('input[name=id]').val(id);
                      $('input[name=branch_name]').val(data1.branch_name);
                      $('input[name=branch_address]').val(data1.branch_address);
                      $('select[name=state_id]').val(data1.branch_state_id);   
                      $('select[name=city_id]').val(data1.branch_city_id);   
                    
                    }
              
                   }

                },
                  error: function(response){
                       var data =JSON.parse(response.responseText);
                       toastr.error(data.message);
                }
            });

           


      });


         $('#btnSaveBranchBank').click(function(){

             var data = $('#myFormbankBranch').serialize();
             var url  = $('#myFormbankBranch').attr('action');

             var branch_name     = $('input[name=branch_name]');
             var branch_address  = $('input[name=branch_address]');
             var state_id        = $('select[name=state_id]');
             var city_id         = $('select[name=city_id]');
             var bank_id         = $('input[name=bank_id]');

            
              if (branch_name.val()=='') {
                 toastr.error("Please Enter Branch Name");
              }
              else if(branch_address.val()==''){
                  toastr.error("Please Enter Branch Address");
              }
               else if(state_id.val()==''){
                   toastr.error("Please Select Branch State");
              }
              else if(city_id.val()==''){
                   toastr.error("Please Select Branch City");
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

                                 $('#myFormbankBranch')[0].reset();
                                 // $('#bankBranchesModal').modal('hide');

                                  if (response.status) {
                                   toastr.success(response.message);
                                  }
                                  else{
                                     toastr.error(response.message);
                                  }
                                  
                                  bankBranchDetails(bank_id.val());
                                                          
                          },

                        error: function(response){
                                 var data =JSON.parse(response.responseText);
                                 toastr.error(data.message);
                          }

                      });
                  }
        });


      </script>
        
<script type="text/javascript">
$('#searchButtonBank').on('click', function() {
  showBankData(1);
});
</script>