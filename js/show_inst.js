function show_inst_brand(){
	document.getElementById("inst_harddisk").style.display="none";
	document.getElementById("inst_cpu").style.display="none";
    document.getElementById("inst_ram").style.display="none";
    document.getElementById("inst_graphic").style.display="none";
	document.getElementById("inst_brand").style.display="";
}
function show_inst_cpu(){
	document.getElementById("inst_harddisk").style.display="none";
	document.getElementById("inst_ram").style.display="none";
    document.getElementById("inst_brand").style.display="none";
    document.getElementById("inst_graphic").style.display="none";
	document.getElementById("inst_cpu").style.display="";
}

function show_inst_ram(){
	document.getElementById("inst_harddisk").style.display="none";
	document.getElementById("inst_ram").style.display="none";
	document.getElementById("inst_cpu").style.display="none";
	document.getElementById("inst_graphic").style.display="none";
	document.getElementById("inst_ram").style.display="";

}
function show_inst_harddisk(){
	document.getElementById("inst_cpu").style.display="none";
    document.getElementById("inst_ram").style.display="none";
	document.getElementById("inst_brand").style.display="none";
	document.getElementById("inst_graphic").style.display="none";
	document.getElementById("inst_harddisk").style.display="";
}
function show_inst_graphic(){
	document.getElementById("inst_cpu").style.display="none";
    document.getElementById("inst_ram").style.display="none";
	document.getElementById("inst_brand").style.display="none";
	document.getElementById("inst_harddisk").style.display="none";
	document.getElementById("inst_graphic").style.display="";
}
function show_big_img(t){
	var x = document.getElementById("big_img");
	var h="<div id=\"mask\" onclick=\"hide_img()\"><img src=\"main/images/"+t+".jpg\"></img></div>";
	x.innerHTML=h;
	x.style.display="";
}
function hide_img(){
	document.getElementById("big_img").style.display="none";
}
