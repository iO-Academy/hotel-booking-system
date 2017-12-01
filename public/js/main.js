/**
 * implement Handlebars into our layout
 */
function fillRoomTable(HBTemplate) {
    var template = Handlebars.compile(HBTemplate)

    Handlebars.registerHelper('if', function(v1, v2, options) {
        if(v1 === v2) {
            return options.fn(this)
        }
        return options.inverse(this)
    })

    fetch("/rooms")
        .then(function (result) {
            return result.json()
        })
        .then(function (result) {
            var room_list = document.querySelector(".rooms_types")

            if (result.success) {
                result.data.forEach(function (roomData) {
                    var html = template(roomData)
                    room_list.innerHTML += html
                })
            } else {
                room_list.innerHTML += "Can't load the data from the server"
            }
        })
        .then(function () {
            carousel()
        })
}

/**
 * get the handlebars template and use this to display the room types
 */
function updateRoomTable() {
    getTemplateAjax('js/templates/room_types.hbs').then(function (HBTemplate) {
        fillRoomTable(HBTemplate)
    })
}

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
            each_img[img_number].removeAttribute("class")
        }

        each_img.forEach(function (item) {
            $(item).removeClass("active")
        })
        each_img[img_number].setAttribute("class", "active")
        img_number++
        
        timer = setTimeout(selected_img, 3000)
    }
    selected_img()
}

updateRoomTable()