 $(document).ready(function(){
        // fetch data from table without reload/refresh page
        loadData();
        function loadData(query){
          $.ajax({
            url : "action.php",
            type: "POST",
            chache :false,
            data:{query:query},
            success:function(response){
              $("#output").html(response);
            }
          });  
        }

        // live search data from table without reload/refresh page
        $("#search").keyup(function(){
          var search = $(this).val();
          loadData(search);
        });
    });