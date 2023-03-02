const login = {
    el: {
        form: '#js--form'
    },

    data: {},

    init() {
        const _this = this;
        _this.bindUiActions();
    },

    bindUiActions() {
        const _this = this;

        let inputs = {
            form: _this.el.form,
            rules: {
                email: {required: true},
                password: {required: true},
            },
            submit_type: 'normal'
        };
        validateForm(inputs);
    }
};

login.init();
