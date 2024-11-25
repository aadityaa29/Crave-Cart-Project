// Wait for the window to load completely
window.addEventListener('load', function () {
    // Simulate loading time with a delay
    setTimeout(() => {
        // Hide the loading screen
        const loadingScreen = document.getElementById('loading-screen');
        loadingScreen.style.display = 'none';

        // Show the main content
        const mainContent = document.getElementById('main-content');
        mainContent.style.display = 'block';
    }, 2000); // Adjust delay time as needed
});
