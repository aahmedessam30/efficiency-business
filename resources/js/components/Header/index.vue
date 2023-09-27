<template>
    <header class="text-gray-600 body-font fixed w-full z-10 transition-all duration-300 ease-in-out"
            :class="{'header--scrolled': scrollY > 0, 'header--transparent': scrollY === 0}">
        <div class="container mx-auto flex flex-wrap p-4 flex-col md:flex-row items-center">

            <img :src="logo" alt="logo" class="w-20 h-10 object-contain cursor-pointer" @click="$inertia.visit('/')"/>
            <nav class="md:ml-auto flex flex-wrap items-center text-base justify-center">
                <Link class="mr-5" :href="$route('home')"
                      :class="{'active': $route().current('home') && !currentHash, 'not-active': !$route().current('home') || currentHash}">
                    {{ $t('front.home') }}
                </Link>
                <Link class="mr-5" :href="$route('home') + '#about'"
                      :class="{'active': currentHash === '#about', 'not-active': currentHash !== '#about'}">
                    {{ $t('front.about') }}
                </Link>
                <Link class="mr-5" :href="$route('home') + '#services'"
                      :class="{'active': currentHash === '#services', 'not-active': currentHash !== '#services'}">
                    {{ $t('front.services') }}
                </Link>
                <Link class="mr-5" :href="$route('home') + '#testimonials'"
                      :class="{'active': currentHash === '#testimonials', 'not-active': currentHash !== '#testimonials'}">
                    {{ $t('front.our_clients') }}
                </Link>
                <Link class="mr-5" :href="$route('contact-us')"
                      :class="{'active': $route().current('contact-us') && !currentHash, 'not-active': !$route().current('contact-us') || currentHash}">
                    {{ $t('front.contact') }}
                </Link>
            </nav>
        </div>
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
    data() {
        return {
            logo: logoWhite,
            currentHash: '',
            scrollY: 0,
        }
    },
    created() {
        this.currentHash = window.location.hash;
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
