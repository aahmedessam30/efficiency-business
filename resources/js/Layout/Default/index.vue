<template>
    <Head :title="title"/>
    <div class="flex flex-col h-screen justify-between w-full">
        <Header :dark-header="darkHeader"/>
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

export default {
    name: "Default",
    props: {
        title: {
            required: true,
            type: String,
        },
        darkHeader: {
            required: false,
            type: Boolean,
            default: false,
        },
    },
    components: {
        ScrollToTopButton,
        Head,
        Header,
        Footer
    },
}
</script>
