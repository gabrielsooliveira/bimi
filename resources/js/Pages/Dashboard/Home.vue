
<script setup>
import { onMounted, ref } from 'vue';
import { Head, Link } from '@inertiajs/vue3';

const cards = ref([
  { title: 'Revenue', value: '$32,400', growth: 12, icon: 'bi bi-currency-dollar' },
  { title: 'Users', value: '1,230', growth: 8, icon: 'bi bi-people' },
  { title: 'Orders', value: '345', growth: 5, icon: 'bi bi-bag-check' },
  { title: 'Conversion', value: '3.4%', growth: 2.3, icon: 'bi bi-bar-chart' }
]);
</script>

<template>
    <Head title="Dashboard"></Head>
    <div class="container-fluid py-4">
        <div class="row mb-4">
        <div class="col-md-3" v-for="(card, index) in cards" :key="index">
            <div class="card shadow-sm border-0 anim-slide-up">
            <div class="card-body d-flex flex-column justify-content-between">
                <div class="d-flex justify-content-between">
                <div>
                    <h6 class="text-muted">{{ card.title }}</h6>
                    <h4>{{ card.value }}</h4>
                </div>
                <div>
                    <i :class="card.icon" class="fs-2 text-primary"></i>
                </div>
                </div>
                <small class="text-success">{{ card.growth }}% since last week</small>
            </div>
            </div>
        </div>
        </div>
    </div>
</template>
