$(function () {
    $('#IssuePark').autocomplete({
        minLength: 1,
        source: function (request, response) {
            $.getJSON(baseUrl + '/admin/parks/api/' + encodeURI(request.term), function (r) {
                response($.map(r, function (item) {
                    return {
                        label: item.Park.name,
                        value: item.Park.name,
                        data: item.Park
                    }
                }));
            });
        },
        select: function (event, ui) {
            $('#IssueParkId').val(ui.item.data.id);
        }
    });
})