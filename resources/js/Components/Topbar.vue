<template>
  <nav class="navbar navbar-light bg-light shadow-sm px-3 d-flex justify-content-between">
    <button class="btn btn-outline-primary d-md-none" @click="$emit('toggle-sidebar')">
      <i class="bi bi-list"></i>
    </button>
    <span class="navbar-brand mb-0 h1">Painel</span>
    <div><i class="bi bi-person-circle fs-4"></i></div>
  </nav>
</template>
