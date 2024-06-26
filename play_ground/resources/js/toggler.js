// Query all elements with the 'light-switch' class
const lightSwitches = document.querySelectorAll('.light-switch');

// Function to toggle dark class on html
const toggleDarkMode = (isDark) => {
    if (isDark) {
        document.documentElement.classList.add('dark');
        localStorage.setItem('dark-mode', 'true');
    } else {
        document.documentElement.classList.remove('dark');
        localStorage.setItem('dark-mode', 'false');
    }
};

// Apply the theme on initial load
const currentTheme = localStorage.getItem('dark-mode');
const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
toggleDarkMode(currentTheme === 'true' || (!currentTheme && prefersDark));

// Set up the event listeners for each switch
lightSwitches.forEach((lightSwitch) => {
    // Set the initial position of the switch based on the current theme
    lightSwitch.checked = currentTheme === 'true' || (!currentTheme && prefersDark);

    // Add change event listener to toggle the theme
    lightSwitch.addEventListener('change', () => {
        toggleDarkMode(lightSwitch.checked);
    });
});

