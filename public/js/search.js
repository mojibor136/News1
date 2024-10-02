document.addEventListener('DOMContentLoaded', function () {
    let searchBtns = document.querySelectorAll('#searchBtn'); // All search buttons
    let searchBox = document.querySelector('#searchBox');

    // Add click event to each search button
    searchBtns.forEach(function (btn) {
        btn.addEventListener('click', function (e) {
            e.stopPropagation(); // Prevent event from reaching the document
            searchBox.style.top = "0"; // Show the search box
        });
    });

    // Click event for hiding the search box when clicking outside
    document.addEventListener('click', function (e) {
        if (!searchBox.contains(e.target)) {
            searchBox.style.top = "-100px"; // Move the search box off-screen
        }
    });
});