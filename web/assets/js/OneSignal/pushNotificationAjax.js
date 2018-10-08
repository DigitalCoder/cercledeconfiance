/////
// send push notification with jQuery Ajax PHP request
/////
var makeAjaxPHPRequestNotification = function (notification) {
    $.ajax({
        type: "POST",
        url: notification.url,
        data: {messageToSend: notification.data},
        cache: false
    })
    .done(function (response) {
        if(response.error) {
            console.error("Request failed: " + response.error);
        } else {
            console.info("Request notification success");
        }
    })
    .fail(function (jqXHR, textStatus) {
        console.error("Request failed: " + textStatus);
    });
};

/////
// send push notification with ajax PHP request
/////
var makeAjaxRequestNotification = function (notification) {
    var settings = {
        "async": true,
        "crossDomain": true,
        "url": notification.url,
        "method": "POST",
        "headers": {
            "Authorization": "Basic " + notification.restApiKey,
            "Content-Type": "application/json; charset=utf-8"
        },
        "data": notification.data
    };

    $.ajax(settings)
        .done(function (response) {
            console.log(response);
        })
        .fail(function (jqXHR, textStatus) {
            console.error("Request failed: " + textStatus);
        });
};

/////
/////
var makeRequestNotification = function (notification) {
    var xhr = new XMLHttpRequest();
    xhr.withCredentials = false;

    xhr.onreadystatechange = function () {
        alertContents(httpRequest);
    };

    xhr.open("POST", notification.url);
    xhr.setRequestHeader("Authorization", "Basic " + notification.restApiKey);
    xhr.setRequestHeader("Content-Type", "application/json; charset=utf-8");

    xhr.onprogress = function (event) {
        console.log('LOADING ... ', xhr.readyState); // readyState will be 3
        if (event.lengthComputable) {
            var percentComplete = (event.loaded / event.total)*100;
            console.log("%d%%", percentComplete);
        }
    };
    xhr.onload = function (event) {
        console.log('DONE ... ', xhr.readyState); // readyState will be 4
        if (this.status === 200) {
            console.log("Response: %s", this.responseText);
        } else {
            console.log("Status: %d (%s)", this.status, this.statusText);
        }
    };

    xhr.send(notification.data);
};

var alertContents = function (httpRequest) {
    try {
        if (httpRequest.readyState == 4) {
            if (httpRequest.status == 200) {
                console.log(httpRequest.responseText);
            } else {
                console.alert("Un problème est survenu au cours de la requête.");
                console.error("Status de la réponse: %d (%s)", httpRequest.status, httpRequest.statusText);
            }
        }
    }
    catch( e ) {
        console.alert("Une exception s’est produite : " + e.description);
    }
};

var ajaxPushNotitication = function(notification) {
    makeAjaxPHPRequestNotification(notification);
    //makeAjaxRequestNotification(notification);
    //makeRequestNotification(notification);
}

OneSignal.push(function() {
    OneSignal.isPushNotificationsEnabled().then(function(isEnabled) {
        if (isEnabled) {
            console.log("Push notifications are enabled!");
            if (typeof notification !== 'undefined') {
                console.info("notification");
                console.log(notification);
                ajaxPushNotitication(notification);
            }
        } else {
            console.log("Push notifications are not enabled yet.");
            OneSignal.registerForPushNotifications();
        }
    });
});