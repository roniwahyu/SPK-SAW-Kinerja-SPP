<div class="wrapper home">
	<div class="container">
		<div class="row" style="margin-top:30px;">
				
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div <?php (!empty($message)?$message:'') && print('class="alert alert-info"'); ?> id="infoMessage"><?php echo $message;?></div>

								<a class="btn btn-primary btn-lg" href="<?php echo base_url('site') ?>" ><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>

			</div>
		</div>
	</div>
</div>