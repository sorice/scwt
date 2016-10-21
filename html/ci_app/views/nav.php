<nav class="navbar navbar-static-top" id="navbar">
    <div class="container-fluid animated fadeInDown">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#nav1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php if (isset($brand_link)) echo $brand_link; else echo "#"; ?>">SantaClaraWalkingTour</a>
        </div>
        <div class="collapse navbar-collapse" id="nav1">
            <ul class="nav navbar-nav">
                <?php
                if (isset($nav_index)) {
                    echo '
                        <li class="active">
                            <a href="#overview"><i class="fa fa-dashboard">&nbsp;</i>Overview</a>
                        </li>
                        <li>
                            <a href="#experiences"><i class="fa fa-book">&nbsp;</i>Stories</a>
                        </li>
                        <li>
                            <a href="#friends"><i class="fa fa-group">&nbsp;</i>Friends</a>
                        </li>
                        <li>
                            <a href="#contact"><i class="fa fa-comment">&nbsp;</i>Contact</a>
                        </li>';
                }
                else {
                    if (isset($nav_transport)) {
                        echo '
                            <li class="active">
                                <a href="#transport"><i class="fa fa-truck">&nbsp;</i>Transportation</a>
                            </li>
                            <li>
                                <a href="#contact"><i class="fa fa-comment">&nbsp;</i>Contact</a>
                            </li>
                            <li>
                                <a href="'. site_url() .'/accommodation"><i class="fa fa-home">&nbsp;</i>Accomodations</a>
                            </li>
                            <li>
                                <a href="'. site_url() .'/tours"><i class="fa fa-location-arrow">&nbsp;</i>Tours</a>
                            </li>';
                    }
                    else {
                        if (isset($nav_accommodation)) {
                            echo '
                                <li class="active">
                                    <a href="#accomodations"><i class="fa fa-home">&nbsp;</i>Accomodations</a>
                                </li>
                                <li>
                                    <a href="#contact"><i class="fa fa-comment">&nbsp;</i>Contact</a>
                                </li>
                                <li>
                                    <a href="'. site_url() .'/transport"><i class="fa fa-truck">&nbsp;</i>Transportation</a>
                                </li>
                                <li>
                                    <a href="'. site_url() .'/tours"><i class="fa fa-location-arrow">&nbsp;</i>Tours</a>
                                </li>';
                        }
                        else {
                        if (isset($nav_tours)) {
                            echo '
                                <li>
                                    <a href="#tours"><i class="fa fa-location-arrow">&nbsp;</i>Tours</a>
                                </li>
                                <li>
                                    <a href="#contact"><i class="fa fa-comment">&nbsp;</i>Contact</a>
                                </li>
                                <li>
                                    <a href="'. site_url() .'/transport"><i class="fa fa-truck">&nbsp;</i>Transportation</a>
                                </li>
                                <li>
                                    <a href="'. site_url() .'/accommodation"><i class="fa fa-home">&nbsp;</i>Accomodations</a>
                                </li>';
                        }
                    }
                    }
                }
                ?>
            </ul>
        </div>
    </div>
</nav>
