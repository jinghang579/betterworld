function sub_com_info(uid){
	var xmlhttp;
    var uid = uid;
    var x=document.getElementById("error_info");
    var brand = document.getElementById("com_brand").value;
    var cpu = document.getElementById("com_cpu").value;
    var ram = document.getElementById("com_ram").value;
    var disk = document.getElementById("com_harddisk").value;
    var graphic = document.getElementById("com_graphic").value;
    var monitor = document.getElementById("com_monitorsize").value;
    var quantity = document.getElementById("com_quantity").value;
    var used = document.getElementById("com_usedyear").value;
    var able = document.getElementById("com_useable").value;
    if(brand==""){
        x.innerHTML="<p>对不起，请输入品牌及型号</p>";
        x.style.visibility="visible";
        return false;
    }
    if(cpu==""){
        x.innerHTML="<p>对不起，请输入CPU信息</p>";
        x.style.visibility="visible";
        return false;
    }
    if(ram==""){
        x.innerHTML="<p>对不起，请输入内存信息</p>";
        x.style.visibility="visible";
        return false;
    }
    if(disk==""){
        x.innerHTML="<p>对不起，请输入硬盘信息</p>";
        x.style.visibility="visible";
        return false;
    }
    if(graphic==""){
        x.innerHTML="<p>对不起，请输入显卡信息</p>";
        x.style.visibility="visible";
        return false;
    }
    if(monitor==""){
        x.innerHTML="<p>对不起，请输入显示器大小</p>";
        x.style.visibility="visible";
        return false;
    }
    if(used==""){
        x.innerHTML="<p>对不起，请输入使用时间</p>";
        x.style.visibility="visible";
        return false;
    }
    if(able==""){
        x.innerHTML="<p>对不起，请输入现在是否可用</p>";
        x.style.visibility="visible";
        return false;
    }
    var data=new FormData();
    data.append("brand",brand);
    data.append("cpu",cpu);
    data.append("ram",ram);
    data.append("disk",disk);
    data.append("graphic",graphic);
    data.append("monitor",monitor);
    data.append("quantity",quantity);
    data.append("used",used);
    data.append("able",able);
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
    xmlhttp.open("POST","main/addr_info.php",true);
    //xmlhttp.setRequestHeader("Content-type","multipart/form-data");
    xmlhttp.send(data);
}
function post_addr_time(){
    var x=document.getElementById("error_info");
    var xmlhttp;
    var p = document.getElementById("user_province").value;
    var c = document.getElementById("user_city").value;
    var a = document.getElementById("user_address").value;
    var t = document.getElementById("date_time").value;
    if(p==""){
        x.innerHTML="<p>对不起，请输入新的省份</p>";
        x.style.visibility="visible";
        return false;
    }
    if(c==""){
        x.innerHTML="<p>对不起，请输入新的城市</p>";
        x.style.visibility="visible";
        return false;
    }
    if(a==""){
        x.innerHTML="<p>对不起，请输入新的地址</p>";
        x.style.visibility="visible";
        return false;
    }
    if(t==""){
        x.innerHTML="<p>对不起，请输入取件时间</p>";
        x.style.visibility="visible";
        return false;
    }
    var data=new FormData();
    data.append("province",p);
    data.append("city",c);
    data.append("address",a);
    data.append("time",t);
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
    xmlhttp.open("POST","main/confirm_info.php",true);
    //xmlhttp.setRequestHeader("Content-type","multipart/form-data");
    xmlhttp.send(data);
}
function post_order(m){
    var xmlhttp;
    var x=document.getElementById("error_info");
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
    var zhifubao=document.getElementById("user_zhifubao").value;
    if(zhifubao==""){
        x.innerHTML="<p>对不起，请输入支付宝账号</p>";
        x.style.visibility="visible";
        return false;
    }
    var aid=document.getElementById("order_aid").value;
    var gt=document.getElementById("order_get_time").value;
    var data=new FormData(); 
    data.append("zhifubao",zhifubao);
    data.append("get_time",gt);
    if(m=='0'){
        data.append("ad","0");
    }else if(m=='1'){
        data.append("ad","1");
    }else{
        return;
    }
    if(aid==""){
        var address = document.getElementById("order_address").value;
        var pid=document.getElementById("order_pid").value;
        var cid=document.getElementById("order_cid").value;
        data.append("pid",pid);
        data.append("cid",cid);
        data.append("address",address);
        xmlhttp.open("POST","main/order_success.php",true);
        //xmlhttp.setRequestHeader("Content-type","multipart/form-data");
        xmlhttp.send(data);
    }else{
        data.append("aid",aid);
        xmlhttp.open("POST","main/order_success.php",true);
        //xmlhttp.setRequestHeader("Content-type","multipart/form-data");
        xmlhttp.send(data);
    }
}
