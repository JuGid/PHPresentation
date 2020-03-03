document.addEventListener("keydown", function(event) {
  event.preventDefault();
  const key = event.key; // "ArrowRight", "ArrowLeft", "ArrowUp", or "ArrowDown"
  switch (key) { // change to event.key to key to use the above variable
    case "ArrowLeft":
      window.location.replace(document.getElementById('previous').href);
      break;
    case "ArrowRight":
      window.location.replace(document.getElementById('next').href);
      break;
    case "ArrowUp":
      window.location.replace(document.getElementById('previous').href);
      break;
    case "ArrowDown":
      window.location.replace(document.getElementById('next').href);
      break;
  }
});
