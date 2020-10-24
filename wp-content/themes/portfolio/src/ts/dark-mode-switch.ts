export class DarkModeSwitch {
  private toggleButton: HTMLButtonElement;
  
  constructor() {
    if (!localStorage) {
      return;
    }

    this.init();
  }

  private init(): void {
    this.cacheDom();
    this.events();
  }

  private cacheDom(): void {
    this.toggleButton = document.querySelector('#dark-mode-toggle');
  }

  private events(): void {
    if (!this.toggleButton) {
      return;
    }

    this.toggleButton.addEventListener('click', () => {
      this.toggleMode();
    })
  }

  public toggleMode(): void {
    const currentTheme = document.documentElement.dataset.theme;
    const newTheme = currentTheme === 'dark' ? 'light' : 'dark';

    localStorage.setItem('theme', newTheme);
    document.documentElement.setAttribute('data-theme', newTheme);
  }
}