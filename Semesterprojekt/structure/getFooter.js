const footer = document.getElementsByClassName("footer")[0];

async function getFooter(){
await fetch("/Semesterprojekt/structure/footer.html")
.then( res => res.text())
    .then(data => {
        footer.innerHTML = data;
    })
}
    getFooter();