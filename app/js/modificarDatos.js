// hacemos las comprobaciones por javascript y no por php para que sea mas vulnerable
// No es seguro hacerlas en javascript, ya que se pueden modificar por el cliente.

var formulario = document.getElementById("formulario");
//Accedo a los inputs
var inputs = document.querySelectorAll("#formulario input") // # porque es un id

const checkForm = (e) =>
{
    //Compruebo el nombre del input para hacer la comprobación correspondiente
    switch(e.target.name)
    {
        case("dni"):
            //escrito es lo que esta en el input
            escrito = e.target.value;
            e.target.type = "bien";

            letras ="TRWAGMYFPDXBNJZSQVHLCKET";
            i = escrito.slice(0, -1) % 23;
            
            letraCorrecta = letras.substring(i,i+1);

            if(letraCorrecta === escrito.slice(-1))
            {
                console.log("dni correcto");
                e.target.style.borderBottomColor = "green";
                //El input de DNI es valido y se puede enviar
                e.target.setCustomValidity(""); 
            }
            else
            {
                console.log("mal, la letra es "+letraCorrecta+"y esta "+escrito.slice(-1));
                e.target.style.borderBottomColor = "red";
                //El input de DNI no es valido y se va a enviar
                e.target.setCustomValidity("El Dni está mal"); 
            }
            break;
        case("usuario"):
            escrito = e.target.value;

            //Si el usuario esta vacio se pone rojo
            if(escrito.length < 1)
            {
                e.target.style.borderBottomColor = "red";
            }
            else
            {
                e.target.style.borderBottomColor = "green";
            }
            break;
        case("telefono"):
            escrito = e.target.value;

            //Si el telefono no tiene 9 numeros (no compara regex, ya que no es necesario)
            if(escrito.length < 9)
            {
                console.log("mal");
                e.target.style.borderBottomColor = "red";
            }
            else
            {
                console.log("bien");
                e.target.style.borderBottomColor = "green";
            }
            break;
        case("email"):
            escrito = e.target.value;

            //Si el email esta vacio. 
            if(escrito.length < 1)
            {
                console.log("mal");
                e.target.style.borderBottomColor = "red";
            }
            else
            {
                console.log("bien");
                e.target.style.borderBottomColor = "green";
            }
            break;
        case("nacimiento"):
            escrito = e.target.value;

            //Si la fecha de nacimiento esta vacia. 
            if(escrito.length < 1)
            {
                console.log("mal");
                e.target.style.borderBottomColor = "red";
            }
            else
            {
                console.log("bien");
                e.target.style.borderBottomColor = "green";
            }
            break;
    }
}

//Por cada input que tengo creo un listener que active checkForm
inputs.forEach((input) => {
    //Cuando se cambie el focus y cuando se levante una tecla se comprobara el input
    input.addEventListener("blur", checkForm);
    input.addEventListener("keyup", checkForm);
});

