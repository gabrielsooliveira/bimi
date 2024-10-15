<script setup>
import Toast from '@/js/Components/Toast.vue';
</script>

<template>
    <div class="px-4">
        <slot></slot>
    </div>
    <Toast></Toast>
</template>
