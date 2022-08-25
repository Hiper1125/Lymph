$(document).ready(function () {
  Setup();
});

function Setup() {
  LinkJS();
}

function LinkJS() {
  var dtToday = new Date();
  var dtNextWeek = new Date();

  dtToday.setDate(dtToday.getDate() + 1);
  let minDate = dtToday.toISOString().substr(0, 10);

  dtNextWeek.setDate(dtNextWeek.getDate() + 24);
  let maxDate = dtNextWeek.toISOString().substr(0, 10);

  $("#date").attr("min", minDate);
  $("#date").attr("max", maxDate);

  $("#login").click(function () {
    window.location.href = "/app/app.php";
  });
}