<div class="container" id="main">
    <div id="tours" class="section-container animated fadeInUp">
        <div class="row">
            <div class="container">
                <div class="text-center">
                    <h1 class="section-title">Tours</h1>
                    <p><?php if (isset($tours_summary)) echo $tours_summary; else echo "Tours"; ?></p>
                    <hr class="featurette-divider">
                </div>
            </div>
        </div>
        <div class="section-container animated fadeInUp">
            <?php
                if (isset($tours)) {
                    $i = 0;
                    foreach ($tours as $t) {
                        echo "<div class='row featurette'>
                            <div class='container'>
                                <div class='col-sm-7 col-sm-push-5'>
                                    <h2 class='featurette-heading'>". $t['name'] ."</h2>
                                    <p class='lead'>". $t['description'] ."</p>
                                </div>
                                <div class='col-sm-5 col-sm-pull-7'>
                                    <img class='featurette-image img-responsive center-block img-thumbnail' src='data:image/jpg;base64,". $t['cover_image'] ."' alt='Tour cover image' height='256' width='256'>
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
