//modal delete
const deleteButtons = document.querySelectorAll(".btn-delete");
const inputDeleteID = document.getElementById("delete-id")

deleteButtons.forEach(
    (elm) => {
        elm.addEventListener("click", function() {
            inputDeleteID.value = this.getAttribute("data-id");
        });
    }
);
//
// validazione form register
//
const form = document.forms["registerForm"];

function validateRegister() {
    let name = form["name"].value;
	let nameMessage = document.getElementById("err_name").innerHTML;
    let email = form["email"].value;
	let emailMessage = document.getElementById("err_email").innerHTML;
    let password = form["password"].value;
	let passwordMessage = document.getElementById("err_password").innerHTML;
    let vat_numb = form["vat_numb"].value;
	let vatNumbMessage = document.getElementById("err_vat_numb").innerHTML;
    let business_name = form["business_name"].value;
	// let businessNameMessage = document.getElementById("err_business_name").innerHTML;
    // let business_address = form["business_address"].value;
	// let businessAddressMessage = document.getElementById("err_business_address").innerHTML;
    // let business_logo = form["business_logo"].value;
    // let business_cover = form["business_cover"].value;
    // let cuisines = form["cuisines"].value;
	
    //name_validation
    if (name == null || name == "") {
        nameMessage = "Inserire il nome"
		return false;
    } else if (name.length > 255) {
        nameMessage = "Il nome deve contenere un massimo di 255 caratteri"
		return false;
	} else {
		nameMessage = "";
	}
    //email_validation
	if(email == null || email =="") {
		emailMessage = "Inserire la mail";
		return false;
	} else if(!(email.match(/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/))) {
		emailMessage = "La formattazione dela mail non è corretta";
		return false;
	} else {
		emailMessage = "";
	}
    //password_validation
	if(password == null || password =="") {
		passwordMessage = "Inserire la password";
		return false;
	} else if (password.length < 8) {
		passwordMessage = "La password deve contenere un minimo di 8 caratteri";
		return false;
	} else {
		passwordMessage = "";
	}
    //vat_numb_validation
	if(vat_numb == null || vat_numb == "") {
		vatNumbMessage = "Inserire la partita iva";
		return false;
	} else if(vat_numb.match(/^[0-9]+$/) == null) {
		vatNumbMessage = "La partita iva accetta solo caratteri numerici";
		return false;
	} else if (vat_numb.length != 11) {
		vatNumbMessage = "La partita iva deve avere 11 numeri";
		return false;
	} else {
		vatNumbMessage = "";
	}
    //business_name_validation
	if(business_name == null || business_name == "") {
		businessNameMessage = "Inserire il nome della propria attività";
		return false;
	} else if (business_name > 30) {
		businessNameMessage = "Il nome non può contenere più di 30 caratteri";
		return false;
	} else {
		businessNameMessage = "";
	}
    // //business_address
	// if(business_address == null || business_address == "a") {
	// 	businessAddressMessage = "Inserire l'indirizzo della propria attività";
	// 	return false;
	// } else if(!business_address.match(/^[A-Za-z]-\d+$/)) {
	// 	businessAddressMessage = "La formattazione dell'indizzo non è corretta";
	// 	console.log("errore");	
	// 	return false;
	// } else {
	// 	businessAddressMessage = "";
	// }
	console.log("funziona")
    return true;
}
