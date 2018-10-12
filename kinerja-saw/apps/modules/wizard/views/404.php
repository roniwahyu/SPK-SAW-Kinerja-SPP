<?php if(isset($error) || $error!==null): ?>
<div class="jumbotron">
	<div class="container text-center">
		<h1>Error!</h1>
		<?php if(isset($msg) || $msg!==null): ?>
		<h3><?php echo $msg; ?></h3>
		<?php endif; ?>
		<p>
			<a href="<?php echo base_url('members') ?>" class="btn btn-danger btn-lg">Berikan Penilaian</a>
		</p>
	</div>
</div>
<?php else: ?>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<p><?php echo $error; ?></p>
		</div>
		
	</div>
<?php endif; ?>