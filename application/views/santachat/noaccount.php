<div class="row vertical-middle">
    <div class="col-xs-12">
        <div class="center-me red-card no-account">
            <div class = "site-content loginfront">
                <?php $fattr = array('class' => 'form-signin');
                echo form_open(site_url().'main/loginfront/', $fattr); ?>
                    <div class="col-xs-5 col-sm-5">
                        <?php echo form_input(array('name'=>'email-login', 'id'=> 'email-login', 'placeholder'=>'Email', 'class'=>'form-control', 'value'=> set_value('email-login'))); ?>
                    </div>
                    <div class="col-xs-5 col-sm-5">
                        <?php echo form_password(array('name'=>'password-login', 'id'=> 'password', 'placeholder'=>'Parola', 'class'=>'form-control')); ?>
                    </div>
                    <div class="col-xs-2 col-sm-2">
                        <a class="button-signin" id="login-button">
                            OK
                        </a>
                    </div>
                <?php echo form_close(); ?>
            </div>
            <h2 class="type13">
                De aici
            </h2>
            <h2 class="type13">
                ii poti scrie
            </h2>
            <h2 class="type13">
                lui Mos Craciun
            </h2>
            <h3 class="type11">
                Daca nu ai deja cont,
            </h3>
            <p class="type11">
                inscrie-te pentru o invitatie cu un mail la
            </p>
            <span class="type18">
                <script language="javascript" type="text/javascript">
                    var pre = "secretaramosului";
                    document.write("<a href='mailto:" + pre + "@santachat.ro'>" + pre
                        + "@ santachat.ro</a>");
                    </script>
            </span>
        </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $( "#login-button" ).click(function() {
        $( ".form-signin" ).submit();
    });
</script>