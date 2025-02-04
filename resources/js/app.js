document.addEventListener('DOMContentLoaded', () => {
    const togglePasswordButton = document.querySelector('#togglePassword');
    const passwordField = document.querySelector('#password');

    const toggleConfirmPasswordButton = document.querySelector('#toggleConfirmPassword');
    const confirmPasswordField = document.querySelector('#password_confirmation');

    if (togglePasswordButton && passwordField) {
        togglePasswordButton.addEventListener('click', () => {
            const type = passwordField.type === 'password' ? 'text' : 'password';
            passwordField.type = type;
            togglePasswordButton.textContent = type === 'password' ? 'Zobraziť' : 'Skryť';
        });
    }

    if (toggleConfirmPasswordButton && confirmPasswordField) {
        toggleConfirmPasswordButton.addEventListener('click', () => {
            const type = confirmPasswordField.type === 'password' ? 'text' : 'password';
            confirmPasswordField.type = type;
            toggleConfirmPasswordButton.textContent = type === 'password' ? 'Zobraziť' : 'Skryť';
        });
    }
});


document.getElementById('search-input').addEventListener('input', function() {
    let query = this.value;

    fetch(`services/search?query=${query}`)
        .then(response => response.json())
        .then(data => {
            let resultsContainer = document.getElementById('search-results');
            resultsContainer.innerHTML = '';

            if (data.length > 0) {
                data.forEach(service => {
                    let serviceCard = `
                        <div class="card">
                            <h3 class="text-2xl font-bold">${service.name}</h3>
                            <p>${service.description}</p>
                            <p>Cena: ${service.price} €</p>
                        </div>
                    `;
                    resultsContainer.innerHTML += serviceCard;
                });
            } else {
                resultsContainer.innerHTML = '<p>Žiadne výsledky nenájdené.</p>';
            }
        })
        .catch(error => console.error('Chyba pri vyhľadávaní:', error));
});


document.addEventListener('DOMContentLoaded', () => {
    const refreshServices = () => {
        fetch('/dashboard/VaiiSem/public/services/refresh')
            .then(response => response.json())
            .then(services => {
                const container = document.getElementById('services-container');
                container.innerHTML = '';

                services.forEach(service => {
                    const serviceCard = `
                        <div class="card mt-4">
                            <h3 class="text-2xl md:text-3xl font-bold mb-2">${service.name}</h3>
                            <p class="text-lg md:text-xl text-gray-700">${service.description}</p>
                            <p class="text-lg font-bold text-indigo-600 mt-2">Cena: ${service.price} €</p>
                        </div>
                    `;
                    container.innerHTML += serviceCard; 
                });
            })
            .catch(error => console.error('Chyba pri aktualizácii služieb:', error));
    };

    refreshServices();

    setInterval(refreshServices, 10000);
});


