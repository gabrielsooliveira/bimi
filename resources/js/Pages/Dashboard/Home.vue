<script setup>
import { Link, Head } from "@inertiajs/vue3";
</script>

<template>
    <Head title="Dashboard"></Head>

    <!-- <div class="px-4">
        <div class="container mt-5">
            <div v-if="service.plans.length > 0">
                <p class="lead text-center mb-5">Conheça nosso planos.</p>
                <div class="row g-4">
                    <PlanCard
                        v-for="plan in service.plans"
                        :key="plan.id"
                        :plan="plan"
                    />
                </div>
            </div>
        </div>
    </div> -->
</template>
