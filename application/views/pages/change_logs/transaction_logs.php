<div class="content" id="showChangeTransactionData">
    <div class="col-12 col-xl-12 col-xxl-12">
            <div class="card h-100">
                <div class="card-body">
                  <div class="card-title mb-1">
                    <h3 class="text-1100">Activity</h3>
                  </div>
                  <p class="text-700 mb-4">Recent activity across transaction</p>
                  <div class="timeline-vertical timeline-with-details">
                        <div class="col-sm-12 col-md-12  col-lg-12 col-xl-12 col-xxl-12">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <div class="timeline-vertical timeline-with-details"  id="transactionLogContainer">
                                        
                                        </div>
                                    </div>
                                </div>
                        </div>
                  </div>
                </div>
              </div>
            </div>
      </div>
</div>        
<script type="text/javascript">
        
  

   $(document).ready(function() {
    var mts_customer_id = "<?php echo $mandate_customer_id; ?>";
    var page = 1; // Or any page number you want to start with

    function fetchAndDisplayTransactionLogs(page) {
        $.ajax({
            type: 'GET',
            url: "<?php echo base_url() ?>api/Transaction_log/" + page,
            data: {
                mts_customer_id: mts_customer_id
            },
            beforeSend: function(xhr) {
                xhr.setRequestHeader('X-API-KEY', 'enachSyncWorks');
            },
            dataType: 'json',
            success: function(response) {
                var data = response.data;
                var html = '';
              
                var action_shown="";
                  
                for (var i = 0; i < data.length; i++) {
                  if(data[i].transaction_event=='INSERT'){
                      action_shown= "Added";

                  }else if(data[i].transaction_event=='UPDATE'){
                    action_shown= "Updated";
                    
                  }else if(data[i].transaction_event=='DELETE'){
                    action_shown= "Deleted";

                  }else if(data[i].transaction_event=='OTHER'){
                    action_shown= "Other Action";

                  }
                 
                    var customer_name = data[i].customer_name;
                    var transaction_previous_data = data[i].transaction_previous_data;
                    var transaction_current_data = data[i].transaction_current_data;
                    var firstname = data[i].firstname;
                    var middlename = data[i].middlename;
                    var lastname = data[i].lastname;
                    var table='';
                  
                    if(data[i].transaction_event=='UPDATE' || data[i].transaction_event=='OTHER') {

                           table+='<div class="table-responsive table-reponsive-sm scrollbar"><table class="table table-sm table-bordered">'+
                                  '<thead>'+
                                  '<tr>'+
                                  '<th width="20">#</th>'+
                                  '<th width="20">Data</th>'+
                                  '<th width="20">Previous</th>'+
                                  '<th width="20">Current</th>'+
                                  ' </tr>'+
                                  '</thead>'+
                                  ' <tbody>';
                                
                                  for (var key in transaction_current_data) {   
                                      var prev_val='';
                                      var current_val='';
                                      if(transaction_previous_data){
                                            prev_val=transaction_previous_data[key];  

                                      } 
                                      if(transaction_current_data){
                                            current_val =transaction_current_data[key];                     
                                      }
                                      if(prev_val!=current_val){
                                      
                                          table+='<tr>'+
                                                    '<td>1</td>'+
                                                    '<td>'+key+'</td>'+
                                                    '<td>'+prev_val+'</td>'+
                                                    '<td>'+current_val+'</td>'+
                                          '</tr>';
                                        }
                                  }
                                      table+='</tbody></table></div>';

                    }

                            

                              html+='<div class="timeline-item position-relative">'+
                                  '<div class="row g-md-3">'+
                                    '<div class="col-12 col-md-auto d-flex">'+
                                      '<div class="timeline-item-date order-1 order-md-0 me-md-4">'+
                                        '<p class="fs--2 fw-semi-bold text-600 text-end">' + formatDateToDMY(data[i].created_at) + '<br class="d-none d-md-block" /> '+formatTime(data[i].created_at)+'</p>'+
                                      '</div>'+
                                      '<div class="timeline-item-bar position-md-relative me-3 me-md-0 border-400">'+
                                        '<div class="icon-item icon-item-sm rounded-7 shadow-none bg-primary-100"><span class="fa-solid fa-dungeon text-primary-600 fs--2 dark__text-primary-300"></span></div><span class="timeline-bar border-end border-dashed border-400"></span>'+
                                      '</div>'+
                                    '</div>'+
                                    '<div class="col">'+
                                      '<div class="timeline-item-content ps-6 ps-md-3">'+
                                        '<h5 class="fs--1 lh-sm">'+action_shown +' Customer :<a href="<?php echo base_url('Users/transactionSchedule/');?>'+mts_customer_id+'" class="sortable-item"> ' + customer_name + '</h5>'+
                                        '<p class="fs--1">by <a class="fw-semi-bold" href="#!">' +firstname + ' ' + middlename + ' ' + lastname + '</a></p>'+
                                        '<p class="fs--1 text-800 mb-0">'+table+'</p>'+
                                      '</div>'+
                                    '</div>'+
                                  '</div>'+
                                '</div>';

                    }
               
                $('#transactionLogContainer').html(html);
            },
            error: function(response) {
                var data = JSON.parse(response.responseText);
                toastr.error(data.message);
            }
        });

  

        function generateLogEntries(logArray, action) {
    var html = '';
    if (logArray.length > 0) {
        // Display the "Updated" heading before looping through log entries
        html += '<h5 class="fs--1 lh-sm">' + action + '</h5>';
        for (var j = 0; j < logArray.length; j++) {
            var log = logArray[j];
            var createdAt = new Date(log.created_at);

            // Format the date in d-m-y format
            var formattedDate = createdAt.toLocaleDateString('en-GB', {
                day: '2-digit',
                month: '2-digit',
                year: 'numeric'
            }) + ' ' + createdAt.toLocaleTimeString();

            html += '<p class="fs--1 mt-3">By <a class="fw-semi-bold" href="#!">' + log.firstname + ' ' + log.middlename + ' ' + log.lastname + '</a></p>';
            html += '<p class="fs--1 text-800 mb-2">Details Change From: ' + JSON.stringify(log.transaction_previous_data) + '</p>';
            html += '<p class="fs--1 text-800 mb-2">To: ' + JSON.stringify(log.transaction_current_data) + '</p>';

            html += '<p class="fs--1 text-600 mb-2">Date: ' + formattedDate + '</p>';
        }
    }
    return html;
}


        // function formatDate(dateString) {
        //     var date = new Date(dateString);
        //     var day = ("0" + date.getDate()).slice(-2);
        //     var month = ("0" + (date.getMonth() + 1)).slice(-2);
        //     var year = date.getFullYear();
        //     return `${day}-${month}-${year}`;
        // }

        // function formatTime(dateString) {
        //     var options = { hour: '2-digit', minute: '2-digit' };
        //     return new Date(dateString).toLocaleTimeString(undefined, options);
        // }
    }

    fetchAndDisplayTransactionLogs(page);
});


</script>

<script>
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
       return day+'-'+month+'-'+year;
   }

   function formatTime(datetimeStr) {
    const date = new Date(datetimeStr);
    
    // Extract hours, minutes, and seconds
    let hours = date.getHours();
    const minutes = date.getMinutes();
    const seconds = date.getSeconds();
    
    // Determine AM/PM
    const ampm = hours >= 12 ? 'PM' : 'AM';
    
    // Convert hours to 12-hour format
    hours = hours % 12;
    hours = hours ? hours : 12; // the hour '0' should be '12'
    
    // Format minutes and seconds to be two digits
    const formattedMinutes = minutes < 10 ? '0' + minutes : minutes;
    
    // Return the formatted time string
    return `${hours}:${formattedMinutes} ${ampm}`;
   }
</script>