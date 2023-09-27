<template>
    <Head :title="title"/>
    <div class="flex flex-col h-screen justify-between">
        <Header/>
        <ScrollToTopButton/>
        <slot/>
        <Footer/>
    </div>
</template>

<script>
import {Head} from '@inertiajs/vue3'
import Header from "../components/Header/index.vue";
import Footer from "../components/Footer/index.vue";
import ScrollToTopButton from "../components/ScrollToTopButton/index.vue";

export default {
    name: "Layout",
    props: {
        title: {
            required: true,
            type: String,
        }
    },
    components: {
        ScrollToTopButton,
        Head,
        Header,
        Footer
    },
}
</script>

<style scoped lang="scss" src="./_index.scss"/>
