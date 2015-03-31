function choose_city(){
	var this_province=document.getElementById("user_province").value;
    if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
    }else{// code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function(){
        if (xmlhttp.readyState==4 && xmlhttp.status==200){
            document.getElementById("city_area").innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET","welcome/city_area.php?pid=" + this_province,true);
    xmlhttp.send();
}
function check_register(register_form){
    var div=document.getElementById("login_show");
    if(register_form.user_name.value==""){
        div.style.visibility="visible";
        div.innerHTML="<p>对不起，请输入您的姓名</p>";
        return false;
    }
    if(register_form.user_cell.value==""){
        div.style.visibility="visible";
        div.innerHTML="<p>对不起，请输入您的电话</p>";
        return false;
    }
    if(register_form.user_address.value==""){
        div.style.visibility="visible";
        div.innerHTML="<p>对不起，请输入您的地址</p>";
        return false;
    }
    if(register_form.user_pass.value==""){
        register_form.user_pass.value=register_form.user_cell.value;
    }else{
        if(register_form.user_pass.value.length<6 ||register_form.user_pass.value.length>15){
            div.style.visibility="visible";
            div.innerHTML="<p>对不起，密码长度为6-15位</p>";
            return false;
        }
    }
}