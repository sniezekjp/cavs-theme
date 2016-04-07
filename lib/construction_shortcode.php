<?php

add_shortcode('construction', 'do_construction'); 
function do_construction($attrs, $content){
    extract( shortcode_atts( array(
    'id' => 'construction',
    ), $attrs ) );
    
    if($id != 'battle of nova' || !is_super_admin())
        return '<div class="tournament"><h1 class="center">Details coming soon...</h1>
        &nbsp; </div>'; 
    ob_start(); ?>
    
    <div class="battle-of-nova">
    <div class="bon-logo">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/battle-of-nova-logo.png" alt="" />
    </div>
    
    <br /><br />
    <div class="row">
        <h1 class="center">Compete against the best teams in Northern Virginia</h1>
    </div>
    
    <div class="row" style="margin-bottom: 40px;">
        <div class="four columns locations">
            <h3>Locations</h3>
            <p class="no-margin">Jackson MS</p>
            <p class="no-margin">McLean HS</p>
            <p class="no-margin">Woodson HS</p>
            <p class="no-margin">Falls Church HS</p>
            <p class="no-margin">South Lakes HS</p>        
        </div>
        <div class="six columns locations">
            <h3>Tournament Documents</h3>
            <p class="no-margin"><strong><em>Please download the files below.</em></strong></p>
            <p class="no-margin"><a href="#">»Welcome Letter</a></p>
            <p class="no-margin"><a href="#">»2013 Battle of NOVA Schedule</a></p>
            <p class="no-margin"><a href="#">»Battle of NOVA Rules</a></p>
        </div>
        <div class="five columns">
            <h3>Dates</h3>
            <p>June 7th - 8th</p>
            <p><a href="/tournament-registration" class="btn" style="margin-top: 20px;">Register Now</a></p>
        </div>
    </div>
    
    <div class="row">
        <h1 class="">2013 Battle of NOVA Summary</h1>
    </div>
    
    
    <h3>Thank you</h3>
    <p>Coaches and Teams,</p>
    
<p>    On behalf of the entire NOVA Cavaliers staff I would like to thank you for your participation in the Battle of NOVA 2013 Tournament. In two short days more than 55 teams played in more than 110 games across five different schools! For us the tournament was a tremendous success and couldn't have been possible without the participation of your organization. Please extend our thanks to your parents who took the time to stop by the donation table at each site, we hope that having an optional entry fee made the tournament easier on your families and friends to come watch their players; we greatly appreciate those who did choose to contribute.</p>
    
<p>    We wish your teams great success with the remainder of the 2013 AAU season and look forward to seeing you back next year for Battle of NOVA 2014!</p>
    
    <div class="t-images">
    <div class="row">
    <div class="three columns alpha"><a href="http://novacavaliers.com/wp-content/uploads/sites/13/2013/11/DSCN1196.jpg" rel="prettyPhoto[battle]"><img class="alignnone size-medium wp-image-1971" alt="DSCN1196" src="http://novacavaliers.com/wp-content/uploads/sites/13/2013/11/DSCN1196-300x225.jpg" width="300" height="225" /></a></div>
    <div class="three columns alpha">
        <a href="http://novacavaliers.com/wp-content/uploads/sites/13/2013/11/DSCN1122.jpg" rel="prettyPhoto[battle]"><img class="alignnone size-medium wp-image-1970" alt="DSCN1122" src="http://novacavaliers.com/wp-content/uploads/sites/13/2013/11/DSCN1122-300x225.jpg" width="300" height="225" /></a></div>
    <div class="three columns alpha"><a href="http://novacavaliers.com/wp-content/uploads/sites/13/2013/11/DSCN1079.jpg" rel="prettyPhoto[battle]"><img class="alignnone size-medium wp-image-1969" alt="DSCN1079" src="http://novacavaliers.com/wp-content/uploads/sites/13/2013/11/DSCN1079-300x225.jpg" width="300" height="225" /></a></div>
    <div class="three columns alpha"><a href="http://novacavaliers.com/wp-content/uploads/sites/13/2013/11/DSCN1061.jpg" rel="prettyPhoto[battle]"><img class="alignnone size-medium wp-image-1968" alt="DSCN1061" src="http://novacavaliers.com/wp-content/uploads/sites/13/2013/11/DSCN1061-300x225.jpg" width="300" height="225" /></a></div>
    </div>
    
    
    <h1 class="">Congratulations to the 2013 Battle of NOVA Champions!</h1>
    <div class="row">
    <div class="seven columns"><a href="http://novacavaliers.com/wp-content/uploads/sites/13/2013/11/17U-Champions-ABGC-Bulldogs.jpg" rel="prettyPhoto[champs]"><img class="alignnone  wp-image-1963" alt="17U Champions (ABGC Bulldogs)" src="http://novacavaliers.com/wp-content/uploads/sites/13/2013/11/17U-Champions-ABGC-Bulldogs.jpg" /></a>
    <h4>17U Champions: ABGC Bulldogs <br />17U Runner-up: Basics First</h4>
    </div>
    <div class="seven columns"><a href="http://novacavaliers.com/wp-content/uploads/sites/13/2013/11/16U-Champions-Fairfax-Stars.jpg" rel="prettyPhoto[champs]"><img class="alignnone  wp-image-1962" alt="16U Champions (Fairfax Stars)" src="http://novacavaliers.com/wp-content/uploads/sites/13/2013/11/16U-Champions-Fairfax-Stars.jpg" /></a>
    <h4>16U Champion: Fairfax Star <br />16U Runner-Up: Fairfax Bulldogs</h4>
    </div>
    </div>
    
    
    
    
    
    
    <div class="row">
    <div class="seven columns"><a href="http://novacavaliers.com/wp-content/uploads/sites/13/2013/11/15U-Champions-NOVA-Cavaliers.jpg" rel="prettyPhoto[champs]"><img class="alignnone  wp-image-1961" alt="15U Champions (NOVA Cavaliers)" src="http://novacavaliers.com/wp-content/uploads/sites/13/2013/11/15U-Champions-NOVA-Cavaliers.jpg" width="480" height="360" /></a>
    <h4>15U Champion: NOVA Cavaliers <br />15U Runner-up: Cardinal Basketball (14U)</h4>
    </div>
    <div class="seven columns"><a href="http://novacavaliers.com/wp-content/uploads/sites/13/2013/11/14U-Champions-Gainesville-Elite.jpg" rel="prettyPhoto[champs]"><img class="alignnone  wp-image-1960" alt="14U Champions (Gainesville Elite)" src="http://novacavaliers.com/wp-content/uploads/sites/13/2013/11/14U-Champions-Gainesville-Elite.jpg" width="480" height="360" /></a>
    <h4>14U Champion: Gainesville Elite <br />14U Runner-up: Germantown Heat</h4>
    </div>
    </div>
    <div class="row">
    <div class="seven columns"><a href="http://novacavaliers.com/wp-content/uploads/sites/13/2013/11/13U-Champions-VA-Hokies.jpg" rel="prettyPhoto[champs]"><img class="alignnone  wp-image-1959" alt="13U Champions (VA Hokies)" src="http://novacavaliers.com/wp-content/uploads/sites/13/2013/11/13U-Champions-VA-Hokies.jpg" width="480" height="360" /></a>
    <h4>13U Champion: VA Hokies <br />13U Runner-up: VA Hokies (12U)</h4>
    </div>
    <div class="seven columns"><a href="http://novacavaliers.com/wp-content/uploads/sites/13/2013/11/11U-Champions-VA-Hokies.jpg" rel="prettyPhoto[champs]"><img class="alignnone  wp-image-1958" alt="11U Champions (VA Hokies)" src="http://novacavaliers.com/wp-content/uploads/sites/13/2013/11/11U-Champions-VA-Hokies.jpg" width="576" height="432" /></a>
    <h4>11U Champion: VA Hokies <br />11U Runner-up: NOVA Cavaliers</h4>
    </div>
    </div>
    <div class="row">
    <div class="seven columns"><a href="http://novacavaliers.com/wp-content/uploads/sites/13/2013/11/9U-Champions-Fairfax-Stars.jpg" rel="prettyPhoto[champs]"><img class="alignnone  wp-image-1957" alt="9U Champions (Fairfax Stars)" src="http://novacavaliers.com/wp-content/uploads/sites/13/2013/11/9U-Champions-Fairfax-Stars.jpg" width="576" height="432" /></a>
    <h4>9U Champion: Fairfax Stars <br />
    9U Runner-up: Gainesville Elite</h4>
    </div>
    </div>
    </div>
    </div>
    
 </div><!-- battle of nova -->   

    <?php return ob_get_clean();
}
