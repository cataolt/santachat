<div class="site-content">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <?php $fattr = array('class' => 'form-update');
                echo form_open('main/editaccount', $fattr); ?>
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
                            Modifica informatiile:
                        </label>
                        <?php echo form_input(array('name'=>'firstname', 'id'=> 'firstname', 'placeholder'=>'Prenume', 'class'=>'form-control', 'value' => $user->firstname)); ?>
                        <?php echo form_error('firstname');?>
                        <?php echo form_input(array('name'=>'lastname', 'id'=> 'lastname', 'placeholder'=>'Nume', 'class'=>'form-control', 'value'=> $user->lastname)); ?>
                        <?php echo form_error('lastname');?>
                        <?php echo form_input(array('name'=>'email', 'id'=> 'email', 'placeholder'=>'Email', 'class'=>'form-control', 'value'=> $user->email)); ?>
                        <?php echo form_error('email');?>
                        <?php echo form_input(array('name'=>'phone', 'id'=> 'phone', 'placeholder'=>'Numar de telefon', 'class'=>'form-control', 'value'=> $user->phone)); ?>
                        <?php echo form_error('phone');?>

                        <label class="remove-padding">
                            <input type="checkbox" class="option-input checkbox" <?php echo ($user->subscribed)?'checked':'' ?>  name="subscribed"/>
                            <span>Sunt de acord sa am abonez la newsletterul Minunino</span>
                        </label>
                        <br/>
                        <br/>
                        <?php echo form_error('terms');?>
                        <button class="danger-input" id="register-button">Modifica! </button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>