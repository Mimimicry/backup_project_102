
function hide_info() {

    var x = document.getElementById("myDIV");
    if (x.style.display === "none") {
      x.style.display = "block";
      toggleBtn.innerHTML = 'Hide';
    } else {
      x.style.display = "none";
      toggleBtn.innerHTML = 'Show';
    }
  }
  
