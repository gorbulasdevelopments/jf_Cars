let slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
    showDivs(slideIndex += n);
}

function showDivs(n) {
    let i;
    let x = document.getElementsByClassName("vehicleImages");
    if (n > x.length) {
        slideIndex = 1
    }

    if (n < 1) {
        slideIndex = x.length
    }

    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";  
    }
    x[slideIndex-1].style.display = "block";  
}

$(document).ready(function() {
    $('#vehicleEnquiryForm').submit(function(event) {
        event.preventDefault();


        $.ajax({
            type: "POST",
            url: "/showroom/vehicleEnquiry",
            dataType: 'json',
            data: {data:$(this).serialize()},
            error: function (response) {
                //console.log(response);
            },
            complete: function (response) {
                $("#enquiryFormContainer").html(response.responseText);
                console.log(response);
            }
        });
    });

});