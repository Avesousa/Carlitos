var cant = 0;

function agregarItem(){
    $(".delete").css("display","none");
    let qty = $("#qty").val();
    let desc = $("#desc").val();
    if(qty != "" && desc != ""){
        $("#detailPedido").append($("<option>",{
            value: qty + " " + desc,
            id: "option" + cant,
            text: qty + " " + desc
        }));
        cant++;
        $("#qty").val("");
        $("#desc").val("");
        agregarLista();
    }
}

function hacerMayus(text){
    $("#desc").val(text.toUpperCase());
}

function deleteItem(){
    $("#detailPedido option:selected").remove();
    $(".delete").css("display","none");
    agregarLista();
}

function agregarLista(){
    $("#pedido").val(generarLista());
}

function generarLista(){
    let lista = "";
    for(let i = 0; i < cant; i++){
        if( $("#option" + i).val())
            lista += $("#option" + i).val() + "\n";
    }
    console.log(lista);
    return lista;
}

document.getElementById("detailPedido").addEventListener('click',function(e){
    $(".delete").css("display","block");
});