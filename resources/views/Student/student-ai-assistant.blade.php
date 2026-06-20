<!DOCTYPE html>
<html lang="en" class="h-full" x-data="aiAssistant()" x-init="init()" :class="{ 'dark': darkMode }">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI Learning Assistant - EduLearn</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = { darkMode: 'class' };
    </script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        [x-cloak] { display: none !important; }
        .chat-scroll::-webkit-scrollbar { width: 6px; }
        .chat-scroll::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 3px; }
        .dark .chat-scroll::-webkit-scrollbar-thumb { background: #475569; }
        @keyframes typing-bounce {
            0%, 60%, 100% { transform: translateY(0); }
            30% { transform: translateY(-4px); }
        }
        .typing-dot { animation: typing-bounce 1.2s ease-in-out infinite; }
        .typing-dot:nth-child(2) { animation-delay: 0.15s; }
        .typing-dot:nth-child(3) { animation-delay: 0.3s; }

        /* Chat item action buttons always visible */
        .chat-actions { opacity: 0; transition: opacity 0.15s; }
        .chat-item:hover .chat-actions { opacity: 1; }

        /* Pin icon pulsing for newly pinned */
        @keyframes pin-pop {
            0% { transform: scale(1); }
            50% { transform: scale(1.4); }
            100% { transform: scale(1); }
        }
        .pin-pop { animation: pin-pop 0.3s ease; }

        /* Toast notification */
        .toast {
            position: fixed;
            bottom: 1.5rem;
            right: 1.5rem;
            z-index: 9999;
            padding: 0.75rem 1.25rem;
            border-radius: 0.75rem;
            font-size: 0.875rem;
            font-weight: 500;
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
            animation: slide-in 0.3s ease;
        }
        @keyframes slide-in {
            from { opacity: 0; transform: translateY(1rem); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body class="h-full bg-gray-50 dark:bg-slate-950 text-gray-900 dark:text-slate-100 antialiased">

<div class="flex h-screen overflow-hidden">

    {{-- LEFT SIDEBAR --}}
    <aside class="fixed inset-y-0 left-0 z-40 w-72 bg-white dark:bg-slate-900 border-r border-gray-200 dark:border-slate-800 flex flex-col transform transition-transform duration-300 lg:relative lg:translate-x-0"
           :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'">
        <div class="p-4 border-b border-gray-200 dark:border-slate-800">
            <button type="button"
                    @click="newChat()"
                    class="w-full flex items-center justify-center gap-2 px-4 py-3 rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-semibold text-sm hover:shadow-lg transition-all">
                <i class="fas fa-plus"></i> New Chat
            </button>
        </div>

        <div class="p-3">
            <div class="relative">
                <i class="fas fa-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-sm"></i>
                <input type="text"
                       x-model="searchQuery"
                       placeholder="Search chats..."
                       class="w-full pl-9 pr-3 py-2 text-sm rounded-lg border border-gray-200 dark:border-slate-700 bg-gray-50 dark:bg-slate-800 focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none">
            </div>
        </div>

        <nav class="flex-1 overflow-y-auto chat-scroll px-2 pb-4 space-y-4">

            {{-- Pinned chats group --}}
            <template x-if="pinnedChats.length > 0">
                <div>
                    <p class="px-3 py-1 text-xs font-semibold text-amber-500 dark:text-amber-400 uppercase tracking-wider flex items-center gap-1.5">
                        <i class="fas fa-thumbtack text-xs"></i> Pinned
                    </p>
                    <ul class="mt-1 space-y-0.5">
                        <template x-for="chat in pinnedChats" :key="'pinned-'+chat.id">
                            <li class="chat-item">
                                <div class="w-full group flex items-center gap-2 px-3 py-2.5 rounded-lg text-sm transition-colors cursor-pointer"
                                     :class="activeChatId === chat.id
                                        ? 'bg-blue-50 dark:bg-blue-900/30 text-blue-700 dark:text-blue-300'
                                        : 'text-gray-700 dark:text-slate-300 hover:bg-gray-100 dark:hover:bg-slate-800'"
                                     @click="selectChat(chat.id)">
                                    <i class="fas fa-thumbtack text-xs text-amber-400 flex-shrink-0"></i>
                                    <span class="truncate flex-1 text-left" x-text="chat.title"></span>
                                    <div class="chat-actions flex items-center gap-1">
                                        <button type="button"
                                                @click.stop="togglePin(chat.id)"
                                                class="p-1 rounded hover:bg-amber-100 dark:hover:bg-amber-900/30 text-amber-500 transition-all"
                                                title="Unpin chat">
                                            <i class="fas fa-thumbtack text-xs"></i>
                                        </button>
                                        <button type="button"
                                                @click.stop="confirmDelete(chat.id)"
                                                class="p-1 rounded hover:bg-red-100 dark:hover:bg-red-900/30 text-red-500 transition-all"
                                                title="Delete chat">
                                            <i class="fas fa-trash-alt text-xs"></i>
                                        </button>
                                    </div>
                                </div>
                            </li>
                        </template>
                    </ul>
                </div>
            </template>

            {{-- Regular chat groups --}}
            <template x-for="group in filteredChatGroups" :key="group.label">
                <div x-show="group.chats.length > 0">
                    <p class="px-3 py-1 text-xs font-semibold text-gray-500 dark:text-slate-500 uppercase tracking-wider" x-text="group.label"></p>
                    <ul class="mt-1 space-y-0.5">
                        <template x-for="chat in group.chats" :key="chat.id">
                            <li class="chat-item">
                                <div class="w-full group flex items-center gap-2 px-3 py-2.5 rounded-lg text-sm transition-colors cursor-pointer"
                                     :class="activeChatId === chat.id
                                        ? 'bg-blue-50 dark:bg-blue-900/30 text-blue-700 dark:text-blue-300'
                                        : 'text-gray-700 dark:text-slate-300 hover:bg-gray-100 dark:hover:bg-slate-800'"
                                     @click="selectChat(chat.id)">
                                    <i class="fas fa-message text-xs opacity-60 flex-shrink-0"></i>
                                    <span class="truncate flex-1 text-left" x-text="chat.title"></span>
                                    <div class="chat-actions flex items-center gap-1">
                                        <button type="button"
                                                @click.stop="togglePin(chat.id)"
                                                class="p-1 rounded hover:bg-amber-100 dark:hover:bg-amber-900/30 text-gray-400 hover:text-amber-500 transition-all"
                                                title="Pin chat">
                                            <i class="fas fa-thumbtack text-xs"></i>
                                        </button>
                                        <button type="button"
                                                @click.stop="confirmDelete(chat.id)"
                                                class="p-1 rounded hover:bg-red-100 dark:hover:bg-red-900/30 text-gray-400 hover:text-red-500 transition-all"
                                                title="Delete chat">
                                            <i class="fas fa-trash-alt text-xs"></i>
                                        </button>
                                    </div>
                                </div>
                            </li>
                        </template>
                    </ul>
                </div>
            </template>

            {{-- Empty state --}}
            <template x-if="chats.length === 0">
                <div class="text-center py-8 text-gray-400 dark:text-slate-600">
                    <i class="fas fa-comments text-2xl mb-2"></i>
                    <p class="text-xs">No chats yet. Start a new one!</p>
                </div>
            </template>
        </nav>

        <div class="p-4 border-t border-gray-200 dark:border-slate-800">
            <a href="{{ url('/') }}" class="flex items-center gap-2 text-sm text-gray-600 dark:text-slate-400 hover:text-blue-600 dark:hover:text-blue-400 transition">
                <i class="fas fa-arrow-left"></i> Back to LMS
            </a>
        </div>
    </aside>

    {{-- Sidebar overlay (mobile) --}}
    <div x-show="sidebarOpen" x-cloak @click="sidebarOpen = false"
         class="fixed inset-0 z-30 bg-black/50 lg:hidden"></div>

    {{-- MAIN AREA --}}
    <div class="flex-1 flex flex-col min-w-0">

        {{-- TOP HEADER --}}
        <header class="flex items-center justify-between px-4 sm:px-6 h-16 border-b border-gray-200 dark:border-slate-800 bg-white/80 dark:bg-slate-900/80 backdrop-blur-md flex-shrink-0">
            <div class="flex items-center gap-3">
                <button type="button" @click="sidebarOpen = !sidebarOpen" class="lg:hidden p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-slate-800">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-blue-600 to-indigo-600 flex items-center justify-center text-white">
                        <i class="fas fa-wand-magic-sparkles text-sm"></i>
                    </div>
                    <div>
                        <h1 class="font-bold text-gray-900 dark:text-white text-sm sm:text-base">AI Learning Assistant</h1>
                        <p class="text-xs text-gray-500 dark:text-slate-500 hidden sm:block">
                            Powered by <span class="text-blue-500 font-medium" x-text="currentChatTitle"></span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="flex items-center gap-2 sm:gap-3">
                {{-- Active chat actions --}}
                <template x-if="activeChatId && currentChat">
                    <div class="hidden sm:flex items-center gap-1 pr-2 border-r border-gray-200 dark:border-slate-700">
                        <button type="button"
                                @click="togglePin(activeChatId)"
                                :title="currentChat && currentChat.pinned ? 'Unpin chat' : 'Pin chat'"
                                class="p-2 rounded-lg transition"
                                :class="currentChat && currentChat.pinned
                                    ? 'bg-amber-100 dark:bg-amber-900/30 text-amber-500'
                                    : 'hover:bg-gray-100 dark:hover:bg-slate-800 text-gray-500 dark:text-slate-400'">
                            <i class="fas fa-thumbtack text-sm"></i>
                        </button>
                        <button type="button"
                                @click="confirmDelete(activeChatId)"
                                title="Delete this chat"
                                class="p-2 rounded-lg hover:bg-red-100 dark:hover:bg-red-900/30 text-gray-500 dark:text-slate-400 hover:text-red-500 transition">
                            <i class="fas fa-trash text-sm"></i>
                        </button>
                    </div>
                </template>
                <button type="button" @click="darkMode = !darkMode"
                        class="p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-slate-800 text-gray-600 dark:text-slate-400 transition"
                        title="Toggle dark mode">
                    <i class="fas" :class="darkMode ? 'fa-sun' : 'fa-moon'"></i>
                </button>
                <div class="flex items-center gap-2 pl-2 border-l border-gray-200 dark:border-slate-700">
                    <img src="https://ui-avatars.com/api/?name=Student&background=2563eb&color=fff&size=64"
                         alt="Student" class="w-8 h-8 rounded-full ring-2 ring-blue-100 dark:ring-blue-900">
                    <span class="hidden sm:inline text-sm font-medium text-gray-700 dark:text-slate-300">Student</span>
                </div>
            </div>
        </header>

        {{-- CHAT MESSAGES --}}
        <div class="flex-1 overflow-y-auto chat-scroll px-4 sm:px-6 py-6" id="chat-container" x-ref="chatContainer">
            <div class="max-w-3xl mx-auto space-y-6">

                {{-- Welcome (shown when no messages) --}}
                <div x-show="messages.length === 0" class="text-center py-12 sm:py-20">
                    <div class="w-16 h-16 mx-auto mb-6 rounded-2xl bg-gradient-to-br from-blue-600 to-indigo-600 flex items-center justify-center text-white shadow-xl">
                        <i class="fas fa-graduation-cap text-2xl"></i>
                    </div>
                    <h2 class="text-2xl sm:text-3xl font-bold text-gray-900 dark:text-white mb-3">How can I help you learn today?</h2>
                    <p class="text-gray-600 dark:text-slate-400 max-w-md mx-auto mb-8">Ask about course concepts, get lesson summaries, or practice with quiz questions.</p>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 max-w-lg mx-auto">
                        <button type="button" @click="useSuggestion('Explain this lesson in simple terms')"
                                class="p-4 rounded-xl border border-gray-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-left text-sm hover:border-blue-300 dark:hover:border-blue-700 hover:shadow-md transition-all">
                            <i class="fas fa-lightbulb text-yellow-500 mb-2"></i>
                            <p class="font-medium text-gray-800 dark:text-slate-200">Explain this lesson</p>
                            <p class="text-xs text-gray-500 dark:text-slate-500 mt-1">Simple breakdown</p>
                        </button>
                        <button type="button" @click="useSuggestion('Quiz me on the key concepts')"
                                class="p-4 rounded-xl border border-gray-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-left text-sm hover:border-blue-300 dark:hover:border-blue-700 hover:shadow-md transition-all">
                            <i class="fas fa-brain text-purple-500 mb-2"></i>
                            <p class="font-medium text-gray-800 dark:text-slate-200">Quiz me</p>
                            <p class="text-xs text-gray-500 dark:text-slate-500 mt-1">Test your knowledge</p>
                        </button>
                        <button type="button" @click="useSuggestion('Summarize the key points of this topic')"
                                class="p-4 rounded-xl border border-gray-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-left text-sm hover:border-blue-300 dark:hover:border-blue-700 hover:shadow-md transition-all">
                            <i class="fas fa-list-check text-green-500 mb-2"></i>
                            <p class="font-medium text-gray-800 dark:text-slate-200">Summarize topic</p>
                            <p class="text-xs text-gray-500 dark:text-slate-500 mt-1">Key points at a glance</p>
                        </button>
                        <button type="button" @click="useSuggestion('Give me a real-world example of this concept')"
                                class="p-4 rounded-xl border border-gray-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-left text-sm hover:border-blue-300 dark:hover:border-blue-700 hover:shadow-md transition-all">
                            <i class="fas fa-globe text-blue-500 mb-2"></i>
                            <p class="font-medium text-gray-800 dark:text-slate-200">Real-world example</p>
                            <p class="text-xs text-gray-500 dark:text-slate-500 mt-1">Practical application</p>
                        </button>
                    </div>
                </div>

                {{-- Message list --}}
                <template x-for="msg in messages" :key="msg.id">
                    <div class="flex gap-3" :class="msg.role === 'user' ? 'flex-row-reverse' : ''">
                        <div class="flex-shrink-0 w-8 h-8 rounded-full flex items-center justify-center text-sm"
                             :class="msg.role === 'user' ? 'bg-blue-600 text-white' : 'bg-gradient-to-br from-indigo-500 to-purple-600 text-white'">
                            <i class="fas" :class="msg.role === 'user' ? 'fa-user' : 'fa-robot'"></i>
                        </div>
                        <div class="max-w-[85%] sm:max-w-[75%]">
                            <div class="rounded-2xl px-4 py-3 text-sm leading-relaxed"
                                 :class="msg.role === 'user'
                                    ? 'bg-blue-600 text-white rounded-br-md'
                                    : 'bg-white dark:bg-slate-800 border border-gray-200 dark:border-slate-700 text-gray-800 dark:text-slate-200 rounded-bl-md shadow-sm'">
                                <template x-if="msg.image">
                                    <img :src="msg.image" alt="Uploaded" class="max-w-full rounded-lg mb-2 max-h-48 object-cover">
                                </template>
                                <p x-text="msg.content" style="white-space: pre-wrap;"></p>
                            </div>
                            <p class="text-xs text-gray-400 dark:text-slate-500 mt-1 px-1" :class="msg.role === 'user' ? 'text-right' : ''" x-text="msg.time"></p>
                        </div>
                    </div>
                </template>

                {{-- Typing indicator --}}
                <div x-show="isTyping" x-cloak class="flex gap-3">
                    <div class="w-8 h-8 rounded-full bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center text-white text-sm">
                        <i class="fas fa-robot"></i>
                    </div>
                    <div class="bg-white dark:bg-slate-800 border border-gray-200 dark:border-slate-700 rounded-2xl rounded-bl-md px-4 py-3 shadow-sm">
                        <div class="flex gap-1">
                            <span class="typing-dot w-2 h-2 rounded-full bg-gray-400 dark:bg-slate-500"></span>
                            <span class="typing-dot w-2 h-2 rounded-full bg-gray-400 dark:bg-slate-500"></span>
                            <span class="typing-dot w-2 h-2 rounded-full bg-gray-400 dark:bg-slate-500"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- BOTTOM INPUT --}}
        <div class="flex-shrink-0 border-t border-gray-200 dark:border-slate-800 bg-white dark:bg-slate-900 p-4">
            <div class="max-w-3xl mx-auto">
                <div x-show="imagePreview" x-cloak class="mb-3 relative inline-block">
                    <img :src="imagePreview" alt="Preview" class="h-20 rounded-lg border border-gray-200 dark:border-slate-700 object-cover">
                    <button type="button" @click="removeImage()"
                            class="absolute -top-2 -right-2 w-6 h-6 bg-red-500 text-white rounded-full text-xs hover:bg-red-600 shadow">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="flex items-end gap-2 sm:gap-3">
                    <label class="flex-shrink-0 p-3 rounded-xl border border-gray-200 dark:border-slate-700 hover:bg-gray-50 dark:hover:bg-slate-800 cursor-pointer transition text-gray-600 dark:text-slate-400"
                           title="Upload image">
                        <i class="fas fa-image"></i>
                        <input type="file" accept="image/*" class="hidden" @change="previewImage($event)">
                    </label>
                    <div class="flex-1 relative">
                        <textarea x-model="inputMessage"
                                  @keydown.enter.prevent="if (!$event.shiftKey) sendMessage()"
                                  rows="1"
                                  placeholder="Ask anything about your courses..."
                                  class="w-full resize-none rounded-xl border border-gray-200 dark:border-slate-700 bg-gray-50 dark:bg-slate-800 px-4 py-3 pr-12 text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none max-h-32"
                                  style="field-sizing: content;"></textarea>
                    </div>
                    <button type="button"
                            @click="sendMessage()"
                            :disabled="(!inputMessage.trim() && !imagePreview) || isTyping"
                            class="flex-shrink-0 p-3 rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 text-white hover:shadow-lg disabled:opacity-40 disabled:cursor-not-allowed transition-all">
                        <i class="fas fa-paper-plane"></i>
                    </button>
                </div>
                <p class="text-center text-xs text-gray-400 dark:text-slate-600 mt-2">AI can make mistakes. Verify important information.</p>
            </div>
        </div>
    </div>
</div>

{{-- Delete confirmation modal --}}
<div x-show="deleteModalOpen" x-cloak class="fixed inset-0 z-50 flex items-center justify-center p-4">
    <div class="absolute inset-0 bg-black/50" @click="deleteModalOpen = false"></div>
    <div class="relative bg-white dark:bg-slate-800 rounded-2xl shadow-xl max-w-sm w-full p-6 border border-gray-200 dark:border-slate-700">
        <div class="w-12 h-12 mx-auto mb-4 rounded-full bg-red-100 dark:bg-red-900/30 flex items-center justify-center">
            <i class="fas fa-trash text-red-500 text-lg"></i>
        </div>
        <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-1 text-center">Delete Chat?</h3>
        <p class="text-sm text-gray-600 dark:text-slate-400 mb-6 text-center">This conversation and all its messages will be permanently removed.</p>
        <div class="flex gap-3 justify-end">
            <button type="button" @click="deleteModalOpen = false"
                    class="flex-1 px-4 py-2 rounded-xl border border-gray-300 dark:border-slate-600 text-gray-700 dark:text-slate-300 text-sm font-medium hover:bg-gray-50 dark:hover:bg-slate-700">
                Cancel
            </button>
            <button type="button" @click="deleteChat()"
                    class="flex-1 px-4 py-2 rounded-xl bg-red-600 text-white text-sm font-medium hover:bg-red-700">
                Delete
            </button>
        </div>
    </div>
</div>

{{-- Toast notification --}}
<div x-show="toast.show" x-cloak
     class="toast"
     :class="toast.type === 'pin' ? 'bg-amber-500 text-white' : (toast.type === 'unpin' ? 'bg-slate-600 text-white' : 'bg-green-600 text-white')">
    <i class="fas mr-2" :class="toast.type === 'pin' ? 'fa-thumbtack' : (toast.type === 'unpin' ? 'fa-thumbtack fa-rotate-90' : 'fa-check')"></i>
    <span x-text="toast.message"></span>
</div>

<script>
function aiAssistant() {
    return {
        darkMode: false,
        sidebarOpen: false,
        searchQuery: '',
        inputMessage: '',
        imagePreview: null,
        imageFile: null,
        isTyping: false,
        messages: [],        // current chat messages (reactive view)
        chatMessages: {},    // { chatId: [...messages] } — persistent store
        activeChatId: null,
        deleteModalOpen: false,
        chatToDelete: null,
        toast: { show: false, message: '', type: 'pin' },
        toastTimer: null,

        chats: [
            { id: 1, title: 'React Hooks explained',    group: 'today',     pinned: false },
            { id: 2, title: 'Database normalization quiz', group: 'today',  pinned: false },
            { id: 3, title: 'UX design principles',     group: 'yesterday', pinned: false },
            { id: 4, title: 'Node.js async patterns',   group: 'week',      pinned: false },
            { id: 5, title: 'Marketing funnel basics',  group: 'week',      pinned: false },
            { id: 6, title: 'Python data structures',   group: 'older',     pinned: false },
        ],

        // Demo messages for the first chat (only pre-loaded once)
        demoMessages: [
            { id: 1, role: 'user',      content: 'Can you explain useState in React?', time: '10:32 AM', image: null },
            { id: 2, role: 'assistant', content: 'useState is a React Hook that lets you add state to functional components.\n\nIt returns an array with two items:\n• The current state value\n• A function to update it\n\nExample:\nconst [count, setCount] = useState(0);\n\nWhen setCount is called, React re-renders the component with the new value.',
              time: '10:32 AM', image: null },
        ],

        init() {
            if (window.matchMedia('(prefers-color-scheme: dark)').matches) {
                this.darkMode = true;
            }
            // Pre-load demo messages for chat #1
            this.chatMessages[1] = [...this.demoMessages];
            // Select the first chat
            this.selectChat(1);
        },

        // ─── Computed helpers ──────────────────────────────────────────────
        get currentChat() {
            return this.chats.find(c => c.id === this.activeChatId) || null;
        },

        get currentChatTitle() {
            const chat = this.currentChat;
            return chat ? chat.title : 'Gemini 2.5 Flash';
        },

        get pinnedChats() {
            const q = this.searchQuery.toLowerCase();
            return this.chats.filter(c => c.pinned && (!q || c.title.toLowerCase().includes(q)));
        },

        get filteredChatGroups() {
            const q = this.searchQuery.toLowerCase();
            const filter = (c) => !c.pinned && (!q || c.title.toLowerCase().includes(q));
            return [
                { label: 'Today',       chats: this.chats.filter(c => c.group === 'today'     && filter(c)) },
                { label: 'Yesterday',   chats: this.chats.filter(c => c.group === 'yesterday'  && filter(c)) },
                { label: 'Last 7 Days', chats: this.chats.filter(c => c.group === 'week'       && filter(c)) },
                { label: 'Older',       chats: this.chats.filter(c => c.group === 'older'      && filter(c)) },
            ];
        },

        // ─── Chat persistence helpers ──────────────────────────────────────
        saveCurrentChat() {
            if (this.activeChatId !== null) {
                this.chatMessages[this.activeChatId] = [...this.messages];
            }
        },

        loadChat(id) {
            this.messages = this.chatMessages[id] ? [...this.chatMessages[id]] : [];
        },

        // ─── Chat selection ────────────────────────────────────────────────
        selectChat(id) {
            this.saveCurrentChat();     // save messages for the outgoing chat
            this.activeChatId = id;
            this.loadChat(id);          // restore messages for the new chat
            this.sidebarOpen = false;
            this.$nextTick(() => this.scrollToBottom());
        },

        newChat() {
            this.saveCurrentChat();
            const id = Date.now();
            const title = 'New Chat ' + new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
            this.chats.unshift({ id, title, group: 'today', pinned: false });
            this.chatMessages[id] = [];
            this.activeChatId = id;
            this.messages = [];
            this.inputMessage = '';
            this.removeImage();
            this.sidebarOpen = false;
        },

        // ─── Pin / Unpin ──────────────────────────────────────────────────
        togglePin(id) {
            const chat = this.chats.find(c => c.id === id);
            if (!chat) return;
            chat.pinned = !chat.pinned;
            this.showToast(
                chat.pinned ? 'Chat pinned' : 'Chat unpinned',
                chat.pinned ? 'pin' : 'unpin'
            );
        },

        // ─── Delete ───────────────────────────────────────────────────────
        confirmDelete(id) {
            this.chatToDelete = id;
            this.deleteModalOpen = true;
        },

        deleteChat() {
            const deletedId = this.chatToDelete;
            this.chats = this.chats.filter(c => c.id !== deletedId);
            delete this.chatMessages[deletedId];
            this.deleteModalOpen = false;
            this.chatToDelete = null;

            // If we deleted the active chat, switch to another
            if (this.activeChatId === deletedId) {
                if (this.chats.length > 0) {
                    this.activeChatId = null;
                    this.selectChat(this.chats[0].id);
                } else {
                    this.activeChatId = null;
                    this.messages = [];
                }
            }
        },

        // ─── Toast ───────────────────────────────────────────────────────
        showToast(message, type = 'pin') {
            if (this.toastTimer) clearTimeout(this.toastTimer);
            this.toast = { show: true, message, type };
            this.toastTimer = setTimeout(() => { this.toast.show = false; }, 2500);
        },

        // ─── Suggestions ──────────────────────────────────────────────────
        useSuggestion(text) {
            this.inputMessage = text;
            this.$nextTick(() => document.querySelector('textarea').focus());
        },

        // ─── Image handling ───────────────────────────────────────────────
        previewImage(event) {
            const file = event.target.files[0];
            if (!file) return;
            this.imageFile = file;
            const reader = new FileReader();
            reader.onload = (e) => { this.imagePreview = e.target.result; };
            reader.readAsDataURL(file);
        },

        removeImage() {
            this.imagePreview = null;
            this.imageFile = null;
        },

        // ─── Send message ─────────────────────────────────────────────────
        sendMessage() {
            const text = this.inputMessage.trim();
            if (!text && !this.imagePreview) return;
            if (this.isTyping) return;

            const now = new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
            this.messages.push({
                id: Date.now(),
                role: 'user',
                content: text || '(Image attached)',
                time: now,
                image: this.imagePreview,
            });

            this.inputMessage = '';
            this.removeImage();
            this.scrollToBottom();
            this.isTyping = true;

            // Auto-update chat title from first user message
            const chat = this.currentChat;
            if (chat && (chat.title.startsWith('New Chat') || chat.id === this.activeChatId) && text) {
                const shortTitle = text.length > 40 ? text.substring(0, 40) + '…' : text;
                if (chat.title.startsWith('New Chat')) {
                    chat.title = shortTitle;
                }
            }

            const chatHistory = this.messages.map(m => ({
                role: m.role,
                content: m.content
            }));

            fetch('/student/ai-assistant/chat', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ messages: chatHistory })
            })
            .then(response => {
                if (!response.ok) {
                    return response.json().then(err => {
                        throw new Error(err.error || 'Server error');
                    });
                }
                return response.json();
            })
            .then(data => {
                this.isTyping = false;
                this.messages.push({
                    id: Date.now() + 1,
                    role: 'assistant',
                    content: data.reply,
                    time: new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' }),
                    image: null,
                });
                // Save after every AI reply
                this.saveCurrentChat();
                this.scrollToBottom();
            })
            .catch(error => {
                this.isTyping = false;
                this.messages.push({
                    id: Date.now() + 1,
                    role: 'assistant',
                    content: '⚠️ Error: ' + error.message,
                    time: new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' }),
                    image: null,
                });
                this.saveCurrentChat();
                this.scrollToBottom();
            });
        },

        scrollToBottom() {
            this.$nextTick(() => {
                const el = this.$refs.chatContainer;
                if (el) el.scrollTop = el.scrollHeight;
            });
        },
    };
}
</script>
</body>
</html>
