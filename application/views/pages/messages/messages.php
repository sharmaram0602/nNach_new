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



          <div class="mb-2">
              <div class="d-flex flex-wrap gap-2">
                <div class="search-box input-group">
                    <input class="form-control search-input" type="text" placeholder="Search" aria-label="Recipient's username" aria-describedby="basic-addon2" id="searchTextCustomer" name="searchTextCustomer"/>
                    <span class="fas fa-search search-box-icon"></span> 
                    
                </div>
            
                 <?php if(in_array('createMessageTemplates', $user_permission)):?> 
                    <div class="ms-xxl-auto ms-xl-auto ms-lg-auto ms-md-auto ms-sm-auto">
                    
                       <button class="btn btn-primary btn-sm" id="addMandateCustomer1"  data-bs-toggle="modal" data-bs-target="#addMessageTemplate"><span class="fas fa-plus me-2"></span>Add Template</button>
                    </div>
                 <?php endif; ?>

              </div>
            </div>
        
        <?php if(in_array('updateMessageTemplates', $user_permission) || in_array('viewMessageTemplates', $user_permission) || in_array('deleteMessageTemplates', $user_permission)): ?>
 
            
            <div class="card email-container m-0 p-0">
             
              <div class="card-body row">
                <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2 col-xxl-2 border-end">
                  <div class="email-sidebar phoenix-offcanvas phoenix-offcanvas-fixed" id="emailSidebarColumn">
                    <div class="email-content scrollbar-overlay">
                      <div class="d-flex justify-content-between align-items-center">
                        <p class="text-uppercase fs--2 text-600 mb-2 fw-bold">Message Types</p>
                        <button class="btn d-lg-none p-0 mb-2" data-phoenix-dismiss="offcanvas"><span class="uil uil-times fs-0"></span></button>
                      </div>
                      <ul class="nav flex-column border-top fs--1 vertical-nav" id="Message_Types_List">
                        
                        <li class="nav-item">
                          <a class="nav-link py-2 ps-2 pe-2 border-start border-end border-bottom text-start outline-none active" aria-current="page" href="javascript:;" onclick="getVendorsByType('SMS');" id="TYPE_SMS">
                            <div class="d-flex align-items-center"><span class="me-2  uil uil-comment-alt-message fs-1"></span>
                                   <span class="flex-1">SMS</span>
                            </div>
                          </a>
                        </li>
                        
                        <li class="nav-item">
                          <a class="nav-link py-2 ps-2 pe-2 border-start border-end border-bottom text-start outline-none" aria-current="page" href="javascript:;" onclick="getVendorsByType('WHATSAPP');" id="TYPE_WHATSAPP">
                            <div class="d-flex align-items-center"><span class="me-2  uil uil-whatsapp fs-1"></span><span class="flex-1">Whatsapp</span>
                            </div>
                          </a>
                        </li>

                        <li class="nav-item">
                          <a class="nav-link py-2 ps-2 pe-2 border-start border-end border-bottom text-start outline-none" aria-current="page" href="javascript:;" onclick="getVendorsByType('EMAIL');" id="TYPE_EMAIL">
                            <div class="d-flex align-items-center"><span class="me-2  uil uil-envelope fs-1"></span><span class="flex-1">Email</span>
                            </div>
                          </a>
                        </li>
                      
                      </ul>
                   
                    </div>
                  </div>
                  <div class="phoenix-offcanvas-backdrop d-lg-none" data-phoenix-backdrop="data-phoenix-backdrop" style="top: 0;"></div>
                </div>

                <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2 col-xxl-2 p-2 border-end">
                 
                   <ul class="nav nav-underline" id="tabVendorList" role="tabVendorlist">

                    </ul>
                   
                  <div class="email-content scrollbar" >
                    <div class="tab-content" id="tabVendorTemplates">
                      
                   
                    </div>
                  </div>
                </div>


                <div class="col-sm-8 col-md-8 col-lg-8 col-xl-8 col-xxl-8" id="message_template_details">
                </div>
                        <!-- <h2 class="mb-4">Create a project</h2> -->


                     <div id="messageFrequencyDiv" class="messageFrequencyDiv" style="display: none;">
                        <div class="row">
                            <div class="col-xl-12">
                                <form class="row g-3 mb-6" id="messageFrequencyFormData">        
                                    <div class="col-sm-6 col-md-4">
                                        <label class="form-label" for="dayBeforeDebitDate">Day Before of Debit/After Date</label>
                                        <select class="form-select" id="dayBeforeDebitDate" name="dayBeforeDebitDate">
                                            <option value="">Select Day Before of Debit Date ...</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                            <option value="13">13</option>
                                            <option value="14">14</option>
                                            <option value="15">15</option>
                                            <option value="16">16</option>
                                            <option value="17">17</option>
                                            <option value="18">18</option>
                                            <option value="19">19</option>
                                            <option value="20">20</option>
                                            <option value="21">21</option>
                                            <option value="22">22</option>
                                            <option value="23">23</option>
                                            <option value="24">24</option>
                                            <option value="25">25</option>
                                            <option value="26">26</option>
                                            <option value="27">27</option>
                                            <option value="28">28</option>
                                            <option value="29">29</option>
                                            <option value="30">30</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-6 col-md-4" >
                                        <label class="form-label" for="messageCount">Message Count Per-day</label>
                                        <select class="form-select" id="messageCount" name="messageCount">
                                            <option value="">Select Message Count ...</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option> 
                                        </select>
                                    </div>
                                    <div class="col-sm-6 col-md-3" >
                                        <label class="form-label" for="timepicker">Time Of Message Sent</label>
                                        <input class="form-control datetimepicker" id="timepicker" name="timepicker[]" type="text" placeholder="hour : minute" data-options='{"enableTime":true,"noCalendar":true,"dateFormat":"H:i","disableMobile":true}'>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

            </div>
          </div>
        <?php endif; ?>  
      
      </div>


 <div class="modal fade" id="myModal_for_deleteMessageTemplate" tabindex="-1" aria-labelledby="scrollingLongModalLabel2" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="tooltipModalLabel">Delete Message Template</h5>
                <button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><span class="fas fa-times fs--1"></span></button>
              </div>
              <div class="modal-body">
                Are sure to delete this  Message Template ?
              </div>
              <div class="modal-footer">
                <button class="btn btn-danger" id="btdeleteMessageTemplate" type="button">Delete</button>
                <button class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>          


     <div class="modal fade modal-lg" id="addMessageTemplate" tabindex="-1" aria-labelledby="scrollingLongModalLabel2" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="tooltipModalLabel">Add Message Template</h5>
              <button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><span class="fas fa-times fs--1"></span></button>
            </div>
            <div class="modal-body">
                  <form id="myFormMessageTemplate" action="" class="row g-3">
                   
                      <input type="hidden" name="message_template_id" id="message_template_id">
                      <input type="hidden" name="message_variable_start_with" id="message_variable_start_with">
                      <input type="hidden" name="message_variable_end_with" id="message_variable_end_with">
                     
                      <div class="col-md-4" id="message_template_type_div">
                           <label class="form-label" for="message_template_type">Template Type <span class="text-danger">*</span></label>
                           <select class="form-select" name=message_template_type id="message_template_type" onchange="changeTemplateType();">
                                <option value="" selected="selected">Select Type</option>
                                <option value="SMS">SMS</option>
                                <option value="WHATSAPP">WHATSAPP</option>
                                <option value="EMAIL">EMAIL</option>
                            </select>
                      </div>

                      <div class="col-md-4" id="message_template_work_type_div">
                           <label class="form-label" for="message_template_work_type">Template Work For <span class="text-danger">*</span></label>
                           <select class="form-select" name=message_template_work_type id="message_template_work_type">
                                <option value="" selected="selected">Select Type</option>
                                <option value="LOGIN_VERIFICATION">Login Verification</option>
                                <option value="MANDATE_ADD_VERIFICATION">Mandate Add Verification</option>
                                <option value="MANDATE_SUCCESS">Mandate Success</option>
                                <option value="PAYMENT_REMINDER">Payment Reminder</option>
                                <option value="PAYMENT_SUCCESS">Payment Success</option>
                                <option value="PAYMENT_FAIL">Payment Fail</option>
                                <option value="FORGET_PASSWORD">Forget Password</option>
                            </select>
                      </div>

                    
                       <div class="col-md-4" id="message_template_vendor_id_div">

                        <label class="form-label" for="message_template_vendor_id">Template Vendor <span class="text-danger">*</span></label>
                          <select class="form-select" name=message_template_vendor_id id="message_template_vendor_id"><option value="" selected>Select Vendor</option>
                          </select>
                           
                      </div>

                      <div class="col-md-6 d-none" id="message_template_sender_head_div">
                        <label class="form-label" for="message_template_sender_head">DLT Template Sender (Header) Name <span class="text-danger">*</span></label>
                        <input class="form-control" name="message_template_sender_head" id="message_template_sender_head" type="text">
                      </div>

                      <div class="col-md-6 d-none" id="message_template_dlt_id_div">
                        <label class="form-label" for="message_template_dlt_id">DLT Template ID <span class="text-danger">*</span></label>
                        <input class="form-control" name="message_template_dlt_id" id="message_template_dlt_id" type="text">
                      </div>

                      <div class="col-md-4" id="message_template_name_div">
                        <label class="form-label" for="message_template_name">Template Name <span class="text-danger">*</span></label>
                        <input class="form-control" name="message_template_name" id="message_template_name" type="text">
                      </div>

                        <div class="col-md-4 d-none" id="message_template_category_div">
                           <label class="form-label" for="message_template_category">Template Category <span class="text-danger">*</span></label>
                           <select class="form-select" name=message_template_category id="message_template_category">
                                <option value="" selected="selected">Select Category</option>
                                <option value="PROMOTIONAL">PROMOTIONAL</option>
                                <option value="EXPLICIT">EXPLICIT</option>
                                <option value="IMPLICIT">IMPLICIT</option>
                                <option value="TRANSACTIONAL">TRANSACTIONAL</option>
                            </select>
                      </div>


                      <div class="col-md-4" id="message_template_language_div">
                           <label class="form-label" for="message_template_language">Template Language <span class="text-danger">*</span></label>
                           <select class="form-select" name=message_template_language id="message_template_language">
                                <option value="" selected="selected">Select Category</option>
                                <option value="en">ENGLISH</option>
                                <option value="mr">MARATHI</option>
                                <option value="hi">HINDI</option>
                            </select>
                      </div>

                       <div class="col-md-12" id="message_template_div">
                         <label class="form-label" for="message_template">Template Message <span class="text-danger">*</span></label>
                         <textarea class="form-control"  name="message_template" id="message_template"></textarea>
                      </div>

                      <div class="col-md-12 d-none" id="message_template_variables_details_div">
                        <label class="form-label" for="message_template_variables_details">Template Variable Details</label>
                        <input type="hidden"  name="message_template_variables_details" id="message_template_variables_details">
                      
                      </div>

                      <div class="col-md-4" id="message_template_is_current_div">
                            <label class="form-label" for="message_template_is_current">Make This Template Default ?<span class="text-danger">*</span></label>
                            <select class="form-select" name="message_template_is_current" id="message_template_is_current">
                                <option value="" selected="selected">Select </option>
                                <option value="N">NO</option>
                                <option value="Y">Yes</option>
                            </select>
                      </div>
                      <div class="col-md-4" id="message_template_vendor_template_id_div">
                        <label class="form-label" for="message_template_vendor_template_id">Vendor Template ID</label>
                        <input class="form-control" name="message_template_vendor_template_id" id="message_template_vendor_template_id" type="text">
                      </div>

                       <div class="col-md-4" id="message_template_vendor_template_name_div">
                        <label class="form-label" for="message_template_vendor_template_name">Vendor Template Name</label>
                        <input class="form-control" name="message_template_vendor_template_name" id="message_template_vendor_template_name" type="text">
                      </div>
                  </form>  
                </div>
            <div class="modal-footer">
              <button class="btn btn-primary" id="btnSaveTemplateMessage" type="button">Submit</button>
              <button class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
    </div>



     <div class="modal fade modal-lg" id="detectVarialeModal" tabindex="-1" aria-labelledby="scrollingLongModalLabel2" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="tooltipModalLabel">Template Variable Details</h5>
              <button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><span class="fas fa-times fs--1"></span></button>
            </div>
            <div class="modal-body">
                  <h6 class="text-500 text-danger m-1 p-1">We have detected the variables in the template, Please map all the variables with the data for template save.</h6>
                  
                  <form id="myFormVariableDetected" action="" class="row g-3 m-1 p-1">

                  </form> 

                </div>
            <div class="modal-footer">
              <button class="btn btn-primary" id="btnSaveVariableDetected" type="button">Submit</button>
              <button class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
    </div>


<script type="text/javascript">
    var message_type="";
  
    $(document).ready(function() {
      message_type="SMS";
      getVendorsByType(message_type);
  
   });

 $(document).on('click', '#btnmessageFrequency', function() {
    $('#myModal_for_messageFrequency').modal('show');

  });

        function getVendorsByType(type) {

          var message_Types_List = $('#Message_Types_List');    
        
          var message_template_type = $('#message_template_type').val();    
        
          message_Types_List.find('.nav-link').removeClass('active');
                  
            $('#TYPE_'+type).addClass('active');

             var tabList ='<li class="nav-item border-end px-2" onclick="getTemplatesByVendorAndType('+type+',all);"><a class="nav-link active" id="all-tab" data-bs-toggle="tab" href="#tab-all" role="tab" aria-controls="tab-all" aria-selected="true">All</a></li>';
              
              var tabContentHead ='<div class="tab-pane fade show active" id="tab-all" role="tabpanel" aria-labelledby="all-tab"></div>';

            $.ajax({
                type: 'ajax',
                url: "<?php echo base_url() ?>api/Messages/getVendorsByType",
                async: false,
                method:'get',
                data:{'message_vendor_type':type},

                dataType: 'json',
                beforeSend: function(xhr) {
                    xhr.setRequestHeader('X-API-KEY','enachSyncWorks');
                },
                success: function(response) {
                    // body...
                  var  data=response.data;

             
                  for (var i = 0; i < data.length; i++) {

                      var tabContent ='';
                        
                      var func="getTemplatesByVendorAndType('"+type+"','"+data[i].message_vendor_id+"')";

                      tabList+='<li class="nav-item border-end px-2" onclick="'+func+'"><a class="nav-link" id="'+data[i].message_vendor_id+'-tab" data-bs-toggle="tab" href="#tab-'+data[i].message_vendor_id+'" role="tab" aria-controls="tab-'+data[i].message_vendor_id+'" aria-selected="false">'+data[i].message_vendor_name+'</a></li>';
  
                      tabContentHead +='<div class="tab-pane fade"   id="tab-'+data[i].message_vendor_id+'" role="tabpanel" aria-labelledby="'+data[i].message_vendor_id+'-tab"></div>';

                         // tabContentAll=tabContentAll+tabContent;
                  }

                    $('#tabVendorList').html(tabList);
                    $('#tabVendorTemplates').html(tabContentHead);
                    // $('#tab-all').html(tabContentAll);
               
                },
                
                error: function(response){
                   var data =JSON.parse(response.responseText);

              
                    $('#tabVendorList').html(tabList);
                    $('#tabVendorTemplates').html(tabContentHead);

                    // $('#tab-all').html(tabContentAll);
                }

            });

             getTemplatesByVendorAndType(type,"all");
        }

        function getTemplatesByVendorAndType(message_type,vendor_type) {
          // body...
           var tabContentAll ='';

            $.ajax({
                type: 'ajax',
                url: "<?php echo base_url() ?>api/Messages/getTemplatesByVendorAndType",
                async: false,
                method:'get',
                data:{'message_type':message_type,'message_template_vendor_id':vendor_type},
                dataType: 'json',
                beforeSend: function(xhr) {
                    xhr.setRequestHeader('X-API-KEY','enachSyncWorks');
                },
                success: function(response) {
                    // body...
                  var  data=response.data;
                  
                  if(response.data){
                         for (var i = 0; i < data.length; i++) {

                           var tabContent ='';
                           
                           tabContent+='<div class="border-top border-200  py-3 item-messageTemplate" data="'+data[i].message_template_id+'"><div class="row align-items-sm-center gx-2">'+
                              
                             '<div class="col-auto text-1100 fw-bold line-clamp-1 fs--1">'+data[i].message_template_name+'</div>'+
                             
                           ' </div>'+
                           
                         '</div>';

                          tabContentAll=tabContentAll+tabContent;
                         
                        }
                  }
                 
                  else{

                       
                   tabContentAll='<div class=" py-3">No Templates Found</div>';


                  }

                    $('#tab-'+vendor_type).html(tabContentAll);
               
                },
                
                error: function(response){
                   var data =JSON.parse(response.responseText);
                   tabContentAll='<div class=" py-3">No Templates Found</div>';

                    $('#tab-'+vendor_type).html(tabContentAll);

                }

            });


        }


  function viewMessageTemplateDetails(id) {
           $.ajax({
                type: 'ajax',
                url: "<?php echo base_url() ?>api/Messages/getTemplateByID",
                async: false,
                method:'get',
                data:{'message_template_id':id},
                dataType: 'json',
                beforeSend: function(xhr) {
                    xhr.setRequestHeader('X-API-KEY','enachSyncWorks');
                },
                success: function(response) {
                    // body...
                  var  data=response.data;


                  var html='<div class="card email-content" style="height: 200px;">'+
                              '<div class="card-body overflow-hidden">'+
                                '<div class="d-flex flex-between-center pb-3 border-bottom mb-4"><a class="btn btn-link p-0 text-800 me-3" href="#"></a>'+
                                  '<p class="fw-bold flex-1 fs-1 mb-0 lh-sm line-clamp-1"  id="message_template_name">'+data.message_template_name+'</p>';

                                   <?php if(in_array('updateMessageTemplates', $user_permission)  || in_array('deleteMessageTemplates', $user_permission)): ?>

                                 html+='<div class="btn-reveal-trigger">'+
                                    '<button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none d-flex btn-reveal" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h"></span></button>';
                                
                                   <?php if(in_array('updateMessageTemplates', $user_permission)):?>
                                     html+='<div class="dropdown-menu dropdown-menu-end py-2">'+
                                      '<a class="dropdown-item text-primary item-messageTemplateEdit" data="'+data.message_template_id+'" message_type="'+data.message_template_type+'"  href="javascript:;">Edit</a>';
                                   <?php endif; ?>     
                                 
                                   <?php if(in_array('deleteMessageTemplates', $user_permission)):?>
                                       html+='<a class="dropdown-item text-danger item-messageTemplateDelete" data="'+data.message_template_id+'" message_type="'+data.message_template_type+'" href="javascript:;">Delete</a>';
                                   <?php endif; ?> 

                                     html+='</div>'+
                                  '</div>';

                              <?php endif; ?> 

                              html+='</div>'+
                                '<div class="overflow-x-hidden scrollbar email-detail-content" style="height: 70px;">'+
                                
                                  '<div class="text-1000 fs--1 w-100 mb-8" id="message_template">'+
                                    '<p>'+data.message_template+'</p>'+ 
                                  '</div>'+
                              
                                '</div>'+
                              '</div>'+
                            '</div>'+
                            /*button plus*/
                              '<br>'+
                              '<div class="row">'+
                                '<div class="col-12 d-flex justify-content-end">'+
                                    '<div class="btn-group mb-1" role="group">'+
                                        '<button class="btn btn-sm btn-primary add-message-frequency" type="button">+</button>'+
                                    '</div>'+
                                    '<button class="btn btn-primary ms-2" id="btnSaveMessageFrequency" data-message-template-id="'+data.message_template_id+'" type="button">Submit</button>'+
                                '</div>'+
                            '</div>'+
                            /*button plus*/
                            '<hr>';

                        let frequencyCounter = 0; // Counter for unique identifiers

                        if (response.data) {
                            $('#message_template_details').html(html);
                            $('#message_template_details').append($('#messageFrequencyDiv').clone().show());

                            if (data.message_template_send_setting) 
                            {
                              var sendSetting = JSON.parse(data.message_template_send_setting);
                            }

                        // Loop through each frequency in the send settings and populate fields
                        // Loop through each frequency in the send settings and populate fields
                        if (sendSetting && sendSetting.frequencies && sendSetting.frequencies.length > 0) {
                        $('#messageFrequencyDiv').hide(); // Hide the template div since it's being cloned

                        sendSetting.frequencies.forEach(function (frequency, index) {
                            frequencyCounter++; // Increment the counter for unique IDs

                            var dayBeforeDebitDate = frequency.dayBeforeDebitDate;
                            var messageCount = frequency.messageCount;
                            var timePickers = frequency.timePickers || [];

                            // Clone the div and make sure it is shown
                            var newDiv = $('#messageFrequencyDiv').clone(true, true).show();

                            // Give the new div a unique ID 
                            var newDivId = `messageFrequencyDiv_${frequencyCounter}`;
                            newDiv.attr('id', newDivId);
                            newDiv.find('#dayBeforeDebitDate').attr('id', `dayBeforeDebitDate_${frequencyCounter}`);
                            newDiv.find('#messageCount').attr('id', `messageCount_${frequencyCounter}`);
                            newDiv.find('#timepicker').attr('id', `timepicker_${frequencyCounter}`);

                            // Update the fields for dayBeforeDebitDate and messageCount
                            newDiv.find(`#dayBeforeDebitDate_${frequencyCounter}`).val(dayBeforeDebitDate);
                            newDiv.find(`#messageCount_${frequencyCounter}`).val(messageCount);

                            // Handle the default timepicker
                            if (timePickers.length > 0) {
                                newDiv.find(`#timepicker_${frequencyCounter}`).val(timePickers[0]);

                                // Initialize Flatpickr for the default timepicker in the cloned div
                                flatpickr(`#timepicker_${frequencyCounter}`, {
                                    enableTime: true,
                                    noCalendar: true,
                                    dateFormat: "h:i K", // 12-hour format with AM/PM
                                    time_24hr: false
                                });

                                // Remove the first time picker value, since it's already assigned to the default timepicker
                                timePickers.shift();
                            }

                            // Clear any additional time pickers in the cloned div and create a new one
                            newDiv.find('#additionalTimepickers').remove();
                           
                            const additionalTimepickerDiv = $('<div id="additionalTimepickers" class="row mb-3"></div>');

                            // Loop through the remaining timePickers and add them
                            timePickers.forEach(function (time, timeIndex) {
                            const timepickerID = `additional_timepicker_${index}_${timeIndex + 1}`;
                            const removeButtonID = `remove_timepicker_${index}_${timeIndex + 1}`; // Unique ID for the button
                            const timepickerInput = `
                                <div class="col-sm-6 col-md-4">
                                </div>
                                <div class="col-sm-6 col-md-4">
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <label class="form-label" for="${timepickerID}">Message ${timeIndex + 2} Time</label>
                                    <input class="form-control datetimepicker" id="${timepickerID}" name="timepicker[]" type="text" value="${time}" placeholder="hour : minute">
                                </div>
                                <div class="col-sm-6 col-md-1 d-flex align-items-end">
                                    <button class="btn btn-sm btn-danger remove-message-frequency-time" type="button" id="${removeButtonID}">-</button>
                                </div>`;
                            additionalTimepickerDiv.append(timepickerInput);
                        });

                       

                            // Append the additional time pickers and the minus button
                            newDiv.append(additionalTimepickerDiv);
                            newDiv.append('<hr>');

                            // Add the minus button
                            // const minusButton = $('<button type="button" class="btn btn-danger remove-timepicker">Remove Timepicker</button>');
                            // newDiv.append(minusButton);

                            // Append the new cloned div
                            $('#message_template_details').append(newDiv);

                            // Initialize Flatpickr for the dynamically added time pickers
                            timePickers.forEach(function (time, timeIndex) {
                                flatpickr(`#additional_timepicker_${index}_${timeIndex + 1}`, {
                                    enableTime: true,
                                    noCalendar: true,
                                    dateFormat: "h:i K", // 12-hour format with AM/PM
                                    time_24hr: false
                                });
                            });

                            // Attach an event handler for the minus button
                            // minusButton.on('click', function() {
                            //     newDiv.remove(); // Remove the entire frequency div
                            // });
                        });
                    }

                            // Event delegation for handling change events for update funtion
                            $('#message_template_details').on('change', '[id^="messageCount_"]', handleMessageCountChange);

                        }

                        $('.remove-message-frequency-time').on('click', function (event) {
                            event.stopPropagation(); // Prevent the event from bubbling up

                            // Convert remove ID to timepicker ID
                            var timepickerID = $(this).attr('id').replace('remove_', 'additional_');
                            console.log("Timepicker ID to remove: ", timepickerID);

                            // Log the current button and its parent structure
                            console.log("Current button: ", $(this));

                            // Find the closest '.row' element and then find the specific input related to this button
                            var row = $(this).closest('.row');

                            // Log the row structure
                            console.log("Row structure: ", row.html());

                            // Find the corresponding timepicker input within the same row
                            var timepickerCol = row.find('input#' + timepickerID).closest('.col-md-3'); // Adjust the class if necessary
                            var buttonCol = $(this).closest('.col-md-1'); // Column containing the button


                            // Check if the column was found
                            if (timepickerCol.length) {
                                // Remove only the timepicker input, not the button

                                timepickerCol.remove();
                                buttonCol.remove(); // Remove the column with the button

                                // timepickerCol.find('input#' + timepickerID).remove(); // Remove the input only
                                console.log("Timepicker input removed. Remaining HTML: ", row.html());
                            } else {
                                console.log("No column found to remove.");
                            }
                        });








                        // Event handler for adding new message frequency divs
                        $('.add-message-frequency').on('click', function () {
                            frequencyCounter++; // Increment the counter for unique IDs

                            // Clone the message frequency div and show it
                            const newDiv = $('#messageFrequencyDiv').clone(true, true).show();

                                                          newDiv.find('hr').remove();

                            
                            // Clear any additional time pickers in the cloned div
                            newDiv.find('#additionalTimepickers').remove();

                            // Update the ID for the cloned div
                            newDiv.attr('id', 'messageFrequencyDiv_' + frequencyCounter);

                            // Update IDs for unique elements in the cloned div
                            newDiv.find('#dayBeforeDebitDate').attr('id', 'dayBeforeDebitDate_' + frequencyCounter);
                            newDiv.find('#timepicker').attr('id', 'timepicker_' + frequencyCounter);
                            newDiv.find('#messageCount').attr('id', 'messageCount_' + frequencyCounter);

                            // Create a new container for the frequency div and minus button
                            // const frequencyContainer = $('<div class="align-items-end"></div>');
                            // frequencyContainer.append(newDiv); // Append the cloned div to the container

                            // Create the minus button
                            // Create the minus button as a jQuery object
                              const minusButton = $('<div class="col-sm-6 col-md-1 d-flex align-items-end"> \
                                  <button class="btn btn-sm btn-danger" type="button">-</button> \
                              </div>');

                              // Append the minus button after the "col-sm-6 col-md-3" element
                              newDiv.find('.col-sm-6.col-md-3').last().after(minusButton);

                              // Attach the click event handler to the button
                              minusButton.find('button').on('click', function () {
                                  // Remove the entire row that contains newDiv and the minus button
                                  $(this).closest('.messageFrequencyDiv').remove();
                              });


                            // newDiv.append(minusButton); // Append the minus button to the container
                            $('#message_template_details').append(newDiv); // Append the new container to the details

                            // Initialize Flatpickr for the original timepicker in the cloned div
                            flatpickr(`#timepicker_${frequencyCounter}`, {
                                enableTime: true,
                                noCalendar: true,
                                dateFormat: "h:i K", // 12-hour format with AM/PM
                                time_24hr: false
                            });

                            // Attach the change event handler to the newly cloned messageCount
                            $(`#messageCount`).on('change', handleMessageCountChange);
                        });

                        // Initialize Flatpickr for the default timepicker
                        flatpickr(`#timepicker`, {
                            enableTime: true,
                            noCalendar: true,
                            dateFormat: "h:i K", // 12-hour format with AM/PM
                            time_24hr: false
                        });

                        // Attach the change event handler to the default messageCount dropdown
                        $('#messageCount').on('change', handleMessageCountChange);

                       // Consolidated function to handle message count changes
                       // Consolidated function to handle message count changes
                          function handleMessageCountChange() {
                              const frequencyId = $(this).attr('id').split('_')[1] || 0; // Extract frequencyCounter from ID, default to 0 for the original
                              const selectedCount = parseInt($(this).val()) - 1; // Adjust for the already existing timepicker

                              const clonedDiv = frequencyId ? $(`#messageFrequencyDiv_${frequencyId}`) : $('#messageFrequencyDiv'); // Fallback to original if frequencyId is 0
                               clonedDiv.find('hr').remove();

                              // Count existing time pickers
                              const existingTimepickers = clonedDiv.find('[id^="additional_timepicker_"]').length;
                              const newCount = selectedCount - existingTimepickers; // Calculate how many new time pickers to add

                              // If the selected count is less than existing timepickers, remove the excess timepickers
                              if (newCount < 0) {
                                  // Remove the excess time pickers
                                  for (let i = existingTimepickers; i > selectedCount; i--) {
                                      clonedDiv.find(`#additional_timepicker_${frequencyId}_${i}`).closest('div.col-sm-6').remove();
                                  }
                              } else if (newCount > 0) {
                                  const newTimepickerDiv = $('<div id="additionalTimepickers" class="row g-3 mb-6"></div>');
                                  
                                  for (let i = 0; i < newCount; i++) {
                                      const timepickerID = `additional_timepicker_${frequencyId}_${existingTimepickers + i + 1}`;
                                      const timepickerInput = `
                                          <div class="col-sm-6 col-md-4">
                                          </div>
                                          <div class="col-sm-6 col-md-4">
                                          </div>
                                          <div class="col-sm-6 col-md-3">
                                              <label class="form-label" for="${timepickerID}">Message ${existingTimepickers + i + 2} Time</label>
                                              <input class="form-control datetimepicker" id="${timepickerID}" name="timepicker[]" type="text" placeholder="hour : minute">
                                          </div>
                                      `;
                                      newTimepickerDiv.append(timepickerInput);
                                  }

                                  // Append the dynamically generated time picker div
                                  clonedDiv.append(newTimepickerDiv);

                                  // Add an <hr> for separation after the time picker div
                                  clonedDiv.append('<hr>');

                                  // Initialize Flatpickr for each newly created timepicker
                                  for (let i = 0; i < newCount; i++) {
                                      flatpickr(`#additional_timepicker_${frequencyId}_${existingTimepickers + i + 1}`, {
                                          enableTime: true,
                                          noCalendar: true,
                                          dateFormat: "h:i K", // 12-hour format with AM/PM
                                          time_24hr: false
                                      });
                                  }
                              }
                          }


                },
                
                error: function(response){
                   var data =JSON.parse(response.responseText);
                }

            });
  }     

  $('#tabVendorTemplates').on('click','.item-messageTemplate',function(){    
     var id = $(this).attr('data');
     viewMessageTemplateDetails(id);
    
  });

// Add event listener for the submit button
$(document).on('click', '#btnSaveMessageFrequency', function() {
    const frequencies = [];
    const messageTemplateID = $(this).data('message-template-id'); // Retrieve the message_template_id from the button


    $('.messageFrequencyDiv').each(function() {
        const frequencyData = {
            dayBeforeDebitDate: $(this).find('select[name="dayBeforeDebitDate"]').val(),
            messageCount: $(this).find('select[name="messageCount"]').val(),
            timePickers: []
        };

        // Collect data for time pickers in this frequency div
        $(this).find('input[name="timepicker[]"]').each(function() {
            const timePickerValue = $(this).val();
            if (timePickerValue) {
                frequencyData.timePickers.push(timePickerValue); // Only push if value exists
            }
        });

        // Only push frequencyData if required fields are filled
        if (frequencyData.dayBeforeDebitDate || frequencyData.messageCount || frequencyData.timePickers.length > 0) {
            frequencies.push(frequencyData);
        }
    });

    console.log("Frequencies collected:", frequencies);

    // Perform validation
    if (validateForm(frequencies)) {
        // Proceed with AJAX call
       var mesaageFrequenciesData = JSON.stringify({frequencies});
        $.ajax({
            type: 'POST',
            url: "<?php echo base_url() ?>api/Messages/saveMessageFrequencies",
            data: {
            'message_template_id' : messageTemplateID,
            'mesaageFrequenciesData': mesaageFrequenciesData 
            }, // Ensure the data is JSON stringified
            dataType: 'json',
            async: false,
            beforeSend: function(xhr) {
                xhr.setRequestHeader('X-API-KEY', 'enachSyncWorks');
            },
            success: function(response) {
                    toastr.success(response.message)
            },
            error: function(response) {
                  var data =JSON.parse(response.responseText);
            }
        });
    } else {
         toastr.success("Please fill in all required fields correctly.")
        }
});

// Validation function remains unchanged
function validateForm(frequencies) {
    console.log("validateForm collected:", frequencies); // Log frequencies being validated

    for (let frequency of frequencies) {
        if (!frequency.messageCount || frequency.timePickers.length === 0) {
            return false; // Validation failed
        }
        for (let time of frequency.timePickers) {
            if (!time) {
                return false; // Validation failed
            }
        }
    }
    return true; // All validations passed
}



   $('#message_template_details').on('click','.item-messageTemplateDelete',function(){    
       var message_template_id = $(this).attr('data');
       var message_type = $(this).attr('message_type');

       $('#myModal_for_deleteMessageTemplate').find('.modal-title').text('Delete Message Template');
       $('#myModal_for_deleteMessageTemplate').modal('show');
         $('#btdeleteMessageTemplate').unbind().click(function(){

             $.ajax({
                  type: 'ajax',
                  url: "<?php echo base_url() ?>api/Messages/deleteMessageTemplate",
                  async: false,
                  method:'post',
                  data:{'message_template_id':message_template_id},
                  dataType: 'json',
                  beforeSend: function(xhr) {
                      xhr.setRequestHeader('X-API-KEY','enachSyncWorks');
                  },
                  success: function(response) {
                      // body...
                    $('#message_template_details').html('');
                    $('#myModal_for_deleteMessageTemplate').modal('hide');

                    toastr.success(response.message)
                    getVendorsByType(message_type);
                  },
                  
                  error: function(response){
                     var data =JSON.parse(response.responseText);
                  }

              });
         });
      

    });  


      $('#addMandateCustomer1').click(function(){
          
          $('#myFormMessageTemplate')[0].reset();  
          $('#btnSaveTemplateMessage').html('Submit');
          $('#addMessageTemplate').find('.modal-title').text('Add Message Template');
          $('#myFormMessageTemplate').attr('action','<?php echo base_url(); ?>api/Messages/insertMessageTemplate');
          
  });
      


   function changeTemplateType() {
             var message_template_type = $('#message_template_type').val();  

            if(message_template_type=="SMS"){

              $('#message_template_sender_head_div').removeClass('d-none')
              $('#message_template_dlt_id_div').removeClass('d-none')
              $('#message_template_category_div').removeClass('d-none')

            }
            else{
            $('#message_template_sender_head_div').addClass('d-none')
              $('#message_template_dlt_id_div').addClass('d-none')
              $('#message_template_category_div').addClass('d-none')
            }

           var vendorTypeList = '<label class="form-label" for="message_template_vendor_id">Template Vendor <span class="text-danger">*</span></label>'+
                              '<select class="form-select" name=message_template_vendor_id id="message_template_vendor_id"><option value="" selected>Select Vendor</option>';

          $.ajax({
                    type: 'ajax',
                    url: "<?php echo base_url() ?>api/Messages/getVendorsByType",
                    async: false,
                    method:'get',
                    data:{'message_vendor_type':message_template_type},

                    dataType: 'json',
                    beforeSend: function(xhr) {
                        xhr.setRequestHeader('X-API-KEY','enachSyncWorks');
                    },
                    success: function(response) {
                        // body...
                      var  data=response.data;

                      for (var i = 0; i < data.length; i++) {
                          vendorTypeList += '<option value="' + data[i].message_vendor_id + '">' + data[i].message_vendor_name + '</option>'; 
                      }

                      vendorTypeList += '</select>';
                      $('#message_template_vendor_id_div').html(vendorTypeList);
                  
                    },
                    
                    error: function(response){
                       
                       var data =JSON.parse(response.responseText);
                       $('#message_template_vendor_id_div').html(vendorTypeList);
                   
                    }

                });                    

          vendorTypeList += '</select>';
          $('#message_template_vendor_id_div').html(vendorTypeList);
      }   





   $('#btnSaveVariableDetected').click(function(){

      var selectElements = document.querySelectorAll('[name="message_template_variables_details_array[]"]');
      
      // Array to hold selected values
      var selectedValues = [];

      // Loop through each select element
      selectElements.forEach(function(selectElement) {
        // Loop through each selected option in the select element
        var selectedOptions = Array.from(selectElement.selectedOptions);
        selectedOptions.forEach(function(option) {
          // Push the value of the selected option to the selectedValues array
          selectedValues.push(option.value);
        });
      });
     $('#message_template_variables_details').val(JSON.stringify(selectedValues));
     var message_template_type_dup = $('#message_template_type_dup').val();

      saveTemplate(message_template_type_dup);
     $('#detectVarialeModal').modal('hide');   
     // $('#addMessageTemplate').modal('show');   
 
   });


   $('#btnSaveTemplateMessage').click(function(){

      var message_template_type = $('select[name=message_template_type]').val();


     // Getting values from input fields
      var message_template_sender_head = $('input[name=message_template_sender_head]').val();
      var message_template_dlt_id = $('input[name=message_template_dlt_id]').val();
      var message_template_name = $('input[name=message_template_name]').val();
      var message_template_vendor_template_id = $('input[name=message_template_vendor_template_id]').val();
      var message_template_vendor_template_name = $('input[name=message_template_vendor_template_name]').val();

      // Getting values from select fields
      var message_template_work_type = $('select[name=message_template_work_type]').val();
     
      var message_template_vendor_id = $('select[name=message_template_vendor_id]').val();
      var message_template_category = $('select[name=message_template_category]').val();
      var message_template_language = $('select[name=message_template_language]').val();
      var message_template_is_current = $('select[name=message_template_is_current]').val();

      // Getting values from textarea fields
      var message_template = $('textarea[name=message_template]').val();
      var message_template_variables_details = $('input[name=message_template_variables_details]').val();
        

      if(message_template_type==""){
        toastr.error("Please Select Template Type");
      }
      
      else if(message_template_work_type==""){
        toastr.error("Please Select Template Work Type");
      }
      
       else if(message_template_vendor_id==""){
        toastr.error("Please Select Template Vendor");

     }

     else if(message_template_sender_head=="" && message_template_type=="SMS"){
       toastr.error("Please Enter DLT Sender Head Name");
     }

     else if(message_template_dlt_id=="" && message_template_type=="SMS"){
       toastr.error("Please Enter DLT Template ID");
     }
    

     else if(message_template_name==""){
      toastr.error("Please Enter Template Name");
     }
      
      else if(message_template_category=="" && message_template_type=="SMS"){
       toastr.error("Please Select Template Category");
     }

    
     else if(message_template_language==""){
        toastr.error("Please Select Template Language");

     }

     else if(message_template_is_current==""){
        toastr.error("Please Select Template Current Status");

     }

     else if(message_template==""){
        toastr.error("Please Enter Template Message");

     }
      else{


        getSingleVendorByID(message_template_vendor_id);
        var message_variable_start_with =  $('input[name=message_variable_start_with]').val();
        var message_variable_end_with   =  $('input[name=message_variable_end_with]').val();

        let regex = new RegExp(message_variable_start_with + '(.*?)' + message_variable_end_with, 'g');

        if((message_variable_start_with!="" ||  message_variable_end_with!="" ) && regex.exec(message_template)!== null){
          
            detectVariables(message_template,message_variable_start_with,message_variable_end_with,message_template_type);
           
        }
        else{
          
            saveTemplate(message_template_type);
        }


      }
   
   });
  
  function saveTemplate(argument) {
    // body...

     var data =  $('#myFormMessageTemplate').serialize();

     $.ajax({
                type: 'ajax',
                method:'post',
                url: $('#myFormMessageTemplate').attr('action'),
                data: data,
                async: false,
                dataType: 'json',
                beforeSend: function(xhr) {
                    xhr.setRequestHeader('X-API-KEY','enachSyncWorks');
                },
                success: function(response){

                   $('#myFormMessageTemplate')[0].reset();
                   $('#addMessageTemplate').modal('hide');

                    if (response.status) {
                     toastr.success(response.message);
                     getVendorsByType(message_template_type); 
                     viewMessageTemplateDetails(response.data);
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


    $('#message_template_details').on('click','.item-messageTemplateEdit',function(){    
      var message_template_id = $(this).attr('data');
       var message_type = $(this).attr('message_type');
     $('#addMessageTemplate').find('.modal-title').text('Edit Message Template');
     $('#myFormMessageTemplate').attr('action','<?php echo base_url(); ?>api/Messages/updateMessageTemplate');
     $.ajax({
                type: 'ajax',
                url: "<?php echo base_url() ?>api/Messages/getTemplateByID",
                async: false,
                method:'get',
                data:{'message_template_id':message_template_id},
                dataType: 'json',
                beforeSend: function(xhr) {
                    xhr.setRequestHeader('X-API-KEY','enachSyncWorks');
                },
                success: function(response) {
                    // body...
                  var  data=response.data;

                if(response.data){
                     
                     $('input[name=message_template_id]').val(data.message_template_id);
                     $('select[name=message_template_type]').val(data.message_template_type);
                     changeTemplateType()
                     $('input[name=message_template_sender_head]').val(data.message_template_sender_head);
                     $('input[name=message_template_dlt_id]').val(data.message_template_dlt_id);
                     $('input[name=message_template_name]').val(data.message_template_name);
                     $('input[name=message_template_vendor_template_id]').val(data.message_template_vendor_template_id);
                     $('input[name=message_template_vendor_template_name]').val(data.message_template_vendor_template_name);
                     $('select[name=message_template_work_type]').val(data.message_template_work_type);
                     $('select[name=message_template_vendor_id]').val(data.message_template_vendor_id);
                     $('select[name=message_template_category]').val(data.message_template_category);
                     $('select[name=message_template_language]').val(data.message_template_language);
                     $('select[name=message_template_is_current]').val(data.message_template_is_current);
                     $('textarea[name=message_template]').val(data.message_template);
                     $('input[name=message_template_variables_details]').val(data.message_template_variables_details);
                     $('#addMessageTemplate').modal('show');   
   
                }
                
                },
                
                error: function(response){
                   var data =JSON.parse(response.responseText);
                }

            });
      });




  function getSingleVendorByID(message_vendor_id) {
    // body...
            $.ajax({
                type: 'ajax',
                url: "<?php echo base_url() ?>api/Messages/getSingleVendorByID",
                async: false,
                method:'get',
                data:{'message_vendor_id':message_vendor_id},

                dataType: 'json',
                beforeSend: function(xhr) {
                    xhr.setRequestHeader('X-API-KEY','enachSyncWorks');
                },
                success: function(response) {
                    // body...
                  var  data=response.data;

             
                    $('#message_variable_start_with').val(data.message_variable_start_with);
                    $('#message_variable_end_with').val(data.message_variable_end_with);
               
                },
                
                error: function(response){
                   var data =JSON.parse(response.responseText);

                    $('#message_variable_start_with').val(null);
                    $('#message_variable_end_with').val(null);

                    // $('#tab-all').html(tabContentAll);
                }

            });

  }


  function detectVariables(message_template,message_variable_start_with,message_variable_end_with,message_template_type) {
     
    
      let regex = new RegExp(message_variable_start_with + '(.*?)' + message_variable_end_with, 'g');
      var variables = [];
      var match;
      while ((match = regex.exec(message_template)) !== null) {
           if (match[1].trim() !== "") {
              variables.push(message_variable_start_with+match[1].trim() + message_variable_end_with);
          }
      }
 

    if(variables){
      
      $('#addMessageTemplate').modal('hide');
      var html="";

      var selectTag ='<span class="px-1 m-0" style="max-width: 120px;"><select class="form-select form-select-sm  m-1 mt-0" name="message_template_variables_details_array[]" id="message_template_variables_details_array">'+
                          '<option value="" selected>Select</option>'+
                         
                          '<option value="mandate_customers.transaction_link">Mandate Link</option>'+ 
                         
                          '<option value="mandate_customers.otp">Customer OTP</option>'+
                         
                          '<option value="mandate_customers.customer_name">Customer Name</option>'+

                          '<option value="mandate_customers.customer_mobile_no">Customer Mobile No</option>'+

                          '<option value="mandate_customers.customer_email">Customer Email</option>'+

                          '<option value="mandate_customers.loan_type_id">Loan Type ID</option>'+
                         
                          '<option value="loan_types.loan_type_name">Loan Type Name</option>'+

                          '<option value="mandate_customers.bank_account_no">Customer Bank Account No. (Adarsh)</option>'+

                          '<option value="mandate_customers.account_no">Customer Account No. (Loan)</option>'+
                          
                          '<option value="mandate_customers.emi_frequency">EMI Frequency</option>'+

                          '<option value="mandate_customers.emi_count">EMI Count</option>'+
                          
                          '<option value="mandate_customers.customer_start_date">EMI Start Date</option>'+
                          
                          '<option value="mandate_customers.customer_end_date">EMI End Date</option>'+
                          
                          '<option value="mandate_transaction_schedule.mts_datetime">EMI Transaction Date</option>'+

                          '<option value="mandate_transaction_schedule.mts_message">EMI Message</option>'+
                         
                          '<option value="mandate_customers.txn_ID">EMI Transaction ID</option>'+
                          
                          '<option value="mandate_transaction_schedule.mts_amount">EMI Amount</option>'+
                          
                          '<option value="users.name">Employee Name</option>'+
                          
                          '<option value="users.otp">Employee OTP</option>'+
                          
                          '<option value="bank_banches.branch_name">Branch Name</option>'+
                          
                    '</select></span>';

      variables.forEach(function(variable) {

      message_template = message_template.replace(variable, selectTag);
   
      // html+='<div class="col-md-6">'+
      //            '<p>'+variable+'</p>'+
      //           '</div>'+
      //           '<div class="col-md-6">'+
      //               '<input type="hidden" name="message_template_type_dup"  id="message_template_type_dup" value="'+message_template_type+'">'+
      //               '<select class="form-select" name="message_template_variables_details_array[]" id="message_template_variables_details_array">'+
      //                     '<option value="" selected>Select Data</option>'+
                         
      //                     '<option value="mandate_customers.transaction_link">Mandate Link</option>'+ 
                         
      //                     '<option value="mandate_customers.otp">Customer OTP</option>'+
                         
      //                     '<option value="mandate_customers.customer_name">Customer Name</option>'+

      //                     '<option value="mandate_customers.customer_mobile_no">Customer Mobile No</option>'+

      //                     '<option value="mandate_customers.customer_email">Customer Email</option>'+

      //                     '<option value="mandate_customers.loan_type_id">Loan Type ID</option>'+
                         
      //                     '<option value="loan_types.loan_type_name">Loan Type Name</option>'+

      //                     '<option value="mandate_customers.bank_account_no">Customer Bank Account No. (Adarsh)</option>'+

      //                     '<option value="mandate_customers.account_no">Customer Account No. (Loan)</option>'+
                          
      //                     '<option value="mandate_customers.emi_frequency">EMI Frequency</option>'+

      //                     '<option value="mandate_customers.emi_count">EMI Count</option>'+
                          
      //                     '<option value="mandate_customers.customer_start_date">EMI Start Date</option>'+
                          
      //                     '<option value="mandate_customers.customer_end_date">EMI End Date</option>'+
                          

      //                     '<option value="mandate_transaction_schedule.mts_datetime">EMI Transaction Date</option>'+
                         
      //                     '<option value="mandate_customers.txn_ID">EMI Transaction ID</option>'+
                          
      //                     '<option value="mandate_transaction_schedule.mts_amount">EMI Amount</option>'+
                          
      //                     '<option value="users.name">Employee Name</option>'+
                          
      //                     '<option value="users.otp">Employee OTP</option>'+
                          
      //                     '<option value="bank_banches.branch_name">Branch Name</option>'+
                         
                          
      //               '</select>'+
      //           '</div>';
      });
    
       $('#myFormVariableDetected').html(message_template);

       $('#detectVarialeModal').modal('show'); 
    
    }
     
  }
  
</script>