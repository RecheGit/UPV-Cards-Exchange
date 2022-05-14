var formulario = document.getElementById("formulario");

//Accedo a los inputs
var inputs = document.querySelectorAll("#formulario input") // # porque es un id

const checkForm = (e) =>
{
    //Compruebo el nombre del input para hacer la comprobación correspondiente
    switch(e.target.name)
    {
        case("nombre"):
            //escrito es lo que esta en el input
            escrito = e.target.value;
            
            //Si esta vacio se pone rojo
            if(escrito.length < 1)
            {
                e.target.style.borderBottomColor = "red";
            }
            else
            {
                e.target.style.borderBottomColor = "green";
            }
            break;
        case("equipo"):
            escrito = e.target.value;

            //Si esta vacio se pone rojo
            if(escrito.length < 1)
            {
                e.target.style.borderBottomColor = "red";
            }
            else
            {
                e.target.style.borderBottomColor = "green";
            }
            break;
        case("anno"):
            escrito = e.target.value;

            //Si esta vacio se pone rojo
            if(escrito.length < 4)
            {
                e.target.style.borderBottomColor = "red";
            }
            else
            {
                e.target.style.borderBottomColor = "green";
            }
            break;
        case("nacionalidad"):
            escrito = e.target.value;

            //Si esta vacio se pone rojo
            if(escrito.length < 1)
            {
                e.target.style.borderBottomColor = "red";
            }
            else
            {
                e.target.style.borderBottomColor = "green";
            }
            break;
        case("goles"):
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
    //Cuando se cambie el focus se comprobara el input
    input.addEventListener("blur", checkForm);
    input.addEventListener("keyup", checkForm);
});