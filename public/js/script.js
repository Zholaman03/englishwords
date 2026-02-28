
const gptQuestion = document.getElementById('gpt-question');

document.querySelectorAll('#main-btns button[data-type]').forEach(element => {
    element.addEventListener('click', function() {
        
        gptQuestion.value = this.textContent.trim();
    });
});
const word = document.getElementById('gpt-word');
const gptQueryBtn = document.getElementById('gpt-query-btn');
const gptAnswer = document.getElementById('gpt-answer');
gptQueryBtn.addEventListener('click', async function(event) {
    event.preventDefault();
    if (gptQuestion.value.trim() === '') {
        alert('Сұрау үшін сөзді енгізіңіз!'); // 👉 Егер сөз енгізілмесе, хабарлама көрсетеміз
        return;
    }
    gptQueryBtn.disabled = true; // 👉 Пайдаланушының қайта сұрау жіберуін болдырмау үшін батырманы өшіреміз
    gptAnswer.textContent = 'Loading...'; // 👉 Жауапты жүктеп жатқанда көрсетілетін хабарлама
    const result = await fetch('/api/ask-gpt', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        },
        body: JSON.stringify({
            word: word.value.trim(),
            question: gptQuestion.value.trim()
        })
    });
     const data = await result.json(); // 👉 Жауапты JSON-ға айналдырамыз
    
    
    gptAnswer.textContent = data.answer;
    gptQueryBtn.disabled = false; // 👉 Пайдаланушының қайта сұрау жіберуіне мүмкіндік береміз
    
});

