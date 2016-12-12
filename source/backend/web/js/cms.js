/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function () {
    $('#productcategories-parent_id').change(function () {
        var val = parseInt($(this).val());
        if (val > 0) {
            $.ajax({
                url: '/product-categories/type',
                type: 'get',
                data: {
                    id: val
                },
                success: function (data) {
                    data = parseInt(data);
                    if (data > 0) {
                        $('#productcategories-display_type option').each(function () {
                            var $this = $(this); // cache this jQuery object to avoid overhead
                            if (parseInt($this.val()) == data) { // if this option's value is equal to our value
                                $this.prop('selected', 'selected'); // select this option
                                $('#productcategories-display_type').prop('disabled', true);
                                return false; // break the loop, no need to look further
                            }
                        });
                    }
                }
            });
        } else {
            $('#productcategories-display_type').prop('disabled', false);
        }
    });

    $('#productcatuserattribute-type').change(function () {
        if (parseInt($(this).val()) == 2) {
            $('#productcatuserattribute-data').prop('disabled', false);
        } else {
            $('#productcatuserattribute-data').prop('disabled', true);
            $('#productcatuserattribute-data').val('');
        }
    });

    $('#videocategory-is_active').click(function () {
        if (!$(this).prop('checked')) {
            if (confirm("Deactive category thì toàn bộ video trong category cũng sẽ deactive\nBạn có chắc muốn thực hiện?")) {
                return true;
            } else {
                $(this).prop('checked', true);
                return;
            }
        }
    });

    $('#vtarticlecategories-is_active').click(function () {
        if (!$(this).prop('checked')) {
            if (confirm("Deactive danh mục thì toàn bộ tin tức trong danh mục cũng sẽ deactive\nBạn có chắc muốn thực hiện?")) {
                return true;
            } else {
                $(this).prop('checked', true);
                return;
            }
        }
    });

    $('#video-active-id').click(function () {
        var ids = '';
        $('input:checkbox:checked').each(function () {
            ids = ids + $(this).val() + ',';
        });
        if (ids != '') {
            if (confirm('Ban co chac muon them?')) {
                var csrfToken = $('meta[name="csrf-token"]').attr("content");
                var playlist_id = $(this).attr('playlist_id');
                $.ajax({
                    method: "POST",
                    url: "/video-playlist/add-video-to-list",
                    data: {ids: ids, playlist_id: playlist_id, _csrf: csrfToken}
                });
            }
        } else {
            alert('Ban chua chon ban ghi nao!');
        }
    });
    $('a.remove-video-playlist').click(function () {
        if (confirm('Ban co chac muon xoa video nay?')) {
            window.location.href = $(this).attr('href');
        }
        return false;
    });

    $('#approve-video-id').click(function () {
        var ids = '';
        var csrfToken = $('meta[name="csrf-token"]').attr("content");
        $('input:checkbox:checked').each(function () {
            ids = ids + $(this).val() + ',';
        });
        if (ids != '') {
            if (confirm('Ban co chac muon kiem duyet?')) {
                $.ajax({
                    method: "POST",
                    url: "/video/active",
                    data: {ids: ids, _csrf: csrfToken}
                });
            }
        } else {
            alert('Ban chua chon ban ghi nao!');
        }
    });

    $('#approve-article-id').click(function () {
        var ids = '';
        var csrfToken = $('meta[name="csrf-token"]').attr("content");
        $('input:checkbox:checked').each(function () {
            ids = ids + $(this).val() + ',';
        });
        if (ids != '') {
            if (confirm('Ban co chac muon kiem duyet?')) {
                $.ajax({
                    method: "POST",
                    url: "/article-items/active",
                    data: {ids: ids, _csrf: csrfToken}
                });
            }
        } else {
            alert('Ban chua chon ban ghi nao!');
        }
    });

    $("ul.mode-select li").click(function(){
        var idLi = $(this).attr('id');
        if ($("li#" + idLi + " span").hasClass("active")) {
            $("li#" + idLi + " span").removeClass("active");
        } else {
            $("li#" + idLi + " span").addClass("active");
        }
    });

    $('#report_from').datetimepicker({
      format: 'Y-m-d H:i:s',
      step:5,
    });

    $('#report_to').datetimepicker({
      format: 'Y-m-d H:i:s',
      step:5,
    });
});

function setImageUrl(path, url) {
    $('#image_path').val(path);
    $("#img_model_id").attr("src", url);
}

function addVideoToList(listId) {
    $('#video-modal').modal('show').find('#model-content').load('/video-playlist/list?id=' + listId);
}

function setPumpMode(id,val){
  $('#'+id+'_auto').removeClass('active');
  $('#'+id+'_manual').removeClass('active');
  $('#'+id+'_mode').val(val);
  if(val == '00000000'){
      $('#'+id+'_select').prop('disabled','disabled');
      $('#'+id+'_select').val(0);
      $('#'+id+'_time').val('00000000');
  } else {
    $('#'+id+'_select').prop('disabled',false);
  }


}

function setPumpPump(id,val) {
    var all = '00000011';
    var slave = '00000000';
    var master = '00000001';
    var current = $('#'+id+'_pump').val();
    var mode = $('#'+id+'_mode').val();

    if(mode == '00000000'){//manual
      if(val == slave && current == all){
        $('#'+id+'_pump').val(master);
      } else if(val == master && current == all){
        $('#'+id+'_pump').val(slave);
      } else if (val == master && current == slave) {
        $('#'+id+'_pump').val(all);
      }else if (val == slave && current == slave) {
        $('#'+id+'_pump').val(slave);
        $('#'+id+'_slave').removeClass("active");
      }else if (val == slave && current == master) {
        $('#'+id+'_pump').val(all);
      }else if (val == master && current == master) {
        $('#'+id+'_pump').val(master);
        $('#'+id+'_master').removeClass("active");
      }
    } else {
       $('#'+id+'_pump').val(val);
      //  $('#'+id+'_master').removeClass("active");
      //  $('#'+id+'_slave').removeClass("active");
       if(val == '00000000'){
         $("#"+id+"_master").removeClass("active");
       } else {
         $("#"+id+"_slave").removeClass("active");
       }
    }

}

function changePumpTime(id) {
  $('#'+id+'_time').val($('#'+id+'_select').val());
}

function loadManagerInfo(){
  console.log("reload module data");
  var id = $("#module-id").val();
  $.get("/index.php/modules/loadinfo?id="+id,{},function(data){
    var values = JSON.parse(data);
    $("#money-info").html(values.money);
    $("#data-info").html(values.data);

  });

}
