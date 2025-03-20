/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 *
 */

"use strict";

function hapus(id) {
    $('#del-' + id).submit();
}

// Menu Dinamis
var path = location.pathname.split('/');
var currentPage = path[path.length - 1] || '/';

$('ul.sidebar-menu li a').each(function () {
    var href = $(this).attr('href');
    var hrefSplit = href.split('/');
    var hrefPage = hrefSplit[hrefSplit.length - 1] || '/';

    if (currentPage === hrefPage) {
        $(this).parent().addClass('active');
        $(this).closest('ul').parent('li').addClass('active'); // Activate parent if there is a submenu
    }
});

//Pagination
$(document).ready(function () {
    $('#myTable').DataTable();
});
