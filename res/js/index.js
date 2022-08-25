$(document).ready(function () {
  Setup();
});

function Setup() {
  LinkJS();
}

function LinkJS() {
  $("#book").click(function () {
    window.location.href = "/book/book.php";
  });

  $("#login").click(function () {
    window.location.href = "/app/app.php";
  });
}