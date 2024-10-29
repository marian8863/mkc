// Get the modal
var modal = document.getElementById("modal");

// Get the image and insert it inside the modal
var modalImg = document.getElementById("modalImage");
var images = document.getElementsByClassName("gallery-image");

for (var i = 0; i < images.length; i++) {
    images[i].onclick = function(){
        modal.style.display = "block";
        modalImg.src = this.src;
    }
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
    modal.style.display = "none";
}
