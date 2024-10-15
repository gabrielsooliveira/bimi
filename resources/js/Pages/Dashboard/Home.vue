<script setup>
import { Link } from "@inertiajs/vue3";
import PlanCard from "@/js/Components/PlanCard.vue";

const props = defineProps({
    service: Object,
    plans: {
        type: Array,
        default: () => [],
    }
});

const logout = props.service.slug + '.logout'
</script>

<template>
    <Head title="Home"></Head>
    <Link class="nav-link link-secondary" :href="route(logout)" method="post" as="button">
        <font-awesome-icon icon="fa-solid fa-right-from-bracket" />
        Sair
    </Link>
    <div class="px-4">
        <div class="container mt-5">
            <div v-if="plans.length > 0">
                <p class="lead text-center mb-5">Conheça nosso planos.</p>
                <div class="row g-4">
                    <PlanCard
                        v-for="plan in plans"
                        :key="plan.id"
                        :plan="plan"
                    />
                </div>
            </div>
        </div>
    </div>
</template>
