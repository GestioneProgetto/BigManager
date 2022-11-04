$(document).ready(function () {
    $("#bottone_accedi").click(function () {
        alert("Non ancora implementato");   
    });
    $("#bottone_registrati").click(function () {
        $("#container_registrati").css("z-index", "100");
        $("#container_registrati").css("opacity", "100%");
    });
    $("#chiudi_registrati").click(function () {
        $("#container_registrati").css("opacity", "0%");
        setTimeout(function(){$("#container_registrati").css("z-index", "-100");},500);
    });
    $(".bottone").mouseenter(function () {
        $(this).css("background-color", "#eee");
    });
    $(".bottone").mouseleave(function () {
        $(this).css("background-color", "#fff");
    });
    $(".bottone").click(function () {
        $(this).css("background-color", "#ddd");
    });


    $(".mostrapass").mouseenter(function () {
        $(this).css("background-color", "#fff");
    });
    $(".mostrapass").mouseleave(function () {
        $(this).css("background-color", "#eee");
    });
    $("#mostrapassaccedi").click(function () {
        if (document.getElementById("accedi_password").type === "password") 
        {
            document.getElementById("accedi_password").type = "text";
            document.getElementById("occhio_g_accedi").hidden = true;
            document.getElementById("occhio_n_accedi").hidden = false;
          } else 
          {
            document.getElementById("accedi_password").type = "password";
            document.getElementById("occhio_g_accedi").hidden = false;
            document.getElementById("occhio_n_accedi").hidden = true;
          }
    });
});