<script setup>
import Task from '@/Components/Task.vue';

const props = defineProps({
    tasks: Array
});

</script>

<template>
    <Task
        v-for="task in props.tasks"
        v-bind:key="task.id"
        :title="task.title"
        :content="task.content"
    ></Task>
</template>
