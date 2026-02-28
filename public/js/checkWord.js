const word_translation = document.getElementById('word_translation');
const total = document.getElementById('total');
const pos = document.getElementById('pos');
const feedback = document.getElementById('feedback');
const checkBtn = document.getElementById('checkBtn');
const bar = document.getElementById('bar');
const answer = document.getElementById('answer');
const restart = document.getElementById('restart');
const step_word = document.getElementById('step_word');

// const state = {
//     words: [],
//     currentWord: null,
//     progress_num: 1,
//     wrong: 0
// }
let words_kz = [];
let currentWord = null;
let progress_num = 1;
let wrong = 0;

const setFeedBack = (type, title, subtitle) => {
    feedback.classList.remove('ok', 'bad', 'mid');
    feedback.classList.add(type);
    feedback.innerHTML = `<strong>${title}</strong><div class="muted">${subtitle}</div>`;
    checkBtn.disabled = false;
}
// request to get the test words
const getTest = async () => {
    try {
        const res = await fetch('/api/test', {
            method: 'GET'
        })
        if (!res.ok) throw new Error(`Get Api test failed ${res.status}`)

        const words = await res.json();
        total.innerText = words.length;
        pos.innerText = progress_num - 1;
        word_translation.innerText = words[0].translation;
        step_word.innerText = progress_num;
        words_kz = words;
    } catch (err) {
        console.log(err);
        checkBtn.disabled = true;
        feedback('mid', 'Server Error', 'Please refresh later');
    }


}
// request to check the word
const request = async (e) => {
    e.preventDefault();
    
    if (answer.value.trim() === '') return;
    checkBtn.disabled = true;
    const res = await fetch('/api/check', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            word_kz_id: words_kz[progress_num - 1].id,
            word_en: answer.value
        })
    });
    const data = await res.json();
    checkWord(data);
}

// function to check the word and give feedback
const checkWord = (data) => {
    if (data.status) {
        setFeedBack('ok', 'Дұрыс!!!', 'Жарайсың, келесі сөзге көшейік!!');
        bar.style.width = (progress_num / words_kz.length * 100) + '%';
        progress_num++;
        nextWord();


    } else {
        setFeedBack('bad', 'Қате!!!', 'Тағы да байқап көр!!');
        wrong++;
        document.getElementById('wrong').innerText = wrong;
    }
}

// function to load the next word
const nextWord = () => {
    pos.innerText = progress_num - 1;
    if (progress_num > words_kz.length) {
        checkBtn.disabled = true;
        return;
    }
    
    answer.value = '';
    word_translation.innerText = words_kz[progress_num - 1].translation;
    
}

// event listeners
checkBtn.addEventListener('click', request);
restart.addEventListener('click', () => { window.location.reload() });


getTest();