function sendInfos(type) {
        var da = null;
        $.ajax({
            type: "POST",
            async: false,
            url: './php/sql-weiteres.php',
            data: ({
                type: type
            }),
            dataType: 'json',
            success: function (data) {
                da = data;
            }
        });
        return da;
}