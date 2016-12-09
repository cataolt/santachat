<div class="element-spacer"></div>
<?php $i=0; ?>
<?php foreach($message as $mess):?>
    <div class="row letter move-bottom" <?php echo ($i!=0)?'style="display:none;"':''; ?>>
        <div class="col-xs-12">
            <div class="write-block scisors children">
                 <textarea readonly><?php echo $mess->message; ?></textarea>
                    <img class="cover" src="<?php echo site_url();?>/../public/images/cover.png" />
                    <img class="img-mobile" src="<?php echo site_url();?>/../public/images/Stampila.png" />
                <?php if($mess->read == 0): ?>
                    <input type="hidden" value="<?php echo $mess->id;?>" name="parent_id" id="parent_id"/>
                    <button class="response-button">
                        Raspunde
                    </button>
                <?php endif;?>
            </div>
        </div>
    </div>
    <div class="element-spacer"></div>
    <?php $i++; ?>
<?php endforeach; ?>

<?php if($i>1): ?>
    <div class="row sticky">
            <div class="text-center">
                <button class="btn more-button" id="singlebutton"> Vezi mai multe scrisori</button>
            </div>
    </div>
<?php endif; ?>


<script type="text/javascript">
    $(".response-button").click(function() {
        var letterId = $(this).parent().find('input:hidden:first').val();
        var location = "<?php echo site_url();?>main/letter/" + letterId;
        window.location.href = location;
    });

    $("#singlebutton").click(function() {
        $(".letter").show();
        $("#singlebutton").hide();
    });
</script>