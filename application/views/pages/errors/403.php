
<div  class="content  mt-0 pt-3 " style="padding-right: 0; padding-left: 0">
<div class="container">
    <div class="row justify-content-center align-items-center m-0 p-0">
        <div class="col-sm-12 col-md-8 col-xl-8 col-xxl-5  m-0 p-0 ">
            <div class="card border rounded-0 border-300 h-100 w-100 overflow-hidden m-0 p-0">
            <!-- <h5 class=" fs-2 text-center font-weight-bold border-bottom border-1 mt-0 pb-1 bg-primary text-white" >Create e-NACH Mandate</h5> -->

                 <div class="card-header justify-content-center  align-items-center p-2 border-0">
                    <div class="text-center "><img class="img-fluid d-dark-none" src="<?php echo base_url();?>uploads/organization_logos/<?php echo $bank_logo;?>" alt="" width="100" /><img class="img-fluid w-md-50 w-lg-100 d-light-none" src="<?php echo base_url();?>uploads/organization_logos/<?php echo $this->session->userdata('organization_logo');?>" alt="" width="540" /></div>
                    <h5 class="lh-sm text-center text-primary font-weight-bold" ><?php echo $bank_name;?></h5>
                </div>

                <div class="card-body justify-content-center  align-items-center">
                     <h3 class="lh-sm text-center text-800 fw-bolder mb-3 text-danger-500">Transaction Link Expired!</h3>

                     <p class="fs--1  mb-5">e-Mandate पूर्ण करण्यासाठी दिलेल्या लिंक ची वैधता संपली आहे. कृपया आपण खाली दिलेल्या अधिकऱ्यास संपर्क करा.</p>
                     <p class="fs--1  mb-4">आधिकाऱ्याचे नाव : <span id="fullNameInput"></span></p>
                     <p class="fs--1  mb-4">संपर्क क्रमांक : <span  id="phone"></span></p>

                </div>
          
        </div>
    </div>
    
 </div>
</div>

<script type="text/javascript">

var mandate_customer_id = " <?php echo $mandate_customer_id;?>";


mandateCustomerRowFetch(mandate_customer_id);
  function mandateCustomerRowFetch(mandate_customer_id) {
    $.ajax({
        type: 'GET',
        url: '<?php echo base_url(); ?>api/User/showStaffData',
        data:{
        'mandate_customer_id':mandate_customer_id
      },
        dataType: 'json',
        beforeSend: function(xhr) {
            xhr.setRequestHeader('X-API-KEY', 'enachSyncWorks');
        },
        success: function(response) {
            var data = response.data;

            var fullName = data.firstname + ' ' + data.middlename + ' ' + data.lastname;
            $('#fullNameInput').text(fullName);
            $('#phone').text(data.phone);

        },
        error: function(response) {
            console.error('Error fetching mandate data:', response);
        }
    });
}
</script>
