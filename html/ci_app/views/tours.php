<div class="container" id="main">
    <div id="tours" class="section-container animated fadeInUp">
        <div class="row">
            <div class="container">
                <div class="text-center">
                    <h1 class="section-title">Tours</h1>
                    <p class="lead-small"><?php if (isset($tours_summary)) echo $tours_summary; else echo "Tours"; ?></p>
                    <hr class="featurette-divider">
                </div>
            </div>
        </div>
        <div class="section-container animated fadeInUp">
            <?php
                if (isset($tours)) {
                    $i = 0;
                    foreach ($tours as $t) {
                        $image_properties = array(
                            'src'   => $t['cover_image'],
                            'alt'   => 'Tour cover image',
                            'class' => 'featurette-image img-responsive center-block img-thumbnail',
                            'width'  => '256',
                            'height' => '256'
                        );
                        echo "<div class='row featurette'>
                            <div class='container'>
                                <div class='col-sm-7 col-sm-push-5'>
                                    <h2 class='featurette-heading'>". $t['name'] ."</h2>
                                    <p class='lead'>". $t['description'] ."</p>
                                    <p><a class='btn lead-small' href='". base_url($t['brochure']) ."' role='button'><i class='fa fa-file-pdf-o'>&nbsp;</i>Read brochure »</a></p>
                                </div>
                                <div class='col-sm-5 col-sm-pull-7'>".
                                img($image_properties) ."
                                </div>
                            </div>
                        </div>";

                        // update style marker
                        $i += 1;
                        if ($i < count($tours)) {
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
    </div>
</div>
