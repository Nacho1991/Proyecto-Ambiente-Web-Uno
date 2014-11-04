function myFunction(pID)
{
    if (document.getElementsByClassName("trselected").length > 0) {
        var element = document.getElementsByClassName("trselected");
        if (parseInt(element[0].id) % 2 != 0)
            element[0].className = "impar";
        else
            element[0].className = "";
    }
    pID.className = "trselected";
}



