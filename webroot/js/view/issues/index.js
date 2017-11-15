$(function () {
    $('#IssueKeywordsForm').submit(function () {
        location.href = baseUrl + '/admin/issues/index/' + encodeURI($('#IssueKeywords').val());
        return false;
    })
    $('#IssueKeywordsBtn').click(function () {
        location.href = baseUrl + '/admin/issues/index/' + encodeURI($('#IssueKeywords').val());
        return false;
    });
})