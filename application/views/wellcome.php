<div class="site-content">
        <div class="container">
            <div class="row">
                <img class="img-responsive player" src="<?php echo site_url();?>/../public/images/player.png" data-video="http://www.youtube.com/embed/jLHGnvnw-gI">
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="swiper-container">
                        <!-- Add Arrows -->
                        <div class="swiper-button-next">
                            <?php echo form_submit(array('value'=>'Mai departe', 'class'=>'btn btn-info btn-xl', 'id' => 'next')); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>

<script type="text/javascript">
    $('img').click(function(){
        video = '<div class="embed-responsive embed-responsive-4by3 div_style">' +
            '<iframe width="778" height="453" class="embed-responsive-item" src="http://www.youtube.com/embed/jLHGnvnw-gI?autoplay=1"></iframe>' +
            '</div>';
        $(this).replaceWith(video);
    });

    $('#next').click(function(){
        window.location.href = "<?php echo site_url().'main/user' ?>";
    });
</script>