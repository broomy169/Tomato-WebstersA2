function genreNameCheck() {

    var genre = document.forms["addRecord"]["genre_name"].value;

    var wordStartWithCapitalLetter = /^[A-Z].*/;

    if (genre == "") {
        alert("Field is empty, you must enter name starting with capital letter");
        return false;
    }

    if (!wordStartWithCapitalLetter.test(genre)) {
        alert("Genre name must start with capital letter");
        return false;
    }


}