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
                { "sClass": "id","sName": "id","sWidth": "30px", "aTargets": [0] } ,
                { "sClass": "username", "sName": "username", "sWidth": "80px", "aTargets": [ 1 ] },
                 { "sClass": "first_name", "sName": "first_name", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "last_name", "sName": "last_name", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "email", "sName": "email", "sWidth": "80px", "aTargets": [ 1 ] },
                {  "sClass": "center", "sWidth": "100px","mData": 0,"mDataProp": function(data, type, full) {
                    if(data[5]==1){
                        return "<a class='btn btn-success btn-xs'>Aktif</a>";
                    }else{
                        return "<a class='btn btn-danger btn-xs'>Tidak Aktif</a>";
 
                    }
                     }},

               { "sClass": "center", "bSortable": false, "bSearchable": false, "sWidth": "100px","mData": 0,
                    "mDataProp": function(data, type, full) {
                    return "<div class='btn-group'><a href='"+authurl+"edit_user/"+data[0]+"' data-toggle='tooltip' data-placement='top' title='Edit' class='xedit btn btn-xs btn-success' id='"+data[0]+"'><i class='glyphicon glyphicon-edit'></i></a>"+
                    "<button data-toggle='tooltip' data-placement='top' title='Hapus' class='delete btn btn-xs btn-danger' id='"+data[0]+"'><i class='glyphicon glyphicon-remove'></i></button>";
                    
                }}
               
            ],
        });
      
});   


  