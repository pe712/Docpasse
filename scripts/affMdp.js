//code valable pour les deux pages EspacePerso et NewMdp
function GeneMdp(k){
    remplir("");
    remplir(k);
}

function remplir(id){
    var textarea = document.getElementById("newPwd"+id);
    if (textarea!=null){
        var xhr = new XMLHttpRequest();
        xhr.open("get", '../geneMdp.php', false);
        xhr.send();
        textarea.value = xhr.responseText;
        textarea.type = "text";
    }
}

