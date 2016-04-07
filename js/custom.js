
/* CUSTOM PARAMETERS */

/* ==================================  GLOBAL  ==================================== */

			var main_color = "169fe6"; // Orange: This is global main color for your template.
			
			var page_background_color = "e6e6e6"; // Light Grey: This is the page background color for your template.
			
			var Heading_Font = "Roboto"; // thats your special Heading font
			
			var Site_Font = "Roboto"; // thats your special body content font
			
			var body_texture = "/wp-content/themes/novachallenge/img/body-bg1.png"; // Change body texture here over the slideshow e.g. body-bg1.png, body-bg2.png, body-bg3.png, body-bg4.png
			
			
/* ================================  REGISTER FORM  =================================== */
			
	/* SET REGISTER FORM SUCCESS MESSAGE */
	
			var submitMessage = "Your form has been submitted successfully.";
			
			var successParagraph = "We'll respond to your message within 24 hours. <br> Please call <b>123.456.789</b> for any urgent queries. Thank You!";
			
			var successBoxColor = "f9ffef"; // Background color for the success box
			
			var successBoxBorderStyle = "solid"; // Border Style  -  Example: solid, dotted, dashed, double
			
			var successBox_Border_Color = "bede8f"; // Border color for success box
			
			var textColor = "7a994c"; // text color for success box
			
/* ================================  BACKGROUND SLIDESHOW  =================================== */
			
			$.backstretch([
			
			  // you can additional images in here with comma separated values			 
			 'http://www.kstatecollegian.com/wp-content/uploads/2013/12/a82dab0b-11ed-42fc-ab97-76be6476df0c.jpg',
			 'http://www.washingtonpost.com/rf/image_606w/2010-2019/WashingtonPost/2013/02/24/Sports/Images/sp-vahoops-141361677450.jpg',
			 'http://www.loudountimes.com/images/uploads/s_lv_pf_basketball_01web.jpg',
			 //"/wp-content/themes/novachallenge/img/slider/usa.jpg",
			  //"/wp-content/themes/novachallenge/img/slider/soldier3.jpg",
			  //"/wp-content/themes/novachallenge/img/slider/mj.jpg",
			  //"/wp-content/themes/novachallenge/img/slider/kb.jpg",
			  //"/wp-content/themes/novachallenge/img/slider/bball2.jpg",			  
			  
			  ], {
				fade: 1000,
				duration: 7000
			});		
			
/* ================================  REPLACE GOOGLE FONT CODE HERE  =================================== */

// Google Web Fonts

WebFontConfig = {
    google: { families: [ 'Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic:latin'] }
  };
  (function() {
    var wf = document.createElement('script');
    wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
      '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
    wf.type = 'text/javascript';
    wf.async = 'true';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(wf, s);
  })();
 