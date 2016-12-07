<div class="mobile-menu move-bottom">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <?php if (isset($logged)): ?>
                    <div class="pull-left pull-center">
                        <a href="https://www.facebook.com/Minunino">
                            <img src="<?php echo site_url();?>/../public/images/layer_5.png" />
                        </a>
                    </div>
                    <div class="pull-right pull-center">
                        <a href="<?php echo site_url();?>main/logout">
                            <img src="<?php echo site_url();?>/../public/images/power.png" />
                        </a>
                    </div>
                    <div class="pull-left">
                        <a href="http://minunino.ro/contact">
                            <img src="<?php echo site_url();?>/../public/images/layer_6.png" />
                        </a>
                    </div>
                    <div class="pull-right">
                        <a href="<?php echo site_url();?>main/editaccount">
                            <img src="<?php echo site_url();?>/../public/images/account.png" />
                        </a>
                    </div>
                <?php else: ?>
                    <div class="pull-left">
                        <a href="http://minunino.ro/contact" target="_top">
                            <img src="<?php echo site_url();?>/../public/images/layer_6.png" />
                        </a>
                    </div>
                    <div class="pull-right">
                        <a href="https://www.facebook.com/Minunino" target="_top">
                            <img src="<?php echo site_url();?>/../public/images/layer_5.png" />
                        </a>
                    </div>
                <?php endif;?>
            </div>
        </div>
    </div>
</div>

</body>
</html>