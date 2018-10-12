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
                { "sClass": "id_range_nilai","sName": "id_range_nilai","sWidth": "30px", "aTargets": [0] } ,
                { "sClass": "range", "sName": "range", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "nilai", "sName": "nilai", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "bobot", "sName": "bobot", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "minvalue", "sName": "minvalue", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "maxvalue", "sName": "maxvalue", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "method", "sName": "method", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "datetime", "sName": "datetime", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "center", "bSortable": false, "bSearchable": false, "sWidth": "100px","mData": 0,
                    "mDataProp": function(data, type, full) {
                    return "<div class='btn-group'><a href='#outside' data-toggle='tooltip' data-placement='top' title='Edit' class='edit btn btn-xs btn-success' id='"+data[0]+"'><i class='glyphicon glyphicon-edit'></i></a><button data-toggle='tooltip' data-placement='top' title='Hapus' class='delete btn btn-xs btn-danger'id='"+data[0]+"'><i class='glyphicon glyphicon-remove'></i></button>";
                }}
               
            ],
        });
      
});   


  