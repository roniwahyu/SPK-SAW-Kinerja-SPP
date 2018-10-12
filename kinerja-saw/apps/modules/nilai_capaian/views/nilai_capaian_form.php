 <!-- Second tab content -->
 
<div class="tab-pane fade" id="outside">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="icon-table"></i> Form nilai_capaian</h3>
            <div class="btn-group pull-right">
                <a href="#inside" data-toggle="tab" class="btn btn-success"><i class="icon-checkbox-partial"></i> Daftar Nilai_capaian</a>
                <a class="btn btn-info reset" href="#" >Reset Form</a>
            </div> 
        </div>
        <div class="panel-body">
            <div class="row clearfix">
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 kelola" style="display:none">
                    <div id="form_input" class="">
                    <?php echo form_open(base_url().'nilai_capaian/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
                                                                
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <input type="hidden" value='' id="capaian_id" name="capaian_id">
                            
                            <div class="form-group">
                                <?php echo form_label('metode : ','metode',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('metode','','id="metode" class="form-control" placeholder="Enter metode"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('logika : ','logika',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('logika','','id="logika" class="form-control" placeholder="Enter logika"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('nilai_capaian : ','nilai_capaian',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('nilai_capaian','','id="nilai_capaian" class="form-control" placeholder="Enter nilai_capaian"'); ?>
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
