<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Lista de Productos</title>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
   </head>
   <body>
      <div class="container" style="margin-top: 50px;">
         @yield('content')
      </div>
     
   </body>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" type="text/js"></script>
   <script>
      
      $(document).ready(function() {
       
          activaTab('filterByNameLink');
      });

      function activaTab(tab) {

         if(tab=='filterByRangeLink'){
            $('#filterByRange').show();
            $('#filterByName').hide();
            $('.nav-tabs a[href="#filterByRangeLink"]').attr('class','nav-link active');
            $('.nav-tabs a[href="#filterByNameLink"]').attr('class','nav-link');
         }else{
            $('#filterByName').show();
            $('#filterByRange').hide();
            $('.nav-tabs a[href="#filterByNameLink"]').attr('class','nav-link active');
            $('.nav-tabs a[href="#filterByRangeLink"]').attr('class','nav-link ');
         }
         
      };
  </script>
</html>