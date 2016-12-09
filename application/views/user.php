<div class="element-spacer"></div>

<?php
    $noUnreadMessage = false;
    if(!empty($message)) {
        foreach ($message as $mess) {
            if ($mess->read == 0) {
                $noUnreadMessage = true;
                break;
            }
        }
    }
?>

<?php if(empty($message) || $noUnreadMessage == false): ?>
    <div class="container">
        <div class="site-content">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <h2>
                                        Mosule, momentan nu ai nici o scrisoare noua.
                                    </h2>
                                    <p>
                                        Poate ar trebui sa ii aduci aminte micutului tau de santachat.ro?
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php if(!empty($message)):?>
    <div>
        <div class="container">
            <div class="row move-bottom" style="display: none;" id="response">
                    <div class="col-xs-12">
                        <div class="write-block scisors parent">
                            <?php $fattr = array('id' => 'respond-letter', 'class' => 'respond-letter');
                            echo form_open(site_url().'main/response/', $fattr); ?>
                            <textarea name="message" id="textarea-response"></textarea>
                            <img class="img-mobile" src="<?php echo site_url();?>/../public/images/Stampila.png" />
                            <button id="submit-response">
                                Trimite
                            </button>

                            <input type="hidden" value="" name="parent_id" id="parent_id"/>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
            </div>
            <div class="element-spacer"></div>
            <?php foreach ($message as $mess): ?>
                <div class="row move-bottom" id="letter">
                    <div class="col-xs-12">
                        <div class="write-block">
                            <textarea readonly><?php echo htmlspecialchars($mess->message); ?></textarea>
                            <?php if($mess->read == 0): ?>
                                <input type="hidden" value="<?php echo $mess->id;?>" class="message_id"/>
                               <button id="respond-button" class="respond-button">
                                    Raspunde
                                </button>
                            <?php endif;?>
                        </div>
                    </div>
                </div>
                <div class="element-spacer"></div>
            <?php endforeach;?>
        </div>
    </div>
<?php endif; ?>

<script type="text/javascript">
    $( ".respond-button" ).click(function() {
        //$(this).parents("#letter").hide();
        $( "#response" ).show();
        $("#parent_id").val(($(this).parent().find('input:hidden:first').val()));
        $('html,body').scrollTop(0);
        $('#textarea-response').focus();
    });

    $( "#submit-response" ).click(function() {
        if ($.trim($('#textarea-response').val()).length > 0) {
            $( "#respond-letter" ).submit();
        } else {
            e.preventDefault();
            return false;
        }
    });
</script>
