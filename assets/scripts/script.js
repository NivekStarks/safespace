document.addEventListener('DOMContentLoaded', function() {
    const setupRequestBtn = document.getElementById('setupRequestBtn');
    const registrationBtn = document.getElementById('registrationBtn');
    const setupRequestForm = document.getElementById('setupRequestForm');
    const registrationForm = document.getElementById('registrationForm');

    setupRequestBtn.addEventListener('click', function() {
        setupRequestForm.classList.remove('hidden');
        registrationForm.classList.add('hidden');
        setupRequestBtn.classList.add('bg-blue-500', 'text-white');
        setupRequestBtn.classList.remove('bg-gray-200');
        registrationBtn.classList.add('bg-gray-200');
        registrationBtn.classList.remove('bg-blue-500', 'text-white');
    });

    registrationBtn.addEventListener('click', function() {
        setupRequestForm.classList.add('hidden');
        registrationForm.classList.remove('hidden');
        registrationBtn.classList.add('bg-blue-500', 'text-white');
        registrationBtn.classList.remove('bg-gray-200');
        setupRequestBtn.classList.add('bg-gray-200');
        setupRequestBtn.classList.remove('bg-blue-500', 'text-white');
    });
});