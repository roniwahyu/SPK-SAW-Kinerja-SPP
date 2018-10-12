<?php if ( ! $this->ion_auth->logged_in()): ?>
<div class="panel panel-default panel-daftar">
      <div class="panel-heading">
            <h3 class="panel-title">Daftarkan Tim Kamu</h3>
      </div>
      
<?php 
$attributes = array('class' => 'formdaftar', 'id' => 'formregister');
 ?>
<?php echo form_open("site/registrasi",$attributes);?>
            <div class="panel-body">
                    <div class="form-group">
                        <legend>Daftar Akun</legend>
                    </div>
                <div class="form-group">
                    <?php echo form_label('Username : ','username',array('class'=>'control-label')); ?>
                    <div class="controls">
                    <?php echo form_input('username','','id="username" class="form-control" placeholder="Enter username"'); ?>
                    </div>
                </div>
                                                            
                    <div class="form-group">
                        <?php echo form_label('Password : ','password1',array('class'=>'control-label')); ?>
                            <div class="controls">
                        <?php echo form_password('password1','','id="password1" class="form-control" placeholder="Enter password"'); ?>
                            </div>
                    </div>
                    <div class="form-group">
                        <?php echo form_label('Password : ','password_confirm',array('class'=>'control-label')); ?>
                            <div class="controls">
                        <?php echo form_password('password_confirm','','id="password_confirm" class="form-control" placeholder="Enter password_confirm"'); ?>
                            </div>
                    </div>
                                                            
                    <div class="form-group">
                        <?php echo form_label('Email : ','email',array('class'=>'control-label')); ?>
                            <div class="controls">
                        <?php echo form_input('email','','id="email" class="form-control" placeholder="Enter email"'); ?>
                            </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Daftar</button>
                        <button type="submit" class="loginbtn btn btn-warning pull-right">Masuk</button>
                        <!-- <a href="#" class="btn disabled">Sudah punya akun?</a> -->
                    </div>
                                                            
            </div>
        <?php echo form_close(); ?>
    
        
</div>
<?php endif; ?>
<?php if ( ! $this->ion_auth->logged_in()): ?>
<div class="panel panel-default formlogin" style="display:none;">
      <div class="panel-heading">
            <h3 class="panel-title">Login</h3>
      </div>
      <div class="panel-body">
        <h1>Login</h1>
        <p>Silakan login menggunakan username/email dan password Anda dibawah ini</p>
        <?php $login=array('class'=>'formlogin','id'=>'formlogin') ?>
        <?php echo form_open("auth/login",$login);?>

                    <div class="form-group">
                        <?php echo form_label('Username : ','identity',array('class'=>'control-label')); ?>
                        <div class="controls">
                        <?php echo form_input('identity','','id="identity" class="form-control" placeholder="Enter identity"'); ?>
                        </div>
                    </div>
                                                            
                    <div class="form-group">
                        <?php echo form_label('Password : ','password',array('class'=>'control-label')); ?>
                            <div class="controls">
                        <?php echo form_password('password','','id="password" class="form-control" placeholder="Enter password"'); ?>
                            </div>
                    </div>
            
            <p>
                Ingat selalu Password
                <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
            </p>




        <p><a href="auth/forgot_password" rel="async" ajaxify="<?php echo site_url('auth/auth_ajax/ion_auth_dialog/forgot_password'); ?>"><?php echo lang('login_forgot_password');?></a></p>
            <div class="form-group">

                        <button type="submit" class="btn btn-primary">Masuk</button>
                    <?php endif;  ?>
                    <?php if ($this->ion_auth->logged_in()): ?>
                     <a class="btn btn-primary btn-block btn-lg" href="<?php echo site_url('auth/logout'); ?>"><i class="icon-exit"></i> Logout</a>

                    <?php else: ?>
                        <button type="submit" class="daftarbtn btn btn-warning pull-right">Daftar</button>
                        <!-- <a href="#" class=" disabled ">Belum Punya Akun?</a> -->
                    <?php endif; ?>
                    </div>
                                                            
            </div>
        <?php echo form_close(); ?>
        
</div>