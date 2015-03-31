function start_re(){
	var xmlhttp;
    if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
    }else{// code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function(){
        if (xmlhttp.readyState==4 && xmlhttp.status==200){
            document.getElementById("gap").innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET","gap/start_re.php?t=" + Math.random(),true);
    xmlhttp.send();
}

function state_computer(){
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
    xmlhttp.open("GET","main/com_info.php?t=" + Math.random(),true);
    xmlhttp.send();
}
function state_addr_time(t){
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
    xmlhttp.open("GET","main/addr_info.php?t=" + Math.random(),true);
    xmlhttp.send();
}
function state_confirm(t){
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
    xmlhttp.open("GET","main/confirm_info.php?t=" + Math.random(),true);
    xmlhttp.send();
}
function get_addr_time(addr){
    var x=document.getElementById("error_info");
    var time=document.getElementById("date_time").value;
    if(time==""){
        x.innerHTML="<p>对不起，请输入取件时间</p>";
        x.style.visibility="visible";
        return false;
    }
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
    xmlhttp.open("GET","main/confirm_info.php?aid="+addr+"&time="+time,true);
    xmlhttp.send();
}

function start_style(t){
    if(t=='0'){
        var x = document.getElementsByClassName("re_show_p");
        x[0].style.color="#3a3a3a";
    }else if(t=='1'){
        var x = document.getElementsByClassName("re_show_p");
        x[0].style.color="#fff";
    }else{
        return;
    }
    
}
function has_ad_style(t,q){
    if(q==1){
        var x = document.getElementById("product_img_"+t);
        x.style.boxShadow="0px 0px 5px #25adec";
        document.getElementById("produnct_title_"+t).style.color="#25adec";
        document.getElementById("produnct_price_"+t).style.color="#f05050";
    }else if(q==0){
        var x = document.getElementById("product_img_"+t);
        x.style.boxShadow="0px 0px 0px #fff";
        document.getElementById("produnct_title_"+t).style.color="#000";
        document.getElementById("produnct_price_"+t).style.color="#000";
    }else{
        return;
    }
}
function choose_product(t){
    var x=document.getElementById("choosed_ad");
    var title=document.getElementById("product_title_"+t).innerHTML;
    var price=document.getElementById("product_price_"+t).innerHTML;
    x.innerHTML="<p>"+title+"</p>"+"<p style=\"font-size:14px\">"+price+"</p>";
    document.getElementById("choosed_product").value=t;
    x.style.display="";
}