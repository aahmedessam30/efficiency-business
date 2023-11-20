<template>
    <HeroLayout
        :page-title="$t('front.our_services')"
        background-color="#151515"
        hero-height="h-[500px]"
        title="Our Services"
        text-position="center"
        dark-header>
        <OurServices :with-body-only="true"/>
    </HeroLayout>
</template>

<script>
import OurServices from "@/components/OurServices/index.vue";
import HeroLayout from "@/Layout/HeroLayout/index.vue";

export default {
    name: "OurServicesPage",
    components: {HeroLayout, OurServices}
}
</script>
