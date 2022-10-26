$(function () {
    "use strict";

    $(function () {
        $("#table-2").removeClass("d-none");
        $("#form-1").click(function () {
            $("#table-1").removeClass("d-none");
            $("#table-2").addClass("d-none");

            console.log("okee");
        });
        $("#form-2").click(function () {
            $("#table-2").removeClass("d-none");
            $("#table-1").addClass("d-none");
             
        });

        $("#dataTableExample").each(function () {
            var datatable = $(this);
            // SEARCH - Add the placeholder for Search and Turn this into in-line form control
            var search_input = datatable
                .closest(".dataTables_wrapper")
                .find("div[id$=_filter] input");
            search_input.attr("placeholder", "Search");
            search_input.removeClass("form-control-sm");
            // LENGTH - Inline-Form control
            var length_sel = datatable
                .closest(".dataTables_wrapper")
                .find("div[id$=_length] select");
            length_sel.removeClass("form-control-sm");
        });
    });
});
