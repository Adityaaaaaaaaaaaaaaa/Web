document.addEventListener('DOMContentLoaded', function () {
    const darkModeToggle = document.getElementsByClassName('darkModeToggle')[0];
    const root = document.documentElement;
    const darkModeClass = 'light-mode';
    const isDarkMode = localStorage.getItem('darkMode') === 'true';

    // Set initial dark mode state
    if (isDarkMode) {
        root.classList.add(darkModeClass);
    }

    // initial color of the darkModeToggle button
    const initialColor = '#32CD32';
    darkModeToggle.style.color = initialColor;

    // Toggle dark mode on button click
    darkModeToggle.addEventListener('click', () => {
        const isCurrentlyDarkMode = root.classList.contains(darkModeClass);
        root.classList.toggle(darkModeClass, !isCurrentlyDarkMode);
        localStorage.setItem('darkMode', !isCurrentlyDarkMode);

        // Change text color on click
        const textColor = isCurrentlyDarkMode ? initialColor : initialColor;
        darkModeToggle.style.color = textColor;
    });
});
