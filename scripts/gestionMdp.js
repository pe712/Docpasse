var e=true;

    function modify(i) {
        document.getElementById("submit"+i).removeAttribute("hidden");
        document.getElementById("newId"+i).value = document.getElementById("id"+i).innerHTML;
        document.getElementById("newSite"+i).value = document.getElementById("site"+i).innerHTML;
        document.getElementById("newPwd"+i).removeAttribute("hidden");
        document.getElementById("gene"+i).removeAttribute("hidden");
        document.getElementById("params").removeAttribute("hidden");
    }

    function N_Aff(i) {
        if (e){
            document.getElementById("pwd"+i).removeAttribute("style");
            document.getElementById("aff"+i).innerHTML = "Masquer";
            e=false;            
        }
        else{
            document.getElementById("pwd"+i).style = "-webkit-text-security: disc";
            document.getElementById("aff"+i).innerHTML = "Afficher";
            e=true;
        }
    }

    function copier(i){
        var mdp = document.getElementById("pwd"+i).innerHTML;
        navigator.clipboard.writeText(mdp);
        document.getElementById("remerciement").removeAttribute("hidden")
    }