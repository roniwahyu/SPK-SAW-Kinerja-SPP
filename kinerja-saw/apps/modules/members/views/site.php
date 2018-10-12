<div class="wrapper home" style="margin-top:50px;">
	<div class="container">
		<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
				<?php if($this->ion_auth->logged_in()): ?>
					<?php $user = $this->ion_auth->user()->row(); ?>
                		<?php if ( !empty($user)): ?>
                		<div class="panel panel-info" style="margin-top:20px;">
                			  <div class="panel-heading">
                					<h3 class="panel-title"> <i class="glyphicon glyphicon-user"></i> User Profile<a  href="<?php echo base_url('auth/edit_user') ?>/<?php echo $user->id; ?>"class="btn btn-xs btn-primary pull-right"><i class="glyphicon glyphicon-pencil"></i></a></h3>
                			  </div>
                			  <div class="panel-body">
                          <!-- <div class="row clearfix">  -->
                            <table class="table table-condensed table-striped">
                					 <?php foreach (array('id', 'email', 'first_name', 'last_name','company') as $field): ?>
                                        
                                        <?php echo '<tr><th>' . ucfirst($field) . ':</th></tr>';
                                        echo '<tr><td> ' . $user->$field . '</td></tr>'; ?>
                                        
                                    <?php endforeach; ?>  
                            </table>
                            <!-- </div> -->
                			  </div>
                			  <!-- <div class="list-group">
                						<a href="<?php //echo base_url('members/') ?>" class="list-group-item">Tim</a>
                						<a href="<?php //echo base_url('members/') ?>" class="list-group-item">Turnamen</a>
                					</div>
 -->
                		</div>
                		
               
		
          <div class="panel-group" id="accordion">
            <div class="panel panel-success">
              <div class="panel-heading">
                <h4 class="panel-title">
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour"><i class="glyphicon glyphicon-file">
                    </i>Results</a>
                </h4>
              </div>
              <div id="collapseFour" class="panel-collapse collapse in">
                <div class="list-group">
                 
                  <div class="list-group">
                    <a href="<?php echo base_url('members/') ?>" class="list-group-item">Pesanan</a>
                  </div>
                  
                </div>
              </div>
            </div>
            
          </div>
        </div>
        <?php endif; ?>
        
        <div class="col-sm-9 col-md-9" style="margin-top:20px">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Dashboard</h3>
            </div>
            <div class="panel-body content">
              <?php 
                if(!empty($data)):
                   if(!empty($heading_data)){
                    echo "<h2>".$heading_data."</h2>";
                   }
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
        <?php endif; ?>
      </div>
   
	
			
			
		</div>

	</div>
</div>