$(function () {
    $('#ParkKeywordsForm').submit(function () {
        location.href = baseUrl + '/admin/parks/index/' + encodeURI($('#ParkKeywords').val());
        return false;
    })
    $('#ParkKeywordsBtn').click(function () {
        location.href = baseUrl + '/admin/parks/index/' + encodeURI($('#ParkKeywords').val());
        return false;
    });
})