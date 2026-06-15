
// >>---------------------------------------- //Chat  js Start// ---------------------------------------- <<
function bindChatCloseOnMobile() {
    const isMobile = window.innerWidth < 991;
    const chatCard = document.querySelector('.chat-div-card');

    // Add class when clicking contact (mobile only)
    document.querySelectorAll('.chat-contact .chat-contact-box').forEach(box => {
        box.onclick = null;

        if (isMobile && chatCard) {
            box.onclick = () => chatCard.classList.add('chat-card-close');
        }
    });

    // Remove class when clicking remove toggle
    const removeToggle = document.querySelector('.remove-chat-toggle');
    if (removeToggle && chatCard) {
        removeToggle.onclick = () => {
            chatCard.classList.remove('chat-card-close');
        };
    }
}

bindChatCloseOnMobile();
window.addEventListener('resize', bindChatCloseOnMobile);

// >> ---------------------------------------- //Chat  js End// ---------------------------------------- <<
