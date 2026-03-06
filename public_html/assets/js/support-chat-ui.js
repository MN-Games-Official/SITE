/* ==========================================================================
   Astroyds — Support Chat Widget
   A fully self-contained, accessible, floating chat widget.
   Features: FAQ / pre-built responses, message history in localStorage,
   typing indicator, keyboard accessibility, timestamps, sound notification.
   ========================================================================== */

(function () {
  "use strict";

  /* -----------------------------------------------------------------------
     Configuration
     ----------------------------------------------------------------------- */
  var CONFIG = {
    storageKey: "astroyds-chat-history",
    maxHistoryMessages: 200,
    typingDelay: 1200,       // ms the bot "types" before replying
    botName: "Astroyds Support",
    botAvatar: "A",
    userAvatar: "U",
    soundEnabled: false,     // Set true to play notification sound
    greeting:
      "Hello! 👋 Welcome to Astroyds support. How can I help you today?",

    // Pre-built FAQ responses (keyword → answer)
    faq: [
      {
        keywords: ["pricing", "cost", "price", "plan", "plans", "subscription"],
        answer:
          "We offer flexible pricing plans tailored to your needs. Visit our <a href='/pricing'>pricing page</a> for details, or let me know your requirements and I can recommend a plan.",
      },
      {
        keywords: ["contact", "email", "phone", "reach", "support"],
        answer:
          "You can reach our team at <strong>hello@astroyds.com</strong>. Our support hours are Monday–Friday, 9 AM–6 PM EST. You can also use our <a href='/contact'>contact form</a>.",
      },
      {
        keywords: ["idle", "what is idle"],
        answer:
          "IDLE is one of our sub-companies focused on automation and workflow optimisation. Learn more on the <a href='/companies/idle'>IDLE page</a>.",
      },
      {
        keywords: ["rift", "what is rift"],
        answer:
          "RIFT is our sub-company specialising in immersive technology and digital experiences. Check out the <a href='/companies/rift'>RIFT page</a> for more info.",
      },
      {
        keywords: ["bulletproof", "bullet proof", "what is bulletproof"],
        answer:
          "BulletPROOF is our security and infrastructure division. Visit the <a href='/companies/bulletproof'>BulletPROOF page</a> to learn more.",
      },
      {
        keywords: ["about", "astroyds", "who", "company", "mission"],
        answer:
          "Astroyds is building the future, so you don't have to. We're a technology organisation with three sub-companies: IDLE, RIFT, and BulletPROOF. Our mission is moving humanity forward for a better future.",
      },
      {
        keywords: ["career", "job", "jobs", "hiring", "work", "join"],
        answer:
          "We're always looking for talented people! Check our <a href='/careers'>careers page</a> for current openings.",
      },
      {
        keywords: ["blog", "article", "articles", "news"],
        answer:
          "Visit our <a href='/blog'>blog</a> for the latest articles, research updates, and company news.",
      },
      {
        keywords: ["research", "paper", "papers", "publication"],
        answer:
          "Our research papers are available on the <a href='/research'>research page</a>. We publish findings across AI, security, and digital infrastructure.",
      },
      {
        keywords: ["privacy", "data", "gdpr", "cookie", "cookies"],
        answer:
          "Your privacy is important to us. Read our <a href='/privacy'>privacy policy</a> for details on how we handle your data.",
      },
      {
        keywords: ["help", "how", "guide", "docs", "documentation"],
        answer:
          "I'd be happy to help! Could you tell me more specifically what you need assistance with? You can also visit our <a href='/docs'>documentation</a>.",
      },
      {
        keywords: ["thanks", "thank you", "thx", "ty", "cheers"],
        answer:
          "You're welcome! Is there anything else I can help you with? 😊",
      },
      {
        keywords: ["hello", "hi", "hey", "good morning", "good afternoon"],
        answer:
          "Hello! 👋 How can I assist you today?",
      },
      {
        keywords: ["bye", "goodbye", "see you", "later"],
        answer:
          "Goodbye! Feel free to come back anytime you need help. Have a great day! ✨",
      },
    ],

    // Quick reply suggestions shown initially
    quickReplies: [
      "What is Astroyds?",
      "Pricing info",
      "Contact support",
      "Tell me about IDLE",
      "Career opportunities",
    ],
  };

  /* -----------------------------------------------------------------------
     State
     ----------------------------------------------------------------------- */
  var isOpen = false;
  var isMinimised = false;
  var messages = [];
  var unreadCount = 0;
  var widgetEl = null;

  /* -----------------------------------------------------------------------
     Utilities
     ----------------------------------------------------------------------- */
  function escapeHtml(str) {
    var div = document.createElement("div");
    div.appendChild(document.createTextNode(str));
    return div.innerHTML;
  }

  function formatTime(date) {
    var h = date.getHours();
    var m = date.getMinutes();
    var ampm = h >= 12 ? "PM" : "AM";
    h = h % 12 || 12;
    return h + ":" + (m < 10 ? "0" : "") + m + " " + ampm;
  }

  function generateId() {
    return Date.now().toString(36) + Math.random().toString(36).substring(2, 7);
  }

  /* -----------------------------------------------------------------------
     Storage — persist messages in localStorage
     ----------------------------------------------------------------------- */
  function saveHistory() {
    try {
      var toSave = messages.slice(-CONFIG.maxHistoryMessages);
      localStorage.setItem(CONFIG.storageKey, JSON.stringify(toSave));
    } catch (_) {
      // Storage full or unavailable
    }
  }

  function loadHistory() {
    try {
      var data = localStorage.getItem(CONFIG.storageKey);
      if (data) {
        messages = JSON.parse(data);
        return true;
      }
    } catch (_) {}
    return false;
  }

  function clearHistory() {
    messages = [];
    try {
      localStorage.removeItem(CONFIG.storageKey);
    } catch (_) {}
  }

  /* -----------------------------------------------------------------------
     FAQ Matching
     ----------------------------------------------------------------------- */
  function findFaqAnswer(userMessage) {
    var lower = userMessage.toLowerCase().trim();

    for (var i = 0; i < CONFIG.faq.length; i++) {
      var faq = CONFIG.faq[i];
      for (var k = 0; k < faq.keywords.length; k++) {
        if (lower.indexOf(faq.keywords[k]) !== -1) {
          return faq.answer;
        }
      }
    }

    return null;
  }

  function getDefaultReply() {
    var replies = [
      "Thank you for your message! A team member will get back to you soon. In the meantime, you can try asking about our companies, pricing, or careers.",
      "I appreciate your question! For detailed enquiries, please email us at <strong>hello@astroyds.com</strong> or use our <a href='/contact'>contact form</a>.",
      "I'm not sure I understand that perfectly. Could you rephrase? Or you can ask about our companies (IDLE, RIFT, BulletPROOF), pricing, or careers.",
    ];
    return replies[Math.floor(Math.random() * replies.length)];
  }

  /* -----------------------------------------------------------------------
     Sound notification
     ----------------------------------------------------------------------- */
  var notificationSound = null;

  function playNotificationSound() {
    if (!CONFIG.soundEnabled) return;
    try {
      if (!notificationSound) {
        // Create a simple beep using Web Audio API
        var audioCtx = new (window.AudioContext || window.webkitAudioContext)();
        var oscillator = audioCtx.createOscillator();
        var gainNode = audioCtx.createGain();
        oscillator.connect(gainNode);
        gainNode.connect(audioCtx.destination);
        oscillator.frequency.value = 800;
        gainNode.gain.value = 0.1;
        oscillator.start();
        setTimeout(function () {
          oscillator.stop();
        }, 150);
      }
    } catch (_) {
      // Audio not available
    }
  }

  /* -----------------------------------------------------------------------
     DOM Building
     ----------------------------------------------------------------------- */
  function buildWidget() {
    widgetEl = document.createElement("div");
    widgetEl.className = "chat-widget";
    widgetEl.setAttribute("role", "complementary");
    widgetEl.setAttribute("aria-label", "Support chat");

    widgetEl.innerHTML = buildBubbleHTML() + buildWindowHTML();

    document.body.appendChild(widgetEl);

    // Bind events
    bindEvents();

    // Load history and render
    var hadHistory = loadHistory();
    if (hadHistory && messages.length > 0) {
      renderMessages();
    }
  }

  function buildBubbleHTML() {
    return (
      '<button class="chat-bubble" aria-expanded="false" aria-label="Open support chat">' +
      '<svg class="chat-bubble-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">' +
      '<path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>' +
      "</svg>" +
      '<span class="chat-bubble-badge" style="display:none" aria-hidden="true">0</span>' +
      "</button>"
    );
  }

  function buildWindowHTML() {
    return (
      '<div class="chat-window" aria-hidden="true">' +
      // Header
      '<div class="chat-header">' +
      '<div class="chat-header-info">' +
      '<div class="chat-header-avatar">' +
      CONFIG.botAvatar +
      "</div>" +
      "<div>" +
      '<div class="chat-header-name">' +
      escapeHtml(CONFIG.botName) +
      "</div>" +
      '<div class="chat-header-status">Online</div>' +
      "</div>" +
      "</div>" +
      '<div class="chat-header-actions">' +
      '<button class="chat-header-btn chat-minimise-btn" aria-label="Minimise chat" title="Minimise">' +
      '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"/></svg>' +
      "</button>" +
      '<button class="chat-header-btn chat-close-btn" aria-label="Close chat" title="Close">' +
      '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>' +
      "</button>" +
      "</div>" +
      "</div>" +
      // Messages
      '<div class="chat-messages" aria-live="polite" aria-relevant="additions"></div>' +
      // Quick replies
      '<div class="chat-quick-replies"></div>' +
      // Input
      '<div class="chat-input-area">' +
      '<input class="chat-input" type="text" placeholder="Type a message…" aria-label="Type a message" autocomplete="off" />' +
      '<button class="chat-send-btn" aria-label="Send message" disabled>' +
      '<svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z"/></svg>' +
      "</button>" +
      "</div>" +
      "</div>"
    );
  }

  /* -----------------------------------------------------------------------
     Event Binding
     ----------------------------------------------------------------------- */
  function bindEvents() {
    var bubble = widgetEl.querySelector(".chat-bubble");
    var chatWindow = widgetEl.querySelector(".chat-window");
    var closeBtn = widgetEl.querySelector(".chat-close-btn");
    var minimiseBtn = widgetEl.querySelector(".chat-minimise-btn");
    var input = widgetEl.querySelector(".chat-input");
    var sendBtn = widgetEl.querySelector(".chat-send-btn");

    // Toggle chat
    bubble.addEventListener("click", function () {
      if (isOpen) {
        closeChat();
      } else {
        openChat();
      }
    });

    // Close / minimise
    closeBtn.addEventListener("click", closeChat);
    minimiseBtn.addEventListener("click", closeChat);

    // Send on Enter
    input.addEventListener("keydown", function (e) {
      if (e.key === "Enter" && !e.shiftKey) {
        e.preventDefault();
        sendMessage();
      }
    });

    // Enable/disable send button
    input.addEventListener("input", function () {
      sendBtn.disabled = !input.value.trim();
    });

    // Send button click
    sendBtn.addEventListener("click", sendMessage);

    // Keyboard: Escape to close
    chatWindow.addEventListener("keydown", function (e) {
      if (e.key === "Escape") {
        closeChat();
        bubble.focus();
      }
    });

    // Quick reply clicks (delegated)
    var quickReplies = widgetEl.querySelector(".chat-quick-replies");
    quickReplies.addEventListener("click", function (e) {
      var btn = e.target.closest(".chat-quick-reply");
      if (!btn) return;
      var text = btn.textContent.trim();
      var input2 = widgetEl.querySelector(".chat-input");
      input2.value = text;
      sendMessage();
    });
  }

  /* -----------------------------------------------------------------------
     Chat State Management
     ----------------------------------------------------------------------- */
  function openChat() {
    isOpen = true;
    isMinimised = false;

    var bubble = widgetEl.querySelector(".chat-bubble");
    var chatWindow = widgetEl.querySelector(".chat-window");

    bubble.setAttribute("aria-expanded", "true");
    chatWindow.classList.add("open");
    chatWindow.setAttribute("aria-hidden", "false");

    // Reset unread
    unreadCount = 0;
    updateBadge();

    // If first open and no history, send greeting
    if (messages.length === 0) {
      addBotMessage(CONFIG.greeting);
      renderQuickReplies(CONFIG.quickReplies);
    }

    // Focus input
    setTimeout(function () {
      var input = widgetEl.querySelector(".chat-input");
      if (input) input.focus();
    }, 300);

    // Focus trap
    if (window.AstroydsUI && window.AstroydsUI.trapFocusIn) {
      window.AstroydsUI.trapFocusIn(chatWindow, function () {
        closeChat();
        bubble.focus();
      });
    }

    scrollToBottom();
  }

  function closeChat() {
    isOpen = false;

    var bubble = widgetEl.querySelector(".chat-bubble");
    var chatWindow = widgetEl.querySelector(".chat-window");

    bubble.setAttribute("aria-expanded", "false");
    chatWindow.classList.remove("open");
    chatWindow.setAttribute("aria-hidden", "true");
  }

  /* -----------------------------------------------------------------------
     Message Management
     ----------------------------------------------------------------------- */
  function addMessage(text, sender, isHtml) {
    var msg = {
      id: generateId(),
      text: text,
      sender: sender, // 'user' | 'bot'
      isHtml: !!isHtml,
      timestamp: new Date().toISOString(),
    };
    messages.push(msg);
    saveHistory();
    return msg;
  }

  function addBotMessage(text, isHtml) {
    var msg = addMessage(text, "bot", isHtml !== false);
    renderMessage(msg);

    if (!isOpen) {
      unreadCount++;
      updateBadge();
      playNotificationSound();
    }

    return msg;
  }

  function addUserMessage(text) {
    var msg = addMessage(escapeHtml(text), "user", false);
    renderMessage(msg);
    return msg;
  }

  function sendMessage() {
    var input = widgetEl.querySelector(".chat-input");
    var text = input.value.trim();
    if (!text) return;

    // Add user message
    addUserMessage(text);
    input.value = "";
    widgetEl.querySelector(".chat-send-btn").disabled = true;

    // Hide quick replies
    hideQuickReplies();

    // Show typing indicator
    showTypingIndicator();

    // Process after delay (simulate typing)
    setTimeout(function () {
      hideTypingIndicator();

      var faqAnswer = findFaqAnswer(text);
      if (faqAnswer) {
        addBotMessage(faqAnswer, true);
      } else {
        addBotMessage(getDefaultReply(), true);
      }

      scrollToBottom();
    }, CONFIG.typingDelay);

    scrollToBottom();
  }

  /* -----------------------------------------------------------------------
     Rendering
     ----------------------------------------------------------------------- */
  function renderMessages() {
    var container = widgetEl.querySelector(".chat-messages");
    container.innerHTML = "";

    messages.forEach(function (msg) {
      container.appendChild(createMessageElement(msg));
    });

    scrollToBottom();
  }

  function renderMessage(msg) {
    var container = widgetEl.querySelector(".chat-messages");
    container.appendChild(createMessageElement(msg));
    scrollToBottom();
  }

  function createMessageElement(msg) {
    var el = document.createElement("div");
    el.className = "chat-message" + (msg.sender === "user" ? " chat-message-sent" : "");
    el.setAttribute("data-msg-id", msg.id);

    var avatarText = msg.sender === "user" ? CONFIG.userAvatar : CONFIG.botAvatar;
    var time = formatTime(new Date(msg.timestamp));

    el.innerHTML =
      '<div class="chat-message-avatar" aria-hidden="true">' +
      avatarText +
      "</div>" +
      '<div class="chat-message-body">' +
      '<div class="chat-message-text">' +
      (msg.isHtml ? msg.text : escapeHtml(msg.text)) +
      "</div>" +
      '<div class="chat-message-time">' +
      time +
      "</div>" +
      "</div>";

    return el;
  }

  /* -----------------------------------------------------------------------
     Typing Indicator
     ----------------------------------------------------------------------- */
  function showTypingIndicator() {
    var container = widgetEl.querySelector(".chat-messages");

    // Remove existing
    hideTypingIndicator();

    var el = document.createElement("div");
    el.className = "chat-message";
    el.id = "chat-typing-indicator";

    el.innerHTML =
      '<div class="chat-message-avatar" aria-hidden="true">' +
      CONFIG.botAvatar +
      "</div>" +
      '<div class="chat-message-body">' +
      '<div class="chat-typing" aria-label="' + CONFIG.botName + ' is typing">' +
      '<span class="chat-typing-dot"></span>' +
      '<span class="chat-typing-dot"></span>' +
      '<span class="chat-typing-dot"></span>' +
      "</div>" +
      "</div>";

    container.appendChild(el);
    scrollToBottom();
  }

  function hideTypingIndicator() {
    var el = document.getElementById("chat-typing-indicator");
    if (el && el.parentNode) {
      el.parentNode.removeChild(el);
    }
  }

  /* -----------------------------------------------------------------------
     Quick Replies
     ----------------------------------------------------------------------- */
  function renderQuickReplies(replies) {
    var container = widgetEl.querySelector(".chat-quick-replies");
    container.innerHTML = "";

    replies.forEach(function (text) {
      var btn = document.createElement("button");
      btn.className = "chat-quick-reply";
      btn.textContent = text;
      container.appendChild(btn);
    });

    container.style.display = "flex";
  }

  function hideQuickReplies() {
    var container = widgetEl.querySelector(".chat-quick-replies");
    if (container) {
      container.style.display = "none";
    }
  }

  /* -----------------------------------------------------------------------
     Badge (unread count)
     ----------------------------------------------------------------------- */
  function updateBadge() {
    var badge = widgetEl.querySelector(".chat-bubble-badge");
    if (!badge) return;

    if (unreadCount > 0) {
      badge.textContent = unreadCount > 9 ? "9+" : unreadCount;
      badge.style.display = "flex";
    } else {
      badge.style.display = "none";
    }
  }

  /* -----------------------------------------------------------------------
     Scroll to bottom
     ----------------------------------------------------------------------- */
  function scrollToBottom() {
    var container = widgetEl.querySelector(".chat-messages");
    if (container) {
      requestAnimationFrame(function () {
        container.scrollTop = container.scrollHeight;
      });
    }
  }

  /* -----------------------------------------------------------------------
     Public API
     ----------------------------------------------------------------------- */
  window.AstroydsChat = {
    open: openChat,
    close: closeChat,
    clearHistory: function () {
      clearHistory();
      if (widgetEl) {
        var container = widgetEl.querySelector(".chat-messages");
        if (container) container.innerHTML = "";
      }
    },
    sendBotMessage: function (text) {
      addBotMessage(text, true);
    },
    isOpen: function () {
      return isOpen;
    },
  };

  /* -----------------------------------------------------------------------
     Bootstrap
     ----------------------------------------------------------------------- */
  function bootstrap() {
    // Don't initialise if already present
    if (document.querySelector(".chat-widget")) return;
    buildWidget();
  }

  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", bootstrap);
  } else {
    bootstrap();
  }
})();
