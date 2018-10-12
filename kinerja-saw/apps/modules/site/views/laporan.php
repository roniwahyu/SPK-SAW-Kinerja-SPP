<div class="row">
	<p>
			<button type="button" class="print pull-right btn-lg btn btn-info no-print"><i class="glyphicon glyphicon-print"></i> Cetak</button>

	</p>
	<h1>Laporan</h1>
	
<hr>
</div>

<div class="row">

	<div class="well whitebg">
		<?php 
			if(isset($data)): 
				echo $data;
			endif; 
		?>
	</div>
</div>