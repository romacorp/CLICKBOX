const RatingSystem = {
    init() {
        this.form = document.getElementById('ratingForm');
        this.setupEventListeners();
    },

    setupEventListeners() {
        if (this.form) {
            this.form.addEventListener('submit', this.handleSubmit.bind(this));
            this.setupStarRating();
        }
    },

    setupStarRating() {
        const stars = document.querySelectorAll('.stars input[type="radio"]');
        stars.forEach(star => {
            star.addEventListener('change', (e) => {
                this.updateStarDisplay(e.target.value);
            });
        });
    },

    updateStarDisplay(rating) {
        const stars = document.querySelectorAll('.stars label');
        stars.forEach((star, index) => {
            star.style.color = index < rating ? '#ffb700' : '#ffd700';
        });
    },

    async handleSubmit(e) {
        e.preventDefault();
        
        try {
            const formData = new FormData(this.form);
            const response = await fetch('/customers/rate', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            });
            
            const result = await response.json();
            
            if (result.success) {
                this.showMessage('Calificación guardada exitosamente', 'success');
                setTimeout(() => location.reload(), 1500);
            } else {
                this.showMessage(result.error || 'Error al guardar la calificación', 'error');
            }
        } catch (error) {
            console.error('Error:', error);
            this.showMessage('Error al procesar la solicitud', 'error');
        }
    },

    showMessage(message, type) {
        const alertDiv = document.createElement('div');
        alertDiv.className = `alert alert-${type === 'success' ? 'success' : 'danger'} mt-3`;
        alertDiv.textContent = message;
        
        this.form.insertAdjacentElement('beforebegin', alertDiv);
        
        setTimeout(() => alertDiv.remove(), 3000);
    }
};

document.addEventListener('DOMContentLoaded', () => RatingSystem.init());