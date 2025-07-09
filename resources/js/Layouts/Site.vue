<!-- resources/js/Layouts/AppLayout.vue -->
<script setup>

</script>

<template>
  <div class="min-vh-100 d-flex flex-column text-dark">
    <main class="flex-fill d-flex align-items-center justify-content-center pt-5 container">
        <div class="position-absolute top-0 start-0 w-100 h-100 z-n1 overflow-hidden d-lg-block d-none">
            <svg
            width="40%"
            height="100%"
            viewBox="0 0 100 100"
            preserveAspectRatio="none"
            xmlns="http://www.w3.org/2000/svg"
            >
            <defs>
                <linearGradient id="purpleGradient" x1="0" y1="0" x2="1" y2="1">
                <stop offset="0%" stop-color="#2d067c" />
                <stop offset="100%" stop-color="#500cda" />
                </linearGradient>
            </defs>
                <!-- Parte branca -->
                <polygon points="0,0 100,0 100,100" fill="#ffffff" />
                <!-- Parte com gradiente -->
                <polygon points="0,0 0,100 100,100" fill="url(#purpleGradient)" />
            </svg>
        </div>
        <slot />
    </main>

    <footer class="py-4 text-center text-muted small mt-auto">
      © 2024 - Desenvolvido pela equipe Humam AI.
    </footer>
  </div>
</template>
