//
// mostra l'immagine caricata
//
const uploadedImage = function(idInput, idImage) {
    document.getElementById(idInput).addEventListener('change', function () {
        var src = URL.createObjectURL(this.files[0])
        document.getElementById(idImage).src = src
    })   
}
//
// call della funzione uploadedImage
//
uploadedImage('image', 'foodEditPreview');
uploadedImage('image', 'foodCreatePreview');
uploadedImage('image', 'businessLogo');
uploadedImage('image1', 'businessCover');
const deleteButtons = document.querySelectorAll(".btn-delete");
const inputDeleteID = document.getElementById("delete-id");
const prova = document.getElementById("prova");
deleteButtons.forEach(
	(elm) => {
		elm.addEventListener("click", function() {
			inputDeleteID.value = this.getAttribute("data-id");
            prova.innerHTML = this.getAttribute("data-id");
		});
	}
);

