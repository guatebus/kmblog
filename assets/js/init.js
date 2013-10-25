/* Copyright 2013 HTML5 Rocks modified by Alejandro Bustamante

Licensed under the Apache License, Version 2.0 (the "License");
you may not use this file except in compliance with the License.
You may obtain a copy of the License at

    http://www.apache.org/licenses/LICENSE-2.0

Unless required by applicable law or agreed to in writing, software
distributed under the License is distributed on an "AS IS" BASIS,
WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
See the License for the specific language governing permissions and
limitations under the License. */

/* Normalized hide address bar for iOS & Android (c) Scott Jehl, scottjehl.com MIT License */
(function(a){var b=a.document;if(!location.hash&&a.addEventListener){window.scrollTo(0,1);var c=1,d=function(){return a.pageYOffset||b.compatMode==="CSS1Compat"&&b.documentElement.scrollTop||b.body.scrollTop||0},e=setInterval(function(){if(b.body){clearInterval(e);c=d();a.scrollTo(0,c===1?0:1)}},15);a.addEventListener("load",function(){setTimeout(function(){if(d()<20){a.scrollTo(0,c===1?0:1)}},0)})}})(this);

/*! A fix for the iOS orientationchange zoom bug. Script by @scottjehl, rebound by @wilto.MIT License.*/
(function(m){var l=m.document;if(!l.querySelector){return}var n=l.querySelector("meta[name=viewport]"),a=n&&n.getAttribute("content"),k=a+",maximum-scale=1",d=a+",maximum-scale=10",g=true,j,i,h,c;if(!n){return}function f(){n.setAttribute("content",d);g=true}function b(){n.setAttribute("content",k);g=false}function e(o){c=o.accelerationIncludingGravity;j=Math.abs(c.x);i=Math.abs(c.y);h=Math.abs(c.z);if(!m.orientation&&(j>7||((h>6&&i<8||h<8&&i>6)&&j>5))){if(g){b()}}else{if(!g){f()}}}m.addEventListener("orientationchange",f,false);m.addEventListener("devicemotion",e,false)})(this); 

(function(w){
	var sw = document.body.clientWidth,
		sh = document.body.clientHeight,
		breakpoint = 650,
		speed = 800,
		mobile = true;
		
	$(document).ready(function() {
		checkMobile();
		setNav();
		setImg();
	});
		
	$(w).resize(function(){ //Update dimensions on resize
		sw = document.body.clientWidth;
		sh = document.body.clientHeight;
		checkMobile();
	});
	
	//Check if Mobile
	function checkMobile() {
		mobile = (sw > breakpoint) ? false : true;
		if (!mobile) { //If Not Mobile
			loadAux();
			$('.aux header a').addClass('disabled').addClass('open');
			$('[role="tabpanel"],#nav,#search').show(); //Show full navigation and search
		} else { //Hide 
			if(!$('#nav-anchors a').hasClass('active')) {
				$('#nav,#search').hide();
			}
		}
	}
	
	//Toggle navigation for small screens
	function setNav() {
		var $anchorLinks = $('#nav-anchors').find('a');
		$anchorLinks.click(function(e){
			e.preventDefault();
			var $this = $(this),
				thisHref = $this.attr('href');
			$('.reveal').hide();
			if($this.hasClass('active')) {
				$this.removeClass('active');
				$(thisHref).hide();
			} else {
				$anchorLinks.removeClass('active');
				$this.addClass('active');
				$(thisHref).show();
			}
		});
	}
	
})(this);