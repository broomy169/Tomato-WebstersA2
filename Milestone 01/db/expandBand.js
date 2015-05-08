// script is used to expand band/artist information when clicked on any of it
function expand(tally){
    var click = document.getElementById("band" + tally);
    var moreInfo = document.getElementById("moreInfo" + tally);
    var photo = document.getElementById("photo" + tally);
    console.log(tally); //testing purpose

    if (click.value === "show"){
        click.value = "hide";
        click.title = "click here for more information";
        moreInfo.style.display = "none";
        photo.style.display = "none";

    } else {
        click.value = "show";
        click.title = "click here for less information";
        moreInfo.style.display = "block";
        photo.style.display = "block";
    }
}
