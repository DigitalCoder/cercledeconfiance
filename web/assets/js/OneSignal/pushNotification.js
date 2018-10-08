OneSignal.push(function() {
    OneSignal.isPushNotificationsEnabled().then(function(isEnabled) {
        if (isEnabled) {
            console.log("Push notifications are enabled!");
            if (typeof additionalDataHash === 'undefined' && typeof notificationType !== 'undefined') {
                additionalDataHash = {
                    notificationType: notificationType
                };
            } else if (typeof additionalDataHash === 'undefined') {
                console.log("typeof options === 'undefined'");
                additionalDataHash = {};
            }

            OneSignal.sendSelfNotification(/* Title (defaults if unset) */
                website_name,
                /* Message (defaults if unset) */
                msg,
                website_url,
                website_icon,
                additionalDataHash,
                buttons
            );
        } else {
            console.log("Push notifications are not enabled yet.");
            OneSignal.registerForPushNotifications();
        }
    });
});