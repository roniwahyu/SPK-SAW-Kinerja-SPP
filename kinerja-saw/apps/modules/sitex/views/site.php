<?php if(!isset($saw) || !isset($promatch)): ?>
<div class="row">	
<div class="jumbotron">
	<div class="container text-center">
		<h1>Aplikasi Rekomendasi Kenaikan SPP</h1>
		<h3>Menggunakan Metode Profile Matching dan SAW (Simple Additive Weighting)</h3>
		<p>&nbsp;</p>
		
		
	</div>
</div></div>
<div class="row">
<?php elseif(isset($saw) && isset($promatch)): ?>
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<h2>Hasil Rekomendasi Metode SAW  </h2>
		<?php echo $saw; ?>
		<hr>
	</div>
	
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<h2>Hasil Rekomendasi Metode Profile Matching  </h2>
		<?php echo $promatch; ?>
	</div>
<?php endif; ?>
</div>