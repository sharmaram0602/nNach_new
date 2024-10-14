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
        <form id="profileForm" action=""> 
       <input type="hidden" name="id" >
          
        <div class="mb-9">
        
          <div class="row g-6">
        
              <div class="card mb-5">
                <!-- <div class="card-header hover-actions-trigger position-relative mb-6" style="min-height: 130px; ">
                  <div class="bg-holder rounded-top" style="background-image: linear-gradient(0deg, #000000 -3%, rgba(0, 0, 0, 0) 83%), url(../../assets/img/generic/59.png)">
                    <input class="d-none" id="upload-settings-cover-image" type="file" />
                    <label class="cover-image-file-input" for="upload-settings-cover-image"></label>
                    <div class="hover-actions end-0 bottom-0 pe-1 pb-2 text-white"><span class="fa-solid fa-camera me-2"></span></div>
                  </div>
                 <input class="d-none" id="upload-settings-porfile-picture" type="file"onchange="updateProfilePicture()"/>
                  <label class="avatar avatar-4xl status-online feed-avatar-profile cursor-pointer" for="upload-settings-porfile-picture">
                    <img class="rounded-circle img-thumbnail bg-white shadow-sm fa-solid fas fa-user-alt text-dark   mt-3"  width="200" alt="" /></label>
                  
                </div> -->
                <div class="card-header hover-actions-trigger position-relative mb-6" style="min-height: 130px;">
    <div class="bg-holder rounded-top" style="background-image: linear-gradient(0deg, #000000 -3%, rgba(0, 0, 0, 0) 83%), url(../../assets/img/generic/59.png)">
        <input class="d-none" id="upload-settings-cover-image" type="file"  onchange="updatePicture()"/>
        <label class="cover-image-file-input" for="upload-settings-cover-image"></label>
        <div class="hover-actions end-0 bottom-0 pe-1 pb-2 text-white"><span class="fa-solid fa-camera me-2"></span></div>
    </div>
    <!-- <div id="background-container"></div> -->

    <input class="d-none" id="upload-settings-porfile-picture" type="file" onchange="updateProfilePicture()" />
    <label class="avatar avatar-4xl  feed-avatar-profile cursor-pointer"  for="upload-settings-porfile-picture">
    <!-- <img id="default-profile-icon" class="d-none" src="http://localhost/emsnewtheme/uploads/profile_pictures/65a25ee3ae8aa_p3.png" alt="Default Profile Image"> -->

    <!--   -->
    <div id="profile-container"></div>
   
      </label>
</div>

                <div class="card-body">
                  <div class="row">
                    <!-- <div class="col-12">
                      <div class="d-flex flex-wrap mb-2 align-items-center">
                        <h3 class="me-2">Ansolo Lazinatov</h3><span class="fw-normal fs-0">u/hansolo</span>
                      </div>
                      <div class="d-flex d-xl-block d-xxl-flex align-items-center">
                        <div class="d-flex mb-xl-2 mb-xxl-0"><span class="fa-solid fa-user-group fs--2 me-2 me-lg-1 me-xl-2"></span>
                          <h6 class="d-inline-block mb-0">1297<span class="fw-semi-bold ms-1 me-4">Followers</span></h6>
                        </div>
                        <div class="d-flex"><span class="fa-solid fa-user-check fs--2 me-2 me-lg-1 me-xl-2"></span>
                          <h6 class="d-block d-xl-inline-block mb-0">3971<span class="fw-semi-bold ms-1">Following</span></h6>
                        </div>
                      </div>
                    </div> -->
                  </div>
                </div>
              </div>
              
              
            <div class="col-12 col-xl-12">
              <div class="border-bottom border-300 mb-4">
                <div class="mb-6">
                  <h4 class="mb-4">Personal Information</h4>
                  <div class="row g-3">
                  <input type="hidden" name="id">
                  <input type="hidden" name="organization_id" id="organization_id" value="1">
                  <input type="hidden" name="sub_organization_branch_id" id="sub_organization_branch_id" >
                    <div class="col-12 col-sm-6">
                      <div class="form-icon-container">
                        <div class="form-floating">
                          <input class="form-control form-icon-input" id="bank_user_first_name" type="text" placeholder="First Name" name="bank_user_first_name" />
                          <label class="text-700 form-icon-label" for="bank_user_first_name">FIRST NAME</label>
                        </div><span class="fa-solid fa-user text-900 fs--1 form-icon"></span>
                      </div>
                    </div>
                    <div class="col-12 col-sm-6">
                      <div class="form-icon-container">
                        <div class="form-floating">
                          <input class="form-control form-icon-input" id="bank_user_lastname" type="text" placeholder="Last Name" name="bank_user_lastname" />
                          <label class="text-700 form-icon-label" for="bank_user_lastname">LAST NAME</label>
                        </div><span class="fa-solid fa-user text-900 fs--1 form-icon"></span>
                      </div>
                    </div>
                    <div class="col-12 col-sm-6">
                      <div class="form-icon-container">
                        <div class="form-floating">
                          <input class="form-control form-icon-input" id="bank_user_email" type="email" placeholder="Email" name="email" />
                          <label class="text-700 form-icon-label" for="bank_user_email">ENTER YOUR EMAIL</label>
                        </div><span class="fa-solid fa-envelope text-900 fs--1 form-icon"></span>
                      </div>
                    </div>
                    <div class="col-12 col-sm-6">
                      <div class="form-icon-container">
                        <div class="form-floating">
                          <input class="form-control form-icon-input" id="bank_user_phone" type="tel" placeholder="Phone" name="bank_user_phone"/>
                          <label class="text-700 form-icon-label" for="bank_user_phone">ENTER YOUR PHONE</label>
                        </div><span class="fa-solid fa-phone text-900 fs--1 form-icon"></span>
                      </div>
                    </div>
                    <div class="col-12 col-sm-6">
                      <div class="form-icon-container">
                        <div class="form-floating">
                          <input class="form-control form-icon-input" id="bank_user_username" type="tel" placeholder="Phone" name="bank_user_username"/>
                          <label class="text-700 form-icon-label" for="bank_user_username">Username</label>
                        </div><span class="fa-solid fa-user text-900 fs--1 form-icon"></span>
                      </div>
                    </div>
                    <!-- <div class="col-12 col-sm-6">
                      <div class="form-icon-container">
                        <div class="form-floating">
                          <input class="form-control form-icon-input" id="city" placeholder="Phone" name="city"/>
                          <label class="text-700 form-icon-label" for="city">City</label>
                        </div><span class="fa-solid fas fa-city text-900 fs--1 form-icon"></span>
                      </div>
                    </div> -->
                    <!-- <div class="col-12 col-sm-6">
                      <div class="form-icon-container">
                        <div class="form-floating">
                          <input class="form-control form-icon-input" id="department"  placeholder="Phone" name="department"/>
                          <label class="text-700 form-icon-label" for="department">Department</label>
                        </div><span class="fa-solid far fa-building text-900 fs--1 form-icon"></span>
                      </div> -->
                    <!-- </div>
                    <div class="col-md-6" id="bank_headmanagerr">

                          <label class="form-label" for="bank_headmanager">Head Manager</label>

                          <div id="headmanagerListData"></div>
                          </div> -->
                    <div class="col-12 col-sm-6">
                      <div class="form-icon-container">
                        <div class="form-floating">
                          <input class="form-control form-icon-input" id="designation_name" type="tel" placeholder="Phone" name="designation_name"/>
                          <label class="text-700 form-icon-label" for="designation_name">Designation</label>
                        </div><span class="fa-solid fab fa-black-tie text-900 fs--1 form-icon"></span>
                      </div>
                    </div>
                   
                  </div>
                </div>
               
                <div class="row gx-3 mb-6 gy-6 gy-sm-3">
                  <div class="col-12 col-sm-6">
                    <h4 class="mb-4">BRANCH INFORMATION</h4>
                    <div class="form-icon-container mb-3">
                      <div class="form-floating">
                        <input class="form-control form-icon-input" id="bank_name" type="text" placeholder="Company Name" name="bank_name" />
                        <label class="text-700 form-icon-label" for="bank_name">Bank Name</label>
                      </div><!--<span class="fa-solid fa-building text-900 fs--1 form-icon"></span>-->
                    </div>
                    <div class="form-icon-container mb-3">
                      <div class="form-floating">
                        <input class="form-control form-icon-input" id="branch_name" type="text" placeholder="Branch Name" name="branch_name"/>
                        <label class="text-700 form-icon-label" for="branch_name">Branch Name</label>
                       </div><!--<span class="fa-solid fa-globe text-900 fs--1 form-icon"></span> -->
                    </div>
                    <div class="form-icon-container mb-3">
                      <div class="form-floating">
                        <input class="form-control form-icon-input" id="branch_address" type="text" placeholder="Branch Address"name="branch_address"/>
                        <label class="text-700 form-icon-label" for="branch_address">Branch Address</label>
                       </div><!--<span class="fa-solid fa-globe text-900 fs--1 form-icon"></span> -->
                    </div>
                    <div class="form-icon-container mb-3">
                      <div class="form-floating">
                        <input class="form-control form-icon-input" id="branchStateListData" type="text" placeholder="Branch State" name="branchStateListData"/>
                        <label class="text-700 form-icon-label" for="branchStateListData">Branch State</label>
                      </div><!--<span class="fa-solid fa-globe text-900 fs--1 form-icon"></span>-->
                    </div>
                    <div class="form-icon-container mb-3">
                      <!-- <div class="form-floating">
                        <input class="form-control form-icon-input" id="branchCityListData" type="text" placeholder="Branch City" name="branchCityListData" />
                        <label class="text-700 form-icon-label" for="branchCityListData">Branch City</label>
                      </div> -->
                    </div>
                  </div>
                  <!--<span class="fa-solid fa-globe text-900 fs--1 form-icon"></span>-->
                  <div class="col-12 col-sm-6">
                    <h4 class="mb-4">Change Password</h4>
                    <div class="form-icon-container mb-3">
                      <div class="form-floating">
                        <input class="form-control form-icon-input" id="password" type="password" placeholder="Old password" name="password"/>
                        <label class="text-700 form-icon-label" for="password">Old Password</label>
                      </div><span class="fa-solid fa-lock text-900 fs--1 form-icon"></span>
                    </div>
                    <div class="form-icon-container mb-3">
                      <div class="form-floating">
                        <input class="form-control form-icon-input" id="new_password" type="password" placeholder="New password" name="new_password" />
                        <label class="text-700 form-icon-label" for="new_password">New Password</label>
                      </div><span class="fa-solid fa-key text-900 fs--1 form-icon"></span>
                    </div>
                    <div class="form-icon-container mb-3">
                      <div class="form-floating">
                        <input class="form-control form-icon-input" id="confirm_password" type="password" placeholder="Confirm New password" name="confirm_password" />
                        <label class="text-700 form-icon-label" for="confirm_password">Confirm New Password</label>
                      </div><span class="fa-solid fa-key text-900 fs--1 form-icon"></span>
                    </div>
                    <div class="form-icon-container  ">
                      <div class="form-floating">
                        <button class="btn btn-primary col-4 col-sm-4" id="btnSaveInformation" type="button">Save Information</button>
                  </div>
                </div>              
              </div>
              
            </div>
          </div>
          
        </div>

          </div>
 
        </div>

        <div class="text-end">
           
              <!-- <button class="btn btn-phoenix-secondary me-2">Cancel Changes</button> -->
              <!-- <button class="btn btn-phoenix-primary" id="btnSaveInformation" type="button">Save Information</button> -->

              <!-- <button class="btn btn-phoenix-primary" id="btnSaveInformation" type="button">Save Information</button> -->
          
          </div>
          </form>
</div>


<script>
  // showheadmanager();
  //   function showheadmanager()
  //      {
  //          $.ajax({
  //               type: 'ajax',
  //               url: "<?php echo base_url() ?>api/User/",
  //               async: false,
  //               method:'get',
  //               dataType: 'json',
  //               beforeSend: function(xhr) {
  //                   xhr.setRequestHeader('X-API-KEY','enachSyncWorks');
  //               },
  //               success: function(response) {
  //                   // body...
  //                   data=response.data;
  //                   var html = '<select class="form-select" name="bank_headmanager" id="bank_headmanager"><option value="ALL" selected="selected">Select Manager</option>';

  //         var i = "";
  //         for (var i = 0; i < data.length; i++) {
  //           html += '<option value="' + data[i].user_id + '">' + data[i].firstname+' '+data[i].lastname + '</option>';
  //         }
  //         html += '</select>';

  //         $('#headmanagerListData').html(html);

  //                 },
  //                  error: function(response){
  //                   console.log("vikas error");
  //                  }

  //          });
  //      }


    function saveInformation() {
        var formData = $('#profileForm').serialize();

        $.ajax({
            type: 'post',
            url: "<?php echo base_url() ?>api/User/updateprofile",
            data: formData,
            dataType: 'json',
            beforeSend: function (xhr) {
                xhr.setRequestHeader('X-API-KEY', 'enachSyncWorks');
            },
            success: function (response) {
                console.log(response);
                var password_updated = response.password_updated;
                var information_updated = response.information_updated;
                if (response.status) {
                  if(password_updated){
                      toastr.success("Password updated successfully");

                    }
                    if(information_updated){
                      toastr.success("Information updated successfully");

                    }
                    
                    // updatePassword();
                } else {
                    toastr.error(response.message);
                }
            },
            error: function (response) {
                var data = JSON.parse(response.responseText);
                toastr.error(data.message);
            }
        });
    }

    function updatePassword() {
        var passwordData = {
            id: $('input[name="id"]').val(),
            password: $('#password').val(),
            new_password: $('#new_password').val(),
            confirm_password: $('#confirm_password').val()
        };

        $.ajax({
            type: 'post',
            url: "<?php echo base_url() ?>api/User/updateprofile",
            data: passwordData,
            dataType: 'json',
            beforeSend: function (xhr) {
                xhr.setRequestHeader('X-API-KEY', 'enachSyncWorks');
            },
            success: function (response) {
                console.log(response);
                var password_updated = response.password_updated;
                var information_updated = response.information_updated;

                if (response.status) {

                    if(password_updated){
                      toastr.success("Password updated successfully");

                    }
                    if(information_updated){
                      toastr.success("Information updated successfully");

                    }
               
                  } else {
                    toastr.error(response.message);
                }
            },
            error: function (response) {
                var data = JSON.parse(response.responseText);
                toastr.error(data.message);
            }
        });
    }

    $(document).ready(function () {
    var isButtonClicked = false; // Initialize variable to track button click status

        showUserData();

        $('#btnSaveInformation').click(function () {
        isButtonClicked = true; // Set the variable to true when the button is clicked
            saveInformation();
        });
    });

    function showUserData() {
      document.getElementById("bank_name").readOnly=true;
      document.getElementById("branch_name").readOnly=true;
      document.getElementById("branch_address").readOnly=true;
      document.getElementById("branchStateListData").readOnly=true;
      // document.getElementById("branchCityListData").readOnly=true;
      // document.getElementById("department").readOnly=true;
      // document.getElementById("headmanager").readOnly=true;
      // document.getElementById("city").readOnly=true;
      // document.getElementById("bank_city").readOnly=true;
      // document.getElementById("bank_password").readOnly=true;
      // document.getElementById("bank_state").readOnly=true;
      // document.getElementById("department").readOnly=true;
      // document.getElementById("bank_headmanager").readOnly=true;

        $.ajax({
            type: 'ajax',
            url: "<?php echo base_url() ?>api/User/profilerow",
            data: { id: '<?php echo $this->session->userdata("id"); ?>'},
            async: false,
            method: 'get',
            dataType: 'json',
            beforeSend: function(xhr) {
                xhr.setRequestHeader('X-API-KEY', 'enachSyncWorks');
            },
            success: function(response) {
                console.log(response);
                var userData = response.data;
                // alert (userData.headmanager);
                $('input[name="id"]').val(userData.user_id);
                $('input[name="organization_id"]').val(userData.organization_id);
                $('input[name="sub_organization_branch_id"]').val(userData.sub_organization_branch_id);
                $('#bank_user_first_name').val(userData.firstname);
                $('#bank_user_lastname').val(userData.lastname);
                $('#bank_user_email').val(userData.email);
                $('#bank_user_phone').val(userData.phone);
                $('#bank_name').val(userData.bank_name);
                $('#branch_name').val(userData.branch_name);
                $('#branch_address').val(userData.branch_address);
                $('#branchStateListData').val(userData.branch_state_title);
                // $('#branchCityListData').val(userData.branch_city_name);
                $('#bank_user_username').val(userData.username);
                $('#bank_designation_id').val(userData.designation_id);
                $('#department').val(userData.department);
                // $('#bank_headmanager').val(userData.headmanager);
                $('#city').val(userData.city);
                $('#designation_name').val(userData.designation_name); 
                 $('#bank_desigation_id').val(userData.bank_designation_id); 
                 if(userData.profile_picture){
                  // fa-solid fas fa-user-alt src="'+userData.profile_picture+'"
                  var profile='<img id="profile-picture-img"src="<?php echo base_url()?>uploads/profile_pictures/'+userData.profile_picture+'" class="rounded-circle img-thumbnail bg-white shadow-sm text-dark mt-3" width="200" alt="" />';

                 }
                 else{
                  var profile='<img id="profile-picture-img" src="" class="rounded-circle img-thumbnail bg-white shadow-sm text-dark fa-solid fas fa-user-alt  mt-3" width="200" alt="" />';

                 }

                $('#profile-container').html(profile);
              
                // if(userData.background_picture){
                //   // fa-solid fas fa-user-alt 
                //   var profile='<img id="background-picture-img" src="'+userData.backgound_picture+'" class="rounded-circle img-thumbnail bg-white shadow-sm text-dark mt-3" width="200" alt="" />';

                //  }
                //  else{
                //   var profile='<img id="background-picture-img" src="" class="rounded-circle img-thumbnail bg-white shadow-sm text-dark fa-solid fas fa-user-alt  mt-3" width="200" alt="" />';

                //  }

                // $('#background-container').html(profile);
                
            },
            error: function(response) {
                var data = JSON.parse(response.responseText);
                toastr.error(data.message);
            }
        });
    }
</script>

<script>
    
    function updateProfilePicture() {
    

    //var id = $('id').val(); 
    var id=     $('input[name="id"]').val();
    $('input[name="id"]').val(id);
    var fileInput = document.getElementById('upload-settings-porfile-picture');
    var file = fileInput.files[0];

    var formData = new FormData();
    formData.append('profile_picture', file);
    formData.append('id', id);

  
    var updateProfilePictureUrl = "<?php echo base_url() ?>api/User/updateProfilePicture";

    $.ajax({
        type: 'post',
        url: updateProfilePictureUrl,
        data: formData,
       contentType: false,
        async: false,
        dataType: 'json',
     processData: false,
        beforeSend: function (xhr) {
            xhr.setRequestHeader('X-API-KEY', 'enachSyncWorks');
        },
        success: function (response) {
            console.log(response);
            if (response.status) {
              var imageUrl =  response.filename;
              $('#profile-picture-img').removeClass('d-none');

              $('#profile-picture-img').attr('src', imageUrl);

              $('#default-profile-icon').hide();
              $('#profile-container').html('');

              if(imageUrl){
                  // fa-solid fas fa-user-alt 
                  var profile='<img id="profile-picture-img" src="'+response.profile_picture+'" class="rounded-circle img-thumbnail bg-white shadow-sm text-dark mt-3" width="200" alt="" />';

                 }
                 else{
                  var profile='<img id="profile-picture-img" src="" class="rounded-circle img-thumbnail bg-white shadow-sm text-dark fa-solid fas fa-user-alt  mt-3" width="200" alt="" />';

                 }

                $('#profile-container').html(profile);

                toastr.success('Profile picture uploaded successfully');
            
            } else {
               // toastr.error(response.message);
                toastr.error('Profile picture not uploaded successfully');
            }
//window.location.reload();
        },
        error: function (response) {
            var data = JSON.parse(response.responseText);
            toastr.error(data.message);
        }
    });
}


// function updateBAckgroundPicture() {
    

//     //var id = $('id').val(); 
//     var id=     $('input[name="id"]').val();
//     $('input[name="id"]').val(id);
//     var fileInput = document.getElementById('upload-settings-cover-image');
//     var file = fileInput.files[0];

//     var formData = new FormData();
//     formData.append('background_picture', file);
//     formData.append('id', id);

  
//     var updateBackgroundPictureUrl = "<?php echo base_url() ?>api/User/updateBackgroundPicture";

//     $.ajax({
//         type: 'post',
//         url: updateBackgroundPictureUrl,
//         data: formData,
//        contentType: false,
//         async: false,
//         dataType: 'json',
//      processData: false,
//         beforeSend: function (xhr) {
//             xhr.setRequestHeader('X-API-KEY', 'enachSyncWorks');
//         },
//         success: function (response) {
//             console.log(response);
//             if (response.status) {
//               var imageUrl =  response.filename;
//               $('#Backgound-picture-img').removeClass('d-none');

//               $('#Background-picture-img').attr('src', imageUrl);

//               $('#default-profile-icon').hide();
//               $('#background-container').html('');

//               if(imageUrl){
//                   // fa-solid fas fa-user-alt 
//                   var background='<img id="background-picture-img" src="'+response.profile_picture+'" class="rounded-circle img-thumbnail bg-white shadow-sm text-dark mt-3" width="200" alt="" />';

//                  }
//                  else{
//                   var background='<img id="background-picture-img" src="" class="rounded-circle img-thumbnail bg-white shadow-sm text-dark fa-solid fas fa-user-alt  mt-3" width="200" alt="" />';

//                  }

//                 $('#background-container').html(profile);

//                 toastr.success('Cover picture uploaded successfully');
            
//             } else {
//                // toastr.error(response.message);
//                 toastr.error('Cover picture not uploaded successfully');
//             }
// //window.location.reload();
//         },
//         error: function (response) {
//             var data = JSON.parse(response.responseText);
//             toastr.error(data.message);
//         }
//     });
// }


// $(document).ready(function () {
//     showUserData();

//     $('#btnSaveInformation').click(function () {
//         saveInformation();
//     });

//     $('#remove-profile-picture').click(function () {
//         removeProfilePicture();
//     });
// });

// function removeProfilePicture() {
//     var id = $('input[name="id"]').val();
//     var removeProfilePictureUrl = "<?php echo base_url() ?>api/User/removeProfilePicture";

//     $.ajax({
//         type: 'post',
//         url: removeProfilePictureUrl,
//         data: { id: id },
//         dataType: 'json',
//         beforeSend: function (xhr) {
//             xhr.setRequestHeader('X-API-KEY', 'enachSyncWorks');
//         },
//         success: function (response) {
//             console.log(response);
//             if (response.status) {
//                 $('#profile-picture-img').attr('src', ''); // Set the image source to an empty string or a placeholder
//                 toastr.success('Profile picture removed successfully');
//             } else {
//                 toastr.error('Failed to remove profile picture');
//             }
//         },
//         error: function (response) {
//             var data = JSON.parse(response.responseText);
//             toastr.error(data.message);
//         }
//     });
// }

</script>
