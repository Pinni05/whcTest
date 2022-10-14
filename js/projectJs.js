$(document).ready(function () {

    $('#submitForm').submit(function (e) {
        e.preventDefault();

        $.ajax({
            type: "POST",
            url: 'controller/process.php',
            data: $(this).serialize(),
            success: function (response) {
                var jsonData = JSON.parse(response);
                $("#showData").text(jsonData.message);
                if(jsonData.result == 1){
                    $("#showData").addClass("alert alert-success");
                }else{
                    $("#showData").addClass("alert alert-danger");
                }

            }
        });
    });
});