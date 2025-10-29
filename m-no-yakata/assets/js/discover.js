document.addEventListener('DOMContentLoaded', () => {
  const reviewBtn = document.querySelector('.mno-btn-review');
  const sheet = document.getElementById('reviewSheet');
  const overlay = sheet.querySelector('.mno-sheet-overlay');
  const closeBtn = sheet.querySelector('.mno-sheet-close');

  if (reviewBtn && sheet) {
    reviewBtn.addEventListener('click', () => sheet.classList.add('active'));
    overlay.addEventListener('click', () => sheet.classList.remove('active'));
    closeBtn.addEventListener('click', () => sheet.classList.remove('active'));
  }
});