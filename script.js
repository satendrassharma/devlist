// // submit.addEventListener("click", e => {
// //   e.value = "sending..";
// // });
// document.querySelector("form").addEventListener("submit", e => {
//   console.dir(submit);
//   submit.disabled = true;
//   submit.innerHTML = "submittting..";
// });

// $("form").submit(function() {
//   $(this)
//     .find(":input[type=submit]")
//     .prop("disabled", true)
//     .text("waiting..");
// });

document.querySelector("form").addEventListener("submit", function() {
  var button = document.getElementById("submit");
  button.value = "submitting";
  button.classList.add("registering");
  button.disabled = true;
});

// var form_enabled = true;
// $().ready(function() {
//   const submit = document.getElementById("submit");

//   console.log(submit);
//   // allow the user to submit the form only once each time the page loads
//   $("form").on("submit", function() {
//     if (form_enabled) {
//       form_enabled = false;
//       submit.disabled = true;
//       submit.addClass("dform");
//       return true;
//     }

//     return false;
//   });
// });
