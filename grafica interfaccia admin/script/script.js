document.getElementById("esci").onclick=function()
{
    alert("pippo");
}

function modificaProdotto(element) {
    alert("modifica");
    
}

$('.modifica button').click(function() {
    modificaProdotto(this);
});