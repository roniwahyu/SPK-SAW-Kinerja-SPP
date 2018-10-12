 <!-- Second tab content -->
 
<div class="tab-pane fade" id="outside">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="icon-table"></i> Form rapat</h3>
            <div class="btn-group pull-right">
                <a href="#inside" data-toggle="tab" class="btn btn-success"><i class="icon-checkbox-partial"></i> Daftar Rapat</a>
                <a class="btn btn-info reset" href="#" >Reset Form</a>
            </div> 
        </div>
        <div class="panel-body">
            <div class="row clearfix">
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 kelola" style="display:none">
                    <div id="form_input" class="">
                    <?php echo form_open(base_url().'rapat/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
                                                                
                    <div class="row">
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                            <input type="hidden" value='' id="rapat_id" name="rapat_id">
                            <div class="form-group">
                                <?php echo form_label('Tanggal Rapat : ','tgl_rapat',array('class'=>'control-label')); ?>
                                    <div class="input-daterange input-group controls" id="datepicker">
                                        <input id="tgl_rapat" type="text" class="input-md form-control" name="tgl_rapat" />
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                    </div>    
                            </div>
                           
                            <div class="form-group">
                                <?php echo form_label('semester : ','semester',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php 
                                    $sms=array(
                                    'Genap'=>'Genap',
                                    'Gasal'=>'Gasal',
                                    );
                                echo form_dropdown('semester',$sms,'','id="semester" class="form-control" placeholder="Enter semester"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('status : ','status',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php   
                                $status=array(
                                    'Dibuka'=>'Dibuka',
                                    'Ditutup'=>'Ditutup',
                                    );
                                    echo form_dropdown('status',$status,'','id="status" class="form-control" placeholder="Enter status"'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <?php echo form_label('thn_ajaran : ','thn_ajaran',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php 
                              
                                echo form_input('thn_ajaran','','id="thn_ajaran" class="form-control" placeholder="Enter thn_ajaran"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('keterangan : ','keterangan',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('keterangan','','id="keterangan" class="form-control" placeholder="Enter keterangan"'); ?>
                                </div>
                            </div>
                        
                           
                        
                        </div>
                        <div id="peserta" class="peserta col-xs-8 col-sm-8 col-md-8 col-lg-8">
                            
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
