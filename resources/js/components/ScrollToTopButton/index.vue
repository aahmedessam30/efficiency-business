<template>
    <div class="fixed bottom-0 right-0 mb-10 mr-10">
        <button class="z-10 bg-tertiary-light hover:bg-gray-50 text-primary p-3.5 rounded-full shadow-xl animate-bounce focus:outline-none"
                :class="{'hidden': !showScrollToTopButton}"
                @click="scrollToTop">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                 xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 10l7-7m0 0l7 7m-7-7v18">
                </path>
            </svg>
        </button>
    </div>
</template>

<script>
export default {
    name: "ScrollToTopButton",
    data() {
        return {
            showScrollToTopButton: false
        }
    },
    methods: {
        scrollToTop() {
            window.scrollTo({
                top: 0,
                behavior: "smooth"
            });
        }
    },
    mounted() {
        window.addEventListener("scroll", () => {
            this.showScrollToTopButton = window.scrollY > 100;
        });
    }
}
</script>
