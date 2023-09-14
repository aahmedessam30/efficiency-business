<template>
    <Head :title="title"/>
    <div class="flex flex-col h-screen justify-between">
        <Header/>
        <slot/>
        <Footer/>
    </div>
</template>

<script>
import {Head} from '@inertiajs/vue3'
import Header from "../Header/index.vue";
import Footer from "../Footer/index.vue";

export default {
    name: "Layout",
    props: {
        title: {
            required: true,
            type: String,
        }
    },
    components: {
        Head,
        Header,
        Footer
    },
}
</script>

<style scoped lang="scss" src="./_index.scss"/>
