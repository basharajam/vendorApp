"use strict";
var KTDatatableHtmlTableDemo = {
    init: function() {
        var t;
        t = $("#kt_datatable").KTDatatable({
            layout:{
                theme:'default',
                icons:{
                    rowDetail: {
                        expand: 'fas fa-arrow-alt-circle-down',
                        collapse: 'fas fa-arrow-alt-circle-right'
                      }
                }
            }
        })
    }
};
jQuery(document).ready((function() {
    KTDatatableHtmlTableDemo.init()
}));
