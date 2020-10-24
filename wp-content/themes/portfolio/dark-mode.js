function setThemeVariable() {
  if (!localStorage) {
    return;
  }

  const theme = localStorage.getItem('theme');

  if (theme) {
    document.documentElement.setAttribute('data-theme', theme);
  }
}

setThemeVariable();
