// Function to make AJAX request and populate table
function getTable(){
  $("#statsTable").DataTable(
    {
      "paging": false,
      "searching": false,
      "destroy": true, // This is not ideal but for this example is sufficient
      "ajax": {
        url: getQuarterbackUrl(),
        dataSrc: "stats"
      },
      "columns": [
        { data: "name" },
        { data: "yards" },
        { data: "week" },
        { data: "touchdowns" },
        { data: "interceptions" },
        { data: "home_team" },
        { data: "completions" },
        { data: "away_team" },
        { data: "attempts" },
        { data: null }
      ],
      "columnDefs": [
        {
          "targets": -1,
          "render": function ( data, type, row, meta ) {
            return CalculatePasserRating(data.attempts, data.completions, data.yards, data.touchdowns, data.interceptions);
          }
        }
      ]
    }
  );
};

function getQuarterbackUrl() {
  if ($("#QBSelector").val() == "All") {
    return "./api/game/read.php";
  }
  return "./api/game/read.php?player_id=" + $("#QBSelector").val();
}

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

  var A = ratingAdj(((completions/attempts) - .3) * 5);
  var B = ratingAdj(((yards/attempts) - 3) * 0.25);
  var C = ratingAdj((touchdowns/attempts) * 20);
  var D = ratingAdj(2.375 - ((interceptions/attempts) * 25));

  var passer_rating = ((A+B+C+D)/6) * 100;
  return passer_rating.toFixed(1);
};

function ratingAdj(val) {
  if (val < 0) return 0;
  if (val > 2.375) return 2.375;
  return val;
}

