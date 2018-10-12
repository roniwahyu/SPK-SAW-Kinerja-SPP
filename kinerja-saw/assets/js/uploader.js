function reloadFiles() {
    $.ajax({
        url: baseurl+'filebrowse/',
        dataType: 'json',
        success: function(data) {
            var html = [];
            // var baseurl="http://localhost/ci-smpn203/admin/files/";
            for (var i = 0, len = data.files.length; i < len; i++) {
                var file = data.files[i];
                html.push('<tr>\
                        <td class="preview"><img src="' +file.url + '" /></td>\
                        <td class="name">' + file.name + '</td>\
                        <td class="size">' + (file.size / 1024 / 1024).toFixed(2) + 'MB</td>\
                        <td class="action">\
                            <a class="edit btn btn-success btn-xs" href="files"><i class="icon-pencil"></i> Edit</a>\
                            <a class="delete btn btn-danger btn-xs" href="#" data-url="' + file.delete + '" data-file="' + file.name + '">Hapus</a>\
                        </td>\
                    </tr>');
            };
            $('#FILEUPLOAD .files .table').html(html.join());
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            alert('Masalah pada server.\nSilakan Coba lagi beberapa menit berikutnya.');
        }
    });
};



$(function() {
    // $('#FILEUPLOAD').css('width', '542px');
    
    $('#FILEUPLOAD input[type=file]').fileupload({
        dataType: 'json',
        start: function(e, data) {
            $('#FILEUPLOAD .fileupload-progress').toggleClass('in');
        },
        stop: function(e, data) {
            $('#FILEUPLOAD .fileupload-progress').toggleClass('in')
                .find('.progress').attr('aria-valuenow', '0')
                .find('.bar').css('width', '0%');
        },
        done: function(e, data) {
            reloadFiles();
        },
        progress: function(e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $('#FILEUPLOAD .progress .bar').css('width', progress + '%');
        }
    });
    
   
    
    $('#FILEUPLOAD').delegate('.files .delete', 'click', function(e) {
        e.preventDefault();
        
        var el = $(this);
        var url = el.attr('data-url');
        var file = el.attr('data-file');
        $.ajax({
            type: 'POST',
            url: url,
            contentType : 'application/x-www-form-urlencoded; charset=UTF-8',
            dataType: 'json',
            data: {'file': file},
            success: function(data) {
                el.parent().parent().remove();
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                alert('서버에 문제가 생겼습니다.\n잠시후에 다시 시도해 주세요.');
            }
        });
        
        return false;
    });
    
    reloadFiles();
});