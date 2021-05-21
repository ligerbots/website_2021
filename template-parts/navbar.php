<?php
    $loggedIn = is_user_logged_in();
?>
<nav class="navbar navbar-ligerbots">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle navbar-toggle-ligerbots" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar icon-bar-ligerbots"></span>
                <span class="icon-bar icon-bar-ligerbots"></span>
                <span class="icon-bar icon-bar-ligerbots"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav nav-stacked">
                <li class="active"><a href="/">Home</a></li>
                <li><a href="/about">About</a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Support<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="/sponsor-us">Become a Sponsor</a></li>
                        <li><a href="/current-sponsors">Current Sponsors</a></li>
                    </ul>
                </li>
                <li><a href="/contact">Contact</a></li>
                <li><a href="/calendar.php">Calendar</a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Outreach<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="/outreach">Outreach</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="/amp">AMP</a></li>
                        <li><a href="/fll">FLL</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Media<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="/gallery.php">Photos</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Resources<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="/carpools.php">Carpools</a></li>
                        <li><a href="/links">Team Links</a></li>
                        <?php if($loggedIn): ?>
                            <li><a href="/directory.php">Directory</a></li>
                            <li><a href="/facebook.php">Facebook</a></li>
                            <li><a href="/preseason-resources/">Preseason Resources</a></li>
                            <li><a href="http://team.ligerbots.com">Team Internal Site</a></li>
                        <?php endif; ?>
                    </ul>
                </li>
                <?php if($loggedIn): ?>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">My Account<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="/attendance.php">My Attendance</a></li>
                            <?php if(current_user_can( 'edit_posts' )): ?>
                                <li><a href="/wp-backend/wp-admin/edit.php">Edit Posts</a></li>
                                <li><a href="/mail.php">Email Tracking</a></li>
                            <?php endif; ?>
                            <li><a href="/wp-backend/wp-admin/profile.php">My Profile</a></li>
                            <li><a href="/login.php?logout">Logout</a></li>
                        </ul>
                    </li>
                <?php else: ?>
                    <li><a href="/login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
