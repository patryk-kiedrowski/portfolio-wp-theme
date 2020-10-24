export class AdjustAdminBar {
  constructor () {
    this.init();
    this.events();
  }

  init(): void {
    this.prepareCustomVHUnit();
    setTimeout(() => this.moveAdminBarIfVisible(), 500);
  }

  events(): void {
    window.onresize = () => this.prepareCustomVHUnit();
  }

  moveAdminBarIfVisible(): void {
    const adminBar: HTMLElement = document.getElementById('wpadminbar');
    const nav: HTMLElement = document.querySelector('.nav-wrapper');

    if (adminBar) {

      if (nav) {
        const windowWidth = window.innerWidth;
        const offset = windowWidth >= 1200 ? 32 : 46;

        nav.style.marginTop = `${offset}px`;
        this.prepareCustomVHUnit(offset);
      }
    }
  }

  prepareCustomVHUnit(offset: number = 0): void {
    const vh = (window.innerHeight - offset) * 0.01;
    document.documentElement.style.setProperty('--vh', `${vh}px`);
  }
}