(function($){
    "use strict";
    $('.get_channel_data').click(function(){
        var value = $(".get_v_data").val();
        var token = $('input[name="_token"]').val();
        $('.loading_gif').css('display', 'inline-block');
        $.ajax({
            type: "POST",
            url: "/admin/get_channels",
            data: {url : value,'_token':token},
            success: function(data){
                $('.loading_gif').css('display', 'none');
                $('.channel_all_data').html(data);
            }
        });
        return false;
    });

    $(document).on('click','.add_video', function(){
        var __this = $(this);
        var id = $(this).attr('id');
        var channel_id = $(this).parents('tr').find('.channel_id').val();
        var video_title = $(this).parents('tr').find('.video_title').html();
        var video_description = $(this).parents('tr').find('.video_description').html();
        var video_url = $(this).parents('tr').find('.video_url').html();
        var channel_title = $(this).parents('tr').find('.channel_title').html();

        var token = $('input[name="_token"]').val();
        $.ajax({
            type: "POST",
            url: "/admin/create_video",
            data: {
                id : id,
                channel_id : channel_id,
                title : video_title,
                description : video_description,
                url : video_url,
                channel_title : channel_title,
                '_token':token
            },
            success: function(data){
                if(data == 1){
                    __this.html('Added');
                    __this.attr('disabled', true);
                }
            }
        });
        return false;
    });

    $(document).on('click','.add_channel', function(){
        var __this = $(this);
        var channel_category = $('.channel_category').val();
        var id = $(this).attr('id');
        var channel_thumb = $('.channel_thumb').attr('src');
        var channel_title = $('.channel_title').html();
        var channel_description = $('.channel_description').html();
        var channel_url = $('.channel_url').html();

        var token = $('input[name="_token"]').val();
        $.ajax({
            type: "POST",
            url: "/admin/create_channel",
            data: {
                id : id,
                channel_thumb : channel_thumb,
                channel_title : channel_title,
                channel_description : channel_description,
                channel_url : channel_url,
                channel_category : channel_category,
                '_token':token
            },
            success: function(data){
                if(data == 1){
                    __this.html('Added');
                    __this.attr('disabled', true);
                }
            }
        });
        return false;
    });


    $('#datetimepicker_start').datetimepicker({
        pickDate: false
    });

    $('#datetimepicker_end').datetimepicker({
        pickDate: false
    });


})(jQuery);