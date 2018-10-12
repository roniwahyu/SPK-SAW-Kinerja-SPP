<div class="row clearfix" style="margin-top:20px;">
    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 kelola" style="<?php echo (!empty($hideform)?'display:none':'') ?>">
        <h3><?php echo (!empty($hideform)?'Edit Tim':'Pendaftaran Tim') ?></h3>
        <div id="form_input" class="">
            <?php echo form_open(base_url('tim/submit'),array('id'=>'addform','role'=>'form','class'=>'form')); ?>
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                    <input type="hidden" value='' id="id_tim" name="id_tim">
                    <input type="hidden" value='<?php echo !empty($userid)?$userid:'' ?>' id="userid" name="userid">
                        <div class="form-group">
                            <?php echo form_label('Nama : ','nama',array('class'=>'control-label')); ?>
                            <div class="controls">
                                <?php echo form_input('nama','','id="nama" class="form-control" placeholder="Enter nama"'); ?>
                            </div>
                        </div>
                                                        
                        <div class="form-group">
                            <?php echo form_label('Deskripsi : ','deskripsi',array('class'=>'control-label')); ?>
                            <div class="controls">
                                <?php echo form_textarea('deskripsi','','id="deskripsi" class="form-control" placeholder="Enter deskripsi"'); ?>
                            </div>
                        </div>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">    
                    <div class="form-group">
                        <?php echo form_label('Instansi : ','instansi',array('class'=>'control-label')); ?>
                        <div class="controls">
                            <?php echo form_input('instansi','','id="instansi" class="form-control" placeholder="Enter instansi"'); ?>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <?php echo form_label('Kota : ','kota',array('class'=>'control-label')); ?>
                        <div class="controls">
                            <?php echo form_input('kota','','id="kota" class="form-control" placeholder="Enter kota"'); ?>
                        </div>
                    </div>
                        <?php $level_array=array(
                            '1'=>'Biasa',
                            '2'=>'Hebat',
                            '3'=>'Sangat Hebat'
                            ) ?>
                    <div class="form-group">
                        <?php echo form_label('Skill Level : ','level',array('class'=>'control-label ')); ?>
                        <div class="select2-wrapper ">
                            <?php $attr1 = 'id="level" class="form-control select2" placeholder="Masukkan level" disabled';?>
                            <?php echo form_dropdown('level', $level_array, set_value('level',isset($default['level']) ? $default['level'] : ''),$attr1);?>
                        </div>
                    </div>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">   
                    <div class="form-group">
                        <?php echo form_label('leader : ','leader',array('class'=>'control-label')); ?>
                            <div class="controls">
                                <?php echo form_input('leader','','id="leader" class="form-control" placeholder="Enter leader"'); ?>
                            </div>
                    </div>
                    
                    <div class="form-group">
                        <?php echo form_label('coach : ','coach',array('class'=>'control-label')); ?>
                            <div class="controls">
                                <?php echo form_input('coach','','id="coach" class="form-control" placeholder="Enter coach"'); ?>
                            </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <button id="saved" type="submit" class="btn btn-md btn-success"><icon class="fa fa-floppy-o"></icon> Simpan</button>
                    <button id="save_edit" type="submit" class="btn btn-md btn-primary" style="display:none;"><icon class="fa fa-refresh"></icon> Perbaiki</button>
                    <a href="#" id="cancel_edit" class="btn btn-md btn-danger batal" style=""><i class="glyphicon glyphicon-remove"></i> Batal</a>
                </div>
            </div>
            <?php echo form_close();?>
        </div>
    </div>
</div>
                               