 <!-- Second tab content -->
 
<div class="tab-pane fade" id="outside">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="icon-table"></i> Form kriteria</h3>
            <div class="btn-group pull-right">
                <a href="#inside" data-toggle="tab" class="btn btn-success"><i class="icon-checkbox-partial"></i> Daftar Kriteria</a>
                <a class="btn btn-info reset" href="#" >Reset Form</a>
            </div> 
        </div>
        <div class="panel-body">
            <div class="row clearfix">
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 kelola" style="display:none">
                    <div id="form_input" class="">
                    <?php echo form_open(base_url().'kriteria/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
                                                                
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <input type="hidden" value='' id="id_kriteria" name="id_kriteria">
                            
                            <div class="form-group">
                                <?php echo form_label('nama_kriteria : ','nama_kriteria',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('nama_kriteria','','id="nama_kriteria" class="form-control" placeholder="Enter nama_kriteria"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('kode_kriteria : ','kode_kriteria',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('kode_kriteria','','id="kode_kriteria" class="form-control" placeholder="Enter kode_kriteria"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('bobot : ','bobot',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('bobot','','id="bobot" class="form-control" placeholder="Enter bobot"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('metode : ','metode',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('metode','','id="metode" class="form-control" placeholder="Enter metode"'); ?>
                                </div>
                            </div>
                        
                        
                        
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <button id="save" type="submit" class="btn btn-md btn-success"><icon class="fa fa-floppy-o"></icon> Simpan</button>
                            <button id="save_edit" type="submit" class="btn btn-md btn-primary" style="display:none;"><icon class="fa fa-refresh"></icon> Perbaiki</button>
                            <a href="#" id="cancel_edit" class="btn btn-md btn-danger batal" style=""><i class="glyphicon glyphicon-remove"></i> Batal</a>
                        </div>
                    </div>
                    <?php echo form_close();?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /second tab content -->
</div>
