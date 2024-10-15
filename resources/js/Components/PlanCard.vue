<script setup>
const props = defineProps({
    plan: {
        type: Object,
        required: true,
    },
});
</script>

<template>
    <div class="col">
        <div class="card h-100 shadow-sm">
            <img src="https://dummyimage.com/600x400/500cda/ffffff&text=Image+one" class="card-img-top" :alt="'foto do' + plan.name">
            <div class="card-body text-center">
                <h5 class="card-title">{{ plan.name }}</h5>

                <p class="card-text fs-5 text-bold">
                    {{ plan.price }} {{ plan.currency }}
                </p>
            </div>
        </div>
    </div>
</template>
