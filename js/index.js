$(document).ready(function () {
    $("#btnSearch").click(function () {
        loadFilteredCredentials();
    });

    $("#btnClear").click(function () {
        $("#filter").val("");
        loadALLCredentials();
    });

    $("#filter").keypress(function (e) {
        if (e.which == 13){
            loadFilteredCredentials();
        }
    });

});

function parseCredentialsTable(data){
    var tmp = "";
    $.each(data, function (index, credentials) {
        tmp += "<tr>";
        tmp += "<td>" + credentials.name + "</td>"
        tmp += "<td>" + credentials.domain + "</td>"
        tmp += "<td>" + credentials.cms_username + "</td>"
        tmp += "<td>" + credentials.cms_password + "</td>"
        tmp += "<td>";
        tmp += '<a class="btn btn-info" href="index.php?r=credentials/view&id=' + credentials.id + '"><span class="glyphicon glyphicon-eye-open"></span></a>&nbsp;';
        tmp += '<a class="btn btn-primary" href="index.php?r=credentials/update&id=' + credentials.id + '"><span class="glyphicon glyphicon-pencil"></span></a>&nbsp;';
        tmp += '<a class="btn btn-danger" href="index.php?r=credentials/delete&id=' + credentials.id + '"><span class="glyphicon glyphicon-remove"></span></a>';
        tmp += "</td>";
        tmp += "</tr>";
    });

    return tmp;
}

function loadALLCredentials(){
    $.get('api/credentials', function (data){
        $("#credentials").html(parseCredentialsTable(data));
        console.log(data)
    });
}

function loadFilteredCredentials(){
    var filter = $("#filter").val();

    if (filter == ""){
        loadALLCredentials();
    } else{
        $.get('api/credentials/search/' + filter, function (data){
            $("#credentials").html(parseCredentialsTable(data));
            console.log(data)
        });
    }
}