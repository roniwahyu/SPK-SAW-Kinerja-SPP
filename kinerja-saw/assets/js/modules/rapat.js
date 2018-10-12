$(document).ready(function(){


        
        oTable=$('#datatables').dataTable({
            "ajax":{
                "url":baseurl+"getdatatables",
                "dataType": "json"
            },
            "sServerMethod": "POST",
            "bServerSide": true,
            "bAutoWidth": false,
            "bDeferRender": true,
            "bSortClasses": false,
            "bScrollCollapse": true,    
            "bStateSave": true,
            "responsive": true,
            "aoColumns": [
                { "sClass": "rapat_id","sName": "rapat_id","sWidth": "30px", "aTargets": [0] } ,
                { "sClass": "tgl_rapat", "sName": "tgl_rapat", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "semester", "sName": "semester", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "thn_ajaran", "sName": "thn_ajaran", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "thn_ajaran", "sName": "thn_ajaran", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "keterangan", "sName": "keterangan", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "datetime", "sName": "datetime", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "center", "bSortable": false, "bSearchable": false, "sWidth": "100px","mData": 0,
                    "mDataProp": function(data, type, full) {
                    return "<div class='btn-group'><a href='#outside' data-toggle='tooltip' data-remote-target='#outside #peserta' data-load-remote='"+baseurl+"show_pimpinan/"+data[0]+"' role='button' data-placement='top' title='Edit' class='edit btn btn-xs btn-success' id='"+data[0]+"'><i class='glyphicon glyphicon-edit'></i></a>"+
                    '<a  data-toggle="tab" class="detail-pesan btn btn-primary btn-xs" href="#outside"><i class="glyphicon glyphicon-list"></i> Detail</a>'+
                    "<button data-toggle='tooltip' data-placement='top' title='Hapus' class='delete btn btn-xs btn-danger'id='"+data[0]+"'><i class='glyphicon glyphicon-remove'></i></button>";
                }}
               
            ],
        });


    $('body').on('click','[data-load-remote]',function(e) {
        e.preventDefault();
        var $this = $(this);
        var remote = $this.data('load-remote');
        if(remote) {
            $($this.data('remote-target')).load(remote);

        }

    });
    $('body').on('click','#sumbit_pimpinan',function(e) {
        e.preventDefault();
    });
      
});   


  