function show_register(){
	var xmlhttp;
    if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
    }else{// code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function(){
        if (xmlhttp.readyState==4 && xmlhttp.status==200){
            document.getElementById("welcome").innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET","welcome/register.php?t=" + Math.random(),true);
    xmlhttp.send();
}
function show_login(){
    var xmlhttp;
    if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
    }else{// code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function(){
        if (xmlhttp.readyState==4 && xmlhttp.status==200){
            document.getElementById("welcome").innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET","welcome/index.php?t=" + Math.random(),true);
    xmlhttp.send();
}
function show_login_meta(){
    var show=document.getElementById("login_meta").style.display="";
}
function hide_login_meta(){
    var hide=document.getElementById("login_meta").style.display="none";
}
function show_register_meta(){
    var show=document.getElementById("register_meta").style.display="";
}
function hide_register_meta(){
    var hide=document.getElementById("register_meta").style.display="none";
}
