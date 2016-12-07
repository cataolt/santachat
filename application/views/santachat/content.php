<?php $parentId = null;?>
<div class="row vertical-middle move-bottom">
    <div class="col-xs-12">
        <div class="write-block">
            <?php $fattr = array('id' => 'respond-letter', 'class' => 'respond-letter');
            echo form_open(site_url().'main/letter/', $fattr); ?>
                <textarea name="message" id="textarea-message" >Draga Mos Craciun,</textarea>
            <input type="hidden" value="<?php echo $parentId?>" name="parent_id"/>
            <button id="submit-letter">
                Trimite
            </button>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>

<div class="row footer-space-main"></div>

<script type="text/javascript">
//    $( "#respond-button" ).click(function() {
//        $( "#letter" ).hide();
//        $( "#response" ).show();
//    });

    $( "#submit-letter" ).click(function() {
        if ($.trim($('#textarea-message').val()).length > 0) {
            $( "#respond-letter" ).submit();
        } else {
            e.preventDefault();
            return false;
        }
    });

$( document ).ready(function() {
    val = $( "#textarea-message" ).val();

    // focus textarea, clear value, re-apply
    $( "#textarea-message" ).focus().val("").val(val);
});
</script>