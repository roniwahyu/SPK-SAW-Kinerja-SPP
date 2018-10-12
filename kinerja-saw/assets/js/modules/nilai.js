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
                { "sClass": "id_nilai","sName": "id_nilai","sWidth": "30px", "aTargets": [0] } ,
                { "sClass": "kode", "sName": "kode", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "nama_pimpinan", "sName": "nama_pimpinan", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "kode_kriteria", "sName": "kode_kriteria", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "nama_kriteria", "sName": "nama_kriteria", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "nilai", "sName": "nilai", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "datetime", "sName": "datetime", "sWidth": "80px", "aTargets": [ 1 ] },
                // { "sClass": "id_pimpinan", "sName": "id_pimpinan", "sWidth": "80px", "aTargets": [ 1 ] },
                // { "sClass": "id_kriteria", "sName": "id_kriteria", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "center", "bSortable": false, "bSearchable": false, "sWidth": "100px","mData": 0,
                    "mDataProp": function(data, type, full) {
                    return "<div class='btn-group'><a href='#outside' data-toggle='tooltip' data-placement='top' title='Edit' class='edit btn btn-xs btn-success' id='"+data[0]+"'><i class='glyphicon glyphicon-edit'></i></a><button data-toggle='tooltip' data-placement='top' title='Hapus' class='delete btn btn-xs btn-danger'id='"+data[0]+"'><i class='glyphicon glyphicon-remove'></i></button>";
                }}
               
            ],
        });
      
});   


  