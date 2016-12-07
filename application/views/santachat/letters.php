<div class="icon-background">
    <div class="container">
        <?php $i=0; ?>
        <?php foreach($message as $mess):?>
            <div class="row vertical-middle letter" <?php echo ($i!=0)?'style="display:none;"':''; ?>>
                <div class="col-xs-12">
                    <div class="write-block scisors">
                        <div> <textarea readonly><?php echo $mess->message; ?></textarea>
                            <img src="<?php echo site_url();?>/../public/images/Stampila.png" />
                            <button class="response-button">
                                Raspunde
                            </button></div>
                    </div>
                </div>
            </div>
            <?php $i++; ?>
        <?php endforeach; ?>

        <div class="row">
            <div class="col-sm-12">
                <div class="text-center">
                    <button class="btn btn-primary more-button" id="singlebutton"> Vezi mai multe scrisori</button>
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    $(".response-button").click(function() {
        window.location.href = "<?php echo site_url();?>main/letter";
    });

    $("#singlebutton").click(function() {
        $(".letter").show();
    });
</script>