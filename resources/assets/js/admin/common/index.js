block_page = () => {
    const _this = this;
    One.loader('show')
};

unblock_page = () => {
    const _this = this;
    One.loader('hide')
}

alert_showing = (message, type) => {
    const _this = this;
    if (typeof type == 'boolean') {
        if (type) {
            type = 'success';
        } else {
            type = 'danger';
        }
    }
    if (type == 'success') {
        toastr.success(message)
    } else {
        toastr.warning(message)
    }
}

delete_element = (inputs) => {
    let title = inputs['title'];
    let message = inputs['message'];
    let url = inputs['url'];
    let confirm_text = words.yes_delete_it;
    let method = 'delete';
    let reason = false;
    let link = false;
    if (inputs['confirm_title'] != undefined) {
        confirm_text = inputs['confirm_title'];
    }
    if (inputs['method'] != undefined) {
        method = inputs['method'];
    }
    if (inputs['reason'] != undefined) {
        reason = inputs['reason'];
    }
    if (inputs['link'] != undefined) {
        link = inputs['link'];
    }
    swal.fire({
        title: title,
        text: message,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: confirm_text,
        // customClass: {
        //     confirmButton: ' btn btn-light-danger',
        //     cancelButton: ' btn btn-light-grey',
        // }
    }).then(function (result) {
        if (result.value) {
            $.ajax({
                dataType: "json",
                method: method,
                url: url,
                success: function (data) {
                    inputs.callback(data);
                }
            });
        }
    });
}

confirm_element = (inputs) => {
    let title = inputs['title'];
    let message = inputs['message'];
    let url = inputs['url'];
    let confirm_text = words.yes;
    let method = 'delete';
    let reason = false;
    let link = false;
    if (inputs['confirm_title'] != undefined) {
        confirm_text = inputs['confirm_title'];
    }
    if (inputs['method'] != undefined) {
        method = inputs['method'];
    }
    if (inputs['reason'] != undefined) {
        reason = inputs['reason'];
    }
    if (inputs['link'] != undefined) {
        link = inputs['link'];
    }
    swal.fire({
        title: title,
        text: message,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: confirm_text,
    }).then(function (result) {
        if (result.value) {
            $.ajax({
                dataType: "json",
                method: method,
                url: url,
                success: function (data) {
                    inputs.callback(data);
                }
            });
        }
    });
}

status_change = (table, id, callback) => {
    if (table != '') {
        $.ajax({
            dataType: 'json',
            method: 'post',
            url: `${admin_ajax_url}status/${table}/${id}/toggle`,
            success(data) {
                callback(data);
            }
        });
    }
}

headerCount = () => {
    const _this = this;
    let menus = $('.js--header-menu');
    $(menus).each(function (index, value) {
        let table = $(value).attr('data-table');
        if (table != '') {
            $.ajax({
                dataType: 'json',
                method: 'post',
                url: `${admin_ajax_url}table-count/${table}`,
                success(data) {
                    $(`.js--header-count-${table}`).text('(' + data.count + ')');
                }
            });
        }
    });
}

const common = {
    el: {},

    data: {},

    init() {
        const _this = this;

        $.ajaxSetup({
            headers: {'X-CSRF-Token': $('meta[name=_token]').attr('content')}
        });

        headerCount();
        _this.bindUiActions();

        $.ajaxSetup({
            headers: {'X-CSRF-Token': $('meta[name=_token]').attr('content')}
        });
        $('iframe').each(function (key, item) {
            let figure = $(item).closest('figure');
            if (figure.length > 0) {
                $(figure).css('height', '50vh');
                $('[data-oembed-url]').css('width', '100vw')
            }
        })
    },

    bindUiActions() {
        const _this = this;

        $(document).on('keypress', '.js--mobile', function (e) {
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                return false;
            }
        })

        $(document).on('click', '.js--open-link', function () {
            window.open($(this).data('url'), '_blank');
        })

        $(document).on('click', '#js--back-button', function (e) {
            e.preventDefault();
            window.history.back();
        });

        $(document).on('click', '.js--reset-button', function (e) {
            $('input').removeClass('is-invalid');
            $('textarea').removeClass('is-invalid');
            $('.error').text('');
        })
    },
}
common.init();
