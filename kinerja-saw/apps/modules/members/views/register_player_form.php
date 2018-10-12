<div class="row clearfix" style="margin-top:20px;">
    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 kelola" style="<?php echo (!empty($hideform)?'display:none':'') ?>">
        <h3><?php echo (!empty($id_pemain)?'Edit Pemain':'Pendaftaran Pemain') ?></h3>
        <div id="form_input" class="">
                                                <?php echo form_open(base_url().'tim_player/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
                                            
                                                <div class="row">
                                                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                                        <input type="hidden" value='<?php echo !empty($id_pemain)?$id_pemain:'' ?>' id="id_pemain" name="id_pemain">
                                                        <input type="hidden" value='<?php echo !empty($id_tim)?$id_tim:'' ?>' id="id_tim" name="id_tim">
                                                        

                                                                                                              
                                                        <div class="form-group">
                                                                <?php echo form_label('Nama Pemain : ','nama',array('class'=>'control-label')); ?>
                                                                <div class="controls">
                                                                    <?php echo form_input('nama',set_value('nama', isset($default[0]['nama']) ? $default[0]['nama'] : ''),'id="nama" class="form-control" placeholder="Enter nama" required="required"'); ?>
                                                                </div>
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                                <?php echo form_label('Deskripsi : ','deskripsi',array('class'=>'control-label')); ?>
                                                                <div class="controls">
                                                                    <?php echo form_textarea('deskripsi',set_value('deskripsi', isset($default[0]['deskripsi']) ? $default[0]['deskripsi'] : ''),'id="deskripsi" class="form-control" placeholder="Enter deskripsi"'); ?>
                                                                </div>
                                                        </div> 
                                                    </div>
                                                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                                            
                                                       
                                                        <div class="form-group">
                                                                <?php echo form_label('Posisi Utama : ','posisi1',array('class'=>'control-label')); ?>
                                                                <div class="controls">
                                                                    <?php echo form_input('posisi1',set_value('posisi1', isset($default[0]['posisi1']) ? $default[0]['posisi1'] : ''),'id="posisi1" class="form-control" placeholder="Enter posisi1"'); ?>
                                                                </div>
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                                <?php echo form_label('Posisi Cadangan : ','posisi2',array('class'=>'control-label')); ?>
                                                                <div class="controls">
                                                                    <?php echo form_input('posisi2',set_value('posisi2', isset($default[0]['posisi2']) ? $default[0]['posisi2'] : ''),'id="posisi2" class="form-control" placeholder="Enter posisi2"'); ?>
                                                                </div>
                                                        </div>
                                                        <div class="form-group">
                                                                <?php echo form_label('no_punggung : ','no_punggung',array('class'=>'control-label')); ?>
                                                                <div class="controls">
                                                                    <?php echo form_input('no_punggung',set_value('no_punggung', isset($default[0]['no_punggung']) ? $default[0]['no_punggung'] : ''),'id="no_punggung" class="form-control" placeholder="Enter no_punggung"'); ?>
                                                                </div>
                                                        </div>
                                                        
                                                      
                                                        <div class="form-group"><?php echo form_label('tgl_lahir : ','tgl_lahir',array('class'=>'control-label')); ?>
                                                            <div class="input-daterange input-group" id="datepicker">
                                                                <!-- <input type="text" class="input-sm form-control" name="tgl_lahir" /> -->
                                                                <?php echo form_input('tgl_lahir',set_value('tgl_lahir', isset($default[0]['tgl_lahir']) ? $default[0]['tgl_lahir'] : ''),'id="tgl_lahir" class="form-control" placeholder="Enter tgl_lahir"'); ?>
                                                            <span class="input-group-addon"><i class="icon icon-calendar"></i></span>

                                                            </div>   
                                                                
                                                                <div class="controls">
                                                                    
                                                                </div>
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                                <?php echo form_label('usia : ','usia',array('class'=>'control-label')); ?>
                                                                <div class="controls">
                                                                    <?php echo form_input('usia',set_value('usia', isset($default[0]['usia']) ? $default[0]['usia'] : ''),'id="usia" class="form-control" placeholder="Enter usia"'); ?>
                                                                </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                                        <div class="form-group">
                                                                <?php echo form_label('alamat : ','alamat',array('class'=>'control-label')); ?>
                                                                <div class="controls">
                                                                    <?php echo form_input('alamat',set_value('alamat', isset($default[0]['alamat']) ? $default[0]['alamat'] : ''),'id="alamat" class="form-control" placeholder="Enter alamat"'); ?>
                                                                </div>
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                                <?php echo form_label('kota : ','kota',array('class'=>'control-label')); ?>
                                                                <div class="controls">
                                                                    <?php echo form_input('kota',set_value('kota', isset($default[0]['kota']) ? $default[0]['kota'] : ''),'id="kota" class="form-control" placeholder="Enter kota"'); ?>
                                                                </div>
                                                        </div>
                                                          <div class="form-group">
                                                                <?php echo form_label('tinggi : ','tinggi',array('class'=>'control-label')); ?>
                                                                <div class="controls">
                                                                    <?php echo form_input('tinggi_cm',set_value('tinggi_cm', isset($default[0]['tinggi_cm']) ? $default[0]['tinggi_cm'] : ''),'id="tinggi_cm" class="form-control" placeholder="Enter tinggi"'); ?>
                                                                </div>
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                                <?php echo form_label('berat : ','berat',array('class'=>'control-label')); ?>
                                                                <div class="controls">
                                                                    <?php echo form_input('berat_gram',set_value('berat_gram', isset($default[0]['berat_gram']) ? $default[0]['berat_gram'] : ''),'id="berat_gram" class="form-control" placeholder="Enter berat"'); ?>
                                                                </div>
                                                        </div>
                                                        
                                                        
                                                      
                                                     
                                                        
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                        <button id="save_player" type="submit" class="btn btn-md btn-success"><icon class="fa fa-floppy-o"></icon> Simpan</button>
                                                        <button data-id="" id="save_edit_player" type="submit" class="btn btn-md btn-primary" style="display:none;"><icon class="fa fa-refresh"></icon> Perbaiki</button>
                                                        <a href="#" id="cancel_edit" class="btn btn-md btn-danger batal" style=""><i class="glyphicon glyphicon-remove"></i> Batal</a>
                                                    </div>
                                                </div>
                                                <?php echo form_close();?>
                                            </div>
    </div>
</div>
                               