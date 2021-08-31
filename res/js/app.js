$(document).ready(function () {
  LinkJS();
});

function LinkJS() {
  document.querySelector("#login").onsubmit = function (event) {
    event.preventDefault();
    var form_data = new FormData(document.querySelector("#login"));
    var xhr = new XMLHttpRequest();
    xhr.open("POST", document.querySelector("#login").action, true);
    xhr.onload = function () {
      if (this.responseText.toLowerCase().indexOf("success") !== -1) {
        Succes();
      } else {
        Fail(this.responseText);
      }
    };
    xhr.send(form_data);
  };
}

function Succes() {
  window.location.href = "dashboard.php";
}

function Fail(error) {
  alert(error);
}