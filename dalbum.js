/*
	This file is a part of DAlbum.  Copyright (c) 2003 Alexei Shamov, DeltaX Inc.

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

var dalbum_imageErrors=new Array();

function dalbum_imageError(theImage)
{
	var v=theImage.src;

	for (var i=0;i<dalbum_imageErrors.length;++i)
	{
		if (dalbum_imageErrors[i]===theImage)
			return;
	}
	dalbum_imageErrors.push(theImage);
}

function dalbum_loadFailedImages()
{
	for (var i=0;i<dalbum_imageErrors.length;++i)
	{
		var v=dalbum_imageErrors[i].src;
		dalbum_imageErrors[i].src='';
		dalbum_imageErrors[i].src=v;
	}
}

var dalbum_prefetch_image;
var dalbum_prefetch_image_src;
var dalbum_tmp=new Image(); // to keep IE8 happy

function dalbum_prefetch(imgsrc)
{
	if (imgsrc.length>0 && document.getElementById)
	{
		dalbum_prefetch_image=new Image();

		// Find Image object and start prefetching once its loaded
  		if (document.getElementById("Image"))
  		{
  			dalbum_prefetch_image_src=imgsrc;
			if (document.getElementById("Image").complete)
			{
				dalbum_prefetch_image.src=dalbum_prefetch_image_src;
			}
			else
			{
				document.getElementById("Image").onload=new function(e) { dalbum_prefetch_image.src=dalbum_prefetch_image_src; document.getElementById("Image").onload=null;}
			}
		}
	}
}

function dalbum_setCustomFocus(objName)
{
    if (document.getElementById && document.getElementById(objName) && document.getElementById(objName).focus)
	{
		document.getElementById(objName).focus();
	}
}


function dalbum_writeFullScreen(buttonFullscreen, buttonClose)
{
	if (window.name=='fullscreen' || window.name=='popup')
		document.write(buttonClose);
	else
		document.write(buttonFullscreen);
}

function dalbum_writeRotateButton(button)
{
	if (document.body && document.body.filters)
	{
		document.write(button);
	}
}

function dalbum_addRotateStyle(objName,rotation)
{
	if (document.getElementById && document.getElementById(objName))
	{
		if (document.getElementById(objName).filters &&
			document.getElementById(objName).filters['DXImageTransform.Microsoft.BasicImage'])
		{
			document.getElementById(objName).filters['DXImageTransform.Microsoft.BasicImage'].enabled=1;
			document.getElementById(objName).filters['DXImageTransform.Microsoft.BasicImage'].rotation=rotation;
		}

		if (document.getElementById(objName).filters &&
			document.getElementById(objName).filters.item['DXImageTransform.Microsoft.BasicImage'])
		{
			document.getElementById(objName).filters.item['DXImageTransform.Microsoft.BasicImage'].enabled=1;
			document.getElementById(objName).filters.item['DXImageTransform.Microsoft.BasicImage'].rotation=rotation;
		}

	}
}


function dalbum_fullScreen()
{
	var agt=navigator.userAgent.toLowerCase();
   	var is_ie   = (agt.indexOf("msie") != -1);
	var features;
	if (is_ie)
	{
	 	features="fullscreen=yes";
	}
	else
	{
		features="toolbar=0,scrollbars=1,location=0,border=0,status=0,menubar=0,";
		features=features + 'outerHeight=' + screen.availHeight + ',outerWidth=' + (screen.availWidth-2);
	}
	var w=window.open(location.href,'fullscreen',features);
	if (w!=null)
	{
		if (!is_ie && screen.availLeft!=null && screen.availTop!=null)
			w.moveTo(screen.availLeft,screen.availTop);
		w.focus();
	}
}

function dalbum_setHideFocus()
{
	var agt=navigator.userAgent.toLowerCase();
	var is_ie   = (agt.indexOf("msie") != -1);
	var is_opera   = (agt.indexOf("opera") != -1);

	if (!is_opera && document.links.length > 0)
	{
	  for (i=0;i<document.links.length;i++)
	  {
		 if (document.links[i].className=="buttonLink" && document.links[i].hideFocus!=null)
		 {
			document.links[i].hideFocus=true;
		 }
	  }
	}
}


function dalbum_firstFocus()
{
	// If hash  - do not set control
	if (window.location.hash.toString().length>0)
		return;

	if (document.forms.length > 0)
	{
	  	var TForm = document.forms[0];
	  	for (i=0;i<TForm.length;i++)
	  	{
			 if ((TForm.elements[i].type=="text")||
				(TForm.elements[i].type=="select") ||
				(TForm.elements[i].type=="password") ||
			    (TForm.elements[i].type=="textarea")||
			    (TForm.elements[i].type.toString().charAt(0)=="s"))
			 {
			 	document.forms[0].elements[i].focus();
				break;
			 }
	  }
	}
}

function dalbum_followLink(a)
{
	if (a.target.length==0)
		window.location.href=a.href;
}

function dalbum_objectDisplay (obj) {
        var displayLine;
        for (var prop in obj) {
               displayLine = obj.name + "." + prop + " = " + obj[prop];
               document.write(displayLine + "<BR>")
        }
        document.write("End of object " + obj.name)
}
var dalbumShowImagePage =
{
	pageTableObject : null,
	imageObject : null,
	imagePlaceholder : null,
	imageWrap : null,
	imageWidth : 0,
	imageHeight : 0,
	method : "",
	rotate: 0,
	origWidth :0,
	origHeight :0,


	getWindowHeight : function()
	{
		if (document.body && document.body.clientHeight)
			return document.body.clientHeight;
		if (window.innerHeight)
			return window.innerHeight;
		if (document.documentElement && document.documentElement.clientHeight)
			return document.documentElement.clientHeight;

		return -1;
	},

	getWindowWidth : function()
	{
		if (document.body && document.body.clientWidth)
			return document.body.clientWidth;
		if (window.innerWidth)
			return window.innerWidth;
		if (document.documentElement && document.documentElement.clientWidth)
			return document.documentElement.clientWidth;

		return -1;
	},

	onResize : function()
	{
		if (this.pageTableObject!=null && this.getWindowHeight()!=-1)
			this.pageTableObject.style.height=this.getWindowHeight();
	},

	resizeImage : function()
	{
		if (this.imageObject!=null &&
			this.imagePlaceholder!=null &&
			this.pageTableObject!=null	)
		{

   			//
  			if (this.method=='noresize' || this.method=="" || this.method==null)
   				return;

   			// get document body client height
			var maxY=this.getWindowHeight();
			var maxX=this.getWindowWidth();

			if (maxY==-1 || maxX==-1)
			{

				return;
			}

			// calculate maximum boundaries for showImgPane
			var footerHeight=(this.pageTableObject.offsetHeight-this.imagePlaceholder.offsetHeight-this.imagePlaceholder.offsetTop);

			maxY=maxY - this.imagePlaceholder.offsetTop - footerHeight;

            // reduce the boundaries by the amount of extra code around the  image
			// (such as exif details, borders etc.)
			var imageWrapX=this.imageWrap.offsetWidth;
    		var imageWrapY=this.imageWrap.offsetHeight;


    		// Here goes a HACK to make it work in Konqueror and, quite likely, Safari
    		if (imageWrapX-0<=0)
    		{

    			// Our ImageWrap points to table row.
    			if (this.imageWrap.offsetParent)
    			{
    				imageWrapX=this.imageWrap.offsetParent.offsetWidth;
    				imageWrapY=this.imageWrap.offsetParent.offsetHeight;
    			}
    		}


    		if (imageWrapX-0<=0 ||
    			imageWrapY-0<=0)
    		{

    			return;
    		}

    		var srcX=this.imageWidth;
    		var srcY=this.imageHeight;

			maxX-=(imageWrapX-srcX)+10;
			maxY-=(imageWrapY-srcY)+10;

			//
			if (this.method=='height_fit' ||
				this.method=='height_shrink' ||
				this.method=='height_expand')
				maxX*=50;

			// Now we have maximum image size in maxX,maxY
    		if (maxY>0 && maxX>0 && srcX>0 && srcY>0)
    		{
    			// calculate ratio and normalize it
            	var ratio= Math.min(maxX/srcX,maxY/srcY);
    			var f=ratio-Math.floor(ratio);

				// Resizing in steps, to remove artefacts
				/*
                if       (f>7/8) f=7/8;
                else if  (f>3/4) f=3/4;
                else if  (f>5/8) f=5/8;
				else if  (f>2/3) f=2/3;
				else if  (f>1/2) f=1/2;
				else if  (f>1/3) f=1/3;
				else if  (f>1/4) f=1/4;
				else f=0; */
				ratio=Math.floor(ratio)+f;

				if (ratio<0.1)
					ratio=0.1;


				if (this.method.indexOf('shrink')>=0 && ratio>1)
					return;

				if (this.method.indexOf('expand')>=0  && ratio<1)
					return;

				var destX = Math.floor(srcX*ratio+0.5);
				var destY = Math.floor(srcY*ratio+0.5);

/*				alert(
					"max="+maxX.toString() + "x" + maxY.toString() + "\n" +
	  				"src="+srcX.toString() + "x" + srcY.toString() + "\n" +
	  				"offsetTopLeft="+this.imageObject.offsetTop.toString() + "x" + this.imageObject.offsetLeft.toString() + "\n" +
    				"imageWrap="+imageWrapX.toString() + "x" + imageWrapY.toString() + "\n" +
    				"dest="+destX.toString() + "x" + destY.toString() + "\n" +
                     				  				"");//*/

				// Change image size
				if (this.rotate%2)
				{
					this.imageObject.width=destY;
					this.imageObject.height=destX;
				}
				else
            	{
					this.imageObject.width=destX;
					this.imageObject.height=destY;
				}

			}
		}
	}
};

function dalbum_showimg_resize(pageTableName,imageName,imagePlaceholder,imageWrap,width,height,method)
{
	if (document.getElementById && document.getElementById(pageTableName))
 	{

		// We DO NOT support Mozilla below 1,0
 		if (navigator.userAgent.indexOf("Gecko")!=-1)
 		{
			var n=navigator.userAgent.indexOf("rv:");
			if (n!=-1)
			{
				var v=parseFloat(navigator.userAgent.substring(n+3));
				if (v<1.0)
					return;
			}
 		}
		dalbumShowImagePage.pageTableObject=document.getElementById(pageTableName);

		var nRot=0;
		if (imageName!=null && imageName!="")
		{
			dalbumShowImagePage.imageObject=document.getElementById(imageName);
			dalbumShowImagePage.imagePlaceholder=document.getElementById(imagePlaceholder);
			dalbumShowImagePage.imageWrap=document.getElementById(imageWrap);
			dalbumShowImagePage.method=method;

			var image=dalbumShowImagePage.imageObject;
			if (image &&
				image.filters &&
				image.filters.item['DXImageTransform.Microsoft.BasicImage'] &&
				image.filters.item['DXImageTransform.Microsoft.BasicImage'].enabled)
			{
				nRot=image.filters.item['DXImageTransform.Microsoft.BasicImage'].rotation;
			}
			dalbumShowImagePage.rotate=nRot;

			if (image)
			{
				if (nRot%2)
				{
					dalbumShowImagePage.imageWidth=height;
					dalbumShowImagePage.imageHeight=width;
				}
				else
				{
					dalbumShowImagePage.imageWidth=width;
					dalbumShowImagePage.imageHeight=height;
				}
			}
		}

		dalbumShowImagePage.resizeImage();

		dalbumShowImagePage.origWidth=dalbumShowImagePage.getWindowWidth();
		dalbumShowImagePage.origHeight=dalbumShowImagePage.getWindowHeight();

		if (nRot%2==0)
        {
        	dalbumShowImagePage.onResize();
			window.onresize= function(e)
			{
				window.onresize=null;
				if (dalbumShowImagePage.origWidth!=dalbumShowImagePage.getWindowWidth() ||
					dalbumShowImagePage.origHeight!=dalbumShowImagePage.getWindowHeight())
				{
					dalbumShowImagePage.origWidth=dalbumShowImagePage.getWindowWidth();
					dalbumShowImagePage.origHeight=dalbumShowImagePage.getWindowHeight();
					dalbumShowImagePage.onResize();

					if (navigator.userAgent.indexOf("Opera")==-1)
						setTimeout('window.location.reload();',2000);
				}

			}
		}
 	}
}
