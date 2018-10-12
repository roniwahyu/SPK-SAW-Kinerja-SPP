
<header class="navbar navbar-default navbar-static-top">
    
    <div class="container">
        <div class="navbar-header">
            <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="<?php echo site_url(); ?>" class="navbar-brand">Aplikasi Rekomendasi</a>
        </div>
        <nav class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar">
                <li><a href="<?php echo site_url(); ?>">Home</a></li>
                 <?php if ($this->ion_auth->logged_in()): 
                    if($this->ion_auth->in_group(array(1))){?>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                      Kelola<b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo site_url('pimpinan'); ?>">Kelola Pimpinan</a></li>
                        <li><a href="<?php echo site_url('kriteria'); ?>">Kelola Kriteria</a></li>
                        <li><a href="<?php echo site_url('nilai'); ?>">Kelola Penilaian</a></li>
                        <li><a href="<?php echo site_url('rapat'); ?>">Kelola Rapat</a></li>
                    
                               </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        Konfigurasi<b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo site_url('gap_pm'); ?>">GAP Profile Matching</a></li>
                      
        
                               </ul>
                </li>
                <?php } endif; ?>
                <li><a href="<?php echo site_url('members'); ?>">Members Area</a></li>

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        Laporan <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo site_url('site/laporan'); ?>">Laporan</a></li>
                        <li><a href="<?php echo site_url('site/matriks'); ?>">Matriks Nilai</a></li>
                    </ul>
                </li>

                
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php if ($this->ion_auth->logged_in()): 
                    if($this->ion_auth->in_group(1)){?>
                <li class="dropdown dropdown-success" style="">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                      Administrator <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo site_url('pimpinan_user/'); ?>">Kelola User Pimpinan</a></li>
                        <li><a href="<?php echo site_url('auth/'); ?>">Kelola User</a></li>
                        <li><a href="<?php echo site_url('groups'); ?>">Kelola Groups</a></li>
                    </ul>
                </li>
                <?php } endif; ?>
                <li class="user dropdown">
                <?php if ( ! $this->ion_auth->logged_in()): ?>
                    <a href="<?php echo site_url('auth/login'); ?>" rel="async" ajaxify="<?php echo site_url('auth/auth_ajax/ion_auth_dialog/login'); ?>">
                        <i class="icon-user"></i> Log In
                    </a>
               
                <?php else: ?>  

                <?php $user = $this->ion_auth->user()->row(); ?>
                    <?php if ( ! empty($user)): ?>
                        <a class="dropdown-toggle" data-toggle="dropdown">
                              <i class="glyphicon glyphicon-user"></i>
                        </a>
                        <div class="panel dropdown-menu dropdown-menu-right" style="width:300px">
                            <ul class="dropdown-menu">
                        <li <?php ( ! $this->ion_auth->is_admin()) && print('class="disabled"'); ?>>
                            <a href="<?php echo site_url('auth'); ?>">Users</a>
                        </li> 

                        <li>
                            <a href="<?php echo site_url('auth/change_password'); ?>"
                                rel="async" ajaxify="<?php echo site_url('auth/auth_ajax/ion_auth_dialog/change_password'); ?>"
                            >
                                Change password
                            </a>
                        </li>
                        <li><a href="<?php echo site_url('auth/logout'); ?>">Log out</a></li>
                    </ul>
                            <div class="panel-header panel-success">
                              
                                <p>User Information</p>
                              
                            </div>
                            <div class="well "><table class="table table-striped table-hover">
                            <?php foreach (array('id', 'email', 'first_name', 'last_name') as $field): ?>
                                <tr>
                                    <th><?php echo $field ?></th><td><?php echo $user->$field; ?> </td>
                                </tr>
                                <?php $id=$user->id ?>
                                
                            <?php endforeach; ?></table>
                                <div class="btn-group">
                                    <a href="<?php echo base_url('auth/edit_user') ?>/<?php echo $id; ?>" class="btn btn-danger btn-xs">Edit Profile</a>   
                                    
                                </div>
                            </div>
                        </div>
                
                    <?php endif; ?>
                   
                          
            
             <?php endif; ?>    
            </li>
            <?php if ($this->ion_auth->logged_in()): ?>
            <li><a href="<?php echo site_url('auth/logout'); ?>"><i class="icon-exit"></i> Logout</a></li>
            <?php endif; ?>

            </ul>
        </nav>
    </div>
</header>