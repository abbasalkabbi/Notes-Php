const from = document.querySelector(".newnotes"),
  button = from.querySelector("#save"),
  err = from.querySelector(".error"),
  err_h1 = err.querySelector("h1");

from.onsubmit = (e) => {
  e.preventDefault();
};
function sendnotes() {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "./php/newnote.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        console.log(data);
        if (data == "okey") {
          from.style.display = "none";
          err.style.display = "none";
        } else {
          err.style.display = "block";
          err_h1.innerText = data;
        }
      }
    }
  };
  let dataform = new FormData(from);
  xhr.send(dataform);
}
button.onclick = () => sendnotes();
