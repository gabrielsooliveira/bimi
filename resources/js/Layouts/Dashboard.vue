<script setup>
import Toast from '@/js/Components/Toast.vue';
import Sidebar from '@/js/Components/Sidebar.vue';

</script>

<template>
  <div class="d-flex vh-100 bg-body-tertiary overflow-hidden">
        <!-- Sidebar fixo -->
        <Sidebar class="position-sticky top-0 h-100 flex-shrink-0" />

        <!-- Conteúdo principal com scroll -->
        <main class="flex-grow-1 overflow-auto position-relative">
            <nav class="navbar d-lg-none bg-primary px-2">
                <a class="navbar-brand text-white" :href="route('dashboard')">OddsAnalytics</a>
                <button class="btn btn-sm btn-primary"
                    type="button"
                    data-bs-toggle="offcanvas"
                    data-bs-target="#sidebar"
                    aria-controls="offcanvasNavbar">
                    <font-awesome-icon icon="fa-solid fa-bars" />
                </button>
            </nav>

            <!-- Container do conteúdo -->
            <div class="container-fluid px-3 py-2"> <!-- mt-5 para espaço do botão -->
                <slot></slot>
                <Toast />
            </div>
        </main>
    </div>
</template>
