console.log("Welcome.js loaded");

function hideMessage(event) {
  event.stopImmediatePropagation();

  const data   = JSON.parse(
    document.getElementById(
        'wp-script-module-data-@tsjippy/statistics_script'
    ).textContent
  );

  //Hide the message
  document.querySelector("#welcome-message").classList.add("hidden");

  let formData = new FormData();
  formData.append("_wpnonce", data.restNonce);
  fetch(
    `${data.baseUrl}/wp-json/tsjippy/v2/welcome-message/hide_welcome`,
    {
      method: "POST",
      credentials: "same-origin",
      body: formData,
    },
  ).catch((err) => console.error(err));
}

document.addEventListener("DOMContentLoaded", function () {
  let el = document.querySelector("#welcome-message-button");
  if (el != null) {
    el.addEventListener("click", hideMessage);
  }
});
