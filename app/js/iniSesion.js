var formulario = document.getElementById("formulario");

//Accedo a los inputs
var inputs = document.querySelectorAll("#formulario input") // # porque es un id

const checkForm = (e) =>
{
    escrito = e.target.value;
    //Si el usuario o contrasena esta vacio se pone rojo
    if(escrito.length < 1)
    {
        e.target.style.borderBottomColor = "red";
    }
    else
    {
        e.target.style.borderBottomColor = "green";
    }
}

//Por cada input que tengo creo un listener que active checkForm
inputs.forEach((input) => {
    //Cuando se cambie el focus se comprobara el input
    input.addEventListener("blur", checkForm);
    input.addEventListener("keyup", checkForm);
});