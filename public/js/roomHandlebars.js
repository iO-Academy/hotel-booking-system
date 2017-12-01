/**
 * implement Handlebars into our layout
 */
function fillRoomTable(HBTemplate) {
    var template = Handlebars.compile(HBTemplate)

    Handlebars.registerHelper('if', function (version1, version2, options) {
        if (version1 === version2) {
            return options.fn(this)
        }
        return options.inverse(this)
    })

    fetch("/js/mockData/example.json")
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

updateRoomTable()