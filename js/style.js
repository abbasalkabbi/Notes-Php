// div title style

const div_title = document.querySelector(".title"),
  title_input = div_title.querySelector("input"),
  title_label = div_title.querySelector("#label");

title_input.addEventListener("focus", (event) => {
  title_label.style.top = "0";
  title_label.style.color = "#38ef7d";
  div_title.style.borderBottom = "#38ef7d solid 1px";
});
title_input.addEventListener("blur", (event) => {
  title_label.style.bottom = "0";
  title_label.style.top = "";
  title_label.style.color = "#000";
  //
  div_title.style.borderBottom = "#000 solid 1px";
});
// end div input title style
// div context
const div_context = document.querySelector(".context"),
  context_input = div_context.querySelector("textarea"),
  context_label = div_context.querySelector("label");

context_input.addEventListener("focus", (event) => {
  context_label.style.top = "0";
  context_label.style.color = "#38ef7d";
  div_context.style.borderBottom = "#38ef7d solid 1px";
});
context_input.addEventListener("blur", (event) => {
  context_label.style.bottom = "0";
  context_label.style.top = "";
  context_label.style.color = "#000";
  //
  div_context.style.borderBottom = "#000 solid 1px";
});
