const company_create = {
    el: {
        form: '#js--form'
    },

    data: {},

    init() {
        const _this = this;
        _this.bindUiActions();

        if (show_page) {
            $(_this.el.form).find('input').prop('disabled', true);
            $(_this.el.form).find('button').remove();
        }
    },

    bindUiActions() {
        const _this = this;
        _this.validation();
    },

    rules() {
        return {
            name: {required: true},
            email: {required: true},
            web: {required: true, url: true},
        };
    },
    validation() {
        const _this = this;
        const inputs = {
            form: _this.el.form,
            url: 'companies',
            method: 'post',
            rules: _this.rules(),
            block: true,
            callback: _this.onSuccess,
        };
        validateForm(inputs)
    },
    onSuccess(res) {
        const _this = company_create;
        if (res.status) {
            window.location.href = res.redirect;
        }
    },
};

company_create.init();
