// Function to make AJAX request and populate table
function getTable(){
   var url ="";
   var ajax = new XMLHttpRequest();
   var method = "GET";

   if ($("#QBSelector").val() == "All") url = "./api/game/read.php";
   else url = "./api/game/read.php?player_id=" + $("#QBSelector").val();
   
   var asynchronous =  true;
   ajax.open(method, url, asynchronous);
   ajax.send();
   ajax.onreadystatechange = function() {

      if (this.readyState == 4 && this.status == 200) {

         var data = JSON.parse(this.responseText);
         var stats = data["stats"];

         var html = "";
         var headerRow = buildHeaderRow();
         html += headerRow;
         html += buildTableBody(stats);
         
         document.getElementById("statsTable").innerHTML = html;
      }
   };
};

//Helper Function to build header row
function buildHeaderRow(){
         var headerRow = "";
         headerRow+= "<thead>";
         headerRow+= "<tr>";
         //html += "<th>" + player_id + "</th>";
         headerRow += "<th> Last Name </th>";
         headerRow += "<th> First Name </th>";
         headerRow += "<th> Passer Rating </th>";
         headerRow += "<th> Yards </th>";
         headerRow += "<th> Week </th>";
         headerRow += "<th> Touch Downs </th>";
         //html += "<th> on_home_team </th>";
         headerRow += "<th> Interceptions </th>";
         headerRow += "<th> Home Team </th>";
         headerRow += "<th> Completions </th>";
         headerRow += "<th> Away Team </th>";
         headerRow += "<th> Attempts </th>";
         headerRow += "</tr>";
         headerRow+= "</thead>";
   return headerRow;
};

//Helper funciton to build table body
function buildTableBody(stats){
   var body = "";
   body += "<tbody>";

   for (var i = 0; i < stats.length; i++){
      
      var player_id = stats[i].player_id;
      var last_name = stats[i].last_name;
      var first_name = stats[i].first_name;

      var yards = stats[i].yards;
      var week = stats[i].week;
      var touchdowns = stats[i].touchdowns;

      var on_home_team = stats[i].on_home_team;
      var interceptions = stats[i].interceptions;
      var home_team = stats[i].home_team;
      var completions = stats[i].completions;
      var away_team = stats[i].away_team;
      var attempts = stats[i].attempts;
      var passer_rating = CalculatePasserRating(attempts, completions, yards, touchdowns, interceptions);

      body += "<tr>";
      //body += "<td>" + player_id + "</td>";
         body += "<td>" + last_name + "</td>";
         body += "<td>" + first_name + "</td>";
         body += "<td>" + passer_rating + "</td>";
         body += "<td>" + yards + "</td>";
         body += "<td>" + week + "</td>";
         body += "<td>" + touchdowns + "</td>";
         //body += "<td>" + on_home_team + "</td>";
         body += "<td>" + interceptions + "</td>";
         body += "<td>" + home_team + "</td>";
         body += "<td>" + completions + "</td>";
         body += "<td>" + away_team + "</td>";
         body += "<td>" + attempts + "</td>";
      body += "</tr>";
   }
   body += "</tbody>";

   return body;
};

function CalculatePasserRating(attempts, completions, yards, touchdowns, interceptions){
// Note: I found the passer rating formula on wikipedia at this url-> https://en.wikipedia.org/wiki/Passer_rating

// The four separate calculations can be expressed in the following equations:

// A = ((Comp/Att) - .3) * 5
// B = ((Yds/Att) - 3) * 0.25
// C = (TD/Att) * 20
// D = 2.375 - ((Int/Att) * 25)


// If the result of any calculation is greater than 2.375, \
// it is set to 2.375. If the result is a negative number, it is set to zero.
// Then, the above calculations are used to complete the passer rating:

// Passer Rating = ((A+B+C+D)/6) * 100

var A = ((completions/attempts) - .3) * 5;
var B = ((yards/attempts) - 3) * 0.25;
var C = (touchdowns/attempts) * 20;
var D = 2.375 - ((interceptions/attempts) * 25);

var passer_rating = ((A+B+C+D)/6) * 100;
return passer_rating.toFixed(2);


};

