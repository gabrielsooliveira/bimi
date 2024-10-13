<template>
    <div v-if="visible" class="toast-container position-fixed top-0 end-0 p-3">
        <div class="toast show align-items-center text-white border-0" :class="type" role="alert">
            <div class="d-flex">
                <div class="toast-body">{{ message }}</div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" @click="visible = false"></button>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, watch } from 'vue';
import { usePage } from '@inertiajs/vue3';

const visible = ref(false);
const message = ref('');
const type = ref('primary');
const page = usePage();

watch(
    () => page.props.flash,
    (flash) => {
        if (flash?.success) {
            message.value = flash.success;
            type.value = 'bg-success';
            showToast();
        } else if (flash?.error) {
            message.value = flash.error;
            type.value = 'bg-danger';
            showToast();
        } else if (flash?.warning) {
            message.value = flash.warning;
            type.value = 'bg-warning';
            showToast();
        } else if (flash?.info) {
            message.value = flash.info;
            type.value = 'bg-info';
            showToast();
        }
    },
    { immediate: true, deep: true }
);

const showToast = () => {
    visible.value = true;
    setTimeout(() => {
        visible.value = false;
    }, 4000);
};
</script>
