export class HeroBackground {
  private readonly SIZE = 46;
  private wrapper: HTMLElement;
  private container: HTMLElement;
  private verticalNumber: number;
  private horizontalNumber: number;

  constructor() {
    this.prepareVariables();

    this.generateCells();
  }

  prepareVariables(): void {
    this.wrapper = document.querySelector('#pattern-wrapper');
    this.container = document.querySelector('.pattern-container');

    if (!this.wrapper || !this.container) {
      return;
    }

    this.verticalNumber = Math.floor(this.wrapper.clientHeight / this.SIZE);
    this.horizontalNumber = Math.floor(this.wrapper.clientWidth / this.SIZE);
  }

  generateCells(): void {
    if (!this.wrapper || !this.container) {
      return;
    }

    const numberOfCells = this.horizontalNumber * this.verticalNumber;
    
    for (let i = 0; i < numberOfCells; i++) {
      const cell = document.createElement('div');
      const opacity = this.getOpacity(i % this.horizontalNumber);
      cell.setAttribute('class', 'cell');
      cell.style.width = `${this.SIZE}px`;
      cell.style.height = `${this.SIZE}px`;

      if (opacity > 0) {
        cell.setAttribute('class', `cell glow glow--${Math.floor(Math.random() * 3)}`);
      }
      
      cell.style.backgroundColor = `rgba(40, 133, 254, ${opacity})`;
      
      this.container.appendChild(cell);
    }
    
    this.wrapper.appendChild(
      this.container.cloneNode(true)
    );
  }

  getOpacity(currentWidth: number): number {
    const threshold = this.horizontalNumber / 255;
    const colorPalleteIndex = Math.floor((currentWidth - 15) / threshold / 2);
    
    return Math.floor(colorPalleteIndex + Math.round(Math.random() * 150 - Math.random() * 150)) / 255;
  }
}


