function validateRUT(rut) {
    var value = rut.replace(/\./g, "").replace(/\-/g, "");
    var body = value.slice(0, -1);
    var dv = value.slice(-1).toUpperCase();
    var counter = 0;
    var multiplier = 2;

    for (var i = body.length - 1; i >= 0; i--) {
        counter = counter + (multiplier * body.charAt(i));
        if (multiplier < 7) {
            multiplier = multiplier + 1;
        } else {
            multiplier = 2;
        }
    }

    var rest = counter % 11;
    var dvCalc = 11 - rest;

    if (dvCalc == 11) {
        dvCalc = 0;
    }
    if (dvCalc == 10) {
        dvCalc = "K";
    }

    if (dv == dvCalc) {
        return true;
    }
    return false;
}

function validateForm() {
    const rutInput = document.getElementById('rut');
    const rut = rutInput.value.trim();
    const isValid = validateRUT(rut);
    console.log(isValid);
    if (!isValid) {
        rutInput.classList.add('is-invalid'); // Add the 'is-invalid' class to highlight the input as invalid
        return false;
    }

    return true;
}    