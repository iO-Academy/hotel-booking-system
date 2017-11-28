/**
 * function to make ajax requests in order to populate the landing page with information for the rooms
 * @return {boolean}
 */
function makeRequest() {
    httpRequest = new XMLHttpRequest()

    if (!httpRequest) {
        console.log('Whoops, no badges chance')
        return false
    }
    httpRequest.onreadystatechange = alertContents
    httpRequest.open('GET', '../../src/routes.php', true)
    httpRequest.send()
}

/**
 * function to check if there is response from the backend and handle any failures
 * @return {string}
 */
 function alertContents() {
     if (httpRequest.readyState === XMLHttpRequest.DONE) {
         if (httpRequest.status === 200) {
             return httpRequest.responseText
         } else {
             console.log('Sorry, our badger eat the cables once again');
         }
     }
 }

window.addEventListener('DOMContentLoaded', function() {
    fetch('/rooms', {
        method: 'get'
    }).then(function() {
        makeRequest()
    }).catch(function() {
        console.log('Sorry out badger took control! Ask him for help!')
    })
})