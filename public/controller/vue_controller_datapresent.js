// APRESENTAÇÃO DOS DADOS

// AGENDA
// NOME : TEXTO
// ACTION : [ DELETE , EDIT, CLONE ]
Vue.component("agendas-data-item", {
    template: "#agendas-data-template",
    data: function() {
        return {
            pesquisa: new Search({ pesquisar: true }),
            starts: 0,
            size: 6,
            pesquisar: "",
            hasEdit: true,
            hasDelete: true,
            hasCopy: true,
            hasStatus: false
        };
    },
    props: {
        controller: Object
    },
    computed: {
        output: function() {
            var data =
                this.controller.data && this.controller.data.length > 0
                    ? this.controller.data
                    : false;
            if (!data) return [];

            var pesquisar = this.pesquisar && this.pesquisar.toLowerCase();
            // var categoria = this.categoria && this.categoria.toLowerCase()
            // var cidade = this.cidade && this.cidade.toLowerCase()
            // var datamm = this.datamm && this.datamm.toLowerCase()
            // var datayy = this.datayy && this.datayy.toLowerCase()
            // var dataup = this.dataup && this.dataup.toLowerCase()
            // var datato = this.datato && this.datato.toLowerCase()

            if (pesquisar && pesquisar.length >= 3) {
                data = data.filter(function(row) {
                    return (
                        String(row["name"])
                            .toLowerCase()
                            .indexOf(pesquisar) > -1
                    );
                });
            }
            // if (categoria) {
            // 	data = data.filter(function (row) {
            // 		return String(row['categoria']).toLowerCase().indexOf(categoria) > -1
            // 	})
            // }
            // if (cidade) {
            // 	data = data.filter(function (row) {
            // 		return String(row['cidade']).toLowerCase().indexOf(cidade) > -1
            // 	})
            // }
            // if (datayy) {
            // 	data = data.filter(function (row) {
            // 		return String(row['datayy']).toLowerCase().indexOf(datayy) > -1
            // 	})
            // }
            // if (datamm) {
            // 	data = data.filter(function (row) {
            // 		return String(row['datamm']).toLowerCase().indexOf(datamm) > -1
            // 	})
            // }
            // if ( (dataup || datato) && !(pesquisar && pesquisar.length >= 3) ) {
            // 	dataup = dataup ? dataup : 0;
            // 	datato = datato ? datato : 99999999;
            // 	data = data.filter(function (row) {
            // 		return ( row.data >= dataup && row.data <= datato)
            // 	})
            // }

            return data;
        },
        tabela: function() {
            return new Tabela(this.paginator, ["Data"], ["data.data"], false);
        },
        paginator: function() {
            if (this.paginatorInspector !== this.hashCode(this.output)) {
                this.paginatorInspector = this.hashCode(this.output);
                if (this.sizeofarray < this.starts) this.starts = 0;
            }
            if (this.size > this.sizeofarray) {
                return this.output.slice(this.starts, this.sizeofarray);
            }
            if (this.starts > this.end) {
                return this.output.slice(this.starts, this.sizeofarray);
            }
            return this.output.slice(this.starts, this.end);
        },
        end: function() {
            if (this.starts + this.size > this.sizeofarray) {
                return this.starts + this.size - this.sizeofarray;
            }
            return this.starts + this.size;
        },
        sizeofarray: function() {
            return this.output.length;
        },
        pagesize: function() {
            return Math.ceil(this.output.length / this.size);
        },
        pages: function() {
            var i = 0;
            var retorno = {};
            var page = this.page;
            if (this.page + 7 >= this.pagesize && this.pagesize >= 15)
                page = this.pagesize - 15;
            while (i < this.pagesize && i < 15) {
                if (this.page + 7 >= this.pagesize && this.pagesize >= 15)
                    retorno[i] = page + i;
                else if (page >= 8) retorno[i] = page - 7 + i;
                else retorno[i] = i;
                i++;
            }
            return retorno;
        },
        hasPage: function() {
            return !(this.pagesize == 1);
        },
        page: function() {
            return parseInt(this.starts / this.size);
        }
    },
    methods: {
        sortBy: function(key) {
            this.sortKey = key;
            this.sortOrders[key] = this.sortOrders[key] * -1;
        },
        toward: function() {
            if (this.starts > 0) this.starts -= this.size;
            else this.starts = (this.pagesize - 1) * this.size;
        },
        foward: function() {
            if (this.starts + this.size < this.sizeofarray)
                this.starts += this.size;
            else this.starts = 0;
        },
        hashCode: function(obj) {
            var s = JSON.stringify(obj);
            return s.split("").reduce(function(a, b) {
                a = (a << 5) - a + b.charCodeAt(0);
                return a & a;
            }, 0);
        },
        toPage(page) {
            this.starts = this.size * page;
        }
    }
});

// EDITORIAIS
// NOME : TEXTO
// ACTION : [ DELETE , EDIT, CLONE ]
Vue.component("editorials-data-item", {
    template: "#editorials-data-template",
    data: function() {
        return {
            pesquisa: new Search({ pesquisar: true }),
            starts: 0,
            size: 6,
            pesquisar: "",
            hasEdit: true,
            hasDelete: true,
            hasCopy: true
        };
    },
    props: {
        controller: Object
    },
    computed: {
        output: function() {
            var data =
                this.controller.data && this.controller.data.length > 0
                    ? this.controller.data
                    : false;
            if (!data) return [];

            var pesquisar = this.pesquisar && this.pesquisar.toLowerCase();
            // var categoria = this.categoria && this.categoria.toLowerCase()
            // var cidade = this.cidade && this.cidade.toLowerCase()
            // var datamm = this.datamm && this.datamm.toLowerCase()
            // var datayy = this.datayy && this.datayy.toLowerCase()
            // var dataup = this.dataup && this.dataup.toLowerCase()
            // var datato = this.datato && this.datato.toLowerCase()

            if (pesquisar && pesquisar.length >= 3) {
                data = data.filter(function(row) {
                    return (
                        String(row["name"])
                            .toLowerCase()
                            .indexOf(pesquisar) > -1
                    );
                });
            }
            // if (categoria) {
            // 	data = data.filter(function (row) {
            // 		return String(row['categoria']).toLowerCase().indexOf(categoria) > -1
            // 	})
            // }
            // if (cidade) {
            // 	data = data.filter(function (row) {
            // 		return String(row['cidade']).toLowerCase().indexOf(cidade) > -1
            // 	})
            // }
            // if (datayy) {
            // 	data = data.filter(function (row) {
            // 		return String(row['datayy']).toLowerCase().indexOf(datayy) > -1
            // 	})
            // }
            // if (datamm) {
            // 	data = data.filter(function (row) {
            // 		return String(row['datamm']).toLowerCase().indexOf(datamm) > -1
            // 	})
            // }
            // if ( (dataup || datato) && !(pesquisar && pesquisar.length >= 3) ) {
            // 	dataup = dataup ? dataup : 0;
            // 	datato = datato ? datato : 99999999;
            // 	data = data.filter(function (row) {
            // 		return ( row.data >= dataup && row.data <= datato)
            // 	})
            // }

            return data;
        },
        tabela: function() {
            return new Tabela(this.paginator, ["Nome"], ["name"], false);
        },
        paginator: function() {
            if (this.paginatorInspector !== this.hashCode(this.output)) {
                this.paginatorInspector = this.hashCode(this.output);
                if (this.sizeofarray < this.starts) this.starts = 0;
            }
            if (this.size > this.sizeofarray) {
                return this.output.slice(this.starts, this.sizeofarray);
            }
            if (this.starts > this.end) {
                return this.output.slice(this.starts, this.sizeofarray);
            }
            return this.output.slice(this.starts, this.end);
        },
        end: function() {
            if (this.starts + this.size > this.sizeofarray) {
                return this.starts + this.size - this.sizeofarray;
            }
            return this.starts + this.size;
        },
        sizeofarray: function() {
            return this.output.length;
        },
        pagesize: function() {
            return Math.ceil(this.output.length / this.size);
        },
        pages: function() {
            var i = 0;
            var retorno = {};
            var page = this.page;
            if (this.page + 7 >= this.pagesize && this.pagesize >= 15)
                page = this.pagesize - 15;
            while (i < this.pagesize && i < 15) {
                if (this.page + 7 >= this.pagesize && this.pagesize >= 15)
                    retorno[i] = page + i;
                else if (page >= 8) retorno[i] = page - 7 + i;
                else retorno[i] = i;
                i++;
            }
            return retorno;
        },
        hasPage: function() {
            return !(this.pagesize == 1);
        },
        page: function() {
            return parseInt(this.starts / this.size);
        }
    },
    methods: {
        sortBy: function(key) {
            this.sortKey = key;
            this.sortOrders[key] = this.sortOrders[key] * -1;
        },
        toward: function() {
            if (this.starts > 0) this.starts -= this.size;
            else this.starts = (this.pagesize - 1) * this.size;
        },
        foward: function() {
            if (this.starts + this.size < this.sizeofarray)
                this.starts += this.size;
            else this.starts = 0;
        },
        hashCode: function(obj) {
            var s = JSON.stringify(obj);
            return s.split("").reduce(function(a, b) {
                a = (a << 5) - a + b.charCodeAt(0);
                return a & a;
            }, 0);
        },
        toPage(page) {
            this.starts = this.size * page;
        }
    }
});

// LISTAS
// NOME : TEXTO
// ACTION : [ DELETE , EDIT, CLONE ]
Vue.component("listas-data-item", {
    template: "#listas-data-template",
    data: function() {
        return {
            pesquisa: new Search({ pesquisar: true }),
            starts: 0,
            size: 6,
            pesquisar: "",
            hasEdit: true,
            hasDelete: true,
            hasCopy: true
        };
    },
    props: {
        controller: Object
    },
    computed: {
        output: function() {
            var data =
                this.controller.data && this.controller.data.length > 0
                    ? this.controller.data
                    : false;
            if (!data) return [];

            var pesquisar = this.pesquisar && this.pesquisar.toLowerCase();
            // var categoria = this.categoria && this.categoria.toLowerCase()
            // var cidade = this.cidade && this.cidade.toLowerCase()
            // var datamm = this.datamm && this.datamm.toLowerCase()
            // var datayy = this.datayy && this.datayy.toLowerCase()
            // var dataup = this.dataup && this.dataup.toLowerCase()
            // var datato = this.datato && this.datato.toLowerCase()

            if (pesquisar && pesquisar.length >= 3) {
                data = data.filter(function(row) {
                    return (
                        String(row["name"])
                            .toLowerCase()
                            .indexOf(pesquisar) > -1
                    );
                });
            }
            // if (categoria) {
            // 	data = data.filter(function (row) {
            // 		return String(row['categoria']).toLowerCase().indexOf(categoria) > -1
            // 	})
            // }
            // if (cidade) {
            // 	data = data.filter(function (row) {
            // 		return String(row['cidade']).toLowerCase().indexOf(cidade) > -1
            // 	})
            // }
            // if (datayy) {
            // 	data = data.filter(function (row) {
            // 		return String(row['datayy']).toLowerCase().indexOf(datayy) > -1
            // 	})
            // }
            // if (datamm) {
            // 	data = data.filter(function (row) {
            // 		return String(row['datamm']).toLowerCase().indexOf(datamm) > -1
            // 	})
            // }
            // if ( (dataup || datato) && !(pesquisar && pesquisar.length >= 3) ) {
            // 	dataup = dataup ? dataup : 0;
            // 	datato = datato ? datato : 99999999;
            // 	data = data.filter(function (row) {
            // 		return ( row.data >= dataup && row.data <= datato)
            // 	})
            // }

            return data;
        },
        tabela: function() {
            return new Tabela(
                this.paginator,
                ["Nome", "Ano", "Mes", "Categoria"],
                ["name", "datayy", "datamm", "categoria.categoria"],
                false
            );
        },
        paginator: function() {
            if (this.paginatorInspector !== this.hashCode(this.output)) {
                this.paginatorInspector = this.hashCode(this.output);
                if (this.sizeofarray < this.starts) this.starts = 0;
            }
            if (this.size > this.sizeofarray) {
                return this.output.slice(this.starts, this.sizeofarray);
            }
            if (this.starts > this.end) {
                return this.output.slice(this.starts, this.sizeofarray);
            }
            return this.output.slice(this.starts, this.end);
        },
        end: function() {
            if (this.starts + this.size > this.sizeofarray) {
                return this.starts + this.size - this.sizeofarray;
            }
            return this.starts + this.size;
        },
        sizeofarray: function() {
            return this.output.length;
        },
        pagesize: function() {
            return Math.ceil(this.output.length / this.size);
        },
        pages: function() {
            var i = 0;
            var retorno = {};
            var page = this.page;
            if (this.page + 7 >= this.pagesize && this.pagesize >= 15)
                page = this.pagesize - 15;
            while (i < this.pagesize && i < 15) {
                if (this.page + 7 >= this.pagesize && this.pagesize >= 15)
                    retorno[i] = page + i;
                else if (page >= 8) retorno[i] = page - 7 + i;
                else retorno[i] = i;
                i++;
            }
            return retorno;
        },
        hasPage: function() {
            return !(this.pagesize == 1);
        },
        page: function() {
            return parseInt(this.starts / this.size);
        }
    },
    methods: {
        sortBy: function(key) {
            this.sortKey = key;
            this.sortOrders[key] = this.sortOrders[key] * -1;
        },
        toward: function() {
            if (this.starts > 0) this.starts -= this.size;
            else this.starts = (this.pagesize - 1) * this.size;
        },
        foward: function() {
            if (this.starts + this.size < this.sizeofarray)
                this.starts += this.size;
            else this.starts = 0;
        },
        hashCode: function(obj) {
            var s = JSON.stringify(obj);
            return s.split("").reduce(function(a, b) {
                a = (a << 5) - a + b.charCodeAt(0);
                return a & a;
            }, 0);
        },
        toPage(page) {
            this.starts = this.size * page;
        }
    }
});

// AGENDA FORMULARIOS
// NOME : TEXTO
// ACTION : [ DELETE , EDIT, CLONE ]
Vue.component("agenda-formularios-data-item", {
    template: "#agenda-formularios-data-template",
    data: function() {
        return {
            pesquisa: new Search({ pesquisar: true }),
            starts: 0,
            size: 6,
            pesquisar: "",
            hasView: true,
            hasEdit: false,
            hasDelete: false,
            hasCopy: false
        };
    },
    props: {
        controller: Object
    },
    computed: {
        output: function() {
            var data =
                this.controller.inscricoes &&
                this.controller.inscricoes.length > 0
                    ? this.controller.inscricoes
                    : false;
            if (!data) return [];

            var pesquisar = this.pesquisar && this.pesquisar.toLowerCase();
            // var categoria = this.categoria && this.categoria.toLowerCase()
            // var cidade = this.cidade && this.cidade.toLowerCase()
            // var datamm = this.datamm && this.datamm.toLowerCase()
            // var datayy = this.datayy && this.datayy.toLowerCase()
            // var dataup = this.dataup && this.dataup.toLowerCase()
            // var datato = this.datato && this.datato.toLowerCase()

            if (pesquisar && pesquisar.length >= 3) {
                data = data.filter(function(row) {
                    return (
                        String(row["name"])
                            .toLowerCase()
                            .indexOf(pesquisar) > -1
                    );
                });
            }
            // if (categoria) {
            // 	data = data.filter(function (row) {
            // 		return String(row['categoria']).toLowerCase().indexOf(categoria) > -1
            // 	})
            // }
            // if (cidade) {
            // 	data = data.filter(function (row) {
            // 		return String(row['cidade']).toLowerCase().indexOf(cidade) > -1
            // 	})
            // }
            // if (datayy) {
            // 	data = data.filter(function (row) {
            // 		return String(row['datayy']).toLowerCase().indexOf(datayy) > -1
            // 	})
            // }
            // if (datamm) {
            // 	data = data.filter(function (row) {
            // 		return String(row['datamm']).toLowerCase().indexOf(datamm) > -1
            // 	})
            // }
            // if ( (dataup || datato) && !(pesquisar && pesquisar.length >= 3) ) {
            // 	dataup = dataup ? dataup : 0;
            // 	datato = datato ? datato : 99999999;
            // 	data = data.filter(function (row) {
            // 		return ( row.data >= dataup && row.data <= datato)
            // 	})
            // }

            return data;
        },
        tabela: function() {
            return new Tabela(
                this.paginator,
                ["Nome", "Email"],
                ["nome", "email"],
                false
            );
        },
        paginator: function() {
            if (this.paginatorInspector !== this.hashCode(this.output)) {
                this.paginatorInspector = this.hashCode(this.output);
                if (this.sizeofarray < this.starts) this.starts = 0;
            }
            if (this.size > this.sizeofarray) {
                return this.output.slice(this.starts, this.sizeofarray);
            }
            if (this.starts > this.end) {
                return this.output.slice(this.starts, this.sizeofarray);
            }
            return this.output.slice(this.starts, this.end);
        },
        end: function() {
            if (this.starts + this.size > this.sizeofarray) {
                return this.starts + this.size - this.sizeofarray;
            }
            return this.starts + this.size;
        },
        sizeofarray: function() {
            return this.output.length;
        },
        pagesize: function() {
            return Math.ceil(this.output.length / this.size);
        },
        pages: function() {
            var i = 0;
            var retorno = {};
            var page = this.page;
            if (this.page + 7 >= this.pagesize && this.pagesize >= 15)
                page = this.pagesize - 15;
            while (i < this.pagesize && i < 15) {
                if (this.page + 7 >= this.pagesize && this.pagesize >= 15)
                    retorno[i] = page + i;
                else if (page >= 8) retorno[i] = page - 7 + i;
                else retorno[i] = i;
                i++;
            }
            return retorno;
        },
        hasPage: function() {
            return !(this.pagesize == 1);
        },
        page: function() {
            return parseInt(this.starts / this.size);
        }
    },
    methods: {
        sortBy: function(key) {
            this.sortKey = key;
            this.sortOrders[key] = this.sortOrders[key] * -1;
        },
        toward: function() {
            if (this.starts > 0) this.starts -= this.size;
            else this.starts = (this.pagesize - 1) * this.size;
        },
        foward: function() {
            if (this.starts + this.size < this.sizeofarray)
                this.starts += this.size;
            else this.starts = 0;
        },
        hashCode: function(obj) {
            var s = JSON.stringify(obj);
            return s.split("").reduce(function(a, b) {
                a = (a << 5) - a + b.charCodeAt(0);
                return a & a;
            }, 0);
        },
        toPage(page) {
            this.starts = this.size * page;
        }
    }
});

// FORMULARIOS
// NOME : TEXTO
// ACTION : [ DELETE , EDIT, CLONE ]
Vue.component("formularios-data-item", {
    template: "#formularios-data-template",
    data: function() {
        return {
            pesquisa: new Search({ pesquisar: true }),
            starts: 0,
            size: 6,
            pesquisar: "",
            hasEdit: true,
            hasDelete: true,
            hasCopy: true
        };
    },
    props: {
        controller: Object
    },
    computed: {
        output: function() {
            var data =
                this.controller.data && this.controller.data.length > 0
                    ? this.controller.data
                    : false;
            if (!data) return [];

            var pesquisar = this.pesquisar && this.pesquisar.toLowerCase();
            // var categoria = this.categoria && this.categoria.toLowerCase()
            // var cidade = this.cidade && this.cidade.toLowerCase()
            // var datamm = this.datamm && this.datamm.toLowerCase()
            // var datayy = this.datayy && this.datayy.toLowerCase()
            // var dataup = this.dataup && this.dataup.toLowerCase()
            // var datato = this.datato && this.datato.toLowerCase()

            if (pesquisar && pesquisar.length >= 3) {
                data = data.filter(function(row) {
                    return (
                        String(row["name"])
                            .toLowerCase()
                            .indexOf(pesquisar) > -1
                    );
                });
            }
            // if (categoria) {
            // 	data = data.filter(function (row) {
            // 		return String(row['categoria']).toLowerCase().indexOf(categoria) > -1
            // 	})
            // }
            // if (cidade) {
            // 	data = data.filter(function (row) {
            // 		return String(row['cidade']).toLowerCase().indexOf(cidade) > -1
            // 	})
            // }
            // if (datayy) {
            // 	data = data.filter(function (row) {
            // 		return String(row['datayy']).toLowerCase().indexOf(datayy) > -1
            // 	})
            // }
            // if (datamm) {
            // 	data = data.filter(function (row) {
            // 		return String(row['datamm']).toLowerCase().indexOf(datamm) > -1
            // 	})
            // }
            // if ( (dataup || datato) && !(pesquisar && pesquisar.length >= 3) ) {
            // 	dataup = dataup ? dataup : 0;
            // 	datato = datato ? datato : 99999999;
            // 	data = data.filter(function (row) {
            // 		return ( row.data >= dataup && row.data <= datato)
            // 	})
            // }

            return data;
        },
        tabela: function() {
            return new Tabela(
                this.paginator,
                ["Nome", "Índice"],
                ["name", "indice"],
                false
            );
        },
        paginator: function() {
            if (this.paginatorInspector !== this.hashCode(this.output)) {
                this.paginatorInspector = this.hashCode(this.output);
                if (this.sizeofarray < this.starts) this.starts = 0;
            }
            if (this.size > this.sizeofarray) {
                return this.output.slice(this.starts, this.sizeofarray);
            }
            if (this.starts > this.end) {
                return this.output.slice(this.starts, this.sizeofarray);
            }
            return this.output.slice(this.starts, this.end);
        },
        end: function() {
            if (this.starts + this.size > this.sizeofarray) {
                return this.starts + this.size - this.sizeofarray;
            }
            return this.starts + this.size;
        },
        sizeofarray: function() {
            return this.output.length;
        },
        pagesize: function() {
            return Math.ceil(this.output.length / this.size);
        },
        pages: function() {
            var i = 0;
            var retorno = {};
            var page = this.page;
            if (this.page + 7 >= this.pagesize && this.pagesize >= 15)
                page = this.pagesize - 15;
            while (i < this.pagesize && i < 15) {
                if (this.page + 7 >= this.pagesize && this.pagesize >= 15)
                    retorno[i] = page + i;
                else if (page >= 8) retorno[i] = page - 7 + i;
                else retorno[i] = i;
                i++;
            }
            return retorno;
        },
        hasPage: function() {
            return !(this.pagesize == 1);
        },
        page: function() {
            return parseInt(this.starts / this.size);
        }
    },
    methods: {
        sortBy: function(key) {
            this.sortKey = key;
            this.sortOrders[key] = this.sortOrders[key] * -1;
        },
        toward: function() {
            if (this.starts > 0) this.starts -= this.size;
            else this.starts = (this.pagesize - 1) * this.size;
        },
        foward: function() {
            if (this.starts + this.size < this.sizeofarray)
                this.starts += this.size;
            else this.starts = 0;
        },
        hashCode: function(obj) {
            var s = JSON.stringify(obj);
            return s.split("").reduce(function(a, b) {
                a = (a << 5) - a + b.charCodeAt(0);
                return a & a;
            }, 0);
        },
        toPage(page) {
            this.starts = this.size * page;
        }
    }
});

// USUARIOS
// TITULO : TEXTO
// ACTION : [ DELETE , EDIT ]
Vue.component("logs-view-data-item", {
    template: "#logs-view-data-template",
    data: function() {
        return {
            pesquisa: new Search({
                pesquisar: true,
                datarange: true
            }),

            starts: 0,
            size: 6,

            pesquisar: "",
            datato: $.datepicker.formatDate("yymmdd", new Date()),
            dataup: $.datepicker.formatDate("yymmdd", new Helper().getDaysAgo())

            // hasEdit: false,
            // hasCopy: false,
            // hasDelete: false,
            // hasView: true
        };
    },
    props: {
        controller: Object
    },
    computed: {
        output: function() {
            var data =
                this.controller.data && this.controller.data.length > 0
                    ? this.controller.data
                    : false;
            if (!data) return [];

            var pesquisar = this.pesquisar && this.pesquisar.toLowerCase();
            // var categoria = this.categoria && this.categoria.toLowerCase()
            // var cidade = this.cidade && this.cidade.toLowerCase()
            // var datamm = this.datamm && this.datamm.toLowerCase()
            // var datayy = this.datayy && this.datayy.toLowerCase()
            var dataup = this.dataup && this.dataup.toLowerCase();
            var datato = this.datato && this.datato.toLowerCase();

            if (pesquisar && pesquisar.length >= 3) {
                data = data.filter(function(row) {
                    return (
                        String(row["log"])
                            .toLowerCase()
                            .indexOf(pesquisar) > -1
                    );
                });
            }
            // if (categoria) {
            // 	data = data.filter(function (row) {
            // 		return String(row['categoria']).toLowerCase().indexOf(categoria) > -1
            // 	})
            // }
            // if (cidade) {
            // 	data = data.filter(function (row) {
            // 		return String(row['cidade']).toLowerCase().indexOf(cidade) > -1
            // 	})
            // }
            // if (datayy) {
            // 	data = data.filter(function (row) {
            // 		return String(row['datayy']).toLowerCase().indexOf(datayy) > -1
            // 	})
            // }
            // if (datamm) {
            // 	data = data.filter(function (row) {
            // 		return String(row['datamm']).toLowerCase().indexOf(datamm) > -1
            // 	})
            // }
            if ( (dataup || datato) && !(pesquisar && pesquisar.length >= 3) ) {
                dataup = dataup ? dataup : 0;
                datato = datato ? datato : 99999999;
                data = data.filter(function(row) {
                    let data_formatada = row.created_at
                        .replace(/-/g, "")
                        .replace(/:/g, "")
                        .replace(/ /g, "")
                        .slice(0, 8);
                    return (
                        data_formatada.slice(0, 8) >= dataup &&
                        data_formatada.slice(0, 8) <= datato
                    );
                });
            }

            return data;
        },
        tabela: function() {
            return new Tabela(
                this.paginator,
                ["Log", "Data"],
                ["log", "created_at.server_data"],
                false
            );
        },
        paginator: function() {
            if (this.paginatorInspector !== this.hashCode(this.output)) {
                this.paginatorInspector = this.hashCode(this.output);
                if (this.sizeofarray < this.starts) this.starts = 0;
            }
            if (this.size > this.sizeofarray) {
                return this.output.slice(this.starts, this.sizeofarray);
            }
            if (this.starts > this.end) {
                return this.output.slice(this.starts, this.sizeofarray);
            }
            return this.output.slice(this.starts, this.end);
        },
        end: function() {
            if (this.starts + this.size > this.sizeofarray) {
                return this.starts + this.size - this.sizeofarray;
            }
            return this.starts + this.size;
        },
        sizeofarray: function() {
            return this.output.length;
        },
        pagesize: function() {
            return Math.ceil(this.output.length / this.size);
        },
        pages: function() {
            var i = 0;
            var retorno = {};
            var page = this.page;
            if (this.page + 7 >= this.pagesize && this.pagesize >= 15)
                page = this.pagesize - 15;
            while (i < this.pagesize && i < 15) {
                if (this.page + 7 >= this.pagesize && this.pagesize >= 15)
                    retorno[i] = page + i;
                else if (page >= 8) retorno[i] = page - 7 + i;
                else retorno[i] = i;
                i++;
            }
            return retorno;
        },
        hasPage: function() {
            return !(this.pagesize == 1);
        },
        page: function() {
            return parseInt(this.starts / this.size);
        }
    },
    methods: {
        sortBy: function(key) {
            this.sortKey = key;
            this.sortOrders[key] = this.sortOrders[key] * -1;
        },
        toward: function() {
            if (this.starts > 0) this.starts -= this.size;
            else this.starts = (this.pagesize - 1) * this.size;
        },
        foward: function() {
            if (this.starts + this.size < this.sizeofarray)
                this.starts += this.size;
            else this.starts = 0;
        },
        hashCode: function(obj) {
            var s = JSON.stringify(obj);
            return s.split("").reduce(function(a, b) {
                a = (a << 5) - a + b.charCodeAt(0);
                return a & a;
            }, 0);
        },
        toPage(page) {
            this.starts = this.size * page;
        }
    }
});

// VIDEOS
// NOME : TEXTO
// ACTION : [ DELETE , EDIT, CLONE ]
Vue.component("videos-data-item", {
    template: "#videos-data-template",
    data: function() {
        return {
            pesquisa: new Search({ pesquisar: true }),
            starts: 0,
            size: 6,
            pesquisar: "",
            hasEdit: false,
            hasDelete: true,
            hasCopy: false
        };
    },
    props: {
        controller: Object
    },
    computed: {
        output: function() {
            var data =
                this.controller.data && this.controller.data.length > 0
                    ? this.controller.data
                    : false;
            if (!data) return [];

            var pesquisar = this.pesquisar && this.pesquisar.toLowerCase();
            // var categoria = this.categoria && this.categoria.toLowerCase()
            // var cidade = this.cidade && this.cidade.toLowerCase()
            // var datamm = this.datamm && this.datamm.toLowerCase()
            // var datayy = this.datayy && this.datayy.toLowerCase()
            // var dataup = this.dataup && this.dataup.toLowerCase()
            // var datato = this.datato && this.datato.toLowerCase()

            if (pesquisar && pesquisar.length >= 3) {
                data = data.filter(function(row) {
                    return (
                        String(row["name"])
                            .toLowerCase()
                            .indexOf(pesquisar) > -1
                    );
                });
            }
            // if (categoria) {
            // 	data = data.filter(function (row) {
            // 		return String(row['categoria']).toLowerCase().indexOf(categoria) > -1
            // 	})
            // }
            // if (cidade) {
            // 	data = data.filter(function (row) {
            // 		return String(row['cidade']).toLowerCase().indexOf(cidade) > -1
            // 	})
            // }
            // if (datayy) {
            // 	data = data.filter(function (row) {
            // 		return String(row['datayy']).toLowerCase().indexOf(datayy) > -1
            // 	})
            // }
            // if (datamm) {
            // 	data = data.filter(function (row) {
            // 		return String(row['datamm']).toLowerCase().indexOf(datamm) > -1
            // 	})
            // }
            // if ( (dataup || datato) && !(pesquisar && pesquisar.length >= 3) ) {
            // 	dataup = dataup ? dataup : 0;
            // 	datato = datato ? datato : 99999999;
            // 	data = data.filter(function (row) {
            // 		return ( row.data >= dataup && row.data <= datato)
            // 	})
            // }

            return data;
        },
        tabela: function() {
            return new Tabela(this.paginator, ["Nome"], ["name"], false);
        },
        paginator: function() {
            if (this.paginatorInspector !== this.hashCode(this.output)) {
                this.paginatorInspector = this.hashCode(this.output);
                if (this.sizeofarray < this.starts) this.starts = 0;
            }
            if (this.size > this.sizeofarray) {
                return this.output.slice(this.starts, this.sizeofarray);
            }
            if (this.starts > this.end) {
                return this.output.slice(this.starts, this.sizeofarray);
            }
            return this.output.slice(this.starts, this.end);
        },
        end: function() {
            if (this.starts + this.size > this.sizeofarray) {
                return this.starts + this.size - this.sizeofarray;
            }
            return this.starts + this.size;
        },
        sizeofarray: function() {
            return this.output.length;
        },
        pagesize: function() {
            return Math.ceil(this.output.length / this.size);
        },
        pages: function() {
            var i = 0;
            var retorno = {};
            var page = this.page;
            if (this.page + 7 >= this.pagesize && this.pagesize >= 15)
                page = this.pagesize - 15;
            while (i < this.pagesize && i < 15) {
                if (this.page + 7 >= this.pagesize && this.pagesize >= 15)
                    retorno[i] = page + i;
                else if (page >= 8) retorno[i] = page - 7 + i;
                else retorno[i] = i;
                i++;
            }
            return retorno;
        },
        hasPage: function() {
            return !(this.pagesize == 1);
        },
        page: function() {
            return parseInt(this.starts / this.size);
        }
    },
    methods: {
        sortBy: function(key) {
            this.sortKey = key;
            this.sortOrders[key] = this.sortOrders[key] * -1;
        },
        toward: function() {
            if (this.starts > 0) this.starts -= this.size;
            else this.starts = (this.pagesize - 1) * this.size;
        },
        foward: function() {
            if (this.starts + this.size < this.sizeofarray)
                this.starts += this.size;
            else this.starts = 0;
        },
        hashCode: function(obj) {
            var s = JSON.stringify(obj);
            return s.split("").reduce(function(a, b) {
                a = (a << 5) - a + b.charCodeAt(0);
                return a & a;
            }, 0);
        },
        toPage(page) {
            this.starts = this.size * page;
        }
    }
});

// BANNERS
// NOME : TEXTO
// ACTION : [ DELETE , EDIT, CLONE ]
Vue.component("banners-data-item", {
    template: "#banners-data-template",
    data: function() {
        return {
            pesquisa: new Search({ pesquisar: true }),
            starts: 0,
            size: 6,
            pesquisar: "",
            hasEdit: true,
            hasDelete: true,
            hasCopy: true
        };
    },
    props: {
        controller: Object
    },
    computed: {
        output: function() {
            var data =
                this.controller.data && this.controller.data.length > 0
                    ? this.controller.data
                    : false;
            if (!data) return [];

            var pesquisar = this.pesquisar && this.pesquisar.toLowerCase();
            // var categoria = this.categoria && this.categoria.toLowerCase()
            // var cidade = this.cidade && this.cidade.toLowerCase()
            // var datamm = this.datamm && this.datamm.toLowerCase()
            // var datayy = this.datayy && this.datayy.toLowerCase()
            // var dataup = this.dataup && this.dataup.toLowerCase()
            // var datato = this.datato && this.datato.toLowerCase()

            if (pesquisar && pesquisar.length >= 3) {
                data = data.filter(function(row) {
                    return (
                        String(row["name"])
                            .toLowerCase()
                            .indexOf(pesquisar) > -1
                    );
                });
            }
            // if (categoria) {
            // 	data = data.filter(function (row) {
            // 		return String(row['categoria']).toLowerCase().indexOf(categoria) > -1
            // 	})
            // }
            // if (cidade) {
            // 	data = data.filter(function (row) {
            // 		return String(row['cidade']).toLowerCase().indexOf(cidade) > -1
            // 	})
            // }
            // if (datayy) {
            // 	data = data.filter(function (row) {
            // 		return String(row['datayy']).toLowerCase().indexOf(datayy) > -1
            // 	})
            // }
            // if (datamm) {
            // 	data = data.filter(function (row) {
            // 		return String(row['datamm']).toLowerCase().indexOf(datamm) > -1
            // 	})
            // }
            // if ( (dataup || datato) && !(pesquisar && pesquisar.length >= 3) ) {
            // 	dataup = dataup ? dataup : 0;
            // 	datato = datato ? datato : 99999999;
            // 	data = data.filter(function (row) {
            // 		return ( row.data >= dataup && row.data <= datato)
            // 	})
            // }

            return data;
        },
        tabela: function() {
            return new Tabela(
                this.paginator,
                ["Nome", "Imagem"],
                ["name", "image_id.imagem"],
                false
            );
        },
        paginator: function() {
            if (this.paginatorInspector !== this.hashCode(this.output)) {
                this.paginatorInspector = this.hashCode(this.output);
                if (this.sizeofarray < this.starts) this.starts = 0;
            }
            if (this.size > this.sizeofarray) {
                return this.output.slice(this.starts, this.sizeofarray);
            }
            if (this.starts > this.end) {
                return this.output.slice(this.starts, this.sizeofarray);
            }
            return this.output.slice(this.starts, this.end);
        },
        end: function() {
            if (this.starts + this.size > this.sizeofarray) {
                return this.starts + this.size - this.sizeofarray;
            }
            return this.starts + this.size;
        },
        sizeofarray: function() {
            return this.output.length;
        },
        pagesize: function() {
            return Math.ceil(this.output.length / this.size);
        },
        pages: function() {
            var i = 0;
            var retorno = {};
            var page = this.page;
            if (this.page + 7 >= this.pagesize && this.pagesize >= 15)
                page = this.pagesize - 15;
            while (i < this.pagesize && i < 15) {
                if (this.page + 7 >= this.pagesize && this.pagesize >= 15)
                    retorno[i] = page + i;
                else if (page >= 8) retorno[i] = page - 7 + i;
                else retorno[i] = i;
                i++;
            }
            return retorno;
        },
        hasPage: function() {
            return !(this.pagesize == 1);
        },
        page: function() {
            return parseInt(this.starts / this.size);
        }
    },
    methods: {
        sortBy: function(key) {
            this.sortKey = key;
            this.sortOrders[key] = this.sortOrders[key] * -1;
        },
        toward: function() {
            if (this.starts > 0) this.starts -= this.size;
            else this.starts = (this.pagesize - 1) * this.size;
        },
        foward: function() {
            if (this.starts + this.size < this.sizeofarray)
                this.starts += this.size;
            else this.starts = 0;
        },
        hashCode: function(obj) {
            var s = JSON.stringify(obj);
            return s.split("").reduce(function(a, b) {
                a = (a << 5) - a + b.charCodeAt(0);
                return a & a;
            }, 0);
        },
        toPage(page) {
            this.starts = this.size * page;
        }
    }
});

// ACCORDION
// NOME : TEXTO
// ACTION : [ DELETE , EDIT, CLONE ]
Vue.component("accordions-data-item", {
    template: "#accordions-data-template",
    data: function() {
        return {
            pesquisa: new Search({ pesquisar: true }),
            starts: 0,
            size: 6,
            pesquisar: "",
            hasEdit: true,
            hasDelete: true,
            hasCopy: true
        };
    },
    props: {
        controller: Object
    },
    computed: {
        output: function() {
            var data =
                this.controller.data && this.controller.data.length > 0
                    ? this.controller.data
                    : false;
            if (!data) return [];

            var pesquisar = this.pesquisar && this.pesquisar.toLowerCase();
            // var categoria = this.categoria && this.categoria.toLowerCase()
            // var cidade = this.cidade && this.cidade.toLowerCase()
            // var datamm = this.datamm && this.datamm.toLowerCase()
            // var datayy = this.datayy && this.datayy.toLowerCase()
            // var dataup = this.dataup && this.dataup.toLowerCase()
            // var datato = this.datato && this.datato.toLowerCase()

            if (pesquisar && pesquisar.length >= 3) {
                data = data.filter(function(row) {
                    return (
                        String(row["name"])
                            .toLowerCase()
                            .indexOf(pesquisar) > -1
                    );
                });
            }
            // if (categoria) {
            // 	data = data.filter(function (row) {
            // 		return String(row['categoria']).toLowerCase().indexOf(categoria) > -1
            // 	})
            // }
            // if (cidade) {
            // 	data = data.filter(function (row) {
            // 		return String(row['cidade']).toLowerCase().indexOf(cidade) > -1
            // 	})
            // }
            // if (datayy) {
            // 	data = data.filter(function (row) {
            // 		return String(row['datayy']).toLowerCase().indexOf(datayy) > -1
            // 	})
            // }
            // if (datamm) {
            // 	data = data.filter(function (row) {
            // 		return String(row['datamm']).toLowerCase().indexOf(datamm) > -1
            // 	})
            // }
            // if ( (dataup || datato) && !(pesquisar && pesquisar.length >= 3) ) {
            // 	dataup = dataup ? dataup : 0;
            // 	datato = datato ? datato : 99999999;
            // 	data = data.filter(function (row) {
            // 		return ( row.data >= dataup && row.data <= datato)
            // 	})
            // }

            return data;
        },
        tabela: function() {
            return new Tabela(this.paginator, ["Nome"], ["name"], false);
        },
        paginator: function() {
            if (this.paginatorInspector !== this.hashCode(this.output)) {
                this.paginatorInspector = this.hashCode(this.output);
                if (this.sizeofarray < this.starts) this.starts = 0;
            }
            if (this.size > this.sizeofarray) {
                return this.output.slice(this.starts, this.sizeofarray);
            }
            if (this.starts > this.end) {
                return this.output.slice(this.starts, this.sizeofarray);
            }
            return this.output.slice(this.starts, this.end);
        },
        end: function() {
            if (this.starts + this.size > this.sizeofarray) {
                return this.starts + this.size - this.sizeofarray;
            }
            return this.starts + this.size;
        },
        sizeofarray: function() {
            return this.output.length;
        },
        pagesize: function() {
            return Math.ceil(this.output.length / this.size);
        },
        pages: function() {
            var i = 0;
            var retorno = {};
            var page = this.page;
            if (this.page + 7 >= this.pagesize && this.pagesize >= 15)
                page = this.pagesize - 15;
            while (i < this.pagesize && i < 15) {
                if (this.page + 7 >= this.pagesize && this.pagesize >= 15)
                    retorno[i] = page + i;
                else if (page >= 8) retorno[i] = page - 7 + i;
                else retorno[i] = i;
                i++;
            }
            return retorno;
        },
        hasPage: function() {
            return !(this.pagesize == 1);
        },
        page: function() {
            return parseInt(this.starts / this.size);
        }
    },
    methods: {
        sortBy: function(key) {
            this.sortKey = key;
            this.sortOrders[key] = this.sortOrders[key] * -1;
        },
        toward: function() {
            if (this.starts > 0) this.starts -= this.size;
            else this.starts = (this.pagesize - 1) * this.size;
        },
        foward: function() {
            if (this.starts + this.size < this.sizeofarray)
                this.starts += this.size;
            else this.starts = 0;
        },
        hashCode: function(obj) {
            var s = JSON.stringify(obj);
            return s.split("").reduce(function(a, b) {
                a = (a << 5) - a + b.charCodeAt(0);
                return a & a;
            }, 0);
        },
        toPage(page) {
            this.starts = this.size * page;
        }
    }
});

// PAGINAS
// NOME : TEXTO
// ACTION : [ DELETE , EDIT, CLONE ]
Vue.component("paginas-data-item", {
    template: "#paginas-data-template",
    data: function() {
        return {
            pesquisa: new Search({ pesquisar: true }),
            starts: 0,
            size: 6,
            pesquisar: "",
            hasStatus: true
        };
    },
    props: {
        controller: Object,
        hasEdit: {
            type: Boolean,
            default: true
        },
        hasDelete: {
            type: Boolean,
            default: true
        },
        hasCopy: {
            type: Boolean,
            default: true
        }
    },
    computed: {
        output: function() {
            var data =
                this.controller.data && this.controller.data.length > 0
                    ? this.controller.data
                    : false;
            if (!data) return [];

            var pesquisar = this.pesquisar && this.pesquisar.toLowerCase();
            // var categoria = this.categoria && this.categoria.toLowerCase()
            // var cidade = this.cidade && this.cidade.toLowerCase()
            // var datamm = this.datamm && this.datamm.toLowerCase()
            // var datayy = this.datayy && this.datayy.toLowerCase()
            // var dataup = this.dataup && this.dataup.toLowerCase()
            // var datato = this.datato && this.datato.toLowerCase()

            if (pesquisar && pesquisar.length >= 3) {
                data = data.filter(function(row) {
                    return (
                        String(row["name"])
                            .toLowerCase()
                            .indexOf(pesquisar) > -1
                    );
                });
            }
            // if (categoria) {
            // 	data = data.filter(function (row) {
            // 		return String(row['categoria']).toLowerCase().indexOf(categoria) > -1
            // 	})
            // }
            // if (cidade) {
            // 	data = data.filter(function (row) {
            // 		return String(row['cidade']).toLowerCase().indexOf(cidade) > -1
            // 	})
            // }
            // if (datayy) {
            // 	data = data.filter(function (row) {
            // 		return String(row['datayy']).toLowerCase().indexOf(datayy) > -1
            // 	})
            // }
            // if (datamm) {
            // 	data = data.filter(function (row) {
            // 		return String(row['datamm']).toLowerCase().indexOf(datamm) > -1
            // 	})
            // }
            // if ( (dataup || datato) && !(pesquisar && pesquisar.length >= 3) ) {
            // 	dataup = dataup ? dataup : 0;
            // 	datato = datato ? datato : 99999999;
            // 	data = data.filter(function (row) {
            // 		return ( row.data >= dataup && row.data <= datato)
            // 	})
            // }

            return data;
        },
        tabela: function() {
            return new Tabela(
                this.paginator,
                ["Nome", "Pai"],
                ["name", "parent_id.pagina"],
                false
            );
        },
        paginator: function() {
            if (this.paginatorInspector !== this.hashCode(this.output)) {
                this.paginatorInspector = this.hashCode(this.output);
                if (this.sizeofarray < this.starts) this.starts = 0;
            }
            if (this.size > this.sizeofarray) {
                return this.output.slice(this.starts, this.sizeofarray);
            }
            if (this.starts > this.end) {
                return this.output.slice(this.starts, this.sizeofarray);
            }
            return this.output.slice(this.starts, this.end);
        },
        end: function() {
            if (this.starts + this.size > this.sizeofarray) {
                return this.starts + this.size - this.sizeofarray;
            }
            return this.starts + this.size;
        },
        sizeofarray: function() {
            return this.output.length;
        },
        pagesize: function() {
            return Math.ceil(this.output.length / this.size);
        },
        pages: function() {
            var i = 0;
            var retorno = {};
            var page = this.page;
            if (this.page + 7 >= this.pagesize && this.pagesize >= 15)
                page = this.pagesize - 15;
            while (i < this.pagesize && i < 15) {
                if (this.page + 7 >= this.pagesize && this.pagesize >= 15)
                    retorno[i] = page + i;
                else if (page >= 8) retorno[i] = page - 7 + i;
                else retorno[i] = i;
                i++;
            }
            return retorno;
        },
        hasPage: function() {
            return !(this.pagesize == 1);
        },
        page: function() {
            return parseInt(this.starts / this.size);
        }
    },
    methods: {
        sortBy: function(key) {
            this.sortKey = key;
            this.sortOrders[key] = this.sortOrders[key] * -1;
        },
        toward: function() {
            if (this.starts > 0) this.starts -= this.size;
            else this.starts = (this.pagesize - 1) * this.size;
        },
        foward: function() {
            if (this.starts + this.size < this.sizeofarray)
                this.starts += this.size;
            else this.starts = 0;
        },
        hashCode: function(obj) {
            var s = JSON.stringify(obj);
            return s.split("").reduce(function(a, b) {
                a = (a << 5) - a + b.charCodeAt(0);
                return a & a;
            }, 0);
        },
        toPage(page) {
            this.starts = this.size * page;
        }
    }
});

// EVENTOS
// NOME : TEXTO
// ACTION : [ DELETE , EDIT, CLONE ]
Vue.component("eventos-data-item", {
    template: "#eventos-data-template",
    data: function() {
        return {
            pesquisa: new Search({
                pesquisar: true,
                destaque: true,
                categoria: true,
                datarange: true,
                cidade: true
            }),
            starts: 0,
            size: 6,

            pesquisar: "",
            status: 0,
            destaque: 0,
            categoria: "",
            cidade: "",
            datato: $.datepicker.formatDate("yymmdd", new Date()),
            dataup: $.datepicker.formatDate(
                "yymmdd",
                new Helper().getDaysAgo()
            ),

            hasEdit: true,
            hasDelete: true,
            hasCopy: true,
            hasStatus: true,
            hasDestaque: true
        };
    },
    props: {
        controller: Object
    },
    computed: {
        data: function() {
            return this.controller.data;
        },
        output: function() {
            var data =
                this.controller.data && this.controller.data.length > 0
                    ? this.controller.data
                    : false;
            if (!data) return [];

            var pesquisar = this.pesquisar && this.pesquisar.toLowerCase();
            var categoria = this.categoria && this.categoria.toLowerCase();
            var cidade = this.cidade && this.cidade.toLowerCase();
            // var datamm = this.datamm && this.datamm.toLowerCase()
            // var datayy = this.datayy && this.datayy.toLowerCase()
            var dataup = this.dataup && this.dataup.toLowerCase();
            var datato = this.datato && this.datato.toLowerCase();

            var status = this.status;
            var destaque = this.destaque;

            if (pesquisar && pesquisar.length >= 3) {
                data = data.filter(function(row) {
                    return (
                        String(row["name"])
                            .toLowerCase()
                            .indexOf(pesquisar) > -1
                    );
                });
            }
            if (categoria) {
                data = data.filter(function(row) {
                    return (
                        String(row["categoria"])
                            .toLowerCase()
                            .indexOf(categoria) > -1
                    );
                });
            }
            if (cidade) {
                data = data.filter(function(row) {
                    return (
                        String(row["cidade"])
                            .toLowerCase()
                            .indexOf(cidade) > -1
                    );
                });
            }
            // if (datayy) {
            // 	data = data.filter(function (row) {
            // 		return String(row['datayy']).toLowerCase().indexOf(datayy) > -1
            // 	})
            // }
            // if (datamm) {
            // 	data = data.filter(function (row) {
            // 		return String(row['datamm']).toLowerCase().indexOf(datamm) > -1
            // 	})
            // }
            if ( (dataup || datato) && !(pesquisar && pesquisar.length >= 3) ) {
                dataup = dataup ? dataup : 0;
                datato = datato ? datato : 99999999;
                data = data.filter(function(row) {
                    return (
                        row.data.slice(0, 8) >= dataup &&
                        row.data.slice(0, 8) <= datato
                    );
                });
            }

            if (status != 0) {
                data = data.filter(function(row) {
                    return row["status"] == status;
                });
            }

            if (destaque != 0) {
                data = data.filter(function(row) {
                    return row["destaque"] == destaque;
                });
            }

            return data;
        },
        tabela: function() {
            return new Tabela(
                this.paginator,
                ["Nome", "Imagem", "Endereço", "Categoria", "Data"],
                [
                    "name",
                    "image_id.imagem",
                    "local",
                    "categoria.categoria",
                    "data.data"
                ],
                false
            );
        },
        paginator: function() {
            if (this.paginatorInspector !== this.hashCode(this.output)) {
                this.paginatorInspector = this.hashCode(this.output);
                if (this.sizeofarray < this.starts) this.starts = 0;
            }
            if (this.size > this.sizeofarray) {
                return this.output.slice(this.starts, this.sizeofarray);
            }
            if (this.starts > this.end) {
                return this.output.slice(this.starts, this.sizeofarray);
            }
            return this.output.slice(this.starts, this.end);
        },
        end: function() {
            if (this.starts + this.size > this.sizeofarray) {
                return this.starts + this.size - this.sizeofarray;
            }
            return this.starts + this.size;
        },
        sizeofarray: function() {
            return this.output.length;
        },
        pagesize: function() {
            return Math.ceil(this.output.length / this.size);
        },
        pages: function() {
            var i = 0;
            var retorno = {};
            var page = this.page;
            if (this.page + 7 >= this.pagesize && this.pagesize >= 15)
                page = this.pagesize - 15;
            while (i < this.pagesize && i < 15) {
                if (this.page + 7 >= this.pagesize && this.pagesize >= 15)
                    retorno[i] = page + i;
                else if (page >= 8) retorno[i] = page - 7 + i;
                else retorno[i] = i;
                i++;
            }
            return retorno;
        },
        hasPage: function() {
            return !(this.pagesize == 1);
        },
        page: function() {
            return parseInt(this.starts / this.size);
        }
    },
    methods: {
        sortBy: function(key) {
            this.sortKey = key;
            this.sortOrders[key] = this.sortOrders[key] * -1;
        },
        toward: function() {
            if (this.starts > 0) this.starts -= this.size;
            else this.starts = (this.pagesize - 1) * this.size;
        },
        foward: function() {
            if (this.starts + this.size < this.sizeofarray)
                this.starts += this.size;
            else this.starts = 0;
        },
        hashCode: function(obj) {
            var s = JSON.stringify(obj);
            return s.split("").reduce(function(a, b) {
                a = (a << 5) - a + b.charCodeAt(0);
                return a & a;
            }, 0);
        },
        toPage(page) {
            this.starts = this.size * page;
        },
        relatorio() {
            var evento;

            var aux =
                '<table class="table center-block text-center" >' +
                '<thead style="background-color:#f86c6b; font-weight: bold;color:white"> ' +
                '<tr> <th scope="col">Nome</th> <th scope="col">Categoria</th> <th scope="col">Cidade</th> <th scope="col">Endereço</th> <th scope="col">Data</th></tr> ' +
                "</thead> " +
                '<tbody style="font-weight:normal; color:black;">';

            this.output.forEach(function(el) {
                evento = new Evento(el);
                aux += "<tr>";
                evento.relatorio().forEach(function(campo) {
                    aux +=
                        '<td scope="col" style="font-weight:normal; color:black;">' +
                        campo.value +
                        "</td>";
                });
                aux += "</tr>";
            });

            aux += "</tbody></table>";

            new Helper().relatorio(aux);
        }
    }
});

// BANNERS
// NOME : TEXTO
// ACTION : [ DELETE , EDIT, CLONE ]
Vue.component("categorias-eventos-data-item", {
    template: "#categorias-eventos-data-template",
    data: function() {
        return {
            pesquisa: new Search({ pesquisar: true }),
            starts: 0,
            size: 6,
            pesquisar: "",
            hasEdit: true,
            hasDelete: true,
            hasCopy: false,
            hasStatus: true
        };
    },
    props: {
        controller: Object
    },
    computed: {
        output: function() {
            var data =
                this.controller.data && this.controller.data.length > 0
                    ? this.controller.data
                    : false;
            if (!data) return [];

            var pesquisar = this.pesquisar && this.pesquisar.toLowerCase();
            // var categoria = this.categoria && this.categoria.toLowerCase()
            // var cidade = this.cidade && this.cidade.toLowerCase()
            // var datamm = this.datamm && this.datamm.toLowerCase()
            // var datayy = this.datayy && this.datayy.toLowerCase()
            // var dataup = this.dataup && this.dataup.toLowerCase()
            // var datato = this.datato && this.datato.toLowerCase()

            if (pesquisar && pesquisar.length >= 3) {
                data = data.filter(function(row) {
                    return (
                        String(row["name"])
                            .toLowerCase()
                            .indexOf(pesquisar) > -1
                    );
                });
            }
            // if (categoria) {
            // 	data = data.filter(function (row) {
            // 		return String(row['categoria']).toLowerCase().indexOf(categoria) > -1
            // 	})
            // }
            // if (cidade) {
            // 	data = data.filter(function (row) {
            // 		return String(row['cidade']).toLowerCase().indexOf(cidade) > -1
            // 	})
            // }
            // if (datayy) {
            // 	data = data.filter(function (row) {
            // 		return String(row['datayy']).toLowerCase().indexOf(datayy) > -1
            // 	})
            // }
            // if (datamm) {
            // 	data = data.filter(function (row) {
            // 		return String(row['datamm']).toLowerCase().indexOf(datamm) > -1
            // 	})
            // }
            // if ( (dataup || datato) && !(pesquisar && pesquisar.length >= 3) ) {
            // 	dataup = dataup ? dataup : 0;
            // 	datato = datato ? datato : 99999999;
            // 	data = data.filter(function (row) {
            // 		return ( row.data >= dataup && row.data <= datato)
            // 	})
            // }

            return data;
        },
        tabela: function() {
            return new Tabela(
                this.paginator,
                ["Nome", "Indice"],
                ["name", "indice"],
                false
            );
        },
        paginator: function() {
            if (this.paginatorInspector !== this.hashCode(this.output)) {
                this.paginatorInspector = this.hashCode(this.output);
                if (this.sizeofarray < this.starts) this.starts = 0;
            }
            if (this.size > this.sizeofarray) {
                return this.output.slice(this.starts, this.sizeofarray);
            }
            if (this.starts > this.end) {
                return this.output.slice(this.starts, this.sizeofarray);
            }
            return this.output.slice(this.starts, this.end);
        },
        end: function() {
            if (this.starts + this.size > this.sizeofarray) {
                return this.starts + this.size - this.sizeofarray;
            }
            return this.starts + this.size;
        },
        sizeofarray: function() {
            return this.output.length;
        },
        pagesize: function() {
            return Math.ceil(this.output.length / this.size);
        },
        pages: function() {
            var i = 0;
            var retorno = {};
            var page = this.page;
            if (this.page + 7 >= this.pagesize && this.pagesize >= 15)
                page = this.pagesize - 15;
            while (i < this.pagesize && i < 15) {
                if (this.page + 7 >= this.pagesize && this.pagesize >= 15)
                    retorno[i] = page + i;
                else if (page >= 8) retorno[i] = page - 7 + i;
                else retorno[i] = i;
                i++;
            }
            return retorno;
        },
        hasPage: function() {
            return !(this.pagesize == 1);
        },
        page: function() {
            return parseInt(this.starts / this.size);
        }
    },
    methods: {
        sortBy: function(key) {
            this.sortKey = key;
            this.sortOrders[key] = this.sortOrders[key] * -1;
        },
        toward: function() {
            if (this.starts > 0) this.starts -= this.size;
            else this.starts = (this.pagesize - 1) * this.size;
        },
        foward: function() {
            if (this.starts + this.size < this.sizeofarray)
                this.starts += this.size;
            else this.starts = 0;
        },
        hashCode: function(obj) {
            var s = JSON.stringify(obj);
            return s.split("").reduce(function(a, b) {
                a = (a << 5) - a + b.charCodeAt(0);
                return a & a;
            }, 0);
        },
        toPage(page) {
            this.starts = this.size * page;
        }
    }
});




// BANNERS
// NOME : TEXTO
// ACTION : [ DELETE , EDIT, CLONE ]
Vue.component("categorias-licitacoes-data-item", {
    template: "#categorias-licitacoes-data-template",
    data: function() {
        return {
            pesquisa: new Search({ pesquisar: true }),
            starts: 0,
            size: 6,
            pesquisar: "",
            hasEdit: true,
            hasDelete: true,
            hasCopy: false,
            hasStatus: true
        };
    },
    props: {
        controller: Object
    },
    computed: {
        output: function() {
            var data =
                this.controller.data && this.controller.data.length > 0
                    ? this.controller.data
                    : false;
            if (!data) return [];

            var pesquisar = this.pesquisar && this.pesquisar.toLowerCase();
            // var categoria = this.categoria && this.categoria.toLowerCase()
            // var cidade = this.cidade && this.cidade.toLowerCase()
            // var datamm = this.datamm && this.datamm.toLowerCase()
            // var datayy = this.datayy && this.datayy.toLowerCase()
            // var dataup = this.dataup && this.dataup.toLowerCase()
            // var datato = this.datato && this.datato.toLowerCase()

            if (pesquisar && pesquisar.length >= 3) {
                data = data.filter(function(row) {
                    return (
                        String(row["name"])
                            .toLowerCase()
                            .indexOf(pesquisar) > -1
                    );
                });
            }
            // if (categoria) {
            // 	data = data.filter(function (row) {
            // 		return String(row['categoria']).toLowerCase().indexOf(categoria) > -1
            // 	})
            // }
            // if (cidade) {
            // 	data = data.filter(function (row) {
            // 		return String(row['cidade']).toLowerCase().indexOf(cidade) > -1
            // 	})
            // }
            // if (datayy) {
            // 	data = data.filter(function (row) {
            // 		return String(row['datayy']).toLowerCase().indexOf(datayy) > -1
            // 	})
            // }
            // if (datamm) {
            // 	data = data.filter(function (row) {
            // 		return String(row['datamm']).toLowerCase().indexOf(datamm) > -1
            // 	})
            // }
            // if ( (dataup || datato) && !(pesquisar && pesquisar.length >= 3) ) {
            // 	dataup = dataup ? dataup : 0;
            // 	datato = datato ? datato : 99999999;
            // 	data = data.filter(function (row) {
            // 		return ( row.data >= dataup && row.data <= datato)
            // 	})
            // }

            return data;
        },
        tabela: function() {
            return new Tabela(
                this.paginator,
                ["Nome", "Indice"],
                ["name", "indice"],
                false
            );
        },
        paginator: function() {
            if (this.paginatorInspector !== this.hashCode(this.output)) {
                this.paginatorInspector = this.hashCode(this.output);
                if (this.sizeofarray < this.starts) this.starts = 0;
            }
            if (this.size > this.sizeofarray) {
                return this.output.slice(this.starts, this.sizeofarray);
            }
            if (this.starts > this.end) {
                return this.output.slice(this.starts, this.sizeofarray);
            }
            return this.output.slice(this.starts, this.end);
        },
        end: function() {
            if (this.starts + this.size > this.sizeofarray) {
                return this.starts + this.size - this.sizeofarray;
            }
            return this.starts + this.size;
        },
        sizeofarray: function() {
            return this.output.length;
        },
        pagesize: function() {
            return Math.ceil(this.output.length / this.size);
        },
        pages: function() {
            var i = 0;
            var retorno = {};
            var page = this.page;
            if (this.page + 7 >= this.pagesize && this.pagesize >= 15)
                page = this.pagesize - 15;
            while (i < this.pagesize && i < 15) {
                if (this.page + 7 >= this.pagesize && this.pagesize >= 15)
                    retorno[i] = page + i;
                else if (page >= 8) retorno[i] = page - 7 + i;
                else retorno[i] = i;
                i++;
            }
            return retorno;
        },
        hasPage: function() {
            return !(this.pagesize == 1);
        },
        page: function() {
            return parseInt(this.starts / this.size);
        }
    },
    methods: {
        sortBy: function(key) {
            this.sortKey = key;
            this.sortOrders[key] = this.sortOrders[key] * -1;
        },
        toward: function() {
            if (this.starts > 0) this.starts -= this.size;
            else this.starts = (this.pagesize - 1) * this.size;
        },
        foward: function() {
            if (this.starts + this.size < this.sizeofarray)
                this.starts += this.size;
            else this.starts = 0;
        },
        hashCode: function(obj) {
            var s = JSON.stringify(obj);
            return s.split("").reduce(function(a, b) {
                a = (a << 5) - a + b.charCodeAt(0);
                return a & a;
            }, 0);
        },
        toPage(page) {
            this.starts = this.size * page;
        }
    }
});



// BANNERS
// NOME : TEXTO
// ACTION : [ DELETE , EDIT, CLONE ]
Vue.component("categorias-vagas-data-item", {
  template: "#categorias-vagas-data-template",
  data: function() {
      return {
          pesquisa: new Search({ pesquisar: true }),
          starts: 0,
          size: 6,
          pesquisar: "",
          hasEdit: true,
          hasDelete: true,
          hasCopy: false,
          hasStatus: true
      };
  },
  props: {
      controller: Object
  },
  computed: {
      output: function() {
          var data =
              this.controller.data && this.controller.data.length > 0
                  ? this.controller.data
                  : false;
          if (!data) return [];

          var pesquisar = this.pesquisar && this.pesquisar.toLowerCase();
          // var categoria = this.categoria && this.categoria.toLowerCase()
          // var cidade = this.cidade && this.cidade.toLowerCase()
          // var datamm = this.datamm && this.datamm.toLowerCase()
          // var datayy = this.datayy && this.datayy.toLowerCase()
          // var dataup = this.dataup && this.dataup.toLowerCase()
          // var datato = this.datato && this.datato.toLowerCase()

          if (pesquisar && pesquisar.length >= 3) {
              data = data.filter(function(row) {
                  return (
                      String(row["name"])
                          .toLowerCase()
                          .indexOf(pesquisar) > -1
                  );
              });
          }
          // if (categoria) {
          // 	data = data.filter(function (row) {
          // 		return String(row['categoria']).toLowerCase().indexOf(categoria) > -1
          // 	})
          // }
          // if (cidade) {
          // 	data = data.filter(function (row) {
          // 		return String(row['cidade']).toLowerCase().indexOf(cidade) > -1
          // 	})
          // }
          // if (datayy) {
          // 	data = data.filter(function (row) {
          // 		return String(row['datayy']).toLowerCase().indexOf(datayy) > -1
          // 	})
          // }
          // if (datamm) {
          // 	data = data.filter(function (row) {
          // 		return String(row['datamm']).toLowerCase().indexOf(datamm) > -1
          // 	})
          // }
          // if ( (dataup || datato) && !(pesquisar && pesquisar.length >= 3) ) {
          // 	dataup = dataup ? dataup : 0;
          // 	datato = datato ? datato : 99999999;
          // 	data = data.filter(function (row) {
          // 		return ( row.data >= dataup && row.data <= datato)
          // 	})
          // }

          return data;
      },
      tabela: function() {
          return new Tabela(
              this.paginator,
              ["Nome", "Indice"],
              ["name", "indice"],
              false
          );
      },
      paginator: function() {
          if (this.paginatorInspector !== this.hashCode(this.output)) {
              this.paginatorInspector = this.hashCode(this.output);
              if (this.sizeofarray < this.starts) this.starts = 0;
          }
          if (this.size > this.sizeofarray) {
              return this.output.slice(this.starts, this.sizeofarray);
          }
          if (this.starts > this.end) {
              return this.output.slice(this.starts, this.sizeofarray);
          }
          return this.output.slice(this.starts, this.end);
      },
      end: function() {
          if (this.starts + this.size > this.sizeofarray) {
              return this.starts + this.size - this.sizeofarray;
          }
          return this.starts + this.size;
      },
      sizeofarray: function() {
          return this.output.length;
      },
      pagesize: function() {
          return Math.ceil(this.output.length / this.size);
      },
      pages: function() {
          var i = 0;
          var retorno = {};
          var page = this.page;
          if (this.page + 7 >= this.pagesize && this.pagesize >= 15)
              page = this.pagesize - 15;
          while (i < this.pagesize && i < 15) {
              if (this.page + 7 >= this.pagesize && this.pagesize >= 15)
                  retorno[i] = page + i;
              else if (page >= 8) retorno[i] = page - 7 + i;
              else retorno[i] = i;
              i++;
          }
          return retorno;
      },
      hasPage: function() {
          return !(this.pagesize == 1);
      },
      page: function() {
          return parseInt(this.starts / this.size);
      }
  },
  methods: {
      sortBy: function(key) {
          this.sortKey = key;
          this.sortOrders[key] = this.sortOrders[key] * -1;
      },
      toward: function() {
          if (this.starts > 0) this.starts -= this.size;
          else this.starts = (this.pagesize - 1) * this.size;
      },
      foward: function() {
          if (this.starts + this.size < this.sizeofarray)
              this.starts += this.size;
          else this.starts = 0;
      },
      hashCode: function(obj) {
          var s = JSON.stringify(obj);
          return s.split("").reduce(function(a, b) {
              a = (a << 5) - a + b.charCodeAt(0);
              return a & a;
          }, 0);
      },
      toPage(page) {
          this.starts = this.size * page;
      }
  }
});



// BANNERS
// NOME : TEXTO
// ACTION : [ DELETE , EDIT, CLONE ]
Vue.component("categorias-noticia-data-item", {
    template: "#categorias-noticia-data-template",
    data: function() {
        return {
            pesquisa: new Search({ pesquisar: true }),
            starts: 0,
            size: 6,
            pesquisar: "",
            hasEdit: true,
            hasDelete: true,
            hasCopy: false,
            hasStatus: true
        };
    },
    props: {
        controller: Object
    },
    computed: {
        output: function() {
            var data =
                this.controller.data && this.controller.data.length > 0
                    ? this.controller.data
                    : false;
            if (!data) return [];

            var pesquisar = this.pesquisar && this.pesquisar.toLowerCase();
            // var categoria = this.categoria && this.categoria.toLowerCase()
            // var cidade = this.cidade && this.cidade.toLowerCase()
            // var datamm = this.datamm && this.datamm.toLowerCase()
            // var datayy = this.datayy && this.datayy.toLowerCase()
            // var dataup = this.dataup && this.dataup.toLowerCase()
            // var datato = this.datato && this.datato.toLowerCase()

            if (pesquisar && pesquisar.length >= 3) {
                data = data.filter(function(row) {
                    return (
                        String(row["name"])
                            .toLowerCase()
                            .indexOf(pesquisar) > -1
                    );
                });
            }
            // if (categoria) {
            // 	data = data.filter(function (row) {
            // 		return String(row['categoria']).toLowerCase().indexOf(categoria) > -1
            // 	})
            // }
            // if (cidade) {
            // 	data = data.filter(function (row) {
            // 		return String(row['cidade']).toLowerCase().indexOf(cidade) > -1
            // 	})
            // }
            // if (datayy) {
            // 	data = data.filter(function (row) {
            // 		return String(row['datayy']).toLowerCase().indexOf(datayy) > -1
            // 	})
            // }
            // if (datamm) {
            // 	data = data.filter(function (row) {
            // 		return String(row['datamm']).toLowerCase().indexOf(datamm) > -1
            // 	})
            // }
            // if ( (dataup || datato) && !(pesquisar && pesquisar.length >= 3) ) {
            // 	dataup = dataup ? dataup : 0;
            // 	datato = datato ? datato : 99999999;
            // 	data = data.filter(function (row) {
            // 		return ( row.data >= dataup && row.data <= datato)
            // 	})
            // }

            return data;
        },
        tabela: function() {
            return new Tabela(
                this.paginator,
                ["Nome", "Indice"],
                ["name", "indice"],
                false
            );
        },
        paginator: function() {
            if (this.paginatorInspector !== this.hashCode(this.output)) {
                this.paginatorInspector = this.hashCode(this.output);
                if (this.sizeofarray < this.starts) this.starts = 0;
            }
            if (this.size > this.sizeofarray) {
                return this.output.slice(this.starts, this.sizeofarray);
            }
            if (this.starts > this.end) {
                return this.output.slice(this.starts, this.sizeofarray);
            }
            return this.output.slice(this.starts, this.end);
        },
        end: function() {
            if (this.starts + this.size > this.sizeofarray) {
                return this.starts + this.size - this.sizeofarray;
            }
            return this.starts + this.size;
        },
        sizeofarray: function() {
            return this.output.length;
        },
        pagesize: function() {
            return Math.ceil(this.output.length / this.size);
        },
        pages: function() {
            var i = 0;
            var retorno = {};
            var page = this.page;
            if (this.page + 7 >= this.pagesize && this.pagesize >= 15)
                page = this.pagesize - 15;
            while (i < this.pagesize && i < 15) {
                if (this.page + 7 >= this.pagesize && this.pagesize >= 15)
                    retorno[i] = page + i;
                else if (page >= 8) retorno[i] = page - 7 + i;
                else retorno[i] = i;
                i++;
            }
            return retorno;
        },
        hasPage: function() {
            return !(this.pagesize == 1);
        },
        page: function() {
            return parseInt(this.starts / this.size);
        }
    },
    methods: {
        sortBy: function(key) {
            this.sortKey = key;
            this.sortOrders[key] = this.sortOrders[key] * -1;
        },
        toward: function() {
            if (this.starts > 0) this.starts -= this.size;
            else this.starts = (this.pagesize - 1) * this.size;
        },
        foward: function() {
            if (this.starts + this.size < this.sizeofarray)
                this.starts += this.size;
            else this.starts = 0;
        },
        hashCode: function(obj) {
            var s = JSON.stringify(obj);
            return s.split("").reduce(function(a, b) {
                a = (a << 5) - a + b.charCodeAt(0);
                return a & a;
            }, 0);
        },
        toPage(page) {
            this.starts = this.size * page;
        }
    }
});

// VIDEO
// NOME : TEXTO
// ACTION : [ DELETE ]
Vue.component("video-data-item", {
    template: "#video-data-template",
    data: function() {
        return {
            pesquisa: new Search({ pesquisar: true }),
            starts: 0,
            size: 6,
            pesquisar: "",
            hasDelete: true
        };
    },
    props: {
        controller: Object
    },
    computed: {
        output: function() {
            var data =
                this.controller.data && this.controller.data.length > 0
                    ? this.controller.data
                    : false;
            if (!data) return [];

            var pesquisar = this.pesquisar && this.pesquisar.toLowerCase();
            // var categoria = this.categoria && this.categoria.toLowerCase()
            // var cidade = this.cidade && this.cidade.toLowerCase()
            // var datamm = this.datamm && this.datamm.toLowerCase()
            // var datayy = this.datayy && this.datayy.toLowerCase()
            // var dataup = this.dataup && this.dataup.toLowerCase()
            // var datato = this.datato && this.datato.toLowerCase()

            if (pesquisar && pesquisar.length >= 3) {
                data = data.filter(function(row) {
                    return (
                        String(row["name"])
                            .toLowerCase()
                            .indexOf(pesquisar) > -1
                    );
                });
            }
            // if (categoria) {
            // 	data = data.filter(function (row) {
            // 		return String(row['categoria']).toLowerCase().indexOf(categoria) > -1
            // 	})
            // }
            // if (cidade) {
            // 	data = data.filter(function (row) {
            // 		return String(row['cidade']).toLowerCase().indexOf(cidade) > -1
            // 	})
            // }
            // if (datayy) {
            // 	data = data.filter(function (row) {
            // 		return String(row['datayy']).toLowerCase().indexOf(datayy) > -1
            // 	})
            // }
            // if (datamm) {
            // 	data = data.filter(function (row) {
            // 		return String(row['datamm']).toLowerCase().indexOf(datamm) > -1
            // 	})
            // }
            // if ( (dataup || datato) && !(pesquisar && pesquisar.length >= 3) ) {
            // 	dataup = dataup ? dataup : 0;
            // 	datato = datato ? datato : 99999999;
            // 	data = data.filter(function (row) {
            // 		return ( row.data >= dataup && row.data <= datato)
            // 	})
            // }

            return data;
        },
        tabela: function() {
            return new Tabela(this.paginator, ["Nome"], ["name"], false);
        },
        paginator: function() {
            if (this.paginatorInspector !== this.hashCode(this.output)) {
                this.paginatorInspector = this.hashCode(this.output);
                if (this.sizeofarray < this.starts) this.starts = 0;
            }
            if (this.size > this.sizeofarray) {
                return this.output.slice(this.starts, this.sizeofarray);
            }
            if (this.starts > this.end) {
                return this.output.slice(this.starts, this.sizeofarray);
            }
            return this.output.slice(this.starts, this.end);
        },
        end: function() {
            if (this.starts + this.size > this.sizeofarray) {
                return this.starts + this.size - this.sizeofarray;
            }
            return this.starts + this.size;
        },
        sizeofarray: function() {
            return this.output.length;
        },
        pagesize: function() {
            return Math.ceil(this.output.length / this.size);
        },
        pages: function() {
            var i = 0;
            var retorno = {};
            var page = this.page;
            if (this.page + 7 >= this.pagesize && this.pagesize >= 15)
                page = this.pagesize - 15;
            while (i < this.pagesize && i < 15) {
                if (this.page + 7 >= this.pagesize && this.pagesize >= 15)
                    retorno[i] = page + i;
                else if (page >= 8) retorno[i] = page - 7 + i;
                else retorno[i] = i;
                i++;
            }
            return retorno;
        },
        hasPage: function() {
            return !(this.pagesize == 1);
        },
        page: function() {
            return parseInt(this.starts / this.size);
        }
    },
    methods: {
        sortBy: function(key) {
            this.sortKey = key;
            this.sortOrders[key] = this.sortOrders[key] * -1;
        },
        toward: function() {
            if (this.starts > 0) this.starts -= this.size;
            else this.starts = (this.pagesize - 1) * this.size;
        },
        foward: function() {
            if (this.starts + this.size < this.sizeofarray)
                this.starts += this.size;
            else this.starts = 0;
        },
        hashCode: function(obj) {
            var s = JSON.stringify(obj);
            return s.split("").reduce(function(a, b) {
                a = (a << 5) - a + b.charCodeAt(0);
                return a & a;
            }, 0);
        },
        toPage(page) {
            this.starts = this.size * page;
        }
    }
});

// MULTIMIDIA
// NOME : TEXTO
// ACTION : [ DELETE , EDIT, CLONE ]
Vue.component("multimidias-data-item", {
    template: "#multimidias-data-template",
    data: function() {
        return {
            pesquisa: new Search({ pesquisar: true }),
            starts: 0,
            size: 6,
            pesquisar: "",
            hasEdit: true,
            hasDelete: true,
            hasCopy: true,
            hasStatus: true
        };
    },
    props: {
        controller: Object
    },
    computed: {
        output: function() {
            var data =
                this.controller.data && this.controller.data.length > 0
                    ? this.controller.data
                    : false;
            if (!data) return [];

            var pesquisar = this.pesquisar && this.pesquisar.toLowerCase();
            // var categoria = this.categoria && this.categoria.toLowerCase()
            // var cidade = this.cidade && this.cidade.toLowerCase()
            // var datamm = this.datamm && this.datamm.toLowerCase()
            // var datayy = this.datayy && this.datayy.toLowerCase()
            // var dataup = this.dataup && this.dataup.toLowerCase()
            // var datato = this.datato && this.datato.toLowerCase()

            if (pesquisar && pesquisar.length >= 3) {
                data = data.filter(function(row) {
                    return (
                        String(row["name"])
                            .toLowerCase()
                            .indexOf(pesquisar) > -1
                    );
                });
            }
            // if (categoria) {
            // 	data = data.filter(function (row) {
            // 		return String(row['categoria']).toLowerCase().indexOf(categoria) > -1
            // 	})
            // }
            // if (cidade) {
            // 	data = data.filter(function (row) {
            // 		return String(row['cidade']).toLowerCase().indexOf(cidade) > -1
            // 	})
            // }
            // if (datayy) {
            // 	data = data.filter(function (row) {
            // 		return String(row['datayy']).toLowerCase().indexOf(datayy) > -1
            // 	})
            // }
            // if (datamm) {
            // 	data = data.filter(function (row) {
            // 		return String(row['datamm']).toLowerCase().indexOf(datamm) > -1
            // 	})
            // }
            // if ( (dataup || datato) && !(pesquisar && pesquisar.length >= 3) ) {
            // 	dataup = dataup ? dataup : 0;
            // 	datato = datato ? datato : 99999999;
            // 	data = data.filter(function (row) {
            // 		return ( row.data >= dataup && row.data <= datato)
            // 	})
            // }

            return data;
        },
        tabela: function() {
            return new Tabela(this.paginator, ["Nome"], ["name"], false);
        },
        paginator: function() {
            if (this.paginatorInspector !== this.hashCode(this.output)) {
                this.paginatorInspector = this.hashCode(this.output);
                if (this.sizeofarray < this.starts) this.starts = 0;
            }
            if (this.size > this.sizeofarray) {
                return this.output.slice(this.starts, this.sizeofarray);
            }
            if (this.starts > this.end) {
                return this.output.slice(this.starts, this.sizeofarray);
            }
            return this.output.slice(this.starts, this.end);
        },
        end: function() {
            if (this.starts + this.size > this.sizeofarray) {
                return this.starts + this.size - this.sizeofarray;
            }
            return this.starts + this.size;
        },
        sizeofarray: function() {
            return this.output.length;
        },
        pagesize: function() {
            return Math.ceil(this.output.length / this.size);
        },
        pages: function() {
            var i = 0;
            var retorno = {};
            var page = this.page;
            if (this.page + 7 >= this.pagesize && this.pagesize >= 15)
                page = this.pagesize - 15;
            while (i < this.pagesize && i < 15) {
                if (this.page + 7 >= this.pagesize && this.pagesize >= 15)
                    retorno[i] = page + i;
                else if (page >= 8) retorno[i] = page - 7 + i;
                else retorno[i] = i;
                i++;
            }
            return retorno;
        },
        hasPage: function() {
            return !(this.pagesize == 1);
        },
        page: function() {
            return parseInt(this.starts / this.size);
        }
    },
    methods: {
        sortBy: function(key) {
            this.sortKey = key;
            this.sortOrders[key] = this.sortOrders[key] * -1;
        },
        toward: function() {
            if (this.starts > 0) this.starts -= this.size;
            else this.starts = (this.pagesize - 1) * this.size;
        },
        foward: function() {
            if (this.starts + this.size < this.sizeofarray)
                this.starts += this.size;
            else this.starts = 0;
        },
        hashCode: function(obj) {
            var s = JSON.stringify(obj);
            return s.split("").reduce(function(a, b) {
                a = (a << 5) - a + b.charCodeAt(0);
                return a & a;
            }, 0);
        },
        toPage(page) {
            this.starts = this.size * page;
        }
    }
});

// NOTICIA
// NOME : TEXTO
// ACTION : [ DELETE , EDIT, CLONE ]
Vue.component("noticia-data-item", {
    template: "#noticia-data-template",
    data: function() {
        return {
            pesquisa: new Search({
                pesquisar: true,
                destaque: true,
                categoria: true,
                datarange: true
            }),
            starts: 0,
            size: 6,

            pesquisar: "",
            status: 0,
            destaque: 0,
            categoria: "",
            datato: $.datepicker.formatDate("yymmdd", new Date()),
            dataup: $.datepicker.formatDate(
                "yymmdd",
                new Helper().getDaysAgo()
            ),

            hasEdit: true,
            hasDelete: true,
            hasCopy: true,
            hasStatus: true,
            hasDestaque: true
        };
    },
    props: {
        controller: Object
    },
    computed: {
        data: function() {
            return this.controller.data;
        },
        output: function() {
            var data =
                this.controller.data && this.controller.data.length > 0
                    ? this.controller.data
                    : false;
            if (!data) return [];

            var pesquisar = this.pesquisar && this.pesquisar.toLowerCase();
            var categoria = this.categoria && this.categoria.toLowerCase();
            // var cidade = this.cidade && this.cidade.toLowerCase()
            // var datamm = this.datamm && this.datamm.toLowerCase()
            // var datayy = this.datayy && this.datayy.toLowerCase()
            var dataup = this.dataup && this.dataup.toLowerCase();
            var datato = this.datato && this.datato.toLowerCase();

            var status = this.status;
            var destaque = this.destaque;

            if (pesquisar && pesquisar.length >= 3) {
                data = data.filter(function(row) {
                    return (
                        String(row["name"])
                            .toLowerCase()
                            .indexOf(pesquisar) > -1
                    );
                });
            }
            if (categoria) {
                data = data.filter(function(row) {
                    return (
                        String(row["categoria"])
                            .toLowerCase()
                            .indexOf(categoria) > -1
                    );
                });
            }
            // if (cidade) {
            // 	data = data.filter(function (row) {
            // 		return String(row['cidade']).toLowerCase().indexOf(cidade) > -1
            // 	})
            // }
            // if (datayy) {
            // 	data = data.filter(function (row) {
            // 		return String(row['datayy']).toLowerCase().indexOf(datayy) > -1
            // 	})
            // }
            // if (datamm) {
            // 	data = data.filter(function (row) {
            // 		return String(row['datamm']).toLowerCase().indexOf(datamm) > -1
            // 	})
            // }

            if ( ( (dataup || datato) && !(pesquisar && pesquisar.length >= 3) ) && !(pesquisar && pesquisar.length >= 3)) {
                dataup = dataup ? dataup : 0;
                datato = datato ? datato : 99999999;
                data = data.filter(function(row) {
                    return (
                        row.data.slice(0, 8) >= dataup &&
                        row.data.slice(0, 8) <= datato
                    );
                });
            }

            if (status != 0) {
                data = data.filter(function(row) {
                    return row["status"] == status;
                });
            }

            if (destaque != 0) {
                data = data.filter(function(row) {
                    return row["destaque"] == destaque;
                });
            }

            return data;
        },
        tabela: function() {
            return new Tabela(
                this.paginator,
                ["Nome", "Categoria", "Data"],
                ["name", "categoria.categoria", "data.data"],
                false
            );
        },
        paginator: function() {
            if (this.paginatorInspector !== this.hashCode(this.output)) {
                this.paginatorInspector = this.hashCode(this.output);
                if (this.sizeofarray < this.starts) this.starts = 0;
            }
            if (this.size > this.sizeofarray) {
                return this.output.slice(this.starts, this.sizeofarray);
            }
            if (this.starts > this.end) {
                return this.output.slice(this.starts, this.sizeofarray);
            }
            return this.output.slice(this.starts, this.end);
        },
        end: function() {
            if (this.starts + this.size > this.sizeofarray) {
                return this.starts + this.size - this.sizeofarray;
            }
            return this.starts + this.size;
        },
        sizeofarray: function() {
            return this.output.length;
        },
        pagesize: function() {
            return Math.ceil(this.output.length / this.size);
        },
        pages: function() {
            var i = 0;
            var retorno = {};
            var page = this.page;
            if (this.page + 7 >= this.pagesize && this.pagesize >= 15)
                page = this.pagesize - 15;
            while (i < this.pagesize && i < 15) {
                if (this.page + 7 >= this.pagesize && this.pagesize >= 15)
                    retorno[i] = page + i;
                else if (page >= 8) retorno[i] = page - 7 + i;
                else retorno[i] = i;
                i++;
            }
            return retorno;
        },
        hasPage: function() {
            return !(this.pagesize == 1);
        },
        page: function() {
            return parseInt(this.starts / this.size);
        }
    },
    methods: {
        sortBy: function(key) {
            this.sortKey = key;
            this.sortOrders[key] = this.sortOrders[key] * -1;
        },
        toward: function() {
            if (this.starts > 0) this.starts -= this.size;
            else this.starts = (this.pagesize - 1) * this.size;
        },
        foward: function() {
            if (this.starts + this.size < this.sizeofarray)
                this.starts += this.size;
            else this.starts = 0;
        },
        hashCode: function(obj) {
            var s = JSON.stringify(obj);
            return s.split("").reduce(function(a, b) {
                a = (a << 5) - a + b.charCodeAt(0);
                return a & a;
            }, 0);
        },
        toPage(page) {
            this.starts = this.size * page;
        }
    }
});

//VAGAS
// OBJETO : TEXTO
// NUMERO : TEXTO
// PROCESSO : TEXTO
// ABERTURA: DATA
// LOCAL : TEXTO
// ACTION : [ DELETE , EDIT, COPY ]
Vue.component("vagas-data-item", {
    template: "#vagas-data-template",
    data: function() {
        return {
            pesquisa: new Search({
                pesquisar: true,
                datarange: true,
                cidade: true,
                categoria: true
            }),
            starts: 0,
            size: 6,

            pesquisar: "",
            categoria: "",
            cidade: "",
            datato: $.datepicker.formatDate("yymmdd", new Date()),
            dataup: $.datepicker.formatDate(
                "yymmdd",
                new Helper().getDaysAgo()
            ),

            hasDelete: true,
            hasCopy: true,
            hasEdit: true
        };
    },
    props: {
        controller: Object
    },
    computed: {
        output: function() {
            var data =
                this.controller.data && this.controller.data.length > 0
                    ? this.controller.data
                    : false;
            if (!data) return [];

            var pesquisar = this.pesquisar && this.pesquisar.toLowerCase();
            var categoria = this.categoria && this.categoria.toLowerCase();
            var cidade = this.cidade && this.cidade.toLowerCase();
            // var datamm = this.datamm && this.datamm.toLowerCase()
            // var datayy = this.datayy && this.datayy.toLowerCase()
            var dataup = this.dataup && this.dataup.toLowerCase();
            var datato = this.datato && this.datato.toLowerCase();

            if (pesquisar && pesquisar.length >= 3) {
                data = data.filter(function(row) {
                    return (
                        String(row["name"])
                            .toLowerCase()
                            .indexOf(pesquisar) > -1
                    );
                });
            }
            if (categoria) {
                data = data.filter(function(row) {
                    return (
                        String(row["categoria"])
                            .toLowerCase()
                            .indexOf(categoria) > -1
                    );
                });
            }
            if (cidade) {
                data = data.filter(function(row) {
                    return (
                        String(row["cidade"])
                            .toLowerCase()
                            .indexOf(cidade) > -1
                    );
                });
            }
            // if (datayy) {
            // 	data = data.filter(function (row) {
            // 		return String(row['datayy']).toLowerCase().indexOf(datayy) > -1
            // 	})
            // }
            // if (datamm) {
            // 	data = data.filter(function (row) {
            // 		return String(row['datamm']).toLowerCase().indexOf(datamm) > -1
            // 	})
            // }
            if ( (dataup || datato) && !(pesquisar && pesquisar.length >= 3) ) {
                dataup = dataup ? dataup : 0;
                datato = datato ? datato : 99999999;
                data = data.filter(function(row) {
                    return (
                        row.data.slice(0, 8) >= dataup &&
                        row.data.slice(0, 8) <= datato
                    );
                });
            }

            return data;
        },
        tabela: function() {
            return new Tabela(
                this.paginator,
                ["Nome", "Cidade", "Categoria", "Descrição", "Data"],
                [
                    "name",
                    "cidade.cidade",
                    "categoria.categoria",
                    "descricao",
                    "data.data"
                ],
                false
            );
        },
        paginator: function() {
            if (this.paginatorInspector !== this.hashCode(this.output)) {
                this.paginatorInspector = this.hashCode(this.output);
                if (this.sizeofarray < this.starts) this.starts = 0;
            }
            if (this.size > this.sizeofarray) {
                return this.output.slice(this.starts, this.sizeofarray);
            }
            if (this.starts > this.end) {
                return this.output.slice(this.starts, this.sizeofarray);
            }
            return this.output.slice(this.starts, this.end);
        },
        end: function() {
            if (this.starts + this.size > this.sizeofarray) {
                return this.starts + this.size - this.sizeofarray;
            }
            return this.starts + this.size;
        },
        sizeofarray: function() {
            return this.output.length;
        },
        pagesize: function() {
            return Math.ceil(this.output.length / this.size);
        },
        pages: function() {
            var i = 0;
            var retorno = {};
            var page = this.page;
            if (this.page + 7 >= this.pagesize && this.pagesize >= 15)
                page = this.pagesize - 15;
            while (i < this.pagesize && i < 15) {
                if (this.page + 7 >= this.pagesize && this.pagesize >= 15)
                    retorno[i] = page + i;
                else if (page >= 8) retorno[i] = page - 7 + i;
                else retorno[i] = i;
                i++;
            }
            return retorno;
        },
        hasPage: function() {
            return !(this.pagesize == 1);
        },
        page: function() {
            return parseInt(this.starts / this.size);
        }
    },
    methods: {
        sortBy: function(key) {
            this.sortKey = key;
            this.sortOrders[key] = this.sortOrders[key] * -1;
        },
        toward: function() {
            if (this.starts > 0) this.starts -= this.size;
            else this.starts = (this.pagesize - 1) * this.size;
        },
        foward: function() {
            if (this.starts + this.size < this.sizeofarray)
                this.starts += this.size;
            else this.starts = 0;
        },
        hashCode: function(obj) {
            var s = JSON.stringify(obj);
            return s.split("").reduce(function(a, b) {
                a = (a << 5) - a + b.charCodeAt(0);
                return a & a;
            }, 0);
        },
        toPage(page) {
            this.starts = this.size * page;
        }
    }
});

//LICITACOES MOVEIS
// OBJETO : TEXTO
// NUMERO : TEXTO
// PROCESSO : TEXTO
// ABERTURA: DATA
// LOCAL : TEXTO
// ACTION : [ DELETE , EDIT, COPY ]
Vue.component("licitacoes-data-item", {
    template: "#licitacoes-data-template",
    data: function() {
        return {
            pesquisa: new Search({
                pesquisar: true,
                categoria: true,
                datarange: true,
                status: true
            }),
            starts: 0,
            size: 6,

            status: true,
            pesquisar: "",
            categoria: "",
            datato: $.datepicker.formatDate("yymmdd", new Date()),
            dataup: $.datepicker.formatDate(
                "yymmdd",
                new Helper().getDaysAgo()
            ),

            hasDelete: true,
            hasCopy: true,
            hasEdit: true,
            hasStatus: true
        };
    },
    props: {
        controller: Object
    },
    computed: {
        output: function() {
            var data =
                this.controller.data && this.controller.data.length > 0
                    ? this.controller.data
                    : false;
            if (!data) return [];

            var pesquisar = this.pesquisar && this.pesquisar.toLowerCase();
            var categoria = this.categoria && this.categoria.toLowerCase();
            // var cidade = this.cidade && this.cidade.toLowerCase()
            // var datamm = this.datamm && this.datamm.toLowerCase()
            // var datayy = this.datayy && this.datayy.toLowerCase()
            var dataup = this.dataup && this.dataup.toLowerCase();
            var datato = this.datato && this.datato.toLowerCase();
            var status = this.status;

            if (pesquisar && pesquisar.length >= 3) {
                data = data.filter(function(row) {
                    return (
                        String(row["name"])
                            .toLowerCase()
                            .indexOf(pesquisar) > -1
                    );
                });
            }
            if (categoria) {
                data = data.filter(function(row) {
                    return (
                        String(row["categoria"])
                            .toLowerCase()
                            .indexOf(categoria) > -1
                    );
                });
            }
            // if (cidade) {
            // 	data = data.filter(function (row) {
            // 		return String(row['cidade']).toLowerCase().indexOf(cidade) > -1
            // 	})
            // }
            // if (datayy) {
            // 	data = data.filter(function (row) {
            // 		return String(row['datayy']).toLowerCase().indexOf(datayy) > -1
            // 	})
            // }
            // if (datamm) {
            // 	data = data.filter(function (row) {
            // 		return String(row['datamm']).toLowerCase().indexOf(datamm) > -1
            // 	})
            // }
            if ( (dataup || datato) && !(pesquisar && pesquisar.length >= 3) ) {
                dataup = dataup ? dataup : 0;
                datato = datato ? datato : 99999999;
                data = data.filter(function(row) {
                    return (
                        row.data.slice(0, 8) >= dataup &&
                        row.data.slice(0, 8) <= datato
                    );
                });
            }

            data = data.filter(function(row) {
                return row["status"] == status;
            });

            return data;
        },
        tabela: function() {
            return new Tabela(
                this.paginator,
                ["Nome", "Objeto", "Numero", "Processo", "Abertura", "Local"],
                ["name", "objeto", "numero", "processo", "data.data", "local"],
                false
            );
        },
        paginator: function() {
            if (this.paginatorInspector !== this.hashCode(this.output)) {
                this.paginatorInspector = this.hashCode(this.output);
                if (this.sizeofarray < this.starts) this.starts = 0;
            }
            if (this.size > this.sizeofarray) {
                return this.output.slice(this.starts, this.sizeofarray);
            }
            if (this.starts > this.end) {
                return this.output.slice(this.starts, this.sizeofarray);
            }
            return this.output.slice(this.starts, this.end);
        },
        end: function() {
            if (this.starts + this.size > this.sizeofarray) {
                return this.starts + this.size - this.sizeofarray;
            }
            return this.starts + this.size;
        },
        sizeofarray: function() {
            return this.output.length;
        },
        pagesize: function() {
            return Math.ceil(this.output.length / this.size);
        },
        pages: function() {
            var i = 0;
            var retorno = {};
            var page = this.page;
            if (this.page + 7 >= this.pagesize && this.pagesize >= 15)
                page = this.pagesize - 15;
            while (i < this.pagesize && i < 15) {
                if (this.page + 7 >= this.pagesize && this.pagesize >= 15)
                    retorno[i] = page + i;
                else if (page >= 8) retorno[i] = page - 7 + i;
                else retorno[i] = i;
                i++;
            }
            return retorno;
        },
        hasPage: function() {
            return !(this.pagesize == 1);
        },
        page: function() {
            return parseInt(this.starts / this.size);
        }
    },
    methods: {
        sortBy: function(key) {
            this.sortKey = key;
            this.sortOrders[key] = this.sortOrders[key] * -1;
        },
        toward: function() {
            if (this.starts > 0) this.starts -= this.size;
            else this.starts = (this.pagesize - 1) * this.size;
        },
        foward: function() {
            if (this.starts + this.size < this.sizeofarray)
                this.starts += this.size;
            else this.starts = 0;
        },
        hashCode: function(obj) {
            var s = JSON.stringify(obj);
            return s.split("").reduce(function(a, b) {
                a = (a << 5) - a + b.charCodeAt(0);
                return a & a;
            }, 0);
        },
        toPage(page) {
            this.starts = this.size * page;
        }
    }
});

// CIDADES
Vue.component("cidades-data-item", {
    template: "#cidades-data-template",
    data: function() {
        return {
            pesquisa: new Search({ pesquisar: true }),
            starts: 0,
            size: 6,
            pesquisar: "",
            hasDelete: true,
            hasCopy: true,
            hasEdit: true,
            hasStatus: true
        };
    },
    props: {
        controller: Object
    },
    computed: {
        output: function() {
            var data =
                this.controller.data && this.controller.data.length > 0
                    ? this.controller.data
                    : false;
            if (!data) return [];

            var pesquisar = this.pesquisar && this.pesquisar.toLowerCase();
            // var categoria = this.categoria && this.categoria.toLowerCase()
            // var cidade = this.cidade && this.cidade.toLowerCase()
            // var datamm = this.datamm && this.datamm.toLowerCase()
            // var datayy = this.datayy && this.datayy.toLowerCase()
            // var dataup = this.dataup && this.dataup.toLowerCase()
            // var datato = this.datato && this.datato.toLowerCase()

            if (pesquisar && pesquisar.length >= 3) {
                data = data.filter(function(row) {
                    return (
                        String(row["name"])
                            .toLowerCase()
                            .indexOf(pesquisar) > -1
                    );
                });
            }
            // if (categoria) {
            // 	data = data.filter(function (row) {
            // 		return String(row['categoria']).toLowerCase().indexOf(categoria) > -1
            // 	})
            // }
            // if (cidade) {
            // 	data = data.filter(function (row) {
            // 		return String(row['cidade']).toLowerCase().indexOf(cidade) > -1
            // 	})
            // }
            // if (datayy) {
            // 	data = data.filter(function (row) {
            // 		return String(row['datayy']).toLowerCase().indexOf(datayy) > -1
            // 	})
            // }
            // if (datamm) {
            // 	data = data.filter(function (row) {
            // 		return String(row['datamm']).toLowerCase().indexOf(datamm) > -1
            // 	})
            // }
            // if ( (dataup || datato) && !(pesquisar && pesquisar.length >= 3) ) {
            // 	dataup = dataup ? dataup : 0;
            // 	datato = datato ? datato : 99999999;
            // 	data = data.filter(function (row) {
            // 		return ( row.data >= dataup && row.data <= datato)
            // 	})
            // }

            return data;
        },
        tabela: function() {
            return new Tabela(
                this.paginator,
                ["Cidade"],
                ["nome_cidade"],
                false
            );
        },
        paginator: function() {
            if (this.paginatorInspector !== this.hashCode(this.output)) {
                this.paginatorInspector = this.hashCode(this.output);
                if (this.sizeofarray < this.starts) this.starts = 0;
            }
            if (this.size > this.sizeofarray) {
                return this.output.slice(this.starts, this.sizeofarray);
            }
            if (this.starts > this.end) {
                return this.output.slice(this.starts, this.sizeofarray);
            }
            return this.output.slice(this.starts, this.end);
        },
        end: function() {
            if (this.starts + this.size > this.sizeofarray) {
                return this.starts + this.size - this.sizeofarray;
            }
            return this.starts + this.size;
        },
        sizeofarray: function() {
            return this.output.length;
        },
        pagesize: function() {
            return Math.ceil(this.output.length / this.size);
        },
        pages: function() {
            var i = 0;
            var retorno = {};
            var page = this.page;
            if (this.page + 7 >= this.pagesize && this.pagesize >= 15)
                page = this.pagesize - 15;
            while (i < this.pagesize && i < 15) {
                if (this.page + 7 >= this.pagesize && this.pagesize >= 15)
                    retorno[i] = page + i;
                else if (page >= 8) retorno[i] = page - 7 + i;
                else retorno[i] = i;
                i++;
            }
            return retorno;
        },
        hasPage: function() {
            return !(this.pagesize == 1);
        },
        page: function() {
            return parseInt(this.starts / this.size);
        }
    },
    methods: {
        sortBy: function(key) {
            this.sortKey = key;
            this.sortOrders[key] = this.sortOrders[key] * -1;
        },
        toward: function() {
            if (this.starts > 0) this.starts -= this.size;
            else this.starts = (this.pagesize - 1) * this.size;
        },
        foward: function() {
            if (this.starts + this.size < this.sizeofarray)
                this.starts += this.size;
            else this.starts = 0;
        },
        hashCode: function(obj) {
            var s = JSON.stringify(obj);
            return s.split("").reduce(function(a, b) {
                a = (a << 5) - a + b.charCodeAt(0);
                return a & a;
            }, 0);
        },
        toPage(page) {
            this.starts = this.size * page;
        }
    }
});

//UNIDADES MOVEIS
// LOCAL : TEXTO
// DATA HORA: DATA
// DESCRICAO : TEXTO
// ACTION : [ DELETE , EDIT, COPY ]
Vue.component("unidades-data-item", {
    template: "#unidades-data-template",
    data: function() {
        return {
            pesquisa: new Search({
                pesquisar: true,
                datarange: true,
                cidade: true
            }),
            starts: 0,
            size: 6,

            pesquisar: "",
            cidade: "",
            datato: $.datepicker.formatDate("yymmdd", new Date()),
            dataup: $.datepicker.formatDate(
                "yymmdd",
                new Helper().getDaysAgo(20)
            ),

            hasDelete: true,
            hasCopy: true,
            hasEdit: true,
            hasStatus: true
        };
    },
    props: {
        controller: Object
    },
    computed: {
        output: function() {
            var data =
                this.controller.data && this.controller.data.length > 0
                    ? this.controller.data
                    : false;
            if (!data) return [];

            var pesquisar = this.pesquisar && this.pesquisar.toLowerCase();
            // var categoria = this.categoria && this.categoria.toLowerCase()
            var cidade = this.cidade && this.cidade.toLowerCase();
            // var datamm = this.datamm && this.datamm.toLowerCase()
            // var datayy = this.datayy && this.datayy.toLowerCase()
            var dataup = this.dataup && this.dataup.toLowerCase();
            var datato = this.datato && this.datato.toLowerCase();

            if (pesquisar && pesquisar.length >= 3) {
                data = data.filter(function(row) {
                    return (
                        String(row["local"])
                            .toLowerCase()
                            .indexOf(pesquisar) > -1 ||
                        String(row["descricao"])
                            .toLowerCase()
                            .indexOf(pesquisar) > -1
                    );
                });
            }
            // if (categoria) {
            // 	data = data.filter(function (row) {
            // 		return String(row['categoria']).toLowerCase().indexOf(categoria) > -1
            // 	})
            // }
            if (cidade) {
                data = data.filter(function(row) {
                    return (
                        String(row["cidade"])
                            .toLowerCase()
                            .indexOf(cidade) > -1
                    );
                });
            }
            // if (datayy) {
            // 	data = data.filter(function (row) {
            // 		return String(row['datayy']).toLowerCase().indexOf(datayy) > -1
            // 	})
            // }
            // if (datamm) {
            // 	data = data.filter(function (row) {
            // 		return String(row['datamm']).toLowerCase().indexOf(datamm) > -1
            // 	})
            // }
            if ( (dataup || datato) && !(pesquisar && pesquisar.length >= 3) ) {
                dataup = dataup ? dataup : 0;
                datato = datato ? datato : 99999999;
                data = data.filter(function(row) {
                    return (
                        row.data.slice(0, 8) >= dataup &&
                        row.data.slice(0, 8) <= datato
                    );
                });
            }

            return data;
        },
        tabela: function() {
            return new Tabela(
                this.paginator,
                ["Cidade", "Local", "Observações", "Data"],
                ["cidade.cidade", "local", "descricao", "data.data"],
                false
            );
        },
        paginator: function() {
            if (this.paginatorInspector !== this.hashCode(this.output)) {
                this.paginatorInspector = this.hashCode(this.output);
                if (this.sizeofarray < this.starts) this.starts = 0;
            }
            if (this.size > this.sizeofarray) {
                return this.output.slice(this.starts, this.sizeofarray);
            }
            if (this.starts > this.end) {
                return this.output.slice(this.starts, this.sizeofarray);
            }
            return this.output.slice(this.starts, this.end);
        },
        end: function() {
            if (this.starts + this.size > this.sizeofarray) {
                return this.starts + this.size - this.sizeofarray;
            }
            return this.starts + this.size;
        },
        sizeofarray: function() {
            return this.output.length;
        },
        pagesize: function() {
            return Math.ceil(this.output.length / this.size);
        },
        pages: function() {
            var i = 0;
            var retorno = {};
            var page = this.page;
            if (this.page + 7 >= this.pagesize && this.pagesize >= 15)
                page = this.pagesize - 15;
            while (i < this.pagesize && i < 15) {
                if (this.page + 7 >= this.pagesize && this.pagesize >= 15)
                    retorno[i] = page + i;
                else if (page >= 8) retorno[i] = page - 7 + i;
                else retorno[i] = i;
                i++;
            }
            return retorno;
        },
        hasPage: function() {
            return !(this.pagesize == 1);
        },
        page: function() {
            return parseInt(this.starts / this.size);
        }
    },
    methods: {
        sortBy: function(key) {
            this.sortKey = key;
            this.sortOrders[key] = this.sortOrders[key] * -1;
        },
        toward: function() {
            if (this.starts > 0) this.starts -= this.size;
            else this.starts = (this.pagesize - 1) * this.size;
        },
        foward: function() {
            if (this.starts + this.size < this.sizeofarray)
                this.starts += this.size;
            else this.starts = 0;
        },
        hashCode: function(obj) {
            var s = JSON.stringify(obj);
            return s.split("").reduce(function(a, b) {
                a = (a << 5) - a + b.charCodeAt(0);
                return a & a;
            }, 0);
        },
        toPage(page) {
            this.starts = this.size * page;
        },
        relatorio() {
            var mapa, template;

            var aux =
                '<table class="table center-block text-center" >' +
                '<thead style="background-color:#f86c6b; font-weight: bold;color:white"> ' +
                '<tr> <th scope="col">Cidade</th> <th scope="col">Local</th> <th scope="col">Observações</th> <th scope="col">Agendas e Tickets</th> <th scope="col">Mês</th> <th scope="col">Data</th> </tr> ' +
                "</thead> " +
                '<tbody style="font-weight:normal; color:black;">';

            this.output.forEach(function(el) {
                mapa = new Mapa(el);
                aux += "<tr>";
                mapa.relatorio().forEach(function(campo) {
                    aux +=
                        '<td scope="col" style="font-weight:normal; color:black;">' +
                        campo.value +
                        "</td>";
                });
                aux += "</tr>";
            });

            aux += "</tbody></table>";

            new Helper().relatorio(aux);

            // var doc = new jsPDF();
            // doc.fromHTML(aux, 10, 10, { width: 180 });
            // doc.save("Relatório de Unidades Móveis.pdf");
        }
    }
});

//UNIDADES MOVEIS
// LOCAL : TEXTO
// DATA HORA: DATA
// DESCRICAO : TEXTO
// ACTION : [ DELETE , EDIT, COPY ]
Vue.component("mapas-data-item", {
    template: "#mapas-data-template",
    data: function() {
        return {
            pesquisa: new Search({
                pesquisar: true,
                datarange: true,
                cidade: true
            }),
            starts: 0,
            size: 6,

            pesquisar: "",
            cidade: "",
            datato: $.datepicker.formatDate("yymmdd", new Date()),
            dataup: $.datepicker.formatDate(
                "yymmdd",
                new Helper().getDaysAgo()
            ),

            hasDelete: true,
            hasCopy: true,
            hasEdit: true,
            hasStatus: true
        };
    },
    props: {
        controller: Object
    },
    computed: {
        output: function() {
            var data =
                this.controller.data && this.controller.data.length > 0
                    ? this.controller.data
                    : false;
            if (!data) return [];

            var pesquisar = this.pesquisar && this.pesquisar.toLowerCase();
            // var categoria = this.categoria && this.categoria.toLowerCase()
            var cidade = this.cidade && this.cidade.toLowerCase();
            // var datamm = this.datamm && this.datamm.toLowerCase()
            // var datayy = this.datayy && this.datayy.toLowerCase()
            var dataup = this.dataup && this.dataup.toLowerCase();
            var datato = this.datato && this.datato.toLowerCase();

            if (pesquisar && pesquisar.length >= 3) {
                data = data.filter(function(row) {
                    return (
                        String(row["local"])
                            .toLowerCase()
                            .indexOf(pesquisar) > -1 ||
                        String(row["descricao"])
                            .toLowerCase()
                            .indexOf(pesquisar) > -1
                    );
                });
            }
            // if (categoria) {
            // 	data = data.filter(function (row) {
            // 		return String(row['categoria']).toLowerCase().indexOf(categoria) > -1
            // 	})
            // }
            if (cidade) {
                data = data.filter(function(row) {
                    return (
                        String(row["cidade"])
                            .toLowerCase()
                            .indexOf(cidade) > -1
                    );
                });
            }
            // if (datayy) {
            // 	data = data.filter(function (row) {
            // 		return String(row['datayy']).toLowerCase().indexOf(datayy) > -1
            // 	})
            // }
            // if (datamm) {
            // 	data = data.filter(function (row) {
            // 		return String(row['datamm']).toLowerCase().indexOf(datamm) > -1
            // 	})
            // }
            if ( (dataup || datato) && !(pesquisar && pesquisar.length >= 3) ) {
                dataup = dataup ? dataup : 0;
                datato = datato ? datato : 99999999;
                data = data.filter(function(row) {
                    return (
                        row.data.slice(0, 12) >= dataup &&
                        row.data.slice(0, 12) <= datato
                    );
                });
            }

            return data;
        },
        tabela: function() {
            return new Tabela(
                this.paginator,
                ["Cidade", "Local", "Observações", "Data"],
                ["cidade.cidade", "local", "descricao", "data.data"],
                false
            );
        },
        paginator: function() {
            if (this.paginatorInspector !== this.hashCode(this.output)) {
                this.paginatorInspector = this.hashCode(this.output);
                if (this.sizeofarray < this.starts) this.starts = 0;
            }
            if (this.size > this.sizeofarray) {
                return this.output.slice(this.starts, this.sizeofarray);
            }
            if (this.starts > this.end) {
                return this.output.slice(this.starts, this.sizeofarray);
            }
            return this.output.slice(this.starts, this.end);
        },
        end: function() {
            if (this.starts + this.size > this.sizeofarray) {
                return this.starts + this.size - this.sizeofarray;
            }
            return this.starts + this.size;
        },
        sizeofarray: function() {
            return this.output.length;
        },
        pagesize: function() {
            return Math.ceil(this.output.length / this.size);
        },
        pages: function() {
            var i = 0;
            var retorno = {};
            var page = this.page;
            if (this.page + 7 >= this.pagesize && this.pagesize >= 15)
                page = this.pagesize - 15;
            while (i < this.pagesize && i < 15) {
                if (this.page + 7 >= this.pagesize && this.pagesize >= 15)
                    retorno[i] = page + i;
                else if (page >= 8) retorno[i] = page - 7 + i;
                else retorno[i] = i;
                i++;
            }
            return retorno;
        },
        hasPage: function() {
            return !(this.pagesize == 1);
        },
        page: function() {
            return parseInt(this.starts / this.size);
        }
    },
    methods: {
        sortBy: function(key) {
            this.sortKey = key;
            this.sortOrders[key] = this.sortOrders[key] * -1;
        },
        toward: function() {
            if (this.starts > 0) this.starts -= this.size;
            else this.starts = (this.pagesize - 1) * this.size;
        },
        foward: function() {
            if (this.starts + this.size < this.sizeofarray)
                this.starts += this.size;
            else this.starts = 0;
        },
        hashCode: function(obj) {
            var s = JSON.stringify(obj);
            return s.split("").reduce(function(a, b) {
                a = (a << 5) - a + b.charCodeAt(0);
                return a & a;
            }, 0);
        },
        toPage(page) {
            this.starts = this.size * page;
        },
        relatorio() {
            var mapa,
                template,
                aux = "";

            this.output.forEach(function(el) {
                mapa = new Mapa(el);
                template = "<br>";
                mapa.relatorio().forEach(function(campo) {
                    aux +=
                        "<p><b>" +
                        campo.name +
                        ": </b> " +
                        campo.value +
                        "</p>";
                });
                template += "<br><br>";
                aux += template;
            });

            var doc = new jsPDF();
            doc.fromHTML(aux, 10, 10, { width: 180 });
            doc.save("Relatório de Unidades Móveis.pdf");
        }
    }
});

// ARQUIVOS
// NOME : TEXTO
// ACTION : [ DELETE ]
Vue.component("arquivo-data-item", {
    template: "#arquivo-data-template",
    data: function() {
        return {
            pesquisa: new Search({ pesquisar: true }),
            starts: 0,
            size: 6,
            pesquisar: "",
            hasDelete: true
        };
    },
    props: {
        controller: Object
    },
    computed: {
        output: function() {
            var data =
                this.controller.data && this.controller.data.length > 0
                    ? this.controller.data
                    : false;
            if (!data) return [];

            var pesquisar = this.pesquisar && this.pesquisar.toLowerCase();
            // var categoria = this.categoria && this.categoria.toLowerCase()
            // var cidade = this.cidade && this.cidade.toLowerCase()
            // var datamm = this.datamm && this.datamm.toLowerCase()
            // var datayy = this.datayy && this.datayy.toLowerCase()
            // var dataup = this.dataup && this.dataup.toLowerCase()
            // var datato = this.datato && this.datato.toLowerCase()

            if (pesquisar && pesquisar.length >= 3) {
                data = data.filter(function(row) {
                    return (
                        String(row["name"])
                            .toLowerCase()
                            .indexOf(pesquisar) > -1
                    );
                });
            }
            // if (categoria) {
            // 	data = data.filter(function (row) {
            // 		return String(row['categoria']).toLowerCase().indexOf(categoria) > -1
            // 	})
            // }
            // if (cidade) {
            // 	data = data.filter(function (row) {
            // 		return String(row['cidade']).toLowerCase().indexOf(cidade) > -1
            // 	})
            // }
            // if (datayy) {
            // 	data = data.filter(function (row) {
            // 		return String(row['datayy']).toLowerCase().indexOf(datayy) > -1
            // 	})
            // }
            // if (datamm) {
            // 	data = data.filter(function (row) {
            // 		return String(row['datamm']).toLowerCase().indexOf(datamm) > -1
            // 	})
            // }
            // if ( (dataup || datato) && !(pesquisar && pesquisar.length >= 3) ) {
            // 	dataup = dataup ? dataup : 0;
            // 	datato = datato ? datato : 99999999;
            // 	data = data.filter(function (row) {
            // 		return ( row.data >= dataup && row.data <= datato)
            // 	})
            // }

            return data;
        },
        tabela: function() {
            return new Tabela(this.paginator, ["Nome"], ["name"], false);
        },
        paginator: function() {
            if (this.paginatorInspector !== this.hashCode(this.output)) {
                this.paginatorInspector = this.hashCode(this.output);
                if (this.sizeofarray < this.starts) this.starts = 0;
            }
            if (this.size > this.sizeofarray) {
                return this.output.slice(this.starts, this.sizeofarray);
            }
            if (this.starts > this.end) {
                return this.output.slice(this.starts, this.sizeofarray);
            }
            return this.output.slice(this.starts, this.end);
        },
        end: function() {
            if (this.starts + this.size > this.sizeofarray) {
                return this.starts + this.size - this.sizeofarray;
            }
            return this.starts + this.size;
        },
        sizeofarray: function() {
            return this.output.length;
        },
        pagesize: function() {
            return Math.ceil(this.output.length / this.size);
        },
        pages: function() {
            var i = 0;
            var retorno = {};
            var page = this.page;
            if (this.page + 7 >= this.pagesize && this.pagesize >= 15)
                page = this.pagesize - 15;
            while (i < this.pagesize && i < 15) {
                if (this.page + 7 >= this.pagesize && this.pagesize >= 15)
                    retorno[i] = page + i;
                else if (page >= 8) retorno[i] = page - 7 + i;
                else retorno[i] = i;
                i++;
            }
            return retorno;
        },
        hasPage: function() {
            return !(this.pagesize == 1);
        },
        page: function() {
            return parseInt(this.starts / this.size);
        }
    },
    methods: {
        sortBy: function(key) {
            this.sortKey = key;
            this.sortOrders[key] = this.sortOrders[key] * -1;
        },
        toward: function() {
            if (this.starts > 0) this.starts -= this.size;
            else this.starts = (this.pagesize - 1) * this.size;
        },
        foward: function() {
            if (this.starts + this.size < this.sizeofarray)
                this.starts += this.size;
            else this.starts = 0;
        },
        hashCode: function(obj) {
            var s = JSON.stringify(obj);
            return s.split("").reduce(function(a, b) {
                a = (a << 5) - a + b.charCodeAt(0);
                return a & a;
            }, 0);
        },
        toPage(page) {
            this.starts = this.size * page;
        }
    }
});

// ACESSO RAPIDO
// NOME : TEXTO
// PAGINA : PAGINA
// IMAGEM : IMAGEM
// ACTION : [ DELETE , EDIT, CLONE ]
Vue.component("acesso-rapido-data-item", {
    template: "#acesso-rapido-data-template",
    data: function() {
        return {
            pesquisa: new Search({ pesquisar: true }),
            starts: 0,
            size: 6,
            pesquisar: "",
            hasEdit: true,
            hasDelete: true,
            hasCopy: true,
            hasStatus: true,
            hasDestaque: true
        };
    },
    props: {
        controller: Object
    },
    computed: {
        output: function() {
            var data =
                this.controller.data && this.controller.data.length > 0
                    ? this.controller.data
                    : false;
            if (!data) return [];

            var pesquisar = this.pesquisar && this.pesquisar.toLowerCase();
            // var categoria = this.categoria && this.categoria.toLowerCase()
            // var cidade = this.cidade && this.cidade.toLowerCase()
            // var datamm = this.datamm && this.datamm.toLowerCase()
            // var datayy = this.datayy && this.datayy.toLowerCase()
            // var dataup = this.dataup && this.dataup.toLowerCase()
            // var datato = this.datato && this.datato.toLowerCase()

            if (pesquisar && pesquisar.length >= 3) {
                data = data.filter(function(row) {
                    return (
                        String(row["name"])
                            .toLowerCase()
                            .indexOf(pesquisar) > -1
                    );
                });
            }
            // if (categoria) {
            // 	data = data.filter(function (row) {
            // 		return String(row['categoria']).toLowerCase().indexOf(categoria) > -1
            // 	})
            // }
            // if (cidade) {
            // 	data = data.filter(function (row) {
            // 		return String(row['cidade']).toLowerCase().indexOf(cidade) > -1
            // 	})
            // }
            // if (datayy) {
            // 	data = data.filter(function (row) {
            // 		return String(row['datayy']).toLowerCase().indexOf(datayy) > -1
            // 	})
            // }
            // if (datamm) {
            // 	data = data.filter(function (row) {
            // 		return String(row['datamm']).toLowerCase().indexOf(datamm) > -1
            // 	})
            // }
            // if ( (dataup || datato) && !(pesquisar && pesquisar.length >= 3) ) {
            // 	dataup = dataup ? dataup : 0;
            // 	datato = datato ? datato : 99999999;
            // 	data = data.filter(function (row) {
            // 		return ( row.data >= dataup && row.data <= datato)
            // 	})
            // }

            return data;
        },
        tabela: function() {
            return new Tabela(
                this.paginator,
                ["Nome", "Pagina", "Cliques", "Imagem"],
                ["name", "source.pagina", "popularidade", "image_id.imagem"],
                false
            );
        },
        paginator: function() {
            if (this.paginatorInspector !== this.hashCode(this.output)) {
                this.paginatorInspector = this.hashCode(this.output);
                if (this.sizeofarray < this.starts) this.starts = 0;
            }
            if (this.size > this.sizeofarray) {
                return this.output.slice(this.starts, this.sizeofarray);
            }
            if (this.starts > this.end) {
                return this.output.slice(this.starts, this.sizeofarray);
            }
            return this.output.slice(this.starts, this.end);
        },
        end: function() {
            if (this.starts + this.size > this.sizeofarray) {
                return this.starts + this.size - this.sizeofarray;
            }
            return this.starts + this.size;
        },
        sizeofarray: function() {
            return this.output.length;
        },
        pagesize: function() {
            return Math.ceil(this.output.length / this.size);
        },
        pages: function() {
            var i = 0;
            var retorno = {};
            var page = this.page;
            if (this.page + 7 >= this.pagesize && this.pagesize >= 15)
                page = this.pagesize - 15;
            while (i < this.pagesize && i < 15) {
                if (this.page + 7 >= this.pagesize && this.pagesize >= 15)
                    retorno[i] = page + i;
                else if (page >= 8) retorno[i] = page - 7 + i;
                else retorno[i] = i;
                i++;
            }
            return retorno;
        },
        hasPage: function() {
            return !(this.pagesize == 1);
        },
        page: function() {
            return parseInt(this.starts / this.size);
        }
    },
    methods: {
        sortBy: function(key) {
            this.sortKey = key;
            this.sortOrders[key] = this.sortOrders[key] * -1;
        },
        toward: function() {
            if (this.starts > 0) this.starts -= this.size;
            else this.starts = (this.pagesize - 1) * this.size;
        },
        foward: function() {
            if (this.starts + this.size < this.sizeofarray)
                this.starts += this.size;
            else this.starts = 0;
        },
        hashCode: function(obj) {
            var s = JSON.stringify(obj);
            return s.split("").reduce(function(a, b) {
                a = (a << 5) - a + b.charCodeAt(0);
                return a & a;
            }, 0);
        },
        toPage(page) {
            this.starts = this.size * page;
        }
    }
});

// BANNERS
// NOME : TEXTO
// ACTION : [ DELETE , EDIT, CLONE ]
Vue.component("banner-data-item", {
    template: "#banner-data-template",
    data: function() {
        return {
            pesquisa: new Search({ pesquisar: true }),
            starts: 0,
            size: 6,
            pesquisar: "",
            hasEdit: true,
            hasDelete: true,
            hasCopy: true,
            hasStatus: true
        };
    },
    props: {
        controller: Object
    },
    computed: {
        output: function() {
            var data =
                this.controller.data && this.controller.data.length > 0
                    ? this.controller.data
                    : false;
            if (!data) return [];

            var pesquisar = this.pesquisar && this.pesquisar.toLowerCase();
            // var categoria = this.categoria && this.categoria.toLowerCase()
            // var cidade = this.cidade && this.cidade.toLowerCase()
            // var datamm = this.datamm && this.datamm.toLowerCase()
            // var datayy = this.datayy && this.datayy.toLowerCase()
            // var dataup = this.dataup && this.dataup.toLowerCase()
            // var datato = this.datato && this.datato.toLowerCase()

            if (pesquisar && pesquisar.length >= 3) {
                data = data.filter(function(row) {
                    return (
                        String(row["name"])
                            .toLowerCase()
                            .indexOf(pesquisar) > -1
                    );
                });
            }
            // if (categoria) {
            // 	data = data.filter(function (row) {
            // 		return String(row['categoria']).toLowerCase().indexOf(categoria) > -1
            // 	})
            // }
            // if (cidade) {
            // 	data = data.filter(function (row) {
            // 		return String(row['cidade']).toLowerCase().indexOf(cidade) > -1
            // 	})
            // }
            // if (datayy) {
            // 	data = data.filter(function (row) {
            // 		return String(row['datayy']).toLowerCase().indexOf(datayy) > -1
            // 	})
            // }
            // if (datamm) {
            // 	data = data.filter(function (row) {
            // 		return String(row['datamm']).toLowerCase().indexOf(datamm) > -1
            // 	})
            // }
            // if ( (dataup || datato) && !(pesquisar && pesquisar.length >= 3) ) {
            // 	dataup = dataup ? dataup : 0;
            // 	datato = datato ? datato : 99999999;
            // 	data = data.filter(function (row) {
            // 		return ( row.data >= dataup && row.data <= datato)
            // 	})
            // }

            return data;
        },
        tabela: function() {
            return new Tabela(
                this.paginator,
                ["Nome", "Link", "Imagem"],
                ["name", "source.pagina", "image_id.imagem"],
                false
            );
        },
        paginator: function() {
            if (this.paginatorInspector !== this.hashCode(this.output)) {
                this.paginatorInspector = this.hashCode(this.output);
                if (this.sizeofarray < this.starts) this.starts = 0;
            }
            if (this.size > this.sizeofarray) {
                return this.output.slice(this.starts, this.sizeofarray);
            }
            if (this.starts > this.end) {
                return this.output.slice(this.starts, this.sizeofarray);
            }
            return this.output.slice(this.starts, this.end);
        },
        end: function() {
            if (this.starts + this.size > this.sizeofarray) {
                return this.starts + this.size - this.sizeofarray;
            }
            return this.starts + this.size;
        },
        sizeofarray: function() {
            return this.output.length;
        },
        pagesize: function() {
            return Math.ceil(this.output.length / this.size);
        },
        pages: function() {
            var i = 0;
            var retorno = {};
            var page = this.page;
            if (this.page + 7 >= this.pagesize && this.pagesize >= 15)
                page = this.pagesize - 15;
            while (i < this.pagesize && i < 15) {
                if (this.page + 7 >= this.pagesize && this.pagesize >= 15)
                    retorno[i] = page + i;
                else if (page >= 8) retorno[i] = page - 7 + i;
                else retorno[i] = i;
                i++;
            }
            return retorno;
        },
        hasPage: function() {
            return !(this.pagesize == 1);
        },
        page: function() {
            return parseInt(this.starts / this.size);
        }
    },
    methods: {
        sortBy: function(key) {
            this.sortKey = key;
            this.sortOrders[key] = this.sortOrders[key] * -1;
        },
        toward: function() {
            if (this.starts > 0) this.starts -= this.size;
            else this.starts = (this.pagesize - 1) * this.size;
        },
        foward: function() {
            if (this.starts + this.size < this.sizeofarray)
                this.starts += this.size;
            else this.starts = 0;
        },
        hashCode: function(obj) {
            var s = JSON.stringify(obj);
            return s.split("").reduce(function(a, b) {
                a = (a << 5) - a + b.charCodeAt(0);
                return a & a;
            }, 0);
        },
        toPage(page) {
            this.starts = this.size * page;
        }
    }
});

// CLUBE
// NOME : TEXTO
// ACTION : [ DELETE , EDIT, CLONE ]
Vue.component("clube-data-item", {
    template: "#clube-data-template",
    data: function() {
        return {
            pesquisa: new Search({
                pesquisar: true,
                datarange: true,
                cidade: true
            }),
            starts: 0,
            size: 6,

            pesquisar: "",
            cidade: "",
            datato: $.datepicker.formatDate("yymmdd", new Date()),
            dataup: $.datepicker.formatDate(
                "yymmdd",
                new Helper().getDaysAgo()
            ),

            hasEdit: true,
            hasDelete: true,
            hasCopy: true,
            hasStatus: true
        };
    },
    props: {
        controller: Object
    },
    computed: {
        output: function() {
            var data =
                this.controller.data && this.controller.data.length > 0
                    ? this.controller.data
                    : false;
            if (!data) return [];

            var pesquisar = this.pesquisar && this.pesquisar.toLowerCase();
            // var categoria = this.categoria && this.categoria.toLowerCase()
            var cidade = this.cidade && this.cidade.toLowerCase();
            // var datamm = this.datamm && this.datamm.toLowerCase()
            // var datayy = this.datayy && this.datayy.toLowerCase()
            var dataup = this.dataup && this.dataup.toLowerCase();
            var datato = this.datato && this.datato.toLowerCase();

            if (pesquisar && pesquisar.length >= 3) {
                data = data.filter(function(row) {
                    return (
                        String(row["name"])
                            .toLowerCase()
                            .indexOf(pesquisar) > -1
                    );
                });
            }
            // if (categoria) {
            // 	data = data.filter(function (row) {
            // 		return String(row['categoria']).toLowerCase().indexOf(categoria) > -1
            // 	})
            // }
            if (cidade) {
                data = data.filter(function(row) {
                    return (
                        String(row["cidade"])
                            .toLowerCase()
                            .indexOf(cidade) > -1
                    );
                });
            }
            // if (datayy) {
            // 	data = data.filter(function (row) {
            // 		return String(row['datayy']).toLowerCase().indexOf(datayy) > -1
            // 	})
            // }
            // if (datamm) {
            // 	data = data.filter(function (row) {
            // 		return String(row['datamm']).toLowerCase().indexOf(datamm) > -1
            // 	})
            // }
            if ( (dataup || datato) && !(pesquisar && pesquisar.length >= 3) ) {
                dataup = dataup ? dataup : 0;
                datato = datato ? datato : 99999999;
                data = data.filter(function(row) {
                    let data_formatada = row.created_at
                        .replace(/-/g, "")
                        .replace(/:/g, "")
                        .replace(/ /g, "")
                        .slice(0, 8);
                    return (
                        data_formatada.slice(0, 8) >= dataup &&
                        data_formatada.slice(0, 8) <= datato
                    );
                });
            }

            return data;
        },
        tabela: function() {
            return new Tabela(
                this.paginator,
                ["Nome", "Cidade", "Data"],
                ["name", "cidade.cidade", "created_at.server_data"],
                false
            );
        },
        paginator: function() {
            if (this.paginatorInspector !== this.hashCode(this.output)) {
                this.paginatorInspector = this.hashCode(this.output);
                if (this.sizeofarray < this.starts) this.starts = 0;
            }
            if (this.size > this.sizeofarray) {
                return this.output.slice(this.starts, this.sizeofarray);
            }
            if (this.starts > this.end) {
                return this.output.slice(this.starts, this.sizeofarray);
            }
            return this.output.slice(this.starts, this.end);
        },
        end: function() {
            if (this.starts + this.size > this.sizeofarray) {
                return this.starts + this.size - this.sizeofarray;
            }
            return this.starts + this.size;
        },
        sizeofarray: function() {
            return this.output.length;
        },
        pagesize: function() {
            return Math.ceil(this.output.length / this.size);
        },
        pages: function() {
            var i = 0;
            var retorno = {};
            var page = this.page;
            if (this.page + 7 >= this.pagesize && this.pagesize >= 15)
                page = this.pagesize - 15;
            while (i < this.pagesize && i < 15) {
                if (this.page + 7 >= this.pagesize && this.pagesize >= 15)
                    retorno[i] = page + i;
                else if (page >= 8) retorno[i] = page - 7 + i;
                else retorno[i] = i;
                i++;
            }
            return retorno;
        },
        hasPage: function() {
            return !(this.pagesize == 1);
        },
        page: function() {
            return parseInt(this.starts / this.size);
        }
    },
    methods: {
        sortBy: function(key) {
            this.sortKey = key;
            this.sortOrders[key] = this.sortOrders[key] * -1;
        },
        toward: function() {
            if (this.starts > 0) this.starts -= this.size;
            else this.starts = (this.pagesize - 1) * this.size;
        },
        foward: function() {
            if (this.starts + this.size < this.sizeofarray)
                this.starts += this.size;
            else this.starts = 0;
        },
        hashCode: function(obj) {
            var s = JSON.stringify(obj);
            return s.split("").reduce(function(a, b) {
                a = (a << 5) - a + b.charCodeAt(0);
                return a & a;
            }, 0);
        },
        toPage(page) {
            this.starts = this.size * page;
        }
    }
});

// PESSOAS
// NOME : TEXTO
// ACTION : [ DELETE , EDIT, CLONE ]
Vue.component("pessoas-data-item", {
    template: "#pessoas-data-template",
    data: function() {
        return {
            pesquisa: new Search({ pesquisar: true }),
            starts: 0,
            size: 6,
            pesquisar: "",
            hasDelete: true
        };
    },
    props: {
        controller: Object,
        hasEdit: {
            type: Boolean,
            default: true
        },
        hasCopy: {
            type: Boolean,
            default: true
        }
    },
    computed: {
        output: function() {
            var data =
                this.controller.data && this.controller.data.length > 0
                    ? this.controller.data
                    : false;
            if (!data) return [];

            var pesquisar = this.pesquisar && this.pesquisar.toLowerCase();
            // var categoria = this.categoria && this.categoria.toLowerCase()
            // var cidade = this.cidade && this.cidade.toLowerCase()
            // var datamm = this.datamm && this.datamm.toLowerCase()
            // var datayy = this.datayy && this.datayy.toLowerCase()
            // var dataup = this.dataup && this.dataup.toLowerCase()
            // var datato = this.datato && this.datato.toLowerCase()

            if (pesquisar && pesquisar.length >= 3) {
                data = data.filter(function(row) {
                    return (
                        String(row["name"])
                            .toLowerCase()
                            .indexOf(pesquisar) > -1
                    );
                });
            }
            // if (categoria) {
            // 	data = data.filter(function (row) {
            // 		return String(row['categoria']).toLowerCase().indexOf(categoria) > -1
            // 	})
            // }
            // if (cidade) {
            // 	data = data.filter(function (row) {
            // 		return String(row['cidade']).toLowerCase().indexOf(cidade) > -1
            // 	})
            // }
            // if (datayy) {
            // 	data = data.filter(function (row) {
            // 		return String(row['datayy']).toLowerCase().indexOf(datayy) > -1
            // 	})
            // }
            // if (datamm) {
            // 	data = data.filter(function (row) {
            // 		return String(row['datamm']).toLowerCase().indexOf(datamm) > -1
            // 	})
            // }
            // if ( (dataup || datato) && !(pesquisar && pesquisar.length >= 3) ) {
            // 	dataup = dataup ? dataup : 0;
            // 	datato = datato ? datato : 99999999;
            // 	data = data.filter(function (row) {
            // 		return ( row.data >= dataup && row.data <= datato)
            // 	})
            // }

            return data;
        },
        tabela: function() {
            return new Tabela(
                this.paginator,
                ["Nome", "Índice"],
                ["name", "indice"],
                false
            );
        },
        paginator: function() {
            if (this.paginatorInspector !== this.hashCode(this.output)) {
                this.paginatorInspector = this.hashCode(this.output);
                if (this.sizeofarray < this.starts) this.starts = 0;
            }
            if (this.size > this.sizeofarray) {
                return this.output.slice(this.starts, this.sizeofarray);
            }
            if (this.starts > this.end) {
                return this.output.slice(this.starts, this.sizeofarray);
            }
            return this.output.slice(this.starts, this.end);
        },
        end: function() {
            if (this.starts + this.size > this.sizeofarray) {
                return this.starts + this.size - this.sizeofarray;
            }
            return this.starts + this.size;
        },
        sizeofarray: function() {
            return this.output.length;
        },
        pagesize: function() {
            return Math.ceil(this.output.length / this.size);
        },
        pages: function() {
            var i = 0;
            var retorno = {};
            var page = this.page;
            if (this.page + 7 >= this.pagesize && this.pagesize >= 15)
                page = this.pagesize - 15;
            while (i < this.pagesize && i < 15) {
                if (this.page + 7 >= this.pagesize && this.pagesize >= 15)
                    retorno[i] = page + i;
                else if (page >= 8) retorno[i] = page - 7 + i;
                else retorno[i] = i;
                i++;
            }
            return retorno;
        },
        hasPage: function() {
            return !(this.pagesize == 1);
        },
        page: function() {
            return parseInt(this.starts / this.size);
        }
    },
    methods: {
        sortBy: function(key) {
            this.sortKey = key;
            this.sortOrders[key] = this.sortOrders[key] * -1;
        },
        toward: function() {
            if (this.starts > 0) this.starts -= this.size;
            else this.starts = (this.pagesize - 1) * this.size;
        },
        foward: function() {
            if (this.starts + this.size < this.sizeofarray)
                this.starts += this.size;
            else this.starts = 0;
        },
        hashCode: function(obj) {
            var s = JSON.stringify(obj);
            return s.split("").reduce(function(a, b) {
                a = (a << 5) - a + b.charCodeAt(0);
                return a & a;
            }, 0);
        },
        toPage(page) {
            this.starts = this.size * page;
        }
    }
});

// GALERIAS
// TITULO : TEXTO
// ACTION : [ DELETE , EDIT ]
Vue.component("galerias-data-item", {
    template: "#galerias-data-template",
    data: function() {
        return {
            pesquisa: new Search({ pesquisar: true }),
            starts: 0,
            size: 6,
            pesquisar: "",
            hasEdit: true,
            hasDelete: true
        };
    },
    props: {
        controller: Object
    },
    computed: {
        output: function() {
            var data =
                this.controller.data && this.controller.data.length > 0
                    ? this.controller.data
                    : false;
            if (!data) return [];

            var pesquisar = this.pesquisar && this.pesquisar.toLowerCase();
            if (pesquisar && pesquisar.length >= 3) {
                data = data.filter(function(row) {
                    return (
                        String(row["name"])
                            .toLowerCase()
                            .indexOf(pesquisar) > -1
                    );
                });
            }
            return data;
        },
        data: function() {
            return this.controller.data;
        },
        galerias: function() {
            return this.paginator;
        },
        paginator: function() {
            if (this.paginatorInspector !== this.hashCode(this.output)) {
                this.paginatorInspector = this.hashCode(this.output);
                if (this.sizeofarray < this.starts) this.starts = 0;
            }
            if (this.size > this.sizeofarray) {
                return this.output.slice(this.starts, this.sizeofarray);
            }
            if (this.starts > this.end) {
                return this.output.slice(this.starts, this.sizeofarray);
            }
            return this.output.slice(this.starts, this.end);
        },
        end: function() {
            if (this.starts + this.size > this.sizeofarray) {
                return this.starts + this.size - this.sizeofarray;
            }
            return this.starts + this.size;
        },
        sizeofarray: function() {
            return this.output.length;
        },
        pagesize: function() {
            return Math.ceil(this.output.length / this.size);
        },
        pages: function() {
            var i = 0;
            var retorno = {};
            var page = this.page;
            if (this.page + 7 >= this.pagesize && this.pagesize >= 15)
                page = this.pagesize - 15;
            while (i < this.pagesize && i < 15) {
                if (this.page + 7 >= this.pagesize && this.pagesize >= 15)
                    retorno[i] = page + i;
                else if (page >= 8) retorno[i] = page - 7 + i;
                else retorno[i] = i;
                i++;
            }
            return retorno;
        },
        hasPage: function() {
            return !(this.pagesize == 1);
        },
        page: function() {
            return parseInt(this.starts / this.size);
        }
    },
    methods: {
        sortBy: function(key) {
            this.sortKey = key;
            this.sortOrders[key] = this.sortOrders[key] * -1;
        },
        toward: function() {
            if (this.starts > 0) this.starts -= this.size;
            else this.starts = (this.pagesize - 1) * this.size;
        },
        foward: function() {
            if (this.starts + this.size < this.sizeofarray)
                this.starts += this.size;
            else this.starts = 0;
        },
        hashCode: function(obj) {
            var s = JSON.stringify(obj);
            return s.split("").reduce(function(a, b) {
                a = (a << 5) - a + b.charCodeAt(0);
                return a & a;
            }, 0);
        },
        toPage(page) {
            this.starts = this.size * page;
        }
    }
});

// USUARIOS
// TITULO : TEXTO
// ACTION : [ DELETE , EDIT ]
Vue.component("usuarios-data-item", {
    template: "#usuarios-data-template",
    data: function() {
        return {
            pesquisa: new Search({ pesquisar: true }),
            starts: 0,
            size: 6,
            pesquisar: "",
            hasEdit: true,
            hasDelete: true
        };
    },
    props: {
        controller: Object
    },
    computed: {
        output: function() {
            var data =
                this.controller.data && this.controller.data.length > 0
                    ? this.controller.data
                    : false;
            if (!data) return [];

            var pesquisar = this.pesquisar && this.pesquisar.toLowerCase();
            if (pesquisar && pesquisar.length >= 3) {
                data = data.filter(function(row) {
                    return (
                        String(row["name"])
                            .toLowerCase()
                            .indexOf(pesquisar) > -1
                    );
                });
            }
            return data;
        },

        tabela: function() {
            return new Tabela(
                this.paginator,
                ["Nome", "Email", "Permissões"],
                ["name", "email", "permissoes.permissao"],
                false
            );
        },

        paginator: function() {
            if (this.paginatorInspector !== this.hashCode(this.output)) {
                this.paginatorInspector = this.hashCode(this.output);
                if (this.sizeofarray < this.starts) this.starts = 0;
            }
            if (this.size > this.sizeofarray) {
                return this.output.slice(this.starts, this.sizeofarray);
            }
            if (this.starts > this.end) {
                return this.output.slice(this.starts, this.sizeofarray);
            }
            return this.output.slice(this.starts, this.end);
        },
        end: function() {
            if (this.starts + this.size > this.sizeofarray) {
                return this.starts + this.size - this.sizeofarray;
            }
            return this.starts + this.size;
        },
        sizeofarray: function() {
            return this.output.length;
        },
        pagesize: function() {
            return Math.ceil(this.output.length / this.size);
        },
        pages: function() {
            var i = 0;
            var retorno = {};
            var page = this.page;
            if (this.page + 7 >= this.pagesize && this.pagesize >= 15)
                page = this.pagesize - 15;
            while (i < this.pagesize && i < 15) {
                if (this.page + 7 >= this.pagesize && this.pagesize >= 15)
                    retorno[i] = page + i;
                else if (page >= 8) retorno[i] = page - 7 + i;
                else retorno[i] = i;
                i++;
            }
            return retorno;
        },
        hasPage: function() {
            return !(this.pagesize == 1);
        },
        page: function() {
            return parseInt(this.starts / this.size);
        }
    },
    methods: {
        sortBy: function(key) {
            this.sortKey = key;
            this.sortOrders[key] = this.sortOrders[key] * -1;
        },
        toward: function() {
            if (this.starts > 0) this.starts -= this.size;
            else this.starts = (this.pagesize - 1) * this.size;
        },
        foward: function() {
            if (this.starts + this.size < this.sizeofarray)
                this.starts += this.size;
            else this.starts = 0;
        },
        hashCode: function(obj) {
            var s = JSON.stringify(obj);
            return s.split("").reduce(function(a, b) {
                a = (a << 5) - a + b.charCodeAt(0);
                return a & a;
            }, 0);
        },
        toPage(page) {
            this.starts = this.size * page;
        }
    }
});

// PERMISSAO
// TITULO : TEXTO
// ACTION : [ DELETE , EDIT ]
Vue.component("permissoes-data-item", {
    template: "#permissoes-data-template",
    data: function() {
        return {
            pesquisa: new Search({ pesquisar: true }),
            starts: 0,
            size: 6,
            pesquisar: "",
            hasEdit: true,
            hasDelete: true,
            hasCopy: true
        };
    },
    props: {
        controller: Object
    },
    computed: {
        output: function() {
            var data =
                this.controller.data && this.controller.data.length > 0
                    ? this.controller.data
                    : false;
            if (!data) return [];

            var pesquisar = this.pesquisar && this.pesquisar.toLowerCase();
            // var categoria = this.categoria && this.categoria.toLowerCase()
            // var cidade = this.cidade && this.cidade.toLowerCase()
            // var datamm = this.datamm && this.datamm.toLowerCase()
            // var datayy = this.datayy && this.datayy.toLowerCase()
            // var dataup = this.dataup && this.dataup.toLowerCase()
            // var datato = this.datato && this.datato.toLowerCase()

            if (pesquisar && pesquisar.length >= 3) {
                data = data.filter(function(row) {
                    return (
                        String(row["name"])
                            .toLowerCase()
                            .indexOf(pesquisar) > -1
                    );
                });
            }
            // if (categoria) {
            // 	data = data.filter(function (row) {
            // 		return String(row['categoria']).toLowerCase().indexOf(categoria) > -1
            // 	})
            // }
            // if (cidade) {
            // 	data = data.filter(function (row) {
            // 		return String(row['cidade']).toLowerCase().indexOf(cidade) > -1
            // 	})
            // }
            // if (datayy) {
            // 	data = data.filter(function (row) {
            // 		return String(row['datayy']).toLowerCase().indexOf(datayy) > -1
            // 	})
            // }
            // if (datamm) {
            // 	data = data.filter(function (row) {
            // 		return String(row['datamm']).toLowerCase().indexOf(datamm) > -1
            // 	})
            // }
            // if ( (dataup || datato) && !(pesquisar && pesquisar.length >= 3) ) {
            // 	dataup = dataup ? dataup : 0;
            // 	datato = datato ? datato : 99999999;
            // 	data = data.filter(function (row) {
            // 		return ( row.data >= dataup && row.data <= datato)
            // 	})
            // }

            return data;
        },
        tabela: function() {
            return new Tabela(this.paginator, ["Titulo"], ["name"], false);
        },
        paginator: function() {
            if (this.paginatorInspector !== this.hashCode(this.output)) {
                this.paginatorInspector = this.hashCode(this.output);
                if (this.sizeofarray < this.starts) this.starts = 0;
            }
            if (this.size > this.sizeofarray) {
                return this.output.slice(this.starts, this.sizeofarray);
            }
            if (this.starts > this.end) {
                return this.output.slice(this.starts, this.sizeofarray);
            }
            return this.output.slice(this.starts, this.end);
        },
        end: function() {
            if (this.starts + this.size > this.sizeofarray) {
                return this.starts + this.size - this.sizeofarray;
            }
            return this.starts + this.size;
        },
        sizeofarray: function() {
            return this.output.length;
        },
        pagesize: function() {
            return Math.ceil(this.output.length / this.size);
        },
        pages: function() {
            var i = 0;
            var retorno = {};
            var page = this.page;
            if (this.page + 7 >= this.pagesize && this.pagesize >= 15)
                page = this.pagesize - 15;
            while (i < this.pagesize && i < 15) {
                if (this.page + 7 >= this.pagesize && this.pagesize >= 15)
                    retorno[i] = page + i;
                else if (page >= 8) retorno[i] = page - 7 + i;
                else retorno[i] = i;
                i++;
            }
            return retorno;
        },
        hasPage: function() {
            return !(this.pagesize == 1);
        },
        page: function() {
            return parseInt(this.starts / this.size);
        }
    },
    methods: {
        sortBy: function(key) {
            this.sortKey = key;
            this.sortOrders[key] = this.sortOrders[key] * -1;
        },
        toward: function() {
            if (this.starts > 0) this.starts -= this.size;
            else this.starts = (this.pagesize - 1) * this.size;
        },
        foward: function() {
            if (this.starts + this.size < this.sizeofarray)
                this.starts += this.size;
            else this.starts = 0;
        },
        hashCode: function(obj) {
            var s = JSON.stringify(obj);
            return s.split("").reduce(function(a, b) {
                a = (a << 5) - a + b.charCodeAt(0);
                return a & a;
            }, 0);
        },
        toPage(page) {
            this.starts = this.size * page;
        }
    }
});

// TEMA
// TITULO : TEXTO
// TOPO : IMAGEM
// RODAPÉ : IMAGEM
// ACTION : [ DELETE , EDIT ]
Vue.component("tema-data-item", {
    template: "#tema-data-template",
    data: function() {
        return {
            pesquisa: new Search({ pesquisar: true }),
            starts: 0,
            size: 6,
            pesquisar: "",
            hasEdit: true,
            hasDelete: true,
            hasCopy: true,
            hasDestaque: false,
            hasStatus: true
        };
    },
    props: {
        controller: Object
    },
    computed: {
        output: function() {
            var data =
                this.controller.temas && this.controller.temas.length > 0
                    ? this.controller.temas
                    : false;
            if (!data) return [];

            var pesquisar = this.pesquisar && this.pesquisar.toLowerCase();
            // var categoria = this.categoria && this.categoria.toLowerCase()
            // var cidade = this.cidade && this.cidade.toLowerCase()
            // var datamm = this.datamm && this.datamm.toLowerCase()
            // var datayy = this.datayy && this.datayy.toLowerCase()
            // var dataup = this.dataup && this.dataup.toLowerCase()
            // var datato = this.datato && this.datato.toLowerCase()

            if (pesquisar && pesquisar.length >= 3) {
                data = data.filter(function(row) {
                    return (
                        String(row["name"])
                            .toLowerCase()
                            .indexOf(pesquisar) > -1
                    );
                });
            }
            // if (categoria) {
            // 	data = data.filter(function (row) {
            // 		return String(row['categoria']).toLowerCase().indexOf(categoria) > -1
            // 	})
            // }
            // if (cidade) {
            // 	data = data.filter(function (row) {
            // 		return String(row['cidade']).toLowerCase().indexOf(cidade) > -1
            // 	})
            // }
            // if (datayy) {
            // 	data = data.filter(function (row) {
            // 		return String(row['datayy']).toLowerCase().indexOf(datayy) > -1
            // 	})
            // }
            // if (datamm) {
            // 	data = data.filter(function (row) {
            // 		return String(row['datamm']).toLowerCase().indexOf(datamm) > -1
            // 	})
            // }
            // if ( (dataup || datato) && !(pesquisar && pesquisar.length >= 3) ) {
            // 	dataup = dataup ? dataup : 0;
            // 	datato = datato ? datato : 99999999;
            // 	data = data.filter(function (row) {
            // 		return ( row.data >= dataup && row.data <= datato)
            // 	})
            // }

            return data;
        },
        tabela: function() {
            return new Tabela(
                this.paginator,
                ["Nome", "Topo", "Rodapé"],
                ["name", "head.imagem", "foot.imagem"],
                false
            );
        },
        paginator: function() {
            if (this.paginatorInspector !== this.hashCode(this.output)) {
                this.paginatorInspector = this.hashCode(this.output);
                if (this.sizeofarray < this.starts) this.starts = 0;
            }
            if (this.size > this.sizeofarray) {
                return this.output.slice(this.starts, this.sizeofarray);
            }
            if (this.starts > this.end) {
                return this.output.slice(this.starts, this.sizeofarray);
            }
            return this.output.slice(this.starts, this.end);
        },
        end: function() {
            if (this.starts + this.size > this.sizeofarray) {
                return this.starts + this.size - this.sizeofarray;
            }
            return this.starts + this.size;
        },
        sizeofarray: function() {
            return this.output.length;
        },
        pagesize: function() {
            return Math.ceil(this.output.length / this.size);
        },
        pages: function() {
            var i = 0;
            var retorno = {};
            var page = this.page;
            if (this.page + 7 >= this.pagesize && this.pagesize >= 15)
                page = this.pagesize - 15;
            while (i < this.pagesize && i < 15) {
                if (this.page + 7 >= this.pagesize && this.pagesize >= 15)
                    retorno[i] = page + i;
                else if (page >= 8) retorno[i] = page - 7 + i;
                else retorno[i] = i;
                i++;
            }
            return retorno;
        },
        hasPage: function() {
            return !(this.pagesize == 1);
        },
        page: function() {
            return parseInt(this.starts / this.size);
        }
    },
    methods: {
        sortBy: function(key) {
            this.sortKey = key;
            this.sortOrders[key] = this.sortOrders[key] * -1;
        },
        toward: function() {
            if (this.starts > 0) this.starts -= this.size;
            else this.starts = (this.pagesize - 1) * this.size;
        },
        foward: function() {
            if (this.starts + this.size < this.sizeofarray)
                this.starts += this.size;
            else this.starts = 0;
        },
        hashCode: function(obj) {
            var s = JSON.stringify(obj);
            return s.split("").reduce(function(a, b) {
                a = (a << 5) - a + b.charCodeAt(0);
                return a & a;
            }, 0);
        },
        toPage(page) {
            this.starts = this.size * page;
        }
    }
});

// AGENDA
// TITULO : TEXTO
// ACTION : [ DELETE , EDIT ]
Vue.component("agenda-data-item", {
    template: "#agenda-data-template",
    data: function() {
        return {
            pesquisa: new Search({ pesquisar: true, datarange: true }),

            starts: 0,
            size: 6,

            pesquisar: "",
            datato: $.datepicker.formatDate("yymmdd", new Date()),
            dataup: $.datepicker.formatDate(
                "yymmdd",
                new Helper().getDaysAgo()
            ),

            hasEdit: false,
            hasCopy: false,
            hasDelete: false,
            hasView: true
        };
    },
    props: {
        controller: Object
    },
    computed: {
        output: function() {
            var data =
                this.controller.data && this.controller.data.length > 0
                    ? this.controller.data
                    : false;
            if (!data) return [];

            var pesquisar = this.pesquisar && this.pesquisar.toLowerCase();

            var dataup = this.dataup && this.dataup.toLowerCase();
            var datato = this.datato && this.datato.toLowerCase();

            if (pesquisar && pesquisar.length >= 3) {
                data = data.filter(function(row) {
                    return (
                        String(row["name"])
                            .toLowerCase()
                            .indexOf(pesquisar) > -1
                    );
                });
            }

            if ( (dataup || datato) && !(pesquisar && pesquisar.length >= 3) ) {
                dataup = dataup ? dataup : 0;
                datato = datato ? datato : 99999999;
                data = data.filter(function(row) {
                    return (
                        row.data.slice(0, 8) >= dataup &&
                        row.data.slice(0, 8) <= datato
                    );
                });
            }

            return data;
        },

        tabela: function() {
            return new Tabela(
                this.paginator,
                ["Evento", "Data"],
                ["item_id.eventos_unidades", "data.data"],
                false
            );
        },

        paginator: function() {
            if (this.paginatorInspector !== this.hashCode(this.output)) {
                this.paginatorInspector = this.hashCode(this.output);
                if (this.sizeofarray < this.starts) this.starts = 0;
            }
            if (this.size > this.sizeofarray) {
                return this.output.slice(this.starts, this.sizeofarray);
            }
            if (this.starts > this.end) {
                return this.output.slice(this.starts, this.sizeofarray);
            }
            return this.output.slice(this.starts, this.end);
        },
        end: function() {
            if (this.starts + this.size > this.sizeofarray) {
                return this.starts + this.size - this.sizeofarray;
            }
            return this.starts + this.size;
        },
        sizeofarray: function() {
            return this.output.length;
        },
        pagesize: function() {
            return Math.ceil(this.output.length / this.size);
        },
        pages: function() {
            var i = 0;
            var retorno = {};
            var page = this.page;
            if (this.page + 7 >= this.pagesize && this.pagesize >= 15)
                page = this.pagesize - 15;
            while (i < this.pagesize && i < 15) {
                if (this.page + 7 >= this.pagesize && this.pagesize >= 15)
                    retorno[i] = page + i;
                else if (page >= 8) retorno[i] = page - 7 + i;
                else retorno[i] = i;
                i++;
            }
            return retorno;
        },
        hasPage: function() {
            return !(this.pagesize == 1);
        },
        page: function() {
            return parseInt(this.starts / this.size);
        }
    },
    methods: {
        sortBy: function(key) {
            this.sortKey = key;
            this.sortOrders[key] = this.sortOrders[key] * -1;
        },
        toward: function() {
            if (this.starts > 0) this.starts -= this.size;
            else this.starts = (this.pagesize - 1) * this.size;
        },
        foward: function() {
            if (this.starts + this.size < this.sizeofarray)
                this.starts += this.size;
            else this.starts = 0;
        },
        hashCode: function(obj) {
            var s = JSON.stringify(obj);
            return s.split("").reduce(function(a, b) {
                a = (a << 5) - a + b.charCodeAt(0);
                return a & a;
            }, 0);
        },
        toPage(page) {
            this.starts = this.size * page;
        }
    }
});

// USUARIOS
// TITULO : TEXTO
// ACTION : [ DELETE , EDIT ]
Vue.component("formularios-view-data-item", {
    template: "#formularios-view-data-template",
    data: function() {
        return {
            pesquisa: new Search({
                pesquisar: true,
                item: true,
                datarange: true
            }),
            starts: 0,
            size: 6,
            pesquisar: "",
            hasEdit: false,
            hasCopy: false,
            hasDelete: false,
            hasView: true
        };
    },
    props: {
        controller: Object
    },
    computed: {
        output: function() {
            var data =
                this.controller.data && this.controller.data.length > 0
                    ? this.controller.data
                    : false;
            if (!data) return [];

            var pesquisar = this.pesquisar && this.pesquisar.toLowerCase();
            // var categoria = this.categoria && this.categoria.toLowerCase()
            // var cidade = this.cidade && this.cidade.toLowerCase()
            // var datamm = this.datamm && this.datamm.toLowerCase()
            // var datayy = this.datayy && this.datayy.toLowerCase()
            var dataup = this.dataup && this.dataup.toLowerCase();
            var datato = this.datato && this.datato.toLowerCase();

            if (pesquisar && pesquisar.length >= 3) {
                data = data.filter(function(row) {
                    return (
                        String(row["local"])
                            .toLowerCase()
                            .indexOf(pesquisar) > -1 ||
                        String(row["descricao"])
                            .toLowerCase()
                            .indexOf(pesquisar) > -1
                    );
                });
            }
            // if (categoria) {
            // 	data = data.filter(function (row) {
            // 		return String(row['categoria']).toLowerCase().indexOf(categoria) > -1
            // 	})
            // }
            // if (cidade) {
            // 	data = data.filter(function (row) {
            // 		return String(row['cidade']).toLowerCase().indexOf(cidade) > -1
            // 	})
            // }
            // if (datayy) {
            // 	data = data.filter(function (row) {
            // 		return String(row['datayy']).toLowerCase().indexOf(datayy) > -1
            // 	})
            // }
            // if (datamm) {
            // 	data = data.filter(function (row) {
            // 		return String(row['datamm']).toLowerCase().indexOf(datamm) > -1
            // 	})
            // }
            if ( (dataup || datato) && !(pesquisar && pesquisar.length >= 3) ) {
                dataup = dataup ? dataup : 0;
                datato = datato ? datato : 99999999;
                data = data.filter(function(row) {
                    return (
                        row.data.slice(0, 12) >= dataup &&
                        row.data.slice(0, 12) <= datato
                    );
                });
            }

            return data;
        },
        tabela: function() {
            return new Tabela(
                this.paginator,
                ["Pagina", "Data"],
                ["pagina_id.pagina", "created_at.server_data"],
                false
            );
        },
        paginator: function() {
            if (this.paginatorInspector !== this.hashCode(this.output)) {
                this.paginatorInspector = this.hashCode(this.output);
                if (this.sizeofarray < this.starts) this.starts = 0;
            }
            if (this.size > this.sizeofarray) {
                return this.output.slice(this.starts, this.sizeofarray);
            }
            if (this.starts > this.end) {
                return this.output.slice(this.starts, this.sizeofarray);
            }
            return this.output.slice(this.starts, this.end);
        },
        end: function() {
            if (this.starts + this.size > this.sizeofarray) {
                return this.starts + this.size - this.sizeofarray;
            }
            return this.starts + this.size;
        },
        sizeofarray: function() {
            return this.output.length;
        },
        pagesize: function() {
            return Math.ceil(this.output.length / this.size);
        },
        pages: function() {
            var i = 0;
            var retorno = {};
            var page = this.page;
            if (this.page + 7 >= this.pagesize && this.pagesize >= 15)
                page = this.pagesize - 15;
            while (i < this.pagesize && i < 15) {
                if (this.page + 7 >= this.pagesize && this.pagesize >= 15)
                    retorno[i] = page + i;
                else if (page >= 8) retorno[i] = page - 7 + i;
                else retorno[i] = i;
                i++;
            }
            return retorno;
        },
        hasPage: function() {
            return !(this.pagesize == 1);
        },
        page: function() {
            return parseInt(this.starts / this.size);
        }
    },
    methods: {
        sortBy: function(key) {
            this.sortKey = key;
            this.sortOrders[key] = this.sortOrders[key] * -1;
        },
        toward: function() {
            if (this.starts > 0) this.starts -= this.size;
            else this.starts = (this.pagesize - 1) * this.size;
        },
        foward: function() {
            if (this.starts + this.size < this.sizeofarray)
                this.starts += this.size;
            else this.starts = 0;
        },
        hashCode: function(obj) {
            var s = JSON.stringify(obj);
            return s.split("").reduce(function(a, b) {
                a = (a << 5) - a + b.charCodeAt(0);
                return a & a;
            }, 0);
        },
        toPage(page) {
            this.starts = this.size * page;
        },
        relatorio() {
            var form,
                template,
                aux = "";

            this.output.forEach(function(el) {
                form = new Formulario(el);
                template = "<br>";
                form.relatorio.forEach(function(campo) {
                    aux +=
                        "<p><b>" +
                        campo.name +
                        ": </b> " +
                        campo.value +
                        "</p>";
                });
                template += "<br><hr>";
                aux += template;
            });

            new Helper().relatorio(aux);

            // var doc = new jsPDF();
            // doc.fromHTML(aux, 10, 10, { width: 180 });
            // doc.save("Relatório de Formulários.pdf");
        }
    }
});

/* ORGANIZACAO DE DATA */

/* PESQUISA */
Vue.component("pesquisa-item", {
    template: "#pesquisa-template",
    data: function() {
        return {
            nome: {
                categoria: "",
                cidade: ""
            }
        };
    },
    props: {
        controller: Object,
        output: Array,
        data: Object
    },
    mounted() {
        var t = this;
        $(".calendario-up").datepicker({
            dateFormat: "dd/mm/yy",
            altField: "#dataUp",
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
                t.controller.dataup = $(t.$refs.dataup).val();
            }
        });
        $(".calendario-to").datepicker({
            dateFormat: "dd/mm/yy",
            altField: "#dataTo",
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
                t.controller.datato = $(t.$refs.datato).val();
            }
        });

        $(".calendario-to").datepicker("setDate", new Date());
        $(".calendario-up").datepicker("setDate", new Helper().getDaysAgo());
    },
    computed: {
        pesquisar: function() {
            return this.data.pesquisar;
        },
        categoria: function() {
            return this.data.getArrCat(this.output);
        },
        cidade: function() {
            return this.data.getArrCid(this.output);
        },
        datayy: function() {
            return this.data.getArrYear(this.output);
        },
        datamm: function() {
            return this.data.getArrMonth(this.output);
        },
        datarange: function() {
            return this.data.datarange;
        },
        status: function() {
            return this.data.status;
        },
        destaque: function() {
            return this.data.destaque;
        }
    }
});

/* TABELA DE ACOES */
Vue.component("tabela-item", {
    template: "#tabela-template",
    props: {
        data: Object,
        controller: Object
    },
    computed: {
        thead: function() {
            if (this.data.colunas && this.data.colunas.length > 0)
                return this.data.colunas;
            return false;
        },
        tbody: function() {
            if (this.data.tabela && this.data.tabela.length > 0)
                return this.data.tabela;
            return false;
        },
        campos: function() {
            if (this.data.campos && this.data.campos.length > 0)
                return this.data.campos;
            return false;
        }
    }
});

/* TABELA DE ACOES */
Vue.component("galerias-item", {
    template: "#galerias-template",
    props: {
        controller: Object
    },
    computed: {
        galerias: function() {
            if (this.controller.galerias && this.controller.galerias.length > 0)
                return this.controller.galerias;
            return false;
        }
    },
    methods: {}
});

/* SELECAO DE ITEM */
Vue.component("selecao-item", {
    template: "#selecao-template",
    props: {
        controller: Object,
        data: Array
    },
    computed: {
        tbody: function() {
            if (this.data && this.data.length > 0) return this.data;
            return false;
        }
    }
});

/* LISTA */
Vue.component("lista-item", {
    template: "#lista-template",
    props: {
        controller: Object
    },
    computed: {
        data: function() {
            return this.controller.tabela;
        },
        thead: function() {
            if (this.data.colunas && this.data.colunas.length > 0)
                return this.data.colunas;
            return false;
        },
        tbody: function() {
            if (this.data.tabela && this.data.tabela.length > 0)
                return this.data.tabela;
            return false;
        }
    }
});

/* PAGINACAO */
Vue.component("paginator-item", {
    template: "#paginator-template",
    props: {
        controller: Object
    },
    computed: {}
});
