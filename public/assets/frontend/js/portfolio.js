(function() {
      const filterButtons = document.querySelectorAll('#portfolio-filter-container .filter-btn');
      const projectCards = document.querySelectorAll('#projects-grid .project-card');

      filterButtons.forEach(button => {
        button.addEventListener('click', () => {
          const filterValue = button.getAttribute('data-filter');

          // Reset buttons
          filterButtons.forEach(btn => {
            btn.classList.remove('active-tab', 'bg-primary-fixed', 'text-[#070A0E]', 'border-primary-fixed');
            btn.classList.add('bg-[#11171f]', 'text-slate-300', 'border-white/10');
          });

          // Activate clicked button
          button.classList.add('active-tab', 'bg-primary-fixed', 'text-[#070A0E]', 'border-primary-fixed');
          button.classList.remove('bg-[#11171f]', 'text-slate-300', 'border-white/10');

          // Filter card visibility
          projectCards.forEach(card => {
            const cardCategory = card.getAttribute('data-category');
            if (filterValue === 'all' || cardCategory === filterValue) {
              card.style.display = 'flex';
              card.style.opacity = '1';
            } else {
              card.style.display = 'none';
              card.style.opacity = '0';
            }
          });
        });
      });
    })();
