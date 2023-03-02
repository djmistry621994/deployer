$.validator.setDefaults({
    ignore: '.note-editor *',
});

$.validator.addMethod("regex", function (value, element) {
        let regexp = /^(?:(?:https?|ftp):\/\/)?(?:(?!(?:10|127)(?:\.\d{1,3}){3})(?!(?:169\.254|192\.168)(?:\.\d{1,3}){2})(?!172\.(?:1[6-9]|2\d|3[0-1])(?:\.\d{1,3}){2})(?:[1-9]\d?|1\d\d|2[01]\d|22[0-3])(?:\.(?:1?\d{1,2}|2[0-4]\d|25[0-5])){2}(?:\.(?:[1-9]\d?|1\d\d|2[0-4]\d|25[0-4]))|(?:(?:[a-z\u00a1-\uffff0-9]-*)*[a-z\u00a1-\uffff0-9]+)(?:\.(?:[a-z\u00a1-\uffff0-9]-*)*[a-z\u00a1-\uffff0-9]+)*(?:\.(?:[a-z\u00a1-\uffff]{2,})))(?::\d{2,5})?(?:\/\S*)?$/;
        var re = new RegExp(regexp);
        return this.optional(element) || re.test(value);
    }, words.url_validation_message
);

$.validator.addMethod("password_match", function (value, element) {
    let status = true;
    if (value != '') {
        const password_min = 6;
        if (value.length < password_min) {
            status = false;
        }

        //capital
        if (!(/(?=.*?[A-Z])/.test(value))) {
            status = false;
        }
    }
    return status;
}, words.password_validation);

$.validator.addMethod("custom_email", function (value, element) {
    if (value != '') {
        return /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/.test(value);
    } else {
        return true;
    }
}, words.enter_valid_email);

valGetParentContainer = (element) => {
    element = $(element);

    if ($(element).closest('.form-group-sub').length > 0) {
        return $(element).closest('.form-group-sub')
    } else if ($(element).closest('.bootstrap-select').length > 0) {
        return $(element).closest('.bootstrap-select')
    } else {
        return $(element).closest('.form-group');
    }
}

messageShowing = (error, element) => {
    let group = valGetParentContainer(element);
    let help = group.find('.form-text');

    if (group.find('.valid-feedback, .invalid-feedback').length !== 0) {
        return;
    }

    element.addClass('is-invalid');
    error.addClass('invalid-feedback');

    if (help.length > 0) {
        help.before(error);
    } else {
        if ($(element).parent().find('#js--error-text').length > 0) {
            $(element).parent().find('#js--error-text').html(error);
            $(element).parent().find('#js--error-text').show();
        } else if ($(element).hasClass('js--select2')) {
            $(element).parent().find('#js--error-text').html(error);
            $(element).parent().find('#js--error-text').show();
        } else if ($(element).hasClass('js--switch')) {
            $(element).parent().parent().parent().find('#js--error-text').html(error);
            $(element).parent().parent().parent().find('#js--error-text').show();
        } else {
            element.after(error);
        }
    }
};

serverNameToFront = (name) => {
    let parts = name.split('.');
    if (parts.length > 1) {
        let str = '';
        for (let i in parts) {
            if (parseInt(i) === 0) {
                str += parts[i];
            } else {
                str += '[' + parts[i] + ']';
            }
        }
        name = str;
    }
    return name;
};

displayErrorMessages = (errors, form) => {
    for (let i in errors) {
        let error = errors[i];
        let name = serverNameToFront(i);
        error = $(`<label class="error invalid-feedback" id="${name}-error" for="${name}">
                        ${error}
                    </label>`);
        messageShowing(error, $(form).find('[name="' + name + '"]'));
    }
}

validateForm = (inputs) => {
    //if form has already validator package remove it and unbind it
    $(inputs.form).data('validator', null);
    $(inputs.form).unbind();

    if (inputs.messages == undefined) {
        inputs.messages = {};
    }

    let validator = $(inputs.form).validate({
        rules: inputs.rules,

        messages: inputs.messages,

        errorElement: 'span',

        highlight: function (element) {
            if (inputs['highlight'] != undefined) {
                inputs['highlight'](element);
            }
        },

        invalidHandler: function (form, validator) {
            if (inputs.on_validation_toastr != undefined && inputs.on_validation_toastr != '') {
                toastr.error(inputs.on_validation_toastr);
            }
        },

        // unhighlight: function (element) { // <-- fires when element is valid
        //     $(element).removeClass('error').removeClass('is-invalid');
        // },

        errorPlacement(error, element) {
            if (inputs['beforeErrorPlacement'] != undefined) {
                inputs['beforeErrorPlacement'](error, element);
            }

            element = $(element);

            if ($(element).prop('type') == 'radio') {
                let name = $(element).prop('name')
                $(`#js--${name}-error`).html(error);
            } else if ($(element).hasClass('js--select2')) {
                $(element).parent().find('#js--error-text').html(error);
                $(element).parent().find('#js--error-text').show();
            } else if ($(element).hasClass('js--image-2')) {
                $(element).parent().parent().find('#js--error-text').html(error);
                $(element).parent().parent().find('#js--error-text').show();
            } else if ($(element).attr('name') == 'tonnes') {
                $(element).parent().parent().find('#js--error-text').html(error);
                $(element).parent().parent().find('#js--error-text').show();
            } else if ($(element).attr('name') == 'rights') {
                $(element).parent().parent().find('#js--error-text').html(error);
                $(element).parent().parent().find('#js--error-text').show();
            } else if ($(element).hasClass('js--vehicle-class')) {
                $(element).parent().parent().find('#js--error-text').html(error);
                $(element).parent().parent().find('#js--error-text').show();
            } else if ($(element).hasClass('js--city-from-class')) {
                $(element).parent().parent().find('#js--error-text').html(error);
                $(element).parent().parent().find('#js--error-text').show();
            } else if ($(element).hasClass('js--city-to-class')) {
                $(element).parent().parent().find('#js--error-text').html(error);
                $(element).parent().parent().find('#js--error-text').show();
            } else {
                messageShowing(error, element);
            }

            if (inputs['onErrors'] != undefined) {
                inputs['onErrors']();
            }
        },

        submitHandler(form) {
            if (inputs.block) {
                $(inputs.form).find('button').prop('disabled', true);
                block_page();
            }
            if (inputs.submit_type != undefined && inputs.submit_type == 'normal') {
                let status = true;
                if (inputs['before_form_submit'] != undefined) {
                    status = inputs['before_form_submit']();
                }
                if (status) {
                    form.submit();
                    if (inputs['onErrors'] != undefined) {
                        inputs['onErrors']();
                    }
                }
            } else if (inputs.submit_type != undefined && inputs.submit_type == 'function') {
                if (inputs.block) {
                    $(inputs.form).find('button').prop('disabled', false);
                    unblock_page();
                }
                if (inputs['onSuccess'] != undefined) {
                    inputs['onSuccess']();
                }
            } else {
                $(form).find('.has-danger').removeClass('has-danger');
                // $(form).find('.invalid-feedback').remove();
                // $(form).find('.is-invalid').removeClass('is-invalid');
                if (inputs.url != '' && inputs.url != undefined) {
                    let url = '';
                    if (inputs.url_type !== undefined && inputs.url_type == 'front') {
                        url += ajax_url + inputs.url;
                    } else if (inputs.url_type !== undefined && inputs.url_type == 'route') {
                        url += inputs.url;
                    } else {
                        url += admin_ajax_url + inputs.url;
                    }
                    let status = true;
                    if (inputs['before_form_submit'] != undefined) {
                        status = inputs['before_form_submit']();
                    }
                    if (status) {
                        var form_data = new FormData($(form)[0]);

                        if (inputs.method == 'put' || inputs.method == 'PUT') {
                            form_data.append('_method', 'PUT');
                            inputs.method = 'post';
                        }
                        $.ajax({
                            dataType: 'json',
                            method: inputs.method,
                            url: url,
                            data: form_data,
                            processData: false,
                            contentType: false,
                            success: function (data) {
                                if (inputs.block) {
                                    $(inputs.form).find('button').prop('disabled', false);
                                    unblock_page();
                                }
                                inputs.callback(data);
                            },
                            error: function (jqXHR) {
                                if (inputs.block) {
                                    $(inputs.form).find('button').prop('disabled', false);
                                    unblock_page();
                                }
                                if (inputs['onErrors'] != undefined) {
                                    inputs['onErrors']();
                                }
                                let response = jqXHR.responseJSON.errors;
                                displayErrorMessages(response, form);
                                if (inputs['afterErrors'] != undefined) {
                                    inputs['afterErrors'](response);
                                }
                            }
                        });
                    } else {
                        if (inputs.block) {
                            $(inputs.form).find('button').prop('disabled', false);
                            unblock_page();
                            if (inputs['onErrors'] != undefined) {
                                inputs['onErrors']();
                            }
                        }
                    }
                } else {
                    inputs.callback($(form).serializeArray());
                }
            }
        }
    });
}
