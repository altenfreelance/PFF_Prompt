<!DOCTYPE html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<!-- JQuery Include -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<!-- JS file to make ajax call -->
<script src="./js/ajaxGetTable.js"></script>

</head> 

<body> 

<div class="container">
   <h1> Quarterback Statistics </h1>

   <!-- QB Selector -->
   <select id="QBSelector" class="selectpicker">
     <option>All</option>
     <option value="698">Brady</option>
     <option value="4317">Ryan</option>
   </select>

   <!-- HTML to hold statistics -->
   <table id="statsTable" class="table-striped table table-hover"></table>

</div>

<div id="stats">

</div>

<script>
   //Load the table after HTML is generated
   getTable();

   //Listen for change in QB selection
   //If this selction changes, reload the data with the appropriate QB Data
   $(function () { 
      $('select').on('change', function(e){ 
         getTable();
      });
   });

   $(document).ready(function() {
      $('#statsTable').DataTable();
   });
   

</script>

<!-- Bootstrap Dependencies -->
 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



</body>
</html>
