$(document).ready(function () {
    $('#myTabs a').on('click', function (e) {
        e.preventDefault();
        const tabId = $(this).attr('id').replace('-tab', '');
        const url = $(this).attr('href');

        $.ajax({
            url: url,
            type: 'GET',
            success: function (data) {
                $(`#myTabContent .tab-pane`).removeClass('show active');
                $(`#${tabId}`).addClass('show active');
                $(`#${tabId}`).html(data);
            },
            error: function () {
                console.log('Error loading content');
            }
        });
    });
});
