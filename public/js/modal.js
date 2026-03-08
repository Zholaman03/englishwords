const fab = document.getElementById("fab");
const chat = document.getElementById("chatBox");
const closeChat = document.getElementById("closeChat");

const input = document.getElementById("chatInput");
const sendBtn = document.getElementById("sendBtn");
const messages = document.getElementById("chatMessages");

const typingIndicator = document.getElementById("typing");
// toggle
fab.onclick = () => chat.classList.toggle("open");
closeChat.onclick = () => chat.classList.remove("open");

// send message
sendBtn.onclick = async () => {
  const text = input.value.trim();
  if (!text) return;
  addMessage(text, "user");
  input.value = "";
  sendBtn.disabled = true;
  typingIndicator.innerText = "AI жауап жазып жатыр... ⏳";
  try{
  const response = await fetch("/api/chat-ai", {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify({ message: text }),
  });
 

  const data = await response.json();

  typingIndicator.innerText = "";
   console.log(data);
  addMessage(data.answer, "ai");
  sendBtn.disabled = false;
  } catch(error){
    console.error("Error:", error);
    typingIndicator.innerText = "Қате орын алды. Қайтадан көріңіз.";
    sendBtn.disabled = false;
    return;
  }
  
  
};

function addMessage(text, type, loading = false) {
  
  const div = document.createElement("div");
  div.className = type;
  
  if (loading) {
    div.innerText = "⏳ " + text;
  }
  div.innerText = text;
  messages.appendChild(div);
  messages.scrollTop = messages.scrollHeight;
}
