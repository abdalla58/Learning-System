
    function checkemailAvailability() {
    $("#loaderIcon").show();
    jQuery.ajax({
    url: "check_availability.php",
    data:'emailid='+$("#emailid").val(),
    type: "POST",
    success:function(data){
    $("#email-availability-status").html(data);
    $("#loaderIcon").hide();
    },
    error:function (){}
    });
    }

    function checkusernameAvailability() {
    $("#loaderIcon").show();
    jQuery.ajax({
    url: "check_availability.php",
    data:'username='+$("#username").val(),
    type: "POST",
    success:function(data){
    $("#username-availability-status").html(data);
    $("#loaderIcon").hide();
    },
    error:function (){}
    });
    }
