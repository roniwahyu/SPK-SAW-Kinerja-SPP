<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
   <div class="row"> 

        <form action="<?php echo base_url('wizard/penilaian')?> " method="POST" role="form">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <legend>Form Penilaian</legend>

        <div class="form-group">
           
            <input name="id_rapat" type="hidden" class="form-control" id="id_rapat" placeholder="Input field" value="<?php echo isset($id_rapat)?$id_rapat:'' ?>">
            <input name="id_pimpinan" type="hidden" class="form-control" id="id_pimpinan" placeholder="Input field" value="<?php echo isset($id_pimpinan)?$id_pimpinan:'' ?>">
        </div>
        </div>
        
        <?php if(isset($saw)): 
            foreach ($saw as $key => $value) {
                # code...
                // echo var_dump($value);
            
        ?>
        <div class="col-md-3 text-center">
            <div class="form-group">
                <h3 class="knob-label"><?php echo $value['nama_kriteria'] ?></h3>
                <div class="knob-input" style="">
                    <!-- <canvas width="150" height="200"></canvas> -->
                    <input name="knob[<?php echo $key ?>]" value="0" data-id="<?php echo $value['id_kriteria']?>" data-bgcolor="#fcfcfc" data-fgcolor="#ff9900" data-cursor="true" data-width="150" class="knob knob-green" style="">
                </div>                                        
            </div>
        </div>
        <?php 
            }
            endif;

         ?>
    </div>
    
    <div class="row">
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
            
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
             <button type="submit" class="btn btn-primary btn-lg btn-block">Kirim Penilaian</button>
       
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
            
        </div>
    </div>
</div>
</form>
