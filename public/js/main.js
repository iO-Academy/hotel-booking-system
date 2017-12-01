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
    var roomResults = document.querySelector(".rooms_results")
    var re = /^\d{1,2}\/\d{1,2}\/\d{4}$/

    if(!document.getElementById("from").value.match(re) || !document.getElementById("to").value.match(re)) {
        checkForm()
        return
    }

    if (document.getElementById("from").value === document.getElementById("to").value) {
        document.querySelector(".error p").innerHTML = "Minimum stay is 1 nights"
        error()
        return
    }

    if (roomResults.style.opacity == "1") {
        $(".rooms_results").animate({
            height: "0",
            opacity: "0",
            marginTop: "100vh"
        }, 500, function () {
            document.querySelectorAll('.room_type, .room_results h1').forEach(function (a) {
                a.remove()
            })
            updateRoomsResult(roomResults)
        });
    } else {
        updateRoomsResult(roomResults)
    }
})

/**
 * update result with new available rooms
 */
function updateRoomsResult(roomResults) {
    updateResultsTable().then(
        function () {
            document.querySelector(".date_range_picker").style.top = "25%"
            document.querySelector(".rooms_types").style.display = "none"
            document.querySelector(".scroll").style.display = "none"
            showRoomCards(roomResults)
        }
    )
}

/**
 * showing room cards after click
 */
async function showRoomCards(roomResults) {
    roomResults.style.height = "auto"
    $(roomResults).animate({
        opacity: "1",
        marginTop: "0vh"
    }, 1000)
}

/**
 * show error message with animation
 */
function error() {
    var error = document.querySelector(".error")
    error.style.display = "block";
    setTimeout(function () {
        $(".error").animate({
            opacity: "0"
        }, 1000, function () {
            error.style.display = "none";
            error.style.opacity = "1";
        });
    }, 3000)
}

/**
 * error notification for wrong date format
 */
function checkForm() {
    document.querySelector(".error p").innerHTML = "Wrong date format"
    error()
    return
}


function checkData() {
    document.querySelector(".error p").innerHTML = "No Rooms"
    error()
    return

}