btn_editar = document.querySelector("#editar");

btn_editar.addEventListener("click", (e) => {
    let id = document.getElementById("id");
    let correo = document.getElementById("email");
    let nombre = document.getElementById("name");
    let contraseña = document.getElementById("pass");
    let direccion = document.getElementById("address");
    let fecha_nac = document.getElementById("birthday");
    let telefono = document.getElementById("phone_number");

    id = id.value;
    correo = correo.value;
    nombre = nombre.value;
    pass = contraseña.value;
    direccion = direccion.value;
    fecha = fecha_nac.value;
    telefono = telefono.value;

    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        url: "/guardarCambios",
        method: "GET",
        dataType: "json",
        data: {
            id: id,
            correo: correo,
            nombre: nombre,
            pass: pass,
            direccion: direccion,
            fecha: fecha,
            telefono: telefono,
        },
        success: function (data) {
            console.log(data);
        },
    });
});
