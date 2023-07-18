<script setup>
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    id: Number,
    title: String,
    created: String,
    updated: String,
});
</script>

<template>
        <div class="border-2 mt-2 mb-2 p-2 bg-gray-50">
            <h1 class="text-ellipsis overflow-hidden"><Link :href="route('task.show', props.id)"> {{ props.title }}</Link></h1>
            <small>Created at: {{ new Date(props.created).toLocaleString() }}</small>
            <br/>
            <small>Updated at: {{ new Date(props.updated).toLocaleString() }}</small>
        </div>
</template>
