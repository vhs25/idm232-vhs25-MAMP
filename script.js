$('#search').keypress(function (e) {
    var str = $('#search').val();
    var domain = "http://www.yourdomain.com";
    var url = domain+"default.aspx?search=" + str;
    if (e.keyCode == 13) {
        location.href = url;
    }
});