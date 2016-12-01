<div class="container" id="main">
    <div class="row text-center section-container animated fadeInUp" id="overview">
        <div class="row">
            <div class="container">
                <div class="col-md-8 col-md-push-2 col-sm-10 col-sm-push-1">
                    <div class="text-center">
                        <h1 class="section-title">Santa Clara Walking Tour</h1>
                        <p>&nbsp;</p>
                        <p class="text-justify lead-small">
                        <?php
                            if ($data_saved) {
                                echo $data_saved;
                            }
                            else {
                                if ($errors) {
                                    echo $errors;
                                }
                            }
                        ?>
                        </p>
                        <hr class="featurette-divider">
                        <p class="text-justify lead-small">
                        <?php
                            echo anchor("/", 'Go main page');
                        ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
