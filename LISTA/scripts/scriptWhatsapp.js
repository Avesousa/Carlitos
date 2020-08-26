function enviarWhatsapp(){
    let numero = $("#numero").val();
    let mensaje = $("#mensaje").val();
    let mensajeFinal = "";
    for(var i = 0; i < mensaje.length; i++){
        if(mensaje.charAt(i) != " ")
            mensajeFinal += mensaje.charAt(i); 
        else   
            mensajeFinal += "%20";
    }

    var aux = document.createElement("input");
    aux.setAttribute("value","https://api.whatsapp.com/send?phone=54911"+numero+"&text="+mensajeFinal);
    document.body.appendChild(aux);
    aux.select();
    document.execCommand("copy");
    document.body.removeChild(aux);
}
