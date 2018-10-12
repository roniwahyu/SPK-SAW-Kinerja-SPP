<div class="wrapper home" style="margin-top:50px;">
	<div class="container">
		<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
				<?php if($this->ion_auth->logged_in()): ?>
					<?php $user = $this->ion_auth->user()->row(); ?>
                		<?php if ( ! empty($user)): ?>
                		<div class="panel panel-info" style="margin-top:20px;">
                			  <div class="panel-heading">
                					<h3 class="panel-title"> <i class="glyphicon glyphicon-user"></i>User Profile</h3><a class="btn btn-xs btn-primary pull-right"><i class="glyphicon glyphicon-pencil"></i></a>
                			  </div>
                			  <div class="panel-body">
                					 <?php foreach (array('id', 'email', 'first_name', 'last_name') as $field): ?>
                                        <div class="row clearfix"> 
                                        <?php echo '<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"><b>' . ucfirst($field) . ':</b></div><div class="col-xs-8 col-sm-8 col-md-8 col-lg-8" > ' . $user->$field . '</div>'; ?>
                                        </div>
                                    <?php endforeach; ?>
                			  </div>
                			  <!-- <div class="list-group">
                						<a href="<?php echo base_url('members/') ?>" class="list-group-item">Tim</a>
                						<a href="<?php echo base_url('members/') ?>" class="list-group-item">Turnamen</a>
                					</div>
 -->
                		</div>
                		
               
		
          <div class="panel-group" id="accordion">
            <div class="panel panel-success">
              <div class="panel-heading">
                <h4 class="panel-title">
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour"><span class="glyphicon glyphicon-file">
                    </span>Turnamen</a>
                </h4>
              </div>
              <div id="collapseFour" class="panel-collapse collapse in">
                <div class="list-group">
                 
                  <div class="list-group">
                    <a href="<?php echo base_url('members/turnamen') ?>" class="list-group-item">Turnamen</a>
                    <a href="<?php echo base_url('members/my_team') ?>" class="list-group-item">Kelola Tim</a>
                    <a href="<?php echo base_url('members/klasemen/') ?>" class="list-group-item">Hasil & Klasemen</a>
                    <a href="<?php echo base_url('members/my_match') ?>" class="list-group-item">Jadwal Pertandingan</a>
                  </div>
                  
                </div>
              </div>
            </div>
            <div class="panel panel-danger">
              <div class="panel-heading">
                <h4 class="panel-title">
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive"><span class="glyphicon glyphicon-heart">
                    </span>Reports</a>
                </h4>
              </div>
              <div id="collapseFive" class="panel-collapse collapse">
                <div class="list-group">
                  <a href="<?php echo base_url('members/') ?>" class="list-group-item">
                    <h4 class="list-group-item-heading">List group item heading</h4>
                    <p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                  </a>
                </div>
                <div class="list-group">
                  <a href="<?php echo base_url('members/') ?>" class="list-group-item active">
                    <h4 class="list-group-item-heading">List group item heading</h4>
                    <p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                  </a>
                </div>
                <div class="list-group">
                  <a href="<?php echo base_url('members/') ?>" class="list-group-item">
                    <h4 class="list-group-item-heading">List group item heading</h4>
                    <p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php endif; ?>
                	<?php endif; ?>
        <div class="col-sm-9 col-md-9" style="margin-top:20px">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Dashboard</h3>
            </div>
            <div class="panel-body content">
              <?php 
                if(!empty($data)):
                    echo $data;
                else:
                endif; 
              ?>
              <?php 
                  if(!empty($element)):
                    $this->load->view($element);
                  else:

                  endif; 
              ?>
              

              </div>

          </div>
        </div>
      </div>
   
	
			
			
		</div>

	</div>
</div>