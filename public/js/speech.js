const grid = document.getElementById('grid');

grid.addEventListener('click', (e) => {
    const speakBtn = e.target.closest('.speak');
    if (!speakBtn) return;
    const card = e.target.closest('.card');
    const text = card?.dataset.word || '';
    if (!('speechSynthesis' in window)) {
        alert('Озвучка не поддерживается в этом браузере.');
        return;
    }
    const u = new SpeechSynthesisUtterance(text);
    u.lang = 'en-US';
    window.speechSynthesis.cancel();
    window.speechSynthesis.speak(u);
});


document.getElementById("speakBtn").addEventListener("click", () => {
      if(!("speechSynthesis" in window)) {
        alert("Озвучка бұл браузерде қолдау таппайды.");
        return;
      }
      const u = new SpeechSynthesisUtterance(word.en);
      u.lang = "en-US";
      window.speechSynthesis.cancel();
      window.speechSynthesis.speak(u);
    });