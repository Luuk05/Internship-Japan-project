//laat error zien wanneer er een leegte is na de query uitvoer na het zoeken can companies
function error_geen_resultaten() {
    var divtag = document.createElement("div");
    divtag.setAttribute("id", "error-geen-resultaten");
    

    var h3tag1 = document.createElement("H3");
    h3tag1.innerHTML = "There were no results matching your keywords,";

   

    var h3tag2 = document.createElement("H3");
    h3tag2.innerHTML = "Try some other words in the filter on the left side of this page.";

    divtag.appendChild(h3tag1);
   
    divtag.appendChild(h3tag2);

    document.getElementById("resultaten-box").appendChild(divtag);
}

if (document.getElementById("resultaten-box").innerText == "") {
    error_geen_resultaten();
}