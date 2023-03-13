const registeredCustomers = JSON.parse($("#cmrs").val());
const customerArr = [];
registeredCustomers.forEach(e => {
    customerArr.push(e.documento_id);
})
let validForm = false;
let msgBox = $("#msgBox");
let button = $("#submit");

console.log(customerArr);

const getIsRegisteredCmr = cmrId => {
    (customerArr.includes(cmrId)) ?
        validForm = true :
        validForm = false;

    msgBox.html(() => {
        if (validForm) {
            msgBox.attr("style", "color: green;");
            button.attr("disabled", false);
            return "¡El cliente se encuentra registrado!";
        } else {
            msgBox.attr("style", "color: red;");
            button.attr("disabled", true);
            return "El cliente debe estar registrado en el sistema";
        }
    });
}