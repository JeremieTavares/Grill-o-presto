verifyUserInfoRegex();

function verifyUserInfoRegex() {

    const regexName = /^[A-zÀ-ú -]{2,30}$/;
    const regexNumber = /^[0-9]{0,7}$/;
    const regexZipCode = /^[a-zA-Z]\d[a-zA-Z][ -]?\d[a-zA-Z]\d$/;
    const regexTel = /^\d{3}[- ]?\d{3}[ -]?\d{4}$/;
    const regexEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    const regexPassword = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
    const regexTicketDescription = /^[A-zÀ-ú \'@$,-.#0-9]{50,400}$/;
    const regexTicketMessage = /^[A-zÀ-ú \'@$,-.#0-9]{2,400}$/;


    if(document.title == "New ticket"){
        const description = document.getElementById('textareaNewTicket')

        description.addEventListener('input', () => {
            if (regexTicketDescription.test(description.value)) {
                description.classList.remove('is-invalid')
                description.classList.add('is-valid')
            }
            else {
                description.classList.remove('is-valid')
                description.classList.add('is-invalid')
            }
        })
    }
   
    if(document.title == "Ticket messages"){
        const message = document.getElementById('responseMessageTicketTextarea')

        message.addEventListener('input', () => {
            if (regexTicketMessage.test(message.value)) {
                message.classList.remove('is-invalid')
                message.classList.add('is-valid')
            }
            else {
                message.classList.remove('is-valid')
                message.classList.add('is-invalid')
            }
        })
    }

    if (document.title == "Register" ||
        document.title == "Admin edit" ||
        document.title == "Admin index" ||
        document.title == "Client infos" ||
        document.title == "Client rechercher" ||
        document.title == "Commande - Mon panier") {
        const prenom = document.getElementsByName('prenom')[0];
        const nom = document.getElementsByName('nom')[0];
        const rue = document.getElementsByName('rue')[0];
        const noPorte = document.getElementsByName('noPorte')[0];
        const appartement = document.getElementsByName('appartement')[0];
        const zip_code = document.getElementsByName('zip_code')[0];
        const tel = document.getElementsByName('tel')[0];
        const ville = document.getElementsByName('ville')[0];


        prenom.addEventListener('input', () => {
            if (regexName.test(prenom.value)) {
                prenom.classList.remove('is-invalid')
                prenom.classList.add('is-valid')
            }
            else {
                prenom.classList.remove('is-valid')
                prenom.classList.add('is-invalid')
            }
        })



        nom.addEventListener('input', () => {
            if (regexName.test(nom.value)) {
                nom.classList.remove('is-invalid')
                nom.classList.add('is-valid')
            }
            else {
                nom.classList.remove('is-valid')
                nom.classList.add('is-invalid')
            }
        })



        rue.addEventListener('input', () => {
            if (regexName.test(rue.value)) {
                rue.classList.remove('is-invalid')
                rue.classList.add('is-valid')
            }
            else {
                rue.classList.remove('is-valid')
                rue.classList.add('is-invalid')
            }
        })



        noPorte.addEventListener('input', () => {
            if (regexNumber.test(noPorte.value)) {
                noPorte.classList.remove('is-invalid')
                noPorte.classList.add('is-valid')
            }
            else {
                noPorte.classList.remove('is-valid')
                noPorte.classList.add('is-invalid')
            }
        })



        appartement.addEventListener('input', () => {
            if (regexNumber.test(appartement.value)) {
                appartement.classList.remove('is-invalid')
                appartement.classList.add('is-valid')
            }
            else {
                appartement.classList.remove('is-valid')
                appartement.classList.add('is-invalid')
            }
        })



        zip_code.addEventListener('input', () => {
            if (regexZipCode.test(zip_code.value)) {
                zip_code.classList.remove('is-invalid')
                zip_code.classList.add('is-valid')
            }
            else {
                zip_code.classList.remove('is-valid')
                zip_code.classList.add('is-invalid')
            }
        })



        tel.addEventListener('input', () => {
            if (regexTel.test(tel.value)) {
                tel.classList.remove('is-invalid')
                tel.classList.add('is-valid')
            }
            else {
                tel.classList.remove('is-valid')
                tel.classList.add('is-invalid')
            }
        })



        ville.addEventListener('input', () => {
            if (regexName.test(ville.value)) {
                ville.classList.remove('is-invalid')
                ville.classList.add('is-valid')
            }
            else {
                ville.classList.remove('is-valid')
                ville.classList.add('is-invalid')
            }
        })



    }



    if (document.title == "Register" ||
        document.title == "Admin edit" ||
        document.title == "Admin index" ||
        document.title == "Client infos" ||
        document.title == "Client rechercher" ||
        document.title == "Client gestion" ||
        document.title == "Commande - Mon panier" ||
        document.title == "Login") {
        const email = document.getElementsByName('email')[0];
        const tel = document.getElementsByName('tel')[0];



        email.addEventListener('input', () => {
            if (regexEmail.test(email.value)) {
                email.classList.remove('is-invalid')
                email.classList.add('is-valid')
            }
            else {
                email.classList.remove('is-valid')
                email.classList.add('is-invalid')
            }
        })

        if (document.title !== "Client gestion") {
            password.addEventListener('input', () => {
                if (regexPassword.test(password.value)) {
                    password.classList.remove('is-invalid')
                    password.classList.add('is-valid')
                }
                else {
                    password.classList.remove('is-valid')
                    password.classList.add('is-invalid')
                }
            })
        }

        if (document.title !== "Login") {
            tel.addEventListener('input', () => {
                if (regexTel.test(tel.value)) {
                    tel.classList.remove('is-invalid')
                    tel.classList.add('is-valid')
                }
                else {
                    tel.classList.remove('is-valid')
                    tel.classList.add('is-invalid')
                }
            })
        }
    }


    if (document.title == "Register" ||
        document.title == "Admin edit" ||
        document.title == "Admin index" ||
        document.title == "Client infos" ||
        document.title == "Client rechercher" ||
        document.title == "Commande - Mon panier" ||
        document.title == "Login") {


    }
}