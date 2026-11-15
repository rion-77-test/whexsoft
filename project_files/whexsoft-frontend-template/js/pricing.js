(function initPricingAccordion() {
      const toggles = document.querySelectorAll('.faq-toggle');
      toggles.forEach(toggle => {
        toggle.addEventListener('click', function() {
          const content = this.nextElementSibling;
          const icon = this.querySelector('.material-symbols-outlined');
          const isClosed = content.classList.contains('hidden');

          document.querySelectorAll('.faq-content').forEach(c => c.classList.add('hidden'));
          document.querySelectorAll('.faq-toggle .material-symbols-outlined').forEach(i => {
            i.textContent = 'expand_more';
            i.classList.remove('text-[#c5f331]');
            i.classList.add('text-slate-400');
          });

          if (isClosed) {
            content.classList.remove('hidden');
            icon.textContent = 'expand_less';
            icon.classList.remove('text-slate-400');
            icon.classList.add('text-[#c5f331]');
          }
        });
      });
    })();
