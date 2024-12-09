document.addEventListener('DOMContentLoaded', function() {
    const inventoryGrid = document.querySelector('.shop-inventory');
    const filterButtons = document.querySelectorAll('.filter-button');

    // Item card hover effects
    inventoryGrid.addEventListener('mouseover', (e) => {
        const card = e.target.closest('.item-card');
        if (card) {
            const powerLevel = card.dataset.power;
            card.style.setProperty('--power-glow', `0 0 ${powerLevel * 0.5}px ${card.classList.contains('blessing-card') ? '#4a90e2' : '#8b0000'}`);
        }
    });

    // Purchase button click handler
    document.addEventListener('click', (e) => {
        if (e.target.classList.contains('purchase-button')) {
            const itemId = e.target.closest('.item-card').dataset.id;
            initiatePurchase(itemId);
        }
    });

    // Rarity filter animation
    filterButtons.forEach(button => {
        button.addEventListener('click', () => {
            button.classList.add('filter-active');
            const rarity = button.dataset.rarity;
            filterItemsByRarity(rarity);
        });
    });

    // Price range slider
    const priceSlider = document.querySelector('#price-range');
    if (priceSlider) {
        priceSlider.addEventListener('input', (e) => {
            const maxPrice = e.target.value;
            filterItemsByPrice(maxPrice);
        });
    }
});
