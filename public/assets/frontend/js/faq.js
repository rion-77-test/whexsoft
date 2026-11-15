(function initFaqPage() {
    // Accordion Expand/Collapse Functionality
    const faqCards = document.querySelectorAll('.faq-card');
    
    faqCards.forEach(card => {
      const toggle = card.querySelector('.faq-toggle');
      const answer = card.querySelector('.faq-answer');
      const arrow = card.querySelector('.icon-arrow');

      toggle.addEventListener('click', () => {
        const isExpanded = !answer.classList.contains('hidden');

        // Close other accordions in the same group for cleanliness
        const parentGroup = card.closest('.faq-group');
        if (parentGroup) {
          parentGroup.querySelectorAll('.faq-card').forEach(otherCard => {
            if (otherCard !== card) {
              const otherAns = otherCard.querySelector('.faq-answer');
              const otherArr = otherCard.querySelector('.icon-arrow');
              otherAns.classList.add('hidden');
              otherArr.classList.remove('rotate-180', 'text-primary-container');
              otherCard.classList.remove('bg-surface-card-elevated');
            }
          });
        }

        if (isExpanded) {
          answer.classList.add('hidden');
          arrow.classList.remove('rotate-180', 'text-primary-container');
          card.classList.remove('bg-surface-card-elevated');
        } else {
          answer.classList.remove('hidden');
          arrow.classList.add('rotate-180', 'text-primary-container');
          card.classList.add('bg-surface-card-elevated');
        }
      });
    });

    // Category Filter Chips
    const filterButtons = document.querySelectorAll('.faq-filter-btn');
    const faqGroups = document.querySelectorAll('.faq-group');
    const searchInput = document.getElementById('faqSearchInput');
    const clearSearchBtn = document.getElementById('clearSearchBtn');
    const noResults = document.getElementById('noFaqResults');
    const resetFilterAction = document.getElementById('resetFilterAction');

    function applyCategory(category) {
      filterButtons.forEach(btn => {
        if (btn.dataset.category === category) {
          btn.className = 'faq-filter-btn px-5 py-2.5 rounded-full font-label-lg text-label-lg transition-all duration-200 bg-primary-container text-text-inverse font-bold shadow-[0_0_18px_rgba(198,244,50,0.3)]';
        } else {
          btn.className = 'faq-filter-btn px-5 py-2.5 rounded-full font-label-lg text-label-lg transition-all duration-200 bg-surface-card text-text-secondary hover:text-text-primary hover:bg-surface-card-elevated';
        }
      });

      faqGroups.forEach(group => {
        if (category === 'all' || group.dataset.group === category) {
          group.classList.remove('hidden');
        } else {
          group.classList.add('hidden');
        }
      });
      checkEmptyState();
    }

    filterButtons.forEach(btn => {
      btn.addEventListener('click', () => {
        if (searchInput.value.trim() !== '') {
          searchInput.value = '';
          clearSearchBtn.classList.add('hidden');
          faqCards.forEach(c => c.classList.remove('hidden'));
        }
        applyCategory(btn.dataset.category);
      });
    });

    // Search Filtering
    function filterFaqs() {
      const query = searchInput.value.toLowerCase().trim();
      
      if (query.length > 0) {
        clearSearchBtn.classList.remove('hidden');
      } else {
        clearSearchBtn.classList.add('hidden');
      }

      faqGroups.forEach(group => group.classList.remove('hidden'));

      let visibleCount = 0;
      faqCards.forEach(card => {
        const text = card.textContent.toLowerCase();
        const keywords = card.dataset.keywords ? card.dataset.keywords.toLowerCase() : '';
        if (text.includes(query) || keywords.includes(query)) {
          card.classList.remove('hidden');
          visibleCount++;
        } else {
          card.classList.add('hidden');
        }
      });

      // Hide group header if all cards inside it are hidden
      faqGroups.forEach(group => {
        const cardsInGroup = group.querySelectorAll('.faq-card:not(.hidden)');
        if (cardsInGroup.length === 0) {
          group.classList.add('hidden');
        } else {
          group.classList.remove('hidden');
        }
      });

      checkEmptyState();
    }

    function checkEmptyState() {
      const visibleGroups = document.querySelectorAll('.faq-group:not(.hidden)');
      if (visibleGroups.length === 0) {
        noResults.classList.remove('hidden');
      } else {
        noResults.classList.add('hidden');
      }
    }

    searchInput.addEventListener('input', filterFaqs);

    clearSearchBtn.addEventListener('click', () => {
      searchInput.value = '';
      clearSearchBtn.classList.add('hidden');
      filterFaqs();
      applyCategory('all');
    });

    resetFilterAction.addEventListener('click', () => {
      searchInput.value = '';
      clearSearchBtn.classList.add('hidden');
      faqCards.forEach(c => c.classList.remove('hidden'));
      applyCategory('all');
    });

  })();
