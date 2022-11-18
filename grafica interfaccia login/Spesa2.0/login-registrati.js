$(document).ready(function () {
    $(".bottone").mouseenter(function () {
        $(this).css("background-color", "#eee");
    });
    $(".bottone").mouseleave(function () {
        $(this).css("background-color", "#fff");
    });
    $(".bottone").click(function () {
        $(this).css("background-color", "#ddd");
        setTimeout($(this).css("background-color", "#eee",500));
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

    $("#mostrapassregistrati1").click(function () {
        if (document.getElementById("registrati_password1").type === "password") 
        {
            document.getElementById("registrati_password1").type = "text";
            document.getElementById("occhio_g_registrati1").hidden = true;
            document.getElementById("occhio_n_registrati1").hidden = false;
          } else 
          {
            document.getElementById("registrati_password1").type = "password";
            document.getElementById("occhio_g_registrati1").hidden = false;
            document.getElementById("occhio_n_registrati1").hidden = true;
          }
    });

    $("#mostrapassregistrati2").click(function () {
        if (document.getElementById("registrati_password2").type === "password") 
        {
            document.getElementById("registrati_password2").type = "text";
            document.getElementById("occhio_g_registrati2").hidden = true;
            document.getElementById("occhio_n_registrati2").hidden = false;
          } else 
          {
            document.getElementById("registrati_password2").type = "password";
            document.getElementById("occhio_g_registrati2").hidden = false;
            document.getElementById("occhio_n_registrati2").hidden = true;
          }
    });
});