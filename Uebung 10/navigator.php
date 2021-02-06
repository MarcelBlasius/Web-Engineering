
<!doctype html>
<html>
<style>
body{
    margin:0;
    display: grid;
    grid-template-columns: 25vw 50vw 25vw;
    grid-template-rows: 15vh 1fr 10vh;

}

#topics{
    display:flex;
    flex-direction: row;
    margin-left: 2vw;

}
.topicButton{
    border-radius: 25px;
    margin-bottom: 1vh;
    margin-right: 0.5vw;
    margin-left: 0.5vw;
}

.innerHeader{
    color: white;
    grid-column-start: 1;
    grid-column-end: 4;
    background-color: rgb(230, 82, 82);
}
#navigatorHeader{
    text-align: center;
}


.leftBar{
    background-color: lightcoral;
}

.infoButtons{
    display: flex;
    flex-direction: column;
    margin-top: 2vh;
}

.infoButton{
    display: none;
    border-radius: 25px;
    margin-bottom: 1vh;
    margin-right: 0.5vw;
    margin-left: 0.5vw;
}

.innerMain{
    background-color: lightblue;
    padding-right: 2vw;
    padding-left: 2vw;
    font-size: 25px;
    min-height: 75vh;
}

.rightBar{
    display: block;
    background-color: lightcoral;
    font-size: 25px;
    color: white;
}

.refText{
    display:flex;
    flex-direction: column;
    color:white;
    margin-left: 2vw;
    
}
.rightBar #quelle {
    text-align: center;
}

.innerFooter{
    color: white;
    background-color: black;
    grid-column: 1/4;
    display: flex;
    justify-content: center;
    align-items: center;
}

.innerFooter a{
    margin-left: 2vw;
    margin-right: 2vw;
    color: white;
}

@media all and (max-width: 600px){
    
    body{
    margin:0;
    display: grid;
    grid-template-columns: 25vw 50vw 25vw;
    grid-template-rows: 15vh 1fr 0.2fr 10vh;

    }
    .rightBar{
    	grid-row: 3;
        grid-column: 1/4;
    }
    
    .leftBar{
        grid-row: 2;
    }
    .innerMain{
    	grid-row: 2;
        grid-column: 2/4;
    }
    .refText{
        margin: 0;
        text-align: center;
    }
    .innerFooter{
        grid-row: 4;
    }
    
}
</style>

<body>

<div class="innerHeader">
    <h1 id="navigatorHeader">WWW-Navigator</h1>

    <div id="topics">
    </div>
</div>

<div class="leftBar">
    <div class="infoButtons">
    </div>
</div>

<div class="innerMain">
</div>

<div class="rightBar">
    <p id="quelle">Quellen:</p>
    <div class="references"></div>
</div>

<div class="innerFooter">
    <p style="font-size: 25px">Footer:</p>
    <a href=""> Sitemap</a>
    <a href=""> Home </a>
    <a href=""> News </a>
    <a href=""> Contact</a>
    <a href=""> About</a>
</div>
<?php
    $anzeigename = $_POST['anzeigename'];
    $passwort = $_POST["passwort"];

    $lines = file("./raw_pwd.csv");
    $gefunden = false;
    foreach($lines as $line_num => $line){
        list( $csvanzeigename, $csvpasswort) = explode(",", $line);
        if($csvanzeigename === hash("sha384", $anzeigename)){
            if($csvpasswort === hash("sha384", $passwort) . "\n"){
                $gefunden = true;
                fetch("./input.json")
                .then( response => response.json())
                .then( jsObject => init(jsObject))
                .catch( function (error){
                    console.error("Request failed ", error);
                });
                break;
            }
        }
    }
    if(!$gefunden){
        echo "<script>alert('Name oder Passwort falsch!')</script>";
    }

    
    async function init(data){
        createTopicButtons(data);
        createInfoButtons(data);
        createContent(data);
    
    }

    async function createTopicButtons(data){
        const topics = document.getElementById("topics");
        for( const topic of Object.entries(data)){
            const input = document.createElement("input");
            input.type ="button";
            input.value=topic[0];
            input.className="topicButton";
            input.id=topic[0];
            input.addEventListener("click", () => {
                const infoButtons = document.getElementsByClassName("infoButton");
                for( const button of infoButtons){
                    if(button.id != topic[0]){
                        button.style.display = "none";
                    } else {
                        button.style.display = "flex";
                    }
                }
            });
            topics.appendChild( input );
    }
}

    async function createInfoButtons(data){
        const infoButtons = document.getElementsByClassName("infoButtons")[0];
        
        for( const topics of Object.entries(data)){
            for(const info of Object.entries(topics[1])){
                const input = document.createElement("input");
                input.type ="button";
                input.value= info[0];
                input.className="infoButton";
                input.id= topics[0];
                input.name =info[0];
                input.addEventListener("click", () => {
                const content = document.getElementsByClassName("contentText");
                for( const information of content){
                    if(information.name != info[0]){
                        information.style.display = "none";
                    } else {
                        information.style.display = "flex";
                    }
                }
                const refs = document.getElementsByClassName("refText");
                for( const information of refs){
                    if(information.name != info[0]){
                        information.style.display = "none";
                    } else {
                        information.style.display = "flex";
                    }
                }
            });
                infoButtons.appendChild(input);
            }
        }
    }

    async function createContent(data){
        let linkcounter = 0;
        for( const topics of Object.entries(data)){
            for(const info of Object.entries(topics[1])){

                //Content
                const content = document.getElementsByClassName("innerMain")[0];
                const input = document.createElement("p");
                input.textContent= info[1].content;
                input.className="contentText";
                input.name = info[0];
                input.style.display ="none";
                content.appendChild(input);

                //References
                const references = document.getElementsByClassName("references")[0];
                const ref = document.createElement("a");
                ref.href=info[1].references;
                ref.className="refText";
                ref.textContent= "Quelle " + ++linkcounter;
                ref.name = info[0];
                ref.style.display ="none";
                references.appendChild(ref);
            }
        }



    }
?>
</body>
<html>