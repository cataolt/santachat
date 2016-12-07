<div class="col-lg-4 col-lg-offset-4">
    <h5>Creeaza cont nou:</h5>
    <?php
    $fattr = array('class' => 'form-signin');
    echo form_open('main/register', $fattr); ?>
    <div class="form-group">
        <?php echo form_input(array('name'=>'firstname', 'id'=> 'firstname', 'placeholder'=>'Prenume', 'class'=>'form-control', 'value' => set_value('firstname'))); ?>
        <?php echo form_error('firstname');?>
    </div>
    <div class="form-group">
        <?php echo form_input(array('name'=>'lastname', 'id'=> 'lastname', 'placeholder'=>'Nume', 'class'=>'form-control', 'value'=> set_value('lastname'))); ?>
        <?php echo form_error('lastname');?>
    </div>
    <div class="form-group">
        <?php echo form_input(array('name'=>'email', 'id'=> 'email', 'placeholder'=>'Email', 'class'=>'form-control', 'value'=> set_value('email'))); ?>
        <?php echo form_error('email');?>
    </div>
    <div class="form-group">
        <?php echo form_password(array('name'=>'password', 'id'=> 'password', 'placeholder'=>'Parola', 'class'=>'form-control', 'value'=> set_value('password'))); ?>
        <?php echo form_error('password');?>
    </div>
    <div class="form-group">
        <?php echo form_input(array('name'=>'phone', 'id'=> 'phone', 'placeholder'=>'Numar de telefon', 'class'=>'form-control', 'value'=> set_value('phone'))); ?>
        <?php echo form_error('phone');?>
    </div>
    <div class="form-group">
        <?php echo form_fieldset('Sunt de acord sa ma abonez la newsletterul Minunino', array('name'=>'subscribed', 'id'=> 'subscribed')); ?>
        <?php echo form_checkbox(array('name'=>'subscribed', 'id'=> 'subscribed', 'class'=>'form-control', 'value'=> set_value('subscribed')), TRUE); ?>
        <?php echo form_error('subscribed');?>
    </div>
    <div class="form-group">
        Termeni
    </div>
    <?php echo form_submit(array('value'=>'Inregistreaza-te', 'class'=>'btn btn-lg btn-primary btn-block')); ?>
    <?php echo form_close(); ?>
</div>