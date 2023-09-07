<template>
    <div>
        <Header/>
        <slot/>
        <Footer/>
    </div>
</template>

<script>
import Header from "../../includes/Header/index.vue";
import Footer from "../../includes/Footer/index.vue";

export default {
    name: "Layout",
    components: {
        Header,
        Footer,
    },
}
</script>

<style scoped lang="scss" src="./_index.scss"/>
