const nachosText = document.getElementById('dynamic-nachos');
const phrases = ["Nachos are", "Tacos are", "Burgers are", "Pizza is"];
let currentPhraseIndex = 0;

function changeNachosText() {
  nachosText.innerText = phrases[currentPhraseIndex];
  currentPhraseIndex = (currentPhraseIndex + 1) % phrases.length;
}

setInterval(changeNachosText, 3000);  // Changes every 3 seconds
