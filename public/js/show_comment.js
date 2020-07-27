var button = document.getElementById("show-button");
var commentform = document.getElementById("addComment-form");


button.addEventListener("click", () => {
    commentform.style.display = "block";
    window.scrollBy(0, 200);
});