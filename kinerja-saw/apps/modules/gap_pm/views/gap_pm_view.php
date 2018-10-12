<div class="row">
    <h1>Kelola GAP Profile Matching</h1>
    <div class="tabbable page-tabs">
        <ul class="nav nav-tabs">
            <li class="daftar active"><a href="#inside" data-toggle="tab"><i class="icon-checkbox-partial"></i> Daftar GAP Profile Matching</a></li>
            <li class="baru"><a href="#outside" data-toggle="tab"><i class="icon-plus"></i> Tambah GAP Profile Matching Baru</a></li>
        </ul>
        <div class="tab-content">
                    
                    <!-- First tab content -->
                    <div class="tab-pane active fade in" id="inside">
                        <!-- AJAX source -->

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h6 class="panel-title"><i class="icon-table"></i> Daftar GAP Profile Matching</h6> 
                                <div class="btn-group pull-right">
                                    <a href="#outside" data-toggle="tab" class="baru btn btn-success"><i class="icon-plus"></i> Tambah GAP Profile Matching Baru</a>
                                </div> 
                            </div>
                            <div class="datatable-ajax-source">
                                <table id="datatables" class="table table-bordered table-condensed table-striped" style="">
                                    <thead class="">
                                        <tr>
                                                        <th>ID</th>
                                                        <th>Keterangan</th>
                                                        <th> A </th>
                                                        <th> B </th>
                                                        <th> C </th>
                                                        <th> D </th>
                                                        <th> E </th>
                                                        <th> F </th>
                                                        <th> G </th>
                                                        <th>Datetime</th>
                                                        <th>Aksi</th>

                                                    </tr>
                                    </thead>

                                    <tbody class="table-bordered">
                                        <tr>
                                            <td colspan="11" class="dataTables_empty"><img src="<?php echo assets_url('images/loader.gif');  ?>" title="Loading" alt="Loading">&nbsp;&nbsp; Loading data...</td>
                                            
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /saving state -->

                    </div>
                    <!-- /first tab content -->


                   <?php $this->load->view('gap_pm_form') ?>

            </div>
    </div>
</div>


        <div class="row clearfix">
            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">

               
                
            
            </div>
        </div>
        
<!--     </div>
</div> -->
