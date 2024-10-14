<div class="content mt-0 pt-3 pb-0" >

    <div class="container-fluid h-100">
        <div class="row justify-content-center align-items-center h-100">

            <div class="col-sm-6 col-md-6 col-xl-5 col-xxl-5 m-0 p-0 mx-auto my-0 h-100">
            <div class="card border rounded-0 border-300 h-100 w-100 overflow-hidden m-0 p-0">
            <h5 class=" fs-2 text-center font-weight-bold border-bottom border-1 mt-0 pb-1 bg-primary text-white" >Create e-NACH Mandate</h5>

                 <div class="card-header justify-content-center  align-items-center p-2 border-0">
                    <div class="text-center "><img class="img-fluid d-dark-none" src="<?php echo base_url();?>uploads/organization_logos/<?php echo $bank_logo;?>" alt="" width="100" /><img class="img-fluid w-md-50 w-lg-100 d-light-none" src="<?php echo base_url();?>uploads/organization_logos/<?php echo $this->session->userdata('organization_logo');?>" alt="" width="540" /></div>
                    <h5 class="lh-sm text-center text-primary font-weight-bold" ><?php echo $bank_name;?></h5>
                </div>

                    <div class="card-body m-1 p-1 border rounded " style="height: 55vh; overflow-y: scroll;">
                    <!-- <div class="card-body m-1 p-1 border rounded" style="max-height: calc(300vh - 400px);  overflow-y: scroll;"> -->

                        <div class="container">
                <div class="justify-content-center align-items-center mb-0 pb-0 border mt-2 m-1 p-2 rounded border">
                <p class="fs--1 fw-semibold text-justify ">
                e-Mandate पूर्ण करण्यासाठी तुमची बँक <span id="bank_name1" class="fw-bold"></span> मध्ये <span id="amount1" class="fw-bold"></span> रुपये + 5 रुपये जमा असल्याची खात्री करून घ्या.
                </p>
                <p class="fs--1 text-justify " >
                <em>तुमचे <span id="amount3" class="fw-bold"></span> रुपये कापले जाणार नाहीत, पण ते e-Mandate करताना जमा असणे आवश्यक असते.</em>
                </p>
                </div>
                    <div class="row mt-3">
                        <div class="col">
                           <p class="fs--1 px-2 fw-bold text-start">Account Holder Name</p>
                        </div>
                        <div class="col">
                            <p class="fs--1 text-end me-2 fw-bold mb-0" id="customer_name" name="customer_name"></p>
                        </div>
                    </div>
                    <div class="row border-bottom border-1">
                    <div class="col">
                            <p class="fs--1 px-2 fw-bold text-start">Customer Mobile No.</p>
                        </div>
                        <div class="col" >
                            <p class="fs--1 text-end me-2  fw-bold mb-0" id="customer_mobile_no" name="customer_mobile_no" ></p>
                        </div>
                        
                    </div>
                    <div class="row mt-3" >
                    <div class="col">
                            <p class="fs--1 px-2 fw-bold text-start">EMI Frequency</p>
                        </div>
                        <div class="col">
                            <p class="fs--1 text-end me-2 fw-bold mb-0" id="emi_frequency" name="emi_frequency"></p>
                        </div>
                   
                     
                    </div>
                   

                    <div class="row">
                    <div class="col">
                           <p class="fs--1 px-2 fw-bold text-start">EMI Debit Date</p>
                        </div>
                        <div class="col">
                            <p class="fs--1 text-end me-2 fw-bold mb-0"  id="transactionDate" name="transactionDate"></p>
                        </div>
                     
                    </div>
                    <div class="row border-bottom border-1">
                        <div class="col">
                            <p class="fs--1 px-2 fw-bold text-start">EMI Amount</p>
                        </div>
                        <div class="col">
                            <p class="fs--1 text-end me-2 fw-bold mb-0" id="amount" name="amount"></p>
                        </div>
                      
                    </div>


                    <div class="row mt-3" >
                         <div class="col">
                            <p class="fs--1 px-2 fw-bold text-start">Bank Name</p>
                        </div>
                        <div class="col">
                            <p class="fs--1 text-end me-2 fw-bold mb-0" id="bank_name" name="bank_name"></p>
                        </div>
                     
                     
                    </div>


                    <div class="row">
                           <div class="col">
                           <p class="fs--1 px-2 fw-bold text-start">Account No.</p>
                        </div>
                        <div class="col">
                            <p class="fs--1 text-end me-2 fw-bold mb-0" id="account_no" name="account_no"></p>
                        </div>
                      
                    </div>
                    <div class="row">
                          <div class="col">
                            <p class="fs--1 px-2 fw-bold text-start">Bank Account Type</p>
                        </div>
                        <div class="col">
                            <p class="fs--1 text-end me-2 fw-bold mb-0" id="account_type" name="account_type"></p>
                        </div>
                       
                    </div>
                    <div class="row border-bottom border-1" >
                          <div class="col">
                            <p class="fs--1 px-2 fw-bold text-start">IFSC Code</p>
                        </div>
                        <div class="col">
                            <p class="fs--1 text-end me-2 fw-bold mb-0" id="ifsc_code" name="ifsc_code"></p>
                        </div>
                     
                     
                    </div>

                    <div class="row mt-3">
                          <div class="col">
                           <p class="fs--1 px-2 fw-bold text-start">Loan Type</p>
                        </div>
                        <div class="col">
                            <p class="fs--1 text-end me-2 fw-bold mb-0" id="loan_type_id" name="loan_type_id"></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <p class="fs--1 px-2 fw-bold text-start">EMI Start Date</p>
                        </div>
                        <div class="col">
                            <p class="fs--1 text-end me-2 fw-bold mb-0" id="customer_start_date" name="customer_start_date"></p>
                        </div>
                    </div>
                    <div class="row" >
                       <div class="col">
                            <p class="fs--1 px-2 fw-bold text-start">EMI End Date</p>
                        </div>
                        <div class="col">
                            <p class="fs--1 text-end me-2 fw-bold mb-0" id="customer_end_date" name="customer_end_date"></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <p class="fs--1 px-2 fw-bold text-start">No.Of EMI's</p>
                        </div>
                        <div class="col">
                            <p class="fs--1 text-end me-2 fw-bold mb-0" id="emi_count" name="emi_count"></p>
                        </div>
                      
                    </div>
                </div>
                </div>


                <div class="card-footer p-2 border-0">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="termsAndConditions" name="termsAndConditions">
                        <label class="form-check-label" for="termsAndConditions">

                        I accept all the<a href="<?php echo base_url();?>TermsAndConditions/" target="_blank"> Terms and Conditions</a> of Sync-eNACH.
                        </label>
                    </div>
                    <div class=" m-1 p-1 text-center d-grid gap-2">
                    <button type="button" class="btn btn-primary" id="proceedButton">Proceed</button>
                    </div>
            </div>
               
            

          
        </div>
    </div>
    
 </div>
</div>
</div>


<script type="text/javascript" src="https://www.paynimo.com/paynimocheckout/server/lib/checkout.js"></script>    
<script type="text/javascript">
  
     

var customer_details = {};

 populateForm();

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




function populateForm() {
    $.ajax({
        url: '<?php echo base_url(); ?>api/User/getInputString',
        data: {'mandate_customer_id': '<?php echo $mandate_customer_id; ?>'},
        type: "GET",
        dataType: "json",
        beforeSend: function(xhr) {
            xhr.setRequestHeader('X-API-KEY', 'enachSyncWorks');
        },
        success: function(response) {
            if (response.status) {
                customer_details = response.data;
                console.log("Customer Details:", customer_details);
                $("#customer_name").text(customer_details.customer_name);
                $("#customer_mobile_no").text(customer_details.customer_mobile_no);
                $("#account_no").text(customer_details.account_no);
                $("#account_type").text(customer_details.account_type);
                $("#ifsc_code").text(customer_details.ifsc_code);

                // $("#customer_start_date").text(customer_details.customer_start_date);
                // $("#customer_end_date").text(customer_details.customer_end_date);
                $("#transactionDate").text(customer_details.transactionDate);
                $("#emi_count").text(customer_details.emi_count);
                $("#emi_frequency").text(customer_details.emi_frequency);
                $("#amount").text(customer_details.amount);
                $("#amount1").text(customer_details.amount);
                $("#amount2").text(customer_details.amount);
                $("#amount3").text(customer_details.amount);

                var startDate = new Date(customer_details.customer_start_date);
                var formattedStartDate = startDate.toLocaleDateString('en-GB');
                $("#customer_start_date").text(formattedStartDate);

                var endDate = new Date(customer_details.customer_end_date);
                var formattedEndDate = endDate.toLocaleDateString('en-GB');

                $("#customer_end_date").text(formattedEndDate);


                // Fetch and display bank name'merchantId': customer_details.merchant_ID
                $.ajax({
                    type: 'GET',
                    url: '<?php echo base_url(); ?>api/Bank/show_Enach_Bank_row',
                    data: {'enach_bank_id': customer_details.bank_name},
                    dataType: 'json',
                    beforeSend: function(xhr) {
                        xhr.setRequestHeader('X-API-KEY', 'enachSyncWorks');
                    },
                    success: function(response) {
                        if (response.status) {
                            var bank_name = response.data.enach_bank_name;
                            $("#bank_name").text(bank_name);
                            $("#bank_name1").text(bank_name);
                        } else {
                            console.error("Error: " + response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("Error fetching bank data: " + error);
                    }
                });


                var loan_type_id = customer_details.loan_type_id;

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
                          console.log('Loan', response);

                          if (response && response.status === true && response.data.length > 0) {
                              // Find the loan type object corresponding to the loan_type_id
                              var loanType = response.data.find(function(loan) {
                                  return loan.loan_type_id == loan_type_id;
                              });

                              if (loanType) {
                                  var loanTypeName = loanType.loan_type_name;
                                  console.log('Loan Type Name:', loanTypeName);
                                  $('#loan_type_id').text(loanTypeName);
                              } else {
                                  console.error('Loan type not found for loan_type_id:', loan_type_id);
                              }
                          } else {
                              console.error('Invalid response or no loan types found');
                          }
                      },
                  error: function(response) {
                      // Handle error
                      var data = JSON.parse(response.responseText);
                      toastr.error(data.message);
                  }
              });


            } else {
                console.error("Error: " + response.message);
            }
        },
        error: function(xhr, status, error) {
            console.error("Error fetching data: " + error);
        }
    });
}
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
              
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
                // alert("Failed to send transaction link. Please try again later.");
            }
        });
    }

    function generateTransactionSchedule(mandate_customer_id) {

            // ,customer_start_date,customer_end_date,
            // customer_amount,transactionDate,emi_frequency,loan_type_id,emi_count,bank_account_no
            
            if (mandate_customer_id){
                   //  var start = new Date(customer_start_date);
                  
                   //  var todayDate = new Date();

                   //  var endDate = new Date(start);

                   //  var count = parseInt(emi_count, 10);
                 
                   //  var interval;

                   //  var schedule = [];

                   //  let firsttransactionDate;
                   
                   // if(start.getDate() >= transactionDate && start.getMonth() >= todayDate.getMonth()) {
                   //      firsttransactionDate = new Date(start.getFullYear(), start.getMonth() + 1, transactionDate);
                   //  }   
                   //  else {
                   //      firsttransactionDate = new Date(start.getFullYear(),start.getMonth(), transactionDate);
                   //  }  

                   //      endDate= firsttransactionDate;
                   //      var schduleDate='';
                   //      switch (emi_frequency) {
                   //          case "DAIL":
                   //              interval = 1;

                   //             for (let i = 0; i < emi_count; i++) {
                                 
                   //                   endDate  = new Date(endDate.getFullYear(), endDate.getMonth(),endDate.getDate());
                   //                   schduleDate  = new Date(endDate.getFullYear(), endDate.getMonth(),endDate.getDate());
                                
                   //                   schedule.push(schduleDate);
                   //                   endDate.setDate(endDate.getDate()+parseInt(interval));
                   //                   // schduleDate.setUTCDate(schduleDate.getDate());


                   //              }
                                
                   //              // endDate.setUTCDate(endDate.getDate());
                   //              // endDate.setDate(0);

                   //              break;
                   //          case "WEEK":
                   //              interval = 7;

                   //              for (let i = 0; i < emi_count; i++) {
                                     
                   //                   endDate  = new Date(endDate.getFullYear(), endDate.getMonth(),endDate.getDate());
                   //                   schduleDate  = new Date(endDate.getFullYear(), endDate.getMonth(),endDate.getDate());
                                
                   //                   schedule.push(schduleDate);
                   //                   endDate.setDate(endDate.getDate()+parseInt(interval));
                                    
                   //              }
                                
                   //              break;
                   //          case "MNTH":
                   //              interval = 1;

                   //             for (let i = 0; i < emi_count; i++) {
                                        
                   //                   endDate  = new Date(endDate.getFullYear(), endDate.getMonth(),transactionDate);
                   //                   schduleDate  = new Date(endDate.getFullYear(), endDate.getMonth(),transactionDate);
                                
                   //                   schedule.push(schduleDate);
                   //                   endDate.setMonth(endDate.getMonth()+parseInt(interval));
                                    
                   //              }
                               
                   //              // endDate.setUTCDate(endDate.getDate());
                   //              // endDate.setDate(0);
                                
                   //              break;  
                   //          case "BIMN":
                   //              interval = 2;
                   //              for (let i = 0; i < emi_count; i++) {
                                        
                   //                   endDate  = new Date(endDate.getFullYear(), endDate.getMonth(),transactionDate);
                   //                   schduleDate  = new Date(endDate.getFullYear(), endDate.getMonth(),transactionDate);
                                
                   //                   schedule.push(schduleDate);
                   //                   endDate.setMonth(endDate.getMonth()+parseInt(interval));
                                    
                   //              }
                                
                   //              break;
                   //          case "QURT":
                   //              interval = 3;
                   //               for (let i = 0; i < emi_count; i++) {
                                        
                   //                   endDate  = new Date(endDate.getFullYear(), endDate.getMonth(),transactionDate);
                   //                   schduleDate  = new Date(endDate.getFullYear(), endDate.getMonth(),transactionDate);
                                
                   //                   schedule.push(schduleDate);
                   //                   endDate.setMonth(endDate.getMonth()+parseInt(interval));
                                    
                   //              }
                                  
                   //              break;
                   //          case "MIAN":
                   //              interval = 6;
                   //              for (let i = 0; i < emi_count; i++) {
                                        
                   //                   endDate  = new Date(endDate.getFullYear(), endDate.getMonth(),transactionDate);
                   //                   schduleDate  = new Date(endDate.getFullYear(), endDate.getMonth(),transactionDate);
                                
                   //                   schedule.push(schduleDate);
                   //                   endDate.setMonth(endDate.getMonth()+parseInt(interval));
                                    
                   //              }
                                  
                   //              break;
                   //          case "YEAR":
                   //              interval = 12;
                   //              for (let i = 0; i < emi_count; i++) {
                                        
                   //                   endDate  = new Date(endDate.getFullYear(), endDate.getMonth(),transactionDate);
                   //                   schduleDate  = new Date(endDate.getFullYear(), endDate.getMonth(),transactionDate);
                                
                   //                   schedule.push(schduleDate);
                   //                   endDate.setMonth(endDate.getMonth()+parseInt(interval));
                                    
                   //              }
                                  
                   //              break;
                   //          case "ADHO":
                   //              interval = 1;
                   //              for (let i = 0; i < emi_count; i++) {
                                        
                   //                   endDate  = new Date(endDate.getFullYear(), endDate.getMonth(),transactionDate);
                   //                   schduleDate  = new Date(endDate.getFullYear(), endDate.getMonth(),transactionDate);
                                
                   //                   schedule.push(schduleDate);
                   //                   endDate.setMonth(endDate.getMonth()+parseInt(interval));
                                    
                   //              }
                   //              break;
                   //          default:
                   //              console.error("Invalid emi_frequency");
                   //              return;
                   //      }
                     
                   //  var schedule_html='';  
                   //  var formatted_schedule = [];  
                   //  for (var k = 0;k < schedule.length;k++) {
                   //      var x= k+1;
                   //      formatted_schedule.push(formatDate(schedule[k]));
                   //       schedule_html+='<tr>'+
                   //          '<td>'+ x+'</td>'+
                   //          '<td>'+ formatDate(schedule[k])+'</td>'+
                   //          '<td>'+customer_amount+'</td>'+
                   //          '</tr>'
                   //  }    

                      $.ajax({
                                type: 'ajax',
                                method:'post',
                                url: '<?php echo base_url(); ?>api/User/generateMandateTransactionSchedule',
                                data: {
                                   mandate_customer_id:mandate_customer_id,
                                   // customer_start_date:customer_start_date,
                                   // customer_end_date:customer_end_date,
                                   // customer_amount:customer_amount,
                                   // emi_count:emi_count,
                                   // emi_frequency:emi_frequency,
                                   // // txn date
                                   // transactionDate:transactionDate,
                                   // // loan
                                   // loan_type_id:loan_type_id,
                                   // // bank_account_no
                                   // bank_account_no:bank_account_no,
                                   // schedule:formatted_schedule
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
             
       }     
      

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

      
      function handleResponse(res) {
         if (typeof res != 'undefined' && typeof res.paymentMethod != 'undefined' && typeof res.paymentMethod.paymentTransaction != 'undefined' && typeof res.paymentMethod.paymentTransaction.statusCode != 'undefined' && res.paymentMethod.paymentTransaction.statusCode == '0300') {
             // success block
         } else if (typeof res != 'undefined' && typeof res.paymentMethod != 'undefined' && typeof res.paymentMethod.paymentTransaction != 'undefined' && typeof res.paymentMethod.paymentTransaction.statusCode != 'undefined' && res.paymentMethod.paymentTransaction.statusCode == '0398') {
             // initiated block
         } else {
             // error block
         }
      };


    async function generateSHA512Hash(inputString) {
        

          const encoder = new TextEncoder();
          const data = encoder.encode(inputString);

          // console.log(data);
   
          // Generate a SHA-512 hash
          window.crypto.subtle.digest('SHA-512', data)
            .then(hashBuffer => {
              // Convert the hash to a hexadecimal string
              const hashArray = Array.from(new Uint8Array(hashBuffer));
              const token = hashArray.map(byte => byte.toString(16).padStart(2, '0')).join('');
              console.log("Generated Token: " + token);
          
          // e.preventDefault();

               var submitStartDate =  formatDateToDMY(customer_details.customer_start_date);

               var submitEndDate =  formatDateToDMY(customer_details.customer_end_date);
                
               var configJson = {
                      'tarCall': false,
                      'features': {
                          'showPGResponseMsg': true,
                          'enableAbortResponse': true,
                          'showDownloadReceipt': true,
                          'enableNewWindowFlow': true,    //for hybrid applications please disable this by passing false
                          'enableExpressPay':true,
                          'siDetailsAtMerchantEnd':true,
                          'enableSI':true,
                          'payDetailsAtMerchantEnd':true
                      },
                 
                      'consumerData': {
                          'deviceId': customer_details.device_ID,   //possible values 'WEBSH1' and 'WEBSH2'
                          'token': token,
                      //    'returnUrl': window.location.href,    //merchant response page URL
                     
                       // 'returnUrl': 'https://www.tekprocess.co.in/MerchantIntegrationClient/MerchantResponsePage.jsp', 
                       //  merchant response page URL
                       // 'responseHandler': handleResponse,
                     
                          'responseHandler': function (response) {
   
                                  $.ajax({
                                      type: 'ajax',
                                      method:'post',
                                      url: '<?php echo base_url(); ?>api/User/savemandateLog',
                                      data: {
                                        mandate_register_datetime:response.paymentMethod.paymentTransaction.dateTime,
                                        mandate_status_code:response.paymentMethod.paymentTransaction.statusCode,
                                        // mandate_status_message:response.paymentMethod.paymentTransaction.statusMessage,
                                        mandate_status_message : 'success',
                                        mandate_identifier:response.paymentMethod.paymentTransaction.identifier,
                                        mandate_token:response.paymentMethod.paymentTransaction.instruction.id,
                                        response:response,
                                        customer_mobile_no: customer_details.customer_mobile_no,
                                        mandate_customer_id:'<?php echo $mandate_customer_id; ?>'
                                      },
   
                                      async: false,
                                      dataType: 'json',
                                      beforeSend: function(xhr) {
                                          xhr.setRequestHeader('X-API-KEY','enachSyncWorks');
                                      },
                                      success: function(response1){
                                      
                                       var statusMessage = '';
                                       if (response.paymentMethod && response.paymentMethod.paymentTransaction) {
                                           statusMessage = response.paymentMethod.paymentTransaction.statusMessage;
                                       } else if (response.status_message) {
                                           statusMessage = response.status_message;
                                       }
                                        // === 'success' 
                                       if (statusMessage ) {
                                           console.log("Status is 'Success'. Generating transaction schedule...");
                                           generateTransactionSchedule('<?php echo $mandate_customer_id; ?>',
                                            customer_details.customer_start_date,
                                             customer_details.customer_end_date,
                                             customer_details.amount,
                                             customer_details.transactionDate,
                                             customer_details.emi_frequency,
                                             customer_details.loan_type_id,customer_details.emi_count,customer_details.bank_account_no);
                                           toastr.success('Transaction schedule generated successfully.');

                                            var message_template_work_type='MANDATE_SUCCESS';

                                            var mci='<?php echo $mandate_customer_id; ?>';

                                            getDefaultTemplateIDsByWorkType(message_template_work_type);
                                            
                                            if(templates_to_send){
                                             
                                                  for (var temp = 0; temp < templates_to_send.length; temp++) {
                                                 
                                                     var message_template_id_send =   templates_to_send[temp].message_template_id;

                                                    sendAllMessages(message_template_id_send,mci);
                                                  
                                                  }
                                            } 

                                             toastr.success('Mandate Registration Successful. Closing this page now !!!');
                                             setTimeout(() => {  window.close(); }, 2000);

                                       } else {
                                        
                                         
                                           console.log("Transaction schedule will not be generated.");
                                            //    toastr.error('Failed to generate transaction schedule.');
                                            toastr.error('Mandate Registration Failed. Please retry & fill correct information.!!!');


                                           }
                                        },
       
                                        error: function(response1){
                                              toastr.error('Mandate Registration Failed. Please retry & fill correct information.!!!');

                                          }
       
                                      });
                                      // You can perform further actions based on the response here
                              },
                              
                              'paymentMode': customer_details.payment_mode,
                              'merchantLogoUrl': 'https://www.paynimo.com/CompanyDocs/company-logo-md.png',  //provided merchant logo will be displayed
                              'merchantId': customer_details.merchant_ID,
                              'currency': 'INR',
                              'consumerId': customer_details.consumer_ID,  //Your unique consumer identifier to register a eMandate/eNACH
                              'consumerMobileNo': customer_details.customer_mobile_no,
                              'consumerEmailId': customer_details.customer_email,
                              'txnId': customer_details.txn_ID,   //Unique merchant transaction ID
                              'items': [{
                                  'itemId': customer_details.item_id,
                                  'amount': customer_details.amount,
                                  'comAmt': customer_details.commission_amount
                              }],
                              'customStyle': {
                                  'PRIMARY_COLOR_CODE': '#3977b7',   //merchant primary color code
                                  'SECONDARY_COLOR_CODE': '#FFFFFF',   //provide merchant's suitable color code
                                  'BUTTON_COLOR_CODE_1': '#1969bb',   //merchant's button background color code
                                  'BUTTON_COLOR_CODE_2': '#FFFFFF'   //provide merchant's suitable color code for button text
                              },
                              'accountNo': customer_details.account_no,    //Pass this if accountNo is captured at merchant side for eMandate/eNACH
                              'accountHolderName': customer_details.customer_name,  //Pass this if accountHolderName is captured at merchant side for ICICI eMandate & eNACH registration this is mandatory field, if not passed from merchant Customer need to enter in Checkout UI.
                              'ifscCode': customer_details.ifsc_code,        //Pass this if ifscCode is captured at merchant side.
                              'accountType': customer_details.account_type,  //Required for eNACH registration this is mandatory field
                              'debitStartDate':submitStartDate,
                              'debitEndDate': submitEndDate,
                              'bankCode': customer_details.bank_code,  //bank code captured from merchant end[bank codelist provided by Worldline]
                              'maxAmount': customer_details.amount,
                              'amountType': 'M',
                              'frequency': customer_details.emi_frequency //  Available options DAIL, WEEK, MNTH, QURT, MIAN, YEAR, BIMN and ADHO
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






      $('#addMandateDetails').click(function(){
                    
                    document.getElementById("customer_name").classList.remove("is-invalid");
                    document.getElementById("customer_mobile_no").classList.remove("is-invalid");
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
                    document.getElementById("amount").classList.remove("is-invalid");
                    document.getElementById("bank_code").classList.remove("is-invalid");
                    document.getElementById("amount").classList.remove("is-invalid");
                    // document.getElementById("mandate_customer_id ").classList.remove("is-invalid");
                    // document.getElementById("bank_branch_id").classList.remove("is-invalid");   
              
                    var formData = new FormData();
                const myDropzone = Dropzone.forElement('#dropzone');
          
          
              
                // Check if Dropzone instance exists and there is at least one file
              //   if (myDropzone && myDropzone.files.length > 0) {
              //     formData.append('document', myDropzone.files[0], myDropzone.files[0].name);
              // }
                          // if (!myDropzone || myDropzone.files.length === 0) {
                          //   toastr.error('Please upload a document.');
                            
                          //   return false;
                          // } else {
                          //     formData.append('document', myDropzone.files[0], myDropzone.files[0].name);
                          // }
                          formData.append('mandate_customer_id', $('#mandate_customer_id').val());
                          formData.append('device_ID', $('#device_ID').val());
                          formData.append('payment_mode', $('#payment_mode').val());
                          formData.append('bank_name', $('#bank_name').val());
                          formData.append('merchant_ID', $('#merchant_ID').val());
                          formData.append('consumer_ID', $('#consumer_ID').val());
                          formData.append('customer_name', $('#customer_name').val());
                          formData.append('customer_mobile_no', $('#customer_mobile_no').val());
                          formData.append('customer_email', $('#customer_email').val());
                          // bank_account_no
                          formData.append('bank_account_no', $('#bank_account_no').val());
                                        
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
              
                    //Branch
                    branch_id = $('select[name=branch_id]').val();
              
                    //EMI Count
                    emi_count = $('input[name=emi_count]').val();
                    //Frequency for the EMI
                    emi_frequency = $('select[name=emi_frequency]').val();
              
                    customer_start_date = $('input[name=customer_start_date]').val();
                    customer_end_date = $('input[name=customer_end_date]').val();
                    //EMI Date
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
                      
                      if(branch_id==''){
                          document.getElementById("branch_id").classList.add("is-invalid");
                          toastr.error("Please Select Branch");
                      }
                      else if(customer_name==''){
                          document.getElementById("customer_name").classList.add("is-invalid");
                          toastr.error("Please Enter Account Holder Name");
                      }
                      // else  if (bank_branch_id.val()=='' && ins_type.val()=="insert") {
                      //     document.getElementById("bank_branch_id").classList.add("is-invalid");
                      //    toastr.error("Please Select Bank Branch");
                      // }
              
                      else if(customer_mobile_no==''){
                          document.getElementById("customer_mobile_no").classList.add("is-invalid");
                          toastr.error("Please Enter Mobile No.");
                      }
                     // loan
                      // else if(loan_type_id==''){
                      //     document.getElementById("loan_type_id").classList.add("is-invalid");
                      //     toastr.error("Please Select Loan Type");
                      // }
          
                      // bank_account_no
                      // else if(bank_account_no==''){
                      //     document.getElementById("bank_account_no").classList.add("is-invalid");
                      //     toastr.error("Please Enter Bank Account Number");
                      // }
                      
                      else if(payment_mode==''){
                          document.getElementById("payment_mode").classList.add("is-invalid");
                          toastr.error("Please Select Payment Mode");
                      }
                      else if(bank_name==''){
                          document.getElementById("bank_name").classList.add("is-invalid");
                          toastr.error("Please Select Bank");
                      }
                     
              
                      else if(consumer_ID==''){
                          document.getElementById("consumer_ID").classList.add("is-invalid");
                          toastr.error("Please Enter Consumer ID");
                      }
              
                      else if(txn_ID==''){
                          document.getElementById("txn_ID").classList.add("is-invalid");
                          toastr.error("Please Enter Txn/Transaction ID");
                      }
              
                      else if(account_no==''){
                          document.getElementById("account_no").classList.add("is-invalid");
                          toastr.error("Please Enter Account Number");
                      }
                      else if(account_type==''){
                         document.getElementById("account_type").classList.add("is-invalid");
                         toastr.error("Please Select Account Type");
                      }
                      // else if(ifsc_code==''){
                      //    document.getElementById("ifsc_code").classList.add("is-invalid");
                      //    toastr.error("Please Enter IFSC Code");
                      // }
              
                      else if(emi_count==''){
                         document.getElementById("emi_count").classList.add("is-invalid");
                         toastr.error("Please Enter EMI Count");
                      }
              
                      else if(emi_frequency==''){
                         document.getElementById("emi_frequency").classList.add("is-invalid");
                         toastr.error("Please Select EMI Frequency");
                      }
              
                      else if(customer_start_date==''){
                         document.getElementById("customer_start_date").classList.add("is-invalid");
                         toastr.error("Please Select EMI Start Date");
                      }
              
                       else if(customer_end_date==''){
                         document.getElementById("customer_end_date").classList.add("is-invalid");
                         toastr.error("Please Select EMI End Date");
                      }
                      // select EMI Date 
                      else if(transactionDate==''){
                         document.getElementById("transactionDate").classList.add("is-invalid");
                         toastr.error("Please Select EMI Date");
                      }
              
                      else if(amount==''){
                         document.getElementById("amount").classList.add("is-invalid");
                         toastr.error("Please Enter Amount");
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
                    //   else if (customer_start_date != '' && transactionDate != '' && new Date(customer_start_date) > new Date(transactionDate)) {
                    //     document.getElementById("customer_start_date").classList.add("is-invalid");
                    //     document.getElementById("transactionDate").classList.add("is-invalid");
                    //     toastr.error("Please select EMI Start Date from the next month.");
                    // }
              
                      else{
              
              
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
              
              
                            //  const inputString = merchant_ID+"|"+txn_ID+"|"+amount+"|"+account_no+"|"+consumer_ID+"|"+customer_mobile_no+"|"+customer_email+"|"+customer_start_date+"|"+customer_end_date+"|"+amount+"|"+emi_frequency+"|"+transactionDate+"|"+consumer_card_number+"|"+consumer_expiry_month+"|"+consumer_expiry_year+"|"+consumer_cvv_no+"|2576743890JCNHAM";
                         
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
          
                                           toastr.success(response.message);
          
                                           mandate_customer_id=response.data;
                                          //  const inputString= response.inputString;
                                          //  generateSHA512Hash(inputString);  
          
                                           $('#mandateCustomerModalCenter').modal('hide');
          
                                            // Open the second modal after the first modal is closed
                                            $('#mandateTransaction').modal('show');
                                          }
                                          else{
                                             toastr.error(response.message);
                                          }
              
                                          showUsersData(1);
                                          // showPopupBlockAlert();
                                  },
              
                                error: function(response){
                                         var data =JSON.parse(response.responseText);
                                         toastr.error(data.message);
                                     
                                  }
              
                              });
              
                      }
              
                
                });

$(document).ready(function(){
    $('#proceedButton').click(function(event){

        event.preventDefault();
        // $('#mandateTransaction').modal('hide');
        if (!$('#termsAndConditions').is(':checked')) {
            toastr.error("Please agree to the terms and conditions.");
            return;
        }

        else{

               populateForm();
               var inputString = customer_details.inputString;
               generateSHA512Hash(inputString);
        }
     
    });
});



                
</script> 