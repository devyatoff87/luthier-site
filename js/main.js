// ========== MOBILE NAVIGATION ==========
const hamburger = document.querySelector('.hamburger')
const navMenu = document.querySelector('.nav-menu')
console.log(12124254364)
if (hamburger && navMenu) {
  hamburger.addEventListener('click', () => {
    navMenu.classList.toggle('active')
  })

  // Schließe Menü wenn ein Link geklickt wird
  document.querySelectorAll('.nav-menu a').forEach(link => {
    link.addEventListener('click', () => {
      navMenu.classList.remove('active')
    })
  })
}

// ========== GALERIE FILTER ==========
const filterBtns = document.querySelectorAll('.filter-btn')
const galleryItems = document.querySelectorAll('.gallery-item')

if (filterBtns.length > 0 && galleryItems.length > 0) {
  filterBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      // Active Button umschalten
      filterBtns.forEach(b => b.classList.remove('active'))
      btn.classList.add('active')

      const filter = btn.dataset.filter

      galleryItems.forEach(item => {
        if (filter === 'all' || item.dataset.category === filter) {
          item.style.display = 'block'
        } else {
          item.style.display = 'none'
        }
      })
    })
  })
}

// ========== SMOOTH SCROLL ==========
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
  anchor.addEventListener('click', function (e) {
    const href = this.getAttribute('href')
    if (href !== '#' && href !== '') {
      const target = document.querySelector(href)
      if (target) {
        e.preventDefault()
        target.scrollIntoView({
          behavior: 'smooth',
          block: 'start',
        })
      }
    }
  })
})

// ========== KONTAKTFORMULAR VALIDIERUNG (optional) ==========
const contactForm = document.querySelector('.contact-form form')
if (contactForm) {
  contactForm.addEventListener('submit', e => {
    const name = contactForm.querySelector('[name="name"]')
    const email = contactForm.querySelector('[name="email"]')
    const message = contactForm.querySelector('[name="message"]')

    if (name && name.value.trim() === '') {
      e.preventDefault()
      alert('Bitte gib deinen Namen ein.')
      name.focus()
      return
    }

    if (email && email.value.trim() === '') {
      e.preventDefault()
      alert('Bitte gib deine E-Mail ein.')
      email.focus()
      return
    }

    if (email && !email.value.includes('@')) {
      e.preventDefault()
      alert('Bitte gib eine gültige E-Mail Adresse ein.')
      email.focus()
      return
    }

    if (message && message.value.trim() === '') {
      e.preventDefault()
      alert('Bitte gib eine Nachricht ein.')
      message.focus()
      return
    }
  })
}

// ========== BILDER LAZY LOADING VERBESSERN ==========
if ('IntersectionObserver' in window) {
  const lazyImages = document.querySelectorAll('img[loading="lazy"]')
  const imageObserver = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        const img = entry.target
        img.src = img.src
        imageObserver.unobserve(img)
      }
    })
  })

  lazyImages.forEach(img => imageObserver.observe(img))
}
