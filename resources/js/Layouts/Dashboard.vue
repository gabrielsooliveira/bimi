<script setup>
import Navbar from '@/js/Components/Navbar.vue';
</script>

<template>
    <Navbar></Navbar>
    <div class="px-4">
        <slot></slot>
    </div>
</template>
