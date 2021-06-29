// show and hide diw new note
const newnotes = document.querySelector(".newnotes");
const notes = document.querySelector(".notes");
const show_div = document.querySelector(".show");
function showandhide() {
  if (newnotes.style.display == "none") {
    newnotes.style.display = "flex";
    notes.style.display = "none";
    show_div.classList.add("active");
  } else {
    newnotes.style.display = "none";
    notes.style.display = "block";
    show_div.classList.remove("active");
  }
}

function show() {
  showandhide();
}
