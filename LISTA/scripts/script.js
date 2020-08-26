var imagen = ["image/post4.jpg","image/post3.jpg","image/bgmanjar.jpg",
                "image/bgfrancisca.jpg","image/bgboco.jpg"];
var texto = ["Los mejores quesos para los mejores paladares...",
            "El mejor queso de todo palomar..."];
var numero = 1;
var numeroT = 1;

function enviarWhatsapp(){
    let numero = $("#numero").value();
    let mensaje = $("#mensaje").value();
    console.log("Enviar mensaje a: " + numero + " con el mensaje " + mensaje.replace(' ','%20'));
}

function ir(url) {
    var a = document.createElement("a");
    a.target = "_blank";
    a.href = url;
    a.click();
}

function accionar(base,id){
    $('#mostradorPdf').attr(
        'src',
        '../administration/script/'+base+'.php?id='+id);
    $("#adminOverlay").addClass('active');
    $("#adminPopup").addClass('active');
    $("#accion").val(base);
    $(".btn-cerrar-popup").css("display","block");
}

window.addEventListener("load", function () {
    var navegacion = document.getElementById("navegacion"),
        open = document.getElementById("btn-menu"),
        menu = document.getElementById("menu");
    if (window.pageYOffset > 100) navegacion.classList.add("mouse");
    window.addEventListener("scroll", function () {
        window.pageYOffset > 100 && window.innerWidth > 900 ? navegacion.classList.add("mouse") : navegacion.classList.remove("mouse");
    });
    open.addEventListener("click", function () {
        menu.classList.toggle("menu-activo");
    });
});

function cambiarFondo(){
    $("#imgGal").addClass("ocultar");
    $(".primeroT").addClass("ocultar");
    $(".primeroT").addClass("bandera");
    $(".bandera").removeClass("primeroT");
        setTimeout(function(){
        $("#imgGal").prop("src",imagen[numero]);
        $(".segundoT").html(texto[numeroT]);
        $(".segundoT").addClass("primeroT");
        $(".primeroT").removeClass("segundoT");
        $(".bandera").addClass("segundoT");
        $(".bandera").removeClass("ocultar");
        $("#imgGal").removeClass("ocultar");
        $(".primeroT").addClass("aparecer");
        $("#imgGal").addClass("aparecer");
        if(numero == imagen.length-1) 
            numero = 0;
        else
            numero++;
        if(numeroT == texto.length-1)
            numeroT = 0;
        else
            numeroT++;
        setTimeout(function(){
            $(".segundoT").removeClass("bandera");
            $(".primeroT").removeClass("aparecer");
            $("#imgGal").removeClass("aparecer");
        },3000);
    },2000);
    
}

$(document).ready(function(){

    $("#overlay").addClass('active');
    $("#popup").addClass('active');

    $(window).resize(function(){
        if($(this).width()<300){
            $('bgprod1').removeClass("scrollflow -slide-top -opacity");
            $('bgprod2').removeClass("scrollflow -slide-right -opacity");
            $('bgprod3').removeClass("scrollflow -slide-left -opacity");
            $('bgprod4').removeClass("scrollflow -slide-top -opacity");
            $('bgprod5').removeClass("scrollflow -slide-right -opacity");
            $('bgprod6').removeClass("scrollflow -slide-left -opacity");
        }
    });

    

    $('#submit').click(function(){
		var cliente = $('#cliente').val();
		var documento = $('#documento').val();
		var telefono = $('#telefono').val();
		var correo = $('#correo').val();
		var direccion = $('#direccion').val();
		var pedido = $('#pedido').val();
		console.log("esta logueando");
        $.post(
            "http://www.carlitos.com.ar/enviarDos.php",
            {   cliente:cliente,
                documento:documento,
                telefono:telefono,
                correo:correo,
                direccion:direccion,
                pedido:pedido
            },
            function(res){
                console.log("termino todo");
                console.log(res);
            });
	});

    setTimeout(function(){
        $("#videopopup video")[0].play();
        $(".btn-cerrar-popup").css("display","block");
    },5000);

    $("#btn-cerrar").on({
        click:function(){
            $("#overlay").removeClass("active");
            $("#popup").removeClass("active");
            $("#videopopup video")[0].pause();
        }
    });

    $("#btn-cerrar-popup").on({
        click:function(){
            location.href = window.location;
            $("#adminOverlay").removeClass("active");
            $("#adminPopup").removeClass("active");
        }
    });

    setInterval(cambiarFondo,10000);



})
