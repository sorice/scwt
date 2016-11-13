<div class="container" id="main">
    <div id="transport" class="section-container animated fadeInUp">
        <div class="row">
            <div class="container">
                <div class="text-center">
                    <h1 class="section-title">Transportation</h1>
                    <p class="lead-small"><?php if (isset($transport_summary)) echo $transport_summary; else echo "Transportation"; ?></p>
                    <hr class="featurette-divider">
                </div>
            </div>
        </div>
        <div class="section-container animated fadeInUp">
            <?php
                if (isset($transports)) {
                    $i = 0;
                    foreach ($transports as $t) {
                        $image_properties = array(
                            'src'   => $t['cover_image'],
                            'alt'   => 'Transport cover image',
                            'class' => 'featurette-image img-responsive center-block img-thumbnail',
                            'width'  => '256',
                            'height' => '256'
                        );
                        echo "<div class='row featurette'>
                            <div class='container'>
                                <div class='col-sm-7 col-sm-push-5'>
                                    <h2 class='featurette-heading'>". $t['name'] ."</h2>
                                    <p class='lead'>". $t['description'] ."</p>
                                </div>
                                <div class='col-sm-5 col-sm-pull-7'>".
                                img($image_properties) ."
                                </div>
                            </div>
                        </div>";

                        // update style marker
                        $i += 1;
                        if ($i < count($transports)) {
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
