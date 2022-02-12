const cc_number = document.getElementById('num');
const cc_type = document.getElementById('cctype');

const cc_dateMM = document.getElementById('edateMM');
const cc_dateYYYY = document.getElementById('edateYYYY');
const cc_dateDiv = document.getElementById('ed');
const cc_dateError = document.getElementById('edte');
const date = new Date ();
const month = date.getMonth();
const year = date.getFullYear();

const cc_cvv = document.getElementById('cvv');

const cc_name = document.getElementById('name'); 

const form = document.getElementById('form');

function cctype(cc) {
    const amex = /^3[47][0-9]{13}$/;

    const visa = /^4[0-9]{12}(?:[0-9]{3})?$/;

    const cup1 = /^62[0-9]{14}[0-9]*$/;
    const cup2 = /^81[0-9]{14}[0-9]*$/;

    const mastercard = /^5[1-5][0-9]{14}$/;
    const mastercard2 = /^2[2-7][0-9]{14}$/;

    const disco1 = /^6011[0-9]{12}[0-9]*$/;
    const disco2 = /^62[24568][0-9]{13}[0-9]*$/;
    const disco3 = /^6[45][0-9]{14}[0-9]*$/;

    const diners = /^3[0689][0-9]{12}[0-9]*$/;

    const jcb =  /^35[0-9]{14}[0-9]*$/;


    if (visa.test(cc)) {
        return 'VISA';
    }
    else if (amex.test(cc)) {
        return 'AMEX';
    }
    else if (mastercard.test(cc) || mastercard2.test(cc)) {
        return 'MASTERCARD';
    }
    else if (disco1.test(cc) || disco2.test(cc) || disco3.test(cc)) {
        return 'DISCOVER';
    }
    else if (diners.test(cc)) {
        return 'DINERS';
    }
    else if (jcb.test(cc)) {
        return 'JCB';
    }
    else if (cup1.test(cc) || cup2.test(cc)) {
        return 'CHINA_UNION_PAY';
    }

    return null;
}

function cc_format(value) {
    var v = value.replace(/\s+/g, '').replace(/[^0-9]/gi, '')
    var matches = v.match(/\d{4,20}/g);
    var match = matches && matches[0] || ''
    var parts = []

    for (i=0, len=match.length; i<len; i+=4) {
        parts.push(match.substring(i, i+4))
    }

    if (parts.length) {
        return parts.join('-')
    }
    else {
        return value
    }
}

cc_number.addEventListener('input', (event) => {
    var str = cc_number.value;
    cc_number.value = cc_format(str);
    var value = cctype(cc_number.value.replaceAll("-", ""));
    if (str.length > 0) {
        if (value != null) {
            cc_number.classList.remove('form__input--error');
            cc_type.innerText = value;
        }
        else {
            cc_number.classList.add('form__input--error');
        }
    } 
    else {
        cc_type.innerText = "";
        cc_number.classList.remove('form__input--error');
    }
})

function validateExpiryDate(mm, yyyy) {
    if(mm == null || yyyy == null || mm == '' || yyyy == '') return false;

    const mmregex = /^[01][0-9]$/;
    const yyyyregex = /^[0-9]{4}$/;

    return mmregex.test(mm) && yyyyregex.test(yyyy);
}

function validateED() {
    var mm = cc_dateMM.value;
    var yyyy = cc_dateYYYY.value;

    var validExpr = validateExpiryDate(mm, yyyy);
    var validDate = (mm >= month && yyyy >= year);
    if (mm.length > 0 || yyyy.length > 0) {
        if (validExpr && validDate) {
            cc_dateDiv.classList.remove('form__input--error');
            cc_dateMM.classList.remove('form__input--error');
            cc_dateYYYY.classList.remove('form__input--error');
        }
        else {
            if(!validExpr) {
                cc_dateError.innerText = "Enter a valid expiry date";
            } 
            else {
                cc_dateError.innerText = "Card is already expired";
            }
            cc_dateDiv.classList.add('form__input--error');
            cc_dateMM.classList.add('form__input--error');
            cc_dateYYYY.classList.add('form__input--error');
        }
    } 
    else {
        cc_dateDiv.classList.remove('form__input--error');
        cc_dateMM.classList.remove('form__input--error');
        cc_dateYYYY.classList.remove('form__input--error');
    }
}

cc_dateMM.addEventListener('input', (event) => {
    validateED();
})

cc_dateYYYY.addEventListener('input', (event) => {
    validateED();
})

function validateCVV(cvv) {
    const cvvregex = /^[0-9]{3,4}$/;
    return cvvregex.test(cvv);
}

cc_cvv.addEventListener('input', (event) => {
    var str = cc_cvv.value;
    var value = validateCVV(str);
    if (str.length > 0) {
        if (value) {
            cc_cvv.classList.remove('form__input--error');
        }
        else {
            cc_cvv.classList.add('form__input--error');
        }
    } 
    else {
        cc_cvv.classList.remove('form__input--error');
    }
})

function validateName(name) {
    var nameRegex = /^[a-zA-Z\.\s]+$/;
    return nameRegex.test(name) && /^[a-zA-Z]/.test(name);
}

cc_name.addEventListener('input', (event) => {
    var str = cc_name.value;
    var value = validateName(str);
    if (str.length > 0) {
        if (value == true) {
            cc_name.classList.remove('form__input--error');
        }
        else {
            cc_name.classList.add('form__input--error');
        }
    } 
    else {
        cc_name.classList.remove('form__input--error');
    }
})

form.addEventListener('submit', (event) => {
    var name = validateName(cc_name.value);
    var cc_num = cc_number.value;
    var number = (cctype(cc_num.replaceAll("-", "")) != null);
    var mm = cc_dateMM.value;
    var yyyy = cc_dateYYYY.value;
    var Date = validateExpiryDate(mm, yyyy) && (mm >= month && yyyy >= year);
    var cvv = validateCVV(cc_cvv.value);

    var a = name && number && Date && cvv;

    if (a == false) {
        event.preventDefault();
    }
})