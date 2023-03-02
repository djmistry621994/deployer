jQuery.extend(jQuery.fn.dataTable.ext.classes, {
    sWrapper: "dataTables_wrapper dt-bootstrap4",
    sFilterInput:  "form-control form-control-sm",
    sLengthSelect: "form-control form-control-sm"
});

// Override a few defaults
jQuery.extend(true, jQuery.fn.dataTable.defaults, {
    language: {
        lengthMenu: "_MENU_",
        search: "_INPUT_",
        searchPlaceholder: "Search..",
        info: "Page <strong>_PAGE_</strong> of <strong>_PAGES_</strong>",
        paginate: {
            first: '<i class="fa fa-angle-double-left"></i>',
            previous: '<i class="fa fa-angle-left"></i>',
            next: '<i class="fa fa-angle-right"></i>',
            last: '<i class="fa fa-angle-double-right"></i>'
        }
    }
});

datatable = (inputs) => {
    if (inputs['selector'] == undefined) {
        inputs['selector'] = '#js--index-datatable';
    }
    if (inputs['order'] == undefined) {
        inputs['order'] = [0, 'desc'];
    }
    if (inputs.callback == undefined) {
        inputs.callback = function () {
        }
    }
    if (inputs['pageLength'] == undefined) {
        inputs['pageLength'] = 25;
    }
    if (inputs['paginate'] == undefined) {
        inputs['paginate'] = true;
    }
    if (inputs['data'] == undefined) {
        inputs['data'] = function (d) {
        };
    }
    if (inputs['buttons'] == undefined) {
        inputs['buttons'] = [];
    }

    let buttons = [];
    if (inputs['dom'] == undefined) {
        inputs['dom'] = "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>><'row'<'col-sm-12'tr>><'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>"
    }

    if (inputs['url_type'] == undefined || inputs['url_type'] == 'admin') {
        inputs['url'] = admin_ajax_url + inputs['url']
    } else if (inputs['url_type'] != undefined && inputs['url_type'] == 'front') {
        inputs['url'] = ajax_url + inputs['url']
    }

    let datatable = $(inputs['selector']).DataTable({
        ajax: {
            url: inputs['url'],
            data: inputs['data'],
            method: 'post',
        },
        responsive: true,
        searchDelay: 500,
        processing: true,
        serverSide: true,
        lengthMenu: [[10, 25, 100, -1], [10, 25, 100, "All"]],
        paginate: inputs['paginate'],
        columns: inputs['columns'],
        order: [inputs['order']],
        pageLength: inputs['pageLength'],
        buttons: inputs['buttons'],
        dom: inputs['dom'],
        language: {
            "searchPlaceholder": `Search Anything`,
        },
        drawCallback: function (settings) {
            $('[data-toggle="tooltip"]').tooltip();
            inputs.callback(settings);
        },
    });

    let search_element = '#js--custom-search';
    if (inputs['custom_search'] != undefined) {
        search_element = inputs['custom_search'];
    }

    $(document).on('keyup', search_element, function () {
        datatable.search($(this).val()).draw();
    })

    return datatable;
};
