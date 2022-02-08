const usr_name = document.getElementById('fname');
const usr_uname = document.getElementById('uname');
const usr_email = document.getElementById('email');
const usr_phone = document.getElementById('mno');
const usr_pass = document.getElementById('pass');
const usr_rpass = document.getElementById('repass');
const sform = document.getElementById('sform');

function validateName(name) {
    var nameRegex = /^[a-zA-Z\.\s]+$/;
    return nameRegex.test(name) && /^[a-zA-Z]/.test(name);
}

function validatePhone(mno) {
    return (/^\d{7,}$/).test(mno.replace(/[\s()+\-\.]|ext/gi, ''));
}

function validateUserName(uname) {
    var unameRegex = /^[a-zA-Z0-9\_]+$/;
    return unameRegex.test(uname) && /^[a-zA-Z]/.test(uname);
}

function validateEmail(email) {
    var re = /\S+@\S+\.\S+/;
    return re.test(email);
}

function validatePassword(a, b) {
    if (!(a.length >= 4 && a.length <= 128)) {
        return false;
    }

    if (!(b == null)) {
        return a === b;
    }
    return true;
}

usr_name.addEventListener('input', (event) => {
    var str = usr_name.value;
    var value = validateName(str);
    if (str.length > 0) {
        if (value == true) {
            usr_name.classList.remove('form__input--error');
        }
        else {
            usr_name.classList.add('form__input--error');
        }
    } 
    else {
        usr_name.classList.remove('form__input--error');
    }
})

usr_phone.addEventListener('input', (event) => {
    var str = usr_phone.value;
    var value = validatePhone(str);
    if (str.length > 0) {
        if (value == true) {
            usr_phone.classList.remove('form__input--error');
        }
        else {
            usr_phone.classList.add('form__input--error');
        }
    } 
    else {
        usr_phone.classList.remove('form__input--error');
    }
})

usr_uname.addEventListener('input', (event) => {
    var str = usr_uname.value;
    var value = validateUserName(str); 
    if (str.length > 0) {
        if (value == true) {
            usr_uname.classList.remove('form__input--error');
        }
        else {
            usr_uname.classList.add('form__input--error');
        }
    } 
    else {
        usr_uname.classList.remove('form__input--error');
    }
})

usr_email.addEventListener('input', (event) => {
    var str = usr_email.value;
    var value = validateEmail(str); 
    if (str.length > 0) {
        if (value == true) {
            usr_email.classList.remove('form__input--error');
        }
        else {
            usr_email.classList.add('form__input--error');
        }
    } 
    else {
        usr_email.classList.remove('form__input--error');
    }
})

usr_pass.addEventListener('input', (event) => {
    var str = usr_pass.value;
    var value = validatePassword(str, null); 
    if (str.length > 0) {
        if (value == true) {
            usr_pass.classList.remove('form__input--error');
        }
        else {
            usr_pass.classList.add('form__input--error');
        }
    } 
    else {
        usr_pass.classList.remove('form__input--error');
    }
})

usr_rpass.addEventListener('input', (event) => {
    var str = usr_rpass.value;
    var value = validatePassword(usr_pass.value, str); 
    if (str.length > 0) {
        if (value == true) {
            usr_rpass.classList.remove('form__input--error');
        }
        else {
            usr_rpass.classList.add('form__input--error');
        }
    } 
    else {
        usr_rpass.classList.remove('form__input--error');
    }
})

usr_agree.addEventListener('input', (event) => {
    usr_agree.classList.remove('form__input--error');
})

sform.addEventListener('submit', (event) => {
    var name = usr_name.value;
    var uname = usr_uname.value;
    var email = usr_email.value;
    var phone = usr_phone.value;
    var pass = usr_pass.value; 
    var rpass = usr_rpass.value;
    var a = validateName(name) && validatePhone(phone) && validateUserName(uname) &&
        validateEmail(email) && validatePassword(pass, rpass);

    if (a == false) {
        event.preventDefault();
    }
})