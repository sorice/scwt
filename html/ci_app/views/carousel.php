<div id="carousel1" class="carousel slide hidden-xs" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carousel1" data-slide-to="0" class="active"></li>
        <li data-target="#carousel1" data-slide-to="1"></li>
        <li data-target="#carousel1" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="item active">
            <?php
                $image_properties = array(
                    'src'    => $carousel[0]['image'],
                    'class'  => 'img-responsive'
                );
                echo img($image_properties);
            ?>
            <div class="carousel-caption">
                <div class="carousel-caption-inner">
                <?php
                    echo "<h3>". $carousel[0]['main_text'] ."</h3>";
                    echo "<p>". $carousel[0]['secondary_text'] ."</p>";
                ?>
                </div>
            </div>
        </div>
        <div class="item">
            <?php
                $image_properties = array(
                    'src'    => $carousel[1]['image'],
                    'class'  => 'img-responsive'
                );
                echo img($image_properties);
            ?>
            <div class="carousel-caption">
                <div class="carousel-caption-inner">
                <?php
                    echo "<h3>". $carousel[1]['main_text'] ."</h3>";
                    echo "<p>". $carousel[1]['secondary_text'] ."</p>";
                ?>
                </div>
            </div>
        </div>
        <div class="item">
            <?php
                $image_properties = array(
                    'src'    => $carousel[2]['image'],
                    'class'  => 'img-responsive'
                );
                echo img($image_properties);
            ?>
            <div class="carousel-caption">
                <div class="carousel-caption-inner">
                <?php
                    echo "<h3>". $carousel[2]['main_text'] ."</h3>";
                    echo "<p>". $carousel[2]['secondary_text'] ."</p>";
                ?>
                </div>
            </div>
        </div>
    </div>
    <a class="left carousel-control" href="#carousel1" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left"></span> </a>
    <a class="right carousel-control" href="#carousel1" data-slide="next"> <span class="glyphicon glyphicon-chevron-right"></span> </a>
</div>
