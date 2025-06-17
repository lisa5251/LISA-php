document.getElementById('searchBar').addEventListener('input', function() {
    let query = this.value.toLowerCase();
    localStorage.setItem('searchQuery', query); // Store search term
    let items = document.querySelectorAll('#carInventory .col-md-4');
    
    items.forEach(item => {
        let name = item.getAttribute('data-name').toLowerCase();
        item.style.display = name.includes(query) ? 'block' : 'none';
    });
});

window.onload = function() {
    let storedQuery = localStorage.getItem('searchQuery');
    if (storedQuery) {
        document.getElementById('searchBar').value = storedQuery;
        document.getElementById('searchBar').dispatchEvent(new Event('input')); // Trigger search
    }
};
