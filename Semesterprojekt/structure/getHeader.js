
    const head = document.getElementsByClassName("header")[0];
    
    async function getHeader(){
        await fetch("/Semesterprojekt/structure/header.html")
            .then( res =>res.text())
                .then(data => {
                    head.innerHTML = data;
                })

    }

    getHeader();