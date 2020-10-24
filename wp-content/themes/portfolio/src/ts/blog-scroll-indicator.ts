export class BlogScrollIndicator {

  constructor() {
    this.startScrollIndicator();
  }

  private startScrollIndicator(): void {
    window.onscroll = () => {
      this.updateScrollIndicator();
    }
  }

  private updateScrollIndicator(): void {
    const content = document.querySelector('#content') as HTMLDivElement;
    const scrollIndicator = document.querySelector('#scroll-indicator') as HTMLDivElement;

    if (!content || !scrollIndicator) {
      return;
    }

    const contentHeight = content.offsetHeight + content.offsetTop - window.innerHeight / 2;
    const contentScrollProgress = window.scrollY / contentHeight;

    scrollIndicator.style.transform = `scaleX(${contentScrollProgress})`;
  }

}