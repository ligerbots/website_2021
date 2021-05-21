<?php get_header(); ?>


<div class="row bottom-margin row-margins">
    <div class="col-md-6 col-sm-12">
        <div class="panel panel-blue">
            <div class="panel-heading index-heading">
                <!-- CSS cannot seem to set the color so do it here -->
                <a style="color:white;" href="/blog_list.php">LIGERBOTS BLOG</a>
            </div>
            <div id="blog-panel" class="panel-body">
                <div class="blog-image-box">
                    <?php echo find_first_image(); ?>
                </div>
                <div class="text-margins">
                    <?php
                        my_the_excerpt( FALSE );
                    ?>
                    <div class="read-more">
                        <a href="<?php echo get_permalink( $blog ); ?>">
                            <img src="<?php ligerbots_relative_to_theme("/assets/images/read_more_flat.svg")?>"/>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-12">
        <div class="panel panel-blue">
            <div class="panel-heading index-heading">
                <a style="color:white;" href="/calendar.php">UPCOMING EVENTS</a>
            </div>
            <div id="cal-panel-div" class="panel-body">
                <iframe id="cal-panel" src="https://calendar.google.com/calendar/embed?showTitle=0&amp;showNav=0&amp;showDate=0&amp;showPrint=0&amp;showTabs=0&amp;showCalendars=0&amp;mode=AGENDA&amp;height=500&amp;wkst=2&amp;bgcolor=%23FFFFFF&amp;src=ligerbots.com_n95omorir7fj2bg2lu5q4ef8q0%40group.calendar.google.com&amp;color=%23711616&amp;ctz=America%2FNew_York"
                    width="100%" height="500" frameborder="0" scrolling="no">
                </iframe>
            </div>
        </div>
    </div>
</div>
<div class="row bottom-margin row-margins">
    <div class="col-md-6 col-sm-12">
        <div class="panel panel-blue">
            <div class="panel-heading index-heading">
                <a style="color:white;" href="/blog_list.php">ANNOUNCEMENTS</a>
            </div>
            <div id="ann-panel" class="panel-body" >
                <?php
                    
                    foreach ( get_announcements( 4 ) as $ann )
                    {
                        my_setup_postdata( $ann );
                        echo '<div class="announce text-margins"><div class="announce-title">';
                        echo '<a href="' . get_permalink( $ann ) . '">';
                        the_title();
                        echo "</a></div>\n";
                        echo '<div class="announce-date">';
                        the_date();
                        echo "</div>\n";
                        echo '<div class="announce-content">';
                        my_the_excerpt( TRUE );
                        echo "</div>\n";
                        echo "</div>\n";
                    }
                    ?>
                <br/>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-12">
        <div class="panel panel-blue">
            <div class="panel-heading index-heading">
                <a style="color:white;" target="_blank" href="https://twitter.com/search?q=ligerbots&src=typd">TWITTER</a>
            </div>
            <div class="panel-body">
                <a class="twitter-timeline" width="100%" href="https://twitter.com/LigerBots" data-widget-id="728971894213447680" data-chrome="noheader nofooter noborders">Tweets by @LigerBots</a>
                <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
            </div>
        </div>
    </div>
</div>
<div class="row row-margins">
    <div class="col-xs-12">
        <div class="panel panel-brag">
            <img src="<?php ligerbots_relative_to_theme("/assets/images/team_photo_2020.jpg")?>"/>
        </div>
        <div style="text-align:center;">
            <div class="label-blue"><a href="https://www.flickr.com/photos/ligerbots/albums/72157712218381043" target="_blank">The LigerBots</a></div>
        </div>
    </div>
</div>
<script>
    function Resize( id1, id2 )
    {
        $(id2).css( 'height', $(id1).height() );
    }

    function FixHeight()
    {
        var width = (window.innerWidth > 0) ? window.innerWidth : screen.width;
        if ( width > 990 ) {
            Resize( "#blog-panel", "#cal-panel" );
            Resize( "#ann-panel", "#twitter-widget-0" );
        }
    }

    $(window).on('load resize', FixHeight);
    $("#twitter-widget-0").on('load', FixHeight);
    setTimeout(function() { FixHeight(); }, 1000);
</script>
<?php get_footer(); ?>
