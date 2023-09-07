<template>
    <Layout>
        <h1>Welcome, {{ name }}</h1>
    </Layout>
</template>

<script>
import Layout from "../../layouts/App/index.vue";

export default {
    name: "Welcome",
    props: {
        name: {
            type: String,
            required: true,
        },
    },
    components: {
        Layout,
    },
    data() {
        return {
            //
        }
    },
    methods: {
        //
    },
}
</script>

<style scoped lang="scss" src="./_index.scss"/>
