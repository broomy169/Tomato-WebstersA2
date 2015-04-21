// Not used in any other file at the moment but code is valid which used directly in band.php

(function (){
    function expand(){
        var button = document.getElementById("moreinfo");
        var moreinfoblock = document.getElementById("moreinfoBlock");
        var morephotosblock = document.getElementById("morephotoBlock");

        if (button.value === "more info"){
            button.value = "less info";
            moreinfoblock.style.display = "block";
            morephotosblock.style.display = "block";
        } else {
            button.value = "more info";
            moreinfoblock.style.display = "none";
            morephotosblock.style.display = "none";
        }
    }

}());
