
    const head = document.getElementsByClassName("header")[0];

    // von: https://stackoverflow.com/questions/36631762/returning-html-with-fetch
    async function getHeader(){
        await fetch("../structure/header.html")
            .then( res =>res.text())
                .then(data => {
                    head.innerHTML = data;
                })

    }

    getHeader();