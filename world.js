window.onload = function()
{
    var subbutton = document.querySelector("#lookup");
    
    
    subbutton.addEventListener("click", function()
    {
        var srchtxt = document.querySelector("#country").value;
        var getallc = document.querySelector("#getallcountries").checked;
        getInfo(srchtxt,getallc);
        
    }
    , false);
    
    
    function getInfo(q,all) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200)
                document.getElementById("result").innerHTML = this.responseText;
        }
            var querystring = "world.php?country=" + q + "&all=" + all;
            xhttp.open("GET", querystring , true);
            xhttp.send();
        
    };

};