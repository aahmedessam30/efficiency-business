<template>
    <header>
        <nav
            class="lg:px-20 px-10 py-2.5 text-gray-600 body-font fixed w-full z-10 transition-all duration-300 ease-in-out"
            :class="{'header--transparent': scrollY === 0 && !darkHeader, 'header--scrolled': scrollY > 0 || darkHeader}">
            <div class="flex flex-wrap justify-between items-center container mx-auto">
                <img :src="logo" alt="logo" class="w-20 h-10 object-contain cursor-pointer"
                     @click="$inertia.visit('/')"/>
                <div class="flex items-center">
                    <button data-collapse-toggle="mobile-menu-2" type="button"
                            class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                            aria-controls="mobile-menu-2" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                  d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                  clip-rule="evenodd"></path>
                        </svg>
                        <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                             xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                  d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                  clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
                <div class="hidden justify-between items-center w-full lg:flex lg:w-auto lg:order-1" id="mobile-menu-2">
                    <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                        <li>
                            <Link class="mr-5" :href="$route('home')"
                                  :class="{'active': $route().current('home') && !currentHash, 'not-active': !$route().current('home') || currentHash}">
                                {{ $t('front.home') }}
                            </Link>
                        </li>
                        <li>
                            <Link class="mr-5" :href="$route('home') + '#about'"
                                  :class="{'active': currentHash === '#about', 'not-active': currentHash !== '#about'}">
                                {{ $t('front.about') }}
                            </Link>
                        </li>
                        <li>
                            <Link class="mr-5" :href="$route('home') + '#services'"
                                  :class="{'active': currentHash === '#services' || $route().current('our-services'), 'not-active': currentHash !== '#services' && !$route().current('our-services')}">
                                {{ $t('front.services') }}
                            </Link>
                        </li>
                        <li>
                            <Link class="mr-5" :href="$route('home') + '#testimonials'"
                                  :class="{'active': currentHash === '#testimonials', 'not-active': currentHash !== '#testimonials'}">
                                {{ $t('front.our_clients') }}
                            </Link>
                        </li>
                        <li>
                            <Link class="mr-5" :href="$route('contact-us')"
                                  :class="{'active': $route().current('contact-us') && !currentHash, 'not-active': !$route().current('contact-us') || currentHash}">
                                {{ $t('front.contact') }}
                            </Link>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
</template>

<script>
import {Link} from '@inertiajs/vue3'
import logoWhite from '../../../../public/images/logo-white.png'
import logoDark from '../../../../public/images/logo-dark.png'

export default {
    name: "Header",
    components: {
        Link,
    },
    props: {
        darkHeader: {
            required: false,
            type: Boolean,
            default: false,
        },
    },
    data() {
        return {
            logo: logoWhite,
            currentHash: '',
            scrollY: 0,
        }
    },
    created() {
        this.currentHash = window.location.hash;
        this.logo = this.darkHeader ? logoDark : logoWhite
    },
    beforeMount() {
        window.addEventListener('scroll', () => {
            this.scrollY = window.scrollY
            this.logo = this.scrollY > 0 ? logoDark : logoWhite
        })
    },
    watch: {
        '$route'() {
            this.currentHash = window.location.hash;
        },
    },
}
</script>

<style scoped lang="scss" src="./_index.scss"/>
