self.addEventListener('push', function(event) {
    const data = event.data.json();
    console.log('Received a push notification:', data);
    const title = data.title || 'Default Title';
    const options = {
        body: data.body || 'Default Body',
        icon: data.icon || '/path/to/icon.png',
        badge: data.badge || '/path/to/badge.png',
        data: {
            url: data.url || '/',
        }
    };

    event.waitUntil(
        self.registration.showNotification(title, options)
    );
});

self.addEventListener('notificationclick', function(event) {
    event.notification.close();
    event.waitUntil(
        clients.openWindow(event.notification.data.url)
    );
});
