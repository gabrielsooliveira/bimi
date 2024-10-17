<script setup>
import Toast from '@/js/Components/Toast.vue';
import Navbar from '@/js/Components/Navbar.vue';

const props = defineProps({
    service: Object,
});
</script>

<template>
    <Navbar :service="service"></Navbar>
    <div class="px-4">
        <slot></slot>
    </div>
    <Toast></Toast>
</template>
