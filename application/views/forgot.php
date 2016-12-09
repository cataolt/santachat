<div class="site-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-lg-offset-4 ">
                <label>Te rog introdu adresa de e-mail mai jos si iti vom trimite instructiuni cum sa resetezi parola</label>
                <?php $fattr = array('class' => 'form-signin');
                echo form_open(site_url().'main/forgot/', $fattr); ?>
                <div class="form-group">
                    <?php echo form_input(array(
                        'name'=>'email',
                        'id'=> 'email',
                        'placeholder'=>'E-mail',
                        'class'=>'form-control',
                        'value'=> set_value('email'))); ?>
                    <?php echo form_error('email') ?>
                </div>
                <?php echo form_submit(array('value'=>'Trimite', 'class'=>'btn btn-lg btn-primary btn-block btn-xl')); ?>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>