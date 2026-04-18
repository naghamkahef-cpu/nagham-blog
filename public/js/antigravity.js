/**
 * Antigravity.js
 * Adds background drift particles and handles entrance logic.
 */

document.addEventListener('DOMContentLoaded', () => {
    const body = document.body;

    // --- 1. Background Drift Particles ---
    const particleContainer = document.createElement('div');
    particleContainer.className = 'particle-container';
    body.prepend(particleContainer);

    function createParticle() {
        const particle = document.createElement('div');
        particle.className = 'particle';
        
        const size = Math.random() * 80 + 20;
        const left = Math.random() * 100;
        const duration = Math.random() * 15 + 15; // Slow movement (15-30s)
        const opacity = Math.random() * 0.3 + 0.1;

        particle.style.width = `${size}px`;
        particle.style.height = `${size}px`;
        particle.style.left = `${left}%`;
        particle.style.opacity = opacity;
        particle.style.animationDuration = `${duration}s`;
        
        particleContainer.appendChild(particle);

        // Cleanup
        setTimeout(() => {
            particle.remove();
        }, duration * 1000);
    }

    // Spawn an initial cluster of particles
    for (let i = 0; i < 12; i++) {
        setTimeout(() => {
            createParticle();
            const p = particleContainer.lastChild;
            if (p) p.style.animationDelay = `-${Math.random() * 20}s`;
        }, i * 200);
    }

    // Periodically spawn new particles
    setInterval(createParticle, 4000);
});
