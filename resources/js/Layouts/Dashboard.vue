<script setup>
import Navbar from '@/js/Components/Navbar.vue';
import Toast from '@/js/Components/Toast.vue';
</script>

<template>
    <Navbar></Navbar>
    <div class="px-4">
        <slot></slot>
    </div>
    <Toast></Toast>
</template>
