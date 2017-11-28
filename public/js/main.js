// Smooth scroll

$(document).ready(function () {
    $("#scroll_action").on('click', function (event) {
        if (this.hash !== "") {
            event.preventDefault();
            var hash = this.hash;

            $('html, body').animate({
                scrollTop: $(hash).offset().top
            }, 800, function () {
                window.location.hash = hash;
            });
        }
    });
});


// description show and hide
var moreInfo = document.querySelectorAll(".more_info")

moreInfo.forEach(function (item) {
    item.addEventListener("click", function () {
        var parent = this.parentNode.parentNode.childNodes[1]
        var close = parent.childNodes[1].childNodes[0]
        console.log(close)

        if ($(parent).css("right") === ("0px")) {
            $(parent).css("right", "30%")
        } else {
            $(parent).css("right", "40%")
        }



        close.addEventListener("click", function () {

            console.log(window.innerWidth * 0.8 * 0.3)
            if ($(parent).css("right") < ("" + window.innerWidth * 0.8 * 0.3) ) {
        $(parent).css("right", "0px")
            } else {
                $(parent).css("right", "70%")
            }
        })
    })
})
