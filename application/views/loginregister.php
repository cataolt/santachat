<div class="site-content">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <?php $fattr = array('class' => 'form-signin');
                echo form_open(site_url().'main/login/', $fattr); ?>
                    <div class="row">
                        <div class="col-xs-12">
                            <label>
                                Am deja cont:
                            </label>
                        </div>

                        <div class="col-xs-12 col-sm-5">
                            <?php echo form_input(array('name'=>'email-login', 'id'=> 'email-login', 'placeholder'=>'Email', 'class'=>'form-control', 'value'=> set_value('email-login'))); ?>
                            <?php echo form_error('email-login') ?>
                        </div>
                        <div class="col-xs-12 col-sm-5">
                            <?php echo form_password(array('name'=>'password-login', 'id'=> 'password', 'placeholder'=>'Parola', 'class'=>'form-control')); ?>
                            <?php echo form_error('password-login') ?>
                        </div>
                        <div class="col-xs-12 col-sm-2">
                            <a id="login-button">
                                OK
                            </a>
                        </div>
                    </div>
                <?php echo form_close(); ?>
                <p>Apasa <a href="<?php echo site_url();?>main/forgot">aici</a> daca ai uitat parola.</p>
                <?php $fattr = array('class' => 'form-register');
                echo form_open('main/register', $fattr); ?>
                    <div class="row">
                        <div class="col-xs-12">
                            <?php
                            $arr = $this->session->flashdata();
                            if(!empty($arr['flash_message'])){
                                $html = '<div class="bg-warning flash-message">';
                                $html .= $arr['flash_message'];
                                $html .= '</div>';
                                echo $html;
                            }
                            ?>
                            <label>
                                Creeaza cont nou:
                            </label>
                            <?php echo form_input(array('name'=>'firstname', 'id'=> 'firstname', 'placeholder'=>'Prenume', 'class'=>'form-control', 'value' => set_value('firstname'))); ?>
                            <?php echo form_error('firstname');?>
                            <?php echo form_input(array('name'=>'lastname', 'id'=> 'lastname', 'placeholder'=>'Nume', 'class'=>'form-control', 'value'=> set_value('lastname'))); ?>
                            <?php echo form_error('lastname');?>
                            <?php echo form_input(array('name'=>'email', 'id'=> 'email', 'placeholder'=>'Email', 'class'=>'form-control', 'value'=> set_value('email'))); ?>
                            <?php echo form_error('email');?>
                            <?php echo form_password(array('name'=>'password', 'id'=> 'password', 'placeholder'=>'Parola', 'class'=>'form-control')); ?>
                            <?php echo form_error('password');?>
                            <?php echo form_input(array('name'=>'phone', 'id'=> 'phone', 'placeholder'=>'Numar de telefon', 'class'=>'form-control', 'value'=> set_value('phone'))); ?>
                            <?php echo form_error('phone');?>

<!--                            <label class="remove-padding">-->
                                <input type="checkbox" class="option-input checkbox go-left" CHECKED name="subscribed"/>
                                <label>Sunt de acord sa ma abonez la newsletterul Minunino</label>
<!--                            </label>-->
<!--                            <label class="remove-padding">-->
                                <input type="checkbox" class="option-input checkbox go-left" CHECKED name="terms"/>
                                <label>Sunt de acord cu termenii si conditiile</label>
<!--                            </label>-->
                            <br/>
                            <br/>
                            <?php echo form_error('terms');?>
                            <button class="danger-input" id="register-button">Inregistreaza-te! </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $( "#login-button" ).click(function() {
        $( ".form-signin" ).submit();
    });
    $( "#register-button" ).click(function() {
        $( ".form-register" ).submit();
    });
</script>




