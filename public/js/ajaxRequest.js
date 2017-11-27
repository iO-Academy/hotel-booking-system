window.addEventListener('DOMContentLoaded', function() {

    function makeRequest() {
        httpRequest = new XMLHttpRequest()

        if (!httpRequest) {
            console.log('Whoops, no badges chance')
            return false
        }
        httpRequest.onreadystatechange = alertContents
        httpRequest.open('POST', 'post.php', true)
        httpRequest.send()
    }

    function alertContents() {
        if (httpRequest.readyState === XMLHttpRequest.DONE) {
            if (httpRequest.status === 200) {
                return httpRequest.responseText
            } else {
                console.log('Sorry, our badger eat the cables once again');
            }
        }
    }
    makeRequest()
})


