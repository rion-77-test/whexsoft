<div id="live-chat-widget" class="position-fixed site-position-bottom-6 site-position-right-6 site-position-z-50"
    data-start-url="{{ route('chat.start') }}"
    data-send-url="{{ route('chat.send') }}"
    data-messages-url="{{ route('chat.messages') }}"
    data-csrf="{{ csrf_token() }}">

    {{-- Messenger-Style Chat Panel --}}
    <div id="chat-box-panel" class="chat-panel rounded-4 overflow-hidden shadow-lg border site-soft-border bg-white d-none flex-column"
        role="dialog" aria-label="Live Chat" aria-hidden="true">

        {{-- Header --}}
        <div class="chat-header d-flex align-items-center justify-content-between px-3 py-3 text-white">
            <div class="d-flex align-items-center gap-2 min-w-0">
                <span class="chat-avatar d-inline-flex align-items-center justify-content-center rounded-circle fw-bold flex-shrink-0">
                    <span class="material-symbols-outlined fs-5">support_agent</span>
                </span>
                <div class="min-w-0">
                    <div class="fw-semibold small text-white text-truncate">Live Support</div>
                    <div class="d-flex align-items-center gap-1" style="font-size: 0.72rem; color: #cbd5e1;">
                        <span class="chat-status-dot rounded-circle d-inline-block"></span>
                        <span>Replies via WhatsApp</span>
                    </div>
                </div>
            </div>

            <div class="d-flex align-items-center gap-1">
                <a href="tel:01335198859" class="btn btn-sm p-1 text-white opacity-75" title="{{ __('site.direct_call') }}" aria-label="{{ __('site.direct_call') }}">
                    <span class="material-symbols-outlined fs-6">call</span>
                </a>
                <button type="button" id="chat-close-btn" class="btn btn-sm p-1 text-white opacity-75" aria-label="Close chat">
                    <span class="material-symbols-outlined fs-5">close</span>
                </button>
            </div>
        </div>

        {{-- Pre-Chat Form (Name & Phone) --}}
        <form id="chat-prechat-form" class="p-3 d-flex flex-column gap-3 bg-white flex-grow-1 justify-content-center">
            <div>
                <h6 class="fw-bold mb-1 site-heading">Start a Conversation</h6>
                <p class="small site-copy mb-0">Enter your name and phone number to chat with our team.</p>
            </div>

            <div>
                <label for="chat-visitor-name" class="form-label small fw-medium mb-1 site-heading">Your Name</label>
                <input type="text" id="chat-visitor-name" name="name" class="form-control form-control-sm rounded-3"
                    placeholder="e.g. Rion Ahmed" required maxlength="120">
            </div>

            <div>
                <label for="chat-visitor-phone" class="form-label small fw-medium mb-1 site-heading">Phone Number</label>
                <input type="tel" id="chat-visitor-phone" name="phone" class="form-control form-control-sm rounded-3"
                    placeholder="e.g. +88017XXXXXXXX" required minlength="6" maxlength="30">
            </div>

            <div id="chat-prechat-error" class="small text-danger d-none"></div>

            <button type="submit" id="chat-start-btn" class="btn w-100 rounded-pill fw-semibold py-2 chat-accent-btn">
                Start Chat
            </button>
        </form>

        {{-- Active Chat Thread --}}
        <div id="chat-thread-view" class="d-none flex-column flex-grow-1 min-h-0">
            <div class="px-3 py-2 border-bottom site-soft-border d-flex align-items-center justify-content-between bg-light">
                <span id="chat-session-badge" class="text-truncate site-copy" style="font-size: 0.75rem;"></span>
                <button type="button" id="chat-switch-user-btn" class="btn btn-link p-0 text-decoration-none site-copy" style="font-size: 0.72rem;">
                    Change info
                </button>
            </div>

            <div id="chat-messages-list" class="chat-messages flex-grow-1 p-3 d-flex flex-column gap-2 overflow-y-auto">
                {{-- Messages rendered dynamically via JS --}}
            </div>

            <div id="chat-send-error" class="px-3 pb-1 small text-danger d-none"></div>

            <form id="chat-message-form" class="p-2 border-top site-soft-border bg-white d-flex align-items-center gap-2">
                <input type="text" id="chat-message-input" name="message" class="form-control form-control-sm rounded-pill px-3"
                    placeholder="Type a message..." autocomplete="off" required maxlength="2000">
                <button type="submit" id="chat-send-btn" class="chat-send-btn rounded-circle d-inline-flex align-items-center justify-content-center flex-shrink-0"
                    aria-label="Send message">
                    <span class="material-symbols-outlined fs-6">send</span>
                </button>
            </form>
        </div>
    </div>

    {{-- Floating Messenger Trigger Button (WhatsApp Green Style) --}}
    <button type="button" id="chat-toggle-btn"
        class="chat-fab site-dimension-w-14 site-dimension-h-14 rounded-pill site-surface-bg-success-whatsapp text-white d-inline-flex align-items-center justify-content-center site-elevation-shadow-arbitrary-0-4px-24px-rgba-37-211-102-0-4 site-state-hover-motion-scale-105 site-motion-transition-transform position-relative ms-auto border-0"
        aria-expanded="false" aria-controls="chat-box-panel" aria-label="Open live chat">
        <span id="chat-unread-badge" class="chat-unread-badge position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger d-none">
            0
        </span>
        <span id="chat-fab-icon" class="material-symbols-outlined fs-3">chat</span>
    </button>
</div>