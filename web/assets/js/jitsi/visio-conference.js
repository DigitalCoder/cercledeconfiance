var isMobile = false;
if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini|Opera Mobile|Kindle|Windows Phone|PSP|AvantGo|Atomic Web Browser|Blazer|Chrome Mobile|Dolphin|Dolfin|Doris|GO Browser|Jasmine|MicroB|Mobile Firefox|Mobile Safari|Mobile Silk|Motorola Internet Browser|NetFront|NineSky|Nokia Web Browser|Obigo|Openwave Mobile Browser|Palm Pre web browser|Polaris|PS Vita browser|Puffin|QQbrowser|SEMC Browser|Skyfire|Tear|TeaShark|UC Browser|uZard Web|wOSBrowser|Yandex.Browser mobile/i.test(navigator.userAgent)) isMobile = true;
//////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////
function mreplace (replacements, str) {
    let result = str;
    for (let [x, y] of replacements)
        result = result.replace(x, y);
    return result;
}
//////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////
/**
 * Get the closest matching element up the DOM tree.
 * @private
 * @param  {Element} elem     Starting element
 * @param  {String}  selector Selector to match against
 * @return {Boolean|Element}  Returns null if not match found
 */
var getClosest = function ( elem, selector ) {
    // Element.matches() polyfill
    if (!Element.prototype.matches) {
        Element.prototype.matches =
            Element.prototype.matchesSelector ||
            Element.prototype.mozMatchesSelector ||
            Element.prototype.msMatchesSelector ||
            Element.prototype.oMatchesSelector ||
            Element.prototype.webkitMatchesSelector ||
            function (s) {
                var matches = (this.document || this.ownerDocument).querySelectorAll(s),
                    i = matches.length;
                while (--i >= 0 && matches.item(i) !== this) {}
                return i > -1;
            };
    }

    // Get closest match
    for ( ; elem && elem !== document; elem = elem.parentNode ) {
        if ( elem.matches( selector ) ) return elem;
    }

    return null;

};
//////////////////////////////////////////////////////////////////////
var hasSomeParentTheClass = function (element, classname) {
    // If we are here we didn't find the searched class in any parents node
    if (!element.parentNode) return false;
    // If the current node has the class return true, otherwise we will search
    // it in the parent node
    if (element.className.split(' ').indexOf(classname)>=0) return true;
    return hasSomeParentTheClass(element.parentNode, classname);
};
//////////////////////////////////////////////////////////////////////
var toggleBtnOnOff = function (element) {
    if (hasSomeParentTheClass(element, 'off')) {
        element.classList.remove('off');
        element.classList.add('on');
    } else {
        element.classList.remove('on');
        element.classList.add('off');
    }
};
//////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////
var apiJitsi;

var circleMembers = document.getElementById("circleMembers");
var videoButtonJoin = document.getElementById("videoButtonJoin");
var videoButtonSchedule = document.getElementById("videoButtonSchedule");
var videoButtonClose = document.getElementById("videoButtonClose");
var btnsVisio = document.getElementById("btnsVisio");
var visioContainer = document.getElementById("visioContainer");
var videoParticipants = document.getElementById("videoParticipants");
var videoChat = document.getElementById("videoChat");
var videoEvents = document.getElementById("videoEvents");
var htmlElement = document.querySelector('#Meet_' + _token);
var panelFooter = document.getElementById("panelFooter");
var colChat = document.getElementById("colChat");
var discussion = document.getElementById("discussion");
var toolsVisio = document.getElementById("toolsVisio");

var toggleAudio = document.getElementById('toggleAudio');
var toggleVideo = document.getElementById('toggleVideo');
var toggleFilmStrip = document.getElementById('toggleFilmStrip');
var toggleChat = document.getElementById('toggleChat');
var toggleContactList = document.getElementById('toggleContactList');
var toggleShareScreen = document.getElementById('toggleShareScreen');

var visio_loader = document.getElementById('visio_loader');

var visioRoomLink = document.getElementById('visio_room_link');

//////////////////////////////////////////////////////////////////////
var _participantId = '';
//////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////
var interfaceVisioLoad = function (event) {
    console.info('== interfaceVisioLoad : ');
    console.log(event);

    if (typeof notification !== 'undefined' && typeof pushNotificationAjax == "function") {
        notification.data = mreplace([
            [/déconnecté/, 'en ligne'],
            [/offline/,'online']
        ], notification.data);
        //new Date().getTime(); // timestamp
        pushNotificationAjax(notification);
    }

    visio_loader.classList.add('in');

    var meetContainer = document.querySelector('#Meet_' + _token);
    console.info('apiJitsi._participants.length', Object.getOwnPropertyNames(apiJitsi._participants).length);
    console.info('apiJitsi._participants', apiJitsi._participants);

    visio_loader.classList.remove('in');
    visioContainer.classList.remove("hidden");
    toolsVisio.classList.remove("hidden");
    panelFooter.classList.add('in');

    apiJitsi.executeCommand('avatarUrl', _avatarURL);
    apiJitsi.executeCommand('displayName', _displayName);

    document.getElementById('visioBtns').classList.add("hidden");
    videoButtonClose.classList.remove("hidden");

    if (colChat) {
        colChat.classList.remove("hidden");
    }
    if (discussion) {
        discussion.classList.add('in');
    }

    toggleAudio.addEventListener("click", (event) => { // Mutes / unmutes the audio for the local participant. No arguments are required.
        apiJitsi.executeCommand('toggleAudio');

        var parent = getClosest(event.target, '.btn');
        toggleBtnOnOff(parent);
    }, false);

    toggleVideo.addEventListener("click", (event) => { // Mutes / unmutes the video for the local participant. No arguments are required.
        apiJitsi.executeCommand('toggleVideo');

        var parent = getClosest(event.target, '.btn');
        toggleBtnOnOff(parent);
    }, false);

    toggleFilmStrip.addEventListener("click", (event) => { // Hides / shows the filmstrip. No arguments are required.
        apiJitsi.executeCommand('toggleFilmStrip');

        var parent = getClosest(event.target, '.btn');
        toggleBtnOnOff(parent);
    }, false);

    toggleChat.addEventListener("click", (event) => { // Hides / shows the chat. No arguments are required.
        apiJitsi.executeCommand('toggleChat');

        var parent = getClosest(event.target, '.btn');
        toggleBtnOnOff(parent);
    }, false);

    toggleContactList.addEventListener("click", (event) => { // Hides / shows the contact list. No arguments are required.
        apiJitsi.executeCommand('toggleContactList');

        var parent = getClosest(event.target, '.btn');
        toggleBtnOnOff(parent);
    }, false);

    toggleShareScreen.addEventListener("click", (event) => { // Starts / stops screen sharing. No arguments are required.
        apiJitsi.executeCommand('toggleShareScreen');

        var parent = getClosest(event.target, '.btn');
        toggleBtnOnOff(parent);
    }, false);

    //////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////

    apiJitsi.addEventListener("hangup ", (data) => {
        console.info("== event hangup ==");
        console.log(data);
    }, false);

    apiJitsi.addEventListener("participantJoined", (data) => {
        console.info("== participantJoined ==");

        videoParticipants.innerText = apiJitsi.getNumberOfParticipants();
        videoParticipants.classList.add('in');

        var participantId = data.id;
        var displayName = data.displayName; // apiJitsi.getDisplayName(participantId);

        console.log("participantJoined", participantId, displayName);

        circleMembers.querySelector('a[data-displayName="' + displayName + '"]').setAttribute('data-participantId', participantId);
        circleMembers.querySelector('a[data-participantId="' + participantId + '"]').classList.add('bg-info');

        var eventMsg = '"' + displayName + '"' + ' a rejoint la visio';
        videoEvents.value = eventMsg;
    }, false);

    // videoConferenceJoined
    /*
    {
        "roomName": room, // the room name of the conference
        "id": id, // the id of the local participant
        "displayName": displayName, // the display name of the local participant
        "avatarURL": avatarURL // the avatar URL of the local participant
    }
    */
    apiJitsi.addEventListener("videoConferenceJoined", (data) => {
        console.info("== videoConferenceJoined ==");

        visio_loader.classList.remove('in');
        document.querySelectorAll('#circleMembers input[type="checkbox"]:checked').forEach(function (element) {
            element.setAttribute('disabled', 'disabled');
        });
        videoParticipants.innerText = apiJitsi.getNumberOfParticipants();
        videoParticipants.classList.add('in');

        var roomName = data.roomName;

        var participantId = data.id;
        var displayName = data.displayName; // apiJitsi.getDisplayName(participantId);

        console.log("videoConferenceJoined", roomName, participantId, displayName);

        _participantId = participantId;
        circleMembers.querySelector('a[data-displayName="' + displayName + '"]').setAttribute('data-participantId', participantId);
        circleMembers.querySelector('a[data-participantId="' + participantId + '"]').classList.add('bg-success');

        var eventMsg = '"' + displayName + '"' + ' a rejoint la visio';
        videoEvents.value = eventMsg;
    }, false);

    apiJitsi.addEventListener("participantLeft", (data) => {
        console.info("== participantLeft ==");

        videoParticipants.innerText = apiJitsi.getNumberOfParticipants();
        videoParticipants.classList.add('in');

        var participantId = data.id;
        data.displayName = _displayName;
        var displayName = data.displayName;
        console.log("participantLeft", participantId, displayName);

        var eventMsg = '"' + displayName + '"' + ' a quitté la visio';
        videoEvents.value = eventMsg;
    }, false);

    // @TODO refacto with videoConferenceLeft and hangup and readyToClose
    apiJitsi.addEventListener("videoConferenceLeft", (data) => {
        console.log("== videoConferenceLeft ==");
        console.log(data);

        btnsVisio.classList.add('hidden');

        roomName = data.roomName;

        console.log("videoConferenceLeft", roomName);

        var eventMsg = 'Vous avez quitté la visio-conférence ';
        videoEvents.value = eventMsg;
    }, false);

    // incomingMessage
    /*{
        "from": from, // The id of the user that sent the message
        "nick": nick, // the nickname of the user that sent the message
        "message": txt // the text of the message
    }*/
    apiJitsi.addEventListener("incomingMessage", (data) => {
        console.info("== incomingMessage ==");
        console.log(data);

        var from = data.from;
        var nick = data.nick;
        var message = data.message;

        var displayName = nick.replace(' (' + from + ')', '');
        var chatMsg = '<strong>"' + displayName + '"</strong>' + ' > ' + message;

        if (typeof videoChat != undefined) {
            videoChat.value = chatMsg;
        }

        var msgContainer = document.createElement("li");
        msgContainer.className = "list-group-item";

        if (displayName === _displayName) {
            msgContainer.classList.add('active');
        }

        msgContainer.innerHTML = chatMsg;

        if (typeof videoChat != undefined) {
            videoChat.appendChild(msgContainer);
        }
        var eventMsg = '"' + displayName + '"' + ' écrit';
        videoEvents.value = eventMsg;
    }, false);

    // outgoingMessage
    /*{
        "message": txt // the text of the message
    }*/
    apiJitsi.addEventListener("outgoingMessage", (data) => {
        console.info("== outgoingMessage ==");
        console.log(data);

        var from = data.from;
        var nick = data.nick;
        var message = data.message;

        var chatMsg = '#> ' + message;

        if (typeof videoChat != undefined) {
            videoChat.value = chatMsg;
        }

        var msgContainer = document.createElement("li");
        msgContainer.className = "list-group-item active";
        msgContainer.innerHTML = chatMsg;

        if (typeof videoChat != undefined) {
            videoChat.appendChild(msgContainer);
        }

        var eventMsg = '"le message "' + message + '"' + '" est envoyé ';
        videoEvents.value = eventMsg;
    }, false);

    // audioMuteStatusChanged
    /*
    {
    "muted": muted // new muted status - boolean
    }
     */
    apiJitsi.addEventListener("audioMuteStatusChanged", (data) => {
        console.info("== audioMuteStatusChanged ==");
        console.log(data);

        var muted = data.muted;
        var eventMsg = 'le son est ';

        if (muted) {
            toggleAudio.classList.add('off');
            eventMsg += 'désactivé';
        } else {
            toggleAudio.classList.remove('off');
            eventMsg += 'activé';
        }

        videoEvents.value = eventMsg;
    }, false);

    // videoMuteStatusChanged
    /*
    {
    "muted": muted // new muted status - boolean
    }
     */
    apiJitsi.addEventListener("videoMuteStatusChanged", (data) => {
        console.info("== videoMuteStatusChanged ==");
        console.log(data);

        var muted = data.muted;
        var eventMsg = 'la vidéo est ';

        if (muted) {
            toggleVideo.classList.add('off');
            eventMsg += 'désactivé';
        } else {
            toggleVideo.classList.remove('off');
            eventMsg += 'activé';
        }

        videoEvents.value = eventMsg;
    }, false);

    apiJitsi.addEventListener("readyToClose", (data) => {
        console.info("== event readyToClose ==");
        console.log(data);

        notification.data = mreplace([
            [/en ligne/, 'déconnecté'],
            [/online/,'offline']
        ], notification.data);

        pushNotificationAjax(notification);

        apiJitsi.removeEventListeners(["participantJoined", "participantLeft", "videoConferenceJoined", "videoConferenceLeft"]);
        apiJitsi.dispose();

        videoParticipants.innerText = "0";
        videoParticipants.classList.remove('in');

        visioContainer.classList.add("hidden");

        visioRoomLink.classList.add("hidden");

        document.getElementById('visioBtns').classList.remove("hidden");

        videoButtonClose.classList.add("hidden");

        toolsVisio.classList.add("hidden");
        panelFooter.classList.remove('in');

        if(colChat) {
            colChat.classList.add("hidden");
        }

        if(discussion) {
            discussion.classList.remove('in');
        }

        document.querySelectorAll('#circleMembers input[type="checkbox"]:checked').forEach(function (element) {
            element.removeAttribute('disabled','disabled');
            $(element).trigger('click');
        });

        document.querySelectorAll('#circleMembers input[type="checkbox"].current_user').forEach(function (element) {
            $(element).trigger('click');
            element.setAttribute('disabled','disabled');
        });

        //window.location.reload();
    }, false);

    //if (Object.getOwnPropertyNames(apiJitsi._participants).length < 0) {
    document.querySelectorAll('.btn-reload').forEach(function (element) {
        element.addEventListener("click", (event) => {
            window.location.reload();
        }, false);
    });

    if(isMobile) {
        var iframe = apiJitsi.getIFrame();
        var appURL = iframe.src.replace('https://','org.jitsi.meet://');

        visioRoomLink.classList.remove("hidden");
        visioRoomLink.querySelector('a').setAttribute('href', appURL)

        visioContainer.querySelector('iframe').setAttribute('src', appURL);

        visioContainer.classList.add("hidden");
        toolsVisio.classList.add("hidden");
        panelFooter.classList.remove('in');

        document.getElementById('visioBtns').classList.add("hidden");
    }
}
//////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////
var options = {
    roomName: _roomName,
    displayName: _displayName, // the display name of the local participant
    avatarURL: _avatarURL, // the avatar URL of the local participant
    width: '100%',
    height: 450,
    parentNode: _parentNode,
    interfaceConfigOverwrite: {
        APP_NAME: _APP_NAME,
        //MOBILE_APP_PROMO:false,
        TOOLBAR_BUTTONS: _TOOLBAR_BUTTONS,
        DEFAULT_REMOTE_DISPLAY_NAME: _DEFAULT_REMOTE_DISPLAY_NAME,
        DEFAULT_LOCAL_DISPLAY_NAME: 'moi',
        DEFAULT_BACKGROUND: ['#C2B499'],
        SHOW_JITSI_WATERMARK: false,
        //JITSI_WATERMARK_LINK: 'https://jitsi.org',

        // if watermark is disabled by default, it can be shown only for guests
        SHOW_WATERMARK_FOR_GUESTS: false,
        SHOW_BRAND_WATERMARK: false,
        //BRAND_WATERMARK_LINK: 'http://vps433266.ovh.net/',
        LANG_DETECTION: true,
        filmStripOnly: _filmStripOnly,

        MOBILE_APP_PROMO: true, // to remove links to app
        //http://org.jitsi.meet//meet.jit.si/

        /**
         * Specify custom URL for downloading android mobile app.
         */
        MOBILE_DOWNLOAD_LINK_ANDROID: 'https://play.google.com/store/apps/details?id=org.jitsi.meet',

        /**
         * Specify URL for downloading ios mobile app.
         */
        MOBILE_DOWNLOAD_LINK_IOS: 'https://itunes.apple.com/us/app/jitsi-meet/id1165103905',

        APP_SCHEME: 'cercle-confiance.fr'
    },
    configOverwrite: {
        enableRtpStats: false, // Enables RTP stats processing
        disableStats: true,
        enableWelcomePage: false,
        disableSimulcast: false,
        logStats: false,

        //startAudioOnly: true,
        // Every participant after the Nth will start audio muted.
        // startAudioMuted: 10,

        // Start calls with audio muted. Unlike the option above, this one is only
        // applied locally. FIXME: having these 2 options is confusing.
        startWithAudioMuted: false,

        // Every participant after the Nth will start video muted.
        // startVideoMuted: 10,

        // Start calls with video muted. Unlike the option above, this one is only
        // applied locally. FIXME: having these 2 options is confusing.
        startWithVideoMuted: false,

        // Enabling the close page will ignore the welcome page redirection when
        // a call is hangup.
        enableClosePage: false,

        // Default language for the user interface.
        defaultLanguage: 'fr',

        // Message to show the users. Example: 'The service will be down for
        // maintenance at 01:00 AM GMT,
        noticeMessage: 'Bienvenue !',

        // The Google Analytics Tracking ID
        // googleAnalyticsTrackingId = 'your-tracking-id-here-UA-123456-1',
    },
    onload: function (event) {
        interfaceVisioLoad(event);
    }
};
//////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////
/*
var visioName = function (event) {
    var member_id = '';
    var visioSchedule = document.getElementById('visioSchedule');
    if($(event.target).is(':checked')) {
        event.target.parentNode.querySelector('a').classList.add("bg-info");

        if(document.getElementById("membersList")) {
            document.getElementById("membersList").remove();
        }

        var membersList = document.createElement('div');
        membersList.setAttribute('id', "membersList");

        document.querySelectorAll('#circleMembers input[type="checkbox"]:checked').forEach(function (element, index) {
            member_id = element.getAttribute('data-member_id');
            var div = document.createElement('span');
            div.setAttribute('data-member_id', member_id);
            div.innerHTML = element.getAttribute('value');
            div.classList.add("label");
            var label = index === 0 ? 'label-primary' : 'label-info';
            div.classList.add(label);
            membersList.appendChild(div);
        });

        visioSchedule.appendChild(membersList);
    } else {
        member_id = event.target.getAttribute('data-member_id');
        event.target.parentNode.querySelector('a').classList.remove("bg-info");

        if(visioSchedule.querySelector('[data-member_id="' + member_id + '"]')) {
            visioSchedule.querySelector('[data-member_id="' + member_id + '"]').remove();
        }
    }

    var roomName = document.getElementById('videoButtonJoin').getAttribute('data-roomname');

    document.querySelectorAll('#circleMembers input[type="checkbox"]:checked').forEach(function (element) {
        member_id = element.getAttribute('data-member_id');
        roomName += '_' + member_id;
        document.getElementById('videoButtonSchedule').setAttribute('data-roomname', roomName);
    });

    var parent = getClosest(videoButtonJoin,'#visioBtns');

    if ($(circleMembers).find('input[type="checkbox"]:checked').not('[disabled="disabled"]').length > 0) {
        parent.classList.remove("all");
        parent.classList.add("schedule");
        videoButtonSchedule.classList.remove("disabled");
        videoButtonJoin.classList.add("disabled");
    } else {
        parent.classList.remove("schedule");
        parent.classList.add("all");
        videoButtonSchedule.classList.add("disabled");
        videoButtonJoin.classList.remove("disabled");
        if(document.getElementById("membersList")) {
            document.getElementById("membersList").remove();
        }
    }

    var btnCreate = document.getElementById("videoButtonSchedule");

    btnCreate.roomName = btnCreate.getAttribute('data-roomName');
    options.roomName = btnCreate.roomName;
    btnCreate.addEventListener("click", visioLaunch, false);
};

var elementsCheckbox = document.querySelectorAll('#circleMembers input[type="checkbox"]');
for (var i = 0; i < elementsCheckbox.length; i++) {
    elementsCheckbox[i].addEventListener("click", visioName, false);
}

var elementsAvatarsLink = document.querySelectorAll('#circleMembers input[type="checkbox"]+label+a');
for (var i = 0; i < elementsAvatarsLink.length; i++) {
    elementsAvatarsLink[i].addEventListener("click", function (event){
        var parent = getClosest(event.target,'li');
        parent.querySelector('input[type="checkbox"]').click();
    }, false);
}
*/
var visioLaunch = function (event) {
    AdapterJS.webRTCReady(function (isUsingPlugin) {
        console.info("== The WebRTC API is ready ==");

        // The WebRTC API is ready.
        //isUsingPlugin: true is the WebRTC plugin is being used, false otherwise
        /*getUserMedia(constraints, successCb, failCb);*/

        /* btnReload */
        if (document.getElementById('btnReload')) {
            document.getElementById('btnReload').remove();
        }

        var li=document.createElement("li");
        var btnReload=document.createElement("button");

        btnReload.setAttribute('id','btnReload');
        btnReload.setAttribute('class','btn btn-default on');
        btnReload.setAttribute('title','Recharger');
        btnReload.innerHTML = '<span class="fa-stack fa-lg"><i class="fa fa-refresh fa-stack-1x"></i></span>';
        li.appendChild(btnReload);
        toolsVisio.querySelector('ul').appendChild(li);

        btnReload.addEventListener("click", (event) => {
            var button = document.querySelectorAll('.videoButtonJoin:not(.disabled)');
            apiJitsi.executeCommand('hangup');

            apiJitsi.dispose();

            $(button).trigger('click');
        }, false);

        if (event.target.roomName) {
            options.roomName = event.target.roomName;
        }

        if(!options.roomName) {
            $(btnReload).trigger('click');
        }

        if ( options.roomName && !visioContainer.style.display || visioContainer.style.display === "none" ) {
            apiJitsi = new JitsiMeetExternalAPI(domain, options);
            console.info('apiJitsi._participants', apiJitsi._participants);
        } else {
            console.info("== else hangup ==");
            apiJitsi.executeCommand('hangup');
        }
    });
};

videoButtonClose.addEventListener("click", () => {
    console.info("== videoButtonClose event click ==");
    apiJitsi.executeCommand('hangup');
}, false);

var elements = document.querySelectorAll(".videoButtonJoin");
for (var i = 0; i < elements.length; i++) {
    elements[i].roomName = elements[i].getAttribute('data-roomName');
    elements[i].addEventListener("click", visioLaunch, false);
}
$(document).ready(function() {
    if(window.location.hash && window.location.hash.replace('#','') === 'autoconnect') {
        videoButtonJoin.click();
    }
});
