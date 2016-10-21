<div class="container" id="main">
    <div class="row text-center section-container animated fadeInUp" id="overview">
        <div class="row">
            <div class="container">
                <div class="col-md-8 col-md-push-2 col-sm-10 col-sm-push-1">
                    <div class="text-center">
                        <h1 class="section-title">Overview</h1>
                        <p class="text-justify"><?php if (isset($overview)) echo $overview; else echo "Overview"; ?></p>
                    </div>
                </div>
            </div>
        </div>
        <hr class="featurette-divider">
        <div class="container section-container" id="overview">
            <div class="col-md-3 col-sm-6">
                <img src="<?php if (isset($overview_img_welcome)) echo 'data:image/jpg;base64,'. $overview_img_welcome; ?>" alt="Overview welcome image" width="256" height="256" class="img-responsive img-thumbnail">
                <h2>Welcome</h2>
                <p><?php if (isset($overview_welcome)) echo $overview_welcome; else echo "Welcome"; ?></p>
                <p><a class="btn" href="<?php echo site_url() ?>/tours#welcome_day" role="button"><i class="fa fa-flag">&nbsp;</i>Reception &raquo;</a></p>
            </div>
            <div class="col-md-3 col-sm-6">
                <img src="<?php if (isset($overview_img_transport)) echo 'data:image/jpg;base64,'. $overview_img_transport; ?>" alt="Overview transport image" width="256" height="256" class="img-responsive img-thumbnail">
                <h2>Transportation</h2>
                <p><?php if (isset($overview_transport)) echo $overview_transport; else echo "Transportation"; ?></p>
                <p><a class="btn" href="<?php echo site_url() ?>/transport" role="button"><i class="fa fa-truck">&nbsp;</i>Taxis &raquo;</a></p>
            </div>
            <div class="col-md-3 col-sm-6">
                <img src="<?php if (isset($overview_img_accommodation)) echo 'data:image/jpg;base64,'. $overview_img_accommodation; ?>" alt="Overview accommodation image" width="256" height="256" class="img-responsive img-thumbnail">
                <h2>Accommodation</h2>
                <p><?php if (isset($overview_accommodation)) echo $overview_accommodation; else echo "Accommodation"; ?></p>
                <p><a class="btn" href="<?php echo site_url() ?>/accommodation" role="button"><i class="fa fa-home">&nbsp;</i>Casa Particular &raquo;</a></p>
            </div>
            <div class="col-md-3 col-sm-6">
                <img src="<?php if (isset($overview_img_tours)) echo 'data:image/jpg;base64,'. $overview_img_tours; ?>" alt="Overview tours image" width="256" height="256" class="img-responsive img-thumbnail">
                <h2>Tours</h2>
                <p><?php if (isset($overview_tours)) echo $overview_tours; else echo "Tours"; ?></p>
                <p><a class="btn" href="<?php echo site_url() ?>/tours" role="button"><i class="fa fa-location-arrow">&nbsp;</i>Brochures &raquo;</a></p>
            </div>
        </div>
    </div>
    <div id="experiences" class="section-container animated fadeInUp">
        <div class="row">
            <div class="container">
                <div class="text-center">
                    <h1 class="section-title">Brief Stories</h1>
                    <span>Never miss a story, live them with us.</span>
                </div>
                <hr class="featurette-divider">
            </div>
        </div>
        <?php
            if (isset($stories)) {
                $i = 0;
                foreach ($stories as $s) {
                    if ($i % 2 == 0) {
                        echo "<div class='row featurette'>
                            <div class='container'>
                                <div class='col-sm-7'>
                                    <h2 class='featurette-heading'>". $s['title'] ."</h2>
                                    <p class='lead'>". $s['summary'] ."</p>
                                </div>
                                <div class='col-sm-5'>
                                    <img src='data:image/jpg;base64,". $s['cover_image'] ."' alt='Story cover image' class='img-responsive img-thumbnail'>
                                </div>
                            </div>
                        </div>";
                    }
                    else {
                        echo "<div class='row featurette'>
                            <div class='container'>
                                <div class='col-sm-7 col-sm-push-5'>
                                    <h2 class='featurette-heading'>". $s['title'] ."</h2>
                                    <p class='lead'>". $s['summary'] ."</p>
                                </div>
                                <div class='col-sm-5 col-sm-pull-7'>
                                    <img src='data:image/jpg;base64,". $s['cover_image'] ."' alt='Story cover image' class='img-responsive img-thumbnail'>
                                </div>
                            </div>
                        </div>";
                    }
                    // update style marker
                    $i += 1;
                    if ($i < count($stories)) {
                        echo "<div class='row'>
                            <div class='container'>
                                <hr />
                            </div>
                        </div>";
                    }
                }
            }
        ?>
    </div>
    <div id="friends" class="section-container animated fadeInUp">
        <div class="row text-center">
            <div class="container">
                <div>
                    <h1 class="section-title">Friends</h1>
                    <span>Our friends are important to us and we listen to them always.</span>
                </div>
                <hr class="featurette-divider">
            </div>
        </div>
        <?php
            if (isset($friends)) {
                $i = 0;
                foreach ($friends as $s) {
                    echo "<div class='row featurette'>
                        <div class='container'>
                            <div class='col-sm-3 text-center'>
                                <img src='data:image/jpg;base64,". $s['image'] ."' alt='Friend image' class='img-responsive img-thumbnail' width='200' height='200'>
                            </div>
                            <div class='col-sm-9'>
                                <blockquote>
                                    <p><em>'". $s['opinion'] ."'</em></p>
                                    <small><cite title='author'>". $s['author'] ."</cite></small>
                                </blockquote>
                            </div>
                        </div>
                    </div>";

                    // update style marker
                    $i += 1;
                    if ($i < count($friends)) {
                        echo "<div class='row'>
                            <div class='container'>
                                <hr />
                            </div>
                        </div>";
                    }
                }
            }
        ?>
    </div>
    <div class="row text-center" id="contact">
        <div class="row text-center">
            <div class="container">
                <div>
                    <h1 class="section-title">Contact us</h1>
                    <span>Know more about our family and contact us if you want.</span>
                </div>
                <hr class="featurette-divider">
            </div>
        </div>
        <div class="container">
            <div class="row section-container">
                <div class="col-sm-4">
                    <img src="<?php if (isset($contact_img_yanet)) echo 'data:image/jpg;base64,'. $contact_img_yanet; ?>" alt="Yanet's contact image" width="256" height="256" class="img-responsive img-thumbnail">
                    <h2>Yanet</h2>
                    <p><?php if (isset($contact_info_yanet)) echo $contact_info_yanet; else echo "Yanet"; ?></p>
                    <p></p>
                </div>
                <div class="col-sm-4">
                    <img src="<?php if (isset($contact_img_abel)) echo 'data:image/jpg;base64,'. $contact_img_abel; ?>" alt="Abel's contact image" width="256" height="256" class="img-responsive img-thumbnail">
                    <h2>Abel</h2>
                    <p><?php if (isset($contact_info_abel)) echo $contact_info_abel; else echo "Abel"; ?></p>
                    <p></p>
                </div>
                <div class="col-sm-4">
                    <img src="<?php if (isset($contact_img_jane)) echo 'data:image/jpg;base64,'. $contact_img_jane; ?>" alt="Jane's contact image" width="256" height="256" class="img-responsive img-thumbnail">
                    <h2>Jane</h2>
                    <p><?php if (isset($contact_info_jane)) echo $contact_info_jane; else echo "Jane"; ?></p>
                    <p></p>
                </div>
            </div>
            <div class="row">
                <div class="row" id="contact-form">
                    <div class="col-sm-4 col-sm-offset-1">
                        <div class="clearfix">
                            <h3><span class="fa fa-map-marker"></span></h3>
                            <span><?php if (isset($address)) echo $address; else echo "Address"; ?></span>
                        </div>
                        <div class="clearfix">
                            <h3><span class="fa fa-phone-square"></span></h3>
                            <span><?php if (isset($phone)) echo "<a href='tel:". $phone ."'>" . $phone ; else echo "Phone"; echo "</a>"?></span>
                        </div>
                        <div class="clearfix">
                            <h3><span class="fa fa-envelope"></span></h3>
                            <span><a href="mailto:info@santaclarawalkingtour.com?subject=About Santa Clara Walking Tour">info@santaclarawalkingtour.com</a></span>
                        </div>
                        <ul class="social-link list-inline">
                            <li class="facebook">
                                <a href="http://facebook.com/santaclarawalkingtour"><span class="fa fa-facebook-square fa-2x"></span></a>
                            </li>
                            <li class="twitter">
                                <a href="http://twitter.com/santaclarawalkingtour"><span class="fa fa-twitter-square fa-2x"></span></a>
                            </li>
                            <li class="gplus">
                                <a href="http://plus.google.com/santaclarawalkingtour"><span class="fa fa-google-plus-square fa-2x"></span></a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-sm-offset-1 col-sm-4">
                        <span class="help-block"><i class="fa fa-pencil-square">&nbsp;</i>Contact us</span>
                        <form role="form" name="form_message">
                            <div class="form-group">
                                <input type="text" class="form-control input-lg" name="name" placeholder="Enter name">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control input-lg" name="email" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <textarea name="message" class="form-control input-lg" placeholder="Comment or question" rows="5"></textarea>
                            </div>
                            <button class="btn btn-default" type="submit" id="btn_send">
                                <i class="fa fa-save">&nbsp;</i>Send message
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
