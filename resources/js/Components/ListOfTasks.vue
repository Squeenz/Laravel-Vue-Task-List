<script setup>
import Task from '@/Components/Task.vue';

const props = defineProps({
    tasks: Array
});

const numTasks = props.tasks.length;

</script>

<template>
    <small v-if="numTasks === 0">No tasks</small>
    <Task
        v-else
        v-for="task in props.tasks"
        v-bind:key="task.id"
        :id="task.id"
        :title="task.title"
        :created="task.created_at"
        :updated="task.updated_at"
    ></Task>
</template>
