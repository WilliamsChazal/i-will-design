// Get the modal
var modal = document.getElementById("myModal");



// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
function openModal(id) {
  modal.style.display = "block";
  getText("includes/modal/modal.php?id="+id);
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

//fetch en JS// 


async function getText(file) {
  let myObject = await fetch(file);
  console.log(myObject)
  let myText = await myObject.text();
  document.getElementById("demo").innerHTML = myText;
  console.log(myText);
}