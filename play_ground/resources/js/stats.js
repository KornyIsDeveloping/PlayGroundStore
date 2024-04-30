Echo.channel('stats')
    .listen('StatsUpdated', (event) => {
        console.log('Received stats:', event.stats);
        document.getElementById('totalUsers').textContent = event.stats.totalUsers.toLocaleString() + ' M';
        document.getElementById('totalProducts').textContent = event.stats.totalProducts.toLocaleString() + ' K';
        document.getElementById('recentProducts').textContent = event.stats.recentProducts.toLocaleString() + ' K';
        document.getElementById('totalComments').textContent = event.stats.totalComments.toLocaleString() + ' K';
    });
