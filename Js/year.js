document.addEventListener("DOMContentLoaded", function() {
    // Function to update the year in the footer
    function updateYear() {
        var currentYear = new Date().getFullYear();
        document.getElementById('year').textContent = currentYear;
    }

    // Call the function to update the year when the page is loaded
    updateYear();
});
