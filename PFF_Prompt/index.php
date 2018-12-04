<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"/>
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" />
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
     <table id="statsTable" class="table-striped table table-hover" width: "100%">
      <thead>
      <tr>
        <th>Player</th>
        <th>Yards</th>
        <th>Week</th>
        <th>Touchdowns</th>
        <th>Interceptions</th>
        <th>Home Team</th>
        <th>Completions</th>
        <th>Away Team</th>
        <th>Attempts</th>
        <th>Passer Rating</th>
      </tr>
      </thead>
     </table>
  </div>

  <!-- Bootstrap Dependencies -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" ></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <!-- JS file to make ajax call -->
  <script src="./js/ajaxGetTable.js"></script>

  <script>

   $(document).ready(function() {
    getTable();

    $('#QBSelector').on('change', function(e){
      getTable();
    });
  });
  </script>
</body>
</html>
