import './bootstrap';


const darkModeRadio = document.getElementById('darkmode');

    darkModeRadio.addEventListener('change', function() {
        if (darkModeRadio.checked) {
            document.documentElement.classList.add('dark-mode');
        } else {
            document.documentElement.classList.remove('dark-mode');
        }
    });