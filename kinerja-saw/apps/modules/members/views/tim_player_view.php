    <div class="row">
            <div class="tabbable page-tabs">
                <ul class="nav nav-tabs">
                    <li class="daftar active"><a href="#inside" data-toggle="tab"><i class="icon-checkbox-partial"></i> Daftar Tim_player</a></li>
                    <li class="baru"><a href="#outside" data-toggle="tab"><i class="icon-plus"></i> Tambah Tim_player Baru</a></li>
                </ul>
                <div class="tab-content">
                    
                    <!-- First tab content -->
                    <div class="tab-pane active fade in" id="inside">
                        <!-- AJAX source -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h6 class="panel-title"><i class="icon-table"></i> Daftar Tim_player</h6> 
                                <div class="btn-group pull-right">
                                    <a href="#outside" data-toggle="tab" class="btn btn-success"><i class="icon-plus"></i> Tambah Tim_player Baru</a>
                                </div> 
                            </div>
                            <div class="datatable-ajax-source">
                                <table id="datatables" class="table table-bordered table-condensed table-striped" style="font-size:11px;">
                                    <thead class="">
                                        <tr>
                                                        <th>id_player</th>
                                                        <th>id_tim</th>
                                                        <th>nama</th>
                                                        <th>deskripsi</th>
                                                        <th>posisi1</th>
                                                        <th>posisi2</th>
                                                        <th>tgl_lahir</th>
                                                        <th>usia</th>
                                                        <th>alamat</th>
                                                        <th>kota</th>
                                                        <th>no_punggung</th>
                                                        <th>tinggi</th>
                                                        <th>berat</th>
                                                        <th>total_score</th>
                                                        <th>datetime</th>
                                                        <th>Actions</th>

                                                    </tr>
                                    </thead>

                                    <tbody class="table-bordered">
                                        <tr>
                                            <td colspan="16" class="dataTables_empty"><img src="<?php echo assets_url('images/loader.gif');  ?>" title="Loading" alt="Loading">&nbsp;&nbsp; Loading data...</td>
                                            
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /saving state -->

                    </div>
                    <!-- /first tab content -->


                    <!-- Second tab content -->
                    <div class="tab-pane fade" id="outside">
                        <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><i class="icon-table"></i> Form tim_player</h3>
                                    <div class="btn-group pull-right">
                                        <a href="#inside" data-toggle="tab" class="btn btn-success"><i class="icon-checkbox-partial"></i> Daftar Tim_player</a>
                                        <a class="btn btn-info reset" href="#" >Reset Form</a>
                                    </div> 
                                </div>
                                <div class="panel-body">
                                    <div class="row clearfix">
                                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 kelola" style="display:none">
                                            <div id="form_input" class="">
                                                <?php echo form_open(base_url().'tim_player/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
                                            
                                                <div class="row">
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                        <input type="hidden" value='' id="id_player" name="id_player">
                                                        

                                                        
                                                        <div class="form-group">
                                                                <?php echo form_label('id_tim : ','id_tim',array('class'=>'control-label')); ?>
                                                                <div class="controls">
                                                                    <?php echo form_input('id_tim','','id="id_tim" class="form-control" placeholder="Enter id_tim"'); ?>
                                                                </div>
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                                <?php echo form_label('nama : ','nama',array('class'=>'control-label')); ?>
                                                                <div class="controls">
                                                                    <?php echo form_input('nama','','id="nama" class="form-control" placeholder="Enter nama"'); ?>
                                                                </div>
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                                <?php echo form_label('deskripsi : ','deskripsi',array('class'=>'control-label')); ?>
                                                                <div class="controls">
                                                                    <?php echo form_input('deskripsi','','id="deskripsi" class="form-control" placeholder="Enter deskripsi"'); ?>
                                                                </div>
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                                <?php echo form_label('posisi1 : ','posisi1',array('class'=>'control-label')); ?>
                                                                <div class="controls">
                                                                    <?php echo form_input('posisi1','','id="posisi1" class="form-control" placeholder="Enter posisi1"'); ?>
                                                                </div>
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                                <?php echo form_label('posisi2 : ','posisi2',array('class'=>'control-label')); ?>
                                                                <div class="controls">
                                                                    <?php echo form_input('posisi2','','id="posisi2" class="form-control" placeholder="Enter posisi2"'); ?>
                                                                </div>
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                                <?php echo form_label('tgl_lahir : ','tgl_lahir',array('class'=>'control-label')); ?>
                                                                <div class="controls">
                                                                    <?php echo form_input('tgl_lahir','','id="tgl_lahir" class="form-control" placeholder="Enter tgl_lahir"'); ?>
                                                                </div>
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                                <?php echo form_label('usia : ','usia',array('class'=>'control-label')); ?>
                                                                <div class="controls">
                                                                    <?php echo form_input('usia','','id="usia" class="form-control" placeholder="Enter usia"'); ?>
                                                                </div>
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                                <?php echo form_label('alamat : ','alamat',array('class'=>'control-label')); ?>
                                                                <div class="controls">
                                                                    <?php echo form_input('alamat','','id="alamat" class="form-control" placeholder="Enter alamat"'); ?>
                                                                </div>
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                                <?php echo form_label('kota : ','kota',array('class'=>'control-label')); ?>
                                                                <div class="controls">
                                                                    <?php echo form_input('kota','','id="kota" class="form-control" placeholder="Enter kota"'); ?>
                                                                </div>
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                                <?php echo form_label('no_punggung : ','no_punggung',array('class'=>'control-label')); ?>
                                                                <div class="controls">
                                                                    <?php echo form_input('no_punggung','','id="no_punggung" class="form-control" placeholder="Enter no_punggung"'); ?>
                                                                </div>
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                                <?php echo form_label('tinggi : ','tinggi',array('class'=>'control-label')); ?>
                                                                <div class="controls">
                                                                    <?php echo form_input('tinggi','','id="tinggi" class="form-control" placeholder="Enter tinggi"'); ?>
                                                                </div>
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                                <?php echo form_label('berat : ','berat',array('class'=>'control-label')); ?>
                                                                <div class="controls">
                                                                    <?php echo form_input('berat','','id="berat" class="form-control" placeholder="Enter berat"'); ?>
                                                                </div>
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                                <?php echo form_label('total_score : ','total_score',array('class'=>'control-label')); ?>
                                                                <div class="controls">
                                                                    <?php echo form_input('total_score','','id="total_score" class="form-control" placeholder="Enter total_score"'); ?>
                                                                </div>
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                                <?php echo form_label('datetime : ','datetime',array('class'=>'control-label')); ?>
                                                                <div class="controls">
                                                                    <?php echo form_input('datetime','','id="datetime" class="form-control" placeholder="Enter datetime"'); ?>
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

            </div>
    </div>
</div>


        <div class="row clearfix">
            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">

               
                
            
            </div>
        </div>
        
<!--     </div>
</div> -->
