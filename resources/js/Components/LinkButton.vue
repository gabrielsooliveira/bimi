<script setup>
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    service: Object,
});

const route_name = props.service.slug + '.create.login'
</script>

<template>
    <Link class="btn btn-secondary btn-lg w-100 bg-gradient shadow-lg fw-bold" :href="route(route_name)">{{ props.service.name }}</Link>
</template>
