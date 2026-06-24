window.addEventListener('DOMContentLoaded',  () => {
  let copyButton = document.querySelector(".response-container .copy-button");
  if(copyButton)
  {
    let reponseText = document.querySelector(".response-container .response-text");
    let copySuccess = document.querySelector(".response-container .copy-success");
    let copyFail = document.querySelector(".response-container .copy-fail");
    copyButton.addEventListener("click", () => {
      navigator.clipboard.writeText(reponseText.textContent).then(
        () => {
          copySuccess.classList.add("show");
          setTimeout(() => {
            copySuccess.classList.remove("show");
          }, 1000);
        },
        () => {
          copyFail.classList.add("show");
          setTimeout(() => {
            copyFail.classList.remove("show");
          }, 1500);
        },
      );
    });
  }
});
