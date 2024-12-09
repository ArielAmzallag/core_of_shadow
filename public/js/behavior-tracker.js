document.addEventListener('DOMContentLoaded', function() {
    const tracker = {
        init() {
            this.setupItemTracking();
            this.setupSearchTracking();
            this.setupPageTracking();
        },

        setupItemTracking() {
            document.querySelectorAll('.item-card').forEach(card => {
                const itemData = {
                    id: card.dataset.id,
                    type: card.dataset.type,
                    rarity: card.dataset.rarity
                };

                card.addEventListener('mouseenter', () => this.trackInteraction(itemData, 'hover'));
                card.addEventListener('click', () => this.trackInteraction(itemData, 'click'));
            });
        },

        setupSearchTracking() {
            const searchForm = document.querySelector('.search-form');
            if (searchForm) {
                searchForm.addEventListener('submit', (e) => {
                    this.trackSearch(searchForm.querySelector('input').value);
                });
            }
        },

        setupPageTracking() {
            const startTime = Date.now();
            window.addEventListener('beforeunload', () => {
                this.trackPageView(window.location.pathname, Date.now() - startTime);
            });
        },

        async trackInteraction(itemData, type) {
            await fetch('/track/interaction', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    itemId: itemData.id,
                    type: type,
                    timestamp: new Date().toISOString()
                })
            });
        },

        async trackSearch(query) {
            await fetch('/track/search', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    query: query,
                    timestamp: new Date().toISOString()
                })
            });
        },

        async trackPageView(page, duration) {
            await fetch('/track/pageview', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    page: page,
                    duration: duration,
                    timestamp: new Date().toISOString()
                })
            });
        }
    };

    tracker.init();
});

function fetchPersonalDeals() {
    fetch('/shop/personal-deals')
        .then(response => response.json())
        .then(deals => {
            const container = document.querySelector('.quantum-deals-container');
            container.innerHTML = deals.map(deal => `
                <div class="quantum-deal-card">
                    <h3>${deal.item.name}</h3>
                    <div class="price-section">
                        <span class="original-price">${deal.originalPrice} gold</span>
                        <span class="discounted-price">${deal.discountedPrice} gold</span>
                    </div>
                    <div class="deal-reason">${deal.reason}</div>
                    <button onclick="purchaseItem('${deal.type}', ${deal.item.id})">
                        Claim Your Destiny
                    </button>
                </div>
            `).join('');
        });
}