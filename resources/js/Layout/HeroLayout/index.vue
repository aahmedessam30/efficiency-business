<template>
    <Head :title="pageTitle"/>
    <div class="flex flex-col h-screen justify-between w-full">
        <Header :dark-header="darkHeader"/>
        <Hero
            :title="title"
            :subtitle="subtitle"
            :text-position="textPosition"
            :without-text="withoutText"
            :background-image-path="backgroundImagePath"
            :background-color="backgroundColor"
            :height="heroHeight"
        />
        <ScrollToTopButton/>
        <slot/>
        <Footer/>
    </div>
</template>

<script>
import {Head} from '@inertiajs/vue3'
import Header from "../../components/Header/index.vue";
import Footer from "../../components/Footer/index.vue";
import ScrollToTopButton from "../../components/ScrollToTopButton/index.vue";
import Hero from "@/components/Hero/index.vue";

export default {
    name: "HeroLayout",
    props: {
        pageTitle: {
            required: true,
            type: String,
        },
        darkHeader: {
            required: false,
            type: Boolean,
            default: false,
        },
        title: {
            required: false,
            type: String,
            default: '',
        },
        subtitle: {
            required: false,
            type: String,
            default: '',
        },
        textPosition: {
            required: false,
            type: String,
            default: 'left',
        },
        withoutText: {
            required: false,
            type: Boolean,
            default: false,
        },
        backgroundImagePath: {
            required: false,
            type: String,
            default: '',
        },
        backgroundColor: {
            required: false,
            type: String,
            default: '',
        },
        heroHeight: {
            required: false,
            type: String,
        },
    },
    components: {
        Hero,
        ScrollToTopButton,
        Head,
        Header,
        Footer
    },
}
</script>
