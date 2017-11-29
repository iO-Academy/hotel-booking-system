/**
 * implement Handlebars into our layout (results)
 */
function fillResultsTable(HBTemplate) {
    var template = Handlebars.compile(HBTemplate)

    Handlebars.registerHelper('if', function (v1, v2, options) {
        if (v1 === v2) {
            return options.fn(this)
        }
        return options.inverse(this)
    })

    fetch("/js/mockData/example2.json")
        .then(function (result) {
            return result.json()
        })
        .then(function (result) {
            var result_list = document.querySelector(".rooms_results")

            if (result.success) {
                result.data.forEach(function (roomData) {
                    var html = template(roomData)
                    result_list.innerHTML += html
                })
            } else {
                result_list.innerHTML += "Can't load the data from the server"
            }
        })
        .then(function () {
            carousel()
            displayMoreInfo()
        })
}

/**
 * get the handlebars template and use this to display the room types
 */
async function updateResultsTable() {
    getTemplateAjax('js/templates/results.hbs').then(function (HBTemplate) {
        fillResultsTable(HBTemplate)
    })
}
