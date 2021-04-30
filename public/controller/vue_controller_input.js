/* INPUT COMPONENTS */

/* TEXT */
Vue.component("input-text-item", {
    template: "#input-text-template",
    props: {
        formato: {
            type: String,
            default: "text"
        },
        placeholder: {
            type: String,
            default: ""
        },
        controller: Object,
        field: String
    },
    computed: {
        type: function() {
            return this.formato;
        }
    }
});

/* DATAYY */
Vue.component("input-datayy-item", {
    template: "#input-datayy-template",
    props: {
        placeholder: String,
        controller: Object
    },
    computed: {}
});

/* NAME */
Vue.component("input-name-item", {
    template: "#input-name-template",
    props: {
        placeholder: String,
        controller: Object
    },
    computed: {}
});

/* NAME */
Vue.component("input-objeto-item", {
    template: "#input-objeto-template",
    props: {
        placeholder: String,
        controller: Object
    },
    computed: {}
});

/* DESCRICAO */
Vue.component("input-descricao-item", {
    template: "#input-descricao-template",
    props: {
        formato: {
            type: String,
            default: "text"
        },
        placeholder: String,
        controller: Object
    },
    computed: {
        type: function() {
            return this.formato;
        }
    }
});

/* NUMERO */
Vue.component("input-numero-item", {
    template: "#input-numero-template",
    props: {
        placeholder: String,
        controller: Object
    },
    computed: {}
});

/* LOCAL */
Vue.component("input-local-item", {
    template: "#input-local-template",
    props: {
        placeholder: String,
        controller: Object
    },
    computed: {}
});

/* ENDERECO */
Vue.component("input-endereco-item", {
    template: "#input-endereco-template",
    props: {
        placeholder: String,
        controller: Object
    },
    computed: {}
});

/* PROCESSO */
Vue.component("input-processo-item", {
    template: "#input-processo-template",
    props: {
        placeholder: String,
        controller: Object
    },
    computed: {}
});

/* CARGO */
Vue.component("input-cargo-item", {
    template: "#input-cargo-template",
    props: {
        placeholder: String,
        controller: Object
    },
    computed: {}
});

/* AUTOR */
Vue.component("input-autor-item", {
    template: "#input-autor-template",
    props: {
        placeholder: String,
        controller: Object
    },
    computed: {}
});

/*DOC */
Vue.component("input-doc-item", {
    template: "#input-doc-template",
    props: {
        placeholder: String,
        controller: Object
    },
    computed: {}
});

/* LINK */
Vue.component("input-link-item", {
    template: "#input-link-template",
    props: {
        placeholder: String,
        controller: Object,
        field: {
            type: String,
            default: "source"
        }
    },
    computed: {}
});

/* LATITUDE */
Vue.component("input-latitude-item", {
    template: "#input-latitude-template",
    props: {
        placeholder: String,
        controller: Object
    },
    computed: {}
});

/* LONGITUDE */
Vue.component("input-longitude-item", {
    template: "#input-longitude-template",
    props: {
        placeholder: String,
        controller: Object
    },
    computed: {}
});

/* OBSERVAÇÃO */
Vue.component("input-observacao-item", {
    template: "#input-observacao-template",
    props: {
        placeholder: String,
        controller: Object
    },
    computed: {}
});

/* TELEFONE */
Vue.component("input-telefone-item", {
    template: "#input-telefone-template",
    props: {
        placeholder: String,
        controller: Object
    },
    computed: {}
});

/* SITE */
Vue.component("input-site-item", {
    template: "#input-site-template",
    props: {
        placeholder: String,
        controller: Object
    },
    computed: {}
});

/* EMAIL */
Vue.component("input-email-item", {
    template: "#input-email-template",
    props: {
        placeholder: String,
        controller: Object
    },
    computed: {}
});

/* HORA */
Vue.component("input-hora-item", {
    template: "#input-hora-template",
    props: {
        field: String,
        placeholder: String,
        controller: Object
    }
});

/* PASSWORD */
Vue.component("input-password-item", {
    template: "#input-password-template",
    data: function() {
        return {
            passtype: "password"
        };
    },
    props: {
        placeholder: String,
        controller: Object
    },
    computed: {}
});

/* CHECKBOXS INPUTS */

/* DESTAQUES */
Vue.component("input-destaque-item", {
    template: "#input-destaque-template",
    data: function() {
        return {
            placeholder: "Destaque"
        };
    },
    props: {
        controller: Object
    },
    computed: {}
});

/* DESTAQUES */
Vue.component("input-extrato-item", {
    template: "#input-extrato-template",
    data: function() {
        return {
            placeholder: "Extrato"
        };
    },
    props: {
        controller: Object
    },
    computed: {}
});

/* STATUS */
Vue.component("input-status-item", {
    template: "#input-status-template",
    data: function() {
        return {};
    },
    props: {
        placeholder: String,
        controller: Object
    },
    computed: {}
});

/* STATUS */
Vue.component("input-check-item", {
    template: "#input-check-template",
    data: function() {
        return {};
    },
    props: {
        placeholder: String,
        field: String,
        controller: Object
    },
    computed: {}
});

/* OUTROS INPUTS   */

/* EDITOR  */
Vue.component("input-editor-item", {
    template: "#input-editor-template",
    data: function() {
        return {};
    },
    mounted() {
        CKEDITOR.replace(this.controller[this.hash]);
    },
    props: {
        controller: Object,
        hash: {
            type: String,
            default: "editor"
        }
    },
    computed: {}
});

/* DATA  */
Vue.component("input-data-item", {
    template: "#input-data-template",
    props: {
        field: {
            type: String,
            default: "data"
        },
        controller: Object
    },
    mounted: function() {
        var t = this;
        $(t.$refs.datapicker).datepicker({
            dateFormat: "dd/mm/yy",
            altField: $(t.$refs.data),
            altFormat: "yymmdd",
            dayNames: [
                "Domingo",
                "Segunda",
                "Terça",
                "Quarta",
                "Quinta",
                "Sexta",
                "Sábado",
                "Domingo"
            ],
            dayNamesMin: ["D", "S", "T", "Q", "Q", "S", "S", "D"],
            dayNamesShort: [
                "Dom",
                "Seg",
                "Ter",
                "Qua",
                "Qui",
                "Sex",
                "Sáb",
                "Dom"
            ],
            monthNames: [
                "Janeiro",
                "Fevereiro",
                "Março",
                "Abril",
                "Maio",
                "Junho",
                "Julho",
                "Agosto",
                "Setembro",
                "Outubro",
                "Novembro",
                "Dezembro"
            ],
            monthNamesShort: [
                "Jan",
                "Fev",
                "Mar",
                "Abr",
                "Mai",
                "Jun",
                "Jul",
                "Ago",
                "Set",
                "Out",
                "Nov",
                "Dez"
            ],
            onSelect: function() {
                $(t.$refs.data).trigger("change");
            }
        });

        $(t.$refs.datapicker).datepicker("setDate", new Date());

        $(t.$refs.data).change(function(el) {
            t.controller[t.field] = $(this).val();
        });
    }
});

/* UPLOADER  */
Vue.component("input-uploader-item", {
    template: "#input-uploader-template",
    props: {
        placeholder: String,
        controller: Object
    },
    computed: {},
    methods: {
        handleFileUpload() {
            this.controller.file = this.$refs.file.files[0];
        }
    }
});

/* SUBMIT  */
Vue.component("input-submit-item", {
    template: "#input-submit-template",
    props: {
        controller: Object
    }
});
