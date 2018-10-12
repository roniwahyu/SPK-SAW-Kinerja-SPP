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
                { "sClass": "id_gap","sName": "id_gap","sWidth": "30px", "aTargets": [0] } ,
                { "sClass": "kriteria", "sName": "kriteria", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "a_prestasi", "sName": "a_prestasi", "sWidth": "40px", "aTargets": [ 1 ] },
                { "sClass": "b_keaktifan", "sName": "b_keaktifan", "sWidth": "40px", "aTargets": [ 1 ] },
                { "sClass": "c_kehadiran", "sName": "c_kehadiran", "sWidth": "40px", "aTargets": [ 1 ] },
                { "sClass": "c_kehadiran", "sName": "c_kehadiran", "sWidth": "40px", "aTargets": [ 1 ] },
                { "sClass": "c_kehadiran", "sName": "c_kehadiran", "sWidth": "40px", "aTargets": [ 1 ] },
                { "sClass": "c_kehadiran", "sName": "c_kehadiran", "sWidth": "40px", "aTargets": [ 1 ] },
                { "sClass": "c_kehadiran", "sName": "c_kehadiran", "sWidth": "40px", "aTargets": [ 1 ] },
                { "sClass": "datetime", "sName": "datetime", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "center", "bSortable": false, "bSearchable": false, "sWidth": "100px","mData": 0,
                    "mDataProp": function(data, type, full) {
                    return "<div class='btn-group'><a href='#outside' data-toggle='tooltip' data-placement='top' title='Edit' class='edit btn btn-xs btn-success' id='"+data[0]+"'><i class='glyphicon glyphicon-edit'></i></a><button data-toggle='tooltip' data-placement='top' title='Hapus' class='delete btn btn-xs btn-danger'id='"+data[0]+"'><i class='glyphicon glyphicon-remove'></i></button>";
                }}
               
            ],
        });
      
});   


  