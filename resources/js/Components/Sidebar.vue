<script setup>
defineOptions({
  inheritAttrs: false,
});
</script>

<template>
    <div v-bind="$attrs" class="d-none d-lg-flex flex-column flex-shrink-0 p-3 bg-light vh-100 left-0 top-0 shadow-lg" id="sidebar">
        <hr>
        testeee
    </div>
</template>

<style scoped>
#sidebar {
    width: 20rem;
}
</style>
