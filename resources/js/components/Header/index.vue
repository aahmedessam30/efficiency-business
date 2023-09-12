<template>
    <header class="text-gray-600 body-font w-full">
        <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
            <a class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round"
                     stroke-linejoin="round" stroke-width="2"
                     class="w-10 h-10 text-white p-2 bg-indigo-500 rounded-full" viewBox="0 0 24 24">
                    <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
                </svg>
                <span class="ml-3 text-xl">{{ appName }}</span>
            </a>
            <nav class="md:ml-auto flex flex-wrap items-center text-base justify-center">
                <Link class="mr-5 hover:text-gray-900"
                      :class="{'text-gray-900 font-medium': route().current('home'), 'text-gray-500': !route().current('home')}"
                      :href="route('home')">
                    Home
                </Link>
                <Link class="mr-5 hover:text-gray-900"
                      :class="{'text-gray-900 font-medium': route().current('about'), 'text-gray-500': !route().current('about')}"
                        :href="route('about')">
                    About
                </Link>
                <Link class="mr-5 hover:text-gray-900"
                      :class="{'text-gray-900 font-medium': route().current('contact'), 'text-gray-500': !route().current('contact')}"
                        :href="route('contact')">
                    Contact Us
                </Link>
            </nav>
        </div>
    </header>
</template>

<script>
import {Link} from '@inertiajs/vue3'

export default {
    name: "Header",
    components: {
        Link,
    },
    computed: {
        appName() {
            return this.$page.props.appName
        }
    }
}
</script>

<style scoped lang="scss" src="./_index.scss"/>
