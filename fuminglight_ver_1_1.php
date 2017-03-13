<?

/*
		F u m i n g   L i g h t
----------------------------------------------
	Small but powerful web photo gallery
	Ver 1.1 - 2016.10.06
----------------------------------------------		
Copyright (c) 2012, Vincenzo D'Innella Capano
All rights reserved.

Redistribution and use in source and binary forms, with or without
modification, are permitted provided that the following conditions are met:
1. Redistributions of source code must retain the above copyright
   notice, this list of conditions and the following disclaimer.
2. Redistributions in binary form must reproduce the above copyright
   notice, this list of conditions and the following disclaimer in the
   documentation and/or other materials provided with the distribution.
3. All advertising materials mentioning features or use of this software
   must display the following acknowledgement:
   This product includes software developed by Vincenzo D'Innella Capano.
4. Neither the name of  Vincenzo D'Innella Capano nor the
   names of its contributors may be used to endorse or promote products
   derived from this software without specific prior written permission.

THIS SOFTWARE IS PROVIDED BY VINCENZO D'INNELLA CAPANO  ''AS IS'' AND ANY
EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
DISCLAIMED. IN NO EVENT SHALL VINCENZO D'INNELLA CAPANO BE LIABLE FOR ANY
DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES
(INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND
ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
(INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.

*/

/*
Changelog:
			Ver 1.1 - 2016.10.06
			+ added vertical resize (scale) of the image for portrait images: 
			The function kicks either on resize or when a new photo is loaded
*/

// ======================================= Configuration ========================================= //

$relative_gallery_path = 'images';
$description_file='info.ini';



// ======================================= End of Configuration ================================= //
if ($_REQUEST[gal] !='') {
$gallery=$_REQUEST[gal];
}
if ($_REQUEST[id] !='') {
$pn=$_REQUEST[id];
$photoextention=$_REQUEST[ty];
if($photoextention=="a") {
	$photoname=$pn.".jpg";
	$photonameThumbnail=$pn."_tn.jpg";
	} else {
	$photoname=$pn.".jpeg";
	$photonameThumbnail=$pn."_tn.jpg";
	}
$GalleryPath = $relative_gallery_path."/".$gallery."/";
$PathPhotoToLoad=$GalleryPath.$photoname;
$direct_to_photo="sPhoto('web','$PathPhotoToLoad','0');"; 
}
$sname =  $_SERVER[SERVER_NAME];
$pathinfo =  pathinfo($_SERVER[PHP_SELF]);
$metalink = "http://".$sname.$pathinfo['dirname']."fuming_ligh.php";
?>



<HTML>
<HEAD>
<title> Fuming Light | Small but powerful image gallery</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="image_src" href="<?echo $metalink.$GalleryPath."thumbs/".$photonameThumbnail?>" />
	<meta name="image_thumb_src" href="<?echo $metalink.$GalleryPath."thumbs/".$photonameThumbnail?>" />
	<link rel="image_src" href="<?echo $metalink.$GalleryPath."thumbs/".$photonameThumbnail?>" />
	<meta property="og:image" content="<?echo $metalink.$GalleryPath."thumbs/".$photonameThumbnail?>" />
	
 <STYLE type="text/css">
   BODY {font-family:Verdana,Arial; font-size:12px;color:#919191;}
   BODY.Dark {font-family:Verdana,Arial; font-size:12px;color:#919191;background:#3f3f3f;}
   DIV.Boxes {float:left;width:200px;height:200px;border:0px dotted grey; border-radius:6px; box-shadow:2px 2px 4px #aaa;background:#fafafa;margin:10px 15px 5px; padding:25px 2px 0;text-align:center;}
   DIV.Boxes:HOVER {background:#DFDFDF; box-shadow:4px 4px 9px #aaa;cursor:pointer;}
   DIV.BoxesSmall {float:left;width:170px;height:170px;border:0px dotted grey; border-radius:5px; box-shadow:2px 2px 4px #aaa;background:#f8f8f8;margin:10px 15px 5px; padding:20px 2px 0;text-align:center;}
   DIV.BoxesSmall:HOVER {background:#DFDFDF;cursor:pointer;}
   DIV.ThumbContainer{position:relative; float:left;padding:7px 5px 7px 40px; margin:10px; border-top:1px solid #f8f8f8;}
   DIV.GalleryCover{float:left;margin:-25px 20px 10px -10px;width:120px;height:120px;border:3px solid white;border-radius:7px;background:#EFEFEF;text-align:center;padding:9px;}
   DIV.GalleryCoverContainer {float:left;border:0px dotted grey; text-align:center;width:270px;height:300px}
   DIV.GalleryTitleContainer {float:left;width:200px;max-heigth:60px;font-size:12px;background:white;border-radius:4px;opacity:0.8; box-shadow:2px 2px 4px #888 inset; padding:5px;margin:5px 15px 5px;}
   DIV.GalleryTitleContainerSmall {float:left;width:160px;max-heigth:60px;font-size:12px;background:white;border-radius:4px;opacity:0.8; box-shadow:2px 2px 4px #888 inset; padding:5px;margin:5px 15px 5px;}
   DIV.GalleryTitle{padding:7px 5px 7px; margin:20px; border:0px solid black; min-width:30%;width:87%; height:120px; background:#EFEFEF;}
   DIV.sphoto {display:none;float:left;width:70%;min-height:300px;border:1px solid white;  border-radius:12px; box-shadow: 3px 3px 7px grey; background:#DFDFDF;padding:10px;margin:20px 5% 4% 10%; overflow:hidden}
   DIV.SocialFooter {float:left;height:30px;border:0px dotted grey;padding:5px  0 5px 3%; margin:5px 2% 5px 10%; line-height:12px;display:none;}
   SPAN.DirectLink{color:#A9D0F5;cursor:pointer;}
   SPAN.DirectLink:HOVER {color:orange;cursor:pointer;}
   SPAN.SocialLink {color:grey}
   DIV.ClosePhotoDiv{float:right;width:80px;height:30px;margin:0px;background:#DaDaDa; border-radius:4px; text-align:center;line-height:30px;}
   DIV.ClosePhotoDiv:HOVER {color:orange; box-shadow: 0 0 5px #a9a9a9;cursor:pointer;}
   A {color:black;text-decoration:none;cursor:pointer;}
   A:HOVER {color: orange;}
   IMG.Thumbs { max-width: 150px; max-height: 150px; border:1px solid #d8d8d8;border-radius:6px; }
   IMG.Galleries { max-width: 170px; max-height: 150px;border-radius:6px;}
   .IMG.LargePhoto{ max-width: 100%; max-height: 100%;} 
   </STYLE>



<script>
/*
		F u m i n g   L i g h t
----------------------------------------------
	Small but powerful web photo gallery
----------------------------------------------		
Copyright (c) 2012, Vincenzo D'Innella Capano
All rights reserved.

Redistribution and use in source and binary forms, with or without
modification, are permitted provided that the following conditions are met:
1. Redistributions of source code must retain the above copyright
   notice, this list of conditions and the following disclaimer.
2. Redistributions in binary form must reproduce the above copyright
   notice, this list of conditions and the following disclaimer in the
   documentation and/or other materials provided with the distribution.
3. All advertising materials mentioning features or use of this software
   must display the following acknowledgement:
   This product includes software developed by Vincenzo D'Innella Capano.
4. Neither the name of  Vincenzo D'Innella Capano nor the
   names of its contributors may be used to endorse or promote products
   derived from this software without specific prior written permission.

THIS SOFTWARE IS PROVIDED BY VINCENZO D'INNELLA CAPANO  ''AS IS'' AND ANY
EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
DISCLAIMED. IN NO EVENT SHALL VINCENZO D'INNELLA CAPANO BE LIABLE FOR ANY
DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES
(INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND
ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
(INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
*/

var AvailWidth='';
var AvailHeight='';
var DelayOnResize=350;
var VisitedThumbs="#D7D7D7"; //#D7D7D7
var LastThumbClickColor="#E6E2DC"; //#E6E2DC
var LastThumbClick="";
var PageBgOnLargePhoto="#f8f8f8"; //f8f8f8
var ApplyShadow="yes";
var ShowDirectLinkToPhoto="yes";



function BoxesToBoxesSmall(){
	var elements = document.getElementsByTagName("div");
    for(z=0;z<elements.length;z++){
      if(elements[z].getAttribute("class") == 'Boxes'){
      var myid=elements[z];
	  elements[z].className = "BoxesSmall";

      }
	  if(elements[z].getAttribute("class") == 'GalleryTitleContainer'){
      var myid=elements[z];
	  elements[z].className = "GalleryTitleContainerSmall";
      }
    }
}

function BoxesSmallToBoxes(){
	var elements = document.getElementsByTagName("div");
    for(z=0;z<elements.length;z++){
      if(elements[z].getAttribute("class") == 'BoxesSmall'){
      var myid=elements[z];
	  elements[z].className = "Boxes";
      }
	  if(elements[z].getAttribute("class") == 'GalleryTitleContainerSmall'){
      var myid=elements[z];
	  elements[z].className = "GalleryTitleContainer";
      }
    }
}



function GetSize(){
AvailWidth = window.innerWidth;
AvailHeight = window.innerHeight;
//document.getElementById('width').innerHTML=AvailWidth;
//document.getElementById('height').innerHTML=AvailHeight;
	if (AvailWidth<=1023){
	BoxesToBoxesSmall();
	} else BoxesSmallToBoxes();
}

function GetSizeDelay(){
setTimeout(function(){
	GetSize();
	/* VDC: added if statement below 06.10.2016*/
	if (document.getElementById('IMGLarge')){
		var img = document.getElementById('IMGLarge');
		setLargeSize(img);
	}
},DelayOnResize);
}

function setLargeSize(img) {
	if (AvailWidth>>0){
	var minAvail=AvailWidth-(AvailWidth/3);
	var minAvailH=AvailHeight-(AvailHeight/3);
	if (minAvail >=1200) minAvail=1200; // do not stretch images over 1200
		img.style.maxWidth=minAvail+"px";
		}
	
	if (AvailHeight<=670){ // For screens with limited vertical size, load a smaller version of the photo (400px)
		document.getElementById('IMGLarge').style.maxHeight="400px";
		} 
		/* VDC: added else below 06.10.2016*/
		else {
			document.getElementById('IMGLarge').style.maxHeight=minAvailH+"px";
		}
}

function sPhoto(onoff,fileis,fromdiv,tolink){
var permealink = tolink;
if (onoff == 'on') {

// Prepare for the next button
var blocknumber = +fromdiv.replace('block','');
var nextfromdiv = blocknumber +1;
nextfromdiv = "block"+nextfromdiv;
if (document.getElementById(nextfromdiv)) {
	var nextPhoto = document.getElementById(nextfromdiv).getAttribute('onclick');
	} else {
		nextfromdiv = "block2";
		nextPhoto = document.getElementById(nextfromdiv).getAttribute('onclick');
	} 
	
var prevfromdiv = blocknumber -1;
prevfromdiv = "block"+prevfromdiv;
if (document.getElementById(prevfromdiv)) {
	var prevPhoto = document.getElementById(prevfromdiv).getAttribute('onclick');
	} else {
		prevfromdiv = "block2";
		prevPhoto = document.getElementById(prevfromdiv).getAttribute('onclick');
	} 
	//alert(prevPhoto);
	
 var NextPhotoString=nextPhoto.match(/\((.*)\)/i);

// end next button
	
	if (LastThumbClick !='') {
	document.getElementById(LastThumbClick).style.background=VisitedThumbs;
	LastThumbClick=fromdiv;
	} else LastThumbClick=fromdiv;
	
	document.getElementById('sphoto').style.display="inline";
	
	document.getElementById(LastThumbClick).style.background=LastThumbClickColor;
	document.getElementById('container').style.display="none";
	document.body.style.background=PageBgOnLargePhoto;
	window.scrollTo(0,0);
	var img = document.createElement("IMG"); // Create the image element dynamically
	img.id="IMGLarge";
	img.setAttribute("onclick","sPhoto('off');"+nextPhoto);
	img.src=fileis;
	img.style.maxWidth="700px";
	document.getElementById('LargePhoto').appendChild(img);
	
	var DivNextPhoto = document.createElement("DIV"); //Step to the next photo
	DivNextPhoto.id="NextPhoto";
	DivNextPhoto.setAttribute("Class","ClosePhotoDiv");
	DivNextPhoto.setAttribute("onclick","sPhoto('off');"+nextPhoto);
	DivNextPhoto.setAttribute("style","float:right;");
	document.getElementById('fotofooter').appendChild(DivNextPhoto);
	document.getElementById('NextPhoto').innerHTML="Next";
	
	var DivClosePhoto = document.createElement("DIV"); // Create the image element dynamically
	DivClosePhoto.id="ClosePhoto";
	DivClosePhoto.setAttribute("onclick","sPhoto('off');"+prevPhoto);
	DivClosePhoto.setAttribute("Class","ClosePhotoDiv");
	DivClosePhoto.setAttribute("style","float:left;");
	DivClosePhoto.style.float="left";
	document.getElementById('fotofooter').appendChild(DivClosePhoto);
	document.getElementById('ClosePhoto').innerHTML="Prev.";
	
	//alert(nextPhoto);
	//document.getElementById('sphoto').onClick=function(){
	//										sPhoto(nextPhoto); //NEW
	//										};
	GetSize();
	setLargeSize(img);
	if (ShowDirectLinkToPhoto =="yes"){ // Display link if enabled
		document.getElementById('DirectLink').innerHTML="[+] Direct link";
		document.getElementById('DirectLink').onclick=function()
		{
		document.getElementById('DirectLink').innerHTML="Direct link";
				document.getElementById('SocialLink').innerHTML=permealink;
				}
		document.getElementById('socialfooter').style.display="inline";
		}
	} 
if (onoff == 'off') {
	var img = document.getElementById('IMGLarge');
	document.getElementById('LargePhoto').removeChild(img);
	var DivNextPhoto = document.getElementById('NextPhoto');
	document.getElementById('fotofooter').removeChild(DivNextPhoto);
	var DivClosePhoto = document.getElementById('ClosePhoto');
	document.getElementById('fotofooter').removeChild(DivClosePhoto);
	
	document.body.style.background = "";
	document.getElementById('container').style.display="inline";
	document.getElementById('sphoto').style.display="none";
	document.getElementById('socialfooter').style.display="none";
	document.getElementById('SocialLink').innerHTML="";
	document.getElementById(LastThumbClick).background=LastThumbClickColor;
	}
if (onoff == 'web') { // load the photo directly from a link (useful to share the photo on the web & SEO optimizations)
	document.getElementById('sphoto').style.display="inline";
	document.getElementById('container').style.display="none";
	document.body.style.background=PageBgOnLargePhoto;
	window.scrollTo(0,0);
	var img = document.createElement("IMG"); // Create the image element dynamically
	img.id="IMGLarge";
	//img.className="LargePhoto";
	img.src=fileis;
	img.style.maxWidth="700px";
	document.getElementById('LargePhoto').appendChild(img); 
	document.getElementById('sphoto').onclick=function(){window.location.href="?gal=<?echo $gallery;?>";return false;};
	GetSize();
	setLargeSize(img);
	
	}	
	
	
	
}
</script>


</HEAD>

<BODY onload="GetSize();<?echo $direct_to_photo?>" onresize="GetSizeDelay();">


<SPAN style="float:left;top:2px;left:2px; margin:2px 70px; font-size:13px;color:#231D15"><strong>FumingLight </strong>   &nbsp;<font color="grey"> </font> <BR><font color="#4887E0" size="1">Small but powerful image gallery</font></SPAN>

<!-- Insert navigation if required
<SPAN style="float:right;top:2px;left:2px; margin:2px 10%; font-size:13px;color:grey"> 

<font color="#4887E0">Home</font> | 
<a href="portfolio.php"><font color="#4887E0">Portfolio</font></a>  | 
<a href="bio.php"><font color="#4887E0">Bio</font></a> | 
<a href="contacts.php"><font color="#4887E0">Contacts</font> </a> 
</SPAN>
-->
<BR><BR><BR>
<DIV style="clear: both"></DIV>
<!-- <DIV ID="sphoto" class="sphoto"  onclick="sPhoto('off');">-->
	<DIV ID="sphoto" class="sphoto">
	    <DIV ID="CloseSphoto" class="ClosePhotoDiv" onclick="sPhoto('off');">Close</DIV>
		<DIV ID="LargePhoto" style="position:relative;min-height:400px;margin:45px 16px 10px 16px;color:#e8e8e8;text-align:center;"></DIV>
		<DIV ID="prefotofooter" style="clear:both; text-align:center;"><SPAN ID="CopyrightOnPhoto" Style="clear:both;">Copyrighted Content - All rights reserved<br></SPAN></DIV>
		<DIV ID="fotofooter" style="width:99%;margin:auto;height:60px"></DIV>
	</DIV>
	
<DIV id="container" class="ThumbContainer">


<?
$dir = $relative_gallery_path.'/';
if (!$gallery) {
$files1 = scandir($dir);
$counter=count($files1);
} else
{
$dir .= $gallery.'/';
$thumbs = $dir."thumbs/";
$files1 = scandir($dir);
$counter=count($files1);
if (!is_dir($thumbs)) { // Generate a thumbnail directory if it doesn't exists
	mkdir($thumbs);
	} 
}

if ($gallery) {
$GalleryCover="<DIV id='GalleryCover' class='GalleryCover'></DIV>";
if (is_file($dir.$description_file))	{
	$info_array=parse_ini_file($dir.$description_file);
	if ($info_array[cover])$cover=$info_array[cover];
}
?>
<DIV ID="GalleryTitle" CLASS="GalleryTitle" style="font-size:17px;"> <?echo $GalleryCover;?>
<SPAN style="float:right; font-size:10px;color:#a9a9a9; margin-right:25px;"><a href='?gal'>-&nbsp;Back&nbsp;-</a></SPAN>
<?echo $info_array[title]?></DIV>
<?}?>
<DIV  style="clear:both"></DIV>
<?

	if (is_file($dir.$cover))	{
			$addcover .= "<SCRIPT>";
			$addcover .="document.getElementById('GalleryCover').innerHTML='<IMG SRC=\"$dir$cover\" style=\"max-width: 120px; max-height: 120px;border-radius:4px;\">'";
			$addcover .="</SCRIPT>";
			echo $addcover;
	}

for ($a=0;$a<=$counter-1;$a++) {
	$thumbnailsize=array();
	$filename=array();
	$size=array();	
	$toprint= $files1[$a];
	$fileis=$dir.$files1[$a];
	$set_cover="";
	$gallery_cover="";
	$filenameExt="";
	$tolink="";
	//$ExIF="";
	if ((is_file($fileis)) && (preg_match("/[\.jpg$][\.jpeg$]/i", $files1[$a],$match))) { // Applies when $fileis it's a file and has .jpg or .jpeg extension
	$filename=pathinfo($fileis,PATHINFO_FILENAME);
	$filenameExt=pathinfo($fileis,PATHINFO_EXTENSION);
		if($filenameExt!="jpg") { // set $filenameExt equals to "a" unless different than jpg
		$filenameExt="b";
		} else $filenameExt="a";
	
	$thumbnailis=$thumbs.$filename."_tn.jpg";
	$thumbyes="yes";
	$tolink = $metalink."?gal=".$gallery."&id=".$filename."&ty=".$filenameExt;
	if (!is_file($thumbnailis)) { // create thumbnail if it doesn't exist
		$thumbyes="no";
		$width = 200;
		$height = 200;
		// Get new dimensions
		list($width_orig, $height_orig) = getimagesize($fileis);
		$ratio_orig = $width_orig/$height_orig;
		if ($width/$height > $ratio_orig) {
		   $width = $height*$ratio_orig;
		} else {
		   $height = $width/$ratio_orig;
		}
		$image_p = imagecreatetruecolor($width, $height);
		$image = imagecreatefromjpeg($fileis);
		imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);

		// Output
		imagejpeg($image_p, $thumbnailis, 75);
		} else {
		$thumbnailsize=getimagesize($thumbnailis);
		$ExIF=exif_read_data($fileis,0);
		}
	
	$size = getimagesize($fileis);
	$orientation="landscape";
	if ($size[1] > $size[0]) $orientation="portrait";
	$toprint .=" x:".$size[0]." y:".$size[1]." orientation: ".$orientation." Thumbnail exists? ".$thumbyes."<BR>";
		if (!$pn){
	?>
	<DIV ID='<?echo "block".$a;?>' class='Boxes' onclick='sPhoto("on","<?echo $fileis?>","block<?echo $a?>","<?echo $tolink?>");'><IMG SRC="<?echo $thumbnailis?>" alt="Thumbnail" class="Thumbs"><DIV id="ThmbTitle" style="max-width: 100%; text-align: center; margin-top: 5px; padding: 10px;font-size:11px;"></DIV></DIV>
	<?
		}
	} // close if (!is_file($thumbnailis))
	$description="";
	$info_array=array();
	$gallery_title="";
	if ((!$gallery) && (is_dir($fileis))&& ($fileis !=$dir.'..') && ($fileis !=$dir.'.')) { // List subfolder as galleries only when these are directories and when no individual gallery is specified
	if (is_file($fileis."/".$description_file))	{ // Read and print the description file if present
		$info_array=parse_ini_file($fileis."/".$description_file);
		if ($info_array[cover])$cover=$info_array[cover];
		$gallery_cover=$fileis."/".$cover;
		if (is_file($gallery_cover)) {
		//$set_cover="style=\"background-image:url('$gallery_cover');background-repeat:no-repeat;background-size:cover;-o-background-size:cover;-webkit-background-size:cover;-moz-background-size:cover\"";
		}
		$gallery_title=$info_array[title];
		if ($gallery_title=="") $gallery_title="Gallery";
	} else {
	//$GalleryNr=$a-1;
	$gallery_title="Gallery ";
	}
	//echo $files1[$a];
	?>
	<DIV ID="GalleryCoverContainer" class="GalleryCoverContainer">
	<DIV ID='<?echo "block".$a;?>' class='Boxes' <?echo $set_cover?> onclick='window.location.href="?gal=<?echo $toprint;?>";return false;'> <? if ($gallery_cover){?><IMG SRC="<?echo $gallery_cover?>" class="Galleries"><?}?></DIV>
	<DIV ID="GalleryTitleContainer" class="GalleryTitleContainer"><?echo $gallery_title;?></DIV>
	</DIV>
	<?
	continue;
	}
	
} // closes main for loop
?>

</DIV>

<DIV ID="prefooter" style="clear: both">
</DIV>
<DIV ID="socialfooter" class="SocialFooter"><SPAN ID="DirectLink" class="DirectLink"></SPAN><BR><BR>
<SPAN ID="SocialLink" class="SocialLink"></SPAN>
</DIV>


<DIV ID="footer" style="float:left;width:49%;height:30px;border-top:1px dashed #D9D9D9;padding:5px 0 0 40%; margin:2%;"><font color=white>Width: <span id="width"></span>&nbsp;&nbsp;- Height: <span id="height"></span></font>
<SPAN style="float:right; font-size:10px;color:#a9a9a9; margin-right:25px;">Gallery powered by <a href="http://www.fumingbox.com/fl">FumingLight</a></SPAN>

</DIV>
</BODY>
</HTML>
