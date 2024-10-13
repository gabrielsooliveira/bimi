<script setup>
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    service: Object,
});
</script>

<template>
    <Link class="btn btn-secondary btn-lg w-100 bg-gradient shadow-lg fw-bold" :href="route('login.create', props.service.slug)">{{ props.service.name }}</Link>
</template>
