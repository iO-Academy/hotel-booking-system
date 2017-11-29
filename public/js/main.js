/**
 * Smooth scroll from search area to room types area
 */
$(document).ready(function () {
    $("#scroll_action").on('click', function (event) {
        if (this.hash !== "") {
            event.preventDefault()
            var hash = this.hash

            $('html, body').animate({
                scrollTop: $(hash).offset().top
            }, 1200, function () {
                window.location.hash = hash
            })
        }
    })
})

/**
 * carousels of images for each room type
 */
function carousel() {
    var img_section = document.querySelectorAll(".room_img")

    img_section.forEach(function (section_item) {
        change_img(section_item)
    })
}

/**
 * changing images inside the carousel
 */
function change_img(section_item) {
    var each_img = section_item.querySelectorAll('img')
    var img_number = 0
    var timer = null

    /**
     * selecting images algorithm
     */
    function selected_img() {
        clearTimeout(timer)
        if (!each_img[img_number]) {
            img_number = 0
        }
        each_img[img_number].setAttribute("id", "active")

        img_number++
        $(each_img[img_number]).removeAttr("id")
        timer = setTimeout(selected_img, 3000)
    }

    selected_img()
}

/**
 * showing and hiding description slider
 */
function displayMoreInfo() {
    var moreInfo = document.querySelectorAll(".more_info")
    for (var i = 0; i < moreInfo.length; i++) {
        moreInfo[i].setAttribute("id", i + 1)
    }

    moreInfo.forEach(function (item) {
        item.addEventListener("click", function () {
            var descriptionBox = this.parentNode.parentNode.querySelector(".description")
            var close = descriptionBox.querySelector(".close_button")
            if (this.getAttribute("id") % 2) {
                $(descriptionBox).css("right", "30%")
            } else {
                $(descriptionBox).css("right", "40%")
            }

            close.addEventListener("click", function () {

                if (item.getAttribute("id") % 2) {
                    $(descriptionBox).css("right", "0px")
                } else {
                    $(descriptionBox).css("right", "70%")
                }
            })
        })
    })
}

/**
 * showing results page on submit event
 */
document.querySelector(".date_submit").addEventListener("click", function (e) {
    e.preventDefault()
    updateResultsTable().then(
        function () {
            var roomResults = document.querySelector(".rooms_results")
            document.querySelector(".date_range_picker").style.top = "25%"
            document.querySelector(".rooms_types").style.display = "none"
            document.querySelector(".scroll").style.display = "none"

            if (roomResults.style.opacity == "1") {
                $(".rooms_results").animate({
                    height: "0",
                    opacity: "0",
                    marginTop: "100vh"
                }, 500, function () {
                    showRoomCards(roomResults)
                });
            } else {
                showRoomCards(roomResults)
            }

        }
    )
})

/**
 * showing room cards after click
 */
function showRoomCards(roomResults) {
    setTimeout(function () {
        roomResults.style.height = "auto"
        roomResults.style.opacity = "1"
        roomResults.style.marginTop = "0"
        roomResults.style.transition = ".8s"
    }, 500)
}