  
     </main>

  <script type="text/javascript" src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/3.0.1/js/dataTables.buttons.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.dataTables.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.colVis.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.html5.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.print.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/responsive/3.0.1/js/dataTables.responsive.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/responsive/3.0.1/js/responsive.dataTables.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/scroller/2.4.1/js/dataTables.scroller.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/scroller/2.4.1/js/scroller.dataTables.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/colreorder/2.0.0/js/dataTables.colReorder.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/colreorder/2.0.0/js/colReorder.dataTables.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/select/2.0.2/js/dataTables.select.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/select/2.0.2/js/select.dataTables.js"></script>
    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script src="<?php echo base_url();?>vendors/sortablejs/sortable.min.js"></script>
    <script src="<?php echo base_url();?>vendors/popper/popper.min.js"></script>
    <script src="<?php echo base_url();?>vendors/bootstrap/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>vendors/anchorjs/anchor.min.js"></script>
    <script src="<?php echo base_url();?>vendors/is/is.min.js"></script>
    <script src="<?php echo base_url();?>vendors/fontawesome/all.min.js"></script>
    <!-- <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script> -->
    <script src="<?php echo base_url();?>vendors/list.js/list.min.js"></script>
    <script src="<?php echo base_url();?>vendors/feather-icons/feather.min.js"></script>
    <script src="<?php echo base_url();?>vendors/dayjs/dayjs.min.js"></script>
    <script src="<?php echo base_url();?>vendors/dropzone/dropzone.min.js"></script>
    <script src="<?php echo base_url();?>vendors/prism/prism.js"></script>
    <link href="<?php echo base_url('assets/libs/toastr/build/toastr.min.css'); ?>" rel="stylesheet">
    <script src="<?php echo base_url('assets/libs/toastr/build/toastr.min.js');  ?>"></script>
    <script src="<?php echo base_url('assets/libs/toastr/toastr.js'); ?>"></script>
   

    <script>
  
        // Get the current page URL
        var currentPageUrl = window.location.href;

        // Get all the navigation links
        var navTab = document.getElementById("sidebar");

        if(navTab){

             var navLinks2 = navTab.querySelectorAll(".nav-link");

            // Loop through the navigation links and check if their href matches the current page URL

              navLinks2.forEach(function (link) {
                if (currentPageUrl.includes(link.getAttribute("href"))) {
                    link.classList.add("active");
                }
                else{
                    link.classList.remove("active");
                }
              });
    

        }
     
  </script>

</body>

</html>
 


  