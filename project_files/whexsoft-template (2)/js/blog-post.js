// Reading Progress Indicator
    window.addEventListener('scroll', () => {
      const winScroll = document.documentElement.scrollTop || document.body.scrollTop;
      const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
      const scrolled = (winScroll / height) * 100;
      const progressElem = document.getElementById('readProgress');
      if (progressElem) {
        progressElem.style.width = scrolled + '%';
      }
    });

    // Copy Link Micro-Interaction
    function copyArticleUrl() {
      const url = window.location.href;
      navigator.clipboard.writeText(url).then(() => {
        const copyText = document.getElementById('copyText');
        const original = copyText.innerText;
        copyText.innerText = 'কপি হয়েছে!';
        setTimeout(() => {
          copyText.innerText = original;
        }, 2000);
      }).catch(() => {
        alert('লিঙ্কটি কপি করা সম্ভব হয়নি।');
      });
    }

    // Facebook Share Helper
    function shareOnFB() {
      const url = encodeURIComponent(window.location.href);
      window.open('https://www.facebook.com/sharer/sharer.php?u=' + url, '_blank', 'width=600,height=400');
    }

    // Smooth scroll for TOC links
    document.querySelectorAll('.toc-link').forEach(anchor => {
      anchor.addEventListener('click', function(e) {
        e.preventDefault();
        const targetId = this.getAttribute('href');
        const targetElem = document.querySelector(targetId);
        if (targetElem) {
          targetElem.scrollIntoView({
            behavior: 'smooth'
          });
        }
      });
    });
