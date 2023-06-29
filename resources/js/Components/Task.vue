<script setup>

const props = defineProps({
    title: String,
    content: String,
});

</script>

<template>
    <div class="m-5 bg-white border border-gray-400 rounded max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <h1>{{ props.title }}</h1>
        <p>{{ props.content }}</p>
    </div>
</template>
