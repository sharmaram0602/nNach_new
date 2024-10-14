
	 <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->

      <div class="container">
        <div class="row flex-center min-vh-100 py-5">
          <div class="col-sm-10 col-md-8 col-lg-5 col-xl-5 col-xxl-3"><a class="d-flex flex-center text-decoration-none mb-4" href="<?php echo base_url();?>">
              <div class="d-flex align-items-center fw-bolder fs-5 d-inline-block"><img src="<?php echo base_url();?>uploads/organization_logos/SyncWorksLogo.png" alt="phoenix" width="58" />
              </div>
            </a>
            <div id="LoginScreen">
                
                   <div class="text-center mb-7">
                    <h3 class="text-1000">Sign In</h3>
                    <p class="text-700">Get access to your account</p>
                  </div>

                  <div class="mb-3 text-start">
                    <label class="form-label" for="email">Email address / Username / Mobile No.</label>
                    <div class="form-icon-container">
                      <input class="form-control form-icon-input" name="email" id="email" type="email" placeholder="name@example.com" /><span class="fas fa-user text-900 fs--1 form-icon"></span>
                    </div>
                  </div>
                  <div class="mb-3 text-start">
                    <label class="form-label" for="password">Password</label>
                    <div class="form-icon-container">
                      <input class="form-control form-icon-input" name="password" id="password" type="password" placeholder="Password" /><span class="fas fa-key text-900 fs--1 form-icon"></span>
                    </div>
                  </div>
                  <div class="row flex-between-center mb-2">
                  
                    <a class="fs--1" href="javascript:;" id="forgotPassword">Forgot Password ? </a>
                    <!-- <div class="col-auto"><a class="fs--1 fw-semi-bold" href="<?php echo base_url();?>pages/authentication/simple/forgot-password.html">Forgot Password?</a></div> -->
                  </div>
                  <button class="btn btn-primary w-100 mb-3" id="btnLogin">Sign In</button>

            </div>

            <div id="LoginOTPScreen" class="d-none">
                 <div class="px-xxl-5">
                    <div class="text-center mb-6">
                      <h4 class="text-1000">Enter the verification code</h4>
                      <p class="text-700 mb-0">An Message containing a 6-digit verification code has been sent to the email address - <span id="emailDiv"> </span> and Whatsapp,SMS on <span id="phoneDiv"></span> </p>
                      <!-- <P class="fs--2 mb-5">Don’t have access? <a href="#!">Use another method</a></P> -->
                      <form class="verification-otp-form">
                        <div class="d-flex align-items-center gap-2 mb-3">
                          <input class="form-control px-2 text-center" type="hidden" name="user_id" id="user_id" />
                          <input class="form-control px-2 text-center" type="hidden" name="customer_mobile_no" id="customer_mobile_no" />
                          <input class="form-control px-2 text-center" type="hidden" name="email" id="email" />
                        
                          <input class="form-control px-2 text-center input-spin-none" type="number" id="otp" name="otp" />
                       
                        </div>
                       </form>
                        <button class="btn btn-primary w-100 mb-5" id="submitLoginOTP" type="button">Verify</button>
                        <button class="btn btn-primary w-100 mb-5 d-none" id="resendOTPLoginExpired" type="button">Resend OTP</button>
                        Didn’t receive the code? <a class="fs--1" href="javascript:;" id="resendOTPLogin">Resend</a>
                     
                    </div>
                  </div>
            </div>

             <div id="ForgetPasswordScreen" class="d-none">
                 <div class="text-center mb-7">
                    <h3 class="text-1000">Forget Password ?</h3>
                    <p class="text-700">Get access to your account</p>
                  </div>

                  <div class="mb-3 text-start">
                    <label class="form-label" for="email"> Mobile No.</label>
                    <div class="form-icon-container">
                      <input class="form-control form-icon-input input-spin-none" name="mobilenoForget" id="mobilenoForget" type="number" placeholder="Enter Mobile No." /><span class="fas fa-user text-900 fs--1 form-icon"></span>
                    </div>
                  </div>
                 
                  <div class="row flex-between-center mb-2">
                   
                    <a class="fs--1" href="javascript:;" id="LoginScreenBtn">Login ?</a>
                  </div>
                  <button class="btn btn-primary w-100 mb-3" id="btnForgetPasswordOTP">Send Verification Code</button>

            </div>


              <div id="ForgetOTPScreen" class="d-none"> 

                 <div class="px-xxl-5">
                    <div class="text-center mb-6">
                      <h4 class="text-1000">Enter the verification code</h4>
                      <p class="text-700 mb-0">An Message containing a 6-digit verification code has been sent to the email address - 
                        <span id="emailDivForget"> </span> and Whatsapp,SMS on <span id="phoneDivForget"></span> </p>
                    
                      <!-- <P class="fs--2 mb-5">Don’t have access? <a href="#!">Use another method</a></P> -->
                     
                      <form class="forget-otp-form">
                        <div class="d-flex align-items-center gap-2 mb-3">
                          <input class="form-control px-2 text-center" type="hidden" name="user_id_forget" id="user_id_forget" />
                          <input class="form-control px-2 text-center" type="hidden" name="customer_mobile_no_forget" id="customer_mobile_no_forget" />
                          <input class="form-control px-2 text-center" type="hidden" name="email_forget" id="email_forget" />
                        
                          <input class="form-control px-2 text-center input-spin-none" type="number" id="otp_forget" name="otp_forget" />
                         
                        </div>
                       </form>
                        <button class="btn btn-primary w-100 mb-5" id="submitForgetOTP" type="button">Verify</button>
                         <button class="btn btn-primary w-100 mb-5 d-none" id="resendOTPForgetExpired" type="button">Resend OTP</button>
                        Didn’t receive the code? <a class="fs--1" href="javascript:;" id="resendOTPForget">Resend</a>
                     
                    </div>
                  </div>
            </div>


             <div id="newPasswordScreen" class="d-none">
                 <div class="text-center mb-7">
                    <h3 class="text-1000">Enter New Password?</h3>
                    <p class="text-700">Enter a new password to reset</p>
                  </div>

                  <div class="mb-3 text-start">
                    <label class="form-label" for="Password">Password</label>
                    <div class="form-icon-container">
                      <input class="form-control form-icon-input" name="user_id_new" id="user_id_new" type="hidden" placeholder="Enter password" /><span class="fas fa-user text-900 fs--1 form-icon"></span>
                      <input class="form-control form-icon-input" name="newPasswordReset" id="newPasswordReset" type="password" placeholder="Enter password" /><span class="fas fa-user text-900 fs--1 form-icon"></span>
                    </div>
                  </div>
                 
                  <div class="row flex-between-center mb-2">
                    <a class="fs--1" href="javascript:;" id="LoginScreenBtn">Login ?</a>
                  </div>
                  <button class="btn btn-primary w-100 mb-3" id="saveNewPassword">Reset Password</button>

            </div>

           
            <!-- <div class="text-center"><a class="fs--1 fw-bold" href="<?php echo base_url();?>pages/authentication/simple/sign-up.html">Create an account</a></div> -->
          </div>



        </div>
      </div>
 
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->

<script>

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
              
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
                // alert("Failed to send transaction link. Please try again later.");
            }
        });
    }


function generateUserForgetOTP(user_id) {
  // body...


          $.ajax({
              type: 'ajax',
              method:'post',
              url: '<?php echo base_url("api/User/user_otp");?>',
              data: {'user_id':user_id},
              async: false,
              dataType: 'json',
              beforeSend: function(xhr) {
                  xhr.setRequestHeader('X-API-KEY','enachSyncWorks');
              },
              success: function(response){

                  if (response.status) {
                   toastr.success(response.message);

                  var message_template_work_type='FORGET_PASSWORD';

                  getDefaultTemplateIDsByWorkType(message_template_work_type);
                    
                  if(templates_to_send){
                      for (var temp = 0; temp < templates_to_send.length; temp++) {
                     
                         var message_template_id_send =   templates_to_send[temp].message_template_id;

                        sendAllMessages(message_template_id_send,user_id);
                      }
                  }

                  }
                  else{
                     toastr.error(response.message);
                  }
                
                 resetOTPFields();   
              },

            error: function(response){
                     var data =JSON.parse(response.responseText);
                     toastr.error(data.message);

                      resetOTPFields();
              }

          });
}



function generateUserLoginOTP(user_id) {
  // body...


          $.ajax({
              type: 'ajax',
              method:'post',
              url: '<?php echo base_url("api/User/user_otp");?>',
              data: {'user_id':user_id},
              async: false,
              dataType: 'json',
              beforeSend: function(xhr) {
                  xhr.setRequestHeader('X-API-KEY','enachSyncWorks');
              },
              success: function(response){

                  if (response.status) {
                   toastr.success(response.message);

                  var message_template_work_type='LOGIN_VERIFICATION';

                  getDefaultTemplateIDsByWorkType(message_template_work_type);
                    
                  if(templates_to_send){
                      for (var temp = 0; temp < templates_to_send.length; temp++) {
                     
                         var message_template_id_send =   templates_to_send[temp].message_template_id;

                         sendAllMessages(message_template_id_send,user_id);
                      }
                  }

                  }
                  else{
                     toastr.error(response.message);
                  }
                   resetOTPFields();
                  
              },

            error: function(response){
                     var data =JSON.parse(response.responseText);
                     toastr.error(data.message);
                      resetOTPFields();
              }

          });
}


$('#forgotPassword').click(function(){
      $('#LoginScreen').addClass('d-none');
      $('#OTPScreen').addClass('d-none');
      $('#LoginOTPScreen').addClass('d-none');
      $('#ForgetPasswordScreen').removeClass('d-none');
      $('#newPasswordScreen').addClass('d-none');
});




$('#LoginScreenBtn').click(function(){
      $('#LoginScreen').removeClass('d-none');
      $('#OTPScreen').addClass('d-none');
      $('#LoginOTPScreen').addClass('d-none');
      $('#ForgetPasswordScreen').addClass('d-none');
      $('#newPasswordScreen').addClass('d-none');
});



$('#saveNewPassword').click(function(){


    var newPasswordReset = $('input[name=newPasswordReset]').val();
    var user_id_new = $('#user_id_new').val();
    
    if(user_id_new==''){
         toastr.error('User Details Not Found');
    }
    
    else if (newPasswordReset=='') {
     toastr.error("Please Enter Password.");
    }

    else{
 
            $.ajax({
                type: 'ajax',
                method: 'post',
                url: '<?php echo base_url(); ?>api/resetNewPassword',
                data:{'password': newPasswordReset,'user_id':user_id_new},  
                async: false,
                dataType: 'json',
                 beforeSend: function(xhr) {
                    xhr.setRequestHeader('X-API-KEY','enachSyncWorks');
                },
                success: function(response){
                    if(response.status){

                      $('#LoginScreen').removeClass('d-none');
                      $('#LoginOTPScreen').addClass('d-none');
                      $('#ForgetOTPScreen').addClass('d-none');
                      $('#ForgetPasswordScreen').addClass('d-none');
                      $('#newPasswordScreen').addClass('d-none');
                      
                      toastr.success(response.message);
                  
                    }
                },
                  error: function(response){
                       var data =JSON.parse(response.responseText);
                       if(data.message){
                          toastr.error(data.message);
                       }
                       else{
                          toastr.error(data.error);
                       }
                }
            });
    }


});


$('#btnForgetPasswordOTP').click(function(){
   
   var mobilenoForget = $('input[name=mobilenoForget]').val();
    // var result = '';

    if (mobilenoForget=='') {
     toastr.error("Please Enter Mobile No.");
    }

    else{
 
        $.ajax({
        type: 'ajax',
        method: 'get',
        url: '<?php echo base_url(); ?>api/userCheck',
        data:{'phone': mobilenoForget},  
        async: false,
        dataType: 'json',
         beforeSend: function(xhr) {
            xhr.setRequestHeader('X-API-KEY','enachSyncWorks');
        },
        success: function(response){
            if(response.status){

            var user_id = response.user_id;
            var customer_mobile_no = response.customer_mobile_no;
            var email = response.email;

              $('#user_id').val(user_id);
              $('#customer_mobile_no').val(customer_mobile_no);
              $('#user_id_forget').val(user_id);
              $('#email').val(email);
             

              $('#LoginScreen').addClass('d-none');
              $('#LoginOTPScreen').addClass('d-none');
              $('#ForgetOTPScreen').removeClass('d-none');
              $('#ForgetPasswordScreen').addClass('d-none');
              $('#newPasswordScreen').addClass('d-none');
              
               let maskedPhone ='';
               let maskedEmail ='';
             
              if(customer_mobile_no){
                  maskedPhone = customer_mobile_no.slice(0, 2) + '****' + customer_mobile_no.slice(8);

              }
          
             if(email){
               maskedEmail = email.slice(0, 2) + '****' + email.slice(10);

              }
          
              $('#emailDivForget').html(maskedEmail);
              $('#phoneDivForget').html(maskedPhone);
              resetOTPFields();
              generateUserForgetOTP(user_id);
         
            }
        },
          error: function(response){
               var data =JSON.parse(response.responseText);
               if(data.message){
                  toastr.error(data.message);
               }
               else{
                  toastr.error(data.error);
               }
            resetOTPFields();
        }
    });
    }
});




$('#resendOTPLogin').click(function(){

   var user_id = $('input[name=user_id]').val();
    resetOTPFields();
    generateUserLoginOTP(user_id);

});


$('#resendOTPLoginExpired').click(function(){

   var user_id = $('input[name=user_id]').val();
    resetOTPFields();
    generateUserLoginOTP(user_id);

    $('#resendOTPLoginExpired').addClass('d-none');                
    $('#submitLoginOTP').removeClass('d-none');
    $('#resendOTPLogin').removeClass('d-none');


});



$('#resendOTPForgetExpired').click(function(){

   var user_id = $('input[name=user_id_forget]').val();
    resetOTPFields();
    generateUserForgetOTP(user_id);

    $('#resendOTPForgetExpired').addClass('d-none');                
    $('#submitForgetOTP').removeClass('d-none');
    $('#resendOTPForget').removeClass('d-none');


});




$('#btnLogin').click(function(){
   
   var email = $('input[name=email]').val();
   var password = $('input[name=password]').val();
    // var result = '';

if (email=='') {
 toastr.error("Please Enter Email");
}
else if (password=='') {
  toastr.error("Please Enter Password");
}
else{
 
        $.ajax({
        type: 'ajax',
        method: 'get',
        url: '<?php echo base_url(); ?>api/checkLogin',
        data:{'email': email,'password':password},  
        async: false,
        dataType: 'json',
         beforeSend: function(xhr) {
            xhr.setRequestHeader('X-API-KEY','enachSyncWorks');
        },
        success: function(response){
            if(response.status){

            var user_id = response.user_id;
            var customer_mobile_no = response.customer_mobile_no;
            var email = response.email;

              $('#user_id').val(user_id);
              $('#customer_mobile_no').val(customer_mobile_no);
              $('#email').val(email);
             

              $('#LoginScreen').addClass('d-none');
              $('#LoginOTPScreen').removeClass('d-none');
              $('#ForgetOTPScreen').addClass('d-none');
              $('#ForgetPasswordScreen').addClass('d-none');
              $('#newPasswordScreen').addClass('d-none');
              
               let maskedPhone ='';
               let maskedEmail ='';
             
              if(customer_mobile_no){
                  maskedPhone = customer_mobile_no.slice(0, 2) + '****' + customer_mobile_no.slice(8);

              }
          
             if(email){
               maskedEmail = email.slice(0, 2) + '****' + email.slice(10);

              }
          

              $('#emailDiv').html(maskedEmail);
              $('#phoneDiv').html(maskedPhone);
            
              resetOTPFields();

              generateUserLoginOTP(user_id);
            
            // checkOTP(user_id,user_otp);

            // toastr.success(response.message);
          
            }
        },
          error: function(response){

               var data =JSON.parse(response.responseText);
               if(data.message){
                  toastr.error(data.message);
               }
               else{
                  toastr.error(data.error);
               }
        }
    });
    }
});

function resetOTPFields() {
  // body...
    $('#otp').val('');
    $('#otp_forget').val('');
         
}

  $('#submitLoginOTP').click(function(){
        

    var user_id = $('#user_id').val();
    var customer_mobile_no = $('#customer_mobile_no').val();
    var email = $('#email').val();

    var user_otp = $('#otp').val();
   
    if(user_id==''){
         toastr.error('User Details Not Found');
    }
    else if(user_otp=="" ){
        toastr.error('Enter Valid OTP');
    }
    else{

        $.ajax({
            type: 'ajax',
            method: 'get',
            url: '<?php echo base_url(); ?>api/checkOTP',
            data:{'user_id': user_id,'otp':user_otp},  
            async: false,
            dataType: 'json',
             beforeSend: function(xhr) {
                xhr.setRequestHeader('X-API-KEY','enachSyncWorks');
            },
            success: function(response){
                if(response.status){

                toastr.success(response.message);
                   window.location.replace("<?php echo base_url('Home/'); ?>");
                }
                 resetOTPFields();
            },
              error: function(response){
                   var data =JSON.parse(response.responseText);
                    resetOTPFields();

                   if(data.message){


                      toastr.error(data.message);
                   }
                   else{
                      toastr.error(data.error);
                   }

                   if(data.otp_Expired){
                  
                    $('#resendOTPLoginExpired').removeClass('d-none');

                    $('#submitLoginOTP').addClass('d-none');
                    $('#resendOTPLogin').addClass('d-none');

                   }
            }
        });   


    }


    });

  $('#submitForgetOTP').click(function(){
        

    var user_id_forget = $('#user_id_forget').val();
    var customer_mobile_no_forget = $('#customer_mobile_no_forget').val();
    var email_forget = $('#email_forget').val();

    var otp_forget = $('#otp_forget').val();

    if(user_id_forget==''){
         toastr.error('User Details Not Found');
    }
    else if(otp_forget==""){
        toastr.error('Enter Valid OTP');
    }
    else{

     // alert(user_otp);
        $.ajax({
            type: 'ajax',
            method: 'get',
            url: '<?php echo base_url(); ?>api/checkOTP',
            data:{'user_id': user_id_forget,'otp':otp_forget},  
            async: false,
            dataType: 'json',
             beforeSend: function(xhr) {
                xhr.setRequestHeader('X-API-KEY','enachSyncWorks');
            },
            success: function(response){
                if(response.status){

                toastr.success("Otp Verified");
                      $('#user_id_new').val(user_id_forget);
                      $('#LoginScreen').addClass('d-none');
                      $('#LoginOTPScreen').addClass('d-none');
                      $('#ForgetOTPScreen').addClass('d-none');
                      $('#ForgetPasswordScreen').addClass('d-none');
                      $('#newPasswordScreen').removeClass('d-none');

                }
                 resetOTPFields();
            },
              error: function(response){
                   var data =JSON.parse(response.responseText);
                   if(data.message){
                      toastr.error(data.message);
                   }
                   else{
                      toastr.error(data.error);
                   }

                    if(data.otp_Expired){
                    

                      $('#resendOTPForgetExpired').removeClass('d-none');
                      $('#submitForgetOTP').addClass('d-none');
                      $('#resendOTPForget').addClass('d-none');

                   }

                    resetOTPFields();
            }
        });   


    }


    });


</script>