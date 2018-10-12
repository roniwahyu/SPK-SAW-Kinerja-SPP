<!-- <div class="wrapper home"> -->
	<!-- <div class="container"> -->
	<?php if(isset($saw) && isset($promatch)): ?>
	<div class="row">
		<div  class="col-xs-12 col-sm-10 col-md-10 col-lg-10" >
			<form action="<?php echo base_url('site/laporan_periode/') ?>" method="POST">

				<div class="form-group">
					<?php echo form_label('ID Rapat','rapat_id',array('class'=>'control-label')); ?>
					<div class="controls">
						<?php 
						echo form_dropdown('rapat_id',$rapat,'','id="rapat_id" class="form-control no-print" placeholder="Enter rapat_id"'); ?>
					</div>
				</div>
				<button id="submit" value="submit" name="submit" class="btn btn-md btn-success">Lihat Hasil</button>
			</form>
		</div>
		<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 text-center">
			<p>
			<button type="button" class="print btn-lg btn-block btn btn-info no-print"><i class="glyphicon glyphicon-print"></i> Cetak</button>
			</p>
		</div>
			
	</div>
<?php endif; ?>
		<?php if(!isset($saw) || !isset($promatch)): ?>
		<div class="row" style="margin-top:30px;">
			
        	<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
				<?php if(!isset($data)): ?>
					<div class="jumbotron">
						<div class="container text-center">
							<h1>Aplikasi Rekomendasi Kenaikan SPP</h1>
							<h3>Menggunakan Metode Profile Matching dan SAW (Simple Additive Weighting)</h3>
							<p>&nbsp;</p>
							
							
						</div>
					</div>
					<?php else: ?>
						<div class="row">
							<?php echo $data; ?>
						</div>
					<?php endif; ?>
				
			</div>
			<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
				<?php $this->load->view(!empty($element)?$element:''); ?>
			</div>
		</div>
		
		<?php elseif(isset($saw) && isset($promatch)): ?>
		<div class="row">
		
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<h2>Hasil Rekomendasi Metode SAW  </h2>
				<?php echo $saw; ?>
				<hr>
			</div>
			
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<h2>Hasil Rekomendasi Metode Profile Matching  </h2>
				<?php echo $promatch; ?>
			</div>
		
		</div>
		<?php endif; ?>
	<!-- </div> -->
<!-- </div> -->