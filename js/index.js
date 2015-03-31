$(function(){
	var scroller=$('#intro_scroll');
	var cury=24;
	scroller.css('top',cury+"px");
	m_height=$('.movingTarget').height()+20;
	var fully=24-m_height*4+20;
	var c=0;
	var l=0;
	function doscroll(){
		if(c>200){
			c=0;
		}else if(c>16&&c<200){
			ury=24-(m_height+1)*(l-1);
			scroller.css('top',cury+"px");
			c=c+1;
		}else if(c==16){
			l=l+1
			if(l>4){
				l=1;
			}
			cury=24-(m_height+1)*(l-1);
			scroller.css('top',cury+"px");
			c=c+1;
		}else{
			cury=cury-(m_height+1)/2;
		    if(cury<fully){
			    cury=24;
		    }
		    scroller.css('top',cury+"px");
		    c=c+1;
		}
	};
	var sinter=setInterval(function(){doscroll()},30);
});