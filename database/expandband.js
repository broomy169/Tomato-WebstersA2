// script is used to expand band/artist information when more info/less info button is clicked in band.php
function expand(tally){
    var button = document.getElementById("moreinfo" + tally);
    var moreinfoblock = document.getElementById("moreinfoBlock" + tally);
    var morephotosblock = document.getElementById("morephotoBlock" + tally);
    console.log(tally); //testing purpose

    if (button.value === "more info..."){
        button.value = "less info..";
        moreinfoblock.style.display = "block";
        morephotosblock.style.display = "block";

    } else {
        button.value = "more info...";
        moreinfoblock.style.display = "none";
        morephotosblock.style.display = "none";
    }
}
