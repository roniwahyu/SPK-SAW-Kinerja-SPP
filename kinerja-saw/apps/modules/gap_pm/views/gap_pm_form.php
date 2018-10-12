 <!-- Second tab content -->
 
<div class="tab-pane fade" id="outside">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="icon-table"></i> Form GAP Profile Matching</h3>
            <div class="btn-group pull-right">
                <a href="#inside" data-toggle="tab" class="btn btn-success"><i class="icon-checkbox-partial"></i> Daftar GAP Profile Matching</a>
                <a class="btn btn-info reset" href="#" >Reset Form</a>
            </div> 
        </div>
        <div class="panel-body">
            <div class="row clearfix">
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 kelola" style="display:none">
                    <div id="form_input" class="">
                    <?php echo form_open(base_url().'gap_pm/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
                                                                
                    <div class="row">
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                            <input type="hidden" value='' id="id_gap" name="id_gap">
                            
                            <div class="form-group">
                                <?php echo form_label('Keterangan` : ','kriteria',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('kriteria','','id="kriteria" class="form-control" placeholder="Enter kriteria"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('C1 (Fasilitas)','a_fasilitas',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('a_fasilitas','','id="a_fasilitas" class="form-control" placeholder="Enter a_fasilitas"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('C2 (Gaji Pegawai)','b_gaji',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('b_gaji','','id="b_gaji" class="form-control" placeholder="Enter b_gaji"'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                            
                        
                            <div class="form-group">
                                <?php echo form_label('C3 (BBM)','c_bbm',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('c_bbm','','id="c_bbm" class="form-control" placeholder="Enter c_bbm"'); ?>
                                </div>
                            </div> 
                            <div class="form-group">
                                <?php echo form_label('C4 (Jumlah Mahasiswa)','d',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('d','','id="d" class="form-control" placeholder="Enter Jumlah Mahasiswa"'); ?>
                                </div>
                            </div> <div class="form-group">
                                <?php echo form_label('C5 (Jumlah Dosen)','e',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('e','','id="e" class="form-control" placeholder="Enter Jumlah Dosen"'); ?>
                                </div>
                            </div> 
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                            
                            <div class="form-group">
                                <?php echo form_label('C6 (Kelengkapan Lab)','f',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('f','','id="f" class="form-control" placeholder="Enter Kelengkapan Lab"'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <?php echo form_label('C7 (Akreditasi) ','g',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('g','','id="g" class="form-control" placeholder="Enter Akreditasi"'); ?>
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
