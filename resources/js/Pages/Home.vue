<script setup>
import { Head, Link } from '@inertiajs/vue3';
import Logo from '@/assets/images/logo-gradient.svg';
import LinkButton from '@/js/Components/LinkButton.vue';

const props = defineProps({
  services: Array
})
</script>

<template>
  <Head title="Inicio" />
    <div class="container text-center px-4 position-relative py-5">
    <img :src="Logo" alt="Logo" class="img-fluid mb-4" />

    <h2 class="fw-bold text-primary mb-3 display-5">
      Atendimento inteligente para empresas modernas
    </h2>

    <p class="text-muted fs-5 mb-5">
      Porque solucionar para um, quando podemos transformar o atendimento para todos?
    </p>

    <div class="row justify-content-center g-4">
      <div
        class="col-12 col-sm-6 col-md-4 col-lg-3"
        v-for="service in props.services"
        :key="service.id"
      >
        <LinkButton :service="service" />
      </div>
    </div>

    <div class="mt-5">
      <Link class="btn btn-primary btn-lg px-5 py-2 rounded-pill shadow-sm fw-semibold" :href="route('login')">
        Acessar Portal
      </Link>
    </div>
  </div>
</template>
