const boxes = document.getElementsByName('change');
boxes.forEach(box => {
    box.addEventListener('click', function handleClick(event) {

        console.log(event);
        let foto = event.path[3].children[0].lastChild.currentSrc;
        let marca = event.path[4].children[1].childNodes[1].innerText;
        let prodotto = event.path[4].children[1].children[2].innerText;
        let grammi = event.path[4].children[1].children[4].innerText;
        let prezzo = event.path[2].childNodes[0].textContent.trim();

        document.getElementById('marca').value = marca;
        document.getElementById('prodotto1').value = prodotto
        document.getElementById('peso').value = grammi;
        document.getElementById('prezzo').value = prezzo;

        document.getElementById('sfondo').style.display = "inline";
    });
});

document.getElementById('aggiungi').addEventListener('click', function handleClick(event) {
    document.getElementById('sfondo1').style.display = "inline";
});

document.getElementById('close').addEventListener('click', function handleClick(event) {
    document.getElementById('sfondo').style.display = "none";
});
document.getElementById('close1').addEventListener('click', function handleClick(event) {
    document.getElementById('sfondo1').style.display = "none";
});
const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);
if (urlParams.has('add')) {
    alert('Prodotto già esistente nel db');
}