<style type="text/css">
#media
{
	width:940;
	margin-left:10px;
	margin-right:10px;
	height:300px;
	overflow:hidden;
}
#film
{
	width:3760px;
	height:300px;	
}
.slide
{
	width:940px;
	height:300px;
	float:left;
}
</style>
<script src="Extensions/prettyPhoto_compressed_3.1.5/js/jquery.prettyPhoto.js">
</script>
<script type="text/javascript" src="Extensions/prettyPhoto_compressed_3.1.5/js/jquery-1.6.1.min.js">
</script>

<script type="text/javascript">

pic = 0;
function movepics()
{
	pic = pic + 1
	if (pic > 3)
	{
		pic = 0	
	}
	position = 940 * pic;
	$("#film").animate({marginLeft: "-" + position + "px"})
}

	function stopanimation()
	{
		clearInterval(myAnimation)
	}
	function startanimation()
	{
		myAnimation = setInterval("movepics()", 5000)
	}
	startanimation()
</script>
<!-- <div id="media" onmouseover="stopanimation()" onmouseout="startanimation()">
        <div id="film">
        	<div class="slide"><img src="Images/shopping_cart.png" width="940px" height="300px" /></div>
            <div class="slide"><img src="Images/Logo.png" /></div>
            <div class="slide"><img src="Images/gradient.jpg" /></div>
            <div class="slide"><img src="nightlife-q-c-940-300-9.jpg" /></div>
       </div>
</div>
-->
