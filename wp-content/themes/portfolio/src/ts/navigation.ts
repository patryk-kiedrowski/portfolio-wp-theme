export class Navigation {
  private stickyNav: HTMLElement;
  private bottomNav: HTMLElement;
  private previousScrollDepth: number = 0;
  
  constructor () {
    this.init();
  }

  init(): void {
    this.cacheDom();
    this.events();
  }

  cacheDom(): void {
    this.stickyNav = document.querySelector('.nav-wrapper');
    this.bottomNav = document.querySelector('.bottom-nav-wrapper');
  }

  events(): void {
    document.addEventListener('scroll', (e) => this.handleScroll(e));
  }

  handleScroll(e: Event): void {
    const scrollDepth = window.scrollY;
    const isScrollingUp = this.previousScrollDepth - scrollDepth > 0;
    const isNavVisible = scrollDepth > 0;
    
    if (isNavVisible) {
      this.stickyNav.classList.add('sticky');
      this.bottomNav.classList.add('sticky');
    } else {
      this.stickyNav.classList.remove('sticky');
      this.bottomNav.classList.remove('sticky');
    }

    if (isScrollingUp) {
      this.stickyNav.classList.add('visible');
      this.bottomNav.classList.add('visible');
    } else {
      this.stickyNav.classList.remove('visible');
      this.bottomNav.classList.remove('visible');
    }

    this.previousScrollDepth = window.scrollY;
  }
}