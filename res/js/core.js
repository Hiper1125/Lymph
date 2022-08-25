$(".navArrow").click(function (event) {
  event.preventDefault();
  history.back();
});

window.addEventListener("beforeunload", function () {
  document.body.classList.remove("animte-in");
  document.body.classList.add("animate-out");
});