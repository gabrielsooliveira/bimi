<script setup>
import { ref, onMounted, onBeforeUnmount, watch, computed } from 'vue';
import { Modal } from 'bootstrap';

const props = defineProps({
    title: String,
    size: {
        type: String,
        default: 'md'
    },
    isVisible: {
        type: Boolean,
        default: false,
    }
});

const emit = defineEmits(['close']);
const modalRef = ref(null);
let modalInstance = null;

const closeModal = () => {
    emit('close');
};

watch(() => props.isVisible, (newVal) => {
    if (newVal) {
        if (modalInstance) {
            modalInstance.show();
        }
    } else {
        if (modalInstance) {
            modalInstance.hide();
        }
    }
});

onMounted(() => {
    if (modalRef.value) {
        modalInstance = new Modal(modalRef.value);
    }
});

onBeforeUnmount(() => {
    if (modalInstance) {
        modalInstance.dispose();
    }
});

const sizeClass = computed(() => {
    return props.size ? `modal-${props.size}` : '';
});
</script>

<template>
    <div ref="modalRef" class="modal fade" tabindex="-1" data-bs-backdrop="static">
        <div class="modal-dialog" :class="sizeClass">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ title }}</h5>
                    <button type="button" class="btn-close" @click="closeModal"></button>
                </div>
                <div class="modal-body">
                    <slot></slot>
                </div>
            </div>
        </div>
    </div>
</template>
