// script is used to expand band/artist information when clicked on any of it
function expand(tally) {
    var click = document.getElementById("list" + tally);
    var infomore = document.getElementById("info-more" + tally);
    var photo = document.getElementById("photo" + tally);
    var infosmall = document.getElementById("info-small" + tally);
    var icon = document.getElementById("icon" + tally);
    console.log(tally); //testing purpose
    
        
   
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

