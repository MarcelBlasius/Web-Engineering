const list = document.getElementById("list");
const input = document.getElementById("InputName");

input.addEventListener("keyup", event =>{
    if(event.keyCode ==13){
        document.getElementById("hinzufuegenButton").click();
    }
});
const hinzufuegenButton = document.getElementById("hinzufuegenButton");

hinzufuegenButton.addEventListener("click", () =>{
    if(input.value === ""){
        return;
    }
    const item = document.createElement("li");
    const name = document.createElement("span")
    name.style.marginRight = "1vw";
    name.textContent = input.value;
    input.value = "";

    const timer = document.createElement("span")
    timer.textContent = "00:00:00";
    
    const timerButton = document.createElement("input");
    timerButton.value = "Start!";
    timerButton.className="timerButton";
    timerButton.type = "button";
    timerButton.style.marginLeft = "1vw";
    
    var timerVar;
    timerButton.addEventListener("click", () =>{
        if(timerButton.value === "Start!"){
            timerButton.value = "Stopp!";
            timerVar = setInterval(function(){count(timer)}, 1000);
            [...document.getElementsByClassName("timerButton")].forEach(x => {
                if(timerButton === x){
                } else if(!checkStart(x)){
                    x.click();
                }


            });
        } else {
            timerButton.value = "Start!";
            clearInterval(timerVar);   
        }

    });

    item.appendChild(name);
    item.appendChild(timer);
    item.appendChild(timerButton);
    list.appendChild(item);
});

function count(element){
    const times = String(element.textContent).split(":");
    let hours = times[0];
    let minutes = times[1];
    let seconds = times[2];

    ++seconds;

    element.textContent = buildTimeString(hours, minutes, seconds);
}

function checkStart(element){
    return element.value === "Start!";
}

function buildTimeString(hours, minutes, seconds){
    if(seconds > 59){
        seconds = "0";
        minutes = Number(minutes) + 1;
    }
    if(minutes > 59){
        minutes = "0";
        hours = Number(minutes) + 1;
    }

    if(seconds < 10){
        seconds = "0" + seconds;
    }
    if(minutes < 10 && minutes[0] !== "0"){
        minutes = "0" + minutes;
    }
    if(hours < 10 && hours[0] !== "0"){
        hours = "0" + hours;
    }

    return hours + ":" + minutes + ":" +seconds;
}