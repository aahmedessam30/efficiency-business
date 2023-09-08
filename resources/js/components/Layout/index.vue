<template>
    <div>
        <Header :app-name="appName"/>
        <slot/>
        <Footer/>
    </div>
</template>

<script>
import Header from "../Header/index.vue";
import Footer from "../Footer/index.vue";

export default {
    name: "Layout",
    props: {
        appName: {
            type: String,
            required: true,
        },
    },
    components: {
        Header,
        Footer,
    },
}
</script>

<style scoped lang="scss" src="./_index.scss"/>
