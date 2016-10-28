<div class="container" id="main">
    <div id="accommodations" class="section-container animated fadeInUp">
        <div class="row">
            <div class="container">
                <div class="text-center">
                    <h1 class="section-title">Accommodation</h1>
                    <p><?php if (isset($accommodation_summary)) echo $accommodation_summary; else echo "Accommodation"; ?></p>
                    <hr class="featurette-divider">
                </div>
            </div>
        </div>
        <div class="section-container animated fadeInUp">
            <?php
                if (isset($accommodations)) {
                    $i = 0;
                    foreach ($accommodations as $a) {
                        echo "<div class='row featurette'>
                            <div class='container'>
                                <div class='col-sm-7 col-sm-push-5'>
                                    <h2 class='featurette-heading'>". $a['name'] ."</h2>
                                    <p class='lead'>
                                    &nbsp;&nbsp;&dash;English name: ". $a['english_name'] ."<br/>
                                    &nbsp;&nbsp;&dash;Price: ". $a['price'] ."<br/>
                                    ". $a['description'] ."</p>
                                </div>
                                <div class='col-sm-5 col-sm-pull-7'>
                                    <img class='featurette-image img-responsive center-block img-thumbnail' src='data:image/jpg;base64,". $a['cover_image'] ."' alt='Accommodation cover image' height='256' width='256'>
                                </div>
                            </div>
                        </div>";

                        // update style marker
                        $i += 1;
                        if ($i < count($accommodations)) {
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
