<!DOCTYPE html>
<html lang="en-US" dir="ltr">

  <head>
<!--Google Analytics code don't delete this anytime-->
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-DB5TD49XL7"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'G-DB5TD49XL7');
    </script>
    
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title><?php echo $page_title;?></title>


    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url();?>uploads/organization_logos/SyncWorksLogo.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url();?>uploads/organization_logos/SyncWorksLogo.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url();?>uploads/organization_logos/SyncWorksLogo.png">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url();?>uploads/organization_logos/SyncWorksLogo.png">
    <link rel="manifest" href="<?php echo base_url();?>assets/img/favicons/manifest.json">
    <meta name="msapplication-TileImage" content="<?php echo base_url();?>uploads/organization_logos/SyncWorksLogo.png">
    <meta name="theme-color" content="#ffffff">
    <script src="<?php echo base_url();?>vendors/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="<?php echo base_url();?>vendors/simplebar/simplebar.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/config.js"></script>
    <!-- Choices-->
    <script src="<?php echo base_url();?>vendors/choices/choices.min.js"></script>



    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&amp;display=swap" rel="stylesheet">
    <link href="<?php echo base_url();?>vendors/simplebar/simplebar.min.css" rel="stylesheet">
    <!-- Choices-->
    <link href="<?php echo base_url();?>vendors/choices/choices.min.css" rel="stylesheet" />


    <link href="<?php echo base_url();?>vendors/flatpickr/flatpickr.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>vendors/dropzone/dropzone.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>vendors/prism/prism-okaidia.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link href="<?php echo base_url();?>assets/css/theme-rtl.min.css" type="text/css" rel="stylesheet" id="style-rtl">
    <link href="<?php echo base_url();?>assets/css/theme.min.css" type="text/css" rel="stylesheet" id="style-default">
    <link href="<?php echo base_url();?>assets/css/user-rtl.min.css" type="text/css" rel="stylesheet" id="user-style-rtl">
    <link href="<?php echo base_url();?>assets/css/user.min.css" type="text/css" rel="stylesheet" id="user-style-default">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="<?php echo base_url();?>vendors/lodash/lodash.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/phoenix.js"></script>

    <script>
      var phoenixIsRTL = window.config.config.phoenixIsRTL;
      if (phoenixIsRTL) {
        var linkDefault = document.getElementById('style-default');
        var userLinkDefault = document.getElementById('user-style-default');
        linkDefault.setAttribute('disabled', true);
        userLinkDefault.setAttribute('disabled', true);
        document.querySelector('html').setAttribute('dir', 'rtl');
      } else {
        var linkRTL = document.getElementById('style-rtl');
        var userLinkRTL = document.getElementById('user-style-rtl');
        linkRTL.setAttribute('disabled', true);
        userLinkRTL.setAttribute('disabled', true);
      }
    </script>
  
  

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.0.3/css/dataTables.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/3.0.1/css/buttons.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/3.0.1/css/responsive.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/scroller/2.4.1/css/scroller.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.0.3/css/dataTables.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/colreorder/2.0.0/css/colReorder.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/2.0.2/css/select.dataTables.css">
   
    <script>
         document.addEventListener("DOMContentLoaded", function() {
            
               var keys = Object.keys(localStorage);
                    // Find the key that contains the specified substring
                var storageKey = keys.find(function(key) {
                    return key.endsWith(window.location.pathname);
                });
               

                if(localStorage.getItem(storageKey)){

                    var localStorageItem = JSON.parse(localStorage.getItem(storageKey));

                    if (localStorageItem) {

                        if(localStorageItem.columns){
                             localStorageItem.columns.forEach(function(column) {
                              column.search.search = '';
                                  if (column.rows) {
                                        // Loop through each row in the column
                                        column.rows.forEach(function(row) {
                                            // Clear the search.search property for each row
                                            row.search.search = '';
                                        });
                                  }
                             });
                        }

                        if(localStorageItem.search){
                             localStorageItem.search.search = '';
                        }
                    
                    } 
                    
                    localStorage.setItem(storageKey, JSON.stringify(localStorageItem));
   
                }
         }); 


    </script>
  
  </head>
 
  <body class="nav-slim">    
    <main class="main" id="top">
