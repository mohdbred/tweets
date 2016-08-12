$(document).ready(function() {
    $.widget("pch.template", {
        options: {
            form_id: 'form'
        },
        _create: function() {
            var div = this.element.children('div');
            var $link = div.find('a:eq(0)');
            var removeLink = div.find('a:eq(1)');
            var $template = this;
            $link.hide();
            removeLink.hide();
            div.hover(function() {
                $(this).find('a').show();
            }, function() {
                $(this).find('a').hide();
            });
            var dialog = $('#item-data-edit-dialog');
            var url = this.options.url + '/template/item/edit';
            var form_id = this.options.form_id;
            dialog.dialog({
                autoOpen: false,
                modal: true,
                width: 500
            });
            $link.click(function() {
                var $this = $(this);
                var id = $this.attr('data-id');
                dialog.load(url + '/' + id, function() {
                    dialog.dialog('open');
                    var form = $('#' + form_id);
                    form.submit(function(e) {
                        e.preventDefault();
                        var formData = new FormData($(this)[0]);
                        $.ajax({
                            type: 'POST',
                            url: url,
                            data: formData,
                            dataType: 'json',
                            async: false,
                            success: function(result) {
                                dialog.find('.dev-message').remove();
                                dialog.prepend('<div class="dev-message"></div>');
                                if (result.type == 1) {
                                    dialog.dialog('close');
                                    $template._refreshItem($this, id, $template);
                                }
                                else if (result.type == 0) {
                                    dialog.find('.dev-message').html(result.message);
                                }
                            },
                            cache: false,
                            contentType: false,
                            processData: false
                        });
                    });
                });
            });
            removeLink.click(function() {
                $template._removeItemData($(this), $template);
            });
            div.find('a').click(function(e) {
                e.stopPropagation();
            });
            div.click(function() {
                $template._overlay($(this), $template);
            });
        },
        _refreshItem: function($link, id, $template) {
            $.ajax({
                type: 'GET',
                url: this.options.url + '/template/item/refreshitem/' + id,
                success: function(result) {
                    result = JSON.parse(result);
                    var item = $link.parents(':eq(1)');
                    $template._showMessage('Data successfully saved.');
                    var title = item.children('h2');
                    var image = item.children('img');
                    var description = item.children('p');
                    item.attr('data-id', id);
                    $link.html('Edit');
                    $link.siblings('a').html('Remove');
                    if (image.length)
                        image.attr('src', result.image_url);
                    else
                        item.append('<img src="' + result.image_url + '" style="max-height: 196px;">');
                    if (title.length)
                        title.html(result.title);
                    else
                        item.append('<h2 style="left: 50%; position: absolute; text-transform: uppercase; top: 50%; transform: translate(-50%, -50%);">' + result.title + '</h2>');
                    if (description.length)
                        description.html(result.description);
                    else
                        item.append('<p style="display:none">' + result.description + '</p>');
                }
            });
        },
        _removeItemData: function($this, $template) {
            var id = $this.attr('data-id');
            var dialog = $('#item-data-remove-dialog');
            dialog.dialog({
                resizable: false,
                width: 500,
                height: 180,
                modal: true,
                buttons: {
                    "Yes": function() {
                        dialog.dialog("close");
                        $.ajax({
                            type: 'GET',
                            url: $template.options.url + '/template/item/removeitemdata/' + id,
                            success: function(result) {
                                result = JSON.parse(result);
                                $template._showMessage(result.message);
                                if (result.type == 1) {
                                    var item = $this.parents(':eq(1)');
                                    var title = item.children('h2');
                                    var image = item.children('img');
                                    var description = item.children('p');
                                    item.attr('data-id', '');
                                    $this.html('');
                                    $this.siblings('a').html('Add');
                                    image.remove();
                                    title.remove();
                                    description.remove();
                                }
                            }
                        });
                    },
                    "No": function() {
                        dialog.dialog("close");
                    }
                }
            });
        },
        _showMessage: function(message) {
            $('.dev-msg-slide').remove();
            $('body').prepend('<div style="width: 100%; padding:10px; background: yellow; display:none; top: 0; position: fixed; z-index:10" class="dev-msg-slide">' + message + '</div>');
            $('.dev-msg-slide').slideDown().delay(2000).fadeOut();
        },
        _overlay: function($this) {
            var id = $this.attr('data-id');
            if (id) {
                $('body').prepend('<div style="height: 100%; width: 100%; background: #444; opacity: 0.9; z-index:12; position: fixed" class="dev-overlay"><button class="dev-overlay-close" style="float:right">Close</button></div>');
                $('body').css('overflow-y', 'hidden');
                $('.dev-overlay').append('<div style="color: #fff;">' + $this.children('p').html() + '</div>');
                $('.dev-overlay-close').click(function() {
                    $('.dev-overlay').remove();
                    $('body').css('overflow-y', '');
                });
            }
        },
    });
});