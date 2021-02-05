const footer = document.getElementsByClassName("footer")[0];

// von: https://stackoverflow.com/questions/36631762/returning-html-with-fetch
async function getFooter(){
await fetch("../structure/footer.html")
.then( res => res.text())
    .then(data => {
        footer.innerHTML = data;
    })
}
    getFooter();