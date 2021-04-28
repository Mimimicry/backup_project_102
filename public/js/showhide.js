var a;
function show_hide()
{
    if(a==1)
    {
        document.getElementById("koala_image").style.display="inline";
        return a = 0;

    }
    else
    {
        document.getElementById("koala_image").style.display="none";
        return a = 1; 
    }
}


