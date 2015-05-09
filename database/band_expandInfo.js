// script is used to expand band/artist information when clicked on any of it
function expand(tally,tallySum) {
    var click = document.getElementById("band" + tally);
    var infomore = document.getElementById("info-more" + tally);
    var photo = document.getElementById("photo" + tally);
    var infosmall = document.getElementById("info-small" + tally);
    var icon = document.getElementById("icon" + tally);
    console.log(tally); //testing purpose
    
    for (i = 1; i <= tallySum; i++) {
        var clicki = document.getElementById("band" + i);
        var infomorei = document.getElementById("info-more" + i);
        var photoi = document.getElementById("photo" + i);
        var infosmalli = document.getElementById("info-small" + i);
        var iconi = document.getElementById("icon" + i);
        
        if(tallySum != tally){
        
            clicki.value = "hide";
            clicki.title = "click here for more information";
            infomorei.style.display = "none";
            photoi.style.display = "none";
            infosmalli.style.display = "block";
            iconi.style.display = "block";
        }
    }

    if (click.value === "show") {
        click.value = "hide";
        click.title = "click here for more information";
        infomore.style.display = "none";
        photo.style.display = "none";
        infosmall.style.display = "block";
        icon.style.display = "block";

    } else {
        click.value = "show";
        click.title = "click here for less information";
        infomore.style.display = "block";
        photo.style.display = "block";
        infosmall.style.display = "none";
        icon.style.display = "none";
    }
}

