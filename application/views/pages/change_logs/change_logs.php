    <div class="content">

          <nav class="mb-2" aria-label="breadcrumb">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="<?php echo base_url();?>">Dashboard</a></li>
            <li class="breadcrumb-item active"><?php echo $page_name;?></li>
          </ol>
        </nav> 
        
          <div class="row g-3 mb-2">
            <div class="col-auto">
              <h3 class="mb-0"><?php echo $page_name;?></h3>
            </div>
          </div>
        <div id="showChangeLogData"></div>
    </div>

    <div class="d-flex justify-content-center mt-3">
            <div id="logwise"></div>
        </div>          
<script type="text/javascript">
    
    showAllChangeLogs(1);


        function showAllChangeLogs(page) {


            $.ajax({
                type: 'ajax',
                url: "<?php echo base_url() ?>api/Change_Log/"+page,
                async: false,
                method:'get',
                dataType: 'json',
                beforeSend: function(xhr) {
                    xhr.setRequestHeader('X-API-KEY','enachSyncWorks');
                },
                success: function(response) {

                   // var data = Object.keys(response.data);

                    // body...
                    var serialNumber = (page - 1) * 10 + 1;
                    var data=response.data;
                    var event_logs= response.event_logs;
                    var html='';
                    var tbt="";
                    var i ="";

                    for (var i = 0; i < data.length; i++) {

                         var insert_array= data[i].INSERT;
                         var update_array= data[i].UPDATE;
                         var delete_array= data[i].DELETE;
                         var other_array= data[i].OTHER;


                      if(insert_array.length>0 || update_array.length>0 || delete_array.length>0 || other_array.length>0){

                            html+='<div class="card shadow-none border border-300 my-3">'+

                            '<div class="card-header border-bottom border-300 bg-soft">'+
                              '<h5 class="mb-2"><code class="fw-bold fs-1">'+data[i].date+'</code></h5>'+
                            '</div>'+

                            '<div class="card-body">';
                            

                                     if(insert_array.length>0){

                                         html+='<h4 class="py-3 fw-bold fs-1">Created</h4>';
                                         html+='<ul class="bullet-inside ps-0 border-bottom">';
                                      

                                           for (var j = 0; j < insert_array.length; j++) {
                                          
                                                   
                                               html+='<div class="timeline-basic">'+
                                                    '<div class="timeline-item">'+
                                                      '<div class="row">'+
                                                      
                                                        '<div class="col">'+
                                                         ' <div class="d-flex justify-content-between">'+
                                                           ' <div class="d-flex mb-2">'+
                                                             ' <h5 class="lh-sm mb-0 me-2 text-800 text-capitalize">'+insert_array[j].log_table+'</h6>'+
                                                            '</div>';

                                                          const dateObj = new Date(insert_array[j].created_at);

                                                          // Extracting hours, minutes, and seconds
                                                          const hours = dateObj.getHours();
                                                          const minutes = dateObj.getMinutes();
                                                          const seconds = dateObj.getSeconds();

                                                          // Converting hours to 12-hour format
                                                          const formattedHours = hours % 12 || 12;

                                                          // Determining whether it's AM or PM
                                                          const meridiem = hours < 12 ? 'AM' : 'PM';

                                                          // Formatting the time string
                                                          const formattedTime = `${formattedHours}:${minutes < 10 ? '0' : ''}${minutes} ${meridiem}`;


                                                          html+='<p class="text-500 fs--1 mb-0 text-nowrap timeline-time"><span class="fa-regular fa-clock me-1"></span>'+formattedTime+'</p>'+

                                                         ' </div>'+
                                                          '<h6 class="fs--1 fw-normal mb-3">by <a class="fw-semi-bold" href="#!">'+insert_array[j].firstname+' '+insert_array[j].middlename+' '+insert_array[j].lastname+'</a></h6><p class="fs--1 text-800 w-sm-60 text-capitalize">';
                                                          var log_current_data= insert_array[j].log_current_data;
                                                          
                                                          for (const key in log_current_data) {

                                                             if (Object.hasOwnProperty.call(log_current_data, key)) {
                                                          
                                                               html+=''+key+' :- '+log_current_data[key]+', ';
                                                            
                                                            }
                                                          
                                                          }

                                                      
                                                       html+='</p></div>'+
                                                    '</div>'+
                                                    
                                                  '</div>';

                                         }

                                         html+='</ul>';

                                     }

                                     if(update_array.length>0){

                                         html+='<h4 class="py-3 fw-bold fs-1">Updated</h4>';
                                         html+='<ul class="bullet-inside ps-0 border-bottom">';
                                       
                                         for (var j = 0; j < update_array.length; j++) {
                                          
                                                   
                                               html+='<div class="timeline-basic">'+
                                                    '<div class="timeline-item">'+
                                                      '<div class="row">'+
                                                      
                                                        '<div class="col">'+
                                                         ' <div class="d-flex justify-content-between">'+
                                                           ' <div class="d-flex mb-2">'+
                                                             ' <h5 class="lh-sm mb-0 me-2 text-800 text-capitalize">'+update_array[j].log_table+'</h6>'+
                                                            '</div>';

                                                          const dateObj = new Date(update_array[j].created_at);

                                                          // Extracting hours, minutes, and seconds
                                                          const hours = dateObj.getHours();
                                                          const minutes = dateObj.getMinutes();
                                                          const seconds = dateObj.getSeconds();

                                                          // Converting hours to 12-hour format
                                                          const formattedHours = hours % 12 || 12;

                                                          // Determining whether it's AM or PM
                                                          const meridiem = hours < 12 ? 'AM' : 'PM';

                                                          // Formatting the time string
                                                          const formattedTime = `${formattedHours}:${minutes < 10 ? '0' : ''}${minutes} ${meridiem}`;


                                                          html+='<p class="text-500 fs--1 mb-0 text-nowrap timeline-time"><span class="fa-regular fa-clock me-1"></span>'+formattedTime+'</p>'+

                                                         ' </div>'+
                                                          '<h6 class="fs--1 fw-normal mb-3">by <a class="fw-semi-bold" href="#!">'+update_array[j].firstname+' '+update_array[j].middlename+' '+update_array[j].lastname+'</a></h6><p class="fs--1 text-800 w-sm-60 text-capitalize">';
                                                          var log_current_data= update_array[j].log_current_data;
                                                          
                                                          for (const key in log_current_data) {

                                                             if (Object.hasOwnProperty.call(log_current_data, key)) {
                                                          
                                                               html+=''+key+' :- '+log_current_data[key]+', ';
                                                            
                                                            }
                                                          
                                                          }

                                                      
                                                       html+='</p></div>'+
                                                    '</div>'+
                                                    
                                                  '</div>';

                                         }

                                         html+='</ul>';

                                     }


                                     if(delete_array.length>0){

                                          html+='<h4 class="py-3 fw-bold fs-1">Deleted</h4>';
                                         html+='<ul class="bullet-inside ps-0 border-bottom">';
                                       
                                         for (var j = 0; j < delete_array.length; j++) {
                                          
                                                   
                                               html+='<div class="timeline-basic">'+
                                                    '<div class="timeline-item">'+
                                                      '<div class="row">'+
                                                      
                                                        '<div class="col">'+
                                                         ' <div class="d-flex justify-content-between">'+
                                                           ' <div class="d-flex mb-2">'+
                                                             ' <h5 class="lh-sm mb-0 me-2 text-800 text-capitalize">'+delete_array[j].log_table+'</h6>'+
                                                            '</div>';

                                                          const dateObj = new Date(delete_array[j].created_at);

                                                          // Extracting hours, minutes, and seconds
                                                          const hours = dateObj.getHours();
                                                          const minutes = dateObj.getMinutes();
                                                          const seconds = dateObj.getSeconds();

                                                          // Converting hours to 12-hour format
                                                          const formattedHours = hours % 12 || 12;

                                                          // Determining whether it's AM or PM
                                                          const meridiem = hours < 12 ? 'AM' : 'PM';

                                                          // Formatting the time string
                                                          const formattedTime = `${formattedHours}:${minutes < 10 ? '0' : ''}${minutes} ${meridiem}`;


                                                          html+='<p class="text-500 fs--1 mb-0 text-nowrap timeline-time"><span class="fa-regular fa-clock me-1"></span>'+formattedTime+'</p>'+

                                                         ' </div>'+
                                                          '<h6 class="fs--1 fw-normal mb-3">by <a class="fw-semi-bold" href="#!">'+delete_array[j].firstname+' '+delete_array[j].middlename+' '+delete_array[j].lastname+'</a></h6><p class="fs--1 text-800 w-sm-60 text-capitalize">';
                                                          var log_current_data= delete_array[j].log_current_data;
                                                          
                                                          for (const key in log_current_data) {

                                                             if (Object.hasOwnProperty.call(log_current_data, key)) {
                                                          
                                                               html+=''+key+' :- '+log_current_data[key]+', ';
                                                            
                                                            }
                                                          
                                                          }

                                                      
                                                       html+='</p></div>'+
                                                    '</div>'+
                                                    
                                                  '</div>';

                                         }


                                         html+='</ul>';

                                     }


                                    if(other_array.length>0){

                                         html+='<h4 class="py-3 fw-bold fs-1">Other</h4>';
                                         html+='<ul class="bullet-inside ps-0">';
                                       
                                         for (var j = 0; j < other_array.length; j++) {
                                          
                                                   
                                               html+='<div class="timeline-basic">'+
                                                    '<div class="timeline-item">'+
                                                      '<div class="row">'+
                                                      
                                                        '<div class="col">'+
                                                         ' <div class="d-flex justify-content-between">'+
                                                           ' <div class="d-flex mb-2">'+
                                                             ' <h5 class="lh-sm mb-0 me-2 text-800 text-capitalize">'+other_array[j].log_table+'</h6>'+
                                                            '</div>';

                                                          const dateObj = new Date(other_array[j].created_at);

                                                          // Extracting hours, minutes, and seconds
                                                          const hours = dateObj.getHours();
                                                          const minutes = dateObj.getMinutes();
                                                          const seconds = dateObj.getSeconds();

                                                          // Converting hours to 12-hour format
                                                          const formattedHours = hours % 12 || 12;

                                                          // Determining whether it's AM or PM
                                                          const meridiem = hours < 12 ? 'AM' : 'PM';

                                                          // Formatting the time string
                                                          const formattedTime = `${formattedHours}:${minutes < 10 ? '0' : ''}${minutes} ${meridiem}`;


                                                          html+='<p class="text-500 fs--1 mb-0 text-nowrap timeline-time"><span class="fa-regular fa-clock me-1"></span>'+formattedTime+'</p>'+

                                                         ' </div>'+
                                                          '<h6 class="fs--1 fw-normal mb-3">by <a class="fw-semi-bold" href="#!">'+other_array[j].firstname+' '+other_array[j].middlename+' '+other_array[j].lastname+'</a></h6><p class="fs--1 text-800 w-sm-60 text-capitalize">';
                                                          var log_current_data= other_array[j].log_current_data;
                                                          
                                                          for (const key in log_current_data) {

                                                             if (Object.hasOwnProperty.call(log_current_data, key)) {
                                                          
                                                               html+=''+key+' :- '+log_current_data[key]+', ';
                                                            
                                                            }
                                                          
                                                          }

                                                      
                                                       html+='</p></div>'+
                                                    '</div>'+
                                                    
                                                  '</div>';

                                         }

                                         html+='</ul>';

                                    }
                                    
                           
                          
                           html+= '</div>'+

                          '</div>';

                      }
                   

                  
                    }

                    $('#showChangeLogData').html(html);

                    display_logwise(response.total_rows, page);
                      

                 },
                 error: function(response){
                   var data =JSON.parse(response.responseText);
                   toastr.error(data.message);
                }

            });

        }

        function    display_logwise(totalRows, currentPage) {
        var itemsPerPage = 10; // Assuming 10 records per page
        var totalPages = Math.ceil(totalRows / itemsPerPage);
        var maxButtonsToShow = 5; // Set the maximum number of buttons to show

        var pagination = '<ul class="pagination justify-content-center">';

       // First button
        pagination += '<li class="page-item ' + (currentPage === 1 ? 'disabled' : '') + '">';
        pagination += '<button class="page-link" onclick=" showAllChangeLogs(1)" aria-label="First">';
        pagination += '<span aria-hidden="true">&laquo;&laquo;</span></button></li>';

        // Previous button
        pagination += '<li class="page-item ' + (currentPage === 1 ? 'disabled' : '') + '">';
        pagination += '<button class="page-link" data-list-pagination="prev" onclick=" showAllChangeLogs(' + (currentPage - 1) + ')" aria-label="Previous">';
        pagination += '<span aria-hidden="true">&laquo;</span></button></li>';

        // Page buttons
        var startPage = Math.max(1, currentPage - Math.floor(maxButtonsToShow / 2));
        var endPage = Math.min(totalPages, startPage + maxButtonsToShow - 1);

        for (var i = startPage; i <= endPage; i++) {
            pagination += '<li class="page-item ' + (i === currentPage ? 'active' : '') + '">';
            pagination += '<button class="page-link" onclick=" showAllChangeLogs(' + i + ')">' + i + '</button></li>';
        }

        // Next button
        pagination += '<li class="page-item ' + (currentPage === totalPages ? 'disabled' : '') + '">';
        pagination += '<button class="page-link" data-list-pagination="next" onclick=" showAllChangeLogs(' + (currentPage + 1) + ')" aria-label="Next">';
        pagination += '<span aria-hidden="true">&raquo;</span></button></li>';

           // Last button
        pagination += '<li class="page-item ' + (currentPage === totalPages ? 'disabled' : '') + '">';
        pagination += '<button class="page-link" onclick=" showAllChangeLogs(' + totalPages + ')" aria-label="Last">';
        pagination += '<span aria-hidden="true">&raquo;&raquo;</span></button></li>';


        pagination += '</ul>';

        $('#logwise').html(pagination);
    }

</script>