/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function () {
    $('.icon-refresh-fix').click(function () {
        location.reload();
    });

    $("ul.mode-select li").click(function () {
        var idLi = $(this).attr('id');
        if ($("li#" + idLi + " span").hasClass("active")) {
            $("li#" + idLi + " span").removeClass("active");
        } else {
            $("li#" + idLi + " span").addClass("active");
        }
    });

    $('#report_from').datetimepicker({
        format: 'Y-m-d H:i:s',
        step: 5,
    });

    $('#report_to').datetimepicker({
        format: 'Y-m-d H:i:s',
        step: 5,
    });
});

function setImageUrl(path, url) {
    $('#image_path').val(path);
    $("#img_model_id").attr("src", url);
}

function addVideoToList(listId) {
    $('#video-modal').modal('show').find('#model-content').load('/video-playlist/list?id=' + listId);
}

function setPumpMode(id, val) {
    $('#' + id + '_auto').removeClass('active');
    $('#' + id + '_manual').removeClass('active');
    $('#' + id + '_mode').val(val);
    if (val == '00000000') {
        $('#' + id + '_select').prop('disabled', 'disabled');
        $('#' + id + '_select').val(0);
        $('#' + id + '_time').val('00000000');
    } else {
        $('#' + id + '_select').prop('disabled', false);
    }


}

function setPumpPump(id, val) {
    var all = '00000011';
    var slave = '00000000';
    var master = '00000001';
    var current = $('#' + id + '_pump').val();
    var mode = $('#' + id + '_mode').val();

    if (mode == '00000000') {//manual
        if (val == slave && current == all) {
            $('#' + id + '_pump').val(master);
        } else if (val == master && current == all) {
            $('#' + id + '_pump').val(slave);
        } else if (val == master && current == slave) {
            $('#' + id + '_pump').val(all);
        } else if (val == slave && current == slave) {
            $('#' + id + '_pump').val(slave);
            $('#' + id + '_slave').removeClass("active");
        } else if (val == slave && current == master) {
            $('#' + id + '_pump').val(all);
        } else if (val == master && current == master) {
            $('#' + id + '_pump').val(master);
            $('#' + id + '_master').removeClass("active");
        }
    } else {
        $('#' + id + '_pump').val(val);
        //  $('#'+id+'_master').removeClass("active");
        //  $('#'+id+'_slave').removeClass("active");
        if (val == '00000000') {
            $("#" + id + "_master").removeClass("active");
        } else {
            $("#" + id + "_slave").removeClass("active");
        }
    }

}

function changePumpTime(id) {
    $('#' + id + '_time').val($('#' + id + '_select').val());
}

function loadManagerInfo() {
    console.log("reload module data");
    var id = $("#module-id").val();
    $.get("/index.php/modules/loadinfo?id=" + id, {}, function (data) {
        var values = JSON.parse(data);
        $("#money-info").html(values.money);
        $("#data-info").html(values.data);

    });

}
