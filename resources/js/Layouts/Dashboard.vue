<script setup>
import Toast from '@/js/Components/Toast.vue';
import ChatBot from '@/js/Components/ChatBot.vue';
import Navbar from '@/js/Components/Navbar.vue';

const props = defineProps({
    service: Object,
});
</script>

<template>
    <Navbar :service="service"></Navbar>
    <div class="px-4">
        <slot></slot>
        <ChatBot :service="service"></ChatBot>
    </div>
    <Toast></Toast>
</template>
