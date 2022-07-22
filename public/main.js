var input = document.getElementById('input');

var list = document.getElementById('messages');

var button = document.getElementById('send');

function send() {

    var text = input.value;

    if (text) {

        var url = 'http://192.168.1.99:8000/mensagem';

        var data = { text };

        var request = new XMLHttpRequest();

        request.open('POST', url, true);

        request.setRequestHeader("Content-Type", "application/json;charset=UTF-8");

        request.onload = function() {

            if (this.status >= 200 && this.status < 400) {

                // Success!
                var resp = this.response;

            } else {
                // We reached our target server, but it returned an error
            
            }
        };
          
        request.onerror = function() {
        // There was a connection error of some sort
        };

        var json = JSON.stringify(data);

        request.send(json);
    }
}

function onMessageReceived(data) {

    var li = document.createElement('li');

    li.textContent = data.text;

    list.appendChild(li);
}

button.addEventListener('click', send);

var ws = window.Echo.channel('chat');

ws.listen('.Message', onMessageReceived);