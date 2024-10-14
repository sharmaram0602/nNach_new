
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

        <div class="card" >
 
            <div class="card-body">
               
                <div  id="tableExample2">
          
                       
                         <div class="row justify-content-start g-0 ">

                            <div class="col-auto search-box  mb-3">
                         <!--      
                              <form class="position-relative" data-bs-toggle="search" data-bs-display="static">
                                <input class="form-control search-input search form-control-sm" type="search" placeholder="Search" aria-label="Search" id="searchTextBank" name="searchTextBank"/>
                                <span class="fas fa-search search-box-icon"></span>
                              </form>
                            
                            </div>

                            <div class="col-md-1 col-sm-2  m-3 mt-0">
                              <button class="btn btn-sm btn-phoenix-secondary item-govt" id="searchButtonBank"> <span class="fas fa-search search-box-icon"></span></button>
                            </div> -->
                          
                            <?php if(in_array('createDebitDates', $user_permission)):?> 
                                 <div class="col-auto  px-3 mb-3">

       
                                 <button type="button" id="addGovt" class="btn btn-sm btn-phoenix-primary item-govt" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">Add Debit Date</button>
                                    
                                
                                 </div>
                            <?php endif; ?>
                         

                        </div>
                      
                        <div class="table-responsive  mx-1 px-1">
                       <table class="table mb-0 fs--1 compact table-hover w-100" id="datedataTable" >
                            <thead>
                              <tr> 
                          <th class="white-space-nowrap border-top" >Sr No.</th>
                            <th class="white-space-nowrap border-top">Name</th>


                      <?php if(in_array('viewDebitDates', $user_permission) || in_array('updateDebitDates', $user_permission) || in_array('deleteDebitDates', $user_permission)): ?>    
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
          </div>
          <div class="table-responsive">
              <table class="table table-striped table-sm fs--1 mb-0 d-none" id="reporttableexcel">
                   <thead>
                        <tr> 
                            <th class="sort border-top ps-3" data-sort="srno">Sr No.</th>
                            <th class="sort border-top ps-3" data-sort="transactiondate">Debit Date</th>
                        </tr>
  
                        <tbody class="list" id="showReportResultexcel">
                
                        
                        </tbody>
              </table>
        </div>
          <div class="modal fade" id="exampleModalCenter" tabindex="-1" aria-labelledby="scrollingLongModalLabel2" aria-hidden="true" data-bs-backdrop="static">
          <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="tooltipModalLabel">Delete Date</h5>
                <button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><span class="fas fa-times fs--1"></span></button>
              </div>
              <div class="modal-body">
                <form id="myFormdate" action=""  class="row g-3  needs-validation" novalidate="">
                    <div class="col-md-6">
                        <label class="form-label" for="transactionDate">EMI Debit Date <span class="text-danger">*</span></label>
                        <select class="form-select" id="transactionDate" name="transactionDate" >
                        <option value="" selected="">Select EMI Debit Date</option>
                        </select>
                    </div>
                </form>
              </div>
              <div class="modal-footer">
                <button class="btn btn-primary" id="btnSavedate" type="button">Save</button>

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
                Are sure to delete this date ?
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


    document.addEventListener("DOMContentLoaded", function() {
            var select = document.getElementById("transactionDate");
        
            // Create options for the next 31 days 
            for (var i = 1; i <= 28; i++) {
                var option = document.createElement("option");
                option.value = option.text = i;
                select.add(option);
            }
        });



       $('#btnSavedate').click(function(){
    
        //   $('#myFormdate')[0].reset();
          $('#btnSavedate').html('Submit');
          $('#exampleModalCenter').find('.modal-title').text('Add Debit Date');
          $('#myFormdate').attr('action','<?php echo base_url(); ?>api/DebitDate/debitDateInsert');

      });

      $('#btnSavedate').click(function(){
    var transactionDate = $('select[name=transactionDate]');

    // Validate transactionDate
    if (transactionDate.val() == '') {
        toastr.error("Please select a date.");
        return; // Stop further execution
    }

    var url = '<?php echo base_url(); ?>api/DebitDate/debitDateInsert';
    var data = { 'transactionDate': transactionDate.val() };

    $.ajax({
        type: 'POST',
        url: url,
        data: data,
        dataType: 'json',
        beforeSend: function(xhr) {
            xhr.setRequestHeader('X-API-KEY', 'enachSyncWorks');
        },
        success: function(response) {
            $('#exampleModalCenter').modal('hide');
            fetchDebitDates()
            if (response.status) {
                toastr.success(response.message);
            } else {
                toastr.error(response.message);
            }
        },
        error: function(xhr, status, error) {
            toastr.error("An error occurred while processing your request. Please try again later.");
        }
    });
});
$('#searchTextCustomer').on('input', function() {

      
searchTerm = $(this).val();
dataTable.search(searchTerm).draw();

});
   
  document.addEventListener("DOMContentLoaded", function() {
               
    fetchDebitDates();
              //  showBranchData();
               
              //  var designationNameFilterInput = document.getElementById('designationNameFilterInput');
             

              //   $('#clearBranchFilter').click(function(){
              //      $("input[name='branch_mandate_filter']:checked").prop("checked", false);
              //      branchFilterChange();
              //   });

         

              //   $('#clearMoreFilter').click(function(){


              //      dataTable.column('designations.designation_name:name').search('', true).draw();
             
                
              //      $("#designationNameFilter").prop("checked", false);
                   
                
              //      handleCheckboxChange('designationNameFilter', 'designationNameFilterValue');
               

              //      designationNameFilterInput.value='';
                 

              //   });


             

              //  designationNameFilterInput.addEventListener('keyup', function () {
              //      // var customerNameColumnIndex = dataTable.column('mandate_customers.customer_name:name').index();
                   
              //      dataTable.column('designations.designation_name:name').search(this.value, true).draw(); // Set regex flag to true
              //  });

               
        });

            
  


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

    function fetchDebitDates() {
    if ($.fn.DataTable.isDataTable('#datedataTable')) {
        $('#datedataTable').DataTable().destroy();
    }
  

    dataTable =   $('#datedataTable').DataTable({
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

                        <?php if(in_array('exportDebitDates', $user_permission)): ?>


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
                 'url': "<?php echo base_url() ?>api/DebitDate/showDate",
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
                 { data: 'transactionDate',name:'debitdate.transactionDate' },
              
                 { 
                    "data": null,
                //   name:'action',
                     orderable: false,
                    "render": function (data, type, row) {
                        var html = '';
                       
                        <?php if(in_array('updateDebitDates', $user_permission) || in_array('viewDebitDates', $user_permission) || in_array('deleteDebitDates', $user_permission)): ?>

                        html += '<div class="position-relative">';
                        html += '<div class="hover-actions">';
                        

                        <?php if(in_array('deleteDebitDates', $user_permission)): ?>

                       
                        html+='<button class="btn btn-sm btn-soft-danger me-1 fs--2  item-delete" data="'+row.id+'"><span class="uil-trash"></span> </button>';
                        <?php endif; ?>

                     
                        html += '</div>';
                        html += '</div>';
                        html += '<div class="font-sans-serif btn-reveal-trigger position-static">';
                        html += '<button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs--2" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--2"></span></button>';

                        html += '<div class="dropdown-menu dropdown-menu-end py-2">';
                     
                         
                        <?php if(in_array('deleteDebitDates', $user_permission)): ?>
                        html+='<a class="dropdown-item item-delete" data="'+row.id+'" href="#!"><span class="uil-trash">Delete</span></a>';
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

 $('#userData').on('click', '.item-delete', function(){
              var id = $(this).attr('data');
                
                $('#myModal_for_delete_message').find('.modal-title').text('Delete User');
                $('#myModal_for_delete_message').modal('show');
                $('#btdelete').unbind().click(function(){
                    $.ajax({
                        type: 'ajax',
                        method: 'post',
                        async: false,
                        url: '<?php echo base_url(); ?>api/DebitDate/delete/'+id,
                        data: {'id': id},
                        dataType: 'json',
                        beforeSend: function(xhr) {
                            xhr.setRequestHeader('X-API-KEY','enachSyncWorks');
                        },
                        success: function(response)
                        {
                              $('#myModal_for_delete_message').modal('hide');
                              toastr.success(response.message);
                              fetchDebitDates();
                        },

                           error: function() 
                        {
                          $('#myModal_for_delete_message').modal('hide');
                         
                           toastr.error(response.message);
                           fetchDebitDates();

                        }
                    });

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

            $.ajax({
                type: 'GET',
          url: "<?php echo base_url()?>api/DebitDate/exportDateData",
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
                      var x=i+1;
                  html += '<tr>';
                  html += '<td class="order py-2 align-middle white-space-nowrap srno"><a class="fw-semi-bold" href="#">' + x + '</a></td>';
                  html +=   '<td class="order align-middle white-space-nowrap py-2 ps-2">' + data[i].transactionDate + '</td>';
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
              link.download = 'Mandate-Debit Dates-' + currentDateC;
              document.body.appendChild(link);
              link.click();
              document.body.removeChild(link);
          },
          error: function(error) {
              console.error('Error fetching data:', error);
          }
      });
  }
                                   
   

                

    </script>