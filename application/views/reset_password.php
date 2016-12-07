<div class="site-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-lg-offset-4">
                <label>Buna <?php echo $firstName; ?>, te rugam introdu noua parola de 2 ori:</label>
                <?php
                $fattr = array('class' => 'form-signin');
                echo form_open(site_url().'main/reset_password/token/'.$token, $fattr); ?>
                <div class="form-group">
                    <?php echo form_password(array('name'=>'password', 'id'=> 'password', 'placeholder'=>'Parola', 'class'=>'form-control', 'value' => set_value('password'))); ?>
                    <?php echo form_error('password') ?>
                </div>
                <div class="form-group">
                    <?php echo form_password(array('name'=>'passconf', 'id'=> 'passconf', 'placeholder'=>'Confirma Parola', 'class'=>'form-control', 'value'=> set_value('passconf'))); ?>
                    <?php echo form_error('passconf') ?>
                </div>
                <?php echo form_hidden('user_id', $id);?>
                <?php echo form_submit(array('value'=>'Reset Password', 'class'=>'btn btn-lg btn-primary btn-block btn-xl')); ?>
                <?php echo form_close(); ?>

            </div>
        </div>
    </div>
</div>