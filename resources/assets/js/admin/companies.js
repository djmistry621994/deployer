const companies = {
    el: {
        delete_element: '.js--delete-element'
    },

    data: {
        datatable: {
            url: datatable_url,
            columns: datatable_columns,
        },
        dtable: ''
    },

    init() {
        const _this = this;
        _this.bindUiActions();
    },

    bindUiActions() {
        const _this = this;

        let datatable_inputs = _this.data.datatable;
        _this.data.dtable = datatable(datatable_inputs);

        $(document).on('click', _this.el.delete_element, function (e) {
            e.preventDefault();
            let inputs = {
                title: $(this).data('title'),
                message: $(this).data('message'),
                url: $(this).data('url'),
                callback: function (data) {
                    if (data['status']) {
                        _this.data.dtable.draw(false);
                    }
                }
            };
            console.log(inputs);
            delete_element(inputs);
        });
    }
};

companies.init();
