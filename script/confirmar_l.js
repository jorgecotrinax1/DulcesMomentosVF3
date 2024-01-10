function ConfirmarLogin(callback) {
    console.log("Se ejecutó confirmar login");
    var xhr = new XMLHttpRequest();
    if (window.location.pathname.includes('login/')) {
// Si está dentro del directorio login
        path = '../script/confirmar_login.php';
    } else {
// Si está dentro de la raiz
        path = 'script/confirmar_login.php';
        }
    xhr.open('GET', path, true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var userId = xhr.responseText;
            // Si la sesión es válida
            if (xhr.response == "Sesión ya iniciada") {
                console.log(xhr.response);
                callback(true); 
            }else{
                console.log("No hay sesión activa");
                console.log(xhr.response);
                callback(false);
            }
        }
    };
    xhr.send();
}

function ActivoSet(boolean) {
    activo = boolean;
}

function ActivoGet() {
    return activo;
}