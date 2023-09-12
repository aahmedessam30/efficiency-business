<template>
    <div class="flex flex-col h-screen justify-between">
        <Header/>
        <slot/>
        <Footer/>
    </div>
</template>

<script>
import Header from "../Header/index.vue";
import Footer from "../Footer/index.vue";

export default {
    name: "Layout",
    components: {
        Header,
        Footer
    },
}
</script>

<style scoped lang="scss" src="./_index.scss"/>
