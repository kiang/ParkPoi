$(function () {
    $('#IssueKeywordsForm').submit(function () {
        location.href = baseUrl + '/admin/parks/index/' + encodeURI($('#IssueKeywords').val());
        return false;
    })
    $('#IssueKeywordsBtn').click(function () {
        location.href = baseUrl + '/admin/parks/index/' + encodeURI($('#IssueKeywords').val());
        return false;
    });
})