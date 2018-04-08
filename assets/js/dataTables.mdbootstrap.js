/*! DataTables MDBootstrap 3 integration
 * Based upon DataTables Bootstrap 3 integration
 * Dominic Myers <annoyingmouse@gmail.com>
 */

/**
 * DataTables integration for MDBootstrap 3. This requires MDBootstrap 3 and
 * DataTables 1.10 or newer.
 *
 * This file sets the defaults and adds options to DataTables to style its
 * controls using Bootstrap.
 */
(function (factory) {
    if (typeof define === 'function' && define.amd) {
        // AMD
        define(['jquery', 'datatables.net'], function ($) {
            return factory($, window, document);
        });
    } else if (typeof exports === 'object') {
        // CommonJS
        module.exports = function (root, $) {
            if (!root) {
                root = window;
            }
            if (!$ || !$.fn.dataTable) {
                // Require DataTables, which attaches to jQuery, including
                // jQuery if needed and have a $ property so we can access the
                // jQuery object that is used
                $ = require('datatables.net')(root, $).$;
            }
            return factory($, root, root.document);
        };
    } else {
        // Browser
        factory(jQuery, window, document);
    }
}(($, window, document, undefined) => {
    'use strict';
    let DataTable = $.fn.dataTable;
    /* Set the defaults for DataTables initialisation */
    $.extend(true, DataTable.defaults, {
        "dom": `
            <'row'
                <'col-sm-6 input-field'
                    l
                >
                <'col-sm-6 input-field'
                    f
                >
            >
            <'row'
                <'col-sm-12'
                    tr
                >
            >
            <'row'
                <'col-sm-5'
                    i
                >
                <'col-sm-7'
                    p
                >
            >`,
        "renderer": 'mdbootstrap',
        "language": {
            "lengthMenu": "_MENU_",
            "paginate": {
                "first": `
                    <i class="material-icons">
                        first_page
                    </i>`,
                "last": `
                    <i class="material-icons">
                        last_page
                    </i>`,
                "next": `
                    <i class="material-icons">
                        chevron_right
                    </i>`,
                "previous": `
                    <i class="material-icons">
                        chevron_left
                    </i>`
            }
        },
        "initComplete": () => {
            /*
             * This makes the length dropdown into a material select
             */
            let lengthDiv = $(".dataTables_length"),
                lengthSelect = lengthDiv
                    .find("select[name$='_length']"),
                lengthSelectClone = lengthSelect
                    .clone(true);
            lengthDiv
                .replaceWith(lengthSelectClone);
            lengthSelectClone
                .material_select();
            let lengthSelectCloneCaret = lengthSelectClone
                .parent()
                .find(".caret");
            lengthSelectCloneCaret
                .css("display", "block")
                .css("width", "initial")
                .css("border-top", "initial");

            /*
             * This makes the filter input work as a material input
             */
            let filterDiv = $(".dataTables_filter"),
                filterDivParent = filterDiv
                    .parent(".input-field"),
                filterInput = filterDiv
                    .find("input[type='search']"),
                filterInputClone = filterInput
                    .clone(true),
                tableId = filterDiv
                    .closest(".dataTables_wrapper")
                    .attr("id")
                    .split("_")[0],
                filterLabel = filterInput
                    .parent("label")
                    .attr("for", tableId + "_cloned_input")
                    .empty()
                    .text("Search")
                    .clone(true);
            filterInputClone.attr({
                "id": tableId + "_cloned_input",
                "type": "text"
            }).on("blur", () => {
                /*
                 * We need to ensure that the active class is removed from the input if there
                 * isn't a value to make it look pretty.
                 */
                if (!filterInputClone.val().length) {
                    filterLabel.removeClass("active");
                }
            });
            filterDivParent
                .empty()
                .append(`
                    <i class="material-icons prefix">
                        search
                    </i>`)
                .append(filterInputClone)
                .append(filterLabel)
        }
    });
    /* Default class modification */
    $.extend(DataTable.ext.classes, {
        sWrapper: "dataTables_wrapper form-inline dt-bootstrap",
        sProcessing: "dataTables_processing panel panel-default"
    });
    /* MDBootstrap paging button renderer */
    DataTable.ext.renderer.pageButton.mdbootstrap = (settings, host, idx, buttons, page, pages) => {
        let api = new DataTable.Api(settings);
        let classes = settings.oClasses;
        let lang = settings.oLanguage.oPaginate;
        let aria = settings.oLanguage.oAria.paginate || {};
        let counter = 0;
        let getDisplayClass = button => {
            let tempBtns = {
                "tempBtnDisplay": "",
                "tempBtnClass": ""
            };
            let tempBtnDisplays = {
                "ellipsis": () => {
                    tempBtns.btnDisplay = "&#x2026;";
                    tempBtns.btnClass = "disabled";
                },
                "first": () => {
                    tempBtns.btnDisplay = lang.sFirst;
                    tempBtns.btnClass = button + (page > 0 ? '' : ' disabled');
                },
                "previous": () => {
                    tempBtns.btnDisplay = lang.sPrevious;
                    tempBtns.btnClass = button + (page > 0 ? '' : ' disabled');
                },
                "next": () => {
                    tempBtns.btnDisplay = lang.sNext;
                    tempBtns.btnClass = button + (page < pages - 1 ? '' : ' disabled');
                },
                "last": () => {
                    tempBtns.btnDisplay = lang.sLast;
                    tempBtns.btnClass = button + (page < pages - 1 ? '' : ' disabled');
                },
                "default": () => {
                    tempBtns.btnDisplay = button + 1;
                    tempBtns.btnClass = page === button ? 'active' : '';
                }
            };
            (tempBtnDisplays[button] || tempBtnDisplays["default"])();
            return tempBtns;
        };
        let attach = (container, buttons) => {
            let i, ien, node, button;
            let clickHandler = e => {
                e.preventDefault();
                if (!$(e.currentTarget).hasClass('disabled') && api.page() != e.data.action) {
                    api.page(e.data.action).draw('page');
                }
            };
            for (i = 0, ien = buttons.length; i < ien; i++) {
                button = buttons[i];

                if ($.isArray(button)) {
                    attach(container, button);
                }
                else {
                    let btnDisplayClass = getDisplayClass(button);
                    if (btnDisplayClass.btnDisplay) {
                        node = $('<li>', {
                            'class': classes.sPageButton + ' ' + btnDisplayClass.btnClass,
                            'id': idx === 0 && typeof button === 'string' ?
                                settings.sTableId + '_' + button :
                                null
                        }).append($('<a>', {
                                'href': '#',
                                'aria-controls': settings.sTableId,
                                'aria-label': aria[button],
                                'data-dt-idx': counter,
                                'tabindex': settings.iTabIndex
                            }).html(btnDisplayClass.btnDisplay)
                        ).appendTo(container);
                        settings.oApi._fnBindAction(
                            node, {action: button}, clickHandler
                        );
                        counter++;
                    }
                }
            }
        };
        // IE9 throws an 'unknown error' if document.activeElement is used
        // inside an iframe or frame.
        let activeEl;
        try {
            // Because this approach is destroying and recreating the paging
            // elements, focus is lost on the select button which is bad for
            // accessibility. So we want to restore focus once the draw has
            // completed
            activeEl = $(host).find(document.activeElement).data('dt-idx');
        } catch (e) {
        }
        attach(
            $(host).empty().html('<ul class="pagination pag-circle"/>').children('ul'), buttons
        );
        if (activeEl) {
            $(host).find('[data-dt-idx=' + activeEl + ']').focus();
        }
    };
    return DataTable;
}));