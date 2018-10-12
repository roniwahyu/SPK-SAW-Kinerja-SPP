<?php echo form_open(base_url('members/submit_tim'),array('id'=>'addform','role'=>'form','class'=>'form')); ?>
	<h3>Gabung Turnamen</h3>
	<p>Pilihlah Tim yang akan didaftarkan ke dalam turnamen</p>
	<input name="id_turnamen" id='id_turnamen' type="hidden" value="<?php echo !empty($tourid)?$tourid:'';?>">
    <div class="form-group">
    	<?php echo form_label('Pilih Tim  : ','id_tim',array('class'=>'control-label ')); ?>
        	<div class="select2-wrapper ">
            	<?php $attr1 = 'id="id_tim" class="form-control select2" placeholder="Masukkan id_tim"';?>
                <?php echo form_dropdown('id_tim', $tim_array, set_value('id_tim',isset($default['id_tim']) ? $default['id_tim'] : ''),$attr1);?>
            </div>
    </div>
    <button class="btn btn-lg btn-success" type="submit">Daftarkan Tim</button>
<?php echo form_close(); ?>