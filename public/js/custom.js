//modal delete
const deleteButtons = document.querySelectorAll(".btn-delete");
const inputDeleteID = document.getElementById("delete-id")

deleteButtons.forEach(
	(elm) => {
		elm.addEventListener("click", function () {
			inputDeleteID.value = this.getAttribute("data-id");
		});
	}
);
//
// validazione form register
//
function setErrorFor(input, message) {
	var formControl = input.parentElement; //.form-control
	var small = formControl.querySelector('small');
	//add error message inside small
	small.innerHTML = message;
	//add error class
	small.className = 'error';
}
function setSuccessFor(input) {
	var formControl = input.parentElement; //.form-control
	var small = formControl.querySelector('small');
	small.innerHTML = "";
	small.className = 'success';
}

const registerForm = document.getElementById("registerForm");
const userName = document.getElementById("name");
const email = document.getElementById("email");
const password = document.getElementById("userPassword");
const vat_numb = document.getElementById("vat_numb");
const business_name = document.getElementById("business_name");
const business_address = document.getElementById("business_address");
const business_logo = document.getElementById("business_logo");
const business_cover = document.getElementById("business_cover");
const cuisines = document.getElementById("cuisines");


function isValidType(file) {

    let acceptedMimes = "jpg,jpeg,png,svg"
        .trim()
        .split(",")
        .map(type => `image/${type}`);
	let maxUploadSizeInBytes = 1000;
    
	if (!acceptedMimes.includes(file.type)) {
        valid = false;
		setErrorFor(file, 'Il file deve essere di tipo jpg, jpeg, png, svg');
    } else if (file.size > maxUploadSizeInBytes) {

        let sizeInKb = maxUploadSizeInBytes / 1024;
        let sizeForHumans = sizeInKb < 1024
            ? `${sizeInKb} KB`
            : `${sizeInKb / 1024} MB`;
		
		setErrorFor(file, `Il file è superiore a ${sizeForHumans}`);
	} else {
		setSuccessFor(file);
	}
}

function validateRegister() {
	let userNameValue = userName.value;
	let emailValue = email.value;
	let passwordValue = password.value;
	let vat_numbValue = vat_numb.value;
	let business_nameValue = business_name.value;
	let business_addressValue = business_address.value;
	let business_logoValue = business_logo.value;
	// let business_coverValue = business_cover.value;
	// let cuisinesValue = cuisines.value;
	// userName
	if (userNameValue == "" || userNameValue == null) {
		setErrorFor(userName, 'Inserisci il nome')
		return false;
	} else if (userNameValue.length > 255) {
		setErrorFor(userName, 'Il nome accetta un massimo di 255 caratteri')
		return false;
	} else {
		setSuccessFor(userName);
	}
	// email
	if (emailValue == "" || emailValue == null) {
		setErrorFor(email, 'Inserisci l\'email');
		return false;
	} else if (emailValue.match(/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/) == null) {
		setErrorFor(email, 'La formattazione della password non è corretta')
		return false;
	} else {
		setSuccessFor(email);
	}
	// password
	if (passwordValue == "" || passwordValue == null) {
		setErrorFor(password, 'Inserisci la password')
		return false;
	} else if (passwordValue.length < 8) {
		setErrorFor(password, 'La password deve avere un minimo di 8 caratteri')
		return false;
	} else {
		setSuccessFor(password);
	}
	//vat_numb
	if (vat_numbValue == "" || vat_numbValue == null) {
		setErrorFor(vat_numb, 'Inserisci la partita iva')
		return false;
	} else if (vat_numbValue.match(/^[0-9]+$/) == null) {
		setErrorFor(vat_numb, 'Attenzione la partita iva può essere formata solo da numeri')
		return false;
	} else if (vat_numbValue.length != 11) {
		setErrorFor(vat_numb, 'La partita iva deve essere formata da 11 numeri')
		return false;
	} else {
		setSuccessFor(vat_numb);
	}
	//business_name
	if (business_nameValue == "" || business_nameValue == null) {
		setErrorFor(business_name, 'Inserisci il nome dell\'attività')
		return false;
	} else if (business_nameValue.length > 30) {
		setErrorFor(business_name, 'Il nome dell\'attività accetta un massimo di 30 caratteri')
		return false;
	} else {
		setSuccessFor(business_name);
	}
	//business_address
	if (business_addressValue == "" || business_addressValue == null) {
		setErrorFor(business_address, 'Inserisci l\'indirizzo dell\'attività')
		return false;
	} else if (business_addressValue.match("\d{1,}$") == null) {
		setErrorFor(business_address, 'Inserire il numero della via')
		return false;
	} else if (business_addressValue.length > 100) {
		setErrorFor(business_address, 'L\'indirizzo dell\'attività accetta un massimo di 100 caratteri')
		return false;
	} else {
		setSuccessFor(business_address);
	}
	//business_address
	isValidType(business_logo);

	return true;
}