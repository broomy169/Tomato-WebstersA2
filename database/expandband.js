// script is used to expand band/artist information when more info/less info button is clicked in band.php
function expand(tally){
    var button = document.getElementById("button" + tally);
    var moreInfo = document.getElementById("moreInfo" + tally);
    var photo = document.getElementById("photo" + tally);
    console.log(tally); //testing purpose

    if (button.value === "more info..."){
        button.value = "less info..";
        moreInfo.style.display = "block";
        photo.style.display = "block";

    } else {
        button.value = "more info...";
        moreInfo.style.display = "none";
        photo.style.display = "none";
    }
}
